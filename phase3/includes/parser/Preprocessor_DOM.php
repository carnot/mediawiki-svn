<?php

/**
 * @ingroup Parser
 */
class Preprocessor_DOM implements Preprocessor {
	var $parser, $memoryLimit;

	const CACHE_VERSION = 1;

	function __construct( $parser ) {
		$this->parser = $parser;
		$mem = ini_get( 'memory_limit' );
		$this->memoryLimit = false;
		if ( strval( $mem ) !== '' && $mem != -1 ) {
			if ( preg_match( '/^\d+$/', $mem ) ) {
				$this->memoryLimit = $mem;
			} elseif ( preg_match( '/^(\d+)M$/i', $mem, $m ) ) {
				$this->memoryLimit = $m[1] * 1048576;
			}
		}
	}

	function newFrame() {
		return new PPFrame_DOM( $this );
	}

	function newCustomFrame( $args ) {
		return new PPCustomFrame_DOM( $this, $args );
	}

	function memCheck() {
		if ( $this->memoryLimit === false ) {
			return;
		}
		$usage = memory_get_usage();
		if ( $usage > $this->memoryLimit * 0.9 ) {
			$limit = intval( $this->memoryLimit * 0.9 / 1048576 + 0.5 );
			throw new MWException( "Preprocessor hit 90% memory limit ($limit MB)" );
		}
		return $usage <= $this->memoryLimit * 0.8;
	}

	/**
	 * Preprocess some wikitext and return the document tree.
	 * This is the ghost of Parser::replace_variables().
	 *
	 * @param string $text The text to parse
	 * @param integer flags Bitwise combination of:
	 *          Parser::PTD_FOR_INCLUSION    Handle <noinclude>/<includeonly> as if the text is being
	 *                                     included. Default is to assume a direct page view.
	 *
	 * The generated DOM tree must depend only on the input text and the flags.
	 * The DOM tree must be the same in OT_HTML and OT_WIKI mode, to avoid a regression of bug 4899.
	 *
	 * Any flag added to the $flags parameter here, or any other parameter liable to cause a
	 * change in the DOM tree for a given text, must be passed through the section identifier
	 * in the section edit link and thus back to extractSections().
	 *
	 * Temporarily removed the cache because the parser now parses straight to DOM
	 * The output of this function is currently only cached in process memory, but a persistent
	 * cache may be implemented at a later date which takes further advantage of these strict
	 * dependency requirements.
	 *
	 * @private
	 */
	function preprocessToObj( $text, $flags = 0 ) {
		wfProfileIn( __METHOD__ );
		
		// To XML
		$xmlishRegex = implode('|', $this->parser->getStripList());
		$bugHHP21 = new ParseRule("hhp21", '/^\n(?==[^=])/s');
		$rules = array(
			"Template" => new ParseRule("template", '/^{{(?!{[^{])/s', '/^}}/s', '}|=', $bugHHP21),
			"TplArg" => new ParseRule("tplarg", '/^{{{/s', '/^}}}/s', '}|=', $bugHHP21),
			"Link" => new ParseRule("link", '/^\[\[/s', '/^]]/s', '\]'),
			"Heading" => new ParseRule("h", '/^(\n|~BOF)(={1,6})/s', '/^~2(?: *<!--.*?(?:-->|\Z))*(?=\n|$)/s', '='),
			"CommentLine" => new ParseRule("commentline", '/^(\n *)((?:<!--.*?(?:-->|$)(?: *\n)?)+)/s'),
			"Comment" => new ParseRule("comment", '/^<!--.*?(?:-->|$)/s'),
			"OnlyInclude" => new ParseRule("ignore", '/^<\/?onlyinclude>/s'),
			"NoInclude" => new ParseRule("ignore", '/^<\/?noinclude>/s'),
			"IncludeOnly" => new ParseRule("ignore", '/^<includeonly>.*?(?:<\/includeonly>|$)/s'),
			"XmlClosed" => new ParseRule("ext", '/^<(' . $xmlishRegex . ')([^>]*)\/>/si'),
			"XmlOpened" => new ParseRule("ext", '/^<(' . $xmlishRegex . ')(.*?)>(.*?)(<\/\1>|$)/si'),
			"BeginFile" => new ParseRule("bof", '/^~BOF/s'));
		if ($flags & Parser::PTD_FOR_INCLUSION) {
			$rules["OnlyInclude"] = new ParseRule("ignore", '/^<\/onlyinclude>.*?(?:<onlyinclude>|$)/s');
			$rules["NoInclude"] = new ParseRule("ignore", '/^<noinclude>.*?(?:<\/noinclude>|$)/s');
			$rules["IncludeOnly"] = new ParseRule("ignore", '/^<\/?includeonly>/s');
			$rules["BeginFile"] = new ParseRule("bof", '/^~BOF(.*?<onlyinclude>)?/s');
		}

		$parseList = new ParseList($rules, '{\[<\n');
		$parseTree = ParseTree::createParseTree($text, $parseList);
		$xml = $parseTree->printTree();

		// To DOM
		wfProfileIn( __METHOD__.'-loadXML' );
		$dom = new DOMDocument;
		wfSuppressWarnings();
		$result = $dom->loadXML( $xml );
		wfRestoreWarnings();
		if ( !$result ) {
			// Try running the XML through UtfNormal to get rid of invalid characters
			$xml = UtfNormal::cleanUp( $xml );
			$result = $dom->loadXML( $xml );
			if ( !$result ) {
				throw new MWException( __METHOD__.' generated invalid XML' );
			}
		}
		$this->transformDOM($dom);

		// To Obj
		$obj = new PPNode_DOM( $dom->documentElement );

		wfProfileOut( __METHOD__ );
		return $obj;
	}

	// Temporary function to add needed redundant info to the parse tree after parsing.
	private function transformDOM(&$node, &$headingInd = 1) {
		if ($node->hasChildNodes()) {
			if ($node->nodeName == "h") {
				$node->setAttribute("level", strspn($node->firstChild->wholeText, "=", 0, 6 ));
				$node->setAttribute("i", $headingInd);
				$headingInd ++;
			} elseif ($node->nodeName == "template" && $node->previousSibling instanceof DOMText) {
				$preText = $node->previousSibling->wholeText;
				if ($preText[strlen($preText) - 1] == "\n") {
					$node->setAttribute("lineStart", 1);
				}
			}
			$partInd = 1;
			foreach ($node->childNodes as $crrnt) {
				$this->transformDOM($crrnt, $headingInd);
				if ($crrnt->nodeName == "part") {
					if ($crrnt->firstChild->nodeName != "name") {
						$newNode = $node->ownerDocument->createElement("name");
						$newNode->setAttribute("index", $partInd);
						$partInd ++;
						$crrnt->insertBefore($newNode, $crrnt->firstChild);
					} else {
						$newNode = $node->ownerDocument->createTextNode("=");
						$crrnt->insertBefore($newNode, $crrnt->lastChild);
					}
				}
			}
		}
	}
}

/**
 * An expansion frame, used as a context to expand the result of preprocessToObj()
 * @ingroup Parser
 */
class PPFrame_DOM implements PPFrame {
	var $preprocessor, $parser, $title;
	var $titleCache;

	/**
	 * Hashtable listing templates which are disallowed for expansion in this frame,
	 * having been encountered previously in parent frames.
	 */
	var $loopCheckHash;

	/**
	 * Recursion depth of this frame, top = 0
	 * Note that this is NOT the same as expansion depth in expand()
	 */
	var $depth;


	/**
	 * Construct a new preprocessor frame.
	 * @param Preprocessor $preprocessor The parent preprocessor
	 */
	function __construct( $preprocessor ) {
		$this->preprocessor = $preprocessor;
		$this->parser = $preprocessor->parser;
		$this->title = $this->parser->mTitle;
		$this->titleCache = array( $this->title ? $this->title->getPrefixedDBkey() : false );
		$this->loopCheckHash = array();
		$this->depth = 0;
	}

	/**
	 * Create a new child frame
	 * $args is optionally a multi-root PPNode or array containing the template arguments
	 */
	function newChild( $args = false, $title = false ) {
		$namedArgs = array();
		$numberedArgs = array();
		if ( $title === false ) {
			$title = $this->title;
		}
		if ( $args !== false ) {
			$xpath = false;
			if ( $args instanceof PPNode ) {
				$args = $args->node;
			}
			foreach ( $args as $arg ) {
				if ( !$xpath ) {
					$xpath = new DOMXPath( $arg->ownerDocument );
				}

				$nameNodes = $xpath->query( 'name', $arg );
				$value = $xpath->query( 'value', $arg );
				if ( $nameNodes->item( 0 )->hasAttributes() ) {
					// Numbered parameter
					$index = $nameNodes->item( 0 )->attributes->getNamedItem( 'index' )->textContent;
					$numberedArgs[$index] = $value->item( 0 );
					unset( $namedArgs[$index] );
				} else {
					// Named parameter
					$name = trim( $this->expand( $nameNodes->item( 0 ), PPFrame::STRIP_COMMENTS ) );
					$namedArgs[$name] = $value->item( 0 );
					unset( $numberedArgs[$name] );
				}
			}
		}
		return new PPTemplateFrame_DOM( $this->preprocessor, $this, $numberedArgs, $namedArgs, $title );
	}

	function expand( $root, $flags = 0 ) {
		static $expansionDepth = 0;
		if ( is_string( $root ) ) {
			return $root;
		}

		if ( ++$this->parser->mPPNodeCount > $this->parser->mOptions->mMaxPPNodeCount )
		{
			return '<span class="error">Node-count limit exceeded</span>';
		}

		if ( $expansionDepth > $this->parser->mOptions->mMaxPPExpandDepth ) {
			return '<span class="error">Expansion depth limit exceeded</span>';
		}
		wfProfileIn( __METHOD__ );
		++$expansionDepth;

		if ( $root instanceof PPNode_DOM ) {
			$root = $root->node;
		}
		if ( $root instanceof DOMDocument ) {
			$root = $root->documentElement;
		}

		$outStack = array( '', '' );
		$iteratorStack = array( false, $root );
		$indexStack = array( 0, 0 );

		while ( count( $iteratorStack ) > 1 ) {
			$level = count( $outStack ) - 1;
			$iteratorNode =& $iteratorStack[ $level ];
			$out =& $outStack[$level];
			$index =& $indexStack[$level];

			if ( $iteratorNode instanceof PPNode_DOM ) $iteratorNode = $iteratorNode->node;

			if ( is_array( $iteratorNode ) ) {
				if ( $index >= count( $iteratorNode ) ) {
					// All done with this iterator
					$iteratorStack[$level] = false;
					$contextNode = false;
				} else {
					$contextNode = $iteratorNode[$index];
					$index++;
				}
			} elseif ( $iteratorNode instanceof DOMNodeList ) {
				if ( $index >= $iteratorNode->length ) {
					// All done with this iterator
					$iteratorStack[$level] = false;
					$contextNode = false;
				} else {
					$contextNode = $iteratorNode->item( $index );
					$index++;
				}
			} else {
				// Copy to $contextNode and then delete from iterator stack,
				// because this is not an iterator but we do have to execute it once
				$contextNode = $iteratorStack[$level];
				$iteratorStack[$level] = false;
			}

			if ( $contextNode instanceof PPNode_DOM ) $contextNode = $contextNode->node;

			$newIterator = false;

			if ( $contextNode === false ) {
				// nothing to do
			} elseif ( is_string( $contextNode ) ) {
				$out .= $contextNode;
			} elseif ( is_array( $contextNode ) || $contextNode instanceof DOMNodeList ) {
				$newIterator = $contextNode;
			} elseif ( $contextNode instanceof DOMNode ) {
				if ( $contextNode->nodeType == XML_TEXT_NODE ) {
					$out .= $contextNode->nodeValue;
				} elseif ( $contextNode->nodeName == 'template' ) {
					# Double-brace expansion
					$xpath = new DOMXPath( $contextNode->ownerDocument );
					$titles = $xpath->query( 'title', $contextNode );
					$title = $titles->item( 0 );
					$parts = $xpath->query( 'part', $contextNode );
					if ( $flags & self::NO_TEMPLATES ) {
						$newIterator = $this->virtualBracketedImplode( '{{', '|', '}}', $title, $parts );
					} else {
						$lineStart = $contextNode->getAttribute( 'lineStart' );
						$params = array(
							'title' => new PPNode_DOM( $title ),
							'parts' => new PPNode_DOM( $parts ),
							'lineStart' => $lineStart );
						$ret = $this->parser->braceSubstitution( $params, $this );
						if ( isset( $ret['object'] ) ) {
							$newIterator = $ret['object'];
						} else {
							$out .= $ret['text'];
						}
					}
				} elseif ( $contextNode->nodeName == 'tplarg' ) {
					# Triple-brace expansion
					$xpath = new DOMXPath( $contextNode->ownerDocument );
					$titles = $xpath->query( 'title', $contextNode );
					$title = $titles->item( 0 );
					$parts = $xpath->query( 'part', $contextNode );
					if ( $flags & self::NO_ARGS ) {
						$newIterator = $this->virtualBracketedImplode( '{{{', '|', '}}}', $title, $parts );
					} else {
						$params = array(
							'title' => new PPNode_DOM( $title ),
							'parts' => new PPNode_DOM( $parts ) );
						$ret = $this->parser->argSubstitution( $params, $this );
						if ( isset( $ret['object'] ) ) {
							$newIterator = $ret['object'];
						} else {
							$out .= $ret['text'];
						}
					}
				} elseif ( $contextNode->nodeName == 'comment' ) {
					# HTML-style comment
					# Remove it in HTML, pre+remove and STRIP_COMMENTS modes
					if ( $this->parser->ot['html']
						|| ( $this->parser->ot['pre'] && $this->parser->mOptions->getRemoveComments() )
						|| ( $flags & self::STRIP_COMMENTS ) )
					{
						$out .= '';
					}
					# Add a strip marker in PST mode so that pstPass2() can run some old-fashioned regexes on the result
					# Not in RECOVER_COMMENTS mode (extractSections) though
					elseif ( $this->parser->ot['wiki'] && ! ( $flags & self::RECOVER_COMMENTS ) ) {
						$out .= $this->parser->insertStripItem( $contextNode->textContent );
					}
					# Recover the literal comment in RECOVER_COMMENTS and pre+no-remove
					else {
						$out .= $contextNode->textContent;
					}
				} elseif ( $contextNode->nodeName == 'ignore' ) {
					# Output suppression used by <includeonly> etc.
					# OT_WIKI will only respect <ignore> in substed templates.
					# The other output types respect it unless NO_IGNORE is set.
					# extractSections() sets NO_IGNORE and so never respects it.
					if ( ( !isset( $this->parent ) && $this->parser->ot['wiki'] ) || ( $flags & self::NO_IGNORE ) ) {
						$out .= $contextNode->textContent;
					} else {
						$out .= '';
					}
				} elseif ( $contextNode->nodeName == 'ext' ) {
					# Extension tag
					$xpath = new DOMXPath( $contextNode->ownerDocument );
					$names = $xpath->query( 'name', $contextNode );
					$attrs = $xpath->query( 'attr', $contextNode );
					$inners = $xpath->query( 'inner', $contextNode );
					$closes = $xpath->query( 'close', $contextNode );
					$params = array(
						'name' => new PPNode_DOM( $names->item( 0 ) ),
						'attr' => $attrs->length > 0 ? new PPNode_DOM( $attrs->item( 0 ) ) : null,
						'inner' => $inners->length > 0 ? new PPNode_DOM( $inners->item( 0 ) ) : null,
						'close' => $closes->length > 0 ? new PPNode_DOM( $closes->item( 0 ) ) : null,
					);
					$out .= $this->parser->extensionSubstitution( $params, $this );
				} elseif ( $contextNode->nodeName == 'h' ) {
					# Heading
					$s = $this->expand( $contextNode->childNodes, $flags );

					# Insert a heading marker only for <h> children of <root>
					# This is to stop extractSections from going over multiple tree levels
					if ( $contextNode->parentNode->nodeName == 'root'
					  && $this->parser->ot['html'] )
					{
						# Insert heading index marker
						$headingIndex = $contextNode->getAttribute( 'i' );
						$titleText = $this->title->getPrefixedDBkey();
						$this->parser->mHeadings[] = array( $titleText, $headingIndex );
						$serial = count( $this->parser->mHeadings ) - 1;
						$marker = "{$this->parser->mUniqPrefix}-h-$serial-" . Parser::MARKER_SUFFIX;
						$count = $contextNode->getAttribute( 'level' );
						$s = substr( $s, 0, $count ) . $marker . substr( $s, $count );
						$this->parser->mStripState->general->setPair( $marker, '' );
					}
					$out .= $s;
				} else {
					# Generic recursive expansion
					$newIterator = $contextNode->childNodes;
				}
			} else {
				wfProfileOut( __METHOD__ );
				throw new MWException( __METHOD__.': Invalid parameter type' );
			}

			if ( $newIterator !== false ) {
				if ( $newIterator instanceof PPNode_DOM ) {
					$newIterator = $newIterator->node;
				}
				$outStack[] = '';
				$iteratorStack[] = $newIterator;
				$indexStack[] = 0;
			} elseif ( $iteratorStack[$level] === false ) {
				// Return accumulated value to parent
				// With tail recursion
				while ( $iteratorStack[$level] === false && $level > 0 ) {
					$outStack[$level - 1] .= $out;
					array_pop( $outStack );
					array_pop( $iteratorStack );
					array_pop( $indexStack );
					$level--;
				}
			}
		}
		--$expansionDepth;
		wfProfileOut( __METHOD__ );
		return $outStack[0];
	}

	function implodeWithFlags( $sep, $flags /*, ... */ ) {
		$args = array_slice( func_get_args(), 2 );

		$first = true;
		$s = '';
		foreach ( $args as $root ) {
			if ( $root instanceof PPNode_DOM ) $root = $root->node;
			if ( !is_array( $root ) && !( $root instanceof DOMNodeList ) ) {
				$root = array( $root );
			}
			foreach ( $root as $node ) {
				if ( $first ) {
					$first = false;
				} else {
					$s .= $sep;
				}
				$s .= $this->expand( $node, $flags );
			}
		}
		return $s;
	}

	/**
	 * Implode with no flags specified
	 * This previously called implodeWithFlags but has now been inlined to reduce stack depth
	 */
	function implode( $sep /*, ... */ ) {
		$args = array_slice( func_get_args(), 1 );

		$first = true;
		$s = '';
		foreach ( $args as $root ) {
			if ( $root instanceof PPNode_DOM ) $root = $root->node;
			if ( !is_array( $root ) && !( $root instanceof DOMNodeList ) ) {
				$root = array( $root );
			}
			foreach ( $root as $node ) {
				if ( $first ) {
					$first = false;
				} else {
					$s .= $sep;
				}
				$s .= $this->expand( $node );
			}
		}
		return $s;
	}

	/**
	 * Makes an object that, when expand()ed, will be the same as one obtained
	 * with implode()
	 */
	function virtualImplode( $sep /*, ... */ ) {
		$args = array_slice( func_get_args(), 1 );
		$out = array();
		$first = true;
		if ( $root instanceof PPNode_DOM ) $root = $root->node;

		foreach ( $args as $root ) {
			if ( !is_array( $root ) && !( $root instanceof DOMNodeList ) ) {
				$root = array( $root );
			}
			foreach ( $root as $node ) {
				if ( $first ) {
					$first = false;
				} else {
					$out[] = $sep;
				}
				$out[] = $node;
			}
		}
		return $out;
	}

	/**
	 * Virtual implode with brackets
	 */
	function virtualBracketedImplode( $start, $sep, $end /*, ... */ ) {
		$args = array_slice( func_get_args(), 3 );
		$out = array( $start );
		$first = true;

		foreach ( $args as $root ) {
			if ( $root instanceof PPNode_DOM ) $root = $root->node;
			if ( !is_array( $root ) && !( $root instanceof DOMNodeList ) ) {
				$root = array( $root );
			}
			foreach ( $root as $node ) {
				if ( $first ) {
					$first = false;
				} else {
					$out[] = $sep;
				}
				$out[] = $node;
			}
		}
		$out[] = $end;
		return $out;
	}

	function __toString() {
		return 'frame{}';
	}

	function getPDBK( $level = false ) {
		if ( $level === false ) {
			return $this->title->getPrefixedDBkey();
		} else {
			return isset( $this->titleCache[$level] ) ? $this->titleCache[$level] : false;
		}
	}

	function getArguments() {
		return array();
	}

	function getNumberedArguments() {
		return array();
	}

	function getNamedArguments() {
		return array();
	}

	/**
	 * Returns true if there are no arguments in this frame
	 */
	function isEmpty() {
		return true;
	}

	function getArgument( $name ) {
		return false;
	}

	/**
	 * Returns true if the infinite loop check is OK, false if a loop is detected
	 */
	function loopCheck( $title ) {
		return !isset( $this->loopCheckHash[$title->getPrefixedDBkey()] );
	}

	/**
	 * Return true if the frame is a template frame
	 */
	function isTemplate() {
		return false;
	}
}

/**
 * Expansion frame with template arguments
 * @ingroup Parser
 */
class PPTemplateFrame_DOM extends PPFrame_DOM {
	var $numberedArgs, $namedArgs, $parent;
	var $numberedExpansionCache, $namedExpansionCache;

	function __construct( $preprocessor, $parent = false, $numberedArgs = array(), $namedArgs = array(), $title = false ) {
		PPFrame_DOM::__construct( $preprocessor );
		$this->parent = $parent;
		$this->numberedArgs = $numberedArgs;
		$this->namedArgs = $namedArgs;
		$this->title = $title;
		$pdbk = $title ? $title->getPrefixedDBkey() : false;
		$this->titleCache = $parent->titleCache;
		$this->titleCache[] = $pdbk;
		$this->loopCheckHash = /*clone*/ $parent->loopCheckHash;
		if ( $pdbk !== false ) {
			$this->loopCheckHash[$pdbk] = true;
		}
		$this->depth = $parent->depth + 1;
		$this->numberedExpansionCache = $this->namedExpansionCache = array();
	}

	function __toString() {
		$s = 'tplframe{';
		$first = true;
		$args = $this->numberedArgs + $this->namedArgs;
		foreach ( $args as $name => $value ) {
			if ( $first ) {
				$first = false;
			} else {
				$s .= ', ';
			}
			$s .= "\"$name\":\"" .
				str_replace( '"', '\\"', $value->ownerDocument->saveXML( $value ) ) . '"';
		}
		$s .= '}';
		return $s;
	}
	/**
	 * Returns true if there are no arguments in this frame
	 */
	function isEmpty() {
		return !count( $this->numberedArgs ) && !count( $this->namedArgs );
	}

	function getArguments() {
		$arguments = array();
		foreach ( array_merge(
				array_keys($this->numberedArgs),
				array_keys($this->namedArgs)) as $key ) {
			$arguments[$key] = $this->getArgument($key);
		}
		return $arguments;
	}
	
	function getNumberedArguments() {
		$arguments = array();
		foreach ( array_keys($this->numberedArgs) as $key ) {
			$arguments[$key] = $this->getArgument($key);
		}
		return $arguments;
	}
	
	function getNamedArguments() {
		$arguments = array();
		foreach ( array_keys($this->namedArgs) as $key ) {
			$arguments[$key] = $this->getArgument($key);
		}
		return $arguments;
	}

	function getNumberedArgument( $index ) {
		if ( !isset( $this->numberedArgs[$index] ) ) {
			return false;
		}
		if ( !isset( $this->numberedExpansionCache[$index] ) ) {
			# No trimming for unnamed arguments
			$this->numberedExpansionCache[$index] = $this->parent->expand( $this->numberedArgs[$index], self::STRIP_COMMENTS );
		}
		return $this->numberedExpansionCache[$index];
	}

	function getNamedArgument( $name ) {
		if ( !isset( $this->namedArgs[$name] ) ) {
			return false;
		}
		if ( !isset( $this->namedExpansionCache[$name] ) ) {
			# Trim named arguments post-expand, for backwards compatibility
			$this->namedExpansionCache[$name] = trim(
				$this->parent->expand( $this->namedArgs[$name], self::STRIP_COMMENTS ) );
		}
		return $this->namedExpansionCache[$name];
	}

	function getArgument( $name ) {
		$text = $this->getNumberedArgument( $name );
		if ( $text === false ) {
			$text = $this->getNamedArgument( $name );
		}
		return $text;
	}

	/**
	 * Return true if the frame is a template frame
	 */
	function isTemplate() {
		return true;
	}
}

/**
 * Expansion frame with custom arguments
 * @ingroup Parser
 */
class PPCustomFrame_DOM extends PPFrame_DOM {
	var $args;

	function __construct( $preprocessor, $args ) {
		PPFrame_DOM::__construct( $preprocessor );
		$this->args = $args;
	}

	function __toString() {
		$s = 'cstmframe{';
		$first = true;
		foreach ( $this->args as $name => $value ) {
			if ( $first ) {
				$first = false;
			} else {
				$s .= ', ';
			}
			$s .= "\"$name\":\"" .
				str_replace( '"', '\\"', $value->__toString() ) . '"';
		}
		$s .= '}';
		return $s;
	}

	function isEmpty() {
		return !count( $this->args );
	}

	function getArgument( $index ) {
		if ( !isset( $this->args[$index] ) ) {
			return false;
		}
		return $this->args[$index];
	}
}

/**
 * @ingroup Parser
 */
class PPNode_DOM implements PPNode {
	var $node;

	function __construct( $node, $xpath = false ) {
		$this->node = $node;
	}

	function __get( $name ) {
		if ( $name == 'xpath' ) {
			$this->xpath = new DOMXPath( $this->node->ownerDocument );
		}
		return $this->xpath;
	}

	function __toString() {
		if ( $this->node instanceof DOMNodeList ) {
			$s = '';
			foreach ( $this->node as $node ) {
				$s .= $node->ownerDocument->saveXML( $node );
			}
		} else {
			$s = $this->node->ownerDocument->saveXML( $this->node );
		}
		return $s;
	}

	function getChildren() {
		return $this->node->childNodes ? new self( $this->node->childNodes ) : false;
	}

	function getFirstChild() {
		return $this->node->firstChild ? new self( $this->node->firstChild ) : false;
	}

	function getNextSibling() {
		return $this->node->nextSibling ? new self( $this->node->nextSibling ) : false;
	}

	function getChildrenOfType( $type ) {
		return new self( $this->xpath->query( $type, $this->node ) );
	}

	function getLength() {
		if ( $this->node instanceof DOMNodeList ) {
			return $this->node->length;
		} else {
			return false;
		}
	}

	function item( $i ) {
		$item = $this->node->item( $i );
		return $item ? new self( $item ) : false;
	}

	function getName() {
		if ( $this->node instanceof DOMNodeList ) {
			return '#nodelist';
		} else {
			return $this->node->nodeName;
		}
	}

	/**
	 * Split a <part> node into an associative array containing:
	 *    name          PPNode name
	 *    index         String index
	 *    value         PPNode value
	 */
	function splitArg() {
		$names = $this->xpath->query( 'name', $this->node );
		$values = $this->xpath->query( 'value', $this->node );
		if ( !$names->length || !$values->length ) {
			throw new MWException( 'Invalid brace node passed to ' . __METHOD__ );
		}
		$name = $names->item( 0 );
		$index = $name->getAttribute( 'index' );
		return array(
			'name' => new self( $name ),
			'index' => $index,
			'value' => new self( $values->item( 0 ) ) );
	}

	/**
	 * Split an <ext> node into an associative array containing name, attr, inner and close
	 * All values in the resulting array are PPNodes. Inner and close are optional.
	 */
	function splitExt() {
		$names = $this->xpath->query( 'name', $this->node );
		$attrs = $this->xpath->query( 'attr', $this->node );
		$inners = $this->xpath->query( 'inner', $this->node );
		$closes = $this->xpath->query( 'close', $this->node );
		if ( !$names->length || !$attrs->length ) {
			throw new MWException( 'Invalid ext node passed to ' . __METHOD__ );
		}
		$parts = array(
			'name' => new self( $names->item( 0 ) ),
			'attr' => new self( $attrs->item( 0 ) ) );
		if ( $inners->length ) {
			$parts['inner'] = new self( $inners->item( 0 ) );
		}
		if ( $closes->length ) {
			$parts['close'] = new self( $closes->item( 0 ) );
		}
		return $parts;
	}

	/**
	 * Split a <h> node
	 */
	function splitHeading() {
		if ( !$this->nodeName == 'h' ) {
			throw new MWException( 'Invalid h node passed to ' . __METHOD__ );
		}
		return array(
			'i' => $this->node->getAttribute( 'i' ),
			'level' => $this->node->getAttribute( 'level' ),
			'contents' => $this->getChildren()
		);
	}
}

<?php
/**
 * MediaWiki is the to-be base class for this whole project
 */

class MediaWiki {

	var $GET; /* Stores the $_GET variables at time of creation, can be changed */
	var $params = array();

	/** Constructor. It just save the $_GET variable */
	function __construct() {
		$this->GET = $_GET;
	}

	/**
	 * Stores key/value pairs to circumvent global variables
	 * Note that keys are case-insensitive!
	 */
	function setVal( $key, &$value ) {
		$key = strtolower( $key );
		$this->params[$key] =& $value;
	}

	/**
	 * Retrieves key/value pairs to circumvent global variables
	 * Note that keys are case-insensitive!
	 */
	function getVal( $key, $default = '' ) {
		$key = strtolower( $key );
		if( isset( $this->params[$key] ) ) {
			return $this->params[$key];
		}
		return $default;
	}

	/**
	 * Initialization of ... everything
	 @return Article either the object to become $wgArticle, or NULL
	 */
	function initialize ( &$title, &$output, &$user, $request) {
		wfProfileIn( 'MediaWiki::initialize' );
		$this->preliminaryChecks ( $title, $output, $request ) ;
		$article = NULL;
		if ( !$this->initializeSpecialCases( $title, $output, $request ) ) {
			$article = $this->initializeArticle( $title, $request );
			if( is_object( $article ) ) {
				$this->performAction( $output, $article, $title, $user, $request );
			} elseif( is_string( $article ) ) {
				$output->redirect( $article );
			} else {
				throw new MWException( "Shouldn't happen: MediaWiki::initializeArticle() returned neither an object nor a URL" );
			}
		}
		wfProfileOut( 'MediaWiki::initialize' );
		return $article;
	}

	function checkMaxLag( $maxLag ) {
		global $wgLoadBalancer;
		list( $host, $lag ) = $wgLoadBalancer->getMaxLag();
		if ( $lag > $maxLag ) {
			header( 'HTTP/1.1 503 Service Unavailable' );
			header( 'Retry-After: ' . max( intval( $maxLag ), 5 ) );
			header( 'X-Database-Lag: ' . intval( $lag ) );
			header( 'Content-Type: text/plain' );
			echo "Waiting for $host: $lag seconds lagged\n";
			return false;
		} else {
			return true;
		}
	}


	/**
	 * Checks some initial queries
	 * Note that $title here is *not* a Title object, but a string!
	 */
	function checkInitialQueries( $title,$action,&$output,$request, $lang) {
		if ($request->getVal( 'printable' ) == 'yes') {
			$output->setPrintable();
		}

		$ret = NULL ;


		if ( '' == $title && 'delete' != $action ) {
			$ret = Title::newMainPage();
		} elseif ( $curid = $request->getInt( 'curid' ) ) {
			# URLs like this are generated by RC, because rc_title isn't always accurate
			$ret = Title::newFromID( $curid );
		} else {
			$ret = Title::newFromURL( $title );
			/* check variant links so that interwiki links don't have to worry about
			   the possible different language variants
			*/
			if( count($lang->getVariants()) > 1 && !is_null($ret) && $ret->getArticleID() == 0 )
				$lang->findVariantLink( $title, $ret );

		}
		return $ret ;
	}

	/**
	 * Checks for search query and anon-cannot-read case
	 */
	function preliminaryChecks ( &$title, &$output, $request ) {

		# Debug statement for user levels
		// print_r($wgUser);

		$search = $request->getText( 'search' );
		if( !is_null( $search ) && $search !== '' ) {
			// Compatibility with old search URLs which didn't use Special:Search
			// Do this above the read whitelist check for security...
			$title = SpecialPage::getTitleFor( 'Search' );
		}
		$this->setVal( 'Search', $search );

		# If the user is not logged in, the Namespace:title of the article must be in
		# the Read array in order for the user to see it. (We have to check here to
		# catch special pages etc. We check again in Article::view())
		if ( !is_null( $title ) && !$title->userCanRead() ) {
			$output->loginToUse();
			$output->output();
			exit;
		}

	}

	/**
	 * Initialize the object to be known as $wgArticle for special cases
	 */
	function initializeSpecialCases ( &$title, &$output, $request ) {
		global $wgRequest;
		wfProfileIn( 'MediaWiki::initializeSpecialCases' );

		$search = $this->getVal('Search');
		$action = $this->getVal('Action');
		if( !$this->getVal('DisableInternalSearch') && !is_null( $search ) && $search !== '' ) {
			require_once( 'includes/SpecialSearch.php' );
			$title = SpecialPage::getTitleFor( 'Search' );
			wfSpecialSearch();
		} else if( !$title or $title->getDBkey() == '' ) {
			$title = SpecialPage::getTitleFor( 'Badtitle' );
			# Die now before we mess up $wgArticle and the skin stops working
			throw new ErrorPageError( 'badtitle', 'badtitletext' );
		} else if ( $title->getInterwiki() != '' ) {
			if( $rdfrom = $request->getVal( 'rdfrom' ) ) {
				$url = $title->getFullURL( 'rdfrom=' . urlencode( $rdfrom ) );
			} else {
				$url = $title->getFullURL();
			}
			/* Check for a redirect loop */
			if ( !preg_match( '/^' . preg_quote( $this->getVal('Server'), '/' ) . '/', $url ) && $title->isLocal() ) {
				$output->redirect( $url );
			} else {
				$title = SpecialPage::getTitleFor( 'Badtitle' );
				throw new ErrorPageError( 'badtitle', 'badtitletext' );
			}
		} else if ( ( $action == 'view' ) && !$wgRequest->wasPosted() && 
			(!isset( $this->GET['title'] ) || $title->getPrefixedDBKey() != $this->GET['title'] ) &&
			!count( array_diff( array_keys( $this->GET ), array( 'action', 'title' ) ) ) )
		{
			$targetUrl = $title->getFullURL();
			// Redirect to canonical url, make it a 301 to allow caching
			global $wgUsePathInfo;
			if( $targetUrl == $wgRequest->getFullRequestURL() ) {
				$message = "Redirect loop detected!\n\n" .
					"This means the wiki got confused about what page was " .
					"requested; this sometimes happens when moving a wiki " .
					"to a new server or changing the server configuration.\n\n";

				if( $wgUsePathInfo ) {
					$message .= "The wiki is trying to interpret the page " .
						"title from the URL path portion (PATH_INFO), which " .
						"sometimes fails depending on the web server. Try " .
						"setting \"\$wgUsePathInfo = false;\" in your " .
						"LocalSettings.php, or check that \$wgArticlePath " .
						"is correct.";
				} else {
					$message .= "Your web server was detected as possibly not " .
						"supporting URL path components (PATH_INFO) correctly; " .
						"check your LocalSettings.php for a customized " .
						"\$wgArticlePath setting and/or toggle \$wgUsePathInfo " .
						"to true.";
				}
				wfHttpError( 500, "Internal error", $message );
				return false;
			} else {
				$output->setSquidMaxage( 1200 );
				$output->redirect( $targetUrl, '301');
			}
		} else if ( NS_SPECIAL == $title->getNamespace() ) {
			/* actions that need to be made when we have a special pages */
			SpecialPage::executePath( $title );
		} else {
			/* No match to special cases */
			wfProfileOut( 'MediaWiki::initializeSpecialCases' );
			return false;
		}
		/* Did match a special case */
		wfProfileOut( 'MediaWiki::initializeSpecialCases' );
		return true;
	}

	/**
	 * Create an Article object of the appropriate class for the given page.
	 * @param Title $title
	 * @return Article
	 */
	function articleFromTitle( $title ) {
		$article = null;
		wfRunHooks('ArticleFromTitle', array( &$title, &$article ) );
		if ( $article ) {
			return $article;
		}

		if( NS_MEDIA == $title->getNamespace() ) {
			// FIXME: where should this go?
			$title = Title::makeTitle( NS_IMAGE, $title->getDBkey() );
		}

		switch( $title->getNamespace() ) {
		case NS_IMAGE:
			return new ImagePage( $title );
		case NS_CATEGORY:
			return new CategoryPage( $title );
		default:
			return new Article( $title );
		}
	}

	/**
	 * Initialize the object to be known as $wgArticle for "standard" actions
	 * Create an Article object for the page, following redirects if needed.
	 * @param Title $title
	 * @param Request $request
	 * @param string $action
	 * @return mixed an Article, or a string to redirect to another URL
	 */
	function initializeArticle( $title, $request ) {
		global $wgTitle;
		wfProfileIn( 'MediaWiki::initializeArticle' );

		$action = $this->getVal('Action');
		$article = $this->articleFromTitle( $title );

		// Namespace might change when using redirects
		if( $action == 'view' && !$request->getVal( 'oldid' ) &&
						$request->getVal( 'redirect' ) != 'no' ) {

			$dbr = wfGetDB(DB_SLAVE);
			$article->loadPageData($article->pageDataFromTitle($dbr, $title));

			/* Follow redirects only for... redirects */
			if ($article->mIsRedirect) {
				$target = $article->followRedirect();
				if( is_string( $target ) ) {
					global $wgDisableHardRedirects;
					if( !$wgDisableHardRedirects ) {
						// we'll need to redirect
						return $target;
					}
				}
				if( is_object( $target ) ) {
					/* Rewrite environment to redirected article */
					$rarticle = $this->articleFromTitle($target);
					$rarticle->loadPageData($rarticle->pageDataFromTitle($dbr,$target));
					if ($rarticle->mTitle->mArticleID) {
						$article = $rarticle;
						$wgTitle = $target;
						$article->setRedirectedFrom( $title );
					} else {
						$wgTitle = $title;
					}
				}
			} else {
				$wgTitle = $article->mTitle;
			}
		}
		wfProfileOut( 'MediaWiki::initializeArticle' );
		return $article;
	}

	/**
	 * Cleaning up by doing deferred updates, calling loadbalancer and doing the output
	 */
	function finalCleanup ( &$deferredUpdates, &$loadBalancer, &$output ) {
		wfProfileIn( 'MediaWiki::finalCleanup' );
		$this->doUpdates( $deferredUpdates );
		$this->doJobs();
		$loadBalancer->saveMasterPos();
		# Now commit any transactions, so that unreported errors after output() don't roll back the whole thing
		$loadBalancer->commitAll();
		$output->output();
		wfProfileOut( 'MediaWiki::finalCleanup' );
	}

	/**
	 * Deferred updates aren't really deferred anymore. It's important to report errors to the
	 * user, and that means doing this before OutputPage::output(). Note that for page saves,
	 * the client will wait until the script exits anyway before following the redirect.
	 */
	function doUpdates ( &$updates ) {
		wfProfileIn( 'MediaWiki::doUpdates' );
		$dbw = wfGetDB( DB_MASTER );
		foreach( $updates as $up ) {
			$up->doUpdate();

			# Commit after every update to prevent lock contention
			if ( $dbw->trxLevel() ) {
				$dbw->commit();
			}
		}
		wfProfileOut( 'MediaWiki::doUpdates' );
	}

	/**
	 * Do a job from the job queue
	 */
	function doJobs() {
		global $wgJobRunRate;

		if ( $wgJobRunRate <= 0 || wfReadOnly() ) {
			return;
		}
		if ( $wgJobRunRate < 1 ) {
			$max = mt_getrandmax();
			if ( mt_rand( 0, $max ) > $max * $wgJobRunRate ) {
				return;
			}
			$n = 1;
		} else {
			$n = intval( $wgJobRunRate );
		}

		while ( $n-- && false != ($job = Job::pop())) {
			$output = $job->toString() . "\n";
			$t = -wfTime();
			$success = $job->run();
			$t += wfTime();
			$t = round( $t*1000 );
			if ( !$success ) {
				$output .= "Error: " . $job->getLastError() . ", Time: $t ms\n";
			} else {
				$output .= "Success, Time: $t ms\n";
			}
			wfDebugLog( 'jobqueue', $output );
		}
	}

	/**
	 * Ends this task peacefully
	 */
	function restInPeace ( &$loadBalancer ) {
		wfLogProfilingData();
		$loadBalancer->closeAll();
		wfDebug( "Request ended normally\n" );
	}

	/**
	 * Perform one of the "standard" actions
	 */
	function performAction( &$output, &$article, &$title, &$user, &$request ) {

		wfProfileIn( 'MediaWiki::performAction' );

		$action = $this->getVal('Action');
		if( in_array( $action, $this->getVal('DisabledActions',array()) ) ) {
			/* No such action; this will switch to the default case */
			$action = 'nosuchaction';
		}

		switch( $action ) {
			case 'view':
				$output->setSquidMaxage( $this->getVal( 'SquidMaxage' ) );
				$article->view();
				break;
			case 'watch':
			case 'unwatch':
			case 'delete':
			case 'revert':
			case 'rollback':
			case 'protect':
			case 'unprotect':
			case 'info':
			case 'markpatrolled':
			case 'render':
			case 'deletetrackback':
			case 'purge':
				$article->$action();
				break;
			case 'print':
				$article->view();
				break;
			case 'dublincore':
				if( !$this->getVal( 'EnableDublinCoreRdf' ) ) {
					wfHttpError( 403, 'Forbidden', wfMsg( 'nodublincore' ) );
				} else {
					require_once( 'includes/Metadata.php' );
					wfDublinCoreRdf( $article );
				}
				break;
			case 'creativecommons':
				if( !$this->getVal( 'EnableCreativeCommonsRdf' ) ) {
					wfHttpError( 403, 'Forbidden', wfMsg( 'nocreativecommons' ) );
				} else {
					require_once( 'includes/Metadata.php' );
					wfCreativeCommonsRdf( $article );
				}
				break;
			case 'credits':
				require_once( 'includes/Credits.php' );
				showCreditsPage( $article );
				break;
			case 'submit':
				if( session_id() == '' ) {
					/* Send a cookie so anons get talk message notifications */
					wfSetupSession();
				}
				/* Continue... */
			case 'edit':
				if( wfRunHooks( 'CustomEditor', array( $article, $user ) ) ) {
					$internal = $request->getVal( 'internaledit' );
					$external = $request->getVal( 'externaledit' );
					$section = $request->getVal( 'section' );
					$oldid = $request->getVal( 'oldid' );
					if( !$this->getVal( 'UseExternalEditor' ) || $action=='submit' || $internal ||
					   $section || $oldid || ( !$user->getOption( 'externaleditor' ) && !$external ) ) {
						$editor = new EditPage( $article );
						$editor->submit();
					} elseif( $this->getVal( 'UseExternalEditor' ) && ( $external || $user->getOption( 'externaleditor' ) ) ) {
						$mode = $request->getVal( 'mode' );
						$extedit = new ExternalEdit( $article, $mode );
						$extedit->edit();
					}
				}
				break;
			case 'history':
				global $wgRequest;
				if( $wgRequest->getFullRequestURL() == $title->getInternalURL( 'action=history' ) ) {
					$output->setSquidMaxage( $this->getVal( 'SquidMaxage' ) );
				}
				$history = new PageHistory( $article );
				$history->history();
				break;
			case 'raw':
				$raw = new RawPage( $article );
				$raw->view();
				break;
			default:
				if( wfRunHooks( 'UnknownAction', array( $action, $article ) ) ) {
					$output->showErrorPage( 'nosuchaction', 'nosuchactiontext' );
				}
		}
		wfProfileOut( 'MediaWiki::performAction' );

	}

}; /* End of class MediaWiki */

?>

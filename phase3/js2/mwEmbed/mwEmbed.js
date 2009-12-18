/**
 * ~mwEmbed ~
 * For details see: http://www.mediawiki.org/wiki/MwEmbed
 *
 * All MediaWiki code is released under the GPL2.
 * For more information visit http://metavid.org/wiki/Code
 *
 * @author Michael Dale ( mdale at wikimedia.org )
 * @author and many others, see svn log for details
 *
 * mwEmbed uses the following libraries: 
 *
 * jQuery: 
 * http://jquery.com/ 
 *
 * mw.parseUri:
 * http://stevenlevithan.com/demo/parseuri/js/
 *
 */

/*
* Setup the mw global: 
*/
if ( !window['mw'] ) {
	window['mw'] = { }
}


/**
* Default global config values. Configuration values are set via mw.setConfig
* Configuration values should generally be set prior to dom-ready 
*/  
var mwDefaultConf = {
	// Default skin name
	'skinName' : 'mvpcf',
	
	// Default jquery ui skin name
	'jui_skin' : 'redmond',	
	
	/**
	* If jQuery / mwEmbed should always be loaded.
	*
	* mwEmbedSetup ignores this flag and is run if:  
	*  Script calls mw.addOnloadHook ( callback_function )
	*  Page DOM includes any tags set in config.rewritePlayerTags at onDomReady 
	*
	* This flag increases page performance on pages that do not use mwEmbed 
	* and don't already load jQuery 
	*
	* For example when including the mwEmbed.js in your blog template 
	* mwEmbed will only load extra js on blog posts that include the video tag.
	*
	* NOTE: Future architecture will probably do away with this flag and refactor it into 
	* a smaller "remotePageMwEmbed.js" script similar to ../remoteMwEmbed.js
	*/ 
	'runSetupMwEmbed' : false,
	
	// The mediaWiki path of mvEmbed  
	'mediaWiki_mwEmbedPath' : 'js2/mwEmbed/',
	
	// Api actions that must be submited in a POST, and need an api proxy for cross domain calls
	'apiPostActions': [ 'login', 'purge', 'rollback', 'delete', 'undelete',
		'protect', 'block', 'unblock', 'move', 'edit', 'upload', 'emailuser',
		'import', 'userrights' ],
	
	//If we are in debug mode ( results in fresh debugg javascript includes )
	'debug' : false
};

/**
* The global mw object:
*
* Any global functions/classes that are not jQuery plugins should make
* there way into the mw namespace
*/
( function( mw ) {
	
	// List valid skins here:
	mw.valid_skins = [ 'mvpcf', 'kskin' ];
	
	// The version of mwEmbed
	mw.version = '1.1';
	
	// Special case of commons api url 
	// ( used for default subtitles and related video server for "wikiTitleKey" where no api is provided)
	// NOTE: we need to fix that with a standard "roe" jsonp url source ( instead of a non-standard custom attribute )  
	mw.commons_api_url = 'http://commons.wikimedia.org/w/api.php';
	
	/**
	* Some global containers flags 
	*/	
	mw.skin_list = new Array();
	mw.init_done = false;
	mw.cb_count = 0;		

	/**
	* Configuration System: 
	* 
	* Simple system of inherit defaults, with getter setter functions: 	
	*/	
		
	// Local scope configuration var:
	var mwConfig = { };
	
	//Local scope mwUserConfig var. Stores user configuration 
	var mwUserConfig = { };
	
	for( var i in mwDefaultConf ){
		if( typeof mwConfig[ i ] == 'undefined' )
			mwConfig[ i ] = mwDefaultConf[ i ];
	}
	
	/**
	* Setter for configuration values
	*
	* @param {String} name Name of configuration value
	* @param {String} value Value of configuration name 
	*/
	mw.setConfig = function ( name, value ){
		mwConfig[ name ] = value;
	}	
	
	/**
	* Getter for configuration values
	*
	* @param {String} name of configuration value to get
	* @return {Mixed} value of configuration key
	* 	returns "false" if key not found
	*/
	mw.getConfig = function ( name ){
		if( mwConfig[ name ] )
			return mwConfig[ name ];
		return false;
	}

	/**
	* Loads the mwUserConfig from a cookie.
	* 
	* Modules that want to use "User Config" should call
	* this setup function in their moduleLoader code. 
	*
	* For performance interfaces should load '$j.cookie' & 'JSON' 
	*  in their grouped load request
	*
	* By abstracting user preference we could eventually integrate 
	*  a persistent per-account preference system on the server.
	*
	* @parma {Function} callback Function to be called once userPrefrences are loaded 
	*/
	var setupUserConfigFlag = false;
	mw.setupUserConfig = function( callback ){	
		if( setupUserConfigFlag ){
			if( callback ) 
				callback();
		}
		// Do Setup user config: 		
		mw.load( [ '$j.cookie', 'JSON' ], function(){
			if( $j.cookie( 'mwUserConfig' ) ){
				mwUserConfig = JSON.parse( $j.cookie( 'mwUserConfig' ) );
			}
			mw.log( 'mw: ' +  $j.cookie( 'mwUserConfig' ) );
			for(var i in mwUserConfig ){
				mw.log( 'i: ' + i + ' ' + mwUserConfig[ i ] ) ;
			}
			//debugger;
			
			setupUserConfigFlag = true;
			if( callback ) 
				callback();				
		});				
	}

	/**
	* Save a user configuration var to a cookie & local global variable
	* Loads the cookie plugin if not already loaded
	*
	* @param {String} name Name of user configuration value
	* @param {String} value Value of configuration name 	
	*/
	mw.setUserConfig = function ( name, value, cookieOptions ){
		if( ! setupUserConfigFlag ){ 
			mw.log( "Error: userConfig not setup" );
			return false; 		
		}		
		// Update local value
		mwUserConfig[ name ] = value;
		
		// Update the cookie ( '$j.cookie' & 'JSON' should already be loaded )			
		$j.cookie( 'mwUserConfig', JSON.stringify( mwUserConfig ) );
	}
	
	/**
	* Save a user configuration var to a cookie & local global variable
	* Loads the cookie plugin if not already loaded
	*
	* @param {String} name Name of user configuration value
	* @return 
	*	value of the configuration name
	* 	false if the configuration name could not be found
	*/	
	mw.getUserConfig = function ( name ){
		if( mwUserConfig[ name ] )
			return mwUserConfig[ name ];
		return false;
	}

	/**
	* Language classes mw.lang
	*
	* Localized Language support attempts to mirror some of the functionality of Language.php in MediaWiki
	* It contains methods for loading and transforming msg text
	*
	*/
	mw.lang = { };
	
	/**
	* Setup the lang object
	*/
	var messageCache = { };
	var gRuleSet = { };

	/**
	* mw.addMessages function
	* Loads a set of json messages into the messegeCache object.
	*
	* @param {JSON} msgSet The set of msgs to be loaded
	*/
	mw.addMessages = function( msgSet ) {
		for ( var i in msgSet ) {
			messageCache[ i ] = msgSet[i];
		}
	}

	/**
	* loadRS function
	* Loads a ruleset by given template key ie PLURAL : { //ruleSetObj }
	*
	* @param json ruleSet The ruleset object ( extends  gRuleSet )
	*/
	mw.lang.loadRS = function( ruleSet ) {
		for ( var i in ruleSet ) {
			gRuleSet[ i ] = ruleSet[ i ];
		}
	}

	/**
	 * Returns a transformed msg string
	 *
	 * it take a msg key and array of replacement values of form
	 * $1, $2 and does relevant msgkey transformation returning
	 * the user msg.
	 *
	 * @param {String} key The msg key as set by mw.addMessages
	 * @param {Array} args  An array of replacement strings
	 * @return string
	 */
	mw.getMsg = function( key , args ) {
	
		// Check for missing message key
		if ( ! messageCache[ key ] )
			return '&lt;' + key + '&gt;';

		// swap in the arg values
		var ms =  mw.lang.gMsgSwap( key, args );				
		
		// a quick check to see if we need to send the msg via the 'parser'
		// (we can add more detailed check once we support more wiki syntax)
		if ( ms.indexOf( '{{' ) === -1 && ms.indexOf( '[' ) === -1 ) {
			return ms;
		}
				
		// send the msg key through the parser
		var pObj = mw.parser( ms );
		// return the transformed msg
		return pObj.getHTML();
	}
	
	/**
	* gMsgSwap
	*
	* @param string key The msg key as set by mw.addMessages
	* @param [mixed] args  An array or string to be replaced
	* @return string
	*/
	mw.lang.gMsgSwap = function( key , args ) {
		if ( ! messageCache[ key ] )
			return '&lt;' + key + '&gt;';// Missing key placeholder
		// get the message string:
		var ms = messageCache[ key ];
		
		// replace values
		if ( typeof args == 'object' || typeof args == 'array' ) {
			for ( var v in args ) {
				// Message test replace arguments start at 1 instead of zero:
				var rep = new RegExp( '\\$' + ( parseInt( v ) + 1 ), 'g' );
				ms = ms.replace( rep, args[v] );
			}
		} else if ( typeof args == 'string' || typeof args == 'number' ) {
			ms = ms.replace( /\$1/g, args );
		}
		return ms;
	}

	/**
	* gMsgNoTrans
	*
	* @returns string The msg key without transforming it
	*/
	mw.lang.gMsgNoTrans = function( key ) {
		if ( messageCache[ key ] )
			return messageCache[ key ]

		// Missing key placeholder
		return '&lt;' + key + '&gt;';
	}
	
	/**
	* Add Supported Magic Words to parser
	*/
	// Set the setupflag to false:
	mw.lang.doneSetup = false;
	mw.lang.magicSetup = function() {
		if ( !mw.lang.doneSetup ) {
			mw.addTemplateTransform ( {
				'PLURAL' : mw.lang.procPLURAL
			} )

			mw.lang.doneSetup = true;
		}

	}
	
	/**
	* Process the PLURAL special language template key:
	*/
	mw.lang.procPLURAL = function( tObj ) {
		// setup shortcuts
		// (gRuleSet is loaded from script-loader to contains local ruleset)
		var rs = gRuleSet['PLURAL'];

		/*
		 * Plural matchRuleTest
		 */
		function matchRuleTest( cRule, val ) {
			mw.log("matchRuleTest:: " + typeof cRule + ' ' + cRule + ' == ' + val );
			function checkValue( compare, val ) {
				if ( typeof compare == 'string' ) {
					range = compare.split( '-' );
					if ( range.length >= 1 ) {
						if ( val >= range[0] &&  val <= range[1] )
							return true;
					}
				}
				// else do a direct compare
				if ( compare == val ) {
					return true;
				}
				return false;
			}
			// check for simple cRule type:
			if ( typeof cRule == 'number' ) {
				return ( parseInt( val ) == parseInt( cRule ) );
			} else if ( typeof cRule == 'object' ) {
				var cmatch = { };
				// if a list we need to match all for rule match
				for ( var i in  cRule ) {
					var cr = cRule[i];
					// set cr type
					var crType =  '';
					for ( var j in cr ) {
						if ( j == 'mod' )
							crType = 'mod'
					}
					switch( crType ) {
						case 'mod':
							if ( cr ['is'] ) {
								if ( checkValue( val % cr['mod'], cr ['is'] ) )
									cmatch[i] = true;
							} else if ( cr['not'] ) {
								if ( ! checkValue( val % cr['mod'], cr ['not'] ) )
									cmatch[i] = true;
							}
						break;
					}
				}
				// check all the matches (taking into consideration "or" order)
				for ( var i in cRule ) {
					if ( ! cmatch[i] )
						return false;
				}
				return true;

			}
		}
		/**
		 * Maps a given rule Index to template params:
		 *
		 * if index is out of range return last param
		 * @param {Object} tObj Template Object
		 * @param {Object} ruleInx Index of rule to be applied
		 */
		function getTempParamFromRuleInx( tObj, ruleInx ) {
			// mw.log('getTempParamFromRuleInx: ruleInx: ' + ruleInx + ' tempParamLength ' + tObj.param.length );
			if ( ruleInx	>= tObj.param.length )
				return  tObj.param[  tObj.param.length - 1 ];
			// else return the requested index:
			return tObj.param[ ruleInx ];
		}
		var rCount = 0
		// run the actual rule lookup:
		for ( var ruleInx in rs ) {
			cRule = rs[ruleInx];
			if ( matchRuleTest( cRule, tObj.arg ) ) {
				mw.log("matched rule: " + ruleInx );
				return getTempParamFromRuleInx( tObj, rCount );
			}
			rCount ++;
		}
		mw.log('no match found for: ' + tObj.arg + ' using last/other : ' +  tObj.param [ tObj.param.length -1 ] );
		//debugger;
		// return the last /"other" template param
		return tObj.param [ tObj.param.length - 1 ];
	}

	/**
	 * getRemoteMsg loads remote msg strings
	 *
	 * @param {Mixed} msgSet the set of msg to load remotely
	 * @param function callback  the callback to issue once string is ready
	 */
	mw.getRemoteMsg = function( msgSet, callback ) {
		var ammessages = '';
		if ( typeof msgSet == 'object' ) {
			for ( var i in msgSet ) {
				if( !messageCache[ i ] ){ 
					ammessages += msgSet[i] + '|';
				}
			}
		} else if ( typeof msgSet == 'string' ) {
			if( !messageCache[ i ] ){
				ammessages += msgSet;
			}
		}
		if ( ammessages == '' ) {
			mw.log( 'no remote msgs to get' );
			callback();
			return false;
		}
		var request = {
			'meta': 'allmessages',
			'ammessages': ammessages
		}
		mw.getJSON( request, function( data ) {
			if ( data.query.allmessages ) {
				var msgs = data.query.allmessages;
				for ( var i in msgs ) {
					var ld = { };
					ld[ msgs[i]['name'] ] = msgs[i]['*'];
					mw.addMessages( ld );
				}
			}
			callback();
		} );
	}
	
	/**
	 * Format a size in bytes for output, using an appropriate
	 * unit (B, KB, MB or GB) according to the magnitude in question
	 *
	 * @param size Size to format
	 * @return string Plain text (not HTML)
	 */
	mw.lang.formatSize = function ( size ) {
		// For small sizes no decimal places are necessary
		var round = 0;
		var msg = '';
		if ( size > 1024 ) {
			size = size / 1024;
			if ( size > 1024 ) {
				size = size / 1024;
				// For MB and bigger two decimal places are smarter
				round = 2;
				if ( size > 1024 ) {
					size = size / 1024;
					msg = 'mwe-size-gigabytes';
				} else {
					msg = 'mwe-size-megabytes';
				}
			} else {
				msg = 'mwe-size-kilobytes';
			}
		} else {
			msg = 'mwe-size-bytes';
		}
		// JavaScript does not let you choose the precision when rounding
		var p = Math.pow( 10, round );
		size = Math.round( size * p ) / p;
		return gM( msg , size );
	};
	
	mw.lang.formatNumber = function( num ) {
		/*
		*	addSeparatorsNF
		* @param Str: The number to be formatted, as a string or number.		
		* @param outD: The decimal character for the output, such as ',' for the number 100,2
		* @param sep: The separator character for the output, such as ',' for the number 1,000.2
		*/
		function addSeparatorsNF( nStr, outD, sep ) {
			nStr += '';
			var dpos = nStr.indexOf( '.' );
			var nStrEnd = '';
			if ( dpos != -1 ) {
				nStrEnd = outD + nStr.substring( dpos + 1, nStr.length );
				nStr = nStr.substring( 0, dpos );
			}
			var rgx = /(\d+)(\d{3})/;
			while ( rgx.test( nStr ) ) {
				nStr = nStr.replace( rgx, '$1' + sep + '$2' );
			}
			return nStr + nStrEnd;
		}
		// @@todo read language code and give periods or comas: 
		return addSeparatorsNF( num, '.', ',' );
	}	

	// Create a new parser Object	
	var parseObj = function( wikiText, options ) {
		return this.init( wikiText, options )
	}
	parseObj.prototype = {
		// the wikiText "DOM"... stores the parsed wikiText structure
		// wtDOM : {}, (not yet supported )

		pOut : '', // the parser output string container
		init  :function( wikiText ) {
			this.wikiText = wikiText;
		},
		updateText : function( wikiText ) {
			this.wikiText = wikiText;
			// invalidate the output (will force a re-parse )
			this.pOut = '';
		},
		parse : function() {
			/*
			 * quickly recursive / parse out templates:
			 */

			// ~ probably a better algorithm out there / should mirror php parser flow ~
			//	 (we are already running white-space issues ie php parse strips whitespace differently)
			// or at least expose something similar to: http://www.mediawiki.org/wiki/Extension:Page_Object_Model

			// ... but I am having fun with recursion so here it is...
			function rdpp ( txt , cn ) {
				var node = { };
				// inspect each char
				for ( var a = 0; a < txt.length; a++ ) {
					if ( txt[a] == '{' && txt[a + 1] == '{' ) {
						a = a + 2;
						node['p'] = node;
						if ( !node['c'] )
							node['c'] = new Array();

						node['c'].push( rdpp( txt.substr( a ), true ) );
					} else if ( txt[a] == '}' && txt[a + 1] == '}' ) {
						a = a + 2;
						if ( !node['p'] ) {
							return node;
						}
						node = node['p'];
					}
					if ( !node['t'] )
						node['t'] = '';
					// don't put closures into output:
					if ( txt[a] &&  txt[a] != '}' )
							node['t'] += txt[a];
							
				}
				return node;
			}
			/**
			 * parse template text as template name and named params
			 * @param {String} ts Template String to be parsed 
			 */
			function parseTmplTxt( ts ) {
				var tObj = { };
				// Get template name:
				tname = ts.split( '\|' ).shift() ;
				tname = tname.split( '\{' ).shift() ;
				tname = tname.replace( /^\s+|\s+$/g, "" ); //trim

				// check for arguments:
				if ( tname.split( ':' ).length == 1 ) {
					tObj["name"] = tname;
				} else {
					tObj["name"] = tname.split( ':' ).shift();
					tObj["arg"] = tname.split( ':' ).pop();
				}
									
				var pSet = ts.split( '\|' );
				pSet.splice( 0, 1 );
				if ( pSet.length ) {
					tObj.param = new Array();
					for ( var pInx in pSet ) {
						var tStr = pSet[ pInx ];
						// check for empty param
						if ( tStr == '' ) {
							tObj.param[ pInx ] = '';
							continue;
						}
						for ( var b = 0 ; b < tStr.length ; b++ ) {
							if ( tStr[b] == '=' && b > 0 && b < tStr.length && tStr[b - 1] != '\\' ) {
								// named param
								tObj.param[ tStr.split( '=' ).shift() ] =	tStr.split( '=' ).pop();
							} else {
								// indexed param
								tObj.param[ pInx ] = tStr;
							}
						}
					}
				}		
				return tObj;
			}
			function getMagicTxtFromTempNode( node ) {
				node.tObj = parseTmplTxt ( node.t );
				// do magic swap if template key found in pMagicSet
				if ( node.tObj.name in pMagicSet ) {
					var nt = pMagicSet[ node.tObj.name ]( node.tObj );
					return nt;
				} else {
					// don't swap just return text
					return node.t;
				}
			}
			/**
			 * recurse_magic_swap
			 *
			 * go last child first swap upward: (could probably be integrated above somehow)
			 */
			var pNode = null;
			function recurse_magic_swap( node ) {
				if ( !pNode )
					pNode = node;

				if ( node['c'] ) {
					// swap all the kids:
					for ( var i in node['c'] ) {
						var nt = recurse_magic_swap( node['c'][i] );
						// swap it into current
						if ( node.t ) {
							node.t = node.t.replace( node['c'][i].t, nt );
						}
						// swap into parent
						pNode.t  = pNode.t.replace( node['c'][i].t, nt );
					}
					// do the current node:
					var nt = getMagicTxtFromTempNode( node );
					pNode.t = pNode.t.replace( node.t , nt );
					// run the swap for the outer most node
					return node.t;
				} else {
					// node.t = getMagicFromTempObj( node.t )
					return getMagicTxtFromTempNode( node );
				}
			}
			// parse out the template node structure:
			this.pNode = rdpp ( this.wikiText );
			// strip out the parent from the root	
			this.pNode['p'] = null;
			
			// do the recursive magic swap text:
			this.pOut = recurse_magic_swap( this.pNode );
		},	
				
		/**
		 * parsed template api ~loosely based off of ~POM~
		 * http://www.mediawiki.org/wiki/Extension:Page_Object_Model
		 */
		
		/**
		 * templates
		 * 
		 * Get a requested template from the wikitext (if available)
		 *  
		 */
		templates: function( tname ) {
			this.parse();
			var tmplSet = new Array();
			function getMatchingTmpl( node ) {
				if ( node['c'] ) {
					for ( var i in node['c'] ) {
						getMatchingTmpl( node['c'] );
					}
				}
				if ( tname && node.tObj ) {
					if ( node.tObj['name'] == tname )
						tmplSet.push( node.tObj );
				} else if ( node.tObj ) {
					tmplSet.push( node.tObj );
				}
			}
			getMatchingTmpl( this.pNode );
			return tmplSet;
		},
		
		/**
		* getTemplateVars
		* returns a set of template values in a given wikitext page
		* 
		* NOTE: should be integrated with the parser
		*/
		getTemplateVars: function(){
			//mw.log('matching against: ' + wikiText);
			templateVars = new Array();
			var tempVars = wikiText.match(/\{\{\{([^\}]*)\}\}\}/gi);
															
			// Clean up results:
			for(var i=0; i < tempVars.length; i++){
				//match 
				var tvar = tempVars[i].replace('{{{','').replace('}}}','');
				
				// Strip anything after a |
				if(tvar.indexOf('|') != -1){
					tvar = tvar.substr(0, tvar.indexOf('|'));
				}
				
				// Check for duplicates:
				var do_add=true;
				for(var j=0; j < templateVars.length; j++){
					if( templateVars[j] == tvar)
						do_add=false;
				}
				
				// Add the template vars to the output obj
				if(do_add)
					templateVars.push( tvar );
			}
			return templateVars;
		},
		
		/**
		 * Returns the transformed wikitext
		 * 
		 * Build output from swappable index 
		 * 		(all transforms must be expanded in parse stage and linearly rebuilt)  
		 * Alternatively we could build output using a place-holder & replace system 
		 * 		(this lets us be slightly more sloppy with ordering and indexes, but probably slower)
		 * 
		 * Ideal: we build a 'wiki DOM' 
		 * 		When editing you update the data structure directly
		 * 		Then in output time you just go DOM->html-ish output without re-parsing anything			   
		 */
		getHTML : function() {
			// wikiText updates should invalidate pOut
			if ( this.pOut == '' ) {
				this.parse();
			}
			return this.pOut;
		}
	};		
	
	/**
	* MediaWiki wikitext "Parser" entry point:
	*
	* @param {String} wikiText the wikitext to be parsed
	* @return {Object} parserObj returns a parser object that has methods for getting at
	* things you would want
	*/
	mw.parser = function( wikiText, options){
		// return the parserObj
		return new parseObj( wikiText, options ) ;	
	}
	
	var pMagicSet = { };	
	/**
	 * addTemplateTransform to the parser 
	 *
	 * Lets you add a set template key to be transformed by a callback function
	 *
	 * @param {Object} magicSet key:callback
	 */
	mw.addTemplateTransform = function( magicSet ) {
		for ( var i in magicSet )
			pMagicSet[ i ] = magicSet[i];
	}
	
	/**
	* Add a hook system for a target object / interface	
	*
	* This can be used as an alternative to heavy inheritance systems.
	*
	* @param {Object} targetObj Interface Object to add hook system to.   
	*/
	mw.addHookSystem = function( targetObj ){		
		// Setup the target object hook holder:
		targetObj[ 'hooks' ] = { };
		 
		/**
		* Adds a hook to the target object
		* 
		* Should be called by clients to setup named hooks
		*
		* @param {String} hookName Name of hook to be added
		* @param {Function} hookFunction Function to be called at hook time
		*/
		targetObj.addHook = function( hookName, hookFunction ){
			if( ! this.hooks[ hookName ] )
				this.hooks[ hookName ] = [ ];
			this.hooks[ hookName ].push( hookFunction )
		}
		
		/**
		* Runs all the hooks by a given name with refrence to the host object
		*
		* Should be called by the host object at named execution points 
		* 
		* @param {String} hookName Name of hook to be called
		* @return Value of hook result 
		* 	true interface should continue function execution
		*	false interface should stop or return from method
		*/
		targetObj.runHook = function( hookName ){		
			var cat = targetObj;
			var catHook = targetObj.hooks[ hookName ]; 	
			var dog = this;			
			var dogHOok = this.hooks[ hookName ];
					
			if( this.hooks[ hookName ] ){
				for( var i in this.hooks[ hookName ]){
					if( typeof( this.hooks[ hookName ][ i ] ) == 'function'){
						return this.hooks[ hookName ][ i ]( this );
					}
				}
			}
		}
	} 
	
	
	
	/**
	* The loader prototype:
	*/
	mw.loader = {
		/*
		* Javascript Module Loader functions 
		* @key Name of Module
		* @value function code to load module 
		*/
		moduleLoaders : { },
		
		/**
		* Javascript Class Paths
		* @key Name of class
		* @value Class file path 
		*/
		classPaths : { }, 	
		
		/**
		* Style sheet paths for associated classes
		* @key Name of the class
		* @value Style sheet path
		*/	
		stylePaths : { },						
		
		/**
		* Core load function: 
		* 
		* @param {Mixed} loadRequest:
		* 
		* 	{String} Name of a module to be loaded
		* 		Modules are added via addModuleLoader and can define custom
		* 		code needed to load the module dependencies
		*		Module loader function should accept a callback argument
		*
		*	{String} Name of a class to loaded. 
		* 		Classes are added via addClassFilePaths function
		*		Using defined class names avoids loading the same class
		*		twice by first checking if the "class variable" is defined
		*	
		*	{String} Absolute or relative to mwEmbed file path. 
		*		The same file won't be loaded twice
		*
		*	{Array} can be an array of any combination of the above strings.
		*		Will be loaded in-order or in a single 
		*		script-loader request if scriptLoader is enabled 
		*
		* 	{Array} {Array} Can be a set of Arrays for loading.		 
		*		Some browsers execute included scripts out of order. 
		* 		This lets you chain sets of request for those browsers.
		*		If using the server side script-loader order is preserved 
		* 			in output and a single request will be used.
		*
		* @param {Function} callback Function called once loading is complete
		*/				
		load: function( loadRequest, callback ){
			// Check for empty loadRequest ( directly return the callback ) 
			if( mw.isEmpty( loadRequest ) ){
				mw.log( 'Empty load request: ' + loadRequest);
				callback( loadRequest );
				return ;
			}
			
			// Check if its a multi-part request: 
			if( typeof loadRequest == 'object' ){
			 	if( loadRequest.length > 1 ){			 							
					this.loadMany ( loadRequest,  callback );
					return ;
				}else{
					// If an array of length 1 set as first element 
					loadRequest = loadRequest[0];
				}				
			}   
			
			// Check for the module name loader function 
			if( this.moduleLoaders[ loadRequest ] && 
				typeof ( this.moduleLoaders[ loadRequest ] ) == 'function' 
			){
				mw.log("mw.load: loadModule:" + loadRequest );
				//Run the module with the parent callback 
				this.moduleLoaders[ loadRequest ]( callback );	
				return ;
			}
			
			// Check for javascript class 
			if( this.classPaths[ loadRequest ] ){		
				mw.log('mw.load: loadClass: ' + loadRequest );
				this.loadClass( loadRequest, callback );																	
				return ;
			}
			
			// Try loading as a "file"
			if( loadRequest ) { 
				mw.getScript( loadRequest, callback );
				return ;
			}
			
			//possible error? 
			mw.log( "Error could not handle load request: " + loadRequest  );			
		},
		
		
		/**
		* Load a set of scripts.
		* Will issue many load requests or package the request for the script-loader
		*
		* @param {Object} loadSet Set of scripts to be loaded
		* @param {Function} callback Function to call once all scripts are loaded.
		*/ 
		loadMany: function( loadSet, callback ) {				
			
			// Setup up the local "loadStates"			
			var loadStates = { };
					
			// Check if we can load via the "script-loader" ( mwEmbed was included via scriptLoader ) 
			if( mw.getScriptLoaderPath() ){				
				loadStates = this.getGroupLoadState( loadSet );
			}else{									
				// Check if its a dependency set ( nested objects ) 
				if( typeof loadSet [ 0 ] == 'object' ){				
					//Load sets of classes ( to preserver order for some browsers )
					this.loadDependencyChain( loadSet, callback );
					return ;
				}
				
				// Set the initial load state for every item in the loadSet
				for( var i in loadSet ){							
					var loadName = loadSet[ i ];				
					loadStates[ loadName ] = 0;					
				}		
			}	
			// We are infact loading many:
			mw.log("mw.load: LoadMany:: 	" + loadSet );
						
			// Issue the load request check check loadStates to see if we are "done"
			for( var loadName in loadStates ){				
				//mw.log("loadMany: load: " + loadName ); 					
				this.load( loadName, function ( loadName ){										
					loadStates[ loadName ] = 1;
					//mw.log( loadName + ' finished of: ' + JSON.stringify( loadStates ) );
					//Check if all load request states are set 1					
					var loadDone = true;
					for( var j in loadStates ){
						if( loadStates[ j ] === 0 )
							loadDone = false;			
					}					
					// Run the parent scope callback for "loadMany" 
					if( loadDone ){						
						callback( loadName );
					}
				} );
			}
		},
						
		/**
		* Get grouped load state for script loader.
		* Groups the loadSet into a single sequential array
		* 
		* Groups the scriptRequest where possible: 
		* 	Modules include "loader code" so they are seperated
		* 	into pre-condition code to be run for subsequent requests
		*
		* @param {Object} loadSet Loadset to return grouped
		* @return {Object}
		*	grouped loadSet
		*/
		getGroupLoadState: function( loadSet ){
			var groupedLoadSet = [];			
			var loadStates = { };			
			// Merge load set into new groupedLoadSet
			if( typeof loadSet[0] == 'object' ){
				for( var i in loadSet ){
					for( var j in loadSet[i] ){
						groupedLoadSet.push( loadSet[i][j] ); 
					}
				}
			}else{
				// Use the loadSet directly: 
				groupedLoadSet = loadSet;
			}
			
			// Setup grouped loadStates Set:
			var groupClassKey = ''; 
			var coma = '';			
			for( var i=0; i < groupedLoadSet.length; i++ ) {										
				var loadName = groupedLoadSet[ i ];	
				if( this.classPaths[ loadName ] ) {
					groupClassKey += coma + loadName
					coma = ',';
				}else if( moduleLoaders[ loadName ] ) {
					// Module loaders break up grouped script requests ( add the current groupClassKey )
					if( groupClassKey != '' ){
						loadStates[ groupClassKey ] = 0;
						groupClassKey = coma = '';
					}
					// Add the module to the loadSate
					loadStates[ loadName ] = 0;
				}					
			}				
			
			// Add groupClassKey if set: 
			if( groupClassKey != '' ){
				loadStates [ groupClassKey ] = 0;
			}
			
			return loadStates;
		},
		
				
		/**
		* Load a sets of scripts satisfy dependency order for browsers that execute out of order
		* 
		* @param {Object} loadChain A set of javascript arrays to be loaded. 
		*	Sets are requested in array order. 		   
		*/ 
		loadDependencyChain: function( loadChain, callback ){
			var _this = this;							
			// Load with dependency checks
			this.load( loadChain.shift(), function() {									
				if ( loadChain.length != 0 ) {
					_this.loadDependencyChain( loadChain, callback );
				} else {
					callback();
				}
			} );
		},
		
		
		/**
		* Loads javascript associated with a className
		*
		* @param {String} className Name of class to load
		* @param {Function} callback Function to run once class is loaded 
		*/
		loadClass: function( className , callback){		
			var _this = this;			
			// Make sure the class is not already defined:
			if ( mw.isset( className ) ){
				mw.log( 'Class ( ' + className + ' ) already defined ' );
				callback( className );
				return ; 									
			}
			
			// Setup the Script Request var: 
			var scriptRequest = null;
			
			// If the scriptloader is enabled use the className as the scriptRequest: 
			if( mw.getScriptLoaderPath() ){
				scriptRequest =  className;
			}else{
				// Get the class url:
				var baseClassPath = this.classPaths[ className ];													
				// Add the mwEmbed path if not a root path or a full url
				if( baseClassPath.indexOf( '/' ) !== 0 && 
					baseClassPath.indexOf('://') === -1 ){
					scriptRequest = mw.getMwEmbedPath() + baseClassPath;
				}else{
					scriptRequest = baseClassPath;
				}				
				if( ! scriptRequest ){
					mw.log( "Could not get url for class " + className  );						
					return ;
				}	
			}			
								
			// Check for any associated style sheets that should be loaded 
			if( typeof this.stylePaths[ className ] != 'undefined' ){
				mw.getStyleSheet( mw.getMwEmbedPath() + this.stylePaths[ className ] );
			}
			
			// Include class defined check for older browsers
			var classDone = false;
				
			
			// Issue the request to load the class (include class name in result callback:					
			mw.getScript( scriptRequest, function( scriptRequest ) {
				mw.log(" on : " + scriptRequest );
				if(! mw.isset( className )){
					mw.log( ' Error: ' + className +' not set in time, or not defined in:' + "\n" +  _this.classPaths[ className ] );
				}else{
					if( callback )
						callback( className );
					callback = null;
				}
			} );	
			//mw.log( 'done with running 	getScript request ' );
			
			// Check if the class is ready: ( not all browsers support onLoad script attribute )
			// In the case of a "class" we can pull the javascript state until its ready
			setTimeout( function(){
				mw.waitForObject( className, function( className ){								
					if( callback ){
						mw.log( " waitForObject callback for: " + className );
						callback( className );
						callback = null;
					}
				} );
			}, 25 ); 
		},				
		
		/**
		* Adds a module to the mwLoader object 
		*
		* @param {String} name Name of module
		* @param {Function} moduleLoader Function that
		*	loads dependencies for a module
		*/
		addModuleLoader: function( name, moduleLoader ){		
			this.moduleLoaders [ name ] = moduleLoader;
		},
		
		/**
		* Adds class file path key value pairs
		*
		* @param {Object} classSet JSON formated list of 
		*  class name file path pairs.
		*
		*  classSet must be strict JSON to allow the 
		*  php scriptLoader to parse the file paths.  
	 	*/
	 	addClassFilePaths: function( classSet ){
	 		for( var i in classSet ){
				this.classPaths[ i ] = classSet[ i ];
			}
	 	},
	 	
		/**
	 	* Add a style sheet to be loaded the same time as the requested class
	 	*
		* NOTE: In general style sheets should be loaded via a module loader function. 
		*  In some cases a single class has a single sheet dependency which can be set-up using this function
		* 
		* @param {Object} sheetSet ClassKey : sheet location key value paris
	 	*/
	 	addClassStyleSheets: function( sheetSet ){
	 		for(var i in sheetSet ){
	 			this.stylePaths[ i ] = sheetSet[ i ];
	 		}
	 	}
	}
	
	/**
	* Shortcut entry points / convenience functions: 
	*
	* Lets you write mw.load() instead of mw.loader.load()
	*/
	
	/**
	* Load Object entry point: Loads a requested set of javascript 
	*/	
	mw.load = function( loadRequest, callback ){
		return mw.loader.load( loadRequest, callback );
	}
	
	/**
	* Add module entry point: Adds a module to the mwLoader object 
	*/
	mw.addModuleLoader = function ( name, loaderFunction ){
		return mw.loader.addModuleLoader( name, loaderFunction );		
	}
	
	/**
	* Add Class File Paths entry point:  
	*/
	mw.addClassFilePaths = function ( classSet )	{	
		return mw.loader.addClassFilePaths( classSet );
	}
			
	/**
	* Add Class Style Sheet entry point:  	 
	*/
	mw.addClassStyleSheets = function( sheetSet ){
		return mw.loader.addClassStyleSheets( sheetSet );
	}
	
	
	/**
	* API Helper functions
	*/
	
	/*
	* Get mediaWiki JSON a wrapper for jQuery getJSON:
	* $j.getJSON( url, [data], [callback] )
	* 
	* The mediaWiki version lets you skip the url part 
	* mw.getJSON( [url], data, callback ); 
	* 
	* Lets you assume a few options:
	* 	url is optional 
	* 		( If the first argument is not a string we assume a local mediaWiki api request )
	*   callback parameter is not needed we setup the callback automatically
	* 	url param 'action'=>'query' is assumed ( if not set to something else in the "data" param
	* 	format is set to "json" automatically
	* 	automatically issues request over "POST" if action={postActions}
	*
	* @param {Mixed} url or data request
	* @param {Mixed} data or callback
	* @param {Mixed} callbcak
	*
	*/	
	mw.getJSON = function( arg1, arg2, arg3 ){
		
		// Set up the url		
		var url = false;
		url = ( typeof arg1 == 'string' ) ? arg1 : mw.getLocalApiUrl();		
		
		// Set up the data: 
		var data = { };
		data = ( typeof arg1 == 'object' ) ? arg1 : { };
		data = ( typeof arg2 == 'object' ) ? arg2 : { }; 
		
		// Setup the callback
		var callback = false;
		callbcak = ( typeof arg2 == 'function') ? arg2 : false;
		callback = ( typeof arg3 == 'function') ? arg3 : false;		
				
		// Make sure we got a url:
		if( !url ){ 
			mw.log( 'Error: no api url for api request' );
			return false;
		}		
		
		// Add default action if unset:
		if( !data['action'] )
			data['action'] = 'query';
		
		// Add default format if not set:
		if( !data['format'] ) 
			data['format'] = 'json';
		
		mw.log("run getJSON: " + url + ' data: ' +  data['action'] + ' apiPost: ' +mw.getConfig( 'apiPostActions' ) );
		
		if( $j.inArray( data['action'],  mw.getConfig( 'apiPostActions' ) ) != -1 ){
			if( ! mw.isLocalDomain( url ) ){
				mw.log( "Error:: should setup proxy here" );
			}
			$j.post( url, data, callback, 'json');
		}else{
			//If cross domain setup a callback: 
			if( ! mw.isLocalDomain( url ) ){				 
				if( url.indexOf( 'callback=' ) == -1 || data[ 'callback' ] == -1 ){
					// jQuery specific: ( second ? is replaced with the callback ) 
					url += ( url.indexOf('?') == -1 ) ? '?callback=?' : '&callback=?';
				}				 
			}
			// Pass off the jQuery getJSON request:
			$j.getJSON( url, data, callback );
		}		
	}		
	
	/**
	* Metavid specific roe request helper function
	* 
	* NOTE: depreciated, will be removed once updates are pushed out to metavid.org 
	*  
	* @param roe_url to be updated 
	*/
	mw.getMvJsonUrl = function( roe_url , callback){		
		if ( mw.isLocalDomain( roe_url ) ){
			$j.get( roe_url, callback );	 
		} else {			
			roe_url = mw.replaceUrlParams(roe_url, {
					'feed_format':'json_roe',
					'cb':'?',
					'cb_inx': '1'
			})
			$j.getJSON( roe_url, callback );
		}
	}
	
	/**
	* Checks if the url is a request for the local domain
	*  relative paths are "local" domain
	* @param {String} url Url for local domain
	*/
	mw.isLocalDomain = function( url ) {
		if( mw.parseUri( document.URL ).host == mw.parseUri( url ).host ||
			url.indexOf( '://' ) == -1 ){
			return true;
		}
		return false;
	}
	
	/**
	 * Simple api helper to grab an edit token
	 *
	 * @param title The wiki page title you want to edit
	 * @param {String} [api_url] The target API URL
	 * @param {callback} callback Function to pass the token to
	 */
	mw.getToken = function( title, api_url, callback ) {
		if( typeof api_url == 'function' )
			callback = api_url;	
		if( typeof title == 'function')
			callback = title;
		
		mw.log( 'mw:getToken' );
		
		// If no title is provided get a token for the user page: 
		if ( typeof title != 'string' && wgUserName ) {
			title = 'User:' + wgUserName;
		}		
		
		var request = {			
			'prop': 'info',
			'intoken': 'edit',
			'titles': title
		};		
		mw.getJSON( api_url, request, function( data ) {
			for ( var i in data.query.pages ) {
				if ( data.query.pages[i]['edittoken'] ) {
					if ( typeof callback == 'function' )
						callback ( data.query.pages[i]['edittoken'] );
				}
			}
			// No token found:
			return false;
		} );
	}
	
	
	/**
	* Utility Functions
	*/		
	
	/**
	* Similar to php isset function checks if the variable exists.
	* Does a safe check of a descendent method or variable
	*
	* @param {String} objectPath
	* @return {Boolean}
	* 	true if objectPath exists
	*	false if objectPath is undefined
	*/	
	mw.isset = function( objectPath ) {
		if ( !objectPath )
			return false;
		var pathSet = objectPath.split( '.' );
		var cur_path = '';
		for ( var p = 0; p < pathSet.length; p++ ) {
			cur_path = ( cur_path == '' ) ? cur_path + pathSet[p] : cur_path + '.' + pathSet[p];
			eval( 'var ptest = typeof ( ' + cur_path + ' ); ' );
			if ( ptest == 'undefined' ) {				
				return false;
			}
		}
		return true;
	}
	
	/**
	* Waits for a object to be defined and the calls callback
	*
	* @param {Object} objectName Name of object to be defined
	* @param {Function} callback Function to call once object is defined
	* @param {Null} callNumber Used internally to keep track of 
	*	number of times waitForObject has been called 
	*/
	var waitTime = 1200; // About 30 seconds 
	mw.waitForObject = function( objectName, callback, _callNumber){
		//mw.log( 'waitForObject: ' + objectName  + ' cn: ' + _callNumber);
				
		// Increment callNumber: 
		if( !_callNumber ){ 
			_callNumber = 1;
		} else {
			_callNumber++;
		}
		
		if( _callNumber > waitTime ){
			mw.log( "Error: waiting for object: " + objectName + ' timeout ' );
			callback( false ); 
			return ;
		}
		
		if ( mw.isset( objectName ) ){			
			callback( objectName )
		}else{
			setTimeout( function( ){
				mw.waitForObject( objectName, callback, _callNumber);
			}, 25);
		}
	}
	
	/**
	* Check if an object is empty or if its an empty string. 
	*
	* @param {Object} object Object to be checked
	*/ 
	mw.isEmpty = function( object ) {		
		if( typeof object == 'string' ){ 
			if( object == '' ) return true;
			// Non empty string: 
			return false;
		}
		// If an array check length:
		if( Object.prototype.toString.call( object ) === "[object Array]"
			&& object.length == 0 ){
			return true;
		}
		// Else check as an object: 
		for( var i in object ){ return false; }
		return true;
	}
	
	/**
	* Log a string msg to the console
	* 
	* all mw.log statements will be removed on minification so
	* lots of mw.log calls will not impact performance in non debug mode
	*
	* @param {String} string String to output to console
	*/
	mw.log = function( string ) {
		// Add any prepend debug strings if necessary 
		
		if ( mw.getConfig( 'pre-append-log' ) )
			string = mw.getConfig( 'pre-append-log' ) + string;
				
		if ( window.console ) {
			window.console.log( string );
		} else {	
			/**
			 * Old IE and non-Firebug debug: ( commented out for now ) 
			 */
			
			/*
			var log_elm = document.getElementById('mv_js_log');
			if(!log_elm){
				document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML +
					'<div style="position:absolute;z-index:500;bottom:0px;left:0px;right:0px;height:200px;">'+
					'<textarea id="mv_js_log" cols="120" rows="12"></textarea>'+
					'</div>';
	
				var log_elm = document.getElementById('mv_js_log');
			}
			if(log_elm){
				log_elm.value+=string+"\n";
			}
			*/
		}
	}
	
	/**
	* Get a loading spinner html
	* NOTE: remove this 
	
	* @param {String} [Optional] style Style string to apply to the spinner 
	*/
	mw.loading_spinner = function( style ) {
		var style_txt = ( style ) ? style : '';
		return '<div class="loading_spinner" style="' + style_txt + '"></div>';
	}
	
	
	//Setup the local mwOnLoadFuncitons array: 
	var mwOnLoadFuncitons = new Array();
	
	//mw Ready flag ( set once mwEmbed is ready ) 
	var mwReadyFlag = false;
	
	/**
	* Enables load hooks to run once DOM is "ready" 
	* Will ensure jQuery is available, is in the $j namespace 
	* and mw interfaces and configuration has been loaded and applied
	* 
	* this is different from jQuery(document).ready() 
	* ( jQuery ready is not friendly with dynamic includes and core interface asynchronous build out.) 
	*
	* @param {Function} callback Function to run once DOM and jQuery are ready
	*/
	mw.addOnloadHook = function( callback ){		
		mw.log('addOnloadHook:: ' );		
		if( mwReadyFlag === false ){
		
			// Add the callbcak to the onLoad function stack
			mwOnLoadFuncitons.push ( callback );
						
			// Set the mwSetup flag. So that onLoad functions can 
			// be called once mwEmbed interfaces are setup.
			if( !mwDomReadyFlag ){ 
				mw.log( 'set config flag' );
				mw.setConfig( 'runSetupMwEmbed', true );
			}else{
				mw.log( 'run setup directly' );
				//DOM is already ready run setup directly:
				mw.setupMwEmbed(); 
			} 			
			
			return ;
		}
		// If mwReadyFlag is already "ready" call the callback directly:
		callback();		
	}	
	
	/**
	* Runs all the queued functions
	*/ 
	mw.runLoadHooks = function ( ){		
		// Run all the queued functions: 
		while( mwOnLoadFuncitons.length )
			mwOnLoadFuncitons.pop()();
		
		// Sets mwReadyFlag to true so that future addOnLoadHook calls 
		//  know to call the callback directly
		mwReadyFlag = true;
	}
	
	/**
	* Wrapper for jQuery getScript, 
	* Uses the scriptLoader if enabled
	* 
	* If jQuery is not ready load it.
	*
	* @param {String} scriptRequest The requested path or classNames for the scriptLoader
	* @param {Function} callback Function to call once script is loaded   
	*/
	mw.getScript = function( scriptRequest, callback ){
	
		// Set the base url based scriptLoader availability & type of scriptRequest
		// ( presently script loader only handles "classes" not relative urls: 
		var slpath = mw.getScriptLoaderPath();
		if( slpath && scriptRequest.indexOf('://') == -1 && scriptRequest.indexOf('/') !== 0 ) {
			url = slpath + '?class=' + scriptRequest;
		}else{
			url = scriptRequest;
		}
	
		// Add on the request parameters to the url:
		url += ( url.indexOf( '?' ) === -1 )? '?' : '&';				
		url += mw.getUrlParam();		
				
		
		// If jQuery is available and debug is off get the scirpt j 
		if( mw.isset( 'window.jQuery' ) && mw.getConfig( 'debug' ) === false ) {
			$j.getScript( url, function(){
				if( callback )
					callback( scriptRequest );
			}); 
			return ;
		}
		mw.log( 'mw.getScript: ' + url );		
		/**
		* No jQuery 
		*  OR 
		* In debug mode inject the script instead of doing an ajax request and eval
		*/			
		// Load and bind manually:  ( copied from jQuery ajax function )
		var head = document.getElementsByTagName("head")[0];
		var script = document.createElement("script");
		script.setAttribute( 'src', url );		
				
		// Attach handlers for all browsers ( might not work in safari < version 2.0 ) 		
		script.onload = script.onreadystatechange = function(){			
			if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {				
				if( callback )
					callback( scriptRequest );				
			}
		};		
		// Append the script to the DOM:
		head.appendChild( script );			
	}
	
	/**
	* "Get" a style sheet.
	*
	* Appends a style sheet to the DOM is called "getStyleSheet" to mirror wraping of jqueries getScript
	*
	* @param {Mixed}
	*	{Array} url List of urls to be loaded
	*	{String} url Url of the style sheet to be loaded
	*/
	mw.getStyleSheet = function( url ) {
		
		if ( typeof url == 'object' ) {
			for ( var i in url ) {
				mw.getStyleSheet( url[i] );
			}
			return ;
		}
		
		// Add URL params ( if not already included )
		if ( url.indexOf( '?' ) == -1 ) {
			url += '?' + mw.getUrlParam();
		}
		
		// Check if style sheet is already included:
		var foundSheet = false; 
		$j( 'link' ).each( function(){		
			if( $j( this) .attr( 'href' ) == url )				 
				foundSheet = true;
		} );					
		if( foundSheet ){
			mw.log( 'sheet: ' + url + ' already included ' );
			return ;
		}
		
		mw.log( ' add css: ' + url );		
		$j( 'head' ).append( 
			$j('<link>').attr( {
				'rel' : 'stylesheet',
				'type' : 'text/css',
				'href' : url
			} )
		);			
	}
	
	/** 
	* Get Api URL from mediaWiki page defined variables
	* @return {Mixed}
	* 	api url
	* 	false
	*/
	mw.getLocalApiUrl = function() {
		if ( typeof wgServer != 'undefined' && typeof wgScriptPath  != 'undefined' ) {
			return wgServer + wgScriptPath + '/api.php';
		}
		return false;
	}	
	
	// Local mwEmbedPath variable ( for cache of mw.getMwEmbedPath )
	var mwEmbedPath = null;
				
	/**
	* Gets the path to the mwEmbed folder
	*/
	mw.getMwEmbedPath = function() {
		if ( mwEmbedPath )
			return mwEmbedPath;	
			
		// Get mwEmbed src:
		var src = mw.getMwEmbedSrc();		
		var mwpath = null;
		
		// Check for direct include of the mwEmbed.js
		if ( src.indexOf( 'mwEmbed.js' ) !== -1 ) {
			mwpath =  src.substr( 0, src.indexOf( 'mwEmbed.js' ) );			
		}
		
		// Check for scriptLoader include of mwEmbed: 
		if ( src.indexOf( 'mwScriptLoader.php' ) !== -1 ) {
			// Script loader is in the root of MediaWiki, Include the default mwEmbed extension path:
			mwpath =  src.substr( 0, src.indexOf( 'mwScriptLoader.php' ) ) + mw.getConfig( 'mediaWiki_mwEmbedPath' );						
		}
		
		// Script-loader has jsScriptLoader name when local:
		if( src.indexOf( 'jsScriptLoader.php' ) !== -1 ){
			mwpath = src.substr( 0, src.indexOf( 'jsScriptLoader.php' ) );			
		}	
		
		// Error out if we could not get the path:
		if( ! mwpath ){
			mw.log( "Error could not get mwEmbed path " );
			return ;
		}		
		// Update the cached var with the absolute path: 
		mwEmbedPath = mw.absoluteUrl( mwpath )	;			
		return mwEmbedPath;
	}
	
	/**
	* Get Script loader path 
	*
	* @returns {String}|{Boolean}
	* 	Url of the scriptLodaer
	*	false if the scriptLoader is not used
	*/
	mw.getScriptLoaderPath = function(){		
		var src = mw.getMwEmbedSrc();
		if ( src.indexOf( 'mwScriptLoader.php' ) !== -1  ||
			src.indexOf( 'jsScriptLoader.php' ) !== -1 )
		{
			// Return just the script part:
			return src.split('?')[0];						
		}
		return false;
	}

	/**
	 * Given a float number of seconds, returns npt format response.
	 *
	 * @param {Float} sec Seconds
	 * @param {Boolean} show_ms If milliseconds should be displayed.
	 * @return String npt format  
	 * @type {Float} 
	 */
	mw.seconds2npt = function( sec, show_ms ) {
		if ( isNaN( sec ) ) {
			// mw.log("warning: trying to get npt time on NaN:" + sec);
			return '0:0:0';
		}
		var hours = Math.floor( sec / 3600 );
		var minutes = Math.floor( ( sec / 60 ) % 60 );
		var seconds = sec % 60;
		// Round the number of seconds to the required number of significant digits
		if ( show_ms ) {
			seconds = Math.round( seconds * 1000 ) / 1000;
		} else {
			seconds = Math.round( seconds );
		}
		if ( seconds < 10 )
			seconds = '0' +	seconds;
		if ( minutes < 10 )
			minutes = '0' + minutes;
	
		return hours + ":" + minutes + ":" + seconds;
	}
	
	/**
	* Take hh:mm:ss,ms or hh:mm:ss.ms input, return the number of seconds
	*
	* @param {String} npt_str NPT time string
	* @return Number of seconds 
	* @type {Float} 
	*/
	mw.npt2seconds = function ( npt_str ) {
		if ( !npt_str ) {
			// mw.log('npt2seconds:not valid ntp:'+ntp);
			return false;
		}
		// Strip {npt:}01:02:20 or 32{s} from time  if present
		npt_str = npt_str.replace( /npt:|s/g, '' );
	
		var hour = 0;
		var min = 0;
		var sec = 0;
	
		times = npt_str.split( ':' );
		if ( times.length == 3 ) {
			sec = times[2];
			min = times[1];
			hour = times[0];
		} else if ( times.length == 2 ) {
			sec = times[1];
			min = times[0];
		} else {
			sec = times[0];
		}
		// Sometimes a comma is used instead of period for ms
		sec = sec.replace( /,\s?/, '.' );
		// Return seconds float
		return parseInt( hour * 3600 ) + parseInt( min * 60 ) + parseFloat( sec );
	}
	
	
	
	// Local mwEmbedSrc variable ( for cache of mw.getMwEmbedSrc )
	var mwEmbedSrc = null; 
	
	/**
	* Gets the mwEmbed script src attribute
	*/
	mw.getMwEmbedSrc = function() {
		if ( mwEmbedSrc )
			return mwEmbedSrc;
			
		// Get all the javascript includes:
		var js_elements = document.getElementsByTagName( "script" );
		for ( var i = 0; i < js_elements.length; i++ ) {
			// Check for mwEmbed.js and/or script loader
			var src = js_elements[i].getAttribute( "src" );
			if ( src ) {
				if ( 
					( src.indexOf( 'mwEmbed.js' ) !== -1 &&  src.indexOf( 'MediaWiki:Gadget') == -1 )
				 	|| 
				 	( 
				 		( src.indexOf( 'mwScriptLoader.php' ) !== -1 || src.indexOf( 'jsScriptLoader.php' ) !== -1 )
						&& 
						src.indexOf( 'mwEmbed' ) !== -1 
					) 
				){
					mwEmbedSrc = src;
					return mwEmbedSrc;
				}
			}
		}
		mw.log( 'Error: getMwEmbedScriptURL failed to get script path' );
		return false;
	}	
	
	// Local mwUrlParam variable ( for cache of mw.getUrlParam )
	var mwUrlParam = null;
	
	/**
	* Get URL Parameters per parameters in the host script include
	*/
	mw.getUrlParam = function() {
		if ( mwUrlParam )
			return mwUrlParam;
			
		var mwEmbedSrc = mw.getMwEmbedSrc();		
		var req_param = '';
		
		// If we already have a URI, add it to the param request:
		var urid = mw.parseUri( mwEmbedSrc ).queryKey['urid']
		
		// If we're in debug mode, get a fresh unique request key and pass on "debug" param
		if ( mw.parseUri( mwEmbedSrc ).queryKey['debug'] == 'true' ) {		
			mw.setConfig( 'debug', true );
			var d = new Date();
			req_param += 'urid=' + d.getTime() + '&debug=true';			
					
		} else if ( urid ) { // Just pass on the existing urid:			
					
			req_param += 'urid=' + urid;			
		} else {
			// Otherwise, Use the mwEmbed version
			req_param += 'urid=' + mw.version;
		}
		
		// Add the language param if present:
		var langKey = mw.parseUri( mwEmbedSrc ).queryKey['uselang'];
		if ( langKey )
			req_param += '&uselang=' + langKey;
		
		// Update the local cache and return the value	
		mwUrlParam = req_param;			
		return mwUrlParam;
	}
	
	/** 
	* Replace url parameters via newParams key value pairs
	* 
	* @param {String} url Source url to be updated
	* @param {Object} newParams key, value paris to swap in
	* @return {String}
	*	the updated url
	*/  
	mw.replaceUrlParams = function( url, newParams ) {
		var parsedUrl = mw.parseUri( url );
				
		
		if ( parsedUrl.protocol != '' ) {
			var new_url = parsedUrl.protocol + '://' + parsedUrl.authority + parsedUrl.path + '?';
		} else {
			var new_url = parsedUrl.path + '?';
		}
				
		// Merge new params: 
		for( var key in newParams ){
			parsedUrl.queryKey[ key ] = newParams[ key ];  
		}
				
		// Output to new_url
		var amp = '';
		for ( var key in  parsedUrl.queryKey ) {
			var val = parsedUrl.queryKey[ key ];		
			new_url += amp + key + '=' + val;
			amp = '&';
		}
		return new_url;
	}
	
	/**
	* parseUri 1.2.2
	* (c) Steven Levithan <stevenlevithan.com>
	*  MIT License
	*/		
	mw.parseUri = function (str) {
		var	o   = mw.parseUri.options,
			m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
			uri = {},
			i   = 14;
	
		while (i--) uri[o.key[i]] = m[i] || "";
	
		uri[o.q.name] = {};
		uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
			if ($1) uri[o.q.name][$1] = $2;
		});
	
		return uri;
	};
	
	/**
	* Parse URI function
	*
	* For documentation on its usage see: 
	* http://stevenlevithan.com/demo/parseuri/js/
	*/
	mw.parseUri.options = {
		strictMode: false,
		key: ["source", "protocol", "authority", "userInfo", "user","password","host","port","relative","path","directory","file","query","anchor"],
		q:   {
			name:   "queryKey",
			parser: /(?:^|&)([^&=]*)=?([^&]*)/g
		},
		parser: {
			strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
			loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
		}
	};	
	
	/**
	* getAbsoluteUrl takes a src and returns the absolute location given the document.URL
	*
	* @param {String} src path or url
	* @return {String} absolute url
	*/
	mw.absoluteUrl = function( src, contextUrl ){
		var parsedSrc =  mw.parseUri( src );		
		// Source is already absolute return:
		if( parsedSrc.protocol != '')
			return src;				
		
		// Get parent Url location the context URL	
		if( contextUrl){	
			var parsedUrl = mw.parseUri( contextUrl );			
		} else {
			var parsedUrl = mw.parseUri( document.URL );
		}
		
		// Check for leading slash: 
		if( src.indexOf( '/' ) === 0 ){
			return parsedUrl.protocol + '://' + parsedUrl.authority + src;
		}else{
			return parsedUrl.protocol + '://' + parsedUrl.authority + parsedUrl.directory + src;
		}
	};	
	
	
	/**
	* Takes in a string returns an xml dom object 
	*
	* @param {String} str String of XML content to be parsed
	* @return 
	* 	{Object} XML
	*	false If XML could not be parsed 
	*
	*/
	mw.parseXML = function ( str ){
		if ( $j.browser.msie ) {
			// Attempt to parse as XML for IE
			var xmldata = new ActiveXObject( "Microsoft.XMLDOM" );
			xmldata.async = "false";
			try{
				xmldata.loadXML( str );
				return xmldata;
			} catch (e){
				mw.log( 'XML parse ERROR: ' + e.message );
				return false;
			}
		}
		
		// For others (Firefox, Safari etc, older browsers 
		// Some don't have native DOMParser either fallback defined bellow.
		try {
			var xmldata = ( new DOMParser() ).parseFromString( str, "text/xml" );
		} catch ( e ) {
			mw.log( 'XML parse ERROR: ' + e.message );
			return false;
		}		
		return xmldata;
	}


/**
* mwEmbed Setup functions. 
* jQuery is not necessarily available 
*/
	
	/**
	* Check the current DOM for any tags in "rewritePlayerTags"
	* 
	* NOTE: this function and setup can run prior to jQuery being ready
	*/
	mw.documentHasPlayerTags = function(){	
		var rewriteTags = mw.getConfig( 'rewritePlayerTags' );			
		if( rewriteTags ){
			var jtags = rewriteTags.split( ',' );
			for ( var i = 0; i < jtags.length; i++ ) {	
				if( document.getElementsByTagName( jtags[i] )[0] )
					return true;
			};
		}
		return false;
	}	
	
	/**
	* One time "setup" for mwEmbed 
	* run onDomReady ( so calls to setConfg apply to setup )
	*/
	// Flag to ensure setup is only run once:
	var mwSetupFlag = false;	
	mw.setupMwEmbed = function ( ) {			
		// Only run the setup once: 
		if( mwSetupFlag )
			return ;			  
		mwSetupFlag = true;
		
		mw.log( 'mw:setupMwEmbed' );			
		
		// Make sure jQuery is loaded 
		mw.load( 'window.jQuery', function(){				
			if ( !window['$j'] ) {
				window['$j'] = jQuery.noConflict();
			}
			
					
			// Only load jquery ui sheet if ui-widget does not exist. 
			if( ! mw.styleRuleExists( 'ui-widget' ) ){
				mw.setConfig( 'jquery_skin_path', mw.getMwEmbedPath() + 'jquery/jquery.ui/themes/' + mw.getConfig( 'jui_skin' ) + '/' );
			}
			
			mw.setConfig( 'skin_img_path', mw.getMwEmbedPath() + 'skins/' + mw.getConfig( 'skinName' ) + '/images/' ); 
			mw.setConfig( 'default_video_thumb', mw.getConfig( 'skin_img_path' ) + 'vid_default_thumb.jpg' );

			// Make Core skin/style sheets are always available:
			mw.getStyleSheet( mw.getConfig( 'jquery_skin_path' ) + 'jquery-ui-1.7.1.custom.css' );
			mw.getStyleSheet( mw.getMwEmbedPath() + 'skins/' + mw.getConfig( 'skinName' ) + '/styles.css' );

			// Set up AJAX to not send dynamic URLs for loading scripts
			$j.ajaxSetup( {
				cache: true
			} );
			
			//Update the magic keywords 		
			mw.lang.magicSetup();
			
			// Set up mvEmbed jQuery bindings
			mwDojQueryBindings();
				
			// Check for tag-rewrites ( sometimes checked twice but ensures fresh dom check )  
			if( mw.documentHasPlayerTags() ){
				// Load the embedPlayer module ( then run queued hooks )
				mw.load( 'player', function ( ) {
					// Rewrite the rewritePlayerTags with the 
					$j( mw.getConfig( 'rewritePlayerTags' ) ).embedPlayer()
					// Run mw hooks:
					mw.runLoadHooks();
				} );
			}else{		
				// Set ready state and run the callback
				mw.runLoadHooks();
			}
		} ); 			
	}
	
	/**
	* Checks if a css style rule exists 
	*
	* On a page with lots of rules it can take some time 
	* so avoid calling this function where possible and 
	* cache its result
	* 
	* @param {String} styleRule Style rule name to check
	* @return 
	*	true if the rule exists
	*	false if the rule does not exist
	* @type {Boolean}
	*/
	mw.styleRuleExists = function ( styleRule ){
		// Set up the skin paths configuration
		for( var i=0 ; i < document.styleSheets.length ; i++ ){
			var rules = null;			
			if (document.styleSheets[i].cssRules)
				rules = document.styleSheets[i].cssRules
			else if (document.styleSheets[0].rules)
				rules = document.styleSheets[i].rules
			for(var j=0 ; j < rules.length ; j++ ){
				var rule = rules[j].selectorText;												
				if( rule.indexOf( styleRule ) != -1 ){
					return true;
				}		
			}
		}
		return false;	
	}
	// Flag to register the domReady has been called
	var mwDomReadyFlag = false;
	
	/**
 	* This will get called when the DOM is ready 
 	* Will check configuration and issue a mw.setupMwEmbed call if needed
	*/
	mw.domReady = function ( ) {
		if( mwDomReadyFlag )
			return ;
		mw.log( 'run:domReady' );
		// Set the onDomReady Flag
		mwDomReadyFlag = true;
		
		// Check for the force setup flag:
		if ( mw.getConfig( 'runSetupMwEmbed' ) ){
			mw.setupMwEmbed();
			return ;
		}
		
		// Check for rewrite tags: 		
		if ( mw.documentHasPlayerTags() ) {
			mw.setupMwEmbed();
			return ;
		}		
		
		// Check for queued functions that use mw interfaces: 
		if ( mwOnLoadFuncitons.length ){
			mw.setupMwEmbed();
			return ;
		}	
	}	

} )( window.mw );




// Load in js2 stopgap into proper location: 
if ( typeof gMsg != 'undefined' ) {
	mw.addMessages( gMsg )
}

// Set gM shortcut:
var gM = mw.getMsg;

// Setup legacy global shortcuts:
var loadRS = mw.lang.loadRS;

/**
* --  Load Class Paths --
*
* MUST BE VALID JSON (NOT JS)
* This is used by the script loader to auto-load classes (so we only define
* this once for PHP & JavaScript)
*
* Right now the PHP AutoLoader only reads this mwEmbed.js file.
* In the future we could have multiple "loader" files 
* 	where addClassFilePaths JSON is read in each "loader"
* 
*/
 
mw.addClassFilePaths( {
	"mwEmbed"			: "mwEmbed.js",
	"window.jQuery"		: "jquery/jquery-1.3.2.js",
	"$j.fn.pngFix"		: "jquery/plugins/jquery.pngFix.js",
	"$j.fn.autocomplete": "jquery/plugins/jquery.autocomplete.js",
	"$j.fn.hoverIntent"	: "jquery/plugins/jquery.hoverIntent.js",
	"$j.fn.datePicker"	: "jquery/plugins/jquery.datePicker.js",
	"$j.ui"				: "jquery/jquery.ui/ui/ui.core.js",
	"$j.fn.ColorPicker"	: "modules/libClipEdit/colorpicker/js/colorpicker.js",
	"$j.Jcrop"			: "modules/libClipEdit/Jcrop/js/jquery.Jcrop.js",
	"$j.fn.simpleUploadForm" : "modules/libAddMedia/simpleUploadForm.js",
	
	"mw.proxy"		: "modules/libMwApi/mw.proxy.js",
	
	"mw.testLang"	:  "tests/testLang.js",		

	"JSON"				: "modules/libMwApi/json2.js",
	"$j.cookie"			: "jquery/plugins/jquery.cookie.js",
	"$j.contextMenu"	: "jquery/plugins/jquery.contextMenu.js",
	"$j.fn.suggestions"	: "jquery/plugins/jquery.suggestions.js",
	"$j.fn.textSelection"	: "jquery/plugins/jquery.textSelection.js",

	"$j.effects.blind"		: "jquery/jquery.ui/ui/effects.blind.js",
	"$j.effects.drop"		: "jquery/jquery.ui/ui/effects.drop.js",
	"$j.effects.pulsate"	: "jquery/jquery.ui/ui/effects.pulsate.js",
	"$j.effects.transfer"	: "jquery/jquery.ui/ui/effects.transfer.js",
	"$j.ui.droppable"		: "jquery/jquery.ui/ui/ui.droppable.js",
	"$j.ui.slider"			: "jquery/jquery.ui/ui/ui.slider.js",
	"$j.effects.bounce"		: "jquery/jquery.ui/ui/effects.bounce.js",
	"$j.effects.explode"	: "jquery/jquery.ui/ui/effects.explode.js",
	"$j.effects.scale"		: "jquery/jquery.ui/ui/effects.scale.js",
	"$j.ui.datepicker"		: "jquery/jquery.ui/ui/ui.datepicker.js",
	"$j.ui.progressbar"		: "jquery/jquery.ui/ui/ui.progressbar.js",
	"$j.ui.sortable"		: "jquery/jquery.ui/ui/ui.sortable.js",
	"$j.effects.clip"		: "jquery/jquery.ui/ui/effects.clip.js",
	"$j.effects.fold"		: "jquery/jquery.ui/ui/effects.fold.js",
	"$j.effects.shake"		: "jquery/jquery.ui/ui/effects.shake.js",
	"$j.ui.dialog"			: "jquery/jquery.ui/ui/ui.dialog.js",
	"$j.ui.resizable"		: "jquery/jquery.ui/ui/ui.resizable.js",
	"$j.ui.tabs"			: "jquery/jquery.ui/ui/ui.tabs.js",
	"$j.effects.core"		: "jquery/jquery.ui/ui/effects.core.js",
	"$j.effects.highlight"	: "jquery/jquery.ui/ui/effects.highlight.js",
	"$j.effects.slide"		: "jquery/jquery.ui/ui/effects.slide.js",
	"$j.ui.accordion"		: "jquery/jquery.ui/ui/ui.accordion.js",
	"$j.ui.draggable"		: "jquery/jquery.ui/ui/ui.draggable.js",
	"$j.ui.selectable"		: "jquery/jquery.ui/ui/ui.selectable.js",

	"$j.fn.dragDropFile"		: "modules/libAddMedia/dragDropFile.js",
	"mvFirefogg"			: "modules/libAddMedia/mvFirefogg.js",
	"mvAdvFirefogg"			: "modules/libAddMedia/mvAdvFirefogg.js",
	"mvBaseUploadInterface"	: "modules/libAddMedia/mvBaseUploadInterface.js",
	"remoteSearchDriver"	: "modules/libAddMedia/remoteSearchDriver.js",
	"seqRemoteSearchDriver" : "modules/libSequencer/seqRemoteSearchDriver.js",

	"baseRemoteSearch"		: "modules/libAddMedia/searchLibs/baseRemoteSearch.js",
	"mediaWikiSearch"		: "modules/libAddMedia/searchLibs/mediaWikiSearch.js",
	"metavidSearch"			: "modules/libAddMedia/searchLibs/metavidSearch.js",
	"archiveOrgSearch"		: "modules/libAddMedia/searchLibs/archiveOrgSearch.js",
	"flickrSearch"			: "modules/libAddMedia/searchLibs/flickrSearch.js",
	"baseRemoteSearch"		: "modules/libAddMedia/searchLibs/baseRemoteSearch.js",

	"mvClipEdit"			: "modules/libClipEdit/mvClipEdit.js",
	
	"mvPlayList"		: "modules/libSequencer/mvPlayList.js",
	"mvSequencer"		: "modules/libSequencer/mvSequencer.js",
	"mvFirefoggRender"	: "modules/libSequencer/mvFirefoggRender.js",
	"mvTimedEffectsEdit": "modules/libSequencer/mvTimedEffectsEdit.js"

} );

/*
* Adds style sheets to be loaded with particular classes   
*/
mw.addClassStyleSheets( {
	'$j.Jcrop'			: 'libClipEdit/Jcrop/css/jquery.Jcrop.css',
	'$j.fn.ColorPicker'	: 'libClipEdit/colorpicker/css/colorpicker.css'
} );





/**
* libEmbedPlayer Dependency Module Loader:
*
* NOTE: this code block could eventually be put in: 
* "modules/libEmbedPlayer/loader.js" 
* 
* Then it could be dynamically inserted into mwEmbed requests 
* at point of release or at runtime via the script-loader.
* 
* Per module loader enables a dynamic set of modules with only minimal
* loader code per module in the core mwEmbed included js 
* 
*/

/**
 * Default player module configuration 
 */
 
// What tags will be re-written to video player by default
// set to empty string or null to avoid automatic rewrites
mw.setConfig( 'rewritePlayerTags', 'video,audio,playlist' );
	
//If the Timed Text interface should be displayed: 
// 'always' Displays link and call to contribute always
// 'auto' Looks for child timed text elements or "wikiTitleKey" & load interface
// 'off' Does not display the timed text interface
mw.setConfig( 'textInterface', 'auto' ); 
	
// Timed Text provider presently just "commons",
// NOTE: Each player instance can also specify a provider  
mw.setConfig( 'timedTextProvider', 'commons' );

// Add class file paths: 
mw.addClassFilePaths( {
	"embedPlayer"		: "modules/libEmbedPlayer/embedPlayer.js",
	"flowplayerEmbed"	: "modules/libEmbedPlayer/flowplayerEmbed.js",
	"kplayerEmbed"		: "modules/libEmbedPlayer/kplayerEmbed.js",
	"genericEmbed"		: "modules/libEmbedPlayer/genericEmbed.js",
	"htmlEmbed"			: "modules/libEmbedPlayer/htmlEmbed.js",
	"javaEmbed"			: "modules/libEmbedPlayer/javaEmbed.js",
	"nativeEmbed"		: "modules/libEmbedPlayer/nativeEmbed.js",
	"quicktimeEmbed"	: "modules/libEmbedPlayer/quicktimeEmbed.js",
	"vlcEmbed"			: "modules/libEmbedPlayer/vlcEmbed.js",
	
	"ctrlBuilder"	: "skins/ctrlBuilder.js",
	"kskinConfig"	: "skins/kskin/kskinConfig.js",
	"mvpcfConfig"	: "skins/mvpcf/mvpcfConfig.js",
	
	"$j.fn.menu"	: "modules/libTimedText/jQuery.menu.js",
	"mw.timedText"	: "modules/libTimedText/mw.timedText.js",
	"Itext" 		: "modules/libTimedText/Itext.js"

} );

// Add style sheet dependencies
mw.addClassStyleSheets( {
	"kskinConfig" : "skins/kskin/playerSkin.css",
	"mvpcfConfig" : "skins/mvpcf/playerSkin.css",
	"$j.fn.menu" 	: "modules/libTimedText/jQuery.menu.css"
} );

// Add the module loader function:
mw.addModuleLoader( 'player', function( callback ){
	var _this = this;
	mw.log( 'loadModule: player :' );	
	
	// Set module specific class videonojs to loading:
	$j( '.videonojs' ).html( gM( 'mwe-loading_txt' ) );
	
	// Set up the embed video player class request: (include the skin js as well)
	var dependencyRequest = [
		[
			'$j.ui',
			'embedPlayer',
			'ctrlBuilder',
			'$j.cookie',
			'JSON'
		],
		[
			'$j.ui.slider'
		]
	];
	
	
	//If we should include the timedText interface
	var timedTextRequestSet = [
		'$j.fn.menu',
		'mw.timedText' 
	]; 
	
	// Merge in the timed text libs 
	if( mw.getConfig( 'textInterface') == 'always' )		
		$j.merge( dependencyRequest[0], timedTextRequestSet );			
		
		
	$j( mw.getConfig( 'rewritePlayerTags' ) ).each( function(){
		var playerElement = this;		
		var cName = $j( playerElement ).attr( 'class' );
		for( var n=0; n < mw.valid_skins.length ; n++ ){
			// Get any other skins that we need to load 
			// That way skin js can be part of the single script-loader request: 
			if( cName.indexOf( mw.valid_skins[ n ] ) !== -1){
				dependencyRequest[0].push(  mw.valid_skins[n]  + 'Config' );
			}
		}
		//Also add the text library to request set if any video elment has text sources:
		if( $j( playerElement ).find( 'itext' ).length != 0 ){
			$j.merge( dependencyRequest[0], timedTextRequestSet );
		}else{			
			$j( playerElement ).find( 'source' ).each(function(na, sourceElement){
				if( $j( sourceElement ).attr('type') == 'text/xml' && 
					$j( sourceElement ).attr('codec') == 'roe' 
				){						
					// Has a roe src
					$j.merge( dependencyRequest[0], timedTextRequestSet );
				}
			});
		}
	} );	
		
	// Add PNG fix if needed:
	if ( $j.browser.msie || $j.browser.version < 7 )
		dependencyRequest[0].push( '$j.fn.pngFix' );

	// Do short detection, to avoid extra player library request in ~most~ cases. 
	//( If browser is firefox include native, if browser is IE include java ) 
	if( $j.browser.msie )
		dependencyRequest[0].push( 'javaEmbed' )
	
	// Safari gets slower load since we have to detect ogg support 
	if( typeof HTMLVideoElement == 'object' &&  !$j.browser.safari  )
		dependencyRequest[0].push( 'nativeEmbed' )

	

	// Load the video libs:
	mw.load( dependencyRequest, function() {
		//Setup userConfig 
		mw.setupUserConfig( function(){
			// Remove no video html elements:
			$j( '.videonojs' ).remove();
			
			// Detect supported players:  
			embedTypes.init();		
			
			//mw.log(" run callback: " + callback );
						
			// Run the callback with name of the module  
			if( callback )		
				callback( 'player' );		
			
		} ); // setupUserConfig
	} );
	
} ); // done with embedPlayer loader.js






// Add the core mvEmbed Messages ( will be localized by script server ) 
mw.addMessages( {
	"mwe-loading_txt" : "Loading ...",
	"mwe-size-gigabytes" : "$1 GB",
	"mwe-size-megabytes" : "$1 MB",
	"mwe-size-kilobytes" : "$1 K",
	"mwe-size-bytes" : "$1 B",
	"mwe-error_load_lib" : "Error: JavaScript $1 was not retrievable or does not define $2",
	"mwe-loading-add-media-wiz" : "Loading add media wizard",
	"mwe-apiproxy-setup" : "Setting up API proxy",
	"mwe-load-drag-item" : "Loading dragged item",
	"mwe-ok" : "OK",
	"mwe-cancel" : "Cancel"
} );




/**
* Set DOM-ready call 
* Does not use jQuery( document ).ready( ) because 
*  mwEmbed could have been included without jQuery.
* 
* mw.domReady function has checks to only be run once
*/
// For Mozilla / modern browsers
if ( document.addEventListener ) {
	document.addEventListener( "DOMContentLoaded", mw.domReady, false );
}
// Preserve any existing window.onload binding: 
var mwOriginalOnLoad;
var mwOrgLoadCheck = false;
if ( window.onload && typeof  window.onload == 'function' && !mwOrgLoadCheck) {
    mwOriginalOnLoad = window.onload;
    mwOrgLoadCheck = true;
}
// Use the onload method as a backup:
window.onload = function () {
    if ( mwOriginalOnLoad ){
        mwOriginalOnLoad();
        mwOriginalOnLoad=null;
    }
	mw.domReady();
}
// If inserted into an already loaded document: 
if( document.readyState == 'complete'){
	mw.domReady();
}
//And just to be sure ( for dynamic inserts ) ... check if "body" tag exists after 25ms
setTimeout( function(){
	if( document.getElementsByTagName('body')[0] ){
		mw.domReady();	
	}
}, 25 );


/*
 * Store all the mwEmbed jQuery-specific bindings
 * ( to be run after jQuery is available ).
 *
 * These functions are generally are loaders that do the dynamic mapping of
 * dependencies for a given component
 *
 * Should be repaced by "loader" calls
 * 
 *
 */
function mwDojQueryBindings() {
	mw.log( 'mv_jqueryBindings' );
	( function( $ ) {
	
		/**
		* Set a given selector html to the loading spinner:
		*/
		$.fn.loadingSpinner = function() {
			if ( this ) {
				$j( this ).html(  mw.loading_spinner() );
			}			
			return this;
		}
		
		/**
		* dragDrop file loader 
		*/
		$.fn.dragFileUpload = function ( conf ) {
			if ( this.selector ) {
				var _this = this;
				// load the dragger and "setup"
				mw.load( ['$j.fn.dragDropFile'], function() {
					$j( _this.selector ).dragDropFile();
				} );
			}
		}
		
		/**
		 * apiProxy Loader loader:
		 * 
		 * @param {String} mode Mode is either 'server' or 'client'
		 * @param {Object} proxyConfig Proxy configuration
		 * @param {Function} callback The function called once proxy request is done
		 */
		$.apiProxy = function( mode, proxyConfig, callback ) {
			mw.log( 'do apiProxy setup' );
			mw.load( [
				'mw.proxy',
				'JSON'
			], function() {				
				// do the proxy setup or 
				if ( mode == 'client' ) {
					// just do the setup (no callbcak for client setup) 
					mw.proxy.client( proxyConfig );
					if ( callback )
						callback();
				} else if ( mode == 'server' ) {
					// Do the request with the callback
					mw.proxy.server( proxyConfig , callback );
				}
			} );
		}
		
		// non selector based add-media-wizard direct invocation with loader
		$.addMediaWiz = function( options, callback ) {
			mw.log( ".addMediaWiz call" );
			// check if already loaded:
			if ( window['rsdMVRS'] ) {
				window['rsdMVRS'].showDialog();
				if ( callback )
					callback( window['rsdMVRS'] );
				return ;
			}
			// display a loader: 
			$.addLoaderDialog( gM( 'mwe-loading-add-media-wiz' ) );
			// load the addMedia wizard without a target: 
			$.fn.addMediaWiz ( options, function( amwObj ) {
				// close the dialog
				$.closeLoaderDialog();
				// do the add-media-wizard display
				amwObj.createUI();
				// call the parent callback:
				if ( callback )
					callback( window['rsdMVRS'] );
			} );
		}
		
		$.fn.addMediaWiz = function( options, callback ) {
			if ( this.selector ) {
				// First set the cursor for the button to "loading"
				$j( this.selector ).css( 'cursor', 'wait' ).attr( 'title', gM( 'mwe-loading_txt' ) );
				// set the target: 
				options['target_invoke_button'] = this.selector;
			}

			// Load the mwEmbed_base skin:
			mw.getStyleSheet( mw.getConfig( 'jquery_skin_path' ) + 'jquery-ui-1.7.1.custom.css' );
			mw.getStyleSheet( mw.getMwEmbedPath() + 'skins/' + mw.getConfig( 'skinName' ) + '/styles.css' );
			// Load all the required libs:
			mw.load( [
				[	'remoteSearchDriver',
					'$j.cookie',
					'$j.fn.textSelection',
					'$j.ui'
				], [
					'$j.ui.resizable',
					'$j.ui.draggable',
					'$j.ui.dialog',
					'$j.ui.tabs',
					'$j.ui.sortable'
				]
			], function() {
				options['instance_name'] = 'rsdMVRS';
				if ( ! window['rsdMVRS'] )
					window['rsdMVRS'] = new remoteSearchDriver( options );
				if ( callback ) {
					callback( window['rsdMVRS'] );
				}
			} );
		}
		/*
		* Sequencer loader
		*/
		$.fn.sequencer = function( options, callback ) {
			// Debugger
			options['target_sequence_container'] = this.selector;
			// Issue a request to get the CSS file (if not already included):
			mw.getStyleSheet( mw.getConfig( 'jquery_skin_path' ) + 'jquery-ui-1.7.1.custom.css' );
			mw.getStyleSheet( mw.getMwEmbedPath() + 'skins/' + mw.getConfig( 'skinName' ) + '/mv_sequence.css' );
			// Make sure we have the required mwEmbed libs:			
			mw.load( [
				[	//Load the embedPlayer module: 
					'player'
				],		
				[										
					// Load playlist and its dependencies
					'mvPlayList',
					'$j.ui',
					'$j.contextMenu',
					'JSON',
					'mvSequencer'
				],
				[
					'$j.ui.accordion',
					'$j.ui.dialog',
					'$j.ui.droppable',
					'$j.ui.draggable',
					'$j.ui.progressbar',
					'$j.ui.sortable',
					'$j.ui.resizable',
					'$j.ui.slider',
					'$j.ui.tabs'
				]
			], function() {
				mw.log( 'calling new mvSequencer' );
				// Initialise the sequence object (it will take over from there)
				// No more than one mvSeq obj for now:
				if ( !mw['mvSeq'] ) {
					mw['mvSeq'] = new mvSequencer( options );
				} else {
					mw.log( 'mvSeq already init' );
				}
			} );
		}
		/*
		 * The Firefogg jQuery function:
		 * @@note This Firefogg invocation could be made to work more like real jQuery plugins
		 */
		var queuedFirefoggConf = { };
		$.fn.firefogg = function( options, callback ) {
			if ( !options )
				options = { };
				
			// Add the base theme CSS:
			mw.getStyleSheet( mw.getConfig( 'jquery_skin_path' ) + 'jquery-ui-1.7.1.custom.css' );
			mw.getStyleSheet( mw.getMwEmbedPath() + 'skins/' + mw.getConfig( 'skinName' ) + '/styles.css' );

			// Check if we already have Firefogg loaded (the call just updates the element's
			// properties)			
			var sElm = $j( this.selector ).get( 0 );
			if ( sElm['firefogg'] ) {
				if ( sElm['firefogg'] == 'loading' ) {
					mw.log( "Queued firefogg operations ( firefogg " +
						"not done loading ) " );
					$j.extend( queuedFirefoggConf, options );
					return false;
				}
				// Update properties
				for ( var i in options ) {
					mw.log( "firefogg::updated: " + i + ' to ' + options[i] );
					sElm['firefogg'][i] = options[i];
				}
				return sElm['firefogg'];
			} else {
				// Avoid concurrency
				sElm['firefogg'] = 'loading';
			}
			// Add the selector
			options['selector'] = this.selector;

			var loadSet = [
				[
					'mvBaseUploadInterface',
					'mvFirefogg',
					'$j.ui'
				],
				[
					'$j.ui.progressbar',
					'$j.ui.dialog',
					'$j.ui.draggable'
				]
			];
			if ( options.encoder_interface ) {
				loadSet.push( [
					'mvAdvFirefogg',
					'$j.cookie',
					'$j.ui.accordion',
					'$j.ui.slider',
					'$j.ui.datepicker'
				] );
			}
			// Make sure we have everything loaded that we need:
			mw.load( loadSet, function() {
					mw.log( 'firefogg libs loaded. target select:' + options.selector );
					// Select interface provider based on whether we want to include the
					// encoder interface or not
					if ( options.encoder_interface ) {
						var myFogg = new mvAdvFirefogg( options );
					} else {
						var myFogg = new mvFirefogg( options );
					}
					if ( myFogg ) {
						myFogg.doRewrite( callback );
						var selectorElement = $j( options.selector ).get( 0 );
						selectorElement['firefogg'] = myFogg;
						
						mw.log( 'pre:' + selectorElement['firefogg']['firefogg_form_action'] )
						if ( queuedFirefoggConf )
							$j.extend( selectorElement['firefogg'], queuedFirefoggConf );
						mw.log( 'post:' + selectorElement['firefogg']['firefogg_form_action'] )
					}
			} );
		}
		// Take an input player as the selector and expose basic rendering controls
		$.fn.firefoggRender = function( options, callback ) {
			// Check if we already have render loaded then just pass on updates/actions
			var sElm = $j( this.selector ).get( 0 );
			//add a special attribute to the selector: 
			if ( sElm['fogg_render'] ) {
				if ( sElm['fogg_render'] == 'loading' ) {
					mw.log( "Error: called firefoggRender while loading" );
					return false;
				}
				// Call or update the property:
			}
			sElm['fogg_render'] = 'loading';
			// Add the selector
			options['player_target'] = this.selector;
			mw.load( [
				'mvBaseUploadInterface',
				'mvFirefogg',
				'mvFirefoggRender'
			], function() {
				// Attach the firefoggRender obj to the selected elm: 
				sElm['fogg_render'] = new mvFirefoggRender( options );
				if ( callback && typeof callback == 'function' )
					callback( sElm['fogg_render'] );
			} );
		}

		$.fn.baseUploadInterface = function( options ) {
			mw.load( [
				[
					'mvBaseUploadInterface',
					'$j.ui'
				],
				[
					'$j.ui.progressbar',
					'$j.ui.dialog'
				]
			], function() {
				myUp = new mvBaseUploadInterface( options );
				myUp.setupForm();
			} );
		}

		// Shortcut to a themed button
		$.btnHtml = function( msg, className, iconId, opt ) {
			if ( !opt )
				opt = { };
			var href = ( opt.href ) ? opt.href : '#';
			var target_attr = ( opt.target ) ? ' target="' + opt.target + '" ' : '';
			var style_attr = ( opt.style ) ? ' style="' + opt.style + '" ' : '';
			return '<a href="' + href + '" ' + target_attr + style_attr +
				' class="ui-state-default ui-corner-all ui-icon_link ' +
				className + '"><span class="ui-icon ui-icon-' + iconId + '" ></span>' +
				'<span class="btnText">' + msg + '</span></a>';
		}
		// Shortcut to bind hover state
		$.fn.btnBind = function() {
			$j( this ).hover(
				function() {
					$j( this ).addClass( 'ui-state-hover' );
				},
				function() {
					$j( this ).removeClass( 'ui-state-hover' );
				}
			)
			return this;
		}
		/**
		* resize the dialog to fit the window
		*/
		$.fn.dialogFitWindow = function( opt ) {
			var opt_default = { 'hspace':50, 'vspace':50 };
			if ( !opt )
				var opt = { };
			$j.extend( opt, opt_default );
			$j( this.selector ).dialog( 'option', 'width', $j( window ).width() - opt.hspace );
			$j( this.selector ).dialog( 'option', 'height', $j( window ).height() - opt.vspace );
			$j( this.selector ).dialog( 'option', 'position', 'center' );
				// update the child position: (some of this should be pushed up-stream via dialog config options
			$j( this.selector + '~ .ui-dialog-buttonpane' ).css( {
				'position':'absolute',
				'left':'0px',
				'right':'0px',
				'bottom':'0px'
			} );
		}
		
		/**
		* addLoaderDialog
		*  small helper for putting a loading dialog box on top of everything
		* (helps block for request that
		*
		* @param msg text text of the loader msg
		*/
		$.addLoaderDialog = function( msg_txt ) {
			$.addDialog( msg_txt, msg_txt + '<br>' + mw.loading_spinner() );
		}
		
		/**
		* shortcut jquery binding to add a dialog window:
		*/
		$.addDialog = function ( title, msg_txt, btn ) {
			$( '#mwe_tmp_loader' ).remove();
			// append the style free loader ontop: 
			$( 'body' ).append( '<div id="mwe_tmp_loader" style="display:none" title="' + title + '" >' +
					msg_txt +
			'</div>' );
			// special btn == ok gives empty give a single "oky" -> "close"
			if ( btn == 'ok' ) {
				btn[ gM( 'mwe-ok' ) ] = function() {
					$j( '#mwe_tmp_loader' ).close();
				}
			}
			// turn the loader into a real dialog loader: 
			mw.load( [
				[
					'$j.ui'
				],
				[
					'$j.ui.dialog'
				]
			], function() {
				$( '#mwe_tmp_loader' ).dialog( {
					bgiframe: true,
					draggable: false,
					resizable: false,
					modal: true,
					width:400,
					buttons: btn
				} );
			} );
		}
		$.closeLoaderDialog = function() {
			mw.load( [
				[
					'$j.ui'
				],
				[
					'$j.ui.dialog'
				]
			], function() {
				$j( '#mwe_tmp_loader' ).dialog( 'destroy' ).remove();
			} );
		}
	
		$.mwProxy = function( apiConf ) {
			mw.load( ['mw.apiProxy'],
			function() {
				mw.apiProxy( apiConf );
			} );
		}
	} )( jQuery );
}

/**
* Utility functions that override globals
* 
* Will be depreciated once we move all XML parsing to jQuery calls
*/

if ( typeof DOMParser == "undefined" ) {
	DOMParser = function () { }
	DOMParser.prototype.parseFromString = function ( str, contentType ) {
		if ( typeof ActiveXObject != "undefined" ) {
			var d = new ActiveXObject( "MSXML.DomDocument" );
			d.loadXML( str );
			return d;
		} else if ( typeof XMLHttpRequest != "undefined" ) {
			var req = new XMLHttpRequest;
			req.open( "GET", "data:" + ( contentType || "application/xml" ) +
					";charset=utf-8," + encodeURIComponent( str ), false );
			if ( req.overrideMimeType ) {
				req.overrideMimeType( contentType );
			}
			req.send( null );
			return req.responseXML;
		}
	}
}


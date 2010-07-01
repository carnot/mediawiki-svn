/**
 * General purpose utilities
 */

window.mw.util = new ( function() {
	
	/* Private Members */
	
	var that = this;
	// Decoded user agent string cache
	var client = null;
	
	/* Public Functions */
	
	/**
	 * Builds a url string from an object containing any of the following components:
	 * 
	 * Component	Example
	 * scheme		"http"
	 * server		"www.domain.com"
	 * path			"path/to/my/file.html"
	 * query		"this=thåt" or { 'this': 'thåt' }
	 * fragment		"place_on_the_page"
	 * 
	 * Results in: "http://www.domain.com/path/to/my/file.html?this=th%C3%A5t#place_on_the_page"
	 * 
	 * All arguments to this function are assumed to be URL-encoded already, except for the
	 * query parameter if provided in object form.
	 */
	this.buildUrlString = function( components ) {
		var url = '';
		if ( typeof components.scheme === 'string' ) {
			url += components.scheme + '://';
		}
		if ( typeof components.server === 'string' ) {
			url += components.server + '/';
		}
		if ( typeof components.path === 'string' ) {
			url += components.path;
		}
		if ( typeof components.query === 'string' ) {
			url += '?' + components.query;
		} else if ( typeof components.query === 'object' ) {
			url += '?' + that.buildQueryString( components.query );
		}
		if ( typeof components.fragment === 'string' ) {
			url += '#' + components.fragment;
		}
		return url;
	};
	/**
	 * RFC 3986 compliant URI component encoder - with identical behavior as PHP's urlencode function. Note: PHP's
	 * urlencode function prior to version 5.3 also escapes tildes, this does not. The naming here is not the same
	 * as PHP because PHP can't decide out to name things (underscores sometimes?), much less set a reasonable
	 * precedence for how things should be named in other environments. We use camelCase and action-subject here.
	 */
	this.encodeUrlComponent = function( string ) {  
		return encodeURIComponent( new String( string ) )
			.replace(/!/g, '%21')
			.replace(/'/g, '%27')
			.replace(/\(/g, '%28')
			.replace(/\)/g, '%29')
			.replace(/\*/g, '%2A')
			.replace(/%20/g, '+');
	};
	/**
	 * Builds a query string from an object with key and values
	 */
	this.buildQueryString = function( parameters ) {
		if ( typeof parameters === 'object' ) {
			var parts = [];
			for ( var p in parameters ) {
				parts[parts.length] = that.encodeUrlComponent( p ) + '=' + that.encodeUrlComponent( parameters[p] );
			}
			return parts.join( '&' );
		}
		return '';
	};
	/**
	 * Returns an object containing information about the browser
	 * 
	 * The resulting client object will be in the following format:
	 *  {
	 * 		'name': 'firefox',
	 * 		'layout': 'gecko',
	 * 		'os': 'linux'
	 * 		'version': '3.5.1',
	 * 		'versionBase': '3',
	 * 		'versionNumber': 3.5,
	 * 	}
	 */
	this.client = function() {
		// Use the cached version if possible
		if ( client === null ) {
			
			/* Configuration */
			
			// Name of browsers or layout engines we don't recognize
			var uk = 'unknown';
			// Generic version digit
			var x = 'x';
			// Strings found in user agent strings that need to be conformed
			var wildUserAgents = [ 'Opera', 'Navigator', 'Minefield', 'KHTML', 'Chrome', 'PLAYSTATION 3'];
			// Translations for conforming user agent strings
			var userAgentTranslations = [
			    // Tons of browsers lie about being something they are not
				[/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/, ''],
				// Chrome lives in the shadow of Safari still
				['Chrome Safari', 'Chrome'],
				// KHTML is the layout engine not the browser - LIES!
				['KHTML', 'Konqueror'],
				// Firefox nightly builds
				['Minefield', 'Firefox'],
				// This helps keep differnt versions consistent
				['Navigator', 'Netscape'],
				// This prevents version extraction issues, otherwise translation would happen later
				['PLAYSTATION 3', 'PS3'],
			];
			// Strings which precede a version number in a user agent string - combined and used as match 1 in
			// version detectection
			var versionPrefixes = [
				'camino', 'chrome', 'firefox', 'netscape', 'netscape6', 'opera', 'version', 'konqueror', 'lynx',
				'msie', 'safari', 'ps3'
			];
			// Used as matches 2, 3 and 4 in version extraction - 3 is used as actual version number
			var versionSuffix = '(\/|\;?\s|)([a-z0-9\.\+]*?)(\;|dev|rel|\\)|\s|$)';
			// Names of known browsers
			var browserNames = [
			 	'camino', 'chrome', 'firefox', 'netscape', 'konqueror', 'lynx', 'msie', 'opera', 'safari', 'ipod',
			 	'iphone', 'blackberry', 'ps3'
			];
			// Tanslations for conforming browser names
			var browserTranslations = [];
			// Names of known layout engines
			var layoutNames = ['gecko', 'konqueror', 'msie', 'opera', 'webkit'];
			// Translations for conforming layout names
			var layoutTranslations = [['konqueror', 'khtml'], ['msie', 'trident'], ['opera', 'presto']];
			// Names of known operating systems
			var osNames = ['win', 'mac', 'linux', 'sunos', 'solaris', 'iphone'];
			// Translations for conforming operating system names
			var osTranslations = [['sunos', 'solaris']];
			
			/* Functions */
			
			// Performs multiple replacements on a string
			function translate( source, translations ) {
				for ( var i = 0; i < translations.length; i++ ) {
					source = source.replace( translations[i][0], translations[i][1] );
				}
				return source;
			};
			
			/* Pre-processing  */
			
			var userAgent = navigator.userAgent, match, browser = uk, layout = uk, os = uk, version = x;
			if ( match = new RegExp( '(' + wildUserAgents.join( '|' ) + ')' ).exec( userAgent ) ) {
				// Takes a userAgent string and translates given text into something we can more easily work with
				userAgent = translate( userAgent, userAgentTranslations );
			}
			// Everything will be in lowercase from now on
			userAgent = userAgent.toLowerCase();
			
			/* Extraction */
			
			if ( match = new RegExp( '(' + browserNames.join( '|' ) + ')' ).exec( userAgent ) ) {
				browser = translate( match[1], browserTranslations );
			}
			if ( match = new RegExp( '(' + layoutNames.join( '|' ) + ')' ).exec( userAgent ) ) {
				layout = translate( match[1], layoutTranslations );
			}
			if ( match = new RegExp( '(' + osNames.join( '|' ) + ')' ).exec( navigator.platform.toLowerCase() ) ) {
				var os = translate( match[1], osTranslations );
			}
			if ( match = new RegExp( '(' + versionPrefixes.join( '|' ) + ')' + versionSuffix ).exec( userAgent ) ) {
				version = match[3];
			}
			
			/* Edge Cases -- did I mention about how user agent string lie? */
			
			// Decode Safari's crazy 400+ version numbers
			if ( name.match( /safari/ ) && version > 400 ) {
				version = '2.0';
			}
			// Expose Opera 10's lies about being Opera 9.8
			if ( name === 'opera' && version >= 9.8) {
				version = userAgent.match( /version\/([0-9\.]*)/i )[1] || 10;
			}
			
			/* Caching */
			
			client = {
				'browser': browser,
				'layout': layout,
				'os': os,
				'version': version,
				'versionBase': ( version !== x ? new String( version ).substr( 0, 1 ) : x ),
				'versionNumber': ( parseFloat( version, 10 ) || 0.0 )
			};
		}
		return client;
	};
	/**
	 * Checks the current browser against a support map object to determine if the browser has been black-listed or
	 * not. If the browser was not configured specifically it is assumed to work. It is assumed that the body
	 * element is classified as either "ltr" or "rtl". If neither is set, "ltr" is assumed.
	 * 
	 * A browser map is in the following format:
	 *	{
	 * 		'ltr': {
	 * 			// Multiple rules with configurable operators
	 * 			'msie': [['>=', 7], ['!=', 9]],
	 *			// Blocked entirely
	 * 			'iphone': false
	 * 		},
	 * 		'rtl': {
	 * 			// Test against a string
	 * 			'msie': [['!==', '8.1.2.3']],
	 * 			// RTL rules do not fall through to LTR rules, you must explicity set each of them
	 * 			'iphone': false
	 * 		}
	 *	}
	 * 
	 * @param map Object of browser support map
	 * 
	 * @return Boolean true if browser known or assumed to be supported, false if blacklisted
	 */
	this.testClient = function( map ) {
		var client = this.client();
		// Check over each browser condition to determine if we are running in a compatible client
		var browser = map[$( 'body' ).is( '.rtl' ) ? 'rtl' : 'ltr'][client.browser];
		if ( typeof browser !== 'object' ) {
			// Unknown, so we assume it's working
			return true;
		}
		for ( var condition in browser ) {
			var op = browser[condition][0];
			var val = browser[condition][1];
			if ( val === false ) {
				return false;
			} else if ( typeof val == 'string' ) {
				if ( !( eval( 'client.version' + op + '"' + val + '"' ) ) ) {
					return false;
				}
			} else if ( typeof val == 'number' ) {
				if ( !( eval( 'client.versionNumber' + op + val ) ) ) {
					return false;
				}
			}
		}
		return true;
	};
	/**
	 * Finds the highest tabindex in use.
	 * 
	 * @return Integer of highest tabindex on the page
	 */
	this.getMaxTabIndex = function() {
		var maxTI = 0;
		$( '[tabindex]' ).each( function() {
			var ti = parseInt( $(this).attr( 'tabindex' ) );
			if ( ti > maxTI ) {
				maxTI = ti;
			}
		} );
		return maxTI;
	};
} )();
// Add support for html5 / mwEmbed elements to IE
// For discussion and comments, see: http://remysharp.com/2009/01/07/html5-enabling-script/
'video audio source track'.replace(/\w+/g,function( n ){ document.createElement( n ) } );

/**
 * mwEmbed.core includes shared mwEmbed utilities  
 * 
 * @license
 * mwEmbed
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * 
 * @copyright (C) 2010 Kaltura 
 * @author Michael Dale ( michael.dale at kaltura.com )
 * 
 * @url http://www.kaltura.org/project/HTML5_Video_Media_JavaScript_Library
 *
 * Libraries used include code license in headers
 */


( function( mw, $ ) {

	/**
	 * Set the mwEmbedVersion
	 */
	window.MW_EMBED_VERSION = '1.1g';
	
	// Globals to pre-set ready functions in dynamic loading of mwEmbed
	if( typeof window.preMwEmbedReady == 'undefined'){
		window.preMwEmbedReady = [];	
	}
	// Globals to pre-set config values in dynamic loading of mwEmbed
	if( typeof window.preMwEmbedConfig == 'undefined') {
		window.preMwEmbedConfig = [];
	}
	
	/**
	 * Enables pages to target a "interfaces ready" state. 
	 * 
	 * TODO make it work!
	 * 
	 * This is different from jQuery(document).ready() ( jQuery ready is not
	 * friendly with dynamic includes and not friendly with core interface
	 * asynchronous build out. )
	 * 
	 * @param {Function}
	 *            callback Function to run once DOM and jQuery are ready
	 */
	var mwOnLoadFunctions = [];	// Setup the local mwOnLoadFunctions array:		
	var mwReadyFlag = false; // mw Ready flag ( set once mwEmbed is ready )
	mw.ready = function( callback ) {						
		if( mwReadyFlag === false ) {		
			// Add the callbcak to the onLoad function stack
			mwOnLoadFunctions.push ( callback );						
		} else { 
			// If mwReadyFlag is already "true" issue the callback directly:
			callback();
		}		
	};
	
	// add a domReady setup infterface trigger
	SetupInterface
	/**
	 * Runs all the queued functions called by mwEmbedSetup
	 */ 
	mw.runReadyFunctions = function ( ) {
		mw.log('mw.runReadyFunctions: ' + mwOnLoadFunctions.length );				
		// Run any pre-setup ready functions
		while( preMwEmbedReady.length ){
			preMwEmbedReady.shift()();
		}		
		// Run all the queued functions:
		while( mwOnLoadFunctions.length ) {
			mwOnLoadFunctions.shift()();
		}							
		// Sets mwReadyFlag to true so that future mw.ready run the
		// callback directly
		mwReadyFlag = true;			
		
	};	
	
	/**
	 * Aliased functions 
	 * 
	 * Wrap mediaWiki functionality while we port over the libraries 
	 */
	mw.setConfig = function( name, value ){
		mediaWiki.config.set( name, value );
	};
	mw.getConfig = function( name, value ){
		mediaWiki.config.get( name, value );
	};
	mw.setDefaultConfig = function( name, value ){
		if( ! mediaWiki.config.get( name ) ){
			mediaWiki.config.set( name, value );
		}
	};
	mw.load = function( resources, callback ){
		mediaWiki.using( resources, callback, function(){
			// failed to load
		});
	};
	
	/**
	 * Merge in a configuration value:
	 */
	mw.mergeConfig = function( name, value ){
		if( typeof name == 'object' ) {
			$j.each( name, function( inx, val) {
				mw.mergeConfig( inx, val );
			});
			return ;
		}
		// Check if we should "merge" the config
		if( typeof value == 'object' && typeof mw.getConfig( name ) == 'object' ) {
			if ( value.constructor.toString().indexOf("Array") != -1 &&
				mw.getConfig( name ).constructor.toString().indexOf("Array") != -1 
			){
				// merge in the array
				mw.setConfig( name, $j.merge( mw.getConfig( name ), value ) );
			} else {
				mw.setConfig( name, value );
			}
			return ;
		}
		// else do a normal setConfig
		mw.setConfig( name, value );
	};
	
	/**
	 * Utility Functions
	 * 
	 * TOOD some of these utility functions are used in the upload Wizard, break them out into 
	 * associated files. 
	 */		
	
	/**
	 * Given a float number of seconds, returns npt format response. ( ignore
	 * days for now )
	 * 
	 * @param {Float}
	 *            sec Seconds
	 * @param {Boolean}
	 *            show_ms If milliseconds should be displayed.
	 * @return {Float} String npt format
	 */
	mw.seconds2npt = function( sec, show_ms ) {
		if ( isNaN( sec ) ) {
			mw.log("Warning: trying to get npt time on NaN:" + sec);			
			return '0:00:00';
		}
		
		var tm = mw.seconds2Measurements( sec )
				
		// Round the number of seconds to the required number of significant
		// digits
		if ( show_ms ) {
			tm.seconds = Math.round( tm.seconds * 1000 ) / 1000;
		} else {
			tm.seconds = Math.round( tm.seconds );
		}
		if ( tm.seconds < 10 ){
			tm.seconds = '0' +	tm.seconds;
		}
		if( tm.hours == 0 ){
			hoursStr = ''
		} else {
			if ( tm.minutes < 10 )
				tm.minutes = '0' + tm.minutes;
			
			hoursStr = tm.hours + ":"; 
		}
		return hoursStr + tm.minutes + ":" + tm.seconds;
	}
	
	/**
	 * Given seconds return array with 'days', 'hours', 'min', 'seconds'
	 * 
	 * @param {float}
	 *            sec Seconds to be converted into time measurements
	 */
	mw.seconds2Measurements = function ( sec ){
		var tm = {};
		tm.days = Math.floor( sec / ( 3600 * 24 ) )
		tm.hours = Math.floor( sec / 3600 );
		tm.minutes = Math.floor( ( sec / 60 ) % 60 );
		tm.seconds = sec % 60;
		return tm;
	}
	
	/**
	 * Take hh:mm:ss,ms or hh:mm:ss.ms input, return the number of seconds
	 * 
	 * @param {String}
	 *            npt_str NPT time string
	 * @return {Float} Number of seconds
	 */
	mw.npt2seconds = function ( npt_str ) {
		if ( !npt_str ) {
			// mw.log('npt2seconds:not valid ntp:'+ntp);
			return 0;
		}
		// Strip {npt:}01:02:20 or 32{s} from time if present
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
	
	/**
	 * addLoaderDialog small helper for displaying a loading dialog
	 * 
	 * @param {String}
	 *            dialogHtml text Html of the loader msg
	 */
	mw.addLoaderDialog = function( dialogHtml ) {
		$dialog = mw.addDialog( {
			'title' : dialogHtml, 
			'content' : dialogHtml + '<br>' + 
				$j('<div />')
				.loadingSpinner()
				.html() 
		});
		return $dialog;
	}
	
	
	
	/**
	 * Add a (temporary) dialog window:
	 * 
	 * @param {Object} with following keys: 
	 *            title: {String} Title string for the dialog
	 *            content: {String} to be inserted in msg box
	 *            buttons: {Object} A button object for the dialog Can be a string
	 *            				for the close button
	 * 			  any jquery.ui.dialog option 
	 */
	mw.addDialog = function ( options ) {
		// Remove any other dialog
		$j( '#mwTempLoaderDialog' ).remove();			
		
		if( !options){
			options = {};
		}
	
		// Extend the default options with provided options
		var options = $j.extend({
			'bgiframe': true,
			'draggable': true,
			'resizable': false,
			'modal': true
		}, options );
		
		if( ! options.title || ! options.content ){
			mw.log("Error: mwEmbed addDialog missing required options ( title, content ) ")
			return ;
		}
		
		// Append the dialog div on top:
		$j( 'body' ).append( 
			$j('<div />') 
			.attr( {
				'id' : "mwTempLoaderDialog",
				'title' : options.title
			})
			.css({
				'display': 'none'
			})
			.append( options.content )
		);
	
		// Build the uiRequest
		var uiRequest = [ '$j.ui.dialog' ];
		if( options.draggable ){
			uiRequest.push( '$j.ui.draggable' )
		}
		if( options.resizable ){
			uiRequest.push( '$j.ui.resizable' );
		}
		
		// Special button string 
		if ( typeof options.buttons == 'string' ) {
			var buttonMsg = options.buttons;
			buttons = { };
			options.buttons[ buttonMsg ] = function() {
				$j( this ).dialog( 'close' );
			}
		}				
		
		// Load the dialog resources
		mw.load([
			[
				'$j.ui'
			],
			uiRequest
		], function() {
			$j( '#mwTempLoaderDialog' ).dialog( options );
		} );
		return $j( '#mwTempLoaderDialog' );
	}
	
	/**
	 * Close the loader dialog created with addLoaderDialog
	 */
	mw.closeLoaderDialog = function() {		
		$j( '#mwTempLoaderDialog' ).dialog( 'destroy' ).remove();
	};
	
	// MOVE TO jquery.client
	// move to jquery.client
	mw.isIphone = function(){
		return ( navigator.userAgent.indexOf('iPhone') != -1 && ! mw.isIpad() );
	};
	// Uses hack described at:
	// http://www.bdoran.co.uk/2010/07/19/detecting-the-iphone4-and-resolution-with-javascript-or-php/
	mw.isIphone4 = function(){
		return ( mw.isIphone() && ( window.devicePixelRatio && window.devicePixelRatio >= 2 ) );		
	};
	mw.isIpod = function(){
		return (  navigator.userAgent.indexOf('iPod') != -1 );
	};
	mw.isIpad = function(){
		return ( navigator.userAgent.indexOf('iPad') != -1 );
	};
	// Android 2 has some restrictions vs other mobile platforms
	mw.isAndroid2 = function(){		
		return ( navigator.userAgent.indexOf( 'Android 2.') != -1 );
	};
	
	/**
	 * Fallforward system by default prefers flash.
	 * 
	 * This is separate from the EmbedPlayer library detection to provide
	 * package loading control NOTE: should be phased out in favor of browser
	 * feature detection where possible
	 * 
	 */
	mw.isHTML5FallForwardNative = function(){
		if( mw.isMobileHTML5() ){
			return true;
		}
		// Check for url flag to force html5:
		if( document.URL.indexOf('forceMobileHTML5') != -1 ){
			return true;
		}
		// Fall forward native:
		// if the browser supports flash ( don't use html5 )
		if( mw.supportsFlash() ){
			return false;
		}
		// No flash return true if the browser supports html5 video tag with
		// basic support for canPlayType:
		if( mw.supportsHTML5() ){
			return true;
		}
		
		return false;
	}
	
	mw.isMobileHTML5 = function(){
		// Check for a mobile html5 user agent:
		if ( mw.isIphone() || 
			 mw.isIpod() || 
			 mw.isIpad() ||
			 mw.isAndroid2()
		){
			return true;
		}
		return false;
	};
	mw.supportsHTML5 = function(){
		// Blackberry is evil in its response to canPlayType calls.
		if( navigator.userAgent.indexOf('BlackBerry') != -1 ){
			return false ;
		}
		var dummyvid = document.createElement( "video" );
		if( dummyvid.canPlayType ) {
			return true;
		}
		return false;	
	}
	
	mw.supportsFlash = function(){
		// Check if the client does not have flash and has the video tag
		if ( navigator.mimeTypes && navigator.mimeTypes.length > 0 ) {
			for ( var i = 0; i < navigator.mimeTypes.length; i++ ) {
				var type = navigator.mimeTypes[i].type;
				var semicolonPos = type.indexOf( ';' );
				if ( semicolonPos > -1 ) {
					type = type.substr( 0, semicolonPos );
				}
				if (type == 'application/x-shockwave-flash' ) {
					// flash is installed
					return true;
				}
			}
		}

		// for IE:
		var hasObj = true;
		if( typeof ActiveXObject != 'undefined' ){
			try {
				var obj = new ActiveXObject( 'ShockwaveFlash.ShockwaveFlash' );
			} catch ( e ) {
				hasObj = false;
			}
			if( hasObj ){
				return true;
			}
		}
		return false;
	};
	
	
} )( mediaWiki, jQuery );
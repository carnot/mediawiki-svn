/**
 * Object to attach to a file name input, to be run on its change() event
 * Largely derived from wgUploadWarningObj in old upload.js
 * Perhaps this could be a jQuery ext
 * @param options   dictionary of options 
 *		selector  required, the selector for the input to check
 * 		processResult   required, function to execute on results. accepts two args:
 *			1) filename that invoked this request -- should check if this is still current filename
 *			2) an object with the following fields
 *				isUnique: boolean
 *				img: thumbnail image src (if not unique)
 *				href: the url of the full image (if not unique)
 *				title: normalized title of file (if not unique)
 * 		spinner   required, closure to execute to show progress: accepts true to start, false to stop
 * 		apiUrl    optional url to call for api. falls back to local api url
 * 		delay     optional how long to delay after a change in ms. falls back to configured default
 *		preprocess optional: function to apply to the contents of selector before testing
 *		events 	  what events on the input trigger a check.
 */ 
mw.DestinationChecker = function( options ) {

	var _this = this;
	_this.selector = options.selector;		
	_this.spinner = options.spinner;
	_this.processResult = options.processResult;
	_this.api = options.api;

	$j.each( ['preprocess', 'delay', 'events'], function( i, option ) {
		if ( options[option] ) {
			_this[option] = options[option];
		}
	} );


	// initialize!

	var check = _this.getDelayedChecker();
	
	$j.each( _this.events, function(i, eventName) {
		$j( _this.selector )[eventName]( check );
	} );

};

mw.DestinationChecker.prototype = {

	// events that the input undergoes which fire off a check
	events: [ 'change', 'keyup' ],

	// how long the input muse be "idle" before doing call (don't want to check on each key press)
	delay: 500, // ms;

	// what tracks the wait
	timeoutId: null,

	// cached results from api calls
	cachedResult: {},

	/**
	 * There is an option to preprocess the name (in order to perhaps convert it from
	 * title to path, e.g. spaces to underscores, or to add the "File:" part.) Depends on 
	 * exactly what your input field represents.
	 * In the event that the invoker doesn't supply a name preprocessor, use this identity function
	 * as default
	 *
	 * @param something
	 * @return that same thing
	 */
	preprocess: function(x) { return x; },

	/**
	 * fire when the input changes value or keypress
	 * will trigger a check of the name if the field has been idle for delay ms.
	 */	
	getDelayedChecker: function() {
		var checker = this;
		return function() {
			var el = this; // but we don't use it, since we already have it in _this.selector

			// if we changed before the old timeout ran, clear that timeout.
			if ( checker.timeoutId ) {
				window.clearTimeout( checker.timeoutId );
			}

			// and start another, hoping this time we'll be idle for delay ms.	
			checker.timeoutId = window.setTimeout( 
				function() { checker.checkUnique(); },
				checker.delay 
			);
		};
	},

	/**
  	 * Get the current value of the input, with optional preprocessing
	 * @return the current input value, with optional processing
	 */
	getTitle: function() {
		return this.preprocess( $j( this.selector ).val() );
	},

	/**
	 * Async check if a filename is unique. Can be attached to a field's change() event
	 * This is a more abstract version of AddMedia/UploadHandler.js::doDestCheck
	 */
	checkUnique: function() {
		var _this = this;
		var found = false;
		var title = _this.getTitle();

		// if input is empty don't bother.
		if ( title === '' ) { 
			return;
		}
		
		if ( _this.cachedResult[name] !== undefined ) {
			_this.processResult( _this.cachedResult[name] );
			return;
		} 

		// set the spinner to spin
		_this.spinner( true );
		
		// Setup the request -- will return thumbnail data if it finds one
		// XXX do not use iiurlwidth as it will create a thumbnail
		var params = {
			'titles': title,
			'prop':  'imageinfo',
			'iiprop': 'url|mime|size',
			'iiurlwidth': 150
		};


		var ok = function( data ) {			
			// Remove spinner
			_this.spinner( false );
	
			// if the name's changed in the meantime, our result is useless
			if ( title != _this.getTitle() ) {
				return;
			}
			
			if ( !data || !data.query || !data.query.pages ) {
				// Ignore a null result
				mw.log("mw.DestinationChecker::checkUnique> No data in checkUnique result", 'debug');
				return;
			}

			var result = undefined;

			if ( data.query.pages[-1] ) {
				// No conflict found; this file name is unique
				result = { isUnique: true };

			} else {

				for ( var page_id in data.query.pages ) {
					if ( !data.query.pages[ page_id ].imageinfo ) {
						continue;
					}

					// Conflict found, this filename is NOT unique
					var ntitle;
					if ( data.query.normalized ) {
						ntitle = data.query.normalized[0].to;
					} else {
						ntitle = data.query.pages[ page_id ].title;
					}

					var img = data.query.pages[ page_id ].imageinfo[0];

					result = {
						isUnique: false,	
						img: img,
						title: ntitle,
						href : img.descriptionurl
					};

					break;
				}
			}

			if ( result !== undefined ) {
				_this.cachedResult[title] = result;
				_this.processResult( result );
			}

		};

		var err = function( code, result ) { 
			_this.spinner( false );
			mw.log("mw.DestinationChecker::checkUnique> error in checkUnique result: " + code, 'debug');
			return;
		};
	
		// Do the destination check  
		_this.api.get( params, { ok: ok, err: err } );
	}

};


/** 
 * jQuery extension to make a field upload-checkable
 */
( function ( $ ) {
	$.fn.destinationChecked = function( options ) {
		var _this = this;
		options.selector = _this;
		var checker = new mw.DestinationChecker( options );
		// this should really be done with triggers
		_this.checkUnique = function() { checker.checkUnique(); }; 
		return _this;
	}; 
} )( jQuery );

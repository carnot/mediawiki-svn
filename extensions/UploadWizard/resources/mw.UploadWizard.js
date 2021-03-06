/**
 * Represents the upload -- in its local and remote state. (Possibly those could be separate objects too...)
 * This is our 'model' object if we are thinking MVC. Needs to be better factored, lots of feature envy with the UploadWizard
 * states:
 *   'new' 'transporting' 'transported' 'metadata' 'stashed' 'details' 'submitting-details' 'complete' 'error'
 * should fork this into two -- local and remote, e.g. filename
 */
( function( $j ) {

mw.UploadWizardUpload = function( api, filesDiv ) {
	this.api = api;
	this.state = 'new';
	this.thumbnails = {};
	this.thumbnailPublishers = {};
	this.imageinfo = {};
	this.title = undefined;
	this.mimetype = undefined;
	this.extension = undefined;

	this.sessionKey = undefined;

	// this should be moved to the interface, if we even keep this
	this.transportWeight = 1;  // default
	this.detailsWeight = 1; // default

	// details
	this.ui = new mw.UploadWizardUploadInterface( this, filesDiv );

	// handler -- usually ApiUploadHandler
	// this.handler = new ( mw.UploadWizard.config[  'uploadHandlerClass'  ] )( this );
	// this.handler = new mw.MockUploadHandler( this );
	this.handler = this.getUploadHandler();
	
	
	this.index = mw.UploadWizardUpload.prototype.count;
	mw.UploadWizardUpload.prototype.count++;
};

mw.UploadWizardUpload.prototype = {
	// Upload handler 
	uploadHandler: null,
	
	// increments with each upload
	count: 0,

	acceptDeed: function( deed ) {
		var _this = this;
		_this.deed.applyDeed( _this );
	},

	/**
 	 * start
	 */
	start: function() {
		var _this = this;
		_this.setTransportProgress(0.0);
		//_this.ui.start();
		_this.handler.start();
	},

	/**
	 *  remove this upload. n.b. we trigger a removeUpload this is usually triggered from
	 */
	remove: function() {
		this.state = 'aborted';
		if ( this.deedThumbnailDiv ) {
			this.deedThumbnailDiv.remove();
		}
		if ( this.details && this.details.div ) {
			this.details.div.remove();
		}
		if ( this.thanksDiv ) {
			this.thanksDiv.remove();
		}
		// we signal to the wizard to update itself, which has to delete the final vestige of
		// this upload (the ui.div). We have to do this silly dance because we
		// trigger through the div. Triggering through objects doesn't always work.
		// TODO v.1.1 fix, don't need to use the div any more -- this now works in jquery 1.4.2
		$j( this.ui.div ).trigger( 'removeUploadEvent' );
	},


	/**
	 * Wear our current progress, for observing processes to see
 	 * @param fraction
	 */
	setTransportProgress: function ( fraction ) {
		var _this = this;
		_this.state = 'transporting';
		_this.transportProgress = fraction;
		$j( _this.ui.div ).trigger( 'transportProgressEvent' );
	},

	/**
	 * Queue some warnings for possible later consumption
	 */
	addWarning: function( code, info ) {
		if ( !mw.isDefined( this.warnings ) ) {
			this.warnings = [];
		}
		this.warnings.push( [ code, info ] );
	},

	/**
	 * Stop the upload -- we have failed for some reason
	 */
	setError: function( code, info ) {
		this.state = 'error';
		this.transportProgress = 0;
		this.ui.showError( code, info );
	},

	/**
	 * To be executed when an individual upload finishes. Processes the result and updates step 2's details
	 * @param result	the API result in parsed JSON form
	 */
	setTransported: function( result ) {
		var _this = this;
		if ( _this.state == 'aborted' ) {
			return;
		}

		// default error state
		var code = 'unknown';
		var info = 'unknown';

		if ( result.upload && result.upload.warnings ) {
			if ( result.upload.warnings['exists'] ) {
				// the filename we uploaded is in use already. Not a problem since we stashed it under a temporary name anyway
				// potentially we could indicate to the upload that it should set the Title field to error state now, but we'll let them deal with that later.
				// however, we don't get imageinfo, so let's try to get it and pretend that we did
				var existsFileName = result.upload.warnings.exists;
				try {
					code = 'exists';
					info = _this.filenameToUrl( existsFileName ).toString();
				} catch ( e ) {
					code = 'unknown';
					info = 'Warned about existing filename, but filename is unparseable: "' + existsFileName + "'";
				}
				_this.addWarning( code, info );
				_this.extractUploadInfo( result.upload );
				var success = function( imageinfo ) {
					if ( imageinfo === null ) {
						_this.setError( 'noimageinfo' );
					} else {
						result.upload.stashimageinfo = imageinfo;
						_this.setSuccess( result );
					}
				};
				_this.getStashImageInfo( success, [ 'timestamp', 'url', 'size', 'dimensions', 'sha1', 'mime', 'metadata', 'bitdepth' ] );
			} else if ( result.upload.warnings['duplicate'] ) {
				code = 'duplicate';
				_this.setError( code, _this.duplicateErrorInfo( 'duplicate', result.upload.warnings['duplicate'] ) );
			} else if ( result.upload.warnings['duplicate-archive'] ) {
				code = 'duplicate-archive';
				_this.setError( code, _this.duplicateErrorInfo( 'duplicate-archive', result.upload.warnings['duplicate-archive'] ) );
			} else {
				// we have an unknown warning. Assume fatal
				code = 'unknown-warning';
				var warningInfo = [];
				$j.each( result.upload.warnings, function( k, v ) {
					warningInfo.push( k + ': ' + v );
				} );
				info = warningInfo.join( ', ' );
				_this.setError( code, [ info ] );
			}
		} else if ( result.upload && result.upload.result === 'Success' ) {
			if ( result.upload.imageinfo ) {
				_this.setSuccess( result );
			} else {
				_this.setError( 'noimageinfo', info );
			}
		} else {
			if ( result.error ) {
				if ( result.error.code ) {
					code = result.error.code;
				}
				if ( result.error.info ) {
					info = result.error.info;
				}
			}
			_this.setError( code, info );
		}


	},


	/**
	 * Helper function to generate duplicate errors with dialog box. Works with existing duplicates and deleted dupes.
	 * @param {String} error code, should have matching strings in .i18n.php
	 * @param {Object} portion of the API error result listing duplicates
	 */
	duplicateErrorInfo: function( code, resultDuplicate ) {
		var _this = this;
		var duplicates;
		if ( typeof resultDuplicate === 'object' ) {
			duplicates = resultDuplicate;
		} else if ( typeof resultDuplicate === 'string' ) {
			duplicates = [ resultDuplicate ];
		}
		var $ul = $j( '<ul></ul>' );
		$j.each( duplicates, function( i, filename ) {
			var $a = $j( '<a/>' ).append( filename );
			try {
				var href = _this.filenameToUrl( filename );
				$a.attr( { 'href': href, 'target': '_blank' } );
			} catch ( e ) {
				$a.click( function() { alert('could not parse filename=' + filename ); } );
				$a.attr( 'href', '#' );
			}
			$ul.append( $j( '<li></li>' ).append( $a ) );
		} );
		var dialogFn = function() {
			$j( '<div></div>' )
				.html( $ul )
				.dialog( {
					width: 500,
					zIndex: 200000,
					autoOpen: true,
					title: gM( 'mwe-upwiz-api-error-' + code + '-popup-title', duplicates.length ),
					modal: true
				} );
		};
		return [ duplicates.length, dialogFn ];
	},


	/**
	 * Called from any upload success condition
	 * @param {Mixed} result -- result of AJAX call
	 */
	setSuccess: function( result ) {
		var _this = this; // was a triumph
		_this.state = 'transported';
		_this.transportProgress = 1;

		// I'm making a note here
		_this.ui.setStatus( 'mwe-upwiz-getting-metadata' );
		if ( result.upload ) {
			_this.extractUploadInfo( result.upload );
			_this.getThumbnail(
				function( image ) {
					// n.b. if server returns a URL, which is a 404, we do NOT get broken image
					_this.ui.setPreview( image ); // make the thumbnail the preview image
				},
				mw.UploadWizard.config[ 'thumbnailWidth' ],
				mw.UploadWizard.config[ 'thumbnailMaxHeight' ]
			);
			// create the large thumbnail that the other thumbnails link to
			_this.getThumbnail(
				function( image ) {},
				mw.UploadWizard.config[ 'largeThumbnailWidth' ],
				mw.UploadWizard.config[ 'largeThumbnailMaxHeight' ]
			);
			_this.deedPreview.setup();
			_this.details.populate();
			_this.state = 'stashed';
			_this.ui.showStashed();
		} else {
			_this.setError( 'noimageinfo' );
		}

	},

	/**
	 * Called when the file is entered into the file input
	 * Get as much data as possible -- maybe exif, even thumbnail maybe
	 */
	extractLocalFileInfo: function( filename ) {
		if ( false ) {  // FileAPI, one day
			this.transportWeight = getFileSize();
		}
		// XXX sanitize filename
		try {
			this.title = new mw.Title( mw.UploadWizardUtil.getBasename( filename ).replace( /:/g, '_' ), 'file' );
		} catch ( e ) {
			this.setError( 'mwe-upwiz-unparseable-filename', filename );
		}
	},

	/**
 	 * Accept the result from a successful API upload transport, and fill our own info
	 *
	 * @param result The JSON object from a successful API upload result.
	 */
	extractUploadInfo: function( resultUpload ) {
		if ( resultUpload.sessionkey ) {
			this.sessionKey = resultUpload.sessionkey;
		}
		if ( resultUpload.imageinfo ) {
			this.extractImageInfo( resultUpload.imageinfo );
		} else if ( resultUpload.stashimageinfo ) {
			this.extractImageInfo( resultUpload.stashimageinfo );
		}


	},

	/**
	 * Extract image info into our upload object
	 * Image info is obtained from various different API methods
	 * @param imageinfo JSON object obtained from API result.
	 */
	extractImageInfo: function( imageinfo ) {
		var _this = this;
		for ( var key in imageinfo ) {
			// we get metadata as list of key-val pairs; convert to object for easier lookup. Assuming that EXIF fields are unique.
			if ( key == 'metadata' ) {
				_this.imageinfo.metadata = {};
				if ( imageinfo.metadata && imageinfo.metadata.length ) {
					$j.each( imageinfo.metadata, function( i, pair ) {
						if ( pair !== undefined ) {
							_this.imageinfo.metadata[pair['name'].toLowerCase()] = pair['value'];
						}
					} );
				}
			} else {
				_this.imageinfo[key] = imageinfo[key];
			}
		}

		if ( _this.title.getExtension() === null ) {
			1;
			// TODO v1.1 what if we don't have an extension? Should be impossible as it is currently impossible to upload without extension, but you
			// never know... theoretically there is no restriction on extensions if we are uploading to the stash, but the check is performed anyway.
			/*
			var extension = mw.UploadWizardUtil.getExtension( _this.imageinfo.url );
			if ( !extension ) {
				if ( _this.imageinfo.mimetype ) {
					if ( mw.UploadWizardUtil.mimetypeToExtension[ _this.imageinfo.mimetype ] ) {
						extension = mw.UploadWizardUtil.mimetypeToExtension[ _this.imageinfo.mimetype ];
					}
				}
			}
			*/
		}
	},

	/**
	 * Get information about stashed images
	 * See API documentation for prop=stashimageinfo for what 'props' can contain
	 * @param {Function} callback -- called with null if failure, with imageinfo data structure if success
	 * @param {Array} properties to extract
	 * @param {Number} optional, width of thumbnail. Will force 'url' to be added to props
	 * @param {Number} optional, height of thumbnail. Will force 'url' to be added to props
	 */
	getStashImageInfo: function( callback, props, width, height ) {
		var _this = this;

		if (!mw.isDefined( props ) ) {
			props = [];
		}

		var params = {
			'prop':	'stashimageinfo',
			'siisessionkey': _this.sessionKey,
			'siiprop': props.join( '|' )
		};

		if ( mw.isDefined( width ) || mw.isDefined( height ) ) {
			if ( ! $j.inArray( 'url', props ) ) {
				props.push( 'url' );
			}
			if ( mw.isDefined( width ) ) {
				params['siiurlwidth'] = width;
			}
			if ( mw.isDefined( height ) ) {
				params['siiurlheight'] = height;
			}
		}

		var ok = function( data ) {
			if ( !data || !data.query || !data.query.stashimageinfo ) {
				mw.log("mw.UploadWizardUpload::getStashImageInfo> No data? ");
				callback( null );
				return;
			}
			callback( data.query.stashimageinfo );
		};

		var err = function( code, result ) {
			mw.log( 'mw.UploadWizardUpload::getStashImageInfo> error: ' + code, 'debug' );
			callback( null );
		};

		this.api.get( params, { ok: ok, err: err } );
	},
	/**
	 * Get the upload handler per browser capabilities 
	 */
	getUploadHandler: function(){
		if( !this.uploadHandler ){
			if( typeof( Firefogg ) != 'undefined'
					&&
				mw.UploadWizard.config[ 'enableFirefogg' ]
			) {
				mw.log("mw.UploadWizard::getUploadHandler> FirefoggHandler");
				this.uploadHandler = new mw.FirefoggHandler( this, this.api );			
			} else {
				// By default use the apiUploadHandler
				mw.log("mw.UploadWizard::getUploadHandler> ApiUploadHandler");
				this.uploadHandler = new mw.ApiUploadHandler( this, this.api );
			}
		}		
		return this.uploadHandler;
	},
	/**
	 * Fetch a thumbnail for a stashed upload of the desired width.
	 * It is assumed you don't call this until it's been transported.
 	 *
	 * @param callback - callback to execute once thumbnail has been obtained -- must accept Image object for success, null for error
	 * @param width - desired width of thumbnail (height will scale to match)
	 * @param height - (optional) maximum height of thumbnail
	 */
	getThumbnail: function( callback, width, height ) {
		var _this = this;
		if ( mw.isEmpty( height ) ) {
			height = -1;
		}
		// this key is overspecified for this thumbnail ( we don't need to reiterate the index ) but 
		// we can use this as key as an event now, that might fire much later
		var key = 'thumbnail.' + _this.index + '.width' + width + ',height' + height;
		if ( mw.isDefined( _this.thumbnails[key] ) ) {
			callback( _this.thumbnails[key] );
			return;
		}

		// subscribe to the event that this thumbnail is ready -- will give null or an Image to the callback
		$j.subscribe( key, callback );

		// if someone else already started a thumbnail fetch & publish, then don't bother, just wait for the event.
		if ( ! mw.isDefined( _this.thumbnailPublishers[ key ] ) ) {
			// The thumbnail publisher accepts the result of a stashImageInfo, and then tries to get the thumbnail, and eventually
			// will trigger the event we just subscribed to.
			_this.thumbnailPublishers[ key ] = _this.getThumbnailPublisher( key );
			_this.getStashImageInfo( _this.thumbnailPublishers[ key ], [ 'url' ], width, height );
		}
	},

	/**
	 * Returns a callback that can be used with a stashImageInfo call to fetch images, and then fire off an event to
	 * let everyone else know the image is loaded.
	 *
	 * Will retry the thumbnail URL several times, as thumbnails are known to be slow in production.
	 * @param {String} name of event to publish when thumbnails received (or final failure)
	 */
	getThumbnailPublisher: function( key ) {
		var _this = this;
		return function( thumbnails ) { 
				if ( thumbnails === null ) {
				// the api call failed somehow, no thumbnail data.
				$j.publish( key, null );
				} else {
				// ok, the api callback has returned us information on where the thumbnail(s) ARE, but that doesn't mean
				// they are actually there yet. Keep trying to set the source ( which should trigger "error" or "load" event )
				// on the image. If it loads publish the event with the image. If it errors out too many times, give up and publish
				// the event with a null.
				$j.each( thumbnails, function( i, thumb ) {
						if ( thumb.thumberror || ( ! ( thumb.thumburl && thumb.thumbwidth && thumb.thumbheight ) ) ) {
							mw.log( "mw.UploadWizardUpload::getThumbnail> thumbnail error or missing information" );
						$j.publish( key, null );
							return;
						}

					// try to load this image with exponential backoff
					// if the delay goes past 8 seconds, it gives up and publishes the event with null
					var timeoutMs = 100;

						var image = document.createElement( 'img' );
						image.width = thumb.thumbwidth;
						image.height = thumb.thumbheight;
					$j( image )
						.load( function() {
							// cache this thumbnail
						_this.thumbnails[key] = image;
							// publish the image to anyone who wanted it
							$j.publish( key, image );
						} )
						.error( function() { 
							// retry with exponential backoff
							if ( timeoutMs < 8000 ) {
								setTimeout( function() { 
									timeoutMs = timeoutMs * 2 + Math.round( Math.random() * ( timeoutMs / 10 ) ); 
									setSrc();
								}, timeoutMs );
							} else {
								$j.publish( key, null );
							}
						} );

					// executing this should cause a .load() or .error() event on the image
					function setSrc() { 
						image.src = thumb.thumburl;
					}

					// and, go!
					setSrc();
				} );
		}
		};
	},

	/**
	 * Look up thumbnail info and set it in HTML, with loading spinner
	 *
	 * @param selector
	 * @param width
	 * @param height (optional)
	 */
	setThumbnail: function( selector, width, height ) {
		var _this = this;
		if ( typeof width === 'undefined' || width === null || width <= 0 )  {
			width = mw.UploadWizard.config[  'thumbnailWidth'  ];
		}
		width = parseInt( width, 10 );
		height = null;
		if ( !mw.isEmpty( height ) ) {
			height = parseInt( height, 10 );
		}

		var callback = function( image ) {
			if ( image === null ) {
				$j( selector ).addClass( 'mwe-upwiz-file-preview-broken' );
				_this.ui.setStatus( 'mwe-upwiz-thumbnail-failed' );
			} else {
				var $thumbnailLink = $j( '<a class="mwe-upwiz-thumbnail-link"></a>' );
				if ( _this.state != 'complete' ) { // don't use lightbox for thank you page thumbnail
					$thumbnailLink
						.attr( {
							'href': '#',
							'target' : '_new'
						} )
						// set up lightbox behavior for thumbnail
						.click( function() {
							// get large preview image
							_this.getThumbnail(
								// open large preview in modal dialog box
								function( image ) {
									var dialogWidth = ( image.width > 200 ) ? image.width : 200;
									$( '<div class="mwe-upwiz-lightbox"></div>' )
										.append( image )
										.dialog( {
											'width': dialogWidth,
											'autoOpen': true,
											'title': gM( 'mwe-upwiz-image-preview' ),
											'modal': true,
											'resizable': false
										} );
								},
								mw.UploadWizard.config[ 'largeThumbnailWidth' ],
								mw.UploadWizard.config[ 'largeThumbnailMaxHeight' ]
							);
							return false;
						} ); // close thumbnail click function
				} // close if

				$j( selector ).html(
					// insert the thumbnail into the anchor
					$thumbnailLink.append(
						$j( '<img/>' )
							.attr( {
								'width':  image.width,
								'height': image.height,
								'src':    image.src
							} )
					) // close append
				); // close html
			} // close image !== null else condition
		};

		_this.getThumbnail( callback, width, height );
	},

	/**
	 * Given a filename like "Foo.jpg", get the URL to that filename, assuming the browser is on the same wiki.
	 * Candidate for a utility function...
	 * @param {String} filename
	 */
	filenameToUrl: function( filename ) {
		var fileUrl = new mw.Uri( document.URL );
		fileUrl.path = wgScript;
		var fileTitle = new mw.Title( filename, 'file' );
		fileUrl.query = { title: fileTitle, action: 'view' };
		return fileUrl;
	}

};




/**
 * Object that reperesents the entire multi-step Upload Wizard
 */
mw.UploadWizard = function( config ) {

	this.uploads = [];
	this.api = new mw.Api( { url: config.apiUrl } );

	// making a sort of global for now, should be done by passing in config or fragments of config when needed
	// elsewhere
	mw.UploadWizard.config = config;

	// XXX need a robust way of defining default config
	this.maxUploads = mw.UploadWizard.config[ 'maxUploads' ] || 10;
	this.maxSimultaneousConnections = mw.UploadWizard.config[  'maxSimultaneousConnections'  ] || 2;

};

mw.UploadWizard.DEBUG = true;

mw.UploadWizard.userAgent = "UploadWizard (alpha)";


mw.UploadWizard.prototype = {
	stepNames: [ 'tutorial', 'file', 'deeds', 'details', 'thanks' ],
	currentStepName: undefined,

	/*
	// list possible upload handlers in order of preference
	// these should all be in the mw.* namespace
	// hardcoded for now. maybe some registry system might work later, like, all
	// things which subclass off of UploadHandler
	uploadHandlers: [
		'FirefoggUploadHandler',
		'XhrUploadHandler',
		'ApiIframeUploadHandler',
		'SimpleUploadHandler',
		'NullUploadHandler'
	],

	 * We can use various UploadHandlers based on the browser's capabilities. Let's pick one.
	 * For example, the ApiUploadHandler should work just about everywhere, but XhrUploadHandler
	 *   allows for more fine-grained upload progress
	 * @return valid JS upload handler class constructor function
	getUploadHandlerClass: function() {
		// return mw.MockUploadHandler;
		return mw.ApiUploadHandler;
		var _this = this;
		for ( var i = 0; i < uploadHandlers.length; i++ ) {
			var klass = mw[uploadHandlers[i]];
			if ( klass != undefined && klass.canRun( this.config )) {
				return klass;
			}
		}
		// this should never happen; NullUploadHandler should always work
		return null;
	},
	*/

	/**
	 * Reset the entire interface so we can upload more stuff
	 * (depends on updateFileCounts to reset the interface when uploads go down to 0)
	 * Depending on whether we split uploading / detailing, it may actually always be as simple as loading a URL
	 */
	reset: function() {
		this.removeMatchingUploads( function() { return true; } );
	},


	/**
	 * create the basic interface to make an upload in this div
	 * @param div	The div in the DOM to put all of this into.
	 */
	createInterface: function( selector ) {
		var _this = this;

		// load list of languages so we'll have it ready when description interfaces are created
		// XXX replace this code once any of the following bugs are fixed: 25845, 27535, 27561
		var languageHandlerUrl = wgServer + wgScript + '?' + $.param( { 'title': 'MediaWiki:LanguageHandler.js', 'action': 'raw', 'ctype': 'text/javascript' } );
		mw.loader.load( languageHandlerUrl );

		// remove first spinner
		$j( '#mwe-first-spinner' ).remove();
		
		// construct the message for the subheader
		$j( '#contentSub' ).append( $j( '<span style="margin-right: 0.5em;"></span>' ).msg( 'mwe-upwiz-subhead-message' ) );
		// feedback request
		if ( mw.isDefined( mw.UploadWizard.config['feedbackPage'] ) && mw.UploadWizard.config['feedbackPage'] !== '' ) {
			var feedback = new mw.Feedback( _this.api,
				new mw.Title( mw.UploadWizard.config['feedbackPage'] ) );
			var feedbackLink = $j( '<span class="contentSubLink"></span>' ).msg( 'mwe-upwiz-feedback-prompt',
				function() {
					feedback.launch();
					return false;
				}
			);
			$j( '#contentSub' ).append( feedbackLink );
		}

		if ( mw.isDefined( mw.UploadWizard.config['bugList'] ) && mw.UploadWizard.config['bugList'] !== '' ) {
			$j( '#contentSub' ).append( $j( '<span class="contentSubLink"></span>' ).msg( 'mwe-upwiz-subhead-bugs', $j( '<a></a>' ).attr( { href: mw.UploadWizard.config['bugList'], target: '_blank' } ) ) );
		}
		if ( mw.isDefined( mw.UploadWizard.config['translateHelp'] ) && mw.UploadWizard.config['translateHelp'] !== '' ) {
			$j( '#contentSub' ).append( $j( '<span class="contentSubLink"></span>' ).msg( 'mwe-upwiz-subhead-translate', $j( '<a></a>' ).attr( { href: mw.UploadWizard.config['translateHelp'], target: '_blank' } ) ) );
		}
		if ( mw.isDefined( mw.UploadWizard.config['altUploadForm'] ) && mw.UploadWizard.config['altUploadForm'] !== '' ) {
			// altUploadForm is expected to be a page title like 'Commons:Upload', so convert to URL
			var title;
			try {
				title = new mw.Title( mw.UploadWizard.config['altUploadForm'] );
			} catch ( e ) {
				// page was empty, or impossible on this wiki (missing namespace or some other issue). Give up.
			}
			if ( title instanceof mw.Title ) { 
				var altUploadFormUrl = title.getUrl();
				$j( '#contentSub' ).append( $j( '<span class="contentSubLink"></span>' ).msg( 'mwe-upwiz-subhead-alt-upload', $j( '<a></a>' ).attr( { href: altUploadFormUrl } ) ) );
			}
		}
		$j( '#contentSub .contentSubLink:not(:last)' ).after( '&nbsp;&middot;&nbsp;' );

		// construct the arrow steps from the UL in the HTML
		$j( '#mwe-upwiz-steps' )
			.addClass( 'ui-helper-clearfix ui-state-default ui-widget ui-helper-reset ui-helper-clearfix' )
			.arrowSteps()
			.show();

		// make all stepdiv proceed buttons into jquery buttons
		$j( '.mwe-upwiz-stepdiv .mwe-upwiz-buttons button' )
			.button()
			.css( { 'margin-left': '1em' } );


		$j( '.mwe-upwiz-button-begin' )
			.click( function() { _this.reset(); } );

		$j( '.mwe-upwiz-button-home' )
			.click( function() { window.location.href = '/'; } );

		// handler for next button
		$j( '#mwe-upwiz-stepdiv-tutorial .mwe-upwiz-button-next')
			.click( function() {
				// if the skip checkbox is checked, set the skip cookie
				if ( $j('#mwe-upwiz-skip').is(':checked') ) {
					_this.setSkipTutorialCookie();
				}
				_this.moveToStep( 'file' );
			} );

		$j( '#mwe-upwiz-add-file' ).button();

		$j( '#mwe-upwiz-upload-ctrl' )
			.button()
			.click( function() {
				// check if there is an upload at all (should never happen)
				if ( _this.uploads.length === 0 ) {
					$j( '<div></div>' )
						.html( gM( 'mwe-upwiz-file-need-file' ) )
						.dialog({
							width: 500,
							zIndex: 200000,
							autoOpen: true,
							modal: true
						});
					return;
				}

				_this.removeEmptyUploads();
				_this.startUploads();
			} );

		$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons .mwe-upwiz-button-next' ).click( function() {
			_this.removeErrorUploads( function() {
				_this.prepareAndMoveToDeeds();
			} );
		} );
		$j ( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons .mwe-upwiz-button-retry' ).click( function() {
			_this.hideFileEndButtons();
			_this.startUploads();
		} );


		// DEEDS div

		$j( '#mwe-upwiz-stepdiv-deeds .mwe-upwiz-button-next')
			.click( function() {
				$j( '.mwe-upwiz-hint' ).each( function(i) { $j( this ).tipsy( 'hide' ); } ); // close tipsy help balloons
				// validate has the side effect of notifying the user of problems, or removing existing notifications.
				// if returns false, you can assume there are notifications in the interface.
				if ( _this.deedChooser.valid() ) {

					var lastUploadIndex = _this.uploads.length - 1;

					$j.each( _this.uploads, function( i, upload ) {

						if ( _this.deedChooser.deed.name == 'custom' ) {
							upload.details.useCustomDeedChooser();
						} else {
							upload.deedChooser = _this.deedChooser;
						}

						// only necessary if (somehow) they have beaten the check-as-you-type
						upload.details.titleInput.checkUnique();
					} );

					_this.moveToStep( 'details' );
				}
			} );


		// DETAILS div
		var finalizeDetails = function() {
			if ( mw.isDefined( _this.allowCloseWindow ) ) {
				_this.allowCloseWindow();
			}
			_this.prefillThanksPage();
			_this.moveToStep( 'thanks' );
		};

		var startDetails = function() {
			$j( '.mwe-upwiz-hint' ).each( function(i) { $j( this ).tipsy( 'hide' ); } ); // close tipsy help balloons
			if ( _this.detailsValid() ) {
				_this.hideDetailsEndButtons();
				_this.detailsSubmit( function() {
					_this.detailsErrorCount();
					_this.showNext( 'details', 'complete', finalizeDetails );
				} );
			} else {
				_this.detailsErrorCount();
			}
		};

		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-file-next-some-failed' ).hide();
		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-file-next-all-failed' ).hide();

		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-start-next .mwe-upwiz-button-next' )
			.click( startDetails );

		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-buttons .mwe-upwiz-button-next-despite-failures' )
			.click( function() {
				_this.removeErrorUploads( finalizeDetails );
			} );

		$j ( '#mwe-upwiz-stepdiv-details .mwe-upwiz-buttons .mwe-upwiz-button-retry' )
			.click( startDetails );


		// WIZARD

		// check to see if the the skip tutorial cookie is set
		if ( document.cookie.indexOf('skiptutorial=1') != -1 || UploadWizardConfig['skipTutorial'] ) {
			// "select" the second step - highlight, make it visible, hide all others
			_this.moveToStep( 'file' );
		} else {
			// "select" the first step - highlight, make it visible, hide all others
			_this.moveToStep( 'tutorial' );
		}

	},


	// do some last minute prep before advancing to the DEEDS page
	prepareAndMoveToDeeds: function() {
		var _this = this;

		// these deeds are standard
		var deeds = [
			new mw.UploadWizardDeedOwnWork( _this.uploads.length ),
			new mw.UploadWizardDeedThirdParty( _this.uploads.length )
		];

		// if we have multiple uploads, also give them the option to set
		// licenses individually
		if ( _this.uploads.length > 1 ) {
			var customDeed = $j.extend( new mw.UploadWizardDeed(), {
				valid: function() { return true; },
				name: 'custom'
			} );
			deeds.push( customDeed );
		}

		var uploadsClone = $j.map( _this.uploads, function( x ) { return x; } );
		_this.deedChooser = new mw.UploadWizardDeedChooser(
			'#mwe-upwiz-deeds',
			deeds,
			uploadsClone
		 );


		$j( '<div></div>' )
			.insertBefore( _this.deedChooser.$selector.find( '.mwe-upwiz-deed-ownwork' ) )
			.msg( 'mwe-upwiz-deeds-macro-prompt', _this.uploads.length );

		if ( _this.uploads.length > 1 ) {
			$j( '<div style="margin-top: 1em"></div>' )
				.insertBefore( _this.deedChooser.$selector.find( '.mwe-upwiz-deed-custom' ) )
				.msg( 'mwe-upwiz-deeds-custom-prompt' );
		}

		_this.moveToStep( 'deeds' );

	},

	/**
	 * Advance one "step" in the wizard interface.
	 * It is assumed that the previous step to the current one was selected.
	 * We do not hide the tabs because this messes up certain calculations we'd like to make about dimensions, while elements are not
	 * on screen. So instead we make the tabs zero height and, in CSS, they are already overflow hidden
	 * @param selectedStepName
	 * @param callback to do after layout is ready?
	 */
	moveToStep: function( selectedStepName, callback ) {
		var _this = this;

		// scroll to the top of the page (the current step might have been very long, vertically)
		$j( 'html, body' ).animate( { scrollTop: 0 }, 'slow' );

		$j.each( _this.stepNames, function(i, stepName) {

			// the step indicator
			var step = $j( '#mwe-upwiz-step-' + stepName );

			// the step's contents
			var stepDiv = $j( '#mwe-upwiz-stepdiv-' + stepName );

			if ( selectedStepName === stepName ) {
				stepDiv.show();
			} else {
				stepDiv.hide();
			}

		} );

		$j( '#mwe-upwiz-steps' ).arrowStepsHighlight( '#mwe-upwiz-step-' + selectedStepName );

		_this.currentStepName = selectedStepName;

		if ( selectedStepName == 'file' && _this.uploads.length === 0 ) {
			// add one upload field to start (this is the big one that asks you to upload something)
			var upload = _this.newUpload();
		}

		$j.each( _this.uploads, function(i, upload) {
			upload.state = selectedStepName;
		} );

		if ( callback ) {
			callback();
		}
	},

	/**
	 * add an Upload
	 *   we create the upload interface, a handler to transport it to the server,
	 *   and UI for the upload itself and the "details" at the second step of the wizard.
	 *   we don't yet add it to the list of uploads; that only happens when it gets a real file.
	 * @return the new upload
	 */
	newUpload: function() {
		var _this = this;
		if ( _this.uploads.length == _this.maxUploads ) {
			return false;
		}

		var upload = new mw.UploadWizardUpload( _this.api, '#mwe-upwiz-filelist' );
		_this.uploadToAdd = upload;

		// we explicitly move the file input to cover the upload button
		upload.ui.moveFileInputToCover( '#mwe-upwiz-add-file' );

		// we bind to the ui div since unbind doesn't work for non-DOM objects

		$j( upload.ui.div ).bind( 'filenameAccepted', function(e) { _this.updateFileCounts();  e.stopPropagation(); } );
		$j( upload.ui.div ).bind( 'removeUploadEvent', function(e) { _this.removeUpload( upload ); e.stopPropagation(); } );
		$j( upload.ui.div ).bind( 'filled', function(e) {
			_this.newUpload();
			_this.setUploadFilled(upload);
			e.stopPropagation();
		} );
		// XXX bind to some error state


		return upload;
	},

	/**
	 * When an upload is filled with a real file, accept it in the wizard's list of uploads
	 * and set up some other interfaces
	 * @param UploadWizardUpload
	 */
	setUploadFilled: function( upload ) {
		var _this = this;

		_this.uploads.push( upload );

		_this.updateFileCounts();

		upload.deedPreview = new mw.UploadWizardDeedPreview( upload );

		// TODO v1.1 consider if we really have to set up details now
		upload.details = new mw.UploadWizardDetails( upload, $j( '#mwe-upwiz-macro-files' ) );
	},

	/**
	 * Remove an upload from our array of uploads, and the HTML UI
	 * We can remove the HTML UI directly, as jquery will just get the parent.
         * We need to grep through the array of uploads, since we don't know the current index.
	 * We need to update file counts for obvious reasons.
	 *
	 * @param upload
	 */
	removeUpload: function( upload ) {
		var _this = this;
		// remove the div that passed along the trigger
		var $div = $j( upload.ui.div );
		$div.unbind(); // everything
		// sexily fade away (TODO if we are looking at it)
		//$div.fadeOut('fast', function() {
			$div.remove();
			// and do what we in the wizard need to do after an upload is removed
			mw.UploadWizardUtil.removeItem( _this.uploads, upload );
			_this.updateFileCounts();
		//} );
	},


	/**
	 * Hide the button choices at the end of the file step.
	 */
	hideFileEndButtons: function() {
		$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons .mwe-upwiz-file-endchoice' ).hide();
	},

	hideDetailsEndButtons: function() {
		$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-buttons .mwe-upwiz-file-endchoice' ).hide();
	},

	/**
	 * This is useful to clean out unused upload file inputs if the user hits GO.
	 * We are using a second array to iterate, because we will be splicing the main one, _this.uploads
	 */
	removeEmptyUploads: function() {
		this.removeMatchingUploads( function( upload ) {
			return mw.isEmpty( upload.ui.$fileInputCtrl.val() );
		} );
	},

	/**
	 * Clear out uploads that are in error mode, perhaps before proceeding to the next step
	 * @param {Function} to be called when done
	 */
	removeErrorUploads: function( endCallback ) {
		this.removeMatchingUploads( function( upload ) {
			return upload.state === 'error';
		} );
		endCallback();
	},


	/**
	 * This is useful to clean out file inputs that we don't want for some reason (error, empty...)
	 * We are using a second array to iterate, because we will be splicing the main one, _this.uploads
	 * @param Function criterion: function to test the upload, returns boolean; true if should be removed
	 */
	removeMatchingUploads: function( criterion ) {
		var toRemove = [];

		$j.each( this.uploads, function( i, upload ) {
			if ( criterion( upload ) ) {
				toRemove.push( upload );
			}
		} );

		$j.each( toRemove, function( i, upload ) {
			upload.remove();
		} );
	},



	/**
	 * Manage transitioning all of our uploads from one state to another -- like from "new" to "uploaded".
	 *
	 * @param beginState   what state the upload should be in before starting.
	 * @param progressState  the state to set the upload to while it's doing whatever
	 * @param endState   the state (or array of states) that signify we're done with this process
	 * @param starter	 function, taking single argument (upload) which starts the process we're interested in
	 * @param endCallback    function to call when all uploads are in the end state.
	 */
	makeTransitioner: function( beginState, progressStates, endStates, starter, endCallback ) {

		var _this = this;

		var transitioner = function() {
			var uploadsToStart = _this.maxSimultaneousConnections;
			var endStateCount = 0;
			$j.each( _this.uploads, function(i, upload) {
				if ( $j.inArray( upload.state, endStates ) !== -1 ) {
					endStateCount++;
				} else if ( $j.inArray( upload.state, progressStates ) !== -1 ) {
					uploadsToStart--;
				} else if ( ( upload.state == beginState ) && ( uploadsToStart > 0 ) ) {
					starter( upload );
					uploadsToStart--;
				}
			} );

			// build in a little delay even for the end state, so user can see progress bar in a complete state.
			var nextAction = ( endStateCount == _this.uploads.length ) ? endCallback : transitioner;

			setTimeout( nextAction, _this.transitionerDelay );
		};

		transitioner();
	},

	transitionerDelay: 200,  // milliseconds


	/**
	 * Kick off the upload processes.
	 * Does some precalculations, changes the interface to be less mutable, moves the uploads to a queue,
	 * and kicks off a thread which will take from the queue.
	 * @param endCallback   - to execute when uploads are completed
	 */
	startUploads: function() {
		var _this = this;

		// remove the upload button, and the add file button
		$j( '#mwe-upwiz-upload-ctrls' ).hide();
		_this.hideFileEndButtons();
		$j( '#mwe-upwiz-add-file' ).hide();

		// reset any uploads in error state back to be shiny & new
		$j.each( _this.uploads, function( i, upload ) {
			if ( upload.state === 'error' ) {
				upload.state = 'new';
				upload.ui.clearIndicator();
				upload.ui.clearStatus();
			}
		} );

		this.allowCloseWindow = mw.confirmCloseWindow( {
			message: function() { return gM( 'mwe-upwiz-prevent-close', _this.uploads.length ); },
			test: function() { return _this.uploads.length > 0; }
		} );

		$j( '#mwe-upwiz-progress' ).show();
		var progressBar = new mw.GroupProgressBar( '#mwe-upwiz-progress',
						           gM( 'mwe-upwiz-uploading' ),
						           _this.uploads,
							   [ 'stashed' ],
						           [ 'error' ],
							   'transportProgress',
							   'transportWeight' );
		progressBar.start();

		// remove ability to change files
		// ideally also hide the "button"... but then we require styleable file input CSS trickery
		// although, we COULD do this just for files already in progress...

		// it might be interesting to just make this creational -- attach it to the dom element representing
		// the progress bar and elapsed time

		_this.makeTransitioner(
			'new',
			[ 'transporting', 'transported', 'metadata' ],
			[ 'error', 'stashed' ],
			function( upload ) {
				upload.start();
			},
			function() {
				$j().notify( gM( 'mwe-upwiz-files-complete' ) );
				_this.showNext( 'file', 'stashed' );
		  	}
		);
	},

	/**
 	 * Figure out what to do and what options to show after the uploads have stopped.
	 * Uploading has stopped for one of the following reasons:
	 * 1) The user removed all uploads before they completed, in which case we are at upload.length === 0. We should start over and allow them to add new ones
	 * 2) All succeeded - show link to next step
	 * 3) Some failed, some succeeded - offer them the chance to retry the failed ones or go on to the next step
	 * 4) All failed -- have to retry, no other option
	 * In principle there could be other configurations, like having the uploads not all in error or stashed state, but
	 * we trust that this hasn't happened.
	 *
	 * @param {String} step that we are on
	 * @param {String} desired state to proceed (other state is assumed to be 'error')
	 */
	showNext: function( step, desiredState, allOkCallback ) {
		var errorCount = 0;
		var okCount = 0;
		$j.each( this.uploads, function( i, upload ) {
			if ( upload.state === 'error' ) {
				errorCount++;
			} else if ( upload.state === desiredState ) {
				okCount++;
			} else {
				mw.log( "mw.UploadWizardUpload::showFileNext> upload " + i + " not in appropriate state for filenext: " + upload.state );
			}
		} );
		var selector = null;
		var allOk = false;
		if ( okCount === this.uploads.length ) {
			allOk = true;
			selector = '.mwe-upwiz-file-next-all-ok';
		} else if ( errorCount === this.uploads.length ) {
			selector = '.mwe-upwiz-file-next-all-failed';
		} else {
			selector = '.mwe-upwiz-file-next-some-failed';
		}

		if ( allOk && mw.isDefined( allOkCallback ) ) {
			allOkCallback();
		} else {
			$j( '#mwe-upwiz-stepdiv-' + step + ' .mwe-upwiz-buttons' ).show().find( selector ).show();
		}
	},

	/**
	 * Occurs whenever we need to update the interface based on how many files there are
	 * Thhere is an uncounted upload, waiting to be used, which has a fileInput which covers the
	 * "add an upload" button. This is absolutely positioned, so it needs to be moved if another upload was removed.
	 * The uncounted upload is also styled differently between the zero and n files cases
	 *
	 * TODO in the case of aborting the only upload, we get kicked back here, but the file input over the add file
	 * button has been removed. How to get it back into "virginal" state?
	 */
	updateFileCounts: function() {
		var _this = this;

		if ( _this.uploads.length ) {
			// we have uploads ready to go, so allow us to proceed
			$j( '#mwe-upwiz-upload-ctrl-container' ).show();

			// changes the "click here to add files" to "add another file"
			$j( '#mwe-upwiz-add-file span' ).msg( 'mwe-upwiz-add-file-n' );
			$j( '#mwe-upwiz-add-file-container' ).removeClass('mwe-upwiz-add-files-0');
			$j( '#mwe-upwiz-add-file-container' ).addClass('mwe-upwiz-add-files-n');

			// add the styling to the filelist, so it has rounded corners and is visible and all.
			$j( '#mwe-upwiz-filelist' ).addClass( 'mwe-upwiz-filled-filelist' );

			// fix the rounded corners on file elements.
			// we want them to be rounded only when their edge touched the top or bottom of the filelist.
			$j( '#mwe-upwiz-filelist .filled .mwe-upwiz-visible-file' ).removeClass( 'ui-corner-top' ).removeClass( 'ui-corner-bottom' );
			$j( '#mwe-upwiz-filelist .filled .mwe-upwiz-visible-file:first' ).addClass( 'ui-corner-top' );
			$j( '#mwe-upwiz-filelist .filled .mwe-upwiz-visible-file:last' ).addClass( 'ui-corner-bottom' );
			$j( '#mwe-upwiz-filelist .filled:odd' ).addClass( 'odd' );
			$j( '#mwe-upwiz-filelist .filled:even' ).removeClass( 'odd' );
		} else {
			// no uploads, so don't allow us to proceed
			// $j( '#mwe-upwiz-upload-ctrl' ).attr( 'disabled', 'disabled' );
			$j( '#mwe-upwiz-upload-ctrl-container' ).hide();


			// remove the border from the filelist. We can't hide it or make it invisible since it contains the displaced
			// file input element that becomes the "click here to add"
			$j( '#mwe-upwiz-filelist' ).removeClass( 'mwe-upwiz-filled-filelist' );

			// we can't continue
			$j( '#mwe-upwiz-stepdiv-file .mwe-upwiz-buttons' ).hide();

			// change "add another file" into "click here to add a file"
			$j( '#mwe-upwiz-add-file span' ).msg( 'mwe-upwiz-add-file-0-free' );
			$j( '#mwe-upwiz-add-file-container' ).addClass('mwe-upwiz-add-files-0');
			$j( '#mwe-upwiz-add-file-container' ).removeClass('mwe-upwiz-add-files-n');

			// recovering from an earlier attempt to upload
			$j( '#mwe-upwiz-upload-ctrls' ).show();
			$j( '#mwe-upwiz-progress' ).hide();
			$j( '#mwe-upwiz-add-file' ).show();

			// reset buttons on the details page
			$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-file-next-some-failed' ).hide();
			$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-file-next-all-failed' ).hide();
			$j( '#mwe-upwiz-stepdiv-details .mwe-upwiz-start-next' ).show();

			// fix various other pages that may have state
			$j( '#mwe-upwiz-thanks' ).html( '' );

			if ( mw.isDefined( _this.deedChooser ) ) {
				_this.deedChooser.remove();
			}

			// remove any blocks on closing the window
			if ( mw.isDefined( _this.allowCloseWindow ) ) {
				_this.allowCloseWindow();
			}

			// and move back to the file step
			_this.moveToStep( 'file' );
		}

		// allow an "add another upload" button only if we aren't at max
		if ( _this.uploads.length < _this.maxUploads ) {
			$j( '#mwe-upwiz-add-file' ).removeAttr( 'disabled' );
			$j( _this.uploadToAdd.ui.div ).show();
			_this.uploadToAdd.ui.moveFileInputToCover( '#mwe-upwiz-add-file' );
		} else {
			$j( '#mwe-upwiz-add-file' ).attr( 'disabled', true );
			$j( _this.uploadToAdd.ui.div ).hide();
		}


	},


	/**
	 * are all the details valid?
	 * @return boolean
	 */
	detailsValid: function() {
		var _this = this;
		var valid = true;
		$j.each( _this.uploads, function(i, upload) {
			valid &= upload.details.valid();
		} );
		return valid;
	},

	/**
	 * Submit all edited details and other metadata
	 * Works just like startUploads -- parallel simultaneous submits with progress bar.
	 * @param {Function} endCallback - called when all uploads complete. In our case is probably a move to the next step
	 */
	detailsSubmit: function( endCallback ) {
		var _this = this;

		$j.each( _this.uploads, function( i, upload ) {
			$j( upload.details.submittingDiv )
				.find( '.mwe-upwiz-visible-file-filename-text' )
				.html( upload.title.getMain() );
		} );

		// remove ability to edit details
		$j( '#mwe-upwiz-stepdiv-details' )
			.find( '.mwe-upwiz-data' )
			.morphCrossfade( '.mwe-upwiz-submitting' );

		// hide errors ( assuming maybe this submission will fix it, if it hadn't blocked )
		$j( '#mwe-upwiz-stepdiv-details' ) 
			.find( 'label.mwe-error' )
			.hide().empty();

		$j( '#mwe-upwiz-stepdiv-details' ) 
			.find( 'input.mwe-error' )
			.removeClass( 'mwe-error' );

		// add the upload progress bar, with ETA
		// add in the upload count
		_this.makeTransitioner(
			'details',
			[ 'submitting-details' ],
			[ 'error', 'complete' ],
			function( upload ) {
				upload.details.submit();
			},
			endCallback /* called when all uploads are in a valid end state */
		);
	},

	/** 
	 * The details page can be vertically long so sometimes it is not obvious there are errors above. This counts them and puts the count
 	 * right next to the submit button, so it should be obvious to the user they need to fix things. 
	 * This is a bit of a hack. The validator library actually already has a way to count errors but some errors are generated
	 * outside of that library. So we are going to just look for any visible inputs in an error state.
	 */
	detailsErrorCount: function() {
		var errorCount = $( '#mwe-upwiz-stepdiv-details' ).find( 'input.mwe-error, textarea.mwe-error, input.mwe-validator-error, textarea.mwe-validator-error' ).length;
		if ( errorCount > 0 ) {
			$( '#mwe-upwiz-details-error-count' ).msg( 'mwe-upwiz-details-error-count', errorCount, this.uploads.length );
		} else {
			$( '#mwe-upwiz-details-error-count' ).empty();
		}
	},

	prefillThanksPage: function() {
		var _this = this;

		$j( '#mwe-upwiz-thanks' )
			.append( $j( '<h3 style="text-align: center;"></h3>' ).msg( 'mwe-upwiz-thanks-intro' ),
				 $j( '<p style="margin-bottom: 2em; text-align: center;">' )
					.msg( 'mwe-upwiz-thanks-explain', _this.uploads.length ) );

		$j.each( _this.uploads, function(i, upload) {
			var id = 'thanksDiv' + i;
			var $thanksDiv = $j( '<div></div>' ).attr( 'id', id ).addClass( "mwe-upwiz-thanks ui-helper-clearfix" );
			_this.thanksDiv = $thanksDiv;


			var $thumbnailDiv = $j( '<div></div>' ).addClass( 'mwe-upwiz-thumbnail' );
			var $thumbnailCaption = $j( '<div></div>' )
				.css( { 'text-align': 'center', 'font-size': 'small' } )
				.html( $j( '<a/>' ).html( upload.title.getMainText() ) );
			var $thumbnailWrapDiv = $j( '<div></div>' ).addClass( 'mwe-upwiz-thumbnail-side' );
			$thumbnailWrapDiv.append( $thumbnailDiv, $thumbnailCaption );
			upload.setThumbnail( $thumbnailDiv );

			// Set the thumbnail links so that they point to the image description page
			$thumbnailWrapDiv.find( 'a' ).attr( {
				'href': upload.imageinfo.descriptionurl,
				'target' : '_new'
			} );
			$thanksDiv.append( $thumbnailWrapDiv );

			var thumbWikiText = "[[" + upload.title.toText() + "|thumb|" + gM( 'mwe-upwiz-thanks-caption' ) + "]]";

			$thanksDiv.append(
				$j( '<div class="mwe-upwiz-data"></div>' )
					.append(
						$j('<p/>').append(
							gM( 'mwe-upwiz-thanks-wikitext' ),
							$j( '<br />' ),
							_this.makeReadOnlyInput( thumbWikiText )
						),
						$j('<p/>').append(
							gM( 'mwe-upwiz-thanks-url' ),
							$j( '<br />' ),
							_this.makeReadOnlyInput( upload.imageinfo.descriptionurl )
						)
					)
			);

			$j( '#mwe-upwiz-thanks' ).append( $thanksDiv );
		} );
	},

	/**
	 * make a read only text input, which self-selects on gaining focus
	 * @param {String} text it will contain
	 */
	makeReadOnlyInput: function ( s ) {
		return $j( '<input/>' ).addClass( 'mwe-title ui-corner-all' )
			.readonly()
			.val( s )
			.focus( function() { this.select(); } );
	},

	/**
	 * Set a cookie which lets the user skip the tutorial step in the future
	 */
	setSkipTutorialCookie: function() {
		var e = new Date();
		e.setTime( e.getTime() + (365*24*60*60*1000) ); // one year
		var cookieString='skiptutorial=1; expires=' + e.toGMTString() + '; path=/';
		document.cookie = cookieString;
	},

	/**
	 *
	 */
	pause: function() {

	},

	/**
	 *
	 */
	stop: function() {

	}

};

/**
 * Makes a modal dialog to confirm deletion of one or more uploads. Will have "Remove" and "Cancel" buttons
 * @param {Array} array of UploadWizardUpload objects
 * @param {String} message for dialog title
 * @param {String} message for dialog text, which will precede an unordered list of upload titles.
 */
mw.UploadWizardDeleteDialog = function( uploads, dialogTitle, dialogText ) {
	var $filenameList = $j( '<ul></ul>' );
	$j.each( uploads, function( i, upload ) {
		$filenameList.append( $j( '<li></li>' ).append( upload.title.getMain() ) );
	} );
	var buttons = {};
	buttons[ gM( 'mwe-upwiz-remove', uploads.length ) ] = function() {
		$j.each( uploads, function( i, upload ) {
			upload.remove();
		} );
		$j( this ).dialog( 'close' );
	};
	buttons[ gM( 'mwe-upwiz-cancel', uploads.length ) ] = function() {
		$j( this ).dialog( 'close' );
	};

	return $j( '<div></div>' )
		.append( $j( '<p></p>' ).append( dialogText ), $filenameList )
		.dialog( {
			width: 500,
			zIndex: 200000,
			autoOpen: false,
			title: dialogTitle,
			modal: true,
			buttons: buttons
		} );
};


mw.UploadWizardDeedPreview = function(upload) {
	this.upload = upload;
};

mw.UploadWizardDeedPreview.prototype = {
	setup: function() {
		var _this = this;
		// add a preview on the deeds page
		var thumbnailDiv = $j( '<div></div>' ).addClass( 'mwe-upwiz-thumbnail' );
		$j( '#mwe-upwiz-deeds-thumbnails' ).append( thumbnailDiv );
		_this.upload.setThumbnail( thumbnailDiv, mw.UploadWizard.config[  'thumbnailWidth'  ], mw.UploadWizard.config[ 'thumbnailMaxHeight' ] );
		_this.upload.deedThumbnailDiv = thumbnailDiv;
	}
};

} )( jQuery );

( function ( $j ) {

	$j.fn.notify = function ( message ) {
		// could do something here with Chrome's in-browser growl-like notifications.
		// play a sound?
		// if the current tab does not have focus, use an alert?
		// alert( message );
	};

	$j.fn.enableNextButton = function() {
		return this.find( '.mwe-upwiz-button-next' )
			.removeAttr( 'disabled' );
		//	.effect( 'pulsate', { times: 3 }, 1000 );
	};

	$j.fn.disableNextButton = function() {
		return this.find( '.mwe-upwiz-button-next' )
			.attr( 'disabled', true );
	};

	$j.fn.readonly = function() {
		return this.attr( 'readonly', 'readonly' ).addClass( 'mwe-readonly' );
	};

	/* will change in RTL, but I can't think of an easy way to do this with only CSS */
	$j.fn.requiredFieldLabel = function() {
		this.addClass( 'mwe-upwiz-required-field' );
		return this.prepend( $j( '<span/>' ).append( '*' ).addClass( 'mwe-upwiz-required-marker' ) );
	};

	/**
	 * Adds a tipsy pop-up help button to the field. Can be called in two ways -- with simple string id, which identifies
	 * the string as 'mwe-upwiz-tooltip-' plus that id, and creates the hint with a similar id
	 * or with function and id -- function will be called to generate the hint every time
	 * TODO v1.1 split into two plugins?
	 * @param key {string}  -- will base the tooltip on a message found with this key
	 * @param fn {function} optional -- call this function every time tip is created to generate message. If present HTML element gets an id of the exact key specified
	 */
	$j.fn.addHint = function( key, fn ) {
		var attrs, contentSource, html = false;
		if ( typeof fn === 'function' ) {
			attrs = { id: key };
			contentSource = fn;
			html = true;
		} else {
			attrs = { 'title': gM( 'mwe-upwiz-tooltip-' + key ) };
			contentSource = 'title';
		}
		return this.append(
			$j( '<span/>' )
				.addClass( 'mwe-upwiz-hint' )
				.attr( attrs )
				.click( function() { $j( this ).tipsy( 'toggle' ); return false; } )
				.tipsy( { title: contentSource, html: html, opacity: 1.0, gravity: 'sw', trigger: 'manual'} )
		);
	};

	/**
	 * jQuery extension. Makes a textarea automatically grow if you enter overflow
	 * (This feature was in the old Commons interface with a confusing arrow icon; it's nicer to make it automatic.)
	 */
	jQuery.fn.growTextArea = function( options ) {

		// this is a jquery-style object

		// in MSIE, this makes it possible to know what scrollheight is
		// Technically this means text could now dangle over the edge,
		// but it shouldn't because it will always grow to accomodate very quickly.

		if ($j.msie) {
			this.each( function(i, textArea) {
				textArea.style.overflow = 'visible';
			} );
		}

		var resizeIfNeeded = function() {
			// this is the dom element
			// is there a better way to do this?
			if (this.scrollHeight >= this.offsetHeight) {
				this.rows++;
				while (this.scrollHeight > this.offsetHeight) {
					this.rows++;
				}
			}
			return this;
		};

		this.addClass( 'mwe-grow-textarea' );

		this.bind( 'resizeEvent', resizeIfNeeded );

		this.keyup( resizeIfNeeded );
		this.change( resizeIfNeeded );


		return this;
	};

	// XXX this is highly specific to the "details" page now, not really jQuery function
	jQuery.fn.mask = function( options ) {

		// intercept clicks...
		// Note: the size of the div must be obtainable. Hence, this cannot be a div without layout (e.g. display:none).
		// some of this is borrowed from http://code.google.com/p/jquery-loadmask/ , but simplified
		$j.each( this, function( i, el ) {

			if ( ! $j( el ).data( 'mask' ) ) {


				//fix for z-index bug with selects in IE6
				if ( $j.browser.msie && $j.browser.version.substring(0,1) === '6' ){
					$j( el ).find( "select" ).addClass( "masked-hidden" );
				}

				var mask = $j( '<div class="mwe-upwiz-mask"></div>' )
						.css( {
							'backgroundColor' : 'white',
							'width'	   : el.offsetWidth + 'px',
							'height'   : el.offsetHeight + 'px',
							'z-index'  : 90
						} );

				var $statusDiv = $j( '<div></div>' ).css( {
					'width'	   : el.offsetWidth + 'px',
					'height'   : el.offsetHeight + 'px',
					'z-index'  : 91,
					'text-align' : 'center',
					'position' : 'absolute',
					'top' : '0px',
					'left' : '0px'
				} );

				var $indicatorDiv = $j( '<div class="mwe-upwiz-status"></div>' )
					.css( {
						'width'	   : 32,
						'height'   : 32,
						'z-index'  : 91,
						'margin'   : '0 auto 0 auto'
					} );
				var $statusLineDiv = $j( '<div></div>' )
					.css( {
						'z-index'  : 91
					} );
				var $statusIndicatorLineDiv = $j( '<div></div>' )
					.css( { 'margin-top': '6em' } )
					.append( $indicatorDiv, $statusLineDiv );
			        $statusDiv.append( $statusIndicatorLineDiv );

				$j( el ).css( { 'position' : 'relative' } )
					.append( mask.fadeTo( 'fast', 0.6 ) )
					.append( $statusDiv )
					.data( 'indicator', $indicatorDiv )
					.data( 'statusLine', $statusLineDiv );

			}
		} );

		return this;

	};

	// n.b. this is not called currently -- all uses of mask() are permanent
	jQuery.fn.unmask = function( options ) {

		$j.each( this, function( i, el ) {
			if ( $j( el ).data( 'mask' ) ) {
				var mask = $j( el ).data( 'mask' );
				$j( el ).removeData( 'mask' ); // from the data
				mask.remove(); // from the DOM
				$j( el ).fadeTo( 'fast', 1.0 );
			}
		} );


		return this;
	};

	/**
	 * jQuery plugin - collapse toggle
	 * Given an element, makes contained elements of class mw-collapsible-toggle clickable to show/reveal
	 * contained element(s) of class mw-collapsible-content.
	 *
	 * Somewhat recapitulates mw.UploadWizardUtil.makeToggler,
	 * toggle() in vector.collapsibleNav.js, not to mention jquery.collapsible
	 * but none of those do what we want, or are inaccessible to us
	 *
	 * TODO needs to iterate through elements, if we want to apply toggling behavior to many elements at once
	 */
	jQuery.fn.collapseToggle = function() {
		var $el = this;
		var $contents = $el.find( '.mwe-upwiz-toggler-content' ).hide();
		var $toggle = $el.find( '.mwe-upwiz-toggler' ).addClass( 'mwe-upwiz-more-options' );
		$toggle.click( function( e ) {
			e.stopPropagation();
			if ( $toggle.hasClass( 'mwe-upwiz-toggler-open' ) ) {
				$contents.slideUp( 250 );
				$toggle.removeClass( 'mwe-upwiz-toggler-open' );
			} else {
				$contents.slideDown( 250 );
				$toggle.addClass( 'mwe-upwiz-toggler-open' );
			}
		} );
		return this;
	};

	$j.validator.setDefaults( {
		debug: true,
		errorClass: 'mwe-validator-error'
	} );

} )( jQuery );

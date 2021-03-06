/**
 * mediaSource class represents a source for a media element.
 *
 * @param {Element}
 *      element: MIME type of the source.
 * @constructor
 */

/**
 * The base source attribute checks also see:
 * http://dev.w3.org/html5/spec/Overview.html#the-source-element
 */

( function( mw, $ ) {
	
mw.mergeConfig( 'EmbedPlayer.SourceAttributes', [
	// source id
	'id',

	// media url
	'src',

	// Title string for the source asset
	'title',

	// boolean if we support temporal url requests on the source media
	'URLTimeEncoding',

	/* data- attributes ( not yet standards ) 
	* NOTE data- is striped from the attribute once added to the MediaSrouce object
	*/
	
	// Media has a startOffset ( used for plugins that
	// display ogg page time rather than presentation time
	'data-startoffset',

	// A hint to the duration of the media file so that duration
	// can be displayed in the player without loading the media file
	'data-durationhint',
	
	// Source stream qualities ( will eventually be adaptive streaming )
	'data-shorttitle', // short title for stream ( useful for stream switching control bar widget) 
	'data-width', // the width of the stream
	'data-height', // the height of the stream
	'data-bandwidth', // the overall bitrate of the stream
	'data-framerate', // the framereate of the stream
	
	// Media start time
	'start',

	// Media end time
	'end',

	// If the source is the default source
	'default'
] );

mw.MediaSource = function( element ) {
	this.init( element );
}

mw.MediaSource.prototype = {
	// True if the source has been marked as the default.
	markedDefault: false,

	// True if the source supports url specification of offset and duration
	URLTimeEncoding:false,

	// Start offset of the requested segment
	startOffset: 0,

	// Duration of the requested segment (0 if not known)
	duration:0,

	/**
	 * MediaSource constructor:
	 */
	init : function( element ) {
		// mw.log('EmbedPlayer::adding mediaSource: ' + element);
		this.src = $( element ).attr( 'src' );

		// Set default URLTimeEncoding if we have a time url:
		// not ideal way to discover if content is on an oggz_chop server.
		// should check some other way.
		var pUrl = new mw.Uri ( this.src );
		if ( typeof pUrl.query[ 't' ] != 'undefined' ) {
			this.URLTimeEncoding = true;
		}

		var sourceAttr = mw.getConfig( 'EmbedPlayer.SourceAttributes' );
		for ( var i = 0; i < sourceAttr.length; i++ ) { // array loop:
			var attr = sourceAttr[ i ];
			var attrValue = $( element ).attr( attr );			
			if ( attrValue ) {
				// strip data- from the attribute name
				if( attr.indexOf('data-') === 0){
					attr = attr.substr(5);
				}
				this[ attr ] = attrValue;
			}
		}

		// Set the content type:
		if ( $( element ).attr( 'type' ) ) {
			this.mimeType = $( element ).attr( 'type' );
		}else if ( $( element ).attr( 'content-type' ) ) {
			this.mimeType = $( element ).attr( 'content-type' );
		}else if( $( element ).get(0).tagName.toLowerCase() == 'audio' ){
			// If the element is an "audio" tag set audio format
			this.mimeType = 'audio/ogg';
		} else {
			this.mimeType = this.detectType( this.src );
		}

		// Conform the mime type to ogg
		if( this.mimeType == 'video/theora') {
			this.mimeType = 'video/ogg';
		}

		if( this.mimeType == 'audio/vorbis') {
			this.mimeType = 'audio/ogg';
		}

		// Check for parent elements ( supplies categories in "track" )
		if( $( element ).parent().attr('category') ) {
			this.category = $( element ).parent().attr('category');
		}

		if( $( element ).attr( 'default' ) ){
			this.markedDefault = true;
		}

		// Get the url duration ( if applicable )
		this.getURLDuration();
	},

	/**
	 * Update Source title via Element
	 *
	 * @param {Element}
	 *      element Source element to update attributes from
	 */
	updateSource: function( element ) {
		// for now just update the title:
		if ( $( element ).attr( "title" ) ) {
			this.title = $( element ).attr( "title" );
		}
	},

	/**
	 * Updates the src time and start & end
	 *
	 * @param {String}
	 *      start_time: in NPT format
	 * @param {String}
	 *      end_time: in NPT format
	 */
	updateSrcTime: function ( start_npt, end_npt ) {
		// mw.log("f:updateSrcTime: "+ start_npt+'/'+ end_npt + ' from org: ' +
		// this.start_npt+ '/'+this.end_npt);
		// mw.log("pre uri:" + this.src);
		// if we have time we can use:
		if ( this.URLTimeEncoding ) {
			// make sure its a valid start time / end time (else set default)
			if ( !mw.npt2seconds( start_npt ) ) {
				start_npt = this.start_npt;
			}

			if ( !mw.npt2seconds( end_npt ) ) {
				end_npt = this.end_npt;
			}

			this.src = mw.replaceUrlParams( this.src, {
				't': start_npt + '/' + end_npt
			});

			// update the duration
			this.getURLDuration();
		}
	},

	/**
	 * Sets the duration and sets the end time if unset
	 *
	 * @param {Float}
	 *      duration: in seconds
	 */
	setDuration: function ( duration ) {
		this.duration = duration;
		if ( !this.end_npt ) {
			this.end_npt = mw.seconds2npt( this.startOffset + duration );
		}
	},

	/**
	 * MIME type accessors function.
	 *
	 * @return {String} the MIME type of the source.
	 */
	getMIMEType: function() {
		if( this.mimeType ) {
			return this.mimeType;
		}
		this.mimeType = this.detectType( this.src );
		return this.mimeType;
	},

	/**
	 * URI function.
	 *
	 * @param {Number}
	 *      serverSeekTime Int: Used to adjust the URI for url based
	 *      seeks)
	 * @return {String} the URI of the source.
	 */
	getSrc: function( serverSeekTime ) {
		if ( !serverSeekTime || !this.URLTimeEncoding ) {
			return this.src;
		}
		var endvar = '';
		if ( this.end_npt ) {
			endvar = '/' + this.end_npt;
		}
		return mw.replaceUrlParams( this.src,
			{
				't': mw.seconds2npt( serverSeekTime ) + endvar
	  		}
		);
	},

	/**
	 * Title accessor function.
	 *
	 * @return {String} Title of the source.
	 */
	getTitle : function() {
		if( this.title ){
			return this.title;
		}
		// Text tracks use "label" instead of "title" 
		if( this.label ){
			return this.label;
		}

		// Return a Title based on mime type:
		switch( this.getMIMEType() ) {
			case 'video/h264' :
				return gM( 'mwe-embedplayer-video-h264' );
			break;
			case 'video/x-flv' :
				return gM( 'mwe-embedplayer-video-flv' );
			break;
			case 'video/webm' :
				return gM( 'mwe-embedplayer-video-webm');
			break;
			case 'video/ogg' :
				return gM( 'mwe-embedplayer-video-ogg' );
			break;
			case 'audio/ogg' :
				return gM( 'mwe-embedplayer-video-audio' );
			break;
			case 'video/mpeg' :
				return 'MPEG video'; // FIXME: i18n
			break;
			case 'video/x-msvideo' :
				return 'AVI video'; // FIXME: i18n
			break;
		}

		// Return title based on file name:
		try{
			var fileName = new mw.Uri( this.getSrc() ).path.split('/').pop();
			if( fileName ){
				return fileName;
			}
		} catch(e){}

		// Return the mime type string if not known type.
		return this.mimeType;
	},

	/**
	 *
	 * Get Duration of the media in milliseconds from the source url.
	 *
	 * Supports media_url?t=ntp_start/ntp_end url request format
	 */
	getURLDuration : function() {
		// check if we have a URLTimeEncoding:
		if ( this.URLTimeEncoding ) {
			var annoURL = new mw.Uri( this.src );
			if ( annoURL.query.t ) {
				var times = annoURL.query.t.split( '/' );
				this.start_npt = times[0];
				this.end_npt = times[1];
				this.startOffset = mw.npt2seconds( this.start_npt );
				this.duration = mw.npt2seconds( this.end_npt ) - this.startOffset;
			} else {
				// look for this info as attributes
				if ( this.startOffset ) {
					this.start_npt = mw.seconds2npt( this.startOffset );
				}
				if ( this.duration ) {
					this.end_npt = mw.seconds2npt( parseInt( this.duration ) + parseInt( this.startOffset ) );
				}
			}
		}
	},

	/**
	 * Attempts to detect the type of a media file based on the URI.
	 *
	 * @param {String}
	 *      uri URI of the media file.
	 * @return {String} The guessed MIME type of the file.
	 */
	detectType: function( uri ) {
		// NOTE: if media is on the same server as the javascript
		// we can issue a HEAD request and read the mime type of the media...
		// ( this will detect media mime type independently of the url name )
		// http://www.jibbering.com/2002/4/httprequest.html
		var ext ='';
		try{
			ext = /[^.]+$/.exec( new mw.Uri( uri ).path );
		} catch ( e){ 
			ext =  /[^.]+$/.exec( uri );	
		};
		
		// Get the extension from the url or from the relative name: 
		switch( ext.toString().toLowerCase() ) {
			case 'smil':
			case 'sml':
				return 'application/smil';
			break;
			case 'm4v':
			case 'mp4':
				return 'video/h264';
			break;
			case 'webm':
				return 'video/webm';
			break;
			case 'srt':
				return 'text/x-srt';
			break;
			case 'flv':
				return 'video/x-flv';
			break;
			case 'ogg':
			case 'ogv':
				return 'video/ogg';
			break;
			case 'oga':
				return 'audio/ogg';
			break;
			case 'anx':
				return 'video/ogg';
			break;
			case 'xml':
				return 'text/xml';
			break;
			case 'avi':
				return 'video/x-msvideo';
			break;
			case 'mpg':
				return 'video/mpeg';
			break;
			case 'mpeg':
				return 'video/mpeg';
			break;
		}
		mw.log( "Error: could not detect type of media src: " + uri );
	}
};

} )( mediaWiki, jQuery );
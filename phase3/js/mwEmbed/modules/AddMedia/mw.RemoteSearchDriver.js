/**
 * mw.RemoteSearchDriver
 *
 * Provides a base interface for the Add-Media-Wizard
 * supporting remote searching of http archives for free images/audio/video assets
 *
 * Is optionally extended by Sequence Remote Search Driver
 */

mw.addMessages( {
	"mwe-add_media_wizard" : "Add media wizard",
	"mwe-media_search" : "Media search",
	"rsd_box_layout" : "Box layout",
	"rsd_list_layout" : "List layout",
	"rsd_results_desc" : "Results $1 to $2",
	"rsd_results_desc_total" : "Results $1 to $2 of $3",
	"rsd_results_next" : "next",
	"rsd_results_prev" : "previous",
	"rsd_no_results" : "No search results for <b>$1<\/b>",
	"mwe-upload_tab" : "Upload",
	"rsd_layout" : "Layout:",
	"rsd_resource_edit" : "Edit resource: $1",
	"mwe-resource_description_page" : "Resource description page",
	"mwe-link" : "link",
	"rsd_do_insert" : "Do insert",
	"mwe-cc_title" : "Creative Commons",
	"mwe-cc_by_title" : "Attribution",
	"mwe-cc_nc_title" : "Noncommercial",
	"mwe-cc_nd_title" : "No Derivative Works",
	"mwe-cc_sa_title" : "Share Alike",
	"mwe-cc_pd_title" : "Public Domain",
	"mwe-unknown_license" : "Unknown license",
	"mwe-no_import_by_url" : "This user or wiki <b>cannot<\/b> import assets from remote URLs.<p>Do you need to login?<\/p><p>Is upload_by_url permission set for you?<br \/>Does the wiki have <a href=\"http:\/\/www.mediawiki.org\/wiki\/Manual:$wgAllowCopyUploads\">$wgAllowCopyUploads<\/a> enabled?<\/p>",
	"mwe-results_from" : "Results from <a href=\"$1\" target=\"_new\" >$2<\/a>",
	"mwe-missing_desc_see_source" : "This asset is missing a description. Please see the [$1 original source] and help describe it.",
	"rsd_config_error" : "Add media wizard configuration error: $1",
	"mwe-your_recent_uploads" : "Your recent uploads to $1",
	"mwe-no_recent_uploads" : "No recent uploads",
	"mwe-upload_a_file" : "Upload a new file to $1",
	"mwe-resource_page_desc" : "Resource page description:",
	"mwe-edit_resource_desc" : "Edit wiki text resource description:",
	"mwe-local_resource_title" : "Local resource title:",
	"mwe-watch_this_page" : "Watch this page",
	"mwe-do_import_resource" : "Import resource",
	"mwe-update_preview" : "Update resource page preview",
	"mwe-cancel_import" : "Cancel import",
	"mwe-importing_asset" : "Importing asset",
	"mwe-preview_insert_resource" : "Preview insert of resource: $1",
	"mwe-checking-resource" : "Checking for resource",
	"mwe-resource-needs-import" : "Resource $1 needs to be imported to $2",
	"mwe-ftype-svg" : "SVG vector file",
	"mwe-ftype-jpg" : "JPEG image file",
	"mwe-ftype-png" : "PNG image file",
	"mwe-ftype-oga" : "Ogg audio file",
	"mwe-ftype-ogg" : "Ogg video file",
	"mwe-ftype-unk" : "Unknown file format",
	
	"rsd-wiki_commons-title": "Wikimedia Commons",
	"rsd-wiki_commons": "Wikimedia Commons, an archive of freely-licensed educational media content (images, sound and video clips)",

	"rsd-kaltura-title" : "All Sources",
	"rsd-kaltura" : "Kaltura agragated search for free-licenced media across multiple search providers",

	"rsd-this_wiki-title" : "This wiki",
	"rsd-this_wiki-desc" : "The local wiki install",

	"rsd-archive_org-title": "Archive.org",
	"rsd-archive_org-desc" : "The Internet Archive, a digital library of cultural artifacts",

	"rsd-flickr-title" : "Flickr.com",
	"rsd-flickr-desc" : "Flickr.com, a online photo sharing site",
	"rsd-metavid-title" : "Metavid.org",
	"rsd-metavid-desc" : "Metavid.org, a community archive of US House and Senate floor proceedings",
	
	"rsd-search-timeout" : "The search request did not complete. The server may be down experiencing heavy load. You can try again later"
} );

/**
* default_remote_search_options
* 
* Options for initialising the remote search driver
*/
var default_remote_search_options = {

	// The div that will hold the search interface
	'target_container': null, 

	// The target button or link that will invoke the search interface
	'target_invoke_button': null, 
	
	// The local wiki api url usually: wgServer + wgScriptPath + '/api.php'
	'local_wiki_api_url': null,

	/**
	* import_url_mode
	*  Can be 'api', 'autodetect', 'remote_link'
	*  api: uses the mediawiki api to insert the media asset
	*  autodetect: checks for api support before using the api to insert the media asset
	*  remote_link: hot-links the media directly into the page as html
	*/	
	'import_url_mode': 'api',
	
	// Target title used for previews of wiki page usally: wgPageName
	'target_title': null,

	// Edit tools (can be an array of tools or keyword 'all')
	'enabled_tools': 'all',

	// Target text box 
	'target_textbox': null,
	
	// Where output render should go:
	'target_render_area': null,
	 
	// Default search query
	'default_query': null, 

	// Canonical namespace prefix for images/ files
	'canonicalFileNS': 'File', 	                 

	// The api target can be "local" or the url or remote api entry point
	'upload_api_target': 'local', 
	
	// Name of the upload target
	'upload_api_name': null,
	
	// Name of the remote proxy page that will host the iframe api callback 
	'upload_api_proxy_frame': null,  

	// Enabled providers can be keyword 'all' or an array of enabled content provider keys
	'enabled_providers': 'all', 
	
	// Set a default provider 
	'default_provider': null,
	
	// Current provider (used internally) 
	'current_provider': null,
	
	// The timeout for search providers ( in seconds )
	'search_provider_timeout': 10
};

/*
* Set the jQuery bindings: 
*/ 
( function( $ ) {

	$.fn.addMediaWizard = function( options, callback ) {
		options['target_invoke_button'] = this.selector;
		options['instance_name'] = 'rsdMVRS';
		window['rsdMVRS'] = new mw.RemoteSearchDriver( options );
		if( callback ) {
			callback( window['rsdMVRS'] );
		}
	}
	
	$.addMediaWizard = function( options ){
		$.fn.addMediaWizard ( options, function( amwObj ) {
			// do the add-media-wizard display
			amwObj.createUI();
		} )
	}
	
} )( jQuery );
/**
* Set the mediaWiki globals if unset
*/
if ( typeof wgServer == 'undefined' )
	wgServer = '';
if ( typeof wgScriptPath == 'undefined' )
	wgScriptPath = '';
if ( typeof stylepath == 'undefined' )
	stylepath = '';

/**
* Base remoteSearch Driver interface
*/
mw.RemoteSearchDriver = function( options ) {
	return this.init( options );
}

mw.RemoteSearchDriver.prototype = {

	// Result cleared flag
	results_cleared: false,
	
	// Caret position of target text area ( lazy initialized )
	caretPos: null, 
	
	// Text area value ( lazy initialized )
	textboxValue: null, 

	/** the default content providers list.
	 *
	 * (should be note that special tabs like "upload" and "combined" don't go into the content providers list:
	 * @note do not use double underscore in content providers names (used for id lookup)
	 *
	 * @@todo we will want to load more per user-preference and per category lookup
	 */
	content_providers: {
		/** 
		*  Content_providers documentation
		*
		*	@enabled: whether the search provider can be selected		
		*
		*	@default: default: if the current cp should be displayed (only one should be the default)
		*
		*	@title: the title of the search provider
		*
		*	@desc: can use html
		*
		* 	@homepage: the homepage url for the search provider
		*
		*	@api_url: the url to query against given the library type:
		*	
		*	@lib: the search library to use corresponding to the
		*		search object ie: 'mediaWiki' = new mediaWikiSearchSearch()
		*
		*	@tab_img: the tab image (if set to false use title text)
		*		if === "true" use standard location skin/images/{cp_id}_tab.png
		*		if === string use as url for image
		*
		*	@linkback_icon default is: /wiki/skins/common/images/magnify-clip.png
		*
		*	//domain insert: two modes: simple config or domain list:
		*	@local : if the content provider assets need to be imported or not.
		*
		*	@local_domains : sets of domains for which the content is local
		*
		*	@resource_prefix : A string to prepend to the title key
		*
		* 	@check_shared :  if we should check for shared repository asset
		*
		 */
		 
		/*
		* Local wiki search
		*/
		'this_wiki': {
			'enabled': 1,
			'api_url':  ( wgServer && wgScriptPath ) ? 
				wgServer + wgScriptPath + '/api.php' : null,
			'lib': 'mediaWiki',
			'local': true,
			'tab_img': false
		},
		
		/**
		* Kaltura aggregated search
		*/ 
		'kaltura': {
			'enabled': 1,
			'homepage': 'http://kaltura.com',
			'api_url': 'http://kaldev.kaltura.com/michael/aggregator.php',
			'lib': 'kaltura',
			'resource_prefix' : '',
			'tab_image':false
		},
		
		/**
		* Wikipedia Commons search provider configuration
		*/
		'wiki_commons': {
			'enabled': 1,
			'homepage': 'http://commons.wikimedia.org/wiki/Main_Page',
			'api_url': 'http://commons.wikimedia.org/w/api.php',
			'lib': 'mediaWiki',
			'tab_img': true,
			'resource_prefix': 'WC_', // prefix on imported resources (not applicable if the repository is local)

			// Commons can be enabled as a remote repo do check shared 
			'check_shared': true,

			// List all the domains where commons is local ( lets you avoid an api check for "shared" repo )			
			'local_domains': [ 'wikimedia', 'wikipedia', 'wikibooks' ],					
			
			// Specific to wiki commons config:
			// If we should search the title
			'search_title': false 
		},
		
		/**
		* Internet archive search provider configuration
		*/
		'archive_org': {
			'enabled': 1,
			'homepage': 'http://www.archive.org/about/about.php',

			'api_url': 'http://www.archive.org/advancedsearch.php',
			'lib': 'archiveOrg',
			'local': false,
			'resource_prefix': 'AO_',
			'tab_img': true
		},
		
		/**
		* Flickr search provider configuration
		*/
		'flickr': {
			'enabled': 1,
			'homepage': 'http://www.flickr.com/about/',

			'api_url': 'http://www.flickr.com/services/rest/',
			'lib': 'flickr',
			'local': false,
			// Just prefix with Flickr_ for now.
			'resource_prefix': 'Flickr_',
			'tab_img': true
		},
		
		/**
		* Metavid search provider configuration
		*/
		'metavid': {
			'enabled': 1,
			'homepage': 'http://metavid.org/wiki/Metavid_Overview',
			'api_url': 'http://metavid.org/w/index.php?title=Special:MvExportSearch',
			'lib': 'metavid',			
			'local': false, 
			
			// MV prefix for metavid imported resources
			'resource_prefix': 'MV_', 
			
			// if the domain name contains metavid
			// no need to import metavid content to metavid sites
			'local_domains': ['metavid'], 
			
			// which stream to import, could be mv_ogg_high_quality
			// or flash stream, see ROE xml for keys
			'stream_import_key': 'mv_ogg_low_quality', 
			
			// if running the remoteEmbed extension no need to copy local
			// syntax will be [remoteEmbed:roe_url link title]
			'remote_embed_ext': false, 
			
			'tab_img': true
		},
		
		/**
		* Special Upload tab provider 
		*/ 
		'upload': {
			'enabled': 1,
			'title': 'Upload'
		}
	},

	/**
	* License define: 	
	* 
	* NOTE: we only support creative commons type licenses
	*
	* Based on listing: http://creativecommons.org/licenses/
	*/
	licenses: {
		'cc': {
			'base_img_url':'http://upload.wikimedia.org/wikipedia/commons/thumb/',
			'base_license_url': 'http://creativecommons.org/licenses/',
			'licenses': [
				'by',
				'by-sa',
				'by-nc-nd',
				'by-nc',
				'by-nd',
				'by-nc-sa',
				'by-sa',
				'pd'
			],
			'license_images': {
				'by': {
					'image_url': '1/11/Cc-by_new_white.svg/20px-Cc-by_new_white.svg.png'
				},
				'nc': {
					'image_url': '2/2f/Cc-nc_white.svg/20px-Cc-nc_white.svg.png'
				},
				'nd': {
					'image_url': 'b/b3/Cc-nd_white.svg/20px-Cc-nd_white.svg.png'
				},
				'sa': {
					'image_url': 'd/df/Cc-sa_white.svg/20px-Cc-sa_white.svg.png'
				},
				'pd': {
					'image_url': '5/51/Cc-pd-new_white.svg/20px-Cc-pd-new_white.svg.png'
				}
			}
		}
	},

	// Width of image resources 
	thumb_width: 80,
	
	// The width of an image when editing 
	image_edit_width: 400,
	
	// The width of the video embed while editing the resource 
	video_edit_width: 400,
	
	// The insert position of the asset (overwritten by cursor position) 
	insert_text_pos: 0, 
	
	// Default display mode of search results
	displayMode : 'box', // box or list

	// The ClipEdit Object
	clipEdit: null,
	
	// A flag for proxy setup. 
	proxySetupDone: null,
	
	/**
	* The initialisation function
	*
	* @param {Object} options Options to override: default_remote_search_options
	*/
	init: function( options ) {
		var _this = this;
		mw.log( 'remoteSearchDriver:init' );
		// Add in a local "id" reference to each provider
		for ( var cp_id in this.content_providers ) {
			this.content_providers[ cp_id ].id = cp_id;
		}
		// Merge in the options		
		$j.extend( _this, default_remote_search_options, options );

		// Quick fix for cases where {object} ['all'] is used instead of {string} 'all' for enabled_providers:
		if ( _this.enabled_providers.length == 1 && _this.enabled_providers[0] == 'all' )
			_this.enabled_providers = 'all';

		// Set the current_provider from default_provider
		if( this.default_provider && this.content_providers[ this.default_provider ] ){
			this.current_provider = this.default_provider;
		}

		// Set up content_providers
		for ( var provider_id in this.content_providers ) {
			var provider = this.content_providers[ provider_id ];
			// Set the provider id
			provider[ 'id' ] = provider_id
				
			if ( _this.enabled_providers == 'all' && !this.current_provider && provider.api_url ) {
				this.current_provider = provider_id;
				break;
			} else {
				if ( $j.inArray( provider_id, _this.enabled_providers ) != -1 ) {
					// This provider is enabled
					this.content_providers[ provider_id ].enabled = true;
					// Set the current provider to the first enabled one
					if ( !this.current_provider ) {
						this.current_provider = provider_id;
					}
				} else {
					// This provider is disabled
					if ( _this.enabled_providers != 'all' ) {
						this.content_providers[ provider_id ].enabled = false;
					}
				}
			}
		}

		// Set the upload target name if unset
		if ( _this.upload_api_target == 'local' 
			&& ! _this.upload_api_name 
			&& typeof wgServer != 'undefined' )
		{
			_this.upload_api_name =  mw.parseUri( wgServer ).host;
		} else {
			// Disable upload tab if no target is avaliable 
			this.content_providers[ 'upload' ].enabled = false;
		}

		// Set the target to "proxy" if a proxy frame is configured
		if ( _this.upload_api_proxy_frame )
			_this.upload_api_target = 'proxy';

		// Set up the local API upload URL
		if ( _this.upload_api_target == 'local' ) {
			if ( ! _this.local_wiki_api_url ) {
				this.$resultsContainer.html( gM( 'rsd_config_error', 'missing_local_api_url' ) );
				return false;
			} else {
				_this.upload_api_target = _this.local_wiki_api_url;
			}
		}
		
		// Set up the "add media wizard" button, which invokes this object
		if ( !this.target_invoke_button || $j( this.target_invoke_button ).length == 0 ) {
			mw.log( "RemoteSearchDriver:: no target invocation provided " + 
				"(will have to run your own createUI() )" );
		} else {
			if ( this.target_invoke_button ) {
				$j( this.target_invoke_button )
					.css( 'cursor', 'pointer' )
					.attr( 'title', gM( 'mwe-add_media_wizard' ) )
					.click( function() {
						_this.createUI();
						return false;
					} );
			}
		}
		return this;
	},

	/**
	 * Get license icon html
	 * @param license_key  the license key (ie "by-sa" or "by-nc-sa" etc)
	 */
	getLicenseIconHtml: function( licenseObj ) {
		// mw.log('output images: '+ imgs);
		return '<div class="rsd_license" title="' + licenseObj.title + '" >' +
			'<a target="_new" href="' + licenseObj.lurl + '" ' +
			'title="' + licenseObj.title + '">' +
			licenseObj.img_html +
			'</a>' +
			'</div>';
	},

	/**
	 * Get License From License Key
	 * @param license_key the key of the license (must be defined in: this.licenses.cc.licenses)
	 */
	getLicenseFromKey: function( license_key, force_url ) {
		// Set the current license pointer:
		var cl = this.licenses.cc;
		var title = gM( 'mwe-cc_title' );
		var imgs = '';
		var license_set = license_key.split( '-' );
		for ( var i = 0; i < license_set.length; i++ ) {
			var lkey = license_set[i];
			if ( !cl.license_images[ lkey ] ) {
				mw.log( "MISSING::" + lkey );
			}

			title += ' ' + gM( 'mwe-cc_' + lkey + '_title' );
			imgs += '<img class="license_desc" width="20" src="' +
				cl.base_img_url + cl.license_images[ lkey ].image_url + '">';
		}
		var url = ( force_url ) ? force_url : cl.base_license_url + cl.licenses[ license_key ];
		return {
			'title': title,
			'img_html': imgs,
			'key': license_key,
			'lurl': url
		};
	},

	/**
	 * Get license key from a license Url
	 *
	 * @param license_url the url of the license
	 */
	getLicenseFromUrl: function( license_url ) {
		// Check for some pre-defined url types:
		if ( license_url == 'http://www.usa.gov/copyright.shtml' ||
			license_url == 'http://creativecommons.org/licenses/publicdomain' )
			return this.getLicenseFromKey( 'pd' , license_url );
		
		// First do a direct lookup check:
		for ( var j = 0; j < this.licenses.cc.licenses.length; j++ ) {
			var jLicense = this.licenses.cc.licenses[ j ];
			// Special 'pd' case:
			if ( jLicense == 'pd' ) {
				var keyCheck = 'publicdomain';
			} else {
				var keyCheck = jLicense;
			}
			// Check the license_url for a given key
			if ( mw.parseUri( license_url ).path.indexOf( '/' + keyCheck + '/' ) != -1 ) {
				return this.getLicenseFromKey( jLicense , license_url );
			}
		}
		// Could not find it return mwe-unknown_license
		return {
			'title': gM( 'mwe-unknown_license' ),
			'img_html': '<span>' + gM( 'mwe-unknown_license' ) + '</span>',
			'lurl': license_url
		};
	},

	/**
	* Get mime type icon from a provided mime type
	* @param str mime type of the requested file
	*/
	getTypeIcon: function( mimetype ) {
		var type = 'unk';
		switch ( mimetype ) {
			case 'image/svg+xml':
				type = 'svg';
				break;
			case 'image/jpeg':
				type = 'jpg'
				break;
			case 'image/png':
				type = 'png';
				break;
			case 'audio/ogg':
				type = 'oga';
			case 'video/ogg':
			case 'application/ogg':
				type = 'ogg';
				break;
		}

		if ( type == 'unk' ) {
			mw.log( "unkown ftype: " + mimetype );
			return '';
		}

		return '<div ' + 
			'class="rsd_file_type ui-corner-all ui-state-default ui-widget-content" ' + 
			'title="' + gM( 'mwe-ftype-' + type ) + '">' +
			type  +
			'</div>';
	},
	
	/**
	* createUI
	*
	* Creates the remote search driver User Interface  
	*/
	createUI: function() {
		var _this = this;

		this.clearTextboxCache();
		
		// Setup the parent container:
		this.createDialogContainer();
		
		// Setup remote search dialog & bindings 
		this.initDialog();

		// Update the target binding to just un-hide the dialog:
		if ( this.target_invoke_button ) {
			$j( this.target_invoke_button )
				.unbind()
				.click( function() {
					mw.log( "createUI:target_invoke_button: click showDialog" );
					 _this.showDialog();
					 return false;
				 } );
		}
	},
	
	/**
	* showDialog
	* Displays a dialog 
	*/
	showDialog: function() {
		var _this = this;
		mw.log( "showDialog::" );
		
		// Check if dialog target is present: 
		if( $j( _this.target_container ).length == 0 ){
			this.createUI();
			return ;
		}
		
		_this.clearTextboxCache();
		var query = _this.getDefaultQuery();
		
		// Refresh the container if "upload" or "changed query"  
		if ( query !=  $j( '#rsd_q' ).val() 
			|| 
			this.current_provider == 'upload' )  
		{
			$j( '#rsd_q' ).val( query );
			_this.updateResults();
		}
		// $j(_this.target_container).dialog("open");
		$j( _this.target_container ).parents( '.ui-dialog' ).fadeIn( 'slow' );
		
	
		
		// re-center the dialog:
		$j( _this.target_container ).dialog( 'option', 'position', 'center' );
	},
	
	/**
	* Clears the textbox cache.  
	*/
	clearTextboxCache: function() {
		this.caretPos = null;
		this.textboxValue = null;
	},

	/**
	* Get the current position of the text cursor
	*/
	getCaretPos: function() {
		if ( this.caretPos == null ) {
			if ( this.target_textbox ) {
				this.caretPos = $j( this.target_textbox ).getCaretPosition();
			} else {
				this.caretPos = false;
			}
		}
		return this.caretPos;
	},
	
	/**
	* Get the value of the target textbox.  
	*/
	getTextboxValue: function() {
		if ( this.textboxValue == null ) {
			if ( this.target_textbox ) {
				this.textboxValue = $j( this.target_textbox ).val();
			} else {
				this.textboxValue = '';
			}
		}
		return this.textboxValue;
	},
	
	/**
	* Get the default query from the text selection
	*/
	getDefaultQuery: function() {
		if ( this.default_query == null ) {
			if ( this.target_textbox ) {
				var ts = $j( this.target_textbox ).textSelection();
				if ( ts != '' ) {
					this.default_query = ts;
				} else {
					this.default_query = '';
				}
			}
		}
		// If the query is still empty try the page title:
		if( this.default_query != '' && typeof wgTitle != 'undefined' )
			this.default_query = wgTitle;
						
		return this.default_query;
	},
	
	/**
	* Creates the dialog container
	*/
	createDialogContainer: function() {
		mw.log( "createDialogContainer" );
		var _this = this;
		// add the parent target_container if not provided or missing
		if ( _this.target_container && $j( _this.target_container ).length != 0 ) {
			mw.log(  'dialog already exists' );
			return;
		}

		_this.target_container = '#rsd_modal_target';
		$j( 'body' ).append(
			$j('<div>')
				.attr({
					'id' : 'rsd_modal_target',
					'title' : gM( 'mwe-add_media_wizard' ) 
				})
				.css( {
					'position' : 'absolute',
					'top' : '3em',
					'left' : '0px',
					'bottom' : '3em',
					'right' : '0px'
				})
		);
		// Get layout
		mw.log( 'width: ' + $j( window ).width() +  ' height: ' + $j( window ).height() );
		
		// Build cancel button 
		var cancelButton = {};
		cancelButton[ gM( 'mwe-cancel' ) ] = function() {
			_this.onCancelClipEdit();
		}
		
		$j( _this.target_container ).dialog( {
			bgiframe: true,
			autoOpen: true,
			modal: true,
			draggable: false,
			resizable: false,
			buttons: cancelButton,
			close: function() {
				// if we are 'editing' a item close that
				// @@todo maybe prompt the user?
				_this.onCancelClipEdit();
				$j( this ).parents( '.ui-dialog' ).fadeOut( 'slow' );
			}
		} );		
		$j( _this.target_container ).dialogFitWindow();
		
		// Add the window resize hook to keep dialog layout
		$j( window ).resize( function() {
			$j( _this.target_container ).dialogFitWindow();
		} );
	},

	/*
	* Sets up the initial html interface
	*/ 
	initDialog: function() {
		mw.log( 'initDialog' );
		var _this = this;
		mw.log( 'f::initDialog' );

		var mainContainer = $j( this.target_container );

		var controlContainer = this.createControlContainer();

		mainContainer.append( controlContainer );
			
		this.$resultsContainer = $j('<div />').attr({
				id: "rsd_results_container"
			});
		
		mainContainer.append( this.$filtersContainer );
		mainContainer.append( this.$resultsContainer );
		
		// Run the default search:
		if ( this.getDefaultQuery() )
			this.updateResults();

		// Add bindings
		$j( '#mso_selprovider,#mso_selprovider_close' )
			.unbind()
			.click( function() {
				if ( $j( '#rsd_options_bar:hidden' ).length != 0 ) {
					$j( '#rsd_options_bar' ).animate( {
						'height': '110px',
						'opacity': 1
					}, "normal" );
				} else {
					$j( '#rsd_options_bar' ).animate( {
						'height': '0px',
						'opacity': 0
					}, "normal", function() {
						$j( this ).hide();
					} );
				}
				return false;
			} );
		// Set form bindings
		$j( '#rsd_form' )
			.unbind()
			.submit( function() {
				_this.updateResults();
				// Don't submit the form
				return false;
			} );
			
		// Setup base cancel button binding
		this.onCancelClipEdit();
	},

	/**
	 * Creates the search control (i.e. Search textbox, search button, provider filter).
	 * @return A jQuery-generated HTML element ready to be injected in the main container.
	 */
	createControlContainer: function() {
		var _this = this;
		
		var $controlContainer = $j( '<div />' ).addClass( "rsd_control_container" );
		var $searchForm = $j( '<form />' ).attr({
			id : "rsd_form", 
			action : "javascript:return false"
		});
		var $providerSelection = $j( '<ul />' ).addClass( "ui-provider-selection" );
		
		var $searchButton = $j.button({
			icon_id: 'search', 
				text: gM( 'mwe-media_search' ) })
			.addClass( 'rsd_search_button' )
			.buttonHover()
			.click(function (){
				_this.updateResults( _this.current_provider, true );
				return false;
			});
		var $searchBox = $j( '<input />' ).addClass( 'ui-widget-content ui-corner-all' ).attr({
			type: "text",
			tabindex: 1,
			value: this.getDefaultQuery(),
			maxlength: 512,
			id: "rsd_q",
			name: "rsd_q",
			size: 20,
			autocomplete: "off"
		})
		// Prevent searching for empty input.
		.keyup(function () {
			if ( $searchBox.val().length == 0 ) {
				$searchButton.addClass('ui-button-disabled');
			}
			else {
				$searchButton.removeClass("ui-button-disabled");
			}
		});
		
		// Add enabled search providers.
		for ( var providerName in this.content_providers ) {
			var content_providers = this.content_providers;
			var provider = content_providers[ providerName ];
			if ( provider.enabled && provider.api_url ) {
				var $anchor = $j( '<div />' )
					.text( gM( 'rsd-' + providerName + '-title' ) )
					.attr({
						name: providerName
					});
				if ( this.current_provider == providerName) {
					$anchor.addClass( 'ui-selected' );
				}
				
				$anchor.click( function() {
					$j( this ).parent().parent().find( '.ui-selected' )
						.removeClass( 'ui-selected' );
					$j( this ).addClass( 'ui-selected' );
					_this.current_provider = $j( this ).attr( "name" );
					// Update the search results on provider selection
					_this.updateResults( _this.current_provider, true );
					return false;
				});
				
				var $listItem = $j( '<li />' );
				$listItem.append( $anchor );
				$providerSelection.append( $listItem );
				return false;
			}
		}
		
		$searchForm.append( $providerSelection );
		$searchForm.append( $searchBox );
		$searchForm.append( $searchButton );		
		// Add optional upload buttons.
		if ( this.content_providers['upload'].enabled) {
			$uploadButton = $j.button( { icon_id: 'disk', text: gM( 'mwe-upload_tab' ) })
				.addClass("rsd_upload_button")
				.click(function(){
					_this.current_provider = 'upload';
					_this.updateUploadResults( );
					return false;
				});
			$searchForm.append( $uploadButton );
			/* 
			// Import functionality not yet supported
			$importButton = $j.button({icon_id: 'import', text: 'import'})
				.addClass("rsd_import_button");
			.append( $importButton );
			*/
		}
		
		$controlContainer.append( $searchForm );
		
		return $controlContainer;
	},
	
	/**
	* Shows the upload tab loader and issues a call to showUploadForm
	*/
	updateUploadResults: function() {
		mw.log( "updateUploadResults::" );
		var _this = this;
		// set it to loading:
		this.$resultsContainer.loadingSpinner();
		//Show the upload form
		mw.load( ['$j.fn.simpleUploadForm'], function() {			
			var provider = _this.content_providers['this_wiki'];

			// Load this_wiki search system to grab the resource
			_this.loadSearchLib( provider, function() {
				_this.showUploadForm( provider );
			} );
		} );

	},
	
	/**
	* Once the uploadForm is ready display it for the upload provider
	* 
	* @param {Object} provider Provider object for Upload From
	*/
	showUploadForm: function( provider ) {
		var _this = this;
		var uploadMsg = gM( 'mwe-upload_a_file', _this.upload_api_name );
		var recentUploadsMsg = gM( 'mwe-your_recent_uploads', _this.upload_api_name );
		
		// Do basic layout form on left upload "bin" on right
		$uploadTableRow = $j('<tr />').append(
			$j('<td />').attr( {
				'valign':'top'
			} )
			.css({
				 'width' : '350px',
				 'padding-right' : '12px'
			})
			.append(
				$j('<h4 />').text( uploadMsg ),
				$j('<div />').attr({
					'id': 'upload_form'
				})
				.loadingSpinner()
			),
			
			$j('<td />').attr( {
				'valign' : 'top',
				'id':'upload_bin'
			} )
			.loadingSpinner()
		)
		this.$resultsContainer.html( 
			$j('<table />').append(
				$uploadTableRow
			) 
		);

		// Fill in the user uploads:
		if ( typeof wgUserName != 'undefined' && wgUserName ) {
			// Load the upload bin with anything the current user has uploaded
			provider.sObj.getUserRecentUploads( wgUserName, function( ) {	
				$j('#upload_bin').empty().append( 
					$j('<h4 />').text( recentUploadsMsg )
				);	
				_this.showResults();
			} );
		}else{
			$j('#upload_bin').empty().text( gM( 'mwe-no_recent_uploads' ) );
		}

		// Deal with the api form upload form directly:
		$j( '#upload_form' ).simpleUploadForm( {
			"api_target" 	  : _this.upload_api_target,
			"ondone_callback" : function( resultData ) {
				var wTitle = resultData['filename'];
				// Add a loading div
				_this.addResourceEditLoader();
				//Add the uploaded result
				provider.sObj.addByTitle( wTitle, function( resource ) {
					// Redraw ( with added result if new )
					_this.showResults();										
					// Pull up resource editor:
					_this.showResourceEditor( resource, $j( '#res_this_wiki__' + resource.id ).get( 0 ) );
				} );
				// Return false to close progress window:
				return false;
			}
		} );
	},
	
	/**
	* Refresh the results container ( based on current_provider var ) 
	*/
	updateResults: function() {
		if ( this.current_provider == 'upload' ) {
			this.updateUploadResults();
		} else {
			this.updateSearchResults( this.current_provider, false );
		}
	},
	
	/**
	* Show updated search results for a given providerName
	*
	* @param {String} providerName name of the content provider
	* @param {Bollean} resetPaging if the pagging should be reset
	*/
	updateSearchResults: function( providerName, resetPaging ) {
		mw.log( "f:updateSearchResults::" + providerName );

		var draw_direct_flag = true;
		var provider = this.content_providers[ providerName ];
		
		// Check if we need to update:
		if ( typeof provider.sObj != 'undefined' ) {
			if ( provider.sObj.last_query == $j( '#rsd_q' ).val() 
				&& provider.sObj.last_offset == provider.offset ) {
				
				mw.log( 'last query is: ' + provider.sObj.last_query + 
					' matches: ' +  $j( '#rsd_q' ).val() + ' no search needed');
				
				// Show search results directly
				this.showResults();					
			}
		}
			
		// See if we should reset the paging
		if ( resetPaging ) {
			provider.offset = 0;
			if (provider.sObj && provider.sObj.offset) {
				provider.sObj.offset = 0;
			}
		}

		if ( $j ( '#rsd_q' ).val().length == 0 ) {
			this.$resultsContainer.empty();
			this.$resultsContainer.text( 'Please insert a search string above.' );
			return;
		}
		
		// Set the content to loading while we do the search:
		this.$resultsContainer.html( mw.loading_spinner() );
		
		// Make sure the search library is loaded and issue the search request
		this.performProviderSearch( provider );
	},

	/*
	* Issue a api request & cache the result this check can be avoided by setting the
	* this.import_url_mode = 'api' | 'form' | instead of 'autodetect' or 'none'
	* 
	* @param {function} callback function to be called once we have checked for copy by url support 
	*/ 	 
	checkForCopyURLSupport: function ( callback ) {
		var _this = this;
		mw.log( 'checkForCopyURLSupport:: ' );

		// See if we already have the import mode:
		if ( this.import_url_mode != 'autodetect' ) {
			mw.log( 'import mode: ' + _this.import_url_mode );
			callback();
		}
		// If we don't have the local wiki api defined we can't auto-detect use "link"
		if ( ! _this.upload_api_target ) {
			mw.log( 'import mode: remote link (no import_wiki_api_url)' );
			_this.import_url_mode = 'remote_link';
			callback();
		}
		if ( this.import_url_mode == 'autodetect' ) {
			var request = {
				'action': 'paraminfo',
				'modules': 'upload'
			}
			mw.getJSON( _this.upload_api_target, request, function( data ) {
					_this.checkCopyURLApiResult( data, callback ) 
			} );
		}
	},
	
	/**
	* Evaluate the result of an api copyURL permision request
	*
	* @param {Object} data Result data to be checked
	* @param {Function} callback Function to call once api returns value
	*/
	checkCopyURLApiResult: function( data, callback ) {
		var _this = this;
		// Api checks:
		for ( var i in data.paraminfo.modules[0].parameters ) {
			var pname = data.paraminfo.modules[0].parameters[i].name;
			if ( pname == 'url' ) {
				mw.log( 'Autodetect Upload Mode: api: copy by url:: ' );
				// Check permission  too:
				_this.checkForCopyURLPermission( function( canCopyUrl ) {
					if ( canCopyUrl ) {
						_this.import_url_mode = 'api';
						mw.log( 'import mode: ' + _this.import_url_mode );
						callback();
					} else {
						_this.import_url_mode = 'none';
						mw.log( 'import mode: ' + _this.import_url_mode );
						callback();
					}
				} );
				// End the pname search once we found the the "url" param 
				break; 
			}
		}
	},
	
	/**
	 * checkForCopyURLPermission:
	 * not really necessary the api request to upload will return appropriate error 
	 * if the user lacks permission. or $wgAllowCopyUploads is set to false
	 * (use this function if we want to issue a warning up front)
	 *
	 * @param {Function} callback Function to call with URL permission
	 * @return 
	 * 	false callback user does not have permission 	   
	 */
	checkForCopyURLPermission: function( callback ) {
		var _this = this;
		// do api check:
		var request = { 
			'meta' : 'userinfo', 
			'uiprop' : 'rights' 
		};
		mw.getJSON( _this.upload_api_target, request, function( data ) {
			for ( var i in data.query.userinfo.rights ) {
				var right = data.query.userinfo.rights[i];
				// mw.log('checking: ' + right ) ;
				if ( right == 'upload_by_url' ) {
					callback( true );
					return true; // break out of the function
				}
			}
			callback( false );
		} );
	},
	
	/**
	* Performs the search for a given content provider
	* 
	* Calls showResults once search results are ready
	* 
	* @param {Object} provider the provider to be searched. 
	*/
	performProviderSearch: function( provider ) {
		var _this = this;
		mw.log( 'f: performProviderSearch ' );
		// First check if we should even run the search at all (can we import / insert 
		// into the page? )
		if ( !this.isProviderLocal( provider ) && this.import_url_mode == 'autodetect' ) {
			// provider is not local check if we can support the import mode:
			this.checkForCopyURLSupport( function() {
				_this.performProviderSearch( provider );
			} );
			return false;
		} else if ( !this.isProviderLocal( provider ) && this.import_url_mode == 'none' ) {
			if (  this.current_provider == 'combined' ) {
				// combined results are harder to error handle just ignore that repo
				provider.sObj.loading = false;
			} else {
				this.$resultsContainer.html( 
					gM( 'mwe-no_import_by_url' ) 
				)
			}
			return false;
		}
		
		if (!provider.sObj) {
			this.loadSearchLib( provider, this.getProviderCallback() );
		}
		else {
			this.getProviderCallback()( provider );
		}
	},
	
	getProviderCallback: function() {
		
		var _this = this;
		return function ( provider ) {
			
			var d = new Date();
			var searchTime = d.getMilliseconds();
	
			provider.sObj.getSearchResults( $j( '#rsd_q' ).val() , 
					function( resultStatus ) {
						_this.showResults();
					});
			
			// Set a timeout of 20 seconds
			setTimeout( function() {
			}, 20 * 1000 );
		};
	},
	
	/**
	* Loads a providers search library
	* 
	* @param {Object} provider content provider to be loaded
	* @param {Function} callback Function to call once provider is loaded 
	* ( provider is passed back in callback to avoid possible concurancy issues in multiple load calls)
	*/
	loadSearchLib: function( provider, callback ) {
		var _this = this;
		mw.log( ' loadSearchLib: ' + provider );
		// Set up the library req:
		mw.load( [
			'baseRemoteSearch',
			provider.lib + 'Search'
		], function() {
			mw.log( "loaded lib:: " + provider.lib );
			// Else we need to run the search:
			var options = {
				'provider': provider,
				'rsd': _this
			};
			provider.sObj = new window[ provider.lib + 'Search' ]( options );
			if ( !provider.sObj ) {
				mw.log( 'Error: could not find search lib for ' + cp_id );
				return false;
			}

			// inherit defaults if not set:
			provider.limit = provider.limit ? provider.limit : provider.sObj.limit;
			provider.offset = provider.offset ? provider.offset : provider.sObj.offset;
			
			callback( provider );
		} );
	},
	
	/**
	* Get a resource object from a resource id
	*
	* NOTE: We could bind resource objects to html elements to avoid this lookup
	*
	* @param {String} id Id attribute the resource object
	*/
	getResourceFromId: function( id ) {
		var parts = id.replace( /^res_/, '' ).split( '__' );
		var providerName = parts[0];
		var resIndex = parts[1];

		// Set the upload helper providerName (to render recent uploads by this user)
		if ( providerName == 'upload' )
			providerName = 'this_wiki';

		var provider = this.content_providers[providerName];
		if ( provider && provider['sObj'] && provider.sObj.resultsObj[resIndex] ) {
			return provider.sObj.resultsObj[resIndex];
		}
		mw.log( "ERROR: could not find " + resIndex );
		return false;
	},

	// TODO: turn this into a global helper function.
	curry: function ( fn ) {
	    var args = [];
	    for (var i = 1, len = arguments.length; i <len; ++i) {
	        args.push( arguments[i] );
	    };
	    return function() {
	            fn.apply( window, args );
	    };
	},
	
	/**
	* Show Results for the current_provider
	*/
	showResults: function() {
		mw.log( 'f:showResults::' + this.current_provider );
		var _this = this;
		var o = '';
		var provider = this.content_providers[ this.current_provider ];
			
		
		// The "upload" tab has special results output target rather than top level
		// resutls container.
		if ( this.current_provider == 'upload' ) {
			$resultsContainer = $j('#upload_bin');
			var provider = _this.content_providers['this_wiki'];
		} else {
			var provider = this.content_providers[ this.current_provider ];
			$resultsContainer = this.$resultsContainer;
			 
			// Add the results header:
			$resultsContainer.empty().append( this.createResultsHeader() )
			
			// Enable search filters, if the provider supports them.
			if ( provider.sObj.filters && !(provider.disable_filters) ) {
				provider.sObj.filters.filterChangeCallBack = 
					this.curry( this.getProviderCallback(), provider );
				$resultsContainer.append( provider.sObj.filters.getHTML().attr ({
					id: 'rsd_filters_container'
				}));
			}
		}
		
		// Empty the existing results:
		// $j( tabSelector ).empty();
		
		var numResults = 0;

		// Output all the results for the current current_provider
		if ( typeof provider['sObj'] != 'undefined' ) {
			$j.each( provider.sObj.resultsObj, function( resIndex, resource ) {
				o += _this.getResultHtml( provider, resIndex, resource );
				numResults++;
			} );
			// Put in the tab output (plus clear the output)
			$resultsContainer.append( o + '<div style="clear:both"/>' );
		}
		// @@TODO should abstract footer and header ~outside~ of search results 
		// to have less leakgege with upload tab
		if ( this.current_provider != 'upload' ) {
			$resultsContainer.append( _this.createResultsFooter() );
		}
		
		mw.log( 'did numResults :: ' + numResults + ' append: ' + $j( '#rsd_q' ).val() );		
		
		// Add "no search results" text
		$j( '#rsd_no_search_res' ).remove();
		if ( numResults == 0 ) {
			$resultsContainer.append( 
				gM( 'rsd_no_results', $j( '#rsd_q' ).val() )
			) 
		}
		this.addResultBindings();
	},
	
	/**
	 * Show failure 
	 */
	showFailure : function( resultStatus ){
		//only one type of resultStatus right now: 
		if( resultStatus == 'timeout' )
			$j( '#tab-' + this.current_provider ).text(
				gM('rsd-search-timeout')		
			)
	},
	
	/**
	* Get result html, calls getResultHtmlBox or
	
	* @param {Object} provider the content provider for result
	* @param {Number} resIndex the resource index to build unique ids
	* @param {Object} resource the resource object 
	*/
	getResultHtml: function( provider, resIndex, resource ) {
		if ( this.displayMode == 'box' ) {
			return this.getResultHtmlBox( provider, resIndex, resource );
		}else{
			return this.getResultHtmlList(  provider, resIndex, resource );
		}
	},
	
	/**
	* Get result html for box layout (see getResultHtml for params) 
	*/
	getResultHtmlBox: function( provider, resIndex, resource ) {
		var o = '';	
		o += '<div id="mv_result_' + resIndex + '" ' + 
				'class="mv_clip_box_result" ' + 
				'style="' + 
				'width:' + this.thumb_width + 'px;' + 
				'height:' + ( this.thumb_width - 20 ) + 'px;' + 
				'position:relative;">';
		
		// Check for missing poster types for audio
		if ( resource.mime == 'audio/ogg' && !resource.poster ) {
			resource.poster = mw.getConfig( 'images_path' ) + 'sound_music_icon-80.png';
		}
		
		// Get a thumb with proper resolution transform if possible:
		var thumbUrl = provider.sObj.getImageTransform( resource, 
			{ 'width' : this.thumb_width } );
		
		o += '<img title="' + resource.title  + '" ' +
			'class="rsd_res_item" id="res_' + provider.id + '__' + resIndex + '" ' +
			'style="width:' + this.thumb_width + 'px;" ' + 
			'src="' + thumbUrl + '">';
			
		// Add a linkback to resource page in upper right:
		if ( resource.link ) {
			o += '<div class="' + 
					'rsd_linkback ui-corner-all ui-state-default ui-widget-content" >' +
				'<a target="_new" title="' + gM( 'mwe-resource_description_page' ) +
				'" href="' + resource.link + '">' + gM( 'mwe-link' ) + '</a>' +
				'</div>';
		}

		// Add file type icon if known
		if ( resource.mime ) {
			o += this.getTypeIcon( resource.mime );
		}

		// Add license icons if present
		if ( resource.license )
			o += this.getLicenseIconHtml( resource.license );

		o += '</div>';
		return o;
	},
	
	/**
	* Get result html for list layout (see getResultHtml for params) 	
	*/
	getResultHtmlList:function( provider, resIndex, resource ) {
		var o = '';
		o += '<div id="mv_result_' + resIndex + '" class="mv_clip_list_result" style="width:90%">';
		o += '<img ' + 
				'title="' + resource.title + '" ' + 
				'class="rsd_res_item" id="res_' + provider.id + '__' + resIndex + '" ' + 
				'style="float:left;width:' + this.thumb_width + 'px;" ' +
				'src="' + provider.sObj.getImageTransform( resource, { 'width': this.thumb_width } ) + '">';
				
		// Add license icons if present
		if ( resource.license )
			o += this.getLicenseIconHtml( resource.license );

		o += resource.desc ;
		o += '<div style="clear:both" />';
		o += '</div>';	
		return o;
	},
	
	/**
	* Add result bindings
	*
	* called after results have been displayed
	* Set bindings to showResourceEditor 
	*/
	addResultBindings: function() {
		var _this = this;
		$j( '.mv_clip_' + _this.displayMode + '_result' ).hover( 
			function() {
				$j( this ).addClass( 'mv_clip_' + _this.displayMode + '_result_over' );
				// Also set the animated image if available
				var res_id = $j( this ).children( '.rsd_res_item' ).attr( 'id' );
				var resource = _this.getResourceFromId( res_id );
				if ( resource.poster_ani )
					$j( '#' + res_id ).attr( 'src', resource.poster_ani );
			}, function() {
				$j( this ).removeClass( 
					'mv_clip_' + _this.displayMode + '_result_over' );
				var res_id = $j( this ).children( '.rsd_res_item' ).attr( 'id' );
				var resource = _this.getResourceFromId( res_id );
				// Restore the original (non animated)
				if ( resource.poster_ani )
					$j( '#' + res_id ).attr( 'src', resource.poster );
			} 
		);
		
		// Resource click action: (bring up the resource editor)
		$j( '.rsd_res_item' ).unbind().click( function() {		
			var resource = _this.getResourceFromId( $j( this ).attr( "id" ) );
			_this.showResourceEditor( resource, this );
			return false;
		} );
	},
	
	/**
	* Add Resource edit layout and display a loader.
	*/
	addResourceEditLoader: function( maxWidth ) {
		var _this = this;
		if ( !maxWidth ) maxWidth = 400;
		// Remove any old instance:
		$j( _this.target_container ).find( '#rsd_resource_edit' ).remove();

		// Hide the results container
		this.$resultsContainer.hide();

		var pt = $j( _this.target_container ).html();
		
		// Set up the interface compoents:
		var $clipEditControl =	$j('<div />')
			.attr( 'id', 'clip_edit_ctrl' )
			.addClass('ui-widget ui-widget-content ui-corner-all')
			.css( {
				'position' : 'absolute',
				'left' : '2px',
				'top' : '5px',
				'bottom' : '10px', 
				'width' : ( maxWidth + 5 ) + 'px',
				'overflow' : 'auto',
				'padding' : '5px'
			} )
			.loadingSpinner();
			
		var $clipEditDisplay = $j('<div />')
			.attr( 'id', 'clip_edit_disp' )
			.addClass( 'ui-widget ui-widget-content ui-corner-all' )
			.css({
				'position' : 'absolute',
				'overflow' : 'auto;',
				'left' : ( maxWidth + 25 ) + 'px',
				'right' :'0px', 
				'top' : '5px',
				'bottom' : '10px',
				'padding' : '5px'			
			})
			.loadingSpinner();
				
		
		// Add the edit layout window with loading place holders
		$j( _this.target_container ).append( 
			$j('<div />')
			.attr( 'id', 'rsd_resource_edit' )
			.css( {
				'position' : 'absolute',
				'top' : '0px',
				'left' : '0px', 
				'bottom' : '0px',
				'right' : '4px',
				'background-color' : '#FFF'
			} ).append( 
				$clipEditControl,
				$clipEditDisplay
			)
		);
	},
	
	/**
	* Get the edit width of a resource
	* 
	* @param {Object} resource get width of resource
	*/
	getMaxEditWidth: function( resource ) {
		var mediaType = this.getMediaType( resource );
		if ( mediaType == 'image' ) {
			return this.image_edit_width;
		} else {
			return this.video_edit_width;
		}
	},
	
	/**
	* Get the media Type of a resource
	*
	* @param {Object} resource get media type of resource
	*/
	getMediaType: function( resource ) {		
		var types = [ 'image', 'audio', 'video'];
		for( var i=0; i < types.length ; i++ ){
			if ( resource.mime.indexOf( types[i] ) !== -1){
				return types[i];
			}
		}
		if( resource.mime == 'application/ogg' )
			return 'video'
		// Media type not found:
		return false;
	},
	
	/**
	* Removes the resource editor
	*/
	removeResourceEditor: function() {
		$j( '#rsd_resource_edit' ).remove();
		$j( '#rsd_edit_img' ).remove();
	},

	/**
	* Show the resource editor
	* @param {Object} resource Resource to be edited
	* @param {Object} rsdElement Element Image to be swaped with "edit" version of resource
	*/ 
	showResourceEditor: function( resource, rsdElement ) {
		mw.log( 'f:showResourceEditor:' + resource.title );
		var _this = this;

		// Remove any existing resource edit interface
		_this.removeResourceEditor();

		var mediaType = _this.getMediaType( resource );
		var maxWidth = _this.getMaxEditWidth( resource );

		// Append to the top level of model window:
		_this.addResourceEditLoader( maxWidth  );
		// update add media wizard title:
		var dialogTitle = gM( 'mwe-add_media_wizard' ) + ': ' +
			gM( 'rsd_resource_edit', resource.title );
		$j( _this.target_container ).dialog( 'option', 'title', dialogTitle );
		
		mw.log( 'did append to: ' + _this.target_container );
			
		// Try and keep aspect ratio for the thumbnail that we clicked:
		var imageRatio = null;
		try {			
			imageRatio = $j( rsdElement ).get(0).height / $j( rsdElement ).get(0).width;
		} catch( e ) {
			mw.log( 'Error: browser could not read height or width attribute' ) ;
		}
		if ( !imageRatio ) {
			var imageRatio = 1; // set ratio to 1 if tRatio did not work.
		}
		
		$j( rsdElement )
		.clone()
		.attr( { id : 'rsd_edit_img' } )
		.appendTo( '#clip_edit_disp' )
		.css( {
			'position':'absolute',
			'top': '5px',
			'left': '5px',
			'cursor': 'default',
			'opacity': 1,
			'width': maxWidth + 'px',
			'height': parseInt( imageRatio * maxWidth )  + 'px'
		} );
	
		
		mw.log( 'Set from ' +  imageRatio + ' to init thumbimage to ' + 
			maxWidth + ' x ' + parseInt( imageRatio * maxWidth ) );
		
		if ( mediaType == 'image' ) {
			_this.loadHighQualityImage( 
				resource, 
				{ 'width': maxWidth }, 
				'rsd_edit_img', 
				function() {
					$j( '.loading_spinner' ).remove();
				}
			);
		}
		// Also fade in the container:
		$j( '#rsd_resource_edit' ).animate( {
			'opacity': 1,
			'background-color': '#FFF',
			'z-index': 99
		} );

		// Show the editor itself
		if ( mediaType == 'image' ) {
			_this.showImageEditor( resource );
		} else if ( mediaType == 'video' || mediaType == 'audio' ) {
			_this.showVideoEditor( resource );
		}
	},
	
	/*
	* Loads a higher quality image 
	*
	* @param {Object} resource requested resource for higher quality image
	* @param {Object} size the requested size of the higher quality image
	* @param {string} target the image id to replace with higher quality image
	* @param {Function} callback the function to be calle once the image is loaded 
	*/
	loadHighQualityImage: function( resource, size, target_img_id, callback ) {
		// Get the high quality image url:
		resource.pSobj.getImageObj( resource, size, function( imObj ) {
			resource['edit_url'] = imObj.url;

			mw.log( "edit url: " + resource.edit_url );
			// Update the resource
			resource['width'] = imObj.width;
			resource['height'] = imObj.height;

			// See if we need to animate some transition
			if ( size.width != imObj.width ) {
				mw.log( 'loadHighQualityImage:size mismatch: ' + size.width + ' != ' + imObj.width );
				// Set the target id to the new size:
				$j( '#' + target_img_id ).animate( {
					'width': imObj.width + 'px',
					'height': imObj.height + 'px'
				});
			} else {
				mw.log( 'use req size: ' + imObj.width + 'x' + imObj.height );
				$j( '#' + target_img_id ).animate( {
					'width': imObj.width + 'px', 
					'height': imObj.height + 'px' 
				});
			}
			// Don't swap it in until its loaded:
			var img = new Image();
			// Load the image image:
			$j( img ).load( function () {
					 $j( '#' + target_img_id ).attr( 'src', resource.edit_url );
					 // Let the caller know we are done and what size we ended up with:
					 callback();
				} ).error( function () {
					mw.log( "Error with:  " +  resource.edit_url );
				} ).attr( 'src', resource.edit_url );
		} );
	},
	
	/**
	* Do cancel edit callbacks and interface updates. 
	*/
	onCancelClipEdit: function() {
		var _this = this;
		mw.log( 'onCancelClipEdit' );
		var b_target = _this.target_container + '~ .ui-dialog-buttonpane';
		$j( '#rsd_resource_edit' ).remove();
		
		// Remove preview if its 'on'
		$j( '#rsd_preview_display' ).remove();
		
		// Remove resource import if present
		$j( '#rsd_resource_import' ).remove();
		// Restore the resource container:
		this.$resultsContainer.show();

		// Restore the title:
		$j( _this.target_container ).dialog( 'option', 'title', gM( 'mwe-add_media_wizard' ) );
		mw.log( "should update: " + b_target + ' with: cancel' );
		// Restore the buttons:
		$j( b_target )
			.html( $j.btnHtml( gM( 'mwe-cancel' ) , 'mv_cancel_rsd', 'close' ) )
			.children( '.mv_cancel_rsd' )
			.buttonHover()
			.click( function() {
				$j( _this.target_container ).dialog( 'close' );
				return false;
			} );
	},

	/** 
	 * Get the control actions for clipEdit with relevant callbacks
	 * @param {Object} provider the provider object to 
	 */
	getClipEditControlActions: function( provider ) {
		var _this = this;
		var actions = { };

		actions['insert'] = function( resource ) {
			_this.insertResource( resource );
		}
		// If not directly inserting the resource is support a preview option:
		if ( _this.import_url_mode != 'remote_link' ) {
			actions['preview'] = function( resource ) {
				_this.showPreview( resource )
			};
		}
		actions['cancel'] = function() {
			_this.onCancelClipEdit()
		}
		return actions;
	},
	
	/**
	* Clip edit options
	*/
	getClipEditOptions: function( resource ) {
		return {
			'resource' : resource,
			'parent_container': 'rsd_modal_target',
			'target_clip_display': 'clip_edit_disp',
			'target_control_display': 'clip_edit_ctrl',
			'media_type': this.getMediaType( resource ),
			'parentRemoteSearchDriver': this,
			'controlActionsCallback': this.getClipEditControlActions( resource.pSobj.cp ),
			'enabled_tools': this.enabled_tools
		};
	},

	/**
	 * Internal function called by showResourceEditor() to show an image editor
	 * @param {Object} resource Resource for Image Editor display
	 */
	showImageEditor: function( resource ) {
		var _this = this;
		var options = _this.getClipEditOptions( resource );
		
		// Display the mvClipEdit obj once we are done loading:
		mw.load( 'mw.ClipEdit', function() {			
			// Run the image clip tools
			_this.clipEdit = new mw.ClipEdit( options );
		} );
	},

	/**
	 * Internal function called by showResourceEditor() to show a video or audio
	 * editor.
	 * @param {Object} resource Show video editor for this resource
	 */
	showVideoEditor: function( resource ) {
		var _this = this;
		var options = _this.getClipEditOptions( resource );
		var mediaType = this.getMediaType( resource );

		mw.log( 'media type:: ' + mediaType );
		
		// Get any additional embedding helper meta data prior to doing the actual embed
		// normally this meta should be provided in the search result 
		// (but archive.org has another query for more media meta)
		resource.pSobj.addResourceInfoCallback( resource, function() {		
			var runFlag = false;
			// Make sure we have the 'EmbedPlayer' module:
			mw.load( 'EmbedPlayer', function() {
				// Strange concurrency issue with callbacks
				// @@todo try and figure out why this callback is fired twice
				if ( !runFlag ) {
					runFlag = true;
				} else {
					mw.log( 'Error: embedPlayerCheck run twice' );
					return false;
				}
				var embedHtml = resource.pSobj.getEmbedHTML( resource, 
					{ 
						'id' : 'embed_vid' 
					} 
				);				
				mw.log( 'append html: ' + embedHtml );
				$j( '#clip_edit_disp' ).html( embedHtml );								
				
				mw.log( "about to call $j.embedPlayer::embed_vid" );							
				// Rewrite by id	
				$j( '#embed_vid').embedPlayer ( function() {
					
					// Add extra space at the top if the embed player is less than 90px high
					// bug 22189				
					if( $j('#embed_vid').get(0).getPlayerHeight() < 90 ){
						$j( '#clip_edit_disp' ).prepend( 
							$j( '<span />' )
							.css({
								'height': '90px',
								'display': 'block'
							}) 
						);
					}
				
					// Grab information available from the embed instance
					resource.pSobj.addEmbedInfo( resource, 'embed_vid' );

					// Add libraries resizable and hoverIntent to support video edit tools
					var librarySet = [
						'mw.ClipEdit', 
						'$j.ui.resizable',
						'$j.fn.hoverIntent'
					] 
					mw.load( librarySet, function() {						
						// Make sure the rsd_edit_img is removed:
						$j( '#rsd_edit_img' ).remove();
						// Run the image clip tools
						_this.clipEdit = new mw.ClipEdit( options );
					} );
				} );
			} );
		} );
	},
	 
	/**
	* Check if a given content provider is local.  
	* @param {Object} provider Provider object to be checked
	* @return 
	*/
	isProviderLocal: function( provider ) {
		if ( provider.local ) {
			return true;
		} else {
			// Check if we can embed the content locally per a domain name check:
			var localHost = mw.parseUri( this.local_wiki_api_url ).host;
			if ( provider.local_domains ) {
				for ( var i = 0; i < provider.local_domains.length; i++ ) {
					var domain = provider.local_domains[i];
					if ( localHost.indexOf( domain ) != -1 )
						return true;
				}
			}
			return false;
		}
	},

	/**
	 * Check if the file is either a local upload, or if it has already been 
	 * imported under the standard filename scheme. 
	 *
	 * @param {Object} resource Resouce to check for local file
	 * @param {Function} callback Function to call once check is done
	 * 
	 * Calls the callback with two parameters:
	 *     callback( resource, status )
	 *
	 * resource: A resource object pointing to the local file if there is one,
	 *    or false if not
	 *
	 * status: may be 'local', 'shared', 'imported' or 'missing'
	 */
	isFileLocallyAvailable: function( resource, callback ) {
		var _this = this;
		// Add a loader on top
		mw.addLoaderDialog( gM( 'mwe-checking-resource' ) );

		// Extend the callback, closing the loader dialog before chaining
		var myCallback = function( status ) {
			mw.closeLoaderDialog();
			if ( typeof callback == 'function' ) {
				callback( status );
			}
		}

		// @@todo get the localized File/Image namespace name or do a general {NS}:Title
		var provider = resource.pSobj.provider;
		var _this = this;

		// Clone the resource. Not sure why this not-working clone was put here... 
		// using the actual resource should be fine
		/*
		var proto = {};
		proto.prototype = resource;
		var myRes = new proto;
		*/		
		
		// Update base target_resource_title:
		resource.target_resource_title = resource.titleKey.replace( /^(File:|Image:)/ , '' )

		// Check if local repository
		// or if import mode if just "linking" ( we should already have the 'url' )

		if ( this.isProviderLocal( provider ) || this.import_url_mode == 'remote_link' ) {
			// Local repo, jump directly to the callback:
			myCallback( 'local' );
		} else {
			// Check if the file is local ( can be shared repo )
			if ( provider.check_shared ) {
				var fileTitle =_this.canonicalFileNS + ':' + resource.target_resource_title;
				_this.findFileInLocalWiki( fileTitle, function( imagePage ) {
					if ( imagePage && imagePage['imagerepository'] == 'shared' || 
									  imagePage['imagerepository'] == 'commons') {
						myCallback( 'shared' );
					} else {
						_this.isFileAlreadyImported( resource, myCallback );
					}
				} );
			} else {
				_this.isFileAlreadyImported( resource, myCallback );
			}
		}
	},

	/**
	 * Check if the file is already imported with this extension's filename scheme
	 *
	 * Calls the callback with two parameters:
	 *     callback( resource, status )
	 *
	 * If the image is found, the status will be 'imported' and the resource
	 * will be the new local resource.
	 *
	 * If the image is not found, the status  will be 'missing' and the resource 
	 * will be false.
	 */
	isFileAlreadyImported: function( resource, callback ) {
		mw.log( '::isFileAlreadyImported:: ' );
		var _this = this;

		// Clone the resource 
		//( not really needed and confuses the resource pointer role) 
		/*var proto = {};
		proto.prototype = resource;
		var myRes = new proto;
		*/
		var provider = resource.pSobj.provider;

		// Update target_resource_title with resource repository prefix:
		resource.target_resource_title = provider.resource_prefix + resource.target_resource_title;
		
		// Check if the file exists:
		_this.findFileInLocalWiki( resource.target_resource_title, function( imagePage ) {			
			if ( imagePage ) {			
				// Update to local src
				resource.local_src = imagePage['imageinfo'][0].url;				
				// @@todo maybe  update poster too?
				resource.local_poster = imagePage['imageinfo'][0].thumburl;				
				// Update the title:
				resource.target_resource_title = imagePage.title.replace(/^(File:|Image:)/ , '' );
				callback( 'imported' );
			} else {
				callback( 'missing' );
			}
		} );
	},
	
	/**
	* Show Import User Interface 
	* 
	* @param {Object} resource Resource Object to be imported
	* @param {Function} callback Function to be called once the resource is imported 
	*/
	showImportUI: function( resource, callback ) {
		var _this = this;
		mw.log( "showImportUI:: update:" + _this.canonicalFileNS + ':' + 
			resource.target_resource_title );
		
		var description = _this.getTemplateDescription( resource );		
		
		
		// Remove any old resource imports
		$j( '#rsd_resource_import' ).remove();
		
		// Update the interface
		$j( _this.target_container ).append( 
			_this.getResourceImportInterface( resource , description ) 
		);												
			
		var buttonPaneSelector = _this.target_container + '~ .ui-dialog-buttonpane';
		$j( buttonPaneSelector ).html (
			// Add the buttons to the bottom:
			$j.btnHtml( gM( 'mwe-do_import_resource' ), 'rsd_import_doimport', 'check' ) + 
			' ' +
			$j.btnHtml( gM( 'mwe-cancel_import' ), 'rsd_import_acancel', 'close' ) + ' '
		);

		// Update video tag (if a video)
		if ( resource.mime.indexOf( 'video/' ) !== -1 ){
			var target_rewrite_id = $j( _this.target_container ).attr( 'id' ) + '_rsd_pv_vid';
			$j('#' + target_rewrite_id ).embedPlayer();
		}

		// Load the preview text:
		_this.parse(
			description, _this.canonicalFileNS + ':' + resource.target_resource_title, 
			function( descHtml ) {
				$j( '#rsd_import_desc' ).html( descHtml );
			} 
		);
		
		// Add bindings:
		$j( _this.target_container + ' .rsd_import_apreview' )
			.buttonHover()
			.click( function() {
				mw.log( " Do preview asset update" );
				$j( '#rsd_import_desc' ).html( mw.loading_spinner() );
				// load the preview text:
				_this.parse( 
					$j( '#wpUploadDescription' ).val(), 
					_this.canonicalFileNS + ':' + resource.target_resource_title, 
					function( o ) {
						mw.log( 'got updated preview: ' );
						$j( '#rsd_import_desc' ).html( o );
					} 
				);
				return false;
			} );
		
		$j( buttonPaneSelector + ' .rsd_import_doimport' )
			.buttonHover()
			.click( function() {
				mw.log( "do import asset:" + _this.import_url_mode );
				// check import mode:
				if ( _this.import_url_mode == 'api' ) {
					_this.doApiImport( resource, callback );
				} else {
					mw.log( "Error: import mode is not form or API (can not copy asset)" );
				}
				return false;
			} );
		$j( buttonPaneSelector + ' .rsd_import_acancel' )
			.buttonHover()
			.click( function() {
				$j( '#rsd_resource_import' ).fadeOut( "fast", function() {
					$j( this ).remove();
					// restore buttons (from the clipEdit object::)
					_this.clipEdit.updateInsertControlActions();
					$j( buttonPaneSelector ).removeClass( 'ui-state-error' );
				} );
				return false;
			} );
	},
	
	/**
	* Get the resource Import interface 
	*/
	getResourceImportInterface: function( resource, description ){
		var _this = this;
		var $rsdResourceImport = $j('<div />')
			.attr( 'id', 'rsd_resource_import' )
			.addClass( 'ui-widget-content' )
			.css( {
				'position' : 'absolute',
				'top' : '0px',
				'left' : '0px',
				'right' : '0px',
				'bottom' : '0px',
				'z-index' : '5'
			} );
		
		var $rsdPreviewContainer = $j( '<div />')
			.attr( 'id', 'rsd_preview_import_container' )
			.css( {
				'position' : 'absolute',
				'width' : '49%',
				'bottom' : '0px',
				'left' : '5px',
				'overflow' : 'auto',
				'top' : '30px'
			} )
			.append(						
			// Get embedHTML with small thumb:
			resource.pSobj.getEmbedHTML( resource, {
				'id': _this.target_container + '_rsd_pv_vid',
				'max_height': '220',
				'only_poster': true
			} ) 
		)
		.append( 
			$j('<br />')
				.css( 'clear', 'both' ),
			$j( '<span />' )
				.css( { 'font-weight' : 'bold' } )
				.text( gM( 'mwe-resource_page_desc' ) ),
			$j( '<div />' )
				.attr( 'id', 'rsd_import_desc' )
				.css( 'display', 'inline' )
				.loadingSpinner()
		)
		
		var $importResourceTitle = $j( '<h3 />' )
			.css( {
				'color' : 'red',
				'padding' : '5px'
			} )
			.text(
				gM( 'mwe-resource-needs-import', [resource.title, _this.upload_api_name] ) 
			);
		
		var $importTitle = $j( '<span />' )
			.css( { 'font-weight' : 'bold' } )
			.text( gM( 'mwe-local_resource_title' ) );			
				
		var $importDestFile = $j( '<input />' )
			.attr( {
				'id' : 'wpDestFile',
				'type' : 'text',
				'size' : '30'
			} )
			.val ( resource.target_resource_title );
				
		var $importUploadDescription = $j('<div />')
			.append( 
				$j( '<span />' )
					.css( { 'font-weight' : 'bold'  } )
					.text( gM( 'mwe-edit_resource_desc' ) ),
				$j( '<textarea />' )
					.attr( {
						'id' : 'wpUploadDescription',
						'rows' : 8,
						'cols' : 50 
					})
					.css( {
						'width': '90%'				 
					} ) 
					.text( description ),
				$j( '<input />' )
					.attr( {
						'type' : 'checkbox',
						'id' : 'wpWatchthis',
						'name' : 'wpWatchthis',
						'tabindex' : '7'
					} )
			);
						
		var $editImportContainer = $j( '<div />' )
			.css( { 
				'position' : 'absolute', 	
				'left' : '50%',
				'bottom' : '0px',
				'top' : '30px',
				'right' : '0px',
				'overflow' : 'auto'
			})
			.append(
				$importTitle,				 
				$j( '<br />' ),
				
				$importDestFile,
				$j( '<br />' ),
				
				$importUploadDescription,
				$j( '<br />' ),
				
				// Add the watchlist button
				$j( '<label />' )
					.attr( {
						'for' : 'wpWatchthis'
					} )
					.text( 
						gM( 'mwe-watch_this_page' )  
					),
				$j( '<br />' ),
				
				// Add the update preview button: 
				$j( '<br />' ),
				$j('<span />').append(
					$j.btnHtml( gM( 'mwe-update_preview' ), 'rsd_import_apreview', 'refresh' )
				)
			); 
								
		$rsdResourceImport.append(
			$importResourceTitle, 
			$rsdPreviewContainer,
			$editImportContainer
		)
		return $rsdResourceImport;
	},
	
	/**
	* Get Template Description wikitext
	* @pram {Object} resource Resource source for description
	*/
	getTemplateDescription: function( resource ){
		// setup the resource description from resource description:
		// FIXME: i18n, namespace
		var description = '{{Information ' + "\n";

		if ( resource.desc ) {
			description += '|Description= ' + resource.desc + "\n";
		} else {
			description += '|Description= ' + gM( 'mwe-missing_desc_see_source', resource.link ) + "\n";
		}

		// Output search specific info
		description += '|Source=' + resource.pSobj.getImportResourceDescWiki( resource ) + "\n";

		if ( resource.author )
			description += '|Author=' + resource.author + "\n";

		if ( resource.date )
			description += '|Date=' + resource.date + "\n";

		// Add the Permission info:
		description += '|Permission=' + resource.pSobj.getPermissionWikiTag( resource ) + "\n";

		if ( resource.other_versions )
			description += '|other_versions=' + resource.other_versions + "\n";

		description += '}}';

		// Get any extra categories or helpful links
		description += resource.pSobj.getExtraResourceDescWiki( resource );
		return description;
	},
	
	/**
	* Sets up the proxy for the remote inserts
	* 
	* @param {Function} callbcak Function to call once proxy is setup. 
	*/
	setupProxy: function( callback ) {
		var _this = this;

		if ( _this.proxySetupDone ) {
			if ( callback )
				callback();
			return;
		}
		// setup the the proxy via  $j.apiProxy loader:
		if ( !_this.upload_api_proxy_frame ) {
			mw.log( "Error:: remote api but no proxy frame target" );
			return false;
		} else {
			$j.apiProxy(
				'client',
				{
					'server_frame': _this.upload_api_proxy_frame
				}, function() {
					_this.proxySetupDone = true
					if ( callback )
						callback();
				}
			);
		}
	},
	
	/**
	* Check the local wiki for a given fileName 
	*
	* @param {String} fileName File Name of the requested file 
	* @param {Function} callback 
	* 	Called with the result api result object OR
	* 	Callback is called with "false" if the file is not found
	*/
	findFileInLocalWiki: function( fileName, callback ) {
		mw.log( "findFileInLocalWiki::" + fileName );
		var _this = this;
		var request = {
			'action': 'query',
			'titles': fileName,
			'prop': 'imageinfo',
			'iiprop': 'url',
			'iiurlwidth': '400'
		};
		// First check the api for imagerepository
		mw.getJSON( this.local_wiki_api_url, request, function( data ) {
			if ( data.query.pages ) {
				for ( var i in data.query.pages ) {
					for ( var j in data.query.pages[i] ) {
						if ( j == 'missing' 
							&& data.query.pages[i].imagerepository != 'shared'
							&& data.query.pages[i].imagerepository != 'commons' ) 
						{
							mw.log( fileName + " not found" );
							callback( false );
							return;
						}
					}
					// else page is found:
					mw.log( fileName + "  found" );					
					callback( data.query.pages[i] );
				}
			}
		} );
	},
	
	/**
	* Do import a resource via API import call
	* 
	* @param {Object} resource Resource to import
	* @param {Function} callback Function to be called once api import call is done
	*/
	doApiImport: function( resource, callback ) {
		var _this = this;		
		mw.log( ":doApiImport:" );
		mw.addLoaderDialog( gM( 'mwe-importing_asset' ) );
		
		// Load the BaseUploadInterface:
		mw.load( 
			[
				'mw.BaseUploadInterface',
				'$j.ui.progressbar'
			], 
			function() {
				mw.log( 'mvBaseUploadInterface ready' );
				// Initiate a upload object ( similar to url copy ):
				// ( mvBaseUploadInterface handles upload errors ) 
				var uploader = new mw.BaseUploadInterface( {
					'api_url' : _this.upload_api_target,
					'done_upload_cb':function() {
						mw.log( 'doApiImport:: run callback::' );
						// We have finished the upload:

						// Close up the rsd_resource_import
						$j( '#rsd_resource_import' ).remove();
						// return the parent callback:
						return callback();
					}
				} );
				// Get the edit token
				_this.getEditToken( function( token ) {
					uploader.editToken = token;

					// Close the loader now that we are ready to present the progress dialog::
					mw.closeLoaderDialog();
					uploader.doHttpUpload( {
						'url' : resource.src,
						'filename' : $j( '#wpDestFile' ).val(),
						'comment' : $j( '#wpUploadDescription' ).val()
					} );
				} );
			}
		);
	},
	
	/**
	* get an edit Token
	* depends on upload_api_target being initialized
	* 
	* @param {Function} callback Function to be called once the token is available  
	*/
	getEditToken: function( callback ) {
		var _this = this;
		if ( _this.upload_api_target != 'proxy' ) {
			// (if not a proxy) first try to get the token from the page:
			var editToken = $j( "input[name='wpEditToken']" ).val();
			if ( editToken ) {
				callback( editToken );
				return;
			}
		}
		// @@todo try to load over ajax if( _this.local_wiki_api_url ) is set
		// ( for cases where inserting from a normal page view (that did not have wpEditToken)
		mw.getToken( _this.upload_api_target, function( token ) {
			callback( token );
		} );
	},
	
	/**
	* Shows a preview of the given resource
	*/
	showPreview: function( resource ) {
		var _this = this;
		this.isFileLocallyAvailable( resource, function( status ) {
		
			// If status is missing show import UI
			if ( status === 'missing' ) {
				_this.showImportUI( resource, function(){
					// Once the image is imported re-issue the showPreview request: 
					_this.showPreview( resource );
				} );
				return;
			}

			// Put another window ontop:
			$j( _this.target_container ).append( 
				$j('<div>').attr({
					'id': 'rsd_preview_display'
				})
				.css({
					'position' : 'absolute',
					'overflow' : 'auto',
					'z-index' : 4,
					'top' : '0px',
					'bottom' : '0px',
					'right' : '0px',
					'left' : '0px',
					'background-color' : '#FFF'
				}).loadingSpinner()				
			)

			var buttonPaneSelector = _this.target_container + '~ .ui-dialog-buttonpane';
			var origTitle = $j( _this.target_container ).dialog( 'option', 'title' );

			// Update title:
			$j( _this.target_container ).dialog( 'option', 'title', 
				gM( 'mwe-preview_insert_resource', resource.title ) );

			// Update buttons preview:
			$j( buttonPaneSelector )
				.html(
					$j.btnHtml( gM( 'rsd_do_insert' ), 'preview_do_insert', 'check' ) + ' ' )
				.children( '.preview_do_insert' )
				.click( function() {
					_this.insertResource( resource );
					return false;
				} );
				
			// Update cancel button
			$j( buttonPaneSelector )
				.append( '<a href="#" class="preview_close">Do More Modification</a>' )
				.children( '.preview_close' )
				.click( function() {
					$j( '#rsd_preview_display' ).remove();
					// Restore title:
					$j( _this.target_container ).dialog( 'option', 'title', origTitle );
					// Restore buttons (from the clipEdit object::)
					_this.clipEdit.updateInsertControlActions();
					return false;
				} );

			// Get the preview wikitext
			var embed_code = _this.getEmbedCode( resource );
			var pos = $j( _this.target_textbox ).textSelection( 'getCaretPosition' );			
			var editWikiText = $j( _this.target_textbox ).val();
			var parseText = editWikiText.substr(0, pos) + embed_code + editWikiText.substr( pos );
			_this.parse( 
				parseText,
				_this.target_title,
				function( phtml ) {
					$j( '#rsd_preview_display' ).html( phtml );
					if( mw.documentHasPlayerTags() ){
						mw.load( 'EmbedPlayer', function(){							
							// Update the display of video tag items (if any) 
							$j( mw.getConfig( 'rewritePlayerTags' ) ).embedPlayer();
						});
					}
				}
			);
		} );
	},
	
	/**
	* Get the embed code
	*
	* based on import_url_mode:
	* calls the resource providers getEmbedHTML method
	* 	or 
	* calls the resource providers getEmbedWikiCode method
	*/	
	getEmbedCode: function( resource ) {
		if ( this.import_url_mode == 'remote_link' ) {
			return resource.pSobj.getEmbedHTML( resource, { 'insert_description': true } );
		} else {
			return resource.pSobj.getEmbedWikiCode( resource );
		}
	},
	
	/**
	* Get the preview text for a given resource
	* 
	* builds the wikitext represnetation and 
	* issues an api call to gennerate a preview
	* 
	* @param {Object} resource Resource to get preview text for.
	*/
	/*getPreviewText: function( resource ) {
		var _this = this;
		var text;

		// Insert at start if textInput cursor has not been set (ie == length)
		var insertPos = _this.getCaretPos();
		var originalText = _this.getTextboxValue();
		var embedCode = _this.getEmbedCode( resource );
		if ( insertPos !== false && originalText ) {
			if ( originalText.length == insertPos ) {
				insertPos = 0;
			}
			text = originalText.substring( 0, insertPos ) +
				embedCode + originalText.substring( insertPos );
		} else {
			text = $j( _this.target_textbox ).val() + embedCode;
		}
		// check for missing </references>
		if ( text.indexOf( '<references/>' ) == -1 && text.indexOf( '<ref>' ) != -1 ) {
			text = text + '<references/>';
		}
		return text;
	},*/
	
	/**
	* issues the wikitext parse call 
	* 
	* @param {String} wikitext Wiki Text to be parsed by mediaWiki api call
	* @param {String} title Context title of the content to be parsed
	* @param {Function} callback Function called with api parser output 
	*/
	parse: function( wikitext, title, callback ) {		
		mw.getJSON( this.local_wiki_api_url, 
			{
				'action': 'parse',
				'title' : title,
				'text': wikitext
			}, function( data ) {
				callback( data.parse.text['*'] );
			}
		);
	},
	
	/**
	* Insert a resource
	*
	* Calls updateTextArea with the passed resource  
	* once we confirm the resource is available
	* 
	* @param {Object} resource Resource to be inserted
	*/	
	insertResource: function( resource ) {
		mw.log( 'insertResource: ' + resource.title );
		var _this = this;				
		// Double check that the resource is present:
		this.isFileLocallyAvailable( resource, function( status ) {
			if ( status === 'missing' ) {
				_this.showImportUI( resource, function() {
					_this.insertResourceToOutput( resource );
				} );
				return;
			}
			if ( status === 'local' || status === 'shared' || status === 'imported' ) {
				_this.insertResourceToOutput( resource );
			}
			//NOTE: should hanndle errors or other status states?
		} );
	},
	
	/**
	* Finish up the insertResource request outputing the resource to output targets
	*
	* @param {Object} resource Resource to be inserted into the output targets
	*/
	insertResourceToOutput: function( resource ){
		var _this = this;		
		var embed_code = _this.getEmbedCode( resource );
		$j( _this.target_textbox ).textSelection( 'encapsulateSelection', { 'post' : embed_code } );
		
		// Update the render area for HTML output of video tag with mwEmbed "player"
		var embedCode = _this.getEmbedCode( resource );
		if ( _this.target_render_area && embedCode ) {
			
			// Output with some padding:
			$j( _this.target_render_area )
				.append( embedCode + '<div style="clear:both;height:10px">' )

			// Update the player if video or audio:
			if ( resource.mime.indexOf( 'audio' ) != -1 ||
				resource.mime.indexOf( 'video' ) != -1 ||
				resource.mime.indexOf( '/ogg' ) != -1 ) 
			{
				// Re-load the player module ( will scan page for mw.getConfig( 'rewritePlayerTags' ) )
				$j.embedPlayers();
			}
		}
		
		// Close up the add-media-wizard dialog
		_this.closeAll();
	},
		
	/**
	* Close up the remote search driver
	*/
	closeAll: function() {
		var _this = this;
		mw.log( "close all:: "  + _this.target_container );
		_this.onCancelClipEdit();
		
		$j( _this.target_container ).dialog( 'close' );
		// Give a chance for the events to complete
		// (somehow at least in firefox a rare condition occurs where
		// the modal of the edit-box stick around even after the
		// close request has been issued. )
		setTimeout( 
			function() {
				$j( _this.target_container ).dialog( 'close' );
				$j( _this.target_container ).remove();
			}, 25 
		);
	},
	
	/**
	 * Create controls for selecting result display layout (e.g. box, list)
	 * 
	 * @return {jQuery element} The layout element to embed in the page.
	 */
	createLayoutSelector: function() {

		var _this = this;
		var darkBoxUrl = mw.getConfig( 'images_path' ) + 'box_layout_icon_dark.png';
		var lightBoxUrl = mw.getConfig( 'images_path' ) + 'box_layout_icon.png';
		var darkListUrl = mw.getConfig( 'images_path' ) + 'list_layout_icon_dark.png';
		var lightListUrl = mw.getConfig( 'images_path' ) + 'list_layout_icon.png';
		
		var defaultBoxUrl, defaultListUrl;
		if ( _this.displayMode == 'box' ) {
			defaultBoxUrl = darkBoxUrl;
			defaultListUrl = lightListUrl;
		} else {
			defaultBoxUrl = lightBoxUrl;
			defaultListUrl = darkListUrl;
		}
		
		$boxLayout = $j( '<img />' ).addClass( 'layout_selector' )
			.attr({
				id: 'msc_box_layout',
				title: gM( 'rsd_box_layout' ),
				src: defaultBoxUrl
			})
			.hover( 
				function() {
					$j( this ).attr( "src", darkBoxUrl );
				}, 
				function() {
					$j( this ).attr( "src",  defaultBoxUrl );
				} )
			.click( function() {
				$boxLayout.attr( "src", darkBoxUrl );
				$listLayout.attr( "src", lightListUrl );
				_this.setDisplayMode( 'box' );
				return false;
			} );
		$listLayout = $j( '<img />' ).addClass( 'layout_selector' )
			.attr({
				id: 'msc_list_layout',
				title: gM( 'rsd_list_layout' ),
				src: defaultListUrl
			})
			.hover( 
				function() {
					$j( this ).attr( "src", darkListUrl );
				}, 
				function() {
					$j( this ).attr( "src", defaultListUrl );
				} )
			.click( function() {
				$listLayout.attr( "src", darkListUrl );
				$boxLayout.attr( "src", lightBoxUrl );
				_this.setDisplayMode( 'list' );
				return false;
			} );
			
		$layoutSelector = $j( '<span />' )
							.append( $boxLayout )
							.append( $listLayout );
							
		return $layoutSelector;
	},
	/**
	 * Create a string indicating the source of the results + link
	 * 
	 * @param The current content provider.
	 * 
	 * @return {jQuery element} A description element for embedding.
	 */
	createSearchDescription: function(cp) {
		
		var resultsFromMsg = gM( 'mwe-results_from', 
			[ cp.homepage, gM( 'rsd-' + this.current_provider + '-title' ) ] );
		
		var $searchContent = $j( '<span />' ).html(resultsFromMsg);
		var $searchDescription = $j( '<span />' ).addClass( 'rsd_search_description' )
			.attr({
				id: 'rsd_search_description'
			})
			.append( $searchContent );
		
		return $searchDescription;
	},
	/**
	* Results Header controls like box vs list view
	* & search description
	* 
	* @return {jQuery element} The header for embedding in the result set.
	*/ 
	createResultsHeader: function() {
		var _this = this;
		
		if ( !this.content_providers[ this.current_provider ] ) {
			return;
		}
		var cp = this.content_providers[ this.current_provider ];
		
		var $header = $j( '<div />' )
			.attr({
				id: 'rsd_results_header'
			});

		$header.append( this.createLayoutSelector() )
		       .append( this.createSearchDescription( cp ) );
		
		return $header;
	},
	
	/**
	 * Creates the footer of the search results (paging).
	 * 
	 * @return {jQuery element} The footer for embedding in the result set.
	 */
	createResultsFooter: function() {
		var _this = this;
		
		var $footer = $j( '<div />' )
		.attr({
			id: 'rsd_results_footer'
		})
		.append( this.createPagingControl() );
		
		return $footer;
	},
	
	/**
	* Generates an HTML control for paging between search results.
	*
	* @return {jQuery element} paging control for current results  
	*/
	createPagingControl: function( target ) {
		var _this = this;
		var provider = _this.content_providers[ _this.current_provider ];
		var search = provider.sObj;
		
		mw.log( 'Paging Control for ' + _this.current_provider + ' num of results: ' + search.num_results );
		var to_num = ( provider.limit > search.num_results ) ?
			( parseInt( provider.offset ) + parseInt( search.num_results ) ) :
			( parseInt( provider.offset ) + parseInt( provider.limit ) );
		
		var $pagingControl = $j('<span />').attr({
			id: 'rsd_paging_control'
		});
		
		// This puts enumeration text e.g. Results 1 to 30.
		var resultEnumeration = '';
		// @@todo we should instead support the wiki number format template system instead of inline calls
		if ( search.num_results != 0 ) {
			if ( search.num_results  >  provider.limit ) {
				resultEnumeration = gM( 'rsd_results_desc_total', [( provider.offset + 1 ), to_num, 
					mw.lang.formatNumber( search.num_results )] );
			} else {
				resultEnumeration = gM( 'rsd_results_desc', [( provider.offset + 1 ), to_num] );
			}
		}
		
		var $resultEnumeration = $j( '<span />' ).text( resultEnumeration )
												 .addClass( 'rsd_result_enumeration' );
		$pagingControl.append( $resultEnumeration );
		
		// Place the previous results link
		if ( provider.offset >= provider.limit ) {
			var prevLinkText = gM( 'rsd_results_prev' ) + ' ' + provider.limit;
			var $prevLink = $j( '<a />' )
				.attr({
					href: '#',
					id: 'rsd_pprev'
				} )
				.text( prevLinkText )
				.click( function() {
					provider.offset -= provider.limit;
					if ( provider.offset < 0 )
						provider.offset = 0;
					_this.updateResults();
					return false;
				} );
			$pagingControl.prepend( $prevLink );
		}

		// Place the next results link
		if ( search.more_results ) {
			var nextLinkText = gM( 'rsd_results_next' ) + ' ' + provider.limit;
			var $nextLink = $j( '<a />' )
				.attr({
					href: '#',
					id: 'rsd_pnext'
				} )
				.text( nextLinkText )
				.click( function() {
					provider.offset += provider.limit;
					_this.updateResults();
					return false;
				} );
			$pagingControl.append( $nextLink );
		}

		return $pagingControl;
	},
	
	/**
	* Select a given search provider
	* @param {String} provider_id Provider id to select and display  
	*/
	selectTab: function( provider_id ) {
		mw.log( 'select tab: ' + provider_id );
		this.current_provider = provider_id;
		if ( this.current_provider == 'upload' ) {
			this.updateUploadResults();
		} else {
			// update the search results:
			this.updateResults();
		}
	},
	
	/*
	* Sets the dispaly mode
	* @param {String} mode Either "box" or "list" 
	*/	
	setDisplayMode: function( mode ) {
		mw.log( 'setDisplayMode:' + mode );
		this.displayMode = mode;
		// run /update search display:
		this.showResults();
	}
};
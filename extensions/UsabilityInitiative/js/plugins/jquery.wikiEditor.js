/**
 * This plugin provides a way to build a user interface around a textarea. You
 * can build the UI from a confguration..
 * 	$j( 'div#edittoolbar' ).wikiEditor(
 * 		{ 'modules': { 'toolbar': { ... config ... } } }
 * 	);
 * ...and add modules after it's already been initialized...
 * 	$j( 'textarea#wpTextbox1' ).wikiEditor(
 * 		'addModule', 'toc', { ... config ... }
 *	);
 * ...using the API, which is still be finished.
 */
( function( $ ) {

$.wikiEditor = {
	'modules': {},
	'instances': [],
	'supportedBrowsers': {
		'ltr': { 'msie': 7, 'firefox': 2, 'opera': 9, 'safari': 3, 'chrome': 1, 'camino': 1 },
		'rtl': { 'msie': 8, 'firefox': 2, 'opera': 9, 'safari': 3, 'chrome': 1, 'camino': 1 }
	},
	/**
	 * Path to images - this is a bit messy, and it would need to change if
	 * this code (and images) gets moved into the core - or anywhere for
	 * that matter...
	 */
	imgPath : wgScriptPath + '/extensions/UsabilityInitiative/images/wikiEditor/'
};

$.wikiEditor.isSupportKnown = function() {
	return ( function( supportedBrowsers ) {
		return $.browser.name in supportedBrowsers;
	} )( $.wikiEditor.supportedBrowsers[$( 'body.rtl' ).size() ? 'rtl' : 'ltr'] );
};
$.wikiEditor.isSupported = function() {
	return ( function( supportedBrowsers ) {
		return $.browser.name in supportedBrowsers && $.browser.versionNumber >= supportedBrowsers[$.browser.name];
	} )( $.wikiEditor.supportedBrowsers[$( 'body.rtl' ).size() ? 'rtl' : 'ltr'] );
};
// Wraps gM from js2, but allows raw text to supercede
$.wikiEditor.autoMsg = function( object, property ) {
	// Accept array of possible properties, of which the first one found will be used
	if ( typeof property == 'object' ) {
		for ( i in property ) {
			if ( property[i] in object || property[i] + 'Msg' in object ) {
				property = property[i];
				break;
			}
		}
	}
	if ( property in object ) {
		return object[property];
	} else if ( property + 'Msg' in object ) {
		return gM( object[property + 'Msg'] );
	} else {
		return '';
	}
};

$.fn.wikiEditor = function() {

/* Initialization */

// The wikiEditor context is stored in the element, so when this function
// gets called again we can pick up where we left off
var context = $(this).data( 'wikiEditor-context' );


if ( typeof context == 'undefined' ) {
	/* Construction */
	var instance = $.wikiEditor.instances.length;
	context = { '$textarea': $(this), 'modules': {}, 'data': {}, 'instance': instance };
	$.wikiEditor.instances[instance] = $(this);
	
	// Encapsulate the textarea with some containers for layout
	$(this)
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui' ).attr( 'id', 'wikiEditor-ui' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-bottom' ).attr( 'id', 'wikiEditor-ui-bottom' ) )
		.wrap( $( '<div></div>' ).addClass( 'wikiEditor-ui-text' ).attr( 'id', 'wikiEditor-ui-text' ) );
	
	// Get a reference to the outer container
	context.$ui = $(this).parent().parent().parent();
	context.$ui.after( $( '<div style="clear:both;"></div>' ) );
	// Attach a container in the top
	context.$ui.prepend( $( '<div></div>' ).addClass( 'wikiEditor-ui-top' ).attr( 'id', 'wikiEditor-ui-top' ) );
	
	// Create a set of standard methods for internal and external use
	context.api = {
		/**
		 * Accepts either a string of the name of a module to add without any
		 * additional configuration parameters, or an object with members keyed with
		 * module names and valued with configuration objects
		 */
		addModule: function( context, data ) {
			// A safe way of calling an API function on a module
			function callModuleApi( module, call, data ) {
				if (
					module in $.wikiEditor.modules &&
					'fn' in $.wikiEditor.modules[module] &&
					call in $.wikiEditor.modules[module].fn
				) {
					$.wikiEditor.modules[module].fn[call]( context, data );
				}
			}
			if ( typeof data == 'string' ) {
				callModuleApi( data, 'create', {} );
			} else if ( typeof data == 'object' ) {
				for ( module in data ) {
					if ( typeof module == 'string' ) {
						callModuleApi( module, 'create', data[module] );
					}
				}
			}
		}
	};
	// Allow modules to extend the API
	for ( module in $.wikiEditor.modules ) {
		if ( 'api' in $.wikiEditor.modules[module] ) {
			for ( call in $.wikiEditor.modules[module].api ) {
				// Modules may not overwrite existing API functions - first come,
				// first serve
				if ( !( call in context.api ) ) {
					context.api[call] = $.wikiEditor.modules[module].api[call];
				}
			}
		}
	}
	//Each browser seems to do this differently, so let's keep our editor
	//consistent by always starting at the begining
	context.$textarea.scrollToCaretPosition( 0 );
}

// If there was a configuration passed, it's assumed to be for the addModule
// API call
if ( arguments.length > 0 && typeof arguments[0] == 'object' ) {
	context.api.addModule( context, arguments[0] );
} else {
	// Since javascript gives arguments as an object, we need to convert them
	// so they can be used more easily
	arguments = $.makeArray( arguments );
	if ( arguments.length > 0 ) {
		// Handle API calls
		var call = arguments.shift();
		if ( call in context.api ) {
			context.api[call]( context, arguments[0] == undefined ? {} : arguments[0] );
		}
	}
}

// Store the context for next time, and support chaining
return $(this).data( 'wikiEditor-context', context );

};})(jQuery);
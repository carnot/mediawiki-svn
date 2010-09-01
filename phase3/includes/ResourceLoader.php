<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @author Roan Kattouw
 * @author Trevor Parscal
 */

// FIXME: filesystem access calls in this class need to prepend $IP/ to all paths

/*
 * Dynamic JavaScript and CSS resource loading system
 *
 * @example
 * 	// Registers a module with the resource loading system
 * 	ResourceLoader::register( 'foo', array(
 * 		// Script or list of scripts to include when implementating the module (required)
 * 		'script' => 'resources/foo/foo.js',
 *		// List of scripts or lists of scripts to include based on the current language
 *		'locales' => array(
 *			'en-gb' => 'resources/foo/locales/en-gb.js',
 *		),
 * 		// Script or list of scripts to include only when in debug mode
 * 		'debug' => 'resources/foo/debug.js',
 * 		// If this module is going to be loaded before the mediawiki module is ready such as jquery or the mediawiki
 * 		// module itself, it can be included without special loader wrapping - this will also limit the module to not be
 * 		// able to specify needs, custom loaders, styles, themes or messages (any of the options below) - raw scripts
 * 		// get registered as 'ready' after the mediawiki module is ready, so they can be named as dependencies
 * 		'raw' => false,
 * 		// Modules or list of modules which are needed and should be used when generating loader code
 * 		'needs' => 'resources/foo/foo.js',
 * 		// Script or list of scripts which will cause loader code to not be generated - if you are doing something fancy
 * 		// with your dependencies this gives you a way to use custom registration code
 * 		'loader' => 'resources/foo/loader.js',
 * 		// Style-sheets or list of style-sheets to include
 * 		'style' => 'resources/foo/foo.css',
 *		// List of style-sheets or lists of style-sheets to include based on the skin - if no match is found for current
 *		// skin, 'default' is used - if default doesn't exist nothing is added
 *		'themes' => array(
 *			'default' => 'resources/foo/themes/default/foo.css',
 *			'vector' => 'resources/foo/themes/vector.foo.css',
 *		),
 * 		// List of keys of messages to include
 * 		'messages' => array( 'foo-hello', 'foo-goodbye' ),
 * 		// Subclass of ResourceLoaderModule to use for custom modules
 *		'class' => 'ResourceLoaderSiteJSModule',
 * 	) );
 * @example
 * 	// Responds to a resource loading request
 * 	ResourceLoader::respond( $wgRequest, $wgServer . $wgScriptPath . '/load.php' );
 */
class ResourceLoader {
	
	/* Protected Static Members */
	
	// @var array list of module name/ResourceLoaderModule object pairs
	protected static $modules = array();
	// @var array list of modules which should not be registered, as they are already registered in mediawiki.js
	protected static $preRegisteredModules = array( 'jquery', 'mediawiki' );
	
	/* Protected Static Methods */
	
	/**
	 * Runs text through a filter, caching the filtered result for future calls
	 *
	 * @param {string} $filter name of filter to run
	 * @param {string} $data text to filter, such as JavaScript or CSS text
	 * @param {string} $file path to file being filtered, (optional: only required for CSS to resolve paths)
	 * @return {string} filtered data
	 */
	protected static function filter( $filter, $data ) {
		// FIXME: $file is not used by any callers as path rewriting is currently kinda broken
		global $wgMemc;
		$key = wfMemcKey( 'resourceloader', 'filter', $filter, md5( $data ) );
		$cached = $wgMemc->get( $key );
		if ( $cached !== false && $cached !== null ) {
			return $cached;
		}
		try {
			switch ( $filter ) {
				case 'minify-js':
					$result = JSMin::minify( $data );
					break;
				case 'minify-css':
					$result = CSSMin::minify( $data );
					//$result = $data;
					break;
				case 'flip-css':
					$result = CSSJanus::transform( $data, true, false );
					break;
				default:
					// Don't cache anything, just pass right through
					return $data;
			}
		} catch ( Exception $exception ) {
			throw new MWException( 'Filter threw an exception: ' . $exception->getMessage() );
		}
		$wgMemc->set( $key, $result );
		return $result;
	}
	
	/* Static Methods */
	
	/**
	 * Registers a module with the ResourceLoader system.
	 *
	 * Note that registering the same object under multiple names is not supported and may silently fail in all
	 * kinds of interesting ways.
	 * 
	 * @param {mixed} $name string of name of module or array of name/object pairs
	 * @param {ResourceLoaderModule} $object module object (optional when using multiple-registration calling style)
	 * @return {boolean} false if there were any errors, in which case one or more modules were not registered
	 * 
	 * @todo We need much more clever error reporting, not just in detailing what happened, but in bringing errors to
	 * the client in a way that they can easily see them if they want to, such as by using FireBug
	 */
	public static function register( $name, ResourceLoaderModule $object = null ) {
		// Allow multiple modules to be registered in one call
		if ( is_array( $name ) && !isset( $object ) ) {
			foreach ( $name as $key => $value ) {
				self::register( $key, $value );
			}
			return;
		}
		// Disallow duplicate registrations
		if ( isset( self::$modules[$name] ) ) {
			// A module has already been registered by this name
			throw new MWException( 'Another module has already been registered as ' . $name );
		}
		// Attach module
		self::$modules[$name] = $object;
		$object->setName( $name );
	}
	
	/**
	 * Gets a map of all modules and their options
	 *
	 * @return {array} array( modulename => ResourceLoaderModule )
	 */
	public static function getModules() {
		return self::$modules;
	}
	
	/**
	 * Get the ResourceLoaderModule object for a given module name
	 * @param $name string Module name
	 * @return mixed ResourceLoaderModule or null if not registered
	 */
	public static function getModule( $name ) {
		return isset( self::$modules[$name] ) ? self::$modules[$name] : null;
	}
	
	/**
	 * Gets registration code for all modules, except pre-registered ones listed in self::$preRegisteredModules
	 *
	 * The $lang, $skin and $debug parameters are used to calculate the last modified timestamps for each
	 * module.
	 * @param $lang string Language code
	 * @param $skin string Skin name
	 * @param $debug bool Debug mode flag
	 * @return {string} JavaScript code for registering all modules with the client loader
	 */
	public static function getModuleRegistrations( $lang, $skin, $debug ) {
		$scripts = '';
		$registrations = array();
		foreach ( self::$modules as $name => $module ) {
			if ( !in_array( $name, self::$preRegisteredModules ) ) {
				// Support module loader scripts
				if ( ( $loader = $module->getLoaderScript() ) !== false ) {
					$scripts .= "\n" . $loader;
				}
				// Automatically register module
				else {
					// Modules without dependencies pass one argument (name) to mediaWiki.loader.register()
					if ( !count( $module->getDependencies() ) ) {
						$registrations[] = array( $name, $module->getModifiedTime( $lang, $skin, $debug ) );
					}
					// Modules with dependencies pass two arguments (name, dependencies) to mediaWiki.loader.register()
					else {
						$registrations[] = array( $name, $module->getModifiedTime( $lang, $skin, $debug ),
							$module->getDependencies() );
					}
				}
			}
		}
		$scripts .= "\nmediaWiki.loader.register( " . FormatJson::encode( $registrations ) . " );\n";
		return "window.mediaWikiStartUp = function() {" . $scripts . "};";
	}
	
	/**
	 * Get the highest modification time of all modules, based on a given combination of language code,
	 * skin name and debug mode flag.
	 * @param $lang string Language code
	 * @param $skin string Skin name
	 * @param $debug bool Debug mode flag
	 * @return int UNIX timestamp
	 */
	public static function getHighestModifiedTime( $lang, $skin, $debug ) {
		$retval = 1; // wfTimestamp() treats 0 as 'now', so that's not a suitable choice
		foreach ( self::$modules as $module ) {
			$retval = max( $retval, $module->getModifiedTime( $lang, $skin, $debug ) );
		}
		return $retval;
	}
	
	/*
	 * Outputs a response to a resource load-request, including a content-type header
	 *
	 * @param {WebRequest} $request web request object to respond to
	 * @param {string} $server web-accessible path to script server
	 *
	 * $options format:
	 * 	array(
	 * 		'lang' => [string: language code, optional, code of default language by default],
	 * 		'skin' => [string: name of skin, optional, name of default skin by default],
	 * 		'dir' => [string: 'ltr' or 'rtl', optional, direction of lang by default],
	 * 		'debug' => [boolean: true to include debug-only scripts, optional, false by default],
	 * 		'only' => [string: 'scripts', 'styles' or 'messages', optional, if set only get part of the requested module]
	 * 	)
	 */
	public static function respond( WebRequest $request, $server ) {
		global $wgUser, $wgLang, $wgDefaultSkin;
		// Fallback on system settings
		// FIXME: Unnecessary unstubbing going on here, work around that
		$parameters = array(
			'lang' => $request->getVal( 'lang', $wgLang->getCode() ),
			'skin' => $request->getVal( 'skin', $wgDefaultSkin ),
			'debug' => $request->getVal( 'debug' ),
			'only' => $request->getVal( 'only' ),
		);
		// Mediawiki's WebRequest::getBool is a bit on the annoying side - we need to allow 'true' and 'false' values
		// to be converted to boolean true and false
		$parameters['debug'] = $parameters['debug'] === 'true' || $parameters['debug'];
		// Get the direction from the requested language
		if ( !isset( $parameters['dir'] ) ) {
			$lang = Language::factory( $parameters['lang'] );
			$parameters['dir'] = $lang->getDir();
		}
		$includeScripts = false;
		$includeStyles = false;
		$includeMessages = false;
		switch ( $parameters['only'] ) {
			case 'scripts':
				$includeScripts = true;
				break;
			case 'styles':
				$includeStyles = true;
				break;
			case 'messages':
				$includeMessages = true;
				break;
			default:
				$includeScripts = true;
				$includeStyles = true;
				$includeMessages = true;
		}
		
		// Build a list of requested modules excluding unrecognized ones
		$modules = array();
		$missing = array();
		foreach ( explode( '|', $request->getVal( 'modules' ) ) as $name ) {
			if ( isset( self::$modules[$name] ) ) {
				$modules[] = $name;
			} else {
				$missing[] = $name;
			}
		}
		
		// Calculate the mtime and caching maxages for this request. We need this, 304 or no 304
		$mtime = 1;
		$maxage = PHP_INT_MAX;
		$smaxage = PHP_INT_MAX;
		foreach ( $modules as $name ) {
			$module = self::getModule( $name );
			$mtime = max( $mtime, $module->getModifiedTime(
				$parameters['lang'], $parameters['skin'], $parameters['debug']
			) );
			$maxage = min( $maxage, $module->getClientMaxage() );
			$smaxage = min( $smaxage, $module->getServerMaxage() );
		}
		header( 'Last-Modified: ' . wfTimestamp( TS_RFC2822, $mtime ) );
		$expires = wfTimestamp( TS_RFC2822, min( $maxage, $smaxage ) + time() );
		header( "Cache-Control: public, maxage=$maxage, s-maxage=$smaxage" );
		header( "Expires: $expires" );
		
		// Check if there's an If-Modified-Since header and respond with a 304 Not Modified if possible
		$ims = $request->getHeader( 'If-Modified-Since' );
		if ( $ims !== false && wfTimestamp( TS_UNIX, $ims ) == $mtime ) {
			header( 'HTTP/1.0 304 Not Modified' );
			header( 'Status: 304 Not Modified' );
			return;
		}
		
		// Use output buffering
		ob_start();
		$blobs = $includeMessages ? MessageBlobStore::get( $modules, $parameters['lang'] ) : array();
		
		// Generate output
		foreach ( $modules as $name ) {
			// Scripts
			$scripts = '';
			if ( $includeScripts ) {
				$scripts .= self::$modules[$name]->getScript(
					$parameters['lang'], $parameters['skin'], $parameters['debug']
				);
				// Special meta-information for the 'mediawiki' module
				if ( $name === 'mediawiki' && $parameters['only'] === 'scripts' ) {
					$scripts .= "mediaWiki.config.set( " .
						FormatJson::encode( array( 'server' => $server, 'debug' => $parameters['debug'] ) ) . " );\n";
					$scripts .= self::getModuleRegistrations( $parameters['lang'], $parameters['skin'], $parameters['debug'] );
				}
			}
			// Styles
			$styles = '';
			if ( $includeStyles && ( $styles .= self::$modules[$name]->getStyle( $parameters['skin'] ) ) !== '' ) {
				if ( $parameters['dir'] == 'rtl' ) {
					$styles = self::filter( 'flip-css', $styles );
				}
				$styles = $parameters['debug'] ? $styles : self::filter( 'minify-css', $styles );
			}
			// Messages
			$messages = isset( $blobs[$name] ) ? $blobs[$name] : '{}';
			// Output
			if ( $parameters['only'] === 'styles' ) {
				echo $styles;
			} else if ( $parameters['only'] === 'scripts' ) {
				echo $scripts;
			} else if ( $parameters['only'] === 'messages' ) {
				echo "mediaWiki.msg.set( $messages );\n";
			} else {
				$styles = Xml::escapeJsString( $styles );
				echo "mediaWiki.loader.implement( '{$name}', function() {{$scripts}},\n'{$styles}',\n{$messages} );\n";
			}
		}
		
		// Register missing modules
		foreach ( $missing as $name ) {
			echo "mediaWiki.loader.register( '{$name}', null, 'missing' );\n";
		}
		
		if ( $parameters['only'] == 'styles' ) {
			header( 'Content-Type: text/css' );
		} else {
			header( 'Content-Type: text/javascript' );
			if ( $parameters['debug'] ) {
				ob_end_flush();
			} else {
				echo self::filter( 'minify-js', ob_get_clean() );
			}
		}
	}
}

// FIXME: Temp hack
require_once "$IP/resources/Resources.php";
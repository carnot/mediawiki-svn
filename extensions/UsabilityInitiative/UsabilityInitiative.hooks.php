<?php
/**
 * Hooks for Usability Initiative extensions
 *
 * @file
 * @ingroup Extensions
 */

class UsabilityInitiativeHooks {

	/* Static Members */
	
	private static $doOutput = false;
	private static $messages = array();
	private static $variables = array();
	private static $literalVariables = array();
	private static $styles = array();
	private static $styleFiles = array(
		'base_sets' => array(
			'raw' => array(
				array( 'src' => 'css/suggestions.css', 'version' => 5 ),
				array( 'src' => 'css/wikiEditor.css', 'version' => 4 ),
				array( 'src' => 'css/wikiEditor.toolbar.css', 'version' => 5 ),
				array( 'src' => 'css/wikiEditor.dialogs.css', 'version' => 1 ),
				array( 'src' => 'css/wikiEditor.toc.css', 'version' => 5 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2' ),
			),
			'combined' => array(
				array( 'src' => 'css/combined.css', 'version' => 7 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2' ),
			),
			'minified' => array(
				array( 'src' => 'css/combined.min.css', 'version' => 7 ),
				array( 'src' => 'css/vector/jquery-ui-1.7.2.css', 'version' => '1.7.2' ),
			),
		)
	);
	private static $scripts = array();
	private static $scriptFiles = array(
		'tests' => array(
			array( 'src' => 'js/tests/wikiEditor.toolbar.js', 'version' => 0 )
		),
		// Code to include when js2 is not present
		'no_js2' => array(
			'raw' => array(
				array( 'src' => 'js/js2/jquery-1.3.2.js', 'version' => '1.3.2' ),
				array( 'src' => 'js/js2/js2.js', 'version' => 3 ),
			),
			'combined' => array(
				array( 'src' => 'js/js2.combined.js', 'version' => 5 ),
			),
			'minified' => array(
				array( 'src' => 'js/js2.combined.min.js', 'version' => 5 ),
			),
		),
		// Core functionality of extension
		'base_sets' => array(
			'raw' => array(
				array( 'src' => 'js/plugins/jquery.async.js', 'version' => 3 ),
				array( 'src' => 'js/plugins/jquery.browser.js', 'version' => 3 ),
				array( 'src' => 'js/plugins/jquery.cookie.js', 'version' => 3 ),
				array( 'src' => 'js/plugins/jquery.namespaceSelect.js', 'version' => 0 ),
				array( 'src' => 'js/plugins/jquery.suggestions.js', 'version' => 2 ),
				array( 'src' => 'js/plugins/jquery.textSelection.js', 'version' => 9 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.js', 'version' => 4 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.toolbar.js', 'version' => 11 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.dialogs.js', 'version' => 1 ),
				array( 'src' => 'js/plugins/jquery.wikiEditor.toc.js', 'version' => 5 ),
				array( 'src' => 'js/js2/jquery-ui-1.7.2.js', 'version' => '1.7.2x' ),
			),
			'combined' => array(
				array( 'src' => 'js/plugins.combined.js', 'version' => 17 ),
			),
			'minified' => array(
				array( 'src' => 'js/plugins.combined.min.js', 'version' => 17 ),
			),
		),
	);
	
	/* Static Functions */
	
	public static function initialize() {
		global $wgUsabilityInitiativeResourceMode;
		global $wgEnableJS2system, $wgEditToolbarRunTests;
		
		// Only do this the first time!
		if ( !self::$doOutput ) {
			// Default to raw
			$mode = $wgUsabilityInitiativeResourceMode; // Just an alias
			if ( !isset( self::$scriptFiles['base_sets'][$mode] ) ) {
				$mode = 'raw';
			}
			// Provide enough support to make things work, even when js2 is not
			// in use (eventually it will be standard, but right now it's not)
			if ( !$wgEnableJS2system ) {
				self::$scripts = array_merge(
					self::$scripts, self::$scriptFiles['no_js2'][$mode]
				);
			}
			// Inlcude base-set of scripts
			self::$scripts = array_merge(
				self::$scripts, self::$scriptFiles['base_sets'][$mode]
			);
			// Inlcude base-set of styles
			self::$styles = array_merge(
				self::$styles, self::$styleFiles['base_sets'][$mode]
			);
			if ( $wgEditToolbarRunTests ) {
				// Include client side tests
				self::$scripts = array_merge(
					self::$scripts, self::$scriptFiles['tests']
				);
			}
		}
		self::$doOutput = true;
	}
	
	/**
	 * AjaxAddScript hook
	 * Adds scripts
	 */
	public static function addResources( $out ) {
		global $wgScriptPath, $wgJsMimeType;
		
		if ( !self::$doOutput )
			return true;
		// Transforms variables into javascript global variables
		foreach ( self::$variables as $key => $value ) {
			$escapedVariableValue = Xml::escapeJsString( $value );
			$escapedVariableKey = Xml::escapeJsString( $key );
			self::$variables[$key] =
				"var {$escapedVariableKey} = '{$escapedVariableValue}';";
		}
		
		//literal variables, ie ones we do not want escaped as strings
		foreach( self::$literalVariables as $key => $value){
			$escapedVariableValue = Xml::escapeJsString( $value );
			$escapedVariableKey = Xml::escapeJsString( $key );
			self::$variables[$key] =
				"var {$escapedVariableKey} = {$escapedVariableValue};";
		}
		if ( count( self::$variables ) > 0 ) {
			$out->addScript(
				Xml::tags(
					'script',
					array( 'type' => $wgJsMimeType ),
					implode( self::$variables )
				)
			);
		}
		
		// Loops over each script
		foreach ( self::$scripts as $script ) {
			// Add javascript to document
			$out->addScript(
				Xml::element(
					'script',
					array(
						'type' => $wgJsMimeType,
						'src' => $wgScriptPath .
							"/extensions/UsabilityInitiative/" .
								"{$script['src']}?{$script['version']}",
					),
					'',
					false
				)
			);
		}
		// Transforms messages into javascript object members
		foreach ( self::$messages as $i => $message ) {
			$escapedMessageValue = Xml::escapeJsString( wfMsg( $message ) );
			$escapedMessageKey = Xml::escapeJsString( $message );
			self::$messages[$i] =
				"'{$escapedMessageKey}':'{$escapedMessageValue}'";
		}
		// Add javascript to document
		if ( count( self::$messages ) > 0 ) {
			$out->addScript(
				Xml::tags(
					'script',
					array( 'type' => $wgJsMimeType ),
					'loadGM({' . implode( ',', self::$messages ) . '});'
				)
			);
		}
		// Loops over each style
		foreach ( self::$styles as $style ) {
			// Add css for various styles
			$out->addLink(
				array(
					'rel' => 'stylesheet',
					'type' => 'text/css',
					'href' => $wgScriptPath .
							"/extensions/UsabilityInitiative/" .
								"{$style['src']}?{$style['version']}",
				)
			);
		}
		return true;
	}

	/**
	 * Adds a reference to a javascript file to the head of the document
	 * @param string $src Path to the file relative to this extension's folder
	 * @param object $version Version number of the file
	 */
	public static function addScript( $src, $version = '' ) {
		self::$scripts[] = array( 'src' => $src, 'version' => $version );
	}

	/**
	 * Adds a reference to a css file to the head of the document
	 * @param string $src Path to the file relative to this extension's folder
	 * @param string $version Version number of the file
	 */
	public static function addStyle( $src, $version = '' ) {
		self::$styles[] = array( 'src' => $src, 'version' => $version );
	}

	/**
	 * Adds internationalized message definitions to the document for access
	 * via javascript using the gM() function
	 * @param array $messages Key names of messages to load
	 */
	public static function addMessages( $messages ) {
		self::$messages = array_merge( self::$messages, $messages );
	}
	
	/**
	 * Adds variables that will be turned into global variables in JS
	 * @param $variables array of "name" => "value"
	 */
	public static function addVariables( $variables ) {
		self::$variables = array_merge( self::$variables, $variables );
	}
	
	/**
	 * Adds variables that will be turned into global variables in JS, but not escaped as strings
	 * @param $variables array of "name" => "value"
	 */
	public static function addLiteralVariables( $variables ) {
		self::$literalVariables = array_merge( self::$literalVariables, $variables );
	}
	
}

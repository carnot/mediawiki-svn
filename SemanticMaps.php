<?php

/**
 * Initialization file for the Maps extension.
 * 
 * On MediaWiki.org: 		http://www.mediawiki.org/wiki/Extension:Semantic_Maps
 * Official documentation: 	http://mapping.referata.com/wiki/Semantic_Maps
 * Examples/demo's: 		http://mapping.referata.com/wiki/Semantic_Maps_examples
 *
 * @file SemanticMaps.php
 * @ingroup SemanticMaps
 *
 * @licence GNU GPL v3
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documenation group collects source code files belonging to Semantic Maps.
 *
 * Please do not use this group name for other code. If you have an extension to 
 * Semantic Maps, please use your own group definition.
 * 
 * @defgroup SemanticMaps Semantic Maps
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.17', '<' ) ) {
	die( '<b>Error:</b> This version of Semantic Maps requires MediaWiki 1.17 or above; use Maps 0.7.x for older versions.' );
}

// Show a warning if Maps is not loaded.
if ( ! defined( 'Maps_VERSION' ) ) {
	die( '<b>Error:</b> You need to have <a href="http://www.mediawiki.org/wiki/Extension:Maps">Maps</a> installed in order to use <a href="http://www.mediawiki.org/wiki/Extension:Semantic Maps">Semantic Maps</a>.<br />' );
}

// Show a warning if Semantic MediaWiki is not loaded.
if ( ! defined( 'SMW_VERSION' ) ) {
	die( '<b>Error:</b> You need to have <a href="http://semantic-mediawiki.org/wiki/Semantic_MediaWiki">Semantic MediaWiki</a> installed in order to use <a href="http://www.mediawiki.org/wiki/Extension:Semantic Maps">Semantic Maps</a>.<br />' );
}

define( 'SM_VERSION', '0.8 alpha' );

$smgScriptPath 	= ( $wgExtensionAssetsPath === false ? '/extensions' : $wgExtensionAssetsPath ) . '/SemanticMaps';	
$smgDir 		= dirname( __FILE__ ) . '/';

$smgStyleVersion = $wgStyleVersion . '-' . SM_VERSION;

// Include the settings file.
require_once 'SM_Settings.php';

# (named) Array of String. This array contains the available features for Maps.
# Commenting out the inclusion of any feature will make Maps completely ignore it, and so improve performance.

	# Query printers
	include_once $smgDir . 'includes/queryprinters/SM_QueryPrinters.php';
	# Form imputs
	include_once $smgDir . 'includes/forminputs/SM_FormInputs.php'; 

# Include the mapping services that should be loaded into Semantic Maps. 
# Commenting or removing a mapping service will cause Semantic Maps to completely ignore it, and so improve performance.
	
	# Google Maps API v2
	include_once $smgDir . 'includes/services/GoogleMaps/SM_GoogleMaps.php';
	# Google Maps API v3
	include_once $smgDir . 'includes/services/GoogleMaps3/SM_GoogleMaps3.php';	
	# OpenLayers API
	include_once $smgDir . 'includes/services/OpenLayers/SM_OpenLayers.php';
	# Yahoo! Maps API
	include_once $smgDir . 'includes/services/YahooMaps/SM_YahooMaps.php';	

$wgExtensionFunctions[] = 'smfSetup';

$wgExtensionMessagesFiles['SemanticMaps'] = $smgDir . 'SemanticMaps.i18n.php';

$incDir = dirname( __FILE__ ) . '/includes/';

// Data values
$wgAutoloadClasses['SMGeoCoordsValue'] 				= $incDir . 'SM_GeoCoordsValue.php';

// Value descriptions
$wgAutoloadClasses['SMGeoCoordsValueDescription'] 	= $incDir . 'SM_GeoCoordsValueDescription.php';
$wgAutoloadClasses['SMAreaValueDescription'] 		= $incDir . 'SM_AreaValueDescription.php';

$wgAutoloadClasses['SemanticMapsHooks'] 			= dirname( __FILE__ ) . '/SemanticMaps.hooks.php';

// Hook for initializing the Geographical Coordinate type.
$wgHooks['smwInitDatatypes'][] = 'SMGeoCoordsValue::initGeoCoordsType';

// Hook for initializing the field types needed by Geographical Coordinates.
$wgHooks['SMWCustomSQLStoreFieldType'][] = 'SMGeoCoordsValue::initGeoCoordsFieldTypes';

// Hook for defining a table to store geographical coordinates in.
$wgHooks['SMWPropertyTables'][] = 'SMGeoCoordsValue::initGeoCoordsTable';

// Hook for defining the default query printer for queries that ask for geographical coordinates.
$wgHooks['SMWResultFormat'][] = 'SMGeoCoordsValue::addGeoCoordsDefaultFormat';	

// Hook for adding a Semantic Maps links to the Admin Links extension.
$wgHooks['AdminLinks'][] = 'SemanticMapsHooks::addToAdminLinks';	

/**
 * 'Initialization' function for the Semantic Maps extension. 
 * The only work done here is creating the extension credits for
 * Semantic Maps. The actuall work in done via the Maps hooks.
 * 
 * @since 0.1
 * 
 * @return true
 */
function smfSetup() {
	global $wgExtensionCredits, $wgLang;

	// Creation of a list of internationalized service names.
	$services = array();
	foreach ( MapsMappingServices::getServiceIdentifiers() as $identifier ) $services[] = wfMsg( 'maps_' . $identifier );
	$servicesList = $wgLang->listToText( $services );

	$wgExtensionCredits[defined( 'SEMANTIC_EXTENSION_TYPE' ) ? 'semantic' : 'other'][] = array(
		'path' => __FILE__,
		'name' => wfMsg( 'semanticmaps_name' ),
		'version' => SM_VERSION,
		'author' => array(
			'[http://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]'
		),
		'url' => 'http://www.mediawiki.org/wiki/Extension:Semantic_Maps',
		'description' => wfMsgExt( 'semanticmaps_desc', 'parsemag', $servicesList ),
	);

	return true;
}

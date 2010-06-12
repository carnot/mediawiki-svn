<?php

/**
 * This groupe contains all Google Maps v2 related files of the Maps extension.
 * 
 * @defgroup MapsGoogleMaps Google Maps v2
 * @ingroup Maps
 */

/**
 * This file holds the hook and initialization for the Google Maps v2 service. 
 *
 * @file GoogleMaps.php
 * @ingroup MapsGoogleMaps
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

$wgHooks['MappingServiceLoad'][] = 'efMapsInitGoogleMaps';

function efMapsInitGoogleMaps() {
	global $egMapsServices, $wgAutoloadClasses;
	
	$wgAutoloadClasses['MapsGoogleMaps'] = dirname( __FILE__ ) . '/Maps_GoogleMaps.php';
	$wgAutoloadClasses['MapsGoogleMapsDispMap'] = dirname( __FILE__ ) . '/Maps_GoogleMapsDispMap.php';
	$wgAutoloadClasses['MapsGoogleMapsDispPoint'] = dirname( __FILE__ ) . '/Maps_GoogleMapsDispPoint.php';	
	
	$googleMaps = new MapsGoogleMaps();
	$googleMaps->addFeature( 'display_point', 'MapsGoogleMapsDispPoint' );
	$googleMaps->addFeature( 'display_map', 'MapsGoogleMapsDispMap' );

	$egMapsServices[$googleMaps->getName()] = $googleMaps;
	
	return true;
}
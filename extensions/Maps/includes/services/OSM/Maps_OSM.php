<?php

/**
 * Class holding information and functionallity specific to OSM.
 * This infomation and features can be used by any mapping feature. 
 * 
 * @since 0.6.4
 * 
 * @file Maps_OSM.php
 * @ingroup OSM
 * 
 * @author Jeroen De Dauw
 */
class MapsOSM extends MapsMappingService {
	
	/**
	 * Constructor.
	 * 
	 * @since 0.6.6
	 */
	function __construct( $serviceName ) {
		parent::__construct(
			$serviceName,
			array( 'openstreetmap' )
		);
	}
	
	/**
	 * @see iMappingService::getDefaultZoom
	 * 
	 * @since 0.6.5
	 */	
	public function getDefaultZoom() {
		global $egMapsOSMZoom;
		return $egMapsOSMZoom;
	}

	/**
	 * @see MapsMappingService::getMapId
	 * 
	 * @since 0.6.5
	 */
	public function getMapId( $increment = true ) {
		static $mapsOnThisPage = 0;
		
		if ( $increment ) {
			$mapsOnThisPage++;
		}
		
		return 'map_osm_' . $mapsOnThisPage;
	}

	/**
	 * @see MapsMappingService::addParameterInfo
	 * 
	 * @since 0.7
	 */		
	public function addParameterInfo( array &$params ) {
		global $egMapsOSMThumbs, $egMapsOSMPhotos;
		
		$params['zoom']->addCriteria( new CriterionInRange( 1, 18 ) );
		$params['zoom']->setDefault( self::getDefaultZoom() );

		$params['thumbs'] = new Parameter(
			'thumbs',
			Parameter::TYPE_BOOLEAN,
			$egMapsOSMThumbs
		);
		$params['thumbs']->setDescription( wfMsg( 'maps-osm-par-thumbs' ) );

		$params['photos'] = new Parameter(
			'photos',
			Parameter::TYPE_BOOLEAN,
			$egMapsOSMPhotos
		);
		$params['photos']->setDescription( wfMsg( 'maps-osm-par-photos' ) );	
	}	
	
}

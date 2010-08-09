<?php

/**
 * File holding the SpecialDashboard class.
 *
 * @file SpecialDashboard.php
 * @ingroup Deployment
 * @ingroup SpecialPage
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

/**
 * A special page that serves as dashboard for administrative tasks related to deployment.
 * 
 * @author Jeroen De Dauw
 */
class SpecialDashboard extends SpecialPage {

	/**
	 * Constructor.
	 * 
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( 'Dashboard' );
	}

	/**
	 * Main method.
	 * 
	 * @since 0.1 
	 * 
	 * @param $arg String
	 */
	public function execute( $arg ) {
		
	}
	
}
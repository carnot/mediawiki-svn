<?php
/*
 *  Support the "Map sources" list mechanism, see also:
 *  http://en.wikipedia.org/wiki/Wikipedia:WikiProject_Geographical_coordinates
 *
 *  This extension was designed to work together with the geo tag 
 *  extension (geo.php). It can be useful in its own right also, but
 *  class geo_param from geo.php needs to be avalibale
 *
 *  To install, remember to tune the settings in "mapsourcesettings.php".
 *
 *  When installing geo.php, remember to set the $wgMapsourcesURL
 *  appropriately in LocalSettings.php
 *
 *  ----------------------------------------------------------------------
 *
 *  Copyright 2005, Egil Kvaleberg <egil@kvaleberg.no>
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

include_once ( "settings.php" ) ;

if ( isset ( $wikibasedir ) )
	{
	define( "MEDIAWIKI", true );

	require_once( "{$wikibasedir}/includes/Defines.php" );
	require_once( "{$wikibasedir}/LocalSettings.php" );
	require_once( "{$wikibasedir}/includes/Setup.php" );
	require_once( "geo.php" );
	}
	
require_once( "mapsources.php");

if ( isset ( $_GET['geo'] ) ) {
	$geo = urldecode ( $_GET['geo'] );
}

# FIXME: if no params, then what?

$bsl = new map_sources( $geo );
$bsl->show();

$wgOut->output();

exit ( 0 ) ;

?>

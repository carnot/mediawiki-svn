<?php
# OpenStreetMap SlippyMap - MediaWiki extension
# 
# This defines what happens when <slippymap> tag is placed in the wikitext
# 
# We show a map based on the lat/lon/zoom data passed in. This extension brings in
# the OpenLayers javascript, to show a slippy map.  
#
# Usage example:
# <slippymap>lat=51.485|lon=-0.15|z=11|w=300|h=200|layer=osmarender|marker=0</slippymap> 
#
# Tile images are not cached local to the wiki.
# To acheive this (remove the OSM dependency) you might set up a squid proxy,
# and modify the requests URLs here accordingly.
# 
# This file should be placed in the mediawiki 'extensions' directory
# ...and then it needs to be 'included' within LocalSettings.php
# OpenLayers.js and get_osm_url.js must also be placed in the extensions directory

class SlippyMap {

	function SlippyMap() {
	}

	# The callback function for converting the input text to HTML output
	function parse( $input ) {
		global $wgMapOfServiceUrl;
	
		wfLoadExtensionMessages( 'SlippyMap' );

		//Parse pipe separated name value pairs (e.g. 'aaa=bbb|ccc=ddd')
		$paramStrings=explode('|',$input);
		foreach ($paramStrings as $paramString) {
			$paramString = trim($paramString);
			$eqPos = strpos($paramString,"=");
			if ($eqPos===false) {
				$params[$paramString] = "true";
			} else {
				$params[substr($paramString,0,$eqPos)] = trim(htmlspecialchars(substr($paramString,$eqPos+1)));
			}
		}
	
		$lat		= $params['lat'];
		$lon		= $params['lon'];
		$zoom		= $params['z'];
		$width		= $params['w'];
		$height		= $params['h'];
		$layer		= $params['layer'];
		$marker		= $params['marker'];
	
		$error="";
	
		//default values (meaning these parameters can be missed out)
		if ($width=='')		$width ='450'; 
		if ($height=='')	$height='320'; 
		if ($layer=='')		$layer='mapnik'; 
	
		if ($zoom=='')		$zoom = $params['zoom']; //see if they used 'zoom' rather than 'z' (and allow it)

		$marker = ( $marker != '' && $marker != '0' );
	
		//trim off the 'px' on the end of pixel measurement numbers (ignore if present)
		if (substr($width,-2)=='px')	$width = substr($width,0,-2);
		if (substr($height,-2)=='px')	$height = substr($height,0,-2);
	
		//Check required parameters values are provided
		if ($lat=='') $error .= wfMsg( 'slippymap_latmissing' );
		if ($lon=='') $error .= wfMsg( 'slippymap_lonmissing' );
		if ($zoom=='') $error .= wfMsg( 'slippymap_zoommissing' );
		if ($params['long']!='') $error .= wfMsg( 'slippymap_longdepreciated' );
	
		if ($error=='') {
			//no errors so far. Now check the values	
			if (!is_numeric($width)) {
				$error = wfMsg( 'slippymap_widthnan', $width );
			} else if (!is_numeric($height)) {
				$error = wfMsg( 'slippymap_heightnan', $height );
			} else if (!is_numeric($zoom)) {
				$error = wfMsg( 'slippymap_zoomnan', $zoom );
			} else if (!is_numeric($lat)) {
				$error = wfMsg( 'slippymap_latnan', $lat );
			} else if (!is_numeric($lon)) {
				$error = wfMsg( 'slippymap_lonnan', $lon );
			} else if ($width>1000) {
				$error = wfMsg( 'slippymap_widthbig' );
			} else if ($width<100) {
				$error = wfMsg( 'slippymap_widthsmall' );
			} else if ($height>1000) {
				$error = wfMsg( 'slippymap_heightbig' );
			} else if ($height<100) {
				$error = wfMsg( 'slippymap_heightsmall' );
			} else if ($lat>90) {
				$error = wfMsg( 'slippymap_latbig' );
			} else if ($lat<-90) {
				$error = wfMsg( 'slippymap_latsmall' );
			} else if ($lon>180) {
				$error = wfMsg( 'slippymap_lonbig' );
			} else if ($lon<-180) {
				$error = wfMsg( 'slippymap_lonsmall' );
			} else if ($zoom<0) {
				$error = wfMsg( 'slippymap_zoomsmall' );
			} else if ($zoom==18) {
				$error = wfMsg( 'slippymap_zoom18' );
			} else if ($zoom>17) {
				$error = wfMsg( 'slippymap_zoombig' );
			}
		}
	
		//Find the tile server URL to use.  Note that we could allow the user to override that with
		//*any* tile server URL for more flexibility, but that might be a security concern.
	
		$layer = strtolower($layer);
		$layerObjectDef = '';
		if ($layer=='osmarender') {        
			$layerObjectDef = 'OpenLayers.Layer.OSM.Osmarender("Osmarender"); ';
		} elseif ($layer=='mapnik') {
			$layerObjectDef = 'OpenLayers.Layer.OSM.Mapnik("Mapnik"); ';
		} elseif ($layer=='maplint') {
			$layerObjectDef = 'OpenLayers.Layer.OSM.Maplint("Maplint"); ';
		} else {
			$error = wfMsg( 'slippymap_invalidlayer',  htmlspecialchars($layer) );
		}
	
	
		if ($error!="") {
			//Something was wrong. Spew the error message and input text.
			$output  = '';
			$output .= "<font color=\"red\"><b>". wfMsg( 'slippymap_maperror' ). "</b> " . $error . "</font><br>";
			$output .= htmlspecialchars($input);
		} else {
			//HTML output for the slippy map.
			//Note that this must all be output on one line (no linefeeds)
			//otherwise MediaWiki adds <BR> tags, which is bad in the middle of block of javascript.
			//There are other ways of fixing this, but not for MediaWiki v4
			//(See http://www.mediawiki.org/wiki/Manual:Tag_extensions#How_can_I_avoid_modification_of_my_extension.27s_HTML_output.3F)
	
			$output = '<script type="text/javascript"> var osm_fully_loaded=false;';

			// defer loading of the javascript. Since the script is quite bit, it would delay
			// page loading and rendering dramatically
			$output .= 'addOnloadHook( function() { ' .
			 	'	var sc = document.createElement("script");' .
				'	sc.src = "http://openlayers.org/api/OpenLayers.js";' .
			 	'	document.body.appendChild( sc );' .
			 	'	var sc = document.createElement("script");' .
			 	'	sc.src = "http://openstreetmap.org/openlayers/OpenStreetMap.js";'.
			 	'	document.body.appendChild( sc );' .
			 	'	var sc = document.createElement("script");' .
			 	'	sc.innerHTML = "osm_fully_loaded=true;";' .
			 	'	document.body.appendChild( sc );' .
			 	'} );';


	
	
			$output .= "var lon= $lon; var lat= $lat; var zoom= $zoom; var lonLat;";
	
			$output .= 'var map; ';
	
			$output .= 'function lonLatToMercator(ll) { ';
			$output .= '	var lon = ll.lon * 20037508.34 / 180; ';
			$output .= '	var lat = Math.log (Math.tan ((90 + ll.lat) * Math.PI / 360)) / (Math.PI / 180); ';
			$output .= '	lat = lat * 20037508.34 / 180; ';
	
			$output .= '	return new OpenLayers.LonLat(lon, lat); ';
			$output .= '} ';

			$output .= 'function MercatorToLonLat(ll) { ';
        		$output .= '   var lon = ll.lon / 20037508.34 * 180; ';
        		$output .= '   var lat = ll.lat / 20037508.34 * 180 * ( Math.PI / 180 ); ';
        		$output .= '   lat = ( Math.pow(Math.E, lat) - Math.pow(Math.E, -lat) ) / 2; ';
        		$output .= '   lat = Math.atan( lat ); ';
        		$output .= '   lat = lat * 180 / Math.PI;';
        		$output .= '   return new OpenLayers.LonLat(lon, lat); ';
			$output .= '   } ';
	
			$output .= 'addOnloadHook( slippymap_init ); ';
	
			$output .= 'function slippymap_init() { ';
			$output .= '	if (!osm_fully_loaded) { window.setTimeout("slippymap_init()",500); return 0; } ' ;
	
			$output .= '	map = new OpenLayers.Map("map", { ';
			$output .= '		controls:[ ';
			$output .= '			new OpenLayers.Control.Navigation(), ';
	
			if ($height>320) {
				//Add the zoom bar control, except if the map is only little
				$output .= '		new OpenLayers.Control.PanZoomBar(),';   
			} else if ( $height > 140 ) {
				$output .= '            new OpenLayers.Control.PanZoom(),';
			}
	
			$output .= '			new OpenLayers.Control.Attribution()], ';
			$output .= '		maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34), ';
			$output .= "			maxResolution:156543.0399, units:'meters', projection: \"EPSG:900913\"} ); ";
	
	
			$output .= "	layer = new " . $layerObjectDef;
	
			$output .= "	map.addLayer(layer); ";
	
			$output .= "	lonLat = lonLatToMercator(new OpenLayers.LonLat(lon, lat)); ";

			if ( $marker ) {
				$output .= 'var markers = new OpenLayers.Layer.Markers( "Markers" ); ' .
			           	'   map.addLayer(markers); ' .
				   	'   var size = new OpenLayers.Size(20,34); ' .
				   	'   var offset = new OpenLayers.Pixel(-(size.w/2), -size.h); ' .
				   	"   var icon = new OpenLayers.Icon('http://boston.openguides.org/markers/YELLOW.png',size,offset);" .
			           	'   markers.addMarker(new OpenLayers.Marker( lonLat,icon)); ';
			}
	
			$output .= "	map.setCenter (lonLat, zoom); ";
			$output .= "    postmap = document.getElementById('postmap'); ";
			$output .= "    postmap.innerHTML = '<input type=\"button\" value=\"Reset view\" onmousedown=\"map.setCenter(lonLat, zoom);\" /><input type=\"button\" value=\"Get wikicode\" onmousedown=\"slippymap_getWikicode();\" \>'; ";
			$output .= "} ";

			$output .= 'function slippymap_getWikicode() {';
			$output .= '    LL = MercatorToLonLat(map.getCenter()); Z = map.getZoom();';
			$output .= '    size = map.getSize();';

			$output .= '    prompt( "Wikicode for this map", "<slippymap>h="+size.h+"|w="+size.w+"|z="+Z+"|lat="+LL.lat+"|lon="+LL.lon+"|layer=mapnik|marker=1</slippymap>" ); ';
			$output .= '}';
	
			$output .= "</script> ";
	
	
			$output .= '<div class="map">';
			$output .= "<div style=\"width: {$width}px; height:{$height}px; border-style:solid; border-width:1px; border-color:lightgrey;\" id=\"map\">";
			$output .= "<noscript><a href=\"http://www.openstreetmap.org/?lat=$lat&lon=$lon&zoom=$zoom\" title=\"See this map on OpenStreetMap.org\" style=\"text-decoration:none\">";
			$output .= "<img src=\"".$wgMapOfServiceUrl."lat=$lat&long=$lon&z=$zoom&w=$width&h=$height&format=jpeg\" width=\"$width\" height=\"$height\" border=\"0\"><br/>";
			$output .= '<span style="font-size:60%; background-color:white; position:relative; top:-15px; ">OpenStreetMap - CC-BY-SA-2.0</span>';
			$output .= '</a></noscript></div><div id="postmap"></div></div>';

	
		}
		return $output;
	}
}

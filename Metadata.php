<?php
/* Metadata.php -- provides DublinCore and CreativeCommons metadata
 * Copyright 2004, Evan Prodromou <evan@wikitravel.org>.
 * 
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

define("RDF_TYPE_PREFS", "application/rdf+xml,text/xml;q=0.7,application/xml;q=0.5,text/rdf;q=0.1");

function wfDublinCoreRdf($article) {
	
	$url = dcReallyFullUrl($article->mTitle);
	
	if (rdfSetup()) {
		dcPrologue($url);
		dcBasics($article);
		dcEpilogue();
	}
}

function wfCreativeCommonsRdf($article) {
	
	if (rdfSetup()) {
		global $wgRightsUrl;
		
		$url = dcReallyFullUrl($article->mTitle);
		
		ccPrologue();
		ccSubPrologue('Work', $url);
		dcBasics($article);
		if (isset($wgRightsUrl)) {
			$url = htmlspecialchars( $wgRightsUrl );
			print "    <cc:license rdf:resource=\"$url\" />\n";
		}
		
		ccSubEpilogue('Work');
		
		if (isset($wgRightsUrl)) {
			$terms = ccGetTerms($wgRightsUrl);
			if ($terms) {
				ccSubPrologue('License', $wgRightsUrl);
				ccLicense($terms);
				ccSubEpilogue('License');
			}
		}
	}
	
	ccEpilogue();
}

/* private */ function rdfSetup() {
	global $wgOut, $wgRdfMimeType, $_SERVER;
	
	$rdftype = wfNegotiateType(wfAcceptToPrefs($_SERVER['HTTP_ACCEPT']), wfAcceptToPrefs(RDF_TYPE_PREFS));
	
	if (!$rdftype) {
		wfHttpError(406, "Not Acceptable", wfMsg("notacceptable"));
		return false;
	} else {
		$wgOut->disable();
		header( "Content-type: {$rdftype}" );
		$wgOut->sendCacheControl();
		return true;
	}
}

/* private */ function dcPrologue($url) {
	global $wgOutputEncoding;
	
	$url = htmlspecialchars( $url );
	print "<" . "?xml version=\"1.0\" encoding=\"{$wgOutputEncoding}\" ?" . ">
			
<!DOCTYPE rdf:RDF PUBLIC \"-//DUBLIN CORE//DCMES DTD 2002/07/31//EN\" \"http://dublincore.org/documents/2002/07/31/dcmes-xml/dcmes-xml-dtd.dtd\">
			
<rdf:RDF xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"
         xmlns:dc=\"http://purl.org/dc/elements/1.1/\">
  <rdf:Description rdf:about=\"$url\">
";
}

/* private */ function dcEpilogue() {
	print "
  </rdf:Description>
</rdf:RDF>
";
}

/* private */ function dcBasics($article) {
	global $wgLanguageCode, $wgSitename;
	
	dcElement('title', $article->mTitle->getText());
	dcPageOrString('publisher', wfMsg('aboutpage'), $wgSitename);
	dcElement('language', $wgLanguageCode);
	dcElement('type', 'Text');
	dcElement('format', 'text/html');
	dcElement('identifier', dcReallyFullUrl($article->mTitle));
	dcElement('date', dcDate($article->getTimestamp()));
	dcPerson('creator', $article->getUser());
	
	$contributors = dcContributors($article);
	
	foreach ($contributors as $user_name => $cid) {
		dcPerson('contributor', $cid, $user_name);
	}
	
	dcRights($article);
}

/* private */ function ccPrologue() {
	global $wgOutputEncoding;
	
	echo "<" . "?xml version='1.0'  encoding='{$wgOutputEncoding}' ?" . ">
	   
<rdf:RDF xmlns:cc=\"http://web.resource.org/cc/\"
         xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
         xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\">
";
}  

/* private */ function ccSubPrologue($type, $url) {
	$url = htmlspecialchars( $url );
	echo "  <cc:{$type} rdf:about=\"{$url}\">\n";
}  

/* private */ function ccSubEpilogue($type) {
	echo "  </cc:{$type}>\n";
}  

/* private */ function ccLicense($terms) {
	
	foreach ($terms as $term) {
		switch ($term) {
		case 're':
			ccTerm('permits', "Reproduction"); break;
		case 'di':
			ccTerm('permits', "Distribution"); break;
		case 'de':
			ccTerm('permits', "DerivativeWorks"); break;
		case 'nc':
			ccTerm('prohibits', "CommercialUse"); break;
		case 'no':
			ccTerm('requires', "Notice"); break;
		case 'by':
			ccTerm('requires', "Attribution"); break;
		case 'sa':
			ccTerm('requires', "ShareAlike"); break;
		case 'sc':
			ccTerm('requires', "SourceCode"); break;		
		}
	}
}

/* private */ function ccTerm($term, $name) {
	print "    <cc:{$term} rdf:resource=\"http://web.resource.org/cc/{$name}\" />\n";
}

/* private */ function ccEpilogue() {
	echo "</rdf:RDF>\n";
}

/* private */ function dcElement($name, $value) {
	$value = htmlspecialchars( $value );
	print "    <dc:{$name}>{$value}</dc:{$name}>\n";
}

/* private */ function dcDate($timestamp) {
	return substr($timestamp, 0, 4) . "-" 
		. substr($timestamp, 4, 2) . "-" 
		. substr($timestamp, 6, 2);
}

/* private */ function dcReallyFullUrl($title) {
	return $title->getFullURL();
}

/* private */ function dcPageOrString($name, $page, $str) {
	$nt = Title::newFromText($page);
	
	if (!$nt || $nt->getArticleID() == 0) {
		dcElement($name, $str);
	} else {
		dcPage($name, $nt);
	}
}

/* private */ function dcPage($name, $title) {
	dcUrl($name, dcReallyFullUrl($title));
}

/* private */ function dcUrl($name, $url) {
	$url = htmlspecialchars( $url );
	print "    <dc:{$name} rdf:resource=\"{$url}\" />\n";
}

/* private */ function dcPerson($name, $id, $user_name="") {
	global $wgLang;

	if ($id == 0) {
		dcElement($name, wfMsg("anonymous"));
	} else {
		if( empty( $user_name ) ) {
			$user_name = User::whoIs($id);
		}
		dcPageOrString($name, $wgLang->getNsText(NS_USER) . ":" . $user_name, $user_name);
	}
}

/* private */ function dcContributors($article) {

        $title = $article->mTitle;

	$contribs = array();
	
	$res = wfQuery("SELECT DISTINCT old_user,old_user_text" .
	               " FROM old " .
	               " WHERE old_namespace = " . $title->getNamespace() .
	               " AND old_title = '" . $title->getDBkey() . "'" .
                       " AND old_user != 0 " .
                       " AND old_user != " . $article->getUser(), DB_READ);
	
	while ( $line = wfFetchObject( $res ) ) {
		$contribs[$line->old_user_text] = $line->old_user;
	}    

        # Count anonymous users

	$res = wfQuery("SELECT COUNT(*) AS cnt " .
	               " FROM old " .
	               " WHERE old_namespace = " . $title->getNamespace() .
	               " AND old_title = '" . $title->getDBkey() . "'" .
                       " AND old_user = 0 ", DB_READ);

	while ( $line = wfFetchObject( $res ) ) {
                $contribs[$line->cnt] = 0;
	}    

	return $contribs;
}

/* Takes an arg, for future enhancement with different rights for
 different pages. */

/* private */ function dcRights($article) {
	
	global $wgRightsPage, $wgRightsUrl, $wgRightsText;
	
	if (isset($wgRightsPage) &&
		($nt = Title::newFromText($wgRightsPage))
		&& ($nt->getArticleID() != 0)) {
		dcPage('rights', $nt);
	} else if (isset($wgRightsUrl)) {
		dcUrl('rights', $wgRightsUrl);
	} else if (isset($wgRightsText)) {
		dcElement('rights', $wgRightsText);
	}
}

/* private */ function ccGetTerms($url) {
	global $wgLicenseTerms;
	
	if (isset($wgLicenseTerms)) {
		return $wgLicenseTerms;
	} else {
		$known = getKnownLicenses();
		return $known[$url];
	}
}

/* private */ function getKnownLicenses() {
	
	$ccLicenses = array('by', 'by-nd', 'by-nd-nc', 'by-nc', 
	                    'by-nc-sa', 'by-sa', 'nd', 'nd-nc',
	                    'nc', 'nc-sa', 'sa');
	
	$knownLicenses = array();
	
	foreach ($ccLicenses as $license) {
		$lurl = "http://creativecommons.org/licenses/{$license}/1.0/";
		$knownLicenses[$lurl] = explode('-', $license);
		$knownLicenses[$lurl][] = 're';
		$knownLicenses[$lurl][] = 'di';
		$knownLicenses[$lurl][] = 'no';
		if (!in_array('nd', $knownLicenses[$lurl])) {
			$knownLicenses[$lurl][] = 'de';
		}
	}
	
	/* Handle the GPL and LGPL, too. */
	
	$knownLicenses["http://creativecommons.org/licenses/GPL/2.0/"] =
		array('de', 're', 'di', 'no', 'sa', 'sc');
	$knownLicenses["http://creativecommons.org/licenses/LGPL/2.1/"] = 
		array('de', 're', 'di', 'no', 'sa', 'sc');
	$knownLicenses["http://www.gnu.org/copyleft/fdl.html"] = 
		array('de', 're', 'di', 'no', 'sa', 'sc');
	
	return $knownLicenses;
}

?>

<?php

// Override this URL to point to the central notice text loader...
// This guy gets loaded from every page on every wiki, so caching helps!
// /
// Can be set to a directory where static files will be made --
// match that up with $wgNoticeStaticDirectory and use rebuildTemplates.php
// to fill out the directory tree.
//
// Default: Local path to Special:NoticeText
//
// Loads: $wgNoticeCentralPath/<project>/<lang>/centralnotice.js
//
$wgNoticeCentralPath = false;

// Whether to use local notice loader
$wgNoticeUseLocalNotice = false;

// This guy does much the same, but with the local sitenotice/anonnotice.
// Static generation isn't quite supported yet.
//
// Default: Local path to Special:NoticeLocal
//
// Loads: $wgNoticeLocalPath/sitenotice.js
//   -or- $wgNoticeLocalPath/anonnotice.js
//
$wgNoticeLocalPath = false;

// Override these per-wiki to pass on via the loader to the text system
// for localization by language and project.
// Actual user language is used for localization; $wgNoticeLang is used
// for selective enabling/disabling on sites.
$wgNoticeLang = $wgLanguageCode;
$wgNoticeProject = 'wikipedia';

// List of available projects, which will be used to generate static
// output .js in the batch generation...
$wgNoticeProjects = array(
	'wikipedia',
	'wiktionary',
	'wikiquote',
	'wikibooks',
	'wikinews',
	'wikisource',
	'wikiversity',
	'wikimedia',
	'commons',
	'meta',
	'wikispecies',
);

// Local filesystem path under which static .js output is written
// for the central notice system.
//
// $wgNoticeCentralDirectory = "/mnt/uploads/centralnotice";
//
$wgNoticeCentralDirectory = false;

// Local filesystem path under which static .js output is written
// for this wiki's local sitenotice and anonnotice.
//
// $wgNoticeLocalDirectory = "/mnt/uploads/sitenotice/$wgDBname";
//
$wgNoticeLocalDirectory = false;

// Enable the notice-hosting infrastructure on this wiki...
// Leave at false for wikis that only use a sister site for the control.
// All remaining options apply only to the infrastructure wiki.
$wgNoticeInfrastructure = true;

// Enable the loader itself
// Allows to control the loader visibility, without destroying infrastructure
// for cached content
$wgCentralNoticeLoader = true;

// If true, notice only displays if 'sitenotice=yes' is in the query string
$wgNoticeTestMode = false;

// Array of '$lang.$project' for exceptions to the test mode rule
$wgNoticeEnabledSites = array();

// Client-side cache timeout for the loader JS stub.
// If 0, clients will (probably) rechceck it on every hit,
// which is good for testing.
$wgNoticeTimeout = 0;

// Server-side cache timeout for the loader JS stub.
// Should be big if you won't include the counter info in the text,
// smallish if you will. :)
$wgNoticeServerTimeout = 0;

// Source for live counter information
$wgNoticeCounterSource = "http://donate.wikimedia.org/counter.php";

$wgExtensionFunctions[] = 'efCentralNoticeSetup';

$wgExtensionCredits['other'][] = array(
	'path'           => __FILE__,
	'name'           => 'CentralNotice',
	'author'         => 'Brion Vibber',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:CentralNotice',
	'descriptionmsg' => 'centralnotice-desc',
);

$dir = dirname( __FILE__ ) . '/';

$wgExtensionMessagesFiles['CentralNotice'] = $dir . 'CentralNotice.i18n.php';
$wgExtensionAliasesFiles['CentralNotice'] = $dir . 'CentralNotice.alias.php';

$wgAvailableRights[] = 'centralnotice-admin';
$wgAvailableRights[] = 'centralnotice-translate';
$wgGroupPermissions['sysop']['centralnotice-admin'] = true; // Only sysops can make change
$wgGroupPermissions['sysop']['centralnotice-translate'] = true; // Only sysops can make change

function efCentralNoticeSetup() {
	global $wgHooks, $wgNoticeInfrastructure, $wgAutoloadClasses, $wgSpecialPages;
	global $wgCentralNoticeLoader, $wgNoticeUseLocalNotice;

	$dir = dirname( __FILE__ ) . '/';

	if ( $wgCentralNoticeLoader ) {
		$wgHooks['LoadExtensionSchemaUpdates'][] = 'efCentralNoticeSchema';
		$wgHooks['BeforePageDisplay'][] = 'efCentralNoticeLoader';
		$wgHooks['MakeGlobalVariablesScript'][] = 'efCentralNoticeDefaults';

		if ( $wgNoticeUseLocalNotice ) {
			$wgSpecialPages['NoticeLocal'] = 'SpecialNoticeLocal';
			$wgAutoloadClasses['SpecialNoticeLocal'] = $dir . 'SpecialNoticeLocal.php';
			$wgHooks['SiteNoticeBefore'][] = 'efCentralNoticeDisplayBefore';
		} else {
			$wgHooks['SiteNoticeAfter'][] = 'efCentralNoticeDisplayAfter';
		}
	}

	$wgAutoloadClasses['NoticePage'] = $dir . 'NoticePage.php';

	if ( $wgNoticeInfrastructure ) {
		$wgSpecialPages['CentralNotice'] = 'CentralNotice';
		$wgSpecialPageGroups['CentralNotice'] = 'wiki'; // Wiki data and tools"
		$wgAutoloadClasses['CentralNotice'] = $dir . 'SpecialCentralNotice.php';

		$wgSpecialPages['NoticeText'] = 'SpecialNoticeText';
		$wgAutoloadClasses['SpecialNoticeText'] = $dir . 'SpecialNoticeText.php';

		$wgSpecialPages['NoticeTemplate'] = 'SpecialNoticeTemplate';
		$wgAutoloadClasses['SpecialNoticeTemplate'] = $dir . 'SpecialNoticeTemplate.php';
		
		$wgAutoloadClasses['CentralNoticeDB'] = $dir . 'CentralNotice.db.php';
		$wgAutoloadClasses['TemplatePager'] = $dir . 'TemplatePager.php';
	}
}

function efCentralNoticeSchema() {
	global $wgDBtype, $wgExtNewTables, $wgExtNewFields;
	
	$base = dirname( __FILE__ );
	if ( $wgDBtype == 'mysql' ) {
		$wgExtNewTables[] = array( 'cn_notices', $base . '/CentralNotice.sql' );
		$wgExtNewFields[] = array( 'cn_notices', 'not_preferred', $base . '/patches/patch-notice_preferred.sql' );
		$wgExtNewTables[] = array( 'cn_notice_languages', $base . '/patches/patch-notice_languages.sql' );
		$wgExtNewFields[] = array( 'cn_templates', 'tmp_display_anon', $base . '/patches/patch-template_settings.sql' );
	}
	return true;
}

function efCentralNoticeLoader( $out, $skin ) {
	global $wgUser, $wgOut, $wgLang;
	global $wgNoticeProject, $wgNoticeCentralPath, $wgNoticeLocalPath, $wgNoticeUseLocalNotice;

	$lang = $wgLang->getCode();
	$centralNotice = "$wgNoticeProject/$lang/centralnotice.js";

	if ( $wgNoticeCentralPath === false ) {
		$centralLoader = SpecialPage::getTitleFor( 'NoticeText', $centralNotice )->getLocalUrl();
	} else {
		$centralLoader = "$wgNoticeCentralPath/$centralNotice";
	}

	// Load the notice text from <head>
	$wgOut->addScriptFile( $centralLoader );

	if ( $wgNoticeUseLocalNotice ) {
		$localNotice = ( is_object( $wgUser ) && $wgUser->isLoggedIn() )
			? 'sitenotice.js'
			: 'anonnotice.js';
		if ( $wgNoticeLocalPath === false ) {
			$localLoader = SpecialPage::getTitleFor( 'NoticeLocal', $localNotice )->getLocalUrl();
		} else {
			$localLoader = "$wgNoticeLocalPath/$localNotice";
		}
		$wgOut->addScriptFile( $localLoader );
	}

	return true;
}

function efCentralNoticeDefaults( &$vars ) {
	global $wgNoticeUseLocalNotice;

	// Initialize these variables to empty, so if the notice script fails
	// we don't have any surprises.
	$vars['wgNotice'] = '';
	if ( $wgNoticeUseLocalNotice ) {
		$vars['wgNoticeLocal'] = '';
	}
	return true;
}

function efCentralNoticeDisplayAfter( &$notice ) {
	// Slip in load of the data...
	$notice =
		Html::inlineScript( "if (wgNotice != '') document.writeln(wgNotice);" ) .
		$notice;
	return true;
}

function efCentralNoticeDisplayBefore( &$notice ) {
	// Slip in load of the data...
	$notice = Html::inlineScript(
		"if (wgNotice != '') document.writeln(wgNotice);" .
		" if (wgNoticeLocal != '') document.writeln(wgNoticeLocal);"
	);
	return false;
}

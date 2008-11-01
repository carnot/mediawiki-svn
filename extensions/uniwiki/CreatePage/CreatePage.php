<?php
/* vim: noet ts=4 sw=4
 * http://www.mediawiki.org/wiki/Extension:Uniwiki_Generic_Edit_Page
 * http://www.gnu.org/licenses/gpl-3.0.txt */

if ( !defined( 'MEDIAWIKI' ) )
	die();

/* ---- CREDITS ---- */

/* This code was adapted from CreatePage.php from:
 *     Travis Derouin <travis@wikihow.com>
 *
 * originally licensed as:
 *     GNU GPL v2.0 or later */

$wgExtensionCredits['other'][] = array(
	'name'           => 'CreatePage',
	'author'         => 'Travis Derouin, Merrick Schaefer, Mark Johnston, Evan Wheeler and Adam Mckaig (at UNICEF), Siebrand Mazeland',
	'description'    => 'Adds a [[Special:CreatePage|special page]] for creating new pages',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:Uniwiki/AutoCreateCategoryPages',
	'svn-date'       => '$LastChangedDate$',
	'svn-revision'   => '$LastChangedRevision$',
	'descriptionmsg' => 'createpage-desc',
);

$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['CreatePage'] = $dir . '/CreatePage.i18n.php';
$wgExtensionAliasesFiles['CreatePage'] = $dir . 'CreatePage.alias.php';
$wgAutoloadClasses['SpecialCreatePage'] = $dir . '/CreatePage_body.php';
$wgSpecialPages['CreatePage'] = 'SpecialCreatePage';


$wgHooks['BeforePageDisplay'][] = 'UW_CreatePage_CSS';
function UW_CreatePage_CSS( $out ) {
	global $wgScriptPath;
	$out->addScript ( "<link rel='stylesheet' href='$wgScriptPath/extensions/uniwiki/CreatePage/style.css' />" );
	return true;
}

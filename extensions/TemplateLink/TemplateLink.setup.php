<?php
/**
 * TemplateLink extension - shows a template as a new page
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author Magnus Manske
 * @copyright © 2007 Magnus Manske
 * @licence GNU General Public Licence 2.0 or later
 */

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the skin file directly.
if (!defined('MEDIAWIKI')) {
        echo <<<EOT
To install my extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/TemplateLink/TemplateLink.setup.php" );
EOT;
        exit( 1 );
}

# Credits
$wgExtensionCredits['specialpage'][] = array(
       'name' => 'TemplateLink',
       'author' =>'Magnus Manske', 
       'url' => 'http://www.mediawiki.org/wiki/Extension:TemplateLink',
       'description' => 'This extension can show a template as a new page'
       );
$wgExtensionCredits['parserhook'][] = array(
       'name' => 'TemplateLink',
       'author' =>'Magnus Manske', 
       'url' => 'http://www.mediawiki.org/wiki/Extension:TemplateLink',
       'description' => 'This extension can show a template as a new page'
       );


# Special page registration
$wgAutoloadClasses['TemplateLink'] = dirname(__FILE__) . '/TemplateLink.body.php'; # Tell MediaWiki to load the extension body.
$wgSpecialPages['TemplateLink'] = 'TemplateLink'; # Let MediaWiki know about your new special page.
$wgHooks['LoadAllMessages'][] = 'TemplateLink::loadMessages'; # Load the internationalization messages for your special page.
$wgHooks['LanguageGetSpecialPageAliases'][] = 'TemplateLinkLocalizedPageName'; # Add any aliases for the special page.
 
function TemplateLinkLocalizedPageName(&$specialPageArray, $code) {
  # The localized title of the special page is among the messages of the extension:
  TemplateLink::loadMessages();
  $text = wfMsg('TemplateLink');
 
  # Convert from title in text form to DBKey and put it into the alias array:
  $title = Title::newFromText($text);
  $specialPageArray['TemplateLink'][] = $title->getDBKey();
 
  return true;
}


# The tag
$wgExtensionFunctions[] = 'efTemplateLinkSetup';
 
function efTemplateLinkSetup() {
    global $wgParser;
    $wgParser->setHook( 'templatelink', 'efTemplateLink' );
}
 
function efTemplateLink( $input, $args, $parser ) {
  $input = str_replace ( "<sep>" , "|" , $input );
  $arr = explode( "\n", trim( $input ) );
  $template = array_shift( $arr );
  if( trim( $template ) == '' ) return htmlspecialchars( $template );
  if( count( $arr ) > 0 ) $title = array_pop( $arr );
  else $title = ucfirst( array_shift( explode( "|", $template ) ) );
  
  $nt = Title::newFromText( "Special:TemplateLink" );
  $url = $nt->escapeLocalURL();
  $url .= "?template=" . urlencode ( $template );
  $link = "<a href=\"$url\" class=\"internal\">$title</a>" ;
  return $link ;
}

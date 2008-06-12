<?php
/**
 * This extension is a simple framework for spambot checks and trigger payloads.
 * The aim is to allow for private development and limited collaboration on
 * filters for common spam tools such as XRumer.
 *
 * XRumer is actively maintained to keep up to date with the latest antispam
 * measures in forum, blog and wiki software. I don't want to make it easy for
 * them by giving them our source code.
 *
 * To install, put this in LocalSettings.php:
 *
 * require_once( "$IP/extensions/AntiBot/AntiBot.php" );
 *
 * And then copy the plugins you want into the active directory.
 */


/** Configuration */

/**
 * Persistent secret token used for setting form field names and what not
 * Change it periodically if they try to filter by any affected form field
 */
$wgAntiBotSecret = '';

/** Configure the payload sequence when each plugin is triggered */
$wgAntiBotPayloads = array(
	'default' => array( 'log', 'fail' ),
);

/** END CONFIGURATION */

$wgExtensionCredits['other'][] = array(
	'name' => 'AntiBot',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
	'url' => 'http://www.mediawiki.org/wiki/Extension:AntiBot',
	'author' => 'Tim Starling',
	'description' => 'Simple framework for spambot checks and trigger payloads',
	'descriptionmsg' => 'antibot-desc',
);
$wgExtensionMessagesFiles['AntiBot'] =  dirname(__FILE__) . '/AntiBot.i18n.php';

/**
 * A map of payload types to callbacks
 * This may be extended by plugins.
 */
$wgAntiBotPayloadTypes = array(
	'log' => array( 'AntiBot', 'log' ),
	'quiet' => array( 'AntiBot', 'quiet' ),
	'fail' => array( 'AntiBot', 'fail' ),
);

# Load plugins
foreach ( glob( dirname( __FILE__ ) . '/active/*.php' ) as $file ) {
	require( $file );
}

class AntiBot {
	static function getSecret( $name ) {
		global $wgAntiBotSecret, $wgSecretKey;
		$secret = $wgAntiBotSecret ? $wgAntiBotSecret : $wgSecretKey;
		return substr( sha1( $secret . $name ), 0, 8 );
	}

	/**
	 * Plugins should call this function when they are triggered
	 */
	static function trigger( $pluginName ) {
		global $wgAntiBotPayloads, $wgAntiBotPayloadTypes;
		$ret = 'quiet';
		if ( isset( $wgAntiBotPayloads[$pluginName] ) ) {
			$payloadChain = $wgAntiBotPayloads[$pluginName];
		} else {
			$payloadChain = $wgAntiBotPayloads['default'];
		}

		foreach ( $payloadChain as $payloadType ) {
			if ( !isset( $wgAntiBotPayloadTypes[$payloadType] ) ) {
				wfDebug( "Invalid payload type: $payloadType\n" );
				continue;
			}
			$ret = call_user_func( $wgAntiBotPayloadTypes[$payloadType], $pluginName );
		}
		return $ret;
	}

	static function log( $pluginName ) {
		$ip = wfGetIP();
		wfDebugLog( 'AntiBot', "AntiBot trigger hit: $pluginName $ip\n" );
	}

	static function quiet() {
		return 'quiet';
	}

	static function fail() {
		return 'fail';
	}
}

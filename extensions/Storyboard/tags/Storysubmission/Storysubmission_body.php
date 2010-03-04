<?php

/**
 * File holding the rendering function for the Storysubmission tag.
 *
 * @file Storysubmission_body.php
 * @ingroup Storyboard
 *
 * @author Jeroen De Dauw
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

class TagStorysubmission {
	
	// http://www.mediawiki.org/wiki/Manual:Forms
	// http://www.mediawiki.org/wiki/Manual:Hooks/UnknownAction
	public static function render( $input, $args, $parser, $frame ) {
		wfProfileIn( __METHOD__ );

		global $wgRequest;
		
		if ( $wgRequest->wasPosted() ) {
			$output = TagStorysubmission::doSubmissionAndGetResult();
		} else {
			$output = TagStorysubmission::getFrom( $parser );
		}
		
		return $output;
		
		wfProfileOut( __METHOD__ );
	}
	
	private static function getFrom( $parser ) {
		$fieldSize = 50;
		
		$url = $parser->getTitle()->getLocalURL( 'action=submit' );
		
		$formBody = '<table width="100%">';
		
		$formBody .= '<tr><td>' . wfMsg( 'storyboard-yourname' ) . '</td><td>' . Html::element(
			'input',
			array('id' => 'name', 'name' => 'name', 'type' => 'text', 'size' => $fieldSize),
			null
		) . '</td></tr>';
		
		$formBody .= '<tr><td>' . wfMsg( 'storyboard-location' ) . '</td><td>' . Html::element(
			'input',
			array('id' => 'location', 'name' => 'location', 'type' => 'text', 'size' => $fieldSize),
			null
		) . '</td></tr>'; 		
		
		$formBody .= '<tr><td>' . wfMsg( 'storyboard-occupation' ) . '</td><td>' . Html::element(
			'input',
			array('id' => 'occupation', 'name' => 'occupation', 'type' => 'text', 'size' => $fieldSize),
			null
		) . '</td></tr>';

		$formBody .= '<tr><td>' . wfMsg( 'storyboard-contact' ) . '</td><td>' . Html::element(
			'input',
			array('id' => 'contact', 'name' => 'contact', 'type' => 'text', 'size' => $fieldSize),
			null
		) . '</td></tr>';

		$formBody .= '<tr><td></td><td><input type="submit" value="' . wfMsg( 'htmlform-submit' ) . '"></td></tr>';
		
		$formBody .= '</table>';
		
		return Html::rawElement(
			'form',
			array( 'id' => 'storyform', 'name' => 'storyform', 'method' => 'post', 'action' => $url ),
			$formBody
		);
	}
	
	private static function doSubmissionAndGetResult() {
		
	}
	
}
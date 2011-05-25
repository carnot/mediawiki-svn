<?php
/**
 * Functions used for decoding/encoding ids in ShortUrl Extension
 *
 * @file
 * @ingroup Extensions
 * @author Yuvi Panda, http://yuvi.in
 * @copyright © 2011 Yuvaraj Pandian (yuvipanda@yuvi.in)
 * @licence Modified BSD License
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

/* stolen from http://www.php.net/manual/en/function.base64-encode.php#63543 */
function urlsafe_b64encode( $string ) {
	$data = base64_encode( $string );
	$data = str_replace( array( '+', '/', '=' ), array( '-', '_', '' ), $data );
	return $data;
}

/* stolen from http://www.php.net/manual/en/function.base64-encode.php#63543 */
function urlsafe_b64decode( $string ) {
	$data = str_replace( array( '-', '_' ), array( '+', '/' ), $string );
	$mod4 = strlen( $data ) % 4;
	if ( $mod4 ) {
		$data .= substr( '====', $mod4 );
	}
	return base64_decode( $data );
}

function shorturlEncode ( $title ) {
	global $wgMemc;

	$id = $wgMemc->get( wfMemcKey( 'shorturls', 'title', $title->getFullText() ) );
	if ( !$id ) {
		$dbr = wfGetDB( DB_SLAVE );
		$query = $dbr->select(
			'shorturls',
			array( 'su_id' ),
			array( 'su_namespace' => $title->getNamespace(), 'su_title' => $title->getText() ),
			__METHOD__ );
		if ( $dbr->numRows( $query ) > 0 ) {
			$entry = $dbr->fetchRow( $query );
			$id = $entry['su_id'];
		} else {
			$dbw = wfGetDB( DB_MASTER );
			$row_data = array(
				'su_id' => $dbw->nextSequenceValue( 'shorturls_id_seq' ),
				'su_namespace' => $title->getNamespace(),
				'su_title' => $title->getText()
			);
			$dbw->insert( 'shorturls', $row_data );
			$id = $dbw->insertId();
		}
		$wgMemc->set( wfMemcKey( 'shorturls', 'title', $title->getFullText() ), $id, 0 );
	}
	return urlsafe_b64encode( $id );
}

function shorturlDecode ( $data ) {
	global $wgMemc;

	$id = intval( urlsafe_b64decode ( $data ) );
	$entry = $wgMemc->get( wfMemcKey( 'shorturls', 'id', $id ) );
	if ( !$entry ) {
		$dbr = wfGetDB( DB_SLAVE );
		$query = $dbr->select(
			'shorturls',
			array( 'su_namespace', 'su_title' ),
			array( 'su_id' => $id ),
			__METHOD__
		);

		$entry = $dbr->fetchRow( $query );
		$wgMemc->set( wfMemcKey( 'shorturls', 'id', $id ), $entry, 0 );
	}
	return Title::makeTitle( $entry['su_namespace'], $entry['su_title'] );
}

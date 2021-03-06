<?php
/**
 * Classes used to send headers and cookies back to the user
 *
 * @file
 */

/**
 * Allow programs to request this object from WebRequest::response()
 * and handle all outputting (or lack of outputting) via it.
 * @ingroup HTTP
 */
class WebResponse {

	/**
	 * Output a HTTP header, wrapper for PHP's
	 * header()
	 * @param $string String: header to output
	 * @param $replace Bool: replace current similar header
	 * @param $http_response_code null|int Forces the HTTP response code to the specified value.
	 */
	public function header( $string, $replace = true, $http_response_code = null ) {
		header( $string, $replace, $http_response_code );
	}

	/**
	 * Set the browser cookie
	 * @param $name String: name of cookie
	 * @param $value String: value to give cookie
	 * @param $expire Int: number of seconds til cookie expires
	 */
	public function setcookie( $name, $value, $expire = 0 ) {
		global $wgCookiePath, $wgCookiePrefix, $wgCookieDomain;
		global $wgCookieSecure,$wgCookieExpiration, $wgCookieHttpOnly;
		if ( $expire == 0 ) {
			$expire = time() + $wgCookieExpiration;
		}
		$httpOnlySafe = wfHttpOnlySafe() && $wgCookieHttpOnly;
		wfDebugLog( 'cookie',
			'setcookie: "' . implode( '", "',
				array(
					$wgCookiePrefix . $name,
					$value,
					$expire,
					$wgCookiePath,
					$wgCookieDomain,
					$wgCookieSecure,
					$httpOnlySafe ) ) . '"' );
		setcookie( $wgCookiePrefix . $name,
			$value,
			$expire,
			$wgCookiePath,
			$wgCookieDomain,
			$wgCookieSecure,
			$httpOnlySafe );
	}
}

/**
 * @ingroup HTTP
 */
class FauxResponse extends WebResponse {
	private $headers;
	private $cookies;

	/**
	 * Stores a HTTP header
	 * @param $string String: header to output
	 * @param $replace Bool: replace current similar header
	 * @param $http_response_code null|int Forces the HTTP response code to the specified value.
	 */
	public function header( $string, $replace = true, $http_response_code = null ) {
		list( $key, $val ) = explode( ":", $string, 2 );

		if( $replace || !isset( $this->headers[$key] ) ) {
			$this->headers[$key] = $val;
		}
	}

	/**
	 * @param $key string
	 * @return string
	 */
	public function getheader( $key ) {
		return $this->headers[$key];
	}

	/**
	 * @param $name String: name of cookie
	 * @param $value String: value to give cookie
	 * @param $expire Int: number of seconds til cookie expires
	 */
	public function setcookie( $name, $value, $expire = 0 ) {
		$this->cookies[$name] = $value;
	}

	/**
	 * @param $name string
	 * @return string
	 */
	public function getcookie( $name )  {
		if ( isset( $this->cookies[$name] ) ) {
			return $this->cookies[$name];
		}
		return null;
	}
}

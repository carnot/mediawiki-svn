<?php
/**
 * Contain the HTMLFileCache class
 * @file
 * @ingroup Cache
 */

/**
 * Handles talking to the file cache, putting stuff in and taking it back out.
 * Mostly called from Article.php, also from DatabaseFunctions.php for the
 * emergency abort/fallback to cache.
 *
 * Global options that affect this module:
 * - $wgCachePages
 * - $wgCacheEpoch
 * - $wgUseFileCache
 * - $wgFileCacheDirectory
 * - $wgUseGzip
 *
 * @ingroup Cache
 */
class HTMLFileCache {
	var $mTitle, $mFileCache;

	public function __construct( &$title ) {
		$this->mTitle = $title;
		$this->mFileCache = $this->fileCacheName();
	}

	public function fileCacheName() {
		global $wgFileCacheDirectory;
		if( !$this->mFileCache ) {
			$key = $this->mTitle->getPrefixedDbkey();
			$hash = md5( $key );
			$key = str_replace( '.', '%2E', urlencode( $key ) );

			$hash1 = substr( $hash, 0, 1 );
			$hash2 = substr( $hash, 0, 2 );
			$this->mFileCache = "{$wgFileCacheDirectory}/{$hash1}/{$hash2}/{$key}.html";

			if( $this->useGzip() )
				$this->mFileCache .= '.gz';

			wfDebug( " fileCacheName() - {$this->mFileCache}\n" );
		}
		return $this->mFileCache;
	}

	public function isFileCached() {
		return file_exists( $this->fileCacheName() );
	}

	public function fileCacheTime() {
		return wfTimestamp( TS_MW, filemtime( $this->fileCacheName() ) );
	}
	
	/**
	 * Check if pages can be cached for this request/user
	 * @return bool
	 */
	public static function useFileCache() {
		global $wgUser, $wgUseFileCache, $wgShowIPinHeader, $wgRequest, $wgLang, $wgContLang;
		if( !$wgUseFileCache )
			return false;
		// Get all query values
		$queryVals = $wgRequest->getValues();
		foreach( $queryVals as $query => $val ) {
			// Normal page view in query form can have action=view
			if( $query !== 'title' && $query !== 'curid' && !($query == 'action' && $val == 'view') ) {
				return false;
			}
		}
		// Check for non-standard user language; this covers uselang,
		// and extensions for auto-detecting user language.
		$ulang = $wgLang->getCode();
		$clang = $wgContLang->getCode();

		return !$wgShowIPinHeader && !$wgUser->getId() && !$wgUser->getNewtalk() && $ulang == $clang;
	}

	/* 
	* Check if up to date cache file exists
	* @param $timestamp string
	*/
	public function isFileCacheGood( $timestamp = '' ) {
		global $wgCacheEpoch;

		if( !$this->isFileCached() ) return false;
		if( !$timestamp ) return true; // should be invalidated on change

		$cachetime = $this->fileCacheTime();
		$good = $timestamp <= $cachetime && $wgCacheEpoch <= $cachetime;

		wfDebug(" isFileCacheGood() - cachetime $cachetime, touched '{$timestamp}' epoch {$wgCacheEpoch}, good $good\n");
		return $good;
	}

	public function useGzip() {
		global $wgUseGzip;
		return $wgUseGzip;
	}

	/* In handy string packages */
	public function fetchRawText() {
		return file_get_contents( $this->fileCacheName() );
	}

	public function fetchPageText() {
		if( $this->useGzip() ) {
			/* Why is there no gzfile_get_contents() or gzdecode()? */
			return implode( '', gzfile( $this->fileCacheName() ) );
		} else {
			return $this->fetchRawText();
		}
	}

	/* Working directory to/from output */
	public function loadFromFileCache() {
		global $wgOut, $wgMimeType, $wgOutputEncoding, $wgContLanguageCode;
		wfDebug(" loadFromFileCache()\n");

		$filename = $this->fileCacheName();
		$wgOut->sendCacheControl();

		header( "Content-type: $wgMimeType; charset={$wgOutputEncoding}" );
		header( "Content-language: $wgContLanguageCode" );

		if( $this->useGzip() ) {
			if( wfClientAcceptsGzip() ) {
				header( 'Content-Encoding: gzip' );
			} else {
				/* Send uncompressed */
				readgzfile( $filename );
				return;
			}
		}
		readfile( $filename );
	}

	protected function checkCacheDirs() {
		$filename = $this->fileCacheName();
		$mydir2 = substr($filename,0,strrpos($filename,'/')); # subdirectory level 2
		$mydir1 = substr($mydir2,0,strrpos($mydir2,'/')); # subdirectory level 1

		wfMkdirParents( $mydir1 );
		wfMkdirParents( $mydir2 );
	}

	public function saveToFileCache( $origtext ) {
		global $wgUseFileCache;
		if( !$wgUseFileCache ) {
			return $origtext; // return to output
		}
		$text = $origtext;
		if( strcmp($text,'') == 0 ) return '';

		wfDebug(" saveToFileCache()\n", false);

		$this->checkCacheDirs();

		$f = fopen( $this->fileCacheName(), 'w' );
		if($f) {
			$now = wfTimestampNow();
			if( $this->useGzip() ) {
				$rawtext = str_replace( '</html>',
					'<!-- Cached/compressed '.$now." -->\n</html>",
					$text );
				$text = gzencode( $rawtext );
			} else {
				$text = str_replace( '</html>',
					'<!-- Cached '.$now." -->\n</html>",
					$text );
			}
			fwrite( $f, $text );
			fclose( $f );
			if( $this->useGzip() ) {
				if( wfClientAcceptsGzip() ) {
					header( 'Content-Encoding: gzip' );
					return $text;
				} else {
					return $rawtext;
				}
			} else {
				return $text;
			}
		}
		return $text;
	}

}

<?php

abstract class SubversionAdaptor {
	protected $mRepo;

	public static function newFromRepo( $repo ) {
		if ( function_exists( 'svn_log' ) ) {
			return new SubversionPecl( $repo );
		} else {
			throw new Exception("Requires SVN PECL extension");
		}
	}

	function __construct( $repo ) {
		$this->mRepo = $repo;
	}

	abstract function getFile( $path, $rev = null );

	abstract function getDiff( $path, $rev1, $rev2 );

	abstract function getDirList( $path, $rev = null );

	/*
	  array of array(
		'rev' => 123,
		'author' => 'myname',
		'msg' => 'log message'
		'date' => '8601 date',
		'paths' => array(
			array(
				'action' => one of M, A, D, R
				'path' => repo URL of file,
			),
			...
		)
	  */
	abstract function getLog( $path, $startRev = null, $endRev = null );

	protected function _rev( $rev, $default ) {
		if ( $rev === null ) {
			return $default;
		} else {
			return intval( $rev );
		}
	}
}

/**
 * Using the SVN PECL extension...
 */
class SubversionPecl extends SubversionAdaptor {
	function getFile( $path, $rev = null ) {
		return svn_cat( $this->mRepo . $path, $rev );
	}

	function getDiff( $path, $rev1, $rev2 ) {
		list( $fout, $ferr ) = svn_diff(
			$this->mRepo . $path, $rev1,
			$this->mRepo . $path, $rev2 );

		if ( $fout ) {
			// We have to read out the file descriptors. :P
			$out = '';
			while ( !feof( $fout ) ) {
				$out .= fgets( $fout );
			}
			fclose( $fout );
			fclose( $ferr );

			return $out;
		} else {
			return new MWException( "Diffing error" );
		}
	}

	function getDirList( $path, $rev = null ) {
		return svn_ls( $this->mRepo . $path,
			$this->_rev( $rev, SVN_REVISION_HEAD ) );
	}

	function getLog( $path, $startRev = null, $endRev = null ) {
		return svn_log( $this->mRepo . $path,
			$this->_rev( $startRev, SVN_REVISION_INITIAL ),
			$this->_rev( $endRev, SVN_REVISION_HEAD ) );
	}
}

<?php

/**
 * Core class for interacting with a repository of code. 
 */
class CodeRepository {

	/**
	 * Local cache of Wiki user -> SVN user mappings
	 * @var Array
	 */
	private static $userLinks = array();

	/**
	 * Sort of the same, but looking it up for the other direction
	 * @var Array
	 */
	private static $authorLinks = array();

	/**
	 * Various data about the repo
	 */
	private $id, $name, $path, $viewVc, $bugzilla;

	/**
	 * Constructor, can't use it. Call one of the static newFrom* methods
	 * @param $id Int Database id for the repo
	 * @param $name String User-defined name for the repository
	 * @param $path String Path to SVN
	 * @param $viewVc String Base path to ViewVC URLs
	 * @param $bugzilla String Base path to Bugzilla
	 */
	public function  __construct( $id, $name, $path, $viewvc, $bugzilla ) {
		$this->id = $id;
		$this->name = $name;
		$this->path = $path;
		$this->viewVc = $viewvc;
		$this->bugzilla = $bugzilla;
	}

	public static function newFromName( $name ) {
		$dbw = wfGetDB( DB_MASTER );
		$row = $dbw->selectRow(
			'code_repo',
			array(
				'repo_id',
				'repo_name',
				'repo_path',
				'repo_viewvc',
				'repo_bugzilla' ),
			array( 'repo_name' => $name ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	public static function newFromId( $id ) {
		$dbw = wfGetDB( DB_MASTER );
		$row = $dbw->selectRow(
			'code_repo',
			array(
				'repo_id',
				'repo_name',
				'repo_path',
				'repo_viewvc',
				'repo_bugzilla' ),
			array( 'repo_id' => intval( $id ) ),
			__METHOD__ );

		if ( $row ) {
			return self::newFromRow( $row );
		} else {
			return null;
		}
	}

	static function newFromRow( $row ) {
		return new CodeRepository(
			intval( $row->repo_id ),
			$row->repo_name,
			$row->repo_path,
			$row->repo_viewvc,
			$row->repo_bugzilla
		);
	}

	static function getRepoList() {
		$dbr = wfGetDB( DB_SLAVE );
		$options = array( 'ORDER BY' => 'repo_name' );
		$res = $dbr->select( 'code_repo', '*', array(), __METHOD__, $options );
		$repos = array();
		foreach ( $res as $row ) {
			$repos[] = self::newFromRow( $row );
		}
		return $repos;
	}

	public function getId() {
		return intval( $this->id );
	}

	public function getName() {
		return $this->name;
	}

	public function getPath() {
		return $this->path;
	}

	public function getViewVcBase() {
		return $this->viewVc;
	}

	public function getBugzillaBase() {
		return $this->bugzilla;
	}

	/**
	 * Return a bug URL or false.
	 */
	public function getBugPath( $bugId ) {
		if ( $this->bugzilla ) {
			return str_replace( '$1',
				urlencode( $bugId ), $this->bugzilla );
		}
		return false;
	}

	public function getLastStoredRev() {
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectField(
			'code_rev',
			'MAX(cr_id)',
			array( 'cr_repo_id' => $this->getId() ),
			__METHOD__
		);
		return intval( $row );
	}

	public function getPathSearchHorizon() {
		global $wgCodeReviewPathSearchHorizon;
		
		if( $wgCodeReviewPathSearchHorizon )
			return $this->getLastStoredRev() - $wgCodeReviewPathSearchHorizon;
		else
			return 0;
	}

	public function getAuthorList() {
		global $wgMemc;
		$key = wfMemcKey( 'codereview', 'authors', $this->getId() );
		$authors = $wgMemc->get( $key );
		if ( is_array( $authors ) ) {
			return $authors;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			'code_rev',
			array( 'cr_author', 'MAX(cr_timestamp) AS time' ),
			array( 'cr_repo_id' => $this->getId() ),
			__METHOD__,
			array( 'GROUP BY' => 'cr_author',
				'ORDER BY' => 'cr_author', 'LIMIT' => 500 )
		);
		$authors = array();
		foreach( $res as $row ) {
			if ( $row->cr_author !== null ) {
				$authors[] = array( 'author' => $row->cr_author, 'lastcommit' => $row->time );
			}
		}
		$wgMemc->set( $key, $authors, 3600 * 24 );
		return $authors;
	}

	public function getAuthorCount() {
		return count( $this->getAuthorList() );
	}

	public function getTagList() {
		global $wgMemc;
		$key = wfMemcKey( 'codereview', 'tags', $this->getId() );
		$tags = $wgMemc->get( $key );
		if ( is_array( $tags ) ) {
			return $tags;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select(
			'code_tags',
			array( 'ct_tag', 'COUNT(*) AS revs' ),
			array( 'ct_repo_id' => $this->getId() ),
			__METHOD__,
			array( 'GROUP BY' => 'ct_tag',
				'ORDER BY' => 'revs DESC', 'LIMIT' => 500 )
		);
		$tags = array();
		foreach( $res as $row ) {
			$tags[$row->ct_tag] = $row->revs;
		}
		$wgMemc->set( $key, $tags, 3600 * 3 );
		return $tags;
	}

	/**
	 * Load a particular revision out of the DB
	 */
	public function getRevision( $id ) {
		if ( !$this->isValidRev( $id ) ) {
			return null;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow( 'code_rev',
			'*',
			array(
				'cr_id' => $id,
				'cr_repo_id' => $this->getId(),
			),
			__METHOD__
		);
		if ( !$row ) {
			throw new MWException( 'Failed to load expected revision data' );
		}
		return CodeRevision::newFromRow( $this, $row );
	}

	/**
	 * Returns the supplied revision ID as a string ready for output, including the
	 * appropriate (localisable) prefix (e.g. "r123" instead of 123).
	 */
	public function getRevIdString( $id ) {
		return wfMsg( 'code-rev-id', $id );
	}

	/**
	 * Like getRevIdString(), but if more than one repository is defined
	 * on the wiki then it includes the repo name as a prefix to the revision ID
	 * (separated with a period).
	 * This ensures you get a unique reference, as the revision ID alone can be
	 * confusing (e.g. in e-mails, page titles etc.).  If only one repository is
	 * defined then this returns the same as getRevIdString() as there
	 * is no ambiguity.
	 */
	public function getRevIdStringUnique( $id ) {
		$id = wfMsg( 'code-rev-id', $id );

	// If there is more than one repo, use the repo name as well.
		$repos = CodeRepository::getRepoList();
		if ( count( $repos ) > 1 ) {
			$id = $this->getName() . "." . $id;
		}

		return $id;
	}

	/**
	 * @param int $rev Revision ID
	 * @param $useCache 'skipcache' to avoid caching
	 *                   'cached' to *only* fetch if cached
	 * @return string|int The diff text on success, a DIFFRESULT_* constant on failure.
	 * @fixme Actually returns null if $useCache='cached' and there's no cached
	 *        data. Either add a relevant constant or fix the comment above;
	 *        caller in CodeRevisionView fixed by adding is_null check.
	 */
	public function getDiff( $rev, $useCache = '' ) {
		global $wgMemc, $wgCodeReviewMaxDiffPaths;
		wfProfileIn( __METHOD__ );

		$data = null;

		$rev1 = $rev - 1;
		$rev2 = $rev;

		// Check that a valid revision was specified.
		$revision = $this->getRevision( $rev );
		if ( $revision == null ) {
			$data = DIFFRESULT_BadRevision;
		} else {
			// Check that there is at least one, and at most $wgCodeReviewMaxDiffPaths
			// paths changed in this revision.

			$paths = $revision->getModifiedPaths();
			if ( !$paths->numRows() ) {
				$data = DIFFRESULT_NothingToCompare;
			} elseif ( $wgCodeReviewMaxDiffPaths > 0 && $paths->numRows() > $wgCodeReviewMaxDiffPaths ) {
				$data = DIFFRESULT_TooManyPaths;
			}
		}
	
		// If an error has occurred, return it.
		if ( $data !== null ) {
			wfProfileOut( __METHOD__ );
			return $data;
		}

		// Set up the cache key, which will be used both to check if already in the
		// cache, and to write the final result to the cache.
		$key = wfMemcKey( 'svn', md5( $this->path ), 'diff', $rev1, $rev2 );

		// If not set to explicitly skip the cache, get the current diff from memcached
		// directly.
		if ( $useCache === 'skipcache' ) {
			$data = null;
		} else {
			$data = $wgMemc->get( $key );
		}

		// If the diff hasn't already been retrieved from the cache, see if we can get
		// it from the DB.
		if ( !$data && $useCache != 'skipcache' ) {
			$dbr = wfGetDB( DB_SLAVE );
			$row = $dbr->selectRow( 'code_rev',
				array( 'cr_diff', 'cr_flags' ),
				array( 'cr_repo_id' => $this->id, 'cr_id' => $rev, 'cr_diff IS NOT NULL' ),
				__METHOD__
			);
			if ( $row ) {
				$flags = explode( ',', $row->cr_flags );
				$data = $row->cr_diff;
				// If the text was fetched without an error, convert it
				if ( $data !== false && in_array( 'gzip', $flags ) ) {
					# Deal with optional compression of archived pages.
					# This can be done periodically via maintenance/compressOld.php, and
					# as pages are saved if $wgCompressRevisions is set.
					$data = gzinflate( $data );
				}
			}
		}

		// If the data was not already in the cache or in the DB, we need to retrieve
		// it from SVN.
		if ( !$data && $useCache !== 'cached' ) {
			$svn = SubversionAdaptor::newFromRepo( $this->path );
			$data = $svn->getDiff( '', $rev1, $rev2 );

			// If $data is blank, report the error that no data was returned.
			// TODO: Currently we can't tell the difference between an SVN/connection
			//		 failure and an empty diff.  See if we can remedy this!
			if ($data == "") {
				$data = DIFFRESULT_NoDataReturned;
			} else {
				// Otherwise, store the resulting diff to both the temporary cache and
				// permanent DB storage.
				// Store to cache
				$wgMemc->set( $key, $data, 3600 * 24 * 3 );

				// Permanent DB storage
				$storedData = $data;
				$flags = Revision::compressRevisionText( $storedData );
				$dbw = wfGetDB( DB_MASTER );
				$dbw->update( 'code_rev',
					array( 'cr_diff' => $storedData, 'cr_flags' => $flags ),
					array( 'cr_repo_id' => $this->id, 'cr_id' => $rev ),
					__METHOD__
				);
			}
		}

		wfProfileOut( __METHOD__ );
		return $data;
	}

	/**
	 * Set diff cache (for import operations)
	 * @param $codeRev CodeRevision
	 */
	public function setDiffCache( CodeRevision $codeRev ) {
		global $wgMemc;
		wfProfileIn( __METHOD__ );

		$rev1 = $codeRev->getId() - 1;
		$rev2 = $codeRev->getId();

		$svn = SubversionAdaptor::newFromRepo( $this->path );
		$data = $svn->getDiff( '', $rev1, $rev2 );
		// Store to cache
		$key = wfMemcKey( 'svn', md5( $this->path ), 'diff', $rev1, $rev2 );
		$wgMemc->set( $key, $data, 3600 * 24 * 3 );
		// Permanent DB storage
		$storedData = $data;
		$flags = Revision::compressRevisionText( $storedData );
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'code_rev',
			array( 'cr_diff' => $storedData, 'cr_flags' => $flags ),
			array( 'cr_repo_id' => $this->id, 'cr_id' => $codeRev->getId() ),
			__METHOD__
		);
		wfProfileOut( __METHOD__ );
	}

	/**
	 * Is the requested revid a valid revision to show?
	 * @return bool
	 * @param $rev int Rev id to check
	 */
	public function isValidRev( $rev ) {
		$rev = intval( $rev );
		if ( $rev > 0 && $rev <= $this->getLastStoredRev() ) {
			return true;
		}
		return false;
	}

	/**
	 * Link the $author to the wikiuser $user
	 * @param $author String
	 * @param $user User
	 * @return bool Success
	 */
	public function linkUser( $author, User $user ) {
		// We must link to an existing user
		if ( !$user->getId() ) {
			return false;
		}
		$dbw = wfGetDB( DB_MASTER );
		// Insert in the auther -> user link row.
		// Skip existing rows.
		$dbw->insert( 'code_authors',
			array(
				'ca_repo_id'   => $this->getId(),
				'ca_author'    => $author,
				'ca_user_text' => $user->getName()
			),
			__METHOD__,
			array( 'IGNORE' )
		);
		// If the last query already found a row, then update it.
		if ( !$dbw->affectedRows() ) {
			$dbw->update(
				'code_authors',
				array( 'ca_user_text' => $user->getName() ),
				array(
					'ca_repo_id'  => $this->getId(),
					'ca_author'   => $author,
				),
				__METHOD__
			);
		}
		self::$userLinks[$author] = $user;
		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * Remove local user links for $author
	 * @param string $author
	 * @return bool success
	 */
	public function unlinkUser( $author ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->delete(
			'code_authors',
			array(
				'ca_repo_id' => $this->getId(),
				'ca_author'  => $author,
			),
			__METHOD__
		);
		self::$userLinks[$author] = false;
		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * returns a User object if $author has a wikiuser associated,
	 * or false
	 * @return User|bool
	 */
	public function authorWikiUser( $author ) {
		if ( isset( self::$userLinks[$author] ) )
			return self::$userLinks[$author];

		$dbr = wfGetDB( DB_SLAVE );
		$wikiUser = $dbr->selectField(
			'code_authors',
			'ca_user_text',
			array(
				'ca_repo_id' => $this->getId(),
				'ca_author'  => $author,
			),
			__METHOD__
		);
		$user = null;
		if ( $wikiUser !== false ) {
			$user = User::newFromName( $wikiUser );
		}
		if ( $user instanceof User ){
			$res = $user;
		} else {
			$res = false;
		}
		return self::$userLinks[$author] = $res;
	}

	/**
	 * returns an author name if $name wikiuser has an author associated,
	 * or false
	 */
	public function wikiUserAuthor( $name ) {
		if ( isset( self::$authorLinks[$name] ) )
			return self::$authorLinks[$name];

		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->selectField(
			'code_authors',
			'ca_author',
			array(
				'ca_repo_id'   => $this->getId(),
				'ca_user_text' => $name,
			),
			__METHOD__
		);
		return self::$authorLinks[$name] = $res;
	}
}

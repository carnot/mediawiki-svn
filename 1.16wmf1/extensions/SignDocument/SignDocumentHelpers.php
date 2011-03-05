<?PHP

/**
 * Helper classes for the SignDocument extensions. This file provides the classes
 * SignDocumentForm, which represents a document signing form generated by a
 * sigadmin, and SignDocumentSignature, which represents a signature committed by
 * a user to a document.
 *
 * @addtogroup Extensions
 *
 * @author Daniel Cannon (AmiDaniel)
 * @copyright Copyright © 2007, Daniel Cannon
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * A "SignDocumentForm" is essentially the configuration of *how* a user can
 * sign a document. This includes what options are visibile to users, what
 * options are optional, what users may sign a document, whether signing is
 * enabled for the given document, what the minimum age of a signer must
 * be, and a brief introductory text displayed to signers.
 */
class SignDocumentForm {
	/* public fields */
	public $mPagename, $mAllowedGroup, $mMinAge, $mIntrotext;

	public $mEmailHidden, $mAddressHidden, $mExtAddressHidden,
		$mPhoneHidden, $mBdayHidden;

	public $mEmailOptional, $mAddressOptional, $mExtAddressOptional,
		$mPhoneOptional, $mBdayOptional;

	public $mOpen;

	/* null until the item exists in the db. */
	private $mInDb;
    private $mId;

	/* Compressed bitfields representing hidden and optional fields. */
	private $mHiddenFlags, $mOptionalFlags;

	/* Pertaining to the article this form describes. */
	private	$mOldid, $mPageId;
	public $mTitle, $mArticle;

	/* Hackerish indeed .. my little cheat to make this class immutable. */
	private static $mCanRunCtor;

	/**
	 * Constructs a new SignDocumentForm. Errors if the class is externally
	 * instatiated.
	 */
	function __construct() {
		if ( !self::$mCanRunCtor ) throw new MWException( 'Finger weg!' );
	}

	/**
	 * Generates and returns a new SignDocumentForm, built on post data.
	 */
	static function newFromPost() {
		self::$mCanRunCtor = true;
		$f = new SignDocumentForm();
		self::$mCanRunCtor = false;

		global $wgRequest;
		$f->mPagename = $wgRequest->getVal( 'pagename' );
		$f->mAllowedGroup = $wgRequest->getVal( 'group' );
		$f->mMinAge = $wgRequest->getVal( 'minage' );
		$f->mIntrotext = $wgRequest->getVal( 'introtext' );

		$f->mEmailHidden = $wgRequest->getVal( 'mwCreateSignDocHidden-email' );
		$f->mAddressHidden = $wgRequest->getVal( 'mwCreateSignDocHidden-address' );
		$f->mExtAddressHidden = $wgRequest->getVal( 'mwCreateSignDocHidden-extaddress' );
		$f->mPhoneHidden = $wgRequest->getVal( 'mwCreateSignDocHidden-phone' );
		$f->mBdayHidden = $wgRequest->getVal( 'mwCreateSignDocHidden-bday' );

		$f->mEmailOptional = $wgRequest->getVal( 'mwCreateSignDocOptional-email' );
		$f->mAddressOptional = $wgRequest->getVal( 'mwCreateSignDocOptional-address' );
		$f->mExtAddressOptional = $wgRequest->getVal( 'mwCreateSignDocOptional-extaddress' );
		$f->mPhoneOptional = $wgRequest->getVal( 'mwCreateSignDocOptional-phone' );
		$f->mBdayOptional = $wgRequest->getVal( 'mwCreateSignDocOptional-bday' );

		$f->basicSanityChecking();

		return $f;
	}

	/**
	 * Generates mTitle, mArticle and sets mOldid to the latest revision of the
	 * article specified by mPagename.
	 */
	function loadArticleData() {
		$this->mTitle = Title::newFromText( $this->mPagename );

		if ( is_null( $this->mTitle ) || !is_object( $this->mTitle ) )
			throw new MWException( 'Something went horribly wrong. ' .
				'mTitle is null or not an object.' );

		if ( !$this->mTitle->exists() )
			return false;

		$this->mArticle = new Article( $this->mTitle );
		$this->mArticle->loadPageData();

		$this->mOldid = $this->mArticle->mLatest;
		$this->mPageId = $this->mTitle->getArticleID();

		return true;
	}

	/**
	 * Checks the basics, like that minimum age is numeric.
	 */
	function basicSanityChecking() {
		if ( $this->mMinAge && !is_numeric( $this->mMinAge ) )
			throw new Exception( 'Invalid minimum age: "' . $this->mMinAge . '".' );
	}

	/**
	 * Add this form to the database. At the end of this invocation, mId will be
	 * set to the id of this form in the db.
	 */
	function addToDb() {
		$dbw = wfGetDB( DB_MASTER );

		/* Make sure title includes namespace. */
		$this->mPagename = $this->mTitle->getPrefixedText();

		/* Make sure it don't already exist ... */
		$res = $dbw->selectRow( 'sdoc_form', '*', array(
			'form_pageid' => $this->mPageId ) );
		if ( !empty( $res ) ) {
			return false;
		}

		$this->compressFlags();

		$dbw->insert( 'sdoc_form',
			array(
				'form_pageid'       => $this->mPageId,
				'form_pagename'     => $this->mPagename,
				'form_oldid'        => $this->mOldid,
				'form_open'         => true,
				'form_allowgroup'   => $this->mAllowedGroup,
				'form_hidden'       => $this->mHiddenFlags,
				'form_optional'     => $this->mOptionalFlags,
				'form_intro'        => $this->mIntrotext
			)
		);

		$this->mInDb = true;

		$id = $dbw->selectRow( 'sdoc_form', 'form_id',
				'', 'Database::selectRow', array(
				'ORDER BY' => 'form_id DESC',
				'LIMIT'    => '1' ) );

		$this->mId = $id->form_id;

		return true;
	}

	/**
	 * Retruns an array mapping a name of a SignDocumentForm (written as Pagename (r*))
	 * to SignDocumentForm ids, which can later be used to create a new SignDocumentForm
	 * via newFromDB($id). It will not include Forms that are no longer open or that the
	 * user is not allowed to access.
	 */
	static function getNamesFromDB() {
		global $wgUser;
		$dbw = wfGetDB( DB_MASTER );

		$dbrs = $dbw->select( 'sdoc_form', array( 'form_pagename', 'form_oldid',
				'form_id', 'form_allowgroup', 'form_open' ),
			array() );

		$ret = array();
		while ( $dbr = $dbw->fetchObject( $dbrs ) ) {
			if ( in_array( $dbr->form_allowgroup,
						$wgUser->getEffectiveGroups() ) )
						$ret[$dbr->form_pagename . ' (r' . $dbr->form_oldid . (
							( !$dbr->form_open ) ? ' - ' . wfMsg( 'sign-closed' ):'' )
							. ')'] = $dbr->form_id;
		}

		return $ret;

	}

	/**
	 * Create a new SignDocumentForm from the db, as extracted using the provided
	 * form_id.
	 */
	static function newFromDB( $id ) {
		self::$mCanRunCtor = true;
		$f = new SignDocumentForm();
		self::$mCanRunCtor = false;

		$dbw = wfGetDB( DB_MASTER );

		$row = $dbw->selectRow( 'sdoc_form', '*',
			array( 'form_id' => $id ) );

		if ( empty( $row ) ) return false;

		$f->mInDb = true;

		$f->mId            = $row->form_id;
		$f->mPageId        = $row->form_pageid;
		$f->mPagename      = $row->form_pagename;
		$f->mOldid         = $row->form_oldid;
		$f->mOpen          = $row->form_open;
		$f->mAllowedGroup  = $row->form_allowgroup;
		$f->mHiddenFlags   = $row->form_hidden;
		$f->mOptionalFlags = $row->form_optional;
		$f->mIntrotext     = $row->form_intro;

		$f->inflateFlags();

		$f->mTitle = Title::newFromId( $f->mPageId );
		$f->mArticle = new Article( $f->mTitle, $f->mOldid );

		return $f;
	}

	/**
	 * Compresses the optional and hidden boolean flags down into two
	 * bitfields.
	 */
	function compressFlags() {
		$this->mHiddenFlags = 0;

		if ( $this->mEmailHidden )      $this->mHiddenFlags |= 1;
		if ( $this->mAddressHidden )    $this->mHiddenFlags |= 1 << 1;
		if ( $this->mExtAddressHidden ) $this->mHiddenFlags |= 1 << 2;
		if ( $this->mPhoneHidden )      $this->mHiddenFlags |= 1 << 3;
		if ( $this->mBdayHidden )       $this->mHiddenFlags |= 1 << 4;

		$this->mOptionalFlags = 0;

		if ( $this->mEmailOptional )      $this->mOptionalFlags |= 1;
		if ( $this->mAddressOptional )    $this->mOptionalFlags |= 1 << 1;
		if ( $this->mExtAddressOptional ) $this->mOptionalFlags |= 1 << 2;
		if ( $this->mPhoneOptional )      $this->mOptionalFlags |= 1 << 3;
		if ( $this->mBdayOptional )       $this->mOptionalFlags |= 1 << 4;
	}

	/**
	 * The opposite of compressFlags, this inflates the values of the
	 * optional and hidden flag bitfields into booleans. This method
	 * assumes that the values of mHiddenFlags and mOptionalFlags have
	 * already been set (typically read from the db).
	 */
	function inflateFlags() {
		$this->mEmailHidden        = (bool) ( $this->mHiddenFlags & 1 );
		$this->mAddressHidden      = (bool) ( $this->mHiddenFlags & ( 1 << 1 ) );
		$this->mExtAddressHidden   = (bool) ( $this->mHiddenFlags & ( 1 << 2 ) );
		$this->mPhoneHidden        = (bool) ( $this->mHiddenFlags & ( 1 << 3 ) );
		$this->mBdayHidden         = (bool) ( $this->mHiddenFlags & ( 1 << 4 ) );

		$this->mEmailOptional        = (bool) ( $this->mOptionalFlags & 1 );
		$this->mAddressOptional      = (bool) ( $this->mOptionalFlags & ( 1 << 1 ) );
		$this->mExtAddressOptional   = (bool) ( $this->mOptionalFlags & ( 1 << 2 ) );
		$this->mPhoneOptional        = (bool) ( $this->mOptionalFlags & ( 1 << 3 ) );
		$this->mBdayOptional         = (bool) ( $this->mOptionalFlags & ( 1 << 4 ) );
	}

	/**
	 * Enables or disables signing via this form and updates the db.
	 */
	function setOpen( $op ) {
		$this->mOpen = $op;

		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'sdoc_form', array(
			'form_open' => $this->mOpen ), array(
				'form_id' => $this->getId() ) );
	}

	/**
	 * Basic string representation for debugging purposes.
	 */
	function __toString() {
		$ret = 'SignDocumentForm [ ';
		$ret .= 'mPagename:' . $this->mPagename;
		$ret .= '; mAllowedGroup:' . $this->mAllowedGroup;
		$ret .= '; mMinAge:' . $this->mMinAge;

		$ret .= '; mEmailHidden:' . $this->mEmailHidden;
		$ret .= '; mAddressHidden:' . $this->mAddressHidden;
		$ret .= '; mExtAddressHidden:' . $this->mExtAddressHidden;
		$ret .= '; mPhoneHidden:' . $this->mPhoneHidden;
		$ret .= '; mBdayHidden:' . $this->mBdayHidden;

		$ret .= '; mEmailOptional:' . $this->mEmailOptional;
		$ret .= '; mAddressOptional:' . $this->mAddressOptional;
		$ret .= '; mExtAddressOptional:' . $this->mExtAddressOptional;
		$ret .= '; mPhoneOptional:' . $this->mPhoneOptional;
		$ret .= '; mBdayOptional:' . $this->mBdayOptional;

		$ret .= '; mOldid:' . $this->mOldid;

		$ret .= '; mIntroText:' . $this->mIntrotext;

		return $ret . ' ]';
	}

	/* Getters and setters */
	public function getId() { return $this->mId; }
	public function getOldid() { return $this->mOldid; }
	public function getPageId() { return $this->mPageId; }
}

/**
 * A SignDocumentSignature is, just as its name suggests, all data attached to a
 * given signature.
 */
class SignDocumentSignature {
	/* Public fields, visible to all users regardless of settings. */
	public $mId, $mTimestamp;
	public $mStricken, $mStrickenBy, $mStrickenComment;

	/* Private fields accessible only if not specified as private or if the user
	 * viewing them has the appropriate priveleges to view private fields. */
	 private $mRealName, $mAddress, $mCity, $mState, $mCountry, $mZip, $mPhone,
	 			$mBday, $mEmail;

	/* Array containing fields set as private. */
	private $mHiddenFields;
	private $mAllAccessible;

	/* Fields accessible only to sigadmins. */
	private $mIp, $mAgent;

	public $mForm;

	private static $canRunCtor;

	function __construct() {
		if ( !self::$canRunCtor ) throw new MWException( 'Finger weg!' );
	}

	/**
	 * Create a "blank" SignDocumentSignature.
	 */
	public static function newBasic() {
		self::$canRunCtor = true;
		$f = new SignDocumentSignature();
		self::$canRunCtor = false;
		return $f;
	}

	/**
	 * Create a new SignDocumentSignature using data obtained from a POST.
	 */
	public static function newFromPost() {
		global $wgRequest;
		if ( !$wgRequest->wasPosted() )
			throw new MWException( 'Page was not posted.' );

		self::$canRunCtor = true;
		$f = new SignDocumentSignature();
		self::$canRunCtor = false;

		$f->mTimestamp = wfTimestampNow();

		$f->mRealName   = $wgRequest->getVal( 'realname', '' );
		$f->mAddress    = $wgRequest->getVal( 'address', '' );
		$f->mCity       = $wgRequest->getVal( 'city', '' );
		$f->mState      = $wgRequest->getVal( 'state', '' );
		$f->mCountry    = $wgRequest->getVal( 'country', '' );
		$f->mZip        = $wgRequest->getVal( 'zip', '' );
		$f->mPhone      = $wgRequest->getVal( 'phone', '' );
		$f->mBday       = $wgRequest->getVal( 'bday', 0 );
		$f->mEmail      = $wgRequest->getVal( 'email', '' );

		$f->mIp    = wfGetIp();
		$f->mAgent = wfGetAgent();

		if ( $wgRequest->getVal( 'anonymous' ) ) $f->mHiddenFields[] = 'realname';
		if ( $wgRequest->getVal( 'hideaddress' ) ) $f->mHiddenFields[] = 'address';
		if ( $wgRequest->getVal( 'hideextaddress' ) ) $f->mHiddenFields[] = 'extaddress';
		if ( $wgRequest->getVal( 'hidephone' ) ) $f->mHiddenFields[] = 'phone';
		if ( $wgRequest->getVal( 'hideemail' ) ) $f->mHiddenFields[] = 'email';
		if ( $wgRequest->getVal( 'hidebday' ) ) $f->mHiddenFields[] = 'bday';

		$f->mForm = SignDocumentForm::newFromDB( $wgRequest->getVal( 'doc' ) );

		return $f;
	}

	/**
	 * Get a SignDocumentSignature from the db using the provided id.
	 */
	public static function newFromDB( $id ) {
		$dbw = wfGetDB( DB_MASTER );

		return self::newFromRow( $dbw->selectRow( 'sdoc_signature', '*', array(
			'sig_id' => $id ) ) );
	}

	/**
	 * Returns an array of all SignDocumentSignatures associated with the
	 * form specified by the provided formid.
	 */
	public static function getAllFromDB( $formid ) {
		return self::allByCond( array( 'sig_form' => $formid ) );
	}

	/**
	 * Returns all SignDocumentSignatures with the same mRealName as this one.
	 */
	public function similarByName() {
		return self::allByCond( array( 'sig_realname' => $this->mRealName ) );
	}

	/**
	 * Returns all SignDocumentSignatures with the same mAddress as this one.
	 */
	public function similarByAddress() {
		if ( $this->mAddress = '' ) return array();
		return self::allByCond( array( 'sig_address' => $this->mAddress ) );
	}

	/**
	 * Returns all SignDocumentSignatures with the same mPhone as this one.
	 */
	public function similarByPhone() {
		if ( $this->mPhone = '' ) return array();
		return self::allByCond( array( 'sig_phone' => $this->mPhone ) );
	}

	/**
	 * Returns all SignDocumentSignatures with the same mEmail as this one.
	 */
	public function similarByEmail() {
		if ( $this->mEmail = '' ) return array();
		return self::allByCond( array( 'sig_email' => $this->mEmail ) );
	}

	/**
	 * Returns an array of all SignDocumentSignatures matching the provided
	 * sql WHERE condition.
	 */
	private static function allByCond( $cond ) {
		$ret = array();
		$dbw = wfGetDB( DB_MASTER );

		$dbrs = $dbw->select( 'sdoc_signature', '*', $cond );

		while ( $dbr = $dbw->fetchObject( $dbrs ) ) {
			$ret[] = self::newFromRow( $dbr );
		}

		return $ret;
	}

	/**
	 * Make a new one using the provided db row.
	 */
	private static function newFromRow( $dbr ) {
		if ( empty( $dbr ) ) return null;
		$f = self::newBasic();

		$f->mId        = $dbr->sig_id;
		$f->mForm      = SignDocumentForm::newFromDb( $dbr->sig_form );
		$f->mTimestamp = $dbr->sig_timestamp;
		$f->mRealName  = $dbr->sig_realname;
		$f->mAddress   = $dbr->sig_address;
		$f->mCity      = $dbr->sig_city;
		$f->mState     = $dbr->sig_state;
		$f->mCountry   = $dbr->sig_country;
		$f->mZip       = $dbr->sig_zip;
		$f->mPhone     = $dbr->sig_phone;
		$f->mEmail     = $dbr->sig_email;
		$f->mBday      = $dbr->sig_bday;
		$f->mIp        = $dbr->sig_ip;
		$f->mAgent     = $dbr->sig_agent;
		$f->mStricken  = $dbr->sig_stricken;
		$f->mStrickenBy = $dbr->sig_strickenby;
		$f->mStrickenComment = $dbr->sig_strickencomment;

		if ( $dbr->sig_anonymous  ) $f->mHiddenFields[] = 'realname';
		if ( $dbr->sig_hideaddress ) $f->mHiddenFields[] = 'address';
		if ( $dbr->sig_hideextaddress ) $f->mHiddenFields[] = 'extaddress';
		if ( $dbr->sig_hidephone ) $f->mHiddenFields[] = 'phone';
		if ( $dbr->sig_hideemail ) $f->mHiddenFields[] = 'email';
		if ( $dbr->sig_hidebday ) $f->mHiddenFields[] = 'bday';

		return $f;
	}

	/**
	 * Check if this sig may already exist in the db--that is, if there already
	 * exists a sig with the same IP address or e-mail for this sig's form.
	 */
	function checkInDB() {
		$dbw = wfGetDB( DB_MASTER );

		$row1 = $dbw->selectRow( 'sdoc_signature', 'sig_id', array(
			'sig_form' => $this->mForm->getId(),
			'sig_ip'   => $this->mIp ), 'LIMIT 1' );

		if ( !empty( $row1 ) ) throw new MWException( wfMsg( 'sig-error-already-signed' ) );

		$row2 = $dbw->selectRow( 'sdoc_signature', 'sig_id', array(
			'sig_form'  => $this->mForm->getId(),
			'sig_email' => $this->mEmail ) );

		if ( $this->mEmail && !empty( $row2 ) ) throw new MWException( wfMsg( 'sig-error-already-signed' ) );
	}

	/**
	 * Add it to the database.
	 */
	function addToDB() {
		$dbw = wfGetDB( DB_MASTER );

		$dbw->insert( 'sdoc_signature', array(
			'sig_form'           => $this->mForm->getId(),
			'sig_timestamp'      => $this->mTimestamp,
			'sig_realname'       => $this->mRealName,
			'sig_anonymous'      => $this->isHidden( 'realname' ),
			'sig_address'        => $this->mAddress,
			'sig_hideaddress'    => $this->isHidden( 'address' ),
			'sig_city'           => $this->mCity,
			'sig_state'          => $this->mState,
			'sig_country'        => $this->mCountry,
			'sig_zip'            => $this->mZip,
			'sig_hideextaddress' => $this->isHidden( 'extaddress' ),
			'sig_phone'          => $this->mPhone,
			'sig_hidephone'      => $this->isHidden( 'phone' ),
			'sig_bday'           => $this->mBday,
			'sig_hidebday'       => $this->isHidden( 'bday' ),
			'sig_email'          => $this->mEmail,
			'sig_hideemail'      => $this->isHidden( 'email' ),
			'sig_ip'             => $this->mIp,
			'sig_agent'          => $this->mAgent,
			'sig_stricken'       => false
		) );

		/* Get back our id. */
		$id = $dbw->selectRow( 'sdoc_signature', 'sig_id',
				'', 'Database::selectRow', array(
				'ORDER BY' => 'sig_id DESC',
				'LIMIT'    => '1' ) );
		$this->mId = $id->sig_id;
	}

	function checkSanity() {
		if ( $this->mBday && !is_numeric( $this->mBday ) )
			$this->sanityFailure( 'age-noint', $this->mBday );
		if ( $this->mZip && !is_numeric( $this->mZip ) )
			$this->sanityFailure( 'zip-noint', $this->mZip );

		$emailregex = '/^[a-z]+[a-z0-9]*[\.|\-|_]?[a-z0-9]+' .
			'@([a-z]+[a-z0-9]*[\.|\-]?[a-z]+[a-z0-9]*[a-z0-9]+){1,4}' .
			'\.[a-z]{2,4}$/';
		if ( $this->mEmail && !preg_match( $emailregex, $this->mEmail ) )
			$this->sanityFailure( 'bad-email', $this->mEmail );
	}

	function checkRequired() {
		$frm = $this->mForm;
		if ( !$this->mRealName ) $this->sanityFailure( 'req-name' );
		if ( !( $this->mForm->mAddressOptional || $this->mAddress ) )
				$this->sanityFailure( 'req-addr' );
		if ( !$frm->mExtAddressOptional ) {
		    if ( !$this->mCity )
				$this->sanityFailure( 'req-city' );
			if ( !$this->mState )
				$this->sanityFailure( 'req-state' );
			if ( !$this->mZip )
				$this->sanityFailure( 'req-zip' );
			if ( !$this->mCountry )
				$this->sanityFailure( 'req-country' );
		}
		if ( !( $frm->mPhoneOptional || $this->mPhone ) )
			$this->sanityFailure( 'req-phone' );
		if ( !( $frm->mEmailOptional || $this->mEmail ) )
			$this->sanityFailure( 'req-email' );
		if ( !( $frm->mBdayOptional || $this->mBday ) )
			$this->sanityFailure( 'req-bday' );
		if ( $frm->mMinAge && $this->mMinAge <= $frm->mMinAge )
			$this->sanityFailure( 'minage', $frm->mMinAge );
	}

	public function postReview( $reviewcomment, $strike ) {
		global $wgUser;
		$this->mStrickenBy      = $wgUser->getId();
		$this->mStrickenComment = $reviewcomment;
		$this->mStricken        = $strike;

		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'sdoc_signature', array(
			'sig_strickenby'     => $this->mStrickenBy,
			'sig_strickencomment' => $this->mStrickenComment,
			'sig_stricken'       => $this->mStricken ), array(
				'sig_id' => $this->mId ) );
	}

	private function sanityFailure( $id, $args = null )  {
		throw new MWException( wfMsg( "sign-error-$id", $args ) );
	}

	/* Getters and setters. This will return only data the user
	 * is allowed to see. */

	public function setAllAccessible( $b ) {
		$this->mAllAccessible = $b;
	}

	public function isPrivileged() {
		global $wgUser;
		return $wgUser->isAllowed( 'sigadmin' );
	}

	public function isHidden( $val ) {
		return !empty( $this->mHiddenFields ) && in_array( $val, $this->mHiddenFields );
	}

	public function canView( $val ) {
		return $this->mAllAccessible || ( !$this->isHidden( $val ) || $this->isPrivileged() );
	}

	public function getRealName() {
		return ( $this->canView( 'realname' ) ) ? $this->mRealName:wfMsg( 'sig-anonymous' );
	}

	public function getAddress() {
		return ( $this->canView( 'address' ) ) ? $this->mAddress:wfMsg( 'sig-private' );
	}

	public function getCity() {
		return ( $this->canView( 'extaddress' ) ) ? $this->mCity:wfMsg( 'sig-private' );
	}

	public function getState() {
		return ( $this->canView( 'extaddress' ) ) ? $this->mState:wfMsg( 'sig-private' );
	}

	public function getCountry() {
		return ( $this->canView( 'extaddress' ) ) ? $this->mCountry:wfMsg( 'sig-private' );
	}

	public function getZip() {
		return ( $this->canView( 'extaddress' ) ) ? $this->mZip:wfMsg( 'sig-private' );
	}

	public function getPhone() {
		return ( $this->canView( 'phone' ) ) ? $this->mPhone:wfMsg( 'sig-private' );
	}

	public function getEmail() {
		return ( $this->canView( 'email' ) ) ? $this->mEmail:wfMsg( 'sig-private' );
	}

	public function getBday() {
		return ( $this->canView( 'bday' ) ) ? $this->mBday:wfMsg( 'sig-private' );
	}

	public function getIp() {
		return ( $this->isPrivileged() ) ? $this->mIp:wfMsg( 'sig-private' );
	}

	public function getAgent() {
		return ( $this->isPrivileged() ) ? $this->mAgent:wfMsg( 'sig-private' );
	}

	public function getReviewedBy() {
		return User::whois( $this->mStrickenBy );

	}
}
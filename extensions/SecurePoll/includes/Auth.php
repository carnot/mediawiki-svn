<?php

class SecurePoll_Auth {
	static $authTypes = array(
		'local' => 'SecurePoll_LocalAuth',
		'remote-mw' => 'SecurePoll_RemoteMWAuth',
	);

	static function factory( $type ) {
		if ( !isset( self::$authTypes[$type] ) ) {
			throw new MWException( "Invalid authentication type: $type" );
		}
		$class = self::$authTypes[$type];
		return new $class;
	}

	function autoLogin( $election ) {
		return Status::newFatal( 'securepoll-not-logged-in' );
	}

	function requestLogin( $election ) {
		return $this->autoLogin();
	}

	function getVoterFromSession( $election ) {
		if ( session_id() == '' ) {
			wfSetupSession();
		}
		if ( isset( $_SESSION['securepoll_voter'][$election->getId()] ) ) {
			$voter = SecurePoll_Voter::newFromId( 
				$_SESSION['securepoll_voter'][$election->getId()] );

			# Sanity check election ID
			if ( $voter->getElectionId() != $election->getId() ) {
				var_dump( $voter );
				return false;
			} else {
				return $voter;
			}

		} else {
			return false;
		}
	}

	function getVoter( $params ) {
		$dbw = wfGetDB( DB_MASTER );

		# This needs to be protected by FOR UPDATE
		# Otherwise a race condition could lead to duplicate users for a single remote user, 
		# and thus to duplicate votes.
		$dbw->begin();
		$row = $dbw->selectRow( 
			'securepoll_voters', '*', 
			array( 
				'voter_name' => $params['name'],
				'voter_election' => $params['electionId'],
				'voter_domain' => $params['domain'],
				'voter_url' => $params['url']
			),
			__METHOD__,
			array( 'FOR UPDATE' )
		);
		if ( $row ) {
			# No need to hold the lock longer
			$dbw->commit();
			$user = SecurePoll_Voter::newFromRow( $row );
		} else {
			# Lock needs to be held until the row is inserted
			$user = SecurePoll_Voter::createVoter( $params );
			$dbw->commit();
		}
		return $user;
	}

	function newAutoSession( $election ) {
		$status = $this->autoLogin( $election );
		if ( $status->isGood() ) {
			$_SESSION['securepoll_voter'][$election->getId()] = $status->value->getId();
		}
		return $status;
	}

	function newRequestedSession( $election ) {
		$status = $this->requestLogin( $election );
		if ( $status->isGood() ) {
			$_SESSION['securepoll_voter'][$election->getId()] = $status->value->getId();
		}
		return $status;
	}
}

class SecurePoll_LocalAuth extends SecurePoll_Auth {
	function autoLogin( $election ) {
		global $wgUser, $wgServer, $wgLang;
		if ( $wgUser->isAnon() ) {
			return Status::newFatal( 'securepoll-not-logged-in' );
		}
		$params = self::getUserParams( $wgUser );
		$params['electionId'] = $election->getId();
		$qualStatus = $election->getQualifiedStatus( $params );
		if ( !$qualStatus->isOK() ) {
			return $qualStatus;
		}
		$voter = $this->getVoter( $params );
		return Status::newGood( $voter );
	}

	static function getUserParams( $user ) {
		global $wgServer;
		return array(
			'name' => $user->getName(),
			'type' => 'local',
			'domain' => preg_replace( '!.*/(.*)$!', '$1', $wgServer ),
			'url' => $user->getUserPage()->getFullURL(),
			'properties' => array(
				'wiki' => wfWikiID(),
				'blocked' => $user->isBlocked(),
				'edit-count' => $user->getEditCount(),
				'bot' => $user->isBot(),
				'language' => $user->getOption( 'language' ),
				'groups' => $user->getGroups(),
				'lists' => self::getLists( $user )
			)
		);
	}

	static function getLists( $user ) {
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 
			'securepoll_lists',
			array( 'li_name' ),
			array( 'li_member' => $user->getId() ),
			__METHOD__
		);
		$lists = array();
		foreach ( $res as $row ) {
			$lists[] = $row->li_name;
		}
		return $lists;
	}
}

class SecurePoll_RemoteMWAuth extends SecurePoll_Auth {
	function requestLogin( $election ) {
		global $wgRequest;

		$urlParamNames = array( 'id', 'token', 'wiki', 'site', 'domain' );
		$vars = array();
		foreach ( $urlParamNames as $name ) {
			$value = $wgRequest->getVal( $name );
			if ( !preg_match( '/^[\w.-]*$/', $value ) ) {
				wfDebug( __METHOD__ . " Invalid parameter: $name\n" );
				return false;
			}
			$params[$name] = $value;
			$vars["\$$name"] = $value;
		}

		$url = $election->getProperty( 'remote-mw-script-path' );
		$url = strtr( $url, $vars );
		if ( substr( $url, -1 ) != '/' ) {
			$url .= '/';
		}
		$url .= 'extensions/SecurePoll/auth-api.php?' . 
			wfArrayToCGI( array(
				'token' => $params['token'],
				'id' => $params['id']
			) );

		// Use the default SSL certificate file
		// Necessary on some versions of cURL, others do this by default
		$curlParams = array( CURLOPT_CAINFO => '/etc/ssl/certs/ca-certificates.crt' );

		$value = Http::get( $url, 20, $curlParams );

		if ( !$value ) {
			return Status::newFatal( 'securepoll-remote-auth-error' );
		}

		$status = unserialize( $value );
		$status->cleanCallback = false;

		if ( !$status || !( $status instanceof Status ) ) {
			return Status::newFatal( 'securepoll-remote-parse-error' );
		}
		if ( !$status->isOK() ) {
			return $status;
		}
		$params = $status->value;
		$params['type'] = 'remote-mw';
		$params['electionId'] = $election->getId();

		$qualStatus = $election->getQualifiedStatus( $params );
		if ( !$qualStatus->isOK() ) {
			return $qualStatus;
		}

		return Status::newGood( $this->getVoter( $params ) );
	}

	/**
	 * Apply a one-way hash function to a string.
	 *
	 * The aim is to encode a user's login token so that it can be transmitted to the
	 * voting server without giving the voting server any special rights on the wiki 
	 * (apart from the ability to verify the user). We truncate the hash at 26 
	 * hexadecimal digits, to provide 24 bits less information than original token. 
	 * This makes discovery of the token difficult even if the hash function is 
	 * completely broken.
	 */
	static function encodeToken( $token ) {
		return substr( sha1( __CLASS__ . '-' . $token ), 0, 26 );
	}
}

<?php

class SqliteInstaller extends InstallerDBType {
	var $globalNames = array(
		'wgDBname',
		'wgSQLiteDataDir',
	);

	function getName() {
		return 'sqlite';
	}

	function isCompiled() {
		return $this->checkExtension( 'pdo_sqlite' );
	}

	function getGlobalNames() {
		return $this->globalNames;
	}

	function getGlobalDefaults() {
		if ( isset( $_SERVER['DOCUMENT_ROOT'] ) ) {
			$path = str_replace( 
				array( '/', '\\' ), 
				DIRECTORY_SEPARATOR, 
				dirname( $_SERVER['DOCUMENT_ROOT'] ) . '/data' 
			);
			return array( 'wgSQLiteDataDir' => $path );
		} else {
			return array();
		}
	}

	function getConnectForm() {
		return $this->getTextBox( 'wgSQLiteDataDir', 'config-sqlite-dir' ) .
			$this->parent->getHelpBox( 'config-sqlite-dir-help' ) .
			$this->getTextBox( 'wgDBname', 'config-db-name' ) .
			$this->parent->getHelpBox( 'config-sqlite-name-help' );
	}

	function submitConnectForm() {
		global $wgSQLiteDataDir;
		$this->setVarsFromRequest( array( 'wgSQLiteDataDir', 'wgDBname' ) );

		$dir = realpath( $this->getVar( 'wgSQLiteDataDir' ) );
		if ( !$dir ) {
			// realpath() sometimes fails, especially on Windows
			$dir = $this->getVar( 'wgSQLiteDataDir' );
		}
		$this->setVar( 'wgSQLiteDataDir', $dir );
		if ( !is_dir( $dir ) ) {
			if ( !is_writable( dirname( $dir ) ) ) {
				return Status::newFatal( 'config-sqlite-parent-unwritable', $dir, dirname( $dir ) );
			}
			wfSuppressWarnings();
			$ok = wfMkdirParents( $dir, 0700 );
			wfRestoreWarnings();
			if ( !$ok ) {
				return Status::newFatal( 'config-sqlite-mkdir-error', $dir );
			}
			# Put a .htaccess file in in case the user didn't take our advice
			file_put_contents( "$dir/.htaccess", "Deny from all\n" );
		}
		if ( !is_writable( $dir ) ) {
			return Status::newFatal( 'config-sqlite-dir-unwritable', $dir );
		}
		return Status::newGood();
	}

	function getConnection() {
		global $wgSQLiteDataDir;

		$status = Status::newGood();
		$dir = $this->getVar( 'wgSQLiteDataDir' );
		$dbName = $this->getVar( 'wgDBname' );

		try {
			# FIXME: need more sensible constructor parameters, e.g. single associative array
			# Setting globals kind of sucks
			$wgSQLiteDataDir = $dir;
			$this->conn = new DatabaseSqlite( false, false, false, $dbName );
			return $this->conn;
		} catch ( DBConnectionError $e ) {
			$status->fatal( 'config-sqlite-connection-error', $e->getMessage() );
		}
		return $status;
	}

	function needsUpgrade() {
		$dir = $this->getVar( 'wgSQLiteDataDir' );
		$dbName = $this->getVar( 'wgDBname' );
		// Don't create the data file yet
		if ( !file_exists( DatabaseSqlite::generateFileName( $dir, $dbName ) ) ) {
			return false;
		}

		// If the data file exists, look inside it
		return parent::needsUpgrade();
	}

	function getSettingsForm() {
		return false;
	}

	function submitSettingsForm() {
		return Status::newGood();
	}

	function setupDatabase() {
		$file = DatabaseSqlite::generateFileName( $this->getVar( 'wgSQLiteDataDir' ), $this->getVar( 'wgDBname' ) );
		if ( file_exists( $file ) ) {
			if ( !is_writable( $file ) ) {
				return Status::newFatal( 'config-sqlite-readonly', $file );
			}
		} else {
			if ( file_put_contents( $file, '' ) === false ) {
				return Status::newFatal( 'config-sqlite-cant-create-db', $file );
			}
		}
		return $this->getConnection();
	}

	function getLocalSettings() {
		$dir = $this->getVar( 'wgSQLiteDataDir' );
		return
"# SQLite-specific settings
\$wgSQLiteDataDir    = \"{$dir}\";";
	}
}

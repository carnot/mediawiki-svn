<?
include_once ( "special_recentchanges.php" ) ;

function modifyArray ( $a , $sep , $rem , $add = "" ) {
	$b = explode ( $sep , $a ) ;
	$c = array () ;
	foreach ( $b as $x ) {
		if ( $x != "" and $x != $rem )
			array_push ( $c , $x ) ;
		}
	if ( $add != "" ) array_push ( $c , $add ) ;
	return implode ( $sep , $c ) ;
	}

function watch ( $t , $m ) {
	global $THESCRIPT , $user , $wikiUserSettingsError , $wikiWatchYes , $wikiWatchNo ;
	if ( !$user->isLoggedIn ) return $wikiUserSettingsError ;

	# Modifying user_watch
	$separator = "\n" ;
	$a = getMySQL ( "user" , "user_watch" , "user_id=$user->id" ) ;
	if ( $m == "yes" ) $a = modifyArray ( $a , $separator , $t , $t ) ;
	else $a = modifyArray ( $a , $separator , $t ) ;
	setMySQL ( "user" , "user_watch" , $a , "user_id=$user->id" ) ;

	if ( $m == "yes" ) $ret = str_replace ( "$1" , $t , $wikiWatchYes ) ;
	else str_replace ( "$1" , $t , $wikiWatchNo ) ;
	$ret .= "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL='".wikiLink(nurlencode($t))."'\">" ;
	return $ret ;
	}

function WatchList () {
	global $THESCRIPT ;
	global $vpage , $user , $wikiWatchlistTitle , $wikiWatchlistText ;
	$vpage->special ( $wikiWatchlistTitle ) ;
	$ret = $wikiWatchlistText ;
	$a = getMySQL ( "user" , "user_watch" , "user_id=$user->id" ) ;
	$separator = "\n" ;
	$b = explode ( $separator , $a ) ;
	$vpage->namespace = "" ;

	$n = array () ;
	foreach ( $b as $x )
		$n[$x] = getMySQL ( "cur" , "cur_timestamp" , "cur_title=\"$x\"" ) ;
	arsort ( $n ) ;
	$k = array_keys ( $n ) ;

	$connection=getDBconnection() ;
	$arr = array () ;
	$any = false ;
	foreach ( $k as $x ) {
		if ( $x != "" ) {
			$sql = "SELECT * FROM cur WHERE cur_title=\"$x\"" ;
			$result = mysql_query ( $sql , $connection ) ;
			$s = mysql_fetch_object ( $result ) ;
			array_push ( $arr , $s ) ;
			mysql_free_result ( $result ) ;
			$any = true ;
			}
		}
	if ( $any ) $ret .= recentChangesLayout ( $arr ) ;

	return $ret ;
	}
?>

<?php

/* This defines autoloading handler for whole MediaWiki framework */

ini_set('unserialize_callback_func', '__autoload' );

function __autoload($className) {
	global $wgAutoloadClasses;

	static $localClasses = array(
		'AjaxDispatcher' => 'includes/AjaxDispatcher.php',
		'AjaxCachePolicy' => 'includes/AjaxFunctions.php',
		'Article' => 'includes/Article.php',
		'AuthPlugin' => 'includes/AuthPlugin.php',
		'BagOStuff' => 'includes/BagOStuff.php',
		'HashBagOStuff' => 'includes/BagOStuff.php',
		'SqlBagOStuff' => 'includes/BagOStuff.php',
		'MediaWikiBagOStuff' => 'includes/BagOStuff.php',
		'TurckBagOStuff' => 'includes/BagOStuff.php',
		'APCBagOStuff' => 'includes/BagOStuff.php',
		'eAccelBagOStuff' => 'includes/BagOStuff.php',
		'Block' => 'includes/Block.php',
		'CacheManager' => 'includes/CacheManager.php',
		'CategoryPage' => 'includes/CategoryPage.php',
		'Categoryfinder' => 'includes/Categoryfinder.php',
		'RCCacheEntry' => 'includes/ChangesList.php',
		'ChangesList' => 'includes/ChangesList.php',
		'OldChangesList' => 'includes/ChangesList.php',
		'EnhancedChangesList' => 'includes/ChangesList.php',
		'CoreParserFunctions' => 'includes/CoreParserFunctions.php',
		'DBObject' => 'includes/Database.php',
		'Database' => 'includes/Database.php',
		'DatabaseMysql' => 'includes/Database.php',
		'ResultWrapper' => 'includes/Database.php',
		'OracleBlob' => 'includes/DatabaseOracle.php',
		'DatabaseOracle' => 'includes/DatabaseOracle.php',
		'DatabasePostgres' => 'includes/DatabasePostgres.php',
		'DateFormatter' => 'includes/DateFormatter.php',
		'DifferenceEngine' => 'includes/DifferenceEngine.php',
		'_DiffOp' => 'includes/DifferenceEngine.php',
		'_DiffOp_Copy' => 'includes/DifferenceEngine.php',
		'_DiffOp_Delete' => 'includes/DifferenceEngine.php',
		'_DiffOp_Add' => 'includes/DifferenceEngine.php',
		'_DiffOp_Change' => 'includes/DifferenceEngine.php',
		'_DiffEngine' => 'includes/DifferenceEngine.php',
		'Diff' => 'includes/DifferenceEngine.php',
		'MappedDiff' => 'includes/DifferenceEngine.php',
		'DiffFormatter' => 'includes/DifferenceEngine.php',
		'DjVuImage' => 'includes/DjVuImage.php',
		'_HWLDF_WordAccumulator' => 'includes/DifferenceEngine.php',
		'WordLevelDiff' => 'includes/DifferenceEngine.php',
		'TableDiffFormatter' => 'includes/DifferenceEngine.php',
		'EditPage' => 'includes/EditPage.php',
		'MWException' => 'includes/Exception.php',
		'Exif' => 'includes/Exif.php',
		'FormatExif' => 'includes/Exif.php',
		'WikiExporter' => 'includes/Export.php',
		'XmlDumpWriter' => 'includes/Export.php',
		'DumpOutput' => 'includes/Export.php',
		'DumpFileOutput' => 'includes/Export.php',
		'DumpPipeOutput' => 'includes/Export.php',
		'DumpGZipOutput' => 'includes/Export.php',
		'DumpBZip2Output' => 'includes/Export.php',
		'Dump7ZipOutput' => 'includes/Export.php',
		'DumpFilter' => 'includes/Export.php',
		'DumpNotalkFilter' => 'includes/Export.php',
		'DumpNamespaceFilter' => 'includes/Export.php',
		'DumpLatestFilter' => 'includes/Export.php',
		'DumpMultiWriter' => 'includes/Export.php',
		'ExternalEdit' => 'includes/ExternalEdit.php',
		'ExternalStore' => 'includes/ExternalStore.php',
		'ExternalStoreDB' => 'includes/ExternalStoreDB.php',
		'ExternalStoreHttp' => 'includes/ExternalStoreHttp.php',
		'FakeTitle' => 'includes/FakeTitle.php',
		'FeedItem' => 'includes/Feed.php',
		'ChannelFeed' => 'includes/Feed.php',
		'RSSFeed' => 'includes/Feed.php',
		'AtomFeed' => 'includes/Feed.php',
		'FileStore' => 'includes/FileStore.php',
		'FSException' => 'includes/FileStore.php',
		'FSTransaction' => 'includes/FileStore.php',
		'ReplacerCallback' => 'includes/GlobalFunctions.php',
		'HTMLForm' => 'includes/HTMLForm.php',
		'HistoryBlob' => 'includes/HistoryBlob.php',
		'ConcatenatedGzipHistoryBlob' => 'includes/HistoryBlob.php',
		'HistoryBlobStub' => 'includes/HistoryBlob.php',
		'HistoryBlobCurStub' => 'includes/HistoryBlob.php',
		'HTMLCacheUpdate' => 'includes/HTMLCacheUpdate.php',
		'HTMLCacheUpdateJob' => 'includes/HTMLCacheUpdate.php',
		'Http' => 'includes/HttpFunctions.php',
		'Image' => 'includes/Image.php',
		'IP' => 'includes/IP.php',
		'ThumbnailImage' => 'includes/Image.php',
		'ImageGallery' => 'includes/ImageGallery.php',
		'ImagePage' => 'includes/ImagePage.php',
		'ImageHistoryList' => 'includes/ImagePage.php',
		'ImageRemote' => 'includes/ImageRemote.php',
		'Job' => 'includes/JobQueue.php',
		'Licenses' => 'includes/Licenses.php',
		'License' => 'includes/Licenses.php',
		'LinkBatch' => 'includes/LinkBatch.php',
		'LinkCache' => 'includes/LinkCache.php',
		'LinkFilter' => 'includes/LinkFilter.php',
		'Linker' => 'includes/Linker.php',
		'LinksUpdate' => 'includes/LinksUpdate.php',
		'LoadBalancer' => 'includes/LoadBalancer.php',
		'LogPage' => 'includes/LogPage.php',
		'MacBinary' => 'includes/MacBinary.php',
		'MagicWord' => 'includes/MagicWord.php',
		'MathRenderer' => 'includes/Math.php',
		'MessageCache' => 'includes/MessageCache.php',
		'MimeMagic' => 'includes/MimeMagic.php',
		'Namespace' => 'includes/Namespace.php',
		'FakeMemCachedClient' => 'includes/ObjectCache.php',
		'OutputPage' => 'includes/OutputPage.php',
		'PageHistory' => 'includes/PageHistory.php',
		'IndexPager' => 'includes/Pager.php',
		'ReverseChronologicalPager' => 'includes/Pager.php',
		'TablePager' => 'includes/Pager.php',
		'Parser' => 'includes/Parser.php',
		'ParserOutput' => 'includes/Parser.php',
		'ParserOptions' => 'includes/Parser.php',
		'ParserCache' => 'includes/ParserCache.php',
		'ProfilerSimple' => 'includes/ProfilerSimple.php',
		'ProfilerSimpleUDP' => 'includes/ProfilerSimpleUDP.php',
		'Profiler' => 'includes/Profiler.php',
		'ProxyTools' => 'includes/ProxyTools.php',
		'ProtectionForm' => 'includes/ProtectionForm.php',
		'QueryPage' => 'includes/QueryPage.php',
		'PageQueryPage' => 'includes/QueryPage.php',
		'RawPage' => 'includes/RawPage.php',
		'RecentChange' => 'includes/RecentChange.php',
		'Revision' => 'includes/Revision.php',
		'Sanitizer' => 'includes/Sanitizer.php',
		'SearchEngine' => 'includes/SearchEngine.php',
		'SearchResultSet' => 'includes/SearchEngine.php',
		'SearchResult' => 'includes/SearchEngine.php',
		'SearchEngineDummy' => 'includes/SearchEngine.php',
		'SearchMySQL' => 'includes/SearchMySQL.php',
		'MySQLSearchResultSet' => 'includes/SearchMySQL.php',
		'SearchMySQL4' => 'includes/SearchMySQL4.php',
		'SearchPostgres' => 'includes/SearchPostgres.php',
		'SearchUpdate' => 'includes/SearchUpdate.php',
		'SearchUpdateMyISAM' => 'includes/SearchUpdate.php',
		'SiteConfiguration' => 'includes/SiteConfiguration.php',
		'SiteStatsUpdate' => 'includes/SiteStatsUpdate.php',
		'Skin' => 'includes/Skin.php',
		'MediaWiki_I18N' => 'includes/SkinTemplate.php',
		'SkinTemplate' => 'includes/SkinTemplate.php',
		'QuickTemplate' => 'includes/SkinTemplate.php',
		'SpecialAllpages' => 'includes/SpecialAllpages.php',
		'AncientPagesPage' => 'includes/SpecialAncientpages.php',
		'IPBlockForm' => 'includes/SpecialBlockip.php',
		'BookSourceList' => 'includes/SpecialBooksources.php',
		'BrokenRedirectsPage' => 'includes/SpecialBrokenRedirects.php',
		'CategoriesPage' => 'includes/SpecialCategories.php',
		'EmailConfirmation' => 'includes/SpecialConfirmemail.php',
		'ContribsFinder' => 'includes/SpecialContributions.php',
		'DeadendPagesPage' => 'includes/SpecialDeadendpages.php',
		'DisambiguationsPage' => 'includes/SpecialDisambiguations.php',
		'DoubleRedirectsPage' => 'includes/SpecialDoubleRedirects.php',
		'EmailUserForm' => 'includes/SpecialEmailuser.php',
		'WikiRevision' => 'includes/SpecialImport.php',
		'WikiImporter' => 'includes/SpecialImport.php',
		'ImportStringSource' => 'includes/SpecialImport.php',
		'ImportStreamSource' => 'includes/SpecialImport.php',
		'IPUnblockForm' => 'includes/SpecialIpblocklist.php',
		'ListredirectsPage' => 'includes/SpecialListredirects.php',
		'ListUsersPage' => 'includes/SpecialListusers.php',
		'DBLockForm' => 'includes/SpecialLockdb.php',
		'LogReader' => 'includes/SpecialLog.php',
		'LogViewer' => 'includes/SpecialLog.php',
		'LonelyPagesPage' => 'includes/SpecialLonelypages.php',
		'LongPagesPage' => 'includes/SpecialLongpages.php',
		'MIMEsearchPage' => 'includes/SpecialMIMEsearch.php',
		'MostcategoriesPage' => 'includes/SpecialMostcategories.php',
		'MostimagesPage' => 'includes/SpecialMostimages.php',
		'MostlinkedPage' => 'includes/SpecialMostlinked.php',
		'MostlinkedCategoriesPage' => 'includes/SpecialMostlinkedcategories.php',
		'MostrevisionsPage' => 'includes/SpecialMostrevisions.php',
		'MovePageForm' => 'includes/SpecialMovepage.php',
		'NewPagesPage' => 'includes/SpecialNewpages.php',
		'SpecialPage' => 'includes/SpecialPage.php',
		'UnlistedSpecialPage' => 'includes/SpecialPage.php',
		'IncludableSpecialPage' => 'includes/SpecialPage.php',
		'PopularPagesPage' => 'includes/SpecialPopularpages.php',
		'PreferencesForm' => 'includes/SpecialPreferences.php',
		'SpecialPrefixindex' => 'includes/SpecialPrefixindex.php',
		'RevisionDeleteForm' => 'includes/SpecialRevisiondelete.php',
		'RevisionDeleter' => 'includes/SpecialRevisiondelete.php',
		'SpecialSearch' => 'includes/SpecialSearch.php',
		'ShortPagesPage' => 'includes/SpecialShortpages.php',
		'UncategorizedCategoriesPage' => 'includes/SpecialUncategorizedcategories.php',
		'UncategorizedPagesPage' => 'includes/SpecialUncategorizedpages.php',
		'PageArchive' => 'includes/SpecialUndelete.php',
		'UndeleteForm' => 'includes/SpecialUndelete.php',
		'DBUnlockForm' => 'includes/SpecialUnlockdb.php',
		'UnusedCategoriesPage' => 'includes/SpecialUnusedcategories.php',
		'UnusedimagesPage' => 'includes/SpecialUnusedimages.php',
		'UnusedtemplatesPage' => 'includes/SpecialUnusedtemplates.php',
		'UnwatchedpagesPage' => 'includes/SpecialUnwatchedpages.php',
		'UploadForm' => 'includes/SpecialUpload.php',
		'UploadFormMogile' => 'includes/SpecialUploadMogile.php',
		'LoginForm' => 'includes/SpecialUserlogin.php',
		'UserrightsForm' => 'includes/SpecialUserrights.php',
		'SpecialVersion' => 'includes/SpecialVersion.php',
		'WantedCategoriesPage' => 'includes/SpecialWantedcategories.php',
		'WantedPagesPage' => 'includes/SpecialWantedpages.php',
		'WhatLinksHerePage' => 'includes/SpecialWhatlinkshere.php',
		'SquidUpdate' => 'includes/SquidUpdate.php',
		'Title' => 'includes/Title.php',
		'User' => 'includes/User.php',
		'MailAddress' => 'includes/UserMailer.php',
		'EmailNotification' => 'includes/UserMailer.php',
		'WatchedItem' => 'includes/WatchedItem.php',
		'WebRequest' => 'includes/WebRequest.php',
		'WebResponse' => 'includes/WebResponse.php',
		'FauxRequest' => 'includes/WebRequest.php',
		'MediaWiki' => 'includes/Wiki.php',
		'WikiError' => 'includes/WikiError.php',
		'WikiErrorMsg' => 'includes/WikiError.php',
		'WikiXmlError' => 'includes/WikiError.php',
		'Xml' => 'includes/Xml.php',
		'ZhClient' => 'includes/ZhClient.php',
		'memcached' => 'includes/memcached-client.php',
		'UtfNormal' => 'includes/normal/UtfNormal.php',
		'UsercreateTemplate' => 'includes/templates/Userlogin.php',
		'UserloginTemplate' => 'includes/templates/Userlogin.php',
		'Language' => 'languages/Language.php',
	);
	if ( isset( $localClasses[$className] ) ) {
		$filename = $localClasses[$className];
	} elseif ( isset( $wgAutoloadClasses[$className] ) ) {
		$filename = $wgAutoloadClasses[$className];
	} else {
		# Try a different capitalisation
		# The case can sometimes be wrong when unserializing PHP 4 objects
		$filename = false;
		$lowerClass = strtolower( $className );
		foreach ( $localClasses as $class2 => $file2 ) {
			if ( strtolower( $class2 ) == $lowerClass ) {
				$filename = $file2;
			}
		}
		if ( !$filename ) {
			# Give up
			return;
		}
	}

	# Make an absolute path, this improves performance by avoiding some stat calls
	if ( substr( $filename, 0, 1 ) != '/' && substr( $filename, 1, 1 ) != ':' ) {
		global $IP;
		$filename = "$IP/$filename";
	}
	require( $filename );
}

function wfLoadAllExtensions() {
	global $wgAutoloadClasses;

	# It is crucial that SpecialPage.php is included before any special page 
	# extensions are loaded. Otherwise the parent class will not be available
	# when APC loads the early-bound extension class. Normally this is 
	# guaranteed by entering special pages via SpecialPage members such as 
	# executePath(), but here we have to take a more explicit measure.
	
	require_once( 'SpecialPage.php' );
	
	foreach( $wgAutoloadClasses as $class => $file ) {
		if ( ! class_exists( $class ) ) {
			require( $file );
		}
	}
}

?>

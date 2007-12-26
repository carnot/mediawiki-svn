<?php

/*
 * Created on Jun 30, 2007
 * API for MediaWiki 1.8+
 *
 * Copyright (C) 2007 Roan Kattouw <Firstname>.<Lastname>@home.nl
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

if (!defined('MEDIAWIKI')) {
	// Eclipse helper - will be ignored in production
	require_once ("ApiBase.php");
}


/**
 * @addtogroup API
 */
class ApiDelete extends ApiBase {

	public function __construct($main, $action) {
		parent :: __construct($main, $action);
	}

	/**
	 * We have our own delete() function, since Article.php's implementation is split in two phases
	 * @param Article $article - Article object to work on
	 * @param string $token - Delete token (same as edit token)
	 * @param string $reason - Reason for the deletion. Autogenerated if NULL
	 * @return DELETE_SUCCESS on success, DELETE_* on failure
	 */

	 const DELETE_SUCCESS = 0;
	 const DELETE_PERM = 1;
	 const DELETE_BLOCKED = 2;
	 const DELETE_READONLY = 3;
	 const DELETE_BADTOKEN = 4;
	 const DELETE_BADARTICLE = 5;

	public static function delete(&$article, $token, &$reason = NULL)
	{
		global $wgUser;

		// Check permissions first
		if(!$article->mTitle->userCan('delete'))
			return self::DELETE_PERM;
		if($wgUser->isBlocked())
			return self::DELETE_BLOCKED;
		if(wfReadOnly())
			return self::DELETE_READONLY;

		// Check token
		if(!$wgUser->matchEditToken($token))
			return self::DELETE_BADTOKEN;

		// Auto-generate a summary, if necessary
		if(is_null($reason))
		{
			$reason = $article->generateReason($hasHistory);
			if($reason === false)
				return self::DELETE_BADARTICLE;
		}

		// Luckily, Article.php provides a reusable delete function that does the hard work for us
		if($article->doDeleteArticle($reason))
			return self::DELETE_SUCCESS;
		return self::DELETE_BADARTICLE;
	}

	public function execute() {
		global $wgUser;
		$this->getMain()->requestWriteMode();
		$params = $this->extractRequestParams();
		
		$titleObj = NULL;
		if(!isset($params['title']))
			$this->dieUsage('The title parameter must be set', 'notitle');
		if(!isset($params['token']))
			$this->dieUsage('The token parameter must be set', 'notoken');

		// delete() also checks for these, but we wanna save some work
		if(!$wgUser->isAllowed('delete'))
			$this->dieUsage('You don\'t have permission to delete pages', 'permissiondenied');
		if($wgUser->isBlocked())
			$this->dieUsage('You have been blocked from editing', 'blocked');
		if(wfReadOnly())
			$this->dieUsage('The wiki is in read-only mode', 'readonly');

		$titleObj = Title::newFromText($params['title']);
		if(!$titleObj)
			$this->dieUsage("Bad title ``{$params['title']}''", 'invalidtitle');
		if(!$titleObj->exists())
			$this->dieUsage("``{$params['title']}'' doesn't exist", 'missingtitle');

		$articleObj = new Article($titleObj);
		$reason = (isset($params['reason']) ? $params['reason'] : NULL);
		$dbw = wfGetDb(DB_MASTER);
		$dbw->begin();
		$retval = self::delete(&$articleObj, $params['token'], &$reason);

		switch($retval)
		{
			case self::DELETE_SUCCESS:
				break; // We'll deal with that later
			case self::DELETE_PERM:  // If we get PERM, BLOCKED or READONLY that's weird, but it's possible
				$this->dieUsage('You don\'t have permission to delete', 'permissiondenied');
			case self::DELETE_BLOCKED:
				$this->dieUsage('You have been blocked from editing', 'blocked');
			case self::DELETE_READONLY:
				$this->dieUsage('The wiki is in read-only mode', 'readonly');
			case self::DELETE_BADTOKEN:
				$this->dieUsage('Invalid token', 'badtoken');
			case self::DELETE_BADARTICLE:
				$this->dieUsage("The article ``{$params['title']}'' doesn't exist or has already been deleted", 'missingtitle');
			default:
				// delete() has apparently invented a new error, which is extremely weird
				$this->dieDebug(__METHOD__, "delete() returned an unknown error ($retval)");
		}
		// $retval has to be self::DELETE_SUCCESS if we get here
		$dbw->commit();
		$r = array('title' => $titleObj->getPrefixedText(), 'reason' => $reason);
		$this->getResult()->addValue(null, $this->getModuleName(), $r);
	}
	
	protected function getAllowedParams() {
		return array (
			'title' => null,
			'token' => null,
			'reason' => null,
		);
	}

	protected function getParamDescription() {
		return array (
			'title' => 'Title of the page you want to delete.',
			'token' => 'A delete token previously retrieved through prop=info',
			'reason' => 'Reason for the deletion. If not set, an automatically generated reason will be used.'
		);
	}

	protected function getDescription() {
		return array(
			'Deletes a page. You need to be logged in as a sysop to use this function, see also action=login.'
		);
	}

	protected function getExamples() {
		return array (
			'api.php?action=delete&title=Main%20Page&token=123ABC',
			'api.php?action=delete&title=Main%20Page&token=123ABC&reason=Preparing%20for%20move'
		);
	}

	public function getVersion() {
		return __CLASS__ . ': $Id: ApiDelete.php 22289 2007-05-20 23:31:44Z yurik $';
	}
}

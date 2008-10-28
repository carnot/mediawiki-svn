<?php
/**
 * Extension:RecordAdmin - MediaWiki extension
 *{{Category:Extensions|RecordAdmin}}{{php}}{{Category:Extensions created with Template:SpecialPage}}
 * @package MediaWiki
 * @subpackage Extensions
 * @author Aran Dunkley [http://www.organicdesign.co.nz/nad User:Nad]
 * @licence GNU General Public Licence 2.0 or later
 */

if (!defined('MEDIAWIKI')) die('Not an entry point.');

define('RECORDADMIN_VERSION','0.1.4, 2008-10-29');

$wgRecordAdminCategory      = 'Records'; # Category which contains the templates used as records and having corresponding forms
$wgRecordAdminUseNamespaces = false;     # Whether record articles should be in a namespace of the same name as their type

$wgExtensionFunctions[] = 'wfSetupRecordAdmin';

$wgExtensionCredits['specialpage'][] = array(
	'name'        => 'Record administration',
	'author'      => '[http://www.organicdesign.co.nz/nad User:Nad]',
	'description' => 'A special page for finding and editing record articles using a form',
	'url'         => 'http://www.organicdesign.co.nz/Extension:SpecialExample',
	'version'     => RECORDADMIN_VERSION
);

require_once "$IP/includes/SpecialPage.php";

/**
 * Define a new class based on the SpecialPage class
 */
class SpecialRecordAdmin extends SpecialPage {

	var $form = '';
	var $types = array();
	var $guid = '';

	function __construct() {
		
		# Name to use for creating a new record either via RecordAdmin or a public form
		# todo: should add a hook here for custom default-naming
		$this->guid = strftime('%Y%m%d', time()).'-'.substr(strtoupper(uniqid()), -5);
		
		SpecialPage::SpecialPage(
			'RecordAdmin', # name as seen in links etc
			'sysop',       # user rights required
			true,          # listed in special:specialpages
			false,         # function called by execute() - defaults to wfSpecial{$name}
			false,         # file included by execute() - defaults to Special{$name}.php, only used if no function
			false          # includable
		);
	}

	/**
	 * Override SpecialPage::execute()
	 */
	function execute($param) {
		global $wgOut, $wgRequest, $wgRecordAdminCategory, $wgRecordAdminUseNamespaces;
		$this->setHeaders();
		$type     = $wgRequest->getText('wpType') or $type = $param;
		$record   = $wgRequest->getText('wpRecord');
		$invert   = $wgRequest->getText('wpInvert');
		$title    = Title::makeTitle(NS_SPECIAL, 'RecordAdmin');
		$wpTitle  = trim($wgRequest->getText('wpTitle'));

		if ($type && $wgRecordAdminUseNamespaces) {
			if ($wpTitle && !ereg("^$type:.+$", $wpTitle)) $wpTitle = "$type:$wpTitle";
		}

		$wgOut->addHTML("<div class='center'><a href='".$title->getLocalURL()."/$type'>New $type search</a> | "
			. "<a href='".$title->getLocalURL()."'>Select another record type</a></div><br>\n"
		);
			
		# Get posted form values if any
		$posted = array();
		foreach ($_POST as $k => $v) if (ereg('^ra_(.+)$', $k, $m)) $posted[$m[1]] = $v;

		# Read in and prepare the form for this record type if one has been selected
		if ($type) $this->preProcessForm($type);

		# Extract the input names and types used in the form
		$this->examineForm();

		# Clear any default values
		$this->populateForm(array());

		# If no type selected, render select list of record types from Category:Records
		if (empty($type)) {
			$wgOut->addWikiText("== Select the type of record to search for ==\n");
			
			# Get titles in Category:Records and build option list
			$options = '';
			$dbr  = &wfGetDB(DB_SLAVE);
			$cl   = $dbr->tableName('categorylinks');
			$cat  = $dbr->addQuotes($wgRecordAdminCategory);
			$res  = $dbr->select($cl, 'cl_from', "cl_to = $cat", __METHOD__, array('ORDER BY' => 'cl_sortkey'));
			while ($row = $dbr->fetchRow($res)) $options .= '<option>'.Title::newFromID($row[0])->getText().'</option>';

			# Render type-selecting form
			$wgOut->addHTML(wfElement('form', array('action' => $title->getLocalURL('action=submit'), 'method' => 'post'), null)
				. "<select name='wpType'>$options</select> "
				. wfElement('input', array('type' => 'submit', 'value' => 'Submit'))
				. '</form>'
			);
		}
				
		# Record type known, but no record selected, render form for searching or creating
		elseif (empty($record)) {
			$wgOut->addWikiText("== Find or Create a \"$type\" record ==\n");
			
			# Process Create submission
			if (count($posted) && $wgRequest->getText('wpCreate')) {
				if (empty($wpTitle)) {
					$wpTitle = $this->guid;
					if ($wgRecordAdminUseNamespaces) $wpTitle = "$type:$wpTitle";
				}
				$t = Title::newFromText($wpTitle);
				if (is_object($t)) {
					if ($t->exists()) $wgOut->addHTML("<div class='errorbox'>Sorry, \"$wpTitle\" already exists!</div>\n");
					else {

						# Attempt to create the article
						$article = new Article($t);
						$summary = "[[Special:RecordAdmin/$type|RecordAdmin]]: New $type created";
						$text = '';
						foreach ($posted as $k => $v) if ($v) {
							if ($this->types[$k] == 'bool') $v = 'yes';
							$text .= "| $k = $v\n";
						}
						$text = $text ? "{{"."$type\n$text}}" : "{{"."$type}}";
						$success = $article->doEdit($text, $summary, EDIT_NEW);
						
						# Report success or error
						if ($success) $wgOut->addHTML("<div class='successbox'>\"$wpTitle\" created successfully</div>\n");
						else $wgOut->addHTML("<div class='errorbox'>An error occurred while attempting to create the $type!</div>\n");
					}
				} else $wgOut->addHTML("<div class='errorbox'>Bad title!</div>\n");
				$wgOut->addHTML("<br><br><br><br>\n");
			}
				
			# Populate the search form with any posted values
			$this->populateForm($posted);
			
			# Render the form
			$wgOut->addHTML(
				wfElement('form', array('class' => 'recordadmin', 'action' => $title->getLocalURL('action=submit'), 'method' => 'post'), null)
				.'<b>Record ID:</b> '.wfElement('input', array('name' => 'wpTitle', 'size' => 30, 'value' => $wpTitle))
				.'&nbsp;&nbsp;&nbsp;'.wfElement('input', array('name' => 'wpInvert', 'type' => 'checkbox')).' Invert selection'
				."\n<br><br><hr><br>\n{$this->form}"
				.wfElement('input', array('type' => 'hidden', 'name' => 'wpType', 'value' => $type))
				.'<br><hr><br><table width="100%"><tr>'
				.'<td>'.wfElement('input', array('type' => 'submit', 'name' => 'wpFind', 'value' => "Search")).'</td>'
				.'<td>'.wfElement('input', array('type' => 'submit', 'name' => 'wpCreate', 'value' => "Create")).'</td>'
				.'<td width="100%" align="left">'.wfElement('input', array('type' => 'reset', 'value' => "Reset")).'</td>'
				.'</tr></table></form>'
			);
			
			# Process Find submission
			if (count($posted) && $wgRequest->getText('wpFind')) {
				$wgOut->addWikiText("<br>\n== Search results ==\n");

				# Select records which use the template and exhibit a matching title and other fields
				$records = array();
				$dbr  = &wfGetDB(DB_SLAVE);
				$tbl  = $dbr->tableName('templatelinks');
				$ty   = $dbr->addQuotes($type);
				$res  = $dbr->select($tbl, 'tl_from', "tl_namespace = 10 AND tl_title = $ty", __METHOD__);
				while ($row = $dbr->fetchRow($res)) {
					$t = Title::newFromID($row[0]);
					if (empty($wpTitle) || eregi($wpTitle, $t->getPrefixedText())) {
						$a = new Article($t);
						$text = $a->getContent();
						$match = true;
						$r = array($t);
						foreach (array_keys($this->types) as $k) {
							$v = isset($posted[$k]) ? ($this->types[$k] == 'bool' ? 'yes' : $posted[$k]) : '';
							$i = preg_match("|\s*\|\s*$k\s*=\s*(.*?)\s*(?=[\|\}])|si", $text, $m);
							if ($v && !($i && eregi($v, $m[1]))) $match = false;
							$r[$k] = isset($m[1]) ? $m[1] : '';
						}
						if ($invert) $match = !$match;
						if ($match) $records[$t->getPrefixedText()] = $r;
					}
				}
				$dbr->freeResult($res);

				# Render search results
				if (count($records)) {
					
					# Pass1, scan the records to find the create date of each and sort by that
					$sorted = array();
					foreach ($records as $k => $r) {
						$t = $r[0];
						$id = $t->getArticleID();
						$r[1] = $k;
						$tbl = $dbr->tableName('revision');
						$row = $dbr->selectRow(
							$tbl,
							'rev_timestamp',
							"rev_page = $id",
							__METHOD__,
							array('ORDER BY' => 'rev_timestamp')
						);
						$sorted[$row->rev_timestamp] = $r;
					}
					krsort($sorted);
					
					$table = "<table class='sortable recordadmin $type-record'>\n<tr>
					          <th class='col1'>$type<br></th><th class='col2'>Created<br></th>";
					foreach (array_keys($this->types) as $k) $table .= "<th class='col$k'>$k<br></th>";
					$table .= "</tr>\n";
					$stripe = '';
					foreach ($sorted as $ts => $r) {
						$ts = preg_replace('|^..(..)(..)(..)(..)(..)..$|', '$3/$2/$1&nbsp;$4:$5', $ts);
						$t = $r[0];
						$k = $r[1];
						$stripe = $stripe ? '' : ' class="stripe"';
						$table .= "<tr$stripe><td class='col1'>(<a href='".$t->getLocalURL()."'>view</a>)";
						$table .= "(<a href='".$title->getLocalURL("wpType=$type&wpRecord=$k")."'>edit</a>)</td>\n";
						$table .= "<td class='col2'>$ts</td>\n";
						$i = 0;
						foreach (array_keys($this->types) as $k) {
							$v = isset($r[$k]) ? $r[$k] : '&nbsp;';
							$table .= "<td class='col$k'>$v</td>";
						}
						$table .= "</tr>\n";
					}
					$table .= "</table>\n";
					$wgOut->addHTML($table);
				} else $wgOut->addWikiText("''No matching records found!''\n");
			}	
		}
		
		# A specific record has been selected, render form for updating
		else {
			$wgOut->addWikiText("== Editing \"$record\" ==\n");
			$article = new Article(Title::newFromText($record));
			$text = $article->fetchContent();

			# Update article if form posted
			if (count($posted)) {
				
				# Get the location and length of the record braces to replace
				foreach ($this->examineBraces($text) as $brace) if ($brace['NAME'] == $type) $braces = $brace;

				# Attempt to save the article
				$summary = "[[Special:RecordAdmin/$type|RecordAdmin]]: $type properties updated";
				$replace = '';
				foreach ($posted as $k => $v) if ($v) {
					if ($this->types[$k] == 'bool') $v = 'yes';
					$replace .= "| $k = $v\n";
				}
				$replace = $replace ? "{{"."$type\n$replace}}" : "{{"."$type}}";
				$text = substr_replace($text, $replace, $braces['OFFSET'], $braces['LENGTH']);				
				$success = $article->doEdit($text, $summary, EDIT_UPDATE);
				
				# Report success or error
				if ($success) $wgOut->addHTML("<div class='successbox'>$type updated successfully</div>\n");
				else $wgOut->addHTML("<div class='errorbox'>An error occurred during update!</div>\n");
				$wgOut->addHTML("<br><br><br><br>\n");
			}
			
			# Populate the form with the current values in the article
			foreach ($this->examineBraces($text) as $brace) if ($brace['NAME'] == $type) $braces = $brace;
			$this->populateForm(substr($text, $braces['OFFSET'], $braces['LENGTH']));
			
			# Render the form
			$wgOut->addHTML(wfElement('form', array('class' => 'recordadmin', 'action' => $title->getLocalURL('action=submit'), 'method' => 'post'), null));
			$wgOut->addHTML($this->form);
			$wgOut->addHTML(wfElement('input', array('type' => 'hidden', 'name' => 'wpType', 'value' => $type)));
			$wgOut->addHTML(wfElement('input', array('type' => 'hidden', 'name' => 'wpRecord', 'value' => $record)));
			$wgOut->addHTML('<br><hr><br><table width="100%"><tr>'
				.'<td>'.wfElement('input', array('type' => 'submit', 'value' => "Save")).'</td>'
				.'<td width="100%" align="left">'.wfElement('input', array('type' => 'reset', 'value' => "Reset")).'</td>'
				.'</tr></table></form>'
			);
		}
	}

	/**
	 * Read in and prepare the form (for use as a search filter) for passed record type
	 * - we're using the record's own form as a filter for searching for records
	 * - extract only the content from between the form tags and remove any submit inputs
	 */
	function preProcessForm($type) {
		$title = Title::newFromText($type, NS_FORM);
		if ($title->exists()) {
			$form = new Article($title);
			$form = $form->getContent();
			$form = preg_replace('#<input.+?type=[\'"]?submit["\']?.+?/(input| *)>#', '', $form);    # remove submits
			$form = preg_replace('#^.+?<form.+?>#s', '', $form);                                     # remove up to and including form open
			$form = preg_replace('#</form>.+?$#s', '', $form);                                       # remove form close and everything after
			$form = preg_replace('#name\s*=\s*([\'"])(.*?)\\1#s', 'name="ra_$2"', $form);            # prefix input names with ra_
			$form = preg_replace('#(<select.+?>)\s*(?!<option/>)#s', '$1<option selected/>', $form); # ensure all select lists have default blank
		}
		
		# Create a red link to the form if it doesn't exist
		else {
			$form = "<b>There is no form associated with \"$type\" records!</b>"
			       ."<br><br>click <a href=\"".$title->getLocalURL('action=edit')."\">here</a> to create one</div>";
		}
		$this->form = $form;
	}


	/**
	 * Populates the form values from the passed values
	 * - $form is HTML text
	 * - $values may be a hash or wikitext template syntax
	 */
	function populateForm($values) {
		
		# If values are wikitext, convert to hash
		if (!is_array($values)) {
			$text = $values;
			$values = array();
			preg_match_all("|\|\s*(.+?)\s*=\s*(.*?)\s*(?=[\|\}])|s", $text, $m);
			foreach ($m[1] as $i => $k) $values[$k] = $m[2][$i];
		}

		# Add the values into the form's HTML depending on their type
		foreach($this->types as $k => $type) {

			# Get this input element's html text and position and length
			preg_match("|<([a-zA-Z]+)[^<]+?name=\"ra_$k\".*?>(.*?</\\1>)?|s", $this->form, $m, PREG_OFFSET_CAPTURE);
			list($html, $pos) = $m[0];
			$len = strlen($html);

			# Modify the element according to its type
			# - clears default value, then adds new value
			$v = isset($values[$k]) ? $values[$k] : '';
			switch ($type) {
				case 'text':
					$html = preg_replace("|value\s*=\s*\".*?\"|", "", $html);
					if ($v) $html = preg_replace("|(/?>)$|", " value=\"$v\" $1", $html);
				break;
				case 'bool':
					$html = preg_replace("|checked|", "", $html);
					if ($v) $html = preg_replace("|(/?>)$|", " checked $1", $html);
				break;
				case 'list':
					$html = preg_replace("|(<option[^<>]*) selected|", "$1", $html);
					if ($v) $html = preg_replace("|(?<=<option)(?=>$v</option>)|s", " selected", $html);
				break;
				case 'blob':
					$html = preg_replace("|>.*?(?=</textarea>)|s", ">$v", $html);
				break;
			}
			
			# Replace the element in the form with the modified html
			$this->form = substr_replace($this->form, $html, $pos, $len);
		}
	}

	/**
	 * Returns an array of types used by the passed HTML text form
	 * - supported types, text, select, checkbox, textarea
	 */
	function examineForm() {
		$this->types = array();
		preg_match_all("|<([a-zA-Z]+)[^<]+?name=\"ra_(.+?)\".*?>|", $this->form, $m);
		foreach ($m[2] as $i => $k) {
			$tag = $m[1][$i];
			$type = preg_match("|type\s*=\s*\"(.+?)\"|", $m[0][$i], $n) ? $n[1] : '';
			switch ($tag) {
				case 'input':
					switch ($type) {
						case 'checkbox':
							$this->types[$k] = 'bool';
						break;
						default:
							$this->types[$k] = 'text';
						break;
					}
				break;
				case 'select':
					$this->types[$k] = 'list';
				break;
				case 'textarea':
					$this->types[$k] = 'blob';
				break;
			}
		}
	}

	/**
	 * Return array of braces used and the name, position, length and depth
	 * See http://www.organicdesign.co.nz/MediaWiki_code_snippets
	 */
	function examineBraces(&$content) {
		$braces = array();
		$depths = array();
		$depth = 1;
		$index = 0;
		while (preg_match('/\\{\\{\\s*([#a-z0-9_]*)|\\}\\}/is', $content, $match, PREG_OFFSET_CAPTURE, $index)) {
			$index = $match[0][1]+2;
			if ($match[0][0] == '}}') {
				$brace =& $braces[$depths[$depth-1]];
				$brace['LENGTH'] = $match[0][1]-$brace['OFFSET']+2;
				$brace['DEPTH']  = $depth--;
			}
			else {
				$depths[$depth++] = count($braces);
				$braces[] = array(
					'NAME'   => $match[1][0],
					'OFFSET' => $match[0][1]
				);
			}
		}
		return $braces;
	}

	/**
	 * A callback for processing public forms
	 */
	function createRecord() {
		global $wgRequest, $wgRecordAdminUseNamespaces;
		$type = $wgRequest->getText('wpType');
		$title = $wgRequest->getText('wpTitle');

		# Get types in this kind of record from form
		$this->preProcessForm($type);
		$this->examineForm();
		
		# Use guid if no title specified
		if (empty($title)) {
			$title = $this->guid;
			if ($wgRecordAdminUseNamespaces) $title = "$type:$title";
		}

		# Attempt to create the article
		$title = Title::newFromText($title);
		if (is_object($title) && !$title->exists()) {
			$article = new Article($title);
			$summary = "New $type created from public form";
			$text = '';
			foreach ($_POST as $k => $v) if ($v && isset($this->types[$k])) {
				if ($this->types[$k] == 'bool') $v = 'yes';
				$text .= "| $k = $v\n";
			}
			$text = $text ? "{{"."$type\n$text}}" : "{{"."$type}}";
			$success = $article->doEdit($text, $summary, EDIT_NEW);		
		}
	}

	# If a record was created by a public form, make last 5 digits of ID available via a tag
	function expandTag($text, $argv, &$parser) {
		$parser->mOutput->mCacheTime = -1;
		return $this->guid ? substr($this->guid, -5) : '';
	}

}

/**
 * Called from $wgExtensionFunctions array when initialising extensions
 */
function wfSetupRecordAdmin() {
	global $wgSpecialRecordAdmin, $wgParser, $wgLanguageCode, $wgMessageCache, $wgRequest;

	# Add the messages used by the specialpage
	if ($wgLanguageCode == 'en') {
		$wgMessageCache->addMessages(array(
			'recordadmin' => 'Record administration'
			));
	}

	# Make a global singleton so methods are accessible as callbacks etc
	$wgSpecialRecordAdmin = new SpecialRecordAdmin();

	# Make recordID's of articles created with public forms available via recordid tag
	$wgParser->setHook('recordid', array($wgSpecialRecordAdmin, 'expandTag'));

	# Check if posting a public creation form
	$title = Title::newFromText($wgRequest->getText('title'));
	if (is_object($title) && $title->getNamespace() != NS_SPECIAL && $wgRequest->getText('wpType') && $wgRequest->getText('wpCreate'))
		$wgSpecialRecordAdmin->createRecord();

	# Add the specialpage to the environment
	SpecialPage::addPage($wgSpecialRecordAdmin);
}

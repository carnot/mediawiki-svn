<?php

/**
 * Report lists pages with the most revisions
 *
 * @addtogroup Reports
 * @author Rob Church <robchur@gmail.com>
 */
class MostRevisionsReport extends Report {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get the name of the report
	 *
	 * @return string
	 */
	public function getName() {
		return 'Mostrevisions';
	}
	
	/**
	 * Is it appropriate to allow filtering redirects?
	 *
	 * @return bool
	 */
	public function allowRedirectFilter() {
		return false;
	}
	
	/**
	 * Should redirects be filtered from results?
	 *
	 * @return bool
	 */
	public function excludeRedirects() {
		return true;
	}
	
	/**
	 * Is it appropriate to allow filtering namespaces?
	 *
	 * @return bool
	 */
	public function allowNamespaceFilter() {
		return true;
	}
	
	/**
	 * Get a list of namespaces this report can be run
	 * against - false indicates *all* namespaces
	 *
	 * @return mixed
	 */
	public function getApplicableNamespaces() {
		return array(
			NS_MAIN,
		) + $GLOBALS['wgContentNamespaces'];
	}
	
	/**
	 * Return base SQL for the report
	 *
	 * @param Database $dbr Database object being queried
	 * @return string
	 */
	public function getBaseSql( $dbr ) {
		list( $page, $revision ) = $dbr->tableNamesN( 'page', 'revision' );
		return
			"SELECT
				page_id AS rp_id,
				page_namespace AS rp_namespace,
				page_title AS rp_title,
				page_is_redirect AS rp_redirect,
				COUNT(*) AS count
			FROM {$revision}
			LEFT JOIN {$page} ON rev_page = page_id";
	}

	/**
	 * Return additional WHERE clauses and other conditions
	 * to which the paging clauses will be appened when
	 * the report runs live
	 *
	 * @param Database $dbr Database object being queried
	 * @return array
	 */
	public function getExtraConditions( $dbr ) {
		return array();
	}

	/**
	 * Get additional SQL to be inserted between the
	 * conditions and ORDER clauses when the report is run live
	 *
	 * @param Database $dbr Database object being queried
	 * @return string
	 */
	public function getExtraSql( $dbr ) {
		return ' GROUP BY 1, 2, 3';
	}

	/**
	 * Get ORDER BY clauses to be applied when the
	 * report is run live
	 *
	 * @return array
	 */
	public function getOrderingClauses() {
		return array(
			'count DESC',
		);
	}

	/**
	 * Given a result object, extract additional parameters
	 * as a dictionary for later use
	 *
	 * @param object $row Result row
	 * @return array
	 */
	public function extractParameters( $row ) {
		return array(
			'count' => $row->count,
		);
	}

	/**
	 * Format an individual result row
	 *
	 * @param Title $title Result title
	 * @param object $row Result row
	 * @param array $params Result parameters
	 * @param Skin $skin User skin
	 * @return string
	 */
	public function formatRow( $title, $row, $params, $skin ) {
		global $wgLang;
		$revs = wfMsgExt( 'nrevisions', array( 'parsemag', 'escape' ),
			$wgLang->formatNum( $params['count'] ) );
		return "<li>" . $skin->makeLinkObj( $title ) . " ({$revs})</li>\n";
	}
	
}

?>
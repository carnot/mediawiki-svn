<?php

/**
 * Extended by CodeRevisionListView and CodeRevisionView
 */
abstract class CodeView {
	/**
	 * @var CodeRepository
	 */
	var $repo;

	function __construct() {
		global $wgUser;
		$this->skin = $wgUser->getSkin();
	}

	function validPost( $permission ) {
		global $wgRequest, $wgUser;
		return $wgRequest->wasPosted()
			&& $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) )
			&& $wgUser->isAllowed( $permission );
	}

	abstract function execute();

	function authorLink( $author, $extraParams = array() ) {
		$repo = $this->repo->getName();
		$special = SpecialPage::getTitleFor( 'Code', "$repo/author/$author" );
		return $this->skin->link( $special, htmlspecialchars( $author ), array(), $extraParams );
	}

	function statusDesc( $status ) {
		return wfMsg( "code-status-$status" );
	}

	function formatMessage( $text ) {
		$text = nl2br( htmlspecialchars( $text ) );
		$linker = new CodeCommentLinkerHtml( $this->repo );
		return $linker->link( $text );
	}

	function messageFragment( $value ) {
		global $wgLang;
		$message = trim( $value );
		$lines = explode( "\n", $message, 2 );
		$first = $lines[0];

		$html = $this->formatMessage( $first );
		$truncated = $wgLang->truncateHtml( $html, 80 );

		if ( count( $lines ) > 1  ) { // If multiline, we might want to add an ellipse
			$ellipse = wfMsgExt( 'ellipsis', array() );

			$len = strlen( $truncated );
			if ( substr( $truncated, $len ) !== $ellipse ) { // Don't add if the end is already an ellipse
				$truncated .= $ellipse;
			}
		}

	    return $truncated;
	}
	/*
	 * Formatted HTML array for properties display
	 * @param array fields : 'propname' => HTML data
	 */
	function formatMetaData( $fields ) {
		$html = '<table class="mw-codereview-meta">';
		foreach ( $fields as $label => $data ) {
			$html .= "<tr><td>" . wfMsgHtml( $label ) . "</td><td>$data</td></tr>\n";
		}
		return $html . "</table>\n";
	}

	function getRepo() {
		if ( $this->repo ) {
			return $this->repo;
		}
		return false;
	}
}

abstract class SvnTablePager extends TablePager {

	/**
	 * @var CodeRepository
	 */
	protected $repo;

	/**
	 * @var CodeView
	 */
	protected $view;

	/**
	 * @param  $view CodeView
	 *
	 */
	function __construct( $view ) {
		global $IP;
		$this->view = $view;
		$this->repo = $view->repo;
		$this->defaultDirection = true;
		$this->curSVN = SpecialVersion::getSvnRevision( $IP );
		parent::__construct();
	}

	function isFieldSortable( $field ) {
		return $field == $this->getDefaultSort();
	}

	function formatRevValue( $name, $value, $row ) {
		return $this->formatValue( $name, $value );
	}

	// Note: this function is poorly factored in the parent class
	function formatRow( $row ) {
		$css = "mw-codereview-status-{$row->cr_status}";
		$s = "<tr class=\"$css\">\n";
		// Some of this stolen from Pager.php...sigh
		$fieldNames = $this->getFieldNames();
		$this->mCurrentRow = $row;  # In case formatValue needs to know
		foreach ( $fieldNames as $field => $name ) {
			$value = isset( $row->$field ) ? $row->$field : null;
			$formatted = strval( $this->formatRevValue( $field, $value, $row ) );
			if ( $formatted == '' ) {
				$formatted = '&#160;';
			}
			$class = 'TablePager_col_' . htmlspecialchars( $field );
			$s .= "<td class=\"$class\">$formatted</td>\n";
		}
		$s .= "</tr>\n";
		return $s;
	}
}
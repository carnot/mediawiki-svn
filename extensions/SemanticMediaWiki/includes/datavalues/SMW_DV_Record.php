<?php
/**
 * @file
 * @ingroup SMWDataValues
 */

/**
 * SMWDataValue implements the handling of short lists of values,
 * where the order governs the type of each entry.
 *
 * @todo Enforce limitation of maximal number of values.
 * @todo Complete internationalisation.
 *
 * @author Markus Krötzsch
 * @ingroup SMWDataValues
 */
class SMWRecordValue extends SMWDataValue {

	/// cache for properties for the fields of this data value
	protected $m_diProperties = null;

	protected function parseUserValue( $value ) {
		$this->parseUserValueOrQuery( $value, false );
	}

	protected function parseUserValueOrQuery( $value, $queryMode ) {
		if ( $value == '' ) {
			smwfLoadExtensionMessages( 'SemanticMediaWiki' );
			$this->addError( wfMsg( 'smw_novalues' ) );
			if ( $queryMode ) {
				return new SMWThingDescription();
			} else {
				return;
			}
		}

		if ( $queryMode ) {
			$subdescriptions = array();
		} else {
			$semanticData = new SMWContainerSemanticData();
		}

		$values = preg_split( '/[\s]*;[\s]*/u', trim( $value ) );
		$valueIndex = 0; // index in value array
		$propertyIndex = 0; // index in property list
		$empty = true;
		foreach ( $this->getPropertyDataItems() as $diProperty ) {
			if ( !array_key_exists( $valueIndex, $values ) ) break; // stop if there are no values left

			if ( $queryMode ) { // special handling for supporting query parsing
				$comparator = SMW_CMP_EQ;
				SMWDataValue::prepareValue( $values[$valueIndex], $comparator );
			}

			// generating the DVs:
			if ( ( $values[$valueIndex] == '' ) || ( $values[$valueIndex] == '?' ) ) { // explicit omission
				$valueIndex++;
			} else {
				$dataValue = SMWDataValueFactory::newPropertyObjectValue( $diProperty, $values[$valueIndex] );
				if ( $dataValue->isValid() ) { // valid DV: keep
					if ( $queryMode ) {
						$subdescriptions[] = new SMWSomeProperty( $diProperty, new SMWValueDescription( $dataValue->getDataItem(), $comparator ) );
					} else {
						$semanticData->addPropertyObjectValue( $diProperty, $dataValue->getDataItem() );
					}
					$valueIndex++;
					$empty = false;
				} elseif ( ( count( $values ) - $valueIndex ) == ( count( $this->m_diProperties ) - $propertyIndex ) ) {
					// too many errors: keep this one to have enough slots left
					if ( !$queryMode ) {
						$semanticData->addPropertyObjectValue( $diProperty, $dataValue->getDataItem() );
					}
					$this->addError( $dataValue->getErrors() );
					$valueIndex++;
				}
			}
			++$propertyIndex;
		}

		if ( $empty ) {
			smwfLoadExtensionMessages( 'SemanticMediaWiki' );
			$this->addError( wfMsg( 'smw_novalues' ) );
		}

		if ( $queryMode ) {
			switch ( count( $subdescriptions ) ) {
				case 0: return new SMWThingDescription();
				case 1: return reset( $subdescriptions );
				default: return new SMWConjunction( $subdescriptions );
			}
		} else {
			$this->m_dataitem = new SMWDIContainer( $semanticData, $this->m_typeid );
		}
	}

	/**
	 * @see SMWDataValue::loadDataItem()
	 * @param $dataitem SMWDataItem
	 * @return boolean
	 */
	protected function loadDataItem( SMWDataItem $dataItem ) {
		if ( $dataItem->getDIType() == SMWDataItem::TYPE_CONTAINER ) {
			$this->m_dataitem = $dataItem;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Overwrite SMWDataValue::getQueryDescription() to be able to process
	 * comparators between all values.
	 */
	public function getQueryDescription( $value ) {
		return $this->parseUserValueOrQuery( $value, true );
	}

	public function getShortWikiText( $linked = null ) {
		if ( $this->m_caption !== false ) {
			return $this->m_caption;
		}
		return $this->makeOutputText( 0, $linked );
	}

	public function getShortHTMLText( $linker = null ) {
		if ( $this->m_caption !== false ) {
			return $this->m_caption;
		}
		return $this->makeOutputText( 1, $linker );
	}

	public function getLongWikiText( $linked = null ) {
		return $this->makeOutputText( 2, $linked );
	}

	public function getLongHTMLText( $linker = null ) {
		return $this->makeOutputText( 3, $linker );
	}

	public function getWikiValue() {
		return $this->makeOutputText( 4 );
	}

	/// @todo Allowed values for multi-valued properties are not supported yet.
	protected function checkAllowedValues() { }

	/**
	 * Make sure that the content is reset in this case.
	 * @todo This is not a full reset yet (the case that property is changed after a value
	 * was set does not occur in the normal flow of things, hence this has low priority).
	 */
	public function setProperty( SMWDIProperty $property ) {
		parent::setProperty( $property );
		$this->m_diProperties = null;
	}

	/**
	 * @todo Since containers are always exported in a similar fashion, it
	 * would be preferrable to have their export controlled where it happens,
	 * and minimize the below special code.
	 */
	public function getExportData() {
		if ( !$this->isValid() ) return null;

		$result = new SMWExpData( new SMWExpResource( '', $this ) ); // bnode
		$ed = new SMWExpData( SMWExporter::getSpecialNsResource( 'swivt', 'Container' ) );
		$result->addPropertyObjectValue( SMWExporter::getSpecialNsResource( 'rdf', 'type' ), $ed );
		$count = 0;
		foreach ( $this->getDVs() as $dataValue ) {
			$count++;
			if ( ( $dataValue === null ) || ( !$dataValue->isValid() ) ) {
				continue;
			}
			if ( ( $dataValue->getTypeID() == '_wpg' ) || ( $dataValue->getTypeID() == '_uri' ) || ( $dataValue->getTypeID() == '_ema' ) ) {
				$result->addPropertyObjectValue(
				      SMWExporter::getSpecialNsResource( 'swivt', 'object' . $count ),
				      $dataValue->getExportData() );
			} else {
				$result->addPropertyObjectValue(
				      SMWExporter::getSpecialNsResource( 'swivt', 'value' . $count ),
				      $dataValue->getExportData() );
			}
		}
		return $result;
	}

////// Additional API for value lists

	/**
	 * Create a list (array with numeric keys) containing the datavalue
	 * objects that this SMWRecordValue object holds. Values that are not
	 * present are set to null. Note that the first index in the array is
	 * 0, not 1.
	 *
	 * @todo This method should be renamed to getDataItems().
	 * @return array of SMWDataItem
	 */
	public function getDVs() {
		if ( !$this->isValid() ) return array();
		$result = array();
		$semanticData = $this->m_dataitem->getSemanticData();
		foreach ( $semanticData->getProperties() as $prop ) {
			$propname = $prop->getPropertyID();
			$propnum = substr( $propname, 1 );
			if ( ( $propname != false ) && ( is_numeric( $propnum ) ) ) {
				$propertyvalues = $semanticData->getPropertyValues( $prop ); // combining this with next line violates PHP strict standards 
				$result[( $propnum - 1 )] = reset( $propertyvalues );
			}
		}
		return $result;
	}

	/**
	 * Return the array (list) of properties that the individual entries of
	 * this datatype consist of.
	 * 
	 * @todo I18N for error message.
	 * @return array of SMWDIProperty
	 */
	public function getPropertyDataItems() {
		if ( $this->m_diProperties === null ) {
			$this->m_diProperties = self::findPropertyDataItems( $this->m_property );
			if ( count( $this->m_diProperties ) == 0 ) { //TODO internalionalize
				$this->addError( 'The list of properties to be used for the data fields has not been specified properly.' );
			}
		}

		return $this->m_diProperties;
	}

	/**
	 * Return the array (list) of properties that the individual entries of
	 * this datatype consist of.
	 *
	 * @param $diProperty mixed null or SMWDIProperty object for which to retrieve the types
	 * @return array of SMWDIProperty
	 */
	public static function findPropertyDataItems( $diProperty ) {
		if ( $diProperty !== null ) {
			$propertyDiWikiPage = $diProperty->getDiWikiPage();
		}

		if ( ( $diProperty === null ) || ( $propertyDiWikiPage === null ) ) {
			return array(); // no property known -> no types
		} else {
			$listDiProperty = new SMWDIProperty( '_LIST' );
			$dataitems = smwfGetStore()->getPropertyValues( $propertyDiWikiPage, $listDiProperty );
			if ( count( $dataitems ) == 1 ) {
				$propertyListValue = new SMWPropertyListValue( '__pls' );
				$propertyListValue->setDataItem( reset( $dataitems ) );
				return $propertyListValue->isvalid() ? $propertyListValue->getPropertyDataItems() : array();
			} else {
				return array();
			}
		}
	}

////// Internal helper functions

	protected function makeOutputText( $type = 0, $linker = null ) {
		if ( !$this->isValid() ) {
			return ( ( $type == 0 ) || ( $type == 1 ) ) ? '' : $this->getErrorText();
		}

		$result = '';
		$i = 0;
		foreach ( $this->getPropertyDataItems() as $propertyDataItem ) {
			if ( $i == 1 ) {
				$result .= ( $type == 4 ) ? '; ' : ' (';
			} elseif ( $i > 1 ) {
				$result .= ( $type == 4 ) ? '; ' : ', ';
			}
			++$i;
			$propertyValues = $this->m_dataitem->getSemanticData()->getPropertyValues( $propertyDataItem ); // combining this with next line violates PHP strict standards 
			$dataItem = reset( $propertyValues );
			if ( $dataItem !== false ) {
				$dataValue = SMWDataValueFactory::newDataItemValue( $dataItem, $propertyDataItem );
				$result .= $this->makeValueOutputText( $type, $dataValue, $linker );
			} else {
				$result .= '?';
			}
		}
		if ( ( $i > 1 ) && ( $type != 4 ) ) $result .= ')';

		return $result;
	}

	protected function makeValueOutputText( $type, $dataValue, $linker ) {
		switch ( $type ) {
			case 0: return $dataValue->getShortWikiText( $linker );
			case 1: return $dataValue->getShortHTMLText( $linker );
			case 2: return $dataValue->getShortWikiText( $linker );
			case 3: return $dataValue->getShortHTMLText( $linker );
			case 4: return $dataValue->getWikiValue();
		}
	}

}


<?php

require_once("Attribute.php");
require_once("Record.php");
require_once("RecordSet.php");

define (SORT_IMAGE, ' <img src="skins/common/images/sort_none.gif"></img>');

function parityClass($value) {
	if ($value % 2 == 0)
		return "even";
	else
		return "odd";
}

/* Functions to create a hierarchical table header
 * using rowspan and colspan for <th> elements
 */

class TableHeaderNode {
	public $attribute = null;
	public $width = 0;
	public $height = 0;
	public $column = 0;
	public $childNodes = array();
}

function getTableHeaderNode($structure, &$currentColumn=0) {
	$tableHeaderNode = new TableHeaderNode();
	
	foreach($structure->attributes as $attribute) {
		$type = $attribute->type;
		
		if ($type instanceof RecordType) 
			$childNode = getTableHeaderNode($type->getStructure(), $currentColumn);
		else { 
			$childNode = new TableHeaderNode();
			$childNode->width = 1;
			$childNode->height = 1;
			$childNode->column = $currentColumn++;
		}

		$tableHeaderNode->height = max($tableHeaderNode->height, $childNode->height);
		$tableHeaderNode->width += $childNode->width;
		$tableHeaderNode->childNodes[] = $childNode;
		$childNode->attribute = $attribute;
	}
	
	$tableHeaderNode->height++;
	
	return $tableHeaderNode;
}

function addChildNodesToRows($headerNode, &$rows, $currentDepth, $columnOffset, $idPath, $leftmost=True) {
	$height = $headerNode->height;
	foreach($headerNode->childNodes as $childNode) {
		$attribute = $childNode->attribute;
		$idPath->pushAttribute($attribute);		
		$type = $attribute->type;
		
		if (!$type instanceof RecordType && !$type instanceof RecordSetType) {
			$skipRows=count($rows);
			$columnIndex=$childNode->column + $columnOffset;
			$sort = 'sortTable(this, '. $skipRows .', '. $columnIndex.')';
			$onclick = ' onclick= "' . $sort . '"';
			if ($leftmost) {		# Are we the leftmost column?
				$leftsort= EOL . 
					'<script type="text/javascript"> toSort("' . 
					$idPath->getId(). '-h" , ' . $skipRows . ',' . 
					$columnIndex . '); </script>' 
					. EOL;
				$leftmost = False; 	# There can be only one.
			} else {
				$leftsort="";
			}

			$class = ' class="' . $type . ' sortable"' . $onclick;	
			$sort_image = SORT_IMAGE;
		} else {
			$class = '';
			$sort = '';
		}
		
		$rowSpan = $height - $childNode->height;
		$rows[$currentDepth] .= '<th id="'.$idPath->getId().'-h" '. $class .
			' colspan="'. $childNode->width .  '" rowspan="'. $rowSpan . 
			'">'. $attribute->name . $sort_image . $leftsort .'</th>';
									
		addChildNodesToRows($childNode, $rows, $currentDepth + $rowSpan, $columnOffset,$idPath, $leftmost);
		$idPath->popAttribute();
	} 
}

function getStructureAsTableHeaderRows($structure, $columnOffset, $idPath) {
	$rootNode = getTableHeaderNode($structure);
	$result = array();
	
	for ($i = 0; $i < $rootNode->height - 1; $i++)
		$result[$i] = "";
		
	addChildNodesToRows($rootNode, $result, 0, $columnOffset, $idPath);

	return $result;
}

function getHTMLClassForType($type,$attribute) {
	if ($type instanceof RecordSetType)  
		return "relation";
	else if ($type instanceof RecordType) 
		return $attribute->id;
	else 
		return $type;
}

function getRecordAsTableCells($idPath, $editor, $record, &$startColumn = 0) {
	$result = '';
	
	foreach($editor->getEditors() as $childEditor) {
		$attribute = $childEditor->getAttribute();
		$type = $attribute->type;
		$value = $record->getAttributeValue($attribute);
		$idPath->pushAttribute($attribute);
		$attributeId = $idPath->getId();
		
		if ($childEditor instanceof RecordTableCellEditor) 
			$result .= getRecordAsTableCells($idPath, $childEditor, $value, $startColumn);	
		else {
			if($childEditor->showsData($value))
				$displayValue = $childEditor->view($idPath, $value);
			else
				$displayValue = "";
			$result .= '<td class="'. getHTMLClassForType($type,$attribute) .' column-'. parityClass($startColumn) . '">'. $displayValue . '</td>';
			$startColumn++;
		}
		
		$idPath->popAttribute();
	}
	
	return $result;
}

function getRecordAsEditTableCells($record, $idPath, $editor, &$startColumn = 0) {
	$result = '';
	
	foreach($editor->getEditors() as $childEditor) {
		$attribute = $childEditor->getAttribute();
		$type = $attribute->type;
		$value = $record->getAttributeValue($attribute);
		$idPath->pushAttribute($attribute);
			
		if ($childEditor instanceof RecordTableCellEditor)			
			$result .= getRecordAsEditTableCells($value, $idPath, $childEditor, $startColumn); 
		else {	
			if($childEditor->showEditField($idPath))
				$displayValue = $childEditor->edit($idPath, $value);
			else
				$displayValue = "";
			
			$result .= '<td class="'. getHTMLClassForType($type,$attribute) .' column-'. parityClass($startColumn) . '">'. $displayValue . '</td>';
				
			$startColumn++;
		}
		
		$idPath->popAttribute();
	}
	
	return $result;
}

function getStructureAsAddCells($idPath, $editor, &$startColumn = 0) {
	$result = '';
	
	foreach($editor->getEditors() as $childEditor) {
		$attribute = $childEditor->getAttribute();
		$type = $attribute->type;
		$idPath->pushAttribute($attribute);
		
		if ($childEditor instanceof RecordTableCellEditor)
			$result .= getStructureAsAddCells($idPath, $childEditor, $startColumn);
		else {
			$result .= '<td class="'. getHTMLClassForType($type,$attribute) .' column-'. parityClass($startColumn) . '">' . $childEditor->add($idPath) . '</td>';
			$startColumn++;
		}
		
		$idPath->popAttribute();
	}
	
	return $result;
}

?>

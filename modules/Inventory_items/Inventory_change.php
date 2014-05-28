<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('data/SugarBean.php'); 

class Inventory_change extends SugarBean {

	var $field_name_map = array(); //stores fields retrieved from db

	// stored values

	var $id;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $assigned_user_id;
	var $deleted;

	var $inventory_item_id;
	var $user_id;
	var $user_name;
	var $changed_field;
	var $value;
	var $date;


	// properties

	var $table_name  = 'inventory_changes';
	//var $rel_inventory_item_table = 'inventory_items_inventory_changes';
	var $module_dir	 = 'Inventory_items';
	var $object_name = 'Inventory_change';


	var $relationship_fields = Array(
		//'inventory_item_id' => 'inventory_items'
		);


	var $new_schema = true; // legacy code

	var $required_fields =  array( 
		'id' => 1, 
		'inventory_item_id' => 1,
		'user_id' => 1,
		'date' => 1
		);

	
	var $members =  array(
		'id',
		'date_entered',
		'date_modified',
		'modified_user_id',
		'assigned_user_id',
		'deleted',
		
		'inventory_item_id',
		'user_id',
		'user_name',
		'changed_field',
		'value',
		'date'
		);


	### CONSTRUCTOR ###

	function Inventory_change() 
	{
		parent::SugarBean();

		$this->setupCustomFields('Inventory_items');

		foreach( $this->field_defs as $field )
		{
			$this->field_name_map[ $field['name'] ] = $field;
		}

		if( count( $this->column_fields ) < 1 )
		{
			$this->column_fields = $this->members;
		}
	}



	### FILL IN ADDITIONAL FIELDS DURING DETAIL AND EDIT VIEWS ###
	
	function fill_in_additional_detail_fields()
	{
		$this->user_name = get_assigned_user_name($this->user_id);
	}



	### BUILDS A GENERIC WHERE CLAUSE ###
	
	function build_generic_where_clause ($the_query_string)
	{
		$where_clauses = Array();

		$the_query_string = PearDatabase::quote(from_html($the_query_string));
		array_push($where_clauses, " inventory_changes.user_name LIKE '$the_query_string%' ");

		$the_where = "";
		foreach($where_clauses as $clause)
		{
			if($the_where != "") $the_where .= " or ";
			$the_where .= $clause;
		}

		return $the_where;
	}



	### FIND WHAT INTERFACES ARE IMPLEMENTED ###
	
	function bean_implements($interface)
	{
		switch($interface)
		{
			case 'ACL':return true;
		}

		return false;
	}

	
		
	### WRAPPER ###

	function save($check_notify = FALSE)
	{
		return parent::save($check_notify);
	}



	### GET LOGS ###

	function get_logs( $item_id )
	{
		$sql = "SELECT *
			FROM inventory_changes
			WHERE inventory_item_id = '$item_id'";

		if( ! $result = mysql_query( $sql ) )
		{
			return 'no records';	
		}

		if( mysql_num_rows( $result ) < 1 )
		{
			return 'no records';	
		}

		$log = '<table style="padding:10px;" cellspacing="10">
			<tr style="font-weight:bold;"><td>User Name</td>
			<td>Changed Field</td>
			<td>Date</td>
			<td>Date Changed</td>
			</tr>';

		while( $row = mysql_fetch_assoc( $result ) )
		{
			$log .= '<tr><td>' . $row['user_name'] . '</td>' .
				'<td>' . $row['changed_field'] . '</td>' .
				'<td>' . $row['value'] . '</td>' . 
				'<td>' . $row['date'] . '</td></tr>';
		}

		$log .= '</table>';

		return $log;
	}


} // end class

?>

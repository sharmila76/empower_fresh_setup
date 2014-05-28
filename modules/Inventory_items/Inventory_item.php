<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('data/SugarBean.php'); 

class Inventory_item extends SugarBean {

	var $field_name_map = array(); //stores fields retrieved from db

	// stored values

	var $id;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $assigned_user_id;
	var $deleted;

	var $inventory_number;
	var $account_name;
	var $account_id;
	var $company_name;
	var $storage_type;
	var $artist;
	var $title;
	var $circa;
	var $date_received;
	var $date_left;
	var $medium;
	var $description;
	var $height;
	var $width;
	var $depth;
	var $packing;
	var $square_footage;
	var $in_storage;
	var $value;
	var $insured;
	var $facility;
	var $location;
	var $photo;
	var $condition;
	var $condition_description;

	
	// additional values

	var $assigned_user_name;


	// additional column fields

	var $additional_column_fields = array(
		'assigned_user_name',
		'account_name'
		);
		

	// properties

	var $table_name  = 'inventory_items';
	var $rel_account_table = "accounts_inventory_items";	
	var $module_dir	 = 'Inventory_items';
	var $object_name = 'Inventory_item';

	var $relationship_fields = Array(
		'account_id' => 'accounts',
		);


	var $new_schema = true; // legacy code

	var $required_fields =  array( 
		'id' => 1, 
		'inventory_number' => 1 
		);

	
	var $members =  array(
		'id',
		'date_entered',
		'date_modified',
		'modified_user_id',
		'assigned_user_id',
		'deleted',
		'inventory_number',
		'account_name',
		'account_id',
		'company_name',
		'storage_type',
		'artist',
		'title',
		'circa',
		'date_received',
		'date_left',
		'medium',
		'description',
		'height',
		'width',
		'depth',
		'packing',
		'square_footage',
		'in_storage',
		'value',
		'insured',
		'facility',
		'location',
		'photo',
		'condition',
		'condition_description'
		);


	### CONSTRUCTOR ###

	function Inventory_item() 
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



	### GET NUMBER OF ITEMS THAT ACCOUNT HAS ###

	function get_num_items( $account_id )
	{
		$sql = "SELECT COUNT(*)
			FROM inventory_items
			WHERE account_id = '$account_id'";

		$result = $this->db->query( $sql, true );

		$row = $this->db->fetchByAssoc($result);
	
		return $row['COUNT(*)'];
	}



	### SUMMARY TEXT FOR LAST VIEWED FEATURE ###

	function get_summary_text()
	{
		return $this->artist . ' - ' . $this->title;
	}



	### CREATE EXPORT QUERY ###

	function create_export_query( $order_by, $where )
	{
		$sql = "SELECT 
			inventory_number,
			account_name,
			company_name,
			storage_type,
			artist,
			title,
			circa,
			date_received,
			date_left,
			medium,
			description,
			height,
			width,
			depth,
			packing,
			square_footage,
			in_storage,
			value,
			insured,
			facility,
			location,
			photo,
			condition,
			condition_description
			FROM inventory_items 
			WHERE $where 
			AND deleted=0";

		return $sql;
	}



	### FILL IN ADDITIONAL FIELDS DURING DETAIL AND EDIT VIEWS ###
	
	function fill_in_additional_detail_fields()
	{
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);
	}


	### GET LIST VIEW ###

	function get_list_view_data()
	{
		global $current_language;
		$the_array = parent::get_list_view_data();
		$app_list_strings = return_app_list_strings_language($current_language);
		$mod_strings = return_module_language($current_language, 'Inventory_items');
	    
		$the_array['TITLE'] = (($this->title == "") ? "<em>blank</em>" : $this->title);
		$the_array['ARTIST'] = $this->artist;

		return  $the_array;
	}

	
	
	### BUILDS A GENERIC SEARCH BASED ON THE QUERY STRING USING OR ###
	
	function build_generic_where_clause ($the_query_string)
	{
		$where_clauses = Array();

		$the_query_string = PearDatabase::quote(from_html($the_query_string));
		array_push($where_clauses, " inventory_items.title LIKE '$the_query_string%' ");

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

	

} // end class

?>

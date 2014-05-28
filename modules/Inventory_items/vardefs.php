<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	$dictionary['Inventory_item'] = array(	

		### TABLE ###

		'table' => 'inventory_items', 


		### UNIFIED SEARCH ###

		'unified_search' => true,


		### FIELDS ###

		'fields' => array (
  
			'id' => array (
				'name' => 'id',
				'vname' => 'LBL_ID',
				'type' => 'id',
				'required' => true,
				'reportable' => false,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),
		
			'date_entered' => array (
				'name' => 'date_entered',
				'vname' => 'LBL_DATE_ENTERED',
				'type' => 'datetime',
				'required'=>true,
				'comment' => 'Date record created'
				),
			'date_modified' => array (
				'name' => 'date_modified',
				'vname' => 'LBL_DATE_MODIFIED',
				'type' => 'datetime',
				'required'=>true,
				'comment' => 'Date record last modified'
				),
			'modified_user_id' => array (
				'name' => 'modified_user_id',
				'rname' => 'user_name',
				'id_name' => 'modified_user_id',
				'vname' => 'LBL_MODIFIED',
				'type' => 'assigned_user_name',
				'table' => 'modified_user_id_users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'len' => 36,
				'required'=>true,
				'reportable'=>true,
				'comment' => 'User who last modified record'
				),
			'assigned_user_id' => array (
				'name' => 'assigned_user_id',
				'rname' => 'user_name',
				'id_name' => 'assigned_user_id',
				'vname' => 'LBL_ASSIGNED_TO',
				'type' => 'relate',
				'table' => 'users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'reportable'=>true,
				'len' => 36,
				'audited'=>true,
				'comment' => 'User assigned to record',
				'module'=>'Users',
				'duplicate_merge'=>'disabled'
				),
			'assigned_user_name' =>  array (
				'name' => 'assigned_user_name',
				'vname' => 'LBL_ASSIGNED_TO',
				'type' => 'varchar',
				'reportable'=>false,
				'source'=>'nondb',
				'table'=>'users',
				'duplicate_merge'=>'disabled'
				),
			'created_by' => array (
				'name' => 'created_by',
				'rname' => 'user_name',
				'id_name' => 'created_by',
				'vname' => 'LBL_CREATED',
				'type' => 'assigned_user_name',
				'table' => 'created_by_users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'len' => 36,
				'comment' => 'User that created the record'
				),

			'deleted' => array (
				'name' => 'deleted',
				'vname' => 'LBL_DELETED',
				'type' => 'bool',
				'required' => true,
				'reportable' => false,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'date_entered' => array (
				'name' => 'date_entered',
				'vname' => 'LBL_DATE_ENTERED',
				'type' => 'bool',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'date_modified' => array (
				'name' => 'date_modified',
				'vname' => 'LBL_DATE_MODIFIED',
				'type' => 'datetime',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'inventory_number' => array(
				'name' => 'inventory_number',
				'vname' => 'LBL_INVENTORY_NUMBER',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'account_name' => array(
				'name' => 'account_name',
				'vname' => 'LBL_ACCOUNT_NAME',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),
			
			'account_id' => array(
				'name' => 'account_id',
				'vname' => 'LBL_ACCOUNT_ID',
				'type' => 'id',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'company_name' => array(
				'name' => 'company_name',
				'vname' => 'LBL_COMPANY_NAME',
				'type' => 'enum',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'company_name_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),
	
	  		'storage_type' => array(
				'name' => 'storage_type',
				'vname' => 'LBL_STORAGE_TYPE',
				'type' => 'enum',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'storage_type_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'artist' => array(
				'name' => 'artist',
				'vname' => 'LBL_ARTIST',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'title' => array(
				'name' => 'title',
				'vname' => 'LBL_TITLE',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'circa' => array(
				'name' => 'circa',
				'vname' => 'LBL_CIRCA',
				'type' => 'int',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'date_received' => array(
				'name' => 'date_received',
				'vname' => 'LBL_DATE_RECEIVED',
				'type' => 'datetime',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'date_left' => array(
				'name' => 'date_left',
				'vname' => 'LBL_DATE_LEFT',
				'type' => 'datetime',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'medium' => array(
				'name' => 'medium',
				'vname' => 'LBL_MEDIUM',
				'type' => 'enum',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'medium_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'description' => array(
				'name' => 'description',
				'vname' => 'LBL_DESCRIPTION',
				'type' => 'char',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'height' => array(
				'name' => 'height',
				'vname' => 'LBL_HEIGHT',
				'type' => 'double',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'width' => array(
				'name' => 'width',
				'vname' => 'LBL_WIDTH',
				'type' => 'double',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'depth' => array(
				'name' => 'depth',
				'vname' => 'LBL_DEPTH',
				'type' => 'double',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'packing' => array(
				'name' => 'packing',
				'vname' => 'LBL_PACKING',
				'type' => 'enum',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'packing_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'square_footage' => array(
				'name' => 'square_footage',
				'vname' => 'LBL_SQUARE_FOOTAGE',
				'type' => 'double',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'in_storage' => array(
				'name' => 'in_storage',
				'vname' => 'LBL_IN_STORAGE',
				'type' => 'enum',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'in_storage_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'value' => array(
				'name' => 'value',
				'vname' => 'LBL_VALUE',
				'type' => 'char',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				'len' => 10,
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'insured' => array(
				'name' => 'insured',
				'vname' => 'LBL_INSURED',
				'type' => 'enum',
				'required' => true,
				'reportable' => false,
				'isnull' => false,
				'massupdate' => false,
				//'default' => ,
				//'len' => 
				//'sort_on' => ,
				'options' => 'insured_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'facility' => array(
				'name' => 'facility',
				'vname' => 'LBL_FACILITY',
				'type' => 'enum',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => ,
				//'sort_on' => ,
				'options' => 'facility_dom',
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'location' => array(
				'name' => 'location',
				'vname' => 'LBL_LOCATION',
				'type' => 'char',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => true,
				//'default' => ,
				//'len' => ,
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			'photo' => array(
				'name' => 'photo',
				'vname' => 'LBL_PHOTO',
				'type' => 'char',
				'required' => false,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				'default' => 'default.jpg',
				//'len' => ,
				//'sort_on' => ,
				//'options' => ,
				//'dbtype' => ,
				//'rname' => ,
				//'id_name' => ,
				//'source' = 'nondb', 
				//'fields' => ,
				//'db_concat_fields' => ,
				 ),

			// special fields to take care of relationships

			'accounts' => array(
				'name' 		=> 'accounts',
				'type' 		=> 'link',
				'relationship' 	=> 'accounts_inventory_items',
				'link_tyupe' 	=> 'one',
				'source' 	=> 'non-db',
				'vname' 	=> 'LBL_ACCOUNTS',
				'dubplicate_merge' => 'disabled'
				)
			),
 
                                                       
		### INDICES ###	
		
		'indices' => array (

			array(
				'name' => 'inventory_item_id_index', 
				'type' => 'primary', 
				'fields'=> array( 'id' )
				),

			array(
				'name' => 'inventory_item_artist_index', 
				'type' => 'index', 
				'fields' => array( 'artist' )
				)

			),


		### RELATIONSHIPS ###

		'relationships' => array (

			// inventory_item relates to accounts and inventory_changes

			'inventory_items_inventory_changes' => array(
				'lhs_module'		=> 'Inventory_items',
				'lhs_table'		=> 'inventory_items',
				'lhs_key'		=> 'id',
				'rhs_module'		=> 'Inventory_changes',
				'rhs_table'		=> 'inventory_changes',
				'rhs_key'		=> 'id',
				'relationship_type' 	=> 'one-to-many',
				'join_table'		=> 'inventory_items_inventory_changes',
				'join_key_lhs'		=> 'inventory_item_id',
				'join_key_rhs'		=> 'inventory_change_id',
				)
			),

		### OPTIMISTIC LOCKING ###

		'optimistic_locking'	=> true,
		);

	

	$dictionary['Inventory_change'] = array(	

		### TABLE ###

		'table' => 'inventory_changes', 


		### UNIFIED SEARCH ###

		'unified_search' => true,


		### FIELDS ###

		'fields' => array (
  
			'id' => array (
				'name' => 'id',
				'vname' => 'LBL_ID',
				'type' => 'id',
				'required' => true,
				'reportable' => false,
				'isnull' => false,
				'massupdate' => false,
				 ),
		
			'date_entered' => array (
				'name' => 'date_entered',
				'vname' => 'LBL_DATE_ENTERED',
				'type' => 'datetime',
				'required'=>true,
				'comment' => 'Date record created'
				),

			'date_modified' => array (
				'name' => 'date_modified',
				'vname' => 'LBL_DATE_MODIFIED',
				'type' => 'datetime',
				'required'=>true,
				'comment' => 'Date record last modified'
				),

			'modified_user_id' => array (
				'name' => 'modified_user_id',
				'rname' => 'user_name',
				'id_name' => 'modified_user_id',
				'vname' => 'LBL_MODIFIED',
				'type' => 'assigned_user_name',
				'table' => 'modified_user_id_users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'len' => 36,
				'required'=>true,
				'reportable'=>true,
				'comment' => 'User who last modified record'
				),

		   	'assigned_user_id' => array (
				'name' => 'assigned_user_id',
				'rname' => 'user_name',
				'id_name' => 'assigned_user_id',
				'vname' => 'LBL_ASSIGNED_TO',
				'type' => 'relate',
				'table' => 'users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'reportable'=>true,
				'len' => 36,
				'audited'=>true,
				'comment' => 'User assigned to record',
				'module'=>'Users',
				'duplicate_merge'=>'disabled'
				),

			'assigned_user_name' =>  array (
				'name' => 'assigned_user_name',
				'vname' => 'LBL_ASSIGNED_TO',
				'type' => 'varchar',
				'reportable'=>false,
				'source'=>'nondb',
				'table'=>'users',
				'duplicate_merge'=>'disabled'
				),

			'created_by' => array (
				'name' => 'created_by',
				'rname' => 'user_name',
				'id_name' => 'created_by',
				'vname' => 'LBL_CREATED',
				'type' => 'assigned_user_name',
				'table' => 'created_by_users',
				'isnull' => 'false',
				'dbType' => 'varchar',
				'len' => 36,
				'comment' => 'User that created the record'
				),

			'deleted' => array (
				'name' => 'deleted',
				'vname' => 'LBL_DELETED',
				'type' => 'bool',
				'required' => true,
				'reportable' => false,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'date_entered' => array (
				'name' => 'date_entered',
				'vname' => 'LBL_DATE_ENTERED',
				'type' => 'bool',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'date_modified' => array (
				'name' => 'date_modified',
				'vname' => 'LBL_DATE_MODIFIED',
				'type' => 'datetime',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'inventory_item_id' => array(
				'name' => 'inventory_item_id',
				'vname' => 'LBL_INVENTORY_ITEM_ID',
				'type' => 'id',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'user_id' => array(
				'name' => 'user_id',
				'vname' => 'LBL_USER_ID',
				'type' => 'id',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),
			
			'user_name' => array(
				'name' => 'user_name',
				'vname' => 'LBL_USER_NAME',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'changed_field' => array(
				'name' => 'changed_field',
				'vname' => 'LBL_CHANGED_FIELD',
				'type' => 'enum',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'value' => array(
				'name' => 'value',
				'vname' => 'LBL_VALUE',
				'type' => 'char',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),

			'date' => array(
				'name' => 'date',
				'vname' => 'LBL_DATE',
				'type' => 'datetime',
				'required' => true,
				'reportable' => true,
				'isnull' => false,
				'massupdate' => false,
				 ),


			// special fields to take care of relationships

			'inventory_items' => array(
				'name' 		=> 'inventory_items',
				'type' 		=> 'link',
				'relationship' 	=> 'inventory_items_inventory_changes',
				'module'	=> 'Inventory_items',
				'bean_name'	=> 'Inventory_change',
				'source' 	=> 'non-db',
				'vname' 	=> 'LBL_INVENTORY_ITEMS'
				)
			),
 
                                                       
		### INDICES ###	
		
		'indices' => array (

			array(
				'name' => 'inventory_change_id_index', 
				'type' => 'primary', 
				'fields'=> array( 'id' )
				)
			),


		### RELATIONSHIPS ###

		'relationships' => array (),

		### OPTIMISTIC LOCKING ###

		'optimistic_locking'	=> true,
		
	);

?>

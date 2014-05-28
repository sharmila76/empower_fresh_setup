<?php
$dictionary['inventory_items_inventory_changes'] = array(
	
	'table' => 'inventory_items_inventory_changes',
	
	'fields' => array(
		array(
			'name' => 'id',
			'type' => 'varchar',
			'len'  => '36'
		),
		array(
			'name' => 'inventory_item_id',
			'type' => 'varchar',
			'len'  => '36',
		),
		array(
			'name' => 'inventory_change_id',
			'type' => 'varchar',
			'len'  => '36',
		),
		array (
			'name' => 'date_modified',
			'type' => 'datetime'
		),
		array(
			'name'		=> 'deleted',
			'type'		=> 'bool',
			'len'		=> '1',
			'default'	=> '0',
			'required'	=> true
		)
	),
	
	'indices' => array (
		array(
			'name'	 => 'inventory_items_inventory_changes_pk',
			'type'	 => 'primary',
			'fields' => array('id')
		),
		array(
			'name'   => 'idx_inve_invc_inve',
			'type'   => 'index',
			'fields' => array('inventory_item_id')
		),
		array(
			'name'   => 'idx_inve_invc_invc',
			'type'   => 'index',
			'fields' => array('inventory_change_id')
		),
		array(
			'name'	 => 'idx_inventory_item_inventory_change',
			'type'	 => 'alternate_key',
			'fields' => array('inventory_item_id','inventory_change_id')
		)
	),

	'relationships' => array(
		'accounts_inventory_items' => array(
			'lhs_module'		=> 'Inventory_items',
			'lhs_table'		=> 'inventory_items',
			'lhs_key'		=> 'id',
			'rhs_module'		=> 'Inventory_changes',
			'rhs_table'		=> 'inventory_changes',
			'rhs_key'		=> 'id',
			'relationship_type' 	=> 'many-to-many',
			'join_table'		=> 'inventory_items_inventory_changes',
			'join_key_lhs'		=> 'inventory_item_id',
			'join_key_rhs'		=> 'inventory_change_id',
		)
	)
);
?>

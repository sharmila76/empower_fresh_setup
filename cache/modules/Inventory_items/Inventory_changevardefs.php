<?php 
 $GLOBALS["dictionary"]["Inventory_change"]=array (
  'table' => 'inventory_changes',
  'unified_search' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => false,
      'isnull' => false,
      'massupdate' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'bool',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'modified_user_id_users',
      'isnull' => 'false',
      'dbType' => 'varchar',
      'len' => 36,
      'required' => true,
      'reportable' => true,
      'comment' => 'User who last modified record',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'relate',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'varchar',
      'reportable' => true,
      'len' => 36,
      'audited' => true,
      'comment' => 'User assigned to record',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'vname' => 'LBL_ASSIGNED_TO',
      'type' => 'varchar',
      'reportable' => false,
      'source' => 'nondb',
      'table' => 'users',
      'duplicate_merge' => 'disabled',
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'created_by',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'created_by_users',
      'isnull' => 'false',
      'dbType' => 'varchar',
      'len' => 36,
      'comment' => 'User that created the record',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'required' => true,
      'reportable' => false,
      'isnull' => false,
      'massupdate' => false,
    ),
    'inventory_item_id' => 
    array (
      'name' => 'inventory_item_id',
      'vname' => 'LBL_INVENTORY_ITEM_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'user_id' => 
    array (
      'name' => 'user_id',
      'vname' => 'LBL_USER_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'user_name' => 
    array (
      'name' => 'user_name',
      'vname' => 'LBL_USER_NAME',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'changed_field' => 
    array (
      'name' => 'changed_field',
      'vname' => 'LBL_CHANGED_FIELD',
      'type' => 'enum',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'value' => 
    array (
      'name' => 'value',
      'vname' => 'LBL_VALUE',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'date' => 
    array (
      'name' => 'date',
      'vname' => 'LBL_DATE',
      'type' => 'datetime',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'inventory_items' => 
    array (
      'name' => 'inventory_items',
      'type' => 'link',
      'relationship' => 'inventory_items_inventory_changes',
      'module' => 'Inventory_items',
      'bean_name' => 'Inventory_change',
      'source' => 'non-db',
      'vname' => 'LBL_INVENTORY_ITEMS',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'inventory_change_id_index',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'relationships' => 
  array (
  ),
  'optimistic_locking' => true,
);
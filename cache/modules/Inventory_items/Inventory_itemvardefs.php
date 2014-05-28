<?php 
 $GLOBALS["dictionary"]["Inventory_item"]=array (
  'table' => 'inventory_items',
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
    'inventory_number' => 
    array (
      'name' => 'inventory_number',
      'vname' => 'LBL_INVENTORY_NUMBER',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'account_name' => 
    array (
      'name' => 'account_name',
      'vname' => 'LBL_ACCOUNT_NAME',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
    ),
    'account_id' => 
    array (
      'name' => 'account_id',
      'vname' => 'LBL_ACCOUNT_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
    ),
    'company_name' => 
    array (
      'name' => 'company_name',
      'vname' => 'LBL_COMPANY_NAME',
      'type' => 'enum',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
      'options' => 'company_name_dom',
    ),
    'storage_type' => 
    array (
      'name' => 'storage_type',
      'vname' => 'LBL_STORAGE_TYPE',
      'type' => 'enum',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
      'options' => 'storage_type_dom',
    ),
    'artist' => 
    array (
      'name' => 'artist',
      'vname' => 'LBL_ARTIST',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'title' => 
    array (
      'name' => 'title',
      'vname' => 'LBL_TITLE',
      'type' => 'char',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'circa' => 
    array (
      'name' => 'circa',
      'vname' => 'LBL_CIRCA',
      'type' => 'int',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'date_received' => 
    array (
      'name' => 'date_received',
      'vname' => 'LBL_DATE_RECEIVED',
      'type' => 'datetime',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'date_left' => 
    array (
      'name' => 'date_left',
      'vname' => 'LBL_DATE_LEFT',
      'type' => 'datetime',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
    ),
    'medium' => 
    array (
      'name' => 'medium',
      'vname' => 'LBL_MEDIUM',
      'type' => 'enum',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
      'options' => 'medium_dom',
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'char',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'height' => 
    array (
      'name' => 'height',
      'vname' => 'LBL_HEIGHT',
      'type' => 'double',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'width' => 
    array (
      'name' => 'width',
      'vname' => 'LBL_WIDTH',
      'type' => 'double',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'depth' => 
    array (
      'name' => 'depth',
      'vname' => 'LBL_DEPTH',
      'type' => 'double',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'packing' => 
    array (
      'name' => 'packing',
      'vname' => 'LBL_PACKING',
      'type' => 'enum',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
      'options' => 'packing_dom',
    ),
    'square_footage' => 
    array (
      'name' => 'square_footage',
      'vname' => 'LBL_SQUARE_FOOTAGE',
      'type' => 'double',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
    ),
    'in_storage' => 
    array (
      'name' => 'in_storage',
      'vname' => 'LBL_IN_STORAGE',
      'type' => 'enum',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
      'options' => 'in_storage_dom',
    ),
    'value' => 
    array (
      'name' => 'value',
      'vname' => 'LBL_VALUE',
      'type' => 'char',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
      'len' => 10,
    ),
    'insured' => 
    array (
      'name' => 'insured',
      'vname' => 'LBL_INSURED',
      'type' => 'enum',
      'required' => true,
      'reportable' => false,
      'isnull' => false,
      'massupdate' => false,
      'options' => 'insured_dom',
    ),
    'facility' => 
    array (
      'name' => 'facility',
      'vname' => 'LBL_FACILITY',
      'type' => 'enum',
      'required' => true,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
      'options' => 'facility_dom',
    ),
    'location' => 
    array (
      'name' => 'location',
      'vname' => 'LBL_LOCATION',
      'type' => 'char',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => true,
    ),
    'photo' => 
    array (
      'name' => 'photo',
      'vname' => 'LBL_PHOTO',
      'type' => 'char',
      'required' => false,
      'reportable' => true,
      'isnull' => false,
      'massupdate' => false,
      'default' => 'default.jpg',
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'accounts_inventory_items',
      'link_tyupe' => 'one',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNTS',
      'dubplicate_merge' => 'disabled',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'inventory_item_id_index',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'inventory_item_artist_index',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'artist',
      ),
    ),
  ),
  'relationships' => 
  array (
    'inventory_items_inventory_changes' => 
    array (
      'lhs_module' => 'Inventory_items',
      'lhs_table' => 'inventory_items',
      'lhs_key' => 'id',
      'rhs_module' => 'Inventory_changes',
      'rhs_table' => 'inventory_changes',
      'rhs_key' => 'id',
      'relationship_type' => 'one-to-many',
      'join_table' => 'inventory_items_inventory_changes',
      'join_key_lhs' => 'inventory_item_id',
      'join_key_rhs' => 'inventory_change_id',
    ),
  ),
  'optimistic_locking' => true,
  'custom_fields' => false,
);
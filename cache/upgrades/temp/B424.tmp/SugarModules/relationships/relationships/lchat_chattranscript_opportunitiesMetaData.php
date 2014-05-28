<?php
// created: 2010-07-21 11:54:09
$dictionary["lchat_chattranscript_opportunities"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'lchat_chattranscript_opportunities' => 
    array (
      'lhs_module' => 'Opportunities',
      'lhs_table' => 'opportunities',
      'lhs_key' => 'id',
      'rhs_module' => 'LCHAT_ChatTranscript',
      'rhs_table' => 'lchat_chattranscript',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'lchat_chattpportunities_c',
      'join_key_lhs' => 'lchat_chat071bunities_ida',
      'join_key_rhs' => 'lchat_chat531anscript_idb',
    ),
  ),
  'table' => 'lchat_chattpportunities_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'lchat_chat071bunities_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'lchat_chat531anscript_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'lchat_chatt_opportunitiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'lchat_chatt_opportunities_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'lchat_chat071bunities_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'lchat_chatt_opportunities_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'lchat_chat531anscript_idb',
      ),
    ),
  ),
);
?>

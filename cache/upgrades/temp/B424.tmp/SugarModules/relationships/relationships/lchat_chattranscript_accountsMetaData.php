<?php
// created: 2010-07-21 11:54:09
$dictionary["lchat_chattranscript_accounts"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'lchat_chattranscript_accounts' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'LCHAT_ChatTranscript',
      'rhs_table' => 'lchat_chattranscript',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'lchat_chattipt_accounts_c',
      'join_key_lhs' => 'lchat_chat6f60ccounts_ida',
      'join_key_rhs' => 'lchat_chat9949nscript_idb',
    ),
  ),
  'table' => 'lchat_chattipt_accounts_c',
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
      'name' => 'lchat_chat6f60ccounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'lchat_chat9949nscript_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'lchat_chattcript_accountsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'lchat_chattcript_accounts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'lchat_chat6f60ccounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'lchat_chattcript_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'lchat_chat9949nscript_idb',
      ),
    ),
  ),
);
?>

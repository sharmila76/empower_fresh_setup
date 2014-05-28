<?php
// created: 2010-06-02 08:30:13
$dictionary["eval_evaluations_calls"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'eval_evaluations_calls' => 
    array (
      'lhs_module' => 'Eval_Evaluations',
      'lhs_table' => 'eval_evaluations',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'eval_evaluations_calls_c',
      'join_key_lhs' => 'eval_evalu7191uations_ida',
      'join_key_rhs' => 'eval_evalue7bclscalls_idb',
    ),
  ),
  'table' => 'eval_evaluations_calls_c',
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
      'name' => 'eval_evalu7191uations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'eval_evalue7bclscalls_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'eval_evaluations_callsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'eval_evaluations_calls_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'eval_evalu7191uations_ida',
        1 => 'eval_evalue7bclscalls_idb',
      ),
    ),
  ),
);
?>

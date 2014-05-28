<?php
// created: 2010-03-02 03:40:29
$dictionary["gaur_candidates_eval_evaluations"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'gaur_candidates_eval_evaluations' => 
    array (
      'lhs_module' => 'gaur_Candidates',
      'lhs_table' => 'gaur_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'Eval_Evaluations',
      'rhs_table' => 'eval_evaluations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gaur_candid_evaluations_c',
      'join_key_lhs' => 'gaur_candi64d6didates_ida',
      'join_key_rhs' => 'gaur_candi51d1uations_idb',
    ),
  ),
  'table' => 'gaur_candid_evaluations_c',
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
      'name' => 'gaur_candi64d6didates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gaur_candi51d1uations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gaur_candidal_evaluationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gaur_candidal_evaluations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gaur_candi64d6didates_ida',
        1 => 'gaur_candi51d1uations_idb',
      ),
    ),
  ),
);
?>

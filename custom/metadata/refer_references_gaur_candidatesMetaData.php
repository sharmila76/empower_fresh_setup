<?php
// created: 2010-02-27 02:18:35
$dictionary["refer_references_gaur_candidates"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'refer_references_gaur_candidates' => 
    array (
      'lhs_module' => 'refer_References',
      'lhs_table' => 'refer_references',
      'lhs_key' => 'id',
      'rhs_module' => 'gaur_Candidates',
      'rhs_table' => 'gaur_candidates',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'refer_referr_candidates_c',
      'join_key_lhs' => 'refer_refe6a13erences_ida',
      'join_key_rhs' => 'refer_refed77ddidates_idb',
    ),
  ),
  'table' => 'refer_referr_candidates_c',
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
      'name' => 'refer_refe6a13erences_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'refer_refed77ddidates_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'refer_referaur_candidatesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'refer_referaur_candidates_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'refer_refe6a13erences_ida',
        1 => 'refer_refed77ddidates_idb',
      ),
    ),
  ),
);
?>

<?php
// created: 2010-02-25 07:29:07
$dictionary["emplo_employer_gaur_candidates"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'emplo_employer_gaur_candidates' => 
    array (
      'lhs_module' => 'emplo_Employer',
      'lhs_table' => 'emplo_employer',
      'lhs_key' => 'id',
      'rhs_module' => 'gaur_Candidates',
      'rhs_table' => 'gaur_candidates',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'emplo_emplor_candidates_c',
      'join_key_lhs' => 'emplo_emplf893mployer_ida',
      'join_key_rhs' => 'emplo_empl6187didates_idb',
    ),
  ),
  'table' => 'emplo_emplor_candidates_c',
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
      'name' => 'emplo_emplf893mployer_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'emplo_empl6187didates_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'emplo_emploaur_candidatesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'emplo_emploaur_candidates_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'emplo_emplf893mployer_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'emplo_emploaur_candidates_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'emplo_empl6187didates_idb',
      ),
    ),
  ),
);
?>

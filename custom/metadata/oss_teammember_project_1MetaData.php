<?php
// created: 2009-11-05 02:12:12
$dictionary["oss_teammember_project_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'oss_teammember_project_1' => 
    array (
      'lhs_module' => 'OSS_TeamMember',
      'lhs_table' => 'oss_teammember',
      'lhs_key' => 'id',
      'rhs_module' => 'Project',
      'rhs_table' => 'project',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'oss_teammemer_project_1_c',
      'join_key_lhs' => 'oss_teamme8760mmember_ida',
      'join_key_rhs' => 'oss_teamme5613project_idb',
    ),
  ),
  'table' => 'oss_teammemer_project_1_c',
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
      'name' => 'oss_teamme8760mmember_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'oss_teamme5613project_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'oss_teammember_project_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'oss_teammember_project_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'oss_teamme8760mmember_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'oss_teammember_project_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'oss_teamme5613project_idb',
      ),
    ),
  ),
);
?>

<?php
// created: 2009-02-13 16:47:41
$dictionary["hrm_employees_hrm_holydays"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hrm_employees_hrm_holydays' => 
    array (
      'lhs_module' => 'HRM_Employees',
      'lhs_table' => 'hrm_employees',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Holydays',
      'rhs_table' => 'hrm_holydays',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hrm_employehrm_holydays_c',
      'join_key_lhs' => 'hrm_employe_employees_ida',
      'join_key_rhs' => 'hrm_employem_holydays_idb',
    ),
  ),
  'table' => 'hrm_employehrm_holydays_c',
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
      'name' => 'hrm_employe_employees_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hrm_employem_holydays_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hrm_employes_hrm_holydaysspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hrm_employes_hrm_holydays_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hrm_employe_employees_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hrm_employes_hrm_holydays_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hrm_employem_holydays_idb',
      ),
    ),
  ),
);
?>

<?php
// created: 2010-02-25 07:30:17
$dictionary["gaur_candidates_activities_calls"] = array (
  'relationships' => 
  array (
    'gaur_candidates_activities_calls' => 
    array (
      'lhs_module' => 'gaur_Candidates',
      'lhs_table' => 'gaur_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'gaur_Candidates',
    ),
  ),
  'fields' => '',
  'indices' => '',
  'table' => '',
);
?>

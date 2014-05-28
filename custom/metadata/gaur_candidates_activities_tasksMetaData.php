<?php
// created: 2010-02-25 07:30:19
$dictionary["gaur_candidates_activities_tasks"] = array (
  'relationships' => 
  array (
    'gaur_candidates_activities_tasks' => 
    array (
      'lhs_module' => 'gaur_Candidates',
      'lhs_table' => 'gaur_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
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

<?php
$dictionary['cases_timesheet']['relationships'] = array('cases_timesheet' => array('lhs_module'=> 'Cases', 'lhs_table'=>'cases', 'lhs_key' => 'id',
'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'parent_id',
'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type', 'relationship_role_column_value'=>'Cases'));
?>
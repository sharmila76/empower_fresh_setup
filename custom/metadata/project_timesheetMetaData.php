<?php
$dictionary['project_timesheet']['relationships'] = array('project_timesheet' => array('lhs_module'=> 'Project', 'lhs_table'=>'project', 'lhs_key' => 'id',
'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'parent_id',
'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type', 'relationship_role_column_value'=>'Project'));
?>
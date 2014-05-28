<?php
$dictionary['projecttask_timesheet']['relationships'] = array('projecttask_timesheet' => array('lhs_module' => 'ProjectTask', 'lhs_table'=>'project_task', 'lhs_key' => 'id',
'rhs_module'=> 'Timesheet', 'rhs_table'=> 'timesheet', 'rhs_key' => 'parent_id',
'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type', 'relationship_role_column_value'=>'ProjectTask'));
?>
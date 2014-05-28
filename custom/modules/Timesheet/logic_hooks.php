<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(99, 'timesheet logic hook', 'modules/Timesheet/countTotalHook.php','countTotalHook', 'doCount'); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(99, 'timesheet logic hook', 'modules/Timesheet/countTotalHook.php','countTotalHook', 'doCountOnDelete'); 



?>
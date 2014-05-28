<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Cases push feed', 'modules/Cases/SugarFeeds/CaseFeed.php','CaseFeed', 'pushFeed'); 
$hook_array['before_save'][] = Array(1, 'cases_contacts', 'custom/modules/Cases/Caseslogic_hooks.php','Caseslogic_hooks', 'createCaseContactRelationship'); 
$hook_array['before_save'][] = Array(99, 'timesheet logic hook for case', 'modules/Timesheet/countTotalHook.php','countTotalHook', 'before_save'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1, 'INSERT_INTO_PM_ENTRY_TABLE', 'modules/PM_ProcessManager/insertIntoPmEntryTable.php','insertIntoPmEntryTable', 'setPmEntryTable'); 



?>
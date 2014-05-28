<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'workflow', 'include/workflow/WorkFlowHandler.php','WorkFlowHandler', 'WorkFlowHandler'); 

$hook_array['process_record'] = Array();
$hook_array['after_retrieve'] = Array();
 	
$hook_array['process_record'][] = array(1, 'job_candidate_no', 'custom/modules/OSS_Job/job_candidate_no.php', 'job_candidate_no', 'job_candidate_no');
$hook_array['after_retrieve'][] = array(1, 'job_candidate_no', 'custom/modules/OSS_Job/job_candidate_no.php', 'job_candidate_no', 'job_candidate_no');

?>

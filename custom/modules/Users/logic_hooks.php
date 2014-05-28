<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_retrieve'][] = Array(1, 'Teams CE Users Extension', 'modules/team/teams_logic.php','teams_logic', 'get_user_teams'); 
$hook_array['after_retrieve'][] = Array(2, 'Teams CE ListView Extension', 'modules/team/teams_logic.php','teams_logic', 'add_list_logic_hook'); 
$hook_array['process_record'] = Array(); 
$hook_array['process_record'][] = Array(1, 'Teams CE Subpanel Extension', 'modules/team/teams_logic.php','teams_logic', 'get_subpanel_user_type'); 
$hook_array['after_ui_frame'][] = Array();
$hook_array['after_ui_frame'][] = Array(1, 'view users', 'custom/modules/Users/Users_view.php', 'Users_view', 'view_own_users');


?>
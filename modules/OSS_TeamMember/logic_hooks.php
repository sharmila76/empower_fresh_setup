<?php
$hook_version = 1;
$hook_array = Array();
$hook_array['before_save'] = Array();
$hook_array['before_save'][] = array(1, 'Mass_call', 'modules/OSS_TeamMember/Report_to_update.php', 'Report_to_update', 'Report_to_massupdate');
?>

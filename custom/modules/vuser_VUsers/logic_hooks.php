<?php

$hook_version = 1;
$hook_array = Array();
$hook_array['before_save'] = array();
$hook_array['before_save'][] = Array(1, 'saveFetchedRow', 'custom/modules/vuser_VUsers/Vendor_users_hooks_class.php', 'vendor_users_hooks_class', 'saveFetchedRow');
$hook_array['after_save'] = Array();
$hook_array['after_save'][] = Array(1, 'send_email_to_users', 'custom/modules/vuser_VUsers/Vendor_users_hooks_class.php', 'vendor_users_hooks_class', 'send_email_to_users');
global $current_user;
//require_once 'custom/include/krumo/class.krumo.php';
//krumo($current_user);
$hook_array['after_ui_frame'][] = Array(1, 'send_email_to_users', 'custom/modules/vuser_VUsers/Vendor_users_hooks_class.php', 'vendor_users_hooks_class', 'send_email_to_users');



?>
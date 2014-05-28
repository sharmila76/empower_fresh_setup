<?php

global $current_user;
global $mod_strings, $app_strings;
$module_menu = array();

$module_menu[]=Array("index.php?module=Addpackage&action=Addpackage&return_module=Addpackage&return_action=ListView", $mod_strings['LNK_ADDPACKAGE']);

$module_menu[]=Array("index.php?module=Addpackage&action=Addfeature", $mod_strings['LNK_ADDFEATURE']);

$module_menu[]=Array("index.php?module=Addpackage&action=Pricing", $mod_strings['LNK_PRICING']);

$module_menu[]=Array("index.php?module=Addpackage&action=Booking", $mod_strings['LNK_BOOKING']);

<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

global $sugar_config;

$admin_option_defs = array();



$admin_option_defs['Administration']['add_package'] = array(
    'ConfigureTabs',
    'LBL_ADD_MODULES_UNDER_SUITE',
    'LBL_ADD_MODULES_UNDER_SUITE_DESC',
    './index.php?action=wizard&module=Studio&wizard=StudioWizard&option=ConfigureGroupTabs'
);

$admin_option_defs['Administration']['add_package1'] = array(
    'Administration',
    'LBL_ADD_SUITE_UNDER_PACKAGE',
    'LBL_ADD_SUITE_UNDER_PACKAGE_DESC',
    './index.php?action=package&module=PC123_Package'
);

$admin_group_header[] = array(
    'LBL_PACKAGE_MANAGEMENT',
    '',
    false,
    $admin_option_defs,
    'LBL_PACKAGE_MANAGEMENT_DESC'
);


<?php
$module_name = 'Rec_Recruitment_Agency';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '18%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'AGENCY_CONTACT_PERSON_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_AGENCY_CONTACT_PERSON',
    'width' => '10%',
  ),
  'MOBILE_C' => 
  array (
    'type' => 'phone',
    'default' => true,
    'label' => 'LBL_MOBILE',
    'width' => '10%',
  ),
  'WEBSITE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_WEBSITE',
    'width' => '10%',
  ),
  'ADDRESS_CITY_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_ADDRESS_CITY',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
);
?>

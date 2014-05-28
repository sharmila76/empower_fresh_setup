<?php
// created: 2013-01-08 11:21:09
$dictionary["Project"]["fields"]["oss_teammember_project"] = array (
  'name' => 'oss_teammember_project',
  'type' => 'link',
  'relationship' => 'oss_teammember_project',
  'source' => 'non-db',
  'vname' => 'LBL_OSS_TEAMMEMBER_PROJECT_FROM_OSS_TEAMMEMBER_TITLE',
  'id_name' => 'oss_teammember_project_oss_teammember_ida',
);
$dictionary["Project"]["fields"]["oss_teammember_project_name"] = array (
  'name' => 'oss_teammember_project_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OSS_TEAMMEMBER_PROJECT_FROM_OSS_TEAMMEMBER_TITLE',
  'save' => true,
  'id_name' => 'oss_teammember_project_oss_teammember_ida',
  'link' => 'oss_teammember_project',
  'table' => 'oss_teammember',
  'module' => 'OSS_TeamMember',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Project"]["fields"]["oss_teammember_project_oss_teammember_ida"] = array (
  'name' => 'oss_teammember_project_oss_teammember_ida',
  'type' => 'link',
  'relationship' => 'oss_teammember_project',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OSS_TEAMMEMBER_PROJECT_FROM_PROJECT_TITLE',
);

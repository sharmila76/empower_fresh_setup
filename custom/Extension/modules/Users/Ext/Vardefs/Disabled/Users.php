<?php
$GLOBALS["dictionary"]["User"]['fields']['default_team'] = 
    array (
      'required' => '0',
      'name' => 'default_team',
      'vname' => 'LBL_DEFAULT_TEAM',
      'type' => 'id',
      'massupdate' => '0',
      'default' => NULL,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '36',
    );

$GLOBALS["dictionary"]["User"]['fields']['default_team_name'] = 
    array (
      'required' => '0',
      'source' => 'non-db',
      'name' => 'default_team_name',
      'vname' => 'LBL_DEFAULT_TEAM',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'default_team',
      'ext2' => 'team',
      'module' => 'team',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    );

$dictionary["User"]["fields"]["team_memberships"] = array (
  'name' => 'team_memberships',
  'type' => 'link',
  'relationship' => 'team_memberships',
  'source' => 'non-db',
);
?>

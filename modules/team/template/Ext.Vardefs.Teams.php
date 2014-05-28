<?php
$GLOBALS["dictionary"]["BEANNAME"]['fields']['team_id'] = 
    array (
      'required' => '0',
      'name' => 'team_id',
      'vname' => 'LBL_TEAM_ID',
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

$GLOBALS["dictionary"]["BEANNAME"]['fields']['team_name'] = 
    array (
      'required' => '0',
      'source' => 'non-db',
      'name' => 'team_name',
      'vname' => 'LBL_TEAM_NAME',
      'type' => 'relate',
      'massupdate' => '0',
      'default' => NULL,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'team_id',
      'ext2' => 'team',
      'module' => 'team',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    );
?>

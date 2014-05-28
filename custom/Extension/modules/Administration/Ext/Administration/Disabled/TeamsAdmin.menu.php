<?php 
$admin_option_defs = array();
$admin_option_defs['TeamsAdmin'] = array(
	'Teams', 'LBL_TEAMS_ADMIN', 'LBL_TEAMS_ADMIN_DESCRIPTION', './index.php?module=team&action=index'
	);

// Loop through the menus and add to the Users group
$tmp_menu_set = false;
foreach ($admin_group_header as $key => $values)
{
	if ($values[0] == 'LBL_USERS_TITLE')
	{
		if ($sugar_config['sugar_version'] < 5.2)
			$admin_group_header[$key][3]['TeamsAdmin'] = $admin_option_defs['TeamsAdmin'];
		else
			$admin_group_header[$key][3]['Administration']['TeamsAdmin'] = $admin_option_defs['TeamsAdmin'];
		$tmp_menu_set = true;
	}
}

// Else create new group
if (!$tmp_menu_set)
	if ($sugar_config['sugar_version'] < 5.2)
		$admin_group_header[] = array('TEAMS_ADMIN_TITLE','',false,$admin_option_defs,'TEAMS_ADMIN_DESC');
	else
		$admin_group_header[] = array('TEAMS_ADMIN_TITLE','',false,array('Administration' => $admin_option_defs),'TEAMS_ADMIN_DESC');
?>

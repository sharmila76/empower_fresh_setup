<?php
	global $db, $current_user, $mod_strings;

	if (!is_admin($current_user))
		sugar_die("Unauthorized access to administration.");

	// Firstly we have to ensure that we have a team "Everyone"
	echo $mod_strings['LBL_CREATING_EVERYONE'] . "<br>\n";
	ob_flush();
	$query = "INSERT IGNORE INTO team (id, name, date_entered, date_modified, modified_user_id, created_by, description, deleted) VALUES ('1','Everyone',now(),now(),'1','1','Everyone',0)";
	$db->query($query);

	// Now we have to ensure that all users belong to team everyone
	echo $mod_strings['LBL_POPULATING_EVERYONE'] . "<br>\n";
	ob_flush();
	$query = "DELETE FROM team_memberships WHERE team_id='1'";
	$db->query($query);
	$query = "INSERT IGNORE INTO team_memberships (id, date_modified, deleted, team_id, user_id, is_manager) SELECT id, now(), deleted, '1', id, 0 FROM users";

	$db->query($query);

	// Delete old reports_to members
	echo $mod_strings['LBL_DELETING_REPORTS_TO'] . "<br>\n";
	ob_flush();
	$query = "DELETE FROM team_memberships where is_manager<>0";
	$db->query($query);

	// Recreate reports_to members
	// This is extremely crude - but it works up to 10 levels
	echo $mod_strings['LBL_RECREATING_REPORTS_TO'] . "<br>\n";
	ob_flush();
	$query = "INSERT IGNORE INTO team_memberships (id, date_modified, deleted, team_id, user_id, is_manager) SELECT DISTINCT md5(concat(team_id,reports_to_id)), now(), 0, team_id, reports_to_id, 1 from team_memberships LEFT JOIN users on user_id=users.id WHERE team_memberships.deleted=0 and users.deleted=0 and reports_to_id is not null and team_id <> '1'";
	for ($i = 1; $i < 10; $i++)
		$db->query($query);

	echo $mod_strings['LBL_DONE'];
?>

<?php
	global $db;

	// Get id's
	$user_id = $_REQUEST['subpanel_id'];
	$team_id = $_REQUEST['record'];

	// Prevent duplicates
	$query = "delete from team_memberships where user_id='$user_id' and team_id='$team_id'";
	$db->query($query);

	// Insert the managers
	while (!empty($user_id))
	{
		$query = "SELECT reports_to_id FROM users where id='$user_id'";
		$res = $db->query($query);
		$row = $db->fetchByAssoc($res);
		$user_id = $row['reports_to_id'];
		if (!empty($user_id))
		{
			// Prevent duplicates
			$query = "DELETE FROM team_memberships WHERE team_id='$team_id' AND user_id='$user_id' AND deleted=1";
			$db->query($query);

			// Insert manager
			$query = "INSERT INTO team_memberships VALUES (uuid(), now(), 0, '$team_id', '$user_id', 1)";
			$db->query($query);
		}
	}

	require "include/generic/Save2.php";
?>

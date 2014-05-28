<?php
	$zuckerreports_config["teams"] = array();

	global $db;
	$query = "select team.id team_id, team.name team_name, users.id user_id, user_name from team left join team_memberships tm on (team.id=tm.team_id) left join users on (tm.user_id=users.id) WHERE team.deleted=0 AND tm.deleted=0 and team.name not like '(%' ORDER BY team.name, users.user_name";
	$res = $db->query($query);
	while ($row = $db->fetchByAssoc($res))
	{
		$zuckerreports_config["teams"][$row['team_id']]["name"] = $row["team_name"];
		$zuckerreports_config["teams"][$row['team_id']]["users"][] = $row["user_name"];
	}

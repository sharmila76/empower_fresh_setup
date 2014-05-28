<?php
global $db, $current_user;

$header  = translate('LBL_SET_DEFAULT_TEAMS','team');
$savebtn = translate('LBL_SAVE_BUTTON','team');
$done    = translate('LBL_DONE','team');

echo "<h2>$header</h2>\n";

if ($_REQUEST['save'] != 'yes')
{
	echo "<FORM ACTION=index.php METHOD=POST>\n";
	echo "<input type=hidden name=module value=team>\n";
	echo "<input type=hidden name=action value=SetDefaultTeams>\n";
	echo "<input type=hidden name=save value=yes>\n";

	echo "<TABLE>\n";
	$prev_user_id = '';
	$i=0;
	$query = "SELECT DISTINCT user_id, team_id, first_name, last_name, team.name, default_team FROM team_memberships LEFT JOIN users on user_id=users.id LEFT JOIN team on team_id=team.id WHERE team_memberships.deleted=0 AND users.deleted=0 AND team.deleted=0 AND users.employee_status='Active' ORDER BY first_name, last_name, user_id";
	$res = $db->query($query);
	while ($row = $db->fetchByAssoc($res))
	{
		if ($row['user_id'] != $prev_user_id)
		{
			if ($prev_user_id != '')
				echo "\t</select>\n</td>\n</tr>\n";

			echo "<tr>\n";
			echo "<td><input name=user$i type=hidden value=".$row['user_id'].">".$row['first_name'].
					" ".$row['last_name']."</td>\n";
			echo "<td>\n\t<select name=team$i>\n";
			$i++;
		}
		if ($row['default_team'] == $row['team_id'])
			echo "\t\t<option value=".$row['team_id']." selected>".$row['name']."</option>\n";
		else
			echo "\t\t<option value=".$row['team_id'].">".$row['name']."</option>\n";
		$prev_user_id = $row['user_id'];
	}
	if ($prev_user_id != '')
		echo "\t</select>\n</td>\n</tr>\n";

	echo "</TABLE>\n";
	echo "<input type=submit value=$savebtn>\n";
}
else
{
	$i=0;
	while (isset($_REQUEST['user'.$i]))
	{
		$user_id = $_REQUEST['user'.$i];
		$team_id = $_REQUEST['team'.$i];
		$query = "UPDATE users set default_team='$team_id' WHERE id='$user_id'";
		if ($db->query($query))
			$i++;
	}
	echo "<br>$done ($i)";
}

<?php
	global $db;

	echo "<h2>" . $mod_strings['LNK_MEMBERS'] . "</h2>\n<br>\n<UL>\n";
	$query = "select id, name from team where deleted=0 and name not like '(%' and id<>'1' and id like '" .
			$_REQUEST[record] . "%' order by name";
	$res = $db->query($query);
	while ($row = $db->fetchByAssoc($res))
	{
		echo "<LI><A HREF=index.php?module=team&action=showAllTeams&record=$row[id]>$row[name]</A>\n";
		$query = "select distinct user_id, users.user_name, first_name, last_name from team_memberships left join users on user_id=users.id where team_id='$row[id]' and team_memberships.deleted=0 order by first_name, last_name";
		$res2 = $db->query($query);
		if ($db->getRowCount($res) > 0)
		{
			echo "<UL>\n";
			while ($row2 = $db->fetchByAssoc($res2))
			{
				echo "<LI>$row2[first_name] $row2[last_name]";
				echo " (<A HREF=index.php?module=Users&action=DetailView&record=$row2[user_id]>$row2[user_name]</A>)\n";
			}
			echo "</UL>\n";
		}
		
	}
?>
</UL>

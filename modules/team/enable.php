<?php
	global $beanFiles, $beanList, $app_list_strings;
	asort($beanList);

	echo "<h2>" . $mod_strings['LBL_TEAM_ENABLE'] . "</h2>\n<br>\n";

	if ($_REQUEST['save'] == 'yes')
	{
		foreach ($beanList as $name => $bean_name)
		{
			if ($name == 'Users' || $name == 'team' ||
					empty($app_list_strings['moduleList'][$name]))
				continue;

			$bean_dir = "custom/Extension/" . dirname($beanFiles[$bean_name]);
			$vardef = $bean_dir . "/Ext/Vardefs/Teams.php";
			$lang   = $bean_dir . "/Ext/Language/en_us.Teams.php";

			if (isset($_REQUEST['enable_' . $name]))
			{
				mkdir_recursive(dirname($vardef));
				$vardef_contents = file_get_contents("modules/team/template/Ext.Vardefs.Teams.php");
				$vardef_contents = str_replace('BEANNAME',$bean_name,$vardef_contents);
				file_put_contents($vardef,$vardef_contents);
				echo $mod_strings['LBL_CREATED'] . " $vardef<br>\n";

				mkdir_recursive(dirname($lang));
				$lang_contents =file_get_contents("modules/team/template/Ext.Language.en_us.Teams.php");
				file_put_contents($lang,$lang_contents);
				echo $mod_strings['LBL_CREATED'] . " $lang<br>\n";
			}
			else
			{
				if (file_exists($vardef))
				{
					unlink($vardef);
					echo $mod_strings['LBL_REMOVED'] . " $vardef<br>\n";
				}
				if (file_exists($lang))
				{
					unlink($lang);
					echo $mod_strings['LBL_REMOVED'] . " $lang<br>\n";
				}
			}
		}
		echo "<br>" . $mod_strings['LBL_COMPLETE_SETUP'] .
			" (<a href='index.php?module=Administration&action=repairSelectModule'>Quick Repair</a>)";
	}
	else
	{
		echo "<form action='index.php' method='post'>\n";
		echo "<input type='hidden' name='module' value='team'>\n";
		echo "<input type='hidden' name='action' value='enable'>\n";
		echo "<input type='hidden' name='save' value='yes'>\n";
		echo "<table><tr><td class='listViewThS1'>" . $mod_strings['LBL_TH_MODULE'] . "</td>";
		echo "<td class='listViewThS1'>" . $mod_strings['LBL_TH_ENABLE'] . "</td></tr>\n";
	
		foreach ($beanList as $name => $bean_name)
		{
			if ($name == 'Users' || $name == 'team' ||
					empty($app_list_strings['moduleList'][$name]))
				continue;

			if (!empty($beanFiles[$bean_name]))
			{
				$bean_dir = "custom/Extension/" . dirname($beanFiles[$bean_name]);
				$vardef = $bean_dir . "/Ext/Vardefs/Teams.php";
				echo "<tr><td>$name:</td>";
				if (file_exists($vardef))
					echo "<td><input type='checkbox' name='enable_$name' checked></td></tr>\n";
				else
					echo "<td><input type='checkbox' name='enable_$name'></td></tr>\n";
			}
		}
		echo "</table>\n";
		echo "<input type='submit' value='Save Changes'>\n";
	}

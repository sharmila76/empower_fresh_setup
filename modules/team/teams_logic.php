<?php
/**
 * Teams module logic hooks
 * 
 * Logic hooks to hook teams into all modules
 * Modules can be team enabled by simple adding a relate field that relate to the Teams module
 * Custom relate field must be called "team" or "team_name" in studio
 * @author Marnus van Niekerk <sugarcrm@mjvn.net>
 * @version 1
 * @package TeamsCE
 */


class teams_logic
{
	function get_user_teams(&$bean, $event, $arguments=null)
	{
		if (!empty($_SESSION['current_user_teams']))
			$bean->teams = $_SESSION['current_user_teams'];
		else
		{
			$bean->teams = array();
			$query = "select team_id from team_memberships where user_id='$bean->id' and deleted=0";
			$res = $bean->db->query($query);
			while ($row = $bean->db->fetchByAssoc($res))
				$bean->teams[] = $row['team_id'];
			$_SESSION['current_user_teams'] = $bean->teams;
		}
	}

	function check_team_access(&$bean, $event, $arguments=null)
	{
		global $current_user;

		// No need to check Users or team - make it faster
		if ($bean->module_dir == 'Users' || $bean->module_dir == 'team')
			return true;

		// Admin users always have access
		if (is_admin($current_user))
			return true;

		// Test for custom team_id field
		// This allows any module to be team enabled by adding a custom relate field to the Teams module
		// The name of the team_id field is built by studio so we have to look it up to be safe
		if (isset($bean->field_name_map['team_name']))
			$team_id = $bean->field_name_map['team_name']['id_name'];
		elseif (isset($bean->field_name_map['team_c']))
			$team_id = $bean->field_name_map['team_c']['id_name'];
		elseif (isset($bean->field_name_map['team_name_c']))
			$team_id = $bean->field_name_map['team_name_c']['id_name'];

		if (isset($bean->$team_id) && $team_id != 'team_id')
			$bean->team_id = $bean->$team_id;

		if (!empty($bean->team_id)				  // Allow access if empty team_id
			&& isset($current_user->teams)			  // Allow access if user's teams not set
			&& $bean->assigned_user_id != $current_user->id   // Always allow assigned user access ???
			&& count(array_keys($current_user->teams,$bean->team_id)) < 1) // Not a team member
				$bean->id = NULL;	// This will display "Could not retrieve...

		// Prevent empty editview if user go directly to edit
		if (is_null($bean->id) && $_REQUEST['action'] == 'EditView')
			header ("Location: index.php?module=".$_REQUEST['module']."&action=DetailView&record=".
					$_REQUEST['record']);
	}

	/* 
	   Add the team_id columns to the searchfields for a listview
	   This influences $this->where on line 225 of include/MVC/View/views/view.list.php
	   which causes a filterd listview based on teams
	   This is needed because there is no other way of limiting the listviews
	*/
	function limit_list_access(&$view, $event, $arguments=null)
	{
		global $current_user;

		// Admin users always have access
		if (is_admin($current_user))
			return true;

		if (!empty($view->bean->field_name_map['team_name']))
			$team_id_field = $view->bean->field_name_map['team_name']['id_name'];
		elseif (!empty($view->bean->field_name_map['team_c']))
			$team_id_field = $view->bean->field_name_map['team_c']['id_name'];
		elseif (!empty($view->bean->field_name_map['team_name_c']))
			$team_id_field = $view->bean->field_name_map['team_name_c']['id_name'];
		
		if (!empty($team_id_field))
		{
			if ($_REQUEST['searchFormTab'] == 'basic_search')
			{
				$team_id_field .= '_basic';
				$_REQUEST[$team_id_field] = $current_user->teams;
			}
			elseif ($_REQUEST['searchFormTab'] == 'advanced_search' || $_REQUEST['action'] == 'Popup')
			{
				$team_id_field .= '_advanced';
				$_REQUEST[$team_id_field] = $current_user->teams;
			}
			else
				$view->where = "$team_id_field in ('" . implode("','",$current_user->teams) . "')";
		}
	}


	function set_default_team_bean(&$bean, $event, $arguments=null)
	{
		global $current_user;
		if (empty($bean->team_id))
			$bean->team_id = $current_user->default_team;
	}

	function add_list_logic_hook(&$bean, $event, $arguments=null)
	{
		if ($_REQUEST['action'] == 'index' || $_REQUEST['action'] == 'ListView')
		{
			$module = $_REQUEST['module'];
			$listviewdefsFile = "custom/modules/$module/metadata/listviewdefs.php";
			if (!file_exists($listviewdefsFile))
			{
				if (!file_exists("modules/$module/metadata/listviewdefs.php"))
					return;
				require_once("include/dir_inc.php");
				mkdir_recursive("custom/modules/$module/metadata");
				$contents = file_get_contents("modules/$module/metadata/listviewdefs.php");
				file_put_contents($listviewdefsFile,$contents);
			}
			$stampFile = "cache/modules/$module/teams_listview_logic.stamp";
			if (!file_exists($stampFile) ||
				filemtime($listviewdefsFile) > filemtime($stampFile))
			{
				//The listviewdefs.php needs updateding
				$contents = file_get_contents($listviewdefsFile);
				if (!preg_match('/\?\>/',$contents))
					$contents .= "\n?" . ">\n";
				$contents .= file_get_contents("modules/team/template/listviewdefs.ext.php");
				$stamp = gmdate('c');
				file_put_contents($listviewdefsFile,$contents);
				file_put_contents($stampFile,$stamp);
			}
		}

		if ($_REQUEST['action'] == 'Popup')
		{
			$module = $_REQUEST['module'];
			$popupdefsFile = "custom/modules/$module/metadata/popupdefs.php";
			if (!file_exists($popupdefsFile))
			{
				if (!file_exists("modules/$module/metadata/popupdefs.php"))
					return;
				require_once("include/dir_inc.php");
				mkdir_recursive("custom/modules/$module/metadata");
				$contents = file_get_contents("modules/$module/metadata/popupdefs.php");
				file_put_contents($popupdefsFile,$contents);
			}
			$stampFile = "cache/modules/$module/teams_popup_logic.stamp";
			if (!file_exists($stampFile) ||
				filemtime($popupdefsFile) > filemtime($stampFile))
			{
				//The popupdefs.php needs updateding
				$contents = file_get_contents($popupdefsFile);
				if (!ereg('\?\>',$contents))
					$contents .= "\n?" . ">\n";
				$contents .= file_get_contents("modules/team/template/listviewdefs.ext.php");
				$stamp = gmdate('c');
				file_put_contents($popupdefsFile,$contents);
				file_put_contents($stampFile,$stamp);
			}
		}
	}

	function get_subpanel_user_type(&$bean, $event, $arguments=null)
	{
		if ($_REQUEST['module'] != 'team')
			return true;

		// We look up the is_manager field in the relationship table and then
		// 	abuse an existing field (user_name) to display it on the subpanel
		// 	that way we do not need a custom field on Users
		global $db;
		$query = "SELECT is_manager FROM team_memberships where team_id='" . $_REQUEST['record'] .
				"' AND user_id='$bean->id' and deleted=0 order by is_manager";
		$res = $db->query($query);
		$row = $db->fetchByAssoc($res);
		if ($row['is_manager'] > 0)
			$bean->user_name = translate('LBL_MANAGER','team');
		else
			$bean->user_name = translate('LBL_MEMBER','team');

		if (!empty($bean->reports_to_id) && !empty($bean->reports_to_name))
			$bean->reports_to_name = "<A HREF='index.php?module=Users&action=DetailView&record=$bean->reports_to_id'>$bean->reports_to_name</A>";
	}

}
?>

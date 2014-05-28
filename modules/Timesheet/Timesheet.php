<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class Timesheet extends Basic {
    var $importable = true;
	var $field_name_map = array();
	// Stored fields
  var $id;
  var $name;
  var $date_entered;
  var $date_modified;
  var $modified_user_id;
  var $modified_by_name;
  var $created_by;
  var $created_by_name;
  var $description;
  var $deleted;
  var $created_by_link;
  var $modified_user_link;
  var $assigned_user_id;
  var $assigned_user_name;
  var $assigned_user_link;



	/*
  var $id;
	var $date_entered;
  var $date_modified;
	var $assigned_user_id;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
  var $assigned_user_name;
  var $description;
  */

  var $parent_type;
	var $parent_id;
  var $parent_name;

  // used in Reports module only
  var $account_id;
  var $project_id;
  //

  var $disable_row_level_security = true;


  var $text_for_bill;
  var $actual;
  var $date_booked;
  var $status;
  var $billable;

	var $module_dir = "Timesheet";
	var $table_name = "timesheet";
	var $new_schema = true;
	var $object_name = "Timesheet";

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array('assigned_user_name', 'assigned_user_id', 'parent_name');



	function Timesheet() {
		parent::Basic();

		//$this->team_id = 1; // make the item globally accessible

    if (strtolower(@$_REQUEST['action']) == 'savematrix' || strtolower(@$_REQUEST['action']) == 'savedailymatrix') {
      @$this->process_save_dates = false;
    }

    /*if (empty($this->date_booked)) {
      global $timedate;
      $this->date_booked = $timedate->to_display_date(date("Y-m-d", time()));
    }*/
	}

  // this function is used in track viewer
  function get_summary_text() {
    return $this->date_booked . ": ".$this->actual."h";
  }

  function create_export_query(&$order_by, &$where) {
    $modules = array('Project' => '', 'ProjectTask' => '', 'Cases' => '');
    $sql = array();
    $custom_join = $this->custom_fields->getJOIN();

    // if user has indicated filter for Project and/or Project Task and/or Case
    $module_filter_on = false;

    if ($where != '') {
      // remove Project, Project Task from export if
      // Account filter is set
      // leave Cases only
      if (preg_match("/(join_account_name\.name like [\'\"]+.+?[\'\"]+)/i", $where)) {
        $where = preg_replace("/(join_account_name\.name like ([\'\"]+.+?[\'\"]+))/i", "accounts.name like $2", $where, 1);
        $modules = array('Cases' => '');
        $module_filter_on = true;
      }

      // Setup Project/Project Task/Case/Account filter
      preg_match_all("/parent\.([^ ]+)/i", $where, $regs);
      if (!empty($regs[0])) {
        $module_filter_on = true;
        for ($i = 0; $i < count($regs[0]); $i++) {
          switch ($regs[1][$i]) {
            case 'project':
              if (isset($modules['Project'])) {
                $modules['Project'] = preg_replace("|".$regs[0][$i]."|", $regs[1][$i].'.name', $where, 1);
              }
            break;

            case 'project_task':
              if (isset($modules['ProjectTask'])) {
                $modules['ProjectTask'] = preg_replace("|".$regs[0][$i]."|", $regs[1][$i].'.name', $where, 1);
              }
            break;

            case 'cases':
              $modules['Cases'] = preg_replace("|".$regs[0][$i]."|", $regs[1][$i].'.name', $where, 1);
            break;
          }
        }
      }
      else {
        foreach ($modules as $mod => $wh) {
          $modules[$mod] = $where;
        }
      }
    }

    foreach ($modules as $mod => $wh) {
      // do not include SQL for module
      // if where is empty
      // and if there are not just Cases
      if (count($modules) > 1) {
        if ($module_filter_on && $wh == '') {
          continue;
        }
      }

      switch ($mod) {
        case 'Project':
          $select = "project.name project, '' as project_task, '' as `case`";
          $join = " INNER JOIN project ON project.id = timesheet.parent_id AND timesheet.parent_type='Project' LEFT JOIN users ON $this->table_name.assigned_user_id=users.id ";
          $where = $wh;
        break;

        case 'ProjectTask':
          $select = "project.name project, project_task.name project_task, '' as `case`";
          $join = " INNER JOIN project_task ON project_task.id = timesheet.parent_id AND timesheet.parent_type='ProjectTask' LEFT JOIN project ON project.id = project_task.project_id LEFT JOIN users ON $this->table_name.assigned_user_id=users.id ";
          $where = $wh;
        break;

        case 'Cases':
          $select = "'' as project, '' as project_task, cases.name `case`";
          $join = " INNER JOIN cases ON cases.id = timesheet.parent_id AND timesheet.parent_type='Cases' INNER JOIN accounts ON cases.account_id = accounts.id LEFT JOIN users ON $this->table_name.assigned_user_id=users.id ";
          $where = $wh;
        break;
      }

      $query = "SELECT $this->table_name.id, ";
      $query .= "users.user_name as employee, ".$select.", timesheet.actual, timesheet.billable, timesheet.date_booked, timesheet.status, timesheet.text_for_bill, timesheet.description";
      if ($custom_join) {
        $query .= $custom_join['select'];
      }
      $query .= " FROM $this->table_name ";
      $query .= $join;
      if ($custom_join) {
        $query .= $custom_join['join'];
      }
      $where_auto = '1=1';
      if(@$show_deleted == 0){
        $where_auto = " $this->table_name.deleted=0 ";
      } else if(@$show_deleted == 1) {
        $where_auto = "$this->table_name.deleted=1";
      }
      if ($where != "") {
        $query .= "where $where AND ".$where_auto;
      }
      else {
        $query .= "where ".$where_auto;
      }

      if ($order_by != "")
        $query .=  " ORDER BY ". $this->process_order_by($order_by, null);
      else
        $query .= " ORDER BY $this->table_name.date_entered DESC";
      $sql[] = $query;
    }
    $query = "(".join(") UNION ALL (", $sql).")";
		return $query;
	}

    function _get_num_rows_in_query($query) {
        $query = preg_replace("/^\(/", "", $query);
        return parent::_get_num_rows_in_query($query);
    }

	function fill_in_additional_list_fields() {
    $this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields() {
    // Fill in the assigned_user_name
		$this->assigned_user_name = get_assigned_user_name($this->assigned_user_id);

    $this->created_by_name = get_assigned_user_name($this->created_by);
		$this->modified_by_name = get_assigned_user_name($this->modified_user_id);

    $this->fill_in_additional_parent_fields();
  }

  function fill_in_additional_parent_fields()
	{
		global $app_strings;
		$this->parent_name = '';
    $query = false;

		if ($this->parent_type == "Project") {
      $query = "SELECT name FROM project WHERE id='$this->parent_id'";
    }
    else if ($this->parent_type == 'Cases') {
      $query = "SELECT name FROM cases WHERE id='$this->parent_id'";
    }
    else if ($this->parent_type == 'ProjectTask') {
      $query = "SELECT name FROM project_task WHERE id='$this->parent_id'";
    }

    if ($query) {
      $result = $this->db->query($query,true, $app_strings['ERR_CREATING_FIELDS']);

      // Get the id and the name.
      $row = $this->db->fetchByAssoc($result);
      if ($row && !empty($row['name'])){
        $this->parent_name = $row['name'];
      }
    }
  }

  function get_list_view_data() {
    $fields = $this->get_list_view_array();
    if (!empty($this->parent_name)) {
      $fields['PARENT_NAME'] = $this->parent_name;
		}
    return $fields;
  }

  // defines whether we have project/case leader
  function hasPermission($user) {
    if ($this->parent_type == 'ProjectTask') {
      $query = "SELECT p.assigned_user_id FROM project_task pt INNER JOIN project p ON pt.project_id = p.id  WHERE pt.id = '$this->parent_id'";
    }
    else if ($this->parent_type == 'Cases') {
      $query = "SELECT a.assigned_user_id FROM cases c INNER JOIN accounts a ON c.account_id = a.id WHERE c.id = '$this->parent_id'";
    }
    else {
      $query = "SELECT assigned_user_id FROM ".strtolower($this->parent_type)." WHERE id = '$this->parent_id'";
    }
    $result = $this->db->query($query, true);
    $row = $this->db->fetchByAssoc($result);
    if ($row && ($row['assigned_user_id'] == $user->id || is_admin($user))) {
      return true;
    }
    return false;
  }

  function create_new_list_query($order_by, $where, $filter = array(), $params = array(), $show_deleted = 0, $join_type='', $return_array = false, $parentbean, $singleSelect = false) {

    $ret_arr = parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect);

    if ($parentbean->object_name == 'Timesheet') {
      // Attach Account Filter for Cases only
      if (preg_match("/(accounts\.name like [\'\"]+.+?[\'\"]+)/i", $ret_arr['where'], $m)) {
        $ret_arr['where'] = str_replace($m[1], "timesheet.parent_type='Cases' AND " . $m[1], $ret_arr['where']);
      }
      preg_match_all("/parent\.([^ ]+)/i", $ret_arr['where'], $regs);
      $orig_where = $where;
      if (!empty($regs[0])) {
        for ($i = 0; $i < count($regs[0]); $i++) {
          $ret_arr['where'] = preg_replace("|".$regs[0][$i]."|", $regs[1][$i].'.name', $ret_arr['where'], 1);

          $ret_arr['select'] .= ", ".$regs[1][$i].".name ".$regs[1][$i]."_name ";
          $ret_arr['from'] .= " LEFT JOIN ".$regs[1][$i]." ON ".$regs[1][$i].".id = timesheet.parent_id ";
        }
      }
    }
    return $ret_arr;
  }

	function bean_implements($interface) {
		switch($interface) {
			case 'ACL':return true;
		}
		return false;
	}

  function getAssignedParents($userid) {
    global $app_list_strings;

    $admin = new Administration();
    $admin->retrieveSettings('timesheet');

    $enable_security_groups = class_exists('SecurityGroup');
    if ($enable_security_groups && isset($admin->settings['timesheet_enable_security_groups'])) {
      $enable_security_groups = !empty($admin->settings['timesheet_enable_security_groups']);
    }

    $enable_teams = class_exists('Team');
    if ($enable_teams && isset($admin->settings['timesheet_enable_teams'])) {
      $enable_teams = !empty($admin->settings['timesheet_enable_teams']);
    }

    $ret = array();

    //
    // select Projects
    //
    $status_list = $app_list_strings['project_status_dom'];
    if (isset($admin->settings['timesheet_project_status'])) {
      // selected items
      $status_list = unserialize(base64_decode($admin->settings['timesheet_project_status']));
      // array of deselected items
      $status_list2 = array();

      // use those list (selected or deselected items) which has less items
      foreach ($app_list_strings['project_status_dom'] as $k => $v) {
        if (!in_array($k, $status_list)) {
          $status_list2[$v] = $k;
        }
      }
      if (count($status_list) > count($status_list2)) {
        $status_where = " p.status NOT IN ('".join("','", $status_list2)."') OR p.status IS NULL ";
      }
      else {
        $status_where = " p.status IN ('".join("','", $status_list)."') OR p.status IS NULL ";
      }
    }
    else {
      $status_where = "1=1";
    }
    // group/owner where
    $where = "1=1";
    if (!$enable_teams && !$enable_security_groups) {
        $where = "p.assigned_user_id = '$userid'";
    }
    if ($enable_security_groups) {
      $where = SecurityGroup::getGroupWhere('p', 'Project', $userid);
    }
    $q[] = "SELECT p.id, p.name, 'Project' as type FROM project p " . ($enable_teams ? self::addTeamSecurity('p', $userid) : '') . " WHERE (".$where.") AND p.deleted = 0 AND (".$status_where.")";

    //
    // select not completed Project Tasks w/ related Projects
    //
    $status_list = $app_list_strings['project_task_status_options'];
    if (isset($admin->settings['timesheet_project_task_status'])) {
      // selected items
      $status_list = unserialize(base64_decode($admin->settings['timesheet_project_task_status']));
      // array of deselected items
      $status_list2 = array();

      // use those list (selected or deselected items) which has less items
      foreach ($app_list_strings['project_task_status_options'] as $k => $v) {
        if (!in_array($k, $status_list)) {
          $status_list2[$v] = $k;
        }
      }
      if (count($status_list) > count($status_list2)) {
        $status_where = " pt.status NOT IN ('".join("','", $status_list2)."') OR pt.status IS NULL ";
      }
      else {
        $status_where = " pt.status IN ('".join("','", $status_list)."') OR pt.status IS NULL ";
      }
    }
    else {
      $status_where = "1=1";
    }
    // group/owner where
    $where = "1=1";
    if (!$enable_teams && !$enable_security_groups) {
        $where = "pt.assigned_user_id = '$userid'";
    }
    if ($enable_security_groups) {
      $where = SecurityGroup::getGroupWhere('pt', 'ProjectTask', $userid);
    }
    $q[] = "SELECT pt.id, pt.name, 'ProjectTask' as type, p.id as parent_id, p.name as parent_name, 'Project' as parent_type FROM project_task pt " . ($enable_teams ? self::addTeamSecurity('pt', $userid) : '') . " LEFT JOIN project p ON pt.project_id = p.id WHERE (".$where.") AND pt.deleted = 0 AND (".$status_where.") ORDER BY pt.project_task_id ";
    //AND (pt.percent_complete != '100' OR pt.percent_complete IS NULL)";

    //
    // select not closed Cases w/ related Accounts
    //
    $status_list = $app_list_strings['case_status_dom'];
    if (isset($admin->settings['timesheet_cases_status'])) {
      // selected items
      $status_list = unserialize(base64_decode($admin->settings['timesheet_cases_status']));
      // array of deselected items
      $status_list2 = array();

      // use those list (selected or deselected items) which has less items
      foreach ($app_list_strings['case_status_dom'] as $k => $v) {
        if (!in_array($k, $status_list)) {
          $status_list2[$v] = $k;
        }
      }
      if (count($status_list) > count($status_list2)) {
        $status_where = " c.status NOT IN ('".join("','", $status_list2)."') OR c.status IS NULL ";
      }
      else {
        $status_where = " c.status IN ('".join("','", $status_list)."') OR c.status IS NULL ";
      }
    }
    else {
      $status_where = "1=1";
    }
    // group/owner where
    $where = "1=1";
    if (!$enable_teams && !$enable_security_groups) {
        $where = "c.assigned_user_id = '$userid'";
    }
    if ($enable_security_groups) {
      $where = SecurityGroup::getGroupWhere('c', 'Cases', $userid);
    }
    $q[] = "SELECT c.id, c.name, 'Cases' as type, a.id as account_id, a.name as account_name, 'Accounts' as parent_type FROM cases c " . ($enable_teams ? self::addTeamSecurity('c', $userid) : '') . " LEFT JOIN accounts a ON c.account_id = a.id WHERE (".$where.") AND c.deleted = 0 AND (".$status_where.")";

    foreach ($q as $query) {
      $result = $this->db->query($query);
      while ($row = $this->db->fetchByAssoc($result)) {
        $ret[] = $row;
      }
    }
    return $ret;
  }

  function getUserTimesheets($userid, $date) {
    $ret = array();
    $q = "SELECT id, parent_id, actual, description, date_booked FROM {$this->table_name} WHERE deleted = 0 AND assigned_user_id = '$userid' AND date_booked >= '".$date[0]."' AND date_booked <= '".$date[1]."'";
    $result = $this->db->query($q);
    while ($row = $this->db->fetchByAssoc($result)) {
      $ret[$row['parent_id']][$row['date_booked']] = array('id' => $row['id'], 'actual' => $row['actual'], 'description' => $row['description']);
    }
    return $ret;
  }

  function get_projects_array() {
    global $current_user;
    $ret = array();

    $q = "SELECT id, name FROM project WHERE deleted = 0";
    if (!is_admin($current_user)) {
      $q .= " AND assigned_user_id = '$current_user->id'";
    }
    $result = $GLOBALS['db']->query($q);
    while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
      $ret[$row['id']] = $row['name'];
    }
    return $ret;
  }

  function getTotals($args) {
    global $current_user, $timedate;
    $ret = array('actual' => 0, 'billable' => 0, 'entries' => array());

    $args['date_start'] = $timedate->to_db_date($args['date_start'], false);
    $args['date_end'] = $timedate->to_db_date($args['date_end'], false);
//SELECT `id`, `name`, `date_entered`, `date_modified`, `modified_user_id`, `created_by`, `description`, `deleted`, `assigned_user_id`, `account_id`, `project_id`, `actual`, `billable`, `text_for_bill`, `status`, `date_booked`, `parent_type`, `parent_id`, `start_time_c`, `end_time_c` FROM `timesheet` t join `timesheet_cstm` c on c.id_c = t.id
    //$q = "SELECT id FROM project WHERE assigned_user_id = '$current_user->id' AND id = '".$args['project_id']."' AND deleted = 0";
    //if ($GLOBALS['db']->getOne($q)) {
      $q = "SELECT SUM(t.actual) actual, SUM(t.billable) billable FROM timesheet t WHERE t.deleted = 0 AND (t.parent_id = '".$args['project_id']."' OR t.parent_id IN (SELECT pt.id FROM project_task pt INNER JOIN project p ON pt.project_id = p.id WHERE p.id = '".$args['project_id']."' AND pt.deleted = 0))";

      $date_where = '';
      if (!empty($args['date_start']) && !empty($args['date_end'])) {
        $date_where .= "t.date_booked BETWEEN CAST('".$args['date_start']."' AS DATE) AND CAST('".$args['date_end']."' AS DATE)";
      }
      else if (!empty($args['date_start'])) {
        $date_where .= "CAST('".$args['date_start']."' AS DATE) BETWEEN CAST('".$args['date_start']."' AS DATE) AND t.date_booked";
      }
      else if (!empty($args['date_end'])) {
        $date_where .= "t.date_booked BETWEEN t.date_booked AND CAST ('".$args['date_end']."' AS DATE)";
      }

      if ($date_where != '') {
        $q .= " AND ($date_where) ";
      }

      if (!empty($args['user_id'])) {
        $q .= " AND t.assigned_user_id = '".$args['user_id']."'";
      }
      $q .= " GROUP BY t.parent_id";

      $result = $GLOBALS['db']->query($q);
      while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
        if (isset($row['actual'])) {
          $ret['actual'] += $row['actual'];
        }
        if (isset($row['billable'])) {
          $ret['billable'] += $row['billable'];
        }
      }

      $assigned_user_id = "";
      if (!empty($args['user_id'])) {
        $assigned_user_id = "t.assigned_user_id = '".$args['user_id']."' AND ";
      }

      $entries = array();

      $q = "SELECT p.name parent_name, t.parent_type, t.date_booked, t.parent_id, t.actual, t.description, tc.start_time_c, tc.end_time_c, IFNULL(t.billable, 0) billable, u.user_name, u.id user_id FROM timesheet t JOIN timesheet_cstm tc ON t.id = tc.id_c INNER JOIN project p ON t.parent_id = p.id LEFT JOIN users u ON t.assigned_user_id = u.id WHERE $assigned_user_id t.deleted = 0 AND t.parent_id = '".$args['project_id']."'";
      
      
      if ($date_where != '') {
        $q .= " AND ($date_where) ";
      }
      $res = $GLOBALS['db']->query($q);
      while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
        $entries[] = $row;
      }

      $q = "SELECT pt.name parent_name, pt.project_id, t.parent_type, t.date_booked, t.parent_id, t.actual, t.description, IFNULL(t.billable, 0) billable, u.user_name, u.id user_id FROM timesheet t INNER JOIN project_task pt ON t.parent_id = pt.id LEFT JOIN users u ON t.assigned_user_id = u.id WHERE $assigned_user_id t.deleted = 0 AND t.parent_id IN (SELECT pt.id FROM project_task pt INNER JOIN project p ON pt.project_id = p.id WHERE p.id = '".$args['project_id']."' AND pt.deleted = 0)";
      if ($date_where != '') {
        $q .= " AND ($date_where) ";
      }
      echo $q;
      $res = $GLOBALS['db']->query($q);
      while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
        $entries[] = $row;
      }
      $ret['entries'] = $entries;
    //}
      //print_r($ret);
    return $ret;
  }

  function loadTimesheet($fields_array = array()) {
    $where_clause = "WHERE ";
    $first = 1;
    foreach ($fields_array as $name=>$value) {
      if ($first) {
        $first = 0;
      } else {
        $where_clause .= " AND ";
      }
      if ($name == 'date_booked') {
        $where_clause .= "CAST(date_booked AS DATE) = CAST('".$this->db->quote($value,false)."' AS DATE)";
      }
      else {
        $this->$name = $value;
        $where_clause .= "$name = '".$this->db->quote($value,false)."'";
      }
    }
    $where_clause .= " AND deleted=0";
    //$id = $this->db->getOne("SELECT id FROM {$this->table_name} $where_clause");
    $queryresult = $this->db->query("SELECT id FROM {$this->table_name} $where_clause");
    if ($queryresult) {
      $row = $this->db->fetchByAssoc($queryresult);
      if ( $row ) {
        $id = array_shift($row);
      }
    }

    if (!empty($id)) {
      $this->retrieve($id);
    }
  }

  public static function addTeamSecurity($alias, $userid, $join_type = 'INNER') {
      $query = $join_type . " JOIN (select tst.team_set_id from team_sets_teams tst "
             . $join_type . " JOIN team_memberships tm ON tst.team_id = tm.team_id
                                    AND tm.user_id = '$userid'
                                    AND tm.deleted=0 GROUP BY tst.team_set_id) {$alias}_tf ON {$alias}_tf.team_set_id  = {$alias}.team_set_id ";
      return $query;
  }
}
?>

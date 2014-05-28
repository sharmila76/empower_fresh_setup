<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

//require_once('modules/Users/Forms.php');
//require_once('modules/Configurator/Configurator.php');

class ViewActivity extends SugarView {
  /**
   * Constructor.
   */
  //public function __construct()
//	{
//		parent::SugarView();
//
  //      $this->options['show_header'] = false;
  //    $this->options['show_footer'] = false;
  //  $this->options['show_javascript'] = false;
  //}

  /**
   * @see SugarView::display()
   */
  public function display() {
    global $timedate, $current_user;

    $args = array();
    $this->ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    if($current_user->id == 1) {
      $this->ss->assign("USER_FILTER", get_select_options_with_id(get_user_array(true), $user_id));
    }
    else {
      $current_user_id = $current_user->id;
      $this->ss->assign('CURRENT_USER_ID', $current_user_id);
      $current_user_name = $current_user->name;
      $this->ss->assign('CURRENT_USER_NAME', $current_user_name);
    }
    
    $user_id = NULL;
    if (!empty($_REQUEST['user_id'])) {
      $user_id = $_REQUEST['user_id'];
    }
    $date_start = NULL;
    if (!empty($_REQUEST['start_date'])) {
      $date_start = $_REQUEST['start_date'];
    }
    $date_end = NULL;
    if (!empty($_REQUEST['end_date'])) {
      $date_end = $_REQUEST['end_date'];
    }
    if ($user_id) {
      // return result
      $args['user_id'] = $user_id;
      $args['start_date'] = $date_start;
      $args['end_date'] = $date_end;
      $this->ss->assign('USERS_ACTIVITY', $this->get_users_activity($args, 0));
      $name = $this->get_users_activity($args, 0);
    }
    if (!empty($_REQUEST['export_result'])) {
      $user_id = NULL;
      if (!empty($_REQUEST['user_id'])) {
        $user_id = $_REQUEST['user_id'];
      }
      $date_start = NULL;
      if (!empty($_REQUEST['start_date'])) {
        $date_start = $_REQUEST['start_date'];
      }
      $date_end = NULL;
      if (!empty($_REQUEST['end_date'])) {
        $date_end = $_REQUEST['end_date'];
      }
      if ($user_id) {
        // return result
        $args['user_id'] = $user_id;
        $args['start_date'] = $date_start;
        $args['end_date'] = $date_end;
        $get_activity = $this->get_users_activity($args, 1);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=link_point_report.csv');
        $output = fopen('php://memory', 'w+');
        fputcsv($output, array('User Name', 'Viewed module', 'Module summary', 'Viewed date'));
        foreach ($get_activity as $line) {
          fputcsv($output, $line);
        }
        ob_clean();
        flush();
        rewind($output);
        $csv_output = stream_get_contents($output);
        fclose($output);
        die($csv_output);
      }
    }
    $this->ss->display($this->getCustomFilePathIfExists('modules/UsersActivity/tpls/activity.tpl'));
  }

  function get_users_activity($args, $export) {
    if ($export == 1) {
      global $current_user, $timedate;
      $args['start_date'] = $timedate->to_db_date($args['start_date'], false);
      $args['end_date'] = $timedate->to_db_date($args['end_date'], false);

      $q = "SELECT u.user_name, t.module_name, t.item_summary, t.date_modified FROM tracker t JOIN users u ON u.id='" . $args['user_id'] . "' WHERE t.deleted = 0 AND (t.user_id = '" . $args['user_id'] . "' )";

      $date_where = '';
      if (!empty($args['start_date']) && !empty($args['end_date'])) {
        $date_where .= "t.date_modified BETWEEN CAST('" . $args['start_date'] . "' AS DATE) AND CAST('" . $args['end_date'] . "' AS DATE)";
      } else if (!empty($args['start_date'])) {
        $date_where .= "CAST('" . $args['start_date'] . "' AS DATE) BETWEEN CAST('" . $args['start_date'] . "' AS DATE) AND t.date_modified";
      } else if (!empty($args['end_date'])) {
        $date_where .= "t.date_modified BETWEEN t.date_modified AND CAST ('" . $args['end_date'] . "' AS DATE)";
      }

      if ($date_where != '') {
        $q .= " AND ($date_where) ";
      }

      $entries = array();
      $res = $GLOBALS['db']->query($q);
      while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
        $entries[] = $row;
      }
      if ($entries) {
        return $entries;
      }
    }
    
    
    global $current_user, $timedate;
    $args['start_date'] = $timedate->to_db_date($args['start_date'], false);
    $args['end_date'] = $timedate->to_db_date($args['end_date'], false);

    $q = "SELECT t.item_id, t.item_summary, t.module_name, t.action, t.date_modified, u.user_name FROM tracker t JOIN users u ON u.id='" . $args['user_id'] . "' WHERE t.deleted = 0 AND (t.user_id = '" . $args['user_id'] . "' )";

    $date_where = '';
    if (!empty($args['start_date']) && !empty($args['end_date'])) {
      $date_where .= "t.date_modified BETWEEN CAST('" . $args['start_date'] . "' AS DATE) AND CAST('" . $args['end_date'] . "' AS DATE)";
    } else if (!empty($args['start_date'])) {
      $date_where .= "CAST('" . $args['start_date'] . "' AS DATE) BETWEEN CAST('" . $args['start_date'] . "' AS DATE) AND t.date_modified";
    } else if (!empty($args['end_date'])) {
      $date_where .= "t.date_modified BETWEEN t.date_modified AND CAST ('" . $args['end_date'] . "' AS DATE)";
    }

    if ($date_where != '') {
      $q .= " AND ($date_where) ";
    }

    $entries = array();
    $res = $GLOBALS['db']->query($q);
    while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
      $entries[] = $row;
    }
    if ($entries) {
      return $entries;
    } else {
      return 0;
    }
  }

}

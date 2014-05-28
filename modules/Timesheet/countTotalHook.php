<?php
class countTotalHook
{
  // before_save is used in Cases, Project and ProjectTask
  function before_save(&$bean, $event, $arguments)
  {
    global $current_user;

    // total actual and total billable hours should not be editable
    $bean->actual_c = @$bean->fetched_row['actual_c'];
    $bean->billable_c = @$bean->fetched_row['billable_c'];

    // budget field could be edited by Project leader only
    switch ($bean->object_name) {
      case 'Case':
        $q = "SELECT assigned_user_id FROM accounts WHERE id = '{$bean->account_id}'";
        $assigned_user_id = $bean->db->getOne($q);
        $condition = $current_user->id != $assigned_user_id;
      break;

      case 'Project':
        $condition = $current_user->id != $bean->assigned_user_id;
      break;

      case 'ProjectTask':
        if (!empty($bean->project_id)) {
          $q = "SELECT assigned_user_id FROM project WHERE id = '{$bean->project_id}'";
          $assigned_user_id = $bean->db->getOne($q);
          $condition = $current_user->id != $assigned_user_id;
        }
        else {
          $condition = $current_user->id != $bean->assigned_user_id;
        }
      break;
    }
    if ($condition && !is_admin($current_user)) {
      $bean->budget_c = @$bean->fetched_row['budget_c'];
    }
  }

  // doCount is used to count total actual, total billable afford
  // when Timesheet record is being saved
  function doCount(&$bean, $event, $arguments)
  {
    // check whether it is TimesheetTimer object
    if ($bean->object_name == 'TimesheetTimer')
      return;

    // timesheet table name
    $tbl = $bean->table_name;

    // timesheet parent id
    $id = $bean->parent_id;

    $actual = "IFNULL(SUM(actual), 0)";
    $billable = "IFNULL(SUM(billable), 0)";

    $actual2 = $billable2 = 0;

    if (!empty($bean->fetched_row['actual'])) {
      $actual2 = -$bean->fetched_row['actual'];
    }
    $actual2 += $bean->actual;

    if (!empty($bean->fetched_row['billable'])) {
      $billable2 -= $bean->fetched_row['billable'];
    }
    if (!empty($bean->billable)) {
      $billable2 += $bean->billable;
    }

    $new_record = empty($bean->fetched_row['id']) && true;

    switch ($bean->parent_type) {
      // timesheet is created for Case:
      // count all timesheet records for that Case
      case 'Cases':
        $q = "SELECT ($actual + $actual2) as actual_sum, ($billable + $billable2) as billable_sum FROM $tbl WHERE parent_id = '$id' AND deleted = 0 GROUP BY parent_id";
        $result = $bean->db->query($q);
        $row = $bean->db->fetchByAssoc($result);
        if ($row && is_array($row)) {
          $q = "UPDATE cases_cstm SET actual_c = '".$row['actual_sum']."', billable_c = '".$row['billable_sum']."' WHERE id_c = '$id'";
        }
        else if ($new_record) {
          $q = "INSERT INTO cases_cstm SET id_c = '$id', actual_c = '$actual2', billable_c = '$billable2'";
        }
        $bean->db->query($q);

        // set account_id in timesheet table for compliance w/ Reports module
        $q = "SELECT account_id FROM cases WHERE id = '$id' AND deleted = '0'";
        if ($account_id = $bean->db->getOne($q)) {
          $bean->account_id = $account_id;
        }
      break;

      // timesheet is created for ProjectTask
      // count all timesheet records for that ProjectTask plus
      // count all timesheet records for parent Project
      // (projects' timesheets + projects' project tasks timesheets)
      case 'ProjectTask':
        // count all timesheet related to ProjectTask
        $q = "SELECT ($actual + $actual2) as actual_sum, ($billable + $billable2) as billable_sum FROM $tbl WHERE parent_id = '$id' AND deleted = 0 GROUP BY parent_id";
        $result = $bean->db->query($q);
        $row = $bean->db->fetchByAssoc($result);
        if ($row && is_array($row)) {
          $q = "UPDATE project_task_cstm SET actual_c = '".$row['actual_sum']."', billable_c = '".$row['billable_sum']."' WHERE id_c = '$id'";
        }
        else if (!$bean->db->getOne("SELECT count(*) FROM project_task_cstm WHERE id_c = '$id'")) {
          $q = "INSERT INTO project_task_cstm SET id_c = '$id', actual_c = '$actual2', billable_c = '$billable2'";
        }
        else {
          $q = "UPDATE project_task_cstm SET actual_c = '$actual2', billable_c = '$billable2' WHERE id_c = '$id'";
        }
        $bean->db->query($q);

        // count all timesheet related to ProjectTasks' Project
        // check whether ProjectTask has parent Project
        $q = "SELECT p.id FROM project p INNER JOIN project_task pt ON p.id = pt.project_id WHERE pt.id = '$id'";
        if ($p_id = $bean->db->getOne($q)) {
          // count totals from project tasks
          $q = "SELECT $actual as actual_sum, $billable as billable_sum FROM $tbl WHERE parent_id IN (SELECT pt.id FROM project_task pt INNER JOIN project p ON p.id = pt.project_id WHERE p.id = '$p_id' AND pt.deleted = 0) AND deleted = 0 GROUP BY parent_id";
          $result = $bean->db->query($q);
          while ($row = $bean->db->fetchByAssoc($result)) {
            $actual2 += $row['actual_sum'];
            $billable2 += $row['billable_sum'];
          }

          // count totals from parent project
          $q = "SELECT $actual as actual_sum, $billable as billable_sum FROM $tbl WHERE parent_id = '$p_id' AND deleted = 0 GROUP BY parent_id";
          $result = $bean->db->query($q);
          $row = $bean->db->fetchByAssoc($result);
          if ($row && is_array($row)) {
            $actual2 += $row['actual_sum'];
            $billable2 += $row['billable_sum'];
          }

          // save totals into project
          $q = "SELECT count(*) FROM project_cstm WHERE id_c = '$p_id'";
          if ($bean->db->getOne($q)) {
            $q = "UPDATE project_cstm SET actual_c = '$actual2', billable_c = '$billable2' WHERE id_c = '$p_id'";
          }
          else {
            $q = "INSERT INTO project_cstm SET id_c = '$p_id', actual_c = '$actual2', billable_c = '$billable2'";
          }
          $bean->db->query($q);

          // set project_id in timesheet table for compliance w/ Reports module
          $bean->project_id = $p_id;

          // set account_id if applicable
          $q = "SELECT a.id FROM project p LEFT JOIN projects_accounts pr ON p.id = pr.project_id LEFT JOIN accounts a ON pr.account_id = a.id AND pr.deleted = 0 AND a.deleted = 0 WHERE p.id = '$p_id'";
          if ($account_id = $bean->db->getOne($q)) {
            $bean->account_id = $account_id;
          }
        }
      break;

      // timesheet is created for Project
      // count all totals from all timesheet records related to Project plus
      // count all totals from all timesheet records related to Projects' Project Tasks
      case 'Project':
        // count all timesheet records related to Project
        $q = "SELECT ($actual + $actual2) as actual_sum, ($billable + $billable2) as billable_sum FROM $tbl WHERE parent_id = '$id' AND deleted = 0 GROUP BY parent_id";
        $result = $bean->db->query($q);
        $row = $bean->db->fetchByAssoc($result);
        if ($row && is_array($row)) {
          $actual2 = $row['actual_sum'];
          $billable2 = $row['billable_sum'];
        }

        // count all timesheet records related to Projects' Project Tasks
        $q = "SELECT $actual as actual_sum, $billable as billable_sum FROM $tbl WHERE parent_id IN (SELECT id FROM project_task WHERE project_id = '$id' AND deleted = 0) AND deleted = 0 GROUP BY parent_id";
        $result = $bean->db->query($q);
        while ($row = $bean->db->fetchByAssoc($result)) {
          $actual2 += $row['actual_sum'];
          $billable2 += $row['billable_sum'];
        }
        // save totals into project
        $q = "SELECT count(*) FROM project_cstm WHERE id_c = '$id'";
        if ($bean->db->getOne($q)) {
          $q = "UPDATE project_cstm SET actual_c = '$actual2', billable_c = '$billable2' WHERE id_c = '$id'";
        }
        else {
          $q = "INSERT INTO project_cstm SET id_c = '$id', actual_c = '$actual2', billable_c = '$billable2'";
        }
        $bean->db->query($q);

        // set project_id in timesheet table for compliance w/ Reports module
        $bean->project_id = $id;

        // set account_id if applicable
        $q = "SELECT a.id FROM project p LEFT JOIN projects_accounts pr ON p.id = pr.project_id LEFT JOIN accounts a ON pr.account_id = a.id AND pr.deleted = 0 AND a.deleted = 0 WHERE p.id = '$id'";
        if ($account_id = $bean->db->getOne($q)) {
          $bean->account_id = $account_id;
        }
      break;
    }
  }

  // doCount is used to count total actual, total billable afford
  // when Timesheet record is being deleted
  function doCountOnDelete(&$bean, $event, $arguments)
  {
    // check whether it is TimesheetTimer object
    if ($bean->object_name == 'TimesheetTimer')
      return;

    if (empty($bean->billable)) {
      $bean->billable = 0;
    }
    switch ($bean->parent_type) {
      case 'Cases':
        $q = "UPDATE cases_cstm SET actual_c = (actual_c - $bean->actual), billable_c = (billable_c - $bean->billable) WHERE id_c = '{$bean->parent_id}'";
        $bean->db->query($q);
      break;

      case 'ProjectTask':
        $q = "UPDATE project_task_cstm SET actual_c = (actual_c - $bean->actual), billable_c = (billable_c - $bean->billable) WHERE id_c = '{$bean->parent_id}'";
        $bean->db->query($q);

        $q = "UPDATE project_cstm SET actual_c = (actual_c - $bean->actual), billable_c = (billable_c - $bean->billable) WHERE id_c = (SELECT project_id FROM project_task WHERE id = '{$bean->parent_id}')";
        $bean->db->query($q);
      break;

      case 'Project':
        $q = "UPDATE project_cstm SET actual_c = (actual_c - $bean->actual), billable_c = (billable_c - $bean->billable) WHERE id_c = '{$bean->parent_id}'";
        $bean->db->query($q);
      break;
    }
  }
}
?>
<?php
require_once('include/MVC/Controller/SugarController.php');

class TimesheetController extends SugarController
{
  public function action_save() {
    if (!empty($this->bean->fetched_row['parent_id']) &&
        $this->bean->fetched_row['parent_id'] != $this->bean->parent_id) {
        // if we have changed the parent id, make correct calculations for
        // total efforts
        // before delete hook will be fired
        // and calculate total for previous parent object
        $bean = new Timesheet;
        $arr = $this->bean->toArray();
        foreach ($arr as $k => $v) {
            if ($k != 'id') {
                $bean->$k = $v;
            }
        }
        $bean->save(!empty($this->bean->notify_on_save));

        // restore original record
        $this->bean->retrieve($this->bean->id);
        $this->bean->mark_deleted($this->bean->id);

        // initialize newly created timesheet
        $this->bean->retrieve($bean->id);
        $this->return_id = $bean->id;
    }
    else {
        parent::action_save();
    }
  }

  public function action_savesettings() {
    $admin = new Administration();
    $admin->retrieveSettings('timesheet');

    $enable_security_groups = class_exists('SecurityGroup');
    if (isset($_POST['enable_security_groups'])) {
      $enable_security_groups = !empty($_POST['enable_security_groups']);
    }
    $admin->saveSetting('timesheet', 'enable_security_groups', ($enable_security_groups?'1':'0'));

    $enable_teams = class_exists('Team');
    if (isset($_POST['enable_teams'])) {
      $enable_teams = !empty($_POST['enable_teams']);
    }
    $admin->saveSetting('timesheet', 'enable_teams', ($enable_teams?'1':'0'));

    if (isset($_POST['project_status']) && is_array($_POST['project_status'])) {
      $admin->saveSetting('timesheet', 'project_status', base64_encode(serialize($_POST['project_status'])));
    }

    if (isset($_POST['project_task_status']) && is_array($_POST['project_task_status'])) {
      $admin->saveSetting('timesheet', 'project_task_status', base64_encode(serialize($_POST['project_task_status'])));
    }

    if (isset($_POST['cases_status']) && is_array($_POST['cases_status'])) {
      $admin->saveSetting('timesheet', 'cases_status', base64_encode(serialize($_POST['cases_status'])));
    }

    $this->set_redirect('index.php?module=Timesheet&action=index');
    $this->redirect();
  }
}
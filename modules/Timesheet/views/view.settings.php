<?php
require_once 'include/MVC/View/SugarView.php';
class TimesheetViewSettings extends SugarView {
  public function display() {
    include_once 'modules/Timesheet/Settings.php';
  }
}
<?php
require_once 'include/MVC/View/SugarView.php';
class TimesheetViewEditDailyMatrix extends SugarView {
  public function display() {
    include_once 'modules/Timesheet/EditDailyMatrix.php';
  }
}
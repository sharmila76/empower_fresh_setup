<?php
require_once 'include/MVC/View/SugarView.php';
class TimesheetViewEditMatrix extends SugarView {
  public function display() {
    include_once 'modules/Timesheet/EditMatrix.php';
  }
}
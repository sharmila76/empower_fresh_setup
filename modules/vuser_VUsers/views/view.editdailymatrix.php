<?php
require_once 'include/MVC/View/SugarView.php';
class vuser_VUsersViewEditDailyMatrix extends SugarView {
  public function display() {
    include_once 'modules/vuser_VUsers/EditDailyMatrix.php';
  }
}
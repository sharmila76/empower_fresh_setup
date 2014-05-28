<?php

require_once('include/MVC/Controller/SugarController.php');
require_once("include/Sugar_Smarty.php");

class SugarlogController extends SugarController {

  public function action_log() {
    $file = file_get_contents('sugarcrm.log');
    print_r($file);
  }

}

<?php

//This is the module for my practise only

class ControllerMymodule extends SugarController {
  public function preProcess() {
    parent::preProcess();
    global $current_user;
    if(!is_admin($current_user)) {
      echo 'You are not an admin';
      sugar_die();
    }
  }
}



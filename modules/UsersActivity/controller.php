<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');
require_once("include/OutboundEmail/OutboundEmail.php");

class UsersActivityController extends SugarController {

  protected function action_activity() {
    $this->view = 'activity';
    //SugarApplication::redirect("index.php?module=Users&record=".$_REQUEST['record']."&action=DetailView"); //bug 48170]
  }

  protected function action_package() {
    $this->view = 'package';
    //SugarApplication::redirect("index.php?module=Users&record=".$_REQUEST['record']."&action=DetailView"); //bug 48170]
  }

  protected function action_packageFeature() {
    $this->view = 'packageFeature';
    //SugarApplication::redirect("index.php?module=Users&record=".$_REQUEST['record']."&action=DetailView"); //bug 48170]
  }

  protected function action_redirect() {
    $this->view = 'activity';
    $this->set_redirect('index.php?module=UsersActivity&action=activity');
    $this->redirect();
  }
}

?>

<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class ViewPackages extends SugarView {

  var $message = 'Choose Packages!';

  public function __construct() {
    parent::SugarView();
  }

  public function preDisplay() {

    if (isset($_REQUEST['message']))
      $this->message = $_REQUEST['message'];
  }

  public function display() {
    echo "<p>{$this->message}</p>";
    $sugar_version = 89;
    $this->ss->assign('SUGAR_VERSION', $sugar_version);
    $this->ss->display($this->getCustomFilePathIfExists('modules/Users/tpls/packages.tpl'));
    
  }

}

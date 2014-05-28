<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

class ViewPackageFeature extends SugarView {

  /**
   * Constructor.
   */
  public function __construct() {
    parent::SugarView();
    $this->options['show_header'] = false;
    $this->options['show_footer'] = false;
    $this->options['show_javascript'] = false;
  }

  public function preDisplay() {
    global $current_user, $moduleList;
    //print_r($moduleList);
    if (!is_admin($current_user)) {
      sugar_die("Unauthorized access to administration.");
    }
    }

  public function display() {
    parent::display();
    if (!empty($_REQUEST['feature_code'])) {
      $feature_code = $_REQUEST['feature_code'];
    }
    if (!empty($_REQUEST['feature_name'])) {
      $feature_name = $_REQUEST['feature_name'];
    }
    if (!empty($_REQUEST['package'])) {
      //serialize function will convert selected values into storable db values.
      //retrieving datas from db, do unserialize function.
      $package = serialize($_REQUEST['package']);
    }
    //Insert values into the DB.
    
    $this->ss->assign('name', $package);
    $this->ss->display($this->getCustomFilePathIfExists('modules/UsersActivity/tpls/packageFeature.tpl'));
  }
}

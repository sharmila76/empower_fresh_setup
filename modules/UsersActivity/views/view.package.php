<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

//require_once('modules/Users/Forms.php');
//require_once('modules/Configurator/Configurator.php');

class ViewPackage extends SugarView {

  /**
   * Constructor.
   */
  public function __construct() {
    parent::SugarView();

    //$this->options['show_header'] = false;
    //$this->options['show_footer'] = false;
    //$this->options['show_javascript'] = false;
  }

  public function preDisplay() {
    global $current_user, $moduleList;
    //print_r($moduleList);
    if (!is_admin($current_user)) {
      sugar_die("Unauthorized access to administration.");
    }
    $q = "SELECT pa.module_name FROM package_amount pa";
    $entries = array();
    $res = $GLOBALS['db']->query($q);
    while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
      $entries[] = $row['module_name'];
    }    
    foreach ($moduleList as $module) {
      if(!in_array($module, $entries)) {
        $this->insert_module_into_table($module);       
      }
    }
    //TODO: delete module name from the DB if the maodule name doesn't exist in the $moduleList'
  }

  public function display() {
    parent::display();
    global $moduleList;
    $q = "SELECT pa.module_name, pa.amount FROM package_amount pa";
    $res = $GLOBALS['db']->query($q);
    while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
      $entries[] = $row;
    }
    $this->ss->assign('modules', $entries);
    $this->ss->display($this->getCustomFilePathIfExists('modules/UsersActivity/tpls/package.tpl'));
  }
  
  protected function insert_module_into_table($module) {
    $insert_string="INSERT into package_amount (module_name, amount, deleted) VALUES ('$module', 0, 0)";
		$GLOBALS['log']->debug("Insert :".$insert_string);
    
		$res = $GLOBALS['db']->query($insert_string);    
  }
}

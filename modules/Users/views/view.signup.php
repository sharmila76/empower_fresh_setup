<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

class ViewSignup extends SugarView {

  public function __construct() {
    parent::SugarView();
    //$this->options['show_header'] = false;
    //$this->options['show_footer'] = false;
    //$this->options['show_javascript'] = false;
  }

  public function display() {
    //echo "<p>signup page</p>";
    //$themeObject = SugarThemeRegistry::current();
		//$css = $themeObject->getCSS();
		//$this->ss->assign('SUGAR_CSS', $css);
    //TODO: have a look at custom modules/users/views/view.classic.php. included css file. but it is not working.
    $this->ss->display($this->getCustomFilePathIfExists('modules/Users/tpls/signup.tpl'));
  }

}

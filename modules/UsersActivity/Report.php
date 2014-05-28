<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('XTemplate/xtpl.php');

$xtpl=new XTemplate('modules/UsersActivity/Report.html');
$name = NULL;
if (!empty($_REQUEST['export_result'])) {
  $name = $_REQUEST['export_result'];
}
$xtpl->assign("name", $name);

$xtpl->parse("main.name");
$xtpl->out("main");

?>

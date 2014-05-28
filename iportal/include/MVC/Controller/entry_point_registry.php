<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

// Davi - this line overrides the default Sugar download entryPoint
$entry_point_registry['download'] = array('file' => 'iportal_download.php', 'auth' => true);
$entry_point_registry['TreeData'] = array('file' => 'iportalTreeData.php', 'auth' => true);
$entry_point_registry['iportalTreeData'] = array('file' => 'iportalTreeData.php', 'auth' => true);


?>

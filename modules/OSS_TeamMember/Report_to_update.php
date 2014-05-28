<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

 
	class Report_to_update{ 
		function Report_to_massupdate(&$bean, $event, $arguments) {
			global $db;
			global $timedate;
			global $current_user;
			

			if($_POST['action']=="MassUpdate"){
					$bean->report_to=$_POST['report_to'];
					$bean->user_id1_c=$_POST['user_id1_c'];
				
				}
		}
}

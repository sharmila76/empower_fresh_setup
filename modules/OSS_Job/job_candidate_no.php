<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('data/SugarBean.php');
require_once('include/utils.php');
include_once('include/database/DBManager.php');
include_once('include/database/DBHelper.php');

class job_candidate_no
{
	
	function job_candidate_no(&$bean, $event, $arguments)
	{
		global $current_user;
		$db =& $GLOBALS['db'];
			
		$query = "select 
							count(gaur_candica79didates_ida) as rowCount 
				  from 
				  			gaur_candidates_oss_job_c 
				  where  
				  			gaur_candi6b6eoss_job_idb='".$bean->id."' AND deleted= 0";

		
		$result 			= $db->query($query); 
		$row_records 			=  $bean->db->fetchByAssoc($result);
		$bean->noofcandidate_c = $row_records['rowCount'] ;
				
	}
	
	
}
?>

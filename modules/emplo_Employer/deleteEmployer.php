<?php
	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	
	require_once('modules/gaur_Candidates/gaur_Candidates.php');
	require_once('modules/emplo_Employer/emplo_Employer.php');
	require_once('modules/Relationships/Relationship.php');


	$r = new Relationship();
	$r->retrieve_by_name('emplo_employer_gaur_candidates');
	
	//*** Delete employer which are marked as deleted=1 ***//
	$deleteEmployer = "delete from ".$r->lhs_table." where deleted=1";
	$GLOBALS['db']->query($deleteEmployer);
	
	//*** Delete employer relationship with candidate which are marked as deleted=1 ***//
	$deleteEmployer = "delete from ".$r->join_table." where deleted=1";
	$GLOBALS['db']->query($deleteEmployer);
	
	
	$deleteEmployer = "select emp.id employer_id, count(emp_candidate.id) count_candidate from ".$r->lhs_table." emp LEFT JOIN ".$r->join_table." emp_candidate ON  emp.id=".$r->join_key_lhs." group by emp.id having count_candidate=0";
	
	$result_map = $GLOBALS['db']->query($deleteEmployer);
	
	while($data = $GLOBALS['db']->fetchByAssoc($result_map)){
		$employer_id = $data['employer_id'];
		
		$delete_employer = "delete from ".$r->lhs_table." where id = '$employer_id'";
		//echo $delete_employer.'<hr>';
		$result_delete = $GLOBALS['db']->query($delete_employer); 
	}
	
	


?> 

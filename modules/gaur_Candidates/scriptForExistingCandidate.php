<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
global $current_user;
global $db;

$sql1 = "select e.id as email_id,e.parent_id,gc.id as can_id from emails e 
inner join gaur_candidates gc on e.parent_id=gc.id 
inner join email_addr_bean_rel eab on eab.bean_id=gc.id
where e.parent_type='gaur_Candidates'";

//echo $sql1."<br>" ;

$result = $db->query($sql1);

while($row1=$db->fetchByAssoc($result)){	
	
	
	$sql4 = "select id from notes where parent_type='Emails' and parent_id='".$row1['email_id']."'";
		
		//echo "sql4====".$sql4."<br><br><br>";
		
		$result4 = $db->query($sql4);
		$row4=$db->fetchByAssoc($result4);	
		$count_rec4 = $db->getRowCount($result4);
		//echo "count_rec4====".$count_rec4."<br><br><br>";
		
		
		
		if($count_rec4>0)	{
			$sql5 = "update notes set parent_id='".$row1['can_id']."', parent_type='gaur_Candidates' where id='".$row4['id']."'";
			
			//echo "sql5====".$sql5."<br><br><br>";
			
			$db->query($sql5);
		}
	
	
}
?>

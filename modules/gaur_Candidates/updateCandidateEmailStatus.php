<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
global $current_user;
global $db;

$sql1 = "select e.id,e.parent_id,e.parent_type,et.from_addr, et.to_addrs from emails e inner join emails_text et on e.id=et.email_id where et.to_addrs like '%careers@osscube.com%' and (e.parent_id='' OR e.parent_id IS NULL) and (e.parent_type='' OR e.parent_type IS NULL) and e.deleted=0 and et.deleted=0";

//echo $sql1;


//echo $sql1."<br>" ;

$result = $db->query($sql1);

while($row1=$db->fetchByAssoc($result)){	
	//$row1['from_addr']="srikanth lahanday <lahanday.srikanth@gmail.com>";
	//echo $row1['from_addr']."<br>";	
	$email = $row1['from_addr'];
	$regexp ='/([A-z0-9_\.\-]*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4})/i';// "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
	
	preg_match($regexp, $email,$matches);
	
	/*echo $matches[0];
	
	echo "<br>";
	echo "<br>";*/
	
		
	/*//preg_match('/<([a-z]*@*[a-z]*.*[a-z])/i', $from_addr,$matches); 
	//preg_match('/([a-z0-9]*@[a-z]*.*[a-z])/i', $row1['from_addr'],$matches); 
	preg_match('/([a-z0-9_\.\-]*@[a-z]*.*[a-z])/i', $row1['from_addr'],$matches); 
	
	echo "<pre>";
	
	print_r($matches);
	*/
	$from_addr =  $matches[0];
	//echo $from_addr."<br>" ;	
	
 	$sql2 = "select ea.id,ea.email_address,eab.bean_id from email_addresses ea inner join email_addr_bean_rel eab on ea.id=eab.email_address_id where eab.bean_module='gaur_Candidates' and ea.deleted=0 and eab.deleted=0 and ea.email_address='".$from_addr."'";
 	 	
 	//echo $sql2."<br><br>" ;
 	
 	$result2 = $db->query($sql2);
	$row2=$db->fetchByAssoc($result2);	
	$count_rec = $db->getRowCount($result2);
	//echo $count_rec."<br><hr><br>" ;
	if($count_rec>0){
		$sql3 = "update emails set parent_id='".$row2['bean_id']."', parent_type='gaur_Candidates' where id='".$row1['id']."'";
		$db->query($sql3);
	//	echo "sql3====".$sql3."<br><br><br>";
		
		
		$sql4 = "select id from notes where parent_type='Emails' and parent_id='".$row1['id']."'";
		
	//	echo "sql4====".$sql4."<br><br><br>";
		
		$result4 = $db->query($sql4);
		$row4=$db->fetchByAssoc($result4);	
		$count_rec4 = $db->getRowCount($result4);
		//echo "count_rec4====".$count_rec4."<br><br><br>";
		
		
		
		if($count_rec4>0)	{
			$sql5 = "update notes set parent_id='".$row2['bean_id']."', parent_type='gaur_Candidates' where id='".$row4['id']."'";
			
			//echo "sql5====".$sql5."<br><br><br>";
			
			$db->query($sql5);
		}
		//exit;
	}	
}

			$query = "select
                                                        emplo_emplf893mployer_ida as employee_id, count(emplo_empl6187didates_idb) as rowCount
                                  from
                                                        emplo_emplor_candidates_c
                                  where
                                                        deleted= 0 group by emplo_emplf893mployer_ida";

                        $result = $db->query($query);
                        while($rowCount = $db->fetchByAssoc($result)){
				$selectQuery = "select id_c from emplo_employer_cstm where id_c='".$rowCount['employee_id']."'";
				$resultQuery = $db->query($selectQuery);
				if($db->getRowCount($resultQuery)>0){
	                                $db->query("update emplo_employer_cstm set noofcandidates_c='".$rowCount['rowCount']."' where id_c='".$rowCount['employee_id']."'");
				}else{
					$db->query("insert into emplo_employer_cstm(id_c,noofcandidates_c) values('".$rowCount['employee_id']."','".$rowCount['rowCount']."')");
				}
                        }

?>

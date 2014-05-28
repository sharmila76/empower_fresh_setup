<?php

/********************************************************************************
 * The contents of this file are subject to the SugarCRM Enterprise Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-enterprise-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

 require_once('include/MVC/View/views/view.edit.php');
 
 
 require_once('modules/Eval_Evaluations/Eval_Evaluations.php');
 require_once('modules/gaur_Candidates/gaur_Candidates.php');
  
class Eval_EvaluationsViewEdit extends ViewEdit {
	
 	function Eval_EvaluationsViewEdit(){
 		parent::ViewEdit();
 	}
	
 	
	 function preDisplay() {
 				
        parent::preDisplay();
        
		
        
       
    } 
	
	
	function display() {
		global $db;
		//echo $this->bean->oss_teammember_id_c;
		if($this->bean->id==""){
			if($_REQUEST["return_module"]=="gaur_Candidates"){
				$objCandidate= new gaur_Candidates;
				$objCandidate->retrieve($_REQUEST["return_id"]);
				
					
				$this->bean->nameofcandidate_c=$objCandidate->last_name;
				$this->bean->gaur_candidates_id_c=$objCandidate->id;
				
				//$this->bean->nameofevaluator_c = $objCandidate->assigned_user_name;
				//$this->bean->oss_teammember_id_c = $objCandidate->assigned_user_id;
				
				
				$this->ev->fieldDefs['nameofcandidate_c']['value']=$this->bean->nameofcandidate_c;
				$this->ev->fieldDefs['gaur_candidates_id_c']['value']=$this->bean->gaur_candidates_id_c;
			}
			
		
			//require_once("modules/OSS_TeamMember/OSS_TeamMember.php");

			//$user_id = $objCandidate->assigned_user_id;
		
			$select_name = "select id, first_name ,last_name, salutation from oss_teammember where user_id_c='".$GLOBALS['current_user']->id."'";
			$result = $db->query($select_name);
			$row = $db->fetchByAssoc($result) ;
		
			$name = $row['salutation']." ".$row['first_name']." ".$row['last_name'];
				
			$this->bean->nameofevaluator_c = $name;
			$this->bean->oss_teammember_id_c = $row['id'];
			$this->ev->fieldDefs['nameofevaluator_c']['value']=$name;			
			$this->ev->fieldDefs['oss_teammember_id_c']['value']=$row['id'];
		}
 	
 		parent::display();
 	}
}
?>

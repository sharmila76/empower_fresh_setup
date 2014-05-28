<?php
/*
 * Created on Jul 30, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require_once('include/MVC/Controller/SugarController.php');
class OBJ_ConditionsController extends SugarController
{
    function action_check_audit() {
    	

		global $beanFiles, $beanList;
	    
	    
	    $indicator_id = $_REQUEST['indicator_id'];
	    $field_name = $_REQUEST['attribute_value'];
	    
	    $indicator = new OBJ_Indicators();
	    $indicator->retrieve($indicator_id);
	    
	    $related_bean = $indicator->object;
    

	    require_once($beanFiles[$beanList[$related_bean]]);	
	    $new_bean = new $beanList[$related_bean]();
	    
		$id_audit = $new_bean->field_name_map[$field_name]['audited'];
	    
	    $result=array('result'=>'');
	    if($id_audit == true){
	    	$result['result'] = 1;
	    }else{
	    	$result['result'] = 0;
	    }
	    	
		echo json_encode($result);
		sugar_die(); 
			  
	    }
}
?>

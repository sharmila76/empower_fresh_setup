<?php
require_once('include/ListView/ListViewSmarty.php');

class OSS_TeamMemberListViewSmarty extends ListViewSmarty {

        function OSS_TeamMemberListViewSmarty(){
			parent::ListViewSmarty();
        }

	/*function displayEnd() {
		global $app_strings;
		global $current_user;
		
		$str = '';
		if($this->show_mass_update_form) {
			if($this->showMassupdateFields){
				$json = getJSONobj();
				$qsUser = array(  'method' => 'get_user_array', // special method
						'field_list' => array('user_name', 'id'),
						'populate_list' => array('report_to', 'user_id1_c'),
						'conditions' => array(array('name'=>'user_name','op'=>'like_custom','end'=>'%','value'=>'')),
						'limit' => '30','no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);

						$qsUser['populate_list'] = array('report_to', 'user_id1_c');
						
				
				
				$str .= $this->mass->getMassUpdateForm();
				
				$str .= "<div><table cellspacing=0 cellpadding=0 border=0 width=\"100%\" class=\"tabForm\">";
				$str .= "<br><tr><td id='report_to_label' class='dataLabel' width='12%' valign='top'	> Reports to: </td><td nowrap='' width='20%' class='dataField'>
				<input id='report_to' class='sqsEnabled' type='text' autocomplete='' title='' value='' size='' tabindex='1' name='report_to'/>
				<img id='ext-gen18' class='x-form-trigger x-form-arrow-trigger' src='themes/default/images/blank.gif' style='display: none;'/>
				<input type=\"hidden\" name=\"user_id1_c\" id=\"user_id1_c\" value=\"\" tabindex=\"240\"/>
				<input class='button' type='button' onclick='open_popup(\"Users\", 600, 400, \"\", true, false, {\"call_back_function\":\"set_return\",\"form_name\":\"MassUpdate\",\"field_to_name_array\":{\"id\":\"user_id1_c\",\"name\":\"report_to\"}}, \"single\", true);' value='Select' accesskey='T' title='Select [Alt+T]' tabindex='1' name='btn_report_to'/>
				<input class='button' type='button' value='Clear' onclick='this.form.report_to.value = \'\'; this.form.user_id1_c.value = \'\';' accesskey='C' title='Clear [Alt+C]' tabindex='1' name='btn_clr_report_to'/></td>'</tr></table></div>";
				$str .= '<script type="text/javascript" language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'report_to\'] = ' .
						$json->encode($qsUser) . '; registerSingleSmartInputListener(document.getElementById(\'report_to\'));
				addToValidateBinaryDependency(\'MassUpdate\', \'report_to\', \'alpha\', false, \'' . $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_ASSIGNED_TO'] . '\',\'user_id1_c\');
				</script>';
			}
		}
		$str .= $this->mass->endMassUpdateForm();
		return $str;
        }*/
        

}

?>

<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
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
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/



require_once('iportal/include/generic/SugarWidgets/SugarWidgetField.php');

class SugarWidgetSubPanelEmailLink extends SugarWidgetField {

	function displayList(&$layout_def) {
		global $current_user;
		global $beanList;
		global $focus;
		global $sugar_config;
		
		if(isset($layout_def['varname'])) {
			$key = strtoupper($layout_def['varname']);
		} else {
			$key = $this->_get_column_alias($layout_def);
			$key = strtoupper($key);
		}
		$value = $layout_def['fields'][$key];
		
		

			if(isset($_REQUEST['action'])) $action = $_REQUEST['action'];
			else $action = '';

			if(isset($_REQUEST['module'])) $module = $_REQUEST['module'];
			else $module = '';

			if(isset($_REQUEST['record'])) $record = $_REQUEST['record'];
			else $record = '';

			if (!empty($focus->name)) {
				$name = $focus->name;
			} else {
				if( !empty($focus->first_name) && !empty($focus->last_name)) {
					$name = $focus->first_name . ' '. $focus->last_name;
				} else {
					if(!empty($focus->last_name)) {
						$name = $focus->last_name;
					} else {
						$name = '*';
					}
				}
			}
							
			$userPref = $current_user->getPreference('email_link_type');
			$defaultPref = $sugar_config['email_default_client'];
			if($userPref != '') {
				$client = $userPref;
			} else {
				$client = $defaultPref;
			}
			
			
			if($client == 'sugar') 
			{				
			    $fullComposeUrl = 'load_id='.$layout_def['fields']['ID'].
					'&load_module='. $this->layout_manager->defs['module_name'] . 
					'&parent_type='.$this->layout_manager->defs['module_name'].
					'&parent_id='.$layout_def['fields']['ID'];
                    if(isset($layout_def['fields']['FULL_NAME'])){
					   $fullComposeUrl .= '&parent_name='.urlencode($layout_def['fields']['FULL_NAME']);
                    }
					$fullComposeUrl .= '&return_module='.$module.'&return_action='.$action.'&return_id='.$record;
					
					//Generate the compose package for the quick create options.
                    $json = getJSONobj();
    		        $j_quickComposeOptions = $json->encode( array('composeOptionsLink' => $fullComposeUrl,'id' => $layout_def['fields']['ID']) );	
    		        $link = "<a href='javascript:void(0);' onclick='SUGAR.quickCompose.init($j_quickComposeOptions);'>";
			} else {
				$link = '<a href="mailto:' . $value .'" >';
			}

			return $link.$value.'</a>';
		
	}
} // end class def
?>





















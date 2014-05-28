<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
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
require_once('iportal/include/IportalEditView/IportalEditView2.php');
class SubpanelQuickCreate{
	var $defaultProcess = true;
	
	function SubpanelQuickCreate($module, $view='QuickCreate', $proccessOverride = false){

		// locate the best viewdefs to use: 1. custom/module/quickcreatedefs.php 2. module/quickcreatedefs.php 3. custom/module/editviewdefs.php 4. module/editviewdefs.php
		$base = 'modules/' . $module . '/metadata/';
		$source = 'custom/' . $base . strtolower($view) . 'defs.php';
		if (!file_exists( $source))
		{
			$source = $base . strtolower($view) . 'defs.php';
			if (!file_exists($source))
			{
				//if our view does not exist default to EditView
				$view = 'EditView';
				$source = 'custom/' . $base . 'editviewdefs.php';
				if (!file_exists($source))
				{
					$source = $base . 'editviewdefs.php';
				}
			}
		}

        //taras Get iportal files
        if (file_exists( 'iportal/' . $base . strtolower($view) . 'defs.php'))	{
           $source = 'iportal/' . $base . strtolower($view) . 'defs.php';
		}
        else {
    		if (file_exists('iportal/' . $base . 'editviewdefs.php'))
    		{
    		  $view = 'EditView';
    		  $source = 'iportal/' . $base . 'editviewdefs.php';
    		}
        }
        //end taras

		$this->ev = new EditView();
		$this->ev->view = $view;
		$this->ev->ss = new Sugar_Smarty();
		//$_REQUEST['return_action'] = 'SubPanelViewer';
		$this->ev->setup($module, null, $source);

	    $this->ev->defs['templateMeta']['form']['headerTpl'] = 'iportal/include/IportalEditView/header.tpl';
		$this->ev->defs['templateMeta']['form']['footerTpl'] = 'iportal/include/IportalEditView/footer.tpl';
		$this->ev->defs['templateMeta']['form']['buttons'] = array('SUBPANELSAVE', 'SUBPANELCANCEL', 'SUBPANELFULLFORM');


		$viewEditSource = 'modules/'.$module.'/views/view.edit.php';
		if (file_exists('iportal/modules/'.$module.'/views/view.edit.php')) {
			$viewEditSource = 'iportal/modules/'.$module.'/views/view.edit.php';
		}

		if(file_exists($viewEditSource) && !$proccessOverride) {
            include($viewEditSource); 
            $c = $module . 'ViewEdit';
            
            if(class_exists($c)) {
	            $view = new $c;
	            if($view->useForSubpanel) {
	            	$this->defaultProcess = false;
	            	
	            	//Check if we shold use the module's QuickCreate.tpl file
                    if($view->useModuleQuickCreateTemplate && file_exists('iportal/modules/'.$module.'/tpls/QuickCreate.tpl')) {
	            	   $this->ev->defs['templateMeta']['form']['headerTpl'] = 'iportal/modules/'.$module.'/tpls/QuickCreate.tpl';
	            	}
                    else if($view->useModuleQuickCreateTemplate && file_exists('modules/'.$module.'/tpls/QuickCreate.tpl')) {
	            	   $this->ev->defs['templateMeta']['form']['headerTpl'] = 'modules/'.$module.'/tpls/QuickCreate.tpl';
	            	}
	            	
		            $view->ev = & $this->ev;
		            $view->ss = & $this->ev->ss;
					$class = $GLOBALS['beanList'][$module];
					if(!empty($GLOBALS['beanFiles'][$class])){
						require_once($GLOBALS['beanFiles'][$class]);
						$bean = new $class();
						$view->bean = $bean;
					}
					$this->ev->formName = 'form_Subpanel'.$this->ev->view .'_'.$module;
					$view->showTitle = false; // Do not show title since this is for subpanel
		            $view->display();
	            }
            }
		} //if
		
		if($this->defaultProcess && !$proccessOverride) {
		   $this->process($module);
		}
	}
	
	function process($module){
        $form_name = 'form_Subpanel'.$this->ev->view .'_'.$module;
        $this->ev->formName = $form_name;
        $this->ev->process(true, $form_name);
		echo $this->ev->display(false, true);
	}
}
?>
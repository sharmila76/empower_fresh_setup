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
$mod_strings = return_module_language($current_language, $_REQUEST['target_module']);
if(file_exists('iportal/modules/'. $_REQUEST['target_module'] . '/EditView.php')){
	$target_module = $_REQUEST['target_module']; // target class
	if(is_file('iportal/modules/' . $target_module . '/' . $target_module . 'QuickCreate.php')) { // if there is a quickcreate override
	    require_once('iportal/modules/' . $target_module . '/' . $target_module . 'QuickCreate.php');
	    $editviewClass = $target_module . 'QuickCreate'; // eg. OpportunitiesQuickCreate

        $file= 'iportal/modules/' . $target_module . '/tpls/' . $_REQUEST['tpl'];
        if (!file_exists($file)) $file= 'modules/' . $target_module . '/tpls/' . $_REQUEST['tpl'];
	    $editview = new $editviewClass($target_module, $file);
	    $editview->viaAJAX = true;
	}
	else { // else use base class
	    require_once('include/EditView/EditViewQuickCreate.php');
        $file= 'iportal/modules/' . $target_module . '/tpls/' . $_REQUEST['tpl'];
        if (!file_exists($file)) $file= 'modules/' . $target_module . '/tpls/' . $_REQUEST['tpl'];
	    $editview = new EditViewQuickCreate($target_module, $file);
	}
	$editview->process();
	echo $editview->display();
}
else if(file_exists('modules/'. $_REQUEST['target_module'] . '/EditView.php')){
	$target_module = $_REQUEST['target_module']; // target class
	if(is_file('modules/' . $target_module . '/' . $target_module . 'QuickCreate.php')) { // if there is a quickcreate override
	    require_once('modules/' . $target_module . '/' . $target_module . 'QuickCreate.php');
	    $editviewClass = $target_module . 'QuickCreate'; // eg. OpportunitiesQuickCreate
	    $editview = new $editviewClass($target_module, 'modules/' . $target_module . '/tpls/' . $_REQUEST['tpl']);
	    $editview->viaAJAX = true;
	}
	else { // else use base class
	    require_once('include/EditView/EditViewQuickCreate.php');
	    $editview = new EditViewQuickCreate($target_module, 'modules/' . $target_module . '/tpls/' . $_REQUEST['tpl']);
	}
	$editview->process();
	echo $editview->display();
}else{
	require_once('iportal/include/IportalEditView/SubpanelQuickCreate.php');
	$view = (!empty($_REQUEST['target_view']))?$_REQUEST['target_view']: 'QuickCreate';
	$sqc = new SubpanelQuickCreate($_REQUEST['target_module'], $view);
}	

?>

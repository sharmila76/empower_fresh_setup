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
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/

global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Eval_Evaluations', 'edit', true))$module_menu[]=Array("index.php?module=Eval_Evaluations&action=EditView&return_module=Eval_Evaluations&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateEval_Evaluations", 'Eval_Evaluations');
if(ACLController::checkAccess('Eval_Evaluations', 'list', true))$module_menu[]=Array("index.php?module=Eval_Evaluations&action=index&return_module=Eval_Evaluations&return_action=DetailView", $mod_strings['LNK_LIST'],"Eval_Evaluations", 'Eval_Evaluations');
if(ACLController::checkAccess('Eval_Evaluations', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Eval_Evaluations&return_module=Eval_Evaluations&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Eval_Evaluations');

//Added by Sharmila for adding questions
$module_menu[]=Array("index.php?module=Eval_Evaluations&action=Addsubject", $mod_strings['LBL_ADD_MULTIPLE_CHOICE']);
$module_menu[]=Array("index.php?module=Eval_Evaluations&action=Addqa", $mod_strings['LBL_ADD_QUESTION_AND_ANSWER']);
$module_menu[]=Array("index.php?module=Eval_Evaluations&action=Assigntest", $mod_strings['LBL_ASSIGN_TEST']);

<?php
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
$dictionary['OSS_TeamMember'] = array(
	'table'=>'oss_teammember',
	'audited'=>true,
	'fields'=>array (
  'user_id_c' => 
  array (
    'required' => false,
    'name' => 'user_id_c',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 36,
  ),
  'link_to' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'link_to',
    'vname' => 'LBL_LINK_TO',
    'type' => 'relate',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '255',
    'id_name' => 'user_id_c',
    'ext2' => 'Users',
    'module' => 'Users',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'user_id1_c' => 
  array (
    'required' => false,
    'name' => 'user_id1_c',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 1,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 36,
  ),
  'report_to' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'report_to',
    'vname' => 'LBL_REPORT_TO',
    'type' => 'relate',
    'massupdate' => 1,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '255',
    'id_name' => 'user_id1_c',
    'ext2' => 'Users',
    'module' => 'Users',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'cellphone' => 
  array (
    'required' => false,
    'name' => 'cellphone',
    'vname' => 'LBL_CELLPHONE',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'landline_no' => 
  array (
    'required' => false,
    'name' => 'landline_no',
    'vname' => 'LBL_LANDLINE_NO',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'designation' => 
  array (
    'required' => false,
    'name' => 'designation',
    'vname' => 'LBL_DESIGNATION',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
    'len' => '25',
  ),
  'permanent_landline' => 
  array (
    'required' => false,
    'name' => 'permanent_landline',
    'vname' => 'LBL_PERMANENT_LANDLINE',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'current_landline' => 
  array (
    'required' => false,
    'name' => 'current_landline',
    'vname' => 'LBL_CURRENT_LANDLINE',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'officialdob' => 
  array (
    'required' => false,
    'name' => 'officialdob',
    'vname' => 'LBL_OFFICIALDOB',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
  ),
  'actualdob' => 
  array (
    'required' => false,
    'name' => 'actualdob',
    'vname' => 'LBL_ACTUALDOB',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
  ),
  'spousename' => 
  array (
    'required' => false,
    'name' => 'spousename',
    'vname' => 'LBL_SPOUSENAME',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
    'len'=>255,
  ),
  'spousedob' => 
  array (
    'required' => false,
    'name' => 'spousedob',
    'vname' => 'LBL_SPOUSEDOB',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
  ),
  'marriagedate' => 
  array (
    'required' => false,
    'name' => 'marriagedate',
    'vname' => 'LBL_MARRIAGEDATE',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
  ),
  'joiningdate' => 
  array (
    'required' => false,
    'name' => 'joiningdate',
    'vname' => 'LBL_JOININGDATE',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 1,
  ),
  'father_name' => 
  array (
    'required' => false,
    'name' => 'father_name',
    'vname' => 'LBL_FATHER_NAME',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '25',
  ),
  'mother_name' => 
  array (
    'required' => false,
    'name' => 'mother_name',
    'vname' => 'LBL_MOTHER_NAME',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 1,
    'len' => '25',
  ),
),
	'relationships'=>array (
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('OSS_TeamMember','OSS_TeamMember', array('basic','assignable','person'));
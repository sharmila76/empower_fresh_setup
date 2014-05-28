<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2008 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
$dictionary['HRM_Incomes'] = array(
	'table'=>'hrm_incomes',
	'audited'=>true,
	'fields'=>array (
  'inc_mois' => 
  array (
    'required' => '1',
    'name' => 'inc_mois',
    'vname' => 'LBL_INC_MOIS',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'dom_cal_month_long',
    'studio' => 'visible',
  ),
  'inc_amou' => 
  array (
    'required' => '1',
    'name' => 'inc_amou',
    'vname' => 'LBL_INC_AMOU',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
  ),
  'currency_id' => 
  array (
    'required' => false,
    'name' => 'currency_id',
    'vname' => 'LBL_CURRENCY',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'studio' => 'visible',
    'function' => 
    array (
      'name' => 'getCurrencyDropDown',
      'returns' => 'html',
    ),
  ),
  'inc_type' => 
  array (
    'required' => '1',
    'name' => 'inc_type',
    'vname' => 'LBL_INC_TYPE',
    'type' => 'radioenum',
    'massupdate' => 0,
    'default' => 'Salary',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'inc_type_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'inc_year' => 
  array (
    'required' => '1',
    'name' => 'inc_year',
    'vname' => 'LBL_INC_YEAR',
    'type' => 'int',
    'massupdate' => 0,
    'default' => '2009',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '11',
    'disable_num_format' => '1',
    'validation' => 
    array (
      'type' => 'range',
      'min' => '2000',
      'max' => '2099',
    ),
  ),
  'sum_mois' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'sum_mois',
    'vname' => 'LBL_SUM_MOIS',
    'type' => 'code',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'ext2' => NULL,
    'ext4' => 'global $connection_code_field;

global $sugar_config;
$dbh=$sugar_config[&#039;dbconfig&#039;][&#039;db_host_name&#039;];
$dbu=$sugar_config[&#039;dbconfig&#039;][&#039;db_user_name&#039;];
$dbp=$sugar_config[&#039;dbconfig&#039;][&#039;db_password&#039;];
$db=$sugar_config[&#039;dbconfig&#039;][&#039;db_name&#039;];

if (!isset($connection_code_field)) {
$connection_code_field = mysql_connect(&quot;$dbh&quot;, &quot;$dbu&quot;, &quot;$dbp&quot;);
mysql_select_db(&quot;$db&quot;, $connection_code_field);
}

$usid = $bean-&gt;assigned_user_id ;
$qui = $bean-&gt;hrm_employe_employees_ida;
$annee =  $bean-&gt;inc_year;
$mois = $bean-&gt;inc_mois;

$sql = &quot;SELECT sum(hrm_incomes.inc_amou) FROM hrm_incomes JOIN hrm_employe_hrm_incomes_c ON hrm_incomes.id=hrm_employe_hrm_incomes_c.hrm_employerm_incomes_idb where hrm_employe_hrm_incomes_c.hrm_employe_employees_ida=&#039;$qui&#039; AND hrm_incomes.inc_mois=$mois AND hrm_incomes.inc_year=$annee AND hrm_incomes.deleted=0 AND hrm_employe_hrm_incomes_c.deleted=0&quot;;
$res = mysql_query($sql, $connection_code_field);
if (mysql_num_rows($res))
$value = mysql_result($res,0);

echo &quot;&lt;DIV align=right&gt;&quot;;
echo number_format($value, 0, &#039;,&#039;, &#039; &#039;) . &#039; €         &#039;;
echo &quot;&lt;/DIV&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'sum_year' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'sum_year',
    'vname' => 'LBL_SUM_YEAR',
    'type' => 'code',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'ext2' => NULL,
    'ext4' => 'global $connection_code_field;

global $sugar_config;
$dbh=$sugar_config[&#039;dbconfig&#039;][&#039;db_host_name&#039;];
$dbu=$sugar_config[&#039;dbconfig&#039;][&#039;db_user_name&#039;];
$dbp=$sugar_config[&#039;dbconfig&#039;][&#039;db_password&#039;];
$db=$sugar_config[&#039;dbconfig&#039;][&#039;db_name&#039;];

if (!isset($connection_code_field)) {
$connection_code_field = mysql_connect(&quot;$dbh&quot;, &quot;$dbu&quot;, &quot;$dbp&quot;);
mysql_select_db(&quot;$db&quot;, $connection_code_field);
}

$usid = $bean-&gt;assigned_user_id ;
$qui = $bean-&gt;hrm_employe_employees_ida;
$annee =  $bean-&gt;inc_year;
$mois = $bean-&gt;inc_mois;

$sql = &quot;SELECT sum(hrm_incomes.inc_amou) FROM hrm_incomes  JOIN hrm_employe_hrm_incomes_c ON hrm_incomes.id=hrm_employe_hrm_incomes_c.hrm_employerm_incomes_idb where hrm_employe_hrm_incomes_c.hrm_employe_employees_ida=&#039;$qui&#039; AND hrm_incomes.inc_year=$annee AND hrm_incomes.deleted=0  AND hrm_employe_hrm_incomes_c.deleted=0&quot;;
$res = mysql_query($sql, $connection_code_field);
if (mysql_num_rows($res))
$value = mysql_result($res,0);

echo &quot;&lt;DIV align=right&gt;&quot;;
echo number_format($value, 0, &#039;,&#039;, &#039; &#039;) . &#039; €         &#039;;
echo &quot;&lt;/DIV&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
),
	'relationships'=>array (
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('HRM_Incomes','HRM_Incomes', array('basic','assignable'));
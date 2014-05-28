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
$dictionary['HRM_Employees'] = array(
	'table'=>'hrm_employees',
	'audited'=>true,
	'fields'=>array (
  'salutation' => 
  array (
    'required' => false,
    'name' => 'salutation',
    'vname' => 'LBL_SALUTATION',
    'type' => 'enum',
    'massupdate' => '1',
    'default' => 'Mr.',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'salutation_dom',
    'studio' => 'visible',
  ),
  'title' => 
  array (
    'required' => false,
    'name' => 'title',
    'vname' => 'LBL_TITLE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'phone_other' => 
  array (
    'required' => false,
    'name' => 'phone_other',
    'vname' => 'LBL_PHONE_OTHER',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => 'Other phone number for the contact ',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'primary_address_city' => 
  array (
    'required' => false,
    'name' => 'primary_address_city',
    'vname' => 'LBL_PRIMARY_ADDRESS_CITY  ',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'phone_home' => 
  array (
    'required' => false,
    'name' => 'phone_home',
    'vname' => 'LBL_PHONE_HOME  ',
    'type' => 'phone',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
    'dbType' => 'varchar',
  ),
  'first_name' => 
  array (
    'name' => 'first_name',
    'vname' => 'LBL_FIRST_NAME',
    'type' => 'varchar',
    'len' => '100',
    'unified_search' => true,
    'comment' => 'First name of the contact',
    'merge_filter' => 'selected',
  ),
  'last_name' => 
  array (
    'required' => false,
    'name' => 'last_name',
    'vname' => 'LBL_LAST_NAME',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'required',
    'duplicate_merge' => 'enabled',
    'duplicate_merge_dom_value' => '1',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'full_name' => 
  array (
    'name' => 'full_name',
    'rname' => 'full_name',
    'vname' => 'LBL_FNAME',
    'type' => 'name',
    'fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
    ),
    'sort_on' => 'last_name',
    'source' => 'non-db',
    'group' => 'last_name',
    'len' => '510',
    'db_concat_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
    ),
  ),
  'phone_mobile' => 
  array (
    'required' => false,
    'name' => 'phone_mobile',
    'vname' => 'LBL_PHONE_MOBILE  ',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'primary_address_street' => 
  array (
    'required' => false,
    'name' => 'primary_address_street',
    'vname' => 'LBL_PRIMARY_ADDRESS_STREET ',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '150',
  ),
  'primary_address_postalcode' => 
  array (
    'required' => false,
    'name' => 'primary_address_postalcode',
    'vname' => 'LBL_PRIMARY_ADDRESS_POSTALCODE  ',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '20',
  ),
  'primary_address_complement' => 
  array (
    'required' => false,
    'name' => 'primary_address_complement',
    'vname' => 'LBL_PRIMARY_ADDRESS_COMPLEMENT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'num_secu' => 
  array (
    'required' => false,
    'name' => 'num_secu',
    'vname' => 'LBL_NUM_SECU',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'nais_lieu' => 
  array (
    'required' => false,
    'name' => 'nais_lieu',
    'vname' => 'LBL_NAIS_LIEU',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'nai_dept' => 
  array (
    'required' => false,
    'name' => 'nai_dept',
    'vname' => 'LBL_NAI_DEPT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'dat_entr' => 
  array (
    'required' => false,
    'name' => 'dat_entr',
    'vname' => 'LBL_DAT_ENTR',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
  ),
  'dat_dern' => 
  array (
    'required' => false,
    'name' => 'dat_dern',
    'vname' => 'LBL_DAT_DERN',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
  ),
  'dat_sort' => 
  array (
    'required' => false,
    'name' => 'dat_sort',
    'vname' => 'LBL_DAT_SORT',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
  ),
  'tri_gram' => 
  array (
    'required' => false,
    'name' => 'tri_gram',
    'vname' => 'LBL_TRI_GRAM',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'rib_banq' => 
  array (
    'required' => false,
    'name' => 'rib_banq',
    'vname' => 'LBL_RIB_BANQ',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'rib_guic' => 
  array (
    'required' => false,
    'name' => 'rib_guic',
    'vname' => 'LBL_RIB_GUIC',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'rib_comp' => 
  array (
    'required' => false,
    'name' => 'rib_comp',
    'vname' => 'LBL_RIB_COMP',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'rib_keys' => 
  array (
    'required' => false,
    'name' => 'rib_keys',
    'vname' => 'LBL_RIB_KEYS',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'num_sala' => 
  array (
    'required' => false,
    'name' => 'num_sala',
    'vname' => 'LBL_NUM_SALA',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '11',
    'disable_num_format' => '',
  ),
  'rib_cplet' => 
  array (
    'required' => false,
    'name' => 'rib_cplet',
    'vname' => 'LBL_RIB_CPLET',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '100',
  ),
  'nai_date' => 
  array (
    'required' => false,
    'name' => 'nai_date',
    'vname' => 'LBL_NAI_DATE',
    'type' => 'date',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
  ),
  'pis_nbr1' => 
  array (
    'required' => false,
    'name' => 'pis_nbr1',
    'vname' => 'LBL_PIS_NBR1',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'pis_nbr2' => 
  array (
    'required' => false,
    'name' => 'pis_nbr2',
    'vname' => 'LBL_PIS_NBR2',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'sal_nati' => 
  array (
    'required' => false,
    'name' => 'sal_nati',
    'vname' => 'LBL_SAL_NATI',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'sal_situ' => 
  array (
    'required' => false,
    'name' => 'sal_situ',
    'vname' => 'LBL_SAL_SITU',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
  'rib_lieu' => 
  array (
    'required' => false,
    'name' => 'rib_lieu',
    'vname' => 'LBL_RIB_LIEU',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '150',
  ),
  'ind_synt' => 
  array (
    'required' => false,
    'name' => 'ind_synt',
    'vname' => 'LBL_IND_SYNT',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
    'reportable' => 0,
    'len' => '25',
  ),
  'bal_holy' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'bal_holy',
    'vname' => 'LBL_BAL_HOLY',
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

global $connection_code_field;

$qui = $bean-&gt;id;
$ref = $bean-&gt;ref_holy;

$sql = &quot;SELECT sum(hol_quan*hol_type) FROM hrm_holydays JOIN hrm_employehrm_holydays_c ON hrm_holydays.id = hrm_employehrm_holydays_c.hrm_employem_holydays_idb  WHERE hrm_employehrm_holydays_c.hrm_employe_employees_ida= &#039;$qui&#039;  AND hrm_holydays.deleted=0 AND hrm_employehrm_holydays_c.deleted=0&quot;;
$res = mysql_query($sql, $connection_code_field);
if (mysql_num_rows($res))
$value = round(($ref + mysql_result($res,0))*100)/100;

echo &quot;&lt;DIV&gt;&quot;;
echo number_format($value, 2, &#039;,&#039;, &#039;&#039;);
echo &quot;&lt;/DIV&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'bal_rtts' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'bal_rtts',
    'vname' => 'LBL_BAL_RTTS',
    'type' => 'code',
    'massupdate' => 0,
    'comments' => 'RTTT Bal',
    'help' => 'RTT Balance',
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

global $connection_code_field;

$qui = $bean-&gt;id;
$ref = $bean-&gt;ref_rtts;





$sql = &quot;SELECT sum(rtt_quan*rtt_type) FROM hrm_rtt JOIN hrm_employees_hrm_rtt_c ON hrm_rtt.id = hrm_employees_hrm_rtt_c.hrm_employertthrm_rtt_idb  WHERE hrm_employees_hrm_rtt_c.hrm_employe_employees_ida= &#039;$qui&#039;  AND hrm_rtt.deleted=0 AND hrm_employees_hrm_rtt_c.deleted=0&quot;;
$res = mysql_query($sql, $connection_code_field);
if (mysql_num_rows($res))
$value = $ref +round(mysql_result($res,0)*100)/100;

echo &quot;&lt;DIV&gt;&quot;;
echo number_format($value, 2, &#039;,&#039;, &#039;&#039;);
echo &quot;&lt;/DIV&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'sal_pres' => 
  array (
    'required' => false,
    'name' => 'sal_pres',
    'vname' => 'LBL_SAL_PRES',
    'type' => 'bool',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
  ),
  'ref_holy' => 
  array (
    'required' => false,
    'name' => 'ref_holy',
    'vname' => 'LBL_REF_HOLY',
    'type' => 'float',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '18',
    'precision' => '2',
  ),
  'gross_incomes' => 
  array (
    'required' => false,
    'name' => 'gross_incomes',
    'vname' => 'LBL_GROSS_INCOMES',
    'type' => 'currency',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 1,
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
  'ref_rtts' => 
  array (
    'required' => false,
    'name' => 'ref_rtts',
    'vname' => 'LBL_REF_RTTS',
    'type' => 'float',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '18',
    'precision' => '2',
  ),
  'flyingblue' => 
  array (
    'required' => false,
    'name' => 'flyingblue',
    'vname' => 'LBL_FLYINGBLUE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '25',
  ),
),
	'relationships'=>array (
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('HRM_Employees','HRM_Employees', array('basic','assignable'));
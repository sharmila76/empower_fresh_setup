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
$dictionary['HRM_Bonus'] = array(
	'table'=>'hrm_bonus',
	'audited'=>true,
	'fields'=>array (
  'bon_mois' => 
  array (
    'required' => false,
    'name' => 'bon_mois',
    'vname' => 'LBL_BON_MOIS',
    'type' => 'enum',
    'massupdate' => 0,
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
  'bon_year' => 
  array (
    'required' => false,
    'name' => 'bon_year',
    'vname' => 'LBL_BON_YEAR',
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
      'max' => '2020',
    ),
  ),
  'bon_tteo' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'bon_tteo',
    'vname' => 'LBL_BON_TTEO',
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
    'ext4' => '$PON = str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri1) * str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri2) * str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri3)* str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri4)* str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri5)* str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_cri6);

$TTH = $PON * str_replace(&quot;,&quot;,&quot;.&quot;,$bean -&gt; bon_tbas);

echo &quot;&lt;input type=&#039;text&#039; size = &#039;5&#039; disabled=&#039;disabled&#039; id=&#039;bon_tteo&#039; value=&#039;&quot; . $TTH . &quot;&#039;&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'bon_cri1' => 
  array (
    'required' => false,
    'name' => 'bon_cri1',
    'vname' => 'LBL_BON_CRI1',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri1_list',
    'studio' => 'visible',
  ),
  'bon_cri2' => 
  array (
    'required' => false,
    'name' => 'bon_cri2',
    'vname' => 'LBL_BON_CRI2',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri2_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'bon_cri3' => 
  array (
    'required' => false,
    'name' => 'bon_cri3',
    'vname' => 'LBL_BON_CRI3',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri3_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'bon_cri4' => 
  array (
    'required' => false,
    'name' => 'bon_cri4',
    'vname' => 'LBL_BON_CRI4',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri4_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'bon_cri5' => 
  array (
    'required' => false,
    'name' => 'bon_cri5',
    'vname' => 'LBL_BON_CRI5',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri5_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'bon_cri6' => 
  array (
    'required' => false,
    'name' => 'bon_cri6',
    'vname' => 'LBL_BON_CRI6',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => '1',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => 100,
    'options' => 'bon_cri6_list',
    'studio' => 'visible',
    'dbType' => 'enum',
    'separator' => '<br>',
  ),
  'but_calc' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'but_calc',
    'vname' => 'LBL_BUT_CALC',
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
    'ext4' => 'echo &quot;&lt;script type=&#039;text/javascript&#039;&gt;&quot;;
echo&quot;function calculcom()&quot;;
echo&quot;{&quot;;
echo &quot;document.getElementById(&#039;bon_amou&#039;).value = document.getElementById(&#039;bon_turn&#039;).value.replace(&#039; &#039;,&#039;&#039;).replace(&#039;,&#039;,&#039;.&#039;) * document.getElementById(&#039;bon_rate&#039;).value.replace(&#039;,&#039;,&#039;.&#039;) / 100&quot;;
echo &quot;}&quot;;
echo&quot;function ackcalc()&quot;;
echo&quot;{&quot;;

echo &quot;document.getElementById(&#039;bon_rate&#039;).value =
document.getElementById(&#039;bon_cri1&#039;).value.replace(&#039;,&#039;,&#039;.&#039;)  *
document.getElementById(&#039;bon_cri2&#039;).value.replace(&#039;,&#039;,&#039;.&#039;) *
document.getElementById(&#039;bon_cri3&#039;).value.replace(&#039;,&#039;,&#039;.&#039;) *
document.getElementById(&#039;bon_cri4&#039;).value.replace(&#039;,&#039;,&#039;.&#039;)*
document.getElementById(&#039;bon_cri5&#039;).value.replace(&#039;,&#039;,&#039;.&#039;)*
document.getElementById(&#039;bon_cri6&#039;).value.replace(&#039;,&#039;,&#039;.&#039;)*
document.getElementById(&#039;bon_tbas&#039;).value.replace(&#039;,&#039;,&#039;.&#039;);&quot;;

echo &quot;document.getElementById(&#039;bon_tteo&#039;).value = document.getElementById(&#039;bon_rate&#039;).value;&quot;;

echo &quot;document.getElementById(&#039;bon_amou&#039;).value = document.getElementById(&#039;bon_turn&#039;).value.replace(&#039; &#039;,&#039;&#039;).replace(&#039;,&#039;,&#039;.&#039;) * document.getElementById(&#039;bon_rate&#039;).value.replace(&#039;,&#039;,&#039;.&#039;) / 100;&quot;;

echo &quot;}&quot;;
echo &quot;&lt;/script&gt;&quot;;
echo &quot;&lt;input type=&#039;button&#039;  class=&#039;button&#039; value=&#039;Ack & Calc&#039; onclick=&#039;ackcalc()&#039;&gt;&quot;;
echo &quot;&lt;input type=&#039;button&#039;  class=&#039;button&#039; value=&#039;Calculer&#039; onclick=&#039;calculcom()&#039;&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'bon_vali' => 
  array (
    'required' => false,
    'name' => 'bon_vali',
    'vname' => 'LBL_BON_VALI',
    'type' => 'bool',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
  ),
  'bon_paid' => 
  array (
    'required' => false,
    'name' => 'bon_paid',
    'vname' => 'LBL_BON_PAID',
    'type' => 'bool',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
  ),
  'bon_tbas' => 
  array (
    'required' => '1',
    'name' => 'bon_tbas',
    'vname' => 'LBL_BON_TBAS',
    'type' => 'float',
    'massupdate' => 0,
    'default' => '3.50',
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
  'bon_amou' => 
  array (
    'required' => '1',
    'name' => 'bon_amou',
    'vname' => 'LBL_BON_AMOU',
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
  'bon_turn' => 
  array (
    'required' => '1',
    'name' => 'bon_turn',
    'vname' => 'LBL_BON_TURN',
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

$qui = $bean-&gt;hrm_employe_employees_ida;
$annee =  $bean-&gt;bon_year;
$mois = $bean-&gt;bon_mois;

$sql = &quot;SELECT sum(hrm_bonus.bon_amou) FROM hrm_bonus RIGHT JOIN hrm_employees_hrm_bonus_c ON hrm_bonus.id = hrm_employees_hrm_bonus_c.hrm_employeshrm_bonus_idb  WHERE hrm_employees_hrm_bonus_c.hrm_employe_employees_ida= &#039;$qui&#039; AND hrm_bonus.bon_mois=$mois AND hrm_bonus.bon_year=$annee AND hrm_bonus.deleted=0  AND hrm_employees_hrm_bonus_c.deleted=0 &quot;;
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
$qui = $bean-&gt;hrm_employe_employees_ida;
$annee =  $bean-&gt;bon_year;
$mois = $bean-&gt;bon_mois;

$sql = &quot;SELECT sum(hrm_bonus.bon_amou) FROM hrm_bonus RIGHT JOIN hrm_employees_hrm_bonus_c ON hrm_bonus.id = hrm_employees_hrm_bonus_c.hrm_employeshrm_bonus_idb  WHERE hrm_employees_hrm_bonus_c.hrm_employe_employees_ida= &#039;$qui&#039; AND hrm_bonus.bon_year=$annee AND hrm_bonus.deleted=0  AND hrm_employees_hrm_bonus_c.deleted=0&quot;;
$res = mysql_query($sql, $connection_code_field);
if (mysql_num_rows($res))
$value = mysql_result($res,0);

echo &quot;&lt;DIV align=right&gt;&quot;;
echo number_format($value, 0, &#039;,&#039;, &#039; &#039;) . &#039; €         &#039;;
echo &quot;&lt;/DIV&gt;&quot;;',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'bon_rate' => 
  array (
    'required' => false,
    'name' => 'bon_rate',
    'vname' => 'LBL_BON_RATE',
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
    'precision' => '',
  ),
  'bon_tupd' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'bon_tupd',
    'vname' => 'LBL_BON_TUPD',
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

$bon =  $bean-&gt;bon_amou;
$rate = $bean-&gt;bon_tbas;

$value= 100*$bon/$rate;

echo &quot;&lt;DIV align=right&gt;&quot;;
echo number_format($value, 0, &#039;,&#039;, &#039; &#039;) . &#039; €         &#039;;
echo &quot;&lt;/DIV&gt;&quot;;
',
    'studio' => 'visible',
    'dbtype' => ' varchar()',
  ),
  'bon_turn_pond_year' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'bon_turn_pond_year',
    'vname' => 'LBL_BON_TURN_POND_YEAR',
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
$qui = $bean-&gt;hrm_employe_employees_ida;
$annee =  $bean-&gt;bon_year;
$mois = $bean-&gt;bon_mois;

$sql = &quot;SELECT sum(100*hrm_bonus.bon_amou/bon_tbas) FROM hrm_bonus RIGHT JOIN hrm_employees_hrm_bonus_c ON hrm_bonus.id = hrm_employees_hrm_bonus_c.hrm_employeshrm_bonus_idb  WHERE hrm_employees_hrm_bonus_c.hrm_employe_employees_ida= &#039;$qui&#039; AND hrm_bonus.bon_year=$annee AND hrm_bonus.deleted=0 AND hrm_employees_hrm_bonus_c.deleted=0&quot;;
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
VardefManager::createVardef('HRM_Bonus','HRM_Bonus', array('basic','assignable'));
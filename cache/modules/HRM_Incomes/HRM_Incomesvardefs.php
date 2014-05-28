<?php 
 $GLOBALS["dictionary"]["HRM_Incomes"]=array (
  'table' => 'hrm_incomes',
  'audited' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'hrm_incomes_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'hrm_incomes_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'hrm_incomes_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
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
    'hrm_employees_hrm_incomes' => 
    array (
      'name' => 'hrm_employees_hrm_incomes',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_incomes',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_incomes_name' => 
    array (
      'name' => 'hrm_employees_hrm_incomes_name',
      'type' => 'relate',
      'source' => 'non-db',
      'vname' => 'LBL_HRM_EMPLOYEES_HRM_INCOMES_FROM_HRM_EMPLOYEES_TITLE',
      'save' => true,
      'id_name' => 'hrm_employe_employees_ida',
      'link' => 'hrm_employees_hrm_incomes',
      'table' => 'hrm_employees',
      'module' => 'HRM_Employees',
      'rname' => 'name',
    ),
    'hrm_employe_employees_ida' => 
    array (
      'name' => 'hrm_employe_employees_ida',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_incomes',
      'source' => 'non-db',
    ),
  ),
  'relationships' => 
  array (
    'hrm_incomes_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Incomes',
      'rhs_table' => 'hrm_incomes',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'hrm_incomes_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Incomes',
      'rhs_table' => 'hrm_incomes',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'hrm_incomes_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Incomes',
      'rhs_table' => 'hrm_incomes',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_lock' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'hrm_incomespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);
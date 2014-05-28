<?php 
 $GLOBALS["dictionary"]["HRM_Employees"]=array (
  'table' => 'hrm_employees',
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
      'relationship' => 'hrm_employees_created_by',
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
      'relationship' => 'hrm_employees_modified_user',
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
      'relationship' => 'hrm_employees_assigned_user',
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
    'hrm_employees_hrm_incomes' => 
    array (
      'name' => 'hrm_employees_hrm_incomes',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_incomes',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_bonus' => 
    array (
      'name' => 'hrm_employees_hrm_bonus',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_bonus',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_holydays' => 
    array (
      'name' => 'hrm_employees_hrm_holydays',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_holydays',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_rtt' => 
    array (
      'name' => 'hrm_employees_hrm_rtt',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_rtt',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_training' => 
    array (
      'name' => 'hrm_employees_hrm_training',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_training',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_hr_report' => 
    array (
      'name' => 'hrm_employees_hrm_hr_report',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_hr_report',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_disease' => 
    array (
      'name' => 'hrm_employees_hrm_disease',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_disease',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_payment' => 
    array (
      'name' => 'hrm_employees_hrm_payment',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_payment',
      'source' => 'non-db',
    ),
    'hrm_employees_hrm_ticketresto' => 
    array (
      'name' => 'hrm_employees_hrm_ticketresto',
      'type' => 'link',
      'relationship' => 'hrm_employees_hrm_ticketresto',
      'source' => 'non-db',
    ),
  ),
  'relationships' => 
  array (
    'hrm_employees_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Employees',
      'rhs_table' => 'hrm_employees',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'hrm_employees_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Employees',
      'rhs_table' => 'hrm_employees',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'hrm_employees_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'HRM_Employees',
      'rhs_table' => 'hrm_employees',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_lock' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'hrm_employeespk',
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
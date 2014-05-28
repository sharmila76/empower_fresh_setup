<?php
$module_name = 'Eval_Evaluations';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NAMEOFCANDIDATE_C' => 
  array (
    'width' => '9%',
    'label' => 'LBL_NAMEOFCANDIDATE',
    'default' => true,
    'module' => 'gaur_Candidates',
    'id' => 'GAUR_CANDIDATES_ID_C',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'gaur_candidates_id_c',
    ),
  ),
  'NAMEOFEVALUATOR_C' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAMEOFEVALUATOR',
    'default' => true,
    'module' => 'OSS_TeamMember',
    'id' => 'OSS_TEAMMEMBER_ID_C',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'oss_teammember_id_c',
    ),
  ),
  'RECOMMENDATIONS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RECOMMENDATIONS',
    'width' => '10%',
  ),
  'DATEOFEVALUATION_C' => 
  array (
    'type' => 'date',
    'default' => true,
    'label' => 'LBL_DATEOFEVALUATION',
    'width' => '10%',
  ),
  'TIMEOFEVALUATION_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TIMEOFEVALUATION',
    'width' => '10%',
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => true,
  ),
);
?>
<?php
/*
   This limits the ListView based on teams - part of the CE Teams module
   It is a template which is added to the end of modules/<module>/metadata/listviewdefs.php
   by the custom logic whenever it is needed
   This is needed because there is no logic hook that can modify the listview query
*/
require_once "modules/team/teams_logic.php";
$tmp = new teams_logic();
$tmp->limit_list_access($this, 'before_listview');
?>

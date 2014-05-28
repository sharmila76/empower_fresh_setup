<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-02-25 07:29:07
$layout_defs["emplo_Employer"]["subpanel_setup"]["emplo_employer_gaur_candidates"] = array (
  'order' => 100,
  'module' => 'gaur_Candidates',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_EMPLO_EMPLOYER_GAUR_CANDIDATES_FROM_GAUR_CANDIDATES_TITLE',
  'get_subpanel_data' => 'emplo_employer_gaur_candidates',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'People',
      'mode' => 'MultiSelect',
    ),
  ),
);


?>
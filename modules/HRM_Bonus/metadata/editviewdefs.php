<?php
$module_name = 'HRM_Bonus';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hrm_employees_hrm_bonus_name',
            'label' => 'LBL_EMPLOYEE',
          ),
          1 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'bon_mois',
            'label' => 'LBL_BON_MOIS',
          ),
          1 => 
          array (
            'name' => 'bon_year',
            'label' => 'LBL_BON_YEAR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'bon_turn',
            'label' => 'LBL_BON_TURN',
          ),
        ),
      ),
      'lbl_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'bon_cri1',
            'label' => 'LBL_BON_CRI1',
          ),
          1 => 
          array (
            'name' => 'bon_cri2',
            'label' => 'LBL_BON_CRI2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'bon_cri3',
            'label' => 'LBL_BON_CRI3',
          ),
          1 => 
          array (
            'name' => 'bon_cri4',
            'label' => 'LBL_BON_CRI4',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'bon_cri5',
            'label' => 'LBL_BON_CRI5',
          ),
          1 => 
          array (
            'name' => 'bon_cri6',
            'label' => 'LBL_BON_CRI6',
          ),
        ),
      ),
      'lbl_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'but_calc',
            'label' => 'LBL_BUT_CALC',
          ),
          1 => 
          array (
            'name' => 'bon_amou',
            'label' => 'LBL_BON_AMOU',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'bon_tbas',
            'label' => 'LBL_BON_TBAS',
          ),
          1 => 
          array (
            'name' => 'bon_tteo',
            'label' => 'LBL_BON_TTEO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'bon_rate',
            'label' => 'LBL_BON_RATE',
          ),
          1 => 
          array (
            'name' => 'bon_vali',
            'label' => 'LBL_BON_VALI',
          ),
        ),
      ),
      'lbl_panel3' => 
      array (
        0 => 
        array (
          0 => NULL,
        ),
      ),
    ),
  ),
);
?>

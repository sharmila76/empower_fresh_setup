<?php
$module_name = 'HRM_Bonus';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
            'name' => 'bon_tbas',
            'label' => 'LBL_BON_TBAS',
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
            'name' => 'bon_vali',
            'label' => 'LBL_BON_VALI',
          ),
          1 => 
          array (
            'name' => 'bon_paid',
            'label' => 'LBL_BON_PAID',
          ),
        ),
      ),
      'lbl_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'bon_tupd',
            'label' => 'LBL_BON_TUPD',
          ),
          1 => 
          array (
            'name' => 'bon_turn_pond_year',
            'label' => 'LBL_BON_TURN_POND_YEAR',
          ),
        ),
      ),
    ),
  ),
);
?>

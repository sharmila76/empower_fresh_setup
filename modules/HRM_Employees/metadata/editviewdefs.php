<?php
$module_name = 'HRM_Employees';
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
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'label' => 'LBL_FIRST_NAME  ',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'tri_gram',
            'label' => 'LBL_TRI_GRAM',
          ),
          1 => 
          array (
            'name' => 'salutation',
            'label' => 'LBL_SALUTATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'num_secu',
            'label' => 'LBL_NUM_SECU',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'nai_date',
            'label' => 'LBL_NAI_DATE',
          ),
          1 => 
          array (
            'name' => 'nais_lieu',
            'label' => 'LBL_NAIS_LIEU',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'nai_dept',
            'label' => 'LBL_NAI_DEPT',
          ),
          1 => 
          array (
            'name' => 'sal_nati',
            'label' => 'LBL_SAL_NATI',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'sal_situ',
            'label' => 'LBL_SAL_SITU',
          ),
          1 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
        ),
        7 => 
        array (
          0 => NULL,
        ),
      ),
      'lbl_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS_STREET ',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_complement',
            'label' => 'LBL_PRIMARY_ADDRESS_COMPLEMENT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_postalcode',
            'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE  ',
          ),
          1 => 
          array (
            'name' => 'primary_address_city',
            'label' => 'LBL_PRIMARY_ADDRESS_CITY  ',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'phone_home',
            'label' => 'LBL_PHONE_HOME  ',
          ),
          1 => 
          array (
            'name' => 'phone_mobile',
            'label' => 'LBL_PHONE_MOBILE  ',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'phone_other',
            'label' => 'LBL_PHONE_OTHER',
          ),
          1 => NULL,
        ),
      ),
      'lbl_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'dat_dern',
            'label' => 'LBL_DAT_DERN',
          ),
          1 => 
          array (
            'name' => 'dat_entr',
            'label' => 'LBL_DAT_ENTR',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dat_sort',
            'label' => 'LBL_DAT_SORT',
          ),
          1 => 
          array (
            'name' => 'sal_pres',
            'label' => 'LBL_SAL_PRES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'num_sala',
            'label' => 'LBL_NUM_SALA',
          ),
          1 => 
          array (
            'name' => 'ind_synt',
            'label' => 'LBL_IND_SYNT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gross_incomes',
            'label' => 'LBL_GROSS_INCOMES',
          ),
          1 => NULL,
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'pis_nbr1',
            'label' => 'LBL_PIS_NBR1',
          ),
          1 => 
          array (
            'name' => 'pis_nbr2',
            'label' => 'LBL_PIS_NBR2',
          ),
        ),
      ),
      'lbl_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'rib_banq',
            'label' => 'LBL_RIB_BANQ',
          ),
          1 => 
          array (
            'name' => 'rib_guic',
            'label' => 'LBL_RIB_GUIC',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rib_comp',
            'label' => 'LBL_RIB_COMP',
          ),
          1 => 
          array (
            'name' => 'rib_keys',
            'label' => 'LBL_RIB_KEYS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rib_lieu',
            'label' => 'LBL_RIB_LIEU',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rib_cplet',
            'label' => 'LBL_RIB_CPLET',
          ),
        ),
      ),
      'lbl_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'ref_holy',
            'label' => 'LBL_REF_HOLY',
          ),
          1 => 
          array (
            'name' => 'ref_rtts',
            'label' => 'LBL_REF_RTTS',
          ),
        ),
      ),
      'lbl_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'flyingblue',
            'label' => 'LBL_FLYINGBLUE',
          ),
          1 => NULL,
        ),
      ),
    ),
  ),
);
?>

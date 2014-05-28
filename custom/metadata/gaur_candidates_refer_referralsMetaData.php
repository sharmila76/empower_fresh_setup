<?php
// created: 2010-03-02 04:11:10
$dictionary["gaur_candidates_refer_referrals"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'gaur_candidates_refer_referrals' => 
    array (
      'lhs_module' => 'gaur_Candidates',
      'lhs_table' => 'gaur_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'Refer_Referrals',
      'rhs_table' => 'refer_referrals',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gaur_candider_referrals_c',
      'join_key_lhs' => 'gaur_candi1200didates_ida',
      'join_key_rhs' => 'gaur_candi95a3ferrals_idb',
    ),
  ),
  'table' => 'gaur_candider_referrals_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'gaur_candi1200didates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gaur_candi95a3ferrals_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gaur_candidefer_referralsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gaur_candidefer_referrals_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'gaur_candi1200didates_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'gaur_candidefer_referrals_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gaur_candi95a3ferrals_idb',
      ),
    ),
  ),
);
?>

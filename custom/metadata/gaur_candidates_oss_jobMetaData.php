<?php
// created: 2010-03-02 03:40:55
$dictionary["gaur_candidates_oss_job"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'gaur_candidates_oss_job' => 
    array (
      'lhs_module' => 'gaur_Candidates',
      'lhs_table' => 'gaur_candidates',
      'lhs_key' => 'id',
      'rhs_module' => 'OSS_Job',
      'rhs_table' => 'oss_job',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'gaur_candidates_oss_job_c',
      'join_key_lhs' => 'gaur_candica79didates_ida',
      'join_key_rhs' => 'gaur_candi6b6eoss_job_idb',
    ),
  ),
  'table' => 'gaur_candidates_oss_job_c',
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
      'name' => 'gaur_candica79didates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'gaur_candi6b6eoss_job_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'gaur_candidates_oss_jobspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'gaur_candidates_oss_job_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'gaur_candica79didates_ida',
        1 => 'gaur_candi6b6eoss_job_idb',
      ),
    ),
  ),
);
?>

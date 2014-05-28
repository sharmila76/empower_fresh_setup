<?php
// created: 2008-11-30 05:20:20
$dictionary["team_memberships"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'team_memberships' => 
    array (
      'lhs_module' => 'team',
      'lhs_table' => 'team',
      'lhs_key' => 'id',
      'rhs_module' => 'Users',
      'rhs_table' => 'users',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'team_memberships',
      'join_key_lhs' => 'team_id',
      'join_key_rhs' => 'user_id',
    ),
  ),
  'table' => 'team_memberships',
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
      'name' => 'team_id',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'user_id',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 =>
    array (
      'name' => 'is_manager',
      'type' => 'bool',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'team_membershipsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'team_memberships_alt',
      'type' => 'unique',
      'fields' => 
      array (
        0 => 'team_id',
        1 => 'user_id',
      ),
    ),
  ),
);
?>

<?php
/*
 * Created on Jul 6, 2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 $dictionary['obj_objectives_users'] = array (                       //same with metadate field name
	'table' => 'obj_objectives_users',				//relationship table
	'fields' => array (
		array(
			'name' =>'id', 
			'type' =>'varchar', 
			'len'=>'36'), 
		array(
			'name' =>'objective_id', 
			'type' =>'varchar', 
			'len'=>'36'), 
		array(
			'name' =>'user_id', 
			'type' =>'varchar', 
			'len'=>'36'), 
		array (
			'name' => 'date_modified',
			'type' => 'datetime'), 
		array(
			'name' =>'deleted', 
			'type' =>'bool', 
			'len'=>'1', 
			'required'=>false, 
			'default'=>'0'),
		array (
			'name' => 'objective_value',
			'type' => 'varchar',
			'len'=>'36'), 	
		array (
			'name' => 'effective_start_date',
			'type' => 'datetime'), 
		array (
			'name' => 'effective_end_date',
			'type' => 'datetime'), 
		array (
			'name' => 'list_index',
			'type' => 'varchar',
			'len'=>'36'), 
		
	), 
	'relationships' => array (
		'obj_objectives_users' => array(
				'lhs_module'=> 'OBJ_Objectives', 
				'lhs_table'=> 'obj_objectives', 
				'lhs_key' => 'id',					//id name in default table
				'rhs_module'=> 'User', 
				'rhs_table'=> 'users', 
				'rhs_key' => 'id',
				'relationship_type'=>'many-to-many',
				'join_table'=> 'obj_objectives_users',		//relationship table
				'join_key_lhs'=>'objective_id', 			//id name in relationship table
				'join_key_rhs'=>'user_id'))
)
 
?>

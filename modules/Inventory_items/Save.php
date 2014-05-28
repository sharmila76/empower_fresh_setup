<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	

	### FIX DATES ###

	$_REQUEST['date_received'] = $_REQUEST['date_received'] . ' 00:00';

	if( $_REQUEST['date_left'] )
	{
		$_REQUEST['date_left'] = $_REQUEST['date_left'] . ' 00:00';
	}


	### INITIALIZE OBJECT ###
	
	require_once('modules/Inventory_items/Inventory_item.php');
	
	$focus = new Inventory_item();



	### GET ANY DATA FROM DATABASE ###

	$focus->retrieve($_REQUEST['record']);



	### ACL ACCESS ###

	if(!$focus->ACLAccess('Save'))
	{	
		ACLController::displayNoAccess(true);
		sugar_cleanup(true);
	}
	


	### CHECK IF WE NEED LOGS WHILE POPULATING OBJECT DATA FROM POST ###

	$change_fields = array( 	'date_received', 
					'date_left', 
					'inventory_number', 
					'account_id'
					);

	$change_flags = array();

	foreach($focus->column_fields as $field)
	{
		if(isset($_REQUEST[$field]))
		{
			$value = $_REQUEST[$field];

			if( in_array( $field, $change_fields ) && $focus->$field != $value && $focus->$field ) 
			{
				$change_flags[$field] = $value;
			}

			$focus->$field = $value;
		}
	}



	### POPULATE ADDITIONAL OBJECT DATA FROM POST ###

	foreach($focus->additional_column_fields as $field)
	{
		if(isset($_REQUEST[$field]))
		{
			$value = $_REQUEST[$field];
			$focus->$field = $value;
	
		}
	}



	### BUILD INVENTORY NUMBER ###
	
	if( ! $focus->inventory_number )
	{
		$name = explode( ' ', strtoupper($_REQUEST['account_name']) );

		if( count( $name ) == 1 )
		{
			$name = $name[0];
		}
		else
		{
			$name = $name[1] . '.' . substr( $name[0], 0, 1 );
		}

		$item_number = $focus->get_num_items( $_REQUEST['account_id'] ) + 1;

		switch( strlen( $item_number ) )
		{
			case 1 :
				$item_number = '00' . $item_number;
				break;
			case 2 : 
				$item_number = '0' . $item_number;
				break;
		}

		$inventory_number = str_replace( '-', '.', substr( $focus->date_received, 0, 10 ) ) . '_' . $name . '_' . $item_number;

		$focus->inventory_number = $inventory_number;
	}

		
	
	### SAVE RESIZED PHOTO ###

	
	if( file_exists( $_FILES['photo']['tmp_name'] ) )
	{
		//$dir = dirname(__FILE__) . '/images/';
		$dir = 'modules/Inventory_items/images/';
	
		$new_name = $focus->inventory_number;
	
		$photo = $_FILES['photo'];
	
		$filename  = $dir . $new_name . '.jpeg';
		$thumbname = $dir . $new_name . '_thumb.jpeg';

		$focus->photo = $filename;
	
		$image = imagecreatefromjpeg( $photo['tmp_name'] );
		
		$max_dimension = 700;
	
		$old_x = imageSX( $image );
		$old_y = imageSY( $image );
	
		if( $old_x > $old_y )
		{
			$x = $max_dimension;
			$y = $max_dimension * $old_y / $old_x;
		}
		else if( $old_x < $old_y )
		{
			$x = $max_dimension * $old_x / $old_y;
			$y = $max_dimension;
		}
		else
		{
			$x = $max_dimension;
			$y = $x;
		}
	
		$resized_image = ImageCreateTrueColor( $x, $y );
	
		imagecopyresampled( $resized_image, $image, 0, 0, 0, 0, $x, $y, $old_x, $old_y );
		
		imagejpeg( $resized_image, $filename );
	
		imagedestroy( $image );

		imagedestroy( $resized_image );
		
	
	
		### SAVE THUMBNAIL ###

		$resized_image = imagecreatefromjpeg( $filename );

		$max_dimension = 100;
	
		$old_x = imageSX( $resized_image );
		$old_y = imageSY( $resized_image );
	
		if( $old_x > $old_y )
		{
			$x = $max_dimension;
			$y = $max_dimension * $old_y / $old_x;
		}
		else if( $old_x < $old_y )
		{
			$x = $max_dimension * $old_x / $old_y;
			$y = $max_dimension;
		}
		else
		{
			$x = $max_dimension;
			$y = $x;
		}
	
		$thumb = ImageCreateTrueColor( $x, $y );
	
		imagecopyresampled( $thumb, $resized_image, 0, 0, 0, 0, $x, $y, $old_x, $old_y );
		
		imagejpeg( $thumb, $thumbname );
	
		imagedestroy( $resized_image );
		imagedestroy( $thumb );

	}

	

	### SAVE / UPDATE ###

	if($focus->save())
	{
		global $current_user;

		foreach( $change_flags as $field => $value )
		{
			require_once 'Inventory_change.php';

			$change = new Inventory_change();
			
			$change->inventory_item_id = $focus->id;
			$change->user_id = $current_user->id;
			$change->user_name = $current_user->name;
			$change->changed_field = $field;
			$change->value = $value;
			$change->date = date('Y-m-d H:i');

			$change->save();
		}
	}



	### RETURN TO INDEX PAGE ###

	$return_id = $focus->id;

	require_once('include/formbase.php');

	handleRedirect($return_id,'Inventory_items');
	
?>

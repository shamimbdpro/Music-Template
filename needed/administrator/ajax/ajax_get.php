<?php
error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['nameAdmin']) && $_SESSION['nameAdmin'] ) {
	
		/*///////////////////////
		 Require data 
		///////////////////////*/
		if (!empty($_POST['content']) && !empty($_POST['name']) ) {
			
			$table = $_POST['content'];
			$name = $_POST['name'];

			// Get data
			// $table = end(explode('/', $_SERVER['HTTP_REFERER']));
			$dbaser->where ("type", substr($table, 0, -1));
			$usersTypes = $dbaser->getOne ("userstypes");
			
			if (!empty($usersTypes)) {
				
				$dbaser->join("members me", "me.id = col.userid ", "LEFT");
				$data = $dbaser->get ($table ." col",null," col.*, me.realname as title ");
				
			} else {
				
				$data = $dbaser->get ($table ,null," * " );

			}

			// Get Data
			echo '<select class="form-control" id="get_this_value">'.list_options_select($data, null).'</select>';	
		}
		
	} else {
		
		echo  NotePopup('Not allowed', 2);
		
	}
	
?>
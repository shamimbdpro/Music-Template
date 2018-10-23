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
		$explode = explode('/', $_SERVER['HTTP_REFERER']);
		$table = end($explode);

		if (!empty($_POST['value']) && !empty($_POST['new_value']) && !empty($_POST['col']) && !empty($_POST['id']) && !empty($table) ) {
			
			$new_value = $_POST['new_value'];
			$value = $_POST['value'];
			$col = $_POST['col'];
			$id = $_POST['id'];

			$data = Array ($col => $value);
			$dbaser->where ('id', $id);
				
			if ($dbaser->update ($table, $data)) {
				echo $new_value;
			} else {
				echo  NotePopup('Not allowed', 2);
			}
		}
		
	} else {
		
		echo  NotePopup('Not allowed', 2);
		
	}
	
	
?>
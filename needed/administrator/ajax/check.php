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
	
	if (isset($_POST['id']) && isset($_POST['link']) && $_POST['check'] == 'true') {
			
		$check = checkMedia($_POST['id']);
			
		if ($check == '1') {
				
			echo $check;
		
		} elseif ($check == '0') {
		
			echo NotePopup('please login to view this media');
		
		}				
		 
	} elseif (isset($_POST['id']) && isset($_POST['link']) && $_POST['check'] == 'false') {
		
		$Do = playMedia($_POST['id']);
		echo $Do;
	
	}
		
		
?>
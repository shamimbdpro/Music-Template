<?php
error_reporting(0);

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['nameAdmin']) && $_SESSION['nameAdmin']) {
		
		if (isset($_FILES['photo'])) {
		
			$upload = upload_media($_FILES['photo'], null,$_POST['current_folder']);
			
			if ($upload) { echo 1; } else { echo 2; }
			
		} elseif (isset($_FILES['file'])) {

			$upload = upload_media($_FILES['file'], null,$_POST['current_folder']);
			
			if ($upload) { echo $upload; } else { echo 2; }

		} elseif (isset($_POST['id']) && isset($_POST['type']) && $_POST['type'] == 'delete') {
		
			$delete = delete_media($_POST['id']);
			
			if ($delete == 1) { echo 1; } else { echo $delete; }
		
		}
		
	} else {
		
		echo NotePopup('Error! : Not allowed', 2);
		
	}


?>
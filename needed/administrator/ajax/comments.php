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
	
	if(isset($_SESSION['membername']) || $_SESSION['membername']) {
		
		if (isset($_POST['comment']) AND isset($_POST['id']) ) {
			
			$comment = addNewComment($_POST['comment'], $_POST['id']);
			
			if ($comment !== 2) {
			
				echo NotePopup('Your comment has been added.');
			
			} else {
			
				echo NotePopup('Please try again later.');
			
			}
			
		} 
		
	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
	echo 'ar';
		
?>
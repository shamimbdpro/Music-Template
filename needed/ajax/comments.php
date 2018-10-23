<?php
// error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');

	if(isset($_SESSION['membername']) && !empty($_SESSION['membername'])) {
		
		if (isset($_POST['comment']) && !empty($_POST['comment'])) {
			
			$comment = addNewComment($_POST, $_SESSION['membername']);
			
			if ($comment == 1) {
			
				$output =  NotePopup('Your comment has been added.' , 1);
			
			} else {
			
				$output =  NotePopup('Error:  ' . $comment , 2);
			
			}
			
		} else {
			
			$output = NotePopup('You can not add empty comment' , 2);
		
		}
		
	} else {
	
		$output = NotePopup('Please login .' , 2);
	
	}
	
	echo $output;
	
	
	
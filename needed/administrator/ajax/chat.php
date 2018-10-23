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

	session_start();
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['membername']) || $_SESSION['membername']) {
		
		if ($_GET['message'] AND $_GET['to'] AND $_GET['type'] == 1) {
			
			echo getChatForm($_GET['to']);
			
		} elseif ($_GET['message'] AND $_GET['to'] AND $_GET['type'] == 2) {
			
			$Do = sendMessage($_GET['to'], $_GET['message']);
			
			if($Do == '1') {
				
				echo lastChatMessage(null);
				
			} elseif ($Do == '2') {
			
				echo NotePopup('You can not send messages to this user');
			
			}
			
		}
		
		if ($_GET['type'] == 'check' AND isset($_GET['number'])) {
			
			echo checkNewMessage(null, $_GET['number']);
			
		}
		
		if ($_GET['type'] == 'read' AND isset($_GET['number'])) {
			
			echo readMessage($_GET['number']);
			
		}
		
		if ($_GET['type'] == 'getajax') {
			
			echo chatList();
			
		}
		
		if ($_GET['type'] == 'get' AND isset($_GET['number'])) {
			
			echo getNewMessage($_GET['number']);
			
		}
		
	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
		
?>
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
	
	///////////////////////////
	// Get Category media ajax
	///////////////////////////
	
	if ($_POST['id'] AND $_POST['type'] AND $_POST['kind'] == '1') {
			
		$Do = ViewCatsMedia($_POST['id']);
			
		if($Do || isset($Do)) {
				
			echo $Do;
				
		} elseif ($Do == '2') {
			
			echo NotePopup('Refresh and try again');
			
		}
	}
	
	
	///////////////////////////
	// Get Search result ajax
	///////////////////////////
	
	if ($_POST['title'] AND $_POST['type'] AND $_POST['kind'] == '3') {
			
		$Do = searchMedia($_POST['type'], $_POST['title']);
			
		if($Do || isset($Do)) {
				
			echo $Do;
				
		} elseif ($Do == '2') {
			
			echo NotePopup('No search result.. Try in another way');
			
		}
	}
	
	///////////////////////////
	// Get Next item in playlist
	///////////////////////////
	
	if ($_POST['id'] AND $_POST['next'] == 'true') {
			
		$Do = nextPlaylist($_POST['id'], 'next');
		if ($Do == '2') {
			echo 1;
		} else {
			echo $Do;
		}		
		
	} elseif ($_POST['id'] AND $_POST['back'] == 'true') {
		
		$Do = nextPlaylist($_POST['id'], 'back');
		if ($Do == '2') {
			echo 1;
		} else {
			echo $Do;
		}		
	
	}
	
		
		
	//////////////////////////////////////
	// Get Media items by custom Channel
	//////////////////////////////////////
	
	if ($_POST['id'] AND $_POST['kind'] == 'chmedia' AND isset($_POST['type'])) {
			
		$Do = MediaChannel($_POST['type'], $_POST['id']);
		echo $Do;
		
	} 
	
		
		
		
?>
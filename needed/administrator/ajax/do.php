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
		
		if ($_POST['id'] AND $_POST['type'] == 'like') {
			
			$Do = DoLike($_POST['id']);
			
			if($Do == '1') {
				
				echo NotePopup('Thanks for like');
				echo CheckLike($_POST['id']);
				
			} elseif ($Do == '2') {
			
				echo NotePopup('Thanks for unlike.');
				echo CheckLike($_POST['id']);
			
			}
			
		} elseif ($_POST['id'] AND $_POST['type'] == 'follow') {
			
			$Do = addFollow($_POST['id']);
			
			if($Do == '1') {
				
				echo NotePopup('Added to following list');
				echo checkFollow($_POST['id']);
				
			} elseif ($Do == '2') {
			
				echo NotePopup('Removed from following list');
				echo checkFollow($_POST['id']);
			
			} elseif ($Do == '3') {
			
				echo NotePopup('You can not follow yourself');
			
			}
		
		} elseif (isset($_POST['id']) AND isset($_POST['type']) AND $_POST['kind'] == 'playlist' AND $_POST['do'] == 'add') {
			
			$Do = addToPlaylist($_POST['id'],$_POST['type']);
			
			if($Do == '1') {
				
				echo NotePopup('Added to playlist');
				
			} else {
			
				echo NotePopup($playlist. 'Can not add this item to your playlist');
				
			}
		
		} elseif ($_POST['id'] AND $_POST['type'] == 'playlist' AND $_POST['do'] == 'delete') {
			
			$Do = deletePlaylist($_POST['id']);
			
			if($Do == '1') {
				
				echo NotePopup('Deleted from playlist');
				
			} else {
			
				echo NotePopup('Can not delete this item from your playlist');
				
			}
		
		}
		
		if ($_POST['update']) {
			
			$playlist = getPlaylist();
			
			echo $playlist;
		}
		
	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
		
?>
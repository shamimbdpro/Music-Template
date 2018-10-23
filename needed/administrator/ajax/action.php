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
	
	$FullAdmin = new FullAdmin();
	
	if(isset($_SESSION['nameAdmin']) || $_SESSION['nameAdmin']) {
		
		if ($_POST['id'] AND $_POST['type'] == 'set_plugin') {
			
			$Do = update_plugin($_POST['id']);
			
			if($Do == '1') {
				
				echo '1';
				
			} elseif ($Do == '2') {
			
				echo '  <div class="alert alert-alert">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Error!</strong>  
						</div>
						
						';
			
			}
			
		} elseif ($_POST['id'] AND $_POST['type'] == 'set_home') {
			
			
			$add = $FullAdmin->set_homepage($_POST['id']);
				
			if($add == 1) {
					
				echo $add;
					
			}  else {
				
				echo NotePopup('Error! : '.$add, 2);
				
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
		
		
	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
		
?>
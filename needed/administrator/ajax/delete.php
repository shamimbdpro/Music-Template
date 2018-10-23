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
	
	if(isset($_SESSION['nameAdmin']) && $_SESSION['nameAdmin']) {
			 
		$admin = new FullAdmin();
			
		$admin->db = $db;
			
		if ($_POST['type'] == 'del_item') {
								
			$explode = explode('/', $_SERVER['HTTP_REFERER']);
			$table = end($explode);
			$dbaser->where('id', $_POST['id']);

			if($dbaser->delete($table)) {

				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}	
			
		if ($_POST['type'] == 'del_admin') {
			
			$admin->adminId = $_POST['id'];
			
			$delete = $admin->DeleteAdmin();
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}	
			
		if ($_POST['type'] == 'del_user') {
			
			$member = new Members();
					
			$member->db = $db;
			
			$member->memberId = $_POST['id'];
			
			$delete = $member->DeleteMember();
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}	
			
		if ($_POST['type'] == 'del_media') {
			
			$media_class->mediaID = $_POST['id'];
			
			$delete = $media_class->deleteMedia();
			
			if($delete == 1) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}	
			
		if ($_POST['type'] == 'ban_media') {
			
			$media_class->mediaID = $_POST['id'];
			
			$edit = $media_class->enable_dis_Media();
			
			if($edit) {
				
				echo NotePopup('Updated successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $edit , 2);
			
			}
		}	
			
		if ($_POST['type'] == 'del_level') {
			
			$delete = $admin->DeleteLevel($_POST['id']);
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
		if ($_POST['type'] == 'del_page') {
			
			$delete = $admin->DeletePage($_POST['id']);
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
		if ($_POST['type'] == 'del_cat') {
			
			$delete = $admin->DeleteCategory($_POST['id']);
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
		if ($_POST['type'] == 'del_post') {
			
			$delete = $admin->DeletePost($_POST['id']);
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}			
		
		if ($_POST['type'] == 'del_hook') {
			
			$delete = $admin->DeleteHook($_POST['id']);
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
		if ($_POST['type'] == 'paid_withdrawal') {
			
			$delete = updateTblVal(' withdrawal ', $_POST['id'], " `status` = 1 ");
			
			if($delete) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
		if ($_POST['type'] == 'del_plan') {
			
			$delete = Plans::delPlan($_POST['id']);
			
			if(is_numeric($delete)) {
				
				echo NotePopup('Deleted successfully!' , 1);
				
			}  else {
			
				echo NotePopup('Error: ' . $delete , 2);
			
			}
		}		
		
	} else {
		
		echo NotePopup('Please login first', '2');
		
	}
?>
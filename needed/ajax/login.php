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
	
	//-----------------------
	// Detect required 
	//-----------------------
	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');
	
	/*///////////////////////
	 Setting data 
	///////////////////////*/
	$Members = new Members();
	$Members->db = $db;
	
	if (isset($_POST['reg_email']) && isset($_POST['reg_name'])) {
	
		$Members->memberName = $_POST['reg_name'];
		$Members->memberPass = $_POST['reg_password'];
		//$Members->memberConfirmPass = $_POST['reg_confirm_password'];
		//$Members->memberFullname = $_POST['reg_full_name'];
		$Members->memberEmail = $_POST['reg_email'];
		
		// Submit registeration function
		$result = $Members->addMember();
		
		if ($result == 1) {
			echo NotePopup('Thanks for registration', 1);
		} else {
			echo NotePopup($result, 2);
		} 
	} 
	if (isset($_POST['log_name']) && isset($_POST['log_password'])) {
	
		$Members->memberName = $_POST['log_name'];
		$Members->memberPass = $_POST['log_password'];
	
		// Submit login function
		$result = $Members->checkMember();
		
		if ($result == 1) {
			echo $result;
		} else {
			echo NotePopup($result, 2);
		}
	
	}
	
?>
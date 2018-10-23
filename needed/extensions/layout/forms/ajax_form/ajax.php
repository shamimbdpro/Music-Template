<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	
	if (isset($_POST)) {
		
		require_once("../../../../classes/configuration.php");	
		require_once("../../../../classes/functions.php");	
		
		
		$FullAdmin = new FullAdmin();
		$FullAdmin->db = $db;
		$Setting = $FullAdmin->siteSetting();
		
		$message = '';
			
		$get_hook = get_hook_id($_POST['form-id']);
		
		$form_data = unserialize($get_hook['content']);
		
		$mail = $form_data['options']['mail'];
		
		$title = $get_hook['title'];
		
		unset($_POST['form-id'] , $_POST['plugin']);
		
		foreach ($_POST as $key => $value) {
			
			$message .= $key . '  :  ' . $value .' 
			
			';
			
		}
		
		$headers = "From: " . $Setting['sad'] . " " . "\r\n" .
		
		if(mail($mail, $title, $message, $headers)) {
			
			// 1- $message_title
			// 2- $message_email
			// 3- $message_content
			// 4- $message_reply_id
			$FullAdmin->send_admin_message($title, $mail, $message, 0);
			
			echo '<p>Tanks for your message</p>';
		
		} else {
			echo 'Email not sent.. please try again';
		}
	}
	
	
	
	
	
	
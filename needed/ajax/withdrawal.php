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
	
	session_start();
	
	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');
	
	if(isset($member['id']) || !empty($member['id'])) {
	
		$withdrawal_class = new withdrawal();
			
		if ($_POST['form_type'] == 'withdrawal') {
			
			if ($_POST['amount'] > $member['credit']) {
				
				echo NotePopup('Error! : You have no enough credit at your account', 2);
				
			} elseif (empty($_POST['account'])) {

				echo NotePopup('Error! : Insert your account details', 2);

			} elseif (empty($_POST['method'])) {

				echo NotePopup('Error! : Choose your payment method', 2);

			} else {

				$withdrawal_class->account = $_POST['account'];
				$withdrawal_class->method = $_POST['method'];
				$withdrawal_class->userID = $member['id'];
				$withdrawal_class->amount = $_POST['amount'];
				
				$add = $withdrawal_class->submitWithdrawal($_POST['amount'], $_POST['account'], $_POST['method']);
				
				if(is_numeric($add)) {
					
					echo '1';
					
				}  else {
				
					echo NotePopup('Error! : '.$add, 2);
				
				}
			}

			
		}	
		
	} else {
		
		echo NotePopup('Please login first', '2');
		
	}

	
	
	
	
	
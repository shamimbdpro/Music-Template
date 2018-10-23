﻿<?php
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
	
	if (isset($member['id']) && isset($_POST['type']) && isset($_POST['id'])) {
		
		if ($_POST['type'] == 'notes') {
			
			$count = count_notification();
			$check = check_notification($_POST['id']);
				
			if ($check) {
				$arr = array('count' => $count, 'content' => $check);
				echo json_encode($arr);
			} 	
			
		} elseif ($_POST['type'] == 'chat') {
		
			$count = count_messages();
			$check = check_messages();
				
			if ($check) {
				$arr = array('count' => $count, 'content' => $check);
				echo json_encode($arr);
			} 	
		}	
	}
	
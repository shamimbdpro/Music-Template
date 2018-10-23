<?php

 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	/*///////////////////////
	 Required files  
	///////////////////////*/
	require_once('./classes/configuration.php');
	require_once('./classes/functions.php');
	

	/*///////////////////////
	 Setting data 
	///////////////////////*/
	$FullAdmin = new FullAdmin();
	$FullAdmin->db = $db;
	$Setting = $FullAdmin->siteSetting();
	
	if (!empty($Setting)) {

		// Set login form
		$checkLogin = $FullAdmin->checkAdmin();
		
		
		/*///////////////////////
		 Members secssion
		///////////////////////*/
		if (isset($_SESSION['membername'])) {
			$loggedUser = $_SESSION['membername'];
		} else {
			$loggedUser = '0';
		}

		/*///////////////////////
		 Logout members
		///////////////////////*/
		$logout = new Members();
		
		if (isset($_GET['logout'])) {
		
			$logout->LogoutMember();
			header("Location: ".$CONF['url']);
			
		}
		
		/* //////////////////////////////////
		|| Query template via route
		///////////////////////////////////*/
		include("./pages.php");

		/*////////////////////////////////
		 Check if site under couistruction
		////////////////////////////////*/	
		if ($Setting['under'] == 0) {
			
			// Outputs the page with the content.
			echo $layout->output();
			
		} else {
			
			echo '<h4>' . $Setting['undermsg'] . '</h4>';

		}
		
	} else {
		echo '<h4><br />Check if your database uploaded successfully</h4>';
	}
	mysqli_close($db);

?>

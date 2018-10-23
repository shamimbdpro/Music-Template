<?php

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------------------------
	// @Params Check if the User is admin
	//-----------------------------------
	if ( isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] )
	{
		//-----------------------------------
		// @Params Require some pages
		//-----------------------------------
		
		// Set the required page Name
		if (isset($_GET['name']))  {$adminPage = $_GET['name'];} else {$adminPage = '';}
		if (isset($_GET['id']))  {$requiredID = $_GET['id'];} else {$requiredID = '';}
		if (isset($_GET['type']))  {$requiredTYPE = $_GET['type'];} else {$requiredTYPE = '';}
			
		if (isset($_GET['name']) AND isset($_GET['ajax'])) {
				
			if (is_file("./administrator/{$adminPage}.php"))
			{	
				$page = require_once("./administrator/{$adminPage}.php");	
			
				echo $page;
				
			} else {
			
				$page = require_once("./administrator/intro.php");	
					
				echo $page;
				
			}
			
		} elseif (isset($_GET['name']))  {
			
			if (is_file("./administrator/{$adminPage}.php"))
			{
				$page = require_once("./administrator/{$adminPage}.php");
				
				return $page;
				
			} else {

				$page = require_once("./administrator/intro.php");	
					
				return $page;
					
			}

		} else {
			
			$page = require_once("./administrator/intro.php");	
			
			return $page;
			
		}
		
	}	else {
	
		$page = require_once("./administrator/login.php");	
			
		echo $page;	
	
	}
		
?>
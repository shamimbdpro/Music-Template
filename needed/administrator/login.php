<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	// Set login form
	$checkLogin = $FullAdmin->checkAdmin();
	
	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/login.tpl");
	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("checklogin", $checkLogin);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
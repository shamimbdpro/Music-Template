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
	 Setting data 
	///////////////////////*/
	$FullAdmin = new FullAdmin();
	$FullAdmin->db = $db;
	$allAdmins = $FullAdmin->AllAdmins();
	
	// Get administrators levels [ All ]
	$allLevels = $FullAdmin->adminsLevels(null);
	
	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/levels.tpl");
	$profile->set("pagename", "View all administrators levels");
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("all_levels", $allLevels);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
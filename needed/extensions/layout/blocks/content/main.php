<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------
	// Load info file
	//-----------------
	require_once($PLUGIN_PATH."/info.php");

	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$content = unserialize($get_hook['content'])['content'][0] ;
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("content", $content);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
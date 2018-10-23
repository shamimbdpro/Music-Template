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
	include($plugin_path."/info.php");

	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);

		$facebook = $hook_data['social']['facebook'] ? $hook_data['social']['facebook'] : ''; 
		$twitter = $hook_data['social']['twitter'] ? $hook_data['social']['twitter'] : '';
		$google = $hook_data['social']['google'] ? $hook_data['social']['google'] : '';
		$behance = $hook_data['social']['behance'] ? $hook_data['social']['behance'] : '';
		
	} else {
	
		$facebook = '';
		$twitter = '';
		$google = '';
		$behance = '';
	
	}
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("facebook", $facebook);
	$plugin->set("twitter", $twitter);
	$plugin->set("google", $google);
	$plugin->set("behance", $behance);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
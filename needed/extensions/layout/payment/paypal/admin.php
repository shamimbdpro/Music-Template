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

	if (isset($_GET['id'])) {
		
		$plugin_id = $dbaser->escape($_GET['id']);
		$dbaser->where('plugin_id', $plugin_id);
		$plugin = $dbaser->getOne('plugins_options');
		
		$plugin_data = unserialize($plugin['content']);

		$email = isset($plugin_data['email']) ? $plugin_data['email'] : ''; 

	} else {
	
		$email = '';
	
	}
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("email", $email);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
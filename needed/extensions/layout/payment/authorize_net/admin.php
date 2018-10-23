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

		$id = isset($plugin_data['id']) ? $plugin_data['id'] : ''; 
		$key = isset($plugin_data['key']) ? $plugin_data['key'] : ''; 
		$url = isset($plugin_data['url']) ? $plugin_data['url'] : ''; 

	} 
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("id", isset($plugin_data['id']) ? $plugin_data['id'] : '');
	$plugin->set("key", isset($plugin_data['key']) ? $plugin_data['key'] : '');
	$plugin->set("redirect_url", isset($plugin_data['url']) ? $plugin_data['url'] : '');
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
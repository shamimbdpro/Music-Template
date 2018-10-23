<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//error_reporting(0);
	
	//-----------------
	// Load info file
	//-----------------
	include($plugin_path."/info.php");
	include($plugin_path."/functions.php");
	
	$cats_func = $FullAdmin->loadCats();
	
	// Set functions
	$arrows = ''; $type_val = ''; 
	
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);
		
		if (isset($hook_data['options'])) { $type_val = $hook_data['options']['type'];} else {$type_val = '';}
	
	}
	
	$types = filter_gallery_options($type_val); 
		
	if (isset($hook_data['options'])) { $content = $hook_data['options'];} else {$content = '';}
	
	$slides = filter_gallery_admin_func($content); 
	$cats = filter_gallery_tags_view($content); 
		
		
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("types", $types);
	$plugin->set("slides", $slides);
	$plugin->set("cats", $cats);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
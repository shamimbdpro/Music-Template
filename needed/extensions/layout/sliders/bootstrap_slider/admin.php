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
	$arrows = ''; $max = ''; 
	
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);
		
		$max = $hook_data['options']['max'] ? 	$hook_data['options']['max'] : ''; 
		
		$arrows = option_toChecked($hook_data['options']['arrows']) ?	option_toChecked($hook_data['options']['arrows']) : ''; 
		
	}
	
	if (isset($hook_data['options'])) { $content = $hook_data['options'];} else {$content = '';}
	
	$slides = set_slides_func($content); 
		
		
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("arrows", $arrows);
	$plugin->set("max", $max);
	$plugin->set("slides", $slides);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
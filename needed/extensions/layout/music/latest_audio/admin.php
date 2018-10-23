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
	include($plugin_path."/functions.php");

	$guery_plugin = get_plugin($_GET['id']);
	
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);

	} 
	
	if (isset($hook_data['options']['cat'])) {$current_cat = $hook_data['options']['cat'];} else { $current_cat = '';}
	if (isset($hook_data['options']['max_items'])) {$max_items = $hook_data['options']['max_items'];} else { $max_items = '';}
	
	$media_class->mediaCatType = 1;
	
	$cats = list_options_active($current_cat, $media_class->getMediaCats());
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("max_items", $max_items);
	$plugin->set("cats", $cats);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
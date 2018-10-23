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
	
	$load_menu_pages = pages_query_per_template($Setting['template'] , 1);
	
	$menu = disbled_menu_items_h_admin($load_menu_pages);
	
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);
		
		$current_val = unserialize($guery_hook['content'])['menu'];
		
		$menu_array = json_decode(unserialize($guery_hook['content'])['menu'], true);
	
		$output =  load_pages_h_menu_admin($menu_array);	
		
		$menu = disbled_menu_items_h_admin($load_menu_pages , $menu_array);
		//$menu = disbled_menu_items_admin($load_menu_pages );
	
	}
	
	
	
	
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path'].str_replace('./','',$plugin_path));
	$plugin->set("menu", $menu);
	$plugin->set("current", $output);
	$plugin->set("current_val", $current_val);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
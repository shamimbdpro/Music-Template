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
	require_once($PLUGIN_PATH."/functions.php");

	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$menu_array = json_decode(unserialize($get_hook['content'])['menu'], true);
	
	$out = load_pages_v_menu($menu_array);
	
	add_head_css('load_head' , $PLUGIN_PATH . '/style.css');
	add_head_js('load_head' , $PLUGIN_PATH . '/script.js');
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("content", $out);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
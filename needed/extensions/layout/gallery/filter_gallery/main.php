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
	
	$work = new Template($PLUGIN_PATH."/work.tpl");		
	
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$modern_slider = unserialize($get_hook['content']);
		
	$query_slider = $modern_slider['options'];
	
	$view = filter_gallery_func(unserialize($get_hook['content'])['options'] , $work);
	$tags = filter_gallery_tags(unserialize($get_hook['content'])['options']);
	
	
	add_head_css( 'load_head', $PLUGIN_PATH . "/assets/css/style.css" );
	add_head_js('load_head', $PLUGIN_PATH . "/assets/js/jquery.isotope.js" );
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("plugin_path", str_replace('./' , '' , $PLUGIN_PATH));
	$plugin->set("tags", $tags);
	$plugin->set("content", $view);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	
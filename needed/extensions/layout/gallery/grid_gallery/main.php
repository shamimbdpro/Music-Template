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
	
	$slide = new Template($PLUGIN_PATH."/slide.tpl");		
		
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$grid_gallery_data = unserialize($get_hook['content']);
	
	$content = grid_gallery_data($grid_gallery_data['options'] , $slide);
	
	add_head_css( 'load_head', $PLUGIN_PATH . "/assets/css/demo.css" );
	add_head_css( 'load_head', $PLUGIN_PATH . "/assets/css/style1.css" );
	add_head_css( 'load_head', $PLUGIN_PATH . "/gallery.css" );
	
	add_head_js( 'load_head', $PLUGIN_PATH . "/assets/js/modernizr-custom.js" );
	add_head_js( 'load_head', $PLUGIN_PATH . "/assets/js/imagesloaded.pkgd.min.js" );
	add_head_js( 'load_head', $PLUGIN_PATH . "/assets/js/masonry.pkgd.min.js" );
	add_head_js( 'load_head', $PLUGIN_PATH . "/assets/js/classie.js" );
	add_head_js( 'load_head', $PLUGIN_PATH . "/assets/js/main.js" );
	
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("plugin_path", str_replace('./' , '' , $PLUGIN_PATH));
	$plugin->set("id", $get_hook['id']);
	$plugin->set("gallery", $content);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
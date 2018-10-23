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

	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	//$form = load_form(unserialize($get_hook['content']) , $tpl);
	 
	$form = unserialize($get_hook['content'])['form'];  
	 
	add_head_css( 'load_head', $PLUGIN_PATH . "/assets/form-render.min.css" );
	add_footer_js( 'load_head', $PLUGIN_PATH . "/assets/form-builder.min.js" );
	add_footer_js( 'load_head', $PLUGIN_PATH . "/assets/form-render.min.js" );
	add_footer_js( 'load_head', $PLUGIN_PATH . "/assets/form-render.loader.js" );
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("form", $form);
	$plugin->set("title", $get_hook['title']);
	$plugin->set("id", $get_hook['id']);
	$plugin->set("path", $CONF['path'].str_replace('./','',$PLUGIN_PATH));
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
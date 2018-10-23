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
	
	// SET admin class
	$FullAdmin = new FullAdmin;
	
	$FullAdmin->db = $db;
	
	require_once($PLUGIN_PATH."/info.php");
	require_once($PLUGIN_PATH."/functions.php");

	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
	
	$post = new Template($PLUGIN_PATH."/post.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$get_posts = $FullAdmin->loadPosts(unserialize($get_hook['content'])['options']['max']);
	
	$Setting = $FullAdmin->siteSetting();
		
	$content = grid_posts($get_posts , $post);
	
	add_head_css( 'load_head', $PLUGIN_PATH."/css/style1.CSS" );
	add_head_js( 'load_head', $PLUGIN_PATH."/js/modernizr.custom.js" );
	add_footer_js( 'load_footer', $PLUGIN_PATH."/js/classie.js" );
	add_footer_js( 'load_footer', $PLUGIN_PATH."/js/main.js" );
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("plugin_path", str_replace('./' , '' , $PLUGIN_PATH));
	$plugin->set("grid_posts", $content);
	$plugin->set("content", $content);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
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
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;
	$Setting = $FullAdmin->siteSetting();
	
	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/post.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$portfolio_posts = unserialize($get_hook['content']);
			
	$get_posts = $FullAdmin->loadPosts($portfolio_posts['max_items']);
	
	$Setting = $FullAdmin->siteSetting();
		
	$portfolio_posts = '';
	$portfolio_posts .= portfolio_posts($get_posts , $tpl);
	
	add_head_css( 'load_head', $PLUGIN_PATH."/theme.css" );

	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("title", $get_hook['title']);
	$plugin->set("content", $portfolio_posts);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 $out = $plugin->output();
	 return $out;
	
	
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
	
	$media_class = new media();
	$media_class->db = $db;
	
	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$music_showcase = unserialize($get_hook['content']);
	
	$media_class->mediaType = '2';
	$cat   = $media_class->mediaCat = $music_showcase['options']['cat'];
	$limit = $media_class->mediaNum = $music_showcase['options']['max_items'];
	
	$media_class->mediaOrder = $music_showcase['options']['order'];
	
	$item_tpl = new Template($PLUGIN_PATH."/video_item.tpl");;		
	
	$get_items = query_media_items($media_class->getMediaList() , $item_tpl, 'load-media'.$music_showcase['options']['order']);
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("title", $get_hook['title']);
	$plugin->set("content", $get_items);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 $out = $plugin->output();
	 return $out;
	
	
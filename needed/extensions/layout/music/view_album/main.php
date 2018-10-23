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
		
	$album_title = $get_hook['title'];
	$album_showcase = unserialize($get_hook['content']);
	
	$album  = $media_class->albumID = $album_showcase['options']['album'];
	
	$item_tpl = new Template($PLUGIN_PATH."/item.tpl");		
	
	$album_data = $media_class->getAlbum();
	
	$album_count = count($media_class->getAlbumItems());
	
	$get_items = query_media_items($media_class->getAlbumItems() , $item_tpl);
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("plugin_title", $album_title);
	$plugin->set("album_items", $album_count);
	$plugin->set("album_id", $album_data['id']);
	$plugin->set("album_img", $album_data['cover']);
	$plugin->set("album_title", $album_data['title']);
	$plugin->set("content", $get_items);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 $out = $plugin->output();
	 return $out;
	
	
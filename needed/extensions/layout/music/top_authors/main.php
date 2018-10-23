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
	$query_content = unserialize($get_hook['content']);
	$artists_list = $query_content['options']['artists'];
	
	$artists = '';
	
	$item_tpl = new Template($PLUGIN_PATH."/item.tpl");		
	
	$artists_content = new Template($PLUGIN_PATH."/main.tpl");
	
	if (!empty($artists_list) && is_array($artists_list)) {
		
		foreach ($artists_list as $key => $value) {

			$dbaser->where('id', $value);
			$user = $dbaser->getOne('members');
			$artists .= query_user_page($user , $item_tpl);
		}
	}
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/container.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("plugin_title", $get_hook['title']);
	$plugin->set("content", $artists);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 $out = $plugin->output();
	 return $out;
	
	
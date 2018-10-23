<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------------
	// Require template file
	//-----------------------
	if (isset($_GET['id'])) {
		
		$dbaser->where('id', $_GET['id']);
		$plugin_query = $dbaser->getOne('plugins');

		if (isset($plugin_query['id'])) {

			$plugin_path = load_plugin_files($plugin_query['link']);

			$profile = new Template("./administrator/tpl/plugin.tpl");
			$plugin_path = $plugin_query['path'];
			$plugin_tpl = include($plugin_query['path']."/admin.php");

		} else {
			return NotFound();
		}

	} else {
		header("Location: ". $CONF['url'] . 'plugins');
	}

	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("plugin_id", $plugin_query['id']);
	$profile->set("plugin_name", $plugin_query['name']);
	$profile->set("plugin_path", $plugin_query['path']);
	$profile->set("content", $plugin_tpl);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
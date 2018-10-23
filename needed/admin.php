<?php

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	

	/*///////////////////////
	 Required files  
	///////////////////////*/
	require_once('./classes/configuration.php');
	include('./classes/functions.php');

		function get_admin($session) {

			global $dbaser;
			
			$admin = '';

			$dbaser->where('name', $_SESSION["nameAdmin"]);
			$admin = $dbaser->ObjectBuilder()->getOne('admins', null, 'id, name, username, fullname,email,publish');
			
			return $admin;

		}
	

	/*///////////////////////
	 Setting data 
	///////////////////////*/
	$FullAdmin = new FullAdmin();
	$FullAdmin->db = $db;
	$Setting = $FullAdmin->siteSetting();
	
	if (isset($_GET['logout'])) {
	
		$FullAdmin->LogoutAdmin();
		
	}
	
	/* //////////////////////////////////
	@Params Check if the User is admin
	///////////////////////////////////*/
	
	if ( isset($_SESSION["nameAdmin"]) && $_SESSION["nameAdmin"] )
	{

		$admin_user = get_admin($_SESSION["nameAdmin"]);

		require_once("./admin_pages.php");
		
		/*///////////////////////
		 Require page to display 
		///////////////////////*/	
		$layout = new Template("./administrator/tpl/layout.tpl");
		$layout->set("sitename", $Setting['sitename']);
		$layout->set("pagename", $Setting['sitename']);
		$layout->set("url", $CONF['url']);
		$layout->set("path", $CONF['path']."admin/");
		$layout->set("content", $page);
		$layout->set("messages_count", $FullAdmin->count_items(' `messages` ', ' WHERE `seen` = 0 '));
		$layout->set("loadCSS", load_all_plugins_css());
		$layout->set("loadJS", load_all_plugins_js());
		$layout->set("template", $Setting['template']);
		$layout->set("admin_name", $admin_user->fullname);
		$layout->set("plugins_options", load_all_plugins_menus());
		
		/**
		 * Outputs the page with the content.
		 */
		echo $layout->output();
		
		
	} else {
	
		/*///////////////////////
		 Require page to display 
		///////////////////////*/	
		
		$page = require_once("./admin_pages.php");
		
		echo $page;
	
	}
	

	
	mysqli_close($db);

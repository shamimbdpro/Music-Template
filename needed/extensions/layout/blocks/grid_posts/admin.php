<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	error_reporting(0);
	
	//-----------------
	// Load info file
	//-----------------
	include($plugin_path."/info.php");
	include($plugin_path."/functions.php");
	
	$cats_func = $FullAdmin->loadCats();
		
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);

		$max = $hook_data['options']['max'] ? 	$hook_data['options']['max'] : ''; 
		$order = $hook_data['options']['order'] ? $hook_data['options']['order'] : ''; 
		$order = load_posts_order($order); 
		$cats = load_posts_cats($cats_func , $hook_data['options']['cat']);
		
		$b_img = option_toChecked($hook_data['block']['b_img']) ? 	option_toChecked($hook_data['block']['b_img']) : ''; 
		$b_date = option_toChecked($hook_data['block']['b_date']) ? 	option_toChecked($hook_data['block']['b_date']) : ''; 
		$b_cat = option_toChecked($hook_data['block']['b_cat']) ? 	option_toChecked($hook_data['block']['b_cat']) : ''; 
		$b_comments = option_toChecked($hook_data['block']['b_comments']) ? 	option_toChecked($hook_data['block']['b_comments']) : ''; 
		$b_author = option_toChecked($hook_data['block']['b_author']) ? 	option_toChecked($hook_data['block']['b_author']) : ''; 
		
		$p_cat = option_toChecked($hook_data['page']['p_cat']) ? 	option_toChecked($hook_data['page']['p_cat']) : ''; 
		$p_author = option_toChecked($hook_data['page']['p_author']) ? 	option_toChecked($hook_data['page']['p_author']) : ''; 
		$p_date = option_toChecked($hook_data['page']['p_date']) ? 	option_toChecked($hook_data['page']['p_date']) : ''; 
		$p_comments = option_toChecked($hook_data['page']['p_comments']) ? 	option_toChecked($hook_data['page']['p_comments']) : ''; 
		$p_form = option_toChecked($hook_data['page']['p_form']) ? 	option_toChecked($hook_data['page']['p_form']) : ''; 
		$p_views = option_toChecked($hook_data['page']['p_views']) ? 	option_toChecked($hook_data['page']['p_views']) : ''; 
		$p_fav = option_toChecked($hook_data['page']['p_fav']) ? 	option_toChecked($hook_data['page']['p_fav']) : ''; 
		$p_nav = option_toChecked($hook_data['page']['p_nav']) ? 	option_toChecked($hook_data['page']['p_nav']) : ''; 
		$p_short = option_toChecked($hook_data['page']['p_short']) ? 	option_toChecked($hook_data['page']['p_short']) : ''; 
		
	} else {
	
		$cats = load_posts_cats($cats_func , '');
	
	}
	
	//print_r( $hook_data );
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("cats", $cats);
	$plugin->set("order", $order);
	$plugin->set("max", $max);
	
	$plugin->set("b_img", $b_img);
	$plugin->set("b_date", $b_date);
	$plugin->set("b_cat", $b_cat);
	$plugin->set("b_comments", $b_comments);
	$plugin->set("b_author", $b_author);
	
	$plugin->set("p_cat", $p_cat);
	$plugin->set("p_author", $p_author);
	$plugin->set("p_date", $p_date);
	$plugin->set("p_comments", $p_comments);
	$plugin->set("p_form", $p_form);
	$plugin->set("p_views", $p_views);
	$plugin->set("p_fav", $p_fav);
	$plugin->set("p_nav", $p_nav);
	$plugin->set("p_short", $p_short);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
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
	include($plugin_path."/info.php");
	include($plugin_path."/functions.php");

	$categories = $FullAdmin->loadCats();
	
	$guery_plugin = get_plugin($_GET['id']);
	
	if (isset($_GET['type'])) {
	
		$guery_hook = get_hook_id($_GET['type']);
		
		$hook_data = unserialize($guery_hook['content']);

	} 
	
	if (isset($hook_data['options']['cat'])) {$current_cat = $hook_data['options']['cat'];} else { $current_cat = '';}
	if (isset($hook_data['options']['max_items'])) {$max_items = $hook_data['options']['max_items'];} else { $max_items = '';}
	if (isset($hook_data['options']['image'])) {$show_image = option_toChecked($hook_data['options']['image']);} else { $show_image = '';}
	if (isset($hook_data['options']['date'])) {$show_date = option_toChecked($hook_data['options']['date']);} else { $show_date = '';}
	if (isset($hook_data['options']['author'])) {$show_author = option_toChecked($hook_data['options']['author']);} else { $show_author = '';}
	if (isset($hook_data['options']['likes'])) {$show_likes = option_toChecked($hook_data['options']['likes']);} else { $show_likes = '';}
	if (isset($hook_data['options']['comments'])) {$show_comments = option_toChecked($hook_data['options']['comments']);} else { $show_comments = '';}
	if (isset($hook_data['options']['more'])) {$show_readmore = option_toChecked($hook_data['options']['more']);} else { $show_readmore = '';}
	if (isset($hook_data['options']['order'])) {$current_order = $hook_data['options']['order'];} else { $current_order = '';}
	if (isset($hook_data['options']['style'])) {$current_style = $hook_data['options']['style'];} else { $current_style = '';}
	
	$cats = load_news_showcase_cats($categories , $current_cat);
	
	$order = load_news_showcase_orders($current_order);
	
	$styles = load_news_showcase_styles($current_style);
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($plugin_path."/admin.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("max_items", $max_items);
	$plugin->set("cats", $cats);
	$plugin->set("order", $order);
	$plugin->set("styles", $styles);
	$plugin->set("image", $show_image);
	$plugin->set("date", $show_date);
	$plugin->set("author", $show_author);
	$plugin->set("likes", $show_likes);
	$plugin->set("comments", $show_comments);
	$plugin->set("more", $show_readmore);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $plugin->output();
	
	
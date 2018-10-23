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
	
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$news_showcase_posts = unserialize($get_hook['content']);
	
	$cat = $news_showcase_posts['options']['cat'];
	$limit = $news_showcase_posts['options']['max_items'];
	$order = $news_showcase_posts['options']['order'];
	$style = $news_showcase_posts['options']['style'];
	
	$get_posts = $FullAdmin->load_posts_custom($cat, $order, $limit, null);
	
	$Setting = $FullAdmin->siteSetting();
	
	$main_tpl = new Template($PLUGIN_PATH."/styles/".$style."/main.tpl");		
	
	$post_tpl = new Template($PLUGIN_PATH."/styles/".$style."/post.tpl");		
	
	
	if (isset($news_showcase_posts['options']['image'])) {$show_image = option_toChecked($news_showcase_posts['options']['image']);} else { $show_image = '';}
	if (isset($news_showcase_posts['options']['date'])) {$show_date = option_toChecked($news_showcase_posts['options']['date']);} else { $show_date = '';}
	if (isset($news_showcase_posts['options']['author'])) {$show_author = option_toChecked($news_showcase_posts['options']['author']);} else { $show_author = '';}
	if (isset($news_showcase_posts['options']['likes'])) {$show_likes = option_toChecked($news_showcase_posts['options']['likes']);} else { $show_likes = '';}
	if (isset($news_showcase_posts['options']['comments'])) {$show_comments = option_toChecked($news_showcase_posts['options']['comments']);} else { $show_comments = '';}
	if (isset($news_showcase_posts['options']['more'])) {$show_readmore = option_toChecked($news_showcase_posts['options']['more']);} else { $show_readmore = '';}
	
	$options = array($show_image, $show_date, $show_likes, $show_comments, $show_author, $show_readmore );
	
	$posts = load_news_showcase_posts($get_posts, $options, $main_tpl, $post_tpl);
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("sitename", $Setting['sitename']);
	$plugin->set("url", $CONF['url']);
	$plugin->set("path", $CONF['path']);
	$plugin->set("content", $posts);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 $out = $plugin->output();
	 return $out;
	
	
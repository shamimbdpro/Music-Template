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
	
	
	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
			
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$content = unserialize($get_hook['content'])['content'][0] ;
	
	if (isset($_SESSION["membername"])) {
		
		$user = GetMember($_SESSION["membername"]);
		
		// If paid media allowed by admin
		if($Setting['enable_paid'] == 1) {
			$template = new Template($PLUGIN_PATH."/user_paid.tpl");
			
			add_head_js('load_head', $PLUGIN_PATH . "/main.js" );
			add_head_css('load_head', $PLUGIN_PATH . "/style.css" );
			
		} else {
			$template = new Template($PLUGIN_PATH."/user.tpl");
		}
		
		if(!empty($user['credit'])) { $credit = $user['credit']; } else {$credit = 0;}
		
		$template->set("enable_youtube", empty($Setting['enable_youtube']) ? 'hide' : '');
		$template->set("enable_soundcloud", empty($Setting['enable_soundcloud']) ? 'hide' : '' );
		$template->set("username", $user['name']);
		$template->set("userpic", $user['pic']);
		$template->set("fullname", $user['realname']);
		$template->set("credit", $credit);
		$template->set("check_notification", check_notification());
		$template->set("count_notification", count_notification());
		$template->set("check_messages", check_messages());
		$template->set("count_messages", count_messages());
		$template->set("check_cart", check_cart());
		
	} else {
		$template = new Template($PLUGIN_PATH."/login.tpl");
	}
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = $template;
	$plugin->set("url", $CONF['url']);
		$plugin->set("check_fb_login", empty($Setting['facebook']) ? 'hide hidden' : '' );
		$plugin->set("check_tw_login", empty($Setting['twitter']) ? 'hide hidden' : '' );
		$plugin->set("check_go_login", empty($Setting['google']) ? 'hide hidden' : '' );
	$plugin->set("template", $Setting['template']);
	$plugin->set("content", $content);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	 
	
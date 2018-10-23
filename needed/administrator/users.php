<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	/*///////////////////////
	 Setting data 
	///////////////////////*/
	$view = '';
		
	$users_tpl  = 'users.tpl';
	$user_tpl  = 'users_item.tpl';
		
	$allMembers = $dbaser->get ("members", null, "*");

	$tpl = new Template("./administrator/tpl/users/".$user_tpl);
	
	foreach($allMembers as $row) {

		$user = $row;

		$media_class = new media;
		$media_class->db = $db;
		$media_class->userID = $row['id'];
		$media_count = $media_class->countUserMedia();
		$tpl->set("media_count", $media_count);
		$tpl->set("mobile", $row['mobile']);
		$view .= query_user_page($row , $tpl);
		
	}

	
	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/users/".$users_tpl);
	$profile->set("pagename", "View all ".$requiredID);
	$profile->set("add_new_name", substr($requiredID, 0, -1));
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("all_users", $view);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
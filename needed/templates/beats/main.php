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
	// Detect required 
	//-----------------------	
	require_once("functions.php");
	
	require_once($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/configuration.php");
	
	if(isset($_SESSION['membername']) || !empty($_SESSION['membername'])) {		
		$member = GetMember($_SESSION['membername']);
	} else {
		$member = '';
	}

	require_once("route.php");

	$pages_head_meta = pages_head_meta($PAGEDATA , 'page');
	$pages_head_assets = pages_head($PAGEDATA , 'page');
	$pages_footer = pages_footer($PAGEDATA , 'page');
		
	// Playlists	
	$member_playlist = query_user_playlists();
	$member_playlist_form = query_user_playlists_form();
		
	// Albums
	$new_album_form = new Template("./templates/".$Setting['template']."/layouts/extra/album_form.tpl");
	$album_form = $new_album_form->output();
	$member_albums = query_user_albums();
	
	// Categoies
	$music_cats = query_media_cats(1);
	$videos_cats = query_media_cats(2);
	$photos_cats = query_media_cats(3);
	
	if (isset($member['id'])) {
		$hide_playlist = '';
	} else {
		$hide_playlist = 'hide hidden';
	}
	
	
	if (!empty($LEFT_PAGE_PLUGINS)) {$LEFT_PAGE_PLUGINS = '<div class="mag-innert-left">'.$LEFT_PAGE_PLUGINS.'</div>'; }	
		
	if (isset($PAGEDATA['layout']) && !empty($current_page['id'])) {$template = $PAGEDATA['layout'];} else {$template = 'fullwidth';}
	
	$tpl = new Template("./templates/".$Setting['template']."/layouts/".$template.".tpl");
	$tpl->set("menu", $MENU_PLUGINS);
	
	$tpl->set("top_slider", $TOP_PAGE_PLUGINS);
	$tpl->set("block1", $BLOCK1_PLUGINS);
	$tpl->set("block2", $BLOCK2_PLUGINS);
	$tpl->set("block3", $BLOCK3_PLUGINS);
	$tpl->set("block4", $BLOCK4_PLUGINS);
	$tpl->set("block5", $BLOCK5_PLUGINS);
	$tpl->set("block6", $BLOCK6_PLUGINS);
	$tpl->set("block7", $BLOCK7_PLUGINS);
	$tpl->set("block8", $BLOCK8_PLUGINS);
	$tpl->set("sitename", $Setting['sitename']);
	$tpl->set("pagename", $Setting['sitename']);
	$tpl->set("template", $Setting['template']);
	$tpl->set("url", $CONF['url']);
	$tpl->set("path", $CONF['path']);
	$tpl->set("footer_player", $footer_player_tpl->output());
	
	$right_sidebar_tpl->set("left", $LEFT_PLUGINS);
	$tpl->set("right_sidebar", $right_sidebar_tpl->output());
	$tpl->set("content", $content);
	
	$template = $tpl->output();
	$layout->set("site_ajax_load", $Setting['enable_ajax']);
	$layout->set("sitename", $Setting['sitename']);
	$layout->set("pagename", $Setting['sitename']);
	$layout->set("template", $Setting['template']);
	$layout->set("url", $CONF['url']);
	$layout->set("path", $CONF['path']);
	$layout->set("logo", $Setting['logo']);
	$layout->set("load_template", $template);
	$layout->set("menu_bottom", $FOOTER_PLUGINS);
	$layout->set("top_login", $LOGIN_PLUGINS);
	$layout->set("album_form", $album_form);
	$layout->set("user_albums", $member_albums);
	$layout->set("user_playlists", $member_playlist);
	$layout->set("user_playlists_form", $member_playlist_form);
	$layout->set("hide_playlist", $hide_playlist);
	$layout->set("music_cats", $music_cats);
	$layout->set("videos_cats", $videos_cats);
	$layout->set("photos_cats", $photos_cats);
	$layout->set("menu", $MENU_PLUGINS);
	$layout->set("user_id", isset($member['id']) ? $member['id'] : '');
	$layout->set("content", $content);
	
	$layout->set("enable_music", empty($Setting['enable_music']) ? 'hide hidden' : '' );
	$layout->set("enable_videos", empty($Setting['enable_videos']) ? 'hide hidden' : '' );
	$layout->set("enable_photos", empty($Setting['enable_photos']) ? 'hide hidden' : '' );
	$layout->set("head_meta", $pages_head_meta );
	$layout->set("head_css_js", $pages_head_assets );
	$layout->set("load_footer", $pages_footer );

	$layout->set("check_logged", '0' );
	
	if (isset($member['id'])) {
		$layout->set("check_logged", 1 );
	}
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return $layout->output();
	
?>
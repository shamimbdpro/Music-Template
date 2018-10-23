<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
//----------------
	// TPL files list
	//----------------
	$footer_tpl = new Template("./templates/".$Setting['template']."/layouts/footer_grid.tpl");	
		
	$copyrights = new Template("./templates/".$Setting['template']."/layouts/copyrights.tpl");
	
	$sidebar_tpl = new Template("./templates/".$Setting['template']."/layouts/sidebar.tpl");	
	
	$page_tpl = new Template("./templates/".$Setting['template']."/layouts/page.tpl");		
				
	$post_tpl = new Template("./templates/".$Setting['template']."/layouts/post.tpl");		
				
	$block1_tpl = new Template("./templates/".$Setting['template']."/layouts/block1.tpl");		
	$block2_tpl = new Template("./templates/".$Setting['template']."/layouts/block2.tpl");		
	$block3_tpl = new Template("./templates/".$Setting['template']."/layouts/block3.tpl");		
	$block4_tpl = new Template("./templates/".$Setting['template']."/layouts/block4.tpl");		
	$block5_tpl = new Template("./templates/".$Setting['template']."/layouts/block5.tpl");		
	$block6_tpl = new Template("./templates/".$Setting['template']."/layouts/block6.tpl");

	$left_tpl = new Template("./templates/".$Setting['template']."/layouts/left.tpl");		
	$footer_player_tpl = new Template("./templates/".$Setting['template']."/layouts/footer_player.tpl");		
	$right_sidebar_tpl = new Template("./templates/".$Setting['template']."/layouts/right_sidebar.tpl");		
	
	$media_tpl  = new Template("./templates/".$Setting['template']."/layouts/media.tpl");
	$edit_media_tpl  = new Template("./templates/".$Setting['template']."/layouts/edit_media.tpl");
	
	$media_music_tpl  = new Template("./templates/".$Setting['template']."/layouts/media/music_tpl.tpl");
	$media_music_item  = new Template("./templates/".$Setting['template']."/layouts/media/music_item.tpl");
	
	$media_photo_tpl  = new Template("./templates/".$Setting['template']."/layouts/media/photo_tpl.tpl");
	$media_photo_item  = new Template("./templates/".$Setting['template']."/layouts/media/photo_item.tpl");
	
	$media_video_tpl  = new Template("./templates/".$Setting['template']."/layouts/media/video_tpl.tpl");
	$media_video_item  = new Template("./templates/".$Setting['template']."/layouts/media/video_item.tpl");
	
	$chat_tpl  = new Template("./templates/".$Setting['template']."/layouts/chat/chat.tpl");
	$chat_users_msg_tpl  = new Template("./templates/".$Setting['template']."/layouts/chat/chat_user_msg.tpl");
	$chat_my_msg_tpl  = new Template("./templates/".$Setting['template']."/layouts/chat/chat_my_msg.tpl");
	$chat_users_tpl  = new Template("./templates/".$Setting['template']."/layouts/chat/chat_users.tpl");
	
	$user_tpl  = new Template("./templates/".$Setting['template']."/layouts/user.tpl");
	$user_music_tpl  = new Template("./templates/".$Setting['template']."/layouts/user_music.tpl");
	
	$playlist_tpl  = new Template("./templates/".$Setting['template']."/layouts/playlist.tpl");
	$playlist_media_tpl  = new Template("./templates/".$Setting['template']."/layouts/playlist_media.tpl");
	
	$likes_tpl  = new Template("./templates/".$Setting['template']."/layouts/likes.tpl");
	
	$side_comments_tpl  = new Template("./templates/".$Setting['template']."/layouts/side_comments.tpl");
	$side_comments_form_tpl  = new Template("./templates/".$Setting['template']."/layouts/side_comments_form.tpl");
	
	$search_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search.tpl");
	$search_media_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search_media.tpl");
	$search_playlist_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search_playlist.tpl");
	$search_album_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search_album.tpl");
	$search_user_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search_user.tpl");
	$search_post_tpl  = new Template("./templates/".$Setting['template']."/layouts/search/search_post.tpl");
	
	$follow_user_tpl  = new Template("./templates/".$Setting['template']."/layouts/follow/user.tpl");
	
	$categories_tpl  = new Template("./templates/".$Setting['template']."/layouts/categories.tpl");
	
	$category_tpl  = new Template("./templates/".$Setting['template']."/layouts/category.tpl");
	$category_media_tpl  = new Template("./templates/".$Setting['template']."/layouts/category_media.tpl");
		
	$category_posts_tpl  = new Template("./templates/".$Setting['template']."/layouts/category_posts.tpl");
	$category_posts_items_tpl  = new Template("./templates/".$Setting['template']."/layouts/category_posts_items.tpl");

	
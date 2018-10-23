<?php
// error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');
	
	$action_class = new action(); $media_class = new media;  $user_class = new user;   $post_class = new post; $search_class = new search; 
	$action_class->db = $media_class->db =  $user_class->db = $post_class->db = $search_class->db = $db;
	
	// Check If requested more items are Featured
	if (isset($_POST['id']) &&  isset($_POST['type']) && isset($_POST['target']) && isset($_POST['page'])) {
		
		if ($_POST['target'] == 'user-media' || $_POST['target'] == 'media_cat' || $_POST['target'] == 'load-media1' || $_POST['target'] == 'load-media2' || $_POST['target'] == 'search') {
		
			if ($_POST['type'] == '1' || $_POST['type'] == '2' || $_POST['type'] == '3') {
			
				if ($_POST['target'] == 'media_cat' || $_POST['target'] == 'load-media1' || $_POST['target'] == 'load-media2' || $_POST['target'] == 'search') {
				
					if ($_POST['type'] == '1') {$media_tpl = $media_music_item;}
					if ($_POST['type'] == '2') {$media_tpl = $media_video_item;}
					if ($_POST['type'] == '3') {$media_tpl = $media_photo_item;}
				
				}	elseif ($_POST['target'] == 'user-media') {
					$media_tpl = $user_music_tpl;
				}
				
				$media_class->userID = $media_class->mediaCat = $_POST['page'];
				$media_class->mediaOrder = $_POST['target'];
				$media_class->mediaID = $_POST['id'];
				$media_class->mediaType = $_POST['type'];

				$Do = $media_class->getMoreMedia();
					
				if($Do || isset($Do)) {
					
					$result = query_media_items($Do, $media_tpl, $_POST['target'], $_POST['page']);	
					
					echo $result;
						
				} 
			} 
			
		} elseif ($_POST['target'] == 'follow_media' && isset($member['id'])) {
		
			if ($_POST['type'] == '1' || $_POST['type'] == '2' || $_POST['type'] == '3') {
			
				if ($_POST['type'] == '1') {$media_tpl = $media_music_item;}
				if ($_POST['type'] == '2') {$media_tpl = $media_video_item;}
				if ($_POST['type'] == '3') {$media_tpl = $media_photo_item;}
				
				$media_class->userID = $member['id'];
				$media_class->mediaID = $_POST['id'];
				$media_class->mediaType = $_POST['type'];
				
				$Do = $media_class->getMoreFolMedia();
					
				if($Do || isset($Do)) {
				
					$result = query_media_items($Do, $media_tpl, $_POST['target']);	
					
					echo $result;
						
				} 
			} 
			
		} elseif ($_POST['target'] == 'blog') {
			
			$category_posts_items_tpl  = new Template("../templates/".$Setting['template']."/layouts/category_posts_items.tpl");
			
			$post_class->postID = $_POST['id'];
			$post_class->postsNum = '8';
			
			$Do = $post_class->getMorePosts();
				
			if($Do || isset($Do)) {
				
				$result = load_beats_posts($Do, $category_posts_items_tpl, 'blog');	
				
				echo $result;
					
			} 
			
		} elseif ($_POST['target'] == 'search-post') {
			
			$post_class->postID = $_POST['id'];
			$post_class->postTitle = $_POST['page'];
			$post_class->postsNum = '8';
			
			$Do = $post_class->getMorePosts();
				
			if($Do || isset($Do)) {
				
				$result = load_beats_posts($Do, $search_post_tpl, $_POST['target'], $_POST['page']);	
				
				echo $result;
					
			} 
			
		} elseif ($_POST['target'] == 'search-album') {
			
			$search_class->searchID = $_POST['id'];
			$search_class->searchTitle = $_POST['page'];
			$search_class->searchNum = '8';
			
			$Do = $search_class->searchAlbum();
				
			if($Do || isset($Do)) {
				
				$result = query_albums_list($Do, $search_album_tpl, $_POST['target'], $_POST['page']);	
				
				echo $result;
					
			} 
			
		} elseif ($_POST['target'] == 'search-playlist') {
			
			$search_class->searchID = $_POST['id'];
			$search_class->searchTitle = $_POST['page'];
			$search_class->searchNum = '8';
			
			$Do = $search_class->searchPlaylist();
				
			if($Do || isset($Do)) {
				
				$result = query_playlists_list($Do, $search_playlist_tpl, $_POST['target'], $_POST['page']);	
				
				echo $result;
					
			} 
			
		} elseif ($_POST['target'] == 'user-search') {
			
			$search_class = new search();
			$search_class->db = $db;
			$search_class->searchID = $_POST['id'];
			$search_class->searchNum = '8';
			$search_class->searchTitle = $_POST['page'];
			
			$Do = $search_class->searchUser();
				
			if($Do || isset($Do)) {
				
				$result = query_users_list($Do, $search_user_tpl, 'user-search', $_POST['page']);	
				
				echo $result;
					
			} 
			
		} elseif ($_POST['target'] == 'category') {
			
			$category_posts_items_tpl  = new Template("../templates/".$Setting['template']."/layouts/category_posts_items.tpl");
			
			
			$post_class->postID = $_POST['id'];
			$post_class->postCat = $_POST['page'];
			$post_class->postsNum = '2';
			
			$Do = $post_class->getMorePosts();
				
			if($Do || isset($Do)) {
				
				$result = load_beats_posts($Do, $category_posts_items_tpl, $_POST['target']);	
				
				echo $result;
					
			} 
		} 


	} else {
		echo NotePopup('Not allowed', 2);
	}
			

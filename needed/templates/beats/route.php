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
	
	if (isset($_GET['id'])) 	{ $page_ID = $_GET['id'];} 	 else {$page_ID = '';}
	
	if (isset($_GET['name']))   { $page_TITLE = $_GET['name']; } else {$page_TITLE = '';}
	
	if (isset($_GET['type']))   { $page_TYPE = $_GET['type']; } else {$page_TYPE = '';}
	
	$pages_list_array = array(
		'account'
		,'stream'
		,'withdrawal'
		,'subscription'
		,'forgot_pass'
		,'edit_media'
		,'pages'
		,'upload'
		,'sell'
		,'media'
		,'deposite'
		,'checkout'
		,'category_posts'
		,'post'
		,'grab'
		,'user'
		,'search'
		,'downloads'
		,'playlist'
		,'album'
		,'blog'
		,'category'
		,'categories'
		,'chat'
		,'vrfy'
	);


	if (in_array($page_TITLE, $pages_list_array))	{ $current_page['id'] = 0; } else { $current_page = $PAGEDATA; }
	
	//--------------------------
	// Assign classes
	//--------------------------
	$user_class = new user; 
	$media_class = new media;
	$post_class = new post; 
	$comments_class = new comments; 
	$search_class = new search; 
	$action_class = new action;

	//----------------------------
	// Assign database to classes
	//----------------------------
	$user_class->db = $post_class->db = $media_class->db =  $comments_class->db =  $search_class->db =  $action_class->db = $db;
		
	
	//--------------------------
	// Autoload Plugins
	//--------------------------
	autoload_plugins();
	
	//--------------------------
	// Pages head meta & assets
	//--------------------------
	
	
	// Load css files
	add_head_css( 'load_head', "assets/css/semantic.min.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/lib/bootstrap/bootstrap.min.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/font-awesome-4.5.0/css/font-awesome.min.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/popuo-box.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/dashboard.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/style.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/js/jPlayer/jplayer.flat.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/animate.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/font.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/app.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/simple-line-icons.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/modal.min.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/css/lightbox.css" );
	add_head_css( 'load_head', "templates/".$Setting['template']."/assets/js/fileinput.min.css" );
	add_head_css( 'load_head', "assets/css/alertify.min.css" );
	add_head_css( 'load_head', "assets/components/checkbox.min.css" );
	add_head_css( 'load_head', "assets/components/icon.min.css" );
	add_head_css( 'load_head', "assets/components/tab.min.css" );
	
	// Load js files
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/jquery-2.1.1.min.js" );
	add_head_js('load_head', "assets/js/semantic.min.js" );
	add_head_js('load_head', "assets/components/checkbox.min.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/lib/bootstrap/bootstrap.min.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/modernizr.custom.min.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/jquery.magnific-popup.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/jquery.polyglot.language.switcher.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/responsiveslides.min.js" );
	add_head_js('load_head', "templates/".$Setting['template']."/assets/js/modal.min.js" );
	add_head_js('load_head', "assets/js/alertify.min.js" );
	add_head_js('load_head', "assets/components/tab.min.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/lightbox.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/functions.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/app.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/slimscroll/jquery.slimscroll.min.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/app.plugin.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/jPlayer/jquery.jplayer.min.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/jPlayer/add-on/jplayer.playlist.min.js" );
	add_footer_js('load_head', "templates/".$Setting['template']."/assets/js/jPlayer/demo.js" );
	add_footer_js('load_head', "assets/js/ajax.js" );
	
	
		
	
	//------------------------
	// Plugins positions list
	//------------------------
	$MENU_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_menu');
		$MENU_PLUGINS = list_plugins_array($MENU_PLUGINS_ARRAY);
	
	$LOGIN_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_login');
		$LOGIN_PLUGINS = load_site_plugins($LOGIN_PLUGINS_ARRAY, $block2_tpl);
	
	$LEFT_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_left');
		$LEFT_PLUGINS = load_site_plugins($LEFT_PLUGINS_ARRAY, $left_tpl);
	
	$TOP_PAGE_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_slider');
		$TOP_PAGE_PLUGINS = load_site_plugins($TOP_PAGE_PLUGINS_ARRAY, $block2_tpl);
	
	$LEFT_PAGE_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_left');
		$LEFT_PAGE_PLUGINS = list_plugins_array($LEFT_PAGE_PLUGINS_ARRAY);
		
	$BLOCK1_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block1');
		$BLOCK1_PLUGINS = load_site_plugins($BLOCK1_PLUGINS_ARRAY, $block1_tpl);
		
	$BLOCK2_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block2');
		$BLOCK2_PLUGINS = load_site_plugins($BLOCK2_PLUGINS_ARRAY, $block2_tpl);
		
	$BLOCK3_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block3');
		$BLOCK3_PLUGINS = load_site_plugins($BLOCK3_PLUGINS_ARRAY, $block3_tpl);
		
	$BLOCK4_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block4');
		$BLOCK4_PLUGINS = load_site_plugins($BLOCK4_PLUGINS_ARRAY, $block4_tpl);
		
	$BLOCK5_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block5');
		$BLOCK5_PLUGINS = load_site_plugins($BLOCK5_PLUGINS_ARRAY, $block5_tpl);
		
	$BLOCK6_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block6');
		$BLOCK6_PLUGINS = load_site_plugins($BLOCK6_PLUGINS_ARRAY, $block6_tpl);
		
	$BLOCK7_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block7');
		$BLOCK7_PLUGINS = load_site_plugins($BLOCK7_PLUGINS_ARRAY, $block3_tpl);
		
	$BLOCK8_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_block8');
		$BLOCK8_PLUGINS = load_site_plugins($BLOCK8_PLUGINS_ARRAY, $block3_tpl);
	
	$FOOTER_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_footer');
		$FOOTER_PLUGINS = load_site_plugins($FOOTER_PLUGINS_ARRAY, $block3_tpl);
	
	// Ads positions
	$BLOCK_SIDE_ADS_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_side_ads');
		$BLOCK_SIDE_ADS_PLUGINS = load_site_plugins($BLOCK_SIDE_ADS_PLUGINS_ARRAY, $block5_tpl);
		
	$BLOCK_TOP_ADS_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_top_ads');
		$BLOCK_TOP_ADS_PLUGINS = load_site_plugins($BLOCK_TOP_ADS_PLUGINS_ARRAY, $block5_tpl);
		
	$BLOCK_BOT_ADS_PLUGINS_ARRAY = display_hooks_position($current_page['id'] , $PAGEDATA['template'] , 'med_bot_ads');
		$BLOCK_BOT_ADS_PLUGINS = load_site_plugins($BLOCK_BOT_ADS_PLUGINS_ARRAY, $block5_tpl);
		
	$content = '';
	
	//-----------------------
	// Require template file
	//-----------------------
	$layout = new Template("./templates/".$Setting['template']."/tpl/layout.tpl");
	
	if (in_array($page_TITLE, $pages_list_array))	{

		if ($page_TITLE == 'account') {
			
			$content = query_members_page();
			$current_page['id'] = '';

		} elseif ($page_TITLE == 'vrfy') {
	
			$content = query_verify_page();
			$current_page['id'] = '';

		} elseif ($page_TITLE == 'subscription') {
	
			$content = query_subscription_page();
			$current_page['id'] = '';

		} elseif ($page_TITLE == 'forgot_pass') {
	
			$content = query_forgotpass_page();
			$current_page['id'] = '';

		} elseif ($page_TITLE == 'stream') {
				
			$content = load_stream_page();
			$current_page['id'] = '';
			
		} elseif ($page_TITLE == 'upload') {
			
			$content = load_upload_page();
			$current_page['id'] = '';
			
		} elseif ($page_TITLE == 'sell') {
			
			$content = load_sell_page();
			$current_page['id'] = '';
			
		} elseif ($page_TITLE == 'checkout') {
		
			if (isset($page_ID) && $page_ID == 'pay') {
				$content = load_pay_page();
				$current_page['id'] = '';
			} else {
				$content = load_checkout_page();
			}
			
		} elseif ($page_TITLE == 'deposite') {
			
			$content = load_deposite_page();
			$current_page['id'] = '';
						
		} elseif ($page_TITLE == 'withdrawal') {
			
			$content = load_withdrawal_page();
			$current_page['id'] = '';

		} elseif ($page_TITLE == 'downloads') {
			
			$content = load_downloads_page();
			$current_page['id'] = '';
			
		} elseif ($page_TITLE == 'blog') {
			
			$post_class->postsNum = 6;
			$posts = $post_class->getPosts();
			
			if (is_array($posts)) {
					
				$category_posts_tpl->set("block5", $BLOCK5_PLUGINS);
				$category_posts_tpl->set("items_list", load_beats_posts($posts, $category_posts_items_tpl, 'blog'));
				$content = query_category_page('', $category_posts_tpl);
				
				$PAGEDATA['url'] = 'blog';
				$current_page['id'] = '';
				
			} else {
				$content = NotFound();
			}
			
		} elseif ($page_TITLE == 'media') {
			
			if (!empty($page_ID)) {

				$media_class->mediaID = $page_ID;
				$media_class->getType = 'media';
				
				$query_media = $media_class->getMedia();
				
				if (is_array($query_media)) {
					
					$media_class->userID = $query_media['author'];
					
					$comments_class->commentTypeID = $query_media['id'];
					$comments_class->commentType = 'media';
					
					$media_tpl->set("likes_list", query_item_likes($media_class->getLikes(), $likes_tpl));
					
					$side_comments_form_tpl->set("type", 'media');
					$side_comments_form_tpl->set("type_id", $query_media['id']);
					
					$media_tpl->set("side_ads", $BLOCK_SIDE_ADS_PLUGINS);
					$media_tpl->set("top_ads", $BLOCK_TOP_ADS_PLUGINS);
						
					$media_tpl->set("comments_list", query_item_comments($comments_class->getItemComments(), $side_comments_tpl));
					$media_tpl->set("comments_form", load_side_comment_form($side_comments_form_tpl));
				
					$content = query_media_item($query_media, $media_tpl);
					
					$PAGEDATA['title'] = $query_media['title'];
					$PAGEDATA['url'] = 'media/' . $query_media['id'];
				
				} else {
					
					$content = NotFound();
				}
			
			} else {
				
				$content = NotFound();
			}
			
		} elseif ($page_TITLE == 'edit_media') {
			
			$media_class->mediaID = $page_ID;
			$media_class->getType = 'media';
			
			$query_media = $media_class->getMedia();
			
			if (is_array($query_media)) {
				$media_class->userID = $query_media['author'];
				
				if (isset($member['id']) && $member['id'] == $query_media['author']) {
				
					$content = query_media_item($query_media, $edit_media_tpl);
					
					$PAGEDATA['title'] = $query_media['title'];
				
				} else {
					
					$content = viewMessage('Not allowed');
				}
				
			} else {
				
				$content = NotFound();
			}
			
		} elseif ($page_TITLE == 'user') {
			
			$user_class->userName = $media_class->userName = $page_ID;
			
			$query_user = $user_class->getUser();
			
			if (is_array($query_user)) {
				
				$user_class->userID = $media_class->userID = $query_user['id'];
				
				$media_class->mediaType = '1';
				$media_list = $media_class->getUserMedia();
				$user_tpl->set("media_list", query_media_items($media_list, $user_music_tpl, 'user-media'));
				$user_tpl->set("top_ads", $BLOCK_TOP_ADS_PLUGINS);
				
				$content = query_user_page($query_user, $user_tpl);
				
				$PAGEDATA['title'] = $query_user['realname'];
				$PAGEDATA['url'] = 'user/' . $query_user['name'];
				
				$page_id = '';
			
			} else {
				
				$content = NotFound();
			}
			
		} elseif ($page_TITLE == 'chat') {
			
			if (isset($member['id'])) {
				
				$user_class->userName = $page_ID;
				
				$query_user = $user_class->getUser();
				
				if (isset($query_user['id'])) {
				
					$user_class->senderID = $query_user['id'];
					$chat_class->userID = $member['id'];
					$chat_class->senderID = $query_user['id'];
					
					$chat_list = $chat_class->check_old_chat();
					$users_list = $chat_class->check_old_users();
					
					$chat_tpl->set("users_list", query_chat_users_list($users_list, $chat_users_tpl));
					$chat_tpl->set("messages_list", query_chat_list($chat_list, $chat_users_msg_tpl, $chat_my_msg_tpl ));
					
					// Set messages seen
					$chat_class->set_message_seen();
					
					$content = query_chat_page($query_user, $chat_tpl);
					
					$PAGEDATA['title'] = $query_user['realname'];
			
				} else {
				
					$content = viewMessage('User not found');
				
				}
				$page_id = '';
			
			} else {

				$content = LoginFirst();
				
			}			
			
			$page_id = '';
			
		} elseif ($page_TITLE == 'category') {
			
			$media_class->mediaCatPrefix = $page_ID;
			$cat = $media_class->getMediaCatsPrefix();
			
			if (is_array($cat)) {
					
				$media_class->mediaCat = $cat['id'];
				
				if ($cat['type'] == '1') {$media_tpl = $media_music_item;}
				if ($cat['type'] == '2') {$media_tpl = $media_video_item;}
				if ($cat['type'] == '3') {$media_tpl = $media_photo_item;}
				
				$media_items = $media_class->getMediaCatItems();
				
				$category_tpl->set("media_list", query_media_items($media_items, $media_tpl, 'media_cat'));
				
				$content = query_category_page($cat, $category_tpl, $cat['type']);
				
				$PAGEDATA['title'] = $cat['title'];
				$PAGEDATA['url'] = 'category/' . $cat['url'];
			
			} else {
				
				$content = NotFound();
			}
			

			
		} elseif ($page_TITLE == 'category_posts') {
			
			$post_class->catPrefix = $page_ID;
			$query_cat = $post_class->getCatPrefix();
			
			if (is_array($query_cat)) {

				$post_class->postCat = $query_cat['id'];
				
				$category_posts_tpl->set("block5", $BLOCK5_PLUGINS);
				$category_posts_tpl->set("items_list", load_beats_posts($post_class->getCatPosts(), $category_posts_items_tpl, 'category'));
				$content = query_category_page($post_class->getCatPrefix(), $category_posts_tpl);
				
				$PAGEDATA['title'] = $query_cat['title'];
				$PAGEDATA['url'] = 'category_posts/' . $query_cat['url'];
						
			} else {
				
				$content = NotFound();
			}
			
			
		} elseif ($page_TITLE == 'post') {
		
			$get_post = $FullAdmin->getPost($page_ID);
			
			if (is_array($get_post)) {
			
				$post_tpl->set("side_ads", $BLOCK_SIDE_ADS_PLUGINS);
				$post_tpl->set("block5", $BLOCK5_PLUGINS);
				
				$content = load_beats_post_data($get_post , $post_tpl);
				
				$PAGEDATA['title'] = $get_post['title'];
				$PAGEDATA['url'] = 'post/' . $get_post['id'];
				
				$page_id = '';
			
			} else {
				
				$content = NotFound();
			}
				
		} elseif ($page_TITLE == 'pages') {
			
			$query = pages_query_per_prefix($page_ID);
			
			if (is_array($query)) {
				
				$page_tpl->set("side_ads", $BLOCK_SIDE_ADS_PLUGINS);
				$page_tpl->set("block1", $BLOCK1_PLUGINS);
				$page_tpl->set("block5", $BLOCK6_PLUGINS);
				
				$content = load_beats_page_data($query , $page_tpl);
				
				$PAGEDATA['title'] = $query['title'];
				$PAGEDATA['url'] = 'pages/' . $query['prefix'];
				
				$page_id = '';
			
			} else {
				
				$content = NotFound();
			}
			
		} elseif ($page_TITLE == 'grab') {
			
			if ($page_ID == 'soundcloud') {
				$content = load_grab_sc_page();
			} else {
				$content = load_grab_yt_page();
			}
			
			$PAGEDATA['title'] = 'Grab new media';
			
			$current_page['id'] = '';
		
		} elseif ($page_TITLE == 'playlist') {
			
			$media_class->playlistPrefix = $page_ID;
			$query = $media_class->getMediaPlaylistUser();
			
			if (is_array($query)) {
				
				$media_class->playlistID = $query['id'];
				$media_class->playlistPrefix = $query['url'];
				
				$media_items = $media_class->getMediaPlaylistItems();
				
				$comments_class->commentTypeID  = $media_class->mediaID = $query['id'];
				$comments_class->commentType = $media_class->getType = 'playlist';
				
				$playlist_tpl->set("likes_list", query_item_likes($media_class->getLikes(), $likes_tpl));
				$playlist_tpl->set("likes_count", count($media_class->getLikes()));
				
				$side_comments_form_tpl->set("type", 'playlist');
				$side_comments_form_tpl->set("type_id", $query['id']);
				$playlist_tpl->set("comments_count", count($comments_class->getItemComments()));
				$playlist_tpl->set("comments_list", query_item_comments($comments_class->getItemComments(), $side_comments_tpl));
				$playlist_tpl->set("comments_form", load_side_comment_form($side_comments_form_tpl));
				
				
				$playlist_tpl->set("media_count", count($media_items));
				$playlist_tpl->set("media_list", query_media_items($media_items, $playlist_media_tpl));
				
				$content = query_playlist_page($query, $playlist_tpl);
				$current_page['id'] = ''; 
				$user = queryTbl('members', $query['user']);
				$PAGEDATA['url'] = 'playlist/'.$user['name'].'/' . $query['url'];
				$PAGEDATA['title'] = $query['title'];
				
			
			} else {
				
				$content = NotFound();
			}
			
		}	elseif ($page_TITLE == 'album') {
			
			$media_class->albumPrefix = $page_ID;
			$query = $media_class->getAlbumPrefix();
			
			if (is_array($query)) {
				
				$media_class->albumID = $query['id'];
				$media_class->albumPrefix = $query['url'];
				$media_items = $media_class->getAlbumItems();
				$playlist_tpl->set("media_count", count($media_items));
				
				$comments_class->commentTypeID = $media_class->mediaID = $query['id'];
				$comments_class->commentType = $media_class->getType = 'albums';
				
				$playlist_tpl->set("likes_list", query_item_likes($media_class->getLikes(), $likes_tpl));
				$playlist_tpl->set("likes_count", count($media_class->getLikes()));
				
				$side_comments_form_tpl->set("type", 'albums');
				$side_comments_form_tpl->set("type_id", $query['id']);
				$playlist_tpl->set("comments_count", count($comments_class->getItemComments()));
				$playlist_tpl->set("comments_list", query_item_comments($comments_class->getItemComments(), $side_comments_tpl));
				$playlist_tpl->set("comments_form", load_side_comment_form($side_comments_form_tpl));
				
				$playlist_tpl->set("media_list", query_media_items($media_items, $playlist_media_tpl));
				
				$content = query_album_page($query, $playlist_tpl);
				$current_page['id'] = ''; 
				$user = queryTbl('members', $query['user']);
				$PAGEDATA['url'] = 'album/'.$user['name'].'/' . $query['url'];
			
				$PAGEDATA['title'] = $query['title'];
					
			} else {
				
				$content = NotFound();
			}
			
		}	elseif ($page_TITLE == 'search') {
			
			$search_class->searchTitle = $page_ID;
			$search_class->searchType = $page_TYPE;
			$search_tpl->set("title", $page_ID);
			$PAGEDATA['title'] = 'Search for: ' . $page_ID;
			
			if (strlen($page_ID) > 0) {
				
				$search_class->searchType = '1';
				$search_tpl->set("count_music", count($search_class->searchMedia()));
				
				$search_class->searchType = '2';
				$search_tpl->set("count_video", count($search_class->searchMedia()));
					
				$search_class->searchType = '3';
				$search_tpl->set("count_photo", count($search_class->searchMedia()));
					
				$search_tpl->set("count_user", count($search_class->searchUser()));
					
				$search_tpl->set("count_post", count($search_class->searchPost()));
					
				$search_tpl->set("count_album", count($search_class->searchAlbum()));
					
				$search_tpl->set("count_playlist", count($search_class->searchPlaylist()));
					
				if ($page_TYPE == 'music') {
					
					if (!empty($Setting['enable_music'])) {
						$search_class->searchType = '1';
						$search_class->searchNum = '12';
						$search_tpl->set("items_list", query_media_items($search_class->searchMedia(), $media_music_item, 'search', $page_ID));
					} else {
						$search_tpl->set("items_list", viewMessage('Disabled by admin'));
					}

				} elseif ($page_TYPE == 'video') {
					if (!empty($Setting['enable_videos'])) {
						$search_class->searchType = '2';
						$search_class->searchNum = '12';
						$search_tpl->set("items_list", query_media_items($search_class->searchMedia(), $media_video_item, 'search', $page_ID));
					} else {
						$search_tpl->set("items_list", viewMessage('Disabled by admin'));
					}
				} elseif ($page_TYPE == 'photo') {
					if (!empty($Setting['enable_photos'])) {
						$search_class->searchType = '3';
						$search_class->searchNum = '12';
						$search_tpl->set("items_list", query_media_items($search_class->searchMedia(), $media_photo_item, 'search', $page_ID));
					} else {
						$search_tpl->set("items_list", viewMessage('Disabled by admin'));
					}
				} elseif ($page_TYPE == 'user') {
					$search_class->searchNum = '8';
					$search_tpl->set("items_list", query_users_list($search_class->searchUser(), $search_user_tpl, 'user-search', $page_ID));
				} elseif ($page_TYPE == 'post') {
					$search_class->searchNum = '8';
					$search_tpl->set("items_list", load_beats_posts($search_class->searchPost(), $search_post_tpl, 'search-post', $page_ID));
				} elseif ($page_TYPE == 'album') {
					$search_class->searchNum = '4';
					$search_tpl->set("items_list", query_albums_list($search_class->searchAlbum(), $search_album_tpl, 'search-album', $page_ID));
				} elseif ($page_TYPE == 'playlist') {
					$search_class->searchNum = '4';
					$search_tpl->set("items_list", query_playlists_list($search_class->searchPlaylist(), $search_playlist_tpl, 'search-playlist', $page_ID));
				}
			
			} else {
				$query = 'Insert 3 characters at least';
				$search_tpl->set("count_music", '0');
				$search_tpl->set("count_video", '0');
				$search_tpl->set("count_photo", '0');
				$search_tpl->set("count_user", '0');
				$search_tpl->set("count_post", '0');
				$search_tpl->set("count_playlist", '0');
				$search_tpl->set("count_album", '0');
				$search_tpl->set("items_list", viewMessage($query));
			
			}
			
			$content = query_search_page('1', $search_tpl);
			//$content = '';
			
		} else {
			
			$content = NotFound();
		
		}
	
	} else {
	
		$work = new Template("./templates/".$Setting['template']."/layouts/".$PAGEDATA['layout'].".tpl");
		
		$page_id = $PAGEDATA['id'];
			
		$content = '1';
		
	}
	
	if (empty($content) ) {
		$content = NotFound();
	} elseif ($content == '1' ) {
		$content = '';
	}

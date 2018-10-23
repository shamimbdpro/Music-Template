<?php
error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	$output = '';
	
	if(isset($_SESSION['nameAdmin'])) {$administrator = $_SESSION['nameAdmin'];} else {$administrator = '0';}
	
	if(isset($administrator) && $administrator !== '0' ) {
			
		// Check for requested more items
		if (!empty($_POST['id']) AND !empty($_POST['type']) AND !empty($_POST['require'])) {
			
			if ($_POST['require'] == 'more_media' AND $_POST['type']) {
					
				$Do = $FullAdmin->moreMediaID($_POST['id'], $_POST['type']);
					
				if(isset($Do)) {
				
					$query_type = $_POST['type'];
					$img_type = media_type($_POST['type']);
					
						$tpl = new Template("../../administrator/tpl/media_item.tpl");	
						$tpl->set("url", $CONF['url']);
						
						foreach ($Do as $row) {
						
							$media = $row;
							$tpl->set("id", $row['id']);
							$cat = $FullAdmin->getCategory($row['cat']);
							$user = $FullAdmin->GetMember($row['author']);
							
							$tpl->set("name", $user['name']);
							$tpl->set("realname", $user['realname']);
							if ( $row['publish'] == 0 ) { $tpl->set("ban_media", "check");} else {$tpl->set("ban_media", "ban");} 
							$tpl->set("title", $row['title']);
							$tpl->set("pic", $user['pic']);
							$tpl->set("thumbs", $row['thumbs']);
							$tpl->set("cat", $cat['title']);
							$tpl->set("img_type", $img_type);
							
							$output .= $tpl->output();
						}
						$output .= '<button id="load-more" data-id="'.$media['id'].'" data-require="more_media" data-type="'.$query_type.'" class="fluid ui button">Load more...</button> ' ;
						
				}
				
			} elseif ($_POST['require'] == 'more_users') {
				
				$output = '';
				$Do = $Members->moreMembersID($_POST['id']);
					
				if(is_array($Do)) {
					
					$tpl = new Template("../../administrator/tpl/users_item.tpl");	
					$tpl->set("url", $CONF['url']);
						
					foreach ($Do as $row) {
						
						$user = $row;
						
						$media_class = new media;
						$media_class->db = $db;
						$media_class->userID = $row['id'];
						$media_count = $media_class->countUserMedia();
						$tpl->set("media_count", $media_count);
						$output .= query_user_page($row , $tpl);
						
							
					}
					$output .= '<button id="load-more" data-id="'.$user['id'].'" data-require="more_users" data-type="ch" class="fluid ui button">Load more...</button> ' ;
				}
			}
		}
	}
		
	echo $output;
		
		
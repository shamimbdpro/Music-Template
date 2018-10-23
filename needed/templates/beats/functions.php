<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	

// Members pages Function
function query_members_page() {

	global $CONF, $db, $Setting, $member;
	
	if (isset($member['id']) && !empty($member['id'])) {
			
			$user = GetMember($member['name']);
				
			$layout = new Template("./templates/".$Setting['template']."/layouts/member.tpl");		
			$layout->set('url', $CONF['url']);	
			$layout->set('realname', $user['realname']);	
			$layout->set('fullname', $user['realname']);	
			$layout->set('name', $user['name']);	
			$layout->set('country', $user['country']);	
			$layout->set('email', $user['email']);	
			$layout->set('user_info', $user['info']);	
			$layout->set('user_facebook', $user['facebook']);	
			$layout->set('user_youtube', $user['youtube']);	
			$layout->set('user_twitter', $user['twitter']);	
			$layout->set('user_google', $user['google']);	
			$layout->set('user_instagram', $user['instagram']);	
			$layout->set('followers', $user['followers']);	
			$layout->set('following', $user['following']);	
			$layout->set('pic', $user['pic']);	
			$layout->set('verfied_check', isset($user['permissions']) ? 'active' : 'hidden');	
			$layout->set("select_country", list_countries_active(getCountriesList(), $user['country']));
			
			if ($user['gender'] == 'male') {$layout->set('male', 'selected');}
			if ($user['gender'] == 'female') {$layout->set('female', 'selected');}
				
			
			$content = $layout->output();
				
			$page_id = '';
			
	} else {
				
			$layout = new Template("./templates/".$Setting['template']."/layouts/login.tpl");		
					
			$layout->set('url', $CONF['url']);	
			$content = $layout->output();
				
			$page_id = '';
				
	}
		
	return $content;
}

function load_blog_page()
{
	global $db, $Setting, $media_class, $member, $category_posts_items_tpl;
	
}

function load_stream_page()
{
	global $db, $CONF, $Setting, $media_class, $member, $media_music_item, $media_video_item, $media_photo_item;
	
	if (isset($member['id']) && !empty($member['id'])) {
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/stream.tpl");
		
		$media_class->userID = $member['id'];
		
		$media_class->mediaType = '1'; $music_list = $media_class->getFolMedia();
		$media_class->mediaType = '2'; $videos_list = $media_class->getFolMedia();
		$media_class->mediaType = '3'; $photos_list = $media_class->getFolMedia();
		
		
		$layout->set('music', query_media_items($music_list, $media_music_item, 'follow_media'));	
		
		$layout->set('videos', query_media_items($videos_list, $media_video_item, 'follow_media'));	
		
		$layout->set('photos', query_media_items($photos_list, $media_photo_item, 'follow_media'));	
		
		$layout->set('url', $CONF['url']);	
		$content = $layout->output();
					
		$page_id = '';
		
		return $content;
	
	}	else {
	
		 return query_members_page();
	
	}	
}

function load_upload_page()
{
	global $db, $CONF, $Setting, $media_class, $member;
	
	if (isset($member['id']) && !empty($member['id'])) {
				
		$media_class->mediaCatType = 1;
		$cats = $media_class->getMediaCats();
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/upload.tpl");		
		
		if ($Setting['enable_photos'] == 1) { 
			$music_tpl = new Template("./templates/".$Setting['template']."/layouts/upload/photo.tpl");
			$layout->set('enable_photos', '');	
		} else {$layout->set('enable_photos', 'hide hidden');}
		
		if ($Setting['enable_videos'] == 1) { 
			$music_tpl = new Template("./templates/".$Setting['template']."/layouts/upload/video.tpl");	
			$layout->set('enable_videos', '');	
		} else {$layout->set('enable_videos', 'hide hidden');}
				
		
		if ($Setting['enable_music'] == 1) { 
			$music_tpl = new Template("./templates/".$Setting['template']."/layouts/upload/music.tpl");
			$layout->set('enable_music', '');	
		} else {$layout->set('enable_music', 'hide hidden');}
				
		
		// Album
		$media_class->userID = $member['id'];
		$albums = list_options_active('', $media_class->getUserAlbum());
		
		$music_tpl->set('url', $CONF['url']);	
		$music_tpl->set('albums', $albums);	
		$music = $music_tpl->output();
		
		$layout->set('url', $CONF['url']);	
		$layout->set('path', $CONF['path']);	
		$layout->set('music_tpl', $music);	
		$layout->set('cats', list_options_active(0, $cats));	
						
		$content = $layout->output();
					
		$page_id = '';
		
		return $content;
	
	}	else {
	
		 return query_members_page();
	
	}	
}

function load_sell_page()
{
	global $db, $CONF, $Setting, $media_class, $member;
	
	if($Setting['enable_paid'] == 1) {
	
		if (isset($member['id']) && !empty($member['id'])) {
					
			$media_class->mediaCatType = 1;
			$cats = $media_class->getMediaCats();
			
			$layout = new Template("./templates/".$Setting['template']."/layouts/sell.tpl");		
			$music_tpl = new Template("./templates/".$Setting['template']."/layouts/sell/music.tpl");		
			$music = $music_tpl->output();
			
			$layout->set('music_tpl', $music);	
			$layout->set('path', $CONF['path']);	
			$layout->set("url", $CONF['url']);
			$layout->set('cats', list_options_active(0, $cats));	
							
			$content = $layout->output();
						
			$page_id = '';
			
			return $content;
		
		}	else {
		
			 return query_members_page();
		
		}	
		
	}	else {
		return NotFound();
	}
}

function load_grab_yt_page()
{
	global $db, $CONF, $Setting, $media_class, $member;
	
	if (isset($member['id']) && !empty($member['id'])) {
				
		$media_class->mediaCatType = '2';
		$cats = $media_class->getMediaCats();
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/grab_youtube.tpl");		
		$video_tpl = new Template("./templates/".$Setting['template']."/layouts/grab_youtube/video.tpl");		
		
		$layout->set('video_tpl', $video_tpl->output());
		$layout->set('url', $CONF['url']);	
		$layout->set('path', $CONF['path']);	
		$layout->set('cats', list_options_active(0, $cats));	
		
		$content = $layout->output();
		
		$page_id = '';
		
		return $content;
	
	}	else {
	
		 return query_members_page();
	
	}	
}


function load_grab_sc_page()
{
	global $db, $Setting, $media_class, $member;
	
	if (isset($member['id']) && !empty($member['id'])) {
				
		$media_class->mediaCatType = '1';
		$cats = $media_class->getMediaCats();
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/grab_sc.tpl");		
		$track_tpl = new Template("./templates/".$Setting['template']."/layouts/grab_sc/track.tpl");		
		$search_tpl = new Template("./templates/".$Setting['template']."/layouts/grab_sc/search.tpl");		
		
		$layout->set('track_tpl', $track_tpl->output());	
		$layout->set('search_tpl', $search_tpl->output());	
		$layout->set('cats', list_options_active(0, $cats));	
		
		$content = $layout->output();
		
		$page_id = '';
		
		return $content;
	
	}	else {
	
		 return query_members_page();
	
	}	
}

function load_checkout_page()
{
	global $db, $CONF, $Setting, $media_class, $member, $cart_class, $page_ID, $page_TYPE, $LANG_ARRAY;
	
	if($Setting['enable_paid'] == 1) {
		
		$content = $items = ''; 
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/checkout.tpl");				
		$item = new Template("./templates/".$Setting['template']."/layouts/checkout_item.tpl");					
		$layout->set('url', $CONF['url']);
		
		if (isset($member['id']) && !empty($member['id'])) {
					
			$cart_class->userID = $member['id'];
			
			$check = $cart_class->checkCart();
					
			if (is_array($check)) {	
			
				$layout->set('count_items', count($check));
				
				$total_price = 0;
				foreach($check as $row)	 {
					
					$query = queryTbl($row['type'], $row['type_id']);
				
					$item->set('items', '<tr class="product" id="checkout-cart-' . $query['id'] . '">
						<td>
							<a data-ajax="true" href="' . $CONF['url'] . $query['type'] . '/' .  $query['id'] .  '"><img src="' . $CONF['url'] . 'image.php?src='.$query['thumbs'].'&w=80&h=80&img='.media_type($query['type']).'" alt="placeholder"></a>
						</td>
						<td>
							<h4><a data-ajax="true" href="' . $CONF['url'] . 'media/' .  $query['id'] .  '"> ' .  $query['title'] . '</a></h4>
							<div class="actions">
								
							</div>
						</td>
						<td></td>
						<td><h4> '  . $query['cost'] .  ' $</h4> <a href="#0" id="item_action" data-id="' . $query['id'] . '" data-type="media" data-target="remove_from_cart" class="delete-item delete-cart">'.$LANG_ARRAY['LANG_DEL'].'</a></td>
						</tr>');	
						
					$items .= $item->output();
					$total_price = $total_price + $query['cost'];
				}	
				
				$layout->set('items', $items);
				$layout->set('credit', empty($member['credit']) ? '0' : $member['credit']);
				$layout->set('total_price', $total_price);
				$content .= $layout->output();
				
			} else {
				
				$content .= '<div class="wrapper">';
				$content .= viewMessage($LANG_ARRAY['LANG_NO_CART']);
				$content .= '</div>';
				
			}
			
			$page_id = '';		
			return $content;
			
		}	else {
		
			 return query_members_page();
		
		}	
			
	}	else {
		return  NotFound();
	}	
}

function load_pay_page()
{
	global $db, $CONF, $Setting, $media_class, $member, $cart_class, $page_ID, $page_TYPE, $LANG_ARRAY;
	
	if($Setting['enable_paid'] == 1) {
		
		$content = $items = ''; 
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/pay.tpl");							
		$layout->set('url', $CONF['url']);
		
		if (isset($member['id']) && !empty($member['id'])) {
					
			$cart_class->userID = $member['id'];
			
			$check = $cart_class->checkCart();
					
			if (is_array($check)) {	
			
				$layout->set('count_items', count($check));
				
				$total_price = 0;
				
				foreach ($check as $row) {
				
					$query = queryTbl($row['type'], $row['type_id']);
				
					$total_price = $total_price + $query['cost'];
				
				}
				

				if ($total_price == $member['credit'] || $total_price < $member['credit']) {
					
					updateTblVal(" `members`  ", $member['id'], " `credit` = `credit` - '$total_price'  ");
					
					foreach ($check as $row) {
						
						$media = queryTbl($row['type'], $row['type_id']);
						
						$fee = $Setting['percent'];
						
						$val = floor(($media['cost'] * $fee)) / 100;
						
						$final_price = $media['cost'] - $val;
						
						updateTblVal(' `members`  ', $media['author'], " `credit` = `credit` + '$final_price'  ");
					
						updateTblVal(' `cart`  ', $row['id'], " `state` = 1  ");
						
						updateTblVal($row['type'], $row['type_id'], " `downloads` = `downloads` + 1   ");

						add_notification($media['author'], '4', $media['id'], 'media');
						
					}

					$layout->set('title', $LANG_ARRAY['LANG_THNKS_PURCHASE']);
					$layout->set('msg', $LANG_ARRAY['LANG_SUCC_PURCHASE']);
					
				} else {

					$layout->set('title', $LANG_ARRAY['LANG_FAIL_PAY']);
					$layout->set('msg', $LANG_ARRAY['LANG_NO_CREDIT']);
				}
				
				$user = GetMemberID($member['id']);
				
				$layout->set('credit', $user['credit']);
				$layout->set('total_price', $total_price);
				$content .= $layout->output();
				
			} else {
				
				$content .= '<div class="wrapper">';
				$content .= viewMessage($LANG_ARRAY['LANG_NO_CART']);
				$content .= '</div>';
				
			}
			
			$page_id = '';		
			return $content;
			
		}	else {
		
			 return query_members_page();
		
		}	
				
			
	}	else {
		return  NotFound();
	}	
}

function load_downloads_page()
{
	global $db, $CONF, $Setting, $media_class, $member, $cart_class, $page_ID, $page_TYPE, $LANG_ARRAY;
	
	$content = $items = ''; 
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/downloads/downloads.tpl");				
		$item = new Template("./templates/".$Setting['template']."/layouts/downloads/download_item.tpl");					
		$layout->set('url', $CONF['url']);
		
		if (isset($member['id']) && !empty($member['id'])) {
					
			$cart_class->userID = $member['id'];
			
			$check = $cart_class->checkDownloads();
					
			if (is_array($check)) {	
			
				$layout->set('count_items', count($check));
				
				$total_price = 0;
				foreach($check as $row)	 {
					
					$query = queryTbl($row['type'], $row['type_id']);
				
					$item->set('url', $CONF['url']);
					$item->set('title', $query['title']);
					$item->set('id', $query['id']);
					$item->set('cost', $query['cost']);
					$item->set('pic', $query['thumbs']);
					$item->set('type', 'media');
					$item->set('media_type', media_type($query['type']));
						
					$items .= $item->output();
					$total_price = $total_price + $query['cost'];
				}	
				
				$layout->set('items', $items);
				$layout->set('credit', $member['credit']);
				$layout->set('total_price', $total_price);
				$content .= $layout->output();
				
			} else {
				
				$content .= '<div class="wrapper">';
				$content .= viewMessage($LANG_ARRAY['LANG_NO_ITEM_DOWNLOAD']);
				$content .= '</div>';
				
			}
			
			$page_id = '';		
			return $content;
			
		}	else {
		
			 return query_members_page();
		
		}	
	
}

function load_deposite_page()
{
	global $db, $dbaser, $CONF, $Setting, $media_class, $member, $cart_class, $page_ID, $page_TYPE, $LANG_ARRAY;
	
	if($Setting['enable_paid'] == 1) {		
	
		$content = ''; 
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/deposite/deposite.tpl");					
		$layout->set('url', $CONF['url']);
		
		if (isset($member['id']) && !empty($member['id'])) {
					
			$cart_class->userID = $member['id'];
			
			$layout->set('message', '');
			
			if (isset($_POST['method'])) {
				
				$dbaser->where('link', $dbaser->escape($_POST['method']));
				
				$method = $dbaser->getOne('plugins');

				if (isset($method['id'])) {
					$layout->set('message', viewMessage(payment_process('main', $_POST['method'])));
				}
			}
			
			if (!empty($page_ID) && $page_ID == 'success') {
				$layout->set('message', viewMessage($LANG_ARRAY['LANG_THNKS_PAY'],1));
			} elseif (!empty($page_ID) && $page_ID == 'cancel') {
				$layout->set('message', viewMessage($LANG_ARRAY['LANG_CANCL_PAY']));
			} elseif (!empty($page_ID) && $page_ID == 'ipn') {
				$layout->set('message', payment_process('main', 'paypal'));
			}
			
			
			$layout->set('payment_mehods', payment_plugins('btn', 'payment'));
			
			$content .= $layout->output();
				
			$page_id = '';
			return $content;
			
		}	else {
		
			 return query_members_page();
		
		}
		
	}	else {
		return NotFound();
	}	

}

function load_withdrawal_page()
{
	global $db, $CONF, $Setting, $media_class, $member, $page_ID, $page_TYPE;
	
	if($Setting['enable_paid'] == 1) {
	
		$content = ''; 
		$old = ''; 
		
		$withdrawal_class = new withdrawal();
		
		$layout = new Template("./templates/".$Setting['template']."/layouts/withdrawal/withdrawal.tpl");					
		$layout->set('url', $CONF['url']);
		
		if (isset($member['id']) && !empty($member['id'])) {
					
			$withdrawal_class->userID = $member['id'];
			
			$layout->set('credit', empty($member['credit']) ? '0' : $member['credit']);

			$layout->set('message', '');
			
			$layout->set('payment_mehods', payment_plugins('accept', 'payment'));
			

			$old_withdrawals = $withdrawal_class->checkOld();

			if (is_array($old_withdrawals)) {
				
				foreach ($old_withdrawals as $key => $value) {
					$date = ago(strtotime($value['date']));
					$status =  !empty($value['status']) ? 'Paid' : 'Pending';
					$old .= "
					    <tr>
					      <td>".$value['id']."</td>
					      <td>".$value['amount']."</td>
					      <td>".$value['method']."</td>
					      <td>".$status."</td>
					      <td>".$date."</td>
					    </tr>";
					}

			} 

			$layout->set('old', $old);
				
			$content .= $layout->output();
				
			$page_id = '';

			return $content;
			
		}	else {
		
			 return query_members_page();
		
		}
		
	}	else {
		return NotFound();
	}	

}

function query_media_items($query , $tpl, $target = null, $title = null) {
	global $CONF, $db, $Setting, $media_class, $user_class, $action_class, $member, $LANG_ARRAY;
	
	$return = '';
	
	if (is_array($query)) {	
		
		$i = 0;
		$len = count($query);
			
		foreach($query as $row)	 {
			
			if ($row['publish'] == 1) {

				$mp3file = new MP3File($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."./media/audio/" . $row['content'] );
				
				$media_class->mediaID = $row['id'];
				
				$tpl->set("url", $CONF['url']);
				$tpl->set("title", substr($row['title'], 0, 30));
				$tpl->set("title_full", $row['title']);
				$tpl->set("allow_album", ($row['type'] == 1) ?  '' : 'hidden');
				$tpl->set("id", $row['id']);
				$tpl->set("img", $row['thumbs']);
				$tpl->set("content", $row['content']);
				$tpl->set("desc", $row['desc']);
				$tpl->set("time", ago(strtotime($row['date'])));
				$tpl->set("edit_album", list_options_active($row['album'], $media_class->getUserAlbum()));
				$tpl->set("album", $row['album']);
				$tpl->set("likes", $row['likes']);
				$tpl->set("plays", $row['views']);
				$tpl->set("comments", $row['comments']);
				$tpl->set("shares", $row['shares']);
				$tpl->set("tags", $row['tags']);
				$tpl->set("author", $row['author']);
				$tpl->set("edit_cat", $media_class->getMediaCats());
				$tpl->set("downloadable", option_toChecked($row['allow']));
				$tpl->set("publish", option_toChecked($row['publish']));
				$tpl->set("type", media_type($row['type']));
				
				if ($row['type'] == '1' && $row['frametype'] == 'local') {
					$tpl->set("duration", MP3File::formatTime($mp3file->getDurationEstimate()));
				} elseif ($row['type'] == '1' && $row['frametype'] == 'soundcloud') {
					$tpl->set("duration", $mp3file->sc_formatTime($row['duration']));
				} else {
					$tpl->set("duration", '');
				}
				$user_class->userID = $row['author'];
				$user = $user_class->getUser_ID();
				
				$tpl->set("author_id", $user['id']);
				$tpl->set("author_name", $user['name']);
				$tpl->set("author_realname", $user['realname']);
				$tpl->set("author_pic", $user['pic']);
				
				if (isset($member['id'])) {
				
					$action_class->userID = $member['id'];
					$action_class->itemType = 'media';
					$action_class->itemID = $row['id'];
					$check_like = $action_class->checkLike();
								
					if($check_like == '0') {
						$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
						$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
						$tpl->set("class_like", "");
					} else {
						$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
						$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
						$tpl->set("class_like", "active");
					}
									
				} else {
						$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
						$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
						$tpl->set("class_like", "");
				}
				
				$tpl->set("loadmore", '');
				
			if ($row['type'] == '1') {$tpl->set("play", '<a class="play-icon jp-play-me " id="media-play-'.$row['id'].'" data-title="'.$row['title'].'" data-user="'.$user['realname'].'" data-img="'.$row['thumbs'].'" data-id="'.$row['id'].'"><i class="icon-control-play "></i></a>'); }
			if ($row['type'] == '2') {$tpl->set("play", '<a class="play-icon " id="play_video" data-title="'.$row['title'].'" data-user="'.$user['realname'].'" data-img="'.$row['thumbs'].'" data-id="'.$row['id'].'" data-type="video"><i class="icon-control-play "></i></a>'); }
			if ($row['type'] == '3') {$tpl->set("play", '<a class="play-icon example-image-link" href="'.$CONF['url'].'image.php?src='.$row['thumbs'].'&w=800&img='.media_type($row['type']).'"  data-lightbox="example-1"><i class="icon-camera"></i></a>'); }
			
			$tpl->set("paid_label", '');

			if ($row['paid'] == '1' && $Setting['enable_paid'] == '1') {
				
				$tpl->set("check_paid", '<a class="ui basic right pointing label">'.$row['downloads'].'</a>
				<div data-price="'.$row['cost'].'" data-url="media/'.$row['id'].'" data-img="image.php?src='.$row['thumbs'].'&w=150&h=150&img='.media_type($row['type']).'" data-title="'.$row['title'].'" id="item_action" data-id="'.$row['id'].'" data-type="media" data-target="add_to_cart" class="cd-add-to-cart ui red button">
				<i class="icon-cloud-download"></i> '.$LANG_ARRAY['LANG_BUY'].' </div> ');

				if (isset($member['id']) ) {
					if ( $row['author'] > $member['id'] || $row['author'] < $member['id'] ) {

						$tpl->set("paid_label", '
						<div data-price="'.$row['cost'].'" data-url="media/'.$row['id'].'" data-img="image.php?src='.$row['thumbs'].'&w=150&h=150&img='.media_type($row['type']).'" data-title="'.$row['title'].'" id="item_action" data-id="'.$row['id'].'" data-type="media" data-target="add_to_cart" class="cd-add-to-cart paid_label">
						<i class="icon-cart"></i> '.$LANG_ARRAY['LANG_BUY'].' </div> ');
						
					}
				}
			
			} elseif ($row['paid'] == '0' && $row['frametype'] == 'local'){
				$tpl->set("check_paid", '<a class="ui basic right pointing label">'.$row['downloads'].'</a><div id="download_item" data-id="'.$row['id'].'" data-type="media" data-target="download_media" class="ui red button"><i class="icon-cloud-download"></i> '.$LANG_ARRAY['LANG_DOWNLOAD'].' </div>');
			} else {
				$tpl->set("check_paid", '');
			}				

				if ($target == 'user-media') {
					$data_page = $row['author'];
				} elseif ($target == 'media_cat') {
					$data_page = $row['cat'];
				} elseif ($target == 'search') {
					$data_page = $title;
				}	elseif ($target == 'follow_media' || empty($target)) {
					$data_page = '';
				} else {
					$data_page = '';
				}
				
				if ($i == $len - 1) {
					$tpl->set("loadmore", '<a class="fluid ui btn btn-s-md btn-info clear clearfix" id="load-more" data-id="'.$row['id'].'" data-type="'.$row['type'].'" data-target="'.$target.'" data-page="'.$data_page.'" >'.$LANG_ARRAY['LANG_MORE'].'</a>');
				}
				$i++;
				
				$return .= $tpl->output();
			} 
		}
		
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	
	return $return;
	
}	
	
function query_media_item($row , $tpl) {
	global $CONF, $db, $Setting, $media_class, $user_class, $action_class, $cart_class, $member, $LANG_ARRAY;
	
	$likes_count = $media_class->countMediaLikes();
	
	$return = '';
	
	if (isset($row) && is_array($row)) {	
					
		if ($row['publish'] == 1) {
			
			// Add new view if logged in or type "Photo" || "Video"
			if (isset($member['id'])) { 
				if ($row['type'] == 3) {updateTblVal('media', $row['id'], ' `views` = views + 1 ');} 
			}
			
			// Edit Album
			$set_media_class = $media_class; 
			$set_media_class->userID = $row['author'];
			$edit_album = list_options_active($row['album'], $set_media_class->getUserAlbum());
			$allow_album = ($row['type'] == 1) ?  '' : 'hidden' ;
			
			// Edit category
			$media_class->mediaCatType = '1'; 
			$cat_query = $media_class->getMediaCats();
			$cats = list_options_active($row['cat'], $cat_query);
			
			
			$media_class->mediaID  = $row['id'];
			
			$media_class->mediaCat = $row['cat'];
			$media_class->mediaType = $row['type'];
			$media_class->mediaName = $row['title'];
			
			$related_tpl = new Template("./templates/".$Setting['template']."/layouts/related_music.tpl");
			
			$mp3file = new MP3File("./media/audio/" . $row['content'] );
				
			$tpl->set("url", $CONF['url']);
			$tpl->set("allow_album", $allow_album);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("img", $row['thumbs']);
			$tpl->set("content", $row['content']);
			$tpl->set("desc", $row['desc']);
			$tpl->set("time", ago(strtotime($row['date'])));
			$tpl->set("edit_album", $edit_album);
			$tpl->set("album", $row['album']);
			$tpl->set("likes", $row['likes']);
			$tpl->set("plays", $row['views']);
			$tpl->set("comments", $row['comments']);
			$tpl->set("shares", $row['shares']);
			$tpl->set("tags", $row['tags']);
			$tpl->set("author", $row['author']);
			$tpl->set("edit_cat", $cats);
			$tpl->set("downloadable", option_toChecked($row['allow']));
			$tpl->set("publish", option_toChecked($row['publish']));
			$tpl->set("type", media_type($row['type']));
			$tpl->set("related_media", query_media_items($media_class->getRelatedMedia(), $related_tpl));
			$tpl->set("related_user_media", query_media_items($media_class->getRelatedUserMedia(), $related_tpl));
			$query_cat = $media_class->getMediaCat_ID();
			$tpl->set("cat", $query_cat['title']);
			if ($row['type'] == '1' && $row['frametype'] == 'local') {
				$tpl->set("duration", MP3File::formatTime($mp3file->getDurationEstimate()));
			} elseif ($row['type'] == '1' && $row['frametype'] == 'soundcloud') {
				$tpl->set("duration", $mp3file->sc_formatTime($row['duration']));
			} else {
				$tpl->set("duration", '');
			}
			
			$user_class->userID = $row['author'];
			$user = $user_class->getUser_ID();
				
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_pic", $user['pic']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_media", $media_class->countUserMedia());
			$tpl->set("author_followers", $user_class->countUserFollowers());
			
			if ($row['type'] == '1') {$tpl->set("play", '<a class="play-icon jp-play-me " id="media-play-'.$row['id'].'" data-title="'.$row['title'].'" data-user="'.$user['realname'].'" data-img="'.$row['thumbs'].'" data-id="'.$row['id'].'"><i class="icon-control-play "></i></a>'); }
			if ($row['type'] == '2') {$tpl->set("play", '<a class="play-icon " id="play_video" data-title="'.$row['title'].'" data-user="'.$user['realname'].'" data-img="'.$row['thumbs'].'" data-id="'.$row['id'].'" data-type="video"><i class="icon-control-play "></i></a>'); }
			if ($row['type'] == '3') {$tpl->set("play", '<a class="play-icon example-image-link" href="'.$CONF['url'].'image.php?src='.$row['thumbs'].'&w=800&img='.media_type($row['type']).'"  data-lightbox="example-1"><i class="icon-camera"></i></a>'); }
			
			if ($row['paid'] == '1' && $Setting['enable_paid'] == '1' ) {

				$check_paid = '<div data-price="'.$row['cost'].'" data-url="media/'.$row['id'].'" data-img="image.php?src='.$row['thumbs'].'&w=150&h=150&img='.media_type($row['type']).'" data-title="'.$row['title'].'" id="item_action" data-id="'.$row['id'].'" data-type="media" data-target="add_to_cart" class="cd-add-to-cart ui left labeled button">
					<a class="ui basic right pointing label">'.$row['downloads'].'</a>
					<div class="ui blue button"><i class="icon-basket"></i> <span id="toggle-to">'.$LANG_ARRAY['LANG_ADD_CART'].' </div>
				</div> ';

				$tpl->set("check_paid", '');
				
				if (isset($member['id']) ) {
					
					if ( $row['author'] > $member['id'] || $row['author'] < $member['id'] ) {

						$tpl->set("check_paid", $check_paid);

						$tpl->set("paid_label", '
						<div data-price="'.$row['cost'].'" data-url="media/'.$row['id'].'" data-img="image.php?src='.$row['thumbs'].'&w=150&h=150&img='.media_type($row['type']).'" data-title="'.$row['title'].'" id="item_action" data-id="'.$row['id'].'" data-type="media" data-target="add_to_cart" class="cd-add-to-cart paid_label">
						<i class="icon-cart"></i> '.$LANG_ARRAY['LANG_BUY'].' </div> ');
						
					}

				} else {
					
					$tpl->set("check_paid", $check_paid);

				}
			
			} elseif ($row['paid'] == '0' && $row['frametype'] == 'local' && $row['allow'] == '1'){
				$tpl->set("check_paid", '<a class="ui basic right pointing label">'.$row['downloads'].'</a><div id="download_item" data-id="'.$row['id'].'" data-type="media" data-target="download_media" class="ui red button"><i class="icon-cloud-download"></i> '.$LANG_ARRAY['LANG_DONWLOAD'].' </div>');
			} else {
				$tpl->set("check_paid", '');
			}
			
			$tpl->set("check_edit", '');
			
			if (isset($member['id'])) {
				
				if ($member['id'] == $row['author']) {
					$tpl->set("check_edit", '<a class="ui basic right" data-ajax="true" href="'.$CONF['url'].'edit_media/'.$row['id'].'"><div class="ui red button"><i class="icon-edit"></i> '.$LANG_ARRAY['LANG_EDIT'].' </div> </a>');
				} else {
					$tpl->set("check_edit", '');
				}
				
				$action_class->userID = $cart_class->userID = $member['id'];
				$action_class->itemType = $cart_class->itemType = 'media';
				$action_class->itemID = $cart_class->itemID = $row['id'];
				$check_like = $action_class->checkLike();
				$check_paid = $cart_class->checkPaid();
								
				if($check_like == '0') {
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "");
				} else {
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "active");
				}
				
				if($check_paid == '1') {
					$tpl->set("check_paid", '<a class="ui basic right pointing label">'.$row['downloads'].'</a><div id="download_item" data-id="'.$row['id'].'" data-type="media" data-target="download_media" class="ui red button"><i class="icon-cloud-download"></i> '.$LANG_ARRAY['LANG_DONWLOAD'].' </div>');
				}
				
				
			} else {
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "");
			}
				
			$return = $tpl->output();
		
		} else {
			
			$return = ViewMessage($LANG_ARRAY['LANG_DISABLED_MEDIA']);
		
		}
		
	}  else {
		$return = NotFound();
	}
	
	return $return;
	
}
	
function query_playlist_page($query , $tpl) {
	global $CONF, $db, $media_class, $user_class, $action_class, $member,$LANG_ARRAY;
			
	$media_class->mediaID = $query['id'];
	$media_class->userID = $query['user'];
	
	$likes_count = $media_class->countMediaLikes();
	
	$return = '';
	
	if (isset($query)) {	
	
		
		$tpl->set("page_type", 'playlist');
		
		$tpl->set("url", $CONF['url']);
		$tpl->set("id", $query['id']);
		$tpl->set("title", $query['title']);
		$tpl->set("prefix", $query['url']);
		$tpl->set("user", $query['user']);
		$tpl->set("plays", $query['play']);
		$tpl->set("likes", $query['likes']);
		
		$user_class->userID = $media_class->userID = $query['user'];
		$user = $user_class->getUser_ID();
			
		$tpl->set("author_id", $user['id']);
		$tpl->set("author_name", $user['name']);
		$tpl->set("author_realname", $user['realname']);
		$tpl->set("author_img", $user['pic']);
		$tpl->set("author_media", $media_class->countUserMedia());
		$tpl->set("author_followers", $user_class->countUserFollowers());
		
		if (isset($member['id'])) {
			
			$action_class->userID = $member['id'];
			$action_class->itemType = 'playlist';
			$action_class->itemID = $query['id'];
			$check_like = $action_class->checkLike();
						
			if($check_like == '0') {
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "");
				$tpl->set("class_like_btn", "-active");
				$tpl->set("class_unlike_btn", "");
			} else {
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "active");
				$tpl->set("class_like_btn", "");
				$tpl->set("class_unlike_btn", "-active");
			}
					
		} else {
			$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
			$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
			$tpl->set("class_like", "");
			$tpl->set("remove_from_playlist", "");
		}
		
		$return .= $tpl->output();
		
	} else {
		$return = NotFound();
	}
	
	return $return;
	
}

function query_playlists_list($query , $tpl, $type = null, $title = null) {
	global $CONF, $db, $Setting, $media_class, $user_class, $action_class, $member, $LANG_ARRAY;
			
	$return = '';
	
	if (is_array($query)) {	
	
		$i = 0;
		$len = count($query);
		
		foreach($query as $row)	 {

			$items_list = '';
			$items_list .= '<div class="list-group no-radius alt">';
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("playlist_url", $row['url']);
			$tpl->set("play", $row['play']);
			$tpl->set("likes", $row['likes']);
			$tpl->set("comments", $row['comments']);
			
			$media_class->playlistID = $row['id'];
			$items_list_rows = $media_class->getMediaPlaylistItems();
			
			if (is_array($items_list_rows)) {
				foreach($items_list_rows as $list_row)	 {
					 
					$items_list .= '<div class="list-group-item" >
					<a class="jp-play-me " href="#" id="media-play-'.$list_row['id'].'" data-title="'.$list_row['title'].'" data-user="'.$list_row['author'].'" data-img="'.$list_row['thumbs'].'" data-id="'.$list_row['id'].'">
						<span class="small text-muted pull-right"  data-toggle="class"><i class="icon-control-play text m-r"></i> <i class="icon-control-pause m-r text-active"></i> '.$list_row['views'].'</span>
						<img src="'.$CONF['url'].'image.php?src='.$list_row['thumbs'].'&w=25&h=25&img=m3" alt=""> '.$list_row['title'].' 
					</a></div>
					';
				}
				
				$items_list .= '</div>';
				
			} else {

				$items_list = $LANG_ARRAY['LANG_NO_MORE'];
			}
				
			if (isset($member['id'])) {
				
				$action_class->userID = $member['id'];
				$action_class->itemType = 'playlist';
				$action_class->itemID = $row['id'];
				$check_like = $action_class->checkLike();
							
				if($check_like == '0') {
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "");
					$tpl->set("class_like_btn", "-active");
					$tpl->set("class_unlike_btn", "");
				} else {
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "active");
					$tpl->set("class_like_btn", "");
					$tpl->set("class_unlike_btn", "-active");
				}
						
			} else {
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "");
			}
			
			$tpl->set("media_list", $items_list);
			
			$user_class->userID = $row['user'];
			$user = $user_class->getUser_ID();
			
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_pic", $user['pic']);

			$tpl->set("loadmore", '');

			if ($type == 'search-playlist') {
				$page_type = $title;
			} else {
				$page_type = $row['user'];
			}

			if ($i == $len - 1) {
				$tpl->set("loadmore", '<a class="fluid ui btn btn-s-md btn-info clearfix clear" id="load-more" data-id="'.$row['id'].'" data-type="1" data-target="'.$type.'" data-page="'.$page_type.'" >'.$LANG_ARRAY['LANG_MORE'].'</a>');
			}
			$i++;
							
			$return .= $tpl->output();
			
		}
		
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	
	return $return;
	
}

function query_albums_list($query , $tpl, $type = null, $title = null) {
	global $CONF, $db, $Setting, $media_class, $user_class, $member, $action_class, $LANG_ARRAY;
			
	$return = '';
	
	if (is_array($query)) {	
	
		$i = 0;
		$len = count($query);
		
		foreach($query as $row)	 {
		
			$items_list = '';
			$items_list .= '<div class="list-group no-radius alt">';
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("playlist_url", $row['url']);
			$tpl->set("play", $row['play']);
			$tpl->set("likes", $row['likes']);
			$tpl->set("comments", $row['comments']);
			$tpl->set("cover", $row['cover']);
			
			$media_class->albumID = $row['id'];
			$items_list_rows = $media_class->getAlbumItems();
			
			if (is_array($items_list_rows)) {
				foreach($items_list_rows as $list_row)	 {
					$items_list .= '<div class="list-group-item" >
					<a class="jp-play-me " href="#" id="media-play-'.$list_row['id'].'" data-title="'.$list_row['title'].'" data-user="'.$list_row['author'].'" data-img="'.$list_row['thumbs'].'" data-id="'.$list_row['id'].'">
						<span class="small text-muted pull-right"  data-toggle="class"><i class="icon-control-play text m-r"></i> <i class="icon-control-pause m-r text-active"></i> '.$list_row['views'].'</span>
						<img src="'.$CONF['url'].'image.php?src='.$list_row['thumbs'].'&w=25&h=25&img=m3" alt=""> '.$list_row['title'].' 
					</a></div>
					';
				}
				
				$items_list .= '</div>';
				
			} else {
				$items_list = $LANG_ARRAY['LANG_NO_MORE'];
			}
			
			$tpl->set("media_list", $items_list);
			
			$user_class->userID = $row['user'];
			$user = $user_class->getUser_ID();
			
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_pic", $user['pic']);
					
			if (isset($member['id'])) {
				
				$action_class->userID = $member['id'];
				$action_class->itemType = 'albums';
				$action_class->itemID = $row['id'];
				$check_like = $action_class->checkLike();
								

				if($check_like == '0') {
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "");
					$tpl->set("class_like_btn", "-active");
					$tpl->set("class_unlike_btn", "");
				} else {
					$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
					$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
					$tpl->set("class_like", "active");
					$tpl->set("class_like_btn", "");
					$tpl->set("class_unlike_btn", "-active");
				}
					
			} else {
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "");
			}

			$tpl->set("loadmore", '');

			if ($type == 'search-album') {
				$page_type = $title;
			} else {
				$page_type = $row['user'];
			}

			if ($i == $len - 1) {
				$tpl->set("loadmore", '<a class="fluid ui btn btn-s-md btn-info clearfix clear" id="load-more" data-id="'.$row['id'].'" data-type="1" data-target="'.$type.'" data-page="'.$page_type.'" >'.$LANG_ARRAY['LANG_MORE'].'</a>');
			}
			$i++;
						
			$return .= $tpl->output();
			
		}
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	
	return $return;
	
}

function query_album_page($query , $tpl) {
	global $CONF, $db, $media_class, $user_class, $member, $action_class, $LANG_ARRAY;
			
	$return = '';
	
	if (isset($query)) {	
		
		$media_class->mediaID = $query['id'];
		$media_class->userID = $query['user'];
		
		$tpl->set("page_type", 'albums');
		
		$tpl->set("url", $CONF['url']);
		$tpl->set("id", $query['id']);
		$tpl->set("title", $query['title']);
		$tpl->set("prefix", $query['url']);
		$tpl->set("user", $query['user']);
		$tpl->set("plays", $query['play']);
		$tpl->set("likes", $query['likes']);
		
		$user_class->userID = $query['user'];
		$user = $user_class->getUser_ID();
			
		$tpl->set("author_id", $user['id']);
		$tpl->set("author_name", $user['name']);
		$tpl->set("author_realname", $user['realname']);
		$tpl->set("author_img", $user['pic']);
		$tpl->set("author_media", $media_class->countUserMedia());
		$tpl->set("author_followers", $user_class->countUserFollowers());
		
		if (isset($member['id'])) {
				
			$action_class->userID = $member['id'];
			$action_class->itemType = 'albums';
			$action_class->itemID = $query['id'];
			$check_like = $action_class->checkLike();
							
			if($check_like == '0') {
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "");
			} else {
				$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKE']);
				$tpl->set("check_like", $LANG_ARRAY['LANG_LIKEED']);
				$tpl->set("class_like", "active");
			}
					
		} else {
			$tpl->set("check_like", $LANG_ARRAY['LANG_LIKE']);
			$tpl->set("check_like_to", $LANG_ARRAY['LANG_LIKEED']);
			$tpl->set("class_like", "");
		}
			
		$return .= $tpl->output();
		
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	
	return $return;
	
}

function query_item_likes($query , $tpl) {
	global $CONF, $db, $media_class, $user_class;
			
	$return = '';
	$i = 0;
	if (is_array($query)) {	
		
		foreach($query as $row)	 {
			
			if(++$i > 9) break;
			$user_class->userID = $media_class->userID = $row['user'];
			$user = $user_class->getUser_ID();
				
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_pic", $user['pic']);
			$tpl->set("author_followers", $user['pic']);
			$return .= $tpl->output();
		}
		
	} else {
		$return = NotItems('Likes');
	}
	
	return $return;
	
}

function query_item_shares($query , $tpl) {
	global $CONF, $db, $media_class, $user_class;
			
	$return = '';
	
	if (is_array($query)) {	
		
		foreach($query as $row)	 {
			
			$user_class->userID = $media_class->userID = $row['user'];
			$user = $user_class->getUser_ID();
				
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_pic", $user['pic']);
			$tpl->set("author_followers", $user['pic']);
			$return .= $tpl->output();
		}
		
	} else {
		$return = NotItems('Shares');
	}
	
	return $return;
	
}

function query_item_comments($query , $tpl) {
	global $CONF, $db, $user_class, $member;
			
	$return = '';
	
	if (is_array($query)) {	
		
		foreach($query as $row)	 {
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("comment", $row['comment']);
			$tpl->set("date", ago(strtotime($row['time'])));
			
			$user_class->userID = $row['user'];
			$user = $user_class->getUser_ID();
			
			if (isset($member['id']) && $member['id'] == $user['id']) {
				$tpl->set("del_comment", '<a data-id="'.$row['id'].'" data-target="delete" data-type="comments" id="item_action" class="pull-right"> <i class="fa fa-times"></i></a>');
			} else {
				$tpl->set("del_comment", '');
			}
			
			$tpl->set("author_id", $user['id']);
			$tpl->set("author_name", $user['name']);
			$tpl->set("author_realname", $user['realname']);
			$tpl->set("author_pic", $user['pic']);
			$return .= $tpl->output();
		}
		
	} else {
		$return = NotItems('Comments');
	}
	
	return $return;
	
}

function load_side_comment_form($tpl) {
	global $CONF, $db, $user_class;
			
	$return = '';
	
	if (isset($_SESSION['membername'])) {	
		
		$row = GetMember($_SESSION['membername']);
				
		$tpl->set("author_id", $row['id']);
		$tpl->set("author_name", $row['name']);
		$tpl->set("author_realname", $row['realname']);
		$tpl->set("author_pic", $row['pic']);
		$return .= $tpl->output();
		
	} else {
		$return = LoginFirst();
	}
	
	return $return;
	
}

function query_categories_page($query , $tpl) {
	global $CONF, $db, $Setting, $media_class;
			
	
	$categories_media_tpl  = new Template("./templates/".$Setting['template']."/layouts/categories_items.tpl");
	
	$return = '';
	
	if (isset($query)) {	
	
		foreach($query as $row)	 {
			
			$media_class->mediaCat = $row['id'];
			
			$tpl->set("media_list", query_media_items($media_class->getMediaCatItems(), $categories_media_tpl));
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("cats_list", $cats);
			$return .= $tpl->output();
			
		}
	}
	
	return $return;
	
}


function query_category_page($query , $tpl, $cat_type = null) {
	global $CONF, $db, $media_class;
	
	
	$return = '';
	
	if (!empty($cat_type)) {
		
		$media_class->mediaCatType = $cat_type;
		$cats_list = $media_class->getMediaCats();
		$cats = '';
		
		foreach($cats_list as $row)	 {
				
			$cats .='<a data-ajax="true" href="'.$CONF['url'].'category/'.$row['url'].'" class="list-group-item">'.$row['title'].'</a>';
				
		}
		
		if (!empty($query)) {	
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", isset($query['id']) ? $query['id'] : '' );
			$tpl->set("title", isset($query['title']) ? $query['title'] : '' );
			$tpl->set("cats_list", $cats);
			$return .= $tpl->output();
				
		} else {
			$return = NotFound();
		}
		
	} else {
		
		if (isset($query)) {	
				
			$tpl->set("title", '');
			$return .= $tpl->output();
				
		} else {
			$return = NotFound();
		}
	}
		
	return $return;
}

function query_search_page($query , $tpl) {
	global $CONF, $db, $Setting;
		
	$return = '';
	
	if (isset($query)) {	
		
		$tpl->set("check_music_allow", empty($Setting['enable_music']) ? ' hide hidden ' : '');
		$tpl->set("check_videos_allow", empty($Setting['enable_videos']) ? ' hide hidden ' : '');
		$tpl->set("check_photos_allow", empty($Setting['enable_photos']) ? ' hide hidden ' : '');
		$tpl->set("url", $CONF['url']);
		$return .= $tpl->output();
			
	} else {
		$return = NotFound();
	}
	
	return $return;
	
}

function query_users_list($query , $tpl, $target = null, $title = null) {
	global $CONF, $db, $Setting, $media_class, $user_class;
			
	$return = '';
	
	if (is_array($query)) {	
		
		$i = 0;
		$len = count($query);

		foreach($query as $row)	 {
			
			$user_class->userID = $row['id'];
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("template", $Setting['template']);
			$tpl->set("author_id", $row['id']);
			$tpl->set("author_name", $row['name']);
			$tpl->set("author_realname", $row['realname']);
			$tpl->set("author_img", $row['pic']);
			$tpl->set("author_followers", $row['followers']);
			$tpl->set("author_following", $row['following']);
			$tpl->set("author_media", $user_class->countUserMedia());
			$tpl->set("loadmore", '');

			if ($target == 'user-search') {
				$data_page = $title;
			} else {
				$data_page = '';
			}
			
			if ($i == $len - 1) {
				$tpl->set("loadmore", '<a class="fluid ui btn btn-s-md btn-info clear clearfix" id="load-more" data-id="'.$row['id'].'" data-type="" data-target="'.$target.'" data-page="'.$data_page.'" >Load more</a>');
			}
			$i++;

			$return .= $tpl->output();
			
		}
		
		
	}
	
	return $return;
	
}
	
function query_chat_users_list($query , $tpl) {
	global $CONF, $db, $Setting, $member, $user_class, $chat_class;
			
	$return = '';
	
	if (is_array($query) && isset($member['id'])) {	
		
		foreach($query as $row)	 {
			
			$user_class->userID = $row['id'];
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("template", $Setting['template']);
			$tpl->set("author_id", $row['id']);
			$tpl->set("author_name", $row['name']);
			$tpl->set("author_realname", $row['realname']);
			$tpl->set("author_img", $row['pic']);
			$tpl->set("author_followers", $row['followers']);
			$tpl->set("author_following", $row['following']);
			$tpl->set("author_media", $user_class->countUserMedia());
			
			$chat_class->userID = $member['id'];
			$chat_class->senderID = $row['id'];
			$last_message = $chat_class->lastMessage();
			
			if(isset($last_message['message'])) {
				$tpl->set("last_message", substr($last_message['message'], 0, 30));
			} else {
				$tpl->set("last_message", '00');
			}
			
			$return .= $tpl->output();
			
		}
		
		
	}
	
	return $return;
	
}
	
function query_user_page($query , $tpl) {
	global $CONF, $db, $member, $action_class, $LANG_ARRAY;
			
	if (isset($query)) {
	
		$tpl->set("url", $CONF['url']);
		$tpl->set("id", $query['id']);
		$tpl->set("name", $query['name']);
		$tpl->set("realname", $query['realname']);
		$tpl->set("followers", $query['followers']);
		$tpl->set("following", $query['following']);
		$tpl->set("pic", $query['pic']);
		$tpl->set("cover", $query['cover']);
		$tpl->set("credit", $query['credit']);
		$tpl->set("user_facebook", $query['facebook']);
		$tpl->set("user_twitter", $query['twitter']);
		$tpl->set("user_instagram", $query['instagram']);
		$tpl->set("user_youtube", $query['youtube']);
		$tpl->set("user_google", $query['google']);
		$tpl->set("country", $query['country']);
		$tpl->set("email", $query['email']);
		$tpl->set("info", $query['info']);
		$tpl->set('verified_check', !empty($query['permissions']) ? 'active' : 'hidden');	
		
		if (isset($member['id']) && $member['id'] == $query['id']) { 
			$tpl->set("chat_edit", '<a class="btn btn-dark btn-rounded" data-ajax="true" href="'.$CONF['url'].'account"><i class="icon-note"></i> '.$LANG_ARRAY['LANG_EDIT'].'</a>'); 
		} else {
			$tpl->set("chat_edit", '<a class="btn btn-dark btn-rounded" data-ajax="true" href="'.$CONF['url'].'chat/'.$query['name'].'"><i class="icon-bubble"></i> '.$LANG_ARRAY['LANG_CHAT'].'</a>'); 
		}
		
		if (isset($member['id'])) {
			
			$action_class->userID = $member['id'];
			$action_class->itemType = 'user';
			$action_class->itemID = $query['id'];
			$check_follow = $action_class->checkFollow();
							
			if($check_follow == '0') {
				$tpl->set("active_follow", "");
			} else {
				$tpl->set("active_follow", "active");
			}
					
		} else {
			$tpl->set("active_follow", "");
		}
			
		$return = $tpl->output();
		
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	
	return $return;
	
}
	
function query_chat_list($query , $usertpl, $mytpl) {
	global $CONF, $db, $member;
	
	$return = '';
	
	if (is_array($query) && isset($member['id'])) {	
		
		foreach($query as $row)	 {
			
			$user = GetMemberID($row['user']);
			
			$sender = GetMemberID($row['sender']);
			
			if ($member['id'] == $row['sender'])
			{
			
				$mytpl->set("url", $CONF['url']);
				$mytpl->set("date", ago(strtotime($row['date'])));
				$mytpl->set("message", $row['message']);
				$mytpl->set("id", $row['id']);
				$mytpl->set("userid", $sender['id']);
				$mytpl->set("username", $sender['name']);
				$mytpl->set("userrealname", $sender['realname']);
				$mytpl->set("userpic", $sender['pic']);
				$mytpl->set('verified_check', !empty($sender['permissions']) ? 'active' : 'hidden');	
				
				$return .= $mytpl->output();
				
			} elseif ($member['id'] == $row['user']) {
				
				$usertpl->set("url", $CONF['url']);
				$usertpl->set("date", ago(strtotime($row['date'])));
				$usertpl->set("id", $row['id']);
				$usertpl->set("message", $row['message']);
				$usertpl->set("userid", $sender['id']);
				$usertpl->set("username", $sender['name']);
				$usertpl->set("userrealname", $sender['realname']);
				$usertpl->set("userpic", $sender['pic']);
				$usertpl->set('verified_check', !empty($sender['permissions']) ? 'active' : 'hidden');	
				
				$return .= $usertpl->output();
				
			} 
			
		}
	}
	
	return $return;
		
}

function query_chat_page($query , $tpl) {
	global $CONF, $db, $member, $action_class, $BLOCK_SIDE_ADS_PLUGINS, $LANG_ARRAY;
			
	if (isset($query) && isset($member['id'])) {
		
		if (isset($query) && isset($member['id'])) {
		
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $query['id']);
			$tpl->set("name", $query['name']);
			$tpl->set("realname", $query['realname']);
			$tpl->set("followers", $query['followers']);
			$tpl->set("following", $query['following']);
			$tpl->set("pic", $query['pic']);
			$tpl->set("cover", $query['cover']);
			$tpl->set("credit", $query['credit']);
			$tpl->set("facebook", $query['facebook']);
			$tpl->set("twitter", $query['twitter']);
			$tpl->set("instagram", $query['instagram']);
			$tpl->set("youtube", $query['youtube']);
			$tpl->set("country", $query['country']);
			$tpl->set("email", $query['email']);
			$tpl->set("info", $query['info']);
			$tpl->set('verified_check', !empty($sender['permissions']) ? 'active' : 'hidden');	
			
			$tpl->set("author_id", $member['id']);
			$tpl->set("author_name", $member['name']);
			$tpl->set("author_realname", $member['id']);
			$tpl->set("author_cover", $member['pic']);
			$tpl->set("side_ads", $BLOCK_SIDE_ADS_PLUGINS);
				
			$return = $tpl->output();
			
		} else {
			$return = LoginFirst();
		}
		
	} else {
		$return = NotFound();
	}
	
	return $return;
	
}

function load_beats_posts($query , $tpl, $type = null, $title = null) {
		
	global $CONF, $db, $category_posts_tpl, $LANG_ARRAY;
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;

	$return = '';
			
	if (is_array($query)) {	
		
		$i = 0;
		$len = count($query);
		
		foreach($query as $row)	 {
					
			$cat = $FullAdmin->getCategory($row['cat']);	
			
			if ($row['author'] == 0) {$author = $FullAdmin->getAdmin($row['admin']);}	 else {$author = $FullAdmin->GetMember($row['author']);} 
			
			$comments_num = count(get_page_comments('post', $row['id']));
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("img", $row['photo']);
			$tpl->set("category", $cat['title']);
			$tpl->set("comments", $row['comments']);
			$tpl->set("likes", $row['likes']);
			$tpl->set("author_id", $author['id']);
			$tpl->set("author_name", $author['name']);
			$tpl->set("author_realname", $author['realname']);
			$tpl->set("author_pic", !empty($author['pic']) ? $author['pic'] : 'default.png');
			$tpl->set("comments_number", $comments_num);
			$tpl->set("date", ago(strtotime($row['time'])));
			$tpl->set("short", substr($row['short'], 0, 100));
			$tpl->set("content", substr($row['content'], 0, 300));
			
			$tpl->set("loadmore", '');

			if ($type == 'search-post') {
				$page_type = $title;
			} else {
				$page_type = $row['cat'];
			}

			if ($i == $len - 1) {
				$tpl->set("loadmore", '<a class="fluid ui btn btn-s-md btn-info clearfix clear" id="load-more" data-id="'.$row['id'].'" data-type="1" data-target="'.$type.'" data-page="'.$page_type.'" >'.$LANG_ARRAY['LANG_MORE'].'</a>');
			}
			$i++;
			
			$return .= $tpl->output();
		}
	
	} else {
		$return = viewMessage($LANG_ARRAY['LANG_NO_MORE']);
	}
	return $return;
}


function load_beats_post_data($query , $tpl) {
		
	global $CONF, $db;
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;

	$cat = $FullAdmin->getCategory($query['cat']);	
	
	if ($query['author'] == 0) {$author = $FullAdmin->getAdmin($query['admin']);}	 else {$author = $FullAdmin->GetMember($query['author']);} 
	
	if ($query['comment'] == 0) {$comment_form = view_comments_form(null, $query['id'], 'post');} else {$comment_form = '';}	
	if ($query['comment'] == 0) {$comment_list = view_comments_list(null, $query['id'], 'post');} else {$comment_list = '';}	

	$comments_num = count(get_page_comments($query['id'], 'post'));
	
	$tpl->set("url", $CONF['url']);
	$tpl->set("title", $query['title']);
	$tpl->set("img", $query['photo']);
	$tpl->set("category", $cat['title']);
	$tpl->set("author_id", $author['id']);
	$tpl->set("author_name", $author['name']);
	$tpl->set("comments_number", $comments_num);
	$tpl->set("comment_form", $comment_form);
	$tpl->set("comment_list", $comment_list);
	$tpl->set("date", ago(strtotime($query['time'])));
	$tpl->set("content", $query['content']);
	
	return $tpl->output();

}


function load_beats_page_data($query , $tpl) {
		
	global $CONF;
	
	if ($query['comment'] == 0) {$comment_form = view_comments_form(null, $query['id'], 'pages');} else {$comment_form = '';}	
	if ($query['comment'] == 0) {$comment_list = view_comments_list(null, $query['id'], 'pages');} else {$comment_list = '';}	
	
	$comments_num = count(get_page_comments('pages', $query['id']));
	
	$tpl->set("url", $CONF['url']);
	$tpl->set("title", $query['title']);
	$tpl->set("comments_number", $comments_num);
	$tpl->set("comment_form", $comment_form);
	$tpl->set("comment_list", $comment_list);
	$tpl->set("date", ago(strtotime($query['time'])));
	$tpl->set("content", $query['content']);
	
	return $tpl->output();

}


function load_beats_cats($query , $tpl) {
		
	global $CONF, $db;
	
	$post_class = new post;
	$post_class->db = $db;
	
	$posts = '';
	
	if (is_array($query)) {	
		
		foreach($query as $row)	 {
		
			$post_class->postCat = $row['id'];
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $row['id']);
			$tpl->set("title", $row['title']);
			$tpl->set("prefix", $row['url']);
			$tpl->set("count", $post_class->countCategoryPosts());
			$posts .= $tpl->output();
			
		}
		
		return $posts;
	}
}

function query_user_playlists() {
	global $CONF, $db, $Setting, $media_class, $user_class, $member;
			
	$return = '';
	
	if (isset($member['id'])) {	
		
		$media_class->userID = $member['id'];
		
		$query = $media_class->getUserPlaylists();
		
		if (is_array($query)) {	
			
			foreach($query as $row)	 {
			
				$return .=  '<li class="playlist-item"><a href="#" data-id="'.$row['id'].'" data-type="playlist" class="set_playlist"><i class="icon-playlist  "></i><span>'.$row['title'].'</span> </a> <span class="del-playlist" id="confirmation_action" data-title="Are you sure you want to delete <b>'.$row['title'].'</b> ? " data-id="'.$row['id'].'" data-action="del_playlist"><i class="fa fa-times "></i></span>  </li>';
				
			}
			
		} else {
			$return = '';
		}
		
	} else  {
		$return = '';
	}
	
	
	return $return;
	
}


function query_user_albums() {
	global $CONF, $db, $Setting, $media_class, $user_class, $member;
			
	$return = '';
	
	if (isset($member['id'])) {	
		
		$media_class->userID = $member['id'];
		
		$query = $media_class->getUserAlbum();
		
		if (is_array($query)) {	
			
			foreach($query as $row)	 {
			
				$return .=  '<li class="playlist-item"><a href="#" data-id="'.$row['id'].'" data-type="album" class="set_playlist"><i class="icon-music-tone "></i><span>'.$row['title'].'</span> </a> <span class="del-playlist" id="confirmation_action" data-title="Are you sure you want to delete <b>'.$row['title'].'</b> ? " data-id="'.$row['id'].'" data-action="del_album"><i class="fa fa-times "></i></span>  </li>';
				
			}
			
		} else {
			$return = '';
		}
		
	} else  {
		$return = '';
	}
	
	
	return $return;
	
}

function query_user_playlists_form() {
	global $CONF, $db, $Setting, $media_class, $user_class, $member, $LANG_ARRAY;
			
	$return = '';
	
	if (isset($member['id'])) {	
		
		$media_class->userID = $member['id'];
		
		$query = $media_class->getUserPlaylists();
		
		if (is_array($query)) {	
			
			$return .=  '<h4>'.$LANG_ARRAY['LANG_CH_PLAYLIST'].'</h4><br />';
			$return .=  '<form role="action" id="make_action" action="">';
			$return .=  '<input type="hidden" name="type" id="add_playlist_id" value="" >';
			$return .=  '<input type="hidden" name="target" value="add_to_playlist">';
			$return .=  '<select name="id" class="form-control m-b">';
			foreach($query as $row)	 {
			
				$return .=  '<option value="'.$row['id'].'">'.$row['title'].'</option> ';
				
			}
			$return .=  '</select>';
			$return .=  '<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> '.$LANG_ARRAY['LANG_ADD_TO_PLAYLIST'].'</button>';
			$return .=  '</form>';
			
		} else {
			$return = $LANG_ARRAY['LANG_ADD_PLAYLIST_MSG'];
		}
	
	}	else {
		$return =  LoginFirst();
	}
	
	return $return;
	
}

function query_media_cats($type) {
	global $CONF, $db, $Setting, $media_class, $user_class, $member;
			
	$return = '';
		
	$media_class->mediaCatType = $type;
	
	$query = $media_class->getMediaCats();
		
	if (is_array($query)) {	
			
		foreach($query as $row)	 {
			if ($row['mother'] == 0) {
				$return .=  '<li><a data-ajax="true" href="'.$CONF['url'].'category/'.$row['url'].'"> '.$row['title'].'</a> ';
			}
			$return .=  '<ul class="nav dk text-sm">';
			foreach($query as $children)	 {
				
				if ($children['mother'] == $row['id']) {
					$return .=  '<li><a data-ajax="true" href="'.$CONF['url'].'category/'.$children['url'].'"> '.$children['title'].'</a> </li>';
				}
			}
			
			$return .=  '</ul>';
			if ($row['mother'] == 0) {
				$return .=  '</li>';
			}
			
				
		}
		
	} else  {
		$return = '';
	}
	
	
	return $return;
	
}

function add_notification($user, $type, $typeID, $name) {
	global $CONF, $db, $Setting, $member, $note_class;
	
	if (!empty($user) && !empty($type) ) {
	
				
		if (isset($member['id']) && $member['id'] !== $user )
		{
			
			$note_class->itemID = $typeID;
			$note_class->itemType = $type;
			$note_class->itemName = $name;
			$note_class->userID = $user;
			$note_class->senderID = $member['id'];
			$action = $note_class->add();

			if ($action == 1) {
				return $action;
			} else {
				return '0';
			}
			 
		}
	}
		
}

function check_cart() {
	global $CONF, $db, $Setting, $member, $note_class, $cart_class, $LANG_ARRAY;
	
	$return = '';
	
	if (isset($member['id']))
	{
		$cart_class->userID = $member['id'];
		$check = $cart_class->checkCart();
		
		if (is_array($check)) {
			
			foreach ($check as $row) {
				$query = queryTbl($row['type'], $row['type_id']);
				
					$return .= '<li class="product" id="product-cart-' . $query['id'] . '">
					<div class="product-image">
						<a data-ajax="true" href="' . $CONF['url'] . $query['type'] . '/' .  $query['id'] .  '"><img src="' . $CONF['url'] . 'image.php?src='.$query['thumbs'].'&w=150&h=150&img='.media_type($query['type']).'" alt="placeholder"></a>
					</div>
					<div class="product-details">
						<h3><a data-ajax="true" href="' . $CONF['url'] . 'media/' .  $query['id'] .  '"> ' .  $query['title'] . '</a></h3>
						<span class="price">'  . $query['cost'] .  '</span>
						<div class="actions"><a href="#0"  id="item_action" data-id="' . $query['id'] . '" data-type="media" data-target="remove_from_cart" class="delete-item">'.$LANG_ARRAY['LANG_DEL'].'</a><div class="quantity"></span>
					</div></div></div></li>';
			}
		}
	}
	return $return;
}

function check_notification($last = null) {
	global $CONF, $dbaser, $Setting, $member, $note_class;
	
	$return = '';
	
	if (isset($member['id']))
	{
		$note_class->userID = $member['id'];
		
		if (!empty($last)) {
			$note_class->itemLast = $last;
			$check = $note_class->check();
		} else {
			$check = $note_class->check_latest();
		}
		
		if (is_array($check)) {
			
			$itemLast = isset($check[0]['id']) ? $check[0]['id'] : '';
			$return .= '<div class="hide hidden" id="last_note_header" data-id="'.$itemLast.'"></div>';
			
			foreach ($check as $row) {
			
				$note_class->userID = GetMemberID($row['user']);
				$note_class->senderID = GetMemberID($row['sender']);
				$note_class->itemID = $row['type_id'];
				$note_class->itemType = $row['type'];
				$note_class->itemName = $row['item'];
				$note_class->itemSeen = $row['seen'];
				$return .= $note_class->display();
			}
		}
	}
	return $return;
}

function count_notification() {
	global $CONF, $dbaser, $member, $note_class;
	
	$return = '';
	
	if (isset($member['id']))
	{
		$note_class->userID = $member['id'];
		$check = $note_class->check();
	}
	return isset($check) ? count($check) : '';
}

function check_messages() {
	global $CONF, $db, $Setting, $member, $chat_class;
	
	$return = '';
	
	if (isset($member['id']))
	{
		$chat_class->userID = $member['id'];
		$check = $chat_class->check_my_messages();
		
		if (is_array($check)) {
		
			$itemLast = isset($check[0]['id']) ? $check[0]['id'] : '';
			$return .= '<div class="hide hidden" id="last_msg_header" data-id="'.$itemLast.'"></div>';
			
			foreach ($check as $row) {
				
				$chat_class->itemID = $row['id'];
				$chat_class->userID = $member['id'];
				$chat_class->senderID = $row['id'];
				$last_message = $chat_class->lastMessage();
				
				$chat_class->message = $last_message['message'];
				$chat_class->itemSeen = $last_message['seen'];
				$chat_class->userID = $row;
				
				$return .= $chat_class->display_msg();
				
			}
		}
	}
	return $return;
}

function count_messages() {
	global $CONF, $db, $Setting, $member, $chat_class;
	
	$return = '';
	
	if (isset($member['id']))
	{
		$chat_class->userID = $member['id'];
		$return = $chat_class->counts();
	}
	return $return;
}

function view_credit($val) {
	
	return  number_format($val);
	
}


function query_verify_page() {

	global $CONF, $dbaser, $Setting, $member;

	if (isset($_GET['cd']) && is_numeric($_GET['cd']) && isset($_GET['acc']) && is_numeric($_GET['acc'])) {

		$user_acc =  $_GET['acc'];
		$user_code =  $_GET['cd'];

		$dbaser->where('user', $user_acc);
		$dbaser->where('code', $user_code);
		$check_vrfy = $dbaser->ObjectBuilder()->getOne('members_activation');

		if (isset($check_vrfy->id)) {
			
			$dbaser->where('id', $user_acc);
			$dbaser->update('members', array('publish' => '1'));
			
			$content = 'Account is activated. You can sign-in now';
		}
	}

	if (!empty($content)) {

		$layout = new Template("./templates/".$Setting['template']."/layouts/verify.tpl");		
				
		$layout->set('msg', viewMessage($content, 1));	
		$layout->set('url', $CONF['url']);	
		$page_id = '';
		
		return $layout->output();
		
	} else {

		return query_members_page();
	}
}


function query_subscription_page()
{
	global $db, $CONF, $Setting,  $member, $page_ID, $page_TYPE;
	
	
	$content = ''; 
	$old = ''; 
	$plans_list = '';
	$plan_access = '';
	$plans_form = '';
	$plan_cost = '';
	$plan_period = '';

	$layout = new Template("./templates/".$Setting['template']."/layouts/subscribe/subscribe.tpl");					
	$plan_row = new Template("./templates/".$Setting['template']."/layouts/subscribe/features.tpl");					
	$layout->set('url', $CONF['url']);
	
	if (isset($member['id']) && !empty($member['id'])) {
				
		$layout->set('credit', empty($member['credit']) ? '0' : $member['credit']);

		$layout->set('message', '');

		$cur_plan = Plans::userPlan($member['id']);

		$plans = Plans::allPlans();

		$planAccess = Plans::planAccessList();
		
		foreach ($plans as $key => $value) {
			$plans_list .= "<th>$value->title</th>";

			$plan_row->set('id', $value->id);
			$plans_form .= $plan_row->output();
			$plan_cost .= "<td>$ $value->cost</td>";
			$plan_period .= !empty($value->period) ? "<td>$value->period Month</td>" : '<td>--</td>';
		}

		foreach ($planAccess as $key2 => $value2) { 

			$plan_access .= "<tr>";
			$plan_access .= "<td>$value2->title</td>";
			foreach ($plans as $key => $value) {
				$access_query = Plans::planAccess($value->id, $value2->access);
				$plan_access .= "<td>$access_query->value</td>";
			}
			$plan_access .= "</tr>";
		}

		$old_sub = Plans::checkOld($member['id']);

		if (is_array($old_sub)) {
			
			foreach ($old_sub as $key => $value) {
				$date = $value->date;
				$status = (date('Y-m-d') > $value->date) ? 'Expired' : 'Active';
				$time = ago(strtotime($value->time));
				$old .= "
				    <tr>
				      <td>".$value->id."</td>
				      <td>".$value->title."</td>
				      <td>".$date."</td>
				      <td>".$status."</td>
				    </tr>";
				}

		} 

		$layout->set('old', $old);
		$layout->set('plan_title', isset($cur_plan->title) ? $cur_plan->title : 'Free ' );
		$layout->set('plan_date', isset($cur_plan->date) ? $cur_plan->date : '--');
		$layout->set('plans', $plans_list);
		$layout->set('plan_access', $plan_access);
		$layout->set('plans_form', $plans_form);
		$layout->set('plan_cost', $plan_cost);
		$layout->set('plan_period', $plan_period);
			
		$content .= $layout->output();
			
		$page_id = '';

		return $content;
		
	}	else {
	
		 return query_members_page();
	
	}
	

}



function query_forgotpass_page()
{
	global $dbaser, $CONF, $Setting,  $member, $page_ID, $page_TYPE;
	
	
	$content = ''; 
	$old = ''; 

	$layout = new Template("./templates/".$Setting['template']."/layouts/forgot_pw/main.tpl");					
	$form_tpl = new Template("./templates/".$Setting['template']."/layouts/forgot_pw/form.tpl");					
	$mail_tpl = new Template("./templates/".$Setting['template']."/layouts/forgot_pw/form_mail.tpl");					
	

	if (isset($_GET['cd']) && is_numeric($_GET['cd']) && isset($_GET['acc']) && is_numeric($_GET['acc'])) {

		$user_acc =  $_GET['acc'];
		$user_code =  $_GET['cd'];

		$dbaser->where('user', $user_acc);
		$dbaser->where('code', $user_code);
		$check_vrfy = $dbaser->ObjectBuilder()->getOne('recover_pass');

		if (isset($check_vrfy->id)) {
			
			$form_tpl->set('id', $check_vrfy->user);
			$content = $form_tpl->output();

			$_SESSION['recover_code'] = $check_vrfy->code;
			$_SESSION['recover_user'] = $check_vrfy->user;
			$_SESSION['recover_id'] = $check_vrfy->id;
		}

	} else {
		$content = $mail_tpl->output();
	}

	if (!empty($content)) {

		$layout->set('form', $content);	
		
		$page_id = '';

		return $layout->output();
		
	} else {

		return NotFound();

	}
	

}


require_once("tpl_list.php");
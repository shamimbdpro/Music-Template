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
	
	session_start();
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['membername']) || $_SESSION['membername']) {
		
		$CHid = $_SESSION['membername'];
			
		$CHid = MemberID($CHid);
		
		$Setting = Settings();
				
		if ($_POST['grab'] == 'ch' && isset($CHid) && $_POST['channel_id'] !== 0) {
					
			$MainCat = $_POST['vcat'];
					
			$KEY = $Setting['youtube_key'];
			
			$channel_id = '';
			
			// Check if user enterd (username) or (channel id)
			if 	(strpos($_POST['channel_id'],'/user/') !== false) {
			
				$Channel_name = substr($_POST['channel_id'], strpos($_POST['channel_id'], "/user/") + 6);  
				
				$curl_ch = curl_init();
				curl_setopt ($curl_ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=".$Channel_name."&key=".$KEY );
				curl_setopt($curl_ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl_ch, CURLOPT_SSL_VERIFYPEER, false);
				$channel_res = curl_exec ($curl_ch);
				curl_close ($curl_ch);
					
				$channel_response = json_decode($channel_res, true);
				$channel_id = $channel_response["items"][0]["id"];

			} elseif (strpos($_POST['channel_id'],'/channel/') !== false) {
			
				$channel_id = substr($_POST['channel_id'], strpos($_POST['channel_id'], "/channel/") + 9); 
			
			}		
					
			$curl = curl_init();
			curl_setopt ($curl, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?key=".$KEY."&channelId=".$channel_id."&type=video&part=snippet,id&maxResults=50");
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			$result = curl_exec ($curl);
			curl_close ($curl);
					
			$response = json_decode($result, true);

			$result = $response["items"];
					
			for ($i = 0;  $i < count($result); $i++) {
					
						
				$listTTL = $result[$i]['snippet']['title'];
				$listID = $result[$i]['id']['videoId'];
				$listDESC = $result[$i]['snippet']['description'];
						
				$server_thumb1 = 'http://i.ytimg.com/vi/'.$listID.'/maxresdefault.jpg';	
								
				$server_thumb2 = 'http://i.ytimg.com/vi/'.$listID.'/hqdefault.jpg';				
									
				$AgetHeaders = @get_headers($server_thumb1);
									
				if (preg_match("|200|", $AgetHeaders[0])) {
									
					$video_thumb = $server_thumb1;
									
				} else {
										
					$video_thumb = $server_thumb2;
									
				}
							
				if ($video_thumb) {
							
					$thumbtitle = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.jpg';
										
					$local_file = "../media/videos/thumbs/" . $thumbtitle;
												
					$remote_file = $video_thumb; 
													
					$ch = curl_init();
													
					$fp = fopen ($local_file, 'w+');
											
					$ch = curl_init($remote_file);
													
					curl_setopt($ch, CURLOPT_TIMEOUT, 999999);
													
					curl_setopt($ch, CURLOPT_FILE, $fp);
													
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
													
					curl_setopt($ch, CURLOPT_ENCODING, "");
													
					$thumb_Uploaded = curl_exec($ch);
													
					curl_close($ch);
													
					fclose($fp);
										
					if ($thumb_Uploaded) {
									
						$imagetitle = $thumbtitle;
							
					} else {
									
						$imagetitle = "default.png";
									
					}
				}	
						
				if ($imagetitle){ 
								
					$removeTags = array(' and ', ' or ', ' - ', ' ', ' at ', ' in ', ' on ', ' for ', ' at ');
								
					$neww_title = str_replace($removeTags, ',', $listTTL);
								
					$tags = $neww_title. ', youtube' ;
								
					UploadMedia('m1', $listTTL, $listDESC, $MainCat, $CHid,  $listID,  $thumbtitle,  $tags,  '1',  '1', 'youtube');
										
				}
							
				
			}
					
			// Message after adding
			$message = '('.count($result).') videos has been added';
			
		} elseif ($_POST['grab'] == 'track' && isset($CHid)) {
			
			$MainCat = $_POST['acat'];
			
			$trackid = $_POST['trackid'];
			
			$KEY = $Setting['soundcloud_key'];
			
			$curl = curl_init(); 
			curl_setopt ($curl, CURLOPT_URL, "http://api.soundcloud.com/tracks/".$trackid."?client_id=" . $KEY);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result =  array();
			$result = curl_exec ($curl);
			curl_close ($curl);
					
			$response = json_decode($result, true);
			$result = $response;

			if ($result['streamable'] == 'true' ) {
						
				$listTTL = $result['title'];
				$listID = $result['id'];
				$listIMG_link = $result['artwork_url'];
				$listIMG = str_replace("https:", "http:", $listIMG_link);
				$listDESC = $result['description'];
									
				if ($listIMG) {
								
					$thumbtitle = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.jpg';
									
					$local_file = "../media/audio/thumbs/" . $thumbtitle;
											
					$remote_file = $listIMG; 
													
					$ch = curl_init();
													
					$fp = fopen ($local_file, 'w+');
													
					$ch = curl_init($remote_file);
													
					curl_setopt($ch, CURLOPT_TIMEOUT, 999999);
													
					curl_setopt($ch, CURLOPT_FILE, $fp);
													
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
													
					curl_setopt($ch, CURLOPT_ENCODING, "");
													
					$thumb_Uploaded = curl_exec($ch);
													
					curl_close($ch);
													
					fclose($fp);
										
					if ($thumb_Uploaded) {
									
						$imagetitle = $thumbtitle;
									
					} else {
									
						$imagetitle = "default.png";
									
					}
					
				}	else {
						
					$imagetitle = "default.png";
					
				}					
							
				if ($imagetitle){ 
							
					$removeTags = array(' and ', ' or ', ' - ', ' ', ' at ', ' in ', ' on ', ' for ', ' at ');
								
					$neww_title = str_replace($removeTags, ',', $listTTL);
								
					$tags = $neww_title. ', soundcloud' ;
								
					$addMedia = UploadMedia('m3', $listTTL, $listDESC, $MainCat, $CHid,  $listID,  $imagetitle,  $tags,  '1',  '1', 'soundcloud');
									
				}
			}		
				
			if ($addMedia) {	
				// Message after adding
				$message = '('.$result['title'].') track has been added';
			}
		
		} elseif ($_POST['grab'] == 'sc_list' && isset($CHid)) {
			
			$MainCat = $_POST['acat'];
			
			$list_link = $_POST['playlistid'];
			
			$KEY = $Setting['soundcloud_key'];
					
			$curl = curl_init();
			curl_setopt ($curl, CURLOPT_URL, "http://api.soundcloud.com/playlists/".$list_link."?client_id=" . $KEY);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result =  array();
			$result = curl_exec ($curl);
			curl_close ($curl);
					
			$response = json_decode($result, true);
			$result = $response["tracks"];

			for ($i = 0;  $i < count($result); $i++) {
					
				if ($result[$i]['streamable'] == 'true' ) {
						
					$listTTL = $result[$i]['title'];
					$listID = $result[$i]['id'];
					$listIMG_link = $result[$i]['artwork_url'];
					$listIMG = str_replace("https:", "http:", $listIMG_link);
					$listDESC = $result[$i]['description'];
										
					if ($listIMG) {
									
						$thumbtitle = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.jpg';
										
						$local_file = "../media/audio/thumbs/" . $thumbtitle;
												
						$remote_file = $listIMG; 
													
						$ch = curl_init();
													
						$fp = fopen ($local_file, 'w+');
													
						$ch = curl_init($remote_file);
													
						curl_setopt($ch, CURLOPT_TIMEOUT, 999999);
													
						curl_setopt($ch, CURLOPT_FILE, $fp);
													
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
													
						curl_setopt($ch, CURLOPT_ENCODING, "");
													
						$thumb_Uploaded = curl_exec($ch);
													
						curl_close($ch);
													
						fclose($fp);
										
						if ($thumb_Uploaded) {
									
							$imagetitle = $thumbtitle;
									
						} else {
									
							$imagetitle = "default.png";
									
						}
					}	
							
					if ($imagetitle){ 
							
						$removeTags = array(' and ', ' or ', ' - ', ' ', ' at ', ' in ', ' on ', ' for ', ' at ');
								
						$neww_title = str_replace($removeTags, ',', $listTTL);
								
						$tags = $neww_title. ', soundcloud' ;
								
						UploadMedia('m3', $listTTL, $listDESC, $MainCat, $CHid,  $listID,  $imagetitle,  $tags,  '1',  '1', 'soundcloud');
									
					}
				}		
						
			}
					
			// Message after adding
			$message = '('.count($result).') tracks has been added';
		
		} elseif ($_POST['grab'] == 'sc_user' && isset($CHid)) {
				
			$MainCat = $_POST['acat'];
			
			$KEY = $Setting['soundcloud_key'];
					
			$userid = $_POST['sc_user'];
					
			$curl = curl_init(); 
			curl_setopt ($curl, CURLOPT_URL, "http://api.soundcloud.com/users/".$userid."/tracks?client_id=" . $KEY);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$result =  array();
			$result = curl_exec ($curl);
			curl_close ($curl);
					
			$response = json_decode($result, true);
			$result = $response;

			for ($i = 0;  $i < count($result); $i++) {
					
				if ($result[$i]['streamable'] == 'true' ) {
						
					$listTTL = $result[$i]['title'];
					$listID = $result[$i]['id'];
					$listIMG_link = $result[$i]['artwork_url'];
					$listIMG = str_replace("https:", "http:", $listIMG_link);
					$listDESC = $result[$i]['description'];
										
					if ($listIMG) {
									
						$thumbtitle = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.jpg';
										
						$local_file = "../media/audio/thumbs/" . $thumbtitle;
												
						$remote_file = $listIMG; 
													
						$ch = curl_init();
													
						$fp = fopen ($local_file, 'w+');
													
						$ch = curl_init($remote_file);
													
						curl_setopt($ch, CURLOPT_TIMEOUT, 999999);
													
						curl_setopt($ch, CURLOPT_FILE, $fp);
													
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
													
						curl_setopt($ch, CURLOPT_ENCODING, "");
													
						$thumb_Uploaded = curl_exec($ch);
													
						curl_close($ch);
													
						fclose($fp);
										
						if ($thumb_Uploaded) {
									
							$imagetitle = $thumbtitle;
									
						} else {
									
							$imagetitle = "default.png";
									
						}
					
					}	else {
						
						$imagetitle = "default.png";
					
					}					
							
					if ($imagetitle){ 
							
						$removeTags = array(' and ', ' or ', ' - ', ' ', ' at ', ' in ', ' on ', ' for ', ' at ');
								
						$neww_title = str_replace($removeTags, ',', $listTTL);
								
						$tags = $neww_title. ', soundcloud' ;
								
						UploadMedia('m3', $listTTL, $listDESC, $MainCat, $CHid,  $listID,  $imagetitle,  $tags,  '1',  '1', 'soundcloud');
									
					}
				}		
						
			}
					
			// Message after adding
			$message = '('.count($result).') tracks has been added';
			
		} else {
				
			$message =  'ERROR: No id found';
				
		}
		
		echo NotePopup($message);
	
	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
		
?>
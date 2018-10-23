<?php
error_reporting(0);

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');
	
	if(is_array($member) && $member !== '0' ) {
			
		if ($_POST['form_type'] == 'music' || $_POST['form_type'] == 'video' || $_POST['form_type'] == 'photo') {
			
			$uploaded_type = $_POST['form_type'];
			
			$check = Plans::checkUserAccess('upload_'.$uploaded_type, $member);
			if (isset($check['msg']) && $check['msg'] == 'allowed') {


				if (isset($_POST[$uploaded_type.'_album'])) { 
					$album = $db->real_escape_string($_POST[$uploaded_type.'_album']); 
				} else { 
					$album = '0';
				}

				if (isset($_POST['stream_type'])) { $stream_type = $_POST['stream_type']; } else {$stream_type = 0;}
				
				if (isset($_POST[$uploaded_type.'_public'])) {$public = $_POST[$uploaded_type.'_public'];} else {$public = '0';}
					
				if (isset($_FILES[$uploaded_type.'_file'])) {
					$media_file = upload_media($_FILES[$uploaded_type.'_file'], MediaNameToNumber($uploaded_type)); 
					
					$media_file_first = strtok($media_file, " ");
					
				}   else {
					$media_file_first = 'Error';
				}
				
				if (isset($_FILES[$uploaded_type.'_cover']))  {
					$media_cover = upload_media($_FILES[$uploaded_type.'_cover'], MediaNameToNumber($uploaded_type).'_1');
					
					$media_cover_first = strtok($media_cover, " ");
					
				}  else {
					$media_cover_first = 'Error'; 
				}
				
				if (isset($_FILES[$uploaded_type.'_mainfile'])) {
					$main_file = upload_media($_FILES[$uploaded_type.'_mainfile'], MediaNameToNumber($uploaded_type).'_2'); 
					
					$main_file_first = strtok($main_file, " ");
					
				}   else {

					$main_file_first = '';
					
					if (!empty($stream_type)) {
						$main_file_first = 'Error';
					}
				}
				
				if (isset($media_cover_first) && $media_cover_first !== 'Error' && 
					isset($media_file_first) && $media_file_first !== 'Error' && 
					isset($main_file_first) && $main_file_first !== 'Error') {
					
					$upload = new upload();
					
					$upload->db = $db;
					$upload->userID = $member['id'];
					$upload->mediaType = MediaNameToNumber($uploaded_type);
					$upload->mediaName =  $db->real_escape_string($_POST[$uploaded_type.'_name']);
					$upload->mediaDesc =  $db->real_escape_string($_POST[$uploaded_type.'_desc']);
					$upload->mediaCat =  $db->real_escape_string($_POST[$uploaded_type.'_cat']);
					$upload->mediaCover =  $media_cover;
					$upload->mediaFile =  $media_file;
					$upload->mediaMainFile =  $main_file;
					$upload->mediaPrice =  $db->real_escape_string($_POST[$uploaded_type.'_price']);
					$upload->mediaFrametype =  'local';
					$upload->mediaTags =  $db->real_escape_string($_POST['tags']);
					$upload->mediaAllow =  $public;
					$upload->mediaAlbum =  $album;
					
					$upload->mediaPublish =  $Setting['auto_publish'];
					

					if (!empty($stream_type) && $stream_type == 'premium') {
						$add = $upload->uploadMediaPremium();
					} else {
						$add = $upload->uploadMediaFree();
					}
					
				} else {
					
					$add .= 'Please upload valid files ';
					
				}

				
				if($add == 1) {
					
					// echo NotePopup('Uploaded sueccessfully ', 1);
					echo 1;
					
				}  else {
					
					echo NotePopup('Error! : '.$add, 2);
				
				}
					
			} elseif ($check['msg'] == 'not_allowed') {
				echo NotePopup('Not allowed, Upgrade your plan.', '2');
			}
		
		}	
		
	
	} else {
		
		echo NotePopup('Please login first', '2');
		
	}
	
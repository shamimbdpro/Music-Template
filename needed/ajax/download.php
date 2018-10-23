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
	
	if(isset($member['id']) || !empty($member['id'])) {
		
		$member = GetMember($_SESSION['membername']);
		
		if (isset($_GET['id']) &&  isset($_GET['type']) && isset($_GET['target']) ) {
			
			$action_class->userID = $member['id'];
			$action_class->itemID = $_GET['id'];
			$action_class->itemType = $_GET['type'];
			$media_class->updateType = $_GET['type'];
			
			if  ( $_GET['target'] == 'download_media') {
				
				$media = getMedia($_GET['id']);
				
				if (is_array($media)) {
					
					if ($media['type'] == '1') {$folder = 'media/audio/' ;} 
					if ($media['type'] == '2') {$folder = 'media/videos/';} 
					if ($media['type'] == '3') {$folder = 'media/photos/';} 
							
							
					if ($media['frametype'] == 'local' && $media['allow'] == '1' && $media['paid'] == '0') {
	
						$link = dirname( dirname(__FILE__) ).'/'.$folder.$media['content'];
									
						$ext = explode('.', $media['content']);
									
						if (file_exists($link) && is_file($link)) {
						
						    header('Content-Description: File Transfer');
						    header('Content-Type: application/octet-stream');
						    header('Content-Disposition: attachment; filename="'.$media['title'] .'_' . $Setting['sitename'].'.'.end($ext).'"');
						    header('Expires: 0');
						    header('Cache-Control: must-revalidate');
						    header('Pragma: public');
						    header('Content-Length: ' . filesize($link));
						    readfile($link);
						    exit;
						}

						header("Content-Disposition: attachment; filename=".$media['title'] .'_' . $Setting['sitename'].'.'.end($ext));
						
					} elseif ($media['frametype'] == 'local' && $media['paid'] == '1') {
						
						$check_paid = $action_class->checkPaid();
						
						if (isset($check_paid['id'])) {

							$link = dirname( dirname(__FILE__) ).'/'.$folder.'premium/'.$media['link'];
									
							$ext = explode('.', $media['content']);
									
							if (file_exists($link) && is_file($link)) {

							    header('Content-Description: File Transfer');
							    header('Content-Type: application/octet-stream');
							    header('Content-Disposition: attachment; filename="'.$media['title'] .'_' . $Setting['sitename'].'.'.end($ext).'" ');
							    header('Expires: 0');
							    header('Cache-Control: must-revalidate');
							    header('Pragma: public');
							    header('Content-Length: ' . filesize($link));
							    readfile($link);
							    exit;
							
							} else {
								
								header("Location: ".$CONF['url'] . "media/".$media['id']." ");
							
							}
							
						} else {
							header("Location: ".$CONF['url'] . "media/".$media['id']." ");
						}
						
						
					} else {
					
						header("Location: ".$CONF['url'] . "media/".$media['id']." ");
						
					}
				}
			}
		} 
		
		
	} else {
	
		echo NotePopup('Please login first.', 2);
	
	}
	
		
?>
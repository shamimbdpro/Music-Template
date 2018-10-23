<?php
// error_reporting(0);

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
	
	
	//--------------------
	// Check requirements 
	//--------------------

	if (isset($_GET['media']) && isset($_GET['type'])) {
		
		$_media = $db->real_escape_string( $_GET['media'] );
		$_type = $db->real_escape_string( $_GET['type'] );

		$media = getMedia($_media);
		
		if (!empty($media)) {

			if ($media['type'] == '1') {$folder = 'media/audio/' ;} 
			if ($media['type'] == '2') {$folder = 'media/videos/';} 
							
			if ($media['frametype'] == 'local' && $media['paid'] == '0') {
	
				$extension = "mp3";
				$mime_type = "audio/mpeg";
	
				$link = dirname( dirname(__FILE__) ).'/'.$folder.$media['content'];
								
				$ext = explode('.', $media['content']);
									
				if (file_exists($link) && is_file($link)) {

					// echo $link;
				    
					$m = new SWFMovie();
					$m->setRate(12.0);
					$m->streamMp3(file_get_contents($link));
					// use your own MP3

					// The file is 11.85 seconds at 12.0 fps = 142 frames
					$m->setFrames(142);

					header('Content-type: application/x-shockwave-flash');
					$m->output();

				// 	  header('Content-type: {$mime_type}');
				//    header('Content-length: ' . filesize($link));
				//    header('Content-Disposition: filename="' . $media['title'].'.mp3');
				//    header('X-Pad: avoid browser bug');
				//    header('Cache-Control: no-cache');
				//    readfile($link);

				} else {

				    header("HTTP/1.0 404 Not Found");
				}

			} else {
				echo 02;
			}
		
		} else {
			echo 01;
		}

	} else {
		
		echo NotePopup('Error! : Not allowed', 2);
		
	}


?>
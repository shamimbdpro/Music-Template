<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	if (isset($_GET['id'])) {
		
		$query_type = MediaNameToNumber($_GET['id']);
		$img_type = MediaNameToNumberImg($_GET['id']);
		
		$rows = $FullAdmin->loadMedia($query_type);  $output = '';
		
		if (!empty($rows) && is_array($rows)) {
				
			$tpl = new Template("./administrator/tpl/media_item.tpl");	
			$tpl->set("pagename", $_GET['id']);
			$tpl->set("sitename", $Setting['sitename']);
			$tpl->set("url", $CONF['url']);
			$tpl->set("path", $CONF['path']);
			
			foreach ($rows as $row) {
			
				$media = $row;
				$tpl->set("id", $row['id']);
				$cat = $FullAdmin->getCategory($row['cat']);
				$user = $FullAdmin->GetMember($row['author']);
				if ( $row['publish'] == 0 ) { $tpl->set("ban_media", "check"); $tpl->set("ban_title", "Enable"); } else {$tpl->set("ban_media", "ban"); $tpl->set("ban_title", "Disable");} 
				$tpl->set("name", $user['name']);
				$tpl->set("name", $user['name']);
				$tpl->set("realname", $user['realname']);
				$tpl->set("title", substr($row['title'], 1, 40));
				$tpl->set("title_full", $row['title']);
				$tpl->set("pic", $user['pic']);
				$tpl->set("thumbs", $row['thumbs']);
				$tpl->set("cat", $cat['title']);
				$tpl->set("img_type", MediaNameToNumberImg($_GET['id']));
				
				$output .= $tpl->output();
			}
			$output .= '<button id="load-more" data-id="'.$media['id'].'" data-require="more_media" data-type="'.$query_type.'" class="fluid ui button">Load more...</button> ' ;
		}
		
		//-----------------------
		// Require template file
		//-----------------------	
		$profile = new Template("./administrator/tpl/media.tpl");	
		$profile->set("media", $output );
		$profile->set("pagename", $_GET['id']);
		$profile->set("sitename", $Setting['sitename']);
		$profile->set("url", $CONF['url']);
		$profile->set("path", $CONF['path']);
		$profile->set("cat_type", $query_type);
	
	} else {
		$profile = new Template("./administrator/tpl/error.tpl");	
		$profile->set("Message", 'Page not found' );
	}	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
	
	
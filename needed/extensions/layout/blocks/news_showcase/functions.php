<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	// Posts list
	function load_news_showcase_posts($query , $options ,  $main_tpl ,   $post_tpl) {
		
		// Options array list
		// 0- $show_image
		// 1- $show_date
		// 2- $show_likes
		// 3- $show_comments
		// 4- $show_author
		// 5- $show_readmore
		
		global $CONF, $db;
		
		$posts = ''; $other_posts = '';
		
		$FullAdmin = new FullAdmin;
		
		$FullAdmin->db = $db;
		
		
		if (isset($query)) {	
			
			foreach ($query as $key => $value) {
				
				if ($value['author'] == 0) { $author = $FullAdmin->getAdmin($value['admin']);} else { $author = $FullAdmin->GetMember($value['author']);} 
				
				if (!empty($options[0])) {$date = $value['time']; $date_icon = '<i class="fa fa-calendar"></i>';} else {$date = ''; $date_icon =''; }
				if (!empty($options[2])) {$date = $value['time']; $date_icon = '<i class="fa fa-calendar"></i>';} else {$date = ''; $date_icon =''; }
				if (!empty($options[3])) {$comments = get_comments_count($value['id']); $comments_icon = '<i class="fa fa-comment"></i>';} else {$comments = ''; $comments_icon =''; }
				if (!empty($options[4])) {$author = $author['name']; $author_icon = '<i class="fa fa-user"></i>';} else {$author = ''; $author_icon =''; }
				if (!empty($options[5])) {$more = '<a class="read" href="post/'.$value['id'].'">Read More</a>'; } else {$more = ''; }
				if (!empty($options[1])) {$date = ago(strtotime($value['time'])); $date_icon = '<i class="fa fa-calendar"></i>';} else {$date = ''; $date_icon =''; }
				
				if ($key == '0') {
					
					$cat = $FullAdmin->getCategory($value['cat']);
					
					$main_tpl->set("url", $CONF['url']);
					$main_tpl->set("id", $value['id']);
					$main_tpl->set("cat_title", $cat['title']);
					$main_tpl->set("content", $value['content']);
					$main_tpl->set("title", $value['title']);
					$main_tpl->set("link", 'post/'.$value['id']);
					$main_tpl->set("img", $value['photo']);
					$main_tpl->set("more", $more);
					$main_tpl->set("author", $author);
					$main_tpl->set("author_icon", $author_icon);
					$main_tpl->set("comments", $comments);
					$main_tpl->set("comments_icon", $comments_icon);
					
					$main_tpl->set("date", $date);
					$main_tpl->set("data_icon", $date_icon );
				} else {
					
					$post_tpl->set("url", $CONF['url']);
					$post_tpl->set("id", $value['id']);
					$post_tpl->set("title", $value['title']);
					$post_tpl->set("content", $value['content']);
					$post_tpl->set("link", 'post/'.$value['id']);
					$post_tpl->set("img", $value['photo']);
					$post_tpl->set("more", $more);
					$post_tpl->set("author", $author);
					$post_tpl->set("author_icon", $author_icon);
					$post_tpl->set("comments", $comments);
					$post_tpl->set("comments_icon", $comments_icon);
					
					$post_tpl->set("date", $date);
					$post_tpl->set("date_icon", $date_icon );
					
					$other_posts .= $post_tpl->output();
				}
			}
					$main_tpl->set("posts", $other_posts);
					$posts .= $main_tpl->output();
					
			return $posts;
		}
	}
	

	// Categories list
	function load_news_showcase_cats($query ,  $id = null) {
			
		$cats = '';
		
		if (isset($query)) {	
			
			foreach ($query as $value) {
			
				if ($value['id'] == $id) {$active = 'selected';} else  {$active = '';} 
				
				$cats .= '<option value="'.$value['id'].'" '.$active.'>'.$value['title'].'</option>';
				
			}
			return $cats;
		}
	}
	

	// Get order by	list
	function load_news_showcase_orders($order = null) {
			
		$output = '';
		
		$orders = array( 
							'desc' => 'Latest first',
							'asc' => 'Old first'
						);
						
		foreach ($orders as $key => $value) {
			
			if ($key == $order) {$active = 'selected';} else  {$active = '';}
			
			$output .= '<option value="'.$key.'" '.$active.'>'.$value.'</option>';
				
		}
				
		return $output;
		
	}
	 	
	 
	// Get Styles	list
	function load_news_showcase_styles($order = null) {
			
		$output = '';
		
		$orders = array( 
							'style1' => 'Style 1',
							'style2' => 'Style 2',
							'style3' => 'Style 3',
							'style4' => 'Style 4',
							'style5' => 'Style 5'
						);
						
		foreach ($orders as $key => $value) {
			
			if ($key == $order) {$active = 'selected';} else  {$active = '';}
			
			$output .= '<option value="'.$key.'" '.$active.'>'.$value.'</option>';
				
		}
				
		return $output;
		
	}
	 	
	 
<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	// Get posts	
	function grid_posts($query , $tpl) {
			
		global $CONF;
			
		$posts = '';
		if (isset($query)) {	
			
			foreach ($query as $row) {
				
				$tpl->set("url", $CONF['url']);
				$tpl->set("id", $row['id']);
				$tpl->set("title", $row['title']);
				$tpl->set("img", $row['photo']);
				$posts .= $tpl->output();
					
			}
			return $posts;

		}
	}
	 
	 
	// Get cats	
	function load_posts_cats($query ,  $id = null) {
			
		$cats = '';
		
		if (isset($query)) {	
			
			foreach ($query as $value) {
			
				if ($value['id'] == $id) {$active = 'selected';} else  {$active = '';} 
				
				$cats .= '<option value="'.$value['id'].'" '.$active.'>'.$value['title'].'</option>';
				
			}
			return $cats;
		}
	}
	 
	// Get active order by	
	function load_posts_order($order = null) {
			
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
	 
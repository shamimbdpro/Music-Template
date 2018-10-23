<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	// Get Menu [ Front-end]	
	function load_pages_v_menu($menu_array) {
		
		global $db, $CONF;
		
		$FullAdmin = new FullAdmin;
		$FullAdmin->db = $db;
		
		
		$out = ''; 
		
		
		
		for ($i = 0; $i <= count($menu_array); $i++) {
			
			if (!empty($menu_array[$i]['id'])) {
			
				$page_data = $FullAdmin->getPage($menu_array[$i]['id']);
				
				if (isset($page_data['prefix']) AND $page_data['prefix'] !== 'blog' ) {$page_link = 'pages/'. $page_data['prefix']; } else {$page_link = $page_data['prefix']; }
				
				if (isset($menu_array[$i]['children'])) {$class = 'has-sub';} else {$class = '';}
					
				$out .=  '<li id="menu-' . $menu_array[$i]['id'] .'" ><a data-ajax="true" href="' . $CONF['url'] . $page_link . '" class="auto"><i class="fa fa-angle-right text-xs"></i><span>'. $page_data['title'] .'</span></a></li>';
					
				if (isset($menu_array[$i]['children'])) {
						
					$children = $menu_array[$i]['children'];
					
					$out .='<ul class="nav dk text-sm"><li id="menu-' . $menu_array[$i]['id'] .'" class="'.$class.'" ><a data-ajax="true" href="' . $CONF['url'] . $page_link . '" class="auto"><span>'. $page_data['title'] .'</span></a></li></ul>';					
					foreach ($children as $key => $ch_val) {
							
						$child_data = $FullAdmin->getPage($ch_val['id']);
				
						$out .=  '<li class="" id="menu-' . $child_data['id'] .'"> <a data-ajax="true" href="' . $CONF['url'] . $child_data['prefix'] .'"> '. $child_data['title'] .' </a> </li>';
						
					}
						$out .=  '</ul>';
				} 
				$out .= '</li>';
			}
		}
		return $out;
	}
	 
	// Get Menu [ Back-end ]	
	function load_pages_v_menu_admin($menu_array) {
		
		global $db;
		
		$FullAdmin = new FullAdmin;
		
		$FullAdmin->db = $db;
		
		$out = ''; 
		
		for ($i = 0; $i <= count($menu_array); $i++) {
			
			if (!empty($menu_array[$i]['id'])) {
			
				$page_data = $FullAdmin->getPage($menu_array[$i]['id']);
				
				if (isset($menu_array[$i]['children'])) {$class = 'has-sub';} else {$class = '';}
					
				$out .=  '<li class="ui-state-default btn btn-default" id="menu-' . $menu_array[$i]['id'] .'" draggable="true" ondragstart="drag(event)"> <div>'. $page_data['title'] .'</div><span class="remove_item"><i class="fa fa-trash"></i></span>';
					
				if (isset($menu_array[$i]['children'])) {
						
					$children = $menu_array[$i]['children'];
						
					foreach ($children as $key => $ch_val) {
							
						$child_data = $FullAdmin->getPage($ch_val['id']);
				
						$out .=  '<ol>
						<li class="ui-state-default btn btn-default" id="menu-' . $child_data['id'] .'" draggable="true" ondragstart="drag(event)"> <div> '. $child_data['title'] .' </div> <span class="remove_item"><i class="fa fa-trash"></i></span></li></ol>';
						
					}
				} 
				$out .= '</li>';
			}
		}
		return $out;
	}
	 
	 
	// Get Menu [ Back-end ]	
	function disbled_menu_items_admin($pages , $menu_array = null) {
		
		global $db;
		
		$FullAdmin = new FullAdmin;
		
		$FullAdmin->db = $db;
		
		$out = ''; 
		
		if (empty($menu_array)) {
		
			foreach ($pages as $page) {
				$out .='<li class="ui-state-default btn btn-default" id="menu-'.$page['id'].'" draggable="true" ondragstart="drag(event)" ><div>'.$page['title'].' </div></li>';
			}
		
		} else {
			
			$menus  = array();
			
			foreach ($menu_array as $menu) {
				
				if (!empty($menu['id'])) { 
					
					array_push($menus , $menu['id']);
					
					if (isset($menu['children'])) {
						
						foreach ($menu['children'] as $ch_val) {
								
							array_push($menus , $ch_val['id']);
							
						}
					} 
				}	
			}
			
			foreach ($pages as $page) {
				
				if (!in_array($page['id'], $menus)) {
					
					$out .='<li class="ui-state-default btn btn-default" id="menu-'.$page['id'].'" draggable="true" ondragstart="drag(event)" ><div>'.$page['title'].' </div> <span class="remove_item"><i class="fa fa-trash"></i></span></li>';
				
				}
			}
		}
		return $out;
	}
	 
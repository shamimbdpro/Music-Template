<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	// Get latest	
	function load_icons($query , $tpl) {
			
		$icons = '';
		
		if (isset($query)) {	
			
			foreach ($query as $key => $value) {
				if (!empty($value)) {
					$icons .= '<li><a href="'.$value.'" class="'.$key.'" data-title="'.$key.'" target="_blank"><i class="fa fa-'.$key.'"></i> '.$key.' </a></li>';
				}	
			}
			return $icons;
		}
	}
	 
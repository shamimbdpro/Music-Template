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
	function portfolio_posts($query , $tpl) {
			
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
	 
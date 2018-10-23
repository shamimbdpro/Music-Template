<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------
	// Load info file
	//-----------------
	require_once('../../../../classes/configuration.php');
	require_once('../../../../classes/functions.php');
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;
	
	$tpl = new Template("content.tpl");	
	
	$post_content = $FullAdmin->getPost($_POST['id']);
	
	get_post_ajax($post_content, $tpl);
	
	// Get post by ajax
	function get_post_ajax($post_content, $tpl) {
	
		global $CONF;
		
		if (isset($post_content)) {	
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("id", $post_content['id']);
			$tpl->set("title", $post_content['title']);
			$tpl->set("img", $post_content['photo']);
			$posts = $tpl->output();
			
			echo $posts;

		} else {
		
			echo 1;
		
		}
	}
	
	
	
	
	
	 
	 
	 
	
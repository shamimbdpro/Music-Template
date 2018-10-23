<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	//--------------------------
	// Setting data 
	//--------------------------
	$SetSetting = new FullAdmin();
	$SetSetting->db = $db;
	$Setting = $SetSetting->siteSetting();
	
	
	//--------------------------
	// @Params Require any page
	//--------------------------
	if (isset($_GET['name'])) {$pagename = $_GET['name'];} else {$pagename = '';}
	
	$PAGEDATA = pages_query_per_prefix($pagename);
	
	if (empty($PAGEDATA)) {$PAGEDATA = page_query_home();}
	
	if (isset($_POST['ajax_load']) && $_POST['ajax_load'] == 'true' && $Setting['enable_ajax'] == 1) {	
		
		 require_once('./templates/'.$PAGEDATA['template'].'/ajax.php');
		
	} elseif (!empty($PAGEDATA) || $PAGEDATA['template'] == $Setting['template']) {
		
		 include('./templates/'.$PAGEDATA['template'].'/main.php');
	
	} else {
		
		 include('./templates/'.$Setting['template'].'/main.php');
	}
	
	
?>
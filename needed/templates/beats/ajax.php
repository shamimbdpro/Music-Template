<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	//-----------------------
	// Detect required 
	//-----------------------	
	require_once("functions.php");
	
	require_once($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/configuration.php");
	
	require_once("route.php");
	
	$layout = new Template("./templates/".$Setting['template']."/layouts/ajax.tpl");
	
	$layout->set("content", $content);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return $layout->output();
	
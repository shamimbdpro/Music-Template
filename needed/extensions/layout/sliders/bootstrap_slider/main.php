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
	require_once($PLUGIN_PATH."/info.php");
	require_once($PLUGIN_PATH."/functions.php");

	$guery_plugin = get_plugin($PLUGIN_NAME);
	
	$tpl = new Template($PLUGIN_PATH."/main.tpl");		
	
	$slide = new Template($PLUGIN_PATH."/slide.tpl");		
	
	$get_hook = get_hook_id($PLUGIN_ID);
		
	$bootstrap_slider = unserialize($get_hook['content']);
		
	$query_slider = $bootstrap_slider['options'];
	
	if (isset($bootstrap_slider['options']['arrows'])) {
		
		$arrows = '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left" ></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right" ></i>
					<span class="sr-only">Next</span>
				</a>';
		
	} else { $arrows = '';}
	
	if (isset($bootstrap_slider['options']['max'])) {$interval = $bootstrap_slider['options']['max'];} else { $interval = '5000';}
	
	$view = load_slides_func(unserialize($get_hook['content'])['options'] , $slide);
	
	add_head_css( 'load_head', $PLUGIN_PATH . "/slider.css" );
	
	//-----------------------
	// Require template file
	//-----------------------
	$plugin = new Template($PLUGIN_PATH."/main.tpl");
	$plugin->set("plugin_path", str_replace('./' , '' , $PLUGIN_PATH));
	$plugin->set("interval", $interval);
	$plugin->set("arrows", $arrows);
	$plugin->set("content", $view);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return  $plugin->output();
	
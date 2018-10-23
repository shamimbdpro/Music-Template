<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	/*///////////////////////
	 Setting data 
	///////////////////////*/
	$id = is_numeric($_GET['id']) ? $_GET['id'] : '0';

	$plans = '';
	$access = '';

	$item = new Template("./administrator/tpl/plans/access.tpl");

	// Get Plan info
	$dbaser->where(' id ', $id);
	$plan_query = $dbaser->ObjectBuilder()->getOne(' plans ');
		

	$access_list = $dbaser->ObjectBuilder()->get(' plan_access ');

	foreach ($access_list as $query) {
		
		$cur_value = Plans::planAccess($id, $query->access);	

		$item->set('id', $query->id);
		$item->set('title', $query->title);
		$item->set('access', $query->access);
		$item->set('value', isset($cur_value->value) ? $cur_value->value : '');
		$access .= $item->output();
	}
	

	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/plans/plan.tpl");
	$profile->set("pagename", "Plan access list");
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("id", $plan_query->id);
	$profile->set("title", $plan_query->title);
	$profile->set("access", $access);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
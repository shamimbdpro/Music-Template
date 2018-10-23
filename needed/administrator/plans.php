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
	$FullAdmin = new FullAdmin();
	$FullAdmin->db = $db;
	$allAdmins = $FullAdmin->AllAdmins();
	
	$plans = '';

	$item = new Template("./administrator/tpl/plans/item.tpl");

	// Get Plans list [ All ]
	$plans_query = $dbaser->ObjectBuilder()->get(' plans ');
	
	foreach ($plans_query as $query) {
		
		foreach ($query as $key => $value) {
			$item->set($key, $value);
		}

		$plans .= $item->output();
	}
	

	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/plans/all.tpl");
	$profile->set("pagename", "View all plans");
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("plans", $plans);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
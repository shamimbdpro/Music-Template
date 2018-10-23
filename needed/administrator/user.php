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
	$view = '';

	if (isset($requiredID)) {
		
		$users_tpl  = 'user.tpl';

		$dbaser->where("id", $requiredID);
		$row = $dbaser->getOne ("members");

		if (empty($row['id'])) {
			return NotFound();
		}

		//-----------------------
		// Require template file
		//-----------------------
		$profile = new Template("./administrator/tpl/users/".$users_tpl);
		$profile->set("pagename", "View all users");
		$profile->set("sitename", $Setting['sitename']);
		$profile->set("url", $CONF['url']);
		$profile->set("path", $CONF['path']);
		$profile->set("member_checked", option_toChecked($row['publish']));
		if (is_array($row)) {
			foreach ($row as $key => $value) {
				$profile->set($key, $value);
			}
		}
		$profile->set("permissions", option_toChecked($row['permissions']));
		
		//------------------------------------------------------------
		// Loads our layout template, settings its title and content.
		//------------------------------------------------------------
		return $profile->output();
		
	}	
	
?>
<?php
error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['nameAdmin']) && $_SESSION['nameAdmin'] ) {
	
		/*///////////////////////
		 Setting data 
		///////////////////////*/
		$FullAdmin = new FullAdmin();
		$FullAdmin->db = $db;
		
		$Members = new Members();
		$Members->db = $db;
		
		// Get setting meta
		$Setting = $FullAdmin->siteSetting();
		
		// Get administrators levels [ Select ] 
		$levels_select = $FullAdmin->adminsLevelsSelect();
			
		if (!empty($_POST['require'])) {
			
			$required = $_POST['require'];

			if (isset($_POST['id'])) {
			
				if (isset($_POST['type'])) { $type = $_POST['type'];} else {$type = '';}
				
				$id = $_POST['id'];
					
				// Get administrator data to edit
				$adminData = $FullAdmin->getAdmin($id);
					
				// Get User data to edit
				$memberData = $Members->GetMember($id);
					
				// Get administrator level data to edit
				$adminLevel = $FullAdmin->adminsLevels($id);
					
				// Get Page to edit
				$adminPages = $FullAdmin->getPage($id);
				
				// Get Category to edit
				$adminCats = $FullAdmin->getCategory($id);
				
				// Get Plans to edit
				$getPlans = Plans::getPlan($id);
								
			} else {
				$id = '';
				$type = '';
			}
		}
			
	
		//-----------------------
		// Require template file
		//-----------------------
		$profile = new Template("../tpl/forms/".$required.".tpl");
		$profile->set("url", $CONF['url']);
		$profile->set("form_type", $required);
		
		// Administrators values
		$profile->set("id", $id);
		$profile->set("levels", $levels_select);
		$profile->set("fullname", $adminData['fullname']);
		$profile->set("username", $adminData['name']);
		$profile->set("email", $adminData['email']);
		$profile->set("checked", option_toChecked($adminData['publish']));
		
		// Memebers values
		$profile->set("member_id", $id);
		$profile->set("member_levels", $levels_select);
		$profile->set("member_fullname", $memberData['realname']);
		$profile->set("member_username", $memberData['name']);
		$profile->set("member_email", $memberData['email']);
		$profile->set("member_checked", option_toChecked($memberData['publish']));
		
		// Levels values
		$profile->set("level_id", $adminLevel['id']);
		$profile->set("level_title", $adminLevel['title']);
		$profile->set("level_acc_view", option_toChecked($adminLevel['account_view']));
		$profile->set("level_acc_edit", option_toChecked($adminLevel['account_edit']));
		$profile->set("level_set_edit", option_toChecked($adminLevel['edit_setting']));
		$profile->set("level_msg", option_toChecked($adminLevel['bulk_msg']));
		
		$profile->set("templates_select", query_Templates_select() );
		
		// Pages values
		$templates = query_current_template();
		$profile->set("page_id", $adminPages['id']);
		$profile->set("page_title", $adminPages['title']);

		$profile->set("page_template", checkTemplate($adminPages['template'] , get_Templates_array()));
		$profile->set("page_layout", check_current_select($adminPages['layout'] , $templates , 'layouts'));
		$profile->set("page_content", $adminPages['content']);
		$profile->set("page_prefix", $adminPages['prefix']);
		$profile->set("page_keywords", $adminPages['keywords']);
		$profile->set("page_desc", $adminPages['desc']);
		$profile->set("page_publish", option_toChecked($adminPages['publish']));
		
		// Cats values
		$profile->set("cat_id", $adminCats['id']);
		$profile->set("cat_title", $adminCats['title']);
		$profile->set("cat_link", $adminCats['url']);
		$profile->set("cat_type", $type);
		$profile->set("cats_select", list_options_active(null , $FullAdmin->loadCats(0) , $adminCats['id']));
		$profile->set("cat_mother", list_options_active($adminCats['mother'] , $FullAdmin->loadCats(0) , $adminCats['id']));
		$profile->set("media_cat_mother", list_options_active($adminCats['mother'] , $FullAdmin->loadCats($type) , $adminCats['id']));
		$profile->set("media_cats_select", list_options_active(null , $FullAdmin->loadCats($type) , $adminCats['id']));
		$profile->set("cat_publish", option_toChecked($adminCats['publish']));
		
		// Plans values
		$profile->set("plan_id", isset($getPlans->id) ? $getPlans->id : '');
		$profile->set("plan_title", isset($getPlans->title) ? $getPlans->title : '');
		$profile->set("plan_cost", isset($getPlans->cost) ? $getPlans->cost : '');
		$profile->set("plan_period", isset($getPlans->period) ? $getPlans->period : '');
		$profile->set("plan_paid", isset($getPlans->paid) ? option_toChecked($getPlans->paid) : '');
		
		// Plugins list
		$profile->set("plugins_list", get_plugins_select());
		
		// Plugins list
		$profile->set("media_library", media_library());
		
		//------------------------------------------------------------
		// Loads our layout template, settings its title and content.
		//------------------------------------------------------------
		echo $profile->output();
		
	} else {
		
		echo 'Login first';
		
	}
	
	
?>
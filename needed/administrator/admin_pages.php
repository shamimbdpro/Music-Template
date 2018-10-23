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
	// Require template file
	//-----------------------
	if (isset($_GET['id'])  ) {
		
		$parent_pages = $dbaser->get('admin_pages', null, " admin_pages.id as id, admin_pages.title as title ");

		$id = $dbaser->escape($_GET['id']);
		$dbaser->where('id', $id);
		$admin_page = $dbaser->getOne('admin_pages', null, " * ");
		
		if ( $_GET['id'] == 'new' ) {
			
			$profile = new Template("./administrator/tpl/admin_pages/new.tpl");
			$profile->set("id", '' );
			$profile->set("title", '' );
			$profile->set("link", '' );
			$profile->set("icon", '' );
			$profile->set("sort", '' );
			$profile->set("active", 'checked' );
			$profile->set("linkable", 'checked' );
			$profile->set("appear", 'checked' );
			$profile->set("parent", list_options_active(null , $parent_pages , null) );
			$profile->set("sendto", send_event_to() );
			$profile->set("form_type", 'new_admin_page' );
			$profile->set("state", 'checked' );
			
		} elseif (isset($event)  &&  is_numeric($_GET['id'])) {
		
			$profile = new Template("./administrator/tpl/admin_pages/new.tpl");
			$profile->set("id", $event['id'] );
			$profile->set("title", $event['title'] );
			$profile->set("content", $event['content'] );
			$profile->set("date", $event['date'] );
			$profile->set("form_type", 'edit_event' );
			$profile->set("starttime", $event['starttime'] );
			$profile->set("endtime", $event['endtime'] );
			$profile->set("sendto", send_event_to($event['sendto']) );
			$profile->set("state", option_toChecked($event['state']) );
		} else {
			$profile = new Template("./administrator/tpl/error.tpl");
			$profile->set("Message", 'event id not found' );
			
		}
		
	} else {
		
		$rows = $dbaser->get("admin_pages", null, " * ");
		$output = '';
		
		if (isset($rows)) 
		{
			foreach ($rows as $event) {

				$item = new Template("./administrator/tpl/admin_pages/item.tpl");
		
				$item->set("id", $event['id'] );
				$item->set("title", $event['title'] );
				$item->set("full", $event['content'] );
				$item->set("date", $event['date'] );
				$item->set("time", $event['starttime'].' : '.$event['endtime'] );
				$item->set("state", !empty($event['state']) ? 'Published' : 'Draft' );
		
				$output .= $item->output();
				
			}
		}
	
		
		$profile = new Template("./administrator/tpl/admin_pages/all.tpl");
		$profile->set("pages_list", $output );
	}
	
	$profile->set("pagename", 'Show all pages ');
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
function send_event_to($value = null) {

	$data = array(
				0 => array(
					"id"=> "all",	
					"title"=> "ALl"),
				1 => array(		
					"id"=> "st",	
					"title"=> "Students"	
				),
				2 => array(		
					"id"=> "pa",	
					"title"=> "Parents"	
				),
				3 => array(		
					"id"=> "te",	
					"title"=> "Teachers"	
				),
				4 => array(		
					"id"=> "dr",	
					"title"=> "Drivers"	
				)
			);

	return list_options_active($value , $data , null);
}	

function get_admin() {
	
}
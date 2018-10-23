<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\


	
function load_hooks() {
	
	global $dbaser;
		
	$return =  $dbaser->get(' hooks ');

	return $return;
}

	
function update_hook($link) {
	
	global $dbaser;

	$status = get_plugin($link);
	
	if ($status['status'] == 0) {$set = 1;} else {$set = 0;}
			
	$data = array('status' => $set);

	$dbaser->where('link', $link);
	$return = $dbaser->update('plugins', $data);
	
	return $return;
}

function get_hook_link($link = null) {
	
	global $dbaser;
		
	$dbaser->where('link', $link);
	$return =  $dbaser->getOne(' plugins ');

	return $return;
	
}

function get_hook_id($id) {
	
	global $dbaser;
		
	$dbaser->where('id', $id);
	$return =  $dbaser->getOne(' hooks ');

	return $return;
	
}

function display_hooks_position($page , $template , $position) {

	global $dbaser, $db, $CONF , $Setting, $member;
		
	$dbaser->where('template', $template);
	$dbaser->where('position', $position);
	$dbaser->orderBy(' `order` ', 'DESC');
	$query_plugins =  $dbaser->get(' hooks ');

	$output = array();
	
	if (is_array($query_plugins)) {
		
		$i = -1;
		
		foreach ($query_plugins as $key => $row) {
			
			$i++;

			if ($row['publish'] == 1) {
		
				$pages = unserialize($row['pages']);
				
				if (in_array($page , $pages) || in_array( 'ALL', $pages)) {
					
					$plugin = load_plugin_files($row['plugin']);
					
					if (is_file($plugin.'/main.php')) {

						$PLUGIN_NAME = $row['plugin'];
						$PLUGIN_PATH = $plugin;
						$PLUGIN_ID = $row['id'];
						
						$output[$i]['title'] = $row['title'];
						$output[$i]['content'] = include($plugin.'/main.php');
					}
					
				}
			}
		}
		return $output;
	}
}



function list_plugins_array($query) {
		
	global $CONF, $db;
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;
	$Setting = $FullAdmin->siteSetting();
	
	$output = ''; 
	
	if (isset($query['title'])) {unset($query['title']);}
	
	if (is_array($query)) {
		
		foreach  ($query as $plugin) {
			
			$output .= $plugin['content'];
		}
		
	} else {
		$output .= $query;
	}
	
	return $output;

}



function load_site_plugins($query, $tpl) {
		
	global $CONF, $db;
	
	$FullAdmin = new FullAdmin;
	$FullAdmin->db = $db;
	$Setting = $FullAdmin->siteSetting();
	
	$output = ''; 
	
	if (is_array($query)) {
		
		
		foreach  ($query as $key => $value) {
			
			$code = _plugins_shortcode($value['content']);
			
			$tpl->set("url", $CONF['url']);
			$tpl->set("title", $value['title'] );
			$tpl->set("content", $code );
			$output .= $tpl->output();
		
		}
	}
	return $output;
}






function _plugins_shortcode_filter($val) {
	
	//
	// Plugin shortcode 
	// 
	// [--@plugin= Plugin Name --@id= Plugin ID --]
	//
	
	preg_match_all("|\[--@plugin=(.*)\--@id=(.*)\--](.*)</[^>]+>|U", $val, $matches, PREG_PATTERN_ORDER);	
	
	return $matches;
	
}


function _plugins_shortcode($val) {
	
	global  $db, $CONF;
	
	//
	// Plugin shortcode 
	// 
	// [--@plugin= Plugin Name --@id= Plugin ID --]
	//
	
	$matches = _plugins_shortcode_filter($val);	
	
	if (!empty($matches[1][0])) {
				
		$code_val = $matches[0][0];
		
		$hook = load_plugin_files($matches[1][0]);
					
		$PLUGIN_NAME = $matches[1][0];
		
		$PLUGIN_PATH = $hook;
		
		$PLUGIN_ID = $matches[2][0];
					
		$code = include($hook.'/main.php');
					
		$content = str_replace($code_val, $code, $val);
			
	}	else {
		
		$content = $val;
	
	}		
	return  $content;
}

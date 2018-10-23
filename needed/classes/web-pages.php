<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\


function pages_query($status = null) {
	
	global $dbaser;

	if (isset($status)) {
		$dbaser->where('publish', $status);
	}
	
	$return = $dbaser->get('pages');

	return $return;
	
}

function pages_list_select() {

	$output = '';	
	
	$rows = pages_query('1');
	
	if (!empty($rows)) {	
	
		foreach ($rows as $row) {
		
			$output .= '<option value="'.$row['id'].'"> '.$row['title'].' </option>';
		}
	}
	
	return $output;
} 

function loadPages() {
	
	global $CONF, $db;
	
	$rows = pages_query(1);
	
	if (isset($rows)) {	
	
		return $rows;
	
	}	else {
	
		return 'No pages found';
	
	}
	
}


function pages_query_per_template($template, $status = null) {
	
	global $dbaser;

	if (isset($status)) {
		$dbaser->where('publish', $status);
	}
	
	$dbaser->where('template', $template);
	
	$return = $dbaser->get('pages');

	return $return;
}


function pages_query_per_prefix($prefix) {

	global $dbaser, $db;

	if (isset($status)) {
		$dbaser->where('publish', $status);
	}
	
	$dbaser->where('prefix', $prefix);
	
	$return = $dbaser->getOne('pages');

	return $return;
}

function page_query_home() {
	
	global $dbaser, $db;

	$dbaser->where('home', 1);
	
	$return = $dbaser->getOne('pages');

	return $return;
}

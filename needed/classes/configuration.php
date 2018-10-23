<?php
session_start();

/* //////////////////////////////////
@Params Errors display
///////////////////////////////////*/
// error_reporting(0);
error_reporting(E_ALL);


//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\


	/* //////////////////////////////////
	@Params Alternative MYSQLI class
	///////////////////////////////////*/
	require_once('dbaser.php');
	
	/* //////////////////////////////////
	@Params MYSQL data
	///////////////////////////////////*/
	$CONF['host'] = '127.0.0.1';
	$CONF['user'] = 'root';
	$CONF['pass'] = '';
	$CONF['name'] = 'client1';
	
	// The Installation URL
	$CONF['url'] = 'http://localhost/client/';
	
	// The main path (if installed at root type '/' else type '/[foldername]/' )
	$CONF['path'] = '/client/' ;
	

	/////////////////////////////////////////////////////////
	// Don't Change them if you don't understand below lines
	/////////////////////////////////////////////////////////

	// The Full path 
	$CONF['full_path'] = $_SERVER['DOCUMENT_ROOT'] . $CONF['path'];
	
	// The plugins path 
	$CONF['plugins'] = './extensions/layout/';
	
	$mysqli = new mysqli($CONF['host'], $CONF['user'], $CONF['pass'], $CONF['name']);

	if (!empty($mysqli->connect_errno) ) {

		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; die();

	} elseif (empty($CONF['url']) || empty($CONF['path'])) {

		echo "Check your configuration url and Path:"; die();

	} else {

		$db = $mysqli;

		// Alternative mysql class for faster queries
		$dbaser = new MysqliDb ($mysqli);
	}

	$db->set_charset("utf8");
	
?>
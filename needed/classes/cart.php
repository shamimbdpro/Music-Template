<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class cart 
{	

	public $db;
	public $userID;
	public $userName;
	public $itemID;
	public $itemType;
	public $itemName;
	
	
	
	
	//***********************
	// Likes functions
	//***********************
	function checkPaid()
	{	
		
		global $dbaser;
		
		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$dbaser->where('state', 1);
		$return =  $dbaser->get(' cart ');

		return $return;
	}
	
	function checkCart()
	{			
		global $dbaser;
		
		$dbaser->where('user', $this->userID);
		$dbaser->where('state', 0);
		$return =  $dbaser->get(' cart ');

		return $return;
		
	}
	
	function checkDownloads()
	{	
			
		global $dbaser;
		
		$dbaser->where('user', $this->userID);
		$dbaser->where('state', 1);
		$return =  $dbaser->get(' cart ');

		return $return;
		
	}
	
}




















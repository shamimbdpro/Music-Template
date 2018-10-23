<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class search 
{	

	public $db;
	public $searchID;
	public $searchTitle;
	public $searchType;
	public $searchNum;
	
	
	function searchMedia()
	{	
		global $dbaser;

		$title = $this->db->real_escape_string($this->searchTitle);

		$dbaser->orderBy(' id ', 'DESC');

		$dbaser->where(" title LIKE '%$title%' ");
		$dbaser->where(' type ', $this->searchType);
		$dbaser->where(' publish ', 1);
		$return = $dbaser->get(' media ', $this->searchNum);
		
		return $return;
		
	}
	
	function searchPlaylist()
	{	
		
		global $dbaser;

		$title = $this->db->real_escape_string($this->searchTitle);

		$dbaser->orderBy(' id ', 'DESC');

		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}

		$dbaser->where(" title LIKE '%$title%' ");
		$return = $dbaser->get(' playlist ', $this->searchNum);
		
		return $return;
		
	}
	
	function searchAlbum()
	{	
		
		global $dbaser;

		$title = $this->db->real_escape_string($this->searchTitle);

		$dbaser->orderBy(' id ', 'DESC');

		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}
		
		$dbaser->where(" title LIKE '%$title%' ");
		$return = $dbaser->get(' albums ', $this->searchNum);
		
		return $return;
		
	}
	
	function searchUser()
	{	
		
		global $dbaser, $db;

		$title = $this->db->real_escape_string($this->searchTitle);

		$dbaser->orderBy(' id ', 'DESC');
		$dbaser->where(" name LIKE '%$title%' ");
		$dbaser->where(' publish ', 1);
		
		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}
		
		$dbaser->orWhere(" realname LIKE '%$title%' ");
		$dbaser->where(' publish ', 1);
		
		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}
		
		$return = $dbaser->get(' members ', $this->searchNum);
		
		return $return;
		
	}
	
	function searchPost()
	{	
		
		global $dbaser;

		$title = $this->db->real_escape_string($this->searchTitle);

		$dbaser->orderBy(' id ', 'DESC');
		$dbaser->where(" title LIKE '%$title%' ");
		
		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}
		
		$dbaser->orWhere(" content LIKE '%$title%' ");

		if (!empty($this->searchID)) { $dbaser->where(' id ', $this->searchID, ' < ');}

		$return = $dbaser->get(' posts ', $this->searchNum);
		
		return $return;
		
	}
	
	
	
}













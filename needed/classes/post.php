<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class post
{	

	public $db;
	public $postID;
	public $postsNum;
	public $postCat;
	public $postTitle;
	public $catPrefix;
	public $userID;
	public $userName;
	public $userNum;
	
	function getPosts()
	{	
		global $dbaser;

		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('publish', 1);
		$return = $dbaser->get(' posts ', $this->postsNum);
		
		return $return;
		
	}

	
	function getMorePosts()
	{	
		global $dbaser;

		$dbaser->orderBy('id', 'DESC');

		$dbaser->where('publish', 1);
		$dbaser->where('id', $this->postID, '<');
		if (!empty($this->postCat)) { $dbaser->where('cat', $this->postCat); }
		
		if (!empty($this->postTitle)) { 

			$title = $this->db->real_escape_string($this->postTitle);
			$dbaser->where(" title LIKE '%$title%' ");
			$dbaser->orWhere(" content LIKE '%$title%' ");
			$dbaser->where('id', $this->postID, '<');
			$dbaser->where('publish', 1);
		}

		$return = $dbaser->get(' posts ', $this->postsNum);

		return $return;
		
	}

	function getPost()
	{	
		global $dbaser;

		$dbaser->where('id', $this->postID);
		
		$return = $dbaser->getOne(' posts ');

		return $return;
		
	}
	
	function getUserPosts()
	{	
		
		global $dbaser;

		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('publish', 1);
		$dbaser->where('id', $this->postID);
		$dbaser->where('author', $this->userID);
		
		$return = $dbaser->get(' posts ', $this->postsNum);

		return $return;
	}
	
	function getLatestUserPosts()
	{	
		
		global $dbaser;

		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('publish', 1);
		$dbaser->where('id', $this->postID);
		$dbaser->where('author', $this->userID);
		
		$return = $dbaser->get(' posts ', $this->postsNum);

		return $return;
	}
	
	function getPostsCategories()
	{	
		
		global $dbaser;

		$dbaser->where('publish', 1);
		$dbaser->where('type', 0);
		$return = $dbaser->get(' cats ', $this->postsNum);

		return $return;
	}

	function getCatPrefix()
	{	
		
		global $dbaser;

		$dbaser->where('url', $this->db->real_escape_string($this->catPrefix));
		$return = $dbaser->getOne(' cats ');

		return $return;
		
	}

	function getCatPosts()
	{	

		global $dbaser;

		$limit = empty($this->postsNum) ? '4' : $this->postsNum; 

		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('publish', 1);
		$dbaser->where('cat', $this->postCat);
		
		$return = $dbaser->get(' posts ', $limit);

		return $return;		
	}

	function countCategoryPosts()
	{	
	
		global $dbaser;

		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('publish', 1);
		$dbaser->where('cat', $this->postCat);
		
		$return = $dbaser->get(' posts ', null, 'id');

		return count($return);		
	
	}

	
}













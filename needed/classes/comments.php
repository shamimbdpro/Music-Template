<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class comments 
{	

	public $db;
	public $userID;
	public $userName;
	public $commentID;
	public $commentType;
	public $commentTypeID;
	
	
	
	//***********************
	// Queries functions
	//***********************
	function getComment()
	{			
		global $dbaser;
		
		$dbaser->where('id', $this->commentID);
		$dbaser->where('seen', 0);
		return  $dbaser->getOne(' comments ');

	}
	
	function getItemComments()
	{			
		global $dbaser;
		
		$dbaser->where('type', $this->commentType);
		$dbaser->where('type_id', $this->commentTypeID);
		$return = $dbaser->get(' comments ');

		return $return;
		
	}
	
	function getUserComments()
	{	
		global $dbaser;
		
		$dbaser->where('type', $this->commentType);
		$dbaser->where('type_id', $this->commentTypeID);
		$dbaser->where('user', $this->userID);
		$return = $dbaser->get(' comments ');

		return $return;
		
	}
	
}	
	
	
function update_comment($id, $comment) {
	
	global $db;
	
	$id = $db->real_escape_string($id);
	
	$comment = filter_html_tags($db->real_escape_string($comment));
	
	$status = get_comment($id, $user);
	
	if ($status['publish'] == 0) {$set = 1;} else {$set = 0;}
	
	$query = sprintf("UPDATE `comments` SET `comment` = '%s' WHERE `id` = '%s' ", $comment, $id );
	
	$do = $db->query($query);
	
	if ($do) {return 1;} 
		
}

function get_comment($id, $user = null) {

	global $dbaser;
		
	$dbaser->where('id', $id);
	$return = $dbaser->getOne(' comments ');
	
	return $return;
	
}

function get_last_comment($type = null, $type_id = null) {

	global $dbaser;
		
	$dbaser->where('type_id', $type_id);
	$dbaser->where('type', $type);
	$return = $dbaser->getOne(' comments ');

	return $return;
	
}

function get_page_comments($type_id = null, $type = null) {

	global $dbaser;
		
	$dbaser->where('type_id', $type_id);
	$dbaser->where('type', $type);
	$return = $dbaser->get(' comments ');

	return $return;
	
}

function view_comments_form($tpl = null, $type_id, $type) {
	
	global $db, $CONF, $Setting, $LANG_ARRAY;
	
	if (isset($_SESSION['membername']))
	{
		
	}
	
	if ($Setting['comments'] == 1) 
	{
		
		//-----------------------------------------
		// Set custom form TPL or get default form
		//-----------------------------------------
		if ( isset($tpl)) {
			
			$layout = $tpl;
		
		} else {
			
			$layout = new Template("./assets/_tpl/comment_form.tpl");
		}
		
		if (isset($_SESSION['membername']))
		{
			$user = GetMember($_SESSION['membername']);
			
			$layout->set('userlink', $CONF['url'] . 'user/'. $user['name']);
			$layout->set('pic', $CONF['url'] . 'image.php?src='. $user['pic'] .'&w=80&h=80&img=ch');
			$layout->set('disabled', '');
		
		} else {
				
			$layout->set('pic', $CONF['url'] . 'image.php?src=default.png&w=80&h=80&img=ch');
			$layout->set('disabled', 'disabled');
		
		}
		
		$layout->set('type_id', $type_id);
		$layout->set('type', $type);
		
		return $layout->output();
		
	}	else {
	
		return ViewMessage($LANG_ARRAY['LANG_DIS_COMMENTS']);
	}
}



function view_comments_list($tpl = null, $id, $type) {
	
	global $db, $CONF, $Setting, $LANG_ARRAY;
	
	
	$user_class = new user();
	$user_class->db = $db;
	
	$output = '';
	
	if ($Setting['comments'] == 1) {
		
		//--------------------------------------------------
		// Set custom form TPL or get default comments list
		//--------------------------------------------------
		if ( isset($tpl)) {
			$layout = $tpl;
		} else {
			$layout = new Template("./assets/_tpl/comments_list.tpl");
		}
		
		$query = get_page_comments($id, $type);
		
		if (is_array($query) && !empty($query)) {	
			
			$layout->set('comments_count', count($query));
			
			foreach($query as $row)	 {
				
				$user_class->userID = $row['user'];
				$user = $user_class->getUser_ID();
				
				
				
				$layout->set('url', $CONF['url']);
				$layout->set('comment', $row['comment']);
				$layout->set('user_name', $user['name']);
				$layout->set('user_realname', $user['realname']);
				$layout->set('comment_date', ago(strtotime($row['time'])));
				$layout->set('user_img', $CONF['url'].'image.php?src='.$user['pic'].'&w=150&h=150&img=ch');
				$output .= $layout->output();
			}
		
		}	else {
		
			$output = $LANG_ARRAY['LANG_NO_COMMENTS'];
		}
		
		return $output;
		
	}	else {
	
		return '';
	}
	
}


function get_comments_count($post = null) {

	global $dbaser;
		
	$dbaser->where('type_id', $post);
	$return = $dbaser->get(' comments ');

	return count($return);

}

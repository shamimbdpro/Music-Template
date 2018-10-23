<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class action 
{	

	public $db;
	public $userID;
	public $userName;
	public $itemID;
	public $itemType;
	public $itemName;
	public $itemCover;
	
	
	
	
	//***********************
	// Likes functions
	//***********************
	function checkLike()
	{	
		
		global $dbaser;

		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$return = $dbaser->get(' `like` ');

		return count($return);
	}
	
	function itemLike()
	{	
		global $dbaser;

		$dbaser->where('id', $this->itemID);
		$check_result = $dbaser->getOne(' `'.$this->itemType.'` ');

		if ($this->itemType == 'media') {$user = $check_result['author'];} else {$user = $check_result['user']; }
		
		$data = array('type' => $this->itemType, 'type_id' => $this->itemID, 'user'=> $this->userID);
		
		$add_query = $dbaser->insert(' `like` ', $data);
		
		if($add_query )	{

			if($user > $this->userID || $user < $this->userID) {
				add_notification($user, '1', $this->db->real_escape_string($this->itemID), $this->db->real_escape_string($this->itemType));
			}

			$return = 1;
		
		} else {
			
			$return = '0';
		
		}
		
		return $return;
	}
	
	
	function itemUnLike()
	{	
		global $dbaser;
		
		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$delete = $dbaser->delete(' `like` ');
		
		if ($delete) {

			$dbaser->where('item', $this->itemType);
			$dbaser->where('type_id', $this->itemID);
			$dbaser->where('sender', $this->userID);
			$dbaser->delete(' `notifications` ');
			
			return $del;
		}
	}
	
	function itemDelete()
	{	
		global $dbaser;


		$dbaser->where('id', $this->itemID);
		$dbaser->where('user', $this->userID);

		$result = $dbaser->getOne(' `'.$this->itemType.'` ');

		if(isset($result['id'])) { 
			

			$dbaser->where('id', $result['id']);
			$dbaser->delete(' `'.$this->itemType.'` ');

			$set = updateTblVal($result['type'], $result['type_id'], $this->db->real_escape_string($this->itemType) . ' = ' . $this->db->real_escape_string($this->itemType) . '  - 1 ');

			$id = $result['id'];	

			deleteTblParams('notifications', " `item` = '$this->itemType' AND `type_id` = '$id' ");
			deleteTblParams('comments', " `type` = '$this->itemType' AND `type_id` = '$id' ");
			
			if ($set) {$return = 1;} else { $return = '0';}
			
		} else {$return = '0';}
		
		return $return;
	}
	
	
	//***********************
	// Follow functions
	//***********************
	function checkFollow()
	{	
		global $dbaser;

		$dbaser->where('target', $this->itemID);
		$dbaser->where('user', $this->userID);
		$result = $dbaser->get(' `follow` ');
		
		return !empty($result) ? count($result) : '0';
	}
	
	function userFollow()
	{	
		global $dbaser;

		$dbaser->where('id', $this->itemID);
		$result = $dbaser->getOne(' members ');

		updateTblVal(' members ', $this->itemID, ' followers = followers + 1 ');
		
		if(isset($result['id'])) { 

			$data = array('target' => $this->itemID, 'user'=> $this->userID);
			$add_query = $dbaser->insert(' `follow` ', $data);

			if($add_query) { 

				updateTblVal(' members ', $this->userID, ' following = following + 1 ');
				add_notification($this->db->real_escape_string($this->itemID), '3', '0', 'follow');
								
				$return = '1';
				
			} else {$return = '0';}
			
		} else {$return = 'User not found';}
		
		return $return;
	}
	
	
	function userUnFollow()
	{	
		global $dbaser;

		$dbaser->where('target', $this->itemID);
		$dbaser->where('user', $this->userID);		
		$result = $dbaser->getOne(' follow ');
	
		updateTblVal(' members ', $this->itemID, ' followers = followers - 1 ');
	
		if(isset($result['id'])) { 
			
			$dbaser->where('target', $this->itemID);
			$dbaser->where('user', $this->userID);
			$unfollow = $dbaser->delete(' follow ');
			
			if ($unfollow) {
				
				updateTblVal(' members ', $this->userID, ' following = following - 1 ');

				$dbaser->where('item', 'follow');
				$dbaser->where('user', $this->itemID);
				$dbaser->where('sender', $this->userID);
				$dbaser->delete(' notifications ');
				
				return 1;
			}
			
		} else {return 'User not found';}
		
	}
	
	
	//***********************
	// Cart functions
	//***********************
	function checkPaid()
	{	

		global $dbaser;

		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('state', 1);
		$dbaser->where('user', $this->userID);
		$return = $dbaser->getOne(' cart ');
		
		return $return;
	}
	
	function itemAddToCart()
	{	

		global $dbaser, $LANG_ARRAY;

		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$result = $dbaser->getOne(' cart ');
		
		if(isset($result['id'])) { 
				
			if(empty($result['state'])) { 
				return $LANG_ARRAY['LANG_BOUGHT_BEFORE'];
			} else {
				return $LANG_ARRAY['LANG_AT_CART'];
			}

		} else {

			$data = array('type' => $this->itemType, 'type_id' => $this->itemID, 'user'=> $this->userID);
			return $dbaser->insert(' cart ', $data);

		}
	}
	
	function itemRemoveFromCart()
	{	
		global $dbaser;
	
		$return =  1;
	
		$dbaser->where('type', $this->itemType);
		$dbaser->where('type_id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$dbaser->delete(' cart ');

		return $return;
	}
	
	function addCredit()
	{	

		global $dbaser;

		$return =  1;

		$data = array('method' => $this->itemType, 'value' => $this->itemID, 'user'=> $this->userID);
		$dbaser->insert(' payment ', $data);

		return $return;
	}
	
	
	//***********************
	// Playlist functions
	//***********************
	function userAddToPlaylist()
	{	

		global $dbaser, $LANG_ARRAY;

		$dbaser->where('user', $this->userID);
		$result = $dbaser->getOne(' playlist ');

		if(isset($result['id'])) { 

			$return =  1;
			$data = array('media' => $this->itemType, 'playlist' => $this->itemID, 'user'=> $this->userID);
			$dbaser->insert(' playlist_items ', $data);
				
		} else {$return = $LANG_ARRAY['LANG_NO_PLAYLIST'];}
		
		return $return;
	}
	
	function userAddPlaylist()
	{	
		global $dbaser;

		$return =  1;

		$dbaser->where('url', $this->itemType);
		$result = $dbaser->getOne(' playlist ');
	
		$url = !empty($result['id']) ? $this->db->real_escape_string($this->itemType) : $this->itemType . '_' . rand(10, 99); 

		$data = array('title' => $this->itemID, 'url' => strtolower($url), 'user'=> $this->userID, 'public'=> '1');
		$insert = $dbaser->insert(' playlist ', $data);
		
		if ($insert) {
			return $return;
		}	
	}
	
	
	function userAddAlbum()
	{	

		global $dbaser;

		$return =  1;

		$dbaser->where('url', $this->itemType);
		$result = $dbaser->getOne(' albums ');
	
		$url = !empty($result['id']) ? $this->db->real_escape_string($this->itemType) : $this->itemType . '_' . rand(10, 99); 

		$data = array('title' => $this->itemID, 'url' => strtolower($url), 'user'=> $this->userID, 'cover'=> $this->itemCover);
		$dbaser->insert(' albums ', $data);
			
		return $return;
	}
	
	
	
	function userDelFromPlaylist()
	{	
		global $dbaser;
	
		$return =  1;
	
		$dbaser->where('playlist', $this->itemID);
		$dbaser->where('user', $this->userID);
		$dbaser->delete(' playlist_items ');
		
		return $return;
	}
	
	
	function userDeletePlaylist()
	{	
		global $dbaser;
	
		$dbaser->where('id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$delete = $dbaser->delete(' playlist ');
		
		if($delete) { 
	
			$return =  1;

			$dbaser->where('playlist', $this->itemID);
			$dbaser->where('user', $this->userID);
			$dbaser->delete(' playlist_items ');
			
			deleteTblParams('notifications', " `item` = 'playlist' AND `type_id` = '$this->itemID' ");
			deleteTblParams('comments', " `type` = 'playlist' AND `type_id` = '$this->itemID' ");
			
		} else {$return = '0';}
		
		return $return;
	}
	
	
	function userDeleteAlbum()
	{	
		
		global $dbaser;

		$dbaser->where('id', $this->itemID);
		$dbaser->where('user', $this->userID);
		$delete = $dbaser->delete(' albums ');

		if($delete) { 

			$return = 1;
			
			deleteTblParams('notifications', " `item` = 'albums' AND `type_id` = '$this->itemID' ");
			deleteTblParams('comments', " `type` = 'albums' AND `type_id` = '$this->itemID' ");
			
				
		} else {$return = '0';}
		
		return $return;
	}
	
	
	
	
	function getUserMedia()
	{	
		

		global $dbaser;

		$dbaser->where('author', $this->userID);
		$result = $dbaser->get(' media ');

		return $return;
		
	}
	
}




















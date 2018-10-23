<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class notifications 
{	

	public $dbaser;
	public $userID;
	public $senderID;
	public $itemID;
	public $itemType;
	public $itemName;
	public $message;
	public $itemSeen;
	public $itemLast;
	
	
	
	
	//***********************
	// Notifications functions
	//***********************
	function counts()
	{	
		global $dbaser;
		
		$dbaser->where('user', $this->userID);
		$dbaser->where('seen', 0);
		$return =  $dbaser->get(' notifications ');

		return count($return);
	}
	
	
	function check_latest()
	{	
		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->orderBy('id', 'DESC');
		$return = $dbaser->get(' notifications ', 10);

		return $return;
	}
	
	
	function check()
	{	
		global $dbaser;

		$result = '';

		if (!empty($this->itemLast)) {
			$dbaser->where(' `id` ', $this->itemLast, ' > ');
			
		}
		
		$dbaser->where(' user ', $this->userID);
		$dbaser->where(' seen ', 0);
		$result = $dbaser->get(' notifications ');
		
		return $result;
	}
	
	function check_old()
	{	
		global $dbaser;
		
		$dbaser->where(' user ', $this->userID);
		$dbaser->where(' sender ', $this->senderID);
		$dbaser->where(' type ', $this->itemType);
		$dbaser->where(' type_id ', $this->itemID);
		$dbaser->where(' item ', $this->itemName);
		
		$return = $dbaser->get(' notifications ');
	
		return $return;
	}
	
	function add()
	{	
		global $dbaser;
		
		$check = $this->check_old();
		
		if (empty($check)) {
			
			$data = array(
				'item' => $this->itemName,
				'type' => $this->itemType,
				'type_id' => $this->itemID,
				'user' => $this->userID,
				'sender' => $this->senderID,
			);

			$return = $dbaser->insert('notifications', $data);

			return $return;
		}
	}
	
	function seen()
	{	
		global $dbaser;
			
		$data = array('seen' => 1);

		$dbaser->where('user', $this->userID);

		$return = $dbaser->update('notifications', $data);
		
		return $return;
		
	}
	
	function display()
	{	
		global $CONF;
			
		$query = queryTbl($this->itemName, $this->itemID);
		$sender = $this->senderID;
		$url = $this->itemID;
		$time = '';
		
		$user_url = '<a data-ajax="true" href="'.$CONF['url'].'user/' . $this->senderID['name'] . '"> ' . $this->senderID['realname'] . '</a>';
		
		$note_name = $this->itemName;

		if ($this->itemSeen == '0') {
			$seen = ' btn-dark ';
		} else {$seen = '';}
		
		if ($this->itemName == 'media') {
			$path = $query['id'];
		} elseif ($this->itemName == 'playlist') {
			$path = $this->userID['name'] . '/' . $query['url'];
		} elseif ($this->itemName == 'albums') {
			$note_name = 'album';
			$path = $this->userID['name'] . '/' . $query['url'];
		} else {
			$path = '';
		}
			
		if ($this->itemType == 1) {
			
			$url = $CONF['url'] . $this->itemName . '/' . $path;
			$text = $user_url . ' liked your ' . $note_name . ' <a data-ajax="true" href="'.$CONF['url']. $this->itemName . '/' . $path . '">' . $query['title'] . '</a>' ;
			
		} elseif ($this->itemType == 2) {
			$url = $CONF['url'] . $this->itemName . '/' . $path;
			$text = $user_url . ' commented on your ' . $note_name . '  <a data-ajax="true" href="'.$CONF['url']. $this->itemName . '/' . $path . '">' . $query['title'] . '</a>' ;
			
		} elseif ($this->itemType == 3) {
			$url = $CONF['url'] . $this->itemName . '/' . $path;
			$text = $user_url . ' is following you now ' ;

		} elseif ($this->itemType == 4) {
			
			$url = $CONF['url'] . $this->itemName . '/' . $path;
			$text = $user_url . ' bought your ' . $note_name . ' <a data-ajax="true" href="'.$CONF['url']. $this->itemName . '/' . $path . '">' . $query['title'] . '</a>' ;
		} elseif ($this->itemType == 5) {
			
			$url = $CONF['url'] . $this->itemName . '/' . $path;
			$text = $user_url . ' Your withdrawal request is submitted, and we are working on it now.';
		}
		
		$return = '
                  <div class="media list-group-item '.$seen.'">
                    <span class="pull-left thumb-sm">
                      <img src="'.$CONF['url'].'image.php?src='.$sender['pic'].'&w=100&h=100&img=ch" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none ">
                      '.$text.'<br>
                      <small class="text-muted">'.$time.'</small>
                    </span>
                  </div>';
				  
		return $return;
	}
	
}




















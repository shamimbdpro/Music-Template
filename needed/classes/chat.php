<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class chat 
{	

	public $db;
	public $userID;
	public $senderID;
	public $message;
	public $messageID;
	public $messageType;
	public $messageState;
	
	
	
	
	//***********************
	// Likes functions
	//***********************
	function counts()
	{	
		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('seen', 0);
		$return = $dbaser->get(' chat ');

		return count($return);

	}
	
	function check_block()
	{	
	
		global $dbaser;

		$dbaser->where('blocker', $this->userID);
		$dbaser->where('blocked', $this->senderID);
		$return = $dbaser->get(' block ');

		return $return;
	}
	
	function check()
	{	
		
		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('seen', 0);
		$return = $dbaser->get(' chat ');

		return $return;

	}
	
	function lastMessage()
	{	

		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('sender', $this->senderID);
		$dbaser->orWhere('sender', $this->userID);
		$dbaser->where('user', $this->senderID);
		$dbaser->orderBy('date', 'DESC');
		$return = $dbaser->getOne(' chat ');

		return $return;
	}
	
	function appendNewChat()
	{	

		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('sender', $this->senderID);
		$dbaser->where('seen', 0);
		$return = $dbaser->get(' chat ');

		return $return;
	}
	
	function lastSentMessage()
	{	
	
		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('sender', $this->senderID);
		$dbaser->orderBy('date', 'DESC');
		$return = $dbaser->get(' chat ', 1);

		return $return;
	}
	
	
	function check_old_chat()
	{

		global $dbaser;

		$dbaser->where('user', $this->userID);
		$dbaser->where('sender', $this->senderID);
		$dbaser->orWhere('sender', $this->userID);
		$dbaser->where('user', $this->senderID);
		$dbaser->orderBy('id', 'ASC');
		$return = $dbaser->get(' chat ');

		return $return;
	}
	
	
	function check_old_users()
	{	
	
		global $dbaser;
		
		$dbaser->join('chat', 'chat.user = members.id');
		$dbaser->where('chat.user', $this->userID);
		$dbaser->where('members.id', $this->userID, ' != ');
		$dbaser->orWhere('chat.sender', $this->userID);
		$dbaser->groupBy('members.id');
		$dbaser->orderBy('chat.id', 'DESC');
		$return = $dbaser->get(' members ', 10, ' members.* ');

		return $return;
	}
	
	function check_my_messages()
	{	
		
		$query = sprintf("SELECT `members`.* FROM `chat`,`members` WHERE `chat`.`user` = '%s' AND `chat`.`sender` = `members`.`id` AND `members`.`id` != '$this->userID'
		OR `chat`.`sender` = '%s' AND `chat`.`user` = `members`.`id`  AND `members`.`id` != '$this->userID' group by `members`.`id` ORDER BY `chat`.`id` DESC LIMIT 10",
		$this->userID, $this->userID);        					
		
		$result = $this->db->query($query);
		
		$return = '';
		
		if(isset($result->num_rows))	
		{	
			while ($row = $result->fetch_assoc()) {
				$return = array($row);  
			}
		
		} else { $return = '0'; }
		
		return $return;
	}
	
	function add()
	{	
		$check = $this->check_block();
		
		if (empty($check)) {
			
			$query = $this->db->query(sprintf("INSERT INTO `chat` (`message`,`user`,`sender`) VALUES ('%s','%s','%s') ", $this->db->real_escape_string($this->message), $this->userID, $this->senderID));
			
			if($query){ $return = 1;} else {$return = '0';}
			
		} else {$return = '0';}
		
		return $return;
	}
	
	function set_message_seen()
	{	
		
		$query = sprintf("UPDATE `chat` SET `seen` = '1', `date` = `date` WHERE `user` = '%s' AND `sender` = '%s' ", $this->userID, $this->senderID);        					
		
		$result = $this->db->query($query);
		
		if($result)	
		{	
			$return = '1';
		
		} else { $return = '0'; }
		
		return $return;
	}
	
	
	function display_msg()
	{	
		global $CONF;
		
		if ($this->itemSeen == '0') {
			$seen = ' btn-dark ';
		} else {$seen = '';}
		
		$user = $this->userID;
		$text = substr($this->message, 0, 30);
		
		$return = '
				  <a href="'.$CONF['url'].'chat/' . $user['name'] . '" data-title="'.$user['name'].'" data-ajax="true">
                  <div class="media list-group-item '.$seen.'">
                    <span class="pull-left thumb-sm">
                      <img src="'.$CONF['url'].'image.php?src='.$user['pic'].'&w=100&h=100&img=ch" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      '.$user['realname'].'<br>
                      <small class="text-muted">'.$text.'</small>
                    </span>
                  </div></a>';
				  
		return $return;
	
	}
}




















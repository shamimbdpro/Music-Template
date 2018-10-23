<?php
// error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	require_once('../classes/configuration.php');
	require_once('../classes/functions.php');

	if(isset($member['id']) ) {
		
		$mytpl = new Template("../templates/".$Setting['template']."/layouts/chat/chat_my_msg.tpl");
		$usertpl = new Template("../templates/".$Setting['template']."/layouts/chat/chat_user_msg.tpl");

		if (isset($_POST['message']) AND isset($_POST['user']) AND isset($_POST['type'])) {
				
			if ($_POST['type'] == 'send-message') {
			
					
				$chat_class->senderID = $member['id'];
				$chat_class->userID = $_POST['user'];
				$chat_class->message = $_POST['message'];
				$Do = $chat_class->add();
				
				if(!empty($Do)) {
					
					$message = $chat_class->lastSentMessage();
					echo query_chat_list($message , $usertpl, $mytpl);
					
				} else {
				
					echo NotePopup('You can not send messages to this user', 2);
				
				}
				
			} elseif ($_POST['type'] == 'get-message') {
				
				$chat_class->userID = $member['id'];
				$chat_class->senderID = $_POST['user'];
				$Do = $chat_class->check_old_chat();
				
				if(is_array($Do)) {
					echo query_chat_list($Do , $usertpl, $mytpl);
				}	
				
			} elseif ($_POST['type'] == 'see-message') {
				
				$chat_class->userID = $member['id'];
				$chat_class->senderID = $_POST['user'];
				$chat_class->set_message_seen();
							
			}
			
		} elseif (isset($_GET['message']) AND isset($_GET['to']) AND isset($_GET['type']) AND $_GET['type'] == 2) {
			
			$Do = sendMessage($_GET['to'], $_GET['message']);
			
			if($Do == '1') {
				
				echo lastChatMessage(null);
				
			} elseif ($Do == '2') {
			
				echo NotePopup('You can not send messages to this user');
			
			}
			
		} elseif (isset($_POST['type']) && $_POST['type'] == 'apppend-message')  {

					
			$chat_class->userID = $member['id'];
			$chat_class->senderID = $_POST['user'];
			$Do = $chat_class->appendNewChat();
			
			if(is_array($Do)) {

				$chat_class->userID = $member['id'];
				$chat_class->senderID = $_POST['user'];
				$chat_class->set_message_seen();
				
				echo query_chat_list($Do , $usertpl, $mytpl);
			}	
		}

	} else {
	
		echo NotePopup('Please login first.');
	
	}
	
		
?>
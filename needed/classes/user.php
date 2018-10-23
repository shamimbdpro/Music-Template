<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class user 
{	

	public $db;
	public $dbaser;
	public $userID;
	public $userName;
	public $userNum;
	public $userData;
	
	public $userType;

	function getUser()
	{	

		global $dbaser;

		$dbaser->where(' name ', $this->db->real_escape_string($this->userName));
		$return = $dbaser->getOne(' members ');
		
		return $return;
		
	}

	function getUser_ID()
	{	

		global $dbaser;

		$dbaser->where(' id ', $this->db->real_escape_string($this->userID));
		$return = $dbaser->getOne(' members ');
		
		return $return;
		
	}

	
	function getLatestUsers()
	{	

		global $dbaser;

		$dbaser->orderBy(' `id` ', 'desc');
		$dbaser->where(' publish ', 1);
		$return = $dbaser->get(' members ', 20);
		
		return $return;
		
	}

	
	function getTopUsers()
	{	

		global $dbaser;

		$dbaser->orderBy(' `id` ', 'desc');
		$dbaser->groupBy(' `id` ');
		isset($this->userID) ? $dbaser->where(' `id` ', $this->db->real_escape_string($this->userID), ' != ') : '';
		$return = $dbaser->get(' members ', 20);
		
		return $return;
		
	}
	
	public static function getCustomUsers($list = null)
	{	

		global $dbaser;

		if (!empty($list)) {
			$dbaser->where(' id ', $list, 'IN');
		}

		$return = $dbaser->get(' members ', null, 'members.id, members.realname as title');
		
		return $return;
		
	}
	
	
	
	
	//***********************
	// Edit functions
	//***********************
	function editUser() 
	{
		global $dbaser;

		$ok = '';
		
		$update_data  = array();
		
		$data = $this->userData;
		
		$id = $this->db->real_escape_string($data['user_id']);
		$user_realname = $this->db->real_escape_string($data['user_full_name']);
		$user_name = $this->db->real_escape_string($data['user_name']);
		$user_email = $this->db->real_escape_string($data['user_email']);
		$update_data['info'] = $this->db->real_escape_string($data['user_info']);
		$update_data['gender'] = $this->db->real_escape_string($data['user_gender']);
		$update_data['facebook'] = $this->db->real_escape_string($data['user_facebook']);
		$update_data['twitter'] = $this->db->real_escape_string($data['user_twitter']);
		$update_data['google'] = $this->db->real_escape_string($data['user_google']);
		$update_data['youtube'] = $this->db->real_escape_string($data['user_youtube']);
		$update_data['instagram'] = $this->db->real_escape_string($data['user_instagram']);
		$update_data['country'] = $this->db->real_escape_string($data['user_country']);
		
		

		if ($user_email == '0') {	
				
			$email = "  ";	 $ok = 1;
			
		} elseif ($user_email !== 0 && filter_var($user_email, FILTER_VALIDATE_EMAIL) == false) {
		
			$error = 'Please choose valid Email address';
			
		}  elseif (empty($user_email) || $this->verify_if_user_exist($id, $user_name, $user_email) == '1') {
			
			$error = 'Username or Email already found';
		
		} elseif (isset($user_email) && $this->verify_if_user_exist($id, $user_name, $user_email) == '2') {
			
			$update_data['email'] = $user_email; 
			$update_data['name'] = $user_name; 
			$ok = 1;
			
		} else {
			
			$error = $this->verify_if_user_exist($id, $user_name, $user_email);
		}
		
		if(!empty($user_realname)) {

			$update_data['realname'] = $user_realname; 
		
			$ok = 1;
		}
			
		if(isset($data['user_pic']) ) {
			
			$update_data['pic'] = $data['user_pic']; 
			
		}
		
		if(!empty($data['user_password_edit']) ) {
			
			$pass = $this->db->real_escape_string($data['user_password_edit']);
			
			if($data['user_password_edit'] == $data['user_password_confirm'] ) {
				
				if(strlen($pass) > 6 ) {
				
					$pass = md5($pass);
		
					$update_data['pass'] = $pass; 
					
					$ok = 1;
				
				} else {
					$error = 'Password must be at least 7 letters or numbers ';
				}
			
			} else {
				$error = 'Password not matched ';
			}
			
		}
			
		if(isset($error)) {
			return $error;
		} else {
		
			if($ok == 1) {
				

				$dbaser->where('id', $id);
				$query = $dbaser->update('members', $update_data);
		
				if($query) {
			
					return 1;
				
				} else {
					
					return $this->db->error;
				
				}
					
			}
		}
		
	}
	
	
	
	function verify_if_user_exist($userID, $userName, $userEmail) {
		
		global $db, $dbaser;
		
		$regName = $db->real_escape_string($userName);
		
		$regMail = $db->real_escape_string($userEmail);
		
		$dbaser->where(' `id` ', $regName);
		$dbaser->where(' `id` ', $userID, '!=');
		$dbaser->orWhere(' `email` ', $regMail);
		$dbaser->where(' `id` ', $userID, '!=');
		$return = $dbaser->getOne(' members ', 'name, email');
		
		return is_array($return) ? 1 : 2;
	}
	
		
	public static function chanePW($userID, $data, $code, $recover_id) {
		
		global $db, $dbaser, $CONF;
		
		if (isset($data['recover_pass_confirm']) && isset($data['recover_pass'])) {
			
			if (strlen($data['recover_pass']) < 7) {
				
				$reply = array('msg' => NotePopup('Password must be at least 7 letters or numbers', 2) );

			} elseif ($data['recover_pass_confirm'] == $data['recover_pass'] && strlen($data['recover_pass']) > 6) {

				$dbaser->where('user', $userID);
				$dbaser->where('code', $code);
				$dbaser->where('id', $recover_id);
				$check_vrfy = $dbaser->ObjectBuilder()->getOne('recover_pass');
				
				if (!empty($check_vrfy->id)) {
					$info = array();
					$info['pass'] = md5($data['recover_pass']);
					$dbaser->where('id', $check_vrfy->user);
					$update = $dbaser->update('members', $info);

				
					if ($update) {
						
						$dbaser->where('user', $userID);
						$dbaser->delete('recover_pass');
						
						$reply = array('reload' => 1, 'url' => $CONF['url'].'account');			
		
					} else {
						$reply = array('msg' => NotePopup('Error try again', 2) );
					}
				}

			} elseif ($data['recover_pass_confirm'] !== $data['recover_pass']) {
				$reply = array('msg' => NotePopup('Password not matched', 2) );
			} else {
				$reply = array('msg' => NotePopup('Error', 2) );
			} 

		}	else {
			$reply = array('msg' => NotePopup('Insert your password', 2) );
		}

		return isset($reply) ? json_encode($reply) : ''; 
	}
	
	
	public static function forgotPW($email) {
		
		global $db, $dbaser, $CONF, $Setting;
		
		if (!empty($email)) {
			
			$dbaser->where('email', $email);
			$check_vrfy = $dbaser->ObjectBuilder()->getOne('members');
				
			if (!empty($check_vrfy->id)) {
				
				$rand = rand(500000000, 900000005 );

				$info = array();
				$info['code'] = $rand;
				$info['user'] = $check_vrfy->id;

				$update = $dbaser->insert('recover_pass', $info);
			
				if ($update) {
				
					$welcome_message = 'Recover your password at '. $Setting['sitename'].' 
					';
					$welcome_message .= ' Set your new password by clicking at this link: <a href="' . $CONF['url'].'forgot_pass&acc='.$check_vrfy->id.'&cd='.$rand.'"> ' . $CONF['url'].'forgot_pass&acc='.$check_vrfy->id.'&cd='.$rand.'</a>';

					sendHtmlMail($check_vrfy->email, 'Recover your password', $check_vrfy->realname, $welcome_message , '', 'mail');
								
					$reply = array('msg' => NotePopup('Check your email to recover your password.', 1));
				
				} else {
					$reply = array('msg' => NotePopup('Error try again', 2) );
				}

			} else {
				$reply = array('msg' => NotePopup('Your email not found', 2) );
			}


		}	else {
			$reply = array('msg' => NotePopup('Insert your password', 2) );
		}

		return isset($reply) ? json_encode($reply) : ''; 
	}
	
	
	
	//***********************
	// Counts functions
	//***********************
	function countUserFollowers()
	{	
	
		$count = $this->db->query(sprintf("SELECT `followers` FROM `members` WHERE `id` = '%s'", $this->db->real_escape_string($this->userID)));
		
		if ($count->num_rows > 0) {
			
			$return = $count->fetch_assoc();
			
			$return = $return['followers'];
			
		
		} else {
				
			$return = '0';
				
		}
		
		return $return;
	
	}
	
	function countUserMedia()
	{	
	
		$count = $this->db->query(sprintf("SELECT `id` FROM `media` WHERE `author` = '%s'", $this->db->real_escape_string($this->userID)));
		
		if (isset($count->num_rows)) {
			
			$return = $count->num_rows;
		
		} 
		
		return $return;
	
	}
	
	


	/////////////////////
	// Social login
	/////////////////////
	function socialLogin($name, $realname, $email, $emailVerified, $cover_url, $profile, $provider, $redirect) {

		global $CONF, $dbaser;
		
		$data = array();

		$data['name'] = $this->db->real_escape_string($name);
		$data['realname'] = $this->db->real_escape_string($realname);

		if (empty($email)) {
			$data['email'] = $this->db->real_escape_string($emailVerified);
		} else {
			$data['email'] = $this->db->real_escape_string($email);
		}
		
		if ($provider == "Twitter" || $provider == "twitter" ) {
		
			$data['twitter'] = $this->db->real_escape_string($profile);
		
		} elseif ($provider == "Facebook" || $provider == "facebook") {
			
			$data['facebook'] = $this->db->real_escape_string($profile);
		
		} elseif ($provider == "Google" || $provider == "google") {
			
			$data['google'] = $this->db->real_escape_string($profile);
		
		}
		
		// Check if logged in before
		$dbaser->where('name', $this->db->real_escape_string($name));
		$check = $dbaser->getOne('members');
		
		if (isset($check['id'])) {

			$logged = 1;
			
		} else {
			
			// Upload the cover 
			$dirpath = realpath(dirname(getcwd()));
			
			$cover = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.jpg';
						
			$local_file = $dirpath . $CONF['path'] ."media/channels/" . $cover;
								
			$remote_file = $cover_url; 

			$ch = curl_init();

			$fp = fopen ($local_file, 'w+');

			$ch = curl_init($remote_file);
									
			curl_setopt($ch, CURLOPT_TIMEOUT, 999999);
									
			curl_setopt($ch, CURLOPT_FILE, $fp);
									
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
									
			curl_setopt($ch, CURLOPT_ENCODING, "");
									
			curl_exec($ch);
									
			curl_close($ch);
									
			fclose($fp);
			
			$data['pic'] = $cover;
			$data['type'] = '1';
			$data['publish'] = '1';

			$query = $dbaser->insert('members', $data);

			if ($query) {
				$logged = 1;
			}		
		}	
		
		if ($logged == 1) {
				
				
			$_SESSION['membername'] = $name; 
			
			$_SESSION['start'] = time(); 
			
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
				
			header("Location: ".$CONF['url'].$redirect);
		
		}	else {
			
			header("Location: ".$CONF['url'].'account');
				
		}

	}
	
	
	
	
	
}













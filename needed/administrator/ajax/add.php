<?php
error_reporting(0);

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['nameAdmin'])) {$administrator = $_SESSION['nameAdmin'];} else {$administrator = '0';}
	
	if(isset($administrator) && $administrator !== '0' ) {
		
		$dbaser->where('name', $administrator);
		$admin_user = $dbaser->ObjectBuilder()->getOne('admins');

		$form_type = $dbaser->escape($_POST['form_type']);

		if (isset($_POST['publish'])) {$publish = $_POST['publish'];} else {$publish = '0';}
			
		if (isset($_FILES['photo'])) {$file = $_FILES['photo'];} else {$file = '1';}
		
		$admin = new FullAdmin();
				
		$admin->db = $db;
				
		if ($form_type == 'new_course') {

			unset($form_type, $_POST['type']);
			
			$id = $dbaser->insert ('courses', $_POST);
			if($id)
			    echo NotePopup('Successfully added '.$_POST['title'], 1);
			else
			    echo NotePopup('Error! ', 2);
			
		} elseif ($form_type == 'new_installment') {

			$grades = $_POST['grades'];

			unset($form_type, $_POST['grades'], $_POST['type']);

			$table = 'installment';
			
			$id = $dbaser->insert ($table, $_POST);
			if($id){

				$new_table = 'installment_grades';

				foreach ($grades as $key => $value) {
					$data = array('installmentid' => $id, 'gradeid' => $value);
					$dbaser->insert ('installment_grades', $data);
				}

				echo NotePopup('Successfully added '.$_POST['title'], 1);

			} else {
			    echo NotePopup('Error! ', 2);
			}
			

		} elseif ($form_type == 'new_event' || $form_type == 'new_admin_page' ) {

			$table = get_table($form_type);

			$sent_data = array();

			unset($_POST['form_type'], $_POST['type'],$_POST['id']);
			
			$ttl = isset($_POST['title']) ? $_POST['title'] : '';

			foreach ($_POST as $key => $value) {
				if (!empty($value)) {
					$sent_data[$key] = $dbaser->escape($value); 
				} 
			}
			

			if (count($_POST) == count($sent_data)) {
				
				$sent_data['creator'] = $admin_user->id; 
				
				$id = $dbaser->insert ($table, $sent_data);
				
				if($id) {
				    echo NotePopup('Successfully added '.$ttl, 1);
				} else {
				    echo NotePopup('Error! ', 2);
				}
			} else {
				echo NotePopup('Error! Please fill all data '.count($sent_data), 2);
			}
			

		} elseif ($form_type == 'new_item') {

			$explode = explode('/', $_SERVER['HTTP_REFERER']);
			$table = end($explode);

			unset($form_type, $_POST['type']);
			$ttl = isset($_POST['title']) ? $_POST['title'] : '';
			$id = $dbaser->insert ($table, $_POST);
			if($id)
			    echo NotePopup('Successfully added '.$ttl, 1);
			else
			    echo NotePopup('Error! ', 2);
			

		} elseif ($form_type == 'add_admin') {
			 
			$admin->adminFullName = $_POST['fullname'];
			
			$admin->adminName = $_POST['name'];
			
			$admin->adminPass = $_POST['password'];
			
			$admin->adminEmail = $_POST['email'];
			
			//$admin->adminLevel = $_POST['level'];
			
			$admin->adminPublish = $_POST['publish'];
			
			$addAdmin = $admin->AddAdmin();
			
			if($addAdmin == 1) {
				
				echo NotePopup('Successfully added '.$_POST['name'], 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$addAdmin, 2);
			
			}
			
		} elseif ($form_type == 'add_user') {
			 
			$member = new Members();
					
			$member->db = $db;
			
			$member->memberFullname = $_POST['fullname'];
			
			$member->memberName = $_POST['name'];
			
			$member->memberPass = $_POST['password'];
			
			$member->memberConfirmPass = $_POST['password'];
			
			$member->memberEmail = $_POST['email'];
			
			$member->memberLevel = $_POST['permissions'];
			
			$member->memberPublish = $_POST['publish'];
			
			$addmember = $member->addMember();
			
			if($addmember == 1) {
				
				echo NotePopup('Thanks for subscription and welcome '.$_POST['fullname'], 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$addmember, 2);
			
			}
			
		} elseif ($form_type == 'add_level') {
			 
			$addLevel = $admin->AddALevel($_POST['title'], $_POST['acc_view'], $_POST['acc_edit'], $_POST['set_edit'], $_POST['bulk_msg']);
			
			if($addLevel == 1) {
				
				echo NotePopup('Successfully added '.$_POST['name'].' level', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$addLevel, 2);
			
			}
			
		} elseif ($form_type == 'add_page') {
			 
			$add = $admin->AddPage($_POST['title'], $_POST['prefix'], $_POST['template'], $_POST['layout'], $_POST['content'], $_POST['keywords'], $_POST['desc'], $publish);
			
			if($add == 1) {
				
				echo NotePopup('Successfully added '.$_POST['title'].' page', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$add, 2);
			
			}
			
		} elseif ($form_type == 'add_cat') {
			 
			$add = $admin->AddCategory($_POST['title'], $_POST['link'], $_POST['mother'], $publish, $_POST['type']);
			
			if($add == 1) {
				
				echo NotePopup('Successfully added '.$_POST['title'].' page', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$addLevel, 2);
			
			}
			
		} elseif ($form_type == 'add_post') {

			$add = $admin->AddPost_by_admin($_POST, $administrator);
			
			if($add == 1) {
				
				echo $add;
				
			}  else {
			
				echo NotePopup('Error! : '.$add, 2);
			
			}
			
		} elseif ($form_type == 'add_plan') {

			$add = Plans::addPlan($_POST);
			
			if(is_numeric($add)) {
				
				echo NotePopup('Successfully added.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$add, 2);
			
			}
			
		} elseif ($form_type == 'new_hook') {
			
			if (isset($_POST['hook_title']) && isset($_POST['hook_position']) && isset($_POST['hook_pages'])) {
				
				$add = $admin->add_hook($_POST);
				
				if($add == 1) {
					
					echo $add;
					
				}  else {
				
					echo NotePopup('Error! : ' . $add, 2);
					
				}
				
			} else {
			
				echo NotePopup('Error! : Please fill all fields', 2);

			}			
		}	
	
	} else {
		
		echo NotePopup('Please login first..', '2');
		
	}
	
	function get_table($name) {
		
		$table = '';

		if ($name == 'new_event') {
			$table = 'school_events';
		} elseif ($name == 'new_admin_page') {
			$table = 'admin_pages';
		}

		return $table;

	}
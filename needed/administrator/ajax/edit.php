<?php
error_reporting(0);

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	
	require_once('../../classes/configuration.php');
	require_once('../../classes/functions.php');
	
	if(isset($_SESSION['nameAdmin'])) {$administrator = $_SESSION['nameAdmin'];} else {$administrator = '0';}
	
	if(isset($administrator) && $administrator !== '0' && !empty($_POST['form_type'])) {
		
		if (isset($_POST['publish'])) {$publish = $_POST['publish'];} else {$publish = '0';}
		if (isset($_FILES['photo'])) {$file = $_FILES['photo'];} else {$file = '1';}
		
		$admin = new FullAdmin();
			
		$admin->db = $db;
			
		if ($_POST['form_type'] == 'edit_admin') {
			
			$admin->adminId = $_POST['id'];
			
			$admin->adminFullName = $_POST['fullname'];
			
			$admin->adminName = $_POST['name'];
			
			$admin->adminPass = $_POST['password'];
			
			$admin->adminEmail = $_POST['email'];
			
			//$admin->adminLevel = $_POST['level'];
			
			$admin->adminPublish = $_POST['publish'];
			
			$editAdmin = $admin->editAdmin();
			
			if($editAdmin == 1) {
				
				echo NotePopup('You successfully updated <b>'.$admin->adminName.'</b> account.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$editAdmin, 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'edit_user') {
			
			$member = new Members();
					
			$member->db = $db;
			
			$member->memberId = $_POST['id'];
			
			$member->memberFullname = $_POST['fullname'];
			
			$member->memberPass = !empty($_POST['password']) ? $_POST['password'] : '0';
			
			$member->memberConfirmPass = !empty($_POST['password2']) ? $_POST['password2'] : '0';
			
			$member->memberPublish = isset($_POST['publish']) ? '1' : '0';

			$member->memberVerified = isset($_POST['permissions']) ? '1' : '0';
			
			$editmember = $member->UpdateMember();
			
			if($editmember == 1) {
				
				echo NotePopup('You successfully updated <b>'.$member->memberName.'</b> account.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$editmember, 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'edit_level') {
			
			$editlevel = $admin->editLevel($_POST['id'], $_POST['title'], $_POST['acc_view'], $_POST['acc_edit'], $_POST['set_edit'], $_POST['bulk_msg']);
			
			if($editlevel == 1) {
				
				echo NotePopup('Successfully updated <b>'.$_POST['title'].'</b> level.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$editlevel, 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'edit_event') {
			
			$post_data = Array (
				'title' => $dbaser->escape($_POST['title']),
				'content' => $_POST['content'],
				'sendto' => $dbaser->escape($_POST['sendto']),
				'starttime' => $dbaser->escape($_POST['starttime']),
				'endtime' => $dbaser->escape($_POST['endtime']),
				'date' => $dbaser->escape($_POST['date']),
				'state' => $dbaser->escape($_POST['state'])
			);
			
			$dbaser->where ('id', $dbaser->escape($_POST['id']));

			$update_it = $dbaser->update ('school_events', $post_data);

			if ($update_it)
				echo 1;
			else 
				echo NotePopup('Error! : '.$editlevel, 2);
			
		}	
	
		if ($_POST['form_type'] == 'edit_setting') {
			
			$editSetting = $admin->editSettings($_POST);
			
			if($editSetting == 1) {
				
				echo NotePopup('Successfully updated.', 1);
				
			}  else {
			
				echo NotePopup('Error! : ' . $editSetting, 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'edit_page') {
			
			$editPage = $admin->editPage($_POST['id'], $_POST['title'], $_POST['prefix'], $_POST['template'], $_POST['layout'], $_POST['content'], $_POST['keywords'], $_POST['desc'], $publish);
			
			if($editPage == 1) {
				
				echo NotePopup('Successfully updated.', 1);
				
			}  else {
			
				echo NotePopup('Error! : ', 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'edit_cat') {
			
			$editPage = $admin->editCategory($_POST['id'], $_POST['title'], $_POST['link'], $_POST['mother'], $publish);
			
			if($editPage == 1) {
				
				echo NotePopup('Successfully updated.', 1);
				
			}  else {
			
				echo NotePopup('Error! : ', 2);
			
			}
			
		}	
	
		if ($_POST['form_type'] == 'add_post') {
			 
			$add = $admin->editPost($_POST, $administrator);
			
			if($add == 1) {
				
				echo $add;
				
			}  else {
			
				echo NotePopup('Error! : '.$add, 2);
			
			}
			
		}	
	
		
		if ($_POST['form_type'] == 'plugin') {
			
			if (isset($_POST['plugin_id'])) {
				
				$data = array('content'=>serialize($_POST), 'plugin_id'=>$_POST['plugin_id']);
				
				$dbaser->where('plugin_id', $_POST['plugin_id']);
				$plugin = $dbaser->getOne('plugins_options');
				
				if (isset($plugin['id'])) {
					$dbaser->where('id', $plugin['id']);
					$dbaser->update('plugins_options', $data);	
				} else {
					$dbaser->insert('plugins_options', $data);	
				}

				echo 1;

			} else {

				echo NotePopup('Error!', 2);
			}			
		}	
	
		
		if ($_POST['form_type'] == 'edit_hook') {
			
			if (isset($_POST['hook_title']) && isset($_POST['hook_position']) && isset($_POST['hook_pages'])) {
				
				$media = '';
				
				$add = $admin->update_hook($_POST);
				
				if($add == 1) {
					
					echo $add;
					
				}  else {
				
					echo NotePopup('Error! : '.$add, 2);
				
				}
				
			} else {
			
				echo NotePopup('Error! : Please fill all fields', 2);

			}			
		}	
	
			
		if ($_POST['form_type'] == 'edit_plan') {

			$edit = Plans::editPlan($_POST);
			
			if(is_numeric($edit)) {
				
				echo NotePopup('Successfully updated.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$edit, 2);
			
			}
		}
			
			
		if ($_POST['form_type'] == 'edit_plan_access') {

			$edit = Plans::editPlanAccess($_POST);
			
			if(is_numeric($edit)) {
				
				echo NotePopup('Successfully updated.', 1);
				
			}  else {
			
				echo NotePopup('Error! : '.$edit, 2);
			
			}
		}
			
		
	} else {
		
		echo NotePopup('Please login first', '2');
		
	}
	
		
?>
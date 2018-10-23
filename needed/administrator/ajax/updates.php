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
	
	if(isset($_SESSION['nameAdmin']) && $_SESSION['nameAdmin']) {
			
		if ($_POST['type'] == 'set_template') {
			 
			$setting = new FullAdmin();
			
			$setting->db = $db;
			
			$setUpdate = $setting->updateTemplate($_POST['title']);
			
			if($setUpdate == 1) {
				
				echo '  <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Done!</strong>  Main template has been changed
						</div>
						
						';
						
			}  else {
									
				echo '<div class="alert alert-danger  " > <strong>Error!</strong> Nothing happend </div>';
				
			}
		}	
		
		if ($_POST['type'] == '1') {
			 
			$setting = new FullAdmin();
			
			$setting->db = $db;
			
			$setUpdate = $setting->UpdateSettings($_POST['sitename'],$_POST['template'],$_POST['langs'], $_POST['under'],$_POST['undermsg'],$_POST['soundcloud_key'],$_POST['youtube_key'],$_POST['meta'],$_POST['desc'],$_POST['vext'],$_POST['pext'],$_POST['aext'], $_POST['head']);
			
			if($setUpdate == 1) {
				
				echo '<div class="alert alert-success  " ><strong>Well done!</strong> You successfully updated your settings</div>';
				
			}  else {
									
				echo '<div class="alert alert-danger  " > <strong>Error!</strong> Nothing happend </div>';
				
			}
		}	
		
		if ($_POST['type'] == '2') {
			 
			$admin = new FullAdmin();
			
			$admin->db = $db;
			
			$setAdmin = $admin->UpdateAdmin($_POST['id'], $_POST['name'], $_POST['pass']);
			
			if($setAdmin == '1') {
				
				echo '<div class="alert alert-success  " > <strong>Well done!</strong> You successfully updated <b>'.$_POST['name'].'</b> account</div>';
				
			}  else {
			
				echo '<div class="alert alert-danger  " ><strong>Error!</strong> Nothing happend</div>';
			
			}
		}	
		
		if ($_POST['type'] == '3') {
			 
			$admin = new FullAdmin();
			
			$admin->db = $db;
			
			$setAdmin = $admin->UpdateCats($_POST['id'], $_POST['title']);
			
			if($setAdmin == '1') {
				
				echo '<div class="alert alert-success  " ><strong>Well done!</strong> You successfully updated <b>'. $_POST['title'] .'</b> category</div>';
				
			}  else {
									
				echo '<div class="alert alert-danger  " > <strong>Error!</strong> Nothing happend </div>';
			
			}
			
		}	
		
		if ($_POST['type'] == '4') {
			 
			$Members = new Members();
			
			$Members->db = $db;
			
			$setMembers = $Members->UpdateMember($_POST['id'], $_POST['realname'], $_POST['email'], $_POST['pass'], $_POST['active']);
			
			if($setMembers == '1') {
				
				echo '<div class="alert alert-success  " ><strong>Well done!</strong> You successfully updated <b>'.$_POST['name'].'</b> account</div>';
				
			}  else {
			
				echo '<div class="alert alert-danger  " ><strong>Error!</strong> Nothing happend</div>';
			
			}
		}	
		
		if ($_POST['type'] == '5') {
			 
			$ADS = new FullAdmin();
			
			$setADS = $ADS->editADS($_POST['topad'], $_POST['bottomad'], $_POST['sidead']);
			
			if($setADS == '1') {
				
				echo '<div class="alert alert-success  " ><strong>Well done!</strong> successfully updated </div>';
				
			}  else {
			
				echo '<div class="alert alert-danger  " ><strong>Error!</strong> Nothing happend</div>';
			
			}
		}	
		
		if ($_POST['type'] == 'm1' || $_POST['type'] == 'm2' || $_POST['type'] == 'm3') {
			 
			$admin = new FullAdmin();
			
			$admin->db = $db;
			
			$setting = Settings();
			
			$dirpath = realpath(dirname(getcwd()));
								
			$thumbsExts = $setting['pext'];
			
			
			if ( $_POST['type'] == 'm1') 
			{	
				$Cat = $_POST['vcat'];
				$dirname = 'videos';
 			}
			
			if ( $_POST['type'] == 'm2') 
			{
				$Cat = $_POST['pcat'];
				$dirname = 'photos';
			}
			
			if ( $_POST['type'] == 'm3') 
			{
				$Cat = $_POST['acat'];
				$dirname = 'audio';
			}
			
			
			if ($_FILES['vthumb']['name'] == "" || $_FILES['vthumb']['size'] == 0) 
			{
				$thumb = $_POST['thumb_now'];
			} 
			elseif ($_FILES['vthumb']['size'] > 0)
			{	
					$pext = pathinfo($_FILES['vthumb']['name'], PATHINFO_EXTENSION);
					
					if (strpos($thumbsExts, $pext) !== false)
					{
						if ($_FILES["vthumb"]["error"] > 0)
						{
							$addMedia = "Return Code: " . $_FILES["vthumb"]["error"] . "<br />";
						}
						else
						{
							$temp = explode(".",$_FILES["vthumb"]["name"]);
							$thumb = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.' .end($temp);
							$media = $dirpath .'/media/'.$dirname.'/thumbs/'. $_POST['thumb_now'];
							if (unlink($media) && move_uploaded_file($_FILES["vthumb"]["tmp_name"], $dirpath .'/media/'.$dirname.'/thumbs/' . $thumb)) {
								
								$addThumb =  "done";
							}	else {
								echo ' Unable to remove old thumb and upload new one ';
							}
						}
					}
					else
					{
						$addMedia .=  ' Invalid thumb ';
					}
				
			}
				
			$updateMedia = UpdateMedia($_POST['id'], $_POST['type'], $_POST['vtitle'], $_POST['vdesc'], $Cat, $thumb, $_POST['vtags'], $_POST['allow'], $_POST['active']);
			
			if($updateMedia == '1') {
				
				echo '<div class="alert alert-success  " ><strong>Well done!</strong> You successfully updated <b>'. $_POST['vtitle'] .'</b></div>';
				
			}  else {
			
				echo '<div class="alert alert-danger  " ><strong>Error!</strong> Nothing happend</div>';
			
			}
			
		}	
	}
?>
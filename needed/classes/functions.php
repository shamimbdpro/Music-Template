<?php

//======================================================================\\

// CMS			                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
require_once("classes.php");
	


function add_admin_menu($type = null, $key = null) {
	
	if (isset($key)) {
		return $key();
	} else {
		return $key;
	}
}

function add_head_plugins_css($type = null, $key = null) {
	
	if (isset($key)) {
		return $key();
	} else {
		return $key;
	}
}

function GetCount($type) {

	global $db;
	
	$type = $db->real_escape_string($type);
	
	if ($type == 'members') {
		$query = $db->query(sprintf("SELECT count(*) as total FROM `members` "));
	} elseif ($type == 'comments' ) {
		$query = $db->query(sprintf("SELECT count(*) as total FROM `media_comments` "));	
	} elseif ($type == 'media' ) {
		$query = $db->query(sprintf("SELECT count(*) as total FROM `media` "));	
	} elseif ($type == 'views' ) {
		$query = $db->query(sprintf("SELECT count(*) as total FROM `media_views` "));	
	}
	
	$row = $query->fetch_assoc();
	
	$output = $row['total'];
	
	return $output;
}

function getTemplates() {

		$output = '';
		//path to templates directory 
		$directory = "templates/";
		 
		//get all folders in specified directory
		$files = glob($directory . "*");
		 
		//print each folder name
		foreach($files as $file)
		{
			
			//check to see if the file is a templates/[templatename]
			if(is_dir($file))
			{
				$folder = str_replace($directory, '', $file);
				$output .= '<option value="'.$folder.'" >'.$folder.' </option>';
			}
		}
	return $output;	
}

function getLangs() {

	$output = array();

	//path to templates directory 
	$directory = dirname(__FILE__) . "/languages/";
		 
	//get all folders in specified directory
	$files = glob($directory . '*.php', GLOB_BRACE);
		 
	//print each folder name
	foreach($files as $key => $file)
	{

		//check to see if the file is a templates/[templatename]
		if(!is_dir($file))
		{
			$folder = str_replace($directory, '', $file);
			$folder = str_replace('.php', '', $folder);
			$output[$key]['id'] = $folder;
			$output[$key]['title'] = ucfirst($folder);
		}
	}
	return $output;	
}

function CheckLanguages($type = null) {

	global $CONF, $Setting;

	/* //////////////////////////////////
	@Params Search for Availiable langs
	///////////////////////////////////*/
	
	$LangsDir = dirname(__FILE__) . "/languages/";
	
	$language = glob($LangsDir . '*.php', GLOB_BRACE);
	
	$available = '';
	
	if($type == 1) {
	
		foreach($language as $lang) {
		
			// Get Language path
			$path = pathinfo($lang);
			
			// Add the filename into $available array
			$available .= '<a href="'.$CONF['url'].'index.php?lng='.$path['filename'].'">'.ucfirst(strtolower($path['filename'])).'</option>  ';
			
		}
		
		return substr($available, 0, -3);
	
	} else {
		// Set the cookie
		$lang = $Setting['language']; // DEFAULT LANGUAGE
		
		if(isset($_GET['lng'])) {
		
			if(in_array($LangsDir.$_GET['lng'].'.php', $language)) {
			
				$lang = $_GET['lng'];
				
				setcookie('lng', $lang, time() +  (10 * 365 * 24 * 60 * 60)); // Expire in one month
			
			} else {
			
				setcookie('lng', $lang, time() +  (10 * 365 * 24 * 60 * 60)); // Expire in one month
			
			}

			header("Location: ". $CONF['url']);
			
		} elseif(isset($_COOKIE['lng'])) {
		
			if(in_array($LangsDir.$_COOKIE['lng'].'.php', $language)) {
			
				$lang = $_COOKIE['lng'];
			
			}
		
		} else {
		
			setcookie('lang', $lang, time() +  (10 * 365 * 24 * 60 * 60)); // Expire in one month
		
		}

		if(in_array($LangsDir.$lang.'.php', $language)) {
		
			return $LangsDir.$lang.'.php';
	
		}
	}
}

function viewADS() {
	global $db;
	
	////////////////////////
	// Returns 3 ADS
	////////////////////////
	// 1 - Top AD
	// 2 - Side AD
	// 3 - Bottom AD
	////////////////////////////
	
	$query = sprintf("SELECT * from `ads`");
	$result = $db->query($query);
	
	if ($result->num_rows > 0) {
	
		while ($Settings = $result->fetch_assoc()) {
			return $Settings;    
		}
	}
}



function NotePopup($msg, $type) {
	
	if ($type == '1') {
		$text_color = 'style="color:#333"';
		$state = 'alert-success';
		$alert = '<script>alertify.success("'.$msg.'");</script>';
	} elseif ($type == '2') {
		$text_color = 'style="color:#fff !important"';
		$state = 'alert-danger';
		$alert = '<script>alertify.error("'.$msg.'");</script>';
	} elseif ($type == '3') {
		$text_color = 'style="color:#fff"';
		$state = 'alert-info';
		$alert = '<script>alertify.warning("'.$msg.'");</script>';
	}
	
	/////////////////////////
	// Returns Notifications 
	/////////////////////////
	return '
        <div class="alert '.$state.'"  '.$text_color.'>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          '.$msg.' '.$alert.'
        </div>';
	
}

function ago($i){
    
	$m = time()-$i; $o='just now';
    
	$t = array('year'=>31556926,'month'=>2629744,'week'=>604800, 'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1);
    
	foreach($t as $u=>$s){
		
		if($s<=$m){$v=floor($m/$s); $o="$v $u".($v==1?'':'s').' ago'; break;}
	}
    
	return $o;
}

/* =================================
==== Dropdown selection function ===
================================= */
function list_options_select($query, $current = null) {
	
	$output = '';
	
	if (isset($query)) {

		if (is_array($current)) {

			foreach ($query as $row) {
				
				foreach ($current as $curr) {
					
					if ($row['id'] == $curr['id']) {
						$output .= '<option value="'.$row['id'].'" selected="selected"> '.$row['title'].'</option>';
					} 
					
				}	

			}		
							
		} else {

			foreach ($query as $row) {
				
				if ($current ==  $row['id']) {
					$cur = 'selected="selected"';
				} else {
					$cur = '';

				}		

				$output .= '<option value="'.$row['id'].'" '.$cur.'> '.$row['title'].'</option>';
			}
		}
	}
		
	return $output;
}
	


/* ============================
==== Selected list function ===
============================ */
function list_options_active($id , $query, $current = null) {
		
	$output = '';
			
	if (isset($query) && is_array($query)) {
			
		foreach ($query as $row) {
			
			if ($current != $row['id']) {
					
				if ($row['id'] == $id) { $active = select_active($id);} else {$active = '';}
				
				$output .= '<option value="'.$row['id'].'" '.$active.'> '.$row['title'].'</option>';
			}
		}
			
	}
		
	return $output;
}
	

function list_countries_active($query, $current = null) {
		
	
	$output = '';
	
	if (isset($query)) {

		foreach ($query as $row) {
			
			if (strtolower($current) ==  $row['id']) {
				$cur = 'selected="selected"';
			} else {
				$cur = '';
			}		

			$output .= '<option value="'.$row['id'].'" '.$cur.'> '.$row['flag'].' '.$row['title'].'</option>';
		}
	}
		
	return $output;
}


function list_options_active_field($id , $query, $field, $title) {
		
	$output = '';
			
	if (isset($query) && is_array($query)) {
			
		foreach ($query as $row) {
			
			if ($row[$field] == $id) { $active = select_active($id);} else {$active = '';}
				
			$output .= '<option value="'.$row[$field].'" '.$active.'> '.$row[$title].'</option>';
		}
			
	}
		
	return $output;
}
	
/* ============================
==== multi-select  function ===
============================ */
function multi_select_active($id , $query) {
		
	$output = '';
			
	if (isset($query)) {
			
		foreach ($query as $row) {
			
			if (is_array($id)) {

				if (in_array($row['id'], $id)) { $active = select_active($id);} else {$active = '';}
				
			} else {$active = '';}
			
			$output .= '<option value="'.$row['id'].'" '.$active.'> '.$row['title'].'</option>';
		}
			
	}
		
	return $output;
}
	

/* ============================
==== Check status function ====
============================ */
function select_active($value) {
	
	if (isset($value) && !empty($value)) {$output = 'selected';} else {$output = ' ';}
	
	return $output;
	
}

function option_toChecked($value) {
	
	if (isset($value) && !empty($value) ) {$output = 'checked';} else {$output = ' ';}
	
	return $output;
	
}

function option_toNumber($value) {
	
	if ($value == 'on') {$output = '1';} else {$output = '0';}
	
	return $output;
	
}




/* ============================
==== Get current template =====
============================ */
function checkTemplate($value , $rows) {
	global $db;
	
	$output = '';
	
	if (!empty($rows)) {
		
		foreach ($rows as $row) {
		
			if ($value == $row['link']) {$select = 'selected=""';} else {$select = ' ';}
			
			$output .= '<option '.$select.' value="'.$row['link'].'"> '.$row['name'].' </option>';

		}	
		return $output;		
	}
}




/* ============================
==== Check current select =====
============================ */
function check_current_select($value , $query , $field) {
	
	global $db;
	
	$output = '';

	$layouts = str_replace(' ', '', $query[$field]);
	
	$rows = explode(",", $layouts);
	
	foreach ($rows as $row) {
		
		if ($value == $row) {$select = 'selected=""';} else {$select = ' ';}
		
		$output .= '<option value="'.$row.'" '.$select.'> '.$row.' </option>';
	
	}
			
	return $output;
	
}




/* =============================
==== Admin panel plugins menu ==
============================= */
$load_all_plugins_menus = array();

function add_plugin_menu($item) {

	global $load_all_plugins_menus;

	array_push($load_all_plugins_menus , $item);


}

function load_all_plugins_menus() {
	
	global $load_all_plugins_menus , $CONF, $dbaser;
	
	$output =  '';
	
	$dbaser->where('status', '1');
	$plugins = $dbaser->get('plugins');

	foreach ($plugins as $key => $value) {
		require_once(getcwd().'/'.$value['path'].'/info.php');
	}

	$list = unique_multidim_array($load_all_plugins_menus, 'link');

	foreach ($list as $menu_item) {

		$title = str_replace('./' , '' , $menu_item['title']);

		$dbaser->where('link', $menu_item['link']);
		$dbaser->where('status', '1');
		$plugin = $dbaser->getOne('plugins');

		if (isset($plugin['id'])) {
			$output .= '<li><a  href="'.$CONF['url'].'admin/plugin/'.$plugin['id'].'">'.$title.'</a></li>';
		}
	}
	
	return $output ;
}

function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
} 


/* ==========================
==== Retutn page css data ==
========================== */
$load_all_plugins_css = array();
	
function load_all_plugins_css() {
	global $load_all_plugins_css , $CONF;
	
	$output =  '';
	
	$files = array_unique($load_all_plugins_css);

	foreach ($files as $file) {
		
		$file = str_replace('./' , '' , $file);
		
		$output .= '<link href="'.$CONF['url'].$file.'" rel="stylesheet"> 
	';
	}
	
	return $output ;
}


function add_head_css($type , $file) {

	global $load_all_plugins_css;
	
	array_push($load_all_plugins_css , $file);
	
	if (in_array($file , $load_all_plugins_css)) {
	
		unset($load_all_plugins_css[$file]);
		
	}
	
}



/* ===========================
==== Retutn page JS plugins ==
=========================== */
$load_all_plugins_js = array();
	
function load_all_plugins_js() {
	global $load_all_plugins_js, $CONF;
	
	$output =  '';
	
	$files = array_unique($load_all_plugins_js);

	foreach ($files as $file) {
		
		$file = str_replace('./' , '' , $file);
		
		$output .= '<script type="text/javascript" src="'.$CONF['url'].$file.'" ></script>
	';
	}
	
	return $output ;
	
}


function add_head_js($type , $file) {

	global $load_all_plugins_js;
	
	array_push($load_all_plugins_js , $file);
	
	if (in_array($file , $load_all_plugins_js)) {
	
		unset($load_all_plugins_js[$file]);
		
	}
	
}




/* ===========================
==== Retutn page JS plugins ==
=========================== */
$load_footer_plugins_js = array();
	
function pages_footer_js() {
	global $load_footer_plugins_js, $CONF;
	
	$output =  '';
	
	$files = array_unique($load_footer_plugins_js);

	foreach ($files as $file) {
		
		$file = str_replace('./' , '' , $file);
		
		$output .= '<script type="text/javascript" src="'.$CONF['url'].$file.'" ></script>
	';
	}
	
	return $output ;
	
}


function add_footer_js($type , $file) {

	global $load_footer_plugins_js;
	
	array_push($load_footer_plugins_js , $file);
	
	if (in_array($file , $load_footer_plugins_js)) {
	
		unset($load_footer_plugins_js[$file]);
		
	}
	
}


/* ==========================
==== Retutn page head data ==
========================== */
function pages_head_meta($page_array , $type) {
	
	global $CONF;
	
	$FullAdmin = new FullAdmin();
	$Setting = $FullAdmin->siteSetting();
	
	if (isset($page_array)) {
		
		$title = $page_array['title'];
		$desc = $page_array['desc'];
		$keywords = $page_array['keywords'];
		
		if (isset($page_array['url'])) { 
			$url = $CONF['url'] . $page_array['url'];
		} else {
			$url = $CONF['url'];
		}		
		
	} else {
	
		$title = $Setting['sitename'];
		$desc = $Setting['desc'];
		$keywords = $Setting['keywords'];
		$url = $CONF['url'];
		
	}
	
	return  ' 
	<!--Content Type UTF-8-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	<!--IE Compatibility modes-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<!--Mobile first-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
	<title>'.$title.' </title>
	<link rel="shortcut icon" type="image/png" href="'.$CONF['url'].'favicon.png"/>
	<meta name="description" content="'.$desc.'" >
	<meta name="keywords" content="'.$keywords.'" >
	
	<!-- Twitter Card data -->
	<meta name="twitter:card" value="'.$desc.'">
	<meta name="twitter:site" content="'.$title.'">
	<meta name="twitter:title" content="'.$title.'">
	<meta name="twitter:description" content="'.$desc.'">
	<meta name="twitter:image:src" content="'.$CONF['url'].'favicon.png">
	
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="'.$title.'">
	<meta itemprop="description" content="'.$desc.'">
	<meta itemprop="image" content="'.$CONF['url'].'favicon.png"> 

	<!-- Open Graph data -->
	<meta property="og:title" content="'.$title.'" />
	<meta property="og:url" content="'.$url.'" />
	<meta property="og:image" content="'.$CONF['url'].'favicon.png" />
	<meta property="og:description" content="'.$desc.'" /> 
	<meta property="og:site_name" content="'.$title.'" />
	'    ;
}


/* =========================
==== Retutn head CSS & JS ==
========================= */
function pages_head($page_array , $type) {
	
	$load_css = load_all_plugins_css();
	
	$load_js = load_all_plugins_js();
	
	return  
	$load_css.'
  '.$load_js.'
	'    ;
}


/* ==========================
==== Retutn page footer    ==
========================== */
function pages_footer($page_array , $type) {
	
	global $CONF;
	
	$FullAdmin = new FullAdmin();
	$Setting = $FullAdmin->siteSetting();
	
	if (isset($page_array)) {
		
		$title = $page_array['title'];
		$desc = $page_array['desc'];
		$keywords = $page_array['keywords'];
		
	} else {
	
		$title = $Setting['sitename'];
		$desc = $Setting['desc'];
		$keywords = $Setting['keywords'];
		
	}
	
	$load_js = pages_footer_js();
	
	return $load_js.'
	';
}




/* ==================================
==== Delete media file (photos) =====
================================== */
function delete_media($id) {
	
	global $CONF;
	
	$dir = $_SERVER['DOCUMENT_ROOT'] . $CONF['path'] . 'media/photos/';
	
	$file = $dir.$id;
	
	if (file_exists($file)) {
	
		if (unlink($file)) {
			return 1;
		} else {
			return 'File can not be deleted';
		}
		
	} else {
		return 'File not found';
	}
		
}




/* =============================
==== Require media library =====
============================= */
function media_library() {
	
	global $CONF;
	
	$output = '';
	
	$dir = $_SERVER['DOCUMENT_ROOT'] . $CONF['path'] . 'media/photos/';
		
	if ($handle = opendir($dir)) {
			
		while (false !== ($entry = readdir($handle))) {
				
			if ($entry != "." && $entry != ".." && $entry != "index.html" && $entry != "thumbs" && $entry != "premium") {
				
				$output .= '<li id="media_lib_id" class="li_'.$entry.'" data-id="'.$entry.'" data-url="'.$CONF['url'].'image.php?src='.$entry.'&w=200&h=150&img=pic"><img src="'.$CONF['url'].'image.php?src='.$entry.'&w=100&h=100&img=pic" />
				<a id="delete_photo" data-id="'.$entry.'"><i class="fa fa-times"></i></a>
				</li>';
			}
		}
		closedir($handle);
	}
	
	return $output;
}



/* ==========================
==== Upload media files =====
========================== */
function upload_media($file, $type = null) {
	
	global $CONF, $Setting;
	
	if ($type == '1') {$folder = 'audio'; $all_ext = $Setting['audio_ext'];} 
	if ($type == '1_1') {$folder = 'audio/thumbs'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '1_2') {$folder = 'audio/premium'; $all_ext = $Setting['audio_ext'];} 
	if ($type == '2') {$folder = 'videos'; $all_ext = $Setting['videos_ext'];} 
	if ($type == '2_1') {$folder = 'videos/thumbs'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '2_2') {$folder = 'videos/premium'; $all_ext = $Setting['videos_ext'];} 
	if ($type == '3' || $type == null) {$folder = 'photos'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '3_1') {$folder = 'photos/thumbs'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '3_2' ) {$folder = 'photos/premium'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '4') {$folder = 'channels'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '5') {$folder = 'ads'; $all_ext = $Setting['pic_ext'];} 
	if ($type == '6') {$folder = 'albums'; $all_ext = $Setting['pic_ext'];} 
	
	if ( isset($file['size']) && !empty($file) && $file['size'] > 0 ) { 
					
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		
		if ($file  && strpos($all_ext, strtolower($ext)) !== false  )
		{
			if ($file["error"] > 0)
			{
				$output = "Error : Return Code: " . $file["error"] . "<br />";
			}
			else
			{
				$temp = explode(".",$file["name"]);
				$photoname = mt_rand().'_'.mt_rand().'_'.mt_rand() . '.' .end($temp);
				if (move_uploaded_file($file["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $CONF['path'] . '/media/'.$folder.'/' . $photoname)) {
									
					$output = $photoname;
									
				}	
			}
		}
		else
		{
			$output =  'Error file extension not allowed';
		}
	
	} 	else {
		
		$output = 'Error no file selected'; 
	}
	
		return $output;
					
}



/* ====================================
==== Convert media type to number =====
==================================== */
function MediaNameToNumber($type) {
	$output = '';
	if ($type == 'music') {
		$output = '1';
	} elseif ($type == 'video' || $type == 'videos') {
		$output = '2';
	} elseif ($type == 'photo' || $type == 'photos') {
		$output = '3';
	}
	return $output;

}




/* ====================================
==== Convert media type to number =====
==================================== */
function MediaNameToNumberImg($type) {
	
	if ($type == 'music') {
		$output = 'm3';
	} elseif ($type == 'video' || $type == 'videos') {
		$output = 'm1';
	} elseif ($type == 'photo' || $type == 'photos') {
		$output = 'm2-t';
	}
	return $output;

}



/* ==========================
==== Filter html tags   =====
========================== */
function filter_html_tags($content) {

	$output = strip_tags($content);
	
	return $output;

}



/* ==========================
==== Autoload Plugins      ==
========================== */
function autoload_plugins()
{
	global $CONF, $db, $Setting, $payment_class, $member;
	
	$plugins_list = queryPlugins_list();
	
	foreach ($plugins_list as $row) 
	{
		$PLUGIN_PATH = str_replace('./', '', $row['path']);
		$PLUGIN_NAME = $row['name'];
		$PLUGIN_TYPE = $row['type'];
		$PLUGIN_ID = $row['id'];
		
		if ($handle = opendir($PLUGIN_PATH)) {

			while (false !== ($entry = readdir($handle))) {
				
				if ($entry == "autoload.php" ) {
					require_once($PLUGIN_PATH.'/' . $entry);
				}
			}
		}
	}
	
}

/* ==========================
==== Payment Plugins      ==
========================== */
function payment_plugins($load, $type = null)
{
	global $CONF, $db, $Setting, $member, $cart_class;
	$return  = '';  
	
	if (!empty($type)) {
		
		$plugins_list = queryPlugins_type($type);
		
		if (is_array($plugins_list)) {		
			
			foreach ($plugins_list as $row) 
			{
				$PLUGIN_PATH = str_replace('./', '', $row['path']);
				$PLUGIN_NAME = $row['name'];
				$PLUGIN_TYPE = $row['type'];
				$PLUGIN_ID = $row['id'];
				
				if ( $handle = opendir($PLUGIN_PATH)) {
				
					while (false !== ($entry = readdir($handle))) {
					
						if ($entry == $load . ".php" ) {
							$return .=  include($PLUGIN_PATH.'/'.$load.'.php');
						}
					}
				}				
			}
		}
	}
	return	$return;
}

/* ==========================
==== Payment Plugins      ==
========================== */
function payment_process($load, $type = null)
{
	global $CONF, $db, $Setting, $member, $cart_class;
	$return  = '';  
	
	if (!empty($type)) {
		
		$row = get_plugin($type);
		
		if (is_array($row)) {		
				
			$PLUGIN_PATH = str_replace('./', '', $row['path']);
			$PLUGIN_NAME = $row['name'];
			$PLUGIN_TYPE = $row['type'];
			$PLUGIN_ID = $row['id'];
			
			if ( $handle = opendir($PLUGIN_PATH)) {
			
				while (false !== ($entry = readdir($handle))) {
				
					if ($entry == $load . ".php" ) {
						
						$return =  include($PLUGIN_PATH.'/'.$load.'.php');
					}
				}
			}				
		}
	}
	return	$return;
}

/* ==============================
==== Delete records from Tables==
============================== */
function deleteTblParams($tbl, $params) {
	
	global $db;
	
	$query = $db->query(sprintf("DELETE FROM %s WHERE %s ", $tbl, $params));
	
	if ($result) { return 1; } else { return '0'; }
	
}


/* ==============================
==== Query Tables Multi params ==
============================== */
function queryTblParams($tbl, $params) {
	
	global $db;
	
	$query = $db->query(sprintf("SELECT * FROM %s WHERE %s ", $tbl, $params));
	
	$result = $query->fetch_assoc();
	
	if (!empty($result)) { return $result; } else { return '0'; }
	
}

/* ==========================
==== Query Tables         ==
========================== */
function queryTbl($tbl, $id) {
	
	global $db;
	
	$query = $db->query(sprintf("SELECT * FROM %s WHERE `id` = '%s' ", $tbl, $id));
	
	$result = $query->fetch_assoc();
	
	if (!empty($result)) { return $result; } else { return '0'; }
	
}

/* ==========================
==== Update Tables         ==
========================== */
function updateTblVal($tbl, $id, $val) {
	
	global $db;
	
	$query = $db->query(sprintf("UPDATE %s SET %s WHERE `id` = '%s' ", $tbl, $val, $id));
	
	if ($query) { return '1'; } else { return '0'; }
	
}
/* ==========================
==== Add new comment       ==
========================== */
function addNewComment($post, $sender = null) {

	global $db, $dbaser, $member;
	
	if (!empty($member['id'])) {

		$FullAdmin = new FullAdmin;
		$FullAdmin->db = $db;
		
		$comment = $db->real_escape_string($post['comment']);
		$type_id = $db->real_escape_string($post['type_id']);
		$type = $db->real_escape_string($post['type']);
		if ($type == 'post') {$table = 'posts'; } else {$table = $type; } 
		
		$user_data = $FullAdmin->GetMember_by_name($member['name']);
	
	}
	
	if (isset($user_data)) {
			
		$dbaser->where(' `id` ', $type_id);
		$check_result = $dbaser->getOne($table);

		if (is_array($check_result)) {
			
			if ($type == 'media' ) {
				$user = $check_result['author'];
			} elseif ($type == 'pages') {
				$user = '';
			} else {
				$user = $check_result['user'];
			}
				

			$query = $db->query(
				sprintf(
						"INSERT INTO `comments` (`comment`, `user`, `type`, `type_id`) VALUES ('%s', '%s', '%s', '%s') ",
						$comment, 
						$user_data['id'], 
						$type, 
						$type_id 
					)
				);
	
			if ($query) {
			
				$set = updateTblVal($type, $type_id, ' `comments` = `comments` + 1 ');
				
				if ($set) {$output = 1;} else {$output = $set;}
				
				if ($type !== 'pages') {
					add_notification($user, '2', $type_id, $type);
				}
			
				$output = 1;
			}

		} else {
			$output = "Can not add your Comment! ";
		}
	
	}
	
	return $output;
	
}

//-----------------
// Quick functions
//-----------------
function GetMember($name) {
	global $dbaser;
	
	$dbaser->where('name', $name);
	
	$row = $dbaser->getOne('members');
	
	return $row;
}

function GetMemberID($id) {
	global $db;
	
	$id = $db->real_escape_string($id);
	
	if (!empty($id) && $id !== '0') {
	
		$query = sprintf("SELECT * FROM `members` WHERE `id` = '$id' ");
		
		$result = $db->query($query);
		
		$row = $result->fetch_array();
			
		if($result == null){
				
			return '1';
					
		} else {
			return $row;
		}
	}
}

function NotFound() {
	
	global $CONF, $LANG_ARRAY;

	return '
	<div class="wrapper">
		<div class="ui negative icon message">
			<i style="font-size: 40px; padding-right: 20px;" class="icon-lock pull-left"></i>	
			<div class="content">
				<div class="header">
				'.$LANG_ARRAY['LANG_404'].'
				</div>
				<p>Back to <a href="'.$CONF['url'].'">Home</a> and try again</p>
			</div>
		</div>
	</div>';
	
}


function NotItems($title) {
	global $CONF, $LANG_ARRAY;
	
	return '
	
		<div class="ui  icon ">	
			<p>'.$LANG_ARRAY['LANG_NO_HERE'].' '.$title.' '.$LANG_ARRAY['LANG_YET'].'</p>
		</div>
	';
	
}



function media_type($type) {
	
	if ($type == '1') { $return = 'm3'; }
	if ($type == '2') { $return = 'm1'; }
	if ($type == '3') { $return = 'm2-t'; }
	if ($type == '4') { $return = 'pic'; }
	if ($type == '5') { $return = 'ch'; }
	if ($type == '6') { $return = 'al'; }
	return $return; 
}


function LoginFirst() {
	
	global $LANG_ARRAY;

	return '
	
		<div class="ui negative icon message">
			<i style="font-size: 22px; padding-right: 10px;" class="icon-lock pull-left"></i>	
			<div class="content">
				<p>'.$LANG_ARRAY['LANG_LOG_FIRST'].'</p>
			</div>
		</div>';
	
}

function viewMessage($title, $type = null) {
	
	if (!empty($type)) { $class="positive";} else {$class="negative";}
	
	return '
	
		<div class="ui '.$class.' icon message">
			<i style="font-size: 22px; padding-right: 10px;" class="icon-question pull-left"></i>	
			<div class="content">
				<p>'.$title.'</p>
			</div>
		</div>';
	
}

function sendHtmlMail($send_to, $subject, $name, $welcome_message, $message, $template) {

	global $Setting, $CONF;

	// $send_to = $member['email'];
	// $subject = 'Wishlist items'; 
	// $name = $member['realname'];
	// $welcome_message = 'Your wishlist items';
	// $message = 'Your wishlist';
	// $template = 'mail';

	// sendHtmlMail($send_to, $subject, $name, $welcome_message, $message, $template);

	$dummy = ''; 

	$logo = $CONF['url'].'image.php?w=200&img=pic&src='.$Setting['logo'];
	$from = $Setting['sender_email'];
	$fromname = $Setting['sitename'];

	$mail_template = file_get_contents($_SERVER['DOCUMENT_ROOT'].$CONF['path'] .'/assets/email_templates/'.$template.'.html');

	$message_content = sprintf($mail_template, $logo, $welcome_message, $message, $CONF['url'], $dummy, $dummy);

	if (!filter_var($send_to, FILTER_VALIDATE_EMAIL)) {

		return 'Check your sender mail at your setting';

	} else {

		$send_mail = send_html_mail($from, $send_to, $name, $subject, $message_content);

		if(!empty($send_mail)){
			return 1;
		}
	}
} 

function send_html_mail($from, $email, $name, $subject, $message) {
	
	global $Setting;

	$output = '';

	$mail = new PHPMailer;

	//Tell PHPMailer to use SMTP
	//$mail->isSMTP();

	$mail->isMail();
	// Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	// Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	$mail->CharSet = 'UTF-8';
	// Set the hostname of the mail server
	$mail->Host = "smtp.gmail.com";
	// Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 587;
	// Set the encryption system to use - ssl (deprecated) or tls
     
	$mail->SMTPSecure = 'tls';
	// Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	// Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "emadtab97@gmail.com";

	// Password to use for SMTP authentication
	$mail->Password = "emad01026903031";
	// Set who the message is to be sent from
	$mail->From = $from;
    $mail->FromName = $Setting['sitename'];
	$mail->setFrom( $from  , $Setting['sitename']);
	// Set an alternative reply-to address
	$mail->addReplyTo( $from , $Setting['sitename']);
	// Set who the message is to be sent to
	$mail->addAddress(  $email ,  $name );
	// $mail->addAddress("emadtab97@gmail.com" , $subject );
	// Set the subject line
	$mail->Subject = $subject;
	// Read an HTML message body from an external file, convert referenced images to embedded,
	// convert HTML into a basic plain-text alternative body
	// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	// Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';

	$mail->Body  =  $message ;
	
	if ($mail->send()) {
		$output = '1';
	} else {
		$output = 0;
	}

	return $output;    
}		

function user_location() {

	$ipdetails = new IPDetails(null);
	return $ipdetails->vsipdetails();
}


//---------------------------------
// Set $setting variable as global
//---------------------------------
$FullAdmin = new FullAdmin(); $Members = new Members();
$FullAdmin->db = $db; $Members->db = $db;

$Setting = $FullAdmin->siteSetting();

/*///////////////////////
 CHeck language session  
///////////////////////*/
$_COOKIE['lng'] = isset($_COOKIE['lng']) ? $_COOKIE['lng'] : $Setting['language'];

CheckLanguages();

include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/comments.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/web-pages.php");			
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/templates.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/plugins.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/hooks.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/PHPMailer/PHPMailerAutoload.php");  
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/upload.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/media.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/user.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/post.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/search.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/chat.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/actions.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/notifications.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/cart.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/withdrawal.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/plans.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/ipdetails.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/countries.php");
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."classes/languages/".$_COOKIE['lng'].".php");

$action_class = new action(); $user_class = new user(); $note_class = new notifications; $chat_class = new chat;  $media_class = new media;   $cart_class = new cart; 
$action_class->db = $db;  $user_class->db = $db;  $note_class->db = $db;   $chat_class->db = $db;  $media_class->db = $db;  $cart_class->db = $db;
	
if(isset($_SESSION['membername']) || !empty($_SESSION['membername'])) {		
	$member = GetMember($_SESSION['membername']);
} else {
	$member = '';
}
		
include($_SERVER['DOCUMENT_ROOT'].$CONF['path'] ."templates/".$Setting['template']."/functions.php");
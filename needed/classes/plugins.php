<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

	
	
function PluginsCats() {
	
	global $CONF;
	
	$output = '';
	
	$dir = './extensions/layout/';
	
	if ($handle = opendir($dir)) {

		while (false !== ($entry = readdir($handle))) {

			if ($entry != "." && $entry != ".." && $entry != "index.html") {
				
				$output .= '
                        <tr>
                          <td>
                            <span class=""> '.$entry.' </span> 
                          </td>
                          <td>
                            <a href="' . $CONF['url'] .'admin/plugins/'. $entry.'"> View plugins </span> 
                          </td>
                         
                        </tr>';
			}
		}

		closedir($handle);
	}

	return $output;
}


function load_Plugins( $cat = null, $status) {
	
	global $CONF, $db;
	
	$output = ''; $found = '';
	
	$dir = $CONF['plugins'] . $cat;
	
	if ($handle = opendir($dir)) {

		while (false !== ($entry = readdir($handle))) {

			if ($entry != "." && $entry != ".." && $entry != "index.html") {
				
				$path = $dir . '/' . $entry;
				
				include($dir.'/'.$entry.'/info.php');
				
				$query_plugins = queryPlugins($entry, $status);
				
				if (is_array($query_plugins) && !empty($query_plugins)) {
					
					$found = '1';
					
				} else {
					
					$query = get_plugin($entry);
					
					if (empty($query)) {
						$query = install_plugin($plugin_name, $plugin_type, $path, $plugin_desc, $entry, $plugin_version);
						if ($query == 1) { $found = '1'; }
					}
					
				}
				
				if ($found == '1') { 
					
					$output .= plugins_list_admin($query_plugins , $entry);
					
				}
			}
		}

		closedir($handle);
	}

	return $output;
}

function plugins_list_admin($rows , $id) {
	
	global $CONF, $db;
	
	$output = '';
	
	$dir = $CONF['plugins'] . $id;
	
	if ($rows) {	
	
		foreach ($rows as $row) {
			
			if ($row['status'] == 1) {$state = 'Uninstall'; $class = 'enabled_plugin';} else {$state = 'Install'; $class = 'disabled_plugin';} 
			
			$output .= '
							<tr class="'.$class.'">
							  <td>
							  '.$row['name'].' <a data-title="set_plugin" id="set_action" data-id="'.$row['link'].'"><button type="button" class="pull-right btn btn-shadow btn-info">'.$state.'</button></a>
							  </td>
							  <td>
								'.$row['desc'].'
							  </td>
							  <td>
								<img class="plugin-thumbnail" src="'.$CONF['url'] . $dir .'/'. $row['link'] .'/'. 'preview.png" />
							  </td>
							</tr>';
		}
	}
	
	return $output;
}


function install_plugin($plugin_name, $type, $path, $plugin_desc, $entry, $plugin_version) {
	
	global $db;
	
	$rows = '';
	
	$query = $db->query(sprintf("INSERT INTO `plugins` (`name`, `type`, `path`, `desc`, `link`, `version`, `status`) VALUES  ('%s','%s','%s','%s','%s','%s', 0 ) "
	, $plugin_name, $type, $path, $plugin_desc, $entry, $plugin_version));
					
	if ($query) { $found = '1'; }
	
	return $found;
	
}


function queryPlugins($cat = null, $status) {
	
	global $dbaser;
	
	if (empty($cat)) {
		$dbaser->where(' `type` ', 'payment', '!=');
	}

	$dbaser->where(' link ', $cat);
	$dbaser->where(' status ', $status);
	$result = $dbaser->get('plugins');
	
	return $result;
}

function update_plugin($link) {
	
	global $dbaser;
	
	$check = get_plugin($link);
	
	$data = array('status' => empty($check['status']) ? '1' : 0);
	$dbaser->where(' link ', $link);
	$dbaser->update(' plugins ', $data);

	return 1;
		
}

function get_plugin($link = null) {
	
	
	global $dbaser;
	
	$dbaser->where(' link ', $link);
	$result = $dbaser->getOne('plugins');

	return $result;
	
}


function queryPlugins_list() {
	
	global $dbaser;
	
	$dbaser->where(' status ', '1');
	$result = $dbaser->get('plugins');
	
	return $result;
	
}

function queryPlugins_type($type) {
	
	global $dbaser;
	
	$dbaser->where('type', $type);
	$dbaser->where('status', 1);
	$return = $dbaser->get('plugins');
	
	return $return;
	
}


function get_plugins_select() {
	
	$output = '';
	
	$rows = queryPlugins_list();

	foreach ($rows as $row) {
		
		$output .= '<option value="'.$row['link'].'"> '.$row['name'].' </option>';
		
	}	
	
	return $output;
}



function load_plugin_files($link) {

	$output = '';
	
	$plugin = queryPlugins($link, 1);
	
	if ($plugin) {
		
		$plugin_path = $plugin[0]['path'];
		
		if ($handle = opendir($plugin_path)) {
			
			$output = $plugin_path;
			
		} else {
			$output = 'error';
		}
		
	} else {
		$output = 'error';
	}
	
	return $output;
}





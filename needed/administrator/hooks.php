<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------------
	// Require template file
	//-----------------------
	if (isset($_GET['id'])) {
		
		$template = get_template_position(null);
		
		$hook_page_array = array('id'=>'ALL', 'title'=>'All pages');

		$current_pages = pages_query();

		array_unshift($current_pages, $hook_page_array);

		$plugin_path = load_plugin_files($_GET['id']);
		
		if ($plugin_path == 'error') {
			
			$profile = new Template("./administrator/tpl/error.tpl");
			$profile->set("Message", 'Plugin not found or disabled by administrator');

		} else {
			
			$plugin = include($plugin_path.'/admin.php');
			$hook_data = array();
			
			if (isset($_GET['type']) && $_GET['type'] != 'new') {
			
				$hook_data = get_hook_id($_GET['type']);
				
				if (!empty($hook_data)) {

					$hook_pages = multi_select_active( unserialize($hook_data['pages']), $current_pages);
					$template = get_template_position($hook_data['position']);
					$form_type = 'edit_hook';
					$hook_title = $hook_data['title'];
					$hook_id = $hook_data['id'];
					$hook_publish = option_toChecked($hook_data['publish']);
					
				}
				
			} else {
				
				$hook_pages = multi_select_active( array(), $current_pages);
				$form_type = 'new_hook';
				$hook_id = '';
				$hook_title = '';
				$hook_publish = '';
			
			}
			
			$profile = new Template("./administrator/tpl/hook.tpl");
			
			$profile->set("form_type", $form_type );
			$profile->set("plugin_name", $plugin_name );
			$profile->set("plugin_link", $plugin_link );
			$profile->set("plugin_template", $Setting['template'] );
			$profile->set("positions", $template );
			$profile->set("pages", $hook_pages );
			$profile->set("hook_id", $hook_id);
			$profile->set("hook_title", $hook_title);
			$profile->set("hook_pages", $hook_pages);
			$profile->set("hook_publish", $hook_publish);
			$profile->set("plugin", $plugin);
		}
		
	} else {
		
		$hooks_rows = load_hooks(); $hooks = '';
		
		if (!empty($hooks_rows)) {
			
			foreach ($hooks_rows as $row) {
				
				$hooks .= '<tr id="admin'.$row['id'].'">
                          <td>'. $row['id'] .' </td>
                          <td>'. $row['title'] .' </td>
                          <td>[--@plugin='. $row['plugin'] .' --@id= '.$row['id'].' --]</td>
                          <td>'.$row['position'].'</td>
                          <td>'. $row['publish'] .' </td>
                          <td>
								<span><a class="btn btn-info btn-sm require-form" href="'.$CONF['url'].'admin/hooks/'.$row['plugin'].'/'.$row['id'].'" >
									<i class="fa fa-edit"></i>
								</a></span>
							</td>
							<td>
								<span><a class="btn btn-danger btn-sm confirm-form" data-id="'.$row['id'].'" data-type="del_hook"  href="#ConfirmModal" data-title="Are you sure you want to delete '.$row['title'].'" data-toggle="modal" data-placement="bottom">
									<i class="fa fa-times"></i>
								</a></span>
							</td>
                        </tr>';
		
			}
		}
		
		
		$profile = new Template("./administrator/tpl/hooks.tpl");
		$profile->set("hooks_list", $hooks );
		$profile->set("pagename", $Setting['sitename']);
		$profile->set("sitename", $Setting['sitename']);
		$profile->set("url", $CONF['url']);
		$profile->set("path", $CONF['path']);
	
	
	}
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return $profile->output();
	
	
?>
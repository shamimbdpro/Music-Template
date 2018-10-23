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
		$profile = new Template("./administrator/tpl/pages.tpl");
		$profile->set("pages_list", getPage($_GET['id']) );
	} else {
		
		$rows = loadPages(); $pages ='';
		
		$home = page_query_home();
		
		if (!empty($rows)) {
		
			foreach ($rows as $row) {
			
				if ($home['id'] == $row['id']) {
					$set_home = '<i class="fa fa-home "></i>';
				} else {
					$set_home = '<a class="btn btn-success btn-sm" id="set_action" data-id="'.$row['id'].'" data-title="set_home" ><i class="fa fa-home"></i></a>';
				}
				
				$pages .= '
							<tr>
								<td>'.$row['title'].'</th>
								<td>'.$row['prefix'].'</th>
								<td>'.$row['template'].'</th>
								<td>'.$row['layout'].'</th>
								<td>'.$row['publish'].'</th>
								<td>
									<span> '.$set_home.' </span>
								</td>
								<td>
									<span><a class="btn btn-info btn-sm require-form" data-id="'.$row['id'].'" data-title="Edit Page" data-require="edit_page" href="#MinModal" data-toggle="modal" data-placement="bottom">
										<i class="fa fa-edit"></i>
									</a></span>
								</td>
								<td>
									<span><a class="btn btn-danger btn-sm confirm-form" data-id="'.$row['id'].'" data-type="del_page"  href="#ConfirmModal" data-title="Are you sure you want to delete '.$row['title'].'" data-toggle="modal" data-placement="bottom">
										<i class="fa fa-times"></i>
									</a></span>
								</td>
							</tr>
				';
			}
		}
		
		$profile = new Template("./administrator/tpl/pages_list.tpl");
		$profile->set("pages_list", $pages );
	}
	
	$profile->set("pagename", 'Active Pages ');
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
	
	
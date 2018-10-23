<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	if (isset($_GET['id'])) {
		
		$query_type = MediaNameToNumber($_GET['id']);
		
		$rows = $FullAdmin->loadCats($query_type);  $output = '';
	
		if (!empty($rows)) {
			
			foreach ($rows as $row) {
		
				$cat = $FullAdmin->getCategory($row['mother']);
				
				$output .= '
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['title'].'</td>
								<td>'.$cat['title'].'</td>
								<td>'.$row['publish'].'</td>
								<td>
									<span><a class="btn btn-info btn-sm require-form" data-id="'.$row['id'].'" data-title="Edit Category" data-type="'.$query_type.'" data-require="edit_media_cat" href="#MinModal" data-toggle="modal" data-placement="bottom">
										<i class="fa fa-edit"></i>
									</a></span>
								</td>
								<td>
									<span><a class="btn btn-danger btn-sm confirm-form" data-id="'.$row['id'].'" data-type="del_cat"  href="#ConfirmModal" data-title="Are you sure you want to delete '.$row['title'].'" data-toggle="modal" data-placement="bottom">
										<i class="fa fa-times"></i>
									</a></span>
								</td>
							</tr>
				';
			}
		}
		
		//-----------------------
		// Require template file
		//-----------------------	
		$profile = new Template("./administrator/tpl/media_cats.tpl");	
		$profile->set("cats_list", $output );
		$profile->set("pagename", $_GET['id'] . ' categories ');
		$profile->set("sitename", $Setting['sitename']);
		$profile->set("url", $CONF['url']);
		$profile->set("path", $CONF['path']);
		$profile->set("cat_type", $query_type);
	
	} else {
		$profile = new Template("./administrator/tpl/error.tpl");	
		$profile->set("Message", 'Page not found' );
	}	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
	
	
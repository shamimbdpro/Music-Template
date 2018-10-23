<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	$rows = $FullAdmin->loadCats(0);  $output = '';
	
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
								<span><a class="btn btn-info btn-sm require-form" data-id="'.$row['id'].'" data-title="Edit Category" data-require="edit_cat" href="#MinModal" data-toggle="modal" data-placement="bottom">
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
	$profile = new Template("./administrator/tpl/cats.tpl");	
	$profile->set("cats_list", $output );
	$profile->set("pagename", 'All Categories ');
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
	
	
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
	if (isset($_GET['id'])  ) {
		
		$dbaser->where(' id ', $_GET['id']);
		$post = $dbaser->getOne(' posts ');
		
		if ( $_GET['id'] == 'new' ) {
			
			$holder = '<img src="" id="photo" alt="">';
			
			$profile = new Template("./administrator/tpl/post.tpl");
			$profile->set("id", '' );
			$profile->set("cats_select", list_options_active(null , $FullAdmin->loadCats(0)));
			$profile->set("title", '' );
			$profile->set("short", '' );
			$profile->set("full", '' );
			$profile->set("img", '' );
			$profile->set("publish", 'checked' );
			$profile->set("holder", $holder );
			
		} elseif (isset($post)  && $_GET['id'] != 'new' ) {
		
			$holder = '<img src="'.$CONF['url'].'media/photos/'.$post['photo'].'" id="photo" alt="">';
		
			$profile = new Template("./administrator/tpl/post.tpl");
			$profile->set("id", $post['id'] );
			$profile->set("title", $post['title'] );
			$profile->set("short", $post['short'] );
			$profile->set("full", $post['content'] );
			$profile->set("img", $post['photo'] );
			$profile->set("publish", option_toChecked($post['publish']) );
			$profile->set("cats_select", list_options_active($post['cat'] , $FullAdmin->loadCats(0)) );
			$profile->set("holder", $holder );
		} else {
			$profile = new Template("./administrator/tpl/error.tpl");
			$profile->set("Message", 'Post id not found' );
			
		}
		
	} else {
		
		$rows = $FullAdmin->loadPosts();
		$output = '';
		
		if (isset($rows)) 
		{
			foreach ($rows as $row) {
		
				$cat = $FullAdmin->getCategory($row['cat']);
				
				if ($row['author'] == '0') {$author = $FullAdmin->getAdmin($row['admin']);} else {$author = $FullAdmin->GetMember($row['author']);} 
				
				$output .= '
						<tr id="admin'.$row['id'].'">
							<td>'.$row['id'].'</th>
							<td>'.$row['title'].'</th>
							<td>'.$cat['title'].'</th>
							<td>'.$author['name'].'</th>
							<td>'.$row['publish'].'</th>
							<td>
								<span><a class="btn btn-default btn-sm require-form" href="'.$CONF['url'].'admin/posts/'.$row['id'].'" >
									<i class="fa fa-edit"></i>
								</a></span>
							</td>
							<td>
								<span><a class="btn btn-danger btn-sm confirm-form" data-id="'.$row['id'].'" data-type="del_post"  href="#ConfirmModal" data-title="Are you sure you want to delete '.$row['title'].'" data-toggle="modal" data-placement="bottom">
									<i class="fa fa-times"></i>
								</a></span>
							</td>
						</tr>
				';
				
			}
		}
	
		
		$profile = new Template("./administrator/tpl/posts.tpl");
		$profile->set("pages_list", $output );
	}
	
	$profile->set("pagename", 'Posts ');
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
	
	
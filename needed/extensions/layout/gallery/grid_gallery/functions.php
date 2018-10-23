<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	function grid_gallery_data($query, $tpl) {
	
		global $CONF;
			
		$posts = '';
		
		if (isset($query)) {	
			
			foreach ($query as $key => $slide) {
				
				if ($slide['photo'] > 0 && !is_array($slide['photo']) ) {
					
					$tpl->set("url", $CONF['url']);
					$tpl->set("class", $key);
					$tpl->set("title", $slide['title']);
					$tpl->set("img", $slide['photo']);
					$posts .= $tpl->output();
				}	
			}
				return $posts;
		}
	}
	
	// Get slides 
	function get_grid_gallery($query) {
		
		global $CONF;
			
		$works = ''; $id = '';
		
		$works .= '<div id="works_container">';
			
		if (isset($query)) {	
			
			unset($query['columns']);
			
			foreach ($query as $key => $slide) {
				
				if ($slide['photo'] > 0 && !is_array($slide['photo']) ) {
					
					$img_url = $CONF['url'].'image.php?src='.$slide['photo'].'&w=200%h=150&img=pic';
					
					$id = str_replace('slide' , '' , $key);
					
					
					$works .= '<div id="works_container"><div class="form-group"><label class="control-label col-lg-2">Title </label><div class="col-lg-10"><input type="text" name="options['.$key.'][title]" value="'.$slide['title'].'" class="form-control"></div></div><div class="form-group"><label class="control-label col-lg-2">Image </label><div class="col-lg-10"><div class="fileinput-new thumbnail"><img id="photo'.$id.'" src="'.$img_url.'"></div><a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library"><span class="fileinput-new">Select image</span> <input type="hidden" id="photo'.$id.'" name="options['.$key.'][photo]"  value="'.$slide['photo'].'" ></a><span id="empty_media_slct" data-id="photo'.$id.'" class="btn btn-default">Empty</span></div></div><div class="clear clearfix"></div><p> </p></div>';				
				
				} else {
					$works .= '';
				}		
			}	
		}
		
		$works .= '</div>';
			
		$new_id = $id + 1;
			
		$works .= '
			<div class="form-group">
				<label class="control-label col-lg-2">Add new work </label>
				<div class="col-lg-10">
					<span id="add_form_in_ajax" data-type="lighbox" data-id="'.$new_id.'" class="btn btn-default">Add new work</span> 
				</div>
			</div>';
			
		return $works;
	}	
	
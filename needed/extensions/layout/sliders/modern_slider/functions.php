<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	// Get slider options 
	function modern_slider_options($content = null) {
		
		$types = array('Slide Out' => 'type1','Flip Out' => 'type2','Double Flip Out' => 'type3','Both ways' => 'type4');
		
		$output = '';
		$output .= '<select data-placeholder="Choose hook position ..." name="options[type]" class="form-control chzn-select" tabindex="2">';
		
		foreach ($types as $key => $type) {
			
			if ($content == $type) {$active = 'selected';} else {$active = '';}
			
			$output .= '<option '.$active.' value="'.$type.'">'.$key.'</option>';
		
		}
		$output .= '</select>';
		
		return $output;
	}
	
	
	
	
	// Get slides 
	function modern_slider_func($query , $tpl) {
		
		global $CONF;
			
		$posts = '';
		
		if (isset($query)) {	
			
			unset($query['type']);
				
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
	
	function modern_slider_admin_func($query) {
		
		global $CONF;
			
		$works = ''; $id = '0';
		
		$works .= '<div id="works_container">';
			
		if (isset($query) && $query > 0) {	
			
			unset($query['type']);
			
			foreach ($query as $key => $slide) {
				
				if ($slide['photo'])  {
					
					$img_url = $CONF['url'].'image.php?src='.$slide['photo'].'&w=200%h=150&img=pic';
					
					$id = str_replace('slide' , '' , $key);
					
					$works .= '
						<div class="form-group">
							<label class="control-label col-lg-2">Image of the slider </label>
							<div class="col-lg-10">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"><img  id="photo'.$id.'" src="'.$img_url.'" /></div>
								<a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library" ><span class="fileinput-new">Select image</span> <input type="hidden" id="photo'.$id.'" name="options['.$key.'][photo]" value="'.$slide['photo'].'"></a>
								<span id="empty_media_slct" data-id="photo1" class="btn btn-default">Empty</span> 
								<p></p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Title of the slider </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][title]" value="'.$slide['title'].'"  placeholder="Title for the slider" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Text of the slider </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][text]" value="'.$slide['text'].'"  placeholder="Text for the slider" class="form-control">
							</div>
						</div>
					';				
				
				} else {
					$works .= '';
				}		
			}	
		}
		
		$works .= '</div>';
			
		$new_id = $id + 1;
			
		$works .= '
			<div class="form-group">
				<label class="control-label col-lg-2">Add new slide </label>
				<div class="col-lg-10">
					<span id="add_form_in_ajax" data-type="slide" data-id="'.$new_id.'" class="btn btn-default">Add new slide</span> 
				</div>
			</div>';
			
		return $works;
	}	
	
	
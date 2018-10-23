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
	function filter_gallery_options($content = null) {
		
		$types = array('Fullwidth (No space)' => 'type1','Centered (No space)' => 'type2','Centered (With space)' => 'type3');
		
		$output = '';
		$output .= '<select data-placeholder="Choose Style ..." name="options[type]" class="form-control chzn-select" tabindex="2">';
		
		foreach ($types as $key => $type) {
			
			if ($content == $type) {$active = 'selected';} else {$active = '';}
			
			$output .= '<option '.$active.' value="'.$type.'">'.$key.'</option>';
		
		}
		$output .= '</select>';
		
		return $output;
	}
	
	
	
	function unique_multidim_array($array, $key) { 
	
		$temp_array = array(); 
		
		$i = 0; 
		
		$key_array = array(); 
		
		foreach($array as $val) { 
			
			if (!in_array($val[$key], $key_array)) { 
				
				print_r($val[$key]);
				
				$key_array[$i] = $val[$key]; 
				
				$temp_array[$i] = $val; 
			} 
			
			$i++; 
		} 
		
		return $temp_array; 
	} 
	
	// Get slides 
	function filter_gallery_tags($query) {
		
		global $CONF;
			
		$posts = '';
		
		if (isset($query['cats'])) {	
			
			$rows = $query['cats'];
			
			foreach ($rows as $work) {
			
				$posts .= '<li><a class="" href="#" data-filter=".'.$work['tag'].'"><h5>'.$work['title'].'</h5></a></li>';
					
			}
			return $posts;
		}
	}	
	
	// Get slides 
	function filter_gallery_tags_view($query) {
		
		global $CONF;
			
		$cats = '';
		
		if (isset($query['cats'])) {	
			
			$rows = $query['cats'];
			
			$cats .= ' <div id="cats_container">';
			
			foreach ($rows as $key => $work) {
			$cats .= '
			<div class="form-group">	
				<label class="control-label col-lg-2">Title </label>
				<div class="col-lg-5">
					<input type="text" name="options[cats]['.$key.'][title]" value="'.$work['title'].'" class="form-control">
				</div>
				<div class="col-lg-5">
					<input type="text" name="options[cats]['.$key.'][tag]" value="'.$work['tag'].'" class="form-control">
				</div>
			</div>';
					
			}
			$cats .= '</div>';
			return $cats;
		}
	}	
	
	// Get slides 
	function filter_gallery_func($query , $tpl) {
		
		global $CONF;
			
		$posts = '';
		
		if (isset($query)) {	
			
			unset($query['type'], $query['cats']);
			
			foreach ($query as $key => $slide) {
				
				if ($slide['photo'] > 0 && !is_array($slide['photo']) ) {
					
					$tpl->set("url", $CONF['url']);
					$tpl->set("class", $key);
					$tpl->set("title", $slide['title']);
					$tpl->set("text", $slide['text']);
					$tpl->set("tag", $slide['tag']);
					$tpl->set("img", $slide['photo']);
					$posts .= $tpl->output();
				}	
			}
			return $posts;
		}
	}	
	
	function filter_gallery_admin_func($query) {
		
		global $CONF;
		
		$works = ''; $id = '';
		
		if (isset($query['cats'])) {$id = count($query['cats']);}
		
		$works .= '<div id="works_container">';
			
			$new_id = $id + 1;
			
			$works .= '
			<div id="cats_container"></div>
			<div class="form-group">
				<label class="control-label col-lg-2">Add new Category </label>
				<div class="col-lg-10">
					<span id="add_forms_in_ajax" data-type="cat" data-id="'.$new_id.'" class="btn btn-default">Add new Category</span> 
				</div>
			</div>';
			
		if (isset($query) && $query > 0) {	
			
			unset($query['type']);
			
			
			foreach ($query as $key => $slide) {
				
				if (isset($slide['photo']))  {
					
					$img_url = $CONF['url'].'image.php?src='.$slide['photo'].'&w=200&h=150&img=pic';
					
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
							<label class="control-label col-lg-2">Work title </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][title]" value="'.$slide['title'].'"  placeholder="Title for the slider" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Custom text </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][text]" value="'.$slide['text'].'"  placeholder="Text for the slider" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Work tag (lowercase) </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][tag]" value="'.$slide['tag'].'"  placeholder="Text for the slider" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2">Work link </label>
							<div class="col-lg-10">
								<input type="text" name="options['.$key.'][link]" value="'.$slide['link'].'"  placeholder="Text for the slider" class="form-control">
							</div>
						</div>
					';				
				
				} else {
					$works .= '';
				}		
			}	
		}
		
		$works .= '</div>';
			
		$works .= '
			<div class="form-group">
				<label class="control-label col-lg-2">Add new slide </label>
				<div class="col-lg-10">
					<span id="add_form_in_ajax" data-type="slide" data-id="'.$new_id.'" class="btn btn-default">Add new slide</span> 
				</div>
			</div>';
			
		return $works;
	}	
	
	
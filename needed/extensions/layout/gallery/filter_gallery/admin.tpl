
            <div class="form-group">
				<label class="control-label col-lg-2">Slider style</label>
				<div class="col-lg-10">
					[@types]
				</div>
			</div>
				
			[@cats]
			[@slides]
			
			<div class="clear clearfix"></div>
			<p> </p>
			  
				
<script>

$('body').on('click', '#add_form_in_ajax', function(e){
	
	var id = $(this).attr('data-id');
	var num = +$(this).attr('data-id') + 1;
	$(this).attr('data-id' , num);
	
	var img = '<div class="form-group"><label class="control-label col-lg-2">Image </label><div class="col-lg-10"><div class="fileinput-new thumbnail"><img  id="photo' + id + '" src="" /></div><a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library" ><span class="fileinput-new">Select image</span> <input type="hidden" id="photo' + id + '" name="options[slide' + id + '][photo]" value=""></a><span id="empty_media_slct" data-id="photo' + id + '" class="btn btn-default">Empty</span></div></div>';
	var title = '<div class="form-group"><label class="control-label col-lg-2">Title </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][title]" class="form-control"></div></div>';
	var link = '<div class="form-group"><label class="control-label col-lg-2">Link </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][link]" class="form-control"></div></div>';
	var tag = '<div class="form-group"><label class="control-label col-lg-2">Tag (lowercase text) </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][tag]" class="form-control"></div></div>';
	var text = '<div class="form-group"><label class="control-label col-lg-2">Describtion </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][text]" class="form-control" ></div></div>';
	var clear = '<div class="clear clearfix"></div><p> </p>';
	
	$('#works_container').append(img).append(title).append(text).append(tag).append(link).append(clear);
	
});

$('body').on('click', '#add_forms_in_ajax', function(e){
	
	var id = $(this).attr('data-id');
	var num = +$(this).attr('data-id') + 1;
	$(this).attr('data-id' , num);
	
	var cat_title = '<div class="form-group"><label class="control-label col-lg-2">Title </label><div class="col-lg-5"><input type="text" name="options[cats][cat' + id + '][title]" class="form-control"></div><div class="col-lg-5"><input type="text" name="options[cats][cat' + id + '][tag]" class="form-control"></div></div>';
	var clear = '<div class="clear clearfix"></div><p> </p>';
	
	$('#cats_container').append(cat_title).append(clear);
	
});

</script>


			
            <div class="form-group">
				<label class="control-label col-lg-2">Slider interval </label>
				<div class="col-lg-10">
					<input type="text" name="options[max]" placeholder="Default is 5000" class="form-control" value="[@max]">
				</div>
			</div>
			
            <div class="form-group">
				<label class="control-label col-lg-2">Show arrows </label>
				<div class="col-lg-10">
					<input class="make-switch" type="checkbox" name="options[arrows]" data-size="normal" [@arrows]>
				</div>
			</div>
				
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
	var text = '<div class="form-group"><label class="control-label col-lg-2">Slide text </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][text]" class="form-control" ></div></div>';
	var more = '<div class="form-group"><label class="control-label col-lg-2">(readmore) of the slider </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][more]" class="form-control" ></div></div>';
	var link = '<div class="form-group"><label class="control-label col-lg-2">Full url </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][link]" class="form-control" ></div></div>';
	var clear = '<div class="clear clearfix"></div><p> </p>';
	
	$('#works_container').append(img).append(title).append(text).append(more).append(link).append(clear);
	
});

</script>


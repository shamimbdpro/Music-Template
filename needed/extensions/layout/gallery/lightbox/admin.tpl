			
            <div class="form-group">
				<label class="control-label col-lg-2">Columns number </label>
				<div class="col-lg-10">
					<select data-placeholder="Columns number for showcase ..." name="options[columns]" class="form-control chzn-select" tabindex="4">
						<option value="col-md-3 col-sm-6" >Four columns </option>
						<option value="col-md-4 col-sm-6" >Three columns </option>
						<option value="col-md-6 col-sm-6" >Two columns </option>
						<option value="col-md-12">One columns </option>
					</select>
				</div>
			</div>
			
			[@works]
			
			<div class="clear clearfix"></div>
			<p> </p>
			
			
<script>

$('body').on('click', '#add_form_in_ajax', function(e){
	
	var id = $(this).attr('data-id');
	var num = +$(this).attr('data-id') + 1;
	$(this).attr('data-id' , num);
	
	var img = '<div class="form-group"><label class="control-label col-lg-2">Image </label><div class="col-lg-10"><div class="fileinput-new thumbnail"><img  id="photo' + id + '" src="" /></div><a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library" ><span class="fileinput-new">Select image</span> <input type="hidden" id="photo' + id + '" name="options[slide' + id + '][photo]" value=""></a><span id="empty_media_slct" data-id="photo' + id + '" class="btn btn-default">Empty</span></div></div>';
	var title = '<div class="form-group"><label class="control-label col-lg-2">Title </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][title]" class="form-control"></div></div>';
	var link = '<div class="form-group"><label class="control-label col-lg-2">Full url </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][link]" class="form-control" ></div></div>';
	var tag = '<div class="form-group"><label class="control-label col-lg-2">Work tag </label><div class="col-lg-10"><input type="text" name="options[slide' + id + '][tag]" class="form-control" ></div></div>';
	var clear = '<div class="clear clearfix"></div><p> </p>';
	
	$('#works_container').append(title).append(link).append(tag).append(img).append(clear);
	
});

</script>


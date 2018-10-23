
	<div class="ui modal add_album">
		<div class="header">
		  [@LANG_CREATE_ALBUM]
		</div>
		<div class="content">
		  <div class="description">
			<h5> [@LANG_ADD_ALBUM]</h5>
			<form role="action" id="form_action" >
				<input type="hidden" name="target" value="add_album">
				<input type="hidden" name="type" value="add_album" >
				<label> [@LANG_ALBUM_COVER]</label>
				<input type="file" class="form-control m-b" name="photo">
				<label> [@LANG_ALBUM_TITLE]</label>
				<input type="text" class="form-control m-b" name="id" placeholder="Album title" value="">
				<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> [@LANG_CREATE_ALBUM]</button>
			</form>
		  </div>
		</div>
		<div class="actions">
		  <div class="ui approve button">
			<i class="checkmark icon"></i> [@LANG_DONE]
		  </div>
		</div>
	</div>
	
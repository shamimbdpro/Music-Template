<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  [@LANG_SELL_MEDIA]
                </header>
                <div class="panel-body">
                  
				<form class="form-horizontal" id="upload_media">

					<input type="hidden" name="form_type" value="video">
					<input type="hidden" name="stream_type" value="premium">
					<input type="hidden" name="video_public" value="1">
		
					<div class="form-group">
                      <label class="col-sm-2 control-label">[@LANG_TITLE]</label>
                      <div class="col-sm-10">
                        <input type="text"  name="video_name" required="required" title="Fill this field" placeholder="Title of video" class="form-control rounded">                        
                      </div>
                    </div>
					
                    <div class="form-group">
                      <label class="col-sm-2 control-label">[@LANG_DESC]</label>
                      <div class="col-sm-10">
						<textarea class="form-control parsley-validated" name="video_desc" rows="6" required="required" title="Fill this field" data-minwords="6" data-required="true" placeholder="Description of video"></textarea>
                      </div>
                    </div>
					
                    <div class="form-group">
						<label class="col-sm-2 control-label">[@LANG_CATEGORY]</label>
						<div class="col-sm-10">
							<select data-required="true" name="video_cat" required="required" title="Fill this field" class="form-control parsley-validated">
								<option value="">[@LANG_CHOOSE_CAT]</option>
                                [@cats]
                          </select>
                      </div>
                    </div>
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group upload_media_input">
                      <label class="col-sm-2 control-label">[@LANG_DEMO_FILE]</label>
                      <div class="col-sm-10">
                        <input type="file" id="upload-video-file" name="video_file" class="file  upload-file" data-preview-file-type="text" >
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group upload_media_input">
                      <label class="col-sm-2 control-label">[@LANG_MAIN_FILE]</label>
                      <div class="col-sm-10">
                        <input type="file" id="upload-video-mainfile" name="video_mainfile" class="file upload-mainfile" data-preview-file-type="text" >
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group upload_media_input">
                      <label class="col-sm-2 control-label">[@LANG_MEDIA_COVER]</label>
                      <div class="col-sm-10">
                        <input type="file" id="upload-video-cover" name="video_cover" class="file  upload-cover" data-preview-file-type="text" >
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="col-sm-2 control-label">[@LANG_PRICE]</label>
                      <div class="col-sm-10">
                        <input type="text"  name="video_price" required="required" title="Fill this field" placeholder="Price of video" class="form-control rounded">                        
                      </div>
                    </div>
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">[@LANG_TAGS]</label>
                      <div class="col-sm-10">
						  <div class="input-group m-b">
							  <input type="text" class="form-control" name="tags" placeholder="Add tags like this video,POP, ...">
							  <span class="input-group-addon"><i class="fa fa-tags icon"></i></span>
							</div>
                      </div>
                    </div>
					
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group ">
                      <div class="col-sm-4 col-sm-offset-2">
							<div class="ui buttons form-group m-l">
                <button class="ui button" type="reset">[@LANG_CANCEL]</button>
                <div class="or"></div>
                <button class="ui positive button" type="submit">[@LANG_SAVE]</button>
							</div>
                      </div>
                    </div>
					
                  </form>
                </div>
              </section>
			  <script>
				$("#upload-video-file").fileinput();
				$("#upload-video-mainfile").fileinput();
				$("#upload-video-cover").fileinput();
			  </script>
			  
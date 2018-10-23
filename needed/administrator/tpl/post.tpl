			<!-- Load editor assets-->
			<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
            
            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="panel-body" id="post-page">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    Post options
                  </header>
                  <div id="div-1" class="body">
                    <form class="form-horizontal" id="post" data-id="[@id]">
          						<input type="hidden" name="id" value="[@id]" >
          						<input type="hidden" name="form_type" value="add_post" >
                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Post title *</label>
                        <div class="col-lg-10">
                          <input type="text" name="title" placeholder="Title of the post" value="[@title]" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="text4" class="control-label col-lg-2">Post category *</label>
                        <div class="col-lg-10">
            							<select data-placeholder="Choose post category ..." name="cat" class="form-control chzn-select " tabindex="2">
            								<option value=""></option>
            								[@cats_select]
            							</select>
                        </div>
                      </div>
          					  <div class="form-group">
                        <label class="control-label col-lg-2">Pre Defined Image</label>
            						<div class="col-lg-10">
            							<div class="fileinput-new thumbnail">
            									 [@holder]
            								</div>
            								<a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library" >
            									<span class="fileinput-new">Select image</span> 
            									<input type="hidden" id="photo" name="photo" value="[@img]">
            								</a>
            								<span id="empty_media_slct" data-id="photo" class="btn btn-default">Empty</span>
            							</div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2">Published </label>
                        <div class=" col-lg-10">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" [@publish]>
                        </div>
                      </div>
				              <br /><br />
                  </div>
                </div>
              </div>
              <!--END TEXT INPUT FIELD-->

              <!--BEGIN SELECT        -->
  			      <div class="panel-body">
                <div class="col-lg-12 panel">
                  <header class="panel-heading">
                    Short text
                  </header>
                  <div id="div-1" class="body">
          					<div class="form-group">
                      <label for="text4" class="control-label col-lg-2">Short content</label>
                      <div class="col-lg-10">
						            <textarea class="ckeditor" class="form-control" name="short" rows="10">[@short]</textarea>
                      </div>
                    </div><!-- /.form-group -->
					           <div class="clear clearfix"></div>
				          </div>
				        </div>
			        </div>

              <!--BEGIN SELECT        -->
              <div class="panel-body">
				        <div class="col-lg-12 panel">
                  <header class="panel-heading">
                    Full text
                  </header>
                  <div id="div-1" class="body">
          					<div class="form-group">
                        <label for="text4" class="control-label col-lg-2">Full content</label>
                        <div class="col-lg-10">
						              <textarea class="ckeditor" class="form-control" name="full" rows="10">[@full]</textarea>
                        </div>
                    </div>
					          <div class="clear clearfix"></div>
                		<br /><br />
				          </div>
				        </div>
                <div class="form-actions no-margin-bottom">
                  <input type="submit" value="Save post" class="btn btn-primary">
                </div>
					  
					      <div class="clear clearfix"></div> <hr />
			         </div>
          </form>
			</div>
      <script>
      	jQuery(".chzn-select").chosen();
      </script>
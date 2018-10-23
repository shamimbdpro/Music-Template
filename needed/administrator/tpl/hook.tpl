<form class="form-horizontal" type="POST" id="hook_admin" data-id="[@hook_id]">
                    
            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                   
                   [@plugin_name] Main options
				   <br />
				   <br />
                  </header>
				   <br />
                  <div id="div-1" class="body">
                      <input type="hidden" name="form_type" value="[@form_type]">
                      <input type="hidden" name="hook_id" value="[@hook_id]">
                      <input type="hidden" name="hook_plugin" value="[@plugin_link]">
                      <input type="hidden" name="hook_template" value="[@plugin_template]">
                      <div class="form-group">
                        <label for="title" class="control-label col-lg-2">Hook title</label>
                        <div class="col-lg-10">
                          <input type="text" name="hook_title" id="title" placeholder="Title of the hook" class="form-control" value="[@hook_title]">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="positions" class="control-label col-lg-2">Hook position</label>
                        <div class="col-lg-10">
							<select data-placeholder="Choose hook position ..." name="hook_position" id="positions" class="form-control chzn-select" tabindex="2">
								<option value=""></option>
								[@positions]
							</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pages" class="control-label col-lg-2">Hook pages</label>
                        <div class="col-lg-10">
							 <select data-placeholder="Choose page or more ..." name="hook_pages[]" class="form-control chzn-select" multiple tabindex="4">
								<option value=""></option>
								[@pages]
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2">Published </label>
                        <div class=" col-lg-10">
                          <input class="make-switch" type="checkbox" name="hook_publish" data-size="normal" [@hook_publish]>
                        </div>
                      </div>
                  </div>
                </div>
              </div>

              <!--END TEXT INPUT FIELD-->

              <!--BEGIN SELECT        -->
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    [@plugin_name] ( options and features )
				  <br /><br />
                  </header>
				  <br />
                  <div id="div-1" class="body">
					
					[@plugin]
					<div class="clear clearfix"></div>
					
					<div class="form-actions no-margin-bottom">
						<input type="submit" value="Save hook" class="btn btn-primary">
                    </div>
					  
				  </div>
				</div>
				
			  </div>
			</div>
			
                    </form>
			
   
			
    <script>
	jQuery(".chzn-select").chosen();
    </script>
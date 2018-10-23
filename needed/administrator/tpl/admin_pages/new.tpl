			<!-- Load editor assets-->
			<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
            
            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="panel-body"  id="post-page">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">Page options</header>
                  <div id="div-1" class="body">
                    <form class="form-horizontal" id="post" data-id="[@id]">
        						  <input type="hidden" name="id" value="[@id]" >
        						  <input type="hidden" name="form_type" value="[@form_type]" >

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Title *</label>
                        <div class="col-lg-10">
                          <input type="text" name="title" placeholder="Page title" value="[@title]" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Link *</label>
                        <div class="col-lg-10">
                          <input type="text" name="link" placeholder="Page link" value="[@link]" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Icon *</label>
                        <div class="col-lg-10">
                          <input type="text" name="icon" placeholder="Page icon" value="[@icon]" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Sorting *</label>
                        <div class="col-lg-10">
                          <input type="text" name="sort" placeholder="Page sorting" value="[@sort]" class="form-control" value="1">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Appear *</label>
                        <div class="col-lg-10">
                          <div class="inline ">
                            <div class="ui toggle checkbox">
                              <input type="checkbox" tabindex="0" name="appear" class="hidden" checked="checked" value="1">
                              <label>view page at menu</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="text4" class="control-label col-lg-2">Parent page *</label>
                        <div class="col-lg-10">
            							<select data-placeholder="Choose users ..." name="parent" class="form-control chzn-select " tabindex="2">
                            <option value="1"></option>
                            [@parent]
            							</select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-2">Published </label>
                        <div class=" col-lg-10">
                          <div class="inline ">
                            <div class="ui toggle checkbox">
                              <input type="checkbox" tabindex="0" name="active" class="hidden" value="1" [@state]>
                            </div>
                          </div>
                        </div>
                      </div>
            				  <br /><br />
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Save" class="btn btn-primary">
                      </div>
                  </div>
                </div>
              </div>
              <!--END TEXT INPUT FIELD-->
             </form>
			     </div>

<script> jQuery(".chzn-select").chosen(); $('.ui.checkbox').checkbox();</script>
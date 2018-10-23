			<!--BEGIN SELECT        -->
              <div class="col-lg-12">
                <div class="box inverse">
                  <header>
                    <div class="icons">
                      <i class="fa fa-th-large"></i>
                    </div>
                    <h5>Create new module</h5>
                  </header>
                  <div id="div-2" class="body">
                    <form class="form-horizontal" id="new-module" action=""  >
					
                      <div class="form-group">
                        <label class="control-label col-lg-4">Select plugin</label>
                        <div class="col-lg-8">
                           <select data-placeholder="Choose a plugin..." name="plugin_name" id="plugin-name" class="form-control chzn-select" tabindex="2">
                            <option value=""></option>
                            [@plugins_list]
                          </select>
                        </div>
                      </div>
						<input type="hidden" name="case" value="new" />
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                      
                      </form>
                    </div>
                  </div>
                </div>
				
    <script>
	$(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });
    </script>
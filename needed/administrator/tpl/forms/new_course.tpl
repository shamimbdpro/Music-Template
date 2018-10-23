				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
          					  <input type="hidden" name="form_type" value="new_item" />
          					  <input type="hidden" name="type" value="0" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Course title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Grade </label>
                        <div class="col-lg-5">
                          <select name="year_level" class="form-control">
                            <option value="">Choose grade</option>
                            [@grade_select]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Teacher </label>
                        <div class="col-lg-5">
                          <select name="teacherid" class="form-control">
                            <option value="">Choose teacher</option>
							              [@teacher_select]
                          </select>
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
				
				
	 <script>
	
      $(function() {
        Metis.formValidation();
      });
	  
    </script>
	
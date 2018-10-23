				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
          					  <input type="hidden" name="form_type" value="new_item" />
          					  <input type="hidden" name="type" value="0" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Car number * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="carnum">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Driver </label>
                        <div class="col-lg-5">
                          <select name="driverid" class="form-control">
                            <option value="">Choose driver</option>
							              [@driver_select]
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
	
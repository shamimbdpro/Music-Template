				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
					  <input type="hidden" name="form_type" value="add_level" />
                      <div class="form-group">
                        <label class="control-label col-lg-4">Level title * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" name="title" id="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">View accounts *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="acc_view" data-size="normal" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edit accounts *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="acc_edit" data-size="normal" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Edit setting *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="set_edit" data-size="normal" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Contact users *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="bulk_msg" data-size="normal" >
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
	
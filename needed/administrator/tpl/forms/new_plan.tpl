				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
          					  <input type="hidden" name="form_type" value="add_plan" />
          					  <input type="hidden" name="type" value="0" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan cost * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="cost">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan period ( Months ) * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="period">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Paid *</label>
                        <div class=" col-lg-5">
                          <input class="make-switch" type="checkbox" name="paid" checked="checked" data-size="normal">
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
	
				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-edit" id="popup-validation">
          					  <input type="hidden" name="form_type" value="edit_plan" />
          					  <input type="hidden" name="type" value="0" />
          					  <input type="hidden" name="id" value="[@plan_id]" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" value="[@plan_title]" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan cost * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" value="[@plan_cost]" name="cost">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Plan period ( Months ) * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" value="[@plan_period]" name="period">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Paid *</label>
                        <div class=" col-lg-5">
                          <input class="make-switch" type="checkbox" name="paid" data-size="normal" [@plan_paid]>
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
	
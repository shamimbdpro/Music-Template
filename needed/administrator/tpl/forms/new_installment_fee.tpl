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
                        <label class="control-label col-lg-5">Part * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="part">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Fees * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="fees">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Payment date * </label>
                        <div class="col-lg-5">
                          <input type="date" class="validate[required] form-control" data-mask="9999-99-99" name="date">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Installment plan </label>
                        <div class="col-lg-5">
                          <select name="installmentid" class="form-control">
                            <option value="" disabled="disabled">Choose installment plan</option>
                            [@installment_select]
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
	
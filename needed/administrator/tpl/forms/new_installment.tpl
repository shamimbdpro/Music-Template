				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
          					  <input type="hidden" name="form_type" value="new_installment" />
          					  <input type="hidden" name="type" value="0" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Installment parts * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="parts">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Grades </label>
                        <div class="col-lg-5">
                          <select name="grades[]" class="form-control" multiple="multiple">
                            <option value="" disabled="disabled">Choose grade</option>
                            [@grade_select]
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
	
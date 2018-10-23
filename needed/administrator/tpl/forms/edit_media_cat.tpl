				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-edit" id="popup-validation">
					  <input type="hidden" name="form_type" value="edit_cat" />
					  <input type="hidden" name="type" value="[@cat_type]" />
					  <input type="hidden" name="id" value="[@cat_id]" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Category title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" value="[@cat_title]" name="title" id="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Category link * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" value="[@cat_link]" name="link" id="link">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Main category </label>
                        <div class="col-lg-5">
                          <select name="mother" id="mother" class="form-control">
                            <option value="0">Root</option>
							[@media_cat_mother]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Published *</label>
                        <div class=" col-lg-5">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" [@cat_publish]>
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
	
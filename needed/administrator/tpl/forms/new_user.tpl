				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
					  <input type="hidden" name="form_type" value="add_user" />
                      <div class="form-group">
                        <label class="control-label col-lg-4">Full name * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" name="fullname" id="fullname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Username * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" name="name" id="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail *</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" type="text" name="email" id="email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Password *</label>
                        <div class=" col-lg-4">
                          <input class="validate[required] form-control" type="password" name="password" id="password" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password *</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,equals[password]] form-control" type="password" name="password2" id="password2" />
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-lg-4">Published *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" checked>
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
	
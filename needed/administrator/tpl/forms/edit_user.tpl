				<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-edit" id="popup-validation">
					  <input type="hidden" name="form_type" value="edit_user" />
					  <input type="hidden" name="id" value="[@id]" />
                      <div class="form-group">
                        <label class="control-label col-lg-4">Full name * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" value="[@member_fullname]" name="fullname" id="fullname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Username * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" value="[@member_username]" name="name" id="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail *</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" value="[@member_email]" type="text" name="email" id="email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">New password </label>
                        <div class=" col-lg-4">
                          <input class="validate[] form-control" type="password" name="member_password" id="password" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm password </label>
                        <div class=" col-lg-4">
                          <input class="validate[equals[password]] form-control" type="password" name="member_password2" id="password2" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Published *</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" [@member_checked]>
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
	
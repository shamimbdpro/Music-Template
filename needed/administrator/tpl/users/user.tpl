<form class="form-horizontal" type="POST" id="plugin_admin">
                    
            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  
                      <header class="panel-heading">
                       [@realname] profile <br /><br />
                      </header> <br />
                      <div id="result"></div>
                      <input type="hidden" name="form_type" value="edit_user">
                      <input type="hidden" name="id" value="[@id]" />
                      
                      <div class="form-group">
                        <label class="control-label col-lg-4">Full name * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" value="[@realname]" name="fullname" id="fullname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Username * </label>
                        <div class="col-lg-4">
                          <input type="text" class="validate[required] form-control" value="[@name]" name="name" disabled="" id="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">E-mail *</label>
                        <div class=" col-lg-4">
                          <input class="validate[required,custom[email]] form-control" value="[@email]" type="text" disabled="" name="email" id="email" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">New password </label>
                        <div class=" col-lg-4">
                          <input class="validate[] form-control" type="password" name="password" id="password" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Confirm password </label>
                        <div class=" col-lg-4">
                          <input class="validate[equals[password]] form-control" type="password" name="password2" id="password2" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Verified</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="permissions" data-size="normal" [@permissions]>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Published</label>
                        <div class=" col-lg-4">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" [@member_checked]>
                        </div>
                      </div>
                      <div class="clear clearfix"></div><hr />
                      <div class="form-actions no-margin-bottom"><input type="submit" value="Save" class="btn btn-primary"></div>
                    </div>
                  </div>
                </div>
              </form>
			
            <!--BEGIN INPUT TEXT FIELDS-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">

                      <header class="panel-heading">
                       [@realname] Extra fields <br /><br />
                      </header> <br />

                      <div class="form-group">
                        <label class="control-label col-lg-4">Followers</label>
                        <div class=" col-lg-4">
                          [@followers] Follower
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Followings</label>
                        <div class=" col-lg-4">
                          [@following] Follower
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">About author</label>
                        <div class=" col-lg-4">
                          [@info]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Gender</label>
                        <div class=" col-lg-4">
                          [@gender]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Facebook profile</label>
                        <div class=" col-lg-4">
                          [@facebook]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Twitter profile</label>
                        <div class=" col-lg-4">
                          [@twitter]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Google profile</label>
                        <div class=" col-lg-4">
                          [@google]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Instagram profile</label>
                        <div class=" col-lg-4">
                          [@instagram]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Credit</label>
                        <div class=" col-lg-4">
                          $[@credit]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Mobile</label>
                        <div class=" col-lg-4">
                          [@mobile]
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Phone</label>
                        <div class=" col-lg-4">
                          [@phone]
                        </div>
                      </div>
                </div>
              </div>
            </div>  
   
			
<script>
	jQuery(".chzn-select").chosen();
</script>
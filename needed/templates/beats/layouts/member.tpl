
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="text-center m-b m-t">
                          <a href="#" class="thumb-lg">
                            <img src="[@url]image.php?src=[@pic]&w=150&h=150&img=ch" class="img-circle">
                          </a>
                          <div>
                            <div class="h3 m-t-xs m-b-xs">[@realname]</div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> [@country]</small>
                          </div>                
                        </div>
                        <div class="panel wrapper">
                          <div class="row text-center">
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">[@followers]</span>
                                <small class="text-muted">[@LANG_FOLLOWERS]</small>
                              </a>
                            </div>
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">[@following]</span>
                                <small class="text-muted">[@LANG_FOLLOWING]</small>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light lt">
                      <ul class="nav nav-tabs nav-white">
                        <li class="active"><a href="#home" aria-controls="home" data-toggle="tab" >[@LANG_PERS_INFO]</a></li>
                        <li><a href="#profile" aria-controls="profile" data-toggle="tab" >[@LANG_SM_PROFILES]</a></li>
                        <li><a href="#about_you" aria-controls="about_you" data-toggle="tab" >[@LANG_ABOUT_U]</a></li>
                        <li><a href="#cover" aria-controls="cover" data-toggle="tab" >[@LANG_CHA_PIC]</a></li>
                      </ul>
                    </header>
                    <section class="scrollable panel-body">
						
						<form class="form-horizontal"  id="edit_form" method="POST" autocomplete="off">
							
							<input type="hidden" name="form_type" value="edit_user">

						  <div class="tab-content">
							<div class="tab-pane active" id="home">
							  <div class=" wrapper">
								<div class="ui ">
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ENTER_FULLNAME]</label>
									  <div class="col-sm-10">
										<input type="text" name="user_full_name" value="[@fullname]" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_USERNAME]</label>
									  <div class="col-sm-10">
										<input type="text" name="user_name" value="[@name]" placeholder="Login Name"  value="[@name]" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_EMAIL]</label>
									  <div class="col-sm-10">
										<input type="text" name="user_email" placeholder="Email" value="[@email]"  autocomplete="off" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ENTER_GENDER]</label>
									  <div class="col-sm-10">   
										<select name="user_gender" class="form-control m-b">
											<option value="">[@LANG_ENTER_GENDER]</option>
											<option value="male" [@male]>[@LANG_MALE]</option>
											<option value="female" [@female]>[@LANG_FEMALE]</option>
										</select>									
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ENTER_COUNTRY]</label>
									  <div class="col-sm-10">   
										<select name="user_country" class="form-control m-b">
											<option value="">-- SELECT --</option>
											[@select_country]
										</select>									
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ENTER_PASS]</label>
									  <div class="col-sm-10">
										<input type="password" name="user_password_edit" placeholder="Password" autocomplete="off" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ENTER_PASS_AG]</label>
									  <div class="col-sm-10">
										<input type="password" name="user_password_confirm" placeholder="Password" autocomplete="off" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
								</div>
							  </div>
							</div>
							<div class="tab-pane" id="profile">
							  <div class="text-center wrapper">
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_FB_PROF]</label>
									  <div class="col-sm-10">   
										<input type="text" name="user_facebook" placeholder="Facebook profile" value="[@user_facebook]"  autocomplete="off" class="form-control rounded"> 							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_TW_PROF]</label>
									  <div class="col-sm-10">   
										<input type="text" name="user_twitter" placeholder="Twitter profile" value="[@user_twitter]"  autocomplete="off" class="form-control rounded"> 							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_GO_PROF]</label>
									  <div class="col-sm-10">   
										<input type="text" name="user_google" placeholder="Google+ profile" value="[@user_google]"  autocomplete="off" class="form-control rounded"> 							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_YT_PROF]</label>
									  <div class="col-sm-10">   
										<input type="text" name="user_youtube" placeholder="Google+ profile" value="[@user_youtube]"  autocomplete="off" class="form-control rounded"> 							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_IN_PROF]</label>
									  <div class="col-sm-10">   
										<input type="text" name="user_instagram" placeholder="Google+ profile" value="[@user_instagram]"  autocomplete="off" class="form-control rounded"> 							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
							  </div>
							</div>
							
							<div class="tab-pane" id="about_you">
							  <div class="text-center wrapper">
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_ABOUT_U]</label>
									  <div class="col-sm-10">   
										<textarea rows="5" name="user_info" class="form-control ">[@user_info]</textarea>							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
							  </div>
							</div>
							<div class="tab-pane" id="cover">
							  <div class="text-center wrapper">
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_CHA_PIC]</label>
									  <div class="col-sm-10">   
										<input type="file" name="user_pic" class="form-control " />							
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
							  </div>
							</div>
						  </div>
						  <div class="col-sm-12 ">
						  	<button class="pull-right btn btn-s-md btn-success btn-rounded" type="submit">[@LANG_SAVE]</button>
						  	<a href="[@url]user/[@name]" data-ajax="true" class="pull-right btn btn-s-md btn-danger btn-rounded" title="">[@LANG_CANCEL]</a>
						  </div>
						</form>
                    </section>
                  </section>
                </aside>
              </section>
            </section>
          </section>

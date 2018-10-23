	<section class="panel-body">
    <form class="form-horizontal form-edit text-left" id="popup-validation">
  		<div class="panel">
        <div class="panel-body">
          <header class="panel-heading"> [@pagename] Basic setting </header>
  					
					
              <div class="block">
                <div class="panel-body">
                  <div id="collapse2" class="body">
					  <input type="hidden" name="form_type" value="edit_setting" />
                      <div class="form-group">
                        <label class="control-label col-lg-4">Load site in ajax ?</label>
                        <div class=" col-lg-8">
                          <input class="make-switch" type="checkbox" name="enable_ajax" data-size="normal" [@enable_ajax]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Site name * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@sitename]" name="sitename" id="sitename">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Site describtion * </label>
                        <div class="col-lg-8">
                          <textarea id="limiter" name="desc" class="validate[required] form-control">[@desc]</textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Site keywords * </label>
                        <div class="col-lg-8">
                          <input name="keywords" id="tags" value="[@keywords]" class="validate[required] form-control">
                        </div>
                      </div>
					  <div class="form-group hide">
                        <label class="control-label col-lg-4">Language * </label>
                        <div class="col-lg-8">
							<select data-placeholder="Choose language ..." name="language" class="form-control chzn-select" tabindex="2">
								<option value=""></option>
								[@language]
							</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Email * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@email]" name="email">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Sender Email * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@sender_email]" name="sender_email">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Allowed photos types * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@pic_ext]" name="pic_ext">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Allowed audio types * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@audio_ext]" name="audio_ext">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Allowed videos types * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@videos_ext]" name="videos_ext">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Allow registration  *</label>
                        <div class=" col-lg-8">
                          <input class="make-switch" type="checkbox" name="allow_reg" data-size="normal" [@allow_reg]>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Under conistruction  *</label>
                        <div class=" col-lg-8">
                          <input class="make-switch" type="checkbox" name="under" data-size="normal" [@under]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Under conistruction message</label>
                        <div class="col-lg-8">
                          <textarea id="limiter" name="undermsg" class="validate[required] form-control">[@undermsg]</textarea>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="panel">
          <div class="panel-body">
      
             <div class="block">
                  <header class="panel-heading">Registeration </header>
                <div class="panel-body">
                  <div id="collapse2" class="body">
                    <div class="form-group">
                        <label class="control-label col-lg-4">User don't need to confirm email on registration <br /><b>(If enabled: user account will be active directly)</b> </label>
                        <div class="col-lg-8">
                          <input class="make-switch" type="checkbox" name="auto_verify" data-size="normal" [@auto_verify]>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Admin only can confirm users account <br /><b>(If enabled: user can't login until admin approve his account and it's override the previous option)</b> .</label>
                        <div class="col-lg-8">
                          <input class="make-switch" type="checkbox" name="admin_verify" data-size="normal" [@admin_verify]>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
        
            </div>
        </div>

        <div class="panel">
          <div class="panel-body">
      
             <div class="block">
                  <header class="panel-heading">Languages </header>
                <div class="panel-body">
                  <div id="collapse2" class="body">
          
                      <div class="form-group">
                        <label class="control-label col-lg-4">Choose Site languages </label>
                        <div class="col-lg-8">
                            <select data-placeholder="Choose default language ..." name="language" class="form-control chzn-select" tabindex="2">
                                <option value=""></option>
                                [@language]
                            </select>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
        
            </div>
        </div>
        <div class="panel">
  			  <div class="panel-body">
      
			       <div class="block">
                  <header class="panel-heading">Choose media types </header>
                <div class="panel-body">
                  <div id="collapse2" class="body">
				  
					  <div class="form-group">
                        <label class="control-label col-lg-4">Auto publish new uploaded media </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="auto_publish" data-size="normal" [@auto_publish]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Music </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="enable_music" data-size="normal" [@enable_music]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Videos  </label>
                        <div class="col-lg-8">
                          <input class="make-switch" type="checkbox" name="enable_videos" data-size="normal" [@enable_videos]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Photoss </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                          <input class="make-switch" type="checkbox" name="enable_photos" data-size="normal" [@enable_photos]>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
			  
            </div>
        </div>
        <div class="panel">
          <div class="panel-body">

			  <div class="block">
                  <header class="panel-heading">Allow Paid & Grabbed media </header>
                <div class="">
                  <div id="" class="panel-body">
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Paid media (Require payment gateway plugins)</label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="enable_paid" data-size="normal" [@enable_paid]>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-4">Administrator commission for paid media</label>
                        <div class=" col-lg-8">
                          <input class=" form-control" type="text" name="percent" data-size="normal" value="[@payment_percent]" >
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Grabbing from YouTube</label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="enable_youtube" data-size="normal" [@enable_youtube]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Youtube key  * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                          <textarea id="limiter" name="youtube_key" class="validate[required] form-control">[@youtube_key]</textarea>
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable Grabbing from SoundCloud</label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="enable_soundcloud" data-size="normal" [@enable_soundcloud]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">SoundCloud key * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                          <textarea id="limiter" name="soundcloud_key" class="validate[required] form-control">[@soundcloud_key]</textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
			  
            </div>
        </div>
        <div class="panel">
          <div class="panel-body">

			  <div class="block">
                <div class="">
				
                  <header class="panel-heading">
                    [@pagename] Social setting
                  </header>
                  <div id="collapse2" class="panel-body">
				  
					  <div class="form-group">
                        <label class="control-label col-lg-4">Facebook login * </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="facebook" data-size="normal" [@facebook]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Facebook key * </label>
                        <div class="col-lg-8">
                            <input type="text" class="validate[required] form-control" value="[@facebook_key]" name="facebook_key">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Facebook secret * </label>
                        <div class="col-lg-8">
                          <input type="text" class="validate[required] form-control" value="[@facebook_secret]" name="facebook_secret">
                        </div>
                      </div>
					  <hr />
					  <div class="form-group">
                        <label class="control-label col-lg-4">Twitter login * </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="twitter" data-size="normal" [@twitter]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Twitter key * </label>
                        <div class="col-lg-8">
                            <input type="text" class="validate[required] form-control" value="[@twitter_key]" name="twitter_key">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Twitter secret * </label>
                        <div class="col-lg-8">
                            <input type="text" class="validate[required] form-control" value="[@twitter_secret]" name="twitter_secret">
                        </div>
                      </div>
					  <hr />
					  <div class="form-group">
                        <label class="control-label col-lg-4">Google login * </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="google" data-size="normal" [@google]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Google key * </label>
                        <div class="col-lg-8">
                            <input type="text" class="validate[required] form-control" value="[@google_key]" name="google_key">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Google secret * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                            <input type="text" class="validate[required] form-control" value="[@google_secret]" name="google_secret">
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Google analytics * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                            <input type="text" class="validate[required] form-control" value="[@google_analytics]" name="google_analytics">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
			  
            </div>
        </div>
        <div class="panel">
          <div class="panel-body">

			  <div class="block">
                  <header class="panel-heading">[@pagename] Apperance </header>
                <div class="panel-body">
                  <div id="collapse2" class="">
				  
					  <div class="form-group">
                        <label class="control-label col-lg-4">Template * </label>
                        <div class="col-lg-8">
							<select data-placeholder="Choose template ..." name="template" class="form-control chzn-select" tabindex="2">
								<option value=""></option>
								[@template]
							</select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Logo * </label>
                        <div class="col-lg-8">
                          <div class="fileinput-new thumbnail">
							<img  id="logo" src="[@logo_img]" />
						  </div>
						  <a href="#MediaLibrary" data-title="Media library" id="get_media_library" data-require="media_library" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-file minimize-box require-library" >
							<span class="fileinput-new">Select image</span> 
							<input type="hidden" id="logo" name="logo" value="[@logo]">
						  </a>
						  <span id="empty_media_slct" data-id="logo" class="btn btn-default">Empty</span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Logo width * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                            <input type="text" class="validate[required] form-control" value="[@logo_w]" name="logo_w">
                            <span class="input-group-addon">px</span>
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Logo height * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                            <input type="text" class="validate[required] form-control" value="[@logo_h]" name="logo_h">
                            <span class="input-group-addon">px</span>
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Custom CSS  * </label>
                        <div class="col-lg-8">
                          <textarea id="limiter" name="css" class="validate[required] form-control">[@css]</textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Custom JS * </label>
                        <div class="col-lg-8">
                          <textarea id="limiter" name="js" class="validate[required] form-control">[@js]</textarea>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
			  
            </div>
        </div>
        <div class="panel">
          <div class="panel-body">

			  <div class="block">
                <div class="">
                  <header class="panel-heading">[@pagename] comments </header>
                  <div id="collapse2" class="panel-body">
				  
					  <div class="form-group">
                        <label class="control-label col-lg-4">Enable comments * </label>
                        <div class="col-lg-8">
							<input class="make-switch" type="checkbox" name="comments" data-size="normal" [@comments]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Edit comments * </label>
                        <div class="col-lg-8">
                          <input class="make-switch" type="checkbox" name="edit_comments" data-size="normal" [@edit_comments]>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-4">Allow HTML comments * </label>
                        <div class="col-lg-8">
                          <div class="input-group">
                          <input class="make-switch" type="checkbox" name="html_comments" data-size="normal" [@html_comments]>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
			  
			  <hr />
			 <div class="col-lg-12"> 
				 <div class="form-actions">
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
				<p></p>
				<div class="clear clearfix "></div>
			</div>
			
		</form>
	</div>
	</div>
</section>


<script>
	jQuery(".chzn-select").chosen();
    jQuery(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });
</script>
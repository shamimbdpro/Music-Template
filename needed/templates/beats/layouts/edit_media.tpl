

          <section class="vbox" id="media-page">
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">											  
						<div class="ui special cards">
						  <div class="card">
							<div class="blurring dimmable image">
							  <div class="ui dimmer">
								<div class="content">
								  <div class="center">
									<a class="play-icon jp-play-me " id="media-play-[@id]" data-title="[@title]" data-user="[@author_realname]" data-img="[@img]" data-id="[@id]"><i class="icon-control-play "></i></a>
								  </div>
								</div>
							  </div>
							  <img src="[@url]image.php?src=[@img]&w=600&h=380&img=[@type]">
							</div>
						  </div>
						</div>
                      <div class="wrapper">
                        <div class=" m-b m-t">
                          <div>
                            <div class="h3 m-t-xs m-b-xs">[@title]</div>
                          </div>                
                        </div>
                        <div>
                          <p><small class="text-uc text-xs text-muted">[@LANG_CATEGORY] </small> [@cat]</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">[@LANG_SHARE_SM]</small>
                          <div class="line"></div>
                          <p>
							<a href="#" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-twitter"></i> Tweet</a>
							<a href="#" class="btn btn-rounded btn-sm btn-primary"><i class="fa fa-fw fa-facebook"></i> Share</a>
							<a href="#" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-google-plus"></i> Post+</a>
						  </p>
                        </div>
                        <div class="line"></div>
                        <small class="text-uc text-xs text-muted">[@LANG_ABT_AUTHOR]</small>
						<section class="panel panel-default">
							<header class="panel-heading bg-light no-border">
							  <div class="clearfix">
								<a data-ajax="true" href="[@url]user/[@author_name]" class="pull-left thumb-md avatar b-3x m-r">
								  <img src="[@url]image.php?src=[@author_pic]&w=100&h=100&img=ch" alt="...">
								</a>
								<div class="clear">
								  <div class="h3 m-t-xs m-b-xs">
									[@author_realname]
									<i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
								  </div>
								  <small class="text-muted">[@LANG_ARTIST]</small>
								</div>
							  </div>
							</header>
							<div class="list-group no-radius alt">
							  <a class="list-group-item" href="#">
								<span class="badge bg-success">[@author_media]</span>
								<i class="icon-earphones icon-muted"></i> 
								[@LANG_MED_ITEMS]
							  </a>
							  <a class="list-group-item" href="#">
								<span class="badge bg-info">[@author_followers]</span>
								<i class="icon-user-following icon-muted"></i> 
								[@LANG_FOLLOWERS]
							  </a>
							  <a class="list-group-item" href="#">
								<span class="badge bg-light"></span>
								<i class="icon-earphones icon-muted"></i> 
								[@LANG_PR_VISITS]
							  </a>
							</div>
						  </section>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <section class="scrollable">
					
                    <header class="header bg-light lt">
                      <ul class="nav nav-tabs nav-white">
                        <li class=""><a href="#" >[@LANG_EDIT_MEDIA] [@title]</a></li>
                      </ul>
                    </header>
					
                      <div class="tab-content">
						<form class="form-horizontal"  id="edit_form" method="POST" autocomplete="off">
							
							<input type="hidden" name="form_type" value="edit_media">
							<input type="hidden" name="media_id" value="[@id]">

							<div class=" wrapper">
								<div class="ui ">
									<div class="form-group">
				                      <label class="col-sm-2 control-label">[@LANG_TITLE]</label>
									  <div class="col-sm-10">
										<input type="text" name="media_title" value="[@title]" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_DESC]</label>
									  <div class="col-sm-10">
										<textarea type="text" name="media_desc" class="form-control" rows="5">[@desc]</textarea>                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_TAGS]</label>
									  <div class="col-sm-10">
										<input type="text" name="media_tags" value="[@tags]" class="form-control rounded">                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group">
									  <label class="col-sm-2 control-label">[@LANG_CATEGORY]</label>
									  <div class="col-sm-10">
										<select name="media_cat" class="form-control rounded">                        
											[@edit_cat]
										</select>                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group [@allow_album]">
									  <label class="col-sm-2 control-label">[@LANG_ASSIGN_ALBUM]</label>
									  <div class="col-sm-10">
										<select name="media_album" class="form-control rounded">                        
											<option value="" > [@LANG_NO_ALBUMS]</option>
											[@edit_album]
										</select>                        
									  </div>
									</div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
								
									<div class="form-group col-md-6">
									  <label class="col-sm-4 control-label">[@LANG_DOWNLOADABLE]</label>
									  <div class="col-sm-8">
										<label class="switch">
										  <input type="checkbox" name="media_allow" [@downloadable]>
										  <span></span>
										</label>                
									  </div>
									</div>
								
								<input type="submit" value="[@LANG_SAVE]" class="btn btn-s-md btn-success btn-rounded pull-right" />

								<a data-ajax="true" href="[@url]media/[@id]" class="pull-right btn btn-s-md btn-danger btn-rounded thumb-md avatar b-3x m-r">[@LANG_CANCEL]</a>
									<div class="line line-dashed b-b line-lg pull-in clear clearfix"></div>
									<div class="line line-dashed b-b line-lg pull-in"></div>
							</div>	
						</div>
					  </div>
                    </section>
                  </section>
                </aside>
              </section>
            </section>
          </section>

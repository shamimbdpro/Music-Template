

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
									[@play]
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
							<a href="https://twitter.com/home?status=[@url]media/[@id]" class="btn btn-rounded btn-sm btn-info"><i class="fa fa-fw fa-twitter"></i> Tweet</a>
							<a href="https://www.facebook.com/sharer/sharer.php?u=[@url]media/[@id]" class="btn btn-rounded btn-sm btn-primary"><i class="fa fa-fw fa-facebook"></i> Share</a>
							<a href="https://plus.google.com/share?url=[@url]media/[@id]" class="btn btn-rounded btn-sm btn-danger"><i class="fa fa-fw fa-google-plus"></i> Post+</a>
						  </p>
                        </div>
                        <div class="line"></div>
                        <small class="text-uc text-xs text-muted">[@LANG_ABT_AUTHOR]</small>
						<section class="panel panel-default">
							<header class="panel-heading bg-light no-border">
							  <div class="clearfix">
								<a data-ajax="true" href="[@url]user/[@author_name]" class="pull-left thumb-md avatar b-3x m-r"><span class="hide">[@author_realname]</span>
								  <img src="[@url]image.php?src=[@author_pic]&w=100&h=100&img=ch" alt="...">
								</a>
								<div class="clear">
								  <div class="h3 m-t-xs m-b-xs">
									[@author_realname]
									<i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
								  </div>
								  <small class="text-muted">Artist</small>
								</div>
							  </div>
							</header>
							<div class="list-group no-radius alt">
							  <a class="list-group-item" data-ajax="true" href="[@url]user/[@author_name]">
								<span class="badge bg-success">[@author_media]</span>
								<i class="icon-earphones icon-muted"></i> 
								[@LANG_MED_ITEMS]
							  </a>
							  <a class="list-group-item" href="#">
								<span class="badge bg-info">[@author_followers]</span>
								<i class="icon-user-following icon-muted"></i> 
								[@LANG_FOLLOWERS]
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
                      <div class="tab-content">
                        <div class="tab-pane active" id="media-page-content">
                          <div class=" wrapper">
							[@top_ads]
							<small class="text-muted pull-right"> [@time] </small> 
				

							<!-- video player -->
							<div id="video-player" class="hide">
							  <div class="jp-type-single pos-rlt">
								<div id="jplayer_1" class="jp-jplayer jp-video"></div>
								<div class="jp-gui" id="jp_container_1">
								  <div class="jp-video-play" >
									<a class="fa fa-5x text-white fa-play-circle jp-play"></a>
								  </div>
								  <div class="jp-interface bg-info padder">
									<div class="jp-controls">
									  <div>
										<a class="jp-play"><i class="icon-control-play i-2x"></i></a>
										<a class="jp-pause hid"><i class="icon-control-pause i-2x"></i></a>
									  </div>
									  <div class="jp-progress">
										<div class="jp-seek-bar dker">
										  <div class="jp-play-bar dk"></div>
										  <div class="jp-title text-lt"><ul><li></li></ul></div>
										</div>
									  </div>
									  <div class="hidden-xs hidden-sm jp-current-time text-xs text-muted"></div>
									  <div class="hidden-xs hidden-sm jp-duration text-xs text-muted"></div>
									  <div class="hidden-xs hidden-sm">
										<a class="jp-mute" title="mute"><i class="icon-volume-2"></i></a>
										<a class="jp-unmute hid" title="unmute"><i class="icon-volume-off"></i></a>
									  </div>
									  <div class="hidden-xs hidden-sm jp-volume">
										<div class="jp-volume-bar dk">
										  <div class="jp-volume-bar-value lter"></div>
										</div>
									  </div>
									  <div>
										<a class="jp-full-screen" title="full screen"><i class="fa fa-expand"></i></a>
										<a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress text-lt"></i></a>
									  </div>
									</div>
								  </div>
								</div>

								<div class="jp-no-solution hide">
								  <span>Update Required</span>
								  To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
								</div>
							  </div>
							</div>
							<!-- / video player -->
                            <br />
                            <p><small class="text-muted">[@LANG_DESC]:</small></p>
                            <p>[@desc]</p>
							
							<div class="line"></div>
							<div class="meta">
								<small class="text-muted">[@LANG_LENGTH]: <b>[@duration]</b> </small> 
								<small class="text-muted">[@LANG_PLAYS]: <b>[@plays]</b> </small> 
							</div>
							<div class="line"></div>
							
							<div class="ui left labeled button toggle_item" id="item_action" data-toggle="[@check_like]" data-toggle-to="[@check_like_to]"  data-type="media" data-target="like" data-id="[@id]" tabindex="0">
							  <a class="ui basic right pointing label">[@likes]</a>
							  <div class="ui blue button"><i class="icon-heart"></i> <span id="toggle-to">[@check_like] </div>
							</div>
							
							[@check_paid]
							<div class="ui left labeled button" tabindex="0">[@check_edit]</div>
							
							<div class="line"></div>
							<hr />
							<div class="line"></div>
                            <p><small class="text-muted">[@LANG_U_MY_LIKE]: </small></p>
							<div class="line"></div>
							[@related_media]
							
							<div class="clearfix"></div>
							<div class="line"></div>
							<hr />
							<div class="line"></div>
                            <p><small class="text-muted">[@LANG_MORE_FROM] [@author_realname]: </small></p>
							<div class="line"></div>
							[@related_user_media]
                          </div>
                        </div>
                        <div class="tab-pane" id="videos">
                          <div class="text-center wrapper">
                            <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                          </div>
                        </div>
                        <div class="tab-pane" id="activity">
                          <div class="text-center wrapper">
                            <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
				<aside class="aside-lg bg-light lter b-r media-sidebar">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
						[@side_ads]
                        <section class="panel panel-default">
							<header class="panel-heading text-right bg-light ">
							  <ul class="nav nav-tabs pull-left">
								<li class="active"><a href="#comments-media" data-toggle="tab"><i class="icon-bubbles text-muted"></i> [@comments]</a></li>
								<li><a href="#likes-media" data-toggle="tab"><i class="icon-heart text-muted"></i> [@likes]</a></li>
								<li class="hide"><a href="#shares-media" data-toggle="tab"><i class="icon-action-redo text-muted"></i> 0</a></li>
							  </ul>
							</header>
							<div class="panel-body">
							  <div class="tab-content">              
								<div class="tab-pane fade active in" id="comments-media">
									<div class="ui feed">
									  [@comments_list]
									</div>
									[@comments_form]
								</div>
								<div class="tab-pane fade" id="likes-media">
									[@likes_list]
								</div>
								<div class="tab-pane fade" id="shares-media">
									[@shares] shares
								</div>
							  </div>
							</div>
						  </section>
                      </div>
                    </section>
                  </section>
                </aside>
              </section>
            </section>
          </section>

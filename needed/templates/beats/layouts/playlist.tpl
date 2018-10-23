

          <section class="vbox" id="playlist-page">
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class=" m-b m-t">
                          <div>
                            <div class="h3 m-t-xs m-b-xs">[@title]</div>
                          </div>                
                        </div>
                        <div>
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
								<a href="[@url]user/[@author_name]" data-ajax="true" class="pull-left thumb-md avatar b-3x m-r">
								  <img src="[@url]image.php?src=[@author_img]&w=100&h=100&img=ch" alt="...">
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
							<div class="line"></div>
							[@media_list]
							<div class="meta">
								<small class="text-muted">[@LANG_ITEMS]: <b>[@media_count]</b> </small> 
							</div>
							<div class="line"></div>
							
							<div class="ui left labeled button toggle_item" id="item_action" data-toggle="[@check_like]" data-toggle-to="[@check_like_to]"  data-type="[@page_type]" data-target="like" data-id="[@id]" tabindex="0">
							  <a class="ui basic right pointing label">[@likes]</a>
							  <div class="ui blue button"><i class="icon-heart"></i> <span id="toggle-to">[@check_like] </div>
							</div>
							
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
						<div class="ui medium rectangle test ad" data-text="Ad Unit 1"></div>
                        <section class="panel panel-default">
							<header class="panel-heading text-right bg-light ">
							  <ul class="nav nav-tabs pull-left">
								<li class="active"><a href="#comments-media" data-toggle="tab"><i class="icon-bubbles text-muted"></i> [@comments_count]</a></li>
								<li><a href="#likes-media" data-toggle="tab"><i class="icon-heart text-muted"></i> [@likes_count]</a></li>
							  </ul>
							</header>
							<div class="panel-body">
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

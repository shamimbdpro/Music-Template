
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
                            <div class="h3 m-t-xs m-b-xs">[@realname] <i class="fa fa-check-square fa-1 verified [@verified_check]"></i></div>
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
                        <div class="btn-group btn-group-justified m-b">
                          <a class="btn btn-success btn-rounded [@active_follow]" data-toggle="button" >
                            <span class="text" id="item_action" data-type="user" data-target="follow" data-id="[@id]" tabindex="0">
                              <i class="fa fa-eye"></i> [@LANG_FOLLOW]
                            </span>
                            <span class="text-active" id="item_action" data-type="user" data-target="unfollow" data-id="[@id]" tabindex="1">
                              <i class="fa fa-eye"></i> [@LANG_UNFOLLOW]
                            </span>
                          </a>
                          [@chat_edit]
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">[@LANG_ABOUT_ME]</small>
                          <p>[@LANG_ARTIST]</p>
                          <small class="text-uc text-xs text-muted">[@LANG_INFO]</small>
                          <p>[@info]</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">[@LANG_CONNECTION]</small>
                          <p class="m-t-sm">
                            <a href="[@user_twitter]" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                            <a href="[@user_facebook]" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                            <a href="[@user_google]" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                            <a href="[@user_youtube]" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-youtube"></i></a>
                            <a href="[@user_instagram]" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-instagram"></i></a>
                          </p>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light lt">
                      <ul class="nav nav-tabs nav-white">
                        <li class="active"><a href="#music" id="load-tabs" data-toggle="tab" data-type="1" data-id="user-media" data-page="[@id]">[@LANG_MUSIC]</a></li>
                        <li><a href="#videos" id="load-tabs" data-toggle="tab" data-type="2" data-id="user-media" data-page="[@id]">[@LANG_VIDEOS]</a></li>
                        <li><a href="#photos" id="load-tabs" data-toggle="tab" data-type="3" data-id="user-media" data-page="[@id]">[@LANG_PHOTOS]</a></li>
                        <li><a href="#albums" id="load-tabs" data-toggle="tab" data-type="4" data-id="user-albums" data-page="[@id]">[@LANG_ALBUMS]</a></li>
                        <li><a href="#playlists" id="load-tabs" data-toggle="tab" data-type="5" data-id="user-playlists" data-page="[@id]">[@LANG_PLAYLISTS]</a></li>
                        <li><a href="#followers" id="load-tabs" data-toggle="tab" data-type="6" data-id="user-followers" data-page="[@id]">[@LANG_FOLLOWERS]</a></li>
                        <li><a href="#following" id="load-tabs" data-toggle="tab" data-type="7" data-id="user-following" data-page="[@id]">[@LANG_FOLLOWING]</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="music">
                          <div class=" wrapper">
							<div class="ui link cards" id="ajax-load">
								[@media_list]
							</div>
                          </div>
                        </div>
                        <div class="tab-pane" id="videos">
                          <div class="wrapper">
							<div class="ui link cards" id="ajax-load">
							  </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="photos">
                          <div class="wrapper">
							<div class="ui link cards" id="ajax-load">
							  </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="albums">
                          <div class="wrapper" >
							<div class="ui link cards" id="ajax-load"></div>
                          </div>
                        </div>
                        <div class="tab-pane" id="playlists">
                          <div class="wrapper" >
              <div class="ui link cards" id="ajax-load"></div>
                          </div>
                        </div>
                        <div class="tab-pane" id="followers">
                          <div class="wrapper" >
              <div class="ui four doubling cards" style="width:100%" id="ajax-load"></div>
                          </div>
                        </div>
                        <div class="tab-pane" id="following">
                          <div class="wrapper" >
							<div class="ui four doubling cards" style="width:100%" id="ajax-load"></div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
              </section>
            </section>
          </section>

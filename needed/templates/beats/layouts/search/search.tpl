
              <section class="hbox stretch">

                <aside class="aside bg-light dk" id="sidebar">
                  <section class="vbox animated fadeInUp">
                    <section class="scrollable hover">
                      <div class="list-group no-radius no-border m-t-n-xxs m-b-none auto">
                        <h3 class="list-group-item">[@LANG_SEARCH]</h3>
						<div class="list-group ">
							<a data-ajax="true" href="[@url]search/music/[@title]" class="list-group-item [@check_music_allow]">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_music]</span>
							  <i class="icon-music-tone icon-muted fa-fw"></i> [@LANG_MUSIC]
							</a>
							<a data-ajax="true" href="[@url]search/video/[@title]" class="list-group-item [@check_videos_allow]">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_video]</span>
							  <i class="icon-control-play icon-muted fa-fw"></i> [@LANG_VIDEOS]
							</a>
							<a data-ajax="true" href="[@url]search/photo/[@title]" class="list-group-item [@check_photos_allow]">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_photo]</span>
							  <i class="icon-picture icon-muted fa-fw"></i> [@LANG_PHOTOS]
							</a>
							<a data-ajax="true" href="[@url]search/user/[@title]" class="list-group-item">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_user]</span>
							  <i class="icon-user icon-muted fa-fw"></i> [@LANG_USERS]
							</a>
							<a data-ajax="true" href="[@url]search/post/[@title]" class="list-group-item">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_post]</span>
							  <i class="icon-tag icon-muted fa-fw"></i> [@LANG_POSTS]
							</a>
							<a data-ajax="true" href="[@url]search/playlist/[@title]" class="list-group-item">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_playlist]</span>
							  <i class="icon-playlist icon-muted"></i> [@LANG_PLAYLISTS]
							</a>
							<a data-ajax="true" href="[@url]search/album/[@title]" class="list-group-item">
							  <i class="fa fa-chevron-right icon-muted"></i>
							  <span class="badge badge-empty">[@count_album]</span>
							  <i class="icon-music-tone-alt icon-muted fa-fw"></i> [@LANG_ALBUMS]
							</a>
						  </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <!-- / side content -->
				<section>
                  <section class="vbox">
                    <section class="scrollable padder-lg" id="ajax-load">
						
						<div class="col-sm-12"><h2 class="font-thin m-b"> [@LANG_SEARCH_FOR]:  [@title]</h2></div> <hr style="clear: both;" />
						[@items_list]  
						
			        </section>
                  </section>
                </section>
              </section>

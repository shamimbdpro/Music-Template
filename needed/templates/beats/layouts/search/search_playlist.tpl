
                    <div class="col-md-12 marbot40 martop10">
						<div class="col-xs-4 col-lg-2 col-md-3" >
                          <a data-ajax="true" href="[@url]user/[@author_name]"><img src="[@url]image.php?src=[@author_pic]&w=820&h=600&img=ch" alt="" class="r r-2x img-full"></a>
						</div>
						<div class="col-xs-8 col-lg-10 col-md-9">
							
							<a class="btn btn-default pull-right" data-toggle="button" id="item_action" data-type="playlist" data-target="like" data-id="[@id]">
								<i class="fa fa-heart-o text[@class_unlike_btn] m-r"></i><i class="fa fa-heart text[@class_like_btn] text-danger  m-r"></i><b>[@likes]</b>
							</a>
							<a class="btn btn-default pull-right" data-toggle="button">
								<i class="icon-control-play text m-r"></i><i class="fa fa-play text-active text-danger m-r"></i><b>[@play]</b>
							</a>
							<a data-ajax="true" href="[@url]playlist/[@author_name]/[@playlist_url]" class="text-ellipsis">[@title]</a>
							<a data-ajax="true" href="[@url]user/[@author_name]" class="text-ellipsis text-xs text-muted">[@author_realname]</a>
							<hr />
							<div class="scrollable" style="max-height: 200px;">[@media_list]</div>
						</div>
                    </div>
					<hr class="clearfix clear"  />
					[@loadmore]
					

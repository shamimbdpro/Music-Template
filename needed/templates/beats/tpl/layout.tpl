<!DOCTYPE html>
<html lang="en" class="app">
<head>  
	[@head_meta]
	
	[@head_css_js]
	<script> var rootURL = '[@url]' ;</script>
	<script> var loggedIN = '[@check_logged]' ;</script>
	<script> var AjaxLoad = '[@site_ajax_load]' ;</script>
	
	<!--[if lt IE 9]>
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.js"></script>
	<![endif]-->
  
</head>
<body class="">
<div id="progress_bar"><div id="myBar"></div></div>
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="[@url]" class="navbar-brand text-lt">
          <img src="http://beatboss.touchdownworld.cz/main-logo.png" alt="." class="main-logo">
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      
	  <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" id="main-search" action="">
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-btn">
				  <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
				</span>
				<input type="text" class="form-control input-sm no-border rounded" name="word" placeholder="Search songs, albums...">
                <div class="input-group-btn">
					<button class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
						<span class="dropdown-label">[@LANG_MUSIC]</span>  
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu dropdown-select pull-right">
						<li class="[@enable_music] active"><input type="radio" value="music" name="search" checked=""><a href="#"> [@LANG_MUSIC]</a></li>
						<li class="[@enable_videos]"><input type="radio" value="video" name="search"><a href="#"> [@LANG_VIDEOS]</a></li>
						<li class="[@enable_photos]"><input type="radio" value="photo" name="search"><a href="#"> [@LANG_PHOTOS]</a></li>
						<li><input type="radio" value="user" name="search"><a href="#"> [@LANG_USERS]</a></li>
						<li><input type="radio" value="post" name="search"><a href="#"> [@LANG_POSTS]</a></li>
						<li><input type="radio" value="playlist" name="search"><a href="#"> [@LANG_PLAYLISTS]</a></li>
						<li><input type="radio" value="album" name="search"><a href="#"> [@LANG_ALBUMS]</a></li>
					</ul>
				</div>
			</div>		
        </div>
      </form>
	  
	  <div class="navbar-right ">
	[@top_login]
	</div>	

		
		
	  </div>
	</header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      [@LANG_DISCOVER]
                    </li>
                    <li>
                      <a href="[@url]">
                        <i class="icon-disc text-success"></i>
                        <span class="font-bold">[@LANG_WHATS_NEW]</span>
                      </a>
                    </li>
                    <li>
                      <a href="[@url]stream" data-ajax="true">
                        <i class="icon-bar-chart text-danger"></i>
                        <span class="font-bold">[@LANG_STREAM]</span>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav bg clearfix"  data-ride="collapse">
                    <li class=" [@enable_music]">
                      <a href="#">
                        <i class="icon-music-tone-alt text-info"></i>
                        <span class="font-bold">[@LANG_MUSIC]</span>
                      </a>
                      <ul class="nav dk text-sm">
                        [@music_cats]
					  </ul>
                    </li>
                    <li class=" [@enable_photos]">
                      <a href="#">
                        <i class="icon-drawer text-primary-lter"></i>
                        <span class="font-bold">[@LANG_PHOTOS]</span>
                      </a>
                      <ul class="nav dk text-sm">
                        [@photos_cats]
					  </ul>
                    </li>
                   <li class=" [@enable_videos]">
                      <a href="#" >
                        <i class="icon-social-youtube  text-primary"></i>
                        <span class="font-bold">[@LANG_VIDEOS]</span>
                      </a>
                      <ul class="nav dk text-sm">
                        [@videos_cats]
					  </ul>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                  <ul class="nav" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      [@LANG_EXTRA_PAGES]
                    </li>
                    <li>
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                        <i class="icon-grid "></i>
                        <span>[@LANG_PAGES]</span>
                      </a>
                      <ul class="nav dk text-sm">
					    [@menu]
                      </ul>
                    </li>
                  </ul>
				  
				  
                  <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      <span class="pull-right"><a href="#" id="add_album_modal"><i class="icon-plus i-lg"></i></a></span>
                      [@LANG_ALBUMS]
                    </li>
					[@user_albums]
                  </ul>
				  
                  <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      <span class="pull-right"><a href="#" id="add_to_playlist_modal"><i class="icon-plus i-lg"></i></a></span>
                      [@LANG_PLAYLISTS]
                    </li>
					[@user_playlists]
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
				[@menu_bottom]
              </div>            
			</footer>
          </section>
        </aside>
        <!-- /.aside -->
		
		[@load_template]
		
      </section>
    </section>    
  </section>
  
  
	[@load_footer]
	[@album_form]
	
	<div class="ui modal first coupled modal playlists">
		<div class="header">
		  [@LANG_ADD_TO_PLAYLIST]
		</div>
		<div class="content">
		  <div class="description">
			[@user_playlists_form]
		  </div>
		</div>
		<div class="actions">
		  <div class="ui primary button [@hide_playlist]" >[@LANG_CREATE_PLAYLIST]</div>
		</div>
	</div>
	
	<div class="ui modal second coupled modal add_playlist">
		<div class="header">
		  [@LANG_CREATE_PLAYLIST]
		</div>
		<div class="content">
		  <div class="description">
			<h5> [@LANG_ADD_TO_PLAYLIST]</h5>
			<form role="action" id="make_action_input" action="">
				<input type="hidden" name="target" value="add_playlist">
				<input type="hidden" name="type" value="add_playlist" >
				<input type="text" class="form-control m-b" name="id" placeholder="Playlist title" value="">
				<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> [@LANG_CREATE_PLAYLIST]</button>
			</form>
		  </div>
		</div>
		<div class="actions">
		  <div class="ui approve button">
			<i class="checkmark icon"></i> [@LANG_DONE]
		  </div>
		</div>
	</div>
	
	<div class="ui modal confirmation">
	  <div class="header">[@LANG_CONFIRMATION]</div>
	  <div class="content">
		<h5> </h5>
	  </div>
	  <div class="actions">
		<div class="ui cancel negative right labeled icon button"> [@LANG_CANCEL] <i class="checkmark icon"></i></div>
		<div class="ui positive right labeled icon button" id="item_action" data-id="" data-type="1" data-target=""> [@LANG_YES] <i class="checkmark icon"></i></div>
	  </div>
	</div>
	
	<script>
		var userID = '[@user_id]';
		$('.blurring.dimmable.image').dimmer({
		  on: 'hover'
		});
		
	</script>
	<div id="page_loader" style="display: none;"><img src="[@url]media/01-progress.gif"></div>
</body>
</html>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!--Content Type UTF-8-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>[@pagename] </title>
    <link rel="shortcut icon" type="image/png" href="[@url]favicon.png"/>
	
    <link href="[@url]administrator/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="[@url]administrator/asset/css/bootstrap-reset.css" rel="stylesheet">
    <link rel="stylesheet" href="[@url]administrator/assets/css/semantic.min.css">
    [@loadCSS]
    <!--external css-->
    <link href="[@url]administrator/asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="[@url]administrator/asset/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="[@url]administrator/asset/css/owl.carousel.css" type="text/css">
    
    <!-- Custom styles for this template -->
    <link href="[@url]administrator/asset/css/style.css" rel="stylesheet">
    <link href="[@url]administrator/asset/css/custom.css" rel="stylesheet">
    <link href="[@url]administrator/asset/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="[@url]administrator/assets/css/chosen.min.css">
    <link rel="stylesheet" href="[@url]assets/css/alertify.min.css">
    <link rel="stylesheet" href="[@url]administrator/asset/assets/data-tables/DT_bootstrap.css">
    
    
    <!--JS Files-->
    <script src="[@url]administrator/asset/js/jquery.js"></script>
    <script src="[@url]administrator/asset/js/jquery-1.8.3.min.js"></script>
    <script src="[@url]administrator/asset/js/count.js"></script>
    <script src="[@url]administrator/assets/js/chosen.jquery.min.js"></script>
    <script src="[@url]assets/js/alertify.min.js"></script>
    <script src="[@url]assets/components/checkbox.min.js"></script>
    
    <script src="[@url]administrator/asset/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script src="[@url]administrator/asset/assets/data-tables/DT_bootstrap.js"></script>
    <script src="[@url]administrator/asset/js/dynamic-table.js"></script>
    <script src="[@url]administrator/asset/js/jquery.steps.min.js"></script>
    <script src="[@url]administrator/asset/js/jquery.stepy.js"></script>
    [@loadJS]

    <script> var rootURL = '[@url]' ;</script>

	
</head>
<body>


  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="[@url]" style="padding-top:5px;" class="logo"><span>[@pagename] </span></a>
            <!--logo end-->
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">[@admin_name]</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="[@url]"><i class=" fa fa-suitcase"></i>Home</a></li>
                            <li><a href="[@url]admin/setting"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="[@url]admin/administrators"><i class="fa fa-users"></i> Administrators</a></li>
                            <li><a href="[@url]?logout=logout"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="[@url]admin">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="[@url]admin/setting">
                          <i class="fa fa-cogs"></i>
                          <span>Setting</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="[@url]admin/pages">
                          <i class="fa fa-tags"></i>
                          <span>Pages</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="[@url]admin/users">Registered users</a></li>
                          <li><a  href="[@url]admin/administrators">Administrator</a></li>
                          <li><a  href="[@url]admin/plans">Subscription plans</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-music"></i>
                          <span>Media Items</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="[@url]admin/media/music">Music</a></li>
                          <li><a  href="[@url]admin/media/photos">Photos</a></li>
                          <li><a  href="[@url]admin/media/videos">Videos</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Media Categories</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="[@url]admin/media_cats/music">Music Categories</a></li>
                          <li><a  href="[@url]admin/media_cats/photos">Photos Categories</a></li>
                          <li><a  href="[@url]admin/media_cats/videos">Videos Categories</a></li>
                      </ul>
                  </li>

                  <li>
                      <a class="" href="[@url]admin/media">
                          <i class="fa fa-picture-o"></i>
                          <span>Images library</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-magic"></i>
                          <span>Apperance</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="[@url]admin/templates">Templates</a></li>
                          <li><a  href="[@url]admin/hooks">Hooks</a></li>
                          <li><a  href="[@url]admin/plugins">Plugins</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-edit"></i>
                          <span>Articles</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="[@url]admin/cats">Categories</a></li>
                          <li><a  href="[@url]admin/posts">Posts</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-plug"></i>
                          <span>Plugins options</span>
                      </a>
                      <ul class="sub">
                          [@plugins_options]
                      </ul>
                  </li>

                  <li>
                      <a class="" href="[@url]admin/withdrawals">
                          <i class="fa fa-money"></i>
                          <span>Withdrawals</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="[@url]admin/deposite">
                          <i class="fa fa-money"></i>
                          <span>Deposits</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
             
              <div class="row">
                  [@content]
              </div>

          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017-2018 &copy; Medians CMS by Medians Co.  V 2.0
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
  
    <!-- #Media Library modal -->
    <div id="MediaLibrary" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modal-library-title"> -- </h4><button  data-dismiss="modal" id="ch_library_image" data-input="" data-img="" type="button" class="btn btn-default">Choose</button>
          </div>
          <div class="modal-body" >
            
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#modal-library-body" aria-controls="modal-library-body" role="tab" data-toggle="tab">Media library</a></li>
				<li role="presentation"><a href="#upload_new_media" aria-controls="profile" role="tab" data-toggle="tab">Upload media</a></li>
			  </ul>

			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="modal-library-body">...</div>
				<div role="tabpanel" class="tab-pane" id="upload_new_media">
					<form id="upload-media-library">
						<a id="" class="btn btn-default btn-file minimize-box " >
							<input type="file" class="" id="upload-media-library" name="photo" value="">
						</a>
						<input type="submit" class="btn btn-default" value="submit" />
					</form>
				</div>
			  </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="hide-modal" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- #FormModal -->
    <div id="MinModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modal-title"> -- </h4>
          </div>
          <div class="modal-body" id="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
	
    <!-- Confirm Form Modal -->
    <div id="ConfirmModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" id="confirm-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" id="confirm-delete" class="btn btn-danger" data-id="" data-type="" data-dismiss="modal">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
	
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="[@url]administrator/asset/js/bootstrap.min.js"></script>
    <script src="[@url]administrator/assets/js/chosen.jquery.min.js"></script>
    <script class="include" type="text/javascript" src="[@url]administrator/asset/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="[@url]administrator/asset/js/jquery.scrollTo.min.js"></script>
    <script src="[@url]administrator/asset/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="[@url]administrator/asset/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="[@url]administrator/asset/js/jquery.customSelect.min.js" ></script>
    <script src="[@url]administrator/asset/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="[@url]administrator/asset/js/common-scripts.js"></script>
    <script src="[@url]administrator/assets/js/ajax.js"></script>

    <!--script for this page-->
    <script src="[@url]administrator/asset/js/sparkline-chart.js"></script>

  <script>


      //custom select box

      $(function(){
          $('select.styled').customSelect();
          $('#hidden-table-info').dataTable();
      });

  </script>

  <div id="form_result" style="display: none;"></div>
    
</body>
</html>

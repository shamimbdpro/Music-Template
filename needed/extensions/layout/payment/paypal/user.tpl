	[@content]
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              <i class="icon-envelope"></i>
              <span class="badge badge-sm up bg-danger count">[@count_messages]</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span class="count">[@count_messages]</span> messages</strong>
                </div>
                <div class="list-group list-group-alt scrollable" id="header-messages">
					[@check_messages]
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the messages</a>
                </div>
              </section>
            </section>
          </li>
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              <i class="icon-bell"></i>
              <span class="badge badge-sm up bg-danger count">[@count_notification]</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span class="count">[@count_notification]</span> notifications</strong>
                </div>
                <div class="list-group list-group-alt scrollable" id="header-notifications">
					[@check_notification]
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </section>
            </section>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="[@url]image.php?src=[@userpic]&w=100&h=100&img=ch" alt="..." >
              </span>
              [@fullname] <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">            
              <li>
                <span class="arrow top"></span>
                <a href="[@url]upload">Upload</a>
              </li>               
              <li>
                <span class="arrow top"></span>
                <a href="[@url]sell">Sell</a>
              </li>              
              <li>
                <span class="arrow top"></span>
                <a href="[@url]grab/youtube">Grab from YouTube</a>
              </li>        
              <li>
                <span class="arrow top"></span>
                <a href="[@url]grab/soundcloud">Grab from SoundCloud</a>
              </li>        
              <li>
                <span class="arrow top"></span>
                <a href="[@url]account">Settings</a>
              </li>
              <li>
                <a href="[@url]user/[@username]">Profile</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="[@url]?logout=logout">Logout</a>
              </li>
            </ul>
          </li>
        </ul>

		<div class="cd-cart-container empty">
			<a href="#0" class="cd-cart-trigger">
				Cart
				<ul class="count">
					<li>0</li>
					<li>0</li>
				</ul> 
			</a>

			<div class="cd-cart">
				<div class="wrapper">
					<header>
						<h2>Cart</h2>
					</header>
					
					<div class="body">
						<ul>
							[@check_cart]
						</ul>
					</div>

					<footer>
						<a href="[@url]checkout" class="checkout btn"><em>Checkout - $<span>0</span></em></a>
					</footer>
				</div>
			</div> <!-- .cd-cart -->
		</div> <!-- cd-cart-container -->		
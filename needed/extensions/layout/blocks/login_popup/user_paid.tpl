	[@content]

    <div class="cd-cart-container empty" id="cd-cart-container" >
      <a href="#0" class="cd-cart-trigger">
        [@LANG_CART]
        <ul class="count">
          <li>0</li>
          <li>0</li>
        </ul> 
      </a>

      <div class="cd-cart">
        <div class="wrapper">
          <header>
            <h2>[@LANG_CART]</h2>
          </header>
          
          <div class="body">
            <ul>
              [@check_cart]
            </ul>
          </div>

          <footer>
            <a href="[@url]checkout" class="checkout btn"><em>[@LANG_CHECKOUT] - $<span>0</span></em></a>
          </footer>
        </div>
      </div> <!-- .cd-cart -->
    </div> <!-- cd-cart-container -->   
    
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt msgs_head_seen" id="item_action" data-id="1" data-type="1" data-target="notes_seen" data-toggle="dropdown" >
              <i class="icon-envelope"></i>
              <span class="badge badge-sm up bg-danger count "  style="display:none" id="header-messages-count">[@count_messages]</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>[@LANG_U_HAVE] <span class="count">[@count_messages]</span> [@LANG_MSGS]</strong>
                </div>
                <div class="list-group list-group-alt scrollable" id="header-messages">
					[@check_messages]
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">[@LANG_MSGS]</a>
                </div>
              </section>
            </section>
          </li>
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt notes_head_seen" id="item_action" data-id="1" data-type="1" data-target="notes_seen" data-toggle="dropdown">
              <i class="icon-bell"></i>
              <span class="badge badge-sm up bg-danger count"  style="display:none" id="header-notifications-count">[@count_notification]</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>[@LANG_U_HAVE] <span class="count">[@count_notification]</span> [@LANG_NOTIFICATIONS]</strong>
                </div>
                <div class="list-group list-group-alt scrollable" id="header-notifications">
					[@check_notification]
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">[@LANG_ALL_NOTIFICATIONS]</a>
                </div>
              </section>
            </section>
          </li>
          <li class="dropdown">
			<a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              [@credit] $
            </a>
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
                <a href="[@url]user/[@username]" data-ajax="true">[@LANG_PROFILE]</a>
              </li>        
              <li>
                <span class="arrow top"></span>
                <a href="[@url]upload" data-ajax="true">[@LANG_UPLOAD]</a>
              </li>               
              <li>
                <span class="arrow top"></span>
                <a href="[@url]sell" data-ajax="true">[@LANG_SELL_MEDIA]</a>
              </li>              
              <li class="[@enable_youtube]">
                <span class="arrow top "></span>
                <a href="[@url]grab/youtube" data-ajax="true">[@LANG_GRAB_YT]</a>
              </li>        
              <li class="[@enable_soundcloud]">
                <span class="arrow top"></span>
                <a href="[@url]grab/soundcloud" data-ajax="true">[@LANG_GRAB_SC]</a>
              </li>  
              <li class="divider"></li>
              <li>
                <span class="arrow top"></span>
                <a href="[@url]checkout" data-ajax="true">[@LANG_CART]</a>
              </li>           
              <li>
                <span class="arrow top"></span>
                <a href="[@url]deposite" data-ajax="true">[@LANG_MK_DEPOSITE]</a>
              </li>              
              <li>
                <span class="arrow top"></span>
                <a href="[@url]withdrawal" data-ajax="true">[@LANG_WITHDRAWAL]</a>
              </li>             
              <li>
                <span class="arrow top"></span>
                <a href="[@url]subscription" data-ajax="true">[@LANG_SUBSCRIPTION]</a>
              </li>   
              <li class="divider"></li>
              <li>
                <span class="arrow top"></span>
                <a href="[@url]downloads" data-ajax="true">[@LANG_DOWNLOADS]</a>
              </li>       
              <li>
                <span class="arrow top"></span>
                <a href="[@url]account" data-ajax="true">[@LANG_SETTINGS]</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="[@url]?logout=logout">[@LANG_LOGOUT]</a>
              </li>
            </ul>
          </li>
        </ul>

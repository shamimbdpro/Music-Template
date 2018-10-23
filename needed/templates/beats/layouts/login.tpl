<div class="login">

	<header class="header bg-light lt">
		<ul class="nav nav-tabs nav-white">
			<li class="active"><a href="#second" aria-controls="second" data-toggle="tab" >[@LANG_REGISTER]</a></li>
			<li><a href="#first" aria-controls="first" data-toggle="tab" >[@LANG_LOGIN] </a></li>
		</ul>
	</header>
	<div class="ui bottom attached tab segment active" data-tab="second"  id="second">
	  
		<div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b clear">[@LANG_REGISTER]</h3>
              <p style="float: right;">[@LANG_SIGNUP_MSG]</p>
              <form role="form" id="members_form" name="register_member">
                <div class="form-group">
                  <label>[@LANG_ENTER_FULLNAME]</label>
                  <input type="reg_full_name" class="form-control" placeholder="Enter a valid name"  required="required">
                </div>
                <div class="form-group">
                  <label>[@LANG_USERNAME]</label>
                  <input type="reg_name" class="form-control" placeholder="Enter a valid username"  required="required">
                </div>
                <div class="form-group">
                  <label>[@LANG_EMAIL]</label>
                  <input type="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label>[@LANG_ENTER_PASS]</label>
                  <input type="password" class="form-control" name="reg_password" placeholder="Password"  required="required" pattern=".{7,}" title="Minimum 7 characters required" autocomplete="off">
                </div>
                <div class="form-group">
                  <label>[@LANG_ENTER_PASS]</label>
                  <input type="password" class="form-control" name="reg_confirm_password" placeholder="Password"  required="required" pattern=".{7,}" title="Minimum 7 characters required" autocomplete="off">
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>[@LANG_SIGNUP]</strong></button>
                </div>                
              </form>
            </div>
            <div class="col-sm-6">
              <h4>[@LANG_NEW_MEMBER]</h4>
              <p>[@LANG_USE_SM]</p>
              <a href="[@url]login.php?provider=facebook&next=account" class="btn btn-primary btn-block m-b-sm [@check_fb_login]"><i class="fa fa-facebook pull-left"></i>[@LANG_SIGNUP_WITH] Facebook</a>
              <a href="[@url]login.php?provider=twitter&next=account" class="btn btn-info btn-block m-b-sm [@check_tw_login]"><i class="fa fa-twitter pull-left"></i>[@LANG_SIGNUP_WITH] Twitter</a>
              <a href="[@url]login.php?provider=google&next=account" class="btn btn-danger btn-block [@check_go_login]"><i class="fa fa-google-plus pull-left"></i>[@LANG_SIGNUP_WITH] Google+</a>
            </div>
			<hr />
			<div class="clear"></div>
			<hr />
	</div>
	
	<div class="ui bottom attached tab segment  " id="first" data-tab="first">
		<div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b">[@LANG_LOGIN]</h3>
              <p style="float: right;">[@LANG_SIGNIN_MSG]</p>
			  
              <form role="form" id="members_form">
                <div class="form-group">
                  <label>[@LANG_EMAIL] | [@LANG_USERNAME]</label>
                  <input type="text" name="log_name" class="form-control" placeholder="Enter Email or Username to login">
                </div>
                <div class="form-group">
                  <label>[@LANG_ENTER_PASS]</label>
                  <input type="password" name="log_password" class="form-control" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" >
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>[@LANG_LOGIN]</strong></button>
                </div>                
              </form>
            </div>
            <div class="col-sm-6">
              <h4>[@LANG_CUR_MEMBER]</h4>
              <p>[@LANG_USE_SM]</p>
              <a href="[@url]login.php?provider=facebook&next=account" class="btn btn-primary btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>[@LANG_SIGNUP_WITH] Facebook</a>
              <a href="[@url]login.php?provider=twitter&next=account" class="btn btn-info btn-block m-b-sm"><i class="fa fa-twitter pull-left"></i>[@LANG_SIGNUP_WITH] Twitter</a>
              <a href="[@url]login.php?provider=google&next=account" class="btn btn-danger btn-block [@check_go_login]"><i class="fa fa-google-plus pull-left"></i>[@LANG_SIGNUP_WITH] Google+</a>
            </div>
			<hr />
			<div class="clear"></div>
			<hr />
	</div>
</div>

<script>
jQuery('.menu .item').tab();
</script>
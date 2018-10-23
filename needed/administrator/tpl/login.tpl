<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>[@sitename]</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="[@url]administrator/assets/css/main.min.css">
    <script> var rootURL = '[@url]' ;</script>
	
	
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        [@sitename]
      </div>
      <hr>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
          <form action="" type="post" id="loginadmin" name="loginadmin">
            <p class="text-muted text-center" id="checklogin">
			  [@checklogin]
              Enter your username and password
            </p>
            <input type="text" name="username" placeholder="Username" class="form-control top">
            <input type="password" name="password" placeholder="Password" class="form-control bottom">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <hr>
    </div>

    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Ajaxs functions -->
    <script src="[@url]administrator/assets/js/ajax.js"></script>
	
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>
  </body>
</html>
	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>pulse - Music, Audio and Radio web application</title>
  <meta name="description" content="Music, Musician, Bootstrap" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles/font.css" type="text/css" />
	  
  <link href="http://localhost/client/assets/css/alertify.min.css" rel="stylesheet"> 
  <script type="text/javascript" src="http://localhost/client/templates/beats/assets/js/jquery-2.1.1.min.js" ></script>

	<script type="text/javascript" src="http://localhost/client/assets/js/alertify.min.js" ></script>
	
	<script> var rootURL = 'http://localhost/client/' ;</script>
	<script> var loggedIN = '0' ;</script>
	<script> var AjaxLoad = '1' ;</script>
	
	<!--[if lt IE 9]>
		<script src="js/ie/html5shiv.js"></script>
		<script src="js/ie/respond.min.js"></script>
		<script src="js/ie/excanvas.js"></script>
	<![endif]-->

</head>
<body class="">
	
	

<!-- ############ LAYOUT START-->

  <div class="padding">
    <div class="navbar">
      <div class="pull-center">
        <!-- brand -->
        <a href="index.html" class="navbar-brand md">
        	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
        		<circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>
        		<circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>
        		<circle cx="24" cy="24" r="10" fill="#ffffff"/>
        		<circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>
        		<path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
        		<circle cx="24" cy="24" r="3" fill="#000000"/>
        	</svg>
        
        	<img src="images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">pulse</span>
        </a>
        <!-- / brand -->
      </div>
    </div>
  </div>
  <div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
      <div class="p-a-md">
        <div>
          <a href="#" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign up with Facebook
          </a>
          <a href="#" class="btn btn-block red text-white">
            <i class="fa fa-google-plus pull-left"></i>
            Sign up with Google+
          </a>
        </div>
        <div class="m-y text-sm">
          OR
        </div>
        <form name="form" id="members_form" name="register_member">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required  name="reg_name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required name="reg_email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required name="reg_password" pattern=".{7,}" title="Minimum 7 characters required" autocomplete="off">
          </div>
		 
          <div class="m-b-md text-sm">
            <span class="text-muted">By clicking Sign Up, I agree to the</span> 
            <a href="#">Terms of service</a> 
            <span class="text-muted">and</span> 
            <a href="#">Policy Privacy.</a>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>
        </form>
		
	<script type="text/javascript" src="http://localhost/client/assets/js/ajax.js" ></script>
        <div class="p-y-lg text-center">
          <div>Already have an account? <a href="http://localhost/client/login/login.php" class="text-primary _600">Sign in</a></div>
        </div>
      </div>
    </div>
  </div>

<!-- endbuild -->
 <style type="text/css"> 
   .alert{
	   display:none
   }
 </style>
</body>
</html>

















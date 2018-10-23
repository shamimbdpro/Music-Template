
<?php 
 	require_once('../classes/configuration.php');
	include('../classes/functions.php');
	
		if (isset($_SESSION['membername'])) {
			$loggedUser = $_SESSION['membername'];
			 header("location:http://localhost/client/");
		} else {
			$loggedUser = '0';
		}
?>

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
  <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
  <link rel="stylesheet" href="css/styles/font.css" type="text/css" />
  


  <!-- endbuild -->
  
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
<body>

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
          <a href="http://localhost/client/login.php?provider=facebook&amp;next=account" class="btn btn-block indigo text-white m-b-sm">
            <i class="fa fa-facebook pull-left"></i>
            Sign in with Facebook
          </a>
          <a href="http://localhost/client/login.php?provider=google&amp;next=account" class="btn btn-block red text-white">
            <i class="fa fa-google-plus pull-left"></i>
            Sign in with Google+
          </a>
        </div>
        <div class="m-y text-sm">
          OR
        </div>
          <form role="form" id="members_form">
          <div class="form-group">
             <input name="log_name" class="form-control" placeholder="Enter Email or Username to login" autocomplete="off" type="text">
          </div>
          <div class="form-group">
            <input name="log_password" class="form-control" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" type="password">
          </div>      
          <div class="m-b-md">        
            <label class="md-check">
              <input type="checkbox"><i class="primary"></i> Keep me signed in
            </label>
          </div>
          <button type="submit" class="btn btn-lg black p-x-lg">Sign in</button>
        </form>
        <div class="m-y">
          <a href="#" class="_600">Forgot password?</a>
        </div>
        <div>
          Do not have an account? 
          <a href="http://localhost/client/register/register.php" class="text-primary _600">Sign up</a>
        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript" src="http://localhost/client/assets/js/ajax.js" ></script>
 
  <style type="text/css"> 
   .alert{
	   display:none
   }
 </style>
</body>
</html>

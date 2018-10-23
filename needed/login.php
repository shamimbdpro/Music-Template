<?php 
// error_reporting(0);
//======================================================================\\

// Medians		                        								\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	
	//-------------------------
	// Require important files 
	//-------------------------
	require_once("./classes/configuration.php");	

	require_once("./classes/functions.php");
	
	$config = array(
		
		"base_url" => $CONF['url']."api/hybridauth/index.php",  
		'callback' => $CONF['url'],
		"providers" => array ( 
		
			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => str_replace(' ', '', $Setting['facebook_key']), "secret" => str_replace(' ', '', $Setting['facebook_secret']) ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => str_replace(' ', '', $Setting['twitter_key']), "secret" => str_replace(' ', '', $Setting['twitter_secret']) ) 
			),

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => str_replace(' ', '', $Setting['google_key']), "secret" => str_replace(' ', '', $Setting['google_secret']) ) 
			),
		),
		
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);

	// Social login configuration
    include('./api/hybridauth/Hybrid/Auth.php');
		
	if(isset($_GET['provider']))
    {
       	
		$provider = $_GET['provider'];
		
       	try {
       	
			$hybridauth = new Hybrid_Auth( $config );
				
			$authProvider = $hybridauth->authenticate($provider);

			$user_profile = $authProvider->getUserProfile();
				
			if($user_profile && isset($user_profile->identifier)) 
			{	
				echo $user_class->socialLogin($user_profile->identifier, $user_profile->displayName, $user_profile->email, $user_profile->emailVerified, $user_profile->photoURL, $user_profile->profileURL, $_GET['provider'], $_GET['next']);
			}	        

		}
		catch( Exception $e )
		{ 
			
			switch( $e->getCode() )
			{
				case 0 : $error = "Unspecified error."; break;
                case 1 : $error = "Hybridauth configuration error."; break;
                case 2 : $error = "Provider not properly configured."; break;
                case 3 : $error = "Unknown or disabled provider."; break;
                case 4 : $error = "Missing provider application credentials."; break;
                case 5 : $error = "Authentication failed. "
								. "The user has canceled the authentication or the provider refused the connection.";
						break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected "
                                         . "to the provider and he should to authenticate again.";
						$twitter->logout();
						break;
                case 7 : $error = "User not connected to the provider.";
						$twitter->logout();
                        break;
                case 8 : $error = "Provider does not support this feature."; break;
            }
                
                // well, basically your should not display this to the end user, just give him a hint and move on..
                // echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();
                // echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";

            	header("Location: " .$CONF['url'].'account');
		}
        
	}
	
	
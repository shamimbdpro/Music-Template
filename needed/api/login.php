<?php 
header('Access-Control-Allow-Origin: *'); 
require_once("../classes/API.php");
	
$api_class = new API();

if(isset($_GET["token"])){
	$user_data = API::check_token($_GET['token']);				
	echo json_encode($user_data); 
} 

if(isset($_POST["task"]) && $_POST["task"] == "login"){ 
	
	if(isset($_POST["email"]) && isset($_POST["password"])){ 

		$email = $_POST["email"]; 
		$form_password = $_POST["password"]; 
		$password = md5($form_password); 
		$find_user = $api_class->userData($email, $password); 
		//send message 
		if($find_user){ 
			if($find_user->id){ 
				 
				$user_data = $api_class->submit_login($find_user->id);
				$login_data  = array("status"=>"active", "user_token"=>$user_data); 
				echo json_encode($login_data); 
			
			}else{ 
				$login_data  = array("status"=>"not_active", "msg"=>"Your account is disabled kindly contact our support"); 
				echo json_encode($login_data); 
			} 
			 
		}else{ 
			$login_data  = array("status"=>"error", "msg"=>"Your information is not correct"); 
			echo json_encode($login_data); 
		}		 
	}else{ 
		$login_data  = array("status"=>"error", "msg"=>"Please insert your information"); 
		echo json_encode($login_data);  
	}

} else {
		// $login_data  = array("status"=>"no_date"); 
		$login_data  = array("status"=>'not_valid'); 
		echo json_encode($login_data);  
	
}

// print_r($_POST);

//close connection 
if(isset($database)){ 
	$database->close_connection(); 
} 
?>
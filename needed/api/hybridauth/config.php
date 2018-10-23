<?php

$config = array(
		"base_url" => "http://localhost/login/hybridauth/index.php", 
		"providers" => array ( 
		
			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "204442209895375", "secret" => "f54e48fde56c7ac7b0086a346ced04db" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "XXXXXXXX", "secret" => "XXXXXXX" ) 
			),
		),
		
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);

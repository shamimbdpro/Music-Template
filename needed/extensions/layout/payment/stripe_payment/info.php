<?php 

//======================================================================\\

// Social manager script			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2015 HiMero.net 					    				\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\

// http://www.HiMero.net/               								\\

//======================================================================\\
	
$plugin_name = 'Stripe Payment Gateway'; // Name of the plugin

$plugin_link = 'stripe_payment'; // Folder name of the plugin

$plugin_desc = 'Stripe Payment Gateway';   // Description of the plugin

$plugin_version = 'v 1.0';   // Version of the plugin

$plugin_type = 'payment';   // type of the plugin

add_plugin_menu(array('link'=>'stripe_payment', 'title'=>'Stripe Payment options'));
	
?>
<?php 



//======================================================================\\



// Medians PRO CMS			                        			\\



//----------------------------------------------------------------------\\



// Copyright (c) 2017-2018           					    			\\



//----------------------------------------------------------------------\\



// All rights reserved.						 		    				\\



//----------------------------------------------------------------------\\







//======================================================================\\

	

	//-----------------

	// Return value

	//-----------------
	
	require_once('main.php');

	$StripePaymentClass = new StripePaymentClass;

	return $StripePaymentClass->view_form();



 

   	

	
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

	global $cart_class, $Setting, $db, $dbaser, $CONF, $page_ID;

	

	$paypal = new paypalClass;

	$paypal->dbaser = $dbaser;

	$paypal->db = $db;

	$paypal->setting = $Setting;

	

	$check_config = $paypal->check_config();

	

	$return = '';

	

	if (isset($member['id']))

	{

		if (!empty($check_config['email'])) {

			

			if (isset($_POST['method']) && $_POST['method'] == 'paypal') {

				$paypal->paypal_class();

				$message_progress = '';

				$amount = (!empty($_POST['amount']))?strip_tags(str_replace("'","",$_POST['amount'])):'';

				$paypal->add_field('business', $check_config['email']);

				$paypal->add_field('return',  $CONF['url'].'deposite/success');

				$paypal->add_field('cancel_return', $CONF['url'].'deposite/cancel');

				$paypal->add_field('notify_url', $CONF['url'].'deposite/ipn');

				$paypal->add_field('item_name_1', 'Deposite');

				$paypal->add_field('amount_1', $_POST['amount']);

				$paypal->add_field('item_number_1', 1);

				$paypal->add_field('quantity_1', '1');

				$paypal->add_field('custom', $CONF['url']);

				$paypal->add_field('upload', 1);

				$paypal->add_field('cmd', '_cart'); 

				$paypal->add_field('txn_type', 'cart'); 

				$paypal->add_field('num_cart_items', 1);

				$paypal->add_field('payment_gross', $amount);

				$paypal->add_field('currency_code', 'USD');

				$return .= $paypal->submit_paypal_post(); // submit the fields to paypal

				$show_form=0;

				

			}		

		

		}	else {

			$return = 'Email not configured';

		}

	}

	

	if (isset($page_ID) && $page_ID == 'ipn') {

	

		if( $paypal->validate_ipn()) {

			$return = 'Done';

		} else {

			$return = 'Error';

		}

	}

	

	return  $return;

	



 

   	

	
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
	global $cart_class;
	
	$paypal = new paypal_class;
	
	$return = ''; $price = 0;
	
	if (isset($member['id']))
	{
		$cart_class->userID = $member['id'];
		$check = $cart_class->checkCart();
		
		if (is_array($check)) {
			
			foreach ($check as $row) {
				
				$query = queryTbl($row['type'], $row['type_id']);
				
				$title = $query['title'];
				$price = $price + $query['cost'];
			}
		}
	}
	
	if( $paypal->validate_ipn()) {

		$message_progress = '';
		$amount = (!empty($price))?strip_tags(str_replace("'","",$price)):'';
		$paypal->add_field('business', $email['email']);
		$paypal->add_field('return', $CONF['url'].'/success');
		$paypal->add_field('cancel_return', $CONF['url'].'/cancel');
		$paypal->add_field('notify_url', $CONF['url'].'/ipn');
		$paypal->add_field('item_name_1', strip_tags(str_replace("'","",$title)));
		$paypal->add_field('amount_1', $price);
		$paypal->add_field('item_number_1', $item_id);
		$paypal->add_field('quantity_1', '1');
		$paypal->add_field('custom', $_SERVER['REMOTE_ADDR']);
		$paypal->add_field('upload', 1);
		$paypal->add_field('cmd', '_cart'); 
		$paypal->add_field('txn_type', 'cart'); 
		$paypal->add_field('num_cart_items', 1);
		$paypal->add_field('payment_gross', $amount);
		$paypal->add_field('currency_code', 'USD');
		$message_progress .= $paypal->submit_paypal_post(); // submit the fields to paypal
		$show_form=0;
	}
	
	return  $price;
	

 
   	
	
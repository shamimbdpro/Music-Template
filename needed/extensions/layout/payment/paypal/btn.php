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
	return  '
		<div class="title"> <i class="dropdown icon"></i> Pay with PayPal </div>
		<div class="content">
			
			 <form id="payment_form" name="payment_form" class="form-inline" method="post" action="'.$CONF['path'].'deposite" enctype="multipart/form-data">
				<div class="form-group">
					<label for="amount">Amount </label>
					<input name="amount" id="amount" value="" type="text" class="form-control" placeholder="Insert amount you want to pay" />
					<input name="description" id="description" type="hidden"  value="[@mediatitle]" />
					<input name="currency" id="currency" value="USD" type="hidden" />
				</div>
				<input type="hidden" name="process" value="yes" />
				<input type="hidden" name="target" value="payment" />
				<input type="hidden" name="method" value="paypal" />
				<button class="waves-effect waves-light btn btn-success" ><i class="fa fa-paypal right"></i>Pay with PayPal</button>
			
			</form>
		</div>
	';
	

 
   	
	
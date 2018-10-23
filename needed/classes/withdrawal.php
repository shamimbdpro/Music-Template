<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class withdrawal 
{	

	public $db;
	public $userID;
	public $account;
	public $method;
	public $amount;
	
	
	
	
	//***********************
	// Basic functions
	//***********************
	function checkOld()
	{	
		
		global $dbaser;
		
		$dbaser->where('user', $this->userID);
		$return =  $dbaser->get(' withdrawal ');

		return $return;
	}
	
	
	function submitWithdrawal()
	{	
		
		global $dbaser;
		
		$data = array('user' => $this->userID, 'method' => $this->method, 'account' => $this->account, 'amount' => $this->amount, 'status' => '0');

		$return =  $dbaser->insert(' withdrawal ', $data);

		if (is_numeric($return)) {

			$data_withdrawal = array(
				'item' => 'withdrawal',
				'type' => '5',
				'type_id' => 0,
				'user' => $this->userID,
				'sender' => $this->userID,
			);

			$notifications = $dbaser->insert('notifications', $data_withdrawal);
			
			if (is_numeric($notifications)) {

				$credit = updateTblVal(" `members`  ", $this->userID, " `credit` = `credit` - '$this->amount'  ");

				if (is_numeric($credit)) {
					return $credit;
				}
			}
		}

	}
	
	
}








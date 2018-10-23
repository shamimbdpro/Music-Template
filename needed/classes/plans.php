<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class Plans 
{	

	public $db;
	public $userID;
	public $account;
	public $method;
	public $amount;
	
	
	
	
	//***********************
	// Basic functions
	//***********************
	public static function allPlans()
	{	
		
		global $dbaser;
		
		$return =  $dbaser->ObjectBuilder()->get(' plans ');

		return $return;
	}
	
	
	public static function checkOld($user)
	{	
		
		global $dbaser;
		
		$dbaser->join('plans', 'plans.id = plan_subscribe.plan', 'LEFT');
		$dbaser->where('user', $user);
		$return =  $dbaser->ObjectBuilder()->get(' plan_subscribe ', null, 'plan_subscribe.*, plans.title');

		return $return;
	}
	
	
	public static function userPlan($user)
	{	
		
		global $dbaser;
		
		$dbaser->orderBy('plan_subscribe.id', 'DESC');
		$dbaser->join('plan_subscribe', 'plan_subscribe.plan = plans.id', 'LEFT');
		$dbaser->where('plan_subscribe.user', $user);
		$return =  $dbaser->ObjectBuilder()->getOne(' plans ');
		
		return $return;
	}
	
	public static function checkUserAccess($access, $member)
	{	
		
		global $dbaser;
		
		$check = array();
		$check['msg'] = 'not_allowed';	
		$access = str_replace('/', '', $access);

		$yt = array('grab_channel','grab_playlist');

		$access = in_array($access, $yt) ? 'grab_video' : $access;

		$userPlan = Plans::userPlan($member['id']);

		if (isset($userPlan->date) && $userPlan->date >= date('Y-m-d')) {
			$plan = isset($userPlan->plan) ? $userPlan->plan : '1';
		}

		$userAccess = Plans::planAccess($plan, $access);

		if (isset($userAccess->value)) {

			switch ($access) {
				case 'sell_music':
					$currentItems = media::cntUserMedia($member['id'], 1, 'local', 1);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;
				
				case 'sell_video':

					$currentItems = media::cntUserMedia($member['id'], 2, 'local', 1);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;
				
				case 'sell_photo':

					$currentItems = media::cntUserMedia($member['id'], 3, 'local', 1);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

				case 'upload_music':
					$currentItems = media::cntUserMedia($member['id'], 1, 'local', 0);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;
				
				case 'upload_video':

					$currentItems = media::cntUserMedia($member['id'], 2, 'local', 0);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;
				
				case 'upload_photo':

					$currentItems = media::cntUserMedia($member['id'], 3, 'local', 0);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

				case 'grab_sc_track':

					$currentItems = media::cntUserMedia($member['id'], 1, 'soundcloud', 0);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

				case 'grab_video':

					$currentItems = media::cntUserMedia($member['id'], 2, 'youtube', 0);
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

				case 'albums':

					$currentItems = media::cntUserItems($member['id'], 'albums');
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

				case 'playlists':

					$currentItems = media::cntUserItems($member['id'], 'playlist');
					$check['msg'] = ( $userAccess->value > $currentItems || $userAccess->value == 'unlimited') ? 'allowed' : 'not_allowed';	
					break;

			}

		}

		return $check;
	}
	
	
	public static function planAccess($plan, $access)
	{	
		
		global $dbaser;
			
		if (is_numeric($plan) && $access) {

			$dbaser->where('plan', $plan);
			$dbaser->where('plan_access', $access);
			return  $dbaser->ObjectBuilder()->getOne(' plan_access_option ');
		}

	}
	
	
	public static function planAccessList()
	{	
		
		global $dbaser;

		return  $dbaser->ObjectBuilder()->get(' plan_access ');

	}
	
	public static function getPlan($id)
	{	
		
		global $dbaser;
		
		$dbaser->where('id', $id);
		$return =  $dbaser->ObjectBuilder()->getOne(' plans ');

		return $return;
	}
	
	
	public static function addPlan($data)
	{	
		
		global $dbaser;
		
		$paid = isset($data['paid']) ? '1' : '0';

		$list = array('title' => $data['title'], 'cost' => $data['cost'], 'period' => $data['period'], 'paid' => $paid);

		$return =  $dbaser->insert(' plans ', $list);

		if (is_numeric($return)) {
			return 1;
		}

	}
	
	
	public static function subscribePlan($data, $member)
	{	
		
		global $dbaser;
		
		if (is_numeric($data['id'])) {

			$plan = Plans::getPlan($data['id']);
			$cur_plan = Plans::userPlan($member['id']);

			if (isset($plan->id) ) {
				
				if (empty($plan->paid)) {
					
					if (isset($cur_plan->id) && $cur_plan->id == $plan->id) {
						return array('msg' => NotePopup('Error: This is your current plan.', 2));			
					} else {
						return array('msg' => NotePopup("Error: You can't subscribe to default plan.", 2));			
					}
					
				} else {

					if (isset($cur_plan->id)) {
						
						if ($cur_plan->date > date('Y-m-d')) {
							
							if ($cur_plan->cost < $plan->cost) {
								
								if (isset($member['credit']) && $member['credit'] >= $plan->cost) {

									$expire_date = date('Y-m-d',strtotime("+".$plan->period." months", time()));
									$list = array('user' => $member['id'], 'plan' => $plan->id, 'date' => $expire_date);
									$return =  $dbaser->insert(' plan_subscribe ', $list);
									
									if ($return) {
										$user_credit = $member['credit'] - $plan->cost;
										$dbaser->where(' id ', $member['id']);
										$dbaser->update(' members ', array('credit' => $user_credit));
										return array('reload' => 1,  'url' => '');			
									}

								} else {
									return array('msg' => NotePopup('Error: You have no enough credit.', 2));			
								}

							} else {
								return array('msg' => NotePopup('Your current plan still active, You can upgrade only.', 2));			
							}

						} elseif ($cur_plan->date < date('Y-m-d')) {

							if (isset($member['credit']) && $member['credit'] >= $plan->cost) {

								$expire_date = date('Y-m-d',strtotime("+".$plan->period." months", time()));
								$list = array('user' => $member['id'], 'plan' => $plan->id, 'date' => $expire_date);
								$return =  $dbaser->insert(' plan_subscribe ', $list);
								
								if ($return) {
									$user_credit = $member['credit'] - $plan->cost;
									$dbaser->where(' id ', $member['id']);
									$dbaser->update(' members ', array('credit' => $user_credit));
									return array('reload' => 1,  'url' => '');			
								}

							} else {
								return array('msg' => NotePopup('Error: You have no enough credit.', 2));			
							}

						} else {

							if (isset($member['credit']) && $member['credit'] >= $plan->cost) {

								$expire_date = date('Y-m-d',strtotime("+".$plan->period." months", time()));
								$list = array('user' => $member['id'], 'plan' => $plan->id, 'date' => $expire_date);
								$return =  $dbaser->insert(' plan_subscribe ', $list);
								
								if ($return) {
									$user_credit = $member['credit'] - $plan->cost;
									$dbaser->where(' id ', $member['id']);
									$dbaser->update(' members ', array('credit' => $user_credit));
									return array('reload' => 1,  'url' => '');			
								}

							} else {
								return array('msg' => NotePopup('Error: You have no enough credit.', 2));			
							}
						}
					
					} elseif (isset($member['credit']) && $member['credit'] >= $plan->cost) {
						
						$expire_date = date('Y-m-d',strtotime("+".$plan->period." months", time()));
						$list = array('user' => $member['id'], 'plan' => $plan->id, 'date' => $expire_date);
						$return =  $dbaser->insert(' plan_subscribe ', $list);
						
						if ($return) {
							$user_credit = $member['credit'] - $plan->cost;
							$dbaser->where(' id ', $member['id']);
							$dbaser->update(' members ', array('credit' => $user_credit));
							return array('reload' => 1,  'url' => '');			
						}

					} else {
						return array('msg' => NotePopup('Error: You have no enough credit.', 2));			
					}
				}
			}
		}
	}
	
	
	public static function delPlan($data)
	{	
		
		global $dbaser;
		
		$dbaser->where(' id ', $data['id']);
		$return =  $dbaser->delete(' plans ');

		if (is_numeric($return)) {
			return 1;
		}

	}
	
	
	public static function editPlan($data)
	{	
		
		global $dbaser;
		
		$paid = isset($data['paid']) ? '1' : '0';

		$list = array('title' => $data['title'], 'cost' => $data['cost'], 'period' => $data['period'], 'paid' => $paid);

		$dbaser->where(' id ', $data['id']);
		$return =  $dbaser->update(' plans ', $list);

		if ($return) {
			return 1;
		} else {
			return $return;
		}

	}
	
	
	public static function errorMSG($type = 'not_allowed')
	{
		global $CONF;

		switch ($type) {
			case 'not_allowed':
				return viewMessage('Sorry your account have exceeded the allowed number of media. <a href="'.$CONF['url'].'subscription"> Upgrade now </a>', 1);
				break;
		}
	}

	public static function editPlanAccess($data)
	{	
		
		global $dbaser;
		
		if (isset($data['id']) && is_numeric($data['id']) && is_array($data['plan_access']) && !empty($data['plan_access'])) {

			$dbaser->where(' plan ', $data['id']);
			$dbaser->delete(' plan_access_option ');

			foreach ($data['plan_access'] as $key => $value) {
				$list = array('plan' => $data['id'], 'plan_access' => $key, 'value' => $value);
				$dbaser->insert(' plan_access_option ', $list);
			}
		}

		return 1;

	}
	
	
}








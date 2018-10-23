<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	//-----------------------
	// Require template file
	//-----------------------
	$dbaser->join('members', 'withdrawal.user = members.id');
	$withdrawals = $dbaser->get('withdrawal', null, 'withdrawal.*, members.name, members.realname'); 

	$hooks ='';
	if (!empty($withdrawals)) {
		foreach ($withdrawals as $row) {
			
			$status = empty($row['status']) ? 'Pending' : 'Paid';
			$ch_status = empty($row['status']) ? '' : 'disabled';

			$hooks .= '<tr id="admin'.$row['id'].'">
                      <td>'. $row['id'] .' </td>
                      <td>'. $row['realname'] .' </td>
                      <td>$'.$row['amount'].'</td>
                      <td>'.$row['method'].'</td>
                      <td>'.$row['account'].'</td>
                      <td>'. $status .' </td>
                      <td style="text-align: center">
							<span><a class="btn btn-danger btn-sm confirm-form '.$ch_status.'"  data-id="'.$row['id'].'" data-type="paid_withdrawal"  href="#ConfirmModal" data-title="Are you sure this witthdrawal ('.$row['id'].') is paid." data-toggle="modal" data-placement="bottom"> <i class="fa fa-check"></i>
							</a></span>
					  </td>
                    </tr>';
	
		}
	}
	
	$profile = new Template("./administrator/tpl/withdrawals.tpl");
	$profile->set("hooks_list", $hooks );
	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return $profile->output();
	
	
?>
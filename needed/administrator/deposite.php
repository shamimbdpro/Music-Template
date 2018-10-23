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
		$dbaser->join('members', 'deposite.user = members.id');
		$deposite_list = $dbaser->get('deposite', null, 'deposite.*, members.realname, members.name '); 

		$view ='';

		if (!empty($deposite_list) && is_array($deposite_list)) {
			
			foreach ($deposite_list as $row) {
				
				$view .= '<tr id="admin'.$row['id'].'">
                          <td>'. $row['id'] .' </td>
                          <td><a href="'.$CONF['url'].'user/'.$row['name'].'">'. $row['realname'] .' </td>
                          <td>$'.$row['amount'].'</td>
                          <td>'.$row['method'].'</td>
                          <td>'.$row['date'].'</td>
                        </tr>';
		
			}
		}	
		
		$profile = new Template("./administrator/tpl/deposite.tpl");
		$profile->set("list", $view );
		$profile->set("pagename", $Setting['sitename']);
		$profile->set("sitename", $Setting['sitename']);
		$profile->set("url", $CONF['url']);
		$profile->set("path", $CONF['path']);
	
	
	
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	return $profile->output();
	
	
?>
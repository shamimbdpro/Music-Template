<?php 

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	add_head_css('', 'administrator/asset/assets/morris.js-0.4.3/morris.css');
	add_head_js('', 'administrator/asset/assets/morris.js-0.4.3/morris.min.js');
	add_head_js('', 'administrator/asset/assets/morris.js-0.4.3/raphael-min.js');

	$dbaser->orderBy('cnt');
	$dbaser->groupBy('members.id');
	$dbaser->join('media', 'media.author = members.id', 'LEFT');
	$tc = $dbaser->ObjectBuilder()->get('members', 5, 'members.realname, members.id, Count(comments) AS cnt');

	$top_customers='';
	foreach ($tc as $key => $value) {

		$top_customers .= '{label: "'.$value->realname.'", value: '.$value->cnt.' },'; 

	}

	$dbaser->orderBy('cnt');
	$dbaser->groupBy('media.id');
	$dbaser->where('media.paid', 1);
	$dbaser->join('cart', "cart.type_id = media.id AND cart.type = 'media'  ", 'LEFT');
	$tp = $dbaser->ObjectBuilder()->get('media', 5, 'media.title, media.id, Count(cart.id) AS cnt');

	$top_products='';
	foreach ($tp as $key => $value) {
		
			$top_products .= '<tr>
			<td>'.$value->title.'</td>
			<td><span class="badge bg-important">'.$value->cnt.'</span></td></tr>'; 
	}

	//-----------------------
	// Require template file
	//-----------------------
	$stats = new Template("./administrator/tpl/stats.tpl");
	$profile = new Template("./administrator/tpl/intro.tpl");
	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	$stats->set("free_media_count", $FullAdmin->count_items(' `media` ', '  WHERE `paid` = 0  '));
	$stats->set("paid_media_count", $FullAdmin->count_items(' `media` ', '  WHERE `paid` = 1  '));
	$stats->set("members_count", $FullAdmin->count_items(' `members` ', ' WHERE `publish` = 1 '));
	$stats->set("cart_count", $FullAdmin->count_items(' `cart` ', ' WHERE `state` = 0 '));
	$stats->set("payment_count", $FullAdmin->count_items(' `cart` ', ' WHERE `state` = 1 '));
	$stats->set("p_withdrawal", $FullAdmin->count_items(' `withdrawal` ', ' WHERE `status` = 0 '));
	$stats->set("f_withdrawal", $FullAdmin->count_items(' `withdrawal` ', ' WHERE `status` = 1 '));
	$stats->set("comments_count", $FullAdmin->count_items(' `comments` ', '  '));
	$stats->set("playlists_count", $FullAdmin->count_items(' `playlist` ', '  '));
	$stats->set("albums_count", $FullAdmin->count_items(' `albums` ', '  '));
	$stats->set("top_customers", $top_customers);
	$stats->set("top_products", $top_products);
	$profile->set("stats", $stats->output());
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
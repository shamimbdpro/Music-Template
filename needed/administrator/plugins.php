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
	if (isset($_GET['id'])) {
		$profile = new Template("./administrator/tpl/plugins.tpl");
		$profile->set("enabled_plugins", load_Plugins($_GET['id'], 1) );
		$profile->set("disabled_plugins", load_Plugins($_GET['id'], 0) );
	} else {
		$profile = new Template("./administrator/tpl/plugins_list.tpl");
		$profile->set("Plugins_list", PluginsCats() );
	}
	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
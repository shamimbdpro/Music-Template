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
	// Set functions
	//-----------------------
	$template = checkTemplate($Setting['template'], get_Templates_array());
	

	$allow_reg = option_toChecked($Setting['allow_reg']);
	$under = option_toChecked($Setting['under']);
	$facebook = option_toChecked($Setting['facebook']);
	$twitter = option_toChecked($Setting['twitter']);
	$google = option_toChecked($Setting['google']);
	$comments = option_toChecked($Setting['comments']);
	$edit_comments = option_toChecked($Setting['edit_comments']);
	$html_comments = option_toChecked($Setting['html_comments']);
	$enable_music = option_toChecked($Setting['enable_music']);
	$enable_videos = option_toChecked($Setting['enable_videos']);
	$enable_photos = option_toChecked($Setting['enable_photos']);
	$enable_paid = option_toChecked($Setting['enable_paid']);
	$enable_youtube = option_toChecked($Setting['enable_youtube']);
	$enable_soundcloud = option_toChecked($Setting['enable_soundcloud']);
	$enable_ajax = option_toChecked($Setting['enable_ajax']);
	$auto_publish = option_toChecked($Setting['auto_publish']);
	$auto_verify = option_toChecked($Setting['auto_verify']);
	$admin_verify = option_toChecked($Setting['admin_verify']);
	
	$logo_img = $CONF['url'].'image.php?src='. $Setting['logo'] . '&w=200&h=150&img=pic';
	
	//-----------------------
	// Require template file
	//-----------------------
	$profile = new Template("./administrator/tpl/setting.tpl");
	$profile->set("enable_ajax", $enable_ajax);
	$profile->set("pagename", $Setting['sitename']);
	$profile->set("sitename", $Setting['sitename']);
	$profile->set("url", $CONF['url']);
	$profile->set("path", $CONF['path']);
	$profile->set("desc", $Setting['desc']);
	$profile->set("keywords", $Setting['keywords']);
	$profile->set("allow_reg", $allow_reg);
	$profile->set("under", $under);
	$profile->set("email", $Setting['email']);
	$profile->set("pic_ext", $Setting['pic_ext']);
	$profile->set("audio_ext", $Setting['audio_ext']);
	$profile->set("videos_ext", $Setting['videos_ext']);
	$profile->set("sender_email", $Setting['sender_email']);
	$profile->set("undermsg", $Setting['undermsg']);
	$profile->set("google_analytics", $Setting['google_analytics']);
	
	$profile->set("enable_music", $enable_music);
	$profile->set("enable_videos", $enable_videos);
	$profile->set("enable_photos", $enable_photos);
	$profile->set("auto_publish", $auto_publish);
	$profile->set("admin_verify", $admin_verify);
	$profile->set("auto_verify", $auto_verify);
	$profile->set("enable_paid", $enable_paid);
	$profile->set("payment_percent", $Setting['percent']);
	$profile->set("enable_soundcloud", $enable_soundcloud);
	$profile->set("enable_youtube", $enable_youtube);
	
	$profile->set("template", $template);
	$profile->set("logo_img", $logo_img);
	$profile->set("logo", $Setting['logo']);
	$profile->set("logo_w", $Setting['logo_w']);
	$profile->set("logo_h", $Setting['logo_h']);
	$profile->set("css", $Setting['css']);
	$profile->set("js", $Setting['js']);
	
	$profile->set("facebook", $facebook);
	$profile->set("facebook_key", $Setting['facebook_key']);
	$profile->set("facebook_secret", $Setting['facebook_secret']);
	$profile->set("twitter", $twitter);
	$profile->set("twitter_key", $Setting['twitter_key']);
	$profile->set("twitter_secret", $Setting['twitter_secret']);
	$profile->set("google", $google);
	$profile->set("google_key", $Setting['google_key']);
	$profile->set("google_secret", $Setting['google_secret']);
	$profile->set("soundcloud_key", $Setting['soundcloud_key']);
	$profile->set("youtube_key", $Setting['youtube_key']);
	
	$profile->set("language", list_options_select(getLangs(), $Setting['language']));
	$profile->set("comments", $comments);
	$profile->set("edit_comments", $edit_comments);
	$profile->set("html_comments", $html_comments);
	
	//------------------------------------------------------------
	// Loads our layout template, settings its title and content.
	//------------------------------------------------------------
	 return $profile->output();
	
?>
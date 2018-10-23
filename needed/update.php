<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\
	
	/*///////////////////////
	 Required files  
	///////////////////////*/
	require_once('./classes/configuration.php');

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./assets/css/semantic.min.css">
	<title>Update Medians to v 2.4</title>
</head>
<body>

  <div class="ui text container" style="padding: 5em 0em">

		<div class="ui piled segment ui center aligned ">
		  <h4 class="ui header">Please make sure of connecting well with your database</h4>
		</div>

		<div class="ui middle aligned center aligned grid">
		  <div class="column">
		    <h2 class="ui teal image header">
		      <div class="content">
		        Update to version 2.4
		      </div>
		    </h2>
		    <form class="ui large form" method="POST" accept="update.php">
		    	<input type="hidden" name="update" value="2_4">

		      	<div class="ui stacked segment">
		        	<button class="ui fluid large teal submit button">update</button>
		      	</div>

		      	<div class="ui error message"></div>

		    </form>

		  </div>
		</div>
  </div>


</body>
</html>
<?php
	
	if (isset($_POST['update']) && $_POST['update'] == '2_4') {

		$message = '
		<div class="ui piled segment ui center aligned ">
		  <h4 class="ui header">YOur script updated successfully. and your current version is 2.4</h4>
		</div>';

		if (!$dbaser->tableExists ('members_activation')) {
			
			$dbaser->rawQuery("CREATE TABLE `members_activation` (
			  `id` int(11) NOT NULL,
			  `user` int(11) NOT NULL,
			  `code` varchar(255) NOT NULL,
			  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("ALTER TABLE `members_activation` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `members_activation` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		

		if (!$dbaser->tableExists ('members_activation')) {
			
			$dbaser->rawQuery("CREATE TABLE `plans` (
			  `id` int(11) NOT NULL,
			  `title` varchar(255) NOT NULL,
			  `cost` int(11) NOT NULL,
			  `period` int(11) NOT NULL,
			  `paid` int(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("INSERT INTO `plans` (`id`, `title`, `cost`, `period`, `paid`) VALUES(1, 'Basic user', 0, 0, 0),(2, 'Premium user', 3, 1, 1),(3, 'Premium Plus User ', 5, 1, 1)");
			
			$dbaser->rawQuery("ALTER TABLE `plans` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `plans` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		

		if (!$dbaser->tableExists ('plan_access')) {
			
			$dbaser->rawQuery("CREATE TABLE `plan_access` (
			  `id` int(11) NOT NULL,
			  `title` varchar(255) NOT NULL,
			  `access` varchar(255) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("INSERT INTO `plan_access` (`id`, `title`, `access`) VALUES (1, 'Upload free audio', 'upload_music'),(2, 'Upload free video', 'upload_video'),(3, 'Upload free photos', 'upload_photo'),(4, 'Upload premium audio', 'sell_music'),(5, 'Upload premium video', 'sell_video'),(6, 'Upload premium photos', 'sell_photo'),(8, 'Grab SoundCloud track', 'grab_sc_track'),(11, 'Grab YouTube video', 'grab_video'),(12, 'Create Albums', 'albums'),(13, 'Create Playlists', 'playlists')");

			$dbaser->rawQuery("ALTER TABLE `plan_access` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `plan_access` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		

		if (!$dbaser->tableExists ('plan_access_option')) {
			
			$dbaser->rawQuery("CREATE TABLE `plan_access_option` (
			  `id` int(11) NOT NULL,
			  `plan` int(11) NOT NULL,
			  `plan_access` varchar(255) NOT NULL,
			  `value` varchar(255) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("INSERT INTO `plan_access_option` (`id`, `plan`, `plan_access`, `value`) VALUES (238, 1, 'upload_music', 'unlimited'),(239, 1, 'upload_video', 'unlimited'),(240, 1, 'upload_photo', 'unlimited'),(241, 1, 'sell_music', '0'),(242, 1, 'sell_video', '0'),(243, 1, 'sell_photo', '0'),(244, 1, 'grab_sc_track', '5'),(245, 1, 'grab_video', '5'),(246, 1, 'albums', '5'),(247, 1, 'playlists', '5'),(248, 2, 'upload_music', 'unlimited'),(249, 2, 'upload_video', 'unlimited'),(250, 2, 'upload_photo', 'unlimited'),(251, 2, 'sell_music', '10'),(252, 2, 'sell_video', '10'),(253, 2, 'sell_photo', '10'),(254, 2, 'grab_sc_track', '5'),(255, 2, 'grab_video', '1'),(256, 2, 'albums', '50'),(257, 2, 'playlists', '50'),(298, 3, 'upload_music', 'unlimited'),(299, 3, 'upload_video', 'unlimited'),(300, 3, 'upload_photo', 'unlimited'),(301, 3, 'sell_music', '50'),(302, 3, 'sell_video', '50'),(303, 3, 'sell_photo', '50'),(304, 3, 'grab_sc_track', '50'),(305, 3, 'grab_video', '10'),(306, 3, 'albums', 'unlimited'),(307, 3, 'playlists', 'unlimited')");

			$dbaser->rawQuery("ALTER TABLE `plan_access_option` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `plan_access_option` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		

		if (!$dbaser->tableExists ('plan_subscribe')) {
			
			$dbaser->rawQuery("CREATE TABLE `plan_subscribe` (
			  `id` int(11) NOT NULL,
			  `user` int(11) NOT NULL,
			  `plan` int(11) NOT NULL,
			  `date` date NOT NULL,
			  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("ALTER TABLE `plan_subscribe` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `plan_subscribe` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		


		if (!$dbaser->tableExists ('recover_pass')) {
			
			$dbaser->rawQuery("CREATE TABLE `recover_pass` (
			  `id` int(11) NOT NULL,
			  `user` int(11) NOT NULL,
			  `code` varchar(255) NOT NULL,
			  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			) ENGINE=InnoDB DEFAULT CHARSET=latin1");

			$dbaser->rawQuery("ALTER TABLE `recover_pass` ADD PRIMARY KEY (`id`)");

			$dbaser->rawQuery("ALTER TABLE `recover_pass` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

		}		

		$dbaser->rawQuery("ALTER TABLE `settings` ADD  `auto_verify` int(11) NOT NULL");
		$dbaser->rawQuery("ALTER TABLE `settings` ADD  `admin_verify` int(11) NOT NULL");

		echo $message;
	}

	

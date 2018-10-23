<?php

//======================================================================\\

// Medians PRO CMS			                        			\\

//----------------------------------------------------------------------\\

// Copyright (c) 2017-2018           					    			\\

//----------------------------------------------------------------------\\

// All rights reserved.						 		    				\\

//----------------------------------------------------------------------\\



//======================================================================\\

class media 
{	

	public $db;
	public $userID;
	public $userName;
	public $mediaID;
	public $mediaName;
	public $mediaDesc;
	public $mediaCover;
	public $mediaFile;
	public $mediaMainFile;
	public $mediaPrice;
	public $mediaCat;
	public $mediaCatType;
	public $mediaCatPrefix;
	public $mediaFrametype;
	public $mediaType;
	public $mediaTags;
	public $mediaPublish;
	public $mediaNum;
	public $mediaOrder;
	public $mediaData;
	public $albumID;
	public $albumPrefix;
	public $playlistID;
	public $playlistPrefix;
	public $playlistNum;
	public $playlistOrder;
	public $updateSet;
	public $updateType;
	public $getType;
	
	
	
	
	//***********************
	// Queries functions
	//***********************
	public static function getMediaItems($list = null)
	{
		global $dbaser;

		return  $dbaser->get(' media ');
	}

	function getMedia()
	{	
		
		global $dbaser;
			
		$dbaser->where('id', $this->mediaID);
		$return =  $dbaser->getOne(' media ');

		return $return;

	}
	
	function updateMediaLike()
	{	
	
		global $dbaser;
			
		if ($this->updateSet == 'like') { 
			$return = updateTblVal(" `media`  ", $this->mediaID, " likes = `likes` + 1  ");
		} elseif ($this->updateSet == 'unlike') {
			$return = updateTblVal(" `media`  ", $this->mediaID, " likes = `likes` - 1  ");
		} 

		if ($return) {
			return $return;
		}
	}
	
	function getMediaAuthor()
	{	
		global $dbaser;
			
		$dbaser->where('id', $this->mediaID);
		$return =  $dbaser->getOne(' members ');

		return $return;
		
	}
		
	function getUserMedia()
	{	
		global $dbaser;
			
		$dbaser->orderBy('id', 'DESC');
		$dbaser->where('author', $this->userID);
		$dbaser->where('type', $this->mediaType);
		$return =  $dbaser->get(' media ', 12);

		return $return;
			
	}
	
	function getMoreMedia()
	{	
		global $dbaser;

		$id = $this->db->real_escape_string($this->mediaID);
		$type = $this->db->real_escape_string($this->mediaType);
		
		
		$media = queryTbl('media', $id);
		$views = $media['views'];

		$dbaser->where('type', $type);
		$dbaser->where('publish', 1);
		$dbaser->orderBy('id', 'DESC');
			
		if ($this->mediaOrder == 'user-media') { 
			
			$dbaser->where(' `id` ', $id, '<');
			$dbaser->where('author', $this->userID);

		} elseif ( $this->mediaOrder == 'media_cat') { 

			$dbaser->where(' `id` ', $id, '<');
			$dbaser->where('cat', $this->mediaCat);

		} elseif ( $this->mediaOrder == 'load-media2') {

			$dbaser->where(' `id` ', $id, '!=');
			$dbaser->where('cat', $this->mediaCat);
			$dbaser->where('views', $views);
			$dbaser->orderBy('id', 'DESC');
			$dbaser->orderBy('views', 'DESC');
			$dbaser->orderBy('likes', 'DESC');
			$dbaser->orderBy('comments', 'DESC');

		} elseif ( $this->mediaOrder == 'load-media1') {
		
			$dbaser->where(' `id` ', $id, '<');
		
		} elseif ( $this->mediaOrder == 'search') {
			
			$title = $this->mediaCat;
			$dbaser->where(' `id` ', $id, '<');
			$dbaser->where(" title LIKE '%$title%' ");
		} 
			
		$return =  $dbaser->get(' media ', 12);
		
		return $return;
		
	}
	
	function getMediaList()
	{	
		global $dbaser;

		if ($this->mediaCat !== 'all')  { 
			$dbaser->where('cat', $this->mediaCat);
		}
		
		if ($this->mediaOrder == '2')  { 
			
			$dbaser->orderBy('views', 'DESC');
			$dbaser->orderBy('likes', 'DESC');
			$dbaser->orderBy('id', 'DESC');
			$dbaser->orderBy('comments', 'DESC');
		
		} else {
			$dbaser->orderBy('id', 'DESC');
		}

		$dbaser->where('type', $this->mediaType);
		$dbaser->where('publish', 1);
		$return =  $dbaser->get(' media ', $this->mediaNum);
		
		return $return;
		
	}
	
	function getRelatedMedia()
	{	
		
		global $dbaser;
			
		$title = strtok($this->db->real_escape_string($this->mediaName), ' ');
		
		$dbaser->where(" title LIKE '%$title%' ");
		$dbaser->where(" type ", $this->mediaType);
		$dbaser->where(" id ", $this->mediaID, ' != ');
		$return =  $dbaser->get(' media ', 12);

		return $return;
		
	}
	
	function getRelatedUserMedia()
	{	
		
		global $dbaser;
		
		$dbaser->where(" type ", $this->mediaType);
		$dbaser->where(" author ", $this->userID);
		$dbaser->where(" id ", $this->mediaID, ' != ');
		$return =  $dbaser->get(' media ', 12);

		return $return;
		
	}
	
	
	function getAlbumsList()
	{	
		
		global $dbaser;
		
		$return =  $dbaser->get(' albums ', 12);

		return $return;
		
	}
	
	
	function getAlbum()
	{	
		
		global $dbaser;
		
		$dbaser->where(" id ", $this->albumID);
		$return =  $dbaser->getOne(' albums ');

		return $return;
		
	}
	
	
	function getUserAlbum()
	{	
		
		global $dbaser;
		
		$dbaser->where(" user ", $this->userID);
		$return =  $dbaser->get(' albums ');

		return $return;
		
	}
	
	function getAlbumPrefix()
	{	
				
		global $dbaser;
		
		$dbaser->where(" url ", $this->albumPrefix);
		$return =  $dbaser->getOne(' albums ');

		return $return;
		
	}
	
	function getAlbumItems()
	{	
		
		global $dbaser;
		
		$dbaser->where(" album ", $this->albumID);
		$return =  $dbaser->get(' media ');
		
		return $return;
		
	}
	
	function getMediaPlaylists()
	{	
		
		global $dbaser;
		
		$user_class = new user();
		$user_class->db = $this->db;
		
		$user_class->userName = $this->db->real_escape_string($_GET['type']);
		$user = $user_class->getUser_ID();
		
		$userid = isset($user['id']) ? $user['id'] : '';

		$dbaser->where(" user ", $userid);
		$return =  $dbaser->get(' playlist ');
		
		return $return;
	
	}
	
	function getUserPlaylists()
	{	
		
		global $dbaser;
		
		$dbaser->where(" user ", $this->userID);
		$return =  $dbaser->get(' playlist ');
		
		return $return;
		
	}
	
	function getUserFollowers()
	{	
		
		global $dbaser;
		
		$dbaser->where(" target ", $this->userID);
		$dbaser->join(' `follow` ', 'members.id = `follow`.user ', 'LEFT');
		$return =  $dbaser->get(' members ');

		return $return;
		
	}
	
	function getUserFollowing()
	{	
		
		global $dbaser;
		
		$dbaser->where(" user ", $this->userID);
		$dbaser->join(' `follow` ', 'members.id = `follow`.target ', 'LEFT');
		$return =  $dbaser->get(' members ');

		return $return;
		
	}
	
	function getPlaylists()
	{	
		
		global $dbaser;
		
		if ($this->playlistOrder == '2')  { 
			$dbaser->orderBy(" play ", 'DESC');
			$dbaser->orderBy(" `likes` ", 'DESC');
			$dbaser->orderBy(" comments ", 'DESC');
		} else {
			$dbaser->orderBy(" `id` ", 'DESC');
		}

		$dbaser->where(" public ", 1);
		$return =  $dbaser->get(' playlist ', $this->playlistNum);

		return $return;
		
	}
	
	
	function getMediaPlaylistUser()
	{	
		
		global $dbaser;
		
		$user_class = new user();
		$user_class->db = $this->db;
		
		$user_class->userName = $this->db->real_escape_string($_GET['type']);
		$user = $user_class->getUser();
		
		$userid = isset($user['id']) ? $user['id'] : '';

		$dbaser->where(" user ", $userid);
		$dbaser->where(" url ", $this->playlistPrefix);
		$return =  $dbaser->getOne(' playlist ');

		return $return;
	
	}
	
	function getMediaPlaylistPrefix()
	{	
	
		global $dbaser;
		
		$dbaser->where(" url ", $this->playlistPrefix);
		$return =  $dbaser->getOne(' playlist ');

		return $return;
	
	}
	
	function getMediaPlaylistItems()
	{	
		
		global $dbaser;
		
		$dbaser->where(" playlist ", $this->playlistID);
		$dbaser->where(" media.id = playlist_items.media ");
		$return =  $dbaser->get(' media, `playlist_items` ', $this->playlistNum, ' media.* ');
		
		return !empty($return) ? $return : '2';
	}
	
	
	function getMediaCats()
	{	
	
		global $dbaser;
		
		$dbaser->where(" type ", $this->mediaCatType);
		$return =  $dbaser->get(' cats ');
		
		return !empty($return) ? $return : '2';

	}
	
	function getMediaCat_ID()
	{	
		
		global $dbaser;
		
		$dbaser->where(" id ", $this->mediaCat);
		$return =  $dbaser->getOne(' cats ');
		return !empty($return) ? $return : '2';

	}
	
	function getMediaCatsID()
	{	
		
		global $dbaser;
		
		$dbaser->where(" id ", $this->mediaCat);
		$dbaser->where(" type ", 1);
		$return =  $dbaser->get(' cats ');
		
		return !empty($return) ? $return : '2';

	}
	
	function getMediaCatsPrefix()
	{	
		
		global $dbaser;
		
		$dbaser->where(" url ", $this->mediaCatPrefix);
		$return =  $dbaser->getOne(' cats ');
		
		return !empty($return) ? $return : '2';

	}
	
	
	function getMediaCatItems()
	{	
		
		global $dbaser;

		$dbaser->orderBy(" id ", 'DESC');
		$dbaser->where(" cat ", $this->mediaCat);
		$return =  $dbaser->get(' media ', 12);
		
		return !empty($return) ? $return : '2';

	}
	
	
	function getFolMedia()
	{	
		
		global $dbaser;
		
		$dbaser->orderBy(" id ", 'DESC');
		$dbaser->where(" media.type ", $this->mediaType);
		$dbaser->where(" follow.user ", $this->userID);
		$dbaser->where(" follow.target  =  media.author");
		$return =  $dbaser->get(' media, follow ', 12, ' media.* ');
		
		return !empty($return) ? $return : '2';

	}
	
	function getMoreFolMedia()
	{	
		
		global $dbaser;
		
		$dbaser->orderBy(" id ", 'DESC');
		$dbaser->where(" media.type ", $this->mediaType);
		$dbaser->where(" follow.user ", $this->userID);
		$dbaser->where(" follow.target  =  media.author");
		$dbaser->where(" media.id ", $this->mediaID, ' < ');
		$return =  $dbaser->get(' media, follow ', 12, ' media.* ');
		
		return !empty($return) ? $return : '2';

	}
	
	
	
	//***********************
	// Update function
	//***********************
	function enable_dis_Media()
	{
		
		$query = $this->db->query(sprintf("SELECT * FROM `media` WHERE `id` = '%s'  ", $this->db->real_escape_string($this->mediaID)));
			
		$row = $query->fetch_array();
		
		if  ($row['publish'] == 1) {$publish = '0';} else {$publish = '1';}
		
		$edit = $this->db->query(sprintf("UPDATE `media` SET `publish` = '%s' WHERE `id` = '%s' ", $publish, $this->db->real_escape_string($this->mediaID)));
		
		if($edit)	{$return = '1';} else {$return = '0';}
		
		return $return;
	
	}
	
	
	function updateMedia()
	{	
		
		$media_data = $this->mediaData;
		$id = $this->db->real_escape_string($media_data['media_id']);
		$title = $this->db->real_escape_string($media_data['media_title']);
		$desc = $this->db->real_escape_string($media_data['media_desc']);
		$tags = $this->db->real_escape_string($media_data['media_tags']);
		$cat = $this->db->real_escape_string($media_data['media_cat']);
		$allow = $this->db->real_escape_string(option_toNumber($media_data['media_allow']));
		$album_id = $this->db->real_escape_string($media_data['media_album']);
		$check_album = queryTblParams('albums', " `id` = '$album_id' AND `user` = '$this->userID' ");
		$album = isset($check_album) ? $album_id : '0';
		
		$query = $this->db->query(sprintf("UPDATE `media` SET `title` = '%s', `desc` = '%s', `tags` = '%s', `cat` = '%s', `allow` = '%s', `album` = '%s' WHERE `id` = '%s' AND `author` = '%s' "
		, $title, $desc, $tags, $cat, $allow, $album, $id, $this->db->real_escape_string($this->userID)));
		
		if($query)	
		{
			$return = '1';
		
		} else {
			
			$return = '0';
		
		}
		
		return $return;
	}
		
	
	
	//***********************
	// Delete functions
	//***********************
	function deleteMedia() {
		
		global $dbaser;


		$dbaser->where('id', $this->db->real_escape_string($this->mediaID));
		$media = $dbaser->getOne('media');

		$query = sprintf("DELETE FROM `media` WHERE `id` = '%s' ",$this->db->real_escape_string($this->mediaID));
		
		$delete = $this->db->query($query);
			
		if ($delete) {
			$this->db->query(sprintf("DELETE FROM `cart` WHERE `type` = 'media' AND `type_id` = '%s' ", $this->db->real_escape_string($this->mediaID)));
			$this->db->query(sprintf("DELETE FROM `comments` WHERE `type` = 'media' AND `type_id` = '%s' ", $this->db->real_escape_string($this->mediaID)));
			$this->db->query(sprintf("DELETE FROM `like` WHERE `type` = 'media' AND `type_id` = '%s' ", $this->db->real_escape_string($this->mediaID)));
			$this->db->query(sprintf("DELETE FROM `notifications` WHERE `item` = 'media' AND `type_id` = '%s' ", $this->db->real_escape_string($this->mediaID)));
			$this->db->query(sprintf("DELETE FROM `playlist_items` WHERE  `media` = '%s' ", $this->db->real_escape_string($this->mediaID)));
			

			if ($media['type'] == '1') {$folder = 'media/audio/';} 
			if ($media['type'] == '2') {$folder = 'media/videos/';} 
			if ($media['type'] == '3') {$folder = 'media/photos/';} 
							
			$img = dirname( dirname(__FILE__) ).'/'.$folder.'thumbs/'.$media['thumbs'];
							
			if (is_file($img)) { unlink($img); }					
			
			if ($media['frametype'] == 'local') {
						
				$link = dirname( dirname(__FILE__) ).'/'.$folder.$media['content'];
				
				if (is_file($link)) { unlink($link); }					
				
				if ($media['paid'] == '1') {
					$source = dirname( dirname(__FILE__) ).'/'.$folder.$media['link'];
					if (is_file($source)) { unlink($source); }
					return 1;
				} else {
					return 1;
				}

			} else {

			}
			
			

		} else {
			return 0;
		}		
	}


	//***********************
	// Likes functions
	//***********************
	function getLikes() {
		
		global $dbaser;
		
		$dbaser->where(" type_id ", $this->mediaID);
		$dbaser->where(" type ", $this->getType);
		$return =  $dbaser->get(' `like` ',null,'user');
		
		return !empty($return) ? $return : '2';
		
	}
	
	function getShares() {
		
		global $dbaser;
		
		$dbaser->where(" type_id ", $this->mediaID);
		$dbaser->where(" type = 'media' ");
		$return =  $dbaser->get(' share ',null,'user');
		
		return !empty($return) ? $return : '2';
		
	}
	
	//***********************
	// Counts functions
	//***********************
	function countMediaLikes()
	{	
	
		global $dbaser;
		
		$dbaser->where(" type = 'media' ");
		$dbaser->where(" type_id ", $this->mediaID);
		$return =  $dbaser->get(' `like` ',null,'id');
		
		return count($return);
	
	}
	
	function countMediaComments()
	{	
	
		global $dbaser;
		
		$dbaser->where(" type_id ", $this->mediaID);
		$dbaser->where(" type = 'media' " );
		$return =  $dbaser->get(' comments ',null,'id');
		
		return count($return);
	
	}
	
	function countMediaPlaylist()
	{	
	
		global $dbaser;
		
		$return =  $dbaser->get(' playlist ', null,'id');
		
		return count($return);

	}
	
	function countUserMedia()
	{	
	
		global $dbaser;
		
		$dbaser->where(" author ", $this->userID);
		$return =  $dbaser->get(' media ', null,'id');
		
		return count($return);

	}
	
	public static function cntUserMedia($user, $type = null, $frametype = null, $paid = null)
	{	
	
		global $dbaser;
		
		if (!empty($type) && is_numeric($type)) {
			$dbaser->where(" type ", $type);
			$dbaser->where(" frametype ", $frametype);
			$dbaser->where(" paid ", $paid);
		}

		$dbaser->where(" author ", $user);
		$return =  $dbaser->get(' media ', null,'id');
		
		return count($return);

	}
	
	public static function cntUserItems($user, $type = null)
	{	
	
		global $dbaser;
		
		if (!empty($type) && $type == 'albums') {

			$dbaser->where(" user ", $user);
			$return =  $dbaser->get(' albums ', null,'id');

		} elseif (!empty($type) && $type == 'playlist') {

			$dbaser->where(" user ", $user);
			$return =  $dbaser->get(' playlist ', null,'id');
		}
		
		return count($return);

	}
	
	
}


function getMedia($id)
{	
		
	global $dbaser;
	
	$dbaser->where(" id ", $id);
	$return =  $dbaser->getOne(' media ', null,'id');
		
	return $return;
		
}


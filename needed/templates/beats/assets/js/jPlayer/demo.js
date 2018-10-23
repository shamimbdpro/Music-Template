$(document).ready(function(){

  var myPlaylist = new jPlayerPlaylist({
    jPlayer: "#jplayer_N",
    cssSelectorAncestor: "#jp_container_N"
  }, [
    
  ], {
    playlistOptions: {
      enableRemoveControls: true,
      autoPlay: false
    },
    swfPath: "js/jPlayer",
    supplied: "webmv, ogv, m4v, oga, mp3",
    smoothPlayBar: true,
    keyEnabled: true,
    audioFullScreen: false
  });
  
  $(document).on($.jPlayer.event.pause, myPlaylist.cssSelector.jPlayer,  function(){
    $('.musicbar').removeClass('animate');
    $('.jp-play-me').removeClass('active');
    $('.jp-play-me').parent('li').removeClass('active');
  });

  $(document).on($.jPlayer.event.play, myPlaylist.cssSelector.jPlayer,  function(){
    $('.musicbar').addClass('animate');
  });

  $(document).on('click', '.jp-resume-me', function(e){
    
	myPlaylist.play(); $(this).attr('class', 'jp-pause-me');
  
  });

  $(document).on('click', '.jp-pause-me', function(e){
    
	myPlaylist.pause(); $(this).attr('class', 'jp-resume-me');
  
  });

  $(document).on('click', '.jp-play-me', function(e){
    e && e.preventDefault();
    var $this = $(e.target);

	myPlaylist.setPlaylist([
	  {
		title: $(this).attr('data-title'),
		artist: $(this).attr('data-user'),
		free: false,
		mp3:  rootURL + "ajax/play.php?type=music&media=" + $(this).attr('data-id'),
		poster:  rootURL + "image.php?w=600&h=380&img=m3&src=" + $(this).attr('data-img')
	  },
	]);
	
	myPlaylist.play();
	
	var getID = $(this).attr('id');
	
	$('span.active').removeClass('active');
	$('#' + getID + ' > span').addClass('active');
	$(this).attr('class', 'jp-pause-me');
  });
  
  
  function setPlaylist(json_list)
  {
  
	myPlaylist.setPlaylist(json_list);
	
	myPlaylist.play();
	
  
  }


});

// Set playlist items for play
$(document).on('click', '.set_playlist', function(e){

	e.preventDefault();
			
	var id = $(this).attr('data-id');
	var type = $(this).attr('data-type');
	
	$.ajax({
		type: "GET",
		url: rootURL + 'ajax/medialist.php',
		data: "type="+type+"&media="+id, 
		cache: false,
		dataType: 'json',
		success: function(html) {
			
			if ( html.error != null ) {
				
				$('body').append(html.error);	
			
			} else {	
			
			  	var myPlaylist = new jPlayerPlaylist({
				    jPlayer: "#jplayer_N",
				    cssSelectorAncestor: "#jp_container_N"
			  	}, [
			    
			  	], {
			    	playlistOptions: {
			      		enableRemoveControls: true,
			      		autoPlay: false
			    	},
				    swfPath: "js/jPlayer",
				    supplied: "webmv, ogv, m4v, oga, mp3",
				    smoothPlayBar: true,
				    keyEnabled: true,
				    audioFullScreen: false
			  	});
				
				myPlaylist.setPlaylist(html);
				
				myPlaylist.play();
				
				$(this).attr('class', 'jp-pause-me');
			
			} 
		}
	});
	
});

function loadScript() {

	if (typeof(YT) == 'undefined' || typeof(YT.Player) == 'undefined') {
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	}
}

function loadPlayer() {
	window.onYouTubePlayerAPIReady = function() {
		onYouTubePlayer();
	};
}

$(function () {

	loadScript();
	
	var player, time_update_interval = 0;
	  
	function onYouTubeIframeAPIReady(id) {
	    player = new YT.Player('video-player', {
	        videoId: id,
			playerVars: {
				"origin": document.domain,
				autoplay: 1,
	            color: 'white'
	        }
	    });
	}


	// Helper Functions

	function formatTime(time){
	    time = Math.round(time);

	    var minutes = Math.floor(time / 60),
	        seconds = time - minutes * 60;

	    seconds = seconds < 10 ? '0' + seconds : seconds;

	    return minutes + ":" + seconds;
	}

	// Get video for play
	$(document).on('click', '#play_video', function(e){

		e.preventDefault();
				
		var id = $(this).attr('data-id');
		var type = $(this).attr('data-type');
		
		$.ajax({
			type: "GET",
			url: rootURL + 'ajax/play.php',
			data: "type="+type+"&media="+id, 
			cache: false,
			dataType: 'json',
			success: function(html) {
			
				if ( html[0].frame) {
					$('#video-player').removeClass('hide');
					onYouTubeIframeAPIReady(html[0].content);
					
				} else if ( html[0].mp4 ) {

					$('#video-player').removeClass('hide');
					
				  	$("#jplayer_1").jPlayer({
				   		ready: function () {
					    	$(this).jPlayer("setMedia", {
								title: html[0].title,
								m4v: html[0].mp4,
								ogv: html[0].ogv,
								webmv: html[0].mp4,
								poster: html[0].poster
					    	}).jPlayer("play");
					   },
					   autoPlay: true,
					   supplied: "webmv, ogv",
					   size: {
				            width: "100%",
				            height: "280px",
				            cssClass: "jp-video-360p"
				        },
						globalVolume: true,
						smoothPlayBar: true,
						keyEnabled: true,
				   		swfPath: "./"
				  	});
				} 
			}
		});
	});
});
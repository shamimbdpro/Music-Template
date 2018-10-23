<div class="wrapper" id="tabs_upload"> 
	<div class="ui pointing secondary menu">
		<a class="item active" data-tab="grab_video"><h4>[@LANG_GRAB_VIDEO]</h4></a>
        <a class="item" data-tab="grab_channel"><h4>[@LANG_GRAB_CH]</h4></a>
        <a class="item" data-tab="grab_playlist"><h4>[@LANG_GRAB_PLAYLIST]</h4></a>
	</div>
	<div class="ui tab segment active" data-tab="grab_video">
		[@video_tpl]
	</div>
	
	<div class="ui tab segment" data-tab="grab_channel">
		
	</div>
	
	<div class="ui tab segment" data-tab="grab_playlist">
		
	</div>
	
	<script>
		$('#tabs_upload .menu .item')
		  .tab({
			apiSettings: {
			  loadingDuration : 300
			},			
			context         : 'parent',
			auto            : true,
			path            : '[@path]ajax/require.php?require='
		});
	</script>	
				
			  
</div>



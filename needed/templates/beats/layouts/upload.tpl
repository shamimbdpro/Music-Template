<script type="text/javascript" src="[@url]templates/beats/assets/js/fileinput.min.js" ></script>

<div class="wrapper" id="tabs_upload"> 
	<div class="ui pointing secondary menu">
		<a class="item [@enable_music] active" data-tab="upload_music"><h4>[@LANG_FREE_MU]</h4></a>
        <a class="item [@enable_videos]" data-tab="upload_video"><h4>[@LANG_FREE_VI]</h4></a>
        <a class="item [@enable_photos]" data-tab="upload_photo"><h4>[@LANG_FREE_PH]</h4></a>
	</div>
	<div class="ui tab segment active" data-tab="upload_music">
		[@music_tpl]
	</div>
	
	<div class="ui tab segment" data-tab="upload_video">
		
	</div>
	
	<div class="ui tab segment" data-tab="upload_photo">
		
	</div>
	  
	<script type="text/javascript">

		$('#tabs_upload .menu .item')
		  .tab({
			apiSettings: {
			  loadingDuration : 300
			},			
			evaluateScripts: true,
			context         : 'parent',
			auto            : true,
			path            : '[@path]ajax/require.php?require='
		});
	</script>	
				
			  
</div>
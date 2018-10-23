
<div class="ui card">
	<div class="content">
		<img src="[@url]image.php?src=[@pic]&w=100&h=100&img=ch" alt="" class="ui avatar image">  
		<a href="[@url]user/[@name]">[@realname]</a>
	</div>
	<div class="image">
		<a href="[@url]media/[@id]"><img style="height: auto; max-width: 100%;" src="[@url]image.php?src=[@thumbs]&w=500&h=500&img=[@img_type]"></a>
	</div>
	<div class="extra content">
		<a href="[@url]media/[@id]" title="[@title_full]"> [@title] </a>
		
		<div class="ui clear clearfix two buttons">
			<div class="ui basic blue button confirm-form" data-id="[@id]" data-type="ban_media"  href="#ConfirmModal" data-title="[@ban_title]: [@title]" data-toggle="modal" data-placement="bottom" >
				<i class="fa fa-[@ban_media]"></i>
			</div>
			<div class="ui basic red button confirm-form" data-id="[@id]" data-type="del_media"  href="#ConfirmModal" data-title="Are you sure you want to delete: [@title]" data-toggle="modal" data-placement="bottom" >
				<i class="fa fa-times"></i>
			</div>
		</div>
	</div>
</div>
							 
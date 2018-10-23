
<!-- comment form -->
<article class="comment-item media no-padder" id="comment-form">
	<a class="pull-left thumb-sm avatar" href="[@userlink]"><img src="[@pic]" alt="[@username]"></a>
	<section class="media-body">
		<form id="comment_form" class="commentform m-b-none" >
			<input type="hidden" name="type" value="[@type]">
			<input type="hidden" name="type_id" value="[@type_id]">
			<div class="input-group">
				<input name="comment" type="text" class="form-control" placeholder="Input your comment here">
				<span class="input-group-btn">
					<input class="btn btn-primary" type="submit" [@disabled] id="submit" value="Send">
				</span>
			</div>
			<div class="clearfix"></div>
		</form>
	</section>
</article>
	
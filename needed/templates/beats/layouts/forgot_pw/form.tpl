				<div style="padding: 15px">
					<form class="form-horizontal" role="action" id="subscribe" method="POST">

						<input type="hidden" name="type" value="recover_pw">
						<input type="hidden" name="target" value="recover_pw">
						<input type="hidden" name="id" value="[@id]">
						<div class="form-group">
		                  	<label>New password</label>
		                  	<input type="password" class="form-control" placeholder="New password (min 7 digits)" name="recover_pass" required="required" autocomplete="off">
		                </div>
						<div class="form-group">
		                  	<label>Confirm Password</label>
		                  	<input type="password" class="form-control" placeholder="New password (min 7 digits)" name="recover_pass_confirm" required="required" autocomplete="off">
		                </div>
	                    <div class="form-group ">
	                      <div class="">
								<button class="ui positive button large" type="submit">[@LANG_SAVE]</button>
	                      </div>
	                    </div>
					</form>
				</div>
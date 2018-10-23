<div class="wrapper" > 
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				 [@LANG_MK_WITHDRAWAL]
			</header> 
			<div class="ui wrapper">
				<div class="ui huge labels pull-right">
				  <span class="ui label">[@LANG_CUR_CREDIT]:  $[@credit]</span>
				</div>  
				<h4> [@LANG_PY_METHODS] </h4>
			</div>
			<div class="ui wrapper">
				[@message]
				<div class="ui styled fluid accordion">
				<br />
					<form class="form-horizontal" id="withdrawal">

						<input type="hidden" name="form_type" value="withdrawal">
			
						<div class="form-group">
	                      <label class="col-sm-2 control-label">[@LANG_AMOUNT]</label>
	                      <div class="col-sm-10">
	                        <input type="text"  name="amount" required="required" title="Fill this field" placeholder="[@LANG_AMOUNT]" class="form-control "> 
	                      </div>
	                    </div>
						<div class="form-group">
	                      <label class="col-sm-2 control-label">[@LANG_ACC]</label>
	                      <div class="col-sm-10">
	                        <input type="text"  name="account" required="required" title="Fill this field" placeholder="[@LANG_ACC]" class="form-control "> 
	                      </div>
	                    </div>
						<div class="form-group">
	                      <label class="col-sm-2 control-label">[@LANG_METHOD]</label>
	                      <div class="col-sm-10">
	                        [@payment_mehods]
	                      </div>
	                    </div>
						
	                    <div class="form-group ">
	                      <div class="col-sm-4 col-sm-offset-2">
								<div class="ui buttons form-group m-l">
									<button class="ui button" type="reset">[@LANG_CANCEL]</button>
									<div class="or"></div>
									<button class="ui positive button" type="submit">[@LANG_SAVE</button>
								</div>
	                      </div>
	                    </div>
	                    <div class="line line-dashed b-b line-lg pull-in"></div>
					</form>
				</div>
			</div>
		</section>	
	</div>
</div>


<div class="wrapper" > 
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				 [@LANG_OLD_WITHDRWAL]
			</header>
			<div class="ui wrapper">
				
				<table class="ui celled table">
				  <thead>
				    <tr>
				      <th>[@LANG_ID]</th>
				      <th>[@LANG_AMOUNT] </th>
				      <th>[@LANG_METHOD]</th>
				      <th>[@LANG_STATUS]</th>
				      <th>[@LANG_DATE]</th>
				    </tr>
				  </thead>
				  <tbody>
				  	[@old]
				  </tbody>
				</table>
			</div>
		</section>	
	</div>
</div>

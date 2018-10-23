<div class="wrapper" > 
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				 [@LANG_SUBSCRIPTION]
			</header> 
			<div class="ui wrapper">
				<div class="ui huge labels pull-right">
				  <span class="ui label">[@LANG_CUR_CREDIT]:  $[@credit]</span>
				</div>  
				<h4> Current plan <span class="ui red header">[@plan_title]</span> | End date: <span class="ui red header">[@plan_date]</span> </h4>
			</div>
			<div class="ui wrapper">
				[@message]
				<table class="ui definition table">
					<thead>
					    <tr><th width="300"></th>
					    [@plans]
					</tr></thead>
					<tbody>
						<tr><td>Price </td>[@plan_cost]</tr>
						<tr><td>Period </td>[@plan_period]</tr>
						[@plan_access]
					</tbody>
					<tfooter>
					    <tr>
					    	<th><h4>[@LANG_SUBSCRIPTION_MSG]</h4></th>
							[@plans_form]
						</tr>
					</tfooter>
				</table>

				<div class="ui styled fluid accordion">
				<br />
				</div>
			</div>
		</section>	
	</div>
</div>


<div class="wrapper" > 
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				 [@LANG_OLD_SUBSCRIPTION]
			</header>
			<div class="ui wrapper">
				
				<table class="ui celled table">
				  <thead>
				    <tr>
				      <th>[@LANG_ID]</th>
				      <th>[@LANG_PLAN] </th>
				      <th>[@LANG_EX_DATE]</th>
				      <th>[@LANG_STATUS]</th>
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

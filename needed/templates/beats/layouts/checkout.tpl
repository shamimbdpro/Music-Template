<div class="wrapper" > 
	<div class="ui menu">
		<a class="item "><h4><i class="truck icon"></i> [@LANG_ITEMS_LIST] </h4></a>
	</div>
	<div class="ui tab segment active" data-tab="upload_music">
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				<span class="label bg-danger pull-right m-t-xs">[@count_items]</span> [@LANG_ITEMS] 
			</header> 
			<table class="table table-striped m-b-none"> 
				<thead> <tr> <th>[@LANG_PROGRESS]</th> <th>[@LANG_ITEM]</th> <th>[@LANG_DEL]</th> <th style="width:90px;"></th> </tr> </thead> 
				<tbody> 
					[@items]
					<tr class="total" id="checkout-cart-' . $query['id'] . '">
						<td> <h4>[@LANG_TOTAL]</h4>	</td>
						<td> 	</td>
						<td>	</td>
						<td><h3>[@total_price] $</h3></td>
					</tr>	
				</tbody> 
			</table> 
		</section>
		<section class="panel panel-default"> 
			<header class="panel-heading"> 
				 [@LANG_BUY_NOW]
			</header> 
			<div class="ui wrapper">
				<div class="col-md-6">
					<h4> 
						[@LANG_CUR_CREDIT] 
						<span class="bg-danger negative ui button large">[@credit] $</span>
					</h4>
					<p> [@LANG_ENOUGH_CREDIT]</p>
					<a href="[@url]checkout/pay" class="btn btn-s-md btn-info btn-rounded">[@LANG_BUY_NOW]</a>
				</div>
				<div class="col-md-6">
					<h4> 
						<a href="[@url]deposite" class="btn btn-s-md btn-danger btn-rounded">[@LANG_MK_DEPOSITE]</a>
					</h4>
				</div>
				<div class="clear clearfix"></div>
			</div>
		</section>	
	</div>
</div>
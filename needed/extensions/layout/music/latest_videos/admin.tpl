
<div class="form-group">
	<label class="control-label col-lg-2">Select category </label>
	<div class="col-lg-10">
		<select data-placeholder="Select category ..." name="options[cat]" class="form-control chzn-select" tabindex="4">
			<option value="all" > All </option>
			[@cats]
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-2">Max items</label>
	<div class="col-lg-10">
		<input type="text" name="options[max_items]" placeholder="Max items to view " class="form-control" value="[@max_items]">
	</div>
</div>


<div class="form-group">
	<label class="control-label col-lg-2">Select ordering </label>
	<div class="col-lg-10">
		<select data-placeholder="Order by ..." name="options[order]" class="form-control chzn-select" tabindex="4">
			<option value="1" > View Latest </option>			
			<option value="2" > View Trends</option>
		</select>
	</div>
</div>


<form class="form-horizontal" type="POST" id="plugin_admin" data-id="[@plugin_id]">
            <div class="panel-body">
              <div id="result"></div>
                    
            <!--BEGIN INPUT TEXT FIELDS-->
              <input type="hidden" name="form_type" value="plugin">
              <input type="hidden" name="plugin_id" value="[@plugin_id]">
              <input type="hidden" name="plugin_link" value="[@plugin_link]">

              <!--BEGIN SELECT        -->
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    [@plugin_name] ( options and features )
        				    <br /><br />
                  </header>
				          <br />
                  <div id="div-1" class="body">
          					[@content]
					        <div class="clear clearfix"></div><hr />
        					<div class="form-actions no-margin-bottom"><input type="submit" value="Save" class="btn btn-primary"></div>
					  
  				  </div>
  				</div>			
			  </div>
			</div>

</form>			
   
			
<script>
	jQuery(".chzn-select").chosen();
</script>
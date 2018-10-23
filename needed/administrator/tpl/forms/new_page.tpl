			<!-- Load editor assets-->
			<link rel="stylesheet" href="[@url]administrator/assets/css/bootstrap3-wysihtml5.min.css">
			<script src="[@url]administrator/assets/js/bootstrap3-wysihtml5.all.min.js"></script>	
			
			<!-- Load Uploader assets-->
			<script src="[@url]administrator/assets/js/holder.js"></script>
			<link href="[@url]administrator/assets/css/jasny-bootstrap.min.css" rel="stylesheet">
			<script src="[@url]administrator/assets/js/jasny-bootstrap.min.js"></script>
			
			<div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
					  <input type="hidden" name="form_type" value="add_page" />
                      <div class="form-group">
                        <label class="control-label col-lg-5">Page title * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="title" id="title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Page link * </label>
                        <div class="col-lg-5">
                          <input type="text" class="validate[required] form-control" name="prefix" id="prefix">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Select template *</label>
                        <div class="col-lg-5">
                          <select name="template" id="template" class="validate[required] form-control">
                            <option value="">Choose template</option>
							[@templates_select]
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label for="text4" class="control-label col-lg-4">Page content</label>
                        <div class="col-lg-12">
						   <textarea class="wysihtml5" class="form-control" name="content" rows="10"></textarea>
                        </div>
                      </div><!-- /.form-group -->
					  
                      <div class="form-group">
                        <label class="control-label col-lg-5">Select layout *</label>
                        <div class="col-lg-5">
                          <select name="layout" id="layout" class="validate[required] form-control">
                            <option value="">Choose layout</option>
							[@page_layout]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Page keywords </label>
                        <div class=" col-lg-5">
                          <input class="form-control" type="text" name="keywords" id="password" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Page description ( for SEO ) </label>
                        <div class=" col-lg-5">
                          <textarea class="form-control" name="desc" id="desc" ></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Published *</label>
                        <div class=" col-lg-5">
                          <input class="make-switch" type="checkbox" name="publish" data-size="normal" checked>
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
				
<script>	
	$(function() {
		Metis.formValidation();	
	});
	jQuery('.wysihtml5').wysihtml5();	  
</script>
	
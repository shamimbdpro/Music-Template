
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
  <!-- Only include on form edit page -->
  <link rel="stylesheet" type="text/css" media="screen" href="[@path]/assets/form-builder.min.css">
  <!-- Only include on form render page -->
  <link rel="stylesheet" type="text/css" media="screen" href="[@path]/assets/form-render.min.css">
  

	
    <div class="form-group">
		<label for="mail" class="control-label col-lg-2">Reciever Email-address </label>
		<div class="col-lg-10">
			<input type="text" name="options[mail]" id="mail" placeholder="For multiple emails (name@example.com , name2@example.com)" class="form-control" value="[@mail]">
		</div>
	</div>
					  
    <div id="main_content_wrap">
      <section id="main_content" class="inner">
        
        <div class="build-form">
          <h2><strong>Build The Form</strong></h2>
          <form action="">
            <textarea name="form" id="form-builder-template" cols="30" rows="10">[@form]</textarea>
          </form>
          <br style="clear:both">
        </div>
      </section>
    </div>
	<div class="clear clearfix"></div>
   <div id="rendered-form" class="body">
	<h3> IMPORTANT! click on save template before saving the plugin </h3>
   </div>
	
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <!-- Only include on form edit page -->
  <script src="[@path]/assets/form-builder.min.js"></script>
  <!-- Only include on form render page -->
  <script src="[@path]/assets/form-render.min.js"></script>
  <script>
  jQuery(document).ready(function($) {
    'use strict';
    var template = document.getElementById('form-builder-template'),
      formContainer = document.getElementById('rendered-form'),
      renderBtn = document.getElementById('render-form-button');
    $(template).formBuilder();
	
	
    $(renderBtn).click(function(e) {
      e.preventDefault();
      $(template).formRender({
        container: $(formContainer)
      });
    });
  });
  </script>
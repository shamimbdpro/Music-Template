
$('body').on('submit', 'form.ajax-form-builder', function(e){
	
	var form_id = $(this).attr('id');
	
	var id = $(this).attr('data-id');
	
	var path = $(this).attr('data-plugin');
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form.ajax-form-builder")[0]);
	
	$.ajax({
		url: path + '/ajax.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html) {
				//window.location.assign(document.URL + '/#' + form_id);
				$('#form_result_' + id).html(html);
			} else {
				alert(html);
			}
		}
	}); 
	
	
});




jQuery(document).ready(function($) {
    'use strict';
    var template = document.getElementById('form-builder-template'),
      formContainer = document.getElementById('rendered-form'),
      renderBtn = document.getElementById('render-form-button');
    $(template).formRender();
	
	
    $(renderBtn).click(function(e) {
      e.preventDefault();
      $(template).formRender({
        container: $(formContainer)
      });
    });
});
  
  
  
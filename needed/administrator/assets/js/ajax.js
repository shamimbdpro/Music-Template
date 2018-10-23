/**
// Medians PRO CMS			                        			

// Author : Himero.net 

// Copyright 2015
*/


// Require txt by ajax
$('body').on('click', '#update_this', function(e){
	
	var val = $( this ).parent('div').find( "#get_this_value" ).val();
	var id = $(this).parent('div').parent('td').parent('tr').attr('id');
	var type = $(this).parent('div').attr('data-type');
	var name = $(this).parent('div').attr('data-name');
	$(this).parent('div').attr('id', 'edit_this_item');
	
	if (type == 'select') {

		var new_value = $( this ).parent('div').find( "#get_this_value" ).find( "option[value='"+val+"']" ).text();

	} else if (type == 'text') {
		
		var new_value = val;
		
	}

	if (new_value) {
		$.ajax({
			type: "POST",
			url: rootURL + "administrator/ajax/ajax_edit.php",
			data: "value=" + val + "&col="+name+"&id=" + id+"&new_value=" + new_value, 
  			context: '#collapse4',
			cache: false,
			success: function(html) {
				if (html) {
					$('#edit_this_item').html(html);
					$('#edit_this_item').removeAttr('id');
				}
			}
		});
			
	}
	$(this).parent('div').addClass('ajax_get');
	
});

// Require txt by ajax
$('body').on('click', '.ajax_get', function(e){
	
	var type = $(this).attr('data-type');
	var val = $(this).attr('data-val');
	var name = $(this).attr('data-name');
	$(this).attr('id', 'edit_this_item');
	
	if (type == 'text') {

		$(this).html("<input class='form-control' type='text' id='get_this_value' value='" + val + "'>  <i id='update_this' class='fa fa-check'></i>");
		$('#edit_this_item').removeAttr('id');

	} else if (type == 'select') {

		$.ajax({
			type: "POST",
			url: rootURL + "administrator/ajax/ajax_get.php",
			data: "content=" + val + "&name=" + name, 
  			context: '#collapse4',
			cache: false,
			success: function(html) {
				if (html) {
					$('#edit_this_item').html(html + ' <i id="update_this" class="fa fa-check"></i>');
					$('#edit_this_item').removeAttr('id');
				}
			}
		});
			
	}
	$(this).removeClass('ajax_get');
	$( this ).closest( "#get_this_value" ).val('test');
	
});

// Require form by ajax
$('body').on('click', '.require-form', function(e){
	
	var title = $(this).attr('data-title');
	
	$('#modal-title').html(title);
	
	var require = $(this).attr('data-require');
	
	var type = $(this).attr('data-type');
	
	var id = $(this).attr('data-id');
	
	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/require.php",
		data: "id="+id+"&require=" + require+"&type=" + type, 
		cache: false,
		success: function(html) {
			if (html) {
				$('#modal-body').html(html);
			}
		}
	});
	
});


// Confirmation form by ajax
$('body').on('click', '.confirm-form', function(e){
	
	var title = $(this).attr('data-title'); 
	
	var id = $(this).attr('data-id'); 
	
	var type = $(this).attr('data-type'); 
	
	$('#confirm-body').html('<h4>' + title + '</h4>');
	
	$('#confirm-delete').attr("data-id", id); $('#confirm-delete').attr("data-type", type);
	
});


// Delete action by ajax
$('body').on('click', '#confirm-delete', function(e){
	
	var id = $(this).attr('data-id'); 
	var type = $(this).attr('data-type'); 
	
	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/delete.php",
		data: "id="+id+"&type=" + type, 
		cache: false,
		success: function(html) {
			if (html) {
				$('#site-content').prepend(html);
				location.reload();
			} else {
				$('#site-content').prepend('Error. please try again');
			}
		}
	});
	
});


// Add new form
$('body').on('submit', 'form.form-add', function(e){

	var title = $(this).attr('data-title');
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form.form-add")[0]);
		
	$.ajax({
		url: rootURL + 'administrator/ajax/add.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html) {
				$('#modal-body').prepend(html).removeClass('hide');
				/*$('#modal-body .form-group input').val('');*/
			} 
		}
	}); 
});



// Edit form
$('body').on('submit', 'form.form-edit', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'administrator/ajax/edit.php',
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html, e) {
			if (html) {
				// alert(1);
				//$('#modal-body').prepend(html).removeClass('hide');
				$('#form_result').html(html);
			} 
		}
	});
});



// Administrator login form
$('body').on('submit', 'form#loginadmin', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form#loginadmin")[0]);
		
	$.ajax({
		url: rootURL + 'administrator/ajax/login.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				location.reload();
			} else {
				$('p#checklogin').html(html);
			} 
		}
	});
});




// Set default template
$('body').on('click', '#set_default', function(e){
	
	var title = $(this).attr('data-title');  
	
	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/updates.php",
		data: "type=set_template&title=" + title, 
		cache: false,
		success: function(html) {
			if (html) {
				window.location.reload();
			}
		}
	});
	
});



// Set action
$('body').on('click', '#set_action', function(e){

	var title = $(this).attr('data-title');  
	var id = $(this).attr('data-id');  

	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/action.php",
		data: "id=" + id + "&type=" + title, 
		cache: false,
		success: function(html) {
			if (html == 1) {
				location.reload();
			} else {
				$('#result').html(html);
			}
		}
	});
	
});


// Edit form
$('body').on('submit', 'form#new-module', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form#new-module")[0]);
	
	var title = $('#plugin-name').val();
	
	if (title) {
		window.location.assign(rootURL + 'admin/hooks/' + title);
	} 
});


// Add new post
$('body').on('submit', 'form#post', function(e){

	var id = $(this).attr('data-id');
	
	if (id > 0) {var link = 'edit';} else {var link = 'add';}
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form#post")[0]);
	
	$.ajax({
		url: rootURL + 'administrator/ajax/' + link + '.php',
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				window.history.back();
			} else {
				$('#post-page').append(html);
			}
		}
	}); 
	
});

// Add new Hook
$('body').on('submit', 'form#plugin_admin', function(e){
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form#plugin_admin")[0]);
	
	$.ajax({
		url: rootURL + 'administrator/ajax/edit.php',
		type: 'POST',
		data: formData,
		
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				window.location.reload();
			} else {
				$('#result').html(html);
			}
		}
	}); 
	
});


// Add new Hook
$('body').on('submit', 'form#hook_admin', function(e){

	var id = $(this).attr('data-id');
	
	if (id > 0) {var link = 'edit';} else {var link = 'add';}
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($("form#hook_admin")[0]);
	
	$.ajax({
		url: rootURL + 'administrator/ajax/' + link + '.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				window.location.assign(rootURL + 'admin/hooks/');
			} else {
				$('#result').html(html);
			}
		}
	}); 
	
});



// Require Media library by ajax
$('body').on('click', '.require-library', function(e){
	
	var title = $(this).attr('data-title');
	
	$('#modal-library-title').html(title);
	
	var require = $(this).attr('data-require');
	
	var id = $(this).attr('data-id');
	
	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/require.php",
		data: "id="+id+"&require=" + require, 
		cache: false,
		success: function(html) {
			if (html) {
				$('#modal-library-body').html(html);
			}
		}
	});
	
});


// Delete photo
$('body').on('click', '#delete_photo', function(e){
	
	e.preventDefault();
	var id = $(this).attr('data-id');
	
	$(this).parent('li').hide();
	
	if (id) {
		
		$.ajax({
			type: "POST",
			url: rootURL + "administrator/ajax/media.php",
			data: "id="+id+"&type=delete", 
			cache: false,
			success: function(html) {
				if (html !== '1') {
					alert(html);
				}
			}
		});
	}	
});



// Add new photo
$('body').on('submit', 'form#upload-media-library', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($(this)[0]);
	
	$.ajax({
		url: rootURL + 'administrator/ajax/media.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html) {
				$('#MediaLibrary').find('input#upload-media-library').val('');
				$('#MediaLibrary').find('#hide-modal').click();
			} 
		}
	}); 
	
});

// Get media library
$('body').on('click', '#get_media_library', function(e){
	
	var main_input = $(this).find('input').attr('id');
	
	$('body').find('#ch_library_image').attr('data-input' , main_input );
	
});


// Empty media imput
$('body').on('click', '#empty_media_slct', function(e){
	
	var main_input = $(this).attr('data-id');
	
	$('body').find('input#' + main_input).val('');
	$('img#' + main_input ).attr('src' , '');
});




$('body').on('click', '#ch_library_image', function(e){

	var input_val = $(this).attr('data-input');
	
	var img = $(this).attr('data-img');
	
	var url = $(this).attr('data-url');
	
	$('input#' + input_val).val(img);
	
	$('img#' + input_val).attr('src' , url);
	
});

$('body').on('click', '#full_media_library li', function(e){
	
	var img = $(this).attr('data-id');
	
	var uel = $(this).attr('data-url');
	
	$('#ch_library_image').attr('data-url' , uel );
	
	$('#ch_library_image').attr('data-img' , img );
	
	$('#full_media_library').find('img').css( "border", " 0 ");
	
	$(this).find('img').css( "border", "2px solid ");
	
});


// Load more items
$('body').on('click', '#load-more', function(e){
	
	var id = $(this).attr('data-id'); 
	var require = $(this).attr('data-require'); 
	var type = $(this).attr('data-type'); 
	
	$.ajax({
		type: "POST",
		url: rootURL + "administrator/ajax/more.php",
		data: "id="+id+"&type=" + type+"&require=" + require, 
		cache: false,
		success: function(html) {
			if (html) {
				$('#load-more').remove();
				$('#ajax-load').append(html);
			} else {
				$('#load-more').html('No more items');
			}
		}
	});
	
});



/**
// Medians PRO CMS			                        			

// Author : Himero.net 

// Copyright 2015
*/

// Members login form
$('body').on('submit', 'form#members_form', function(e){
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/login.php',
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
				$('body').append(html);
			} 
		}
	});
});



// Comments form
$('body').on('submit', 'form#comment_form', function(e){
	
	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($('form#comment_form')[0]);
		
	$.ajax({
		url: rootURL + 'ajax/comments.php',
		type: 'POST',
		data: formData,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html) {
				$('body').append(html);
				$(e.target).find('input[name="comment"]').val("");
			} 
		}
	});
});



// Links in ajax
$(document).on('click', 'a', function(e){

	/* stop form from submitting normally */
	
	var link = $(this).attr('href');
	var load_ajax = $(this).attr('data-ajax');
	var title = $(this).text();
	
	
	if (load_ajax == 'true' && link !== '#' && AjaxLoad == 1) {	
		e.preventDefault();
		loadPageAjax(link, load_ajax, title);
	}
});


$(window).on("popstate", function(e) {
	e.preventDefault();
    //console.log(e.originalEvent.currentTarget);
	var link = window.location.href;
	if (link.slice(-1) !== '#') {
		if (link == rootURL) {
			document.location = rootURL;
		} else {
			loadPageAjax(link, 'true', '');
		}
	}
});


function loadPageAjax(link, load_ajax, title) {
	
	if (load_ajax == 'true' && link !== '#' && AjaxLoad == 1) {
		
		$('#myBar').css('width','0%');
		$('#myBar').css('display','block');
		
		$.ajax({

			xhr: function() {
	            var xhr = new window.XMLHttpRequest();
	            xhr.addEventListener('progress', function(e) {
		            if (e.lengthComputable) {
		            	$('#myBar').animate({width: (100 * e.loaded / e.total) + '%'});
		            }
						
	            });
	            return xhr;
	        }, 
			type: "POST",
			url: link,
			data: "ajax_load=true", 
			cache: false,
			success: function(html) {
				
				if ( html) {
					
					if ( title ) {window.top.document.title = title;}
					history.pushState(null, title, link);
					$('aside#sidebar').remove();
					$('#bjax-target').html(html);
					reload_funcs();
					setTimeout(function() {
						$('body #myBar').css('display','none');
					}, 1000);
				} 
			}
		});
	}
	
}
function NotePopup(msg, type) {
	
	if (type == '1') {
		var text_color = 'style="color:#333"';
		var state = 'alert-success';
		var alert = '<script>alertify.success("'+msg+'");</script>';
	} else if (type == '2') {
		var text_color = 'style="color:#fff !important"';
		var state = 'alert-danger';
		var alert = '<script>alertify.error("'+msg+'");</script>';
	} else if (type == '3') {
		var text_color = 'style="color:#fff"';
		var state = 'alert-info';
		var alert = '<script>alertify.warning("'+msg+'");</script>';
	}
	
	/////////////////////////
	// Returns Notifications 
	/////////////////////////
	$('body').append(  '<div class="alert '+state+'"  '+text_color+'>' +
          '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
           + msg + ' '+ alert + '</div>');
	
}


// Edit function
$('body').on('submit', 'form#edit_form', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);

	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/update.php',
		type: 'POST',
		data: formData,

		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			
			if (html) {
				$('body').append(html);
			} 
			
			page_loader(0);
		}
	});
});


// Upload media
$('body').on('submit', 'form#upload_media', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.addEventListener('progress', function(e) {
            	console.log(e);
                if (e.lengthComputable) {
                    $('#myBar').css('width', '' + (100 * e.loaded / e.total) + '%');
                }
            });
            return xhr;
        }, 
		url: rootURL + 'ajax/upload.php',
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				location.reload();
			} else {
				$('body').append(html);
			} 
			page_loader(0);

		}
	});
});

// Grab media form YouTube
$('body').on('submit', 'form#grab_youtube', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/grab.php',
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				location.reload();
			} else {
				//alert(html);
				$('body').append(html);
			} 
			page_loader(0);

		}
	});
});



// Grab media form SoundCloud
$('body').on('submit', 'form#grab_soundcloud', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/grab_sc.php',
		type: 'POST',
		data: formData,

		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == 1) {
				location.reload();
			} else {
				$('body').append(html);
			} 
			page_loader(0);
		}
	});
});


// Grab media form SoundCloud
$('body').on('submit', 'form#search_soundcloud', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/grab_sc.php',
		type: 'POST',
		data: formData,

		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html) {
				$('#sc_search_result').html(html);
			} 
			page_loader(0);
		}
	});
});


// Confirm withdrawal form
$('body').on('submit', 'form#withdrawal', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	page_loader(1);
	
	var formData = new FormData($(this)[0]);
		
	$.ajax({
		url: rootURL + 'ajax/withdrawal.php',
		type: 'POST',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			if (html == '1') {
				NotePopup('Your order sent successfully', 1);
				location.reload();
			} else {
				$('body').append(html);
			}
			page_loader(0);
		}
	});
});


// Search form
$('body').on('submit', 'form#main-search', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	var type = $(e.target).find('input[name="search"]:checked').val();
	var value = $(e.target).find('input[name="word"]').val();
	
	if (value) {
		var link = rootURL + "search/" + type + "/" + value;
		loadPageAjax(link, 'true', value);
	}
});



// Action via form
$('body').on('submit', 'form#make_action', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var id = $(e.target).find('select[name="id"]').val();
	var type = $(e.target).find('input[name="type"]').val();
	var target = $(e.target).find('input[name="target"]').val();
	
	$.ajax({
		type: "POST",
		url: rootURL + 'ajax/action.php',
		data: "type=" + type + "&id=" + id + "&target=" + target, 
		cache: false,
		success: function(html) {
			
			if ( html.error != null ) {
				alert(html.error);	
			} else {	
				$('body').append(html);
			} 
		}
	});
	
});

$('body').on('submit', 'form#members_form', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var title = $(e.target).find('input[name="title"]').val();
	
	if (title) {
		
		$.ajax({
			type: "POST",
			url: rootURL + 'ajax/search.php',
			data: "title=" + title + "&form_type=search_members", 
			cache: false,
			success: function(html) {
			
				if ( html) {
					$('#latest_members').html(html);
				} 
			}
		});
	}
});

$('body').on('submit', 'form#make_action_input', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var id = $(e.target).find('input[name="id"]').val();
	var type = $(e.target).find('input[name="type"]').val();
	var target = $(e.target).find('input[name="target"]').val();
	
	if (id) {
		
		$.ajax({
			type: "POST",
			url: rootURL + 'ajax/action.php',
			data: "type=" + type + "&id=" + id + "&target=" + target, 
			cache: false,
			success: function(html) {
				
				if ( html) {
					$(e.target).find('input[name="id"]').val('');
					$('body').append(html);
					if (target == 'add_playlist') {
						location.reload();
					}
				} 
			}
		});
	}
});

// Add new album
$('body').on('submit', 'form#form_action', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($(this)[0]);
		
	var id = $(e.target).find('input[name="id"]').val();
	
	if (id) {
	
		$.ajax({
			url: rootURL + 'ajax/action.php',
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (html) {
				if (html) {
				
					$(e.target).find('input[name="id"]').val('');
					$('body').append(html);
				
				} else {
					
				}
			}
		});
	}	
});


// Subscribe to plan
$('body').on('submit', 'form#subscribe', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var formData = new FormData($(this)[0]);
	
	$.ajax({
		url: rootURL + 'ajax/action.php',
		type: 'POST',
		data: formData,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function (html) {
			
			if (html.reload && html.reload == 1) {
				window.location.href = html.url;
			} else if (html.msg) {
				$('body').append(html.msg);
			}
		}
	});
});



// Chat messages via form
$('body').on('submit', 'form#send_chat_message', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var message = $(e.target).find('input[name="message"]').val();
	var user = $(e.target).attr('data-user');
	var type = $(e.target).attr('data-type');
	
	if (user && message) {
		
		$.ajax({
			type: "POST",
			url: rootURL + 'ajax/chat.php',
			data: "message=" + message + "&user=" + user + "&type=" + type, 
			cache: false,
			success: function(html) {
				
				if ( html.error != null ) {
					alert(html.error);	
				} else {	
					$(e.target).find('input[name="message"]').val('');
					$('#chat-page #chat-content').append(html);
					scroll_bottom();
				} 
			}
		});
	}
});



// Chat messages via form
$(document).on('click', '#get_chat_message', function(e){

	/* stop form from submitting normally */
	e.preventDefault();
	
	var message = '';
	var user = $(this).attr('data-user');
	var type = $(this).attr('data-type');
	
	if (user && type) {
		
		$.ajax({
			type: "POST",
			url: rootURL + 'ajax/chat.php',
			data: "message=" + message + "&user=" + user + "&type=" + type, 
			cache: false,
			success: function(html) {
				
				if ( html.error != null ) {
					alert(html.error);	
				} else {	
					$(e.target).find('input[name="message"]').val('');
					$('#chat-page #chat-content').html(html);
					scroll_bottom();
					message_seen(user);
				} 
			}
		});
	}
});



// Toggle like status text
$(document).on('click', '.toggle_item', function(e){
	
	var ttl = $(this).attr('data-toggle');
	var ttl_to = $(this).attr('data-toggle-to');
	
	$(this).attr('data-toggle-to', ttl);
	$(this).attr('data-toggle', ttl_to);
	
	$(this).find('#toggle-to').text(ttl_to);
	
});

// Item action
$(document).on('click', '#item_action', function(e){

	e.preventDefault();
			
	var id = $(this).attr('data-id');
	var type = $(this).attr('data-type');
	var target = $(this).attr('data-target');
	
	$.ajax({
		type: "POST",
		url: rootURL + 'ajax/action.php',
		data: "type=" + type + "&id=" + id + "&target=" + target, 
		cache: false,
		success: function(html) {
			
			if ( html ) {	
				$('body').append(html);

				if (target == 'del_playlist') {
					location.reload();
				}
			} 
		}
	});
});


// Dwonload item
$(document).on('click', '#download_item', function(e){

	e.preventDefault();
			
	var id = $(this).attr('data-id');
	var type = $(this).attr('data-type');
	var target = $(this).attr('data-target');
	
	if ( id && type && target) {
		
		document.location = rootURL + "ajax/download.php?id="+id+"&type="+type+"&target="+target; 
		 
	}
	
});

// Load more click
$(document).on('click', '#load_more_btn', function(e){
	
	e.preventDefault();
	$(this).parent('div').parent('section').find('#load-more').click();
	
});

// Load more 
$(document).on('click', '#load-more', function(e){

	e.preventDefault();
	
	var id = $(this).attr('data-id');
	var type = $(this).attr('data-type');
	var target = $(this).attr('data-target');
	var page = $(this).attr('data-page');
	
	$.ajax({
		type: "POST",
		url: rootURL + 'ajax/more.php',
		data: "type=" + type + "&id=" + id + "&page=" + page + "&target=" + target, 
		cache: false,
		success: function(html) {
		
			if (html) {
				
				$(e.target).parent('#ajax-load').append(html);
				$(e.target).remove();
				
			} else {
				$(e.target).parent('#ajax-load').find('#load-more').html('No more items');
			}
		}
	});
	
});


// Load ajax Tab
$(document).on('click', '#load-tabs', function(e){

	var type = $(this).attr('data-type');
	var id = $(this).attr('data-id');
	var page = $(this).attr('data-page');
	

		$('#myBar').css('width','0%');
		$('#myBar').css('display','block');
		
		$.ajax({

			xhr: function() {
	            var xhr = new window.XMLHttpRequest();
	            xhr.addEventListener('progress', function(e) {
		            if (e) {
		            	$('#myBar').animate({width: (100 * e.loaded / e.total) + '%'});
		            }
						
	            });
	            return xhr;
	        }, 
		type: "POST",
		url: rootURL + 'ajax/tab.php',
		data: "type=" + type + "&page=" + page + "&target=" + id, 
		cache: false,
		success: function(html) {
		
			if (html) {
				$('#load-more').remove();
				$('.tab-pane.active').find('#ajax-load').html(html);
			} else {
				$('.tab-pane.active').find('#ajax-load').html('No data here');
			}

					setTimeout(function() {
						$('#myBar').css('display','none');
						$('#myBar').css('width','0%').slow();
						
					}, 1100);
		}
	});
	
});

// Load modal
$(document).on('click', '#open-modal', function(e){
	
	var id = $(this).attr('data-id');
	
	$('input#add_playlist_id').val(id);
	
	$('.coupled.modal').modal({allowMultiple: false});
	
	$('.second.modal').modal('attach events', '.first.modal .button');

	$('.first.modal').modal('show');
	
});

// Delete from cart
$(document).on('click', '.delete-cart', function(e){
	
	var id = $(this).attr('data-id');

	$('#checkout-cart-' + id).remove();

});

// Open modal
$(document).on('click', '#add_to_playlist_modal', function(e){$('.second.modal.add_playlist').modal('show');});
$(document).on('click', '#add_album_modal', function(e){$('.modal.add_album').modal('show');});

// Load confirmation modal 
$(document).on('click', '#confirmation_action', function(e){

	var id = $(this).attr('data-id');
	var title = $(this).attr('data-title');
	var action = $(this).attr('data-action');
	
	$('.confirmation.modal').find('.content h5').html(title);
	$('.confirmation.modal').find('#item_action').attr('data-id', id);
	$('.confirmation.modal').find('#item_action').attr('data-target', action);
	$('.confirmation.modal').modal('show');

});


$(document).on('click', '.media.new_note', function(e){
	$(this).removeClass('new_note');
});

$(document).on('click', '.notes_head_seen', function(e){
	
	$('#header-notifications-count').text('0').hide();

});

$(document).on('click', '.msgs_head_seen', function(e){
	
	$('#header-messages-count').hide();

});

$(document).on('click', '.media.list-group-item.btn-dark', function(e){
	
	$(this).removeClass('btn-dark');

});



// Check function
function check_notifications() {
	
	var last_note = $('#header-notifications #last_note_header').attr('data-id');
	$.ajax({
		type: "POST",
		url: rootURL + 'ajax/check.php',
		data: "type=notes&id=" + last_note,  
		cache: false,
		dataType: 'json',
		success: function(html) {
		
			if (html) {
				var current = $('#header-notifications-count').text();
				//alert(html.count);
				if (html.count > current) {
					$('#header-notifications-count').text( html.count ).show();
					$('#header-notifications').prepend(html.content);
				}
			}
		}
	});
	
	var last_msg = $('#header-messages #last_msg_header').attr('data-id');
	$.ajax({
		type: "POST",
		url: rootURL + 'ajax/check.php',
		data: "type=chat&id=" + last_msg, 
		cache: false,
		dataType: 'json',
		success: function(html) {
		
			if (html) {
				var current = $('#header-messages-count').text();
				if (html.count > current) {
					$('#header-messages-count').text( html.count).show();
					$('#header-messages').html(html.content);
				}
			}
		}
	});
	
}

if (loggedIN == 1) {
	
	var notes = $('#header-notifications-count').text();
	var msgs = $('#header-messages-count').text();
	if (notes > '0') {$('#header-notifications-count').show();}
	if (msgs > '0') {$('#header-messages-count').show();  }
	
	setInterval(check_notifications, 5000);
}

function scroll_bottom() {	
	var d = $('#chat-page .scrollable');
	// d.scrollTop(d.prop("scrollHeight"));
	var clientHeight = document.getElementById('chat-content').clientHeight;
	d.animate({ scrollTop: $('#chat-page .wrapper').prop("scrollHeight") + clientHeight}, 1000);
}  


function reload_funcs() {	

	$('.ui.checkbox').checkbox();
	$('select.dropdown').dropdown();
	$('.ui.accordion').accordion();
}

function page_loader(type) {	
	if (type == 1) {
		$('#page_loader').css('display','block');
	} else {
		$('#page_loader').css('display','none');
	}
}
reload_funcs();
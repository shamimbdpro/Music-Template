

          <section class="vbox" id="chat-page">
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <h4 class="text-uc text-muted">[@LANG_MESSAGES_LIST] </h4>
                        <div class="line"></div>
						[@users_list]
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <section class="scrollable" style="bottom: 50px;">
                      <div class="wrapper" id="chat-content">
						[@messages_list]   
                      </div>
                    </section>
                    <footer class="panel-footer" style="margin-top:">
                      <!-- chat form -->
                      <article class="chat-item" id="chat-form">
                        <a class="pull-left thumb-sm avatar"><img src="[@url]image.php?src=[@author_cover]&w=100&h=100&img=ch" alt="[@author_name]"></a>
                        <section class="chat-body">
                          <form action="#" class="m-b-none" id="send_chat_message" data-user="[@id]" data-type="send-message">
                            <div class="input-group">
                              <input type="text" class="form-control" name="message" placeholder="[@LANG_SAY_SOMETHING]">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button">[@LANG_SEND]</button>
                              </span>
                            </div>
                          </form>
                        </section>
                      </article>
                    </footer>
                  </section>
                </aside>
        				<aside class="aside-lg bg-light lter b-r media-sidebar">
                  [@side_ads]
                </aside>
              </section>
            </section>
          </section>
		  <script>
		  
      // Set messages seen function
      function message_seen(user) {
        
        if (user) {
        
          $.ajax({
            type: "POST",
            url: rootURL + 'ajax/chat.php',
            data: "type=see-message&message=all&user=" + user, 
            cache: false,
            success: function(html) {
            
              if (html) {
                alert(html);
              } 
            }
          });
        }
      }

			// Set messages seen function
			function appendNewMsg() {
				
        var user = $('#user_senderid').attr('data-id');
				
        if (user) {
				
					$.ajax({
						type: "POST",
						url: rootURL + 'ajax/chat.php',
						data: "type=apppend-message&user=" + user, 
						cache: false,
						success: function(html) {
						
							if (html) {
								$('#chat-content').append(html);
							}

              setTimeout(function() {
                appendNewMsg();
              }, 2000);
              
              scroll_bottom();

						}
					});
				}
			}

      message_seen([@id]);
			appendNewMsg();

		  </script>
		  
		  

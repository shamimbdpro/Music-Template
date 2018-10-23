
          <section class="panel-body">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-body">
                      Dropzone File Upload
                  </header>
                  <div class="panel-body">
                      <form action="[@url]administrator/ajax/media.php" class="dropzone" id="my-awesome-dropzone"><input type="hidden" id="current_folder" name="current_folder"></form>
                  </div>
                  <div class="panel-body" id="modal-library-body">
					<div id="full_media_library" class="media_library">                  
	                  	[@files]
	                 </div>
                  </div>
              </section>
              <!-- page end-->
          </section>

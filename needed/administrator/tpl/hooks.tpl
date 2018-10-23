 <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    
					<div class="pull-right">
                        <a href="#MinModal" data-title="Add new hook" data-require="new_hook" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new hook
						</a>
                    </div>
					<h5>Available Hooks</h5>
                  </header>
                  <div class="body">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Shortcode</th>
                          <th>Hook position</th>
                          <th>Publish</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
						[@hooks_list]
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
			
			
<script type="text/javascript">
  jQuery('table').DataTable();
</script>

            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    <div class="pull-right">
                        <a href="[@url]admin/posts/new" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new post
						</a>
                    </div>
                    <br />
                    [@pagename]
				  <br/>
                  </header>
				  <br/>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Post id</th>
                          <th>Post title</th>
                          <th>Category</th>
                          <th>Author</th>
                          <th>Published</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        [@pages_list]
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

<script type="text/javascript">
  jQuery('table').DataTable();
</script>
            <!--End Datatables-->
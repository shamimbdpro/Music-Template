
            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header>
                    <div class="pull-right">
                        <a href="#MinModal" data-title="Add new Category" data-require="new_media_cat" data-type="[@cat_type]" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new Category
						</a>
                    </div>
                    <h5>[@pagename]</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Category ID</th>
                          <th>Category name</th>
                          <th>Main category</th>
                          <th>Published</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        [@cats_list]
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

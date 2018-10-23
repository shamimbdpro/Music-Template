
<!-- All administrators -->

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>[@pagename]</h5>
                    <div class="toolbar">
                      <div class="btn-group">
                        <a href="#MinModal" data-title="Add new Administrator" data-require="new_admin" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new Administrator
						</a>
                        <a href="#collapse4" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                          <i class="fa fa-angle-up"></i>
                        </a> 
                      </div>
                    </div>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Page name</th>
                          <th>Page link</th>
                          <th>Template</th>
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
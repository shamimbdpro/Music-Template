<!-- All Pages -->

            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
				<div id="result"></div>
                <div class="panel-body">
                  <header>
                    <div class="pull-right">
                        <a href="#MinModal" data-title="Add new Page" data-require="new_page" data-toggle="modal" data-placement="bottom" class=" btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new Page
						</a>
                    </div>
                    <h5>[@pagename]</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>Page name</th>
                          <th>Page link</th>
                          <th>Template</th>
                          <th>Layout</th>
                          <th>Published</th>
                          <th>Homepage</th>
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

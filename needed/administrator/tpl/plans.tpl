
<!-- All administrators -->

            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header>
                    <div class="pull-right">
                        <a href="#MinModal" data-title="Add new plan" data-require="new_plan" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
            							<i class="fa fa-plus"></i> Add Plan
            						</a>
                    </div>
                    <h5>[@pagename]</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Cost</th>
                          <th>Period</th>
                          <th>Paid</th>
                          <th>Access</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        [@plans]
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
<script type="text/javascript">
  jQuery('table').DataTable();
</script>
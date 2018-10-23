
<!-- All administrators levels -->

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
                        <a href="#MinModal" data-title="Add new level" data-require="new_level" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new level
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
                          <th>ID</th>
                          <th>Level title</th>
                          <th>View accounts</th>
                          <th>Edit accounts</th>
                          <th>Edit setting</th>
                          <th>Contact users</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        [@all_levels]
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
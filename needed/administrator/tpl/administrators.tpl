
<!-- All administrators -->

            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header>
                    <div class="pull-right">
                        <a href="#MinModal" data-title="Add new Administrator" data-require="new_admin" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form">
							<i class="fa fa-plus"></i> Add new Administrator
						</a>
                    </div>
                    <h5>[@pagename]</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-striped table-advance table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Full name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th class=" hide hidden">Level</th>
                          <th>Published</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        [@all_admins]
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->

            <!--Begin Datatables-->
            <div class="panel-body">
              <div class="col-lg-12 panel">
                <div class="panel-body">
                  <header class="panel-heading">
                    <div class="pull-right">
                        <a href="[@url]admin/admin_pages/new" class="btn btn-default btn-sm minimize-box require-form">
            							<i class="fa fa-plus"></i> Add new page
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
                          <th>ID</th>
                          <th>Title</th>
                          <th>Created by</th>
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
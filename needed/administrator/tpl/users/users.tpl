<div class="panel-body">
  <div class="col-lg-12 panel">
    <div class="panel-body">
      <header class="panel-heading">
        <div class="pull-right">
          <a href="#MinModal" data-title="Add new User" data-require="new_user" data-toggle="modal" data-placement="bottom" class="btn btn-default btn-sm minimize-box require-form"><i class="fa fa-plus"></i> Add new User </a>
        </div>
        <h5>Users list</h5>
      </header>
      <div class="body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>username</th>
              <th>Media count</th>
              <th>Followers</th>
              <th>Current Plan</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            [@all_users]
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
      
<script type="text/javascript">
  jQuery('table').DataTable();
</script>
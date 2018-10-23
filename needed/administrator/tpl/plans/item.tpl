            <tr id="admin[@id]">
              <td>[@id]</th>
              <td>[@title]</th>
              <td>$[@cost]</th>
              <td>[@period] Month</th>
              <td>[@paid]</th>
              <td><a class="btn btn-success btn-sm" href="[@url]admin/plan/[@id]"><i class="fa fa-list"></i></a></th>
              <td>
                <span><a class="btn btn-info btn-sm require-form" data-id="[@id]" data-title="Edit plan" data-require="edit_plan" href="#MinModal" data-toggle="modal" data-placement="bottom">
                  <i class="fa fa-edit"></i>
                </a></span>
              </td>
              <td>
                <span><a class="btn btn-danger btn-sm confirm-form" data-id="[@id]" data-type="del_plan"  href="#ConfirmModal" data-title="Are you sure you want to delete [@title]" data-toggle="modal" data-placement="bottom">
                  <i class="fa fa-times"></i>
                </a></span>
              </td>
            </tr>
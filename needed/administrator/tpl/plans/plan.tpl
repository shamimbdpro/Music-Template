          
        <!--BEGIN INPUT TEXT FIELDS-->
        <div class="panel-body" id="post-page">
            <form class="form-horizontal" id="post" data-id="[@id]">
                <div class="col-lg-12 panel">
                  <div class="panel-body">
                    <header class="panel-heading">
                      Plan [@title]
                    </header>
                    <div id="div-1" class="body ">
                      <div class="ui message relative">
                        <div class="header" style="position: relative; min-height: auto; padding: 0 0;" >
                          Notes
                        </div>
                        <ul class="list">
                          <li>You can set unlimited by typing ( unlimited )</li>
                          <li>You can disable the function by typing ( 0 )</li>
                          <li>Or You can set static number.</li>
                        </ul>
                      </div>
                      <input type="hidden" name="id" value="[@id]" >
                      <input type="hidden" name="form_type" value="edit_plan_access" >
                      <div class="clear clearfix"></div> <br /> <br />

                      [@access]

                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Save post" class="btn btn-primary">
                        <a href="[@url]admin/plans" class="btn btn-primary">Back</a>
                      </div>
                  
                      <div class="clear clearfix"></div> <hr />
                  </div>
               </div>
            </div>
          </form>
      </div>
      <script>
        jQuery(".chzn-select").chosen();
      </script>

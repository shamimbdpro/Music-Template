				<link rel="stylesheet" type="text/css" href="[@url]administrator/asset/assets/bootstrap-timepicker/compiled/timepicker.css">
        <div class="box">
                  <div id="collapse2" class="body">
                    <form class="form-horizontal form-add" id="popup-validation">
          					  <input type="hidden" name="form_type" value="new_item" />
          					  <input type="hidden" name="type" value="0" />
                      
                      <div class="form-group">
                        <label class="control-label col-lg-5">Class </label>
                        <div class="col-lg-5">
                          <select name="classid" class="form-control">
                            <option value="">Choose class</option>
                            [@class_select]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Course </label>
                        <div class="col-lg-5">
                          <select name="courseid" class="form-control">
                            <option value="">Choose course</option>
                            [@course_select]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Teacher </label>
                        <div class="col-lg-5">
                          <select name="teacherid" class="form-control">
                            <option value="">Choose teacher</option>
                            [@teacher_select]
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Teacher </label>
                        <div class="col-lg-5">
                          <select name="day" class="form-control">
                            <option value="">Choose day</option>
                            <option value="sun">Sunday</option>
                            <option value="mon">Monday</option>
                            <option value="tue">Teusday</option>
                            <option value="wen">Wednesday</option>
                            <option value="thu">Thursday</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">Start Time </label>
                        <div class="col-lg-5">
                          <div class="input-group bootstrap-timepicker">
                              <input type="text" name="starttime" class="form-control timepicker-24">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                              </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-5">End Time </label>
                        <div class="col-lg-5">
                          <div class="input-group bootstrap-timepicker">
                              <input type="text" name="endtime" class="form-control timepicker-24">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                              </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions no-margin-bottom">
                        <input type="submit" value="Submit" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
				
				
<script type="text/javascript" src="[@url]administrator/asset/assets/bootstrap-timepicker/js/bootstrap-timepicker.js" ></script>	
<script type="text/javascript">
 
jQuery('.timepicker-24').click(function () { 
  $(this).timepicker({
      autoclose: true,
      minuteStep: 1,
      showSeconds: true,
      showMeridian: false
  });
});
</script>
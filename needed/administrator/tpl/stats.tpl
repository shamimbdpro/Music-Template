                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
							               	<script> countUp('[@free_media_count]', 'count'); </script>
                              </h1>
                              <p>Free Media items</p>
                          </div>
                      </section>
                  </div>
				  
		        		  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol green-bg alt">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count1">
				                				<script> countUp('[@paid_media_count]', 'count1'); </script>
                              </h1>
                              <p>Paid Media items </p>
                          </div>
                      </section>
                  </div>

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue alt">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count8">
                                <script> countUp('[@p_withdrawal]', 'count8'); </script>
                              </h1>
                              <p>Pending withdrawal items</p>
                          </div>
                      </section>
                  </div>
				  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count3">
							               	<script> countUp('[@playlists_count]', 'count3'); </script>
                              </h1>
                              <p>Media playlists</p>
                          </div>
                      </section>
                  </div>
				  
                      <div class="col-lg-6">

                        <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="task-progress">
                                    <h1>Top media items</h1>
                                    <p>Top media orderd by customers</p>
                                </div>
                            </div>
                            <table class="table table-hover personal-task">
                                <br />
                                <br />
                                <tbody>[@top_products]</tbody>
                            </table>
                        </section>
                      </div>
                      <div class="col-lg-6">

                          <section class="panel">
                            <div class="panel-body progress-panel">
                                <div class="task-progress">
                                    <h1>Top customers</h1>
                                    <p>Top cutomers who uploaded media items</p>
                                </div>
                            </div>
                              <div class="panel-body">
                                  <div id="hero-donut" class="graph"></div>
                              </div>
                          </section>

                      </div>

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count4">
                								<script> countUp('[@members_count]', 'count4'); </script>
                              </h1>
                              <p>Active users</p>
                          </div>
                      </section>
                  </div>
				  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol purple-bg">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count5">
								                <script> countUp('[@payment_count]', 'count5'); </script>
                              </h1>
                              <p>Success payment</p>
                          </div>
                      </section>
                  </div>
          
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol dark-grey-bg">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count6">
                                <script> countUp('[@cart_count]', 'count6'); </script>
                              </h1>
                              <p>Pending cart items</p>
                          </div>
                      </section>
                  </div>
        
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol grey-bg">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count7">
                                <script> countUp('[@comments_count]', 'count7'); </script>
                              </h1>
                              <p>Members Comments</p>
                          </div>
                      </section>
                  </div>
				  
				          
        <script type="text/javascript">
            var Script = function () {

            //morris chart
            $(function () {
              
                  Morris.Donut({
                    element: 'hero-donut',
                    data: [
                      [@top_customers]
                    ],
                      colors: ['#41cac0', '#49e2d7', '#34a39b'],
                    formatter: function (y) { return y + " Item" }
                  });


                  $('.code-example').each(function (index, el) {
                    eval($(el).text());
                  });
                });

            }();
        </script>
<div class="title"> <i class="dropdown icon"></i> Pay with Stripe Payment </div>
<div class="content">

    <div id="content-wrapper">

        <div class=" bg-2 tt-sidebar-right tt-overflow">
            <div class="container">
                <!-- TT-FACTS -->
                <div class="row" style="position: relative;z-index: 9;">
                    <div class="col-md-10 "  id="stripe_content" >

                        <div class="ui segment innder-loader">
                          <div class="ui active inverted dimmer">
                            <div class="ui text loader">Loading</div>
                          </div>
                        </div>
                        <form class="ui form" id="stripe_form" action="[@url]deposite" method="POST" style="max-width: 100%; font-size: 1.2rem">
                          <input type="hidden" name="token" value="[@token]">
                          <input type="hidden" name="method" value="stripe_payment" />
                          <input type="hidden" name="order_id" value="[@token]" />
                          <input type="hidden" name="name" value="[@name]" />
                          <input type="hidden" name="customer_id" value="[@customer_id]">
                          <h1 class="ui dividing header">Information</h1>
                          <div class="all_fields">
                            <div class="field">
                              <label>Amount</label>
                              <div class="field">
                                <input name="amount" id="amount" type="text" class="form-control" required="" placeholder="Insert amount you want to deposite" />
                              </div>
                            </div>
                            <div class="field">
                              <label>Name</label>
                              <div class="field">
                                <input type="text" required="required" name="shipping[first-name]" value="[@realname]" placeholder="Real name">
                              </div>
                            </div>
                            <div class="three fields">
                              <div class="field">
                                <label>Email</label>
                                    <input type="text" required="required" name="email" value="[@email]" placeholder="Email address">
                                </select>
                              </div>  
                            </div>
                            <div class="two fields">
                              <div class="field">
                                <label>Country</label>
                                <select required="required" name="shipping[country]">
                                    [@country]
                                </select>
                              </div>  
                              <div class="field">
                                <label>State</label>
                                <input type="text" required="required" name="shipping[city]" value="[@city]" placeholder="Your city">
                              </div>
                            </div>
                            <div>
                                <p>All cards are charged by ©Authorize.Net ®™ servers.</p>
                            

                                <div class="fluid field">
                                      <label>Card Number</label>
                                      <input type="text" required="required" name="credit_card" maxlength="20" data-stripe="number" placeholder="Card #">
                                </div>
                                
                                <div class="fields">
                                    <div class="six wide field">
                                      <label>CVC</label>
                                      <input type="text" required="required" name="cvv" maxlength="3" placeholder="CVC">
                                    </div>
                                    <div class="ten wide field">
                                      <label>Expiration</label>
                                      <div class="two fields">
                                        <div class="field">
                                          <select required="required" class="ui fluid search dropdown" name="expiration_month" data-stripe="exp_month" >
                                            <!-- <option value="">Month</option> -->
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                          </select>
                                        </div>
                                        <div class="field">
                                          <input type="text" required="required" data-stripe="exp_year" name="expiration_year" maxlength="2" placeholder="Year (2) numbers only">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                 <hr />
                                  <button class="ui button basic red huge" tabindex="0" type="submit">Submit Order</button>
                                  <div class="empty-space marg-lg-b95 marg-sm-b50 marg-xs-b30"></div>
                                  <hr />
                                  <div id="form-result"></div>
                                  <h3 class="payment-errors"></h3>
                              </div>
                            </div>
                        </form>
                    </div>
                        
                    <div class="empty-space marg-lg-b95 marg-sm-b50 marg-xs-b30"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty-space marg-lg-b115 marg-sm-b50 marg-xs-b30"></div>
</div>

<style type="text/css">
    #stripe_content.active .innder-loader {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
    #stripe_content .innder-loader {
        display: none;
    } 
</style>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
  
  $(function() {
    var $form = $('#stripe_form');
    $form.submit(function(event) {
    // Disable the submit button to prevent repeated clicks:
    $form.find('.submit').prop('disabled', true);
  
    // Request a token from Stripe:
    Stripe.card.createToken($form, stripeResponseHandler);
  
    // Prevent the form from being submitted:
    return false;
    });
  });

  function stripeResponseHandler(status, response) {
    // Grab the form:
    var $form = $('#stripe_form');
  
    if (response.error) { // Problem!
  
    // Show the errors on the form:
    $form.find('.payment-errors').html(NotePopup(response.error.message, 2));
    $form.find('.submit').prop('disabled', false); // Re-enable submission
  
    } else { // Token was created!
  
    // Get the token ID:
    var token = response.id;

    // Insert the token ID into the form so it gets submitted to the server:
    $form.append($('<input type="hidden" name="stripeToken">').val(token));
  
    // Submit the form:
    $form.get(0).submit();
    }
  };


$('body').on('submit', 'form#stripe_form', function(e){
    
    /* stop form from submitting normally */
    e.preventDefault();
    
    $('#stripe_content').addClass('active');
    
    var formData = new FormData($(this)[0]);

    // var formData =  JSON.stringify($(this)); 
    
    $.ajax({
        type: "POST",
        url: '[@form_url]',
        data: $('#stripe_form').serialize(),
        dataType: "json",
        success: function (html) {

            $('#stripe_content').removeClass('active');

            if (html.status == 1) {
                $('#stripe_content #form-result').html(html.msg);
                location.href = '[@redirect_url]';
            } else {
                $('#stripe_content #form-result').html(html.msg);
            } 
        }
    });
        
});


</script>
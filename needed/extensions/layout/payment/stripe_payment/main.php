<?php
  
    if (empty($Setting)) {
        require '../../../../classes/configuration.php';
        require '../../../../classes/functions.php';
    }  

    global $cart_class, $Setting, $db, $dbaser, $CONF, $page_ID, $member;

    require 'vendor/autoload.php';

    use net\authorize\api\contract\v1 as AnetAPI;
    use net\authorize\api\controller as AnetController;


    $authorize_net = new StripePaymentClass;
    $authorize_net->checkMethod();

class StripePaymentClass  {

    public $db;

    public $member;
    
    public $dbaser;

    public $setting;

    protected function check_config() {

        global $dbaser;

        $dbaser->where('link', 'stripe_payment');
        $plugin = $dbaser->getOne('plugins');

        if (isset($plugin['id'])) {

            $dbaser->where('plugin_id', $plugin['id']);
            $content = $dbaser->getOne('plugins_options');
            
            if (isset($content['content'])) {
                return unserialize($content['content']);
            }
        }


    }


    function view_form() {

        global $dbaser, $member, $CONF, $PLUGIN_PATH;
        
        $check_config = $this->check_config();
        
        $tpl = new template(__DIR__.'/main.tpl');
        
        if (!empty($check_config['public']) && !empty($check_config['private'])) {


            $rand = rand('200001', '2000001');
            $_POST['stripe_id'] = $rand;
            $_SESSION['stripe_id'] = $rand;
            $_SESSION['stripe_token'] = $rand;

            $visitor_info = user_location();
            
            if (isset($member)) {

                $tpl->set('token', $rand);
                $tpl->set('customer_id', $member['id']);
                $tpl->set('email', $member['email']);
                $tpl->set('realname', $member['realname']);
                $tpl->set('name', $member['name']);
                $tpl->set('public_key', $check_config['public']);
                $tpl->set('city', isset($visitor_info['city']) ? $visitor_info['city'] : '');
                $tpl->set('redirect_url', isset($check_config['url']) ? $check_config['url'] : $CONF['url'].'account');
                $tpl->set('form_url', $CONF['url'].'extensions/layout/payment/stripe_payment/main.php' );
                $tpl->set('country', list_countries_active(getCountriesList(), isset($visitor_info['country']) ? $visitor_info['country'] : ''));
            }

            return  $tpl->output();
        
        } else {
            
            echo $this->viewReply('Please add Private & Public keys from admin panel', 2);

        }
    }



    function checkMethod() 
    {

        if (!empty($_POST['method']) && isset($_POST['stripeToken']) && $_POST['method'] == 'stripe_payment') {
            
            $check_config = $this->check_config();

            if (!empty($check_config['public']) && !empty($check_config['private'])) {
            
                \Stripe\Stripe::setApiKey($check_config['private']);
                $pubkey = $check_config['public'];
            }

            if ( empty($this->validate_order())) {
                
                
                $cost = isset($_POST['amount']) ? $_POST['amount'] : '';

                if (!empty($cost)) {
                    $this->chargeCreditCard($cost);
                }

            } else {
                echo $this->viewReply($this->validate_order(), 2);
            }
        } 
    }


    function chargeCreditCard($amount)
    {
    	global $dbaser, $member;

        /* Check settings */
        $check_config = $this->check_config(); 

        $amount_cents = number_format($_POST['amount']) * 100;  // Chargeble amount
        $invoiceid = $_SESSION['order_id'];                      // Invoice ID
        $description = "Invoice #" . $invoiceid . " - " . $invoiceid;
        
        try {

            $charge2 = \Stripe\Charge::create(array(         
                  "amount" => $amount_cents,
                  "currency" => "usd",
                  "source" => $_POST['stripeToken'],
                  "description" => $description)              
            );


            $charge = (object) $charge2;

            if (isset($charge->card->address_zip_check) && $charge->card->address_zip_check == "fail") {
                throw new Exception("zip_check_invalid");
            } else if (isset($charge->card->address_line1_check) && $charge->card->address_line1_check == "fail") {
                throw new Exception("address_check_invalid");
            } else if (isset($charge->card->cvc_check) && $charge->card->cvc_check == "fail") {
                throw new Exception("cvc_check_invalid");
            } else {
                
                if (isset($charge->paid) && $charge->paid == true && isset($charge->amount) && $charge->amount == $amount_cents) {
    
                    // Payment has succeeded, no exceptions were thrown or otherwise caught             
                    $result = "done";
                }
            }


        } catch(Stripe_CardError $e) {          

        $error = $e->getMessage();
            $result = "declined 1";

        } catch (Stripe_InvalidRequestError $e) {
            $result = "declined 2";         
        } catch (Stripe_AuthenticationError $e) {
            $result = "declined 3";
        } catch (Stripe_ApiConnectionError $e) {
            $result = "declined 4";
        } catch (Stripe_Error $e) {
            $result = "declined 5";
        } catch (Exception $e) {

            if ($e->getMessage() == "zip_check_invalid") {
                $result = "declined 6";
            } else if ($e->getMessage() == "address_check_invalid") {
                $result = "declined 7";
            } else if ($e->getMessage() == "cvc_check_invalid") {
                $result = "declined 8";
            } else {
                $result = "declined 9";
            }         
        }
        
        if ($result == 'done') {

            $dbaser->where('id', $member['id']);
            $credit = $dbaser->getOne('members', 'credit');
                        
            $dbaser->where('id', $member['id']);
            $dbaser->update('members', array('credit' => $credit['credit'] + $_POST['amount']));
            
            $dbaser->insert('deposite', array('user' => $member['id'], 'method' => $_POST['method'], 'invoice_id' => $_POST['token'], 'amount' => $_POST['amount']));
            
            // print_r($charge);
            // echo $this->viewReply($charge, 1);
            header("Location: " . $CONF['url'].'deposite/success');
        
        } else {
            echo $result . ' - '.$e->getMessage();
            echo $this->viewReply(isset($charge) ? $charge : '', 2);            
        }

    }


    function validate_order() {
    	
    	if (isset($_POST['credit_card'])) {

    		$credit_card           = $_POST['credit_card'];
    	    $expiration_month      = (int) $_POST['expiration_month'];
            $expiration_year       = (int) $_POST['expiration_year'];
            $cvv                   = $_POST['cvv'];
            $cardholder_first_name = $_POST['shipping']['first-name'];
            $email                 = $_POST['email'];
            $billing_city          = $_POST['shipping']['city'];
            $billing_state         = $_POST['shipping']['city'];
            $recipient_first_name  = $_POST['shipping']['first-name'];
            $shipping_city         = $_POST['shipping']['city'];
            $shipping_state        = $_POST['shipping']['city'];
            $token                 = $_POST['token'];

            if (number_format($token)  !== number_format($_SESSION['stripe_token']) )
            {
                $errors['token'] = "This form submission is invalid. Please refresh this page and try again or contact support for additional assistance.";
            }
            if (empty($credit_card))
            {
                $errors['credit_card'] = "Please enter a valid credit card number";
            }
            if (empty($expiration_month) || empty($expiration_year))
            {
                $errors['expiration_month'] = "Please enter a valid expiration date for your credit card";
            }
            if (empty($credit_card) || empty($cvv))
            {
                $errors['cvv'] = "Please enter the security code (CVV number) for your credit card";
            }
            if (empty($cardholder_first_name))
            {
                $errors['cardholder_first_name'] = "Please provide the card holder's first name";
            }
            if (empty($billing_city))
            {
                $errors['billing_city'] = 'Please provide the city of your billing address.';
            }
            if (empty($billing_state))
            {
                $errors['billing_state'] = 'Please provide the state for your billing address.';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $errors['email'] = "Please provide a valid email address";
            }
            if (empty($recipient_first_name))
            {
                $errors['recipient_first_name'] = "Please provide the recipient's first name";
            }
            if (empty($shipping_city))
            {
                $errors['shipping_city'] = 'Please provide the city of your shipping address.';
            }
            if (empty($shipping_state))
            {
                $errors['shipping_state'] = 'Please provide the state for your shipping address.';
            }
            return isset($errors) ? $errors : '';
    	}
    }

    function viewReply($msg, $type) {
    	
    	$msg_list = '';
    	
    	$return = array();

    	if ($type == 2 || isset($msg['failed'])) {
    	
    		$return['status'] = '0';
    		$state = 'negative';

    	} elseif ($type == 1 || isset($msg['success'])) {

    		$return['status'] = '1';
    		$state = 'positive';

    	}

        if (is_array($msg)) {

            foreach ($msg as $key => $value) {
                
                $msg_list .= '<li>'.$value.'</li>'; 
            }

        }  else {
        
            $msg_list .= $msg; 

        }

        if (empty($return['status'])) {
            $return['msg'] = '<div class="ui '.$state.' message"> <div class="header"> Error while proccessing the payment <hr /></div>'.$msg_list.'</div>';
        }

        return json_encode($return);          

    }
}

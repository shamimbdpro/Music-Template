<?php
  
    if (empty($Setting)) {
        require '../../../../classes/configuration.php';
        require '../../../../classes/functions.php';
    }  

    global $cart_class, $Setting, $db, $dbaser, $CONF, $page_ID, $member;


    require 'vendor/autoload.php';

    use net\authorize\api\contract\v1 as AnetAPI;
    use net\authorize\api\controller as AnetController;

    define("AUTHORIZENET_LOG_FILE", "phplog");

    $authorize_net = new AuthorizeNetClass;
    $authorize_net->checkMethod();

class AuthorizeNetClass  {

    public $db;

    public $member;
    
    public $dbaser;

    public $setting;

    protected function check_config() {

        global $dbaser;

        $dbaser->where('link', 'authorize_net');
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

        $rand = rand('100001', '1000001');

        $_POST['order_id'] = $rand;
        $_SESSION['order_id'] = $rand;
        $_SESSION['token'] = $rand;

        $visitor_info = user_location();
        
        if (isset($member)) {

            $tpl->set('token', $rand);
            $tpl->set('customer_id', $member['id']);
            $tpl->set('email', $member['email']);
            $tpl->set('realname', $member['realname']);
            $tpl->set('name', $member['name']);
            $tpl->set('city', $visitor_info['city']);
            $tpl->set('redirect_url', isset($check_config['url']) ? $check_config['url'] : $CONF['url'].'account');
            $tpl->set('form_url', $CONF['url'].'extensions/layout/payment/authorize_net/main.php' );
            $tpl->set('country', list_countries_active(getCountriesList(), $visitor_info['country']));
        }

        return  $tpl->output();
    }



    function checkMethod() 
    {

        if (!empty($_POST['method']) && $_POST['method'] && $_POST['method'] == 'authorize_net') {
            
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

        /* Create a merchantAuthenticationType object with authentication details
           retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName($check_config['id']);
        $merchantAuthentication->setTransactionKey($check_config['key']);
        
        // Set the transaction's refId
        $refId = 'ref' . time();

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber(sanitize($_POST['credit_card']));
        $creditCard->setExpirationDate((int) sanitize($_POST['expiration_year']) . "-". (int) sanitize($_POST['expiration_month']));
        $creditCard->setCardCode(sanitize($_POST['cvv']));

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($_POST['order_id']);
        $order->setDescription('Deposite');

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName(sanitize($_POST['shipping']['first-name']));
        $customerAddress->setLastName(sanitize($_POST['name']));
        $customerAddress->setCity(sanitize($_POST['shipping']['city']));
        $customerAddress->setState(sanitize($_POST['shipping']['city']));
        $customerAddress->setCountry(sanitize($_POST['shipping']['country']));

        // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setId($_POST['customer_id']);
        $customerData->setEmail(sanitize($_POST['email']));

        // Add values for transaction settings
        $duplicateWindowSetting = new AnetAPI\SettingType();
        $duplicateWindowSetting->setSettingName("duplicateWindow");
        $duplicateWindowSetting->setSettingValue("60");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($amount);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);
        $transactionRequestType->setCustomer($customerData);
        $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);

        // Assemble the complete transaction request
        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        
        $return = array();

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == \SampleCode\Constants::RESPONSE_OK) {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
            	
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $return['success'] = "1";
                    $return[0] = " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                    $return[1] = " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                    $return[2] = " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                    $return[3] = " Auth Code: " . $tresponse->getAuthCode() . "\n";
                    $return[4] = " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                    $dbaser->where('id', $member['id']);
                    $credit = $dbaser->getOne('members', 'credit');
                    
                    $dbaser->where('id', $member['id']);
                    $dbaser->update('members', array('credit' => $credit['credit'] + $_POST['amount']));
                    $dbaser->insert('deposite', array('user' => $member['id'], 'method' => $_POST['method'], 'invoice_id' => $_POST['token'], 'amount' => $_POST['amount']));

                } else {
                    $return['failed'] = "1";
                    $return[0] = "Transaction Failed \n";
                    if ($tresponse->getErrors() != null) {
                        $return[1] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                        $return[2] = " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    }

                }
                // Or, print errors if the API request wasn't successful
            } else {
    				
    			$return['failed'] = "1";
                $return[0] = "Transaction Failed \n";
                $tresponse = $response->getTransactionResponse();
            
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $return[1] = " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    $return[2] = " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                } else {
                    $return[1] = " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                    $return[2] = " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                }


            }

        } else {
            
            $return['failed'] = "1";
            $return[0] = "No response returned \n";

        }

        $_SESSION['payment_post_result'] = $return;

        $type = isset($return['success']) ? '1' : '2';

        echo $this->viewReply($return, $type);
    }


    function validate_order() {
    	
    	if (isset($_POST['credit_card'])) {

    		$credit_card           = sanitize($_POST['credit_card']);
    	    $expiration_month      = (int) sanitize($_POST['expiration_month']);
            $expiration_year       = (int) sanitize($_POST['expiration_year']);
            $cvv                   = sanitize($_POST['cvv']);
            $cardholder_first_name = sanitize($_POST['shipping']['first-name']);
            $email                 = sanitize($_POST['email']);
            $billing_city          = sanitize($_POST['shipping']['city']);
            $billing_state         = sanitize($_POST['shipping']['city']);
            $recipient_first_name  = sanitize($_POST['shipping']['first-name']);
            $shipping_city         = sanitize($_POST['shipping']['city']);
            $shipping_state        = sanitize($_POST['shipping']['city']);
            $token                 = sanitize($_POST['token']);

            if (number_format($token)  !== number_format($_SESSION['token']) )
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

    		unset($msg['failed']);
    		$state = 'negative';

    	} elseif ($type == 1 || isset($msg['success'])) {

    		$return['status'] = '1';

    		unset($msg['success']);
    		$state = 'positive';

    	}

    	foreach ($msg as $key => $value) {
    		
    		$msg_list .= '<li>'.$value.'</li>';	

    	}


    	$return['msg'] = '<div class="ui '.$state.' message">
    			  <div class="header">
    			    Error while proccessing the payment
    			  <hr />

    			  </div>'.$msg_list.'</div>';

    	return json_encode($return);		  

    }
}


    function sanitize($value)
    {
        return trim(strip_tags($value));
    }
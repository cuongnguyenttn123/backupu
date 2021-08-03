<?php 
$con = mysqli_connect('148.72.64.225','jack_admin','tch19951014','jack_urpixpay_new1');
global $con;
require_once 'stripe/init.php';



$user_id  = $_REQUEST['user_id'];
$name_on_card  = $_REQUEST['name_on_card'];
$user_email  = $_REQUEST['user_email'];
$amount  = $_REQUEST['amount'];
$credit_card_no  = $_REQUEST['credit_card_no'];
$expiration_month  = $_REQUEST['expiration_month'];
$expiration_year  = $_REQUEST['expiration_year'];
$cvv_no  = $_REQUEST['cvv_no'];
$token  = $_REQUEST['token'];

// print_r($_REQUEST['user_id']);
// exit();

$query = "SELECT walet FROM userpix WHERE `u-id` = '".$user_id."' ";
$packages = mysqli_query($con,$query);
$data = $packages->fetch_assoc();

// define('STRIPE_API_KEY', 'sk_live_9AmO6EaAYzDBmxA68RtFSPM400xD0CsYkm'); 
// define('STRIPE_PUBLISHABLE_KEY', 'pk_live_Ia8CRbauoxDyZVAWjqMWkD8X00FegSmpqq');

define('STRIPE_API_KEY', 'sk_test_tVXYS0rcJGzVsciFjEGH5cBW00kjDxgGDm'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_fnHShgwaSjDlKORi0DnPpEil00939zR5JV');

\Stripe\Stripe::setApiKey(STRIPE_API_KEY);   
        // Add customer to stripe 
$customer = \Stripe\Customer::create(array( 
    'email' => $user_email, 
    'source'  => $token 
));
// Unique order ID 
$totalamount = $amount*100;
$orderID = strtoupper(str_replace('.','',uniqid('', true))); 
// Charge a credit or a debit card 
$charge = \Stripe\Charge::create(array( 
    'customer' => $customer->id, 
    'amount'   => $totalamount, 
    'currency' => 'USD', 
));
if($charge->id != ''){
	if($data['walet'] != ''){
		$total = $data['walet'] + $amount;
		$query      = "UPDATE userpix set walet = '".$total."' WHERE `u-id` = '".$user_id."'";
	    $execute    = mysqli_query($con,$query);
	    $query1      = "INSERT INTO userpix(`user_id`,amount,gateway,action) VALUES('".$user_id."','".$amount."','stripe','done')";
	    $execute1    = mysqli_query($con,$query1);
	    echo "success";
	}
	else{
		$query1      = "INSERT INTO userpix(`u-id`,walet) VALUES('".$user_id."','".$amount."')";
	    $execute1    = mysqli_query($con,$query1);
	    $query1      = "INSERT INTO userpix(`user_id`,amount,gateway,action) VALUES('".$user_id."','".$amount."','stripe','done')";
	    $execute1    = mysqli_query($con,$query1);
	    echo "success";
	}
}
else{
	echo "error";
}

?>
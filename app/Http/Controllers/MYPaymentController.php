<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Mail;
use Redirect;
use PayPal\Api\Payment;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\Plan;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Session;
use Illuminate\Support\Facades\Input as Input;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class MYPaymentController extends Controller {
   public function __construct()
    {
/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
}
public function setPayment(Request $request){
  $data         =  $request->all();
  $cart         =  json_decode( $data['cart'], $assoc_array = true );
  $address_form =  json_decode( $data['address_form'], $assoc_array = true );
  $total_amount = $data['total_amount'];
    $request->session()->put('cart', $cart);
   $request->session()->put('address_form', $address_form);
   $request->session()->put('paid_amount', $total_amount);
   $request->session()->put('uid', $_COOKIE['id']);
// $data2  = session()->all();
//     echo json_encode($data2);
//      print_r($cart);
if(count($cart ) < 1){
    echo "no_item";
  }else{
    echo true;
    }
}
public function pay_through_wallet(Request $request){

    
        try {
              
  $data         =  $request->all();
  $cart         =  $data['cart'];
  $address_form =  $data['address_form'];
  $total_amount = $data['total_amount'];
  $uid = $data['uid'];
// print_r($cart);
// die();
    $request->session()->put('cart', $cart);
    $request->session()->put('address_form', $address_form);
    $request->session()->put('paid_amount', $total_amount);
     
    $balence =  DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
    $buyer_name =  DB::table('users')->where('no',$uid)->pluck('name')[0];
    
    $ftex=DB::table('setting')->where('id',1)->pluck('tax')[0];

// foreach($cart as $key=>  $value){
//     return $value;
    
// }
    
    if($total_amount > $balence){

        $response = ['success'=>false, 'data'=>'less_balance'];
                 
                    return response()->json($response,201);
            
    }else{
       $remaining_balance = $balence - $total_amount;
    //   return $remaining_balace;
        DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$remaining_balance]);
        
        $order_main                   = array();
        $order_main['buyer_id']       = $uid;
        $order_main['first_name']     = @$address_form['first_name'];
        $order_main['address']        = @$address_form['address'];
        $order_main['address2']       = @$address_form['address2'];
        $order_main['country']        = @$address_form['city'];
        $order_main['state']          = @$address_form['state'];
        $order_main['note']           = "";
        $order_main['zip']            = @$address_form['zip'];
        $order_main['city']           = @$address_form['country'];
        $order_main['email']          = @$address_form['email'];
        $order_main['mobile']         = @$address_form['mobile'];
        $order_main['instructions']   = @$address_form['instructions'];
        $order_main['payment_method'] = 'wallet';
        $order_main['updated_at']     = date('Y-m-d');
        $order_main['grand_total']    = $total_amount;
        $order_id = DB::table('order_main')->insertGetId($order_main);
        $someArray = json_decode($cart, true);
        foreach($someArray as $key => $value){
    // return $value['product_name'];
            $order_detail = array();
            $order_detail['order_id']        = $order_id;
            $order_detail['product_name']    = $value['imgname'];
            $order_detail['product_id']      = $value['img_id'];
            $order_detail['unit_price']      = $value['price'];
            $order_detail['delivery_method'] = $value['delivery_method'];
            $order_detail['selected_size']   = $value['selected_size'];
            $order_detail['printing_price']  = $value['printing_price'];
            $order_detail['quantity']        = $value['quantity'];
            $order_detail['net_price']       = $value['net_price'];
            DB::table('order_detail')->insertGetId($order_detail);

            
            $saler_id=DB::table('bid')->where('img_id',$value['img_id'])->pluck('seller_id')[0];
            $u_wallet=DB::table('userpix')->where('u-id',$saler_id)->pluck('walet')[0];
            $saler_name =  DB::table('users')->where('no',$saler_id)->pluck('name')[0];
            $final_price = $value['price'] * $ftex;
            $saler_amount = $value['price'] - $final_price;
            DB::table('userpix')
                ->where('u-id',$saler_id )
                ->update(['walet' => $u_wallet+$saler_amount]);
          
              $pic_price = DB::table('image')->where('id',$value['img_id'])->pluck('price')[0];

            if(empty($pic_price) || $pic_price == NULL ||  $pic_price < $value['price']){
              echo $value['price'];
              DB::table('image')
                ->where('id',$value['img_id'] )
                ->update(['price' => $value['price']]);
            }
            $data2 = array('name'=>" ".$saler_name ,'msg'=>"Some one has placed a bid on your picture. please login to your https://urpixpays.com account and have a look on bid notifiction in your account setting to proceed \r\n\r\nOrder Details\r\nOrder #".$order_id."\r\nPlaced on ".date('l jS \of F Y h:i:s A')."\r\n\r\n\r\n\r\nThank you for shopping with us.\r\nUrpixpays.com");

            Mail::send('mail', $data2, function($message) use ($value) {
               $message->to($value['seller_email'], 'Seller Email')->subject
                  ('Your Urpixpays.com order');
               $message->from('info@urpixpays.com','UrpixPays.com');
            });
            
        }
        
        $data2 = array('name'=>" ".$buyer_name ,'msg'=>"Thank you for your order on urpixpays.com. You can find the payment details of your transaction on the order invoice. If you would like to view the status of your order or make any changes to it, please visit your account settings on https://urpixpays.com or email to info@urpixpays.com.\r\n\r\nOrder Details\r\nOrder #".$order_id."\r\nPlaced on ".date('l jS \of F Y h:i:s A')."\r\n\r\n\r\n\r\nThank you for shopping with us.\r\nUrpixpays.com");
        Mail::send('mail', $data2, function($message) use ($value) {
           $message->to('info@urpixpays.com', 'Admin Email')->subject
              ('Your Urpixpays.com order');
           $message->from('info@urpixpays.com','UrpixPays.com');
        });
        DB::table('bid')->where('buyer_id',$data['uid'])->delete();
        // if(count($cart ) < 1){
        //     echo "no_item";
        //   }else{

            //  }
            $response = ['success'=>true, 'data'=>'success'];
                 
                    return response()->json($response,201);
            
    }
    
               
        } catch (\Illuminate\Database\QueryException $e) {
             $response = ['success'=>false, 'data'=>'Something Went Wrong Please Try Again'];
                 return response()->json($response, 404);
        }
}
public function paypal_payment_done(Request $request){
  $data         =  $request->all();
  $cart         =  $data['cart'];
  $address_form =  $data['address_form'];
  $total_amount = $data['total_amount'];
  
  $uid = $data['uid'];
$buyer_name =  DB::table('users')->where('no',$uid)->pluck('email')[0];
     $order_main                   = array();
        
           $order_main['buyer_id']       = $uid;
        $order_main['first_name']     = @$address_form['first_name'];
        $order_main['address']        = @$address_form['address'];
        $order_main['address2']       = @$address_form['address2'];
        $order_main['country']        = @$address_form['city'];
        $order_main['state']          = @$address_form['state'];
        $order_main['note']           = "";
        $order_main['zip']            = @$address_form['zip'];
        $order_main['city']           = @$address_form['country'];
        $order_main['email']          = @$address_form['email'];
        $order_main['mobile']         = @$address_form['mobile'];
        $order_main['instructions']   = @$address_form['instructions'];
        $order_main['payment_method'] = 'paypal';
        $order_main['updated_at']     = date('Y-m-d');
        $order_main['grand_total']    = $total_amount;
        // return $order_main;
        $order_id = DB::table('order_main')->insertGetId($order_main);
        $someArray = json_decode($cart, true);
        // return $someArray;
        foreach($someArray as $key => $value){
            $order_detail = array();
            
            $order_detail['order_id']        = $order_id;
            $order_detail['product_name']    = $value['imgname'];
            $order_detail['product_id']      = $value['img_id'];
            $order_detail['unit_price']      = $value['price'];
            $order_detail['delivery_method'] = $value['delivery_method'];
            $order_detail['selected_size']   = $value['selected_size'];
            $order_detail['printing_price']  = $value['printing_price'];
            $order_detail['quantity']        = $value['quantity'];
            $order_detail['net_price']       = $value['net_price'];
            // return $order_detail;
            DB::table('order_detail')->insertGetId($order_detail);
            $data = array('name'=>"Hope your are fine",'msg'=>"you have recevied new orders for you pictures please visit our site for more details");
      Mail::send('mail', $data, function($message) use ($value) {
         $message->to($value['seller_email'], 'Seller Email')->subject
            ('New Order Received');
         $message->from('info@urpixpays.com','UrpixPays.com');
      });
        }
        // return 'going good';
$data2 = array('name'=>"Admin",'msg'=>'New Order Have Placed please visit you dashboard for more informations');
      Mail::send('mail', $data2, function($message)  {
         $message->to('info@urpixpays.com', 'Admin Email')->subject
            ('New Order Received');
         $message->from('info@urpixpays.com','UrpixPays.com');
      });
      $data2 = array('name'=>"Mr/Ms",'msg'=>"Your order have been placed successfully");
      Mail::send('mail', $data2, function($message) use ($buyer_name) {
         $message->to($buyer_name, 'Seller Email')->subject
            ('New Order Received');
         $message->from('info@urpixpays.com','UrpixPays.com');
      });
      
         DB::table('bid')->where('buyer_id',$uid)->delete();
        //   return 'going good';
            $response = ['success'=>true, 'data'=>'success'];
                 
                    return response()->json($response,201);
}
public function pay_with_stripe(){
        return view('pay_with_stripe');
}
public function stripe_payment_process(){
    echo "tst";
}
public function payWithpaypal(Request $request)
    {
    $cart =   $request->cart;
    // echo "<pre>";
    // print_r($cart);
    // die();
 $amount_to_checkout = $request->paid_amount;
$payer = new Payer();
        $payer->setPaymentMethod('paypal');
         $someArray = json_decode($cart, true);
foreach ($someArray as $key => $value) {
    $item[$key] = new Item();
    $item[$key] ->setName($value['product_name']) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($value['quantity'])
            ->setPrice($value['net_price']); /** unit price **/
}
        $item_list = new ItemList();
        $item_list->setItems($item);
$amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amount_to_checkout);
$transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
$redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(url('/status_check')) /** Specify return URL **/
            ->setCancelUrl(url("/cart"));
$payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
$payment->create($this->_api_context);
} catch (\PayPal\Exception\PPConnectionException $ex) {
if (\Config::get('app.debug')) {
\Session::put('error', 'Connection timeout');
                return redirect()->route('paywithpaypal');
} else {
\Session::put('error', 'Some error occur, sorry for inconvenient');
                return redirect()->route('paywithpaypal');
}
}
foreach ($payment->getLinks() as $link) {
if ($link->getRel() == 'approval_url') {
$redirect_url = $link->getHref();
                break;
}
}
/** add payment ID to session **/
        \Session::put('paypal_payment_id', $payment->getId());
if (isset($redirect_url)) {
/** redirect to paypal **/
            return redirect($redirect_url);
}
\Session::put('error', 'Unknown error occurred');
        return redirect()->route('paywithpaypal');
}
public function getPaymentStatus()
    {
      // dd(session()->all());
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
/** clear the session payment ID **/
        // Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
\Session::put('error', 'Payment failed');
            return redirect('order-failed');
}
$payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
/**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
if ($result->getState() == 'approved') {
// \Session::put('success', 'Payment success');
//             $this->paypal_payment_done();
return view('complete');
}
\Session::put('error', 'Payment failed');
       return redirect('order-failed');
}
}
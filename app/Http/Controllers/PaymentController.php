<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\DB;
use App\User;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    public function index()
    {
        return view('paywithpaypal');
        // return view('Admin/admin/pages/login');
    }
    public function payWithpaypal($amount_pay)
    {
         $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        // $item_1 = new Item();
        // $item_1->setName('Item 1') /** item name **/
        //     ->setCurrency('USD')
        //     ->setQuantity(1)
        //     ->setPrice($amount_pay); /** unit price **/

            $item[0] = new Item();
            $item[0] ->setName('Item 1') /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($amount_pay); /** unit price **/
            $item_list = new ItemList();
            $item_list->setItems($item);
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($amount_pay);
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
        /** dd($payment->create($this->_api_context));exit; **/
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
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }
    public function getPaymentStatus($uid,$amount)
    {
        
        /** Get the payment ID before session clear **/
        //$payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        // Session::forget('paypal_payment_id');
        // if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        //     \Session::put('error', 'Payment failed');
        //     return Redirect::to('/');
        // }
        // $payment = Payment::get($payment_id, $this->_api_context);
        // $execution = new PaymentExecution();
        // $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        //$result = $payment->execute($execution, $this->_api_context);
        //if ($result->getState() == 'approved') {
            $inserarr=[
                'user_id'=>$uid,
                'amount'=>$amount,
                'gateway'=>'Paypal',
                'action'=>'done',
            ];
            DB::table('deposit')->insert($inserarr);

            $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id', $uid)
                ->update([
                    'walet'=>$walet+$amount
            ]);
            
            $email=DB::table('users')->where('no',$uid)->pluck('email')[0];
            $check_invite=DB::table('invite')->where('friend_email',$email)->get();
            if(count($check_invite)>0){
                $friend1_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
                $friend1_email=DB::table('users')->where('no',$friend1_id)->pluck('email')[0];
                $friend_walet=DB::table('userpix')->where('u-id',$friend1_id)->pluck('walet')[0];
                $friend_flip=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Flip')[0];
                $friend_wand=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Wand')[0];
                $friend_charge=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Charge')[0];
                $walet1=$friend_walet+$amount*0.02;
                DB::table('userpix')
                    ->where('u-id', $friend1_id)
                    ->update([
                        'walet'=>$walet1,
                        'Flip'=>$friend_flip+2,
                        'Wand'=>$friend_wand+2,
                        'Charge'=>$friend_charge+2
                ]);  
 
                $inserarr=[
                'u_id'=>$friend1_id,
                'amount'=>$amount*0.02,
                'email1'=>$email,
                'deposit'=>$amount,
                'Flip'=>2,
                'Wand'=>2,
                'Charge'=>2
                ];
                DB::table('sponsor')->insert($inserarr);
            
                $check_invite2=DB::table('invite')->where('friend_email',$friend1_email)->get();
                if(count($check_invite2)>0){
                    $friend2_id=DB::table('invite')->where('friend_email',$friend1_email)->pluck('user_id')[0];                  
                    $friend2_walet=DB::table('userpix')->where('u-id',$friend2_id)->pluck('walet')[0];
                    $walet2=$friend2_walet+$amount*0.01;
                    DB::table('userpix')
                        ->where('u-id', $friend2_id)
                        ->update([
                            'walet'=>$walet2,
                    ]);                    
 
                    $inserarr=[
                    'u_id'=>$friend2_id,
                    'amount'=>$amount*0.01,
                    'email1'=>$email,
                    'email2'=>$friend1_email,
                    'deposit'=>$amount
                    ];
                    DB::table('sponsor')->insert($inserarr);                    
                }
            
            
            }
            return response()->json('Successfull');
        // }
        // return response()->json('Failed');
    }
    public function getstripeStatus($uid,$amount)
    {   
        
        $inserarr=[
            'user_id'=>$uid,
            'amount'=>$amount,
            'gateway'=>'stripe',
            'action'=>'done',
        ];
        DB::table('deposit')->insert($inserarr);

        $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        DB::table('userpix')
            ->where('u-id', $uid)
            ->update([
                'walet'=>$walet+$amount
        ]);
        
        $email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        $check_invite=DB::table('invite')->where('friend_email',$email)->get();
        if(count($check_invite)>0){
            $friend1_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
            $friend1_email=DB::table('users')->where('no',$friend1_id)->pluck('email')[0];
            $friend_walet=DB::table('userpix')->where('u-id',$friend1_id)->pluck('walet')[0];
            $friend_flip=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Flip')[0];
            $friend_wand=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Wand')[0];
            $friend_charge=DB::table('userpix')->where('u-id',$friend1_id)->pluck('Charge')[0];
            $walet1=$friend_walet+$amount*0.02;
            DB::table('userpix')
                ->where('u-id', $friend1_id)
                ->update([
                    'walet'=>$walet1,
                    'Flip'=>$friend_flip+2,
                    'Wand'=>$friend_wand+2,
                    'Charge'=>$friend_charge+2
            ]);  

            $inserarr=[
            'u_id'=>$friend1_id,
            'amount'=>$amount*0.02,
            'email1'=>$email,
            'deposit'=>$amount,
            'Flip'=>2,
            'Wand'=>2,
            'Charge'=>2
            ];
            DB::table('sponsor')->insert($inserarr);
        
            $check_invite2=DB::table('invite')->where('friend_email',$friend1_email)->get();
            if(count($check_invite2)>0){
                $friend2_id=DB::table('invite')->where('friend_email',$friend1_email)->pluck('user_id')[0];                  
                $friend2_walet=DB::table('userpix')->where('u-id',$friend2_id)->pluck('walet')[0];
                $walet2=$friend2_walet+$amount*0.01;
                DB::table('userpix')
                    ->where('u-id', $friend2_id)
                    ->update([
                        'walet'=>$walet2,
                ]);                    

                $inserarr=[
                'u_id'=>$friend2_id,
                'amount'=>$amount*0.01,
                'email1'=>$email,
                'email2'=>$friend1_email,
                'deposit'=>$amount
                ];
                DB::table('sponsor')->insert($inserarr);                    
            }
        
        
        }
        return response()->json('Successfull');
    
        
    }
}
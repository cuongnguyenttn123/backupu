<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/order-complete','UserController@order_complete');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/paypal_payment_done','MYPaymentController@paypal_payment_done');

Route::get('pay_with_stripe','MYPaymentController@pay_with_stripe');
Route::post('stripe-test-payment1',function(){
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_bv6rKhdohoxLdKE1GQDWqZ2C00JehmTQ62');
// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);

});

Route::post('admin_change_order_status','AdminController@admin_change_order_status');
Route::post('admin_change_order_notes','AdminController@admin_change_order_notes');


Route::get('addmoney/stripe', array('as' => 'addmoney.paystripe','uses' => 'MoneySetupController@PaymentStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'MoneySetupController@postPaymentStripe'));

Route::get('payment-test','MYPaymentController@payWithpaypal');
Route::post('pay_with_paypal_2','MYPaymentController@setPayment');
Route::post('pay_through_wallet','MYPaymentController@pay_through_wallet');

// Route::get('payment',array('as'=>'payment','uses'=>'PaymentController@payment'));
// Route::get('payment-cancel', function () {
//    return 'Payment has been canceled';
// });



Route::get('/',function(){
    return redirect('/challenges/my');
});

Route::get('/frontend',function(){
    return view('Admin.frontend.index');
});
Route::get('/signup', function () {
    return view('Modal/signup');
});
Route::get('/signin', function () {
    return view('Modal/signin');
});
Route::get('/logout',function(){
    Session::put('login_flag','false');
    Session::put('admin_login_flag','false');
    return redirect('landing');
});
// Route::get('/cart', function () {
//     return view('shop/cart');
// });
Route::get('/payment', function () {
    return view('shop/payment');
});

Route::post('/seller_approve_image', 'UserController@seller_approve_image');
Route::post('/delete_cart_item', 'UserController@delete_cart_item');



Route::post('/savebid', array('uses' => 'UserController@savebid'));

Route::post('/saveProfile', array('uses' => 'UserController@saveProfile'));
Route::post('/adminsaveProfile', array('uses' => 'AdminController@adminsaveProfile'));
Route::post('/adminsaveProfile1', array('uses' => 'AdminController@adminsaveProfile1'));
Route::post('adminregister', array('uses' => 'AdminController@adminsignup'));
Route::post('adminlogin', array('uses' => 'AdminController@adminlogin'));

Route::post('register1', array('uses' => 'UserController@usersignup'));
Route::post('login1', array('uses' => 'UserController@usersignin'));
Route::post('logincheck', array('uses' => 'UserController@logincheck'));
Route::post('sendvc', array('uses' => 'UserController@sendvc'));
Route::post('user/challenges/join', array('uses' => 'UserController@ChallengeJoin'));
Route::post('user/challenges/join1', array('uses' => 'UserController@paid_ChallengeJoin'));
Route::post('image/upload', array('uses' => 'UserController@ImageUpload'));
Route::post('image/submit', array('uses' => 'UserController@ImageSubmit'));
Route::post('friend/invite', array('uses' => 'UserController@Invite'));
Route::post('challenge/invite', array('uses' => 'UserController@addChallengeInvite'));

Route::post('upload_image', array('uses' => 'UserController@upload_image'));






Route::post('image/get', array('uses' => 'UserController@getImage'));
Route::post('userpix/get', array('uses' => 'UserController@getPix'));
Route::post('voting/set1', array('uses' => 'UserController@add_question'));
Route::post('voting/set', array('uses' => 'UserController@addVoting'));
Route::post('challenges/charge', array('uses' => 'UserController@Charge'));
Route::post('exposure/get', array('uses' => 'UserController@getExposure'));
Route::post('Boost/set', array('uses' => 'UserController@setBoost'));
Route::post('getfriendlist', array('uses' => 'UserController@getInvite'));
Route::post('getfriendlist1', array('uses' => 'UserController@getCInvite'));
Route::post('view/userpix', array('uses' => 'UserController@getUserpix'));
Route::post('withdraw_request', array('uses' => 'UserController@withdraw_request'));

//---------------------------userpix_call------------------------------------//
Route::post('view/userpix', array('uses' => 'AdminController@getUserpix'));
Route::post('updateuserpix', array('uses' => 'AdminController@updateuerpix'));
Route::post('delete/images', array('uses' => 'UserController@Imagedelete'));


Route::post('shop/image', array('uses' => 'UserController@shopimage'));
Route::post('shop/cart', array('uses' => 'UserController@add_cart'));

Route::post('paypal', 'PaymentController@payWithpaypal');
Route::get('status/{amount}', 'PaymentController@getPaymentStatus');
//--------------------------------end----------------------------------------//

Route::post('/accept', array('uses' => 'UserController@bid_permission'));
Route::post('/report_permission', array('uses' => 'UserController@report_permission'));
Route::post('/report_permission1', array('uses' => 'UserController@report_permission1'));

Route::post('getNotification', array('uses' => 'UserController@getNotification'));
Route::post('processNotification', array('uses' => 'UserController@processNotification'));
Route::post('invited_challenge_join', array('uses' => 'UserController@ivtChallengeJoin'));


Route::get('test1', 'TestController@setcookie');
Route::get('test2', 'TestController@getcookie');

Route::get('admin/user', 'AdminController@user');
Route::get('admin/admin', 'AdminController@admin');
Route::get('admin/user1', 'AdminController@user1');
Route::get('admin/c_u/{cid}', 'AdminController@u_join_c');
Route::get('admin/c_u1/{cid}', 'AdminController@u_join_c1');
Route::get('admin/challenge', 'AdminController@challenge');
Route::get('admin/userimages', 'AdminController@user_images');
Route::get('admin/deleteuserimage/{image_id}', 'AdminController@deleteuserimage');

// -------------pcs-----------------
Route::post('challenge_edit', array('uses' => 'AdminController@challenge_edit'));
// -------------pcs-----------------
Route::get('admin/challenge1', 'AdminController@challenge1');

Route::get('/bid_state', 'AdminController@bid_state');
Route::get('/bid_state1', 'AdminController@bid_state');

Route::get('/reports', 'AdminController@reports');
Route::get('/reports1', 'AdminController@reports1');

Route::get('admin/game1', 'AdminController@game1');
Route::get('admin/game', 'AdminController@game');
Route::get('admin/deposits', 'AdminController@deposits');
Route::get('admin/withdrawrequest', 'AdminController@withdrawrequest');
Route::get('admin/OrdersDetail', 'AdminController@OrdersDetail');
Route::get('/admin/ordercompletdetail/{order_id}', 'AdminController@order_completdetail');
Route::get('admin/deposits1', 'AdminController@deposits1');

Route::get('admin/invitation', 'AdminController@invitation');
Route::get('admin/invitation1', 'AdminController@invitation1');
Route::get('admin/sponsor', 'AdminController@sponsor');
Route::get('admin/sponsor1', 'AdminController@sponsor1');


Route::get('admin/withdrawrequest1', 'AdminController@withdrawrequest1');
Route::get('admin/image', 'AdminController@image');
Route::get('admin/commit', 'AdminController@commit');

//--------------------------------shopimage----------------------------------//
//Route::get('/shop', 'AdminController@shopimage');
//---------------------------------end--------------------------------------//
//Route::get('login', 'UserController@usersignin');
Route::post('/challenge/upload', array('uses' => 'AdminController@challengeupload'));
Route::post('/admin_bid', array('uses' => 'AdminController@admin_bid'));
Route::post('/user/permission', array('uses' =>'AdminController@permission_user'));
Route::post('/challenge/permission', array('uses' =>'AdminController@permission'));
Route::post('/test/api', array('uses' => 'AdminController@testapi'));
//Route::post('/challenge/uploadimage',array('uses' => 'AdminController@showUploadFile'));


Route::get('/landing',function(){
    if (Session::get('login_flag')=='login') return redirect('/challenges/my');
    else    return view('landing');
});
Route::get('/invite','UserController@getListInvite');
Route::get('/shop','UserController@init_shoppage');
Route::get('/cart','UserController@cart');
Route::get('/balanceoverview','UserController@account_setting');
Route::get('/myprofile','UserController@my_profile');
Route::get('/u_invitation','UserController@user_invitaion');
Route::get('/bidding','UserController@bidding');
Route::get('/cart_bid','UserController@cart_bid');
Route::get('/notification','UserController@notification');
Route::get('/u_sponsorship','UserController@user_sponsorship');
Route::get('/admin_profile','AdminController@admin_profile');
Route::get('/admin_profile1','AdminController@admin_profile1');
Route::get('/transferredlog','UserController@transferredlog');
Route::post('/myprofile','UserController@my_profile');
//-----------------------about_us------------------------
Route::get('/about_us','UserController@about_us');
Route::get('/info_page','UserController@info_page');
Route::get('/term_conditions','UserController@term_conditions');
Route::get('/privacy','UserController@privacy');
Route::get('/copyright','UserController@copyright');
//---------------------------end-----------------------------


Route::get('/withdraw_paypal','UserController@withraw_paypal');
Route::get('challenges/invite/{cid}','UserController@challengInvite');
Route::get('/challenges/open', 'UserController@OpenChallenges');
Route::get('/challenges/closed', 'UserController@ClosedChallenges');
Route::get('/challenges/my', 'UserController@MyChallenges');
Route::get('/challenges/pass', 'UserController@passChallenges');
Route::get('/challenges/voting/{cid}', 'UserController@setVote');
Route::get('/challenges/detail/{cid}', 'UserController@challengeDetail');
Route::get('/challenges/result/{cid}', 'UserController@challengeResult');
Route::get('/challenges/result_closed/{cid}', 'UserController@closed_challengeResult');
Route::get('/challenges/invited/{cid}', 'UserController@invitedChallenge');


$this->get('admin/withdraw_process/{id}/{action}','AdminController@AdminRemark');
$this->get('admin/withdraw_process1/{id}/{action}','AdminController@AdminRemark1');







$this->get('/bids_to_accept','UserController@bids_to_accept');
$this->get('/bids_to_pay','UserController@bids_to_pay');








//Route::get('/challenges/open',function(){
//    if(isset($_COOKIE['email'])){
//        if (Session::get($_COOKIE['email'])) {
//            return view('challenges/open');
//        }
//        else{
//            return redirect('landing');
//        }
//    }
//    else{
//        return redirect('landing');
//    }
//
//});
//Route::get('/challenges/my',function(){
//    //return Session::get('jindongzheshenyang@gmail.com');
//    if(isset($_COOKIE['email'])){
//        if (Session::get($_COOKIE['email'])) {
//            return view('challenges.mychallenges');
//        }
//        else{
//            return redirect('landing');
//        }
//    }
//    else{
//        return redirect('landing');
//    }
//});

Route::get('/paypal',function(){
    return view('paywithpaypal');
});
Route::get('/paypal', 'PaymentController@index');
Route::get('/Aims',function(){

    return view('Aims');
});

Route::get('/charges&credit',function(){
    return view('charges&credit');
});
Route::get('/news&updates',function(){
    return view('news&updates');
});
Route::get('/support/withdrawal',function(){
    return view('support/withdrawal');
});
Route::get('/support/generalitermofuse',function(){
    return view('support/generalitermofuse');
});
Route::get('/support/deposit',function(){
    return view('support/deposit');
});
Route::get('/support/contact',function(){
    return view('support/contact');
});
// Route::get('/withdraw_paypal',function(){
//     return view('withdraw_paypal');
// });
// -----------pak_make_accountsettingpage(admin_side)---------------------
Route::get('/Admin/deposits',function(){
    return view('deposits');
});

// -----------pak_make_accountsettingpage(user_side)---------------------
Route::get('/Profit_Loss',function(){
    return view('Profit_Loss');
});
Route::get('/withdraw_strip',function(){
    return view('withdraw_strip');
});


//-------------------------new-------------------------
Route::get('/admin_login',function(){
    return view('Admin/Auth/login');
});
Route::get('/admin_register',function(){
    return view('Admin/Auth/register');
});

// Route::get('/bid_state',function(){
//     return view('Admin/bid_state');
// });

Route::get('/home',function(){
    return view('Admin/user');
});
 
// Route::get('/auction',function(){
//     return view('shop/auction');
// });
Route::get('/auction/{iid}', 'UserController@auction');
// Route::get('/about_us',function(){
//     return view('about_us');
// });
// Route::get('/copyright',function(){
//     return view('copyright');
// });
// Route::get('/privacy',function(){
//     return view('privacy');
// });
// Route::get('/term_conditions',function(){
//     return view('term_conditions');
// });
// Route::get('/info_page',function(){
//     return view('infopage');
// });
// Route::get('/img_upload','UserController@withraw_paypal');
// Route::post('/img_upload', 'UserController@my_profile');


Route::post('/user_permiss','AdminController@user_permiss');
Route::post('/admin_permiss','AdminController@admin_permiss');
Route::post('/updateadmin','AdminController@updateadmin');


Route::get('/orders-purchased', 'UserController@orders_purchased');
Route::get('/orders-saled', 'UserController@orders_saled');
Route::get('/order-details/{order_id}', 'UserController@order_details');





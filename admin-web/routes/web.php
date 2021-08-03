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
    $exitCode = Artisan::call('view:clear');
    dd($exitCode);
});
Route::get('/order-complete','UserController@order_complete');
Route::post('/challage_remaing','UserController@challage_remaing');
Route::get('/order-failed','UserController@order_failed');
Route::get('/sendNotification/{token}/{title}/{des}','UserController@sendNotification');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/paypal_payment_done','MYPaymentController@paypal_payment_done');
Route::get('/status_check','MYPaymentController@getPaymentStatus');


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




Route::get('/', 'UserController@index');

// Route::get('/',function(){
//     return redirect('/challenges/my');
// });

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
    Session::forget('id');
    Session::forget('login_flag');
    Session::put('id','false');
    Session::put('admin_login_flag','false');
    return redirect('/')->withCookie(Cookie::forget('id'));
});
// Route::get('/cart', function () {
//     return view('shop/cart');
// });
Route::get('/payment', function () {
    return view('shop/payment');
});

Route::post('/seller_approve_image', 'UserController@seller_approve_image');
Route::post('/delete_cart_item', 'UserController@delete_cart_item');




Route::post('/change_vote', array('uses' => 'AdminController@change_vote'));
Route::post('/allcharge', array('uses' => 'UserController@allcharge'));
Route::post('/allwand', array('uses' => 'UserController@allwand'));

Route::post('/savebid', array('uses' => 'UserController@savebid'));
Route::post('/welcome_check', array('uses' => 'UserController@welcome_check'));

Route::post('/saveProfile', array('uses' => 'UserController@saveProfile'));
Route::post('/adminsaveProfile', array('uses' => 'AdminController@adminsaveProfile'));
Route::post('/adminsaveProfile1', array('uses' => 'AdminController@adminsaveProfile1'));
Route::post('adminregister', array('uses' => 'AdminController@adminsignup'));
Route::post('adminlogin', array('uses' => 'AdminController@adminlogin'));

Route::post('register1', array('uses' => 'UserController@usersignup'));
Route::post('send_vc_again', array('uses' => 'UserController@send_vc_again'));
Route::post('login1', array('uses' => 'UserController@usersignin'));
Route::post('logincheck', array('uses' => 'UserController@logincheck'));


Route::post('sendvc', array('uses' => 'UserController@sendvc'));
Route::post('sendvc1', array('uses' => 'UserController@sendvc1'));


Route::post('user/challenges/join', array('uses' => 'UserController@ChallengeJoin'));
Route::post('user/challenges/join1', array('uses' => 'UserController@paid_ChallengeJoin'));

Route::post('image/exhibition', array('uses' => 'UserController@upload_image_exhibition'));

Route::post('image/upload', array('uses' => 'UserController@ImageUpload'));
Route::post('image/submit', array('uses' => 'UserController@ImageSubmit'));
Route::post('friend/invite', array('uses' => 'UserController@Invite'));
Route::post('challenge/invite', array('uses' => 'UserController@addChallengeInvite'));

Route::post('upload_image', array('uses' => 'UserController@upload_image'));

Route::post('clearnotification', array('uses' => 'UserController@clearNotification'));


Route::post('reset_pass', array('uses' => 'UserController@reset_pass'));
Route::post('about_user', array('uses' => 'UserController@about_user'));
Route::post('sendvc1', array('uses' => 'UserController@sendvc1'));
Route::post('forgot_password', array('uses' => 'UserController@forgot_password'));

Route::post('image/get', array('uses' => 'UserController@getImage'));
Route::post('userpix/get', array('uses' => 'UserController@getPix'));
Route::post('voting/set1', array('uses' => 'UserController@add_question'));
Route::post('voting/set', array('uses' => 'UserController@addVoting'));
Route::post('image_reject', array('uses' => 'UserController@image_reject'));
Route::post('image_delete', array('uses' => 'UserController@image_delete'));
Route::post('challenges/charge', array('uses' => 'UserController@Charge'));
Route::post('challenges/wand', array('uses' => 'UserController@Wand'));
Route::post('exposure/get', array('uses' => 'UserController@getExposure'));
Route::post('Boost/set', array('uses' => 'UserController@setBoost'));
Route::post('getfriendlist', array('uses' => 'UserController@getInvite'));
Route::post('getfriendlist1', array('uses' => 'UserController@getCInvite'));
Route::post('view/userpix', array('uses' => 'UserController@getUserpix'));
Route::post('withdraw_request', array('uses' => 'UserController@withdraw_request'));
Route::post('withdraw_note', array('uses' => 'AdminController@withdraw_note'));

//---------------------------userpix_call------------------------------------//
Route::post('view/userpix', array('uses' => 'AdminController@getUserpix'));
Route::post('updateuserpix', array('uses' => 'AdminController@updateuserpix'));
Route::post('edituser', array('uses' => 'AdminController@edituser'));
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
Route::post('getNotification1', 'AdminController@getNotification1');

Route::post('processNotification', array('uses' => 'UserController@processNotification'));
Route::post('invited_challenge_join', array('uses' => 'UserController@ivtChallengeJoin'));


Route::get('test1', 'TestController@setcookie');
Route::get('test2', 'TestController@getcookie');

Route::get('admin/user', 'AdminController@user');
Route::get('admin/admin', 'AdminController@admin');
Route::get('admin/user1', 'AdminController@user1');
Route::get('admin/c_u/{cid}', 'AdminController@u_join_c');
Route::get('admin/c_u1/{cid}', 'AdminController@u_join_c1');

Route::get('admin_settings', 'AdminController@settings');

Route::get('admin/challenge', 'AdminController@challenge');
Route::get('admin/userimages', 'AdminController@user_images');
Route::get('admin/deleteuserimage/{image_id}', 'AdminController@deleteuserimage');


Route::get('admin/infoimages', 'AdminController@info_images');
Route::post('admin/upload_info_images', 'AdminController@upload_info_images');
Route::post('admin/update_info_order', 'AdminController@update_info_order');
Route::get('admin/detele_info_image/{image_id}', 'AdminController@detele_info_image');


Route::get('/best_images','UserController@best_images');
Route::get('/exhibition','UserController@exhibition');
Route::get('/exhibition_result','UserController@exhibition_result');
Route::get('/exhibitions','UserController@exhibitions');
Route::get('admin/bestimages', 'AdminController@best_images');
Route::post('admin/upload_best_images', 'AdminController@upload_best_images');

Route::post('admin/update_best_order', 'AdminController@update_best_order');
Route::get('admin/detele_best_image/{image_id}', 'AdminController@detele_best_image');

Route::post('signup_setting', 'AdminController@signup_setting');
Route::post('tax_setting', 'AdminController@tax_setting');
Route::post('rank_setting', 'AdminController@rank_setting');
Route::post('i_setting', 'AdminController@i_setting');
Route::post('s_setting', 'AdminController@s_setting');

// -------------pcs-----------------
Route::post('challenge_edit', array('uses' => 'AdminController@challenge_edit'));
// -------------pcs-----------------
Route::get('admin/challenge1', 'AdminController@challenge1');

Route::get('/bid_state', 'AdminController@bid_state');
Route::get('/bid_state1', 'AdminController@bid_state1');

Route::get('/reports', 'AdminController@reports');
Route::get('/reports1', 'AdminController@reports1');

Route::get('admin/winner1', 'AdminController@winner1');
Route::get('admin/transaction', 'AdminController@transaction');
Route::get('admin/appnotifications', 'AdminController@app_notifications');
Route::post('add_notifications', array('uses' => 'AdminController@add_notifications'));
Route::post('edit_notifications', array('uses' => 'AdminController@edit_notifications'));
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
Route::post('/challenge/award', array('uses' =>'AdminController@award'));
Route::post('/test/api', array('uses' => 'AdminController@testapi'));
//Route::post('/challenge/uploadimage',array('uses' => 'AdminController@showUploadFile'));


Route::get('/landing',function(){
    if (Session::get('login_flag')=='login') return redirect('/challenges/my');
    else    return view('landing');
});
Route::get('/landingdm',function(){
    if (Session::get('login_flag')=='login') return redirect('/challenges/my');
    else    return view('landingdm');
});
Route::get('/gallary_images','UserController@gallary_images');

Route::get('/membership','UserController@membership');
Route::get('/membershipbeta','UserController@membershipbeta');

Route::get('/invite','UserController@getListInvite');
Route::get('/invite_sign_up/{cid}','UserController@invite_sign_up');
//Route::get('/shop','UserController@init_shoppage');
Route::get('shop/{page?}/{sort?}/{search?}', array('uses' => 'UserController@shopimagedm'));
Route::get('/shopdm','UserController@init_shoppagedm');
Route::get('/cart','UserController@cart');
Route::get('/balanceoverview','UserController@account_setting');
Route::get('/myprofile','UserController@my_profile');

Route::get('/u_transaction','UserController@transaction');

Route::get('/myphotos','UserController@myphotos');
Route::get('/DeletedPhoto/{id}','UserController@DeletedPhoto')->name('delete.my.photo');

Route::get('/my_photos/{success?}','UserController@my_photos');
Route::get('/u_invitation','UserController@user_invitaion');
Route::get('/bidding','UserController@bidding');
Route::get('/cart_bid','UserController@cart_bid');
Route::get('/notification','UserController@notification');
Route::get('/u_sponsorship','UserController@user_sponsorship');
Route::get('/admin_profile','AdminController@admin_profile');
Route::get('/admin_profile1','AdminController@admin_profile1');
Route::get('/transferredlog','UserController@transferredlog');
Route::get('/php_info_test','UserController@php_info_test');
Route::post('/myprofile','UserController@my_profile');
//-----------------------about_us------------------------
Route::get('/about_us','UserController@about_us');
Route::get('/info_page','UserController@info_page');
Route::get('/term_conditions','UserController@term_conditions');
Route::get('/privacy','UserController@privacy');
Route::get('/copyright','UserController@copyright');

Route::get('/portfolio/{iid}','UserController@portfolio');
//---------------------------end-----------------------------


Route::get('/withdraw_paypal/{type_name}','UserController@withraw_paypal');
Route::get('challenges/invite/{cid}','UserController@challengInvite');
Route::get('/challenges/open', 'UserController@OpenChallenges');
Route::get('/challenges/closed', 'UserController@ClosedChallenges');
Route::get('/challenges/my', 'UserController@MyChallenges');
Route::get('/challenges/pass', 'UserController@passChallenges');
Route::get('/challenges/voting/{cid}/{reload?}', 'UserController@setVote');
Route::get('/challenges/votingdm/{cid}', 'UserController@setVotedm');
Route::post('/challenges/voting_pics/{cid}', 'UserController@voting_pics');
Route::get('/challenges/rank/{cid}', 'UserController@challengeRank');
Route::get('/challenges/images/{cid}', 'UserController@challengeImages');
Route::get('/challenges/detail/{cid}', 'UserController@challengeDetail');

Route::post('/challenges/rankloadmore','UserController@rankloadmore');

Route::get('/challenges/result/{cid}', 'UserController@challengeResult');
Route::get('/challenges/result_closed/{cid}', 'UserController@closed_challengeResult');
Route::get('/challenges/closed_rank/{cid}', 'UserController@challengeClosedRank');
Route::get('/challenges/closed_images/{cid}', 'UserController@challengeClosedImages');
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
// Route::get('/admin_login',function(){
//     return view('Admin/Auth/login');
// });

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
Route::get('/auction/{iid}/{success?}', 'UserController@auction');
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
Route::get('/orders-sold', 'UserController@orders_saled');
Route::get('/order-details/{order_id}', 'UserController@order_details');

//---------------------New Admin-------------------------

// Route::post('admin_login', array('uses' => 'AdminController@admin_login'));
Route::get('admin/view', 'AdminController@admin_view');

//------------------------end----------------------------
//----------------------new admin panel---------------------------
Route::get('/admin/login0123123',function(){
    return view('admin1/pages/login');
});
// Route::get('/admin/dashboard',function(){
//     return view('admin1/pages/dashboard');
// });
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/profile','AdminController@adminprofile');


Route::get('/admin/banner','AdminController@adminbanner');
Route::post('/adminsavebanner', array('uses' => 'AdminController@adminUpdateBanner'));

Route::get('admin/administrator', 'AdminController@administrator');
Route::get('admin/user0', 'AdminController@user0');
Route::get('admin/challenge0', 'AdminController@challenge0');

Route::get('admin/creacte/pop/up/user','AdminController@createPopPupForUsers')->name('create.popup');



Route::get('admin/gof', 'AdminController@gamex');
Route::get('admin/challengedetails/{cid}', 'AdminController@ujoined_challenge');
Route::get('admin/challenge_images_delete/{cid}', 'AdminController@challenge_images_delete');
Route::get('admin/challenge_images_delete_all/{cid}', 'AdminController@challenge_images_delete_all');
Route::get('admin/winners', 'AdminController@winners');
Route::get('admin/userimages0', 'AdminController@user_images0');
Route::get('admin/user_images_search','AdminController@user_images_search');
Route::get('admin/orders', 'AdminController@orders');
Route::get('/admin/orderdetail/{order_id}', 'AdminController@order_detail');
Route::get('/admin/deposit', 'AdminController@deposit');
Route::get('admin/withdraw', 'AdminController@withdraw');
Route::get('admin/withdraw_search','AdminController@withdraw_search');
// $this->get('admin/withdraw_process0/{id}/{action}','AdminController@AdminRemark0');
Route::get('admin/invitation0', 'AdminController@invitation0');
Route::get('admin/sponsor0', 'AdminController@sponsor0');
Route::get('admin/bidresult', 'AdminController@bidresult');
Route::get('admin/buysell', 'AdminController@buysell');
Route::get('admin/buysellSearch','AdminController@buysellSearch');
Route::get('admin/buysell_approved', 'AdminController@buysell_approved');
Route::get('admin/buysell_approved_search','AdminController@buysell_approved_search');
Route::get('admin/buysell_reject', 'AdminController@buysell_reject');
Route::get('admin/buysell_reject_search','AdminController@buysell_reject_search');
Route::get('admin/infoimages0', 'AdminController@info_images0');
Route::get('admin/detele_info_image0/{image_id}', 'AdminController@detele_info_image0');
Route::get('admin/bestimages0', 'AdminController@best_images0');
Route::get('admin/exhebition', 'AdminController@exhebition');
Route::get('admin/detele_best_image0/{image_id}', 'AdminController@detele_best_image0');

Route::get('admin/detele_exhebition_image/{image_id}', 'AdminController@detele_exhebition_image');

Route::get('admin/reports', 'AdminController@reports0');
Route::get('admin/transaction0', 'AdminController@transaction0');
Route::get('admin/setting', 'AdminController@setting');
Route::get('admin/logout', 'AdminController@adminlogout');
Route::get('admin/account', 'AdminController@account');
Route::get('admin/withdraw_transfer', 'AdminController@withdraw_transfer');



Route::post('adminlogin0', array('uses' => 'AdminController@adminlogin0'));
Route::post('/adminsaveProfile0', array('uses' => 'AdminController@adminsaveProfile0'));
Route::post('/create_admin', array('uses' => 'AdminController@create_admin'));
Route::post('/edit_admin', array('uses' => 'AdminController@edit_admin'));
Route::post('/admin_permiss0','AdminController@admin_permiss0');
Route::post('/edit_user', array('uses' => 'AdminController@edit_user'));
Route::post('/user/permission0', array('uses' =>'AdminController@permission_user0'));
Route::post('/challenge/upload0', array('uses' => 'AdminController@challengeupload0'));
Route::post('/challenge/permission0', array('uses' =>'AdminController@permission0'));
Route::post('/challenge/edit0', array('uses' =>'AdminController@challenge_edit0'));
Route::post('/challenge/award0', array('uses' =>'AdminController@award0'));
Route::post('/change_vote0', array('uses' => 'AdminController@change_vote0'));
Route::post('/admin/imgdelete', array('uses' => 'AdminController@imgdelete'));
Route::post('/admin/note_update','AdminController@note_update');
Route::post('/order_status','AdminController@order_status');
Route::post('withdraw_note0', array('uses' => 'AdminController@withdraw_note0'));
Route::post('/admin_bid0', array('uses' => 'AdminController@admin_bid0'));
Route::post('/adminbuysale', array('uses' => 'AdminController@adminbuysale'));
Route::post('admin/update_info_order0', 'AdminController@update_info_order0');
Route::post('admin/upload_info_images0', 'AdminController@upload_info_images0');
Route::post('admin/update_best_order0', 'AdminController@update_best_order0');
Route::post('admin/upload_best_images0', 'AdminController@upload_best_images0');
Route::post('admin/update_exhebition_order', 'AdminController@update_exhebition_order');
Route::post('admin/upload_exhebition_images', 'AdminController@upload_exhebition_images');
Route::post('/report_permission0', 'AdminController@report_permission0');
Route::post('signup_setting0', 'AdminController@signup_setting0');
Route::post('tax_setting0', 'AdminController@tax_setting0');
Route::post('rank_setting0', 'AdminController@rank_setting0');
Route::post('i_setting0', 'AdminController@i_setting0');
Route::post('s_setting0', 'AdminController@s_setting0');
Route::post('key_setting0', 'AdminController@key_setting0');
Route::post('/add_record', 'AdminController@add_record');
Route::post('/edit_record', 'AdminController@edit_record');
Route::post('/delete_record', 'AdminController@delete_record');
Route::post('/add_transfer', 'AdminController@add_transfer');
Route::post('/delete_transfer', 'AdminController@delete_transfer');
Route::post('/edit_transfer', 'AdminController@edit_transfer');
Route::post('/edit_transfer1', 'AdminController@edit_transfer1');

Route::post('/withdraw_process0', 'AdminController@AdminRemark0');

//--------------------------end--------------------------------
Route::get('/admin/state_update','AdminController@state_update');

Route::get('super9_refer/{ref_id?}', 'MlmController@refer');
Route::get('super9', 'MlmController@dashborad');
Route::get('supertree/{uid}', 'MlmController@user_mlmtree');
Route::get('teamview/{uid}', 'MlmController@geologictree');
Route::get('superWallet', 'MlmController@mlmWallet');
Route::get('income_history', 'MlmController@comission_history');
Route::post('freeaccount', 'MlmController@freeaccount');
Route::post('waletaccount', 'MlmController@waletaccount');
Route::post('accountpaid', 'MlmController@accountpaid');
Route::post('waletpaid', 'MlmController@waletpaid');
Route::get('becomepaid', 'MlmController@becomepaid');
Route::get('superrewards', 'MlmController@mlmrewards');

Route::post('getusernamep', 'MlmController@getusernamep');




// Social Posts Admin SHow
  //New Routes Added By (A) The Coder;
//Admin Posts
Route::post('add-post/{id?}', 'PostController@save')->name('SavePost');
Route::get('admin/posts', 'PostController@index');
Route::post('deleteAllPosts','PostController@deleteAllPosts');
Route::get('admin/posts/search','PostController@postsSearch');
Route::post('post-status/{id}/{status}', 'PostController@changeStatus');
Route::get('delete-post/{id}', 'PostController@delete')->name('delete.socialPost');
Route::get('edit-post/{id}', 'PostController@edit')->name('edit-post');
Route::get('delete-image/{id}', 'PostController@removeImage')->name('delete.image');
Route::get('admin/all-reports','PostController@allReports')->name('All.Reports');

//User Posts
Route::get('user-posts', 'PostController@getUserPosts');
Route::get('get-post/{id}', 'PostController@getPost');
//
Route::post('admin/change/post/approval/setting', 'AdminController@postApprovalSettings')->name('approve.user.post');
Route::get('admin/userSearch','AdminController@userSearch')->name('admin.search');
Route::post('user/multi_delete','AdminController@deleteAllusers');
Route::post('withdrawl/multi_delete','AdminController@withdelteall');


Route::get('send-bulk-email','PostController@BulkEmailView');
Route::get('send-single-email/{id}','PostController@SingleEmailSendUser')->name('send.email');
Route::post('PostBulkEmail','PostController@PostBulkEmail')->name('post.bulk.email');
Route::post('singleBulkEmail','PostController@SendSingleEmail')->name('post.single.email');
Route::group(['middleware' => 'api-header'], function () {

//users post
Route::get('Social-Post','PostController@webIndex')->name('all.social.posts');
Route::post('add-comment-reply','PostController@addCommentReply');
Route::post('add-comment','PostController@addComment');
Route::get('admin/show-exhibition-posts','PostController@exhibitionindex');
Route::get('admin/delete-exhibition-posts/{id}','PostController@deleteexhibition')->name('exhibition.delete');
Route::post('likedPost','PostController@likedPost');
Route::post('unlikePost','PostController@unlikePost');
Route::get('create-report/{postId}','PostController@createReportView')->name('report.post');
Route::get('all-posts-user','PostController@userAllPosts')->name('user.all.posts');
Route::get('create-social-post','PostController@showCreatePost');
Route::post('createPostWeb','PostController@createPostWeb')->name('create.social.post');
Route::post('save-report-web','PostController@saveReport')->name('save.report.web');
Route::get('webIndexAjax','PostController@webIndexAjax');
Route::get('getPostsComments','PostController@getPostsComments');
Route::get('single/post/{id}','PostController@SinglePost');
Route::get('userallData','AdminController@userallData');

Route::get('exhibitionCovertToExcel','PostController@exhibitionCovertToExcel');
Route::get('deactive-users','UserController@DeactiveAccountView')->name('DeactiveAccountView');
Route::get('DeleateAcount/{id}','UserController@DeleateAcount')->name('DeleateAcount');
Route::get('CancelDeleteAccountRequest/{id}','UserController@CancelDeleteAccountRequest')->name('CancelDeleteAccountRequest');

Route::get('send-mobile-notification','PostController@MobileNotificatoinView');
Route::post('SendNotificationToMobile','PostController@SendNotificationToMobile')->name('SendNotificationToMobile.send');
});




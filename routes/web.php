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
Route::get('/order-failed','UserController@order_failed');

Route::post('/SaveOrCheckAppleId','UserController@SaveOrCheckAppleId');
Route::post('/about_user','UserController@about_user');
Route::get('/GetAppleEmail','UserController@GetAppleEmail');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::post('/paypal_payment_done','MYPaymentController@paypal_payment_done');
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
Route::post('/delete_cart_item/{id}', 'UserController@delete_cart_item');

Route::get('deactivateAccountRequest','UserController@deactivateAccountRequest');


Route::get('/checkVersion', 'UserController@checkVersion');
Route::post('/change_vote', array('uses' => 'AdminController@change_vote'));

Route::post('/savebid', array('uses' => 'UserController@savebid'));
Route::get('/sendNotification/{token}/{title}/{body}',array('uses' => 'UserController@sendNotification'));

Route::post('/saveProfile', array('uses' => 'UserController@saveProfile'));
Route::post('/saveProfilepic', array('uses' => 'UserController@saveProfilepic'));
Route::post('/savecover', array('uses' => 'UserController@savecover'));
Route::post('/adminsaveProfile', array('uses' => 'AdminController@adminsaveProfile'));
Route::post('/adminsaveProfile1', array('uses' => 'AdminController@adminsaveProfile1'));
Route::post('adminregister', array('uses' => 'AdminController@adminsignup'));
Route::post('adminlogin', array('uses' => 'AdminController@adminlogin'));

Route::post('register1', array('uses' => 'UserController@usersignup'));
Route::post('usersignin', array('uses' => 'UserController@usersignin'));
Route::post('socail_signin', array('uses' => 'UserController@socail_signin'));
Route::post('logincheck', array('uses' => 'UserController@logincheck'));


Route::post('sendvc', array('uses' => 'UserController@sendvc'));
Route::post('sendvc1', array('uses' => 'UserController@sendvc1'));
Route::post('social_signup', array('uses' => 'UserController@social_signup'));


Route::post('user/challenges/join', array('uses' => 'UserController@ChallengeJoin'));
Route::post('user/challenges/paidjoin', array('uses' => 'UserController@paid_ChallengeJoin'));
Route::post('image/upload', array('uses' => 'UserController@ImageUpload'));
Route::post('image/submit', array('uses' => 'UserController@ImageSubmit'));
Route::post('friend/invite', array('uses' => 'UserController@Invite'));
Route::post('challenge/invite', array('uses' => 'UserController@addChallengeInvite'));

Route::post('upload_image', array('uses' => 'UserController@upload_image'));

Route::get('appnotifications', 'UserController@app_notifications');
Route::get('appnotifications/{nid}', 'UserController@app_notifications_status');


Route::post('reset_pass', array('uses' => 'UserController@reset_pass'));
Route::post('sendvc1', array('uses' => 'UserController@sendvc1'));
Route::post('sendvc12', array('uses' => 'UserController@sendvc12'));

Route::post('forgot_password', array('uses' => 'UserController@forgot_password'));

Route::post('image/get', array('uses' => 'UserController@getImage'));
Route::post('userpix/get', array('uses' => 'UserController@getPix'));
Route::post('userpix/getnowallet', array('uses' => 'UserController@getPixfree'));
Route::post('voting/set1', array('uses' => 'UserController@add_question'));
Route::post('voting/set', array('uses' => 'UserController@addVoting'));
Route::post('challenges/charge', array('uses' => 'UserController@Charge'));
Route::post('challenges/wand', array('uses' => 'UserController@Wand'));
Route::post('exposure/get', array('uses' => 'UserController@getExposure'));
Route::post('Boost/set', array('uses' => 'UserController@setBoost'));
Route::post('BoostSocial/set', array('uses' => 'UserController@setBoostSocial'));
Route::post('getfriendlist', array('uses' => 'UserController@getInvite'));
Route::post('getfriendlist1', array('uses' => 'UserController@getCInvite'));
Route::post('view/userpix', array('uses' => 'UserController@getUserpix'));
Route::post('withdraw_request', array('uses' => 'UserController@withdraw_request'));
Route::post('withdraw_note', array('uses' => 'AdminController@withdraw_note'));

Route::post('/allcharge', array('uses' => 'UserController@allcharge'));
Route::post('/allwand', array('uses' => 'UserController@allwand'));

//---------------------------country------------------------------------//
Route::get('/countries', array('uses' => 'UserController@countries'));
//---------------------------userpix_call------------------------------------//
Route::post('view/userpix', array('uses' => 'AdminController@getUserpix'));
Route::post('updateuserpix', array('uses' => 'AdminController@updateuserpix'));
Route::post('edituser', array('uses' => 'AdminController@edituser'));
Route::post('delete/images', array('uses' => 'UserController@Imagedelete'));

Route::post('user_token', array('uses' => 'UserController@user_token'));
Route::get('user_token_access/{uid}', array('uses' => 'UserController@user_token_access'));


// Route::post('shop/image', array('uses' => 'UserController@shopimage'));
Route::get('shop/image/{uid}/{page?}/{sort?}/{search?}', array('uses' => 'UserController@shopimage'));
Route::post('shop/cart', array('uses' => 'UserController@add_cart'));

Route::get('paypal/{amount}', 'PaymentController@payWithpaypal');
Route::get('paypal_status/{uid}/{amount}', 'PaymentController@getPaymentStatus');
Route::get('stripe/{uid}/{amount}', 'PaymentController@getstripeStatus');
//--------------------------------end----------------------------------------//

Route::post('/accept', array('uses' => 'UserController@bid_permission'));
Route::post('/report_permission', array('uses' => 'UserController@report_permission'));
Route::post('/report_permission1', array('uses' => 'UserController@report_permission1'));

//Route::get('getNotification', array('uses' => 'UserController@getNotification'));
Route::post('getNotification', 'UserController@getNotification');
Route::post('processNotification', array('uses' => 'UserController@processNotification'));
Route::post('invited_challenge_join', array('uses' => 'UserController@ivtChallengeJoin'));

Route::post('clearnotification', array('uses' => 'UserController@clearNotification'));


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


Route::get('admin/infoimages', 'AdminController@info_images');
Route::post('admin/upload_info_images', 'AdminController@upload_info_images');
Route::post('admin/update_info_order', 'AdminController@update_info_order');
Route::get('admin/detele_info_image/{image_id}', 'AdminController@detele_info_image');


Route::get('/best_images','UserController@best_images');
Route::get('admin/bestimages', 'AdminController@best_images');
Route::post('admin/upload_best_images', 'AdminController@upload_best_images');
Route::post('admin/update_best_order', 'AdminController@update_best_order');
Route::get('admin/detele_best_image/{image_id}', 'AdminController@detele_best_image');



// -------------pcs-----------------
Route::post('challenge_edit', array('uses' => 'AdminController@challenge_edit'));
// -------------pcs-----------------
Route::get('admin/challenge1', 'AdminController@challenge1');

Route::get('/bid_state', 'AdminController@bid_state');
Route::get('/bid_state1', 'AdminController@bid_state');

Route::get('/reports', 'AdminController@reports');
Route::get('/reports1', 'AdminController@reports1');

Route::get('admin/winner1', 'AdminController@winner1');
Route::get('admin/transaction', 'AdminController@transaction');
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
Route::get('/gallary_images','UserController@gallary_images');

Route::get('/invite/{uid}','UserController@getListInvite');
Route::get('/invite_sign_up/{cid}','UserController@invite_sign_up');
Route::get('/shop','UserController@init_shoppage');
Route::get('/shopdm','UserController@init_shoppagedm');
Route::get('/cart/{id}','UserController@cart');
Route::get('/balanceoverview/{uid}','UserController@account_setting');
Route::get('/myprofile/{uid}','UserController@my_profile');

Route::get('/u_transaction/{uid}','UserController@transaction');
Route::get('/DeletedPhoto/{id}','UserController@DeletedPhoto')->name('delete.image');

Route::get('/myphotos/{uid}','UserController@myphotos');
Route::get('/my_photos/{uid}','UserController@my_photos');
Route::get('/u_invitation/{uid}','UserController@user_invitaion');
Route::get('/bidding/{uid}','UserController@bidding');
Route::get('/cart_bid/{uid}','UserController@cart_bid');
Route::get('/notification','UserController@notification');
Route::get('/u_sponsorship/{uid}','UserController@user_sponsorship');
Route::get('/admin_profile','AdminController@admin_profile');
Route::get('/admin_profile1','AdminController@admin_profile1');
Route::get('/transferredlog','UserController@transferredlog');
Route::get('/php_info_test','UserController@php_info_test');
// Route::post('/myprofile','UserController@my_profile');
//-----------------------about_us------------------------
Route::get('/about_us','UserController@about_us');
Route::get('/info_page','UserController@info_page');
Route::get('/term_conditions','UserController@term_conditions');
Route::get('/privacy','UserController@privacy');
Route::get('/copyright','UserController@copyright');
Route::get('/portfolio/{iid}/{fid}','UserController@portfolio');
Route::get('/portfolio/search/new/{iid}/{fid}','UserController@PortfolioSearch');
Route::get('/portfolio/search/UserAll/profiles/{iid}/{fid}','PostController@PortfolioSearchUsers');

Route::post('like/portfolio/post','PostController@LikeImage');
Route::post('unlike/portfolio/post','PostController@UnLikeImage');

Route::get('user-with-id/{iid}/{fid}','PostController@PortfolioSearchUsersWithId');


//---------------------------end-----------------------------


Route::get('/withdraw_paypal/{type_name}','UserController@withraw_paypal');
Route::get('challenges/invite/{cid}/{uid}','UserController@challengInvite');
Route::get('/challenges/open/{cid}', 'UserController@OpenChallenges');
Route::get('/challenges/closed/{cid}', 'UserController@ClosedChallenges');
Route::get('/challenges/my/{cid}', 'UserController@MyChallenges');
Route::get('/GetOneChallege/my/{cid}/{uid}', 'UserController@GetOneChallege');

Route::get('/challenges/pass/{uid}', 'UserController@passChallenges');
Route::get('/challenges/voting/cid/{cid}/uid/{uid}', 'UserController@setVote');


Route::get('/challenges/votingdm/{cid}', 'UserController@setVotedm');
Route::post('/challenges/voting_pics/{cid}', 'UserController@voting_pics');
Route::get('/challenges/detail/{cid}', 'UserController@challengeDetail');
Route::get('/challenges/result/{cid}', 'UserController@challengeResult');
Route::get('/challenges/result_closed/{cid}', 'UserController@closed_challengeResult');
Route::get('/challenges/invited/{cid}', 'UserController@invitedChallenge');



    //New Routes Added By (A) The Coder;
	//Admin Posts
    Route::post('add-post/{id?}', 'PostController@save');
    Route::get('posts', 'PostController@index');
    Route::get('post-status/{id}/{status}', 'PostController@changeStatus');
    Route::get('delete-post/{id}', 'PostController@delete');
    Route::get('edit-post/{id}', 'PostController@edit');

    //User Posts
    Route::get('user-posts', 'PostController@getUserPosts');
    Route::get('get-post/{id}', 'PostController@getPost');

    //verify Code
    Route::post('verify-code', 'AuthController@verification');
    Route::post('resend-verify-code','AuthController@resendVerificationCode');

    //LikePost
    Route::post('like-post', 'PostController@likedPost');
    Route::post('delete-post/{id}', 'PostController@delete');
    Route::post('unlike-post', 'PostController@unlikePost');
    Route::post('like-comment', 'PostController@likeComment');
    Route::post('unlike-comment', 'PostController@unLikeComment');
    Route::post('add-comment-reply','PostController@addCommentReply');
    Route::post('add-report-post','PostController@createReport');
    Route::get('GetSocialComments/{postId}/{userId}','PostController@GetSocialComments');
    Route::get('sinlge-post','PostController@SinglePost');
    Route::get('removeImage/{id}','PostController@removeImage');
    //CommentPosts
    Route::post('add-comment','PostController@addComment');
    //Follower
    Route::post('followUser','PostController@followUser');
    Route::post('unfollowUser','PostController@unfollowUser');
    //Exhebition
    Route::post('exhibitionImageUpload','PostController@exhibitionImageUpload');
    Route::get('exhibitionImageGet','PostController@exhibitionImageGet');
    Route::post('editComment','PostController@editComment');
     Route::post('deleteComment','PostController@deleteComment');
     Route::get('checkForBanner','PostController@checkForBanner');
    Route::get('exhibitionWinners','PostController@exhibitionWinners');






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

// Route::get('/paypal',function(){
//     return view('paywithpaypal');
// });
// Route::get('/paypal', 'PaymentController@index');
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


Route::get('/orders_purchased/{uid}', 'UserController@orders_purchased');
Route::get('/orders_saled/{uid}', 'UserController@orders_saled');
Route::get('/order-details/{order_id}', 'UserController@order_details');

Route::get('/removeFcmToken/{id}','UserController@removeFcmToken');

//---------------------New Admin-------------------------
Route::get('/admin/login0',function(){
    return view('admin1/pages/login');
});
// Route::post('admin_login', array('uses' => 'AdminController@admin_login'));
Route::get('admin/view', 'AdminController@admin_view');

//------------------------end----------------------------



<?php

namespace App\Http\Controllers;
use App\Mail\InviteEmail;
use function foo\func;
use Mail;
use App\Mail\TestEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use DateTime;
use Carbon\Carbon;
use App\File;
use Illuminate\Http\Request;
use Request as rqest;
use Image;
use App\ujoinc;
use Illuminate\Support\Facades\File as LaraFile;
use App\appleid;
use Location;
use App\Follower;
use App\DeactiveRequest;
use App\Image as UserImage;
class UserController extends Controller
{
    public function __construct()
    {

   }
    public function account_setting($uid)
    {
        $data['u_image'] =DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data['balence'] =DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_profile'] =DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data['u_name'] =DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['deposit'] =DB::table('deposit')->where('user_id',$uid)->join('userpix','userpix.u-id','deposit.user_id')->get();
        $data['withdraw'] =DB::table('withdraw')->where('user_id',$uid)->get();
        return response()->json($data);
    }
    public function  bids_to_accept(){
        $data = Session::all();
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $seller_data = DB::table('bid')->where('seller_id',$data['id'])->get();
         return view('bids_to_accept',compact('seller_data','u_name'));

    }
    public function  bids_to_pay(){
        $data = Session::all();
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $buyer_data = DB::table('bid')->where('buyer_id',$data['id'])->where('state','Approve')->get();
         return view('bids_to_pay',compact('buyer_data','u_name'));

    }

    public function seller_approve_image(){
        $data=Input::all();
         DB::table('bid')
                ->where('id', $data['id'])
                ->update(['state' => $data['state']]);
        echo "success";
    }

    public function delete_cart_item($bid_id){
         DB::table('bid')
                ->where('id', $bid_id)
                ->delete();
        echo "success";
    }
     public function myphotos()
    {

        $uid        =$_COOKIE['id'];
        $u_profile  =DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name     =DB::table('users')->where('no',$uid)->pluck('name')[0];
        $images = DB::table('image')->where('u-id',$uid)
        ->join('users',function ($join){
            $join->on('users.no','image.u-id');
        })->orderBy('vote','desc')
        ->get();

        //return view('myphotos',compact('u_name','u_profile','images'));
        return response()->json($images);
    }
    public function my_photos($uid){

        $site_images = DB::table('image')->select('url','vote','id','c-id AS c_id')->where('u-id',$uid)
        ->join('users',function ($join){
            $join->on('users.no','image.u-id');
        })->orderBy('vote','desc')
        ->get();
        //return view('my_photo',['site_images' => $site_images, 'u_image' => $u_image , 'uid' => $uid]);
        return response()->json($site_images);
    }
     public function DeletedPhoto($id)
    {


        $images = @DB::table('image')->where('id',$id)->delete();
        // dd($images);
        // $images->delete();

        return response()->json(['success' =>true]);
    }
    public function my_profile($uid)
    {

        $data['u_profile']  =DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
         $data['password']  =DB::table('users')->where('no',$uid)->pluck('pass')[0];

        $data['cover_img']  =DB::table('users')->where('no',$uid)->pluck('cover_img')[0];
        $data['u_name']     =DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['u_age']      =DB::table('users')->where('no',$uid)->pluck('age')[0];
        $data['u_country']  =DB::table('users')->where('no',$uid)->pluck('country')[0];
        $data['u_city']     =DB::table('users')->where('no',$uid)->pluck('city')[0];
        $data['u_email']    =DB::table('users')->where('no',$uid)->pluck('email')[0];
        $data['u_pass']    =DB::table('users')->where('no',$uid)->pluck('pass')[0];
        $data['u_date']     =DB::table('users')->where('no',$uid)->pluck('register_date')[0];
        $data['about_user']     =DB::table('users')->where('no',$uid)->pluck('about_user')[0];
        $data['u_wallet']   =DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_Flip']     =DB::table('userpix')->where('u-id',$uid)->pluck('Flip')[0];
        $data['u_Charge']   =DB::table('userpix')->where('u-id',$uid)->pluck('Charge')[0];
        $data['u_Wand']     =DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
        $data['u_rank']     =DB::table('userpix')->where('u-id',$uid)->pluck('rank')[0];
        $data['u_pixpoint'] =DB::table('userpix')->where('u-id',$uid)->pluck('pixpoint')[0];
        $data['u_points'] =DB::table('userpix')->where('u-id',$uid)->pluck('Points')[0];





        return response()->json($data);
    }
    public function reset_pass(Request $request){
        $email=$request->email;
        $password=$request->password;
         DB::table('users')
                ->where('email', $email)
                ->update([
                    'pass' => $password,
                    'password'=>md5($password)
                ]);
        $this->response(1,"success",$email);
    }
    public function app_notifications()
    {
        $app_notifications = DB::table('app_notifications')->where('status', 0)->get();
        $this->response(200,"Successfull",$app_notifications);
    }
    public function app_notifications_status($nid)
    {
        DB::table('app_notifications')
                    ->where('id',$nid )
                    ->update(['status' =>'1' ]);
        $this->response(200,"Staus Updated successfull",'');
    }
    public function user_invitaion($uid)
    {
        $invitation=DB::table('invitation')->where('u_id',$uid)->join('users','users.no','invitation.u_id')->get();
        return response()->json($invitation);
    }
    public function bidding($uid)
    {
        $bid       =DB::table('bid')->where('seller_id',$uid)->get();
        return response()->json($bid);
    }
    public function cart_bid($uid)
    {
        // $bid=DB::table('bid')->where([['buyer_id',$uid],['state','Accepted'],['admin_approve','Accepted']])->join('image','image.id','bid.img_id')->get();
        $bid=DB::table('bid')->select('image.*','bid.*')->join('image','image.id','=','bid.img_id')->where([['bid.buyer_id',$uid],['bid.admin_approve','Accepted'],['bid.state','Accepted']])->get();

        return response()->json($bid);
    }
     public function user_sponsorship($uid)
    {
        $sponsor=DB::table('sponsor')->where('u_id',$uid)->join('users','users.no','sponsor.u_id')->get();
        return response()->json($sponsor);
    }
     public function notification()
    {

        $uid=$_COOKIE['id'];
        $u_profile=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $u_age=DB::table('users')->where('no',$uid)->pluck('age')[0];
        $u_country=DB::table('users')->where('no',$uid)->pluck('country')[0];
        $u_city=DB::table('users')->where('no',$uid)->pluck('city')[0];
        $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        $u_date=DB::table('users')->where('no',$uid)->pluck('register_date')[0];
        $u_wallet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $u_Flip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')[0];
        $u_Charge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')[0];
        $u_Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
        $u_rank=DB::table('userpix')->where('u-id',$uid)->pluck('rank')[0];
        $u_pixpoint=DB::table('userpix')->where('u-id',$uid)->pluck('pixpoint')[0];
        // $u_sponsor=DB::table('users')->where('no',$uid)->pluck('sponsor_email')[0];
        return view('notification',compact('u_name','u_email','u_date','u_wallet','u_Flip','u_Charge','u_Wand','u_profile','u_age','u_country','u_city','u_rank','u_pixpoint'));
    }

    public function withraw_paypal($type_name)
    {
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $balence1=DB::table('withdraw')->where([['user_id',$uid],['remark','Request']])->get();
        $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        if(count($balence1)>0){
            $sum=0;
            foreach($balence1 as $rows){
                $with=$rows->amount;
                $sum=$sum+$with;
            }
            $balence=$walet-$with;

        }
        else{
            $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            $balence=$walet;
        }
        $data['u_name'] = $u_name;
        $data['balence'] = $balence;
        $data['type_name'] = $type_name;
        return view('withdraw_paypal')->with($data);
    }
    // public function withraw_request()
    // {
    //     $uid=$_COOKIE['id'];
    //     $balence=DB::table('withdraw')->where('user_id',$uid)->orderBy('id','DESC')->pluck('after')[0];
    //     return view('withdraw_paypal',compact('balence'));
    // }

    public function show($id)
    {
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $user = DB::table('users')->where('no', '1')->first();
        return view('user.profile',['data'=> $user,'u_name'=>$u_name]);
    }
    public function response($state, $message, $data){
        $senddate['state']=$state;
        $senddate['message']=$message;
        $senddate['data']=$data;
        print_r(json_encode($senddate));
    }


    public function transferredlog()
    {
        $uid=$_COOKIE['id'];
        $balence=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $u_profile=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        return view('transferredlog',compact('balence','u_profile','u_name'));
    }

    public function orders_purchased($uid)
    {
        $data['balence']=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_profile']=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data['u_name']=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['OrdersDetail'] =DB::table('order_main')->where('buyer_id',$uid)->orderBy('order_id','desc')->get();
        // dd($OrdersDetail);
        $data['num']  = count($data['OrdersDetail']);
        // return view('Admin.OrdersDetail',compact('OrdersDetail','num','a_name','a_image'));
        return response()->json($data);
    }
    public function orders_saled($uid)
    {

        $data['balence']=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_profile']=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data['u_name']=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['OrdersDetail'] =DB::table('order_main')
        ->join('order_detail','order_main.order_id','=','order_detail.order_id')
        ->join('image', 'image.id', '=', 'order_detail.product_id')
        ->join('users', 'users.no', '=', 'image.u-id')
        ->where('users.no',$uid)
        ->orderBy('order_main.order_id','desc')->get();
        $data['num']      =count($data['OrdersDetail']);
        return response()->json($data);
    }

    public function order_details($order_id)
    {
        $uid=$_COOKIE['id'];
        $balence=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $u_profile=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $order_main =DB::table('order_main')->where('order_id',$order_id)->get();
        $order_detail =DB::table('order_detail')
        ->join('image', 'image.id', '=', 'order_detail.product_id')
        ->join('users', 'users.no', '=', 'image.u-id')
        ->where('order_id',$order_id)->get();
        return view('order_details',compact('balence','u_profile','u_name','order_main','order_detail'));
    }
    // public function usersignup(){
    //     $data=Input::all();
    //     $email=$data['email'];
    //     $age=$data['age'];
    //     $user = DB::table('users')->where([['email', $email],['vc','true']])->first();

    //     //$this->response(200,'test',$user);
    //     if($user || $age<18){
    //         $this->response(200,"Invalid email or password",NULL);
    //     }
    //     else{
    //         $vc=DB::table('users')->where('email',$email)->value('vc');
    //         if($vc==$data['vc']){
    //             DB::table('users')
    //                 ->where('email',$email )
    //                 ->update(['vc' =>'true' ]);

    //             //$this->sendemail($email,$vc);
    //             //Mail::to('jackfrank613@gmail.com')->send(new TestEmail($data,"Hi! this is Verification Code."));
    //         //     $uid=DB::table('users')->where('email',$email)->pluck('no');
    //         //     $inserarr=[
    //         //         'u-id'=>$uid[0],
    //         //   ];
    //         //     DB::table('userpix')->insert($inserarr);
    //             $this->response(1,"Successful Sign up",$uid);
    //         }
    //         else{
    //             Mail::to($email)->send(new TestEmail($vc,"Hi! this is Verification Code."));
    //             $this->response(200,"Invalid verification code!",$email);
    //         }

    //     }
    // }

    public function usersignup(Request $request){
        $email=$request->email;
        $password=$request->password;
        $vc1=$request->vc;

            $user = DB :: table('users') ->where([['email',$email],['password' ,md5($password)]])->first();
            $vc=DB::table('users')->where('email',$email)->value('verifyc_code');
            if($vc == $vc1){
                DB::table('users')
                    ->where('email',$email )
                    ->update(['vc' =>'true' ]);

                Session::put($email, md5($email));
                Session::put('id',$user->no);
                Session::put('login_flag','login');

                $this->response(1,"Success Sign up",$user);
            }
            else{
                $this->response(200,"Invalid verification code!",$email);
            }
    }

    public function usersignin(Request $request){
        $email=$request->email;
        $password=$request->password;

       $user = DB :: table('users') ->where([['email',$email],['password' ,md5($password)]])->orwhere([['no',$email],['password' ,md5($password)]])->first();
        if($user){
        $user1 = @DB::table('users')->where([['email', $email],['password',md5($password)],['permission','<>','0']])->orwhere([['no', $email],['password',md5($password)],['permission','<>','0']])->first();
            if($user1){
                Session::put($email, md5($email));
                Session::put('id',$user->no);
                Session::put('name',$user->name);
                Session::put('login_flag','login');
                $this->response(1,'Success Login',$user);
            }else{
                $this->response(400,"Please signin with your verification code.",NULL);
            }
        }else{
             $this->response(200,"Invalid email or password",NULL);
        }
    }
    public function socail_signin(Request $request){
        $email=$request->email;

        $user = DB :: table('users') ->where([['email',$email]])->first();
        if($user){
            $user1 = DB::table('users')->where([['email', $email],['vc','true']])->first();
            if($user1){
                Session::put($email, md5($email));
                Session::put('id',$user->no);
                Session::put('name',$user->name);
                Session::put('login_flag','login');
                $this->response(1,'Success Login',$user);
            }else{
                $this->response(400,"Please signin with your verification code.",NULL);
            }
        }else{
             $this->response(200,"Please provide a valid email id",NULL);
        }
    }


    public function logincheck(){
        $data=Input::all();
        $email=$data['email'];
        if (Session::get($email)==md5($email)){
            $this->response(1,'already login','');
            //return redirect('test1');
            //return view('welcome');
        }else{
            $this->response(200,'sign please','test1');
            //return redirect('landing');
        }

    }

    public function sendvc(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $email=$data['email'];
        // $sponsor_email=$data['sponsor_email'];
        $name=$data['name'];
        $age=$data['age'];
        $country=$data['country'];
        $city=$data['city'];
        $password=$data['password'];
        $mobile_number=$data['mobile_number'];
        //$vc=$data['vc'];
        $user = DB::table('users')->where([['email', $email],['vc','true']])->first();

        //$this->response(200,'test',$user);
        if($user){
            $this->response(200,'Email in use',NULL);
        }
        elseif($age<18){
            $this->response(202,'The age must be more than 18',NULL);
        }
        else{
            $user1 = DB::table('users')->where('email', $email)->first();
            $vc='true'/*rand(100000,999999)*/;
            if ($user1){
                DB::table('users')
                    ->where('email',$email )
                    ->update(['vc' =>$vc ]);
                //$this->sendemail($email,$vc);
                //Mail::to($email)->send(new TestEmail($vc,"Hi! this is Verification Code."));

                $this->response(1,"Sent VC to email again",NULL);
            }
            else{
                $inserarr=[
                    'name'=>$name,
                    'age'=>$age,
                    'country'=>$country,
                    'city'=>$city,
                    'email'=>$email,
                    'password'=>md5($password),
                    'pass'=>$password,
                    'mobilenum'=>$mobile_number,
                    'vc'=>$vc
                ];
                DB::table('users')->insert($inserarr);
                $uid=DB::table('users')->where('email',$email)->pluck('no');
                $inserarr=[
                    'u-id'=>$uid[0]
                ];
                DB::table('userpix')->insert($inserarr);
                DB::table('userpix')->where('u-id',$uid[0])->update([
                    'Flip'=>5,
                    'Charge'=>5,
                    'Wand'=>5
                    ]);

//--------------------add_invite_walet-----------------------//

                //     $s_id1=DB::table('users')->where('email',$sponsor_email)->pluck('no');
                //     if(count($s_id1)>0){
                //     $s_id=DB::table('users')->where('email',$sponsor_email)->pluck('no')[0];
                //     $check_invite=DB::table('invite')->where([['user_id',$s_id],['friend_email',$email]])->get();
                //         if(count($check_invite)>0){
                //           $walet0=DB::table('userpix')->where('u-id',$s_id)->pluck('walet')[0];
                //             $walet=$walet0+0.05;
                //                 DB::table('userpix')->where('u-id',$s_id)->update([
                //                 'walet'=>$walet
                //             ]);
                //             DB::table('invite')
                //               ->where([['user_id',$s_id],['friend_email',$email]])
                //               ->update(['state' => 'join']);

                //             $inserarr=[
                //                 'u_id'=>$s_id,
                //                 'amount'=>0.05,
                //                 'friend_email1'=>$email
                //             ];
                //             DB::table('invitation')->insert($inserarr);

                //             $s_invite=DB::table('invite')->where('friend_email',$sponsor_email)->get();
                //             if(count($s_invite)>0){
                //                 $s_invite_id=DB::table('invite')->where('friend_email',$sponsor_email)->pluck('user_id')[0];
                //                 $walet10=DB::table('userpix')->where('u-id',$s_invite_id)->pluck('walet')[0];
                //                 $walet1=$walet10+0.02;
                //                 DB::table('userpix')->where('u-id',$s_invite_id)->update([
                //                     'walet'=>$walet1
                //                 ]);
                //                 $inserarr=[
                //                     'u_id'=>$s_invite_id,
                //                     'amount'=>0.02,
                //                     'friend_email1'=>$email,
                //                     'friend_email2'=>$sponsor_email
                //                 ];
                //                 DB::table('invitation')->insert($inserarr);
                //             }
                //         }
                //     }
                // }
                $invite_user_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id');
                if(count($invite_user_id)>0)
                {
                        $invite_user_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
                         DB::table('invite')
                          ->where('friend_email',$email)
                          ->update(['state' => 'join']);

                        $walet0=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('walet')[0];

                            $inserarr=[
                                'u_id'=>$invite_user_id,
                                'amount'=>0.1,
                                'friend_email1'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);

                        $walet=$walet0+0.1;
                        DB::table('userpix')
                            ->where('u-id',$invite_user_id)
                            ->update(['walet'=>$walet]);

                        $u_email=DB::table('users')->where('no',$invite_user_id)->pluck('email')[0];
                        $t_id=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('no')[0];
                        $userData = User::find($uid);
                        $date=Carbon::now();

                        $inserarr = [
                            'u_email' => $u_email,
                            't_id' => $t_id,
                            'n_type'=>'userpix_show',
                            'n_date'=>$date,
                            'state'=>'new',
                            'msg'=>'Your friend '.$email.' is joined by your invitation. So you got $0.10 from invitation system!'
                        ];
                        DB::table('note')->insert($inserarr);
                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' is joined by your invitation. So you got $0.10 from invitation system!');
                        $user2_check=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id');
                        if(count($user2_check)>0)
                        {
                        $user2_id=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id')[0];
                            $inserarr=[
                                'u_id'=>$user2_id,
                                'amount'=>0.02,
                                'friend_email1'=>$u_email,
                                'friend_email2'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);
                            $walet0=DB::table('userpix')->where('u-id',$user2_id)->pluck('walet')[0];
                            $walet=$walet0+0.02;
                            DB::table('userpix')
                                ->where('u-id',$user2_id)
                                ->update(['walet'=>$walet]);


                            $u_email1=DB::table('users')->where('no',$user2_id)->pluck('email')[0];
                            $t_id=DB::table('userpix')->where('u-id',$user2_id)->pluck('no')[0];
                            $date=Carbon::now();

                            $inserarr = [
                                'u_email' => $u_email1,
                                't_id' => $t_id,
                                'n_type'=>'userpix_show',
                                'n_date'=>$date,
                                'state'=>'new',
                                'msg'=>'Your friend '.$email.' is joined by your friends invitation. So you got $0.02 from invitation system!'
                            ];
                            DB::table('note')->insert($inserarr);

                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' is joined by your friends invitation. So you got $0.02 from invitation system!');

                    }
                }

//-------------------------- add_invite_end-----------------------------------//

                $this->response(1,"Successful Sign up",$uid);
                //Mail::to($email)->send(new TestEmail($vc,"Hi! this is Verification Code."));
                // $this->response(1,/*"Sent VC to email"*/'Success sign up',NULL);
            }
        }
    }
    public function social_signup(Request $request){
        $email = $request->email;
        $name = $request->name;
        $user = DB::table('users')->where([['email', $email]])->first();
        if($user){
            // $this->response(200,'user login successfully',$user);
             $response = ['success'=>true, 'data'=>$user];
                 return response()->json($response, 200);
        }
        else{
             $inserarr=[
                'name'=>$name,
                'email'=>$email,
                'password'=>md5('a1s4e24r'),
                'pass'=>'a1s4e24r',
                'vc'=>'true'
            ];
            DB::table('users')->insert($inserarr);

            $uid=DB::table('users')->where('email',$email)->pluck('no');
                $inserarr=[
                    'u-id'=>$uid[0]
                ];
                DB::table('userpix')->insert($inserarr);

                $s_flip=DB::table('setting')->where('id',1)->pluck('s_flip')[0];
                $s_wand=DB::table('setting')->where('id',1)->pluck('s_wand')[0];
                $s_charge=DB::table('setting')->where('id',1)->pluck('s_charge')[0];

                DB::table('userpix')->where('u-id',$uid[0])->update([
                    'Flip'=>$s_flip,
                    'Charge'=>$s_wand,
                    'Wand'=>$s_charge
                    ]);

                $date=Carbon::now();
                $invite_user_id_arry=DB::table('invite')->where('friend_email',$email)->pluck('user_id');
                $invite_user_id = count($invite_user_id_arry);
                if ($invite_user_id <= 0) {
                    if(isset($data['refer_id'])){
                        $invite_id = [
                            'user_id' => $data['refer_id'],
                            'friend_email' => $email,
                            'datetime' => $date
                        ];
                        DB::table('invite')->insert($invite_id);
                        $invite_user_id = DB::getPdo()->lastInsertId();
                    }
                }

                if($invite_user_id>0)
                {
                        if(isset($data['refer_id'])){
                            $invite_user_id = $data['refer_id'];
                            DB::table('invite')
                          ->where([['user_id',$data['refer_id']],['friend_email',$email]])
                          ->update(['state' => 'join']);
                        }
                        else{
                        $invite_user_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
                         DB::table('invite')
                          ->where('friend_email',$email)
                          ->update(['state' => 'join']);
                        }

                        DB::table('userpix')->where('u-id',$uid[0])->update([
                        'walet'=>0.10
                        ]);

                        $walet0=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('walet')[0];

                            $inserarr=[
                                'u_id'=>$invite_user_id,
                                'amount'=>0.1,
                                'friend_email1'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);

                        $ia_price =DB::table('setting')->where('id',1)->pluck('ia_price')[0];
                        $walet=$walet0+$ia_price;
                        DB::table('userpix')
                            ->where('u-id',$invite_user_id)
                            ->update(['walet'=>$walet]);

                        $u_email=DB::table('users')->where('no',$invite_user_id)->pluck('email')[0];
                        $t_id=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('no')[0];
                        $date=Carbon::now();
                        $userData = User::find($uid);
                        $inserarr = [
                            'u_email' => $u_email,
                            't_id' => $t_id,
                            'n_type'=>'userpix_show',
                            'n_date'=>$date,
                            'state'=>'new',
                            'msg'=>'Your friend '.$email.' is joined by your invitation. So you got $'.$ia_price.' from invitation system!'
                        ];
                        DB::table('note')->insert($inserarr);
                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' is joined by your friends invitation. So you got $0.02 from invitation system!');

                        $user2_check=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id');
                        if(count($user2_check)>0)
                        {
                        $user2_id=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id')[0];
                            $inserarr=[
                                'u_id'=>$user2_id,
                                'amount'=>0.05,
                                'friend_email1'=>$u_email,
                                'friend_email2'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);
                            $walet0=DB::table('userpix')->where('u-id',$user2_id)->pluck('walet')[0];
                            $ib_price=DB::table('setting')->where('id',1)->pluck('ib_price')[0];
                            $walet=$walet0+$ib_price;
                            DB::table('userpix')
                                ->where('u-id',$user2_id)
                                ->update(['walet'=>$walet]);


                            $u_email1=DB::table('users')->where('no',$user2_id)->pluck('email')[0];
                            $t_id=DB::table('userpix')->where('u-id',$user2_id)->pluck('no')[0];
                            $date=Carbon::now();

                            $inserarr = [
                                'u_email' => $u_email1,
                                't_id' => $t_id,
                                'n_type'=>'userpix_show',
                                'n_date'=>$date,
                                'state'=>'new',
                                'msg'=>'Your friend '.$email.' is joined by your friends invitation. So you got $'.$ib_price.' from invitation system!'
                            ];
                            DB::table('note')->insert($inserarr);
                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' is joined by your friends invitation. So you got $'.$ib_price.' from invitation system!');

                    }
                }




            $to = $email;
            $subject = "Urpixpays New Account";
            $txt = "Your account is successfully registered under the email address ".$email."  and password is a1s4e24r \n\n\n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
            $headers = "From: urpixpays@gmail.com" . "\r\n";

            mail($to,$subject,$txt,$headers);
            // $this->response(1,"Sign up successfull",NULL);
            $user = DB::table('users')->where([['email', $email]])->first();
              $response = ['success'=>true, 'data'=>$user];
                 return response()->json($response, 404);
        }

    }
    public function sendvc1(Request $request){




        //validate the info, create rules for the inputs
        $data=Input::all();
        $email=$request->email;
        $name=$request->name;
        $age=$request->age;
        $country=$request->country;
        $city=$request->city;
        $password=$request->password;
        $mobile_number=$request->mobile_number;



        //$vc=$data['vc'];
        $user = DB::table('users')->where([['email', $email],['vc','true']])->first();
        //$this->response(200,'test',$user);
        if($user){
            $this->response(200,'Email in use',NULL);
        }
        elseif($age<18){
            $this->response(202,'The age must be more than 18',NULL);
        }
        else{
            $user1 = DB::table('users')->where('email', $email)->first();
            //$user1 = false;
            //$vc='true'/*rand(100000,999999)*/;
            $verify=rand(100000,999999);
            if ($user1){
                  @DB::table('users')
                    ->where('email',$email )
                    ->update(['verifyc_code' =>$verify]);

                    $to = $email;
                    $subject = "Urpixpays Verification Code";
                    $txt = "Dear Urpixpays User,\n This email address is being used to sign up on https://urpixpays.com.\n If you signed up, it is asking you to enter the numeric verification code below.\n Your verification code is ".$verify." \n\n\n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                    $headers = "From: urpixpays@gmail.com" . "\r\n";

                    mail($to,$subject,$txt,$headers);
                         $this->response(200,'Sent VC to email again',NULL);
            }
            else{
                $inserarr=[
                    'name'=>$name,
                    'age1'=>$age,
                    'country'=>$country,
                    'city'=>$city,
                    'email'=>$email,
                    'password'=>md5($password),
                    'pass'=>$password,
                    'mobilenum'=>$mobile_number,
                    'verifyc_code'=>$verify,
                    'vc'=>true
                ];
                DB::table('users')->insert($inserarr);
                $uid=DB::table('users')->where('email',$email)->pluck('no');
                $inserarr=[
                    'u-id'=>$uid[0]
                ];
                DB::table('userpix')->insert($inserarr);

                $s_flip=DB::table('setting')->where('id',1)->pluck('s_flip')[0];
                $s_wand=DB::table('setting')->where('id',1)->pluck('s_wand')[0];
                $s_charge=DB::table('setting')->where('id',1)->pluck('s_charge')[0];

                DB::table('userpix')->where('u-id',$uid[0])->update([
                    'Flip'=>$s_flip,
                    'Charge'=>$s_wand,
                    'Wand'=>$s_charge
                    ]);

                $date=Carbon::now();
                $invite_user_id_arry=DB::table('invite')->where('friend_email',$email)->pluck('user_id');
                $invite_user_id = count($invite_user_id_arry);
                if ($invite_user_id <= 0) {
                    if(isset($data['refer_id'])){
                        $invite_id = [
                            'user_id' => $data['refer_id'],
                            'friend_email' => $email,
                            'datetime' => $date
                        ];
                        DB::table('invite')->insert($invite_id);
                        $invite_user_id = DB::getPdo()->lastInsertId();
                    }
                }

                if($invite_user_id>0)
                {
                        if(isset($data['refer_id'])){
                            $invite_user_id = $data['refer_id'];
                            DB::table('invite')
                          ->where([['user_id',$data['refer_id']],['friend_email',$email]])
                          ->update(['state' => 'join']);
                        }
                        else{
                        $invite_user_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
                         DB::table('invite')
                          ->where('friend_email',$email)
                          ->update(['state' => 'join']);
                        }

                        DB::table('userpix')->where('u-id',$uid[0])->update([
                        'walet'=>0.10
                        ]);

                        $walet0=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('walet')[0];

                            $inserarr=[
                                'u_id'=>$invite_user_id,
                                'amount'=>0.1,
                                'friend_email1'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);

                        $ia_price =DB::table('setting')->where('id',1)->pluck('ia_price')[0];
                        $walet=$walet0+$ia_price;
                        // DB::table('userpix')
                        //     ->where('u-id',$invite_user_id)
                        //     ->update(['walet'=>$walet]);
                          DB::table('userpix')
                       ->where('u-id',$invite_user_id)
                       ->update([
                           'Flip' => DB::raw('Flip + 5'),
                           'Charge' => DB::raw('Charge + 5'),
                           'Wand' => DB::raw('Wand + 5'),
                       ]);


                        $u_email=DB::table('users')->where('no',$invite_user_id)->pluck('email')[0];
                        $t_id=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('no')[0];
                        $date=Carbon::now();
                        $userData = User::find($uid);
                        $inserarr = [
                            'u_email' => $u_email,
                            't_id' => $t_id,
                            'n_type'=>'userpix_show',
                            'n_date'=>$date,
                            'state'=>'new',
                            'msg'=>'Your friend '.$email.' has joined through your invitation. You have received $'.$ia_price.' in your wallet.'
                        ];
                        DB::table('note')->insert($inserarr);
                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' has joined through your invitation. You have received $'.$ia_price.' in your wallet.');

                        $user2_check=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id');
                        if(count($user2_check)>0)
                        {
                        $user2_id=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id')[0];
                            $inserarr=[
                                'u_id'=>$user2_id,
                                'amount'=>0.05,
                                'friend_email1'=>$u_email,
                                'friend_email2'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);
                            $walet0=DB::table('userpix')->where('u-id',$user2_id)->pluck('walet')[0];
                            $ib_price=DB::table('setting')->where('id',1)->pluck('ib_price')[0];
                            $walet=$walet0+$ib_price;
                              DB::table('userpix')
                           ->where('u-id',$user2_id)
                           ->update([
                               'Flip' => DB::raw('Flip + 2'),
                               'Charge' => DB::raw('Charge + 2'),
                               'Wand' => DB::raw('Wand + 2'),
                           ]);

                            $u_email1=DB::table('users')->where('no',$user2_id)->pluck('email')[0];
                            $t_id=DB::table('userpix')->where('u-id',$user2_id)->pluck('no')[0];
                            $date=Carbon::now();

                            $inserarr = [
                                'u_email' => $u_email1,
                                't_id' => $t_id,
                                'n_type'=>'userpix_show',
                                'n_date'=>$date,
                                'state'=>'new',
                                'msg'=>'Your friend '.$email.' has joined through your invitation. You have received $'.$ib_price.' in your wallet.'
                            ];
                            DB::table('note')->insert($inserarr);
                        self::sendNotification($userData->token,'UrPixPays','Your friend '.$email.' has joined through your invitation. You have received $'.$ib_price.' in your wallet.');

                    }
                }

              $userData=DB::table('users')->where('email',$email)->first();
              @DB::table('users')
                    ->where('email',$email )
                    ->update(['verifyc_code' =>$verify]);

                    $to = $email;
                    $subject = "Urpixpays Verification Code";
                    $txt = "Dear Urpixpays User,\n This email address is being used to sign up on https://urpixpays.com.\n If you signed up, it is asking you to enter the numeric verification code below.\n Your verification code is ".$verify." \n\n\n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                    $headers = "From: urpixpays@gmail.com" . "\r\n";

                    mail($to,$subject,$txt,$headers);

                    $this->response(1,"Sent VC to email",$userData);
            }
        }
    }

    public function sendvc12(Request $request){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $email=$request->email;
        $name=$request->name;
        $age=$request->age;
        $country=$request->country;
        $city=$request->city;
        $password=$request->password;
        $mobile_number=$request->mobile_number;
        //$vc=$data['vc'];
        $user = DB::table('users')->where([['email', $email],['vc','true']])->first();
        //$this->response(200,'test',$user);
        if($user){
            $this->response(200,'Email in use',NULL);
        }
        elseif($age<18){
            $this->response(202,'The age must be more than 18',NULL);
        }
        else{
            $user1 = DB::table('users')->where('email', $email)->first();
            //$user1 = false;
            //$vc='true'/*rand(100000,999999)*/;
            $verify=rand(100000,999999);


                $inserarr=[
                    'name'=>$name,
                    'age'=>$age,
                    'country'=>$country,
                    'city'=>$city,
                    'email'=>$email,
                    'password'=>md5($password),
                    'pass'=>$password,
                    'mobilenum'=>$mobile_number,
                    'verifyc_code'=>$verify
                ];
                DB::table('users')->insert($inserarr);
                $uid=DB::table('users')->where('email',$email)->pluck('no');
                $inserarr=[
                    'u-id'=>$uid[0]
                ];
                DB::table('userpix')->insert($inserarr);

                $s_flip=DB::table('setting')->where('id',1)->pluck('s_flip')[0];
                $s_wand=DB::table('setting')->where('id',1)->pluck('s_wand')[0];
                $s_charge=DB::table('setting')->where('id',1)->pluck('s_charge')[0];

                DB::table('userpix')->where('u-id',$uid[0])->update([
                    'Flip'=>$s_flip,
                    'Charge'=>$s_wand,
                    'Wand'=>$s_charge
                    ]);

                $date=Carbon::now();
                $invite_user_id_arry=DB::table('invite')->where('friend_email',$email)->pluck('user_id');
                $invite_user_id = count($invite_user_id_arry);
                if ($invite_user_id <= 0) {
                    if(isset($data['refer_id'])){
                        $invite_id = [
                            'user_id' => $data['refer_id'],
                            'friend_email' => $email,
                            'datetime' => $date
                        ];
                        DB::table('invite')->insert($invite_id);
                        $invite_user_id = DB::getPdo()->lastInsertId();
                    }
                }

                if($invite_user_id>0)
                {
                        if(isset($data['refer_id'])){
                            $invite_user_id = $data['refer_id'];
                            DB::table('invite')
                          ->where([['user_id',$data['refer_id']],['friend_email',$email]])
                          ->update(['state' => 'join']);
                        }
                        else{
                        $invite_user_id=DB::table('invite')->where('friend_email',$email)->pluck('user_id')[0];
                         DB::table('invite')
                          ->where('friend_email',$email)
                          ->update(['state' => 'join']);
                        }

                        DB::table('userpix')->where('u-id',$uid[0])->update([
                        'walet'=>0.10
                        ]);

                        $walet0=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('walet')[0];

                            $inserarr=[
                                'u_id'=>$invite_user_id,
                                'amount'=>0.1,
                                'friend_email1'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);

                        $ia_price =DB::table('setting')->where('id',1)->pluck('ia_price')[0];
                        $walet=$walet0+$ia_price;
                        DB::table('userpix')
                            ->where('u-id',$invite_user_id)
                            ->update(['walet'=>$walet]);

                        $u_email=DB::table('users')->where('no',$invite_user_id)->pluck('email')[0];
                        $t_id=DB::table('userpix')->where('u-id',$invite_user_id)->pluck('no')[0];
                        $date=Carbon::now();

                        $inserarr = [
                            'u_email' => $u_email,
                            't_id' => $t_id,
                            'n_type'=>'userpix_show',
                            'n_date'=>$date,
                            'state'=>'new',
                            'msg'=>'Your friend '.$email.' is joined by your invitation. So you got $'.$ia_price.' from invitation system!'
                        ];
                        DB::table('note')->insert($inserarr);

                        $user2_check=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id');
                        if(count($user2_check)>0)
                        {
                        $user2_id=DB::table('invite')->where('friend_email',$u_email)->pluck('user_id')[0];
                            $inserarr=[
                                'u_id'=>$user2_id,
                                'amount'=>0.05,
                                'friend_email1'=>$u_email,
                                'friend_email2'=>$email
                            ];
                            DB::table('invitation')->insert($inserarr);
                            $walet0=DB::table('userpix')->where('u-id',$user2_id)->pluck('walet')[0];
                            $ib_price=DB::table('setting')->where('id',1)->pluck('ib_price')[0];
                            $walet=$walet0+$ib_price;
                            DB::table('userpix')
                                ->where('u-id',$user2_id)
                                ->update(['walet'=>$walet]);


                            $u_email1=DB::table('users')->where('no',$user2_id)->pluck('email')[0];
                            $t_id=DB::table('userpix')->where('u-id',$user2_id)->pluck('no')[0];
                            $date=Carbon::now();

                            $inserarr = [
                                'u_email' => $u_email1,
                                't_id' => $t_id,
                                'n_type'=>'userpix_show',
                                'n_date'=>$date,
                                'state'=>'new',
                                'msg'=>'Your friend '.$email.' is joined by your friends invitation. So you got $'.$ib_price.' from invitation system!'
                            ];
                            DB::table('note')->insert($inserarr);
                    }
                }

              $userData=DB::table('users')->where('email',$email)->first();

                // Mail::to($email)->send(new TestEmail($verify,"Hi! Welcome to visit urpixpays.com! This is your Verification Code."));

                $this->response(1,"Sent VC to email",$userData);

        }
    }


    public function forgot_password(Request $request){
        $email=$request->email;

        $user = DB :: table('users') ->where([['email',$email]])->first();
        if($user){
            $password=DB::table('users')->where('email',$email)->pluck('pass')[0];
            if($password){

                $to = $email;
                $subject = "Forgot Password";
                   $txt =  "Dear ".$user->name."  \n\nYour UrPixPays password is ".$password." \n\n\n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                $headers = "From: urpixpays@gmail.com" . "\r\n" .
                "info@urpixpays.com";

                mail($to,$subject,$txt,$headers);

                $this->response(1,"Sent password to email. Please signin with your correct password.",NULL);
            }else{
                $verify=rand(10000000,99999999);

                DB::table('users')->where('email',$email)->update([
                    'pass'=>$verify,
                    'password'=>md5($verify)
                ]);

                $to = $email;
                $subject = "Forgot Password";
                $txt = "";
                $txt =  "Dear ".$user->name."  \n\nYour UrPixPays password is ".$verify." \n\n\n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                $headers = "From: urpixpays@gmail.com" . "\r\n" .
                "info@urpixpays.com";

                mail($to,$subject,$txt,$headers);

                $this->response(1,"Sent password to email. Please signin with your correct password.",NULL);
            }
        }else{
             $this->response(200,"Invalid email",NULL);
        }
    }

    public function about_us(){
        $uid=$_COOKIE['id'];
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        return view('about_us',['u_image'=>$u_image]);
    }
    public function info_page(){
        $site_images=DB::table('info_images')->orderBy('imgorder', 'ASC')->get();
        return response()->json($site_images, 200);
    }

    public function best_images(){

        $site_images=DB::table('best_images')->orderBy('imgorder', 'ASC')->get();
        return response()->json($site_images, 200);
        //return $site_images;
    }

    public function privacy(){
        if(isset($_COOKIE['id'])){
            $uid=$_COOKIE['id'];
            $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
            $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
            return view('privacy',compact('u_image'));
        }else{
        return view('privacy');
        }

    }
    public function copyright(){
        if(isset($_COOKIE['id'])){
            $uid=$_COOKIE['id'];
            $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
            $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
            return view('copyright',compact('u_image'));
        }else{
        return view('copyright');
        }
    }
    public function term_conditions(){

        $u_image = '';
        return view('term_conditions',['u_image'=>$u_image]);
    }
    public function OpenChallenges($uid)
    {
        $joinc=DB::table('ujoinc')
            ->where('u-id',$uid)
            ->select('c-id')
            ->pluck('c-id');

        $data['challenge'] = $data['challenge'] = DB::table('challenge')->select('challenge.id','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.paid','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')
            ->whereNotIn('id',$joinc)
            ->where('state','start')
            ->get();

        return response()->json($data);
    }
    public function ClosedChallenges($uid){
        $joinc=DB::table('ujoinc')
            ->where('u-id',$uid)
            ->select('c-id')
            ->pluck('c-id');
        // $challenge = DB::table('challenge')
        //     ->whereIn('id',$joinc)
        //     ->where('state','closed')
        //     ->join('users','users.no','challenge.u-id')
        //     ->get();
        $data['challenge'] = $data['challenge'] = DB::table('challenge')->select('challenge.id','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')
            ->where('state','ended')
            ->get();
        return response()->json($data);
    }

    public function closed_challengeResult($cid){
        // $image = DB::table('image')->where([['u-id', $uid],['c-id',$cid]])->get();
        $challenge=DB::table('challenge')
            ->join('users',function ($join){
                $join->on('users.no','challenge.u-id');
            })
            ->where('id',$cid)->first();
        $rank=DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where('ujoinc.c-id',$cid)
            ->orderBy('rank','asc')
            ->get();
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $myrank=DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where([['ujoinc.c-id',$cid],['ujoinc.u-id',$uid]])
            ->first();

        return view('challenges.closed_challenge',['data'=> $challenge,'rank'=>$rank,'myrank'=>$myrank,'u_image'=>$u_image,'u_name' => $u_name]);
    }
//     public function MyChallenges()
//     {
// //        Session::forget('login_flag');
//         if (Session::get('login_flag')!='login') return redirect('landing');
//         $uid=$_COOKIE['id'];
//         $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
//         $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
//         $joinc=DB::table('ujoinc')->where('u-id',$uid)->select('c-id')->pluck('c-id');


//         $challenge = DB::table('challenge')->whereIn('id',$joinc)
//             ->where('state','start')->join('users','users.no','challenge.u-id')->get();

//         $userpix=DB::table('userpix')->where('u-id',$uid)->first();
//         return view('challenges.mychallenges',['data'=> $challenge,'userpix'=>$userpix,'u_image'=>$u_image,'u_name' =>$u_name]);
//     }
    public function MyChallenges($uid)
    {
        $images = [];
        $vote_sum = [];
        $exposure = [];
        $wandexposure = [];
        $data['u_name']=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['u_wallet']=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_image']=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $joinc=DB::table('ujoinc')->where('u-id',$uid)->select('c-id')->pluck('c-id');


        $data['challenge'] = DB::table('challenge')->select('challenge.id','challenge.s_name','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')
        ->whereIn('id',$joinc)
            ->where('state','start')->get();
        // $result = json_decode($challenge, true);
        // print_r($result);
        // exit();
        foreach ($data['challenge'] as $key => $c_id) {
            $imagearray = DB::table('image')->select('id','url','vote')->where([['u-id', $uid],['c-id',$c_id->id],['url','<>', Null]])->get();
            $c_id->image = (object)array("image"=>$imagearray);

            $vote_sum = DB::table('image')->where([['u-id', $uid],['c-id',$c_id->id],['url','<>', Null]])->sum('vote');
            $c_id->vote_sum = (object)array("vote_sum"=>$vote_sum);
             $rank_number=@DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('rank');
            $rank_number2=@DB::table('ujoinc')->where([['c-id',$c_id->id],['rank',"<=",$rank_number[0]]])->get();
            $rank_number2=@DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where([['ujoinc.c-id',$c_id->id],['rank',"<=",$rank_number[0]]])
            ->orderBy('rank','asc')
            ->get();
            // $rank[$c_id->id] =  count($rank_number2);
            $c_id->rank =count($rank_number2);
            $arryUser=DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('datetime');
            $index=$arryUser[0];
            $expo=$index/86400*15;
            $exposure=(int)$expo;
            $c_id->exposure = (object)array("exposure"=>$exposure);

            $wandarryUser=DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('wanddatetime');
            $wandindex=$wandarryUser[0];
            $wandexpo=$wandindex/86400*15;
            $wandexposure=(int)$wandexpo;
            $c_id->wandexposure = (object)array("wandexposure"=>$wandexposure);
        }
        $data['user_status']=DB::table('userpix')->where('u-id',$uid)->first();
        return response()->json($data);
    }

    public function GetOneChallege($uid,$cid)
    {
        // return $cid;
        $images = [];
        $vote_sum = [];
        $exposure = [];
        $wandexposure = [];
        $data['u_name']=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $data['u_wallet']=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $data['u_image']=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $joinc=DB::table('ujoinc')->where('u-id',$uid)->where('c-id',$cid)->select('c-id')->pluck('c-id');

        // return $joinc;

        // $data['challenge'] = DB::table('challenge')->select('challenge.id','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')
        // ->whereIn('id',$joinc)
        //     ->where('state','start')->join('users','users.no','challenge.u-id')->get();

            $data['challenge'] = DB::table('challenge')->select('challenge.id','challenge.s_name','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')
        ->whereIn('id',$joinc)
            ->where('state','start')->get();
            // return $data['challenge'];
        // $result = json_decode($challenge, true);
        // print_r($result);
        // exit();
        foreach ($data['challenge'] as $key => $c_id) {
            $imagearray = DB::table('image')->select('id','url','vote')->where([['u-id', $uid],['c-id',$c_id->id],['url','<>', Null]])->get();
            $c_id->image = (object)array("image"=>$imagearray);

            $vote_sum = DB::table('image')->where([['u-id', $uid],['c-id',$c_id->id],['url','<>', Null]])->sum('vote');
            $c_id->vote_sum = (object)array("vote_sum"=>$vote_sum);
   $rank_number=@DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('rank');
            $rank_number2=@DB::table('ujoinc')->where([['c-id',$c_id->id],['rank',"<=",$rank_number[0]]])->get();
            $rank_number2=@DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where([['ujoinc.c-id',$c_id->id],['rank',"<=",$rank_number[0]]])
            ->orderBy('rank','asc')
            ->get();
            // $rank[$c_id->id] =  count($rank_number2);
            $c_id->rank =count($rank_number2);
            $arryUser=DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('datetime');
            $index=$arryUser[0];
            $expo=$index/86400*15;
            $exposure=(int)$expo;
            $c_id->exposure = (object)array("exposure"=>$exposure);

            $wandarryUser=DB::table('ujoinc')->where([['c-id',$c_id->id],['u-id',$uid]])->pluck('wanddatetime');
            $wandindex=$wandarryUser[0];
            $wandexpo=$wandindex/86400*15;
            $wandexposure=(int)$wandexpo;
            $c_id->wandexposure = (object)array("wandexposure"=>$wandexposure);
        }
        $data['user_status']=DB::table('userpix')->where('u-id',$uid)->first();
        return response()->json($data);
    }
    public function passChallenges($uid){

        $data['u_wallet'] =DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $joinc =DB::table('ujoinc')->where('u-id',$uid)->select('c-id')->pluck('c-id');
        $data['challenge']  = DB::table('challenge')->select('challenge.id','challenge.c_type','challenge.state','challenge.title','challenge.description','challenge.votes','challenge.start-time as start_time','challenge.timeline','challenge.price','challenge.image-url as image_url','challenge.create-time as create_time','challenge.photocount','challenge.type')->whereIn('id',$joinc)
            ->where('state','ended')->get();
        $data['userpix'] =DB::table('userpix')->where('u-id',$uid)->first();
        return response()->json($data);
        //return view('challenges.passchallenges',['data'=> $challenge,'userpix'=>$userpix,'u_wallet'=>$u_wallet,'u_image'=>$u_image,'u_name'=>$u_name]);
    }
    public function challengeDetail($cid){
        // $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        // $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];

        $data['challenge'] = DB::table('challenge')->select('challenge.c_type', 'challenge.state', 'challenge.award', 'challenge.title', 'challenge.description', 'challenge.votes', 'challenge.start-time as start_time', 'challenge.timeline', 'challenge.timeline1', 'challenge.price', 'challenge.paid', 'challenge.prize', 'challenge.s_name', 'challenge.permission', 'challenge.image-url as image_url', 'challenge.type', 'challenge.photocount', 'admin.name as created_by')
            ->join('admin',function ($join){
                $join->on('admin.id','challenge.u-id');
            })
            ->where('challenge.id',$cid)->first();

        $data['rank'] =ujoinc::where('c-id',$cid)->where('rank', '!=' , 0)->with('user')->whereHas('user')->with(['images' => function ($query) use ($cid) {
        $query->where('c-id', $cid);
    }])->orderBy('rank','asc')->get();
        $data['images'] = DB::table('image')->select('image.u-id as u_id','image.url','image.imgname','image.like','image.vote')
            ->join('users',function ($join){
                $join->on('users.no','image.u-id');
            })->orderBy('vote','desc')
            ->where('c-id',$cid)->get();

        return response()->json($data);
        //return view('challenges.challenge_rank',['data'=> $challenge,'images'=>$images,'u_image'=>$u_image,'u_name'=>$u_name,'rank'=>$rank]);
    }
    public function challengeResult($cid){
        $uid=$_COOKIE['id'];
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $challenge=DB::table('challenge')
            ->join('users',function ($join){
                $join->on('users.no','challenge.u-id');
            })
            ->where('id',$cid)->first();
        $rank=DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where('ujoinc.c-id',$cid)
            ->orderBy('rank','asc')
            ->get();
        $myrank=DB::table('ujoinc')
            ->join('users',function ($join){
                $join->on('users.no','ujoinc.u-id');
            })
            ->where([['ujoinc.c-id',$cid],['ujoinc.u-id',$uid]])
            ->first();

        return view('challenges.ended_challenge',['data'=> $challenge,'rank'=>$rank,'myrank'=>$myrank,'u_image'=>$u_image,'u_name'=>$u_name]);
    }
    public function invitedChallenge($cid){
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $challenge=DB::table('challenge')
            ->join('users',function ($join){
                $join->on('users.no','challenge.u-id');
            })
            ->where('id',$cid)->first();
        $images=DB::table('image')
            ->join('users',function ($join){
                $join->on('users.no','image.u-id');
            })->orderBy('vote','desc')
            ->where('c-id',$cid)->get();
        return view('challenges.invitedchallenge',['data'=> $challenge,'images'=>$images,'u_image'=>$u_image,'u_name' =>$u_name]);
    }
    public function bid_permission(Request $request){
        $uid=$request->uid;
        $id=$request->item;
        $state=$request->val;
        if($state=='Accepted'){
         DB::table('bid')->where('id',$id)->update(['state'=>'Accepted']);

        $u_email=DB::table('bid')->where('id',$id)->pluck('buyer_email')[0];

        $u_id=DB::table('bid')->where('id',$id)->pluck('buyer_id')[0];

        $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        $date=Carbon::now();
        $userData=User::find($u_id);
        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Seller has accepted your bid!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Bid Notification','Seller has accepted your bid!');

        }
        if($state=='Delete'){


        $u_email=DB::table('bid')->where('id',$id)->pluck('buyer_email')[0];
        $u_id=DB::table('bid')->where('id',$id)->pluck('buyer_id')[0];
        $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        $date=Carbon::now();

        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Seller has deleted your bid!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Bid Notification','Seller has deleted your bid!');

         DB::table('bid')->where('id',$id)->delete();

        }
        if($state=='Request'){
          DB::table('bid')->where('id',$id)->update(['state'=>'Request']);
        }
        if($state=='Cancel'){
         DB::table('bid')->where('id',$id)->update(['state'=>'Cancel']);

        $u_email=DB::table('bid')->where('id',$id)->pluck('buyer_email')[0];
        $u_id=DB::table('bid')->where('id',$id)->pluck('buyer_id')[0];
        $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        $date=Carbon::now();

        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Seller has canceled your bid!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Bid Notification','Seller has canceled your bid!');

        }

        $bid=DB::table('bid')->where('seller_id',$uid)->get();
        return response()->json('Success');

    }
    public function report_permission(){
        $uid=$_COOKIE['id'];
        $data=Input::all();
        $id=$data['item'];
        $state=$data['val'];
        $u_profile=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        if($state=='Accepted'){
        DB::table('report')->where('rid',$id)->update(['r_state'=>'Accepted']);

        $img_id=DB::table('report')->where('rid',$id)->pluck('img_id')[0];
        $u_id=DB::table('image')->where('id',$img_id)->pluck('u-id')[0];
        $u_email=DB::table('users')->where('no',$u_id)->pluck('email')[0];
        $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        $date=Carbon::now();
        $userData = User::find($u_id);
        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Your photo has been removed by admin due to report!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Admin Notification','Your photo has been removed by admin due to report!');

        // $img_id=DB::table('report')->where('id',$id)->delete();
        $u_id=DB::table('image')->where('id',$img_id)->delete();

        }
        if($state=='Delete'){

        $u_id=DB::table('report')->where('rid',$id)->pluck('u_id')[0];
        $u_email=DB::table('users')->where('no',$u_id)->pluck('email')[0];
        $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        $date=Carbon::now();

        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Your report has deleted by Company!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Admin Notification','Your report has deleted by Company!');

         DB::table('report')->where('rid',$id)->delete();

        }
        if($state=='Reported'){
          DB::table('report')->where('rid',$id)->update(['r_state'=>'Reported']);
        }
        if($state=='Cancel'){
         DB::table('report')->where('rid',$id)->update(['r_state'=>'Cancel']);

        // $u_id=DB::table('report')->where('rid',$id)->pluck('u_id')[0];
        // $u_email=DB::table('users')->where('no',$u_id)->pluck('email')[0];
        // $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
        // $date=Carbon::now();

        // $inserarr = [
        //     'u_email' => $u_email,
        //     't_id' => $t_id,
        //     'n_type'=>'userpix_show',
        //     'n_date'=>$date,
        //     'state'=>'new',
        //     'msg'=>'Your report has deleted by Company!'
        // ];
        // DB::table('note')->insert($inserarr);

        }

        $this->response(1,'Success',$data);
    }
    public function ChallengeJoin(Request $request){
        //validate the info, create rules for the inputs
        $userid=$request->uid;
        $cid=$request->cid;

        $check=DB::table('ujoinc')->where([['u-id',$userid],['c-id',$cid]])->get();
        if(count($check)<1){
            $inserarr=[
                'u-id'=>$userid,
                'c-id'=>$cid
            ];
            DB::table('ujoinc')->insert($inserarr);

            $challenge_name=DB::table('challenge')->where('id',$cid)->pluck('title')[0];
            $u_email=DB::table('users')->where('no',$userid)->pluck('email')[0];
            $t_id=DB::table('userpix')->where('u-id',$userid)->pluck('no')[0];
            $date=Carbon::now();
            $userData= User::find($userid);

                $NotificationData = [];
                $NotificationData['screen'] = "UrPicsPay.ActiveChalenge";
                $NotificationData['challenge_id'] = $cid;
            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>'You have joined the free challenge "'.$challenge_name.'"',
                'notification_data'=>json_encode($NotificationData)
            ];
            DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Challenge Notifications','You have joined the free challenge "'.$challenge_name.'"',$NotificationData);

            $this->response(1,'Successful Join',NULL);
        }
    }

    public function paid_ChallengeJoin(Request $request){
        //validate the info, create rules for the inputs
        $userid=$request->uid;
        $cid=$request->cid;

        $paid = DB::table('challenge')->where('id',$cid)->pluck('paid')[0];
        $walet=DB::table('userpix')->where('u-id',$userid)->pluck('walet')[0];
        $price=floatval(ltrim($paid, "$"));
        $walet1=$walet-$price;
        if($walet1<0){
            $this->response(202,'You do not have sufficient balance in your wallet',NULL);
        }
        else{
        DB::table('userpix')->where('u-id',$userid)->update(['walet'=>$walet1]);
        $inserarr=[
            'u-id'=>$userid,
            'c-id'=>$cid
        ];
        DB::table('ujoinc')->insert($inserarr);
        $UserData = User::where('no',$userid)->first();
            $NotificationData = [];
                $NotificationData['screen'] = "UrPicsPay.ActiveChalenge";
                $NotificationData['challenge_id'] = $cid;
        $inserarr=[
            'tech_id'=>$userid,
            'u_email'=>$UserData->email,
            'u_name'=>$UserData->name,
            'amount'=>$price,
            'type'=>'Joined Paid Challenge',

        ];
        DB::table('transaction')->insert($inserarr);

        $this->response(1,'You have successfully joined the paid challenge!',NULL);

        $challenge_name=DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        $u_email=DB::table('users')->where('no',$userid)->pluck('email')[0];
        $t_id=DB::table('userpix')->where('u-id',$userid)->pluck('no')[0];
        $date=Carbon::now();
        $userData = User::find($userid);
        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'You have joined the paid challenge "'.$challenge_name.'"',
             'notification_data'=>json_encode($NotificationData)
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Challenge Notifications','You have joined the paid challenge "'.$challenge_name.'"',$NotificationData);

        }
    }

    public function getExposure(){
        //validate the info, create rules for the inputs
        $date=Carbon::now();


        $data=Input::all();
        $userid=$data['uid'];
        $cid=$data['cid'];
        $arryUser=DB::table('ujoinc')->where([['c-id',$cid],['u-id',$userid]])->pluck('datetime');
        $index=$arryUser[0];
        $exposure=$index/86400*15;
        $senddate['cid']=$cid;
        $senddate['exposure']=(int)$exposure;
        $this->response(1,'Success',$senddate);

    }
    public function Charge(Request $request){
        //validate the info, create rules for the inputs
        $uid=$request->uid;
        $cid=$request->cid;

        $currentcharge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')->toArray();
        if (intval($currentcharge[0])<=0) {
            $this->response(200,"Please purchase Charge through wallet!",$currentcharge);
        }
        else{
            DB::table('userpix')->where('u-id',$uid)
                ->decrement('Charge',1);

            $result=DB::table('ujoinc')
                ->where([['c-id',$cid],['u-id',$uid]])
                ->update(['exposure'=>Carbon::now(),'exposurestate'=>'1','datetime'=>'86400']);
            DB::table('image')
                ->where([['c-id',$cid],['u-id',$uid]])
                ->update(['datetime'=>'86400']);

            $this->response(1,'Charge Successful!',$result);

        }

    }
    public function Wand(Request $request){
        //validate the info, create rules for the inputs
        $date=Carbon::now();
        $uid=$request->uid;
        $cid=$request->cid;
        $currentcharge=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')->toArray();

        if (intval($currentcharge[0])<=0) {
            $this->response(200,"Please purchase Wand through wallet!",$currentcharge);
        }
        else{
            DB::table('userpix')->where('u-id',$uid)
                ->decrement('Wand',1);
            $result=DB::table('ujoinc')
                ->where([['c-id',$cid],['u-id',$uid]])
                ->update(['wandexposure'=>Carbon::now(),'wandexposurestate'=>'1','wanddatetime'=>'86400']);
            $result=DB::table('image')
                ->where([['c-id',$cid],['u-id',$uid]])
                ->update(['boosttime'=>'86400','booststate'=>'1','boostdate'=>$date]);
            $this->response(1,'Wand Successful!',$result);

        }

    }



    public function setBoostSocial(Request $request){
        //validate the info, create rules for the inputs
        $date=Carbon::now();
        $uid=$request->uid;
        $cid=$request->cid;
        $id_social_post=$request->id_social;
        $currentcharge=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')->toArray();

        if (intval($currentcharge[0])<=0) {
            $this->response(200,"Please purchase Wand through wallet!",$currentcharge);
        }
        else{

            $result=DB::table('social_posts')
                ->where([['id',$id_social_post],['user_id',$uid]])
                ->update(['boosttime'=>'86400','booststate'=>'1','boostdate'=>$date]);
            $this->response(1,'Boost Successful!',$result);

        }

    }



    public function allcharge(Request $request){
        //validate the info, create rules for the inputs
        $uid=$request->uid;
        $value=$request->value;

        $joinc=DB::table('ujoinc')->where('u-id',$uid)->select('c-id')->pluck('c-id');
        $challenges=DB::table('challenge')->whereIn('id',$joinc)
            ->where('state','start')->get();

        $charges = count($challenges);

        $currentcharge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')->toArray();

        if (intval($currentcharge[0])<$charges) {
            $this->response(200,"Please purchase Charge through wallet!",$currentcharge);
        }
        else{
            foreach($challenges as $challenge){
                $cid = $challenge->id;
                DB::table('userpix')->where('u-id',$uid)
                    ->decrement('Charge',1);
                $result=DB::table('ujoinc')
                    ->where([['c-id',$cid],['u-id',$uid]])
                    ->update(['exposure'=>Carbon::now(),'exposurestate'=>'1','datetime'=>'86400']);
                DB::table('image')
                    ->where([['c-id',$cid],['u-id',$uid]])
                    ->update(['datetime'=>'86400']);
            }
            $this->response(1,'Charge Successful!',$result);

        }

    }
    public function allwand(Request $request){
        //validate the info, create rules for the inputs
        $uid=$request->uid;
        $value=$request->value;

        $joinc=DB::table('ujoinc')->where('u-id',$uid)->select('c-id')->pluck('c-id');
        $challenges=DB::table('challenge')->whereIn('id',$joinc)
            ->where('state','start')->get();

        $charges = count($challenges);

        $currentcharge=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')->toArray();

        if (intval($currentcharge[0])<$charges) {
            $this->response(200,"Please purchase Wand through wallet!",$currentcharge);
        }
        else{
            foreach($challenges as $challenge){
                $cid = $challenge->id;
                DB::table('userpix')->where('u-id',$uid)
                    ->decrement('Wand',1);
                $result=DB::table('ujoinc')
                    ->where([['c-id',$cid],['u-id',$uid]])
                    ->update(['wandexposure'=>Carbon::now(),'wandexposurestate'=>'1','wanddatetime'=>'86400']);
                $result=DB::table('image')
                    ->where([['c-id',$cid],['u-id',$uid]])
                    ->update(['boosttime'=>'86400']);
            }
            $this->response(1,'Wand Successful!',$result);
        }

    }
    public function setBoost(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $uid=$_COOKIE['id'];
        $currentwand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')->toArray();
        if (intval($currentwand[0])<=0) {
            $this->response(200,"Can't Boost. Pleas buy Wand",$currentwand);
        }
        else{
            DB::table('userpix')->where('u-id',$uid)
                ->decrement('Wand',1);
            $iid=$data['iid'];
            DB::table('image')
                ->where('id',$iid)
                ->update(['boostdate'=>Carbon::now(),'booststate'=>1,'boosttime'=>7200]);
            $this->response(1,'Successful Boost',$iid);

        }

    }


    public function MyChallenges1(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $userid=$data['userid'];
        $challenges = DB::table('challenge')->where('u-ids','like', $userid)->get();
        $this->response(1,'Success',$challenges);
    }
   public  function compress_image($source_url, $destination_url, $quality) {

       $info = getimagesize($source_url);

        if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source_url);

        elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source_url);

      elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source_url);

        imagejpeg($image, $destination_url, $quality);
    return $destination_url;
    }
    public function ImageUpload(Request $request){
        //

        // $data=Input::all();
        // $iid=$data['iid'];
        // $uid=$data['uid'];
        // $cid = $data['cid'];
        // $destinationPath = 'uploads/images';
        // $file = $data['image'];

        $iid=(int)$request->iid;
        $uid=$request->uid;
        $cid = $request->cid;
        $destinationPath = '/home/jack/public_html/public/uploads/images';
        $destinationPath2 = 'https://urpixpays.com/public/uploads/images';


        $file = $request->image;

        if ($iid==0){
            $inserarr=[
                'c-id'=>$cid,
                'u-id'=>$uid
            ];
            $id=DB::table('image')->insertGetId($inserarr);

            foreach ($request->IdImage as $key => $value) {
                $dat = $value['source'];
                $c = $value['filesize'];

                $image_name = time().$c.'.jpg';
                $pah ="/home/jack/public_html/public/uploads/images/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);
                   DB::table('image')
                ->where('id',$id )
                ->update(['imgname' => $image_name]);


            Image::make($pah)->save('/home/jack/public_html/public/uploads/images/' . $image_name )->encode('jpg', 75);
    // return $request->all();
            // $file->move('public/'.$destinationPath,$imagename);
            $imageurl=$destinationPath2.'/'.$image_name;
             //$this->compress_image($destinationPath.'/'.$image_name,$destinationPath.'/'.$image_name,20);
            DB::table('image')
                ->where('id',$id )
                ->update(['url' => $imageurl]);

            $senddata['id']=$id;
            $senddata['url']=$imageurl;
            $this->response(1,"Upload Successful!",$senddata);
            }
        }else{
            $currentflip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')->toArray();

            if (intval($currentflip[0])<=0) {
                $this->response(200,"Can't Upload or Swap. Please buy Flip",$currentflip);
            }
            else{
                //File::delete($filename);

                foreach ($request->IdImage as $key => $value) {
                $dat = $value['source'];
                $c = $value['filesize'];

                $image_name = time().$c.'.jpg';
                $pah ="/home/jack/public_html/public/uploads/images/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);

                  Image::make($pah)->save('/home/jack/public_html/public/uploads/images/' . $image_name )->encode('jpg', 75);
                // $file->move('public/'.$destinationPath,$imagename);

                $imageurl=$destinationPath2.'/'.$image_name;

                 //$this->compress_image($destinationPath.'/'.$image_name,$destinationPath.'/'.$image_name,20);
                $d_filename=DB::table('image')
                    ->where('id',$iid )->pluck('url')[0];
                    // return $d_filename;
                //File::delete($d_filename);
            //-------------imgname_update-------------------//
            $check=DB::table('challenge')->where('id',$cid)->pluck('c_type')[0];
            if($check=="normal"){
                $o_votes=DB::table('image')->where('id',$iid)->pluck('vote')[0];
                DB::table('image')
                  ->where('id',$iid)
                  ->update(['vote' => 0]);
                $dec=DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])
                    ->decrement('vote_count',$o_votes);

            }
              DB::table('image')
                  ->where('id',$iid)
                  ->update([
                      'imgname' => $image_name,
                      'url' => $imageurl
                      ]);

            //---------------imgname_update_end------------//
                $dec=DB::table('userpix')->where('u-id',$uid)
                    ->decrement('Flip',1);
                $senddata['url']=$imageurl;
                $senddata['dec']=$dec;
                DB::table('vote')
                ->where('i-id',$iid)
                ->delete();

                $this->response(2,"Flip Successful!",$senddata);
            }

            }
        }
    }

    public function ImageSubmit(Request $request){
        // return $request->all();
        $iid=(int)$request->iid;
        $uid=$request->uid;
        $cid = $request->cid;
        $destinationPath = '/home/jack/public_html/public/uploads/images';
        $destinationPath2 = 'https://urpixpays.com/public/uploads/images';

        $file = $request->image;
    // return $request->all();
        if ($iid==0){

$ImageVAlue = json_decode($request->IdImage, true);
// return $ImageVAlue;
$count = 0;
            foreach ($ImageVAlue as $key => $value) {
                $inserarr=[
                'c-id'=>$cid,
                'u-id'=>$uid
            ];
            $id=DB::table('image')->insertGetId($inserarr);

                // return $value['data'];
             $dat = $value['data'];
                $c = $value['size'];

                $image_name = time().$c.'.jpg';
                $pah ="/home/jack/public_html/public/uploads/images/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);
                   DB::table('image')
                ->where('id',$id )
                ->update(['imgname' => $image_name]);



            Image::make($pah)->save('/home/jack/public_html/public/uploads/images/' . $image_name )->encode('jpg', 75);
            $imageurl=$destinationPath2.'/'.$image_name;

           $updatedData= DB::table('image')
                ->where('id',$id )
                ->update(['url' => $imageurl]);
                //   $addUID= DB::table('image')
                // ->where('id',$id )
                // ->update(['u-id' => $uid]);

            $senddata['id']=$id;
            $senddata['url']=$imageurl;
            $senddata['uid']=$uid;
            $count++;
            }
            $this->response(1,"Upload Successful!",$count);
        }
        else{
            $currentflip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')->toArray();

            if (intval($currentflip[0])<=0) {
                $this->response(200,"Can't Upload or Swap. Please buy Flip",$currentflip);
            }
            else{
                //File::delete($filename);
                // return $request->IdImage;
                foreach ($request->IdImage as $key => $value) {
                 $dat = $value['data'];
                $c = $value['size'];

                $image_name = time().$c.'.jpg';
                $pah ="/home/jack/public_html/public/uploads/images/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);

                  Image::make($pah)->save('/home/jack/public_html/public/uploads/images/' . $image_name )->encode('jpg', 75);
                // $file->move('public/'.$destinationPath,$imagename);

                $imageurl=$destinationPath2.'/'.$image_name;

                 //$this->compress_image($destinationPath.'/'.$image_name,$destinationPath.'/'.$image_name,20);
                $d_filename=DB::table('image')
                    ->where('id',$iid )->pluck('url')[0];
                    // return $d_filename;
                //File::delete($d_filename);
            //-------------imgname_update-------------------//
            $check=DB::table('challenge')->where('id',$cid)->pluck('c_type')[0];
            if($check=="normal"){
                $o_votes=DB::table('image')->where('id',$iid)->pluck('vote')[0];
                DB::table('image')
                  ->where('id',$iid)
                  ->update(['vote' => 0]);
                $dec=DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])
                    ->decrement('vote_count',$o_votes);

            }
              DB::table('image')
                  ->where('id',$iid)
                  ->update([
                      'imgname' => $image_name,
                      'url' => $imageurl
                      ]);

            //---------------imgname_update_end------------//
                $dec=DB::table('userpix')->where('u-id',$uid)
                    ->decrement('Flip',1);
                $senddata['url']=$imageurl;
                $senddata['dec']=$dec;
                DB::table('vote')
                ->where('i-id',$iid)
                ->delete();

                $this->response(2,"Flip Successful!",$senddata);
            }

            }

        }

// $htmlContent = str_replace('balloontip.css', 'https://www.pcpao.org/balloontip.css', $htmlContent);
    }
    public function ImageSubmitdm(Request $request){
        $iid=(int)$request->iid;
        $uid=$request->uid;
        $cid = $request->cid;
        $destinationPath = '/home/jack/public_html/public/uploads/images';
        $destinationPath2 = 'https://urpixpays.com/public/uploads/images';

        $file = $request->image;

        print_r($file);
        exit();
        if ($iid==0){
            $inserarr=[
                'c-id'=>$cid,
                'u-id'=>$uid
            ];
            $id=DB::table('image')->insertGetId($inserarr);
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            //----------------imgname----------------
            $imgname=$file->getClientOriginalName();
            $imgname=$file->getClientOriginalName();
            $exten=".".$ext;
            $imgname=trim($imgname,$exten).'_'.rand(10,100);
            DB::table('image')
                ->where('id',$id )
                ->update(['imgname' => $imgname]);

            //-------------------end--------------------
            $imagename=md5($iid.$file->getClientOriginalName()).$id.'.'.$ext;
            Image::make($file->getRealPath())->save('/home/jack/public_html/public/uploads/images/' . $imagename );

            // $file->move('public/'.$destinationPath,$imagename);
            $imageurl=$destinationPath2.'/'.$imagename;
             //$this->compress_image($destinationPath.'/'.$imagename,$destinationPath.'/'.$imagename,20);
            DB::table('image')
                ->where('id',$id )
                ->update(['url' => $imageurl]);

            $senddata['id']=$id;
            $senddata['url']=$imageurl;
            $this->response(1,"Upload Successful!",$senddata);
        }
        else{
            $currentflip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')->toArray();
            if (intval($currentflip[0])<=0) {
                $this->response(200,"Can't Upload or Swap. Please buy Flip",$currentflip);
            }
            else{
                //File::delete($filename);
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            //---------------
            $imgname=$file->getClientOriginalName();
            $exten=".".$ext;
            $imgname=trim($imgname,$exten);
            //------------------
                $imagename=md5($iid.$file->getClientOriginalName()).$iid.'.'.$ext;

                  // Image::make($file->getRealPath())->insert('public/images/watermark.png','center',10,10)->save('public/uploads/images/' . $imagename );
                  Image::make($file->getRealPath())->save('/home/jack/public_html/public/uploads/images/' . $imagename );
                // $file->move('public/'.$destinationPath,$imagename);

                $imageurl=$destinationPath2.'/'.$imagename;

                 //$this->compress_image($destinationPath.'/'.$imagename,$destinationPath.'/'.$imagename,20);
                $d_filename=DB::table('image')
                    ->where('id',$iid )->pluck('url')[0];
                //File::delete($d_filename);
            //-------------imgname_update-------------------//
            $check=DB::table('challenge')->where('id',$cid)->pluck('c_type')[0];
            if($check=="normal"){
                $o_votes=DB::table('image')->where('id',$iid)->pluck('vote')[0];
                DB::table('image')
                  ->where('id',$iid)
                  ->update(['vote' => 0]);
                $dec=DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])
                    ->decrement('vote_count',$o_votes);

            }
              DB::table('image')
                  ->where('id',$iid)
                  ->update([
                      'imgname' => $imgname,
                      'url' => $imageurl
                      ]);

            //---------------imgname_update_end------------//
                $dec=DB::table('userpix')->where('u-id',$uid)
                    ->decrement('Flip',1);
                $senddata['url']=$imageurl;
                $senddata['dec']=$dec;
                DB::table('vote')
                ->where('i-id',$iid)
                ->delete();

                $this->response(2,"Flip Successful!",$senddata);
            }

        }

// $htmlContent = str_replace('balloontip.css', 'https://www.pcpao.org/balloontip.css', $htmlContent);
    }
    public function getImage(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $uid=$data['uid'];
        $cid=$data['cid'];
        $image = DB::table('image')->where([['u-id', $uid],['c-id',$cid],['url','<>', Null]])->get();
        $this->response(1,'Success',$image);
    }
    public function getPix(Request $request){
        //validate the info, create rules for the inputs
        $type=$request->type;
        $amount=$request->amount;
        $uid=$request->uid;
        switch ($type){
            case 1:
                $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                if($amount==2){$walet=$walet-0.99;}
                elseif($amount==9){$walet=$walet-3.99;}
                elseif($amount==19){$walet=$walet-5.99;}
                elseif($amount==39){$walet=$walet-9.99;}

                if($walet<0){
                    $this->response(2,'You do not have sufficient balance in your wallet!',$walet);
                }
                else{
                DB::table('userpix')
                ->where('u-id',$uid)
                ->update(['walet'=>$walet]);

                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Flip',$amount);

                if($amount==2){

                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>0.99,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                       $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 2 Flips.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==9){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.99,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                      $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 9 Flips.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==19){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>5.99,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                       $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 19 Flips.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==39){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>9.99,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                                          $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 39 Flips.','UrPicsPay.BalanceOverView');
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);
                }
                break;
            case 2:
                $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                if($amount==2){$walet=$walet-0.99;}
                elseif($amount==9){$walet=$walet-3.99;}
                elseif($amount==19){$walet=$walet-5.99;}
                elseif($amount==39){$walet=$walet-9.99;}

                if($walet<0){
                    $this->response(2,'You do not have sufficient balance in your wallet!',$walet);
                }
                else{
                DB::table('userpix')
                ->where('u-id',$uid)
                ->update(['walet'=>$walet]);


                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Charge',$amount);

                if($amount==2){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.99,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                     $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 2 Charges.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==9){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.99,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                                         $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 9 Charges.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==19){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>5.99,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                                            $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 19 Charges.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==39){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>9.99,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                                       $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 39 Charges.','UrPicsPay.BalanceOverView');
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);
                }
                break;
            case 3:
                $walet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                if($amount==2){$walet=$walet-0.99;}
                elseif($amount==9){$walet=$walet-3.99;}
                elseif($amount==19){$walet=$walet-5.99;}
                elseif($amount==39){$walet=$walet-9.99;}

                if($walet<0){
                    $this->response(2,'You do not have sufficient balance in your wallet!',$walet);
                }
                else{
                DB::table('userpix')
                ->where('u-id',$uid)
                ->update(['walet'=>$walet]);


                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Wand',$amount);

                if($amount==2){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>0.99,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                      $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 2 Wands.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==9){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.99,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                     $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 9 Wands.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==19){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>5.99,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                              $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 19 Wands.','UrPicsPay.BalanceOverView');
                }
                elseif($amount==39){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>9.99,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                      $sellerUser=User::find($uid);
        self::sendNotification($sellerUser->token,'Purchased','You have Purchased 39 Wands.','UrPicsPay.BalanceOverView');
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);
                }
                break;
            default:
                $this->response(200,'Unknown Pix Type',NULL);
                break;
        }


    }
    public function getPixfree(Request $request){
        //validate the info, create rules for the inputs
        $type=$request->type;
        $amount=$request->amount;
        $uid=$request->uid;
        switch ($type){
            case 1:


                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Flip',$amount);

                if($amount==1){

                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>0.39,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==5){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>1.75,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==10){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.20,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==25){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>7.25,
                        'type'=>'Purchased Flip'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);

                break;
            case 2:

                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Charge',$amount);

                if($amount==1){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>0.49,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==5){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>1.95,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==10){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>3.50,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==25){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>7.50,
                        'type'=>'Purchased Charge'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);

                break;
            case 3:


                DB::table('userpix')
                    ->where('u-id',$uid )
                    ->increment('Wand',$amount);

                if($amount==1){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>0.59,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==5){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>2.75,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==10){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>5.00,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }
                elseif($amount==25){
                    $inserarr=[
                        'tech_id'=>$uid,
                        'amount'=>11.25,
                        'type'=>'Purchased Wand'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }

                $userpix=DB::table('userpix')->where('u-id',$uid)->first();
                $this->response(1,'Success',$userpix);

                break;
            default:
                $this->response(200,'Unknown Pix Type',NULL);
                break;
        }


    }
    // public function setVote($cid){
    //     if (Session::get('login_flag')!='login') return redirect('landing');
    //     $uid=$_COOKIE['id'];
    //     $iid=DB::table('vote')->where('u-id',$uid)->pluck('i-id');
    //     $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];

    //     $image1=DB::table('image')->select('image.*')
    //         ->join('ujoinc',function ($join){
    //             $join->on('image.c-id','ujoinc.c-id');
    //             $join->on('image.u-id','ujoinc.u-id');

    //         })
    //         ->where([['image.u-id','<>',$uid],['image.c-id',$cid]])
    //         ->whereNotIn('image.id',$iid)
    //         ->orderBy('image.boosttime','dec')
    //         ->orderBy('ujoinc.datetime','dec')
    //         ->inRandomOrder()
    //         ->get();

    //     $image=DB::table('image')
    //     ->where([['image.u-id','<>',$uid],['image.c-id',$cid]])
    //     ->orderBy('boosttime','dec')
    //     ->get();
    //     $image3=DB::table('image')->where('c-id',$cid)->get();
    //     $image2=DB::table('image')->get();
    //     return view('challenges.voting',['data'=> $image,'data1'=> $image1,'data2'=> $image2,'u_image'=>$u_image,'data3'=> $image3]);
    // }

    public function transaction($uid)
    {

        $data['transaction'] = DB::table('transaction')->where('tech_id',$uid)
        ->join('users','users.no','transaction.tech_id')->get();


        return response()->json($data);
    }

    public function setVotedm($cid){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid=$_COOKIE['id'];
        //echo $cid;
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $iid=DB::table('vote')->where('u-id',$uid)->pluck('i-id');

        // $image=DB::table('image')->select('image.*')
        //     ->join('ujoinc',function ($join){
        //         $join->on('image.c-id','ujoinc.c-id');
        //         $join->on('image.u-id','ujoinc.u-id');

        //     })
        //     ->where([['image.u-id','<>',$uid],['image.c-id',$cid],['image.c-id','<>',NULL]])
        //     ->whereNotIn('image.id',$iid)
        //     ->orderBy('image.boosttime','dec')
        //      ->orderBy('ujoinc.datetime','dec')
        //     ->inRandomOrder()
        //     ->get();

        $image=DB::table('image')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL]])
            ->whereNotIn('id',$iid)
            ->orderBy('image.boosttime','dec')
            ->inRandomOrder()
            ->get();

        $image1=DB::table('image')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL],['boosttime','<>',0],['url','<>','']])
            ->whereNotIn('id',$iid)
            ->orderBy('boosttime','dec')
            // ->inRandomOrder()
            ->get();
        $image2=DB::table('image')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL],['boosttime',0],['url','<>','']])
            ->whereNotIn('id',$iid)
            ->orderBy('datetime','dec')
            ->inRandomOrder()
            ->get();

        return view('challenges.voting',['data'=> $image1,'data1'=>$image2,'u_name' => $u_name]);
    }
    public function setVote($cid, $uid){
        $image_item = '';
        $image_item1 = '';
        $iid=DB::table('vote')->where('u-id',$uid)->pluck('i-id');

        $image=DB::table('image')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL]])
            ->whereNotIn('id',$iid)
            ->orderBy('image.boosttime','desc')
            ->inRandomOrder()
            ->get();

        $data['wand_charge'] = DB::table('image')->select('id','url')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL],['boosttime','<>',0],['url','<>','']])
            ->whereNotIn('id',$iid)
            ->orderBy('boosttime','desc')
            // ->inRandomOrder()
            ->get();
        $data['normal_img'] = DB::table('image')->select('id','url')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL],['boosttime',0],['url','<>','']])
            ->whereNotIn('id',$iid)
            ->orderBy('datetime','desc')
            ->inRandomOrder()
            ->get();
         return response()->json($data);
    }
    public function voting_pics($cid){
        $item = '';
        $uid=$_COOKIE['id'];
        $iid=DB::table('vote')->where('u-id',$uid)->pluck('i-id');
        $image2=DB::table('image')->where([['u-id','<>',$uid],['c-id',$cid],['c-id','<>',NULL],['boosttime',0],['url','<>','']])
            ->whereNotIn('id',$iid)
            ->orderBy('datetime','dec')
            ->inRandomOrder()
            ->get();
        foreach ($image2 as $key => $value) {
            $item .= '<div class="item"><img src="'.$value->url.'" /></div>';
        }
        echo $item;
    }
    public function add_question(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $uid=$data['uid'];
        if( isset( $data['likearry'] ) ){
            // do something
            $likearry=$data['likearry'];
            for ($i=0;$i<count($likearry);$i++){
                $inserarr=[
                    'u-id'=>$uid,
                    'i-id'=>$likearry[$i]
                ];
                DB::table('like')->insert($inserarr);
                DB::table('image')
                    ->where('id',$likearry[$i] )
                    ->increment('like',1);
            }

        }
        if( isset( $data['question'] ) ){
            // do something
            $question=$data['question'];
            for ($i=0;$i<count($question);$i++){
                $inserarr=[
                    'u_id'=>$uid,
                    'img_id'=>$question[$i]
                ];
                DB::table('report')->insert($inserarr);
                DB::table('image')
                    ->where('id',$question[$i] )
                    ->increment('report',1);
            }

        }
        $this->response(1,'Success',$uid);
        //$image = DB::table('image')->where([['u-id', $uid],['c-id',$cid]])->get();

    }

    public function addVoting(Request $request){
        //validate the info, create rules for the inputs
        $uid=$request->uid;
        $cid=$request->cid;
        $like=$request->likearry;
        $question=$request->question;
        $vote=$request->votearry;
        $likearry = explode(',' , $like);
        $questionarry = explode(',' , $question);
        $votearry = explode(',' , $vote);
        if( isset( $likearry ) ){
            // do something
            for ($i=0;$i<count($likearry);$i++){
                if($likearry[$i] != ''){
                    $inserarr=[
                        'u-id'=>$uid,
                        'i-id'=>$likearry[$i]
                    ];
                    DB::table('like')->insert($inserarr);
                    DB::table('image')
                        ->where('id',$likearry[$i] )
                        ->increment('like',1);
                }
            }

        }
        if( isset( $questionarry ) ){
            // do something
            for ($i=0;$i<count($questionarry);$i++){
                if($questionarry[$i] != ''){
                    $master_id=DB::table('image')->where('id',$questionarry[$i])->pluck('u-id')[0];
                    $master_email=DB::table('users')->where('no',$master_id)->pluck('email')[0];
                    $check=DB::table('report')->where('img_id',$questionarry[$i])->get();
                    if(count($check)<1){
                        $inserarr=[
                            'u_id'=>$uid,
                            'img_id'=>$questionarry[$i],
                            'master_email'=>$master_email
                        ];
                        DB::table('report')->insert($inserarr);
                        DB::table('image')
                            ->where('id',$questionarry[$i] )
                            ->increment('report',1);
                    }
                }
            }

        }
        if( isset( $votearry ) ){
            // do something
            for ($i=0;$i<count($votearry);$i++){
                if($votearry[$i]){
                    $inserarr=[
                        'u-id'=>$uid,
                        'i-id'=>$votearry[$i]
                    ];
                    DB::table('vote')->insert($inserarr);
                    DB::table('image')
                        ->where('id',$votearry[$i] )
                        ->increment('vote',1);

                    $userid=DB::table('image')->where('id',$votearry[$i])
                        ->pluck('u-id')->toArray()[0];
                    DB::table('ujoinc')->where([['u-id','=',$userid],['c-id',$cid]])->increment('vote_count',1);
                    DB::table('challenge')->where('id',$cid)->increment('votes',1);

                    DB::table('userpix')
                        ->join('image','userpix.u-id','image.u-id')
                        ->where('image.id','=',$votearry[$i])->increment('Points',1);
                        $userData = User::find($userid);
                        if(isset($userData->token)){
                            self::sendNotification($userData->token,'Vote Notification','Someone has voted on your photo!','');
                        }

                }
            }
            DB::table('ujoinc')->where('u-id','=',$uid)->increment('datetime',100);
        }
        $this->response(1,'Success',$uid);
        //$image = DB::table('image')->where([['u-id', $uid],['c-id',$cid]])->get();

    }
    public function Invite(Request $request){
        //validate the info, create rules for the inputs
        $date=Carbon::now();
        $f_email=$request->email;
        $f_name=$request->name;
        $uid=$request->uid;
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];

        $data2 = array('name' => $f_name,'u_name' => $u_name, 'uid' => $uid);
        Mail::send('invite_mail', $data2, function($message) use ($f_email) {
         $message->to($f_email, 'Friends Email')->subject
            ('You are invited to join urpixpays.com!');
         $message->from('info@urpixpays.com','Urpixpays.com');
      });

        $temp=DB::table('invite')->where([['user_id',$uid],['friend_email',$f_email]])->get();
        if (count($temp)==0) {
            $inserarr = [
                'user_id' => $uid,
                'friend_email' => $f_email,
                'datetime' => $date
            ];
            DB::table('invite')->insert($inserarr);
        }
        $this->response(1,'Successful Invite',$temp);
    }
    public function invite_sign_up($cid){
        return view('invite_signup',['cid'=> $cid]);
    }


    public function getListInvite($uid){
        //validate the info, create rules for the inputs

        $data=DB::table('invite')
            ->where('user_id',$uid)
            ->get();
        return response()->json($data);
    }
    public function challengInvite($cid,$uid){
        //validate the info, create rules for the inputs
        $data['challenge']=DB::table('challenge')
            ->join('users',function ($join){
                $join->on('users.no','challenge.u-id');
            })
            ->where('id',$cid)->first();


        $data['invition']=DB::table('invite_challenge')
            ->where('user_id',$uid)
            ->get();
        return response()->json($data);
        //$this->response(1,'Successful Invite',$temp);
        //return view('invite_challenge',['data'=> $data,'challenge'=>$challenge,'u_image'=>$u_image,'u_name'=> $u_name]);
    }
    public function addChallengeInvite(Request $request){
        $date=Carbon::now();
        $f_email=$request->email;
        $f_name=$request->name;
        $c_id=$request->cid;
        $uid=$request->uid;
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];

        $data2 = array('name' => $f_name,'u_name' => $u_name,'uid' => $uid);
        Mail::send('invite_mail', $data2, function($message) use ($f_email) {
         $message->to($f_email, 'Friends Email')->subject
            ('You are invited to join urpixpays.com!');
         $message->from('info@urpixpays.com','Urpixpays.com');
      });

        $temp=DB::table('invite_challenge')->where([['user_id',$uid],['friend_email',$f_email],['c_id',$c_id]])->get();
        if (count($temp)==0) {
            $inserarr = [
                'user_id' => $uid,
                'friend_email' => $f_email,
                'datetime' => $date,
                'c_id'=>$c_id
            ];
            $id=DB::table('invite_challenge')->insertGetId($inserarr);
            $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
            $c_name=DB::table('challenge')->where('id',$c_id)->pluck('title')[0];
            $f_id=DB::table('users')->where('email',$f_email)->pluck('no')[0];
            $userData=User::find($f_id);
            $inserarr = [
                'u_email' => $f_email,
                't_id' => (int)$id,
                'n_type'=>'invite_challenge',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>$u_name.' has invited you to join the challenge'.' "'.$c_name.'"'
            ];
            DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Challenge Invite',$u_name.' has invited you to join the challenge'.' "'.$c_name.'"');


        }

        $this->response(1,'Successful Invite',$temp);
    }
    public function ivtChallengeJoin(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $uid=$_COOKIE['id'];
        $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        $cid=$data['cid'];
        $inserarr=[
            'u-id'=>$uid,
            'c-id'=>$cid
        ];
        DB::table('ujoinc')->insert($inserarr);
        DB::table('invite_challenge')
            ->where([['friend_email',$u_email],['c_id',$cid]])
            ->update(['state'=>'join']);
        $tid=DB::table('invite_challenge')
            ->where([['friend_email',$u_email],['c_id',$cid]])
            ->pluck('id')[0];
        DB::table('note')
            ->where([['u_email',$u_email],['t_id',$tid],['n_type','invite_challenge']])
            ->delete();
        $f_email=DB::table('invite_challenge')
            ->where([['friend_email',$u_email],['c_id',$cid]])
            ->join('users','users.no','invite_challenge.user_id')
            ->pluck('email')[0];

//------------------------invite_challenge_add--------------------------------//
        $user_f_id=DB::table('users')->where('email',$f_email)->pluck('no');
        $user_f_walets=DB::table('userpix')->where('u-id',$user_f_id)->get();
        foreach($user_f_walets as $user_f_walet)
        {
             $walet0=$user_f_walet->walet;
        }

        $walet=$walet0+0.10;
        DB::table('userpix')
            ->where('u-id', $user_f_id)
            ->update(['walet'=>$walet]);

        $user2_f_id=DB::table('invite_challenge')->where('friend_email',$f_email)->pluck('user_id');

        $date=Carbon::now();
        $ctitle=DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        $userData =User::find($uid);
        $inserarr = [
            'u_email' => $f_email,
            't_id' => '0',
            'n_type'=>'show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Your friend '.$u_email.' is joined by your friends invitation. So you got $0.10 from i nvitation system!'
        ];
        DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Challenge Invite','Your friend '.$u_email.' is joined by your friends invitation. So you got $0.10 from i nvitation system!');

                            // $u1_id = DB::table('invite_challenge')->where('friend_email',$f_email)->pluck('user_id')[0];
                            // $inserarr=[
                            //     'u_id'=>$u1_id,
                            //     'amount'=>0.1,
                            //     'friend_email1'=>$u_email
                            // ];
                            // DB::table('invitation')->insert($inserarr);

        if(count($user2_f_id)>0){

            $user2_f_walets=DB::table('userpix')->where('u-id',$user2_f_id)->get();
            foreach($user2_f_walets as $user2_f_walet)
            {
                 $walet2=$user2_f_walet->walet;
            }
            $walet=$walet2+0.05;
            DB::table('userpix')
                ->where('u-id', $user2_f_id)
                ->update(['walet'=>$walet]);
            $user_f2_email = DB::table('users')->where('no',$user2_f_id)->pluck('email')[0];
            $date=Carbon::now();
            $ctitle=DB::table('challenge')->where('id',$cid)->pluck('title')[0];
            $inserarr = [
                'u_email' => $user_f2_email,
                't_id' => '0',
                'n_type'=>'show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>'Your friend '.$u_email.' is joined by your friends invitation. So you got $0.05 from invitation system!'
            ];
            DB::table('note')->insert($inserarr);
        self::sendNotification($userData->token,'Challenge Invite','Your friend '.$u_email.' is joined by your friends invitation. So you got $0.05 from invitation system!');

                            // $inserarr=[
                            //     'u_id'=>$user2_f_id,
                            //     'amount'=>0.02,
                            //     'friend_email1'=>$u_email,
                            //     'friend_email2'=>$user_f2_email
                            // ];

                            // DB::table('invitation')->insert($inserarr);
        }
 //------------------------invite_challenge_end-------------------------------//
        $this->response(1,'Successful Join',$tid);

    }

    public function getInvite(){
        $data=Input::all();
        $email=$data['email'];
        $uid=DB::table('users')->where('email',$email)
        ->pluck('no')[0];
        if(!empty($uid)){
            $senddata=DB::table('invite')
                ->where('user_id',$uid)
                ->get();
            $this->response(1,'Success',$senddata);
        }
        else{
            $this->response(1,'There is any friend invited',$email);
        }
    }
    public function getCInvite(){
        $data=Input::all();
        $email=$data['email'];
        $uid=DB::table('users')->where('email',$email)
            ->pluck('no')[0];
        if(!empty($uid)){
            $senddata=DB::table('invite_friend')
                ->where('user_id',$uid)
                ->get();
            $this->response(1,'Success',$senddata);
        }
        else{
            $this->response(1,'There is any friend invited',$email);
        }
    }
    public function getNotification(Request $request){
        $uid=$request->uid;
        $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        $notification=DB::table('note')->orderBy('n_date','desc')->where([['u_email',$u_email],['status' , '0']])->get();
        if (!empty($notification)){
            $this->response(1,'Success Get Note Data',$notification);
        }

        else{
            $this->response(200,'Success NULL',NULL);
        }
    }

    public function clearNotification(Request $request){
        $uid=$request->uid;
        $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        DB::table('note')
                 ->where('u_email', $u_email)
                 ->update([
                 'status' => '1'
            ]);
        $this->response(1,'Notification clear successfully','');
    }

//-------------------------initial_page--------------------------//
    //  public function gallary_images(){
    //   if (Session::get('login_flag')=='login') return redirect('shop');
    //      $imgurl = array();
    //         $images=DB::table('image')->get();
    //         $imgcount=count($images);
    //         if($imgcount%100==0)
    //         {
    //             $page_number=$imgcount/100;
    //         }
    //         else
    //         {
    //             $x=$imgcount%100;
    //             $page_number=($imgcount-$x)/100+1;
    //         }
    //         $total_search=$imgcount;

    //         if(count($images)<101)
    //         {
    //             $imgurl=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('url');
    //             $imgname=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('imgname');
    //             $imgid=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('id');
    //             $count2=count($imgurl)-1;$count1=0;
    //         }
    //         else
    //         {
    //             $imgurl=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('url');
    //             $imgname=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('imgname');
    //             $imgid=DB::table('image')->where('state',NULL)->orderby('vote','desc')->pluck('id');
    //             $count2=11;$count1=0;
    //         }
    //     return view('shop/gallary',compact('imgurl','count1','count2','imgname','page_number','imgid'));
    // }

    public function gallary_images()
    {
       if (Session::get('login_flag')=='login') return redirect('shop');
            $images=DB::table('image')->get();
            $imgcount=count($images);
            if($imgcount%100==0)
            {
                $page_number=$imgcount/100;
            }
            else
            {
                $x=$imgcount%100;
                $page_number=($imgcount-$x)/100+1;
            }
            $total_search=$imgcount;

            if(count($images)<101)
            {
                $imgurl=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('id');
                $count2=count($imgurl)-1;$count1=0;
            }
            else
            {
                $imgurl=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where('state',NULL)->orderBy('upload_date','desc')->pluck('id');
                $count2=100;$count1=0;
            }
        return view('shop/gallary',compact('imgurl','count1','count2','imgname','page_number','imgid'));
         // return view('shop/shop',compact('imgurl','count1','count2','imgname','page_number','imgid','imgurl1','u_image','cart_count'));
    }


    public function init_shoppage()
    {
        $imgurl = array();
       if (Session::get('login_flag')!='login') return redirect('landing');

            $uid=$_COOKIE['id'];
            $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
            $cart_image = DB::table('bid')->where([['buyer_id',$uid],['admin_approve','Accepted'],['state','Accepted']])->get();
            $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];

            $cart_count=count($cart_image);
            $images=DB::table('image')->get();
            $imgcount=count($images);
            if($imgcount%100==0)
            {
                $page_number=$imgcount/100;
            }
            else
            {
                $x=$imgcount%100;
                $page_number=($imgcount-$x)/100+1;
            }
            $total_search=$imgcount;

            if(count($images)<101)
            {
                $imgurl=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('id');
                $count2=count($imgurl)-1;$count1=0;
            }
            else
            {
                $imgurl=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('id');
                $count2=100;$count1=0;
            }
        return view('shop/shop',compact('imgurl','count1','count2','imgname','page_number','imgid','u_image','cart_count','cart_image','u_name'));
         // return view('shop/shop',compact('imgurl','count1','count2','imgname','page_number','imgid','imgurl1','u_image','cart_count'));
    }
    public function init_shoppagedm()
    {
        $imgurl = array();
       if (Session::get('login_flag')!='login') return redirect('landing');

            $uid=$_COOKIE['id'];
            $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
            $cart_image = DB::table('bid')->where([['buyer_id',$uid],['admin_approve','Accepted'],['state','Accepted']])->get();
            $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];

            $cart_count=count($cart_image);
            $images=DB::table('image')->get();
            $imgcount=count($images);
            if($imgcount%100==0)
            {
                $page_number=$imgcount/100;
            }
            else
            {
                $x=$imgcount%100;
                $page_number=($imgcount-$x)/100+1;
            }
            $total_search=$imgcount;

            if(count($images)<101)
            {
                $imgurl=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('id');
                $count2=count($imgurl)-1;$count1=0;
            }
            else
            {
                $imgurl=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('url');
                $imgname=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('imgname');
                $imgid=DB::table('image')->where([['like','<>','0'],['state',NULL]])->orderBy('upload_date','desc')->pluck('id');
                $count2=100;$count1=0;
            }
        return view('shop/shopdm',compact('imgurl','count1','count2','imgname','page_number','imgid','u_image','cart_count','cart_image','u_name'));
         // return view('shop/shop',compact('imgurl','count1','count2','imgname','page_number','imgid','imgurl1','u_image','cart_count'));
    }
    public function upload_image(Request $request){
       // phpinfo();
        $uid=$request->uid;
        $destinationPath = '/home/jack/public_html/public/uploads/images/';
        $destinationPath2 = 'https://urpixpays.com/public/uploads/images/';
        $avatar = $request->image;
        if ($avatar){

             foreach ($request->image as $key => $value) {
                $dat = $value['source'];
                $c = $value['filesize'];

                $image_name = time().$c.'.jpg';
                $pah ="/home/jack/public_html/public/uploads/images/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);



            Image::make($pah)->save('/home/jack/public_html/public/uploads/images/' . $image_name )->encode('jpg', 75);

            // DB::table('image')
            //     ->where('id',$id )
            //     ->update(['url' => $imageurl]);



              $data = array('url' => $destinationPath2.$image_name,'imgname'=>$image_name,
                'u-id'=>$uid
            );

            DB::table('image')->insert($data);
            }






            return response()->json($destinationPath2.$image_name);
        }
             return response()->json('Some error occure');
    }
    public function php_info_test(){
        phpinfo();
    }

    public function auction($iid)
    {
             $check=DB::table('bid')->where('img_id',$iid)->get();
             if(count($check)>0){
                 $data['top_bid'] = DB::table('bid')->where('img_id',$iid)->max('price');
             }
             else{
                 $data['top_bid']= '0.99';
             }
             $data['min_bid'] = '0.99';
             $data['img_url']   =DB::table('image')->where('id',$iid)->pluck('url')[0];
             $data['img_name']  =DB::table('image')->where('id',$iid)->pluck('imgname')[0];
             $data['img_id']    =$iid;
             $data['img_date']  =DB::table('image')->where('id',$iid)->pluck('upload_date')[0];
             $data['seller_id'] =DB::table('image')->where('id',$iid)->pluck('u-id')[0];
             $data['u_name']    =DB::table('users')->where('no',$data['seller_id'])->pluck('name')[0];
        return response()->json($data);
    }
    public function portfolio($uid,$fid = 1)
    {
        $image_item = '';
        $data['u_profile']  =@DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data['u_name']     =@DB::table('users')->where('no',$uid)->pluck('name')[0];
        $cover_img     =@DB::table('users')->where('no',$uid)->pluck('cover_img')[0];
        $data['country']     =@DB::table('users')->where('no',$uid)->pluck('country')[0];
        $data['no']     =@DB::table('users')->where('no',$uid)->pluck('no')[0];

        if($cover_img != ''){
            $data['cover'] = 'https://urpixpays.com/public/images/profile_pictures/'.$cover_img;
        }
        else{
            $data['cover'] = 'https://urpixpays.com/public/defaultbanner/defaultwall.jpg';

        }
        $data['about_user']     =@DB::table('users')->where('no',$uid)->pluck('about_user')[0];
        $data['userpix'] = DB::table('userpix')->where('u-id',$uid)->first();
        $data['rank']     = @DB::table('userpix')->where('no',$uid)->pluck('rank')[0];
        $data['images'] = UserImage::with(['imageLikes' => function ($query) use ($uid) {
                $query->where('user_id',$uid);
        }])->where('u-id',$uid)->orderBy('vote','desc')->get();

        $userfollow = Follower::where(['user_id'=>$uid,'follower_id'=>$fid])->first();
        $data['following'] = $userfollow;

      $this->response(1,'success',$data);
    }
     public function PortfolioSearch($uid,$fid=1)
    {
        // $this->response(1,'success',$uid);
        $image_item = '';
        $searchResult = @DB::table('users')->where('no',$uid)->orWhere(function ($q) use ($uid) {
               $q->orWhere('name','LIKE', '%' . $uid . '%')->orWhere('email',$uid); })->first();
        $data['u_profile']  =$searchResult->profile_image;
        $data['u_name']     =$searchResult->name;
        $cover_img     =$searchResult->cover_img;
        $data['country']     =$searchResult->country;
$data['no']     =$searchResult->no;
        if($cover_img != ''){
            $data['cover'] = 'https://urpixpays.com/public/images/profile_pictures/'.$cover_img;
        }
        else{
           $data['cover'] = 'https://urpixpays.com/public/defaultbanner/defaultwall.jpg';
        }
        $data['about_user']     =$searchResult->about_user;
        $data['userpix'] = DB::table('userpix')->where('u-id',$searchResult->no)->first();
        $data['rank']     = @DB::table('userpix')->where('no',$searchResult->no)->pluck('rank')[0];
        $data['images'] = UserImage::with(['imageLikes' => function ($query) use ($uid) {
                $query->where('user_id',$uid);
        }])->where('u-id',$uid)->orderBy('vote','desc')->get();
        $userfollow = Follower::where(['user_id'=>$searchResult->no,'follower_id'=>$fid])->first();
        $data['following'] = $userfollow;


      $this->response(1,'success',$data);
    }

    public function PortfolioSearchUsers($uid,$fid=1)
    {
        // $this->response(1,'success',$uid);
        $image_item = '';
        $searchResult = @DB::table('users')->where('no',$uid)->orWhere(function ($q) use ($uid) {
               $q->orWhere('name','LIKE', '%' . $uid . '%')->orWhere('email',$uid); })->first();
        $data['u_profile']  =$searchResult->profile_image;
        $data['u_name']     =$searchResult->name;
        $cover_img     =$searchResult->cover_img;
        $data['country']     =$searchResult->country;
$data['no']     =$searchResult->no;
        if($cover_img != ''){
            $data['cover'] = 'https://urpixpays.com/public/images/profile_pictures/'.$cover_img;
        }
        else{
           $data['cover'] = 'https://urpixpays.com/public/defaultbanner/defaultwall.jpg';
        }
        $data['about_user']     =$searchResult->about_user;
        $data['userpix'] = DB::table('userpix')->where('u-id',$searchResult->no)->first();
        $data['rank']     = @DB::table('userpix')->where('no',$searchResult->no)->pluck('rank')[0];
        $data['images'] = UserImage::with(['imageLikes' => function ($query) use ($uid) {
                $query->where('user_id',$uid);
        }])->where('u-id',$uid)->orderBy('vote','desc')->get();
        $userfollow = Follower::where(['user_id'=>$searchResult->no,'follower_id'=>$fid])->first();
        $data['following'] = $userfollow;


      $this->response(1,'success',$data);
    }














//-----------------------------add_shop_get----------------------------------//
    public function shopimage($uid ,$page= '1', $sort= 'latest', $search= '')
    {
        // return $request->all();
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
        $data=input::all();
        $keyword=$search;
        $option=$sort;
        $btn_num=$page;
        $image_item = '';

        $cart_image=DB::table('bid')->where([['buyer_id',$uid],['admin_approve','Accepted'],['state','Accepted']])->paginate(16);
        $cart_count=count($cart_image);
        $sort = array('latest' => 'Sort by latest','popularity'=> 'Sort by popularity', 'rating'=> 'Sort by average rating', 'lowtohigh'=> 'Sort by price:low to high', 'hightolow'=> 'Sort by price:high to low');
        $group_number=0;
        if($option=="popularity"){
            $imgs=DB::table('image')->select('id','url','imgname','price')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])
            ->orderBy('vote','desc')->paginate(16);
        }
        if($option=="rating"){
            $imgs=DB::table('image')->select('id','url','imgname','price')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])
            ->orderBy('like','desc')->paginate(16);
        }
        if($option=="latest"){
            $imgs=DB::table('image')->select('id','url','imgname','price')->where([['imgname', 'LIKE', "%{$keyword}%"],['state',NULL]])
            ->orderBy('id','desc')->paginate(16);
        }
        if($option=="lowtohigh"){
            $imgs=DB::table('image')->select('id','url','imgname','price')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])
            ->orderBy('price','asc')->paginate(16);
        }
        if($option=="hightolow"){
            $imgs=DB::table('image')->select('id','url','imgname','price')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])
            ->orderBy('price','desc')->paginate(16);

        }
        $imgcount=count($imgs);
        if($imgcount%100==0)
        {
            $page_number=$imgcount/100;
        }
        else
        {
            $x=$imgcount%100;
            $page_number=($imgcount-$x)/100+1;
        }
        if($imgcount<101)
        {
            $image=$imgs;
            $count1=0;$count2=$imgcount;
        }
        else
        {
            $image=$imgs;
            $count1=0;$count2=100;
        }

        if($btn_num!=1)
        {
            if($imgcount>($btn_num-1)*100)
            {
                $count1=100*($btn_num-1);
                if($btn_num*100<$imgcount+1)
                {
                    $count2=$btn_num*100;
                }
                else
                {
                    $count2=$imgcount;
                }
            }
      }
        foreach ($imgs as $key => $value) {
            $maxprice =  DB::table('bid')->select('price')->where('img_id','=',$value->id)->max('price');
            $imgs[$key]->maxprice = $maxprice;
        }
        $data1['sort']= $sort;
        $data1['imgurl']=$imgs;
        $data1['count1']=$count1;
        $data1['count2']=$count2;
        $data1['page_number']=$page_number;
        $data1['total_search']=$imgcount;
        $data1['cart_count']=$cart_count;
        $data1['pagiLink']=$imgs->links();
        $this->response(1,'success',$data1);

    }

//--------------------------------end-----------------------------------------//
    public function add_cart()
    {
        $data=Input::all();
        $img_id=$data['img_id'];
        $flag=$data['flag'];
        $uid=$_COOKIE['id'];
        if($flag=="add")
        {
            $s=DB::table('cart')->where('img_id',$img_id)->get();
            if(count($s)==0){
            $inserarr=[
                'img_id'=>$img_id,
                'uid'=>$uid,
                'img_num'=>1,
            ];
            DB::table('cart')->insert($inserarr);
            DB::table('image')->where('id',$img_id)->update(['state'=>'carted']);
            }
        }
        if($flag=="delete")
        {
            DB::table('cart')
                ->where('img_id',$img_id)
                ->delete();
            DB::table('image')->where('id',$img_id)->update(['state'=>NULL]);
        }
        $this->response(1,'success',$data);
    }
    public function cart($uid)
    {

        $data['$cart_image'] = DB::table('bid')->select('image.*','bid.*')->join('image','image.id','=','bid.img_id')->where([['bid.buyer_id',$uid],['bid.admin_approve','Accepted'],['bid.state','Accepted']])->get();
            // dd($cart_image);
        // $data['imgurl'] = DB::table('cart')
        //     ->where('uid',$uid)
        //     ->join('image','image.id','cart.img_id')
        //     ->pluck('url');
        // $data['imgname'] = DB::table('cart')
        //     ->where('uid',$uid)
        //     ->join('image','image.id','cart.img_id')
        //     ->pluck('imgname');
        // $data['length'] =count($data['imgurl']);
        // // dd($cart_image);
        // // if($length==0)
        // // {
        // //     return redirect('/shop');
        // // }
        // $data['count1'] =0;$count2=$data['length'];

        return response()->json($data);
        // return view('shop/cart',compact('imgurl','imgname','count1','count2','u_image','cart_image','uid','u_name'));
    }

    public function order_complete(){
        return view('shop/thanks');
    }
    public function order_failed(){
        return view('shop/failed');
    }
    public function payment()
    {
        $uid=$_COOKIE['id'];
        $u_name=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $u_image=DB::table('users')->where('no',$uid)->pluck('profile_image')[0];
         return view('shop/payment',compact('u_image','u_name'));
    }
    public function withdraw_request(Request $request)
    {
        $uid=$request->uid;
        $amount=$request->amount;
        $account=$request->account_info;
        $description=$request->description;
        //$method='Paypal';
        $method=$request->type_name;

        $balence=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $request_balence=DB::table('withdraw')->where('user_id',$uid)->get();
        if(count($request_balence)>0){
            foreach($request_balence as $rows){
                $req=$rows->amount;
                $balence=$balence-$req;
            }
        }

        $username=DB::table('users')->where('no',$uid)->pluck('name')[0];
        $inserarr=[
            'user_id'=>$uid,
            'username'=>$username,
            'amount'=>$amount,
            'account'=>$account,
            'method'=>$method,
            'before'=>$balence,
            'after'=>$balence-$amount,
            'description'=>$description
        ];
        DB::table('withdraw')->insert($inserarr);
        $date=Carbon::now();
        $inserarr = [
            'u_email' => 'info@urpixpays.com',
            't_id' => '0000',
            'n_type'=>'bid_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>$username.' has requested to withdrawal $'.$amount.' with '.$method
        ];
        DB::table('note')->insert($inserarr);
        // self::sendNotification($userData->token,'Challenge Invite','Your friend '.$u_email.' is joined by your friends invitation. So you got $0.05 from invitation system!');

        $to = 'urpixpays@gmail.com';
        $subject = "Urpixpays Withdrawal Notification";
        $txt = "Dear Urpixpays.com,\n\n\n".$username." requested to withdrawal $".$amount." with ".$method;
        $headers = "From: info@urpixpays.com" . "\r\n";
        mail($to,$subject,$txt,$headers);

         $this->response(1,'success','');
    }

    public function saveProfile(Request $request){
        $uid=$request->uid;
        $name=$request->name;
        $email=$request->email;
        $city=$request->city;
        $country=$request->country;
        $age=$request->age;
        $password =$request->password;
        $about_user =$request->about_user;

        DB::table('users')
            ->where('no',$uid )
                ->update([
                'name'    =>$name,
                'age'     =>$age,
                'email'   =>$email,
                'country' =>$country,
                'city'    =>$city,
                'password'=>md5($password),
                'pass'=>$password,
                'about_user'=>$about_user
            ]);

         $this->response(200,'profile update successfully','');
    }
    public function saveProfilepic(Request $request){


             //File::delete($filename);
                $uid=$request->uid;
                foreach ($request->image as $key => $value) {
                $dat = $value['source'];
                $c = $value['filesize'];

                $image_name = time().$c.'.png';
                $pah ="/home/jack/public_html/public/images/profile_pictures/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);

            DB::table('users')
                 ->where('no', $uid)
                 ->update([
                 'profile_image' => $image_name
            ]);
            }




           $response = ['success'=>true, 'data'=>'profile update successfully'];
                 return response()->json($response, 200);
    }
    public function savecover(Request $request){


           $uid=$request->uid;
                foreach ($request->image as $key => $value) {
                $dat = $value['source'];
                $c = $value['filesize'];

                $image_name = time().$c.'.png';
                $pah ="/home/jack/public_html/public/images/profile_pictures/".$image_name;

                $image =base64_decode($dat);

                $fp=fopen($pah,'wb+');
                fwrite($fp, $image);
                fclose($fp);

            DB::table('users')
                 ->where('no', $uid)
                 ->update([
                 'cover_img' => $image_name
            ]);
            }




           $response = ['success'=>true, 'data'=>'Cover update successfully'];
                 return response()->json($response, 200);
    }
     public function savebid(Request $request){
        //  $sellerUser=DB::table('users')->where('no',$request->buyer_id)->get();
        //  self::sendNotification($sellerUser[0]->token,'Bid Notification','Someone has placed a bid on your photo!');

        //   $this->response(200,$sellerUser[0]->token,'');
        //   return;
        $buyer_id     = $request->buyer_id;
        $img_id       = $request->img_id;
        $price        = $request->bid_amount;
        $seller_id    = $request->seller_id;
        $seller_email = DB::table('users')->where('no',$seller_id)->pluck('email')[0];
        $img_url      = DB::table('image')->where('id',$img_id)->pluck('url')[0];
        $buyer_email  = DB::table('users')->where('no',$buyer_id)->pluck('email')[0];


        $inserarr=[
            'seller_id'=>$seller_id,
            'seller_email'=>$seller_email,
            'price'=>$price,
            'buyer_id'=>$buyer_id,
            'buyer_email'=>$buyer_email,
            'img_id'=>$img_id,
            'url'=>$img_url
        ];
        DB::table('bid')->insert($inserarr);

        $t_id=DB::table('userpix')->where('u-id',$seller_id)->pluck('no')[0];
        $date=Carbon::now();


        $inserarr = [
            'u_email' => $seller_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Someone has placed a bid on your photo!'
        ];
        DB::table('note')->insert($inserarr);
        $sellerUser=User::find($request->seller_id);
        self::sendNotification($sellerUser->token,'Bid Notification','Someone has placed a bid on your photo!');

        $seller_name = DB::table('users')->where('email',$seller_email)->pluck('name')[0];
        $buyer_name = DB::table('users')->where('email', $buyer_email)->pluck('name')[0];

        $inserarr = [
            'u_email' => 'info@urpixpays.com',
            't_id' => '0000',
            'n_type'=>'bid_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>$buyer_name.' has placed a bid on '.$seller_name.' photo!'
        ];
          $buyerBid=User::find($request->buyer_id);
        // self::sendNotification($buyerBid->token,'bid show',$buyer_name.' has placed a bid on '.$seller_name.' photo!');


        DB::table('note')->insert($inserarr);

        $to = 'urpixpays@gmail.com';
        $subject = "Urpixpays Image Bid Notification";
        $txt = "Dear Urpixpays.com,\n\n\n".$buyer_name." placed a bid on ".$seller_name." photo at Urpixpays.com.";
        $headers = "From: info@urpixpays.com" . "\r\n";
        mail($to,$subject,$txt,$headers);

        $to = $seller_email;
        $subject = "Urpixpays Image Bid Notification";
        $txt = "Dear UrPixPays user,\n\n\nSomeone has placed a bid on your photo at Urpixpays.com. You can accept or reject the bid by logging into your account.\n\nPlease do note that the transaction is not complete until Urpixpays admin approves it.\n\nFurthermore, as a seller, you must also be able to provide proof of the ownership of the photo and have completed and signed copyright and transfer of ownership form.\n\nThank you\nUrpixpays team";
        $headers = "From: urpixpays@gmail.com" . "\r\n";
        mail($to,$subject,$txt,$headers);

        $to = $buyer_email;
        $subject = "Urpixpays Image Bid Notification";
        $txt = "Dear Urpixpays user,\n\n\nThis email is to confirm that you have placed a bid at https://urpixpays.com.  You will receive another email once the seller and Urpixpays admin approve your bid.\n\nYou may visit our website ( https://urpixpays.com/bidding ) to know the status of your bid.\n\nSincerely\nUrpixpays team\n\nHave any questions?\nEmail at info@urpixpays.com\n\nBy placing a bid, you're committing to buy this item once the seller and admin accept your bid.";
        $headers = "From: urpixpays@gmail.com" . "\r\n";
        mail($to,$subject,$txt,$headers);
        $this->response(200,'Bid Send successfully','');
    }

    public function sendNotification($token,$title,$body,$screen)
        {
            $url = "https://fcm.googleapis.com/fcm/send";
            // $registrationIds = array($id);
            $serverKey ='AAAACrZVJ-o:APA91bHVzQwrK3rg9zMESOyL6xEgPL9dni9od9IqKdjXmNCe2J0kXpZRFg_ZauVzz6j9M0t9PCzXZJUB2Q8Kadcx0w6RwjuwwYIjzKDL9pF4dhBP4pq5xGXhCjK8YUDUTHGEoH5nzMQ_';


            $token=$token;

            $notification = [
                'title' => $title,
                'sound' => true,
                'channel'=> 'default',
                'body'=> $body,
                'icon'=>'ic_launcher_round',
                'sound'=>"default",
                'priority'=> "high",
                'show_in_foreground'=>true,
            ];

            $extraNotificationData = ["message" => $notification,"moredata" =>$screen];

            $fcmNotification = [
                //'registration_ids' => $tokenList, //multple token array
                'to'        => $token, //single token
                'content_available'=>true,
                'notification' => $notification,
                'data' => $extraNotificationData
            ];





            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key='. $serverKey;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            //Send the request
            $result = curl_exec($ch);
            if ($result === FALSE)
            {
                die('FCM Send Error: ' . curl_error($ch));
            }

            curl_close( $ch );
            return 'true';
        }
    public function processNotification(){
        $data=Input::all();
        $note=$data['note'];
        switch ($note['n_type']){
            case "invite_challenge":
                $cid=DB::table('invite_challenge')
                    ->where('id',$note['t_id'])
                    ->pluck('c_id')[0];
                $url=url('/challenges/invited/'.$cid);
                $this->response(1,'There is any friend invited',$url);
                break;
            case "userpix_show":
                DB::table('note')
                    ->where('n_id',$note['n_id'])
                    ->delete();
                $this->response(3,'Success',NULL);
            case "show":
                DB::table('note')
                    ->where('n_id',$note['n_id'])
                    ->delete();
                $this->response(2,'Success',NULL);
            default:
                $this->response(200,'There is any friend invited',$note);
                break;
        }
//        $uid=DB::table('users')->where('email',$email)
//            ->pluck('no')[0];
//        if(!empty($uid)){
//            $senddata=DB::table('invite_friend')
//                ->where('user_id',$uid)
//                ->get();
//            $this->response(1,'Success',$senddata);
//        }
//        else{
//            $this->response(1,'There is any friend invited',$email);
//        }

    }

    public function user_token(Request $request){
        $uid=$request->uid;
        $token=$request->token;
        DB::table('users')
                ->where('no', $uid)
                ->update(['token' => $token]);
        $this->response(200,'token saved successfully',$token);
    }
    public function user_token_access($uid){
        $token = DB::table('users')->where('no',$uid)->pluck('token')[0];
        $this->response(200,'success',$token);
    }

      public function countries(){
           $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        $this->response(1,'Success',$countries);

      }
    public function SaveOrCheckAppleId (Request $request){
       $appleId  = new appleid;
       $appleId->mobileid =$request->mobileId;
       $appleId->email = $request->email;
       $appleId->name = $request->name;
       $appleId->save();

        return response()->json(['success'=>true,'data'=>$appleId,202]);
    }
     public function GetAppleEmail (Request $request){
       $appleId  = appleid::where('mobileid',$request->mobileid)->get()->first();

    if($appleId){
       return response()->json(['success'=>true,'data'=>$appleId,202]);
    }else{
        return response()->json(['success'=>false,'data'=>$appleId,202]);
    }

    }
     public function about_user(Request $request){
        $data=$request->all();
        $email=$data['email'];
        $aboutuser=$data['aboutuser'];
         @DB::table('users')
                ->where('email', $email)
                ->update([
                    'about_user' => $aboutuser
                ]);
        $this->response(1,"success",$email);
    }

    public function checkVersion(Request $request) {

        $checkAppVersion = DB::table('appversions')->first();
        // return response()->json($request->all());
        if($checkAppVersion->version == $request->version){
             $this->response(1,"success",'$email');
        }else{
             $this->response(0,"fail",'$email');
        }

    }
    public function removeFcmToken($id) {

        $user = DB::table('users')
              ->where('no', $id)
              ->update(['token' => '']);
        return $user;

    }

    public function deactivateAccountRequest (Request $request){

           $checkDeactivateRequest = DeactiveRequest::where('user_id',$request->id)->first();
           if(!$checkDeactivateRequest){
                $deactivateRequest = new DeactiveRequest;
           $deactivateRequest->user_id=$request->id;
           $deactivateRequest->save();
                $user = User::find($request->id);
                $to = 'urpixpays@gmail.com';
                $subject = "Account Deactivation";
                   $txt =  $user->name."  \n\nWould like to deactive his UrPixpays Account his email address is  ".$user->email;
                $headers = "From: urpixpays@gmail.com";
                mail($to,$subject,$txt,$headers);
           }


               $this->response(1,"success",'$email');
    }



}

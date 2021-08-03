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
use Illuminate\Support\Facades\File as LaraFile;
class MlmController extends Controller
{
    public function __construct()
    {

    }
    public function response($state, $message, $data){
        $senddate['state']=$state;
        $senddate['message']=$message;
        $senddate['data']=$data;
        print_r(json_encode($senddate));
    }
    public static function getuser_name($id){
        $name = DB::table('users')->where('no',$id)->pluck('name')[0];
        return $name;
    }
    public static function getusernamep(Request $request){
        $refrenceid = $request->refrenceid;
        $name = DB::table('users')->where('no',$refrenceid)->pluck('name')[0];
        return $name;
    }
    public static function getuser_name_img($id){
        $name = DB::table('users')->where('no',$id)->pluck('profile_image')[0];
        return "https://urpixpays.com/public/images/profile_pictures/".$name;
    }
    public static function getuser_status($id){
        $uid = $_COOKIE['id'];
        $p_status = DB::table('mlm')->where('uid',$uid)->pluck('p_status')[0];
        if($p_status == 'free'){
            echo '<a class="btn btn-sm btn-success box-shadow-2 round btn-min-width" href="https://urpixpays.com/becomepaid" style="margin-top: 17px;    margin-left: 10px;">Become our Paid Member </a>';
        }
    }
    public function dashborad(){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid = $_COOKIE['id'];
        $user_mlm = DB::table('mlm')->where('uid',$uid)->first();
        if(empty($user_mlm)) return redirect('super9_refer');
        $walet = @DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $paid_st = @DB::table('userpix')->where('u-id',$uid)->pluck('mlm')[0];
        $total_child = DB::table('mlm')->where(['pid' => $uid])->count();
        $mlm_transection = DB::table('mlm_transection')->where('uid',$uid)->get();
        $title = 'Dashborad';
        return view('mlm.data.index',compact('title','uid', 'user_mlm', 'walet', 'total_child', 'paid_st', 'mlm_transection'));

    }
    public function becomepaid(){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid = $_COOKIE['id'];
        $title = 'Dashborad';
        return view('mlm.layout.becomepaid',compact('title'));

    }
    public function mlmWallet(){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid = $_COOKIE['id'];
        $walet = DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $withdraw = DB::table('withdraw')->where('user_id',$uid)->get();
        $title = 'User Wallet';
        return view('mlm.data.my_wallet',compact('title','uid', 'walet', 'withdraw'));

    }
    public function comission_history(){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid = $_COOKIE['id'];
        $mlm_transection = DB::table('mlm_transection')->where('uid',$uid)->get();
        $title = 'Comission History';
        return view('mlm.data.comission_history',compact('title','uid', 'mlm_transection'));

    }
    public function mlmrewards(){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $uid = $_COOKIE['id'];
        $user_mlm = DB::table('mlm')->where('uid',$uid)->first();
        if(empty($user_mlm)) return redirect('super9_refer');
        $walet = DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
        $paid_st = DB::table('userpix')->where('u-id',$uid)->pluck('mlm')[0];
        $total_child = DB::table('mlm')->where(['pid' => $uid])->count();
        $paid_st = DB::table('userpix')->where('u-id',$uid)->first();
        $mlm_transection = DB::table('mlm_transection')->where('uid',$uid)->get();
        $title = 'Refferal Rewards';
        return view('mlm.data.refferal_rewards',compact('title','uid', 'paid_st', 'walet', 'paid_st', 'total_child','user_mlm'));

    }
    public function rewards_update($uid){
        $totallink = DB::table('mlm')->where('uid',$uid)->pluck('totallink')[0];
        if($totallink >= 5 && $totallink <= 9){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','5'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>5,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+1;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+3;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 10 && $totallink <= 24){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','10'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>10,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+5;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+6;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 25 && $totallink <= 49){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','25'],])->pluck('status')[0];
            if($mlm_rewards == NULL  ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>25,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+10;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 50 && $totallink <= 99){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','50'],])->pluck('status')[0];
            if($mlm_rewards == NULL  ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>50,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+15;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+15;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 100 && $totallink <= 499){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','100'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>100,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+25;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+20;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 500 && $totallink <= 999){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','500'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>500,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+50;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+25;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);
            }
        }
        if($totallink >= 1000 && $totallink <= 4999){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','1000'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>1000,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+100;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);
            }
        }
        if($totallink >= 5000 && $totallink <= 9999){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','5000'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>5000,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+500;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);
            }
        }
        if($totallink >= 10000 ){
            $mlm_rewards=@DB::table('mlm_rewards')->where([['uid',$uid],['reward','10000'],])->pluck('status')[0];
            if($mlm_rewards == NULL ){
                $inserarr=[
                    'uid'=>$uid,
                    'reward'=>10000,
                    'status'=>1
                ];
                @DB::table('mlm_rewards')->insert($inserarr);
                // adding wallet
                $waletr=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
                $waletrr = $waletr+1000;
                DB::table('userpix')->where('u-id',$uid)->update(['walet'=>$waletrr]);
            }
        }
    }
    public function user_mlmtree($uid){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $parent = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('uid',$uid)->get();
        $sub_Child = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$uid)->get();
        $sub_Child = json_decode(json_encode($sub_Child), true);
        
        foreach ($sub_Child as $key1 => $value1) {
            $sub_Child1 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value1['uid'])->get();
            $sub_Child1 = json_decode(json_encode($sub_Child1), true);
            if(!empty($sub_Child1)){

                $sub_Child[$key1]['subchild'] = $sub_Child1;
                // ========================= 3rd ===============================
                
                foreach ($sub_Child1 as $key2 => $value2) {
                    
                    $sub_Child2 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value2['uid'])->get();
                    $sub_Child2 = json_decode(json_encode($sub_Child2), true);
                    if(!empty($sub_Child2)){
                        $sub_Child[$key1]['subchild'][$key2]['subchild'] = $sub_Child2;
                        // ============================== 4th ======================
                        foreach ($sub_Child2 as $key3 => $value3) {
                            $sub_Child3 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value3['uid'])->get();
                            $sub_Child3 = json_decode(json_encode($sub_Child3), true);
                            if(!empty($sub_Child3)){
                                $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'] = $sub_Child3;
                                // =========================== 5th ==========================
                                foreach ($sub_Child3 as $key4 => $value4) {
                                    $sub_Child4 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value4['uid'])->get();
                                    $sub_Child4 = json_decode(json_encode($sub_Child4), true);
                                    if(!empty($sub_Child4)){
                                        $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'][$key4]['subchild'] = $sub_Child4;
                                        // ===================== 6th ==========================
                                        foreach ($sub_Child4 as $key5 => $value5) {
                                            $sub_Child5 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value5['uid'])->get();
                                            $sub_Child5 = json_decode(json_encode($sub_Child5), true);
                                            if(!empty($sub_Child5)){
                                                $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'][$key4]['subchild'][$key5]['subchild'] = $sub_Child5;
                                                // ===================== 7th ==========================
                                                foreach ($sub_Child5 as $key6 => $value6) {
                                                    $sub_Child6 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value6['uid'])->get();
                                                    $sub_Child6 = json_decode(json_encode($sub_Child6), true);
                                                    if(!empty($sub_Child6)){
                                                        $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'][$key4]['subchild'][$key5]['subchild'][$key6]['subchild'] = $sub_Child6;
                                                        // ===================== 8th ==========================
                                                        foreach ($sub_Child6 as $key7 => $value7) {
                                                            $sub_Child7 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value7['uid'])->get();
                                                            $sub_Child7 = json_decode(json_encode($sub_Child7), true);
                                                            if(!empty($sub_Child7)){
                                                                $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'][$key4]['subchild'][$key5]['subchild'][$key6]['subchild'][$key7]['subchild'] = $sub_Child7;
                                                                // ===================== 9th ==========================
                                                                foreach ($sub_Child7 as $key8 => $value8) {
                                                                    $sub_Child8 = DB::table('mlm')->select('uid', 'pid', 'p_status', 'totallink')->where('pid',$value8['uid'])->get();
                                                                    $sub_Child8 = json_decode(json_encode($sub_Child8), true);
                                                                    if(!empty($sub_Child8)){
                                                                        $sub_Child[$key1]['subchild'][$key2]['subchild'][$key3]['subchild'][$key4]['subchild'][$key5]['subchild'][$key6]['subchild'][$key7]['subchild'][$key8]['subchild'] = $sub_Child8;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
            }
        }

        $total_child = DB::table('mlm')->where(['pid' => $uid])->count();
        $user_mlm = DB::table('mlm')->where('uid',$uid)->first();
        // echo "<pre>";
        // print_r($sub_Child);
        // echo "</pre>";
        // exit();
        $title = 'Dashborad';
        return view('mlm.data.tree',compact('title','parent','sub_Child','total_child', 'user_mlm'));

    }
    public function geologictree($uid){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $geoarray=[];
        $sub_Child = DB::table('mlm')->select('uid')->where('pid',$uid)->get();
        $sub_Child = json_decode(json_encode($sub_Child), true);
        
        foreach ($sub_Child as $key1 => $value1) {
            $geoarray[$key1]['name'] =  $this->getuser_name($value1['uid']);
            $sub_Child1 = DB::table('mlm')->select('uid')->where('pid',$value1['uid'])->get();
            $sub_Child1 = json_decode(json_encode($sub_Child1), true);
            if(!empty($sub_Child1)){

                //$geoarray[$key1]['children'] = $sub_Child1;
                // ========================= 3rd ===============================
                
                foreach ($sub_Child1 as $key2 => $value2) {
                    $geoarray[$key1]['children'][$key2]['name'] =  $this->getuser_name($value2['uid']);

                    $sub_Child2 = DB::table('mlm')->select('uid')->where('pid',$value2['uid'])->get();
                    $sub_Child2 = json_decode(json_encode($sub_Child2), true);
                    if(!empty($sub_Child2)){
                        //$geoarray[$key1]['children'][$key2]['children'] = $sub_Child2;
                        // ============================== 4th ======================
                        foreach ($sub_Child2 as $key3 => $value3) {
                            $geoarray[$key1]['children'][$key2]['children'][$key3]['name'] =  $this->getuser_name($value3['uid']);
                            $sub_Child3 = DB::table('mlm')->select('uid')->where('pid',$value3['uid'])->get();
                            $sub_Child3 = json_decode(json_encode($sub_Child3), true);
                            if(!empty($sub_Child3)){
                                //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'] = $sub_Child3;
                                // =========================== 5th ==========================
                                foreach ($sub_Child3 as $key4 => $value4) {
                                    $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['name'] =  $this->getuser_name($value4['uid']);

                                    $sub_Child4 = DB::table('mlm')->select('uid')->where('pid',$value4['uid'])->get();
                                    $sub_Child4 = json_decode(json_encode($sub_Child4), true);
                                    if(!empty($sub_Child4)){
                                        //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'] = $sub_Child4;
                                        // ===================== 6th ==========================
                                        foreach ($sub_Child4 as $key5 => $value5) {
                                            $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['name'] =  $this->getuser_name($value5['uid']);

                                            $sub_Child5 = DB::table('mlm')->select('uid')->where('pid',$value5['uid'])->get();
                                            $sub_Child5 = json_decode(json_encode($sub_Child5), true);
                                            if(!empty($sub_Child5)){
                                                //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'] = $sub_Child5;
                                                // ===================== 7th ==========================
                                                foreach ($sub_Child5 as $key6 => $value6) {
                                                    $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['name'] =  $this->getuser_name($value6['uid']);

                                                    $sub_Child6 = DB::table('mlm')->select('uid')->where('pid',$value6['uid'])->get();
                                                    $sub_Child6 = json_decode(json_encode($sub_Child6), true);
                                                    if(!empty($sub_Child6)){
                                                        //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'] = $sub_Child6;
                                                        // ===================== 8th ==========================
                                                        foreach ($sub_Child6 as $key7 => $value7) {
                                                            $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['name'] =  $this->getuser_name($value7['uid']);

                                                            $sub_Child7 = DB::table('mlm')->select('uid')->where('pid',$value7['uid'])->get();
                                                            $sub_Child7 = json_decode(json_encode($sub_Child7), true);
                                                            if(!empty($sub_Child7)){
                                                                //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['children'] = $sub_Child7;
                                                                // ===================== 9th ==========================
                                                                foreach ($sub_Child7 as $key8 => $value8) {
                                                                    $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['children'][$key8]['name'] =  $this->getuser_name($value7['uid']);

                                                                    $sub_Child8 = DB::table('mlm')->select('uid')->where('pid',$value8['uid'])->get();
                                                                    $sub_Child8 = json_decode(json_encode($sub_Child8), true);
                                                                    if(!empty($sub_Child8)){
                                                                        //$sub_Child[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['children'][$key8]['children'] = $sub_Child8;
                                                                    }
                                                                    else{
                                                                        $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['children'][$key8]['children'] = [];
                                                                    }

                                                                }
                                                            }
                                                            else{
                                                                $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'][$key7]['children'] = [];
                                                            }
                                                        }
                                                    }
                                                    else{
                                                        $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'][$key6]['children'] = [];
                                                    }
                                                }
                                            }
                                            else{
                                                $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'][$key5]['children'] = [];
                                            }
                                        }
                                    }
                                    else{
                                        $geoarray[$key1]['children'][$key2]['children'][$key3]['children'][$key4]['children'] = [];
                                    }
                                }
                            }
                            else{
                                $geoarray[$key1]['children'][$key2]['children'][$key3]['children'] = [];
                            }
                        }
                    }
                    else{
                        $geoarray[$key1]['children'][$key2]['children'] = [];
                    }
                }
                
            }
            else{
                $geoarray[$key1]['children'] = [];
            }
        }

        $total_child = DB::table('mlm')->where(['pid' => $uid])->count();
        $user_mlm = DB::table('mlm')->where('uid',$uid)->first();
        $treejason = json_encode($geoarray);
        // echo "<pre>";
        // print_r($sub_Child);
        // echo "</pre>";
        // exit();
        $title = 'Team View';
        return view('mlm.data.tree2',compact('uid', 'title','sub_Child','total_child', 'user_mlm', 'treejason'));

    }
    public function refer($ref_id= null){
        if (Session::get('login_flag')!='login') return redirect('landing');
        $title = 'Login Register';
        // return view('user.layout.login_register',compact('title'));
        return view('mlm.layout.login_register',['title'=> $title, 'ref_id'=> $ref_id]);
    }
    public function freeaccount(Request $request){
        $uid = $_COOKIE['id'];
        $refrenceid = $request->refrenceid;
        $total_child = DB::table('mlm')->where(['pid' => $refrenceid])->count();

        if($total_child < 9){
            $inserarr=[
                'uid'=>$uid,
                'pid'=>$refrenceid,
                'linkweight'=>0,
                'referedby'=>$refrenceid,
                'totallink'=>0,
                'p_status'=>'free'
            ];
            DB::table('mlm')->insert($inserarr);
            DB::table('mlm')->where('uid',$refrenceid)
                        ->increment('totallink',1);

            $fstprnt = DB::table('mlm')->where('uid',$refrenceid)->pluck('pid')[0];
            if($fstprnt != '' && $fstprnt != NULL && !empty($fstprnt)){
                DB::table('mlm')->where('uid',$fstprnt)
                        ->increment('totallink',1);
                $scndprnt = @DB::table('mlm')->where('uid',$fstprnt)->pluck('pid')[0];
                // =============================second =====================
                if($scndprnt != '' && $scndprnt != NULL && !empty($scndprnt)){
                    DB::table('mlm')->where('uid',$scndprnt)
                            ->increment('totallink',1);
                    $thirdprnt = @DB::table('mlm')->where('uid',$scndprnt)->pluck('pid')[0];
                    // ======================third =============================
                    if($thirdprnt != '' && $thirdprnt != NULL && !empty($thirdprnt)){
                        DB::table('mlm')->where('uid',$thirdprnt)
                                ->increment('totallink',1);
                        $forthprnt = @DB::table('mlm')->where('uid',$thirdprnt)->pluck('pid')[0];
                        // ========================Forth ===============================
                        if($forthprnt != '' && $forthprnt != NULL && !empty($forthprnt)){
                            DB::table('mlm')->where('uid',$forthprnt)
                                    ->increment('totallink',1);
                            $fiftprnt = @DB::table('mlm')->where('uid',$forthprnt)->pluck('pid')[0];
                            // ====================fifth===================================
                            if($fiftprnt != '' && $fiftprnt != NULL && !empty($fiftprnt)){
                                DB::table('mlm')->where('uid',$fiftprnt)
                                        ->increment('totallink',1);
                                $sixprnt = @DB::table('mlm')->where('uid',$fiftprnt)->pluck('pid')[0];
                                // ========================6th ===============================
                                if($sixprnt != '' && $sixprnt != NULL && !empty($sixprnt)){
                                    DB::table('mlm')->where('uid',$sixprnt)
                                            ->increment('totallink',1);
                                    $sevenprnt = @DB::table('mlm')->where('uid',$sixprnt)->pluck('pid')[0];
                                    // ========================7th ===============================
                                    if($sevenprnt != '' && $sevenprnt != NULL && !empty($sevenprnt)){
                                        DB::table('mlm')->where('uid',$sevenprnt)
                                                ->increment('totallink',1);
                                        $eightprnt = @DB::table('mlm')->where('uid',$sevenprnt)->pluck('pid')[0];
                                        // ========================8th ===============================
                                        if($eightprnt != '' && $eightprnt != NULL && !empty($eightprnt)){
                                            DB::table('mlm')->where('uid',$eightprnt)
                                                    ->increment('totallink',1);
                                            $ninthprnt = @DB::table('mlm')->where('uid',$eightprnt)->pluck('pid')[0];
                                            // ========================9th ===============================
                                            if($ninthprnt != '' && $ninthprnt != NULL && !empty($ninthprnt)){
                                                DB::table('mlm')->where('uid',$ninthprnt)
                                                        ->increment('totallink',1);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }                    
                }
            }
            $email=DB::table('users')->where('no',$uid)->pluck('email');
            $name=DB::table('users')->where('no',$uid)->pluck('name');

            $to = $email;
            $subject = "Urpixpays Free Account";
            $txt = "Dear ".$name.",\n you have successfully created a free account on UrPixPays's Super 9 membership plan.Your sponsor PIXID is  <br>".$refrenceid."</b>\n \n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
            $headers = "From: urpixpays@gmail.com" . "\r\n";

            mail($to,$subject,$txt,$headers);

            $this->response(1,"You have successfully joined Super 9",NULL);
        }
        else{
            $this->response(200,"The refrence already reaches its limit",NULL);
        }
    }

    public function waletaccount(Request $request){
        $uid = $_COOKIE['id'];
        $refrenceid = $request->refrenceid;
        $total_child = DB::table('mlm')->where(['pid' => $refrenceid])->count();

        if($total_child < 9){
            $walet = DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            if($walet >= 9.99){
                $inserarr=[
                    'uid'=>$uid,
                    'pid'=>$refrenceid,
                    'linkweight'=>0,
                    'referedby'=>$refrenceid,
                    'totallink'=>0,
                    'p_status'=>'wallet'
                ];
                DB::table('mlm')->insert($inserarr);
                DB::table('mlm')->where('uid',$refrenceid)
                            ->increment('totallink',1);
                DB::table('userpix')->where('u-id',$uid)
                            ->decrement('walet',9.99);
                DB::table('userpix')->where('u-id',$refrenceid)->update(['mlm'=>1]);

                $waletr=DB::table('userpix')->where('u-id',$refrenceid)->pluck('walet')[0];
                $waletrr = $waletr+2;
                DB::table('userpix')->where('u-id',$refrenceid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);

                $Charge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')[0];
                $Charges = $Charge+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Charge'=>$Charges]);

                $Flip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')[0];
                $Flips = $Flip+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Flip'=>$Flips]);

                $pixpoint=DB::table('userpix')->where('u-id',$uid)->pluck('pixpoint')[0];
                $pixpoints = $pixpoint+999;
                DB::table('userpix')->where('u-id',$uid)->update(['pixpoint'=>$pixpoints]);

                $inserarr=[
                    'uid'=>$refrenceid,
                    'cid'=>$uid,
                    'pid'=>$refrenceid,
                    'amount'=>2,
                    'leval'=>1
                ];
                DB::table('mlm_transection')->insert($inserarr);
                $this->rewards_update($refrenceid);
                $fstprnt = DB::table('mlm')->where('uid',$refrenceid)->pluck('pid')[0];
                if($fstprnt != '' && $fstprnt != NULL && !empty($fstprnt)){
                    DB::table('mlm')->where('uid',$fstprnt)
                            ->increment('totallink',1);

                    $walet1=DB::table('userpix')->where('u-id',$fstprnt)->pluck('walet')[0];
                    $walet11 = $walet1+1.5;
                    DB::table('userpix')->where('u-id',$fstprnt)->update(['walet'=>$walet11]);

                    $inserarr=[
                        'uid'=>$fstprnt,
                        'cid'=>$uid,
                        'pid'=>$refrenceid,
                        'amount'=>1.5,
                        'leval'=>2
                    ];
                    DB::table('mlm_transection')->insert($inserarr);
                    $this->rewards_update($fstprnt);

                    $scndprnt = @DB::table('mlm')->where('uid',$fstprnt)->pluck('pid')[0];
                    // =============================second =====================
                    if($scndprnt != '' && $scndprnt != NULL && !empty($scndprnt)){
                        DB::table('mlm')->where('uid',$scndprnt)
                                ->increment('totallink',1);

                        $walet2=DB::table('userpix')->where('u-id',$scndprnt)->pluck('walet')[0];
                        $walet22 = $walet2+1;
                        DB::table('userpix')->where('u-id',$scndprnt)->update(['walet'=>$walet22]);

                        $inserarr=[
                            'uid'=>$scndprnt,
                            'cid'=>$uid,
                            'pid'=>$refrenceid,
                            'amount'=>1,
                            'leval'=>3
                        ];
                        DB::table('mlm_transection')->insert($inserarr);
                        $this->rewards_update($scndprnt);

                        $thirdprnt = @DB::table('mlm')->where('uid',$scndprnt)->pluck('pid')[0];
                        // ======================third =============================
                        if($thirdprnt != '' && $thirdprnt != NULL && !empty($thirdprnt)){
                            DB::table('mlm')->where('uid',$thirdprnt)
                                    ->increment('totallink',1);

                            $walet3=DB::table('userpix')->where('u-id',$thirdprnt)->pluck('walet')[0];
                            $walet32 = $walet3+.50;
                            DB::table('userpix')->where('u-id',$thirdprnt)->update(['walet'=>$walet32]);

                            $inserarr=[
                                'uid'=>$thirdprnt,
                                'cid'=>$uid,
                                'pid'=>$refrenceid,
                                'amount'=>.50,
                                'leval'=>4
                            ];
                            DB::table('mlm_transection')->insert($inserarr);
                            $this->rewards_update($thirdprnt);

                            $forthprnt = @DB::table('mlm')->where('uid',$thirdprnt)->pluck('pid')[0];
                            // ========================Forth ===============================
                            if($forthprnt != '' && $forthprnt != NULL && !empty($forthprnt)){
                                DB::table('mlm')->where('uid',$forthprnt)
                                        ->increment('totallink',1);

                                $walet4=DB::table('userpix')->where('u-id',$forthprnt)->pluck('walet')[0];
                                $walet42 = $walet4+.25;
                                DB::table('userpix')->where('u-id',$forthprnt)->update(['walet'=>$walet42]);

                                $inserarr=[
                                    'uid'=>$forthprnt,
                                    'cid'=>$uid,
                                    'pid'=>$refrenceid,
                                    'amount'=>.25,
                                    'leval'=>5
                                ];
                                DB::table('mlm_transection')->insert($inserarr);
                                $this->rewards_update($forthprnt);

                                $fiftprnt = @DB::table('mlm')->where('uid',$forthprnt)->pluck('pid')[0];
                                // ====================fifth===================================
                                if($fiftprnt != '' && $fiftprnt != NULL && !empty($fiftprnt)){
                                    DB::table('mlm')->where('uid',$fiftprnt)
                                            ->increment('totallink',1);

                                    $walet5=DB::table('userpix')->where('u-id',$fiftprnt)->pluck('walet')[0];
                                    $walet52 = $walet5+.20;
                                    DB::table('userpix')->where('u-id',$fiftprnt)->update(['walet'=>$walet52]);

                                    $inserarr=[
                                        'uid'=>$fiftprnt,
                                        'cid'=>$uid,
                                        'pid'=>$refrenceid,
                                        'amount'=>.20,
                                        'leval'=>6
                                    ];
                                    DB::table('mlm_transection')->insert($inserarr);
                                    $this->rewards_update($fiftprnt);

                                    $sixprnt = @DB::table('mlm')->where('uid',$fiftprnt)->pluck('pid')[0];
                                    // ========================6th ===============================
                                    if($sixprnt != '' && $sixprnt != NULL && !empty($sixprnt)){
                                        DB::table('mlm')->where('uid',$sixprnt)
                                                ->increment('totallink',1);

                                        $walet6=DB::table('userpix')->where('u-id',$sixprnt)->pluck('walet')[0];
                                        $walet62 = $walet6+.10;
                                        DB::table('userpix')->where('u-id',$sixprnt)->update(['walet'=>$walet62]);

                                        $inserarr=[
                                            'uid'=>$sixprnt,
                                            'cid'=>$uid,
                                            'pid'=>$refrenceid,
                                            'amount'=>.10,
                                            'leval'=>7
                                        ];
                                        DB::table('mlm_transection')->insert($inserarr);
                                        $this->rewards_update($sixprnt);

                                        $sevenprnt = @DB::table('mlm')->where('uid',$sixprnt)->pluck('pid')[0];
                                        // ========================7th ===============================
                                        if($sevenprnt != '' && $sevenprnt != NULL && !empty($sevenprnt)){
                                            DB::table('mlm')->where('uid',$sevenprnt)
                                                    ->increment('totallink',1);
                                            $walet7=DB::table('userpix')->where('u-id',$sevenprnt)->pluck('walet')[0];
                                            $walet72 = $walet7+.05;
                                            DB::table('userpix')->where('u-id',$sevenprnt)->update(['walet'=>$walet72]);

                                            $inserarr=[
                                                'uid'=>$sevenprnt,
                                                'cid'=>$uid,
                                                'pid'=>$refrenceid,
                                                'amount'=>0.05,
                                                'leval'=>8
                                            ];
                                            DB::table('mlm_transection')->insert($inserarr);
                                            $this->rewards_update($sevenprnt);

                                            // $eightprnt = @DB::table('mlm')->where('uid',$sevenprnt)->pluck('pid')[0];
                                            // // ========================8th ===============================
                                            // if($eightprnt != '' && $eightprnt != NULL && !empty($eightprnt)){
                                            //     DB::table('mlm')->where('uid',$eightprnt)
                                            //             ->increment('totallink',1);

                                            //     $walet8=DB::table('userpix')->where('u-id',$eightprnt)->pluck('walet')[0];
                                            //     $walet82 = $walet8+.04;
                                            //     DB::table('userpix')->where('u-id',$eightprnt)->update(['walet'=>$walet82]);

                                            //     $inserarr=[
                                            //         'uid'=>$eightprnt,
                                            //         'cid'=>$uid,
                                            //         'pid'=>$refrenceid,
                                            //         'amount'=>0.04,
                                            //         'leval'=>9
                                            //     ];
                                            //     DB::table('mlm_transection')->insert($inserarr);

                                                
                                            // }
                                        }
                                    }
                                }
                            }
                        }                    
                    }
                }
                $email=DB::table('users')->where('no',$uid)->pluck('email');
                $name=DB::table('users')->where('no',$uid)->pluck('name');

                $to = $email;
                $subject = "Urpixpays Free Account";
                $txt = "Dear ".$name.",\n you have successfully created a free account on UrPixPays's Super 9 membership plan.Your sponsor PIXID is  <br>".$refrenceid."</b>\n \n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                $headers = "From: urpixpays@gmail.com" . "\r\n";

                mail($to,$subject,$txt,$headers);

                $this->response(1,"You have successfully joined Super9!",NULL);
            }
            else{
                $this->response(200,"You do not have sufficient balance in your wallet. Please recharge your wallet and try again.",NULL);
            }
        }
        else{
            $this->response(200,"The refrence already reaches its limit",NULL);
        }
    }

    public function waletpaid(Request $request){
        $uid = $_COOKIE['id'];
        $refrenceid=DB::table('mlm')->where('uid',$uid)->pluck('pid')[0];

            $walet = DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            if($walet >= 9.99){
                DB::table('mlm')->where('uid',$uid)->update(['p_status'=>'wallet']);

                DB::table('mlm')->where('uid',$refrenceid)
                            ->increment('totallink',1);
                DB::table('userpix')->where('u-id',$uid)
                            ->decrement('walet',9.99);
                DB::table('userpix')->where('u-id',$refrenceid)->update(['mlm'=>1]);

                $waletr=DB::table('userpix')->where('u-id',$refrenceid)->pluck('walet')[0];
                $waletrr = $waletr+2;
                DB::table('userpix')->where('u-id',$refrenceid)->update(['walet'=>$waletrr]);

                $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
                $Wands = $Wand+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);

                $Charge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')[0];
                $Charges = $Charge+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Charge'=>$Charges]);

                $Flip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')[0];
                $Flips = $Flip+9;
                DB::table('userpix')->where('u-id',$uid)->update(['Flip'=>$Flips]);

                $pixpoint=DB::table('userpix')->where('u-id',$uid)->pluck('pixpoint')[0];
                $pixpoints = $pixpoint+999;
                DB::table('userpix')->where('u-id',$uid)->update(['pixpoint'=>$pixpoints]);

                $inserarr=[
                    'uid'=>$refrenceid,
                    'cid'=>$uid,
                    'pid'=>$refrenceid,
                    'amount'=>2,
                    'leval'=>1
                ];
                DB::table('mlm_transection')->insert($inserarr);
                $this->rewards_update($refrenceid);

                $fstprnt = DB::table('mlm')->where('uid',$refrenceid)->pluck('pid')[0];
                if($fstprnt != '' && $fstprnt != NULL && !empty($fstprnt)){
                    DB::table('mlm')->where('uid',$fstprnt)
                            ->increment('totallink',1);

                    $walet1=DB::table('userpix')->where('u-id',$fstprnt)->pluck('walet')[0];
                    $walet11 = $walet1+1.5;
                    DB::table('userpix')->where('u-id',$fstprnt)->update(['walet'=>$walet11]);

                    $inserarr=[
                        'uid'=>$fstprnt,
                        'cid'=>$uid,
                        'pid'=>$refrenceid,
                        'amount'=>1.5,
                        'leval'=>2
                    ];
                    DB::table('mlm_transection')->insert($inserarr);
                    $this->rewards_update($fstprnt);

                    $scndprnt = @DB::table('mlm')->where('uid',$fstprnt)->pluck('pid')[0];
                    // =============================second =====================
                    if($scndprnt != '' && $scndprnt != NULL && !empty($scndprnt)){
                        DB::table('mlm')->where('uid',$scndprnt)
                                ->increment('totallink',1);

                        $walet2=DB::table('userpix')->where('u-id',$scndprnt)->pluck('walet')[0];
                        $walet22 = $walet2+1;
                        DB::table('userpix')->where('u-id',$scndprnt)->update(['walet'=>$walet22]);

                        $inserarr=[
                            'uid'=>$scndprnt,
                            'cid'=>$uid,
                            'pid'=>$refrenceid,
                            'amount'=>1,
                            'leval'=>3
                        ];
                        DB::table('mlm_transection')->insert($inserarr);
                        $this->rewards_update($scndprnt);

                        $thirdprnt = @DB::table('mlm')->where('uid',$scndprnt)->pluck('pid')[0];
                        // ======================third =============================
                        if($thirdprnt != '' && $thirdprnt != NULL && !empty($thirdprnt)){
                            DB::table('mlm')->where('uid',$thirdprnt)
                                    ->increment('totallink',1);

                            $walet3=DB::table('userpix')->where('u-id',$thirdprnt)->pluck('walet')[0];
                            $walet32 = $walet3+.50;
                            DB::table('userpix')->where('u-id',$thirdprnt)->update(['walet'=>$walet32]);

                            $inserarr=[
                                'uid'=>$thirdprnt,
                                'cid'=>$uid,
                                'pid'=>$refrenceid,
                                'amount'=>.50,
                                'leval'=>4
                            ];
                            DB::table('mlm_transection')->insert($inserarr);
                            $this->rewards_update($thirdprnt);

                            $forthprnt = @DB::table('mlm')->where('uid',$thirdprnt)->pluck('pid')[0];
                            // ========================Forth ===============================
                            if($forthprnt != '' && $forthprnt != NULL && !empty($forthprnt)){
                                DB::table('mlm')->where('uid',$forthprnt)
                                        ->increment('totallink',1);

                                $walet4=DB::table('userpix')->where('u-id',$forthprnt)->pluck('walet')[0];
                                $walet42 = $walet4+.25;
                                DB::table('userpix')->where('u-id',$forthprnt)->update(['walet'=>$walet42]);

                                $inserarr=[
                                    'uid'=>$forthprnt,
                                    'cid'=>$uid,
                                    'pid'=>$refrenceid,
                                    'amount'=>.25,
                                    'leval'=>5
                                ];
                                DB::table('mlm_transection')->insert($inserarr);
                                $this->rewards_update($forthprnt);

                                $fiftprnt = @DB::table('mlm')->where('uid',$forthprnt)->pluck('pid')[0];
                                // ====================fifth===================================
                                if($fiftprnt != '' && $fiftprnt != NULL && !empty($fiftprnt)){
                                    DB::table('mlm')->where('uid',$fiftprnt)
                                            ->increment('totallink',1);

                                    $walet5=DB::table('userpix')->where('u-id',$fiftprnt)->pluck('walet')[0];
                                    $walet52 = $walet5+.20;
                                    DB::table('userpix')->where('u-id',$fiftprnt)->update(['walet'=>$walet52]);

                                    $inserarr=[
                                        'uid'=>$fiftprnt,
                                        'cid'=>$uid,
                                        'pid'=>$refrenceid,
                                        'amount'=>.20,
                                        'leval'=>6
                                    ];
                                    DB::table('mlm_transection')->insert($inserarr);
                                    $this->rewards_update($fiftprnt);

                                    $sixprnt = @DB::table('mlm')->where('uid',$fiftprnt)->pluck('pid')[0];
                                    // ========================6th ===============================
                                    if($sixprnt != '' && $sixprnt != NULL && !empty($sixprnt)){
                                        DB::table('mlm')->where('uid',$sixprnt)
                                                ->increment('totallink',1);

                                        $walet6=DB::table('userpix')->where('u-id',$sixprnt)->pluck('walet')[0];
                                        $walet62 = $walet6+.10;
                                        DB::table('userpix')->where('u-id',$sixprnt)->update(['walet'=>$walet62]);

                                        $inserarr=[
                                            'uid'=>$sixprnt,
                                            'cid'=>$uid,
                                            'pid'=>$refrenceid,
                                            'amount'=>.10,
                                            'leval'=>7
                                        ];
                                        DB::table('mlm_transection')->insert($inserarr);
                                        $this->rewards_update($sixprnt);

                                        $sevenprnt = @DB::table('mlm')->where('uid',$sixprnt)->pluck('pid')[0];
                                        // ========================7th ===============================
                                        if($sevenprnt != '' && $sevenprnt != NULL && !empty($sevenprnt)){
                                            DB::table('mlm')->where('uid',$sevenprnt)
                                                    ->increment('totallink',1);
                                            $walet7=DB::table('userpix')->where('u-id',$sevenprnt)->pluck('walet')[0];
                                            $walet72 = $walet7+.05;
                                            DB::table('userpix')->where('u-id',$sevenprnt)->update(['walet'=>$walet72]);

                                            $inserarr=[
                                                'uid'=>$sevenprnt,
                                                'cid'=>$uid,
                                                'pid'=>$refrenceid,
                                                'amount'=>0.05,
                                                'leval'=>8
                                            ];
                                            DB::table('mlm_transection')->insert($inserarr);
                                            $this->rewards_update($sevenprnt);

                                            // $eightprnt = @DB::table('mlm')->where('uid',$sevenprnt)->pluck('pid')[0];
                                            // // ========================8th ===============================
                                            // if($eightprnt != '' && $eightprnt != NULL && !empty($eightprnt)){
                                            //     DB::table('mlm')->where('uid',$eightprnt)
                                            //             ->increment('totallink',1);

                                            //     $walet8=DB::table('userpix')->where('u-id',$eightprnt)->pluck('walet')[0];
                                            //     $walet82 = $walet8+.04;
                                            //     DB::table('userpix')->where('u-id',$eightprnt)->update(['walet'=>$walet82]);

                                            //     $inserarr=[
                                            //         'uid'=>$eightprnt,
                                            //         'cid'=>$uid,
                                            //         'pid'=>$refrenceid,
                                            //         'amount'=>0.04,
                                            //         'leval'=>9
                                            //     ];
                                            //     DB::table('mlm_transection')->insert($inserarr);

                                                
                                            // }
                                        }
                                    }
                                }
                            }
                        }                    
                    }
                }
                $email=DB::table('users')->where('no',$uid)->pluck('email');
                $name=DB::table('users')->where('no',$uid)->pluck('name');

                $to = $email;
                $subject = "Urpixpays Free Account";
                $txt = "Dear ".$name.",\n you have successfully joined UrPixPays's Super 9 membership plan.Your sponsor PIXID is  <br>".$refrenceid."</b>\n \n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
                $headers = "From: urpixpays@gmail.com" . "\r\n";

                mail($to,$subject,$txt,$headers);

                $this->response(1,"You have successfully joined Super 9!",NULL);
            }
            else{
                $this->response(200,"You do not have sufficient balance in your wallet. Please recharge your wallet and try again.",NULL);
            }
    }
    public function accountpaid(Request $request){
        $uid = $_COOKIE['id'];
        $refrenceid = $request->striperefrenceid;
        
        DB::table('mlm')->where('uid',$refrenceid)
                    ->increment('totallink',1);
        DB::table('userpix')->where('u-id',$refrenceid)->update(['mlm'=>1]);

        $waletr=DB::table('userpix')->where('u-id',$refrenceid)->pluck('walet')[0];
        $waletrr = $waletr+2;
        DB::table('userpix')->where('u-id',$refrenceid)->update(['walet'=>$waletrr]);

        $Wand=DB::table('userpix')->where('u-id',$uid)->pluck('Wand')[0];
        $Wands = $Wand+9;
        DB::table('userpix')->where('u-id',$uid)->update(['Wand'=>$Wands]);

        $Charge=DB::table('userpix')->where('u-id',$uid)->pluck('Charge')[0];
        $Charges = $Charge+9;
        DB::table('userpix')->where('u-id',$uid)->update(['Charge'=>$Charges]);

        $Flip=DB::table('userpix')->where('u-id',$uid)->pluck('Flip')[0];
        $Flips = $Flip+9;
        DB::table('userpix')->where('u-id',$uid)->update(['Flip'=>$Flips]);

        $pixpoint=DB::table('userpix')->where('u-id',$uid)->pluck('pixpoint')[0];
        $pixpoints = $pixpoint+999;
        DB::table('userpix')->where('u-id',$uid)->update(['pixpoint'=>$pixpoints]);

        $inserarr=[
            'uid'=>$refrenceid,
            'cid'=>$uid,
            'pid'=>$refrenceid,
            'amount'=>2,
            'leval'=>1
        ];
        DB::table('mlm_transection')->insert($inserarr);

        $fstprnt = DB::table('mlm')->where('uid',$refrenceid)->pluck('pid')[0];
        if($fstprnt != '' && $fstprnt != NULL && !empty($fstprnt)){
            DB::table('mlm')->where('uid',$fstprnt)
                    ->increment('totallink',1);

            $walet1=DB::table('userpix')->where('u-id',$fstprnt)->pluck('walet')[0];
            $walet11 = $walet1+1.5;
            DB::table('userpix')->where('u-id',$fstprnt)->update(['walet'=>$walet11]);

            $inserarr=[
                'uid'=>$fstprnt,
                'cid'=>$uid,
                'pid'=>$refrenceid,
                'amount'=>1.5,
                'leval'=>2
            ];
            DB::table('mlm_transection')->insert($inserarr);

            $scndprnt = @DB::table('mlm')->where('uid',$fstprnt)->pluck('pid')[0];
            // =============================second =====================
            if($scndprnt != '' && $scndprnt != NULL && !empty($scndprnt)){
                DB::table('mlm')->where('uid',$scndprnt)
                        ->increment('totallink',1);

                $walet2=DB::table('userpix')->where('u-id',$scndprnt)->pluck('walet')[0];
                $walet22 = $walet2+1;
                DB::table('userpix')->where('u-id',$scndprnt)->update(['walet'=>$walet22]);

                $inserarr=[
                    'uid'=>$scndprnt,
                    'cid'=>$uid,
                    'pid'=>$refrenceid,
                    'amount'=>1,
                    'leval'=>3
                ];
                DB::table('mlm_transection')->insert($inserarr);

                $thirdprnt = @DB::table('mlm')->where('uid',$scndprnt)->pluck('pid')[0];
                // ======================third =============================
                if($thirdprnt != '' && $thirdprnt != NULL && !empty($thirdprnt)){
                    DB::table('mlm')->where('uid',$thirdprnt)
                            ->increment('totallink',1);

                    $walet3=DB::table('userpix')->where('u-id',$thirdprnt)->pluck('walet')[0];
                    $walet32 = $walet3+.50;
                    DB::table('userpix')->where('u-id',$thirdprnt)->update(['walet'=>$walet32]);

                    $inserarr=[
                        'uid'=>$thirdprnt,
                        'cid'=>$uid,
                        'pid'=>$refrenceid,
                        'amount'=>.50,
                        'leval'=>4
                    ];
                    DB::table('mlm_transection')->insert($inserarr);

                    $forthprnt = @DB::table('mlm')->where('uid',$thirdprnt)->pluck('pid')[0];
                    // ========================Forth ===============================
                    if($forthprnt != '' && $forthprnt != NULL && !empty($forthprnt)){
                        DB::table('mlm')->where('uid',$forthprnt)
                                ->increment('totallink',1);

                        $walet4=DB::table('userpix')->where('u-id',$forthprnt)->pluck('walet')[0];
                        $walet42 = $walet4+.25;
                        DB::table('userpix')->where('u-id',$forthprnt)->update(['walet'=>$walet42]);

                        $inserarr=[
                            'uid'=>$forthprnt,
                            'cid'=>$uid,
                            'pid'=>$refrenceid,
                            'amount'=>.25,
                            'leval'=>5
                        ];
                        DB::table('mlm_transection')->insert($inserarr);

                        $fiftprnt = @DB::table('mlm')->where('uid',$forthprnt)->pluck('pid')[0];
                        // ====================fifth===================================
                        if($fiftprnt != '' && $fiftprnt != NULL && !empty($fiftprnt)){
                            DB::table('mlm')->where('uid',$fiftprnt)
                                    ->increment('totallink',1);

                            $walet5=DB::table('userpix')->where('u-id',$fiftprnt)->pluck('walet')[0];
                            $walet52 = $walet5+.20;
                            DB::table('userpix')->where('u-id',$fiftprnt)->update(['walet'=>$walet52]);

                            $inserarr=[
                                'uid'=>$fiftprnt,
                                'cid'=>$uid,
                                'pid'=>$refrenceid,
                                'amount'=>.20,
                                'leval'=>6
                            ];
                            DB::table('mlm_transection')->insert($inserarr);

                            $sixprnt = @DB::table('mlm')->where('uid',$fiftprnt)->pluck('pid')[0];
                            // ========================6th ===============================
                            if($sixprnt != '' && $sixprnt != NULL && !empty($sixprnt)){
                                DB::table('mlm')->where('uid',$sixprnt)
                                        ->increment('totallink',1);

                                $walet6=DB::table('userpix')->where('u-id',$sixprnt)->pluck('walet')[0];
                                $walet62 = $walet6+.10;
                                DB::table('userpix')->where('u-id',$sixprnt)->update(['walet'=>$walet62]);

                                $inserarr=[
                                    'uid'=>$sixprnt,
                                    'cid'=>$uid,
                                    'pid'=>$refrenceid,
                                    'amount'=>.10,
                                    'leval'=>7
                                ];
                                DB::table('mlm_transection')->insert($inserarr);

                                $sevenprnt = @DB::table('mlm')->where('uid',$sixprnt)->pluck('pid')[0];
                                // ========================7th ===============================
                                if($sevenprnt != '' && $sevenprnt != NULL && !empty($sevenprnt)){
                                    DB::table('mlm')->where('uid',$sevenprnt)
                                            ->increment('totallink',1);
                                    $walet7=DB::table('userpix')->where('u-id',$sevenprnt)->pluck('walet')[0];
                                    $walet72 = $walet7+.05;
                                    DB::table('userpix')->where('u-id',$sevenprnt)->update(['walet'=>$walet72]);

                                    $inserarr=[
                                        'uid'=>$sevenprnt,
                                        'cid'=>$uid,
                                        'pid'=>$refrenceid,
                                        'amount'=>0.05,
                                        'leval'=>8
                                    ];
                                    DB::table('mlm_transection')->insert($inserarr);
                                }
                            }
                        }
                    }
                }                    
            }
        }
        $email=DB::table('users')->where('no',$uid)->pluck('email');
        $name=DB::table('users')->where('no',$uid)->pluck('name');

        $to = $email;
        $subject = "Urpixpays Free Account";
        $txt = "Dear ".$name.",\n you have successfully created a free account on UrPixPays's Super 9 membership plan.Your sponsor PIXID is  <br>".$refrenceid."</b>\n \n Sincerely\n Urpixpays\n\n\n Have any questions?\n\n Email at info@urpixpays.com";
        $headers = "From: urpixpays@gmail.com" . "\r\n";

        mail($to,$subject,$txt,$headers);

        $this->response(1,"You have successfully joined Super 9",NULL);
        
    }
}

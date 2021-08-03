<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\TestEmail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Upload;
use App\Http\Requests;
use Request as rqest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\buySellImage;
use App\withdraw;
use App\Challenge;
use App\NotificationBanner;
use App\winnerBanner;
class AdminController extends Controller
{
    public function admin_change_order_status(Request $request){
        $data =  $request->all();
        $result = DB::table('order_main')
            ->where('order_id',$data['order_id'])
            ->update(['status' => $data['status']]);
        if($result){
            echo "success";
        }
    }

    public function admin_change_order_notes(Request $request){
        $data =  $request->all();
        $result = DB::table('order_main')
            ->where('order_id',$data['order_id'] )
            ->update(['note' => $data['notes']]);
        if($result){
            echo "success";
        }
    }

    public function response($state, $message, $data){
        $senddate['state']=$state;
        $senddate['message']=$message;
        $senddate['data']=$data;
        print_r(json_encode($senddate));
    }
    public function user()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];

        $user = DB::table('users')
            ->join('userpix', 'users.no', 'userpix.u-id')
            ->select('users.no', 'users.email', 'users.name', 'users.email', 'users.password','users.city','users.pass','users.country', 'users.mobilenum', 'users.permission', 'users.vc', 'users.role',  'userpix.Flip', 'userpix.Charge', 'userpix.Wand', 'userpix.Rank', 'userpix.walet', 'userpix.Points')
            ->get();
        return view('Admin.user',['data'=> $user,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function user1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];

        $user = DB::table('users')
            ->join('userpix', 'users.no', 'userpix.u-id')
            ->select('users.no', 'users.email', 'users.name', 'users.email', 'users.password', 'users.city','users.pass', 'users.country', 'users.mobilenum', 'users.permission', 'users.vc', 'users.role',  'userpix.Flip', 'userpix.Charge','userpix.voted', 'userpix.Wand', 'userpix.Rank', 'userpix.walet', 'userpix.Points')
            ->get();
        return view('Admin.user1',['data'=> $user,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    public function admin()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $user = DB::table('admin')->get();
        return view('Admin.admin',['data'=> $user,'a_image'=>$a_image,'a_name'=>$a_name]);
    }



//--------------------------u_join_c_add--------------------------------------//
    public function u_join_c($cid)
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];   $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $data0['title'] = DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        $data0['description'] = DB::table('challenge')->where('id',$cid)->pluck('description')[0];
        $data0['uid'] = DB::table('challenge')->where('id',$cid)->pluck('u-id')[0];
        $data0['name'] = DB::table('users')->where('no',$data0['uid'])->pluck('name')[0];
        $data0['email'] = DB::table('users')->where('no',$data0['uid'])->pluck('email')[0];
        $data0['cid']=$cid;
        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)->join('users','users.no','ujoinc.u-id')->orderBy('rank','asc')->get();
        return view('Admin.c_u',compact('data0','ujoincs','a_image','a_name'));

    }

    public function u_join_c1($cid)
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];   $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $data0['title'] = DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        $data0['description'] = DB::table('challenge')->where('id',$cid)->pluck('description')[0];
        $data0['uid'] = DB::table('challenge')->where('id',$cid)->pluck('u-id')[0];
        $data0['name'] = DB::table('users')->where('no',$data0['uid'])->pluck('name')[0];
        $data0['email'] = DB::table('users')->where('no',$data0['uid'])->pluck('email')[0];
        $data0['cid']=$cid;

        $c=DB::table('challenge')->where('id',$cid)->pluck('photocount')[0];

        $images=DB::table('image')->where('c-id',$cid)->get();

        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)
            ->join('users','users.no','ujoinc.u-id')->orderBy('rank','asc')->get();



        return view('Admin.c_u1',compact('data0','ujoincs','a_image','a_name','c','images'));

    }
//--------------------------------end----------------------------------------//

    public function challenge()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','normal')->get();
        return view('Admin.challenge',['data'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    public function user_images(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images=DB::table('image')->orderBy('id', 'DESC')->get();
        $num      =count($images);
        return view('Admin.userimages',compact('images','num','a_name','a_image'));
    }

    public function deleteuserimage($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('image')->where('id',$image_id)->pluck('url')[0];
            $image  = explode('/',$old_image);
            $total_index = count($image);
            $old_file_name  = $image[$total_index - 1];
            echo $old_file_name;
            unlink(public_path() . '/uploads/images/'. $old_file_name);
            DB::table('image')->where('id',$image_id)->delete();
            return redirect('admin/userimages');
        }
        else{
            return redirect('admin/userimages');
        }
    }

    public function info_images(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images   = DB::table('info_images')->orderBy('imgorder', 'ASC')->get();
        $num      =count($images);
        return view('Admin.info_images',compact('images','num','a_name','a_image'));
    }
    public function upload_info_images(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $image_detail  = $data['image_details'];
        if (Input::hasFile('files')) {
            $uploaded_image = $request->file('files');
            $url  =  time().$uploaded_image->getClientOriginalName();
            $uploaded_image->move(public_path() . '/uploads/info_images', $url);
            $data = array('imgname' => $url, 'imgorder'=>'99' , 'image_detail' => $image_detail
            );
            DB::table('info_images')->insert($data);
        }
        return redirect('/admin/infoimages');
    }
    public function  detele_info_image($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('info_images')->where('id',$image_id)->pluck('imgname')[0];
            unlink(public_path() . '/uploads/info_images/'. $old_image);
            DB::table('info_images')->where('id',$image_id)->delete();
            return redirect('admin/infoimages');
        }
        else{
            return redirect('admin/infoimages');
        }
    }

    public function update_info_order(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        foreach ($data['image_id'] as $key => $value) {
            DB::table('info_images')->where('id',$value)->update(['imgorder'=>$data['imgorder'][$key],
                'image_title'=>$data['image_title'][$key],'image_detail'=>$data['image_details'][$key]
            ]);
        }
        return redirect('/admin/infoimages');
    }




    //upload best imagges
    public function best_images(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images=DB::table('best_images')->orderBy('imgorder', 'ASC')->get();
        $num      =count($images);
        return view('Admin.best_images',compact('images','num','a_name','a_image'));
    }



    public function upload_best_images(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        if (Input::hasFile('files')) {
            $uploaded_image = $request->file('files');
            $url  =  time().$uploaded_image->getClientOriginalName();
            $uploaded_image->move(public_path() . '/uploads/info_images', $url);
            $data = array('imgname' => $url, 'url' => $data['link'] , 'imgtitle' => $data['title'] ,'imgorder'=>'99'
            );
            DB::table('best_images')->insert($data);
        }
        return redirect('/admin/bestimages');
    }

    public function update_best_order(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        foreach ($data['image_id'] as $key => $value) {
            DB::table('best_images')->where('id',$value)->update(['url'=>$data['link'][$key],'imgtitle'=>$data['title'][$key],'imgorder'=>$data['imgorder'][$key]]);
        }
        return redirect('/admin/bestimages');
    }

    public function  detele_best_image($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('best_images')->where('id',$image_id)->pluck('imgname')[0];
            unlink(public_path() . '/uploads/info_images/'. $old_image);
            DB::table('best_images')->where('id',$image_id)->delete();
            return redirect('admin/bestimages');
        }
        else{
            return redirect('admin/bestimages');
        }
    }


    //end of upload best iamges






    public function challenge1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','normal')->get();
        return view('Admin.challenge1',['data'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function settings()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];

        $setting=DB::table('setting')->first();

        return view('Admin.settings',['setting'=>$setting,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function signup_setting(){
        $data=Input::all();
        $s_price=$data['s_price'];
        $s_flip=$data['s_flip'];
        $s_wand=$data['s_wand'];
        $s_charge=$data['s_charge'];

        DB::table('setting')->where('id',1)->update([
            's_price'=>$s_price,
            's_flip'=>$s_flip,
            's_wand'=>$s_wand,
            's_charge'=>$s_charge
        ]);

        $this->response(1,"success",Null);
    }
    public function tax_setting(){
        $data=Input::all();
        $tax=$data['tax'];
        DB::table('setting')->where('id',1)->update([
            'tax'=>$tax/100
        ]);

        $this->response(1,"success",Null);
    }
    public function rank_setting(){
        $data=Input::all();
        $r1_price=$data['r1_price'];
        $r1_flip=$data['r1_flip'];
        $r1_wand=$data['r1_wand'];
        $r1_charge=$data['r1_charge'];
        $r2_price=$data['r2_price'];
        $r2_flip=$data['r2_flip'];
        $r2_wand=$data['r2_wand'];
        $r2_charge=$data['r2_charge'];
        $r3_price=$data['r3_price'];
        $r3_flip=$data['r3_flip'];
        $r3_wand=$data['r3_wand'];
        $r3_charge=$data['r3_charge'];
        $r4_price=$data['r4_price'];
        $r4_flip=$data['r4_flip'];
        $r4_wand=$data['r4_wand'];
        $r4_charge=$data['r4_charge'];
        $r5_price=$data['r5_price'];
        $r5_flip=$data['r5_flip'];
        $r5_wand=$data['r5_wand'];
        $r5_charge=$data['r5_charge'];
        $r6_price=$data['r6_price'];
        $r6_flip=$data['r6_flip'];
        $r6_wand=$data['r6_wand'];
        $r6_charge=$data['r6_charge'];
        $r7_price=$data['r7_price'];
        $r7_flip=$data['r7_flip'];
        $r7_wand=$data['r7_wand'];
        $r7_charge=$data['r7_charge'];
        $r8_price=$data['r8_price'];
        $r8_flip=$data['r8_flip'];
        $r8_wand=$data['r8_wand'];
        $r8_charge=$data['r8_charge'];


        DB::table('setting')->where('id',1)->update([
            'r1_price' => $r1_price/100,
            'r1_flip' => $r1_flip,
            'r1_wand'=> $r1_wand,
            'r1_charge'=>$r1_charge,
            'r2_price' => $r2_price/100,
            'r2_flip' => $r2_flip,
            'r2_wand'=> $r2_wand,
            'r2_charge'=>$r2_charge,
            'r3_price' => $r3_price/100,
            'r3_flip' => $r3_flip,
            'r3_wand'=> $r3_wand,
            'r3_charge'=>$r3_charge,
            'r4_price' => $r4_price/100,
            'r4_flip' => $r4_flip,
            'r4_wand'=> $r4_wand,
            'r4_charge'=>$r4_charge,
            'r5_price' => $r5_price/100,
            'r5_flip' => $r5_flip,
            'r5_wand'=> $r5_wand,
            'r5_charge'=>$r5_charge,
            'r6_price' => $r6_price/100,
            'r6_flip' => $r6_flip,
            'r6_wand'=> $r6_wand,
            'r6_charge'=>$r6_charge,
            'r7_price' => $r7_price/100,
            'r7_flip' => $r7_flip,
            'r7_wand'=> $r7_wand,
            'r7_charge'=>$r7_charge,
            'r8_price' => $r3_price/100,
            'r8_flip' => $r3_flip,
            'r8_wand'=> $r3_wand,
            'r8_charge'=>$r3_charge
        ]);

        $this->response(1,"success",Null);
    }
    public function i_setting(){
        $data=Input::all();
        $ia_price=$data['ia_price'];
        $ia_flip=$data['ia_flip'];
        $ia_wand=$data['ia_wand'];
        $ia_charge=$data['ia_charge'];
        $ib_price=$data['ib_price'];
        $ib_flip=$data['ib_flip'];
        $ib_wand=$data['ib_wand'];
        $ib_charge=$data['ib_charge'];
        DB::table('setting')->where('id',1)->update([
            'ia_price'=>$ia_price,
            'ia_flip'=>$ia_flip,
            'ia_wand'=>$ia_wand,
            'ia_charge'=>$ia_charge,
            'ib_price'=>$ib_price,
            'ib_flip'=>$ib_flip,
            'ib_wand'=>$ib_wand,
            'ib_charge'=>$ib_charge,
        ]);

        $this->response(1,"success",Null);
    }
    public function s_setting(){
        $data=Input::all();
        $ia_price=$data['sa_price'];
        $ia_flip=$data['sa_flip'];
        $ia_wand=$data['sa_wand'];
        $ia_charge=$data['sa_charge'];
        $ib_price=$data['sb_price'];
        $ib_flip=$data['sb_flip'];
        $ib_wand=$data['sb_wand'];
        $ib_charge=$data['sb_charge'];
        DB::table('setting')->where('id',1)->update([
            'sa_price'=>$ia_price,
            'sa_flip'=>$ia_flip,
            'sa_wand'=>$ia_wand,
            'sa_charge'=>$ia_charge,
            'sb_price'=>$ib_price,
            'sb_flip'=>$ib_flip,
            'sb_wand'=>$ib_wand,
            'sb_charge'=>$ib_charge,
        ]);

        $this->response(1,"success",Null);
    }
    public function winner1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $cids=DB::table('challenge')->where('award','Yes')->get();
        $winners=DB::table('winner')->join('users','users.no','winner.u_id')
            ->orderBy('rank','asc')
            ->get();


        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.winner1',['a_image'=>$a_image,'a_name'=>$a_name,'cids'=>$cids,'winners'=>$winners]);
    }
    public function game1()
    {

        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','game')->get();
        return view('Admin.game1',['data'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    public function game()
    {

        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','game')->get();
        return view('Admin.game',['data'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function deposits()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $deposit=DB::table('deposit')->get();
        $num=count($deposit);
        return view('Admin.deposits',compact('deposit','num','a_image','a_name'));
    }

    public function withdrawrequest()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $withdraw=DB::table('withdraw')->get();
        $num=count($withdraw);
        return view('Admin.withdrawrequest',compact('withdraw','num','a_name','a_image'));
    }

    public function OrdersDetail()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $OrdersDetail =DB::table('order_main')->orderBy('order_id','desc')->get();
        $num      =count($OrdersDetail);
        return view('Admin.OrdersDetail',compact('OrdersDetail','num','a_name','a_image'));
    }
    public function order_completdetail($order_id){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $order_main =DB::table('order_main')->where('order_id',$order_id)->get();


        $order_detail =DB::table('order_detail')
            ->join('image', 'image.id', '=', 'order_detail.product_id')
            ->join('users', 'users.no', '=', 'image.u-id')
            ->where('order_id',$order_id)->get();
        // dd($order_detail);
        return view('Admin.viewOrderDetail',compact('order_main','order_detail','a_name','a_image'));
    }

    public function deposits1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $deposit=DB::table('deposit')->get();
        $num=count($deposit);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.deposits1',compact('deposit','num','a_image','a_name'));
    }

    public function invitation()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $invitation=DB::table('invitation')->join('users','users.no','invitation.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.invitation',compact('invitation','a_image','a_name'));
    }
    public function invitation1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $invitation=DB::table('invitation')->join('users','users.no','invitation.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.invitation1',compact('invitation','a_image','a_name'));
    }
    public function bid_state()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $bid=DB::table('bid')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.bid_state',compact('bid','a_image','a_name'));
    }
    public function bid_state1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $bid=DB::table('bid')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.bid_state1',compact('bid','a_image','a_name'));
    }
    public function transaction()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $transaction=DB::table('transaction')->join('users','users.no','transaction.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.transaction',compact('transaction','a_image','a_name'));
    }
    public function reports1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $bid=DB::table('report')->join('image','image.id','report.img_id')->join('users','users.no','report.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.reports1',compact('bid','a_image','a_name'));
    }

    public function reports()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $bid=DB::table('report')->join('image','image.id','report.img_id')->join('users','users.no','report.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.reports',compact('bid','a_image','a_name'));
    }

    public function sponsor()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $sponsor=DB::table('sponsor')->join('users','users.no','sponsor.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.sponsor',compact('sponsor','a_image','a_name'));
    }
    public function sponsor1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $sponsor=DB::table('sponsor')->join('users','users.no','sponsor.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.sponsor1',compact('sponsor','a_image','a_name'));
    }
    public function withdrawrequest1()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $withdraw=DB::table('withdraw')->get();
        $num=count($withdraw);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.withdrawrequest1',compact('withdraw','num','a_image','a_name'));
    }
    public function getujoinc()
    {
        if (Session::get('login_flag')!='login') return redirect('landing');
        $challenge = DB::table('challenge')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.c_u',['data'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    // public function getujoinc()
    // {
    //     if (Session::get('login_flag')!='login') return redirect('landing');
    //       $data = DB::table('ujoinc')->get();
    //       return view('Admin.c_u',['data'=> $data]);
    // }
    public function challenge_images_delete($c_id)
    {
        $uid=Session::get('id');
        $images=@DB::table('image')->where('c-id',$c_id)->get();
        return view('admin1/pages/challenges_images',compact('images'));
    }
    public function challenge_images_delete_all($c_id)
    {
        $uid=Session::get('id');
        $images=@DB::table('image')->where('c-id',$c_id)->get();
        foreach ($images as $key => $value) {
            echo $value->id.'==='.$value->url;

            $destinationPath = "uploads/images";
            if (strpos($value->url, 'https://www.urpixpays.com') !== false) {
                $imagename = str_replace("https://www.urpixpays.com/public/uploads/images/","",$value->url);
            }
            else{
                $imagename = str_replace("https://urpixpays.com/public/uploads/images/","",$value->url);
            }


            $value->url=public_path($destinationPath.'/'.$imagename);
            unlink($value->url);
            DB::table('image')->where('id',$value->id)->delete();
            echo "===Delete<br>";
        }
    }
    public function image()
    {
        $image = DB::table('image')
            ->join('users','users.no','=','image.u-id')
            ->join('challenge','image.c-id','=','challenge.id')
            ->select('image.*','users.*','challenge.*')
            ->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.image',['data'=> $image,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    public function commit()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $image = DB::table('commit')
            ->join('users','users.no','=','commit.u-id')
            ->join('image','image.id','=','commit.i-id')
            ->select('commit.*','users.*','image.*')
            ->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];   $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('Admin.commit',['data'=> $image,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function change_vote(){
        $data=Input::all();
        $id=$data['id'];
        $value=$data['value'];

        $b_val=DB::table('image')->where('id',$id)->pluck('vote')[0];
        DB::table('image')->where('id',$id)->update([
            'vote'=>$value
        ]);
        $uid=DB::table('image')->where('id',$id)->pluck('u-id')[0];
        $cid=DB::table('image')->where('id',$id)->pluck('c-id')[0];

        $iid=DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])->pluck('id')[0];
        DB::table('ujoinc')->where('id',$iid)->increment('vote_count',$value-$b_val);
        DB::table('challenge')->where('id',$cid)->increment('votes',$value-$b_val);
        DB::table('userpix')->where('u-id',$uid)->increment('Points',$value-$b_val);
        // DB::table('userpix')->where('u-id',$uid)->increment('voted',$value-$b_val);
        $this->response(1,"success",$iid);
    }

    public function challengeupload(){
        $data=Input::all();
        $title=$data['title'];
        $description=$data['description'];
        $photocount=$data['photocount'];
        $price=$data['price'];
        $paid=$data['paid'];
        $period=$data['period'];
        $type=$data['type'];
        $c_type=$data['c_type'];
        $s_name=$data['s_name'];
        $file = $data['image'];
        $inserarr=[
            'title'=>$title,
            'description'=>$description,
            'photocount'=>$photocount,
            'type'=>$type,
            'c_type'=>$c_type,
            'timeline1'=>$period*3600,
            'timeline'=>$period,
            'price'=>$price,
            'u-id'=>Session::get('auid'),
            's_name'=>$s_name,
            'paid'=>$paid,
            'prize'=>'1,1,1'

        ];
        $id=DB::table('challenge')->insertGetId($inserarr);
        $destinationPath = 'uploads/challengesimages';
        $imagename=$id.$file->getClientOriginalName();
        $file->move('public/'.$destinationPath,$imagename);
        $imageurl=asset($destinationPath.'/'.$imagename);
        DB::table('challenge')
            ->where('id',$id )
            ->update(['image-url' => $imageurl]);
        // return redirect('admin/challenge');
        $this->response(1,"success",$inserarr);
    }
    public function permission(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $cid=$data['cid'];
        $table=$data['table'];
        $value=$data['value'];
        if($value=='deleted'){
            $this->Imagedelete();
        }
        $date=Carbon::now();

        $challengeNotification = NotificationBanner::where('challenge_id',$cid)->get();
        foreach($challengeNotification as $not) {
            $not->delete();
        }
        DB::table('challenge')
            ->where('id',$cid )
            ->update(['start-time' => $date,'state'=>$value]);
        $this->response(1,"success",NULL);
    }
    public function award(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $cid=$data['cid'];
        $pc=DB::table('challenge')->where('id',$cid)->pluck('photocount')[0];
        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)
            ->orderBy('rank','asc')
            ->pluck('u-id');

        $check = DB::table('challenge')->where('id',$cid)->pluck('award')[0];
        $state = DB::table('challenge')->where('id',$cid)->pluck('state')[0];
        if($check == 'No' && $state == 'ended'){
            DB::table('challenge')->where('id',$cid)->update([
                'award'=>'Yes'
            ]);

            $completed_price=DB::table('challenge')->where('id',$cid)->pluck('price')[0];
            $price=floatval(ltrim($completed_price, "$"));

            for($i=0;$i<count($ujoincs);$i++){
                $rank=DB::table('ujoinc')->where([['u-id',$ujoincs[$i]],['c-id',$cid]])->pluck('rank')[0];

                if($rank == 1){
                    $r1_price=DB::table('setting')->where('id',1)->pluck('r1_price')[0];
                    $r1_flip=DB::table('setting')->where('id',1)->pluck('r1_flip')[0];
                    $r1_wand=DB::table('setting')->where('id',1)->pluck('r1_wand')[0];
                    $r1_charge=DB::table('setting')->where('id',1)->pluck('r1_charge')[0];
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r1_price);

                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r1_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r1_flip,
                        'wand'=>$r1_wand,
                        'charge'=>$r1_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r1_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(1)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }elseif($rank == 2){
                    $r2_price=DB::table('setting')->where('id',1)->pluck('r2_price')[0];
                    $r2_flip=DB::table('setting')->where('id',1)->pluck('r2_flip')[0];
                    $r2_wand=DB::table('setting')->where('id',1)->pluck('r2_wand')[0];
                    $r2_charge=DB::table('setting')->where('id',1)->pluck('r2_charge')[0];
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r2_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r2_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r2_flip,
                        'wand'=>$r2_wand,
                        'charge'=>$r2_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r2_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(2)'
                    ];
                    DB::table('transaction')->insert($inserarr);

                }elseif($rank == 3){
                    $r3_price=DB::table('setting')->where('id',1)->pluck('r3_price')[0];
                    $r3_flip=DB::table('setting')->where('id',1)->pluck('r3_flip')[0];
                    $r3_wand=DB::table('setting')->where('id',1)->pluck('r3_wand')[0];
                    $r3_charge=DB::table('setting')->where('id',1)->pluck('r3_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r3_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r3_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r3_flip,
                        'wand'=>$r3_wand,
                        'charge'=>$r3_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r3_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(3)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }elseif($rank == 4){
                    $r4_price=DB::table('setting')->where('id',1)->pluck('r4_price')[0];
                    $r4_flip=DB::table('setting')->where('id',1)->pluck('r4_flip')[0];
                    $r4_wand=DB::table('setting')->where('id',1)->pluck('r4_wand')[0];
                    $r4_charge=DB::table('setting')->where('id',1)->pluck('r4_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r4_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r4_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r4_flip,
                        'wand'=>$r4_wand,
                        'charge'=>$r4_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r4_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(4)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }elseif($rank == 5){
                    $r5_price=DB::table('setting')->where('id',1)->pluck('r5_price')[0];
                    $r5_flip=DB::table('setting')->where('id',1)->pluck('r5_flip')[0];
                    $r5_wand=DB::table('setting')->where('id',1)->pluck('r5_wand')[0];
                    $r5_charge=DB::table('setting')->where('id',1)->pluck('r5_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r5_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r5_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r5_flip,
                        'wand'=>$r5_wand,
                        'charge'=>$r5_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                    $inserarr=[
                        'amount'=>$price*$r5_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(5)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }elseif($rank > 5 && $rank < 11){
                    $r6_price=DB::table('setting')->where('id',1)->pluck('r6_price')[0];
                    $r6_flip=DB::table('setting')->where('id',1)->pluck('r6_flip')[0];
                    $r6_wand=DB::table('setting')->where('id',1)->pluck('r6_wand')[0];
                    $r6_charge=DB::table('setting')->where('id',1)->pluck('r6_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r6_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r6_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r6_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r6_flip,
                        'wand'=>$r6_wand,
                        'charge'=>$r6_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                }elseif($rank > 10 && $rank < 51){
                    $r7_price=DB::table('setting')->where('id',1)->pluck('r7_price')[0];
                    $r7_flip=DB::table('setting')->where('id',1)->pluck('r7_flip')[0];
                    $r7_wand=DB::table('setting')->where('id',1)->pluck('r7_wand')[0];
                    $r7_charge=DB::table('setting')->where('id',1)->pluck('r7_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r7_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r7_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r7_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r7_flip,
                        'wand'=>$r7_wand,
                        'charge'=>$r7_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                }elseif($rank > 50 && $rank < 101){
                    $r8_price=DB::table('setting')->where('id',1)->pluck('r8_price')[0];
                    $r8_flip=DB::table('setting')->where('id',1)->pluck('r8_flip')[0];
                    $r8_wand=DB::table('setting')->where('id',1)->pluck('r8_wand')[0];
                    $r8_charge=DB::table('setting')->where('id',1)->pluck('r8_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r8_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r8_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r8_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r8_flip,
                        'wand'=>$r8_wand,
                        'charge'=>$r8_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                }

            }

            $this->response(1,"success",NULL);}
        elseif($check == 'Yes'){
            $this->response(2,"success",NULL);
        }elseif($state != 'ended'){
            $this->response(3,"success",NULL);
        }
    }
    public function admin_bid(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $id=$data['item'];
        $state=$data['val'];
        if($state=='Accepted'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Accepted']);
            $fee0=DB::table('bid')->where('id',$id)->pluck('price')[0];
            $tax=DB::table('setting')->where('id',1)->pluck('tax')[0];
            $fee=$fee0*$tax;
            $uid=DB::table('bid')->where('id',$id)->pluck('seller_id')[0];
            $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
            $t_id=DB::table('userpix')->where('u-id',$uid)->pluck('no')[0];
            $u_wallet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id',$uid )
                ->update(['walet' => $u_wallet-$fee]);
            $date=Carbon::now();

            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>'Admin has approved your bid. You have charged $'.$fee.' for this transaction!'
            ];
            DB::table('note')->insert($inserarr);


        }
        if($state=='Delete'){
            DB::table('bid')->where('id',$id)->delete();
        }
        if($state=='Request'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Request']);
        }
        if($state=='Cancel'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Cancel']);
        }
        $this->response(1,"success",$state);
    }
    public function permission_user(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $id=$data['email'];
        $permission=$data['value'];

        if($permission == 'new'){
            DB::table('users')->where('email',$id)->update(['permission'=>'1']);
        }elseif($permission == 'approve'){
            DB::table('users')->where('email',$id)->update([
                'permission'=>'1',
                'vc'=>'true'
            ]);
        }elseif($permission == 'block'){
            DB::table('users')->where('email',$id)->update([
                'permission'=>'0',
                'vc'=>'false'
            ]);
        }elseif($permission == 'delete'){
            DB::table('users')->where('email',$id)->delete();
        }
        $this->response(200,'success added!',NULL);
    }

    public function withdraw_note(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        $id=$data['id'];
        $value=$data['value'];

        DB::table('withdraw')
            ->where('id',$id )
            ->update(['note'=>$value]);
        $this->response(1,"success",NULL);
    }
    //---------------------------image_delete-------------------------------//
    public function Imagedelete()
    {
        $data=input::all();
        $cid = $data['cid'];
        $d_filenames=DB::table('image')->where([['c-id',$cid],['vote','<',100],])->get();
        if(count($d_filenames)>0){
            $i=0;
            foreach($d_filenames as $d_filename){
                $url=$d_filename->url;
                $url1=trim($url,"http://urpixpays.com/publicsiti/");
                $url2=trim($url1,'e/');
                File::delete($url2);
                $i++;
            }
        }
        $check1=DB::table('image')->where('c-id',$cid )->get();
        if(count($check1)>0){
            DB::table('image')
                ->where('c-id',$cid )
                ->delete();
        }
        $check2=DB::table('challenge')->where('id',$cid )->get();
        if(count($check2)>0){
            DB::table('challenge')
                ->where('id',$cid )
                ->delete();
        }
        $check3=DB::table('invite_challenge')->where('c_id',$cid )->get();
        if(count($check3)>0){
            DB::table('invite_challenge')
                ->where('c-id',$cid )
                ->delete();
        }
        $check4=DB::table('ujoinc')->where('c-id',$cid )->get();
        if(count($check4)>0){
            DB::table('ujoinc')
                ->where('c-id',$cid )
                ->delete();
        }
        $this->response(1,"Success deleted challenge!",$d_filenames);
    }
    public function showUploadFile( ) {
        $data=Input::all();
        echo var_dump($data);
        $file = $data['image'];
        $name=$data['name'];
//        $file = $request->file('image');
        echo $name;

        $destinationPath = 'uploads';
        $file->move($destinationPath,$name.$file->getClientOriginalName());
        $this->response(1,"Uploaded",$data);
        //echo 'asdf';
    }

    public function usersignin(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $email=$data['email'];
        $password=$data['password'];
        $user = DB::table('users')->where([['email', $email],['password',md5($password)]])->first();
        //$this->response(200,'test',$user);
        if($user){
            Session::put($email, md5($email));
            $this->response(1,'Success Login',md5($email));

        }
        else{
            $this->response(200,"Invalid email or password",NULL);
        }
    }


//----------------------------get_userpix-------------------------------------//
    public function getUserpix(){
        $data=Input::all();
        $id=$data['uid'];
        $up_data=DB::table('userpix')->where('u-id',$id)->first();

        $this->response(1,'Success view',$up_data);
    }

//-----------------------------------end--------------------------------------//

//-----------------------------get_ujoinc_data-------------------------------//
    // public function getujoinc(){
    //     $data=Input::all();
    //     $cid=$data['cid'];
    //     $ujoincs=DB::table('ujoinc')->where('c-id',$cid)->get();
    //     $title=DB::table('challenge')->where('id',$cid)->pluck('title')[0];
    //     $description=DB::table('challenge')->where('id',$cid)->pluck('description')[0];
    //     $ujoinc_data=array();
    //     for($i=0;$i<count($ujoincs);$i++)
    //     {
    //         $ujoinc_data[$i]['title']=$title;
    //         $ujoinc_data[$i]['description']=$description;
    //         foreach($ujoincs[$i] as $ujoinc)
    //         {
    //             $uid=$ujoinc->u-id;
    //             $email=DB::table('users')->where('uid',$uid)->pluck('email')[0];
    //             $name=DB::table('users')->where('uid',$uid)->pluck('name')[0];
    //             $ujoinc_data[$i]['email']=$email;
    //             $ujoinc_data[$i]['name']=$name;
    //             $ujoinc_data[$i]['u-id']=$uid;
    //             $ujoinc_data[$i]['c-id']=$ujoinc->c-id;
    //             $ujoinc_data[$i]['vote_count']=$ujoinc->vote_count;
    //             $ujoinc_data[$i]['rank']=$ujoinc->rank;
    //             $ujoinc_data[$i]['ujoinc_date']=$ujoinc->ujoinc_date;
    //             $ujoinc_data[$i]['exposure']=$ujoinc->exposure;
    //         }
    //     }
    //     $this->response(1,'Success view','');
    // }

//---------------------------------end----------------------------------------//
//----------------------------add_uerpix_update-------------------------------//
    public function updateuserpix()
    {
        $data=input::all();
        $uid=$data['uid'];
        $Flip=$data['Flip'];
        $Wand=$data['Wand'];
        $Charge=$data['Charge'];
        $walet=$data['walet'];
        $rank=$data['rank'];
        $points=$data['Points'];

        DB::table('userpix')
            ->where('u-id',$uid)
            ->update([
                'Flip' => $Flip,
                'Charge' => $Charge,
                'Wand' => $Wand,
                'walet' => $walet,
                'rank' => $rank,
                'Points'=>$points
            ]);

        $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
        $t_id=DB::table('userpix')->where('u-id',$uid)->pluck('no')[0];
        $date=Carbon::now();

        $inserarr = [
            'u_email' => $u_email,
            't_id' => $t_id,
            'n_type'=>'userpix_show',
            'n_date'=>$date,
            'state'=>'new',
            'msg'=>'Admin has changed your Wallet.'
        ];
        DB::table('note')->insert($inserarr);

        // return redirect('admin/user');

        // $this->response(1,'Success update',$data);

    }
    public function edituser()
    {
        $data=input::all();
        $uid=$data['uid'];
        $name=$data['name'];
        $email=$data['email'];
        $pass=$data['pass'];
        $phone=$data['phone'];
        $city=$data['city'];
        $country=$data['country'];

        DB::table('users')
            ->where('no',$uid)
            ->update([
                'name' => $name,
                'email' => $email,
                'pass' => $pass,
                'password'=>md5($pass),
                'mobilenum' => $phone,
                'city' => $city,
                'country' => $country
            ]);

        // return redirect('admin/user');

        // $this->response(1,'Success update',$data);

    }
    // -------------pcs-----------------------------
    public function challenge_edit()
    {
        $data=input::all();
        $uid=$data['uid'];
        $title=$data['title'];
        $descriptionp=$data['description'];
        $votes=$data['votes'];
        $period=$data['period'];
        $price=$data['price'];
        $photo_counts=$data['photo_counts'];
        $date=Carbon::now();
        DB::table('challenge')
            ->where('id',$uid)
            ->update([
                'title' => $title,
                'start-time' => $date,
                'description' => $descriptionp,
                'votes' => $votes,
                'timeline1' => $period*3600,
                'timeline' => $period,
                'price' => $price,
                'photocount' => $photo_counts
            ]);
    }
    // -------------pcs-----------------------------
//----------------------------------end---------------------------------------//
    public function AdminRemark($id,$action){
        // if (Session::get('admin_login_flag')!='admin_login') return redirect('Admin/Auth/login');

        if($action=='Success'){
            $userid=DB::table('withdraw')->where('id',$id)->pluck('user_id')[0];
            $amount=DB::table('withdraw')->where('id',$id)->pluck('amount')[0];
            $walet=DB::table('userpix')->where('u-id',$userid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id',$userid)
                ->update([
                    'walet' => $walet-$amount
                ]);

            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Cancel'){
            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Delete'){
            DB::table('withdraw')
                ->where('id',$id )
                ->delete();
        }

        return redirect('admin/withdrawrequest');
    }
    public function AdminRemark1($id,$action){
        // if (Session::get('admin_login_flag')!='admin_login') return redirect('Admin/Auth/login');

        if($action=='Success'){
            $userid=DB::table('withdraw')->where('id',$id)->pluck('user_id')[0];
            $amount=DB::table('withdraw')->where('id',$id)->pluck('amount')[0];
            $walet=DB::table('userpix')->where('u-id',$userid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id',$userid)
                ->update([
                    'walet' => $walet-$amount
                ]);

            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Cancel'){
            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Delete'){
            DB::table('withdraw')
                ->where('id',$id )
                ->delete();
        }

        return redirect('admin/withdrawrequest1');
    }
    public function admin_profile()
    {
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_age=DB::table('admin')->where('id',$a_id)->pluck('age')[0];
        $a_country=DB::table('admin')->where('id',$a_id)->pluck('country')[0];
        $a_city=DB::table('admin')->where('id',$a_id)->pluck('city')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_phone=DB::table('admin')->where('id',$a_id)->pluck('phone_number')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_date=DB::table('admin')->where('id',$a_id)->pluck('register_date')[0];
        $a_walet=DB::table('admin')->where('id',$a_id)->pluck('walet')[0];
        return view('Admin.admin_profile',compact('a_email','a_id','a_name','a_age','a_country','a_city','a_date','a_walet','a_image','a_phone','a_image','a_name'));
    }
    public function admin_profile1()
    {
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $uid=Session::get('auid');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_age=DB::table('admin')->where('id',$a_id)->pluck('age')[0];
        $a_country=DB::table('admin')->where('id',$a_id)->pluck('country')[0];
        $a_city=DB::table('admin')->where('id',$a_id)->pluck('city')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_phone=DB::table('admin')->where('id',$a_id)->pluck('phone_number')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_date=DB::table('admin')->where('id',$a_id)->pluck('register_date')[0];
        $a_walet=DB::table('admin')->where('id',$a_id)->pluck('walet')[0];
        return view('Admin.admin_profile1',compact('a_email','a_id','a_name','a_age','a_country','a_city','a_date','a_walet','a_image','a_phone','a_image','a_name'));
    }
    public function adminsaveprofile(Request $request){
        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        if (Input::hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $profile_picture->move(public_path() . '/images/profile_pictures', $profile_picture->getClientOriginalName());
            $url =$profile_picture->getClientOriginalName();

            DB::table('admin')
                ->where('id', $a_id)
                ->update([
                    'admin_image' => $url
                ]);
        }
        $data=Input::all();
        $name=$data['name'];
        $email=$data['email'];
        $city=$data['city'];
        $country=$data['country'];
        $age=$data['age'];
        $phone=$data['phone'];
        $walet=$data['walet'];
        DB::table('admin')
            ->where('id',$a_id )
            ->update([
                'name' =>$name,
                'age' =>$age,
                'email' =>$email,
                'country' =>$country,
                'city' =>$city,
                'phone_number'=>$phone,
                'walet'=>$walet
            ]);

        return redirect('/admin_profile');
        return back();
    }
    public function adminsaveprofile1(Request $request){
        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        if (Input::hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $profile_picture->move(public_path() . '/images/profile_pictures', $profile_picture->getClientOriginalName());
            $url =$profile_picture->getClientOriginalName();

            DB::table('admin')
                ->where('id', $a_id)
                ->update([
                    'admin_image' => $url
                ]);
        }
        $data=Input::all();
        $name=$data['name'];
        $email=$data['email'];
        $city=$data['city'];
        $country=$data['country'];
        $age=$data['age'];
        $phone=$data['phone'];
        $walet=$data['walet'];
        DB::table('admin')
            ->where('id',$a_id )
            ->update([
                'name' =>$name,
                'age' =>$age,
                'email' =>$email,
                'country' =>$country,
                'city' =>$city,
                'phone_number'=>$phone,
                'walet'=>$walet
            ]);

        return redirect('/admin_profile1');
        return back();
    }
    public function adminsignup(){
        $data=Input::all();
        $email=$data['email'];
        $age=$data['age'];
        $country=$data['country'];
        $city=$data['city'];
        $name=$data['name'];
        $password=$data['password'];
        $phone=$data['phone'];
        $admin=DB::table('admin')->where('email',$email)->first();
        if($admin){
            return redirect('admin_register');
        }
        else{
            $inserarr=[
                'name'=>$name,
                'email'=>$email,
                'age'=>$age,
                'country'=>$country,
                'city'=>$city,
                'password'=>md5($password),
                'phone_number'=>$phone
            ];
            DB::table('admin')->insert($inserarr);
            Session::put('aid', $email);

            Session::put('admin_login_flag','admin_login');
            return redirect('admin/user');
        }
    }
    public function adminlogin(){
        $data=Input::all();
        $email=$data['email'];
        $password=md5($data['password']);
        $validation=DB::table('admin')->where([['email',$email],['password',$password]])->first();
        if($validation){
            // Session::put($email, md5($email));
            Session::put('admin_login_flag','admin_login');
            Session::put('aid', $email);
            $role=DB::table('admin')->where([['email',$email],['password',$password]])->pluck('role')[0];
            if($role=='manager'){
                return redirect('admin/admin');
            }
            return redirect('admin/user');
        }
        else
        {
            return redirect('/admin_login');
        }

    }
    public function adminlogout(){
        Session::forget('admin_login_flag');
        Session::forget('aid');
        return redirect('admin/login0123123');

    }
    public function updateadmin(){
        $data=Input::all();
        $id=$data['id'];
        $name=$data['name'];
        $email=$data['email'];
        $phone=$data['phone'];

        DB::table('admin')->where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'phone_number'=>$phone,
        ]);
        $this->response(200,'success added!',NULL);
    }
    public function user_permiss(){
        $data=Input::all();
        $id=$data['id'];
        $permission=$data['permission'];

        if($permission == 'New'){
            DB::table('users')->where('email',$id)->update(['permission'=>'0']);
        }elseif($permission == 'Agree'){
            DB::table('users')->where('email',$id)->update(['permission'=>'1']);
        }elseif($permission == 'Block'){
            DB::table('users')->where('email',$id)->update(['permission'=>'2']);
        }elseif($permission == 'Delete'){
            DB::table('users')->where('email',$id)->delete();
        }
        $this->response(200,'success added!',NULL);
    }
    public function admin_permiss(){
        $data=Input::all();
        $id=$data['id'];
        $permission=$data['permission'];

        if($permission == 'New'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'0']);
        }elseif($permission == 'Agree'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'1']);
        }elseif($permission == 'Block'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'2']);
        }elseif($permission == 'Delete'){
            DB::table('admin')->where('email',$id)->delete();
        }
        $this->response(200,'success added!',NULL);
    }
    public function sendvc(){
        //validate the info, create rules for the inputs
        $data=Input::all();
        $email=$data['email'];
        $name=$data['name'];
        $password=$data['password'];
        $mobile_number=$data['mobile_number'];
        //$vc=$data['vc'];
        $user = DB::table('users')->where([['email', $email],['vc','true']])->first();

        //$this->response(200,'test',$user);
        if($user){
            $this->response(200,'Email in use',NULL);
        }
        else{
            $user1 = DB::table('users')->where('email', $email)->first();
            $vc=rand(100000,999999);
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
                    'email'=>$email,
                    'password'=>md5($password),
                    'mobilenum'=>$mobile_number,
                    'vc'=>$vc
                ];
                DB::table('users')->insert($inserarr);
                //Mail::to($email)->send(new TestEmail($vc,"Hi! this is Verification Code."));
                $this->response(1,"Sent VC to email",NULL);
            }

        }
    }

//-----------------------------New admin-----------------------------


    public function admin_login(){
        $data=Input::all();
        $email=$data['email'];
        $password=md5($data['password']);
        $validation=DB::table('admin')->where([['email',$email],['password',$password]])->first();
        if($validation){
            // Session::put($email, md5($email));
            Session::put('admin_login_flag','admin_login');
            Session::put('aid', $email);
            Session::put('auid', $email);
            $role=DB::table('admin')->where([['email',$email],['password',$password]])->pluck('role')[0];
            if($role=='manager'){
                return redirect('admin/view');
            }
            return redirect('customer/view');
        }
        else
        {
            return redirect('/admin/login');
        }

    }

    public function admin_view()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $user = DB::table('admin')->get();
        $grade =DB::table('admin')->where('id',$a_id)->pluck('role')[0];
        if($grade == 'manager'){
            $per=2;
        }else{
            $per=1;
        }
        return view('admin1.pages.client_list.distributors.admin',['data'=> $user,'a_image'=>$a_image,'per'=>$per,'a_name'=>$a_name]);
    }



//--------------------------------end--------------------------------


//-----------------------------new admin part------------------------
    public function dashboard(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $user = DB::table('users')
            ->join('userpix', 'users.no', 'userpix.u-id')
            ->select('users.no', 'users.email', 'users.name', 'users.email', 'users.password','users.city','users.pass','users.country', 'users.mobilenum', 'users.permission', 'users.vc', 'users.role',  'userpix.Flip', 'userpix.Charge', 'userpix.Wand', 'userpix.Rank', 'userpix.walet', 'userpix.Points')
            ->get();
        $user_number = count($user);

        return view('admin1.pages.dashboard',['a_image'=>$a_image,'a_name'=>$a_name,'users'=>$user_number]);
    }

    public function adminlogin0(){
        $data=Input::all();
        $email=$data['email'];
        $password=md5($data['password']);
        $validation=DB::table('admin')->where([['email',$email],['password',$password]])->first();
        if($validation){
            // Session::put($email, md5($email));
            Session::put('admin_login_flag','admin_login');
            Session::put('aid', $email);
            $role=DB::table('admin')->where([['email',$email],['password',$password]])->pluck('role')[0];
            Session::put('per', $role);
            if($role=='manager'){
                return redirect('/admin/dashboard');
            }
            return redirect('/admin/dashboard');
        }
        else
        {
            return redirect('/admin/login0');
        }

    }


    public function adminprofile()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_age=DB::table('admin')->where('id',$a_id)->pluck('age')[0];
        $a_country=DB::table('admin')->where('id',$a_id)->pluck('country')[0];
        $a_city=DB::table('admin')->where('id',$a_id)->pluck('city')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_phone=DB::table('admin')->where('id',$a_id)->pluck('phone_number')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $a_date=DB::table('admin')->where('id',$a_id)->pluck('register_date')[0];
        $a_walet=DB::table('admin')->where('id',$a_id)->pluck('walet')[0];
        return view('admin1.pages.adminprofile',compact('a_email','a_id','a_name','a_age','a_country','a_city','a_date','a_walet','a_image','a_phone','a_image','a_name'));
    }

    public function adminbanner()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_image=DB::table('banner')->first();
        $a_image = 'cuongnguyen.jpg';
        return view('admin1.pages.adminbanner',compact('a_image'));
    }

    public function adminsaveprofile0(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');

        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        if (Input::hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $profile_picture->move(public_path() . '/images/profile_pictures', $profile_picture->getClientOriginalName());
            $url =$profile_picture->getClientOriginalName();

            DB::table('admin')
                ->where('id', $a_id)
                ->update([
                    'admin_image' => $url
                ]);
        }
        $data=Input::all();
        $name=$data['name'];
        $email=$data['email'];
        $city=$data['city'];
        $country=$data['country'];
        $age=$data['age'];
        $phone=$data['phone'];
        $walet=$data['walet'];
        DB::table('admin')
            ->where('id',$a_id )
            ->update([
                'name' =>$name,
                'age' =>$age,
                'email' =>$email,
                'country' =>$country,
                'city' =>$city,
                'phone_number'=>$phone,
                'walet'=>$walet
            ]);

        return redirect('/admin/profile');
        return back();
    }


    public function adminUpdateBanner(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');

        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if (Input::hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $profile_picture->move(public_path() . '/defaultbanner', $profile_picture->getClientOriginalName());
            $url =$profile_picture->getClientOriginalName();

            DB::table('banner')
                ->where('id', $request->id)
                ->update([
                    'admin_image' => $url
                ]);
        }

        return redirect('/admin/banner');
        return back();
    }

    public function administrator()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $user = DB::table('admin')->get();
        return view('admin1.pages.administrator',['admins'=> $user,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function create_admin(Request $request){
        $data=Input::all();
        $name=$data['name'];
        $email=$data['email'];
        $country=$data['country'];
        $city=$data['city'];
        $age=$data['age'];
        $password1=$data['password'];
        $password=md5($data['password']);
        $phone=$data['phone'];

        $inserarr=[
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'password1'=>$password1,
            'country'=>$country,
            'city'=>$city,
            'age'=>$age,
            'phone_number'=>$phone
        ];
        DB::table('admin')->insert($inserarr);

        return redirect('admin/administrator');
        return back();
    }

    public function edit_admin(Request $request){
        $data=Input::all();
        $id=$data['id'];
        $name=$data['name'];
        $email=$data['email'];
        $country=$data['country'];
        $city=$data['city'];
        $age=$data['age'];
        $password1=$data['password'];
        $password=md5($data['password']);
        $phone=$data['phone'];
        $wallet=$data['wallet'];

        if(isset($password1)){
            DB::table('admin')->where('id',$id)->update([
                'name'=>$name,
                'email'=>$email,
                'country'=>$country,
                'city'=>$city,
                'age'=>$age,
                'walet'=>$wallet,
                'password'=>$password,
                'password1'=>$password1,
                'phone_number'=>$phone
            ]);
        }else{
            DB::table('admin')->where('id',$id)->update([
                'name'=>$name,
                'email'=>$email,
                'country'=>$country,
                'city'=>$city,
                'age'=>$age,
                'walet'=>$wallet,
                'phone_number'=>$phone
            ]);
        }
        return redirect('admin/administrator');
        return back();
    }

    public function admin_permiss0(){
        $data=Input::all();
        $id=$data['id'];
        $permission=$data['permission'];

        if($permission == 'New'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'0']);
        }elseif($permission == 'Agree'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'1']);
        }elseif($permission == 'Block'){
            DB::table('admin')->where('email',$id)->update(['permission'=>'2']);
        }elseif($permission == 'Delete'){
            DB::table('admin')->where('email',$id)->delete();
        }
        $this->response(200,'success added!',NULL);
    }

    public function user0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];


        $user = DB::table('users')
            ->join('userpix', 'users.no', 'userpix.u-id')
            ->select('users.no', 'users.email','users.post_approval', 'users.name', 'users.email', 'users.password','users.city','users.register_date','users.pass','users.country', 'users.mobilenum', 'users.permission', 'users.vc', 'users.role',  'userpix.Flip','userpix.voted', 'userpix.Charge', 'userpix.Wand','users.age', 'userpix.Rank', 'userpix.walet', 'userpix.Points')
            ->paginate(15);
        return view('admin1.pages.user',['admins'=> $user,'a_image'=>$a_image,'a_name'=>$a_name]);
    }


    public function userSearch(Request $req)
    {

        $data = User::with('userpix')->when($req->search,function($que) use ($req) {
            $que->where('email', 'LIKE', "%{$req->search}%")->orWhere(function ($que) use ($req){
                $que->where('name','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('city','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('country','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('mobilenum','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('no','LIKE', "%{$req->search}%");
            });
        })->paginate(15);
        // dd($data);

        return view('admin1.pagination_views.user_pagination',['admins'=> $data])->render();
    }

    public function userallData(Request $req)
    {

        $data = User::with('userpix')->when($req->search,function($que) use ($req) {
            $que->where('email', 'LIKE', "%{$req->search}%")->orWhere(function ($que) use ($req){
                $que->where('name','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('city','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('country','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('mobilenum','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('no','LIKE', "%{$req->search}%");
            });
        })->get();
        // dd($data);

        return response()->json($data);
    }



    public function postApprovalSettings(Request $req){

        DB::table('users')->where('no',$req->id)->update(['post_approval' => $req->approval_data]);
        // $user->post_approval = $req->approval_data;
        // $user->save();
        return response()->json(true,202);
    }

    public function edit_user(){
        $data=Input::all();
        $id=$data['id'];
        $name=$data['name'];
        $email=$data['email'];
        $country=$data['country'];
        $city=$data['city'];
        $password1=$data['password'];
        $password=md5($data['password']);
        $phone=$data['phone'];
        $wand=$data['wand'];
        $charge=$data['charge'];
        $flip=$data['flip'];
        $votes=$data['votes'];
        $wallet=$data['wallet'];

        if(isset($password1)){
            DB::table('users')->where('no',$id)->update([
                'name'=>$name,
                'email'=>$email,
                'country'=>$country,
                'city'=>$city,
                'password'=>$password,
                'pass'=>$password1,
                'mobilenum'=>$phone
            ]);
        }else{
            DB::table('users')->where('no',$id)->update([
                'name'=>$name,
                'email'=>$email,
                'country'=>$country,
                'city'=>$city,
                'mobilenum'=>$phone
            ]);
        }
        DB::table('userpix')->where('u-id',$id)->update([
            'Flip'=>$flip,
            'Wand'=>$wand,
            'Charge'=>$charge,
            'Points'=>$votes,
            'walet'=>$wallet,
        ]);
        $this->response(200,'success added!',NULL);
    }

    public function permission_user0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $id=$data['email'];
        $permission=$data['permission'];

        if($permission == 'new'){
            DB::table('users')->where('email',$id)->update(['permission'=>'1']);
        }elseif($permission == 'approve'){
            DB::table('users')->where('email',$id)->update([
                'permission'=>'2',
                'vc'=>'true'
            ]);
        }elseif($permission == 'block'){
            DB::table('users')->where('email',$id)->update([
                'permission'=>'0',
                'vc'=>'false'
            ]);
        }elseif($permission == 'delete'){
            DB::table('users')->where('email',$id)->delete();
        }
        $this->response(200,'success added!',NULL);
    }
    public function app_notifications()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $app_notifications = DB::table('app_notifications')->get();
        return view('admin1.pages.appnotifications',['admins'=> $app_notifications,'a_image'=>$a_image,'a_name'=>$a_name]);
    }
    public function challenge0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','normal')->get();
        return view('admin1.pages.challenges',['admins'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function createPopPupForUsers(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $users = User::with('challenge_joins')->whereDoesntHave('challenge_joins', function ($que) use ($request) {
            $que->where('c-id', $request->id);
        })->whereDoesntHave('NotificationBanner',function($q) use ($request) {
            $q->where('challenge_id', $request->id);
        })->pluck('no');

        foreach($users as $user ){
            NotificationBanner::create([
                'user_id'=>$user,
                'challenge_id'=>$request->id,
                'type'=>'challenge'
            ]);
        }

        return redirect()->back();
    }

    public function challengeupload0(){
        $data=Input::all();
        $title=$data['title'];
        $description=$data['description'];
        $photocount=$data['photocount'];
        $price=$data['price'];
        $paid=$data['paid'];
        $period=$data['period'];
        $type=$data['type'];
        $c_type=$data['c_type'];
        $s_name=$data['s_name'];
        $file = $data['image'];
        $inserarr=[
            'title'=>$title,
            'description'=>$description,
            'photocount'=>$photocount,
            'type'=>$type,
            'c_type'=>$c_type,
            'timeline1'=>strtotime($period),
            'timeline'=>$period,
            'price'=>$price,
            'u-id'=>Session::get('auid'),
            's_name'=>$s_name,
            'paid'=>$paid,
            'prize'=>'1,1,1'

        ];
        $id=DB::table('challenge')->insertGetId($inserarr);
        $destinationPath = 'uploads/challengesimages';
        $imagename=$id.$file->getClientOriginalName();

        $ext = pathinfo($id.$file->getClientOriginalName(), PATHINFO_EXTENSION);
        $exten=".".$ext;
        $imgname=trim($imagename,$exten);
        $url = md5($imgname).'.'.$ext;
        $file->move('public/'.$destinationPath,$url);
        $imageurl=asset($destinationPath.'/'.$url);

        DB::table('challenge')
            ->where('id',$id )
            ->update(['image-url' => $imageurl]);
        // return redirect('admin/challenge');
        $this->response(1,"success",$inserarr);
    }

    public function permission0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $cid=$data['cid'];
        $table=$data['table'];
        $value=$data['value'];
        if($value=='deleted'){
            $this->Imagedelete();
        }

        $challengeNotification = NotificationBanner::where('challenge_id',$cid)->get();
        foreach($challengeNotification as $not) {
            $not->delete();
        }
        $date=Carbon::now();
        DB::table('challenge')
            ->where('id',$cid )
            ->update(['start-time' => $date,'state'=>$value]);
        $this->response(1,"success",NULL);
    }


    public function challenge_edit0()
    {
        $data=input::all();
        $cid=$data['cid'];
        $title=$data['title'];
        $descriptionp=$data['description'];
        $period=$data['period'];
        $price=$data['price'];
        $photo_counts=$data['photocount'];
        $file = $data['image'];
        $id = $cid;
        $date=Carbon::now();
        DB::table('challenge')
            ->where('id',$cid)
            ->update([
                'title' => $title,
                'description' => $descriptionp,
                'timeline1' => strtotime($period),
                'timeline' => $period,
                'price' => $price,
                'photocount' => $photo_counts
            ]);

        if(isset($file)){
            $destinationPath = 'uploads/challengesimages';
            $imagename=$id.$file->getClientOriginalName();

            $ext = pathinfo($id.$file->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $file->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('challenge')
                ->where('id',$cid )
                ->update(['image-url' => $imageurl]);
        }

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

    public function award0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $cid=$data['cid'];
        $pc=DB::table('challenge')->where('id',$cid)->pluck('photocount')[0];
        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)
            ->orderBy('rank','asc')
            ->pluck('u-id');

        $check = DB::table('challenge')->where('id',$cid)->pluck('award')[0];
        $state = DB::table('challenge')->where('id',$cid)->pluck('state')[0];
        $challengeName = DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        if($check == 'No' && $state == 'ended'){
            DB::table('challenge')->where('id',$cid)->update([
                'award'=>'Yes'
            ]);

            $completed_price=DB::table('challenge')->where('id',$cid)->pluck('price')[0];
            $price=floatval(ltrim($completed_price, "$"));

            for($i=0;$i<count($ujoincs);$i++){
                $rank=DB::table('ujoinc')->where([['u-id',$ujoincs[$i]],['c-id',$cid]])->pluck('rank')[0];

                if($rank == 1){
                    $r1_price=DB::table('setting')->where('id',1)->pluck('r1_price')[0];
                    $r1_flip=DB::table('setting')->where('id',1)->pluck('r1_flip')[0];
                    $r1_wand=DB::table('setting')->where('id',1)->pluck('r1_wand')[0];
                    $r1_charge=DB::table('setting')->where('id',1)->pluck('r1_charge')[0];
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r1_price);

                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r1_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r1_flip,
                        'wand'=>$r1_wand,
                        'charge'=>$r1_charge
                    ];

                    $winner_id= DB::table('winner')->insertGetId($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r1_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(1)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                    $total_votes= @DB::table('image')->where([['u-id', $ujoincs[$i]],['c-id',$cid],['url','<>', Null]])->sum('vote');

                    $userData = User::find($ujoincs[$i]);
                    self::sendNotification($userData->token,'Challenge Invite','Congratulations! You have won the challenge ``'.$challengeName.'``. Your total votes are '.$total_votes);
                    $users= User::all();

                    foreach($users as $user) {
                        $winnerBanner= new winnerBanner;
                        $winnerBanner->winner_id =$winner_id;
                        $winnerBanner->user_id=$user->no;
                        $winnerBanner->save();
                    }


                }elseif($rank == 2){
                    $r2_price=DB::table('setting')->where('id',1)->pluck('r2_price')[0];
                    $r2_flip=DB::table('setting')->where('id',1)->pluck('r2_flip')[0];
                    $r2_wand=DB::table('setting')->where('id',1)->pluck('r2_wand')[0];
                    $r2_charge=DB::table('setting')->where('id',1)->pluck('r2_charge')[0];
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r2_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r2_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r2_flip,
                        'wand'=>$r2_wand,
                        'charge'=>$r2_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r2_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(2)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                    $total_votes= @DB::table('image')->where([['u-id', $ujoincs[$i]],['c-id',$cid],['url','<>', Null]])->sum('vote');

                    $userData = User::find($ujoincs[$i]);
                    self::sendNotification($userData->token,'Challenge Price','Congratulations for winning the second place in the``'.$challengeName.'``. challenge. Your total votes are '.$total_votes);
                }elseif($rank == 3){
                    $r3_price=DB::table('setting')->where('id',1)->pluck('r3_price')[0];
                    $r3_flip=DB::table('setting')->where('id',1)->pluck('r3_flip')[0];
                    $r3_wand=DB::table('setting')->where('id',1)->pluck('r3_wand')[0];
                    $r3_charge=DB::table('setting')->where('id',1)->pluck('r3_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r3_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r3_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r3_flip,
                        'wand'=>$r3_wand,
                        'charge'=>$r3_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r3_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(3)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                    $total_votes= @DB::table('image')->where([['u-id', $ujoincs[$i]],['c-id',$cid],['url','<>', Null]])->sum('vote');

                    $userData = User::find($ujoincs[$i]);
                    self::sendNotification($userData->token,'Challenge Price','Congratulations for winning the third place in the``'.$challengeName.'``. challenge. Your total votes are '.$total_votes);
                }elseif($rank == 4){
                    $r4_price=DB::table('setting')->where('id',1)->pluck('r4_price')[0];
                    $r4_flip=DB::table('setting')->where('id',1)->pluck('r4_flip')[0];
                    $r4_wand=DB::table('setting')->where('id',1)->pluck('r4_wand')[0];
                    $r4_charge=DB::table('setting')->where('id',1)->pluck('r4_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r4_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r4_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r4_flip,
                        'wand'=>$r4_wand,
                        'charge'=>$r4_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                    $inserarr=[
                        'amount'=>$price*$r4_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(4)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                    $total_votes= @DB::table('image')->where([['u-id', $ujoincs[$i]],['c-id',$cid],['url','<>', Null]])->sum('vote');

                    $userData = User::find($ujoincs[$i]);
                    self::sendNotification($userData->token,'Challenge Price','You got '.$total_votes.' in the ``'.$challengeName.'``. challenge. and your rank is 4');
                }elseif($rank == 5){
                    $r5_price=DB::table('setting')->where('id',1)->pluck('r5_price')[0];
                    $r5_flip=DB::table('setting')->where('id',1)->pluck('r5_flip')[0];
                    $r5_wand=DB::table('setting')->where('id',1)->pluck('r5_wand')[0];
                    $r5_charge=DB::table('setting')->where('id',1)->pluck('r5_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*$r5_price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*$r5_price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r5_flip,
                        'wand'=>$r5_wand,
                        'charge'=>$r5_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                    $inserarr=[
                        'amount'=>$price*$r5_price,
                        'u_id'=>$ujoincs[$i],
                        'type'=>'winner->Rank(5)'
                    ];
                    DB::table('transaction')->insert($inserarr);
                }elseif($rank > 5 && $rank < 11){
                    $r6_price=DB::table('setting')->where('id',1)->pluck('r6_price')[0];
                    $r6_flip=DB::table('setting')->where('id',1)->pluck('r6_flip')[0];
                    $r6_wand=DB::table('setting')->where('id',1)->pluck('r6_wand')[0];
                    $r6_charge=DB::table('setting')->where('id',1)->pluck('r6_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r6_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r6_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r6_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r6_flip,
                        'wand'=>$r6_wand,
                        'charge'=>$r6_charge
                    ];

                    DB::table('winner')->insert($inserarr);

                }elseif($rank > 10 && $rank < 51){
                    $r7_price=DB::table('setting')->where('id',1)->pluck('r7_price')[0];
                    $r7_flip=DB::table('setting')->where('id',1)->pluck('r7_flip')[0];
                    $r7_wand=DB::table('setting')->where('id',1)->pluck('r7_wand')[0];
                    $r7_charge=DB::table('setting')->where('id',1)->pluck('r7_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r7_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r7_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r7_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r7_flip,
                        'wand'=>$r7_wand,
                        'charge'=>$r7_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                }elseif($rank > 50 && $rank < 101){
                    $r8_price=DB::table('setting')->where('id',1)->pluck('r8_price')[0];
                    $r8_flip=DB::table('setting')->where('id',1)->pluck('r8_flip')[0];
                    $r8_wand=DB::table('setting')->where('id',1)->pluck('r8_wand')[0];
                    $r8_charge=DB::table('setting')->where('id',1)->pluck('r8_charge')[0];

                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',$r8_flip);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',$r8_wand);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',$r8_charge);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>$r8_flip,
                        'wand'=>$r8_wand,
                        'charge'=>$r8_charge
                    ];

                    DB::table('winner')->insert($inserarr);
                }

            }

            $this->response(1,"success",NULL);}
        elseif($check == 'Yes'){
            $this->response(2,"success",NULL);
        }elseif($state != 'ended'){
            $this->response(3,"success",NULL);
        }
    }

    public function gamex()
    {

        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $challenge = DB::table('challenge')->where('c_type','game')->get();
        return view('admin1.pages.gof',['admins'=> $challenge,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function ujoined_challenge($cid)
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];   $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $data0['title'] = DB::table('challenge')->where('id',$cid)->pluck('title')[0];
        $data0['description'] = DB::table('challenge')->where('id',$cid)->pluck('description')[0];
        $data0['uid'] = DB::table('challenge')->where('id',$cid)->pluck('u-id')[0];

        // print_r($data0['uid']);exit;

        //return json_encode(DB::table('users')->where('no',$data0['uid'])->pluck('name'));
        $data0['name'] = DB::table('admin')->where('id',$data0['uid'])->pluck('name')[0];
        $data0['email'] = DB::table('admin')->where('id',$data0['uid'])->pluck('email')[0];
        $data0['cid']=$cid;

        $c=DB::table('challenge')->where('id',$cid)->pluck('photocount')[0];

        $images=DB::table('image')->where('c-id',$cid)->get();

        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)
            ->join('users','users.no','ujoinc.u-id')->orderBy('rank','asc')->get();

        return view('admin1.pages.ujoinedchallenges',compact('data0','ujoincs','a_image','a_name','c','images'));

    }

    public function change_vote0(){
        $data=Input::all();
        $id=$data['id'];
        $value=$data['value'];

        $b_val=DB::table('image')->where('id',$id)->pluck('vote')[0];
        DB::table('image')->where('id',$id)->update([
            'vote'=>$value
        ]);
        $uid=DB::table('image')->where('id',$id)->pluck('u-id')[0];
        $cid=DB::table('image')->where('id',$id)->pluck('c-id')[0];

        $iid=DB::table('ujoinc')->where([['u-id',$uid],['c-id',$cid]])->pluck('id')[0];
        DB::table('ujoinc')->where('id',$iid)->increment('vote_count',$value-$b_val);
        DB::table('challenge')->where('id',$cid)->increment('votes',$value-$b_val);
        DB::table('userpix')->where('u-id',$uid)->increment('Points',$value-$b_val);
        // DB::table('userpix')->where('u-id',$uid)->increment('voted',$value-$b_val);
        $t_votes = DB::table('ujoinc')->where('id',$iid)->pluck('vote_count')[0];

        $this->response(1,"success",$t_votes);
    }

    public function winners()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $cids=DB::table('challenge')->where('award','Yes')->get();
        $winners=DB::table('winner')->join('users','users.no','winner.u_id')
            ->orderBy('rank','asc')
            ->get();


        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.winners',['a_image'=>$a_image,'a_name'=>$a_name,'cids'=>$cids,'winners'=>$winners]);
    }

    public function user_images0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images=DB::table('image')->join('users','users.no','image.u-id')->orderBy('upload_date', 'DESC')->paginate(15);
        $num      =count($images);
        return view('admin1.pages.userimages',compact('images','num','a_name','a_image'));
    }

    public function user_images_search(Request $req){
        // $images=DB::table('image')->join('users','users.no','image.u-id')->orderBy('id', 'DESC')->paginate(15);
        $images = buySellImage::with('user')->when($req->search,function($que) use ($req) {
            $que->whereHas('user',function($que) use ($req) {
                $que->where('email', 'LIKE', "%{$req->search}%")->orWhere(function($que) use ($req) {
                    $que->where('name', 'LIKE', "%{$req->search}%");
                });
            });
        })->paginate(15);
        $num      =count($images);
        return view('admin1.pagination_views.userImage_pagination',compact('images','num'));
    }

    public function imgdelete(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $id=$data['id'];

        DB::table('image')
            ->where('id',$id )
            ->delete();
        $this->response(200,"success",NULL);
    }

    public function orders()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $OrdersDetail =DB::table('order_main')->orderBy('order_id','desc')->get();
        $num      =count($OrdersDetail);
        return view('admin1.pages.orders',compact('OrdersDetail','num','a_name','a_image'));
    }

    public function note_update(Request $request){
        $data =  $request->all();
        $result = DB::table('order_main')
            ->where('order_id',$data['order_id'] )
            ->update(['note' => $data['notes']]);
        if($result){
            echo "success";
        }
    }

    public function order_status(Request $request){
        $data =  $request->all();
        $result = DB::table('order_main')
            ->where('order_id',$data['id'] )
            ->update(['status' => $data['val']]);
        if($result){
            echo "success";
        }
    }

    public function order_detail($order_id){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $order_main =DB::table('order_main')->where('order_id',$order_id)->get();


        $order_detail =DB::table('order_detail')
            ->join('image', 'image.id', '=', 'order_detail.product_id')
            ->join('users', 'users.no', '=', 'image.u-id')
            ->where('order_id',$order_id)->get();
        // dd($order_detail);
        return view('admin1.pages.orderdetails',compact('order_main','order_detail','a_name','a_image'));
    }

    public function deposit()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $deposit=DB::table('deposit')->get();
        $num=count($deposit);
        return view('admin1.pages.deposit',compact('deposit','num','a_image','a_name'));
    }

    public function withdraw()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $withdraw=DB::table('withdraw')->get();
        $num=count($withdraw);
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.withdraw',compact('withdraw','num','a_image','a_name'));
    }
    public function withdraw_search(Request $req)
    {

        $withdraw=DB::table('withdraw')->when($req->search,function($que) use ($req) {
            $que->where('username', 'LIKE', "%{$req->search}%")->orWhere(function ($que) use ($req){
                $que->where('amount','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('method','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('account','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('description','LIKE', "%{$req->search}%");
            })->orWhere(function ($que) use ($req){
                $que->where('note','LIKE', "%{$req->search}%");
            });
        })->orderBy('date','DESC')->paginate(15);
        $num=count($withdraw);
        return view('admin1.pagination_views.withdrawal_pagination',compact('withdraw','num'))->render();
    }

    public function withdraw_note0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $id=$data['id'];
        $value=$data['value'];

        DB::table('withdraw')
            ->where('id',$id )
            ->update(['note'=>$value]);
        $this->response(1,"success",NULL);
    }

    public function AdminRemark0(){
        // if (Session::get('admin_login_flag')!='admin_login') return redirect('Admin/Auth/login');
        $data=Input::all();
        $id=$data['id'];
        $action=$data['value'];

        if($action=='Success'){
            $userid=DB::table('withdraw')->where('id',$id)->pluck('user_id')[0];
            $amount=DB::table('withdraw')->where('id',$id)->pluck('amount')[0];
            $walet=DB::table('userpix')->where('u-id',$userid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id',$userid)
                ->update([
                    'walet' => $walet-$amount
                ]);

            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Cancel'){
            DB::table('withdraw')
                ->where('id',$id)
                ->update([
                    'remark' => $action
                ]);
        }
        elseif($action=='Delete'){
            DB::table('withdraw')
                ->where('id',$id )
                ->delete();
        }

        return redirect('admin/withdraw');
    }

    public function invitation0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $invitation=DB::table('invitation')->join('users','users.no','invitation.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.invitation',compact('invitation','a_image','a_name'));
    }

    public function sponsor0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $sponsor=DB::table('sponsor')->join('users','users.no','sponsor.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.sponsor',compact('sponsor','a_image','a_name'));
    }

    public function bidresult()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $bid=DB::table('bid')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.bid_result',compact('bid','a_image','a_name'));
    }
    public function buysell()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])->orWhere(['c-id' => NULL])
            ->orderBy('vote','desc')->get();
        return view('admin1.pages.buysell',compact('imgs'));
    }
    public function buysellSearch(Request $req)
    {


        $keyword=$req->search;
        if($req->search){
            $imgs = buySellImage::when($req->search,function($que) use ($req) {
                $que->orWhere(function ($que) use ($req) {
                    $que->where('imgname', 'LIKE', "%{$req->search}%")->where([['like','<>','0'],['state',NULL]]);
                })->orWhere(function ($que) use ($req) {
                    $que->where(['c-id' => NULL])->where('imgname', 'LIKE', "%{$req->search}%");
                });
            })->orderBy('vote','desc')->paginate(15);
        }else{
            $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',NULL]])->orWhere(['c-id' => NULL])
                ->orderBy('vote','desc')->paginate(15);
        }


        return view('admin1.pagination_views.buysell_pagination',compact('imgs'));
    }
    public function buysell_approved()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',1]])->orWhere(['c-id' => NULL])
            ->orderBy('vote','desc')->get();
        return view('admin1.pages.buysell_approved',compact('imgs'));
    }
    public function buysell_approved_search(Request $req)
    {

        $keyword=$req->search;
        if($req->search){
            $imgs = buySellImage::when($req->search,function($que) use ($req) {
                $que->orWhere(function ($que) use ($req) {
                    $que->where('imgname', 'LIKE', "%{$req->search}%")->where([['like','<>','0'],['state',1]]);
                })->orWhere(function ($que) use ($req) {
                    $que->where(['c-id' => NULL,['state',1]])->where('imgname', 'LIKE', "%{$req->search}%");
                });
            })->orderBy('vote','desc')->paginate(15);
        }else{
            $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',1]])->orWhere(['c-id' => NULL])
                ->orderBy('vote','desc')->paginate(15);
        }


        return view('admin1.pagination_views.buysell_pagination',compact('imgs'));
    }
    public function buysell_reject()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',2]])->orWhere(['c-id' => NULL])
            ->orderBy('vote','desc')->get();
        return view('admin1.pages.buysell_reject',compact('imgs'));
    }

    public function buysell_reject_search(Request $req)
    {

        $keyword=$req->search;
        if($req->search){
            $imgs = buySellImage::when($req->search,function($que) use ($req) {
                $que->orWhere(function ($que) use ($req) {
                    $que->where('imgname', 'LIKE', "%{$req->search}%")->where([['like','<>','0'],['state',2]]);
                })->orWhere(function ($que) use ($req) {
                    $que->where(['c-id' => NULL,['state',2]])->where('imgname', 'LIKE', "%{$req->search}%");
                });
            })->orderBy('vote','desc')->paginate(15);
        }else{
            $imgs=@DB::table('image')->select('id','url','imgname','price','u-id','vote','like','report','upload_date','state')->where([['imgname', 'LIKE', "%{$keyword}%"],['like','<>','0'],['state',2]])->orWhere(['c-id' => NULL])
                ->orderBy('vote','desc')->paginate(15);
        }


        return view('admin1.pagination_views.buysell_pagination',compact('imgs'));
    }

    public function admin_bid0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $id=$data['item'];
        $state=$data['val'];
        if($state=='Accepted'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Accepted']);
            $fee0=DB::table('bid')->where('id',$id)->pluck('price')[0];
            $tax=DB::table('setting')->where('id',1)->pluck('tax')[0];
            $fee=$fee0*$tax;
            $uid=DB::table('bid')->where('id',$id)->pluck('seller_id')[0];
            $u_email=DB::table('users')->where('no',$uid)->pluck('email')[0];
            $t_id=DB::table('userpix')->where('u-id',$uid)->pluck('no')[0];
            $u_wallet=DB::table('userpix')->where('u-id',$uid)->pluck('walet')[0];
            DB::table('userpix')
                ->where('u-id',$uid )
                ->update(['walet' => $u_wallet-$fee]);
            $date=Carbon::now();

            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>'Admin has approved your bid. You have charged $'.$fee.' for this transaction!'
            ];
            DB::table('note')->insert($inserarr);


        }
        if($state=='Delete'){
            DB::table('bid')->where('id',$id)->delete();
        }
        if($state=='Request'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Request']);
        }
        if($state=='Cancel'){
            DB::table('bid')->where('id',$id)->update(['admin_approve'=>'Cancel']);
        }
        $this->response(1,"success",$state);
    }
    public function adminbuysale(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $id=$data['item'];
        $state=$data['val'];
        if($state=='Accepted'){
            DB::table('image')->where('id',$id)->update(['state'=>'1']);
        }
        if($state=='Delete'){
            DB::table('image')->where('id',$id)->delete();
        }
        if($state=='Request'){
            DB::table('image')->where('id',$id)->update(['state'=>'1']);
        }
        if($state=='Cancel'){
            DB::table('image')->where('id',$id)->update(['state'=>'2']);
        }
        $this->response(1,"success",$state);
    }

    public function info_images0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images   = DB::table('info_images')->orderBy('imgorder', 'ASC')->get();
        $num      =count($images);
        return view('admin1.pages.infoimages',compact('images','num','a_name','a_image'));
    }

    public function update_info_order0(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        foreach ($data['image_id'] as $key => $value) {
            DB::table('info_images')->where('id',$value)->update(['imgorder'=>$data['imgorder'][$key],
                'image_title'=>$data['image_title'][$key],'image_detail'=>$data['image_details'][$key]
            ]);
        }
        return redirect('/admin/infoimages0');
    }

    public function  detele_info_image0($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('info_images')->where('id',$image_id)->pluck('imgname')[0];
            unlink(public_path() . '/uploads/info_images/'. $old_image);
            DB::table('info_images')->where('id',$image_id)->delete();
            return redirect('admin/infoimages0');
        }
        else{
            return redirect('admin/infoimages0');
        }
    }

    public function best_images0(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images=DB::table('best_images')->orderBy('imgorder', 'ASC')->get();
        $num      =count($images);
        return view('admin1.pages.bestimages',compact('images','num','a_name','a_image'));
    }
    public function exhebition(){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email  =Session::get('aid');
        $a_id     =DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image  =DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $images=DB::table('exhebition')->orderBy('imgorder', 'ASC')->get();
        $num      =count($images);
        return view('admin1.pages.exhebition',compact('images','num','a_name','a_image'));
    }

    public function update_best_order0(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        foreach ($data['image_id'] as $key => $value) {
            DB::table('best_images')->where('id',$value)->update(['url'=>$data['link'][$key],'imgtitle'=>$data['title'][$key],'imgorder'=>$data['imgorder'][$key]]);
        }
        return redirect('/admin/bestimages0');
    }
    public function update_exhebition_order(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('/admin_login');
        $data=Input::all();
        foreach ($data['image_id'] as $key => $value) {
            DB::table('exhebition')->where('id',$value)->update(['image_id'=>$data['title'][$key],'imgorder'=>$data['imgorder'][$key]]);
        }
        return redirect('/admin/exhebition');
    }

    public function upload_info_images0(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        $image_detail  = $data['image_details'];
        if (Input::hasFile('files')) {
            $uploaded_image = $request->file('files');
            $url  =  time().$uploaded_image->getClientOriginalName();
            $uploaded_image->move(public_path() . '/uploads/info_images', $url);
            $data = array('imgname' => $url, 'imgorder'=>'99' , 'image_detail' => $image_detail
            );
            DB::table('info_images')->insert($data);
        }
        return redirect('/admin/infoimages');
    }

    public function upload_best_images0(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        if (Input::hasFile('files')) {
            $uploaded_image = $request->file('files');
            $url  =  time().$uploaded_image->getClientOriginalName();
            $uploaded_image->move(public_path() . '/uploads/info_images', $url);
            $data = array('imgname' => $url, 'url' => $data['link'] , 'imgtitle' => $data['title'] ,'imgorder'=>'99'
            );
            DB::table('best_images')->insert($data);
        }
        return redirect('/admin/bestimages0');
    }
    public function upload_exhebition_images(Request $request){
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $data=Input::all();
        if (Input::hasFile('files')) {
            $uploaded_image = $request->file('files');
            $url  =  time().$uploaded_image->getClientOriginalName();
            $img_url  =  'https://urpixpays.com/public/uploads/exhebition/'.$url;
            $uploaded_image->move(public_path() . '/uploads/exhebition', $url);
            $data = array('imgname' => $img_url, 'image_id' => $data['title'] , 'imagetitle' => $url ,'imgorder'=>'99'
            );
            DB::table('exhebition')->insert($data);
        }
        return redirect('/admin/exhebition');
    }

    public function  detele_best_image0($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('best_images')->where('id',$image_id)->pluck('imgname')[0];
            unlink(public_path() . '/uploads/info_images/'. $old_image);
            DB::table('best_images')->where('id',$image_id)->delete();
            return redirect('admin/bestimages0');
        }
        else{
            return redirect('admin/bestimages0');
        }
    }

    public function  detele_exhebition_image($image_id){
        if(isset($image_id)) {
            $old_image = DB::table('exhebition')->where('id',$image_id)->pluck('imagetitle')[0];
            unlink(public_path() . '/uploads/exhebition/'. $old_image);
            DB::table('exhebition')->where('id',$image_id)->delete();
            return redirect('admin/exhebition');
        }
        else{
            return redirect('admin/exhebition');
        }
    }

    public function report_permission0(){
        $uid=Session::get('auid');
        $data=Input::all();
        $id=$data['item'];
        $state=$data['val'];

        if($state=='Accepted'){
            DB::table('report')->where('rid',$id)->update(['r_state'=>'Accepted']);

            $img_id=DB::table('report')->where('rid',$id)->pluck('img_id')[0];
            $u_id=DB::table('image')->where('id',$img_id)->pluck('u-id')[0];
            $u_email=DB::table('users')->where('no',$u_id)->pluck('email')[0];
            $t_id=DB::table('userpix')->where('u-id',$u_id)->pluck('no')[0];
            $date=Carbon::now();

            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>'Your photo has been removed by admin due to report!'
            ];
            DB::table('note')->insert($inserarr);

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

            DB::table('report')->where('rid',$id)->delete();

        }
        if($state=='Reported'){
            DB::table('report')->where('rid',$id)->update(['r_state'=>'Reported']);
        }
        if($state=='Cancel'){
            DB::table('report')->where('rid',$id)->update(['r_state'=>'Cancel']);
        }

        $this->response(1,'Success',$data);
    }

    public function reports0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $bid=DB::table('report')->join('image','image.id','report.img_id')->join('users','users.no','report.u_id')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.reportphotos',compact('bid','a_image','a_name'));
    }

    public function transaction0()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $transaction=DB::table('transaction')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.transaction',compact('transaction','a_image','a_name'));
    }

    public function withdraw_transfer()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $transaction=DB::table('transaction')->where('action','Deposit')->orwhere('action','withdrawal')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        return view('admin1.pages.withdraw_transfer',compact('transaction','a_image','a_name'));
    }

    public function add_transfer(){
        $data=Input::all();
        $name=$data['name'];
        $email=$data['email'];
        $tech_id=$data['tech_id'];
        $amount=$data['amount'];
        $notes=$data['notes'];
        $status=$data['status'];

        $check = DB::table('users')->where('email',$email)->get();
        if(count($check)>0){
            $uid = DB::table('users')->where('email',$email)->pluck('no');
            if($status == 'Deposit'){
                DB::table('userpix')->where('u-id',$uid)->increment('walet',$amount);
            }
            else{
                DB::table('userpix')->where('u-id',$uid)->decrement('walet',$amount);
            }
            $inserarr = [
                'u_name' => $name,
                'u_email' => $email,
                'tech_id' => $tech_id,
                'amount' => $amount,
                'type'=>$notes,
                'action'=>$status
            ];
            DB::table('transaction')->insert($inserarr);
            $this->response(1,"success",Null);
        }else{
            $this->response(2,"success",Null);
        }
    }

    public function edit_transfer(){
        $data=Input::all();
        $id=$data['id'];
        $username=$data['username'];
        $useremail=$data['useremail'];
        $amount=$data['amount'];
        $tech_id=$data['tech_id'];
        $notes=$data['notes'];
        $status=$data['status'];

        $check = DB::table('transaction')->where('id',$id)->pluck('u_email')[0];
        $b_balance = DB::table('transaction')->where('id',$id)->pluck('amount')[0];
        $b_status = DB::table('transaction')->where('id',$id)->pluck('action')[0];
        if($check == $useremail){
            $uid = DB::table('users')->where('email',$useremail)->pluck('no')[0];
            $uid1 = DB::table('users')->where('email',$check)->pluck('no')[0];

            if($b_status == 'Deposit'){
                DB::table('userpix')->where('u-id',$uid1)->decrement('walet',$b_balance);
            }else{
                DB::table('userpix')->where('u-id',$uid1)->increment('walet',$b_balance);
            }

            if($status == 'Deposit'){
                DB::table('userpix')->where('u-id',$uid)->increment('walet',$amount);
            }else{
                DB::table('userpix')->where('u-id',$uid)->decrement('walet',$amount);
            }
            DB::table('transaction')->where('id',$id)->update([
                'u_name'=>$username,
                'u_email'=>$useremail,
                'amount'=>$amount,
                'tech_id'=>$tech_id,
                'type'=>$notes,
                'action'=>$status
            ]);
            $this->response(1,"success",Null);
        }else{
            $check1= DB::table('users')->where('email',$useremail)->get();
            if(count($check1) > 0){
                $uid = DB::table('users')->where('email',$check)->pluck('no')[0];
                $uid1 = DB::table('users')->where('email',$useremail)->pluck('no')[0];
                if($status == 'Deposit'){
                    DB::table('userpix')->where('u-id',$uid)->decrement('walet',$b_balance);
                }else{
                    DB::table('userpix')->where('u-id',$uid)->increment('walet',$b_balance);
                }

                if($status == 'Deposit'){
                    DB::table('userpix')->where('u-id',$uid1)->increment('walet',$amount);
                }else{
                    DB::table('userpix')->where('u-id',$uid1)->decrement('walet',$amount);
                }

                DB::table('transaction')->where('id',$id)->update([
                    'u_name'=>$username,
                    'u_email'=>$useremail,
                    'amount'=>$amount,
                    'tech_id'=>$tech_id,
                    'type'=>$notes,
                    'action'=>$status
                ]);
                $this->response(1,"success",Null);

            }else{
                $this->response(2,"success",Null);
            }
        }




    }
    public function edit_transfer1(){
        $data=Input::all();
        $uid=$data['id'];
        $amount=$data['amount'];
        $notes=$data['notes'];
        $status=$data['status'];

        $check1= DB::table('users')->where('no',$uid)->get();
        if(count($check1) > 0){
            $email = DB::table('users')->where('no',$uid)->pluck('email')[0];
            $name = DB::table('users')->where('no',$uid)->pluck('name')[0];
            $t_id=DB::table('userpix')->where('u-id',$uid)->pluck('no')[0];

            if($status == 'Deposit'){
                DB::table('userpix')->where('u-id',$uid)->increment('walet',$amount);

                $date=Carbon::now();

                $inserarr = [
                    'u_email' => $email,
                    't_id' => $t_id,
                    'n_type'=>'userpix_show',
                    'n_date'=>$date,
                    'state'=>'new',
                    'msg'=>'You have received $'.$amount.' from UrPixPays.'
                ];
                DB::table('note')->insert($inserarr);
                $userData = User::find($uid);
                self::sendNotification($userData->token,'Admin Notification','You have received $'.$amount.' from UrPixPays.','UrPicsPay.BalanceOverView');

                $to = $name.'<'.$email.'>';
                $subject = "Urpixpays Transaction!";
                $txt = "Hello ".$name.",\n\n You have received a payment of ".$amount." USD from UrPixPays.com(info@urpixpays.com). \n\n Thanks for using UrPixPays. To see all your transaction details, please log in to urpixpays.com. \n\n\n Questions? Email info@urpixpays.com.";
                $headers = "From: urpixpays@gmail.com" . "\r\n";

                mail($to,$subject,$txt,$headers);


            }else{
                DB::table('userpix')->where('u-id',$uid)->decrement('walet',$amount);

                // $date=Carbon::now();

                // $inserarr = [
                //   'u_email' => $email,
                //   't_id' => $t_id,
                //   'n_type'=>'userpix_show',
                //   'n_date'=>$date,
                //   'state'=>'new',
                //   'msg'=>'You have requested a withdrawal of $'.$amount.' from your UrPixPays wallet.'
                // ];
                // DB::table('note')->insert($inserarr);

                // $to = 'urpixpays@gmail.com';
                // $subject = "Urpixpays Transaction!";
                // $txt = "Hello ".$name.",\n\n You have requested a payment of $".$amount." USD from your UrPixPays wallet. You will receive your money to your given account after the admin's approval. \n\n Thanks for using UrPixPays. To see all your transaction details, please log in to your UrPixPays account \n\n\n Questions? Email info@urpixpays.com.";
                // $headers = "From: urpixpays@gmail.com" . "\r\n";

                // mail($to,$subject,$txt,$headers);

            }

            $inserarr = [
                'u_name' => $name,
                'u_email' => $email,
                'tech_id' => $uid,
                'amount' => $amount,
                'type'=>$notes,
                'action'=>$status
            ];
            DB::table('transaction')->insert($inserarr);
            $this->response(1,"success",Null);

        }else{
            $this->response(2,"success",Null);
        }

    }
    public function account()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $account=DB::table('account')->get();
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0]; $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];
        $expense = 0; $income = 0;
        foreach($account as $account1){
            $expense = $expense + $account1->expense;
            $income = $income + $account1->income;
        }
        return view('admin1.pages.account',compact('account','a_image','a_name','expense','income'));
    }

    public function setting()
    {
        if (Session::get('admin_login_flag')!='admin_login') return redirect('admin/login0123123');
        $a_email=Session::get('aid');
        $a_id=DB::table('admin')->where('email',$a_email)->pluck('id')[0];
        $a_image=DB::table('admin')->where('id',$a_id)->pluck('admin_image')[0];
        $a_name=DB::table('admin')->where('id',$a_id)->pluck('name')[0];

        $setting=DB::table('setting')->first();

        return view('admin1.pages.setting',['setting'=>$setting,'a_image'=>$a_image,'a_name'=>$a_name]);
    }

    public function signup_setting0(){
        $data=Input::all();
        $s_price=$data['s_price'];
        $s_flip=$data['s_flip'];
        $s_wand=$data['s_wand'];
        $s_charge=$data['s_charge'];

        DB::table('setting')->where('id',1)->update([
            's_price'=>$s_price,
            's_flip'=>$s_flip,
            's_wand'=>$s_wand,
            's_charge'=>$s_charge
        ]);

        $this->response(1,"success",Null);
    }
    public function tax_setting0(){
        $data=Input::all();
        $tax=$data['tax'];
        DB::table('setting')->where('id',1)->update([
            'tax'=>$tax/100
        ]);

        $this->response(1,"success",Null);
    }
    public function rank_setting0(){
        $data=Input::all();
        $r1_price=$data['r1_price'];
        $r1_flip=$data['r1_flip'];
        $r1_wand=$data['r1_wand'];
        $r1_charge=$data['r1_charge'];
        $r2_price=$data['r2_price'];
        $r2_flip=$data['r2_flip'];
        $r2_wand=$data['r2_wand'];
        $r2_charge=$data['r2_charge'];
        $r3_price=$data['r3_price'];
        $r3_flip=$data['r3_flip'];
        $r3_wand=$data['r3_wand'];
        $r3_charge=$data['r3_charge'];
        $r4_price=$data['r4_price'];
        $r4_flip=$data['r4_flip'];
        $r4_wand=$data['r4_wand'];
        $r4_charge=$data['r4_charge'];
        $r5_price=$data['r5_price'];
        $r5_flip=$data['r5_flip'];
        $r5_wand=$data['r5_wand'];
        $r5_charge=$data['r5_charge'];
        $r6_price=$data['r6_price'];
        $r6_flip=$data['r6_flip'];
        $r6_wand=$data['r6_wand'];
        $r6_charge=$data['r6_charge'];
        $r7_price=$data['r7_price'];
        $r7_flip=$data['r7_flip'];
        $r7_wand=$data['r7_wand'];
        $r7_charge=$data['r7_charge'];
        $r8_price=$data['r8_price'];
        $r8_flip=$data['r8_flip'];
        $r8_wand=$data['r8_wand'];
        $r8_charge=$data['r8_charge'];


        DB::table('setting')->where('id',1)->update([
            'r1_price' => $r1_price/100,
            'r1_flip' => $r1_flip,
            'r1_wand'=> $r1_wand,
            'r1_charge'=>$r1_charge,
            'r2_price' => $r2_price/100,
            'r2_flip' => $r2_flip,
            'r2_wand'=> $r2_wand,
            'r2_charge'=>$r2_charge,
            'r3_price' => $r3_price/100,
            'r3_flip' => $r3_flip,
            'r3_wand'=> $r3_wand,
            'r3_charge'=>$r3_charge,
            'r4_price' => $r4_price/100,
            'r4_flip' => $r4_flip,
            'r4_wand'=> $r4_wand,
            'r4_charge'=>$r4_charge,
            'r5_price' => $r5_price/100,
            'r5_flip' => $r5_flip,
            'r5_wand'=> $r5_wand,
            'r5_charge'=>$r5_charge,
            'r6_price' => $r6_price/100,
            'r6_flip' => $r6_flip,
            'r6_wand'=> $r6_wand,
            'r6_charge'=>$r6_charge,
            'r7_price' => $r7_price/100,
            'r7_flip' => $r7_flip,
            'r7_wand'=> $r7_wand,
            'r7_charge'=>$r7_charge,
            'r8_price' => $r3_price/100,
            'r8_flip' => $r3_flip,
            'r8_wand'=> $r3_wand,
            'r8_charge'=>$r3_charge
        ]);

        $this->response(1,"success",Null);
    }
    public function i_setting0(){
        $data=Input::all();
        $ia_price=$data['ia_price'];
        $ia_flip=$data['ia_flip'];
        $ia_wand=$data['ia_wand'];
        $ia_charge=$data['ia_charge'];
        $ib_price=$data['ib_price'];
        $ib_flip=$data['ib_flip'];
        $ib_wand=$data['ib_wand'];
        $ib_charge=$data['ib_charge'];
        DB::table('setting')->where('id',1)->update([
            'ia_price'=>$ia_price,
            'ia_flip'=>$ia_flip,
            'ia_wand'=>$ia_wand,
            'ia_charge'=>$ia_charge,
            'ib_price'=>$ib_price,
            'ib_flip'=>$ib_flip,
            'ib_wand'=>$ib_wand,
            'ib_charge'=>$ib_charge,
        ]);

        $this->response(1,"success",Null);
    }
    public function s_setting0(){
        $data=Input::all();
        $ia_price=$data['sa_price'];
        $ia_flip=$data['sa_flip'];
        $ia_wand=$data['sa_wand'];
        $ia_charge=$data['sa_charge'];
        $ib_price=$data['sb_price'];
        $ib_flip=$data['sb_flip'];
        $ib_wand=$data['sb_wand'];
        $ib_charge=$data['sb_charge'];
        DB::table('setting')->where('id',1)->update([
            'sa_price'=>$ia_price,
            'sa_flip'=>$ia_flip,
            'sa_wand'=>$ia_wand,
            'sa_charge'=>$ia_charge,
            'sb_price'=>$ib_price,
            'sb_flip'=>$ib_flip,
            'sb_wand'=>$ib_wand,
            'sb_charge'=>$ib_charge,
        ]);

        $this->response(1,"success",Null);
    }
    public function add_record(){
        $data=Input::all();
        $particulars=$data['particulars'];
        $expense=$data['expense'];
        $income=$data['income'];
        $status1=$data['status1'];
        $remarks=$data['remarks'];
        $date=$data['date'];
        $inserarr = [
            'particulars' => $particulars,
            'expense' => $expense,
            'expense_date' => $date,
            'income'=>$income,
            'status'=>$status1,
            'remarks'=>$remarks
        ];
        DB::table('account')->insert($inserarr);

        $this->response(1,"success",Null);
    }
    public function edit_record(){
        $data=Input::all();
        $id=$data['id'];
        $particulars=$data['particulars'];
        $expense=$data['expense'];
        $income=$data['income'];
        $status=$data['status'];
        $remarks=$data['remarks'];
        $date=$data['date'];
        DB::table('account')->where('id',$id)->update([
            'particulars'=>$particulars,
            'expense'=>$expense,
            'income'=>$income,
            'status'=>$status,
            'expense_date'=>$date,
            'remarks'=>$remarks
        ]);

        $this->response(1,"success",Null);
    }
    public function delete_record(){
        $data=Input::all();
        $id=$data['id'];
        DB::table('account')->where('id',$id)->delete();

        $this->response(1,"success",Null);
    }
    public function delete_transfer(){
        $data=Input::all();
        $id=$data['id'];
        $u_email = DB::table('transaction')->where('id',$id)->pluck('u_email')[0];
        $uid = DB::table('users')->where('email',$u_email)->pluck('no')[0];
        $amount = DB::table('transaction')->where('id',$id)->pluck('amount')[0];
        $status = DB::table('transaction')->where('id',$id)->pluck('action')[0];
        if($status == 'Deposit'){
            DB::table('userpix')->where('u-id',$uid)->decrement('walet',$amount);
        }else{
            DB::table('userpix')->where('u-id',$uid)->increment('walet',$amount);
        }

        DB::table('transaction')->where('id',$id)->delete();

        $this->response(1,"success",Null);
    }
    public function key_setting0(){
        $data=Input::all();

        $flip1=$data['flip1'];
        $flip5=$data['flip5'];
        $flip10=$data['flip10'];
        $flip25=$data['flip25'];

        $wand1=$data['wand1'];
        $wand5=$data['wand5'];
        $wand10=$data['wand10'];
        $wand25=$data['wand25'];

        $charge1=$data['charge1'];
        $charge5=$data['charge5'];
        $charge10=$data['charge10'];
        $charge25=$data['charge25'];

        DB::table('setting')->where('id',1)->update([
            'flip1'=>$flip1,
            'flip5'=>$flip5,
            'flip10'=>$flip10,
            'flip25'=>$flip25,
            'wand1'=>$wand1,
            'wand5'=>$wand5,
            'wand10'=>$wand10,
            'wand25'=>$wand25,
            'charge1'=>$charge1,
            'charge5'=>$charge5,
            'charge10'=>$charge10,
            'charge25'=>$charge25,
        ]);

        $this->response(1,"success",Null);
    }


    public function getNotification1(){
        $u_email='info@urpixpays.com';
        $notification=DB::table('note')->where('u_email',$u_email)->get();
        if (!empty($notification)){
            $this->response(1,'Success Get Note Data',$notification);
        }
        else{
            $this->response(200,'Success NULL',NULL);
        }
    }
    public function add_notifications(){
        $data=Input::all();
        $title=$data['title'];
        $description=$data['description'];
        $notifications=$data['notifications'];
        $text1=$data['text1'];
        $text2=$data['text2'];
        $text3=$data['text3'];
        $oldprice=$data['oldprice'];
        $newprice=$data['newprice'];
        $file = $data['image'];
        $icon1 = $data['icon1'];
        $icon2 = $data['icon2'];
        $icon3 = $data['icon3'];
        $inserarr=[
            'title'=>$title,
            'description'=>$description,
            'notification'=>$notifications,
            'text1'=>$text1,
            'text2'=>$text2,
            'text3'=>$text3,
            'oldprice'=>$oldprice,
            'newprice'=>$newprice
        ];
        $id=DB::table('app_notifications')->insertGetId($inserarr);
        $destinationPath = 'app_notifictions';
        $imagename=$id.$file->getClientOriginalName();

        $ext = pathinfo($id.$file->getClientOriginalName(), PATHINFO_EXTENSION);
        $exten=".".$ext;
        $imgname=trim($imagename,$exten);
        $url = md5($imgname).'.'.$ext;
        $file->move('public/'.$destinationPath,$url);
        $imageurl=asset($destinationPath.'/'.$url);

        DB::table('app_notifications')
            ->where('id',$id )
            ->update(['title_pic' => $imageurl]);
        // return redirect('admin/challenge');
        if(isset($icon1) && !empty($icon1)){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon1->getClientOriginalName();

            $ext = pathinfo($id.$icon1->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon1->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$id )
                ->update(['icon1' => $imageurl]);
            // return redirect('admin/challenge');
        }
        if(isset($icon2) && !empty($icon2)){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon2->getClientOriginalName();

            $ext = pathinfo($id.$icon2->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon2->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$id )
                ->update(['icon2' => $imageurl]);
            // return redirect('admin/challenge');
        }
        if(isset($icon3) && !empty($icon3)){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon3->getClientOriginalName();

            $ext = pathinfo($id.$icon3->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon3->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$id )
                ->update(['icon3' => $imageurl]);
            // return redirect('admin/challenge');
        }
        $this->response(1,"success",$inserarr);
    }
//-------------------------------------end--------------------------------
    public function edit_notifications()
    {
        $data=input::all();
        $cid=$data['cid'];
        $title=$data['title'];
        $description=$data['description'];
        $notification=$data['notification'];
        $text1=$data['text1'];
        $text2=$data['text2'];
        $text3=$data['text3'];
        $oldprice=$data['oldprice'];
        $newprice=$data['newprice'];
        $file = $data['image'];
        $icon1 = $data['icon1'];
        $icon2 = $data['icon2'];
        $icon3 = $data['icon3'];
        $id = $cid;
        $date=Carbon::now();
        DB::table('app_notifications')
            ->where('id',$cid)
            ->update([
                'title'=>$title,
                'description'=>$description,
                'notification'=>$notification,
                'text1'=>$text1,
                'text2'=>$text2,
                'text3'=>$text3,
                'oldprice'=>$oldprice,
                'newprice'=>$newprice
            ]);

        if(isset($file) && $file != 'undefined' ){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$file->getClientOriginalName();

            $ext = pathinfo($id.$file->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $file->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$cid )
                ->update(['title_pic' => $imageurl]);
        }
        if(isset($icon1) && $icon1 != 'undefined'){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon1->getClientOriginalName();

            $ext = pathinfo($id.$icon1->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon1->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('challenge')
                ->where('id',$cid )
                ->update(['icon1' => $imageurl]);
        }
        if(isset($icon2) && $icon2 != 'undefined'){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon2->getClientOriginalName();

            $ext = pathinfo($id.$icon2->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon2->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$cid )
                ->update(['icon2' => $imageurl]);
        }

        if(isset($icon3) && $icon3 != 'undefined'){
            $destinationPath = 'app_notifictions';
            $imagename=$id.$icon3->getClientOriginalName();

            $ext = pathinfo($id.$icon3->getClientOriginalName(), PATHINFO_EXTENSION);
            $exten=".".$ext;
            $imgname=trim($imagename,$exten);
            $url = md5($imgname).'.'.$ext;
            $icon3->move('public/'.$destinationPath,$url);
            $imageurl=asset($destinationPath.'/'.$url);

            DB::table('app_notifications')
                ->where('id',$cid )
                ->update(['icon3' => $imageurl]);
        }

    }

    public function deleteAllusers(Request $req)
    {
        $user = User::find($req->user_ids);
        foreach($user as $u) {
            $u->delete();
        }
        return response()->json(true,201);
    }
    public function withdelteall(Request $req) {
        $user = withdraw::find($req->user_ids);
        foreach($user as $u) {
            $u->delete();
        }
        return response()->json(true,201);
    }


}

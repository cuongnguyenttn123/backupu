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

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function admin_change_order_status(Request $request){
        $data =  $request->all();
$result = DB::table('order_main')
            ->where('order_id',$data['order_id'] )
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
            ->select('users.no', 'users.email', 'users.name', 'users.email', 'users.password', 'users.city','users.pass', 'users.country', 'users.mobilenum', 'users.permission', 'users.vc', 'users.role',  'userpix.Flip', 'userpix.Charge', 'userpix.Wand', 'userpix.Rank', 'userpix.walet', 'userpix.Points')
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
        
        $ujoincs=DB::table('ujoinc')->where('c-id',$cid)   
        ->join('users','users.no','ujoinc.u-id')->orderBy('rank','asc')->get();
        return view('Admin.c_u1',compact('data0','ujoincs','a_image','a_name','c'));   

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
                'image_detail'=>$data['image_details'][$key]
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
        DB::table('userpix')->where('u-id',$uid)->increment('Points',$value-$b_val);
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
            'u-id'=>$_COOKIE['id'],
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
        if($check == 'No'){
            DB::table('challenge')->where('id',$cid)->update([
                'award'=>'Yes'
                ]);
            
            $completed_price=DB::table('challenge')->where('id',$cid)->pluck('price')[0];
            $price=floatval(ltrim($completed_price, "$"));
    
            for($i=0;$i<count($ujoincs);$i++){
                $rank=DB::table('ujoinc')->where([['u-id',$ujoincs[$i]],['c-id',$cid]])->pluck('rank')[0];
                
                if($rank == 1){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>0,
                        'wand'=>0,
                        'charge'=>0
                    ];
    
                    DB::table('winner')->insert($inserarr);                
                }elseif($rank == 2){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*0.05);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*0.05,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>0,
                        'wand'=>0,
                        'charge'=>0
                    ];
    
                    DB::table('winner')->insert($inserarr);                
                    
                }elseif($rank == 3){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*0.03);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*0.03,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>0,
                        'wand'=>0,
                        'charge'=>0
                    ];
    
                    DB::table('winner')->insert($inserarr);                 
                }elseif($rank == 4){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*0.02);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*0.02,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>0,
                        'wand'=>0,
                        'charge'=>0
                    ];
    
                    DB::table('winner')->insert($inserarr);                 
                }elseif($rank == 5){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('walet',$price*0.01);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>$price*0.01,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>0,
                        'wand'=>0,
                        'charge'=>0
                    ];
    
                    DB::table('winner')->insert($inserarr);                 
                }elseif($rank > 5 && $rank < 11){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',3);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',3);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',3);
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>3,
                        'wand'=>3,
                        'charge'=>3
                    ];
    
                    DB::table('winner')->insert($inserarr);                 
                }elseif($rank > 10 && $rank < 51){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',2);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',2);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',2);                    
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>2,
                        'wand'=>2,
                        'charge'=>2
                    ];
    
                    DB::table('winner')->insert($inserarr);                
                }elseif($rank > 50 && $rank < 101){
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Flip',1);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Wand',1);
                    DB::table('userpix')->where('u-id',$ujoincs[$i])->increment('Charge',1);                    
                    $inserarr=[
                        'u_id'=>$ujoincs[$i],
                        'increase_wallet'=>0,
                        'c_id'=>$cid,
                        'rank'=>$rank,
                        'pic_count'=>$pc,
                        'flip'=>1,
                        'wand'=>1,
                        'charge'=>1
                    ];
    
                    DB::table('winner')->insert($inserarr);                
                }
                
            }
            
                $this->response(1,"success",NULL);}
            else{
                $this->response(2,"success",NULL);
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
          $fee=$fee0*0.05;
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
        $email=$data['email']; 
        $value=$data['value'];
      
        if($value == "delete"){
            DB::table('users')->where('email',$email)->delete();
        }else{
        DB::table('users')
            ->where('email',$email )
            ->update(['permission'=>$value]);
        }
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
        $uid=$_COOKIE['id'];
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
        $uid=$_COOKIE['id'];
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
    
}

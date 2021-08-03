<?php

namespace App\Http\Controllers;

use App\LikeComment;
use App\LikeSocialPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Image;
use App\SocialPost;
use App\Comment;
use App\PostReport;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use App\Follower;
use App\ExhibitionImage;
use App\NotificationBanner;
use App\winner;
use App\winnerBanner;
use App\LikeImage;
use App\Image as UserImage;
class PostController extends Controller
{
	public function index(Request $request)
	{
		$date=Carbon::now();
        \Illuminate\Support\Facades\DB::statement("UPDATE `social_posts` SET  `social_posts`.`boosttime` =`social_posts`.`boosttime`-TIMESTAMPDIFF(SECOND,`social_posts`.`boostdate`, '".$date."') where `social_posts`.`booststate`='1'");
        \Illuminate\Support\Facades\DB::table('social_posts')->where('boosttime',"<",0)->update(['booststate'=>0,'boosttime'=>0]);



		$posts = SocialPost::where('status',1)->orderBy('boosttime', 'desc')->with(['user:no,name,profile_image,email','user.following'=>function ($q) use ($request) {
		    $q->where('follower_id',$request->id);
		}])
		->with(['likePosts' => function ($query) use ($request) {
                $query->where('user_id',$request->id);
        }])
        // ->with(['user.followings'])
		->withCount(['postComments','likePosts'])->when($request->search,function($query) use ($request) {
		    $query->where('description','LIKE', '%' . $request->search . '%')->orwhere(function ($q) use ($request) {
                $q->whereHas('user',function($qui) use ($request) {
                    $qui->where('name','LIKE', '%' . $request->search . '%');
                });
            });;
		})->when($request->sort,function($query) use ($request) {
		    $query->orderBy('id',$request->sort);
		})->when($request->like,function($query) use ($request) {
		    $query->orderByDesc('likes_count');
		})->when($request->comment,function($query) use ($request) {
		    $query->orderByDesc('comments_count');
		})->when($request->sort =='' && $request->like =='' && $request->comment =='' ,function($query) use ($request) {
		    $query->orderBy('id','desc');
		})->paginate(10);
		return response()->json($posts);
	}

	public function  SinglePost(Request $request) {
	    $posts = SocialPost::where('id',$request->post_id)->where('status',1)->with(['user','postComments'])
		->with(['likePosts' => function ($query) use ($request) {
                $query->where('user_id',$request->user_id);
        }])
		->withCount(['postComments','likePosts'])->when($request->search,function($query) use ($request) {
		    $query->where('description','LIKE', '%' . $request->search . '%')->orwhere(function ($q) use ($request) {
                $q->whereHas('user',function($qui) use ($request) {
                    $qui->where('name','LIKE', '%' . $request->search . '%');
                });
            });;
		})->paginate(10);
		return response()->json($posts);
	}

	public function edit($id)
	{
		$post = SocialPost::find($id);
		return response()->json($post);
	}

    public function save(Request $req, $id = 0)
    {
    	$this->validate($req,[
    		'user_id' => 'required|numeric'
    	]);

        $post = SocialPost::find($id) ?: new SocialPost();

    	if($req->has('image') && $req->get('image'))
       {
          $image = $req->get('image');
          $name = time().'.jpg';
          \Image::make($req->get('image'))->save('/home/jack/public_html/public/uploads/images/'.$name)->encode('jpg', 75);
          $post->image_width=$req->ImageWidth;
        }

        if($req->has('image'))
        {
        	$post->image = $name;
        }
        $post->description = $req->description;
        $post->user_id = $req->user_id;
        $post->image_height=$req->ImageHeight;
        if($req->has('created_at'))
        {
            $post->created_at=$req->created_at;
        }

        $user = User::find($req->user_id);
        $post->status=1;
        $post->save();

        if($id > 0)
        {
        	return response()->json(['success' => true, 'message' => 'Post Updated Successfully' , 'post' => $post]);

        }

        $followers = Follower::where('user_id',$req->user_id)->get();
        foreach($followers as $followe){
            $sendame= User::find($req->user_id);
            $userData= User::find($followe->follower_id);
          self::sendNotification($userData->token,'New Post',$sendame->name.' posted on UrPixPays.',[]);

        }


            //   $u_email=$userData->email;
            // // $t_id=DB::table('userpix')->where('u-id',$request->user_id)->pluck('no')[0];
            // // $date=Carbon::now();
            // // $NotificationData = [];
            // // $inserarr = [
            // //     'u_email' => $u_email,
            // //     't_id' => $t_id,
            // //     'n_type'=>'userpix_show',
            // //     'n_date'=>$date,
            // //     'state'=>'new',
            // //     'msg'=>$userData->name.' commented on your post on UrPixPays.',
            // //     'notification_data'=>json_encode($NotificationData)
            // // ];
            // // DB::table('note')->insert($inserarr);

        return response()->json(['success' => true,'message' => 'Post Added Successfully']);
    }

    public function changeStatus($id, $status)
    {
    	$post = SocialPost::find($id);
    	$post->status = $status;
    	$post->save();
    	$posts = SocialPost::orderBy('id','desc')->with('user')->get();
    	return response()->json(['success'=>true ,'data' => $posts,'message' => 'Post Status Updated Sucessfully!']);
    }

    public function delete($id)
    {
    	$post = SocialPost::find($id);
    	$post->postReports()->delete();
    	$post->delete();
    	return response()->json(['success' => true, 'message' => 'Post Deleted Successfully']);
    }

    //UserSide Posts Functions


    public function getUserPosts(Request $request)
    {

    $posts = SocialPost::where('user_id',$request->id)->with(['user','postComments'])
		->with(['likePosts' => function ($query) use ($request) {
                $query->where('user_id',$request->id);
        }])
		->withCount(['postComments','likePosts'])->when($request->search,function($query) use ($request) {
		    $query->where('description','LIKE', '%' . $request->search . '%')->orwhere(function ($q) use ($request) {
                $q->whereHas('user',function($qui) use ($request) {
                    $qui->where('name','LIKE', '%' . $request->search . '%');
                });
            });;
		})->when($request->sort,function($query) use ($request) {
		    $query->orderBy('id',$request->sort);
		})->when($request->like,function($query) use ($request) {
		    $query->orderByDesc('like_posts_count');
		})->when($request->comment,function($query) use ($request) {
		    $query->orderByDesc('post_comments_count');
		})->paginate(5);
		return response()->json($posts);

	}
    public function paginate($items, $perPage = 2, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator ($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function likedPost(Request $req)
    {
        $like = new LikeSocialPost();
        $like->user_id = $req->user_id;
        $like->post_id = $req->post_id;
        $like->type = 0;
        $like->save();
        $posts = SocialPost::withCount(['likePosts'])->find($req->post_id);

        $posts->likes_count= $posts->likes_count+1;
        $posts->save();
        if($req->user_id != $posts->user_id){

             $userData= User::find($req->user_id);
        $postsUser= SocialPost::find($req->post_id);

           $u_email=$postsUser->user->email;
            $t_id=DB::table('userpix')->where('u-id',$postsUser->user->token)->pluck('no')[0];
            $date=Carbon::now();
            $NotificationData = [];
            $NotificationData['screen'] = "UrPicsPay.SocialSinglePost";
            $NotificationData['post_id'] = $req->post_id;
            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>$userData->name.' liked your post on UrPixPays',
                'notification_data'=>json_encode($NotificationData)
            ];
            DB::table('note')->insert($inserarr);
             self::sendNotification($postsUser->user->token,'UrPixPays',$userData->name.' liked your post on UrPixPays.',$NotificationData);
        }

        return response()->json($posts);
    }

    public function unlikePost(Request $req)
    {
        $like = LikeSocialPost::where('user_id', $req->user_id)->where('post_id',$req->post_id)->first();
        $id = $like->id;
        $like->delete();
        $posts = SocialPost::withCount(['likePosts'])->find($req->post_id);

        $posts->likes_count= $posts->likes_count - 1;
        $posts->save();
        return response()->json($posts);
    }

    public function likeComment(Request $req)
    {
        $like = new LikeComment();
        $like->user_id = $req->user_id;
        $like->post_id = $req->post_id;
        $like->comment_id = $req->comment_id;
        $like->save();

        return response()->json($like);
    }

    public function unLikeComment(Request $req)
    {
        $like = LikeComment::where('comment_id', $req->comment_id)->where('user_id', $req->user_id)->where('post_id', $req->post_id)->first();
        $id = $like->id;
        $like->delete();
        return response()->json($id);
    }

    public function addCommentReply(Request $req)
    {
        $reply = new Comment();
        $reply->parent_id = $req->parent_id;
        $reply->post_id = $req->post_id;
        $reply->user_id = $req->user_id;
        $reply->comment = $req->comment;
        $reply->save();
        $reply->user;

        return response()->json($reply);

    }

	public function getPost($id)
	{
		$posts = SocialPost::where('id',$id)->get();
        $data = [];
        foreach($posts as $post)
        {
            $dta = array(
                'id' => $post->id,
                'description' => $post->description,
                'image' => $post->image,
                'status' => $post->status,
                'created_at' => $post->created_at,
                'user_id' => $post->user_id,
                'user' => $post->user,
                'likes' => $post->likePosts
            );
            $data[] = $dta;
        }

        return response()->json($data);
	}

	public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->parent_id = 0;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();
        $addedComment = array(
            "id" => $comment->id,
            "parent_id" => $comment->parent_id,
            "comment" => $comment->comment,
            "post_id" => $comment->post_id,
            "created_at" => $comment->created_at,
            "replies" => $this->getreplies($comment->id),
        );
        $comments = Comment::with('user')->withCount('likeComment')->with(['likeComment' => function ($query) use ($request) {
                $query->where('user_id',$request->user_id);
        }])->find($comment->id);
        $task = SocialPost::find($request->post_id);

        $task->comments_count= $task->comments_count+1;
        $task->save();
   $userData= User::find($task->user_id);
    $commentUser = User::find($request->user_id);
   if($request->user_id != $task->user_id){


              $u_email=$userData->email;
            $t_id=DB::table('userpix')->where('u-id',$task->user_id)->pluck('no')[0];
            $date=Carbon::now();
            $NotificationData = [];
            $NotificationData['screen'] = "UrPicsPay.PostsComments";
            $NotificationData['post_id'] = $request->post_id;
            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>$commentUser->name.' commented on your post on UrPixPays.',
                'notification_data'=>json_encode($NotificationData)
            ];
            DB::table('note')->insert($inserarr);
            self::sendNotification($userData->token,'UrPixPays',$commentUser->name.' commented on your post on UrPixPays.',$NotificationData);
   }
        return response()->json($comments);
    }



	public function editComment(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(true,202);
    }

    public function deleteComment(Request $request){
        $comment = Comment::find($request->commentId);


        $task = SocialPost::find($comment->post_id);
          $comment->delete();
        $task->comments_count= $task->comments_count - 1;
        $task->save();
        return response()->json(true,202);
    }




    public function getPostComments($postId)
    {
        $data = [];
        $comments = Comment::where(['parent_id' => 0, 'post_id' => $postId])->get();

        foreach($comments as $c)
        {
            $dta = array(
                "id" => $c->id,
                "parent_id" => $c->parent_id,
                "comment" => $c->comment,
                "post_id" => $c->post_id,
                "created_at" => $c->created_at,
                "replies" => $this->getreplies($c->id),
            );
            $data[] = $dta;
        }
        return $data;
    }
    public function GetSocialComments($postId,$userId)
    {
        $data = [];
        $comments = Comment::with(['user','replies','replies.user'])->withCount('likeComment')->with(['likeComment' => function ($query) use($postId,$userId) {
                $query->where('user_id',$userId)->where('post_id',$postId);
        }])->where(['parent_id' => 0, 'post_id' => $postId])->get();
        	return response()->json($comments);
    }
	public function getComments()
	{
		$data = [];
		$comments = Comment::where('parent_id',0)->get();
		foreach($comments as $c)
		{
          $dta = array(
                    "id" => $c->id,
                    "parent_id" => $c->parent_id,
                   "comment" => $c->comment,
                    "created_at" => $c->created_at,
                   "replies" => $this->getreplies($c->id),
                );
          $data[] = $dta;
		}

	return response()->json($data);

	}

	public function getreplies($id)
	{
		$data = [];
		$comments = Comment::where('parent_id',$id)->get();
		foreach($comments as $c)
		{
          $dta = array(
                "id" => $c->id,
                "parent_id" => $c->parent_id,
                "comment" => $c->comment,
                "created_at" => $c->created_at
                );
          $data[] = $dta;
		}
		return $data;
	}
	public function createReport(Request $request)
    {
        $report = new PostReport();
        $report->created_by_user_id = $request->created_by_user_id;
        $report->against_user_id = $request->against_user_id;
        $report->social_post_id = $request->social_post_id;
        $report->report_reason = $request->report_reason;
        $report->report_comment = $request->report_comment;
        $report->save();

        return response()->json($report);
    }

    public function removeImage($id)
    {
        // dd($id);
        $post = SocialPost::find($id);
        $post->image = '';
        $post->save();
        return response()->json($post);

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
        public function followUser(Request $request)
            {
                $user= User::find($request->id);
                $user->followers()->attach($request->fid);


            $userData= User::find($request->id);
            $fname= User::find($request->fid);
          self::sendNotification($userData->token,'UrPixPays',$fname->name.' is following you on UrPixPays.',[]);

              $u_email=$userData->email;
            $t_id=DB::table('userpix')->where('u-id',$request->id)->pluck('no')[0];
            $date=Carbon::now();
            $NotificationData = [];
            $inserarr = [
                'u_email' => $u_email,
                't_id' => $t_id,
                'n_type'=>'userpix_show',
                'n_date'=>$date,
                'state'=>'new',
                'msg'=>$fname->name.' is following you on UrPixPays.',
                'notification_data'=>json_encode($NotificationData)
            ];
            DB::table('note')->insert($inserarr);





                return response()->json($user);
            }
        public function unfollowUser(Request $request)
        {
            $user= User::find($request->id);
            $user->followers()->detach($request->fid);

            return response()->json($user);
        }

        public function exhibitionImageUpload (Request $request) {


          $data['u_wallet']   =DB::table('userpix')->where('u-id',$request->user_id)->pluck('walet')[0];
          $totalCharges  = $request->imageCount *2;

          if($data['u_wallet'] >= $totalCharges){
         foreach($request->images as $image)
         {

             $imageName = $image['data'];
          $name = uniqid().$image['width'].'.png';
          \Image::make($image['data'])->save('/home/jack/public_html/public/uploads/exhebition/'.$name);
            $imageurl=asset('/home/jack/public_html/public/uploads/exhebition/'.$name);
            $this->compress_image('/home/jack/public_html/public/uploads/exhebition/'.$name,'/home/jack/public_html/public/uploads/exhebition/'.$name,50);
              $create_exhibition_image  = ExhibitionImage::create([
              'user_id'=>$request->user_id,
              'image_name'=>$name,
              'image_width' =>$image['width'],
              'image_height'=>$image['height'],
              'ex_id'=>rand(1000,200000)
                ]);
         }
         $newamount = $data['u_wallet'] -$totalCharges ;
         DB::table('userpix')->where('u-id',$request->user_id)->update([
                    'walet'=>$newamount
                    ]);
                    return response()->json(['success'=>true]);
          }

         return response()->json(['success'=>false,'data' =>'Required amount to upload '.$request->imageCount. ' images is '.$totalCharges.'$ but you dont have enough in your wallet']);
        }

        public function exhibitionImageGet (Request $request) {

          $ExhibitionImage = ExhibitionImage::all();
         return response()->json(['success'=>true,'ExhibitionImage'=>$ExhibitionImage]);
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



    public function checkForBanner (Request $request) {




        $banner = NotificationBanner::with('challenge')->where('user_id',$request->id)->first();
        $winner = null;
        $winnerUser = winnerBanner::where('user_id',$request->id)->first();
       if($banner){

        $banner->delete();
       }
       if($winnerUser){
           $winner = winner::with(['challenge','user'])->find($winnerUser->winner_id);
           $winnerUser->delete();
        //   DB::table('winner')->where('id',$winnerUser->id)->update([
        //     'banner_shown'=>1
        //     ]);

       }
        return response()->json(['success'=>true,'banner'=>$banner,'winner'=>$winner,'winnerUser'=>$winnerUser]);
    }

     public function PortfolioSearchUsers($uid,$fid=1)
    {

        $image_item = '';
        $searchResult =User::with(['userpix'])
        ->where('no',$uid)
        ->orWhere(function ($q) use ($uid) {
            $q->orWhere('name','LIKE', '%' . $uid . '%')
            ->orWhere('email',$uid);
        })->simplePaginate();
      return response()->json(['success'=>true,'search_resuls'=>$searchResult]);
    }

     public function PortfolioSearchUsersWithId($uid,$fid=1)
    {
        // $this->response(1,'success',$uid);
        $image_item = '';
        $searchResult = @DB::table('users')->where('no',$uid)->first();
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
        $data['images'] =UserImage::with(['imageLikes' => function ($query) use ($fid) {
                $query->where('user_id',$fid);
        }])->where('u-id',$uid)->orderBy('vote','desc')->get();


        // DB::table('image')->where('u-id',$searchResult->no)
        // ->join('users',function ($join){
        //     $join->on('users.no','image.u-id');
        // })->orderBy('vote','desc')
        // ->get();
        $userfollow = Follower::where(['user_id'=>$searchResult->no,'follower_id'=>$fid])->first();
        $data['following'] = $userfollow;

       return response()->json(['success'=>true,'data'=>$data]);
    }

    public function exhibitionWinners( ){
         $image_item = '';
        $imgs_top=@DB::table('exhebition')->select('id','imgname','image_id')->get();
          return response()->json(['success'=>true,'imgs_top'=>$imgs_top]);
    }
    public function LikeImage (Request $request) {

        $likePost = LikeImage::create([
            'user_id'=>$request->user_id,
            'image_id'=>$request->image_id
            ]);
            $imageRow=DB::table('image')->where('id',$request->image_id)->first();
             DB::table('image')
                ->where('id', $imageRow->id)
                ->update(['likes_count' => $imageRow->likes_count + 1]);
                  return response()->json(['success'=>true]);

    }
     public function UnLikeImage (Request $request) {

        $likePost = LikeImage::where('user_id',$request->user_id)->where('image_id',$request->image_id)->first();
        $likePost->delete();
            $imageRow=DB::table('image')->where('id',$request->image_id)->first();
             DB::table('image')
                ->where('id', $imageRow->id)
                ->update(['likes_count' => $imageRow->likes_count - 1]);
                  return response()->json(['success'=>true]);

    }








}

 <div class="line-divider"></div>
          <!-- Post Content
            ================================================= -->
            
            @foreach($posts as $post)
          <div class="post-content" style="background-color: #fff;">
            <img src="https://urpixpays.com/public/images/profile_pictures/{{$post->user->profile_image}}" alt="user" class="profile-photo-md pull-left profile-img" />
            <div class="post-detail">
              <div class="user-info">
                <h5><a href="https://www.urpixpays.com/portfolio/{{$post->user_id}}" class="profile-link">{{$post->user->name}}</a>
                  <p class="text-muted" style=" font-size: small;">{{$post->created_at->diffForHumans()}}</p>
                </h5>
              </div>

            </div>
            <img src="https://urpixpays.com/public/uploads/images/{{$post->image}}" alt="post-image" class="img-responsive post-image" />
            <div class=" col-md-12 col-sm-4 col-xs-4ml-3 mt-7">
              <p style="color: black; font-size: 14px; font-weight: 800;">
               {{$post->description}}</p>
            </div>

            <div class="row">
              <div class="line-divider"></div>
              <div class="col-md-3 col-sm-4 col-xs-4 icons" style="width:25%">
                  @if(count($post->likePosts) > 0)
                <a class="btn " type='button' id="{{$post->id}}like" onclick="unlikePost({{$post->id}})" style="color:red"><i class="icon ion-heart"></i></a>
                @else 
                 <a class="btn " type='button' id="{{$post->id}}like" onclick="likePost({{$post->id}})" style="color:#dedede"><i class="icon ion-heart"></i></a>
                 @endif
                <span  id="{{$post->id}}likesCount"    
                 data-id="{{$post->like_posts_count}}">{{$post->like_posts_count}}</span>
                 
              </div>
              <div class="col-md-3 col-sm-4 col-xs-4 icons" style="width:25%">
                <a class="btn " onclick="onPressCommentsGet({{$post->id}})" style="color:#dedede"><i class="icon ion-chatboxes"></i></a><span id="{{$post->id}}comentCount"    
                 data-id="{{$post->post_comments_count}}">{{$post->post_comments_count}}</span>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-4 icons " style="width:25%"> 
                <a href="{{route('report.post',$post->id)}}" class="btn" style="color:#dedede"><i
                    class="icon ion-filing "></i></a><span class="hidden-xs">Report</span>
              </div>
               <div class="col-md-3 col-sm-4 col-xs-4 icons" style="width:25%">
                <a class="btn " href="http://www.facebook.com/sharer.php?u=https://www.urpixpays.com/single/post/{{$post->id}}" style="color:#dedede"><i class="icon ion-share"></i></a><span></span>
              </div>
            </div>
            <div class="line-divider"></div>
            <div id="{{$post->id}}">
               
            </div>
            
             <div class="post-comment mt-3">
                <div class="form-group">
                  <div class="col-md-10 col-sm-10 col-xs-10 ">
                    <input id="{{$post->id}}_post" data-id="{{$post->id}}" data-check="comment" type="text" class="form-control" placeholder="write your comment">
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-2">
                    <button type='submit' class="btn btn-primary"  onclick="onPressCommentPost('{{$post->id}}_post',{{$post->id}})" >
                      add comment
                  </button>
                  </div>
                </div>
              </div>
          </div>

            @endforeach
            
            {{$posts->links()}}
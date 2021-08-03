@foreach($comments as $postComment)
            <div class="post-container">
              <img src="https://urpixpays.com/public/images/profile_pictures/{{$postComment->user->profile_image}}" alt="user" class="profile-photo-md pull-left" />
              <div class="post-detail">
                <div class="user-info">
                  <h5><a href="https://www.urpixpays.com/portfolio/{{$postComment->user_id}}" class="profile-link">{{$postComment->user->name}}</a> </h5>
                  <p class="text-muted">{{$postComment->created_at->diffForHumans()}}</p>
                </div>
                <div class="line-divider"></div>
                <div class="post-text">
                  <p>{{$postComment->comment}}<i class="em em-anguished"></i> <i
                      class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                </div>
                <div class="line-divider"></div>
                <div id="{{$postComment->id}}">
                @foreach($postComment->replies as $replies)
                <div class="post-comment">
                  <img src="https://urpixpays.com/public/images/profile_pictures/{{$replies->user->profile_image}}" alt="" class="profile-photo-sm" />
                   <p><a href="https://www.urpixpays.com/portfolio/{{$replies->user_id}}" class="profile-link">{{$replies->user->name}}</a> {{$replies->comment}} </p>
                </div>
                @endforeach
                </div>
                <div class="post-comment">
                  <img src="https://urpixpays.com/public/images/profile_pictures/{{$user->profile_image}}" alt="" class="profile-photo-sm" />
                  <input 
                  id="{{$postComment->id}}submit" 
                  type="text"  
                  class="form-control" 
                  data-id="{{$postComment->id}}" 
                  data-check="reply"
                  data-ids="{{$postComment->post_id}}"
                  placeholder="Post a reply">
                  <button type="submit" class="btn btn-primary"  onclick="onPressPost('{{$postComment->id}}',{{$postComment->id}},{{$postComment->post_id}})" >
                      Reply
                  </button>
                </div>
              </div>
              <hr>
            </div>
@endforeach
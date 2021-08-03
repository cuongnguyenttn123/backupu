
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This is social network html5 template available in themeforest......" />
  <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
  <meta name="robots" content="index, follow" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Urpixpays | Photography Challenge | Turn Your Photos Into Cash &nbsp;</title>

  <!-- Stylesheets
    ================================================= -->
  <link rel="stylesheet" href="{{asset('socialcss/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('socialcss/style.css')}}" />
  <link rel="stylesheet" href="{{asset('socialcss/ionicons.min.css')}}" />
  <link rel="stylesheet" href="{{asset('socialcss/font-awesome.min.css')}}" />
  <link href=" {{asset('socialcss/emoji.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" type="image/png" href="{{asset('socialimg/fav.png')}}" />
  
</head>

<body>
    <header>
     
      @include('Layout.smenu')
    </header>

  <div id="page-contents" style="    background-color: aliceblue;">
    <div class="container">
        <div class="row">
            <div class='col-md-8'>
                <label for="exampleFormControlSelect1">Search Post</label>
                 <div class='form-gorup'>
                    <input type='search' placeholder='Search...' name='searchPosts' id='searchPosts' class='form-control'  />
                </div>
            </div>  
            <div class='col-md-2'>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Sort By</label>
                <select class="form-control" id="sortBy">
                    <option value=''>Select</option>
                    <option value='like'>Like</option>
                  <option value='desc'>Oldest</option>
                  <option value='asc'>Newest</option>
                  <option value='comment'>Comment</option>
                </select>
              </div>
            </div>  
            
        </div>
      <div class="row">

        <!-- Newsfeed Common Side Bar Left
          ================================================= -->
        <div class="col-md-3 static">
          <div class="profile-card">
               <img src="https://urpixpays.com/public/images/profile_pictures/{{$user->profile_image}}" alt="user" class="profile-photo" />
            <h5><a href="https://urpixpays.com/portfolio/{{$user->no}}" class="text-white">{{$user->name}}</a></h5>
            <a href="https://urpixpays.com/portfolio/{{$user->no}}" class="text-white"><i class="ion ion-android-person"></i> Profile</a>
          </div>
          <!--profile card ends-->
          <ul class="nav-news-feed">
            <!-- <li><i class="icon ion-ios-paper"></i>
              <div><a href="edit-profile-settings.html">My Profile</a></div>
            </li> -->
            <li><i class="icon ion-ios-people"></i>
              <div><a href="{{url('/all-posts-user')}}">My Posts</a></div>
            </li>
            <li><i class="icon ion-ios-people-outline"></i>
              <div><a href="{{url('/create-social-post')}}">add Post</a></div>
            </li>
            <!--<li><i class="icon ion-chatboxes"></i>-->
            <!--  <div><a href="newsfeed-messages.html">Messages</a></div>-->
            <!--</li>-->
          </ul>
        </div>
        <div class="col-md-7">
            <div id='showsocialPosts'> 
            <div class="line-divider"></div>
          <!-- Post Content
            ================================================= -->
            
            @foreach($posts as $post)
          <div class="post-content" style="background-color: #fff;">
            <img src="https://urpixpays.com/public/images/profile_pictures/{{$post->user->profile_image}}" alt="user" class="profile-photo-md pull-left profile-img" />
            <div class="post-detail">
              <div class="user-info">
                <h5><a href="https://urpixpays.com/portfolio/{{$post->user_id}}" class="profile-link">{{$post->user->name}}</a>
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
                <a class="btn" onclick="onPressCommentsGet({{$post->id}})" style="color:#dedede"><i class="icon ion-chatboxes"></i></a><span id="{{$post->id}}comentCount"    
                 data-id="{{$post->post_comments_count}}">{{$post->post_comments_count}}</span>
              </div>
              
              <div class="col-md-3 col-sm-4 col-xs-4 icons " style="width:25%">
                <a href="{{route('report.post',$post->id)}}" class="btn" style="color:#dedede"><i
                    class="icon ion-filing "></i></a><span class="hidden-xs">Report</span>
              </div>
               <div class="col-md-3 col-sm-4 col-xs-4 icons" style="width:25%">
                <a class="btn" href="http://www.facebook.com/sharer.php?u=https://urpixpays.com/single/post/{{$post->id}}"  style="color:#dedede"><i class="icon ion-share"></i></a><span ></span>
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
                      Write comment
                  </button>
                  </div>
                </div>
              </div>
          </div>

            @endforeach
            
            {{$posts->links()}}
            </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  </div>
  </div>
  <script src="{{asset('socialjs/jquery-3.1.1.min.js')}}"></script>
  <footer class="bg-dark">
    @include('Layout/footer')
  </footer>

  <!--preloader-->
  <!-- <div id="spinner-wrapper">
    <div class="spinner"></div>
  </div> -->

  <!--Buy button-->


  <!-- Scripts
    ================================================= -->
    <script src="{{asset('moment.js')}}"></script>
  
  <script src="{{asset('socialjs/bootstrap.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.sticky-kit.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('socialjs/script.js')}}"></script>
  
  <script>
   var query = $('#searchPosts').val();
                showSocialPostsSearch();
    $(document).on('keyup', '#searchPosts', function(){
        console.log('Got in herere')
              var query = $('#searchPosts').val();
                showSocialPostsSearch();
             
             });
              $(document).on("keypress", "input", function(e){
        if(e.which == 13){
            var inputVal = $(this).val();
         
           var check= $('#'+e.target.id).data('check');
            console.log(check);
          if(check =='comment'){
                var post_id= $('#'+e.target.id).data('id');
                var inputFieldId = (e.target.id);
            onPressCommentPost(inputFieldId,post_id);
          }
          if(check == 'reply') {
              var comment_id= $('#'+e.target.id).data('id');
              var post_id = $('#'+e.target.id).data('ids');
              console.log(post_id);
            onPressPost(comment_id.toString(),comment_id,post_id);
          }
            
        }
    });
             
    $(document).on('change','#sortBy',function(){
         var query = $('#searchPosts').val();
                showSocialPostsSearch();
    })         
    
  
  function showSocialPostsSearch(pageNo=1,search = '',sortBy = ''){
                    
                 let searchValue = $('#searchPosts').val();
                 let sortAs= $('#sortBy').val();
                
            $.ajax({
                type: "GET",
                url: 'https://urpixpays.com/webIndexAjax?search='+searchValue+'&sortyBy='+sortAs+'&page='+pageNo,
                success: function (response) {
        
                  $('#showsocialPosts').html(response);
                },
                error: function (response) {
                    console.log(response);
                    // alert('failed');
                }
            });
                    
            }
  
    
    
     function onPressCommentsGet(id ){
                    
            
            
            
            $.ajax({
                type: "GET",
                url: 'https://urpixpays.com/getPostsComments?post_id='+id,
                success: function (response) {
                    
                    
                    $('#'+id).html(response);
        
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
                    
            }
    
  
  
  
  
  
             function onPressPost(id = '',commentId = 0,post_id,user_id = 1919){
                    
                 let textValue = $('#'+id+'submit').val();
                      var data = new FormData();
            data.append('parent_id', commentId);
            data.append('post_id',post_id);
            data.append('user_id',1919);
            data.append('comment',textValue)
            $.ajax({
                type: "POST",
                url: '{{url("/add-comment-reply")}}',
                data: data,
                processData: false, // high importance!
                contentType: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    $('#'+commentId).append('<div class="post-comment"><img src="https://urpixpays.com/public/images/profile_pictures/'+response.user.profile_image+'" alt="" class="profile-photo-sm" /><p><a href="timeline.html" class="profile-link">'+response.user.name+'</a> '+response.comment+' </p></div>');
               $('#'+id+'submit').val('');
              let totalComments = $('#'+post_id+'comentCount').attr('data-id');
              let afterincress = parseInt(totalComments) + 1;
               $('#'+post_id+'comentCount').html(afterincress);
               $('#'+post_id+'comentCount').attr('data-id',afterincress);
                  
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
                    
            }
        
            
            
            //On Press Post COmment
            function onPressCommentPost(id = '',post_id,user_id = 1919){
                    
                 let textValue = $('#'+id).val();
                      var data = new FormData();
            data.append('post_id',post_id);
            data.append('user_id',1919);
            data.append('comment',textValue)
            $.ajax({
                type: "POST",
                url: '{{url("/add-comment")}}',
                data: data,
                processData: false, // high importance!
                contentType: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    
                    
                    let submit= response.id;
                    let aftersubmit = ''+submit+'';
                    let create_atTime  = moment().fromNow();
                    $('#'+post_id).append("<div class='post-container'>"+
                    "<img src='https://urpixpays.com/public/images/profile_pictures/"+response.user.profile_image+"'  class='profile-photo-md pull-left' />"+
              "<div class='post-detail'>"+
                "<div class='user-info'>"+
                  "<h5><a href='timeline.html' class='profile-link'>"+response.user.name+"</a> </h5><p class='text-muted'>"+create_atTime+"</p></div><div class='line-divider'></div><div class='post-text'><p>"+response.comment+"<i clas='em em-anguished'></i><i class='em em-anguished'></i><i class='em em-anguished'></i></p></div><div class='line-divider'></div><div id="+response.id+"></div><div class='post-comment'><img src='images/users/user-1.jpg' alt='' class='profile-photo-sm' /><input id="+response.id+"submit type='text' class='form-control' placeholder='Post a comment'><button type='submit'  onclick='onPressPost("+submit+","+response.id+","+response.post_id+")' >Post</button></div></div><hr></div>");
               $('#'+id).val('');
               
                let totalComments = $('#'+post_id+'comentCount').attr('data-id');
              let afterincress = parseInt(totalComments) + 1;
               $('#'+post_id+'comentCount').html(afterincress);
               $('#'+post_id+'comentCount').attr('data-id',afterincress);
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
                    
            }
            
            
            
            
            //Like Post 
             //On Press Post COmment
            function likePost(post_id){
                    
                 
                      var data = new FormData();
            data.append('post_id',post_id);
            data.append('user_id',1919);
     
            $.ajax({
                type: "POST",
                url: '{{url("/likedPost")}}',
                data: data,
                processData: false, // high importance!
                contentType: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
               
                let totalComments = $('#'+post_id+'likesCount').attr('data-id');
              let afterincress = parseInt(totalComments) + 1;
               $('#'+post_id+'likesCount').html(afterincress);
               $('#'+post_id+'likesCount').attr('data-id',afterincress);
               $('#'+post_id+'like').css({"color":"red"});
              $('#'+post_id+'like').attr("onclick","unlikePost("+post_id+")");
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
                    
            }
            function unlikePost(post_id){
                    
                 
                      var data = new FormData();
            data.append('post_id',post_id);
            data.append('user_id',1919);
     
            $.ajax({
                type: "POST",
                url: '{{url("/unlikePost")}}',
                data: data,
                processData: false, // high importance!
                contentType: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
               
                let totalComments = $('#'+post_id+'likesCount').attr('data-id');
              let afterincress = parseInt(totalComments) - 1;
               $('#'+post_id+'likesCount').html(afterincress);
               $('#'+post_id+'likesCount').attr('data-id',afterincress);
               $('#'+post_id+'like').css({"color":"#dedede"});
               $('#'+post_id+'like').attr("onclick","likePost("+post_id+")");
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
                    
            }
            
            
            
            
            
            
            
          $( document ).ready(function() {
            console.log('ready');
            //  $('#table').DataTable();
            $('#master_item').addClass('active1');
            $('#client_list').addClass('active');
            $('#client_list .has-arrow').attr('aria-expanded','true');
            $('#client_list ul').addClass('show');
            $('.breadcome-menu').html('');
            $('.breadcome-menu').append('' +
                '<li>' +
                '<a href="">Home</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Users</span>\n' +
                '</li>');
                $(".vocab-list").on("keyup", "#writeWord", function(e) {
                    if (e.which == 13) {
                         alert("Enter");
                   }
                });
                
                 $(document).on('click', '.pagination a', function(event){
              event.preventDefault(); 
              var query = $('#searchResults').val();
              var page = $(this).attr('href').split('page=')[1];
              showSocialPostsSearch(page);
             });
              
            
        });
  </script>
</body>

</html>
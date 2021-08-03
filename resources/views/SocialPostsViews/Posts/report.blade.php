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
         @if(Session::get('login_flag') != 'login')
      @include('Layout.gmenu')
   @else
      @include('Layout.smenu')
  @endif
    </header>
  <div class="container">

    <!-- Timeline
      ================================================= -->
    <div class="timeline">
  
      <div id="page-contents">
        <div class="row">
          <div class="col-md-3">


          </div>
          <div class="col-md-7">
             <form method="POST" action="{{route('save.report.web')}}" >
        
 {{ csrf_field() }}
            <!-- Profile Settings
              ================================================= -->
              <input name='social_post_id' value={{$social_post_id}} hidden />
            <div class="edit-profile-container">
              <div class="block-title">
                <h4 class="grey"><i class="icon ion-ios-settings"></i>Post Report</h4>
                <div class="line"></div>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                  deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                <div class="line"></div>
              </div>
              <div class="edit-block">
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Copyrights</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' checked value='Copyrights' >
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Adult</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='Adult' >
                          
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Inappropiate</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='Inappropiate'>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Promote Terrorism</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='Promote Terrorism'>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Harassement or Bullying</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='Harassement or Bullying'>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>Child Abuse</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='Child Abuse'>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
                <div class="settings-block">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <div class="switch-description">
                        <div class="mt-8"><strong>And Other</strong></div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="toggle-switch">
                        <label class="switch">
                          <input type="radio" name='report_reason' value='And Other'>
                          <span class="slider round"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="line"></div>
              </div>
            </div>
            <div class="post-comment mt-3">
              <div class="row">
                <div class="col-md-12">
                  <h5>Your Custom Complaint </h5>
                </div>
                <div class="col-md-12 col-sm-10 col-xs-10">
                  <form class="form-group">
                    <textarea class="form-control" placeholder="write comments" name='report_comment' rows="5" colspan="50"></textarea>
                  </form>
                  <!-- <input type="text" class="form-border" placeholder="write your comment"> -->
                </div>
                <div class="col-md-12 col-sm-10 col-xs-10">
                  <button class="btn btn-success" type='submite'>Submit</button>
                  <button class="btn btn-danger">Cancel</button>
                </div>
              </div>

            </div>
          </div>
              </form>

        </div>
      </div>
    </div>
  </div>

 <!--Buy button-->

<script src="{{asset('socialjs/jquery-3.1.1.min.js')}}"></script>
  <footer class="bg-dark">
    @include('Layout/footer')
  </footer>
  <!-- Scripts
    ================================================= -->
    <script src="{{asset('moment.js')}}"></script>
  <script src="{{asset('socialjs/bootstrap.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.sticky-kit.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('socialjs/script.js')}}"></script>
  
  <script>
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
                
            
        });
  </script>
</body>

</html>
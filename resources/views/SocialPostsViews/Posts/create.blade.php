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

            <!-- Basic Information
              ================================================= -->
            <div class="edit-profile-container">
              <div class="block-title">
                <h4 class="grey"><i class="fa fa-users"></i>Create Your Post</h4>
                <div class="line"></div>

              </div>
              <div class="edit-block">
                <form name="basic-info" enctype="multipart/form-data" method="POST" action="{{route('create.social.post')}}" id="basic-info" class="form-inline">
                    {{ csrf_field() }}
                  <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      <label for="firstname">Post Title</label>
                      <input id="firstname" class="form-control input-group-lg" type="text" name="description" />
                    </div>
                  </div>
                  <div class="line"></div>
                  <div class="row">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                      <label for="file">Upload images</label>
                      <input type="file" id="file1" name="image" accept="image/*" capture style="display:none" />
                      <img src="https://macgroup.org/blog/wp-content/uploads/2011/10/iphone-camera-icon-150x150.jpg"
                        id="upfile1" style="cursor:pointer" />
                    </div>
                  </div>
                  <div class="line"></div>
                  <button class="btn btn-primary">Post Submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <!-- Scripts
    ================================================= -->
  <script src="{{asset('socialjs/jquery-3.1.1.min.js')}}"></script>
  <script src="{{asset('socialjs/bootstrap.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.sticky-kit.min.js')}}"></script>
  <script src="{{asset('socialjs/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('socialjs/script.js')}}"></script>
  <script>
    $(document).ready(function (e) {
      $(".showonhover").click(function () {
        $("#selectfile").trigger('click');
      });
    });


    var input = document.querySelector('input[type=file]'); // see Example 4

    input.onchange = function () {
      var file = input.files[0];

      drawOnCanvas(file);   // see Example 6
      displayAsImage(file); // see Example 7
    };

    function drawOnCanvas(file) {
      var reader = new FileReader();

      reader.onload = function (e) {
        var dataURL = e.target.result,
          c = document.querySelector('canvas'), // see Example 4
          ctx = c.getContext('2d'),
          img = new Image();

        img.onload = function () {
          c.width = img.width;
          c.height = img.height;
          ctx.drawImage(img, 0, 0);
        };

        img.src = dataURL;
      };

      reader.readAsDataURL(file);
    }

    function displayAsImage(file) {
      var imgURL = URL.createObjectURL(file),
        img = document.createElement('img');

      img.onload = function () {
        URL.revokeObjectURL(imgURL);
      };

      img.src = imgURL;
      document.body.appendChild(img);
    }

    $("#upfile1").click(function () {
      $("#file1").trigger('click');
    });
    $("#upfile2").click(function () {
      $("#file2").trigger('click');
    });
    $("#upfile3").click(function () {
      $("#file3").trigger('click');
    });
  </script>
</body>

</html>
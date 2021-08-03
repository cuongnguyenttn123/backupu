<html>
<head>
    @include('Layout/head')
</head>
<body>
<header>
@if(Session::get('login_flag') != 'login')
    @include('Layout.gmenu')
 @else
    @include('Layout.smenu')
@endif
  <style>
    .info_page{width:100%;height:auto}
    .info-cn{background-color:#FBB03B}
    #section-41{background-color:#4b4b4b}
    #section-42{background-color:#fbb03b}
    #section-51:after{content:''}
    #section-44, #section-49, #section-54{padding-top:50px;padding-bottom:50px}
    #section-45{padding-top:50px}
    #section-52{padding-top:20px}
    #section-50{padding:50px 0}
    .section-text{font-size:40px;text-align:center;font-weight:600;padding:40px 15px;margin-bottom:0;color:#001111}
    .text-cn{background:#fff}
    #section-51{position:relative}
    #section-51:before{content:'';position:absolute;right:0;top:0;width:54%;background:#4c4c4c;height:100%}
    #section-51 .info_page{margin-top:-1px}
    @media (max-width:767px) {
      .info-cn{margin-top:21px}
      .section-text{font-size:24px;padding:15px}
    }
  </style>
</header>
<div class="info-cn">
  @foreach($site_images as $key => $value)
  <section id="section-{{$value->id}}">
    <div class="container">
      <div class="row">
        <div class="col">
          <img src='{{asset("uploads/info_images/$value->imgname")}}'  class="info_page">   
        </div>
      </div>
    </div>
  </section>

  <section class="text-cn">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="section-text">{{$value->image_detail}}</p><!--// section-text -->  
        </div>
      </div>
    </div>
  </section><!--// text-cn -->

  @endforeach
</div><!--// info-cn -->
<footer class="bg-dark">
    @include('Layout/footer')
</footer>

  <script>
    $(document).ready(function(){
     $.each(function(){
      
     })
    });
  </script>
</body>
</html>

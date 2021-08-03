@extends('Layout.gpage')

@section('lib')

@stop
@section('style-css')
<link href="{{url('public/css/gallery/lightgallery.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <style type="text/css">
  .child{
      display:none;
  }
    .img-fluid{
          display: inline;
    /* max-width: 100%; */
    height: 100%;
    }
    .figure_25{
     
    float: left;
    margin: 5px;
    height: 200px;
    max-width: 300px;
    }
    .lg-share{
      display: none;
    }
    .main_row{
        padding: 50px 0 0 40px;
    }
    @media only screen and (max-width: 600px) {
        .figure_25{
           max-width: unset;
        width: 96%;
        min-height: 200px;
        display: block;
        height: auto;
        }
        .img-fluid{
            height:auto;
        }
        .main_row{
            padding: 50px 0 0 5px;
        }
    }
    .icon-bar {
  position: fixed;
  top: 50%;
  z-index: 99;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 12px;
  transition: all 0.3s ease;
  color: white;
  font-size: 14px;
}

.icon-bar a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}
  </style>
<meta name="viewport" content="width=device-width, initial-scale=1">

<div class="icon-bar">
  <a href="http://www.facebook.com/sharer.php?u={{url('exhibition')}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a> 
  <a href="http://twitter.com/share?text=Join UrPixPays to turn your photos into cash &url={{url('exhibition')}}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
  
  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url('exhibition/')}}" class="linkedin" target="_blank"><i class="fab fa-linkedin" ></i></a>
  <a href="mailto:?Subject=Join UrPixPays&amp;Body=Join%20Urpixpays%20by%20click%20hare%20%20{{url('exhibition')}}%20%20and%20Turn%20your%20photos%20into%20cash" class="youtube" target="_blank"><i class="fas fa-envelope"></i></a> 
</div>
@stop
@section('content')

  <div class="row main_row" >
  
      <div id="mdb-lightbox-ui"></div>
  
      <div id="anchor-tag" class="mdb-lightbox no-margin">
      @foreach($imgs_top as $key => $value)
        <figure class="figure_25"style="padding:0px !important" data-src="{{$value->imgname}}">
          <a href="{{$value->imgname}}" data-size="160x1067">
            <img alt="{{$value->image_id}}" src="{{$value->imgname}}"
            class="img-fluid"
             >
          </a>
        </figure>
      @endforeach
  
  
      </div>
  
    
  </div>


@stop
@section('javascript')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#lightgallery').lightGallery();
    $('#anchor-tag').lightGallery();
});
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="{{url('public/js/gallery/lightgallery-all.min.js')}}"></script>
<script src="{{url('public/js/gallery/jquery.mousewheel.min.js')}}"></script>
@stop

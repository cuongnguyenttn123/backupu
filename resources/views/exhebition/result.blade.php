@extends('Layout.gpage')

@section('lib')

@stop
@section('style-css')
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style type="text/css">
  #submit_btn{
           font-size: .9em;
    color: #ff3;
    background: none;
    outline: none;
    border: solid 1px rgba(255, 255, 255, 0.8);
    cursor: pointer;
    padding: 0.6em;
    -webkit-appearance: none;
    width: 100%;
    margin: 0.5em 0;
    letter-spacing: 4px;
        }
        

        .image-card .like{
            font-size: 30px;
            color: #0099cc;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 7;
        }
        .image-card .votingmark{
            position: absolute;
            z-index: 6;
            width: 100px;
            right: 0%;
            bottom: 0%;
            display: none;
            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -o-transition: all .4s ease;
            -ms-transition: all .4s ease;
            transition: all .4s ease;
        }
        .image-card .vote{
            right: 0px;
            bottom: 0px;
            opacity: .8;
            width: 100px;
        }
        .ok{
            display: none;
        }
        .show{
            display: block;
        }
        /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999999; /* Sit on top */
  padding-top: 80px; /* Location of the box */
  left: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

#signindlg, #signupdlg{
    top: 0;
    padding-top: 0px;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;
}


/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
 
    width: 700px;
}
.modal-content {
    /* width: 350px; */
}
/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 100%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}
.btn-outline {
    position:relative;
    top:0;
    left:0;
}
.btn-outline2 {
      background: #0099cc;
      color: #ffffff;
      border-color: #0099cc;
      font-weight: bold;
      letter-spacing: 0.05em;
      border-radius:3px;
      font-size: 13px;
    }
.btn-outline2 {
      border-radius:3px!important;
      background: #0099cc;
      color: #ffffff;
      border-color: #0099cc;
      font-weight: bold;
      border-radius: 0;
    }
.btn-outline:hover,
    .btn-outline:active,
    .btn-outline:focus,
    .btn-outline.active {
      color: #ffffff;
      border-color: #0099cc;
    } 

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
    float: right;
    font-size: 2rem;
    font-weight: 700;
    line-height: 1;
    color: #848484;
    text-shadow: 0 1px 0 #fff;
    opacity: 1;
    position: absolute;
    right: 5%;
    top: 50px;
}

.close:hover,
.close:focus {
  color: #fff !important;
  text-decoration: none;
  cursor: pointer;
}
#checkvote img{
  height: 250px;
}
.buttons_Area button{
  width: 30%;
  margin-right:30px;
}
.buttons_Area{
    width: 40%;
    margin: 0 auto;
}
#img01{
    width:50%;
}
#img_name {
    white-space: nowrap;
    width: 280px;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 auto;
    text-align: center;
    font-size: 14px;
    color: #0099cc;
    position: absolute;
    bottom: 10px;
    left: 10px;
    z-index: 7;
    background: #00000078;
    border-radius: 5px;
}
.w_320{
    width: 320px !important;
}
@media screen and (max-width: 1240px) {
    #container{
    max-width: 980px !important;
    }
    .buttons_Area button{
        width: 50%;
        margin-bottom: 10px !important;
    }
    
}
@media screen and (max-width: 1060px) {
    #container{
    max-width: 650px !important;
    }
    
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
  #checkvote img{
    height: 40%;
  }
  #checkvote button{
    width: 100%;
    margin-bottom: 10px !important;
  }
  .buttons_Area{
      width:60%;
  }
  #pro-c2{
          top: 0px !important;
  }
  #img01{
    width:95%;
  }
}
</style>
 <style type="text/css">
   .item {
  float: left;
  margin-bottom: 5px;
}
.item {
  width: 320px;
  }

.item img {
  display: block;
  width: 100%;
}
#container, .container{
    width: 94%;
    margin: 0 auto;
    max-width: 1310px;
}
.container .grid-sizer {
  width:  30%;
        @media screen and (max-width: 768px) {
        width: 50%;
      }
      @media screen and (min-width: 769px) and (max-width: 1399px) {
        width: 30%;
      }
      @media screen and (min-width: 1400px) and (max-width: 1899px) {
        width: 30%;
      }
      @media screen and (min-width: 1900px) {
        width: 16.66%;
      }
}
.container .grid-sizer {
  height: 60px;
  float: left;
  background: #D26;
  border: 2px solid #333;
  border-color: hsla(0, 0%, 0%, 0.5);
  border-radius: 5px;
}
#checkvote{
  background: #00000091;
}
.nav{
    display: none;
}
button { font-size: 18px; } 
@media screen and (max-width: 480px) {
    .item {
    width: 100%;
    }
    .child nav ul li a {
    padding: 1rem 0.5rem !important;
        
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
.gal-item{
	overflow: hidden;
	padding: 8px;
}
.gal-item .box{
	height: 100%;
	overflow: hidden;
}
.box img{
	height: 100%;
	width: 100%;
	object-fit:cover;
}
.h-50{
    height:500px !important;
    margin-bottom: 20px;
}
.h-30{
    height:300px !important;
}
.h-25{
    height:209px !important;
}
@media only screen and (max-width: 577px){
    .h-30{
        height:600px !important;
    }
    .h-30_img{
        height:300px !important;
    }
}
 </style>
<div class="icon-bar">
  <a href="http://www.facebook.com/sharer.php?u={{url('exhibition')}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a> 
  <a href="http://twitter.com/share?text=Join UrPixPays to turn your photos into cash &url={{url('exhibition')}}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a> 
  
  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{url('exhibition/')}}" class="linkedin" target="_blank"><i class="fab fa-linkedin" ></i></a>
  <a href="mailto:?Subject=Join UrPixPays&amp;Body=Join%20Urpixpays%20by%20click%20hare%20%20{{url('exhibition')}}%20%20and%20Turn%20your%20photos%20into%20cash" class="youtube" target="_blank"><i class="fas fa-envelope"></i></a> 
</div>
@stop
@section('content')
<div class="container">
    <header class="text-center" style="margin-top: 30px;">
        <h1 style="color:black !important">UrPixPays Exhibition</h1>
    </header>
	<div class="row">
	  <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
		   <div class="row h-50">
				  <div class="col-md-12 col-sm-12 co-xs-12 gal-item">
						<div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[0]->imgname}}">
						 <img src="{{$imgs_top[0]->imgname}}" class="img-ht img-fluid rounded">
						 <i id="img_name" class="w_320">{{$imgs_top[0]->image_id}}</i>
						</div>
					</div>
			</div>
	  
	    <div class="row h-30">
				 <div class="col-md-6 col-sm-6 co-xs-12 gal-item h-30_img">
				  <div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[1]->imgname}}">
					<img src="{{$imgs_top[1]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[1]->image_id}}</i>
				</div>
				</div>

				<div class="col-md-6 col-sm-6 co-xs-12 gal-item h-30_img">
				 <div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[2]->imgname}}">
					<img src="{{$imgs_top[2]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[2]->image_id}}</i>
				</div>
				</div>
            </div>
      </div>

           <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
			   <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-25">
				<div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[3]->imgname}}">
					<img src="{{$imgs_top[3]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[3]->image_id}}</i>
				</div>
				</div>

				 <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-25">
				   <div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[4]->imgname}}">
					<img src="{{$imgs_top[4]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[4]->image_id}}</i>
				</div>
				
				</div>
				<div class="col-md-12 col-sm-6 co-xs-12 gal-item h-25">
				   <div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[5]->imgname}}">
					<img src="{{$imgs_top[5]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[5]->image_id}}</i>
				</div>
				
				</div>
				<div class="col-md-12 col-sm-6 co-xs-12 gal-item h-25">
				   <div class="box" onclick="image_zoom(this)" data_url="{{$imgs_top[6]->imgname}}">
					<img src="{{$imgs_top[6]->imgname}}" class="img-ht img-fluid rounded">
					<i id="img_name">{{$imgs_top[6]->image_id}}</i>
				</div>
				
				</div>
            </div>

	</div>
	<br/>
</div>
<div id="container" style="margin_top:50px;"></div>
           
<div id="myModal" class="modal" style="margin-top:-6px;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" style="object-fit:contain">
  <div id="caption"></div>
</div>


@stop
@section('javascript')
<script type="text/javascript" src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script type="text/javascript" src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>

<script type="text/javascript">
  $( function() {

  var $container = $('#container').masonry({
    columnWidth: 320,
    itemSelector: '.item',  
    gutter: 5,
    horizontalOrder: false,
    hiddenStyle: {
      transform: 'translateY(200px)',
      opacity: 0
    },
    visibleStyle: {
      transform: 'translateY(0px)',
      opacity: 1
    }
  });
  

  $( document ).ready(function() {
    
    var grid = '<?php echo $image_item; ?>';
    if(grid != '' ){
      var $items = getItems();
      $container.masonryImagesReveal( $items );
      // if(wand != 0){
      //   window.location.replace(window.location.href+'/1');
      // }
      
    }
    // var $items = getItems();
    // $container.masonryImagesReveal( $items );
    
    // $container.one( 'layoutComplete', function() {
    //   var $items2 = getItems2();
    //   $container.masonryImagesReveal( $items2 );
    // });
    // setTimeout(
    // function() 
    // {
      
    // }, 3000);
    
  });
  
});

$.fn.masonryImagesReveal = function( $items ) {
  var msnry = this.data('masonry');
  var itemSelector = msnry.options.itemSelector;
  // hide by default
  $items.hide();
  // append to container
  this.append( $items );
  $items.imagesLoaded().progress( function( imgLoad, image ) {
    // get item
    // image is imagesLoaded class, not <img>, <img> is image.img
    var $item = $( image.img ).parents( itemSelector );
    // un-hide item
    $item.show();
    // masonry does its thing
    msnry.appended( $item );
  });
  
  return this;
};

function randomInt( min, max ) {
  return Math.floor( Math.random() * max + min );
}

function getItem() {
  var width = randomInt( 150, 400 );
  var height = randomInt( 150, 250 );
  var item = '<div class="item">'+
    '<img src="https://lorempixel.com/' + 
      width + '/' + height + '/nature" /></div>';
  return item;
}

function getItems() {
  var items = '<?php echo $image_item; ?>';
  return $( items );
}
</script>
    <script>

        $(document).ready(function() {
            //alert("document ready occur#0099cc!");
            $('#preloader').css('display','none');

        });

    </script>
    <!--------------Modal-imagebigger-->
   <script> 
var modal = document.getElementById('myModal'); 
var img1 = document.getElementById('myImg');
var modalImg = document.getElementById("img01");


function image_zoom(url){
    modal.style.display = "block";
    var imgurl = url.getAttribute('data_url');  
  modalImg.src = imgurl;
  
}

$(".close").click(function() {
     modal.style.display = "none";
  
});
$(".exibitiom_btn").click(function(){
    $('.exibitiom_modal').addClass('open');
})
$(".exhibition_close").click(function(){
    $('.exibitiom_modal').removeClass('open');
})

$('#myModal').on('mousemove', function(e){
    console.log('abc');
    $(this).children('img').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
});
/*var span =  $(".close")[0]; 
 
span.onclick = function() { 
  modal.style.display = "none";*/
// }
</script>
<script src="//code.tidio.co/acznamgigotlxsssupznxthwso5r3bnx.js" async></script>
@stop

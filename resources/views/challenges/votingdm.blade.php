@extends('Layout.gpage')
@section('lib')

@stop
@section('style-css')
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
  #submit_btn{
    bottom: 65px;
    z-index: 8;
    float: right;
    margin-top: 10px;
    margin-right: 20px;
    position: fixed;
    right: 1;
    display: none;
    
    }
    .vote_image{
      position: absolute;margin-top:-100px;width: 100px;display: none;height: 100px;
      background: url('https://urpixpays.com/public/img/voting.png');
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
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 100;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
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
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
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
  .btn-group-lg>.btn, .btn-lg{
      font-size: 1rem;
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
#container{
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
button { font-size: 18px; } 
@media screen and (max-width: 480px) {
    .item {
    width: 100%;
    }
    .child nav ul li a {
    padding: 1rem 0.5rem !important;
        
    }
}
 </style>

@stop
@section('content')


<h2 style="text-align:center; margin:50px 0px 50px 0;">{{$title}}</h2>
<div id="container"></div>
<button id="submit_btn" type="button" onclick="senddata( {{$cid}})" class="btn btn-primary btn-lg">Submit</button>            
<div id="myModal" class="modal" style="margin-top:-6px;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<div id="checkvote" class="modal" style="margin-top:-6px;">
  <span class="close" onclick="location.reload();" style="color: black;">&times;</span>
  <div class="col-12" style="text-align: center;border-radius: 15px">
      <img  src="{{asset('img/vote-01.png')}}" >
      <h3 style="color: white;">Thanks For Voting</h3>
  </div>
  <div class="col-12 row" style="    margin: auto;height: 40px;margin-top: 10px ;">
      <div class="buttons_Area" style="height: 100%;text-align: center;margin-bottom: 20px;">

          <button onclick="window.location='https://urpixpays.com/challenges/voting/{{Request::segment(3)}}'" style="font-size: 17px;margin: auto;
    border: 1px solid #31658f;
    border-radius: 5px;
    outline: none;
    background-color: #31658f;
    color: white;
    padding: 5px 10px;">Continue  Voting</button>
          <button onclick="window.location='https://urpixpays.com/challenges/my'" style="    font-size: 17px;
    border: 1px solid #fffcfb;
    margin: auto;
    size: 15px;
    border-radius: 5px;
    outline: none;
    background-color: #3c3a3924;
    color: white;
    padding: 5px 10px;">Done</button>
      </div>

  </div>
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
      $container.one( 'layoutComplete', function() {
        var $items2 = getItems2();
        $container.masonryImagesReveal( $items2 );
      });
    }
    else{
      var $items2 = getItems2();
        $container.masonryImagesReveal( $items2 );
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
  console.log('<?php echo $image_item; ?>');
  var items = '<?php echo $image_item; ?>';
  return $( items );
}
function getItems2() {
  var items = '<?php echo $image_item1; ?>';
  return $( items );
}
</script>
    <script>

        $(document).ready(function() {
            //alert("document ready occur#0099cc!");
            $('#preloader').css('display','none');

        });
        var votearry=[];
        var likearry=[];
        var question=[];
        function giveVote(id,cid) {
            //alert('adsf');
            if (votearry.indexOf(id)<0){
                votearry.push(id);
            } else{
                votearry.splice(votearry.indexOf(id));

            }

            //console.log(votearry);
            //$('#vmid'+id).show();
            //$('#vmid'+id).append('<img class="votingmark" src="https://urpixpays.com/public/img/voting.png');
            // document.getElementById('vmid'+id).appendChild('<img class="votingmark" src="https://urpixpays.com/public/img/voting.png');
            //$('#vote_image'+id).html(imgdata + '<div id="vote_image'+id+'" style="position: absolute;margin-top:-100px;width: 100px;"><img src="https://urpixpays.com/public/img/voting.png"></div>');
            if($('#vmid'+id).attr('data-toggal') == 0){
              //var imgdata = $('#vmid'+id).html();
              $('#vote_image'+id).show();
              $('#vmid'+id).attr('data-toggal' , '1');
            }
            else{
              $('#vote_image'+id).hide();
              $('#vmid'+id).attr('data-toggal' , '0');
            }            
            // var vmid = document.getElementById('vmid'+id);

            // vmid.innerHTML += '<img class="votingmark" src="https://urpixpays.com/public/img/voting.png';
            $('#submit_btn').show();
        }
        
        
        function giveLike(flag, imageid) {
            console.log(flag);
            console.log(imageid);
            flag==0?$('#like'+imageid).addClass('show'):$('#like'+imageid).removeClass('show');
            if (likearry.indexOf(imageid)<0){
                likearry.push(imageid);
                $('#submit_btn').show();
            } else{
                likearry.splice(likearry.indexOf(imageid));
            }
            // console.log(likearry);
        }
        
        function giveLike1(flag, imageid) {
            console.log(flag);
            console.log(imageid);
            flag==0?$('#like1'+imageid).addClass('show'):$('#like1'+imageid).removeClass('show');
            if (question.indexOf(imageid)<0){
                question.push(imageid);
                $('#submit_btn').show();
            } else{
                question.splice(question.indexOf(imageid));
            }
            // console.log(question);
        }
         
        
         
        
        function senddata(cid) {
            var uid=getCookie('id');
            var votingmodal = document.getElementById('checkvote');     
            votingmodal.style.display = "block"; 
            $.ajax({
                url: '{{url('voting/set')}}',
                type: 'post',
                data: { votearry:votearry,likearry:likearry,question:question, uid:uid,cid:cid} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    var obj = JSON.parse(response); 
                                  
                    //$('#checkvote').modal('toggle');
                     
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
        }
        function image_delete(obj) {
          imageid = obj.getAttribute('data_id');
          imageurl = obj.getAttribute('data_url');
            $.ajax({
                url: '{{url('image_delete')}}',
                type: 'post',
                data: { imageid:imageid ,imageurl:imageurl} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
        }

    </script>
    <!--------------Modal-imagebigger-->
   <script> 
var modal = document.getElementById('myModal'); 
var img1 = document.getElementById('myImg');
var modalImg = document.getElementById("img01");


function image_zoom(url){
    modal.style.display = "block";
    var imgurl = $(this).attr('src');  
  modalImg.src = url;
   captionText.innerHTML = $(this).attr('alt');  
  
}

$(".close").click(function() {
     modal.style.display = "none";
  
});

 
/*var span =  $(".close")[0]; 
 
span.onclick = function() { 
  modal.style.display = "none";*/
// }
</script>
@stop

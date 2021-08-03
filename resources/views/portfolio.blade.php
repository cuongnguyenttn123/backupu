  @extends('Layout.gallarypage')
  @section('lib')

  @stop
  @section('style-css')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body{
      padding: 0px !important;
    }
    @media (min-width: 1200px){
      .container {
          max-width: 1325px;
      }
    }
    .container-fluid {
        min-height: unset !important;
        padding: 0px !important
    }
    .bg-img {
        background-image: url('{{$cover}}');
        height: 580px;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
        padding-left: unset;
        padding-right: unset;
      }
      .main{
        background-color: #FFFFFF;
      }
      .user-pic img{
        border-radius: 50%;
        width: 130px;
        height: 130px; 
        margin-top: -90px;
        border: 2px solid white;
      }
      .icons{
        list-style: none;
        display: inline-block;
        display: flex;
      }
      #border{
        border-bottom: 2px solid #1DA1F2;
      }
      .modal-open .modal{
          z-index: 99999999;
     }
     .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 10; /* Sit on top */
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
  #img_name {
      white-space: nowrap;
      width: 150px;
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
  .price_text{
      font-size: 18px;
      color: #0099cc;
      position: absolute;
      bottom: 30px;
      left: 10px;
      z-index: 7;
  }
  .price_value {
      white-space: nowrap;
      width: 110px;
      overflow: hidden;
      text-overflow: ellipsis;
      margin: 0 auto;
      text-align: center;
      font-size: 14px;
      color: white;
      position: absolute;
      bottom: 10px;
      right: 10px;
      z-index: 7;
      background: #00000078;
      border-radius: 5px;
  }
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
  #notification_item{
    left: auto;
  }
  #container{
      width: 100%;
      margin: 0 auto;
      max-width: 1620px;
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
  .icons li{
    margin-right: 15px;
  }
      @media only screen and (max-width: 1293px) {
        .container {
            max-width: 1180px;
        }
      }
      @media only screen and (max-width: 1293px) {
        #container{
          max-width: 1000px;
        }
      }
      @media only screen and (max-width: 1200px) {
        #container{
          max-width: 670px;
        }
      }
      @media only screen and (max-width: 760px) {
        #container{
          max-width: 330px;
        }
      }
      @media only screen and (max-width: 668px) {
          .a{
          text-align: center;
          width: 100%;
        }
         
          
      }
  </style>

  @stop
  @section('content')

  @php
          function thousandsCurrencyFormat($num) {

            if($num>1000) {

                  $x = round($num);
                  $x_number_format = number_format($x);
                  $x_array = explode(',', $x_number_format);
                  $x_parts = array('k', 'm', 'b', 't');
                  $x_count_parts = count($x_array) - 1;
                  $x_display = $x;
                  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                  $x_display .= $x_parts[$x_count_parts - 1];

                  return $x_display;

            }

            return $num;
          }
          
          $pix = json_decode(json_encode($userpix), true);
          $pixpoint = thousandsCurrencyFormat($pix['pixpoint']);
          $flag=$pix['rank'];
      @endphp

  <div class="container-fluid bg-img">
  </div>
  <!--TOP BAR START-->
  <div  class="main">
    <div class="container">
      <div class="row">
      <div class="col-md-4 user-pic"><img src="{{asset('images/profile_pictures/'.$u_profile)}}">
        @if( isset($_COOKIE['id']) && Request::segment(2) == $_COOKIE['id'] )
        <a href="{{url('/myprofile')}}" class="edit_icon"><i class="fas fa-pencil-alt"></i></a>
        @endif
      </div>
      <div class="col-md-6">
         <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#home" >Pix ID<br>
                <p class="text-center" style="margin-bottom: 0px;"><b>{{$uid}}</b></p></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#home" >Pix Points<br>
                <p class="text-center" style="margin-bottom: 0px;"><b>{{$pixpoint}}</b></p></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="javascript:void(0);" >Rank<br>
                <p class="text-center" style="margin-bottom:0px;"><b>
                @for($i=1;$i<=9;$i++)
                    @if($i==9)
                       {{$i==$flag?'pro':''}}

                    @else
                        {{$i==$flag?$i:''}}
                    @endif
                @endfor
                </b></p></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#home" >Country<br>
                <p class="text-center" style="margin-bottom: 0px;"><b>{{$country}}</b></p></a>
            </li>
          </ul>
      </div>
      <div class="col-md-2 col-sm-12 col-xs-12 ">
        <div class="mt-4 a">
        <ul class="icons ">
          <li><a href="http://www.facebook.com/sharer.php?u={{url('portfolio/'.$uid)}}" class="icon a" target="_blank"><i class="fab fa-facebook-f fa-lg"></i></a></li>
          <li><a href="http://www.linkedin.com/shareArticle?mini=true&url={{url('invite_sign_up/'.$uid)}}" class="icon" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a></li>
          <li><a href="http://twitter.com/share?text=Join UrPixPays to turn your photos into cash &url={{url('portfolio/'.$uid)}}" class="icon" target="_blank"><i class="fab fa-twitter fa-lg"></i></a></li>
          <li><a href="mailto:?Subject=Join UrPixPays&amp;Body=Join%20Urpixpays%20by%20click%20hare%20%20{{url('portfolio/'.$uid)}}%20%20and%20Turn%20your%20photos%20into%20cash" class="icon" target="_blank"><i class="fas fa-envelope fa-lg"></i></a></li>
        </ul>
        </div>
      </div>
    </div>
    </div>
  </div><!--TOP BAR END-->

  <!--MAIN CONTENT START-->
  <div class="container-fluid " style="background-color: #E6ECF0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <h2>{{$u_name}}</h2>
          <p>{{$about_user}}</p>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
          <hr style="margin: 20px auto 50px;width: 50%;     border: 1px solid #b0acac;">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
            <div class="tab-content">
              <div id="home" class="  container tab-pane active" style="padding: 0px;">
                
                  <div id="container"></div>
                
              </div>
              <div id="menu1" class="container tab-pane fade"><br>
                <div class="card" style="">
                <div class="card-body">
                  <h4 class="card-title">Jordan</h4>
                  <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                  <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                </div>
              </div>
              </div>
              <div id="menu2" class="container tab-pane fade"><br>
                <div class="card" style="">
                <div class="card-body">
                  <h4 class="card-title">Alex Doe</h4>
                  <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                  <a href="#" class="btn btn-primary stretched-link">See Profile</a>
                </div>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div id="container"></div>           
  <div id="myModal" class="modal" style="margin-top:-6px;">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01" style = "width:50%;">
    <div id="caption"></div>
  </div>
  {{------------------------------------Pagination----------------------------------------------------------------------}}
          
          {{----------------------------------------               Pagination                 ------------------------------}}

  @stop
  @section('javascript')

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
  <script type="text/javascript" src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
  <script>
              var input = document.getElementById("choices-text-preset-values");
              input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("click_search").click();
                }
              });    
          </script>        
          <script> 
              
              $('#click_search').click(function(){
                url = "https://urpixpays.com/gallary_images";
                var page = "{{ Request::segment(2) }}";
                var keyword = $('#choices-text-preset-values').val();
                var option = $('#option_select').find(":selected").val();
                if(page != ''){
                  var url = "https://urpixpays.com/gallary_images/"+page+"/"+option+"/"+keyword;
                }
                else{
                  var url = "https://urpixpays.com/gallary_images/1/"+option+"/"+keyword;
                }
                
                window.location = url;
              });
              $('#option_select').change(function(){
                url = "https://urpixpays.com/gallary_images";
                var page = "{{ Request::segment(2) }}";
                var keyword = $('#choices-text-preset-values').val();
                var option = $('#option_select').find(":selected").val();
                if(page != ''){
                  var url = "https://urpixpays.com/gallary_images/"+page+"/"+option+"/"+keyword;
                }
                else{
                  var url = "https://urpixpays.com/gallary_images/1/"+option+"/"+keyword;
                }
                
                window.location = url;
              });
  </script>
  <script type="text/javascript">
    $( function() {

    var $container = $('#container').masonry({
      itemSelector: '.item',
      columnWidth: 320,
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
      var $items = getItems();
      $container.masonryImagesReveal( $items );
      // var $items = getItems2();
      // $container.masonryImagesReveal( $items );
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
    var items = `<?php echo $image_item; ?>`;
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
              if($('#vmid'+id).attr('data-toggal') == 0){
                var imgdata = $('#vmid'+id).html();
                $('#vmid'+id).html(imgdata + '<div id="vote_image'+id+'" style="position: absolute;margin-top:-100px;width: 100px;"><img src="https://urpixpays.com/public/img/voting.png"></div>');
                $('#vmid'+id).attr('data-toggal' , '1');
              }
              else{
                $('#vote_image'+id).remove();
                $('#vmid'+id).attr('data-toggal' , '0');
              }            
              // var vmid = document.getElementById('vmid'+id);

              // vmid.innerHTML += '<img class="votingmark" src="https://urpixpays.com/public/img/voting.png';
              $('#submit_btn').show();
          }
          
          
          function add_cart(imageid) {
              window.location='<?php echo url("auction");?>/'+imageid;
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
                      // alert(obj.message);
                      //$('#signindlg').modal('toggle');
                      // console.log(obj);
                      // $('#flip').text(obj.data.Flip);
                      // $('#charge').text(obj.data.Charge);
                      // $('#wand').text(obj.data.Wand);
                      // $('#flip_dlg').modal('toggle');
                      location.reload(); 
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


  function image_zoom(obj){
      var url = obj.getAttribute('data_url')
      modal.style.display = "block";
      var imgurl = $(this).attr('src');  
    modalImg.src = url;
     // captionText.innerHTML = $(this).attr('alt');  
    
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

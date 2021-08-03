@extends('Layout.page1')
@section('lib')

@stop
@section('style-css')
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
    padding-top: 7rem !important;
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
    border-radius: 5px;}

        .image-card .like{
            font-size: 30px;
            color: #0099cc;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 7;
            cursor: pointer;
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
 
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
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
#img_tags {
    white-space: nowrap;
    width: 95%;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 auto;
    text-align: left;
    font-size: 14px;
    color: #0099cc;
    position: absolute;
    bottom: 55px;
    left: 10px;
    z-index: 7;
    border-radius: 5px;
}
#img_tags span {
    padding: 1px 6px;
    background: #52bde1;
    margin-right: 2px;
    border-radius: 5px;
    color: white;
}
#img01{
  width: 100%;
}
.price_text{
    font-size: 18px;
    color: #0099cc;
    position: absolute;
    bottom: 30px;
    left: 10px;
    z-index: 7;
}
</style>
 <style type="text/css">
   .item {
  width: 320px;
  float: left;
  margin-bottom: 5px;
}

.item img {
  display: block;
  width: 100%;
}
#container{
    width: 93%;
    margin: 0 auto;
}
#container .grid-sizer {
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
#container .grid-sizer {
  height: 60px;
  float: left;
  background: #D26;
  border: 2px solid #333;
  border-color: hsla(0, 0%, 0%, 0.5);
  border-radius: 5px;
}
.s004 .inner-form .input-field .btn-search {
    width: 70px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    background: transparent;
    border: 0;
    padding: 0;
    cursor: pointer;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    align-items: center;
}
.button.small {
    padding: 4px 12px;
}
.button.green, .button.red, .button.blue {
    color: #fff;
    text-shadow: 0 1px 0 rgba(0,0,0,.2);
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.3)), to(rgba(255,255,255,0)));
    background-image: -webkit-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image: -moz-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image: -ms-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image: -o-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image: linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
}
.button.green {
    background-color: #57a957;
    border-color: #57a957;
}
#pagination {
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
#pagination ul {
    list-style: none;
    text-align: center;
    padding: 0;
    display: flex;
}
#pagination ul li {
    color: #fff;
    display: flex;
}
#pagination ul li:first-child a {
    border-radius: 5px 0 0 5px;
}
#pagination ul li a {
    background-color: #f29620;
    padding: 5px 10px;
    border: 2px solid #3D315B;
    border-right: 0;
}
button { font-size: 18px; } 
@media screen and (max-width: 680px) {
  #img01{
    width: 95%;
  }
}
@media screen and (max-width: 480px) {
    .item {
    width: 100%;
    }
}
 </style>

@stop
@section('content')

@php
if(Request::segment(2) == 'uploadsuccess'){
@endphp
    <script>
    $('#alertmessage').attr('value', 'Your Bid Was Placed Successfully!');
    $('#alert_message_dlg').attr('class', 'modal fade animate');
    $('#alert_message_dlg').modal('show');
    </script>
@php
}
@endphp

<div style="display: flow-root;margin-bottom:10px;"><a href="{{url('/cart')}}" class = " small green button"  style="float: right;background-color:;font-size: 20px;"><i class="fa fa-shopping-cart" aria-hidden="true">({{$cart_count}})</i></a></div>
<div id ="nav" class="row" style="margin-bottom: 20px;">
    <div class="col-md-3"></div>
    <div class="s004 col-md-3" style="width:300px;margin-left: 50px;padding: 0px;">
            <div class="inner-form" style="margin-bottom:5px;">
                <div class="input-field">
                    <input class="form-control" id="choices-text-preset-values" type="text" size="200" placeholder="search..." value="@php echo (Request::segment(4) != '' ? Request::segment(4) : '') @endphp" />
                    <button class="btn-search" type="button" id = "click_search">
                       <i class="fa fa-search" style="font-size:24px"></i>
                    </button>
                </div>
            </div>
    </div>
    <div style="margin-left:50px;width:300px;">
        <select class="select col-6" id = "option_select" style = "flex: 0 0 50%; max-width: 100%; height: 35px;-webkit-appearance: menulist-button;">
            <option value = "latest" @php echo (Request::segment(3) == 'latest' ? 'selected' : '') @endphp>Sort by latest</option>                    
            <option value = "popularity" @php echo (Request::segment(3) == 'popularity' ? 'selected' : '') @endphp>Sort by popularity</option>
            <option value = "rating" @php echo (Request::segment(3) == 'rating' ? 'selected' : '') @endphp>Sort by average rating</option>
            
            <option value = "lowtohigh" @php echo (Request::segment(3) == 'lowtohigh' ? 'selected' : '') @endphp>Sort by price : low to high</option>
            
            <option value = "hightolow" @php echo (Request::segment(3) == 'hightolow' ? 'selected' : '') @endphp>Sort by price : high to low</option>
        </select>
    </div>
</div>



<div id="container"></div>           
<div id="myModal" class="modal" style="margin-top:-6px;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" >
  <div id="caption"></div>
</div>




{{------------------------------------Pagination----------------------------------------------------------------------}}
        <!-- <div style="display: table; margin: auto;">
            <div id="pagination"></div>
        </div> -->
        {{----------------------------------------               Pagination                 ------------------------------}}
        


@stop
@section('javascript')
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
            // let pages = parseInt($('#pagenum').text()) ; 
            // document.getElementById('pagination').innerHTML = createPagination(pages, 1);
            // createPagination();
            // function createPagination(pages, page) { 
            //     let str = '<ul>';
            //     let active;
            //     let pageCutLow = page - 1;
            //     let pageCutHigh = page + 1;
            //     // Show the Previous button only if you are on a page other than the first
            //     if (page > 1) {
            //         str += '<li class="page-item previous no"><a onclick="createPagination(pages, '+(page-1)+')">Previous</a></li>';
            //     }
            //     // Show all the pagination elements if there are less than 6 pages total
            //     if (pages < 6) {
            //         for (let p = 1; p <= pages; p++) {
            //             active = page == p ? "active" : "no";
            //             str += '<li class="'+active+'"><a onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
            //         }
            //     }
            //     // Use "..." to collapse pages outside of a certain range
            //     else {
            //         // Show the very first page followed by a "..." at the beginning of the
            //         // pagination section (after the Previous button)
            //         if (page > 2) {
            //             str += '<li class="no page-item"><a onclick="createPagination(pages, 1)">1</a></li>';
            //             if (page > 3) {
            //                 str += '<li class="out-of-range"><a onclick="createPagination(pages,'+(page-2)+')">...</a></li>';
            //             }
            //         }
            //         // Determine how many pages to show after the current page index
            //         if (page === 1) {
            //             pageCutHigh += 2;
            //         } else if (page === 2) {
            //             pageCutHigh += 1;
            //         }
            //         // Determine how many pages to show before the current page index
            //         if (page === pages) {
            //             pageCutLow -= 2;
            //         } else if (page === pages-1) {
            //             pageCutLow -= 1;
            //         }
            //         // Output the indexes for pages that fall inside the range of pageCutLow
            //         // and pageCutHigh
            //         for (let p = pageCutLow; p <= pageCutHigh; p++) {
            //             if (p === 0) {
            //                 p += 1;
            //             }
            //             if (p > pages) {
            //                 continue
            //             }
            //             active = page == p ? "active" : "no";
            //             str += '<li class="page-item '+active+'"><a onclick="createPagination(pages, '+p+')">'+ p +'</a></li>';
            //         }
            //         // Show the very last page preceded by a "..." at the end of the pagination
            //         // section (before the Next button)
            //         if (page < pages-1) {
            //             if (page < pages-2) {
            //                 str += '<li class="out-of-range"><a onclick="createPagination(pages,'+(page+2)+')">...</a></li>';
            //             }
            //             str += '<li class="page-item no"><a onclick="createPagination(pages, pages)">'+pages+'</a></li>';
            //         }
            //     }
            //     // Show the Next button only if you are on a page other than the last
            //     if (page < pages) {
            //         str += '<li class="page-item next no"><a onclick="createPagination(pages, '+(page+1)+')">Next</a></li>';
            //     }
            //     str += '</ul>';
            //     // Return the pagination string to be outputted in the pug templates 
            //     // getImage(page);
            //     document.getElementById('pagination').innerHTML = str;
            //     return str;
            // }
            $('#click_search').click(function(){
              url = "https://urpixpays.com/shop";
              var page = "{{ Request::segment(2) }}";
              var keyword = $('#choices-text-preset-values').val();
              var option = $('#option_select').find(":selected").val();
              if(page != ''){
                var url = "https://urpixpays.com/shop/"+page+"/"+option+"/"+keyword;
              }
              else{
                var url = "https://urpixpays.com/shop/1/"+option+"/"+keyword;
              }
              
              window.location = url;
            });
            $('#option_select').change(function(){
              url = "https://urpixpays.com/shop";
              var page = "{{ Request::segment(2) }}";
              var keyword = $('#choices-text-preset-values').val();
              var option = $('#option_select').find(":selected").val();
              if(page != ''){
                var url = "https://urpixpays.com/shop/"+page+"/"+option+"/"+keyword;
              }
              else{
                var url = "https://urpixpays.com/shop/1/"+option+"/"+keyword;
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
        function image_reject(imageid) {
            $.ajax({
                url: '{{url('image_reject')}}',
                type: 'post',
                data: { imageid:imageid} ,
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

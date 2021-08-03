@extends('Layout.gpage')
@section('lib')

@stop
@section('style-css')
<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #photos {

        }

        #photos .image {
            /* Just in case there are inline attributes */

            max-width: 600px;
            width:auto;
            height: 200px !important;
            border: solid 4px grey;
        }

        .image-card{
            position: relative;
            flex: auto;
            max-width: 400px;
        }

        #submit_btn{
             
            
            bottom: 65px;
            z-index: 8;
            float:right;
            margin-top:10px;
            margin-right:20px;
        }

        .image-card .like{
            font-size: 30px;
            color: red;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 7;
        }
        .image-card .votingmark{
            position: absolute;
            z-index: 6;
            width: 200px;
            right: 0%;
            bottom: 0%;
            opacity: 0;
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
 }
    </style>
    <style>
 

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

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
        
        
        
        
        
</style>

@stop
@section('content')
    @php
        //echo var_dump($data);
        if (count($data)>0)
            $item = json_decode(json_encode($data[0]), true);

    @endphp
    @if (count($data)>0 || count($data1)>0) 
            <div id="photos" class="d-flex flex-wrap bg-light">
                @for($i=0;$i<count($data);$i++)
                    @php
                        //echo count($data);
                        $item = json_decode(json_encode($data[$i]), true);
                    @endphp
                    <div class="image-card p-2" >
                        <div onclick="giveVote({{$item['id']}})" style="background-image: url('{{$item['url']}}');background-size: contain;background-position: center;background-repeat:no-repeat;border:1px solid gray;">
                            <img class="image"  src="{{$item['url']}}" style="opacity: 0"/>
                            <img id="vmid{{$item['id']}}" class="votingmark" src="{{asset('img/voting.png')}}"/> 
                        </div> 
                        <i id="dislike{{$item['id']}}" class="fa fa-heart-o like " aria-hidden="true" onclick="giveLike(0,{{$item['id']}})"></i>
                        <i id="like{{$item['id']}}" class="fa fa-heart like ok" aria-hidden="true" onclick="giveLike(1,{{$item['id']}})"></i>
                        
                        <i id="dislike1{{$item['id']}}" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,{{$item['id']}})" style = "font-size: 32px;   color:red;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        <i id="like1{{$item['id']}}" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,{{$item['id']}})" style = "font-size: 32px;  color:red;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        
                       
                        
                        <i class="fa fa-search-plus myImg"  src="{{$item['url']}}" alt = "ddd" style="    margin-top:0px; font-size: 30px;color: red;position: absolute;top:10px; right:10px;z-index: 7;" ></i>
                    </div>
               @endfor
                @for($i=0;$i<count($data1);$i++)
                    @php
                        //echo count($data);
                        $item = json_decode(json_encode($data1[$i]), true);
                    @endphp
                    <div class="image-card p-2" >
                        <div onclick="giveVote({{$item['id']}})" style="background-image: url('{{$item['url']}}');background-size: contain;background-position: center;background-repeat:no-repeat;border:1px solid gray;">
                            <img class="image"  src="{{$item['url']}}" style="opacity: 0"/>
                            <img id="vmid{{$item['id']}}" class="votingmark" src="{{asset('img/voting.png')}}"/> 
                        </div> 
                        <i id="dislike{{$item['id']}}" class="fa fa-heart-o like " aria-hidden="true" onclick="giveLike(0,{{$item['id']}})"></i>
                        <i id="like{{$item['id']}}" class="fa fa-heart like ok" aria-hidden="true" onclick="giveLike(1,{{$item['id']}})"></i>
                        
                        <i id="dislike1{{$item['id']}}" class="fa fa-question-circle-o" aria-hidden="true" onclick="giveLike1(0,{{$item['id']}})" style = "font-size: 32px;   color:red;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        <i id="like1{{$item['id']}}" class="fa fa-question-circle ok" aria-hidden="true" onclick="giveLike1(1,{{$item['id']}})" style = "font-size: 32px;  color:red;  position: absolute; top: 40px; left: 10px; z-index: 7;"></i>
                        
                       
                        
                        <i class="fa fa-search-plus myImg"  src="{{$item['url']}}" alt = "ddd" style="    margin-top:0px; font-size: 30px;color: red;position: absolute;top:10px; right:10px;z-index: 7;" ></i>
                    </div>
               @endfor               
                    <div id="myModal" class="modal" style="margin-top:-6px;">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01" style = "width:50%;">
                      <div id="caption"></div>
                    </div>
        </div>
           <button id="submit_btn" type="button" onclick="senddata( {{$item['c-id']}})" class="btn btn-primary btn-lg">Submit</button>
    @else
        <div style="height: 100%;display: table;width: 100%;">
            <h1 style="display: table-cell;vertical-align: middle;text-align: center;">There is nothing.</h1>
        </div>
    @endif
@stop
@section('javascript')
    <script>

        $(document).ready(function() {
            //alert("document ready occurred!");
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
            $('#vmid'+id).toggleClass('vote');
        }
        
        
        function giveLike(flag, imageid) {
            console.log(flag);
            console.log(imageid);
            flag==0?$('#like'+imageid).addClass('show'):$('#like'+imageid).removeClass('show');
            if (likearry.indexOf(imageid)<0){
                likearry.push(imageid);
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


$(".myImg").click(function() {
    modal.style.display = "block";
    var imgurl = $(this).attr('src');  
 	modalImg.src = imgurl;
 	 captionText.innerHTML = $(this).attr('alt');  
  
});

$(".close").click(function() {
     modal.style.display = "none";
  
});

 
/*var span =  $(".close")[0]; 
 
span.onclick = function() { 
  modal.style.display = "none";*/
// }
</script>
@stop

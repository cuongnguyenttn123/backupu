@extends('Layout.gpage')


@section('lib')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@stop
<script src={{asset("/row-grid.js")}}></script>
@section('style-css')
    <style>

        .c-challenge-cover {
            position: relative;
            z-index: 1;
            overflow: hidden;
            width: 100%;
            height: 750px;
            background-color: #ddd;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        .c-challenge-cover__btn, .gs-challenge-page .c-challenge-cover__btn--blue {
            position: relative;
            display: inline-block;
            width: 245px;
            margin: 0 20px;
            padding: 15px 0;
            cursor: pointer;

            text-decoration: none;
            color: #000!important;
            border: 2px solid #c27400;;
            border-radius: 8px;
            background-color: rgba(255,255,255,0.6);
            text-shadow: 0 1px 2px rgba(0,0,0,0.4);
            font-size: 22px;
            font-weight: 600;

        }

        .backgroundimage h3,h5{
            color: white;
            line-height: 35px;

        }

        section{
            min-height: 500px;

        }
        .contentcenter{
            text-align: center
        }
        .paddingtop-50{
            padding-top: 50px;
        }
        .backgroundimage{
            padding-top: 150px;
            height:400px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
            color:white;
        }

        #photos .image {
            /* Just in case there are inline attributes */
            width: auto !important;
            height: 200px !important;
            border: solid 4px grey;
            max-width: 600px;
        }
        .image-card{
            position: relative;
            flex: auto;
            max-width: 600px;
        }
        .image-card .number{
            font-size: 30px;
            color: white;
            position: absolute;
            top: 10px;
            left: 30px;
            text-shadow: 2px 2px 5px black;

        }
        .image-card .vote{
            font-size: 30px;
            color: white;
            position: absolute;
            bottom: 10px;
            right: 30px;
            text-shadow: 2px 2px 5px black;
        }
        .image-card .user{
            display: table-cell;
            vertical-align: middle;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            text-align: center;
            font-size: 30px;
            color: white;
            position: absolute;
            text-shadow: 2px 2px 5px black;
            transform: scale(0);
        }
        .image-card:hover .user {
            transform: scale(1);
            transition: transform .5s;
        }
        .challenge_title{
            position: relative;
            top:70px;
        }
        .challenge_title{
            border-radius: 8px;
            background:rgba(255,255,255,0.7);
            opacity: 1;width: 250px;height: 50px;
            margin: auto;margin-bottom: 50px;
            top:185px;
            height:75px!important;
        }
        .challenge_title h1::after {
            content: '';
            position: absolute;
            left: -15px;
            top: -15px;
            width: 280px;
            height: 105px;
            border: 1px solid #060d13;
            border-radius: 10px;
            z-index: -1;
        }
        .challenge_title h1::before {
            content: '';
            position: absolute;
            left: -10px;
            top: -10px;
            width: 270px;
            height: 95px;
            border: 5px solid #060d13;
            border-radius: 10px;
            z-index: -1;
        }
    </style>
    <!---table-->
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin:auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <style>
        * {
          box-sizing: border-box;
        }
        .menu00 {
          float:left;
          width:100%;
          text-align:center;
        }
        .menu00 a {
          padding:5px;
          margin-top:7px;
          display:block;
          width:20%;
          float: left;
          min-width:160px;
          color:black;
        }
        .menu00 a button{
            text-align: center;
            width: 100%;
            display: block;
            border: 1px solid #52bde1;
            padding: 5px;
            border-radius: 10px;
            float:left;
        }
        .main00 {
          float:left;
          width:75%;
          padding:0 20px;
        }
        .right00 {
          background:none;
          float:left;
          width:25%;
          padding:15px;
          margin-top:7px;
          text-align:center;
        }
        .bottom{
            float:left;
            width:33%;
        }
        #details p{
                font-size: 18px; 
            }
        @media only screen and (max-width:620px) {
          /* For mobile phones: */
          .backgroundimage{
            height: 200px;
          }
          .menu00, .main00, .right00 {
            width:100%;
          }
          .bottom{
              width:100%;
          }
          .menu00 a {
            padding:0px;
                margin-top: 7px;
                display: block;
                width: 20%;
                float: left;
                min-width: 75px;
                color: black;
                
            }
            .menu00 a button{
                font-size: 12px;
            }
            #details p{
                font-size: 14px; 
            }
        }
        #prize{
            display:none;
        }
        #rank{
            display:none;
        }
        #winner{
            display:none;
        }


        .imagediv{
            margin-bottom: 10px;
            margin: auto;
        }
        .imagediv .image-card {
            height: 150px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border: 1px solid lavender;
        }
        .nondisplay{
            display: none;
        }
        .imagediv span{
            position: absolute;right: 0%;bottom: 0%; margin-right: 20px;
            text-shadow: 2px 2px 5px black;
            color: white;
            font-size: 25px;
        }
        .rank-mark{
            display:table;
        }
        .rank-name{
            left:30%;
        }
        .rank-vote{
            color:white;
            top:0;
        }
        .pictures{
            padding-left:50px;
        }
        @media only screen and (max-width:620px) {
            .rank-mark{
                display:none;
            }
            .rank-name{
                left:50px;
            }
            .rank-vote{
                color:black;
                top:25px;
            }
            .pictures{
                padding-left:0;
            }
            .imagediv{
                padding:3px;
                height:100px;
            }
            .imagediv .image-card {
                height: 100px;
            }
        }        
    </style>    
@stop
@section('content')
    @php
        //echo var_dump($data);
        $c=json_decode(json_encode($data), true);
            //echo var_dump($c);
        $image=json_decode(json_encode($images), true);
                //echo var_dump($image);
        $ranks=json_decode(json_encode($rank), true);
    @endphp
    <div class="c-challenge-cover contentcenter paddingtop-50 backgroundimage " style="outline: 10px solid rgba(255,255,255,0.7);
            outline-offset: -30px;padding-top: 90px;background-image: url('{{$c['image-url']}}')">
        <div class="challenge_title" style="">
            <h1 id="submit_challenge_title"  style="padding: 5px;color: black;    height: 70px;display: table-cell;vertical-align: middle;width:250px; font-family: arial;font-size:28px;">{{$c['title']}}</h1>
        </div>
        <span id="image_gas" style="display: none">{{$c['photocount']}}</span>
        <span id="photo_gas" style="display: none">{{count($image)}}</span>

        <!--<div class="c-challenge-cover__btn" id="photo_submit_button"  onclick="onpress_submit_photos_btn()" role="button" tabindex="0">-->
        <!--    Submit photos-->
        <!--</div>-->
        <!--<a href={{asset('../challenges/voting/'.$c['id'])}} class="">-->
        <!--    <div class="c-challenge-cover__btn" ng-if="::cp.member.logged_in &amp;&amp;" ng-click="cp.vote()" role="button" tabindex="0">-->
        <!--        VOTE-->
        <!--    </div>-->
        <!--</a>-->

        <!--<a href={{url('challenges/invite/'.$c['id'])}} class="">-->
        <!--    <div class="c-challenge-cover__btn" id="challenge_invite_button"  onclick="onpress_challenge_invite_btn()" role="button" tabindex="0">-->
        <!--        INVITE-->
        <!--    </div>-->
        <!--</a>-->
        <span id="photo_submit_c_id" style="display: none">{{$c['id']}}</span>
    </div>

<div style="background:none;padding:15px;text-align:center;">

</div>

<div style="overflow:hidden;">
  <div class="menu00">
    <a data-toggle="tab" id="details-btn">
            <button type="button" class="btn "><span >Details</span>
            </button>
    </a>
    <a data-toggle="tab" id="prize-btn">
            <button type="button" class="btn "><span >Prize</span>
            </button>
    </a>
    <a data-toggle="tab" id="rank-btn">
        <button type="button" class="btn "><span >Top Photos</span>
            </button>
    </a>
    <a data-toggle="tab" id="winner-btn">
        <button type="button" class="btn "><span >Rank</span>
            </button>
    </a>    
     <a href={{url('challenges/invite/'.$c['id'])}} class="">
               
            <button type="button" class="btn "><span >Invite</span>
            </button>
    </a>
  </div>

  <div class="main00">
      <div id="details" >
        <h2>{{$c['title']}}</h2>
        <p>{{$c['description']}}</p>
      </div>
      <div id="prize">
            <div style="text-align: center"><h2 style="color: #f29620;">PRIZE</h2></div>

            <div class="row" style="width:100%;padding-top:10px; margin:auto;margin-bottom: 90px;overflow:auto;">
                <div style="overflow-x:auto;margin:auto;">
                <table style="">
                    <h2 style="text-align: center;">Contest winners</h2>
                    <tr>
                        <th>Rank</th>
                        <th>Cash Prize</th>
                        <th>Awarding(%)</th>
                        <th>Flip</th>
                        <th>Wand</th>
                        <th>Charge</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        @php
                            $price=floatval(ltrim($c['price'], "$"));
                        @endphp
                        <td>{{$price}}</td>
                        <td>100%</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{$price*0.05}}</td>
                        <td>5%</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{$price*0.03}}</td>
                        <td>3%</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>{{$price*0.02}}</td>
                        <td>2%</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>

                    </tr>
                    <tr>
                        <td>5</td>
                        <td>{{$price*0.01}}</td>
                        <td>1%</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>

                    </tr>
                    <tr>
                        <td>6~10</td>
                        <td>0</td>
                        <td>0</td>
                        <td>3</td>
                        <td>3</td>
                        <td>3</td>

                    </tr>
                    <tr>
                        <td>11~50</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>

                    </tr>
                    <tr>
                        <td>51~100</td>
                        <td>0</td>
                        <td>0</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>

                    </tr>
                </table>
                </div>
            </div>          
      </div>
      <div id="winner" class="tab-pane " style="min-height: 80%;">
            
            @for($i=0;$i<count($ranks);$i++)
                @php
                    //echo count($data);
                    $item = json_decode(json_encode($ranks[$i]), true);
                @endphp
            <div class="row" style="width: 100%;margin: auto;position: relative;margin-bottom: 20px">
                <div class="col-12" style="height: 80px">
                    <div class="rank-mark" style="z-index:6;position:absolute;height: 80px;width: 80px;left:-10px;background-color: grey;border-radius: 40px;text-align: center;">
                        <span style="color: white;font-size:30px;display: table-cell;vertical-align: middle">
                            {{$i+1}}
                        </span>
                    </div>
    
                    <div style="margin-top:25px;z-index: 5;width:100%; background-color: #3b3e80;height: 30px;border-radius: 15px;position: absolute;right: 0%">
                        <span style="position:absolute;left:10px;font-weight:bold;color:white;">{{$i+1}}.</span>
                        <span class="rank-name" style="position: absolute;color: white">
                            {{$item['name']}}
                        </span>
                        <span class="rank-vote" style="position: absolute;right: 5%;">
                            {{$item['vote_count']}} Votes
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div id='{{$item['id']}}' class="row pictures">
                        <span id="cid-{{$i}}" class="nondisplay">{{$item['c-id']}}</span>
                        <span id="uid-{{$i}}" class="nondisplay">{{$item['u-id']}}</span>
                        @switch($c['photocount'])
                            @case (1)
                            @for($j=0;$j<count($images);$j++)
                                @php
                                    $item1 = json_decode(json_encode($images[$j]), true);
                                @endphp                            
                                @if($item1['u-id'] == $item['u-id'])
                                    <div class="col-3 imagediv">
                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url('{{$item1['url']}}');">
                                            <span id="vote-{{$item['u-id']}}-0" style="">{{$item1['vote']}}</span>
                                        </div>
                                    </div>
                                @endif
                            
                            @endfor
                            @break
                            @case (2)
                            @for($j=0;$j<count($images);$j++)
                                @php
                                    $item1 = json_decode(json_encode($images[$j]), true);
                                @endphp                            
                                @if($item1['u-id'] == $item['u-id']) 
                                    <div class="col-3 imagediv">
                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url('{{$item1['url']}}');">
                                            <span id="vote-{{$item['u-id']}}-0" style="">{{$item1['vote']}}</span>
                                        </div>
                                    </div>                                
                                
                                @endif
                            @endfor                                
                            @break
                            @case (4)
                            @for($j=0;$j<count($images);$j++)
                                @php
                                    $item1 = json_decode(json_encode($images[$j]), true);
                                @endphp                            
                                @if($item1['u-id'] == $item['u-id']) 
                                    <div class="col-3 imagediv">
                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url('{{$item1['url']}}');">
                                            <span id="vote-{{$item['u-id']}}-0" style="">{{$item1['vote']}}</span>
                                        </div>
                                    </div>                                
                                @endif
                            @endfor                                
                            @break
                            @default
                            @break
                        @endswitch
                    </div>
                </div>
            </div>
            @endfor
    
        </div>  
      
        <div id="rank">
            <div id="photos" class="d-flex flex-wrap bg-light" style = "margin-bottom: 90px;">
                @for($i=0;$i<count($images);$i++)
                    @php
                        //echo count($data);
                        $item = json_decode(json_encode($images[$i]), true);
                    @endphp
                    <div class="image-card p-2" >
                        <div style="background-image: url('{{$item['url']}}');background-size: cover;background-position: center;width: 100%">
                            <img class="image"  src="{{$item['url']}}" style="opacity: 0"/>
                            {{--<img id="vmid{{$item['id']}}" class="votingmark" src="{{asset('img/voting.png')}}"/>--}}
                        </div>

                        <span class="number" aria-hidden="true" >#{{$i+1}}</span>
                        <span class="vote" aria-hidden="true" ><i class="fas fa-vote-yea"></i>{{$item['vote']}}</span>
                        <div class="user" aria-hidden="true" >
                            <div style="margin: auto;display: table;height: 100%;">
                                <div style="display: table-cell;vertical-align: middle">{{$item['name']}}</div>
                            </div>
                        </div>

                    </div>
                @endfor
            </div>          
      </div>
  </div>
  
  <div class="right00">
        <img  alt="Avatar" class="image" style="width: 98px;height: 96px;border-radius: 100%;margin: auto;margin-bottom:" src="{{$c['image-url']}}">
        <h5 style="color: black;margin-top:10px;font-size:25px;">{{$c['s_name']}}</h5>
  </div>
</div>

<div style="background:none;text-align:center;padding:10px;margin-top:7px;">
    <div class="row">
        <div class="bottom" style="background:black;opacity:0.8;height:auto;border-right:1px solid white;border-bottom:1px solid white;">
            <div  style = "width:100%;margin-left:0px; padding:10px; display: inline-block;adding: 0;vertical-align: middle;white-space: nowrap;color: white;font-weight: 500; font-size:25px;">
                {{$c['votes']}} <span style="font-size:15px;">VOTES</span></div>            
        </div>
        <div class="bottom" style="background:black;opacity:0.8;height:auto;border-right:1px solid white;border-bottom:1px solid white;">
          <div   style = " width:100%;margin-left:0px; padding:10px;  display: inline-block;adding: 0;vertical-align: middle;white-space: nowrap;color: white;font-weight: 500; font-size:25px;border-bottom:none;">
                <span id="period">

                                @php
                                    $create_at_difference=Carbon\Carbon::now()->diffInSeconds($c['start-time']);
                                    $diff_in_seconds = $c['timeline']*60*60-$create_at_difference;
                                    echo $diff_in_seconds;
                                    $diff_in_hour =floor( $diff_in_seconds/3600);
                                    echo $diff_in_hour.gmdate(":i:s", $diff_in_seconds);
                                    $c['timeline'];
                                @endphp
                            </span>
                <span id="time" style="display: none">{{$diff_in_seconds}}</span>
            </div>            
        </div>
        <div class="bottom" style="background:black;opacity:0.8;height:auto;">
                <div   style = " width:100%;margin-left:0px; padding:10px; display: inline-block;adding: 0;vertical-align: middle;white-space: nowrap;color: white;font-weight: 500; font-size:25px;">
                {{$c['price']}} <span style="font-size:20px;letter-spacing:-1px;">Cash Prize</span></div>
        </div>
    </div>
</div>


@stop
@section('javascript')
    <script>
        $(document).ready(function() {
        $('#details-btn').click(function(){
            $('#details').css('display','block');
            $('#prize').css('display','none');
            $('#rank').css('display','none');
            $('#winner').css('display','none');
        }); 
        $('#prize-btn').click(function(){
            $('#prize').css('display','block');
            $('#details').css('display','none');
            $('#rank').css('display','none');
            $('#winner').css('display','none');
        }); 
        $('#rank-btn').click(function(){
            $('#rank').css('display','block');
            $('#prize').css('display','none');
            $('#details').css('display','none');
            $('#winner').css('display','none');
        }); 
        $('#winner-btn').click(function(){
            $('#winner').css('display','block');
            $('#prize').css('display','none');
            $('#details').css('display','none');
            $('#rank').css('display','none');
        });        

            // document.getElementById('submit_btn').style.display = "none";
            // var  img_gas= $('#image_gas').text();
            // //   alert(cid);
            // var  cid= $('#photo_submit_c_id').text();
            // var uid=getCookie('id');
            // //console.log(cid);
            // //console.log(i);

            // $.ajax({
            //     url: '{{url('/image/get')}}',
            //     type: 'post',
            //     data: { cid: cid, uid:uid} ,
            //     beforeSend: function (request) {
            //         return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            //     },
            //     success: function(response){
            //         var obj = JSON.parse(response);
            //         var images=obj.data;
            //         console.log(images.length);
            //         if(img_gas === images.length.toString())
            //             $('#photo_submit_button').css('display','none');

            //     },
            //     error: function (response) {
            //         alert('error');
            //     }
            // });


        });

        function onpress_submit_photos_btn() {
            var  cid= $('#photo_submit_c_id').text();
            var uid=getCookie('id');
            //console.log(cid);
            //console.log(i);

            $.ajax({
                url: '{{url('/image/get')}}',
                type: 'post',
                data: { cid: cid, uid:uid} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
                    var images=obj.data;
                    console.log(images.length);
                    switch (images.length) {
                        case 1:
                            $('#submit_imgdiv1').css('display','none');
                            $('#submit_imgdiv2').css('display','none');
                            $('#submit_imgdiv3').css('display','none');
                            break;
                        case 2:
                            $('#submit_imgdiv2').css('display','none');
                            $('#submit_imgdiv3').css('display','none');

                            break;
                        case 4:
                            break;

                    }
                    // alert(images.length)
                    for (j=0;j<images.length;j++){
                        $('#submit_img'+j).attr("src",images[j]['url']);

                    }



                },
                error: function (response) {
                    alert('error');
                }
            });


            $('#submit_continue_dlg #join_challenge_description').text($('#submit_challege_description').text());

            $('#submit_continue_dlg #join_challenge_title').text($('#submit_challenge_title').text());
            $('#submit_continue_dlg #challenge_id').text($('#photo_submit_c_id').text());
            var userid=getCookie('id');
            $('#submit_continue_dlg').modal('show');




        }

        //----------------------------------------------------------------------
        var imageLoader = document.getElementById('filePhoto_submit');
        imageLoader.addEventListener('change', handleImage, false);

        function handleImage(e) {
            var reader = new FileReader();
            reader.onload = function (event) {

                $('.uploader_submit img').attr('src',event.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        }

        //    -------------Image_upload_part-------------------------------------
        $('#photo_submit').click(function(){
            var bg = $('#filePhoto_submit').val().match(/[-_\w]+[.][\w]+$/i)[0];
            var uid=getCookie('id');
            var  cid= $('#photo_submit_c_id').text();

            //      var iid= $('#imageid-'+$('#index').text()+'-'+$('#s-cid').text()).text();
            //alert(iid);
            if(!bg  ) {
                alert("Input your information correctly");
                return;
            }
            var  data = new FormData();
            data.append('image', $("#filePhoto_submit")[0].files[0]);
            data.append('uid', uid);
            data.append('cid', cid);
            data.append('iid', '0');
            var request = $.ajax({
                type: "POST",
                url: '{{url('/image/submit')}}',
                data:data ,
                processData: false, // high importance!
                contentType:false ,
                cache: false,
                async:true,
                enctype:'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    console.log(response);
                    var obj = JSON.parse(response);
                    // alert(obj.message);
                    $('#photo_submit_dlg').modal('toggle');
                    $('#iid-'+$('#index').text()+'-'+$('#s-cid').text()).attr('src',obj.data['url']);
                    $('#flip').text(Number($('#flip').text())-1);
                    //console.log(response);
                    //window.location.replace('./challenges/my');
                },
                error: function(response){

                    console.log(response);
                    alert('error');
                }
            });
            request.done(function(data) {
                // your success code here
            });
            request.fail(function(jqXHR, textStatus) {
                // your failure code here
            });

        });
        //------------------------submit_boost_image----------onpress_unlock_boost-------------------------------------


        $('#challenges_submit_photo_continue').click(function(){
            //  $('#index').text(id);

            $('#submit_continue_dlg').modal('hide');
            $('#photo_submit_dlg').modal('toggle');
        });
    </script>
    <script>
        var seconds = 0;

        function incrementSeconds() {
            seconds += 1;
            //console.log(i);
            var totaltime=document.getElementById('time').innerText;
            var currentperiod=totaltime-seconds;
            var h=Math.floor(currentperiod/60/60);
            var m=Math.floor((currentperiod%60)/60);
            var s=currentperiod%60
            var m=Math.floor((currentperiod/60)%60);
            document.getElementById('period').innerText =h+':'+m+':'+s;

        }
        setInterval(incrementSeconds, 1000);
    </script>
    <script>
        // $(document).ready(function() {
        //     var count='{{count($ranks)}}';
        //     for (var i=0;i<count;i++){
        //         var cid=$('#cid-'+i).text();
        //         var uid=$('#uid-'+i).text();
        //         $.ajax({
        //             url: '{{url('/image/get')}}',
        //             type: 'post',
        //             data: { cid: cid, uid:uid} ,
        //             beforeSend: function (request) {
        //                 return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        //             },
        //             success: function(response){
        //                 var obj = JSON.parse(response);
        //                 //alert(obj.message);
        //                 var images=obj.data;
        //                 console.log(obj);
        //                 var number=0;
        //                 for (var j=0;j<images.length;j++){
        //                     $('#p-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j]['url'])+')';
        //                     $('#vote-'+images[j]['u-id']+'-'+j).text(images[j]['vote']);
        //                     console.log('#p-'+images[j]['u-id']+'-'+j);
        //                 }
        //                 if(images.length>0)
        //                     $('#vote'+images[0]['c-id']).text(number);

        //             },
        //             error: function (response) {
        //                 console.log(response);
        //             }

        //         });
        //         //------------------------------------Disply Exposure-----------------------------------------------------

        //         //-----------------------------------------------------------------------------------------------------------------
        //     }

        // });



        //----------------------------------------------------------------------

    </script>    
@stop
@include ('Modal/photo_submit')
@include ('Modal/swap_dlg')
@include ('Modal/submit_dlg')

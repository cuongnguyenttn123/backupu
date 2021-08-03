@extends('Layout.gpage')
@include ('Modal/swap_dlg')
@include ('Modal/upload_image_com')
@include ('Modal/flip_dlg')
@include ('Modal/charge_dlg')
@include ('Modal/boost_select_pic')
@include ('Modal/boost_dlg')
@include ('Modal/photo_submit')
@include ('Modal/submit_dlg')
<link href="{{ asset('../resources/css/animation.css') }}" rel="stylesheet">
<!--@include ('Modal/alert_message_dlg')-->
@section('lib')


@stop
@section('style-css')

    <style>
        .animate {
            -webkit-animation: animatezoom 1.5s;
            animation: animatezoom 1.5s
        }
        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
        .animateout {
            -webkit-animation: animatezoomout 1s;
            animation: animatezoomout 1s
        }
        @-webkit-keyframes animatezoomout {
            from {-webkit-transform: scale(1)}
            to {-webkit-transform: scale(0)}
        }

        @keyframes animatezoomout {
            from {transform: scale(1)}
            to {transform: scale(0)}
        }
        .modal-content{
            margin: auto;
            padding: 20px;
        }
        .userimg{
            position: absolute;
            top: -18px;
            right: -46px;
            width: 130px;
            padding: 25px 0 5px;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            text-align: center;
            letter-spacing: -.3px;
            color: #fff;
            background-color: #222;
            font-size: 14.1px;
            font-weight: 300;
            line-height: 1.2;
        }
        .challenge-card{
            overflow: hidden;
            width: 100%;
            height: 100%;
            min-width: 220px;
            max-width: 1000px;
            min-height: 170px;
            /*background-image: url("https://photos.gurushots.com/unsafe/500x0/ba7adc786e06f16a98b2b817295e30de/3_63110d706993e43f06a61525585c3307.jpg");*/
            /*padding-right: 20px;*/
            padding: 0px;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-size: cover;
            /*border-right: solid 10px  #e9ecef;*/
        }
        .challenge-btn{
            opacity: 1;
            text-align: center;
            margin-top: 10px;

            /*background-color: rgba(255,255,255,.5);*/
        }

        .challenge-card:hover .challenge-btn{
            opacity: 1;
        }
        .challenge-title{
            /*margin-top: -37px;*/
            height:40px!important;
            text-align:center;
            margin-bottom:-47px;
            /*text-align: center;*/
            font-size: 25px;
            color: #212529;
            font-style: oblique;
        }
        .challenge-item{
            position: relative;
            background-color: #e9ecef;
            /*max-width: 90%;*/
            max-width:100%;
            margin-top: 60px;
            margin-bottom: 20px;
            margin-right: auto;
            margin-left: auto;
            transition: box-shadow .3s ease-in-out, -webkit-box-shadow .3s ease-in-out;

        }
        .challenge-item:hover{
            /*outline: solid 10px rgba(0,0,0,.3);*/
            /*background-color: red;*/
            box-shadow: 0 0 0 10px rgba(151,151,151,0.46);
        }
        /*-webkit-animation: animatezoom 1.5s;*/
        /*animation: animatezoom 1.5s;*/
        /*}*/
        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }
        .small-img{
            background-color: white;
            margin-top: 10px;
            margin-bottom: 10px;
            height: 160px;
            /*margin-right: 20px!important;*/

        }
        .small-img .row div{
            min-width: 40px;
            position: relative;
            padding-left: 5px;
            padding-right: 5px;

            padding-bottom: 5px;
            margin-top: 0px;
        }
        .small-img .row div img{
            min-width: 50px;
            position: relative;
            /* padding: 5px; */
            margin-top: 11px;
            border-radius: 2px;
            min-height: 50px;
            width: 100%;
            height: 120px;

        }
        .small-img span{
            position: absolute;
            color: white;
            bottom: 10%;
            left: 10%;
            text-shadow: 0px 1px 19px #1C6EA4;
            /* margin-left: 10px; */
            font-weight: bold;
            font-size: 20px;
        }
        .c-challenges-item__v-line {
            display: inline-block;
            -ms-flex-item-align: center;
            align-self: center;
            width: 0;
            height: calc(140px - 2 * 10px);
            vertical-align: middle;
            border-left: 1px solid white;
            line-height: 1;
            margin: 15px;
        }
        .btn-light{
            border:solid 1px #218ccc;
            height: 25px;
            padding: 0;
            width: 70px;

        }
        .e-bound{
            padding-top: 8px;
            text-align: center;
        }
        * { box-sizing: border-box; }
        .chart{
            /*width: 50px;*/
            max-width:50px;
            height: 6px;
            margin-top: 3px;
            margin-left: auto;
            margin-right: auto;
        }
        .red{
            background-color: red;
            border: solid 1px red;
        }
        .redborder{
            border: solid 2px red;
        }
        .yellow{
            background-color: yellow;
        }
        .yellowborder{
            border: solid 2px yellow;
        }
        .green{
            background-color: green;
        }
        .greenborder{
            border: solid 2px green;
        }
        .chart-back{
            padding-left: 8px;
        }
        .e-bound .row{
            /*padding-right: 10px;*/
            /*padding-bottom: 10px;*/
        }
        .e-bound .icon{
            padding-bottom: 10px;
            width: 100px;

        }
        .e-bound .icon img{
            position: absolute;
            bottom: 19%;
            width: 40px;

        }
        .e-bound .icon span{
            position: absolute;
            bottom: 0%;
            width: 40px;
            font-weight:bold;
            font-size:17px;

        }
        .last-item .item{
            background-color: white;
            height: 160px;
            margin-top: 10px;
            /*margin-bottom: 5px;*/
            /*border-right: solid 5px  #e9ecef;*/
            text-align: center;
            padding-top: 15px;
        }
        .last-item .vicon{
            position: relative;
            left: 0;
            margin: auto ;
            background-image: url(http://ajronitesting.com/PixPays/wp-content/themes/PixPays/img/badge.png);
            height: 78px;
            background-position: center;
            background-repeat: no-repeat;
        }
        .last-item .vicon span {
            z-index: 8 !important;
            color: #fff;
            position: relative;
            top: 30px;
            font-weight: bold;
            font-size: 10px;
            left: 0px;
        }
        .last-item button {
            display: inline-block !important;
            min-width: 0;
            padding: 2px 5px;
            vertical-align: bottom;
            color: #969696;
            border: solid 1px #d4dedf;
            background-color: #fff;
            font-size: 10px;
            border-radius: 10px;
            margin-top: 10px;
        }
        .last-item h5{
            font-size: 15px;
        }
        .last-item .points{
            height: 80px;
            width: 80px;
            text-align: center;
            /*border: 2px solid;*/
            line-height: 70px;
            border-radius: 50%;
            border: double 6px black;
            margin: 0 auto;
            position: relative;
        }
        .shair-link{
            margin-top: 5px;
        }
        .shair-link a{
            color: black;
            font-size: 14px;
        }
        .nvotes{

            margin: 0 auto;
        }
        .nvotes span{
            font-size: 42px;
        }

        .rank{
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;

        }
        .rank .active{
            background-color: #333333;
        }
        .rank span{
            width: 80px;
            height: 80px;
            display: inline-block;
            /*margin-left: 15px;*/
            /*margin-right: 15px;*/
            margin: auto;
            border: 1px solid #F29620;
            border-radius: 50%;
            font-size: 26px;
            line-height: 80px;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            color: #F29620;
            position: relative;
        }
        .rank span::after{
            content: '';
            position: absolute;
            left: 4px;
            top: 4px;
            width: 70px;
            height: 70px;
            border: 5px solid #F29620;
            border-radius: 50%;
            z-index: -1;
        }
        #buy-rank{
            max-width: 1500px;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-right: auto;
            margin-left: auto;

        }
        #buy-rank img{
            max-height: 100px;
            z-index: 2;
            position: relative;
        }
        #buy-rank .outdiv{
            height: 64px;
            width: 184px;
            clip-path: polygon(100% 0, 86% 100%, 0 100%, 0 0);
            background-color: #F29620;
            margin-left: -20px;
            z-index: -1;
            font-size: 24px;
            min-width: 150px;
            display: inline-block;
            text-align: center;
            padding-top: 2px;
        }
        #buy-rank .outdiv span{
            height: 60px;
            width: 180px;
            clip-path: polygon(100% 0, 86% 100%, 0 100%, 0 0);
            background-color: #333333;
            color: #fff;
            z-index: -1;
            vertical-align: middle;
            font-size: 24px;
            min-width: 150px;
            display: inline-block;
            text-align: center;
            line-height: 60px;
        }
        #buy-rank div{
            display: inline-block;
            /*margin-right: 20px;*/
            text-align: center;
        }
        .challenge-footer{
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #fff;
            background-color: rgba(241, 142, 17,0.81);
            opacity: 0.9;
            margin: 0px;

        }
        .footer-title div{
            text-align: center;


        }
        .footer-title .top-title{
            font-weight: bold;
            font-size: large;
            color:black;

        }
        .footer-title .bottom-title{
            color: rgba(0,0,0,.8);
        }
        .challenge-footer .after ::after{
            position: absolute;
            top: 50%;
            right: 0;
            display: block;
            width: 0;
            height: 80%;
            content: '';
            -webkit-transform: translate3d(0, -50%, 0);
            transform: translate3d(0, -50%, 0);
            border-right: 1px solid rgba(255,255,255,0.76);
        }
        .time-title{
            height: 51px;
            display: table-cell;
            vertical-align: middle;
            color:black;
            text-align: center;

        }
        .grid1{
            position: relative;
        }
        /*.grid4{*/
        /*    margin-left: 30px!important;*/
        /*}*/
        @media screen and (min-width: 0px) {
            .grid1 {
                width: 100%;
                height: 300px;
            }

            .grid2 {
                width: 95%;
                margin: auto;
                margin-top:15px;
            }
            .grid3 {
                width: 100%;
            }
            .grid4 {
                width: 90%;
                margin: auto;
                margin-bottom:10px;
            }
        }
        @media screen and (min-width: 766px) {
            .grid1 {
                height: 250px;
                width: 100%;
            }
            .grid2 {
                /*width: 40%;*/
                width: 45%;
                /*margin-left: 17px;*/
                margin-left: 31px;
            }
            .grid3 {
                width: 50%;
            }
            .grid4 {
                width: 91%;
                margin-left:auto ;
                margin-right: auto;
                margin-bottom: 10px;
            }
        }
        @media screen and (min-width: 987px) {
            .grid1 {
                width: 50%;
                height: 170px;
            }
            .grid2 {
                width: 46%;
                /*border-right: solid 5px #e9ecef;*/
                margin:auto;

            }
            .grid3 {
                width: 50%;
            }
            .grid4 {
                width: 46%;
                margin-bottom: 10px;
            }
        }

        @media screen and (min-width: 1240px) {
            .grid1 {
                width: 20%;
                height: 180px;
            }
            .grid2 {
                width: 46%;
                /*margin-left: 0px;*/
                margin:auto;
            }

            .grid4 {
                width: 33%;

            }
        }
        .h9{
            color:#218ccc!important;
        }
        .grid4 .row{
            margin-right:0;
            margin-left:0;
        }
        @media (min-width: 1200px){
            .body_container {
                max-width: 1340px;
            }
        }


    </style>


@stop
@section('content')
    @php
        //echo var_dump($data);
        $c=json_decode(json_encode($data), true);
            //echo var_dump($c);
        $pix = json_decode(json_encode($userpix), true);
        $flag=$pix['rank'];
    @endphp
    <div class="rank">
        <div class="row">
            @for($i=1;$i<=9;$i++)
                @if($i==9)
                    <span class="{{$i==$flag?'active':''}}">Pro</span>
                @else
                    <span class="{{$i==$flag?'active':''}}">{{$i}}</span>
                @endif
            @endfor
        </div>
    </div>
    @php
        

    @endphp
 
    <div id="buy-rank" class="row" title="Click and You can get Flip, Charge and Wand more many" style = " ">
        <div class = "col-md-3 col-sm-12 col-xs -3">
            <div data-modal-trigger="fcwtab" class="">
                <img src="http://ajronitesting.com/PixPays/wp-content/themes/PixPays/img/charge.png" alt="" >
                <img src="{{asset('img/flip_my.gif')}}" alt="" style = "    margin-left: -92px;    z-index: 1000;    width: 70px;    height: 87px;    border-radius: 50px;">
                <div class="outdiv">
                    <span>
                            <b id="flip">{{$pix['Flip']}}</b>
                            Flip
                        </span>
                </div>
            </div>
        </div>
        <div class = "col-md-3 col-sm-12 col-xs -3">
            <div data-modal-trigger="fcwtab" class="">
                <img src="http://ajronitesting.com/PixPays/wp-content/themes/PixPays/img/charge.png" alt="" >       
                <img src="{{asset('img/charge_my.gif')}}" alt="" style = "    margin-left: -92px;    z-index: 1000;    width: 70px;    height: 87px;    border-radius: 50px;">
                <div class="outdiv" style="margin-left:0.2px;"><span><b id="charge">{{$pix['Charge']}}</b> Charge</span></div>
            </div>
        </div>
        <div class = "col-md-3 col-sm-12 col-xs -3">
            <div data-modal-trigger="fcwtab" class="trigger">
                <img src="http://ajronitesting.com/PixPays/wp-content/themes/PixPays/img/charge.png" alt="" >
                <img src="{{asset('img/wand_my.gif')}}" alt="" style = "    margin-left: -92px;    z-index: 1000;    width: 70px;    height: 87px;    border-radius: 50px;">
                <div class="outdiv" style="margin-left:0.2px;"><span><b id="wand">{{$pix['Wand']}}</b> Wand</span></div>
            </div>
        </div>
        <div class = "col-md-3 col-sm-12 col-xs -3">
            <div class = "pix" style = "float:right;">  
                <img src = "{{asset('img/pix1.png')}}" style = "width: 200px;    height: 100px; "> 
                <div style="    font-size: 30px;   margin-left: -8px;     color: #000;    position: absolute;    top: 11%;      z-index: 100;">{{$pix['pixpoint']}}</div>
                                
            </div>
        </div>
     
    </div>
    

    @for($j=0;$j<count($data);$j++)
        @php
            //echo count($data);
            $item = json_decode(json_encode($data[$j]), true);
        @endphp
        <div class="challenge-title grid1" id="challenge-title">
            {{$item['title']}}
        </div>
        <span id="chall-description"  style = "display:none">{{$item['description']}}</span>
        <div class="row challenge-item"  style="margin-bottom: 50px;padding:0">
            <div class="grid1" style="padding:0;">
                <a href="{{asset('../challenges/result/'.$item['id'])}}">
                    <div class="challenge-card col-lg-3 col-sm-6" style="background-image: url('{{$item['image-url']}}');margin-bottom: 0px!important;">
                        <div class="challenge-footer row">
                            <div class="footer-title after col-12" style="padding: 0;margin: 0; display: table!important;">
                                <div class="top-title">{{$item['price']}}</div>
                                <div class="bottom-title">Ended</div>
                            </div>

                        </div>
                        <span id="cid-{{$j}}" style="display: none;">{{$item['id']}}</span>
                    </div>
                </a>
            </div>


            <div class="grid2 small-img" style="">
                <div class="row " style="margin: 0;padding: 0 4px;height: 100%;">
                    @switch($item['photocount'])
                        @case (1)
                        <div class="row" style="text-align: center;width: 100%;padding: 0px;">
                            <div class="col-12" style="text-align: center;margin: auto">
                                <div class="" style="text-align: center;width: 130px;margin: auto">
                                    <img id="iid-0-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                                    <span id="voteid-0-{{$item['id']}}"></span>
                                    <span id="imageid-0-{{$item['id']}}" style="display: none"></span>
                                </div>
                            </div>
                        </div>

                        @break
                        @case (2)
                        <div class=" row" style="text-align: center;width: 100%;padding: 0px;">
                            <div class="col-6" style="text-align: center;margin: auto">
                                <div id="iid-0-{{$item['id']}}-div" style="width: 137px;margin: auto;">
                                    <img id="iid-0-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                                    <span id="voteid-0-{{$item['id']}}"></span>
                                    <span id="imageid-0-{{$item['id']}}" style="display: none"></span>
                                </div>

                            </div>
                            <div class="col-6" style="text-align: center;margin: auto">
                                <div id="iid-1-{{$item['id']}}-div" style="width: 137px;margin: auto;">
                                    <img id="iid-1-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                                    <span id="voteid-1-{{$item['id']}}"></span>
                                    <span id="imageid-1-{{$item['id']}}" style="display: none"></span>
                                </div>
                            </div>
                        </div>

                        @break
                        @case (4)
                        <div class="col-3" style="width: 50px;margin: auto;">
                            <img id="iid-0-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                            <span id="voteid-0-{{$item['id']}}"></span>
                            <span id="imageid-0-{{$item['id']}}" style="display: none"></span>
                        </div>
                        <div class="col-3" style="width: 50px;margin: auto;">
                            <img id="iid-1-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                            <span id="voteid-1-{{$item['id']}}"></span>
                            <span id="imageid-1-{{$item['id']}}" style="display: none"></span>
                        </div>
                        <div class="col-3" style="width: 50px;margin: auto;">
                            <img id="iid-2-{{$item['id']}}" src="{{asset('img/questionmark.jpg')}}">
                            <span id="voteid-2-{{$item['id']}}"></span>
                            <span id="imageid-2-{{$item['id']}}" style="display: none"></span>
                        </div>
                        <div class="col-3" style="width: 50px;margin: auto;">
                            <img id="iid-3-{{$item['id']}}" src={{asset('img/questionmark.jpg')}}>
                            <span id="voteid-3-{{$item['id']}}"></span>
                            <span id="imageid-3-{{$item['id']}}" style="display: none"></span>
                        </div>
                        @break
                        @default
                        @break
                    @endswitch

                </div>

            </div> 

            
            <div class="grid4 " style = "    background-color: white;width:200px;    height: 150px;">
                <div class="last-item" style = "">
                    <div class="" style="text-align:center;">
                        <h5 style="margin-top:35px;">
                            VOTES
                        </h5>
                        <div class="nvotes">
                            <span id="vote{{$item['id']}}" style="font-size: 30px; font-weight: bold; margin-top:30px;">0</span></i>
                        </div>
                        <div class="shair-link">
                            <span></span>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    @endfor




@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            //alert("document ready occurred!");
            var count='{{count($data)}}';
            var uid=getCookie('id');
            for (var i=0;i<count;i++){
                var cid=$('#cid-'+i).text();
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
                        //alert(obj.message);
                        var images=obj.data;
                        //console.log(typeof images.length);
                        var number=0;
                        for (j=0;j<images.length;j++){
                            //alert(j);
                            $('#iid-'+j+'-'+images[j]['c-id']).attr("src",images[j]['url']);
                            $('#iid-'+j+'-'+images[j]['c-id']+'div').css("background-image",images[j]['url']);
                            $('#voteid-'+j+'-'+images[j]['c-id']).text(images[j]['vote']);
                            $('#imageid-'+j+'-'+images[j]['c-id']).text(images[j]['id']);
                            number+=parseInt(images[j]['vote']);
                            //!!
                            //console.log(images[j]['url']);
                            //console.log('#iid-'+j+'-'+images[j]['c-id']);
                        }
                        if(images.length>0)
                            $('#vote'+images[0]['c-id']).text(number);

                    },
                    error: function (response) {
                        alert('error');
                    }

                });
                //------------------------------------Disply Exposure-----------------------------------------------------
                $.ajax({
                    url: '{{url('exposure/get')}}',
                    type: 'post',
                    data: { cid: cid, uid:uid} ,
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        var obj = JSON.parse(response);
                        //alert(obj.message);
                        //console.log(obj);
                        // var images=obj.data;
                        //console.log(obj['data']['exposure']);
                        var count=obj['data']['exposure'];
                        for (var jj=0;jj<=count;jj++){
                            // console.log(jj);
                            if((14-jj)<4)
                                $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','green');

                            else if((14-jj)<9)
                                $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','yellow');
                            else
                                $('#chart'+obj['data']['cid']+(14-jj)).css('background-color','red');
                        }

                    },
                    error: function (response) {
                        console.log(response);
                        alert('error');
                    }
                });
                //-----------------------------------------------------------------------------------------------------------------
            }
            $('#preloader').css('display','none');
        });
        $('#buy-rank').click(function () {
            $('#flip_dlg').modal('show');
        });
        //-----------------------------
        function  charge(number) {
            var  cid= $('#charge_cid').text();

            var uid=getCookie('id');

            alert(cid);
            var request = $.ajax({

                url: '{{url('/challenges/charge')}}',
                type: 'post',
                data: { cid:cid,uid:uid,type:number} ,

                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    var obj = JSON.parse(response);
                    //alert(obj.message);
                    $('#charge_dlg').modal('toggle');
                    //console.log(obj);

                    window.location.replace('{{url('challenges/my')}}');

                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });

        }
        //-----------------------------
        function onpress_swap(id,photocount) {
            $('#swapBtn #upload_challenge_id').text(id);
            var userid=getCookie('id');
            //alert(id);

            switch (photocount) {
                case "1":
                    $('#imgdiv1').css('display','none');
                    $('#imgdiv2').css('display','none');
                    $('#imgdiv3').css('display','none');

                    break;
                case "2":
                    $('#imgdiv2').css('display','none');
                    $('#imgdiv3').css('display','none');

                    break;
                case "4":
                    break;

            }
            $('#s-cid').text(id);
            $("#img0").attr("src",$('#iid-0-'+id).prop('src'));
            $("#img1").attr("src",$('#iid-1-'+id).prop('src'));
            $("#img2").attr("src",$('#iid-2-'+id).prop('src'));
            $("#img3").attr("src",$('#iid-3-'+id).prop('src'));
            $('#swapBtn').modal('show');
        }
        //-----------------------Boost function--------------------------------------------------------
        function onpress_boost(id,photocount) {
            $('#boost_select_pic_dlg #boost_challenge_id').text(id);
            var userid=getCookie('id');
            //alert(id);

            switch (photocount) {
                case "1":
                    $('#boost_imgdiv1').css('display','none');
                    $('#boost_imgdiv2').css('display','none');
                    $('#boost_imgdiv3').css('display','none');

                    break;
                case "2":
                    $('#boost_imgdiv2').css('display','none');
                    $('#boost_imgdiv3').css('display','none');

                    break;
                case "4":
                    break;

            }
            $('#s-cid').text(id);
            $("#boost_img0").attr("src",$('#iid-0-'+id).prop('src'));
            $("#boost_img1").attr("src",$('#iid-1-'+id).prop('src'));
            $("#boost_img2").attr("src",$('#iid-2-'+id).prop('src'));
            $("#boost_img3").attr("src",$('#iid-3-'+id).prop('src'));
            $('#boost_select_pic_dlg').modal('show');


        }
        //---------------------------------------------------------------------------------------------
        function boost_Image(id){
            $('#boost_select_pic_dlg').modal('hide');
            var iid= $('#imageid-'+id+'-'+$('#boost_challenge_id').text()).text();
            //alert(iid);
            $('#boost_dlg #boost_image_id').text(iid);

            $('#boost_dlg').modal('toggle');

        }

        //---------------------------------------------------------------------------------------------
        var image_id  = "";
        $('.small-img').on('click','img', function(event)
        {
            //alert('expression');
            image_id = this.id;
            console.log(image_id);
            image_id_arr = image_id.split('-');
            console.log(image_id_arr);
            //iid-0-49
            var id = $('#imageid-'+image_id_arr[1]+'-' + image_id_arr[2]).text();
            console.log(id);

            if(id != ''){
                $('#s-cid').text(image_id_arr[2]);
                $('#imagepreview').attr('src',$('#'+image_id).prop('src'));
                //$('.modal .modal-dialog').addClass('modal-dialog modal-dialog-centered  shrinkIn  animated');
                $('#upload_dlg').modal('show');
                $('#upload_dlg #upload_image_id').text(id);
            }else{

                $('#submit_continue_dlg #join_challenge_description').text($('#chall-description').text());
                $('#submit_continue_dlg #join_challenge_title').text($('#challenge-title').text());
                $('#submit_continue_dlg #challenge_id').text(image_id_arr[2]);

                // var userid=getCookie('id');
                // $('.modal .modal-dialog').addClass('modal-dialog modal-dialog-centered  bounceIn  animated');
                // $('').attr('class', 'modal fade bounceRightIn');
                $('#submit_continue_dlg').modal('show');
            }


        });
        $('#challenges_submit_photo_continue').click(function(){
            //  $('#index').text(id);

            $('#submit_continue_dlg').modal('hide');
            $('#photo_submit_dlg').modal('toggle');
        });

        var imageLoader = document.getElementById('filePhoto_submit');
        imageLoader.addEventListener('change', handleImage_submit, false);

        function handleImage_submit(e) {
            var reader = new FileReader();
            reader.onload = function (event) {

                $('#imagepreview_submit').attr('src',event.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        }
        $('#photo_submit').click(function(){
            /////////////////////////////////////
            //alert('phhoto');
            $('#photo_submit_dlg').modal('toggle');
            $('#preloader').css('display','block');
            var uid=getCookie('id');
            var  cid= $('#submit_continue_dlg #challenge_id').text();

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

                    $('#iid-'+$('#index').text()+'-'+$('#s-cid').text()).attr('src',obj.data['url']);
                    $('#flip').text(Number($('#flip').text())-1);
                    $('#alertmessage').attr('value', obj.message);
                    $('#alert_message_dlg').attr('class', 'modal fade animate');
                    $('#alert_message_dlg').modal('show');
                    setTimeout(function() {
                        $('#alert_message_dlg').attr('class', 'modal fade animateout');
                        $('#alert_message_dlg').modal('toggle');
                        window.location.replace('./my');
                    }, 1000);
                    $('#preloader').css('display','none')
                    //$('#preloader').css('display','block');
                    //console.log(response);
                    //window.location.replace('./challenges/my');
                },
                error: function(response){
                    $('#preloader').css('display','none')
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
        //---------------------------------------------------------------------------------------------

        function SwapImage(id) {
            //alert(id);
            $('#index').text(id);
            $('#imagepreview').attr('src',$('#iid-'+$('#index').text()+'-'+$('#s-cid').text()).prop('src'));
            $('#swapBtn').modal('hide');
            $('#upload_dlg').modal('toggle');

        }
        function onpress_charge(cid) {
            $('#charge_dlg').modal('toggle');
            var userid=getCookie('id');
            $('#uid').text(userid);
            $('#charge_cid').text(cid);
        }
        var imageLoader = document.getElementById('filePhoto');
        imageLoader.addEventListener('change', handleImage, false);

        function handleImage(e) {
            var reader = new FileReader();
            reader.onload = function (event) {

                $('.uploader img').attr('src',event.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        }

        // function submit_image(){
        //     var  cid= $('#photo_submit_c_id').text();
        //     var uid=getCookie('id');

        //     $('#submit_continue_dlg #join_challenge_description').text($('#challenge-description').val());

        //     $('#submit_continue_dlg #join_challenge_title').text($('#challenge-title').text());
        //     $('#submit_continue_dlg #challenge_id').text($('#photo_submit_c_id').text());
        //     // var userid=getCookie('id');
        //     $('#submit_continue_dlg').modal('show');


        // }

        $('#submit_upload_image').click(function(){
            //alert('submit');
            $('#upload_dlg').modal('toggle');
            $('#preloader').css('display','block')
            if(!$('#filePhoto').val()) {
                alert("Input your information correctly");
                $('#preloader').css('display','none')
                return;
            }
            var bg = $('#filePhoto').val().match(/[-_\w]+[.][\w]+$/i)[0];
            var uid=getCookie('id');
            //$('#s-cid').text(id);
            var  cid= $('#s-cid').text();
            var iid=$('#upload_dlg #upload_image_id').text();
            alert(iid);

            var  data = new FormData();
            data.append('image', $("#filePhoto")[0].files[0]);
            data.append('uid', uid);
            data.append('cid', cid);
            data.append('iid', iid);
            var request = $.ajax({
                type: "POST",
                url: '{{url('/image/upload')}}',
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
                    //console.log(response);
                    var obj = JSON.parse(response);

                    $('#alertmessage').attr('value', obj.message);
                    $('#alert_message_dlg').attr('class', 'modal fade animate');
                    $('#alert_message_dlg').modal('show');
                    setTimeout(function() {
                        $('#alert_message_dlg').attr('class', 'modal fade animateout');
                        $('#alert_message_dlg').modal('toggle');
                        window.location.replace('./my');
                    }, 1000);

                    $('#iid-'+$('#index').text()+'-'+$('#s-cid').text()).attr('src',obj.data['url']);
                    $('#flip').text(Number($('#flip').text())-1);
                    $('#preloader').css('display','none');
                    //console.log(response);

                },
                error: function(response){
                    $('#preloader').css('display','none');
                    $('#upload_dlg').modal('toggle');
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
        function onpress_unlock_boost() {


            var  boost_image_id= $('#boost_image_id').text();


            var request = $.ajax({
                url: '{{url('/Boost/set')}}',
                type: 'post',
                data: {iid:boost_image_id},

                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    //console.log(response);
                    var obj = JSON.parse(response);
                    $('#boost_dlg').modal('toggle');
                    //  alert(obj.message);
                    //$('#signindlg').modal('toggle');
                    //   console.log(obj);

                    //window.location.replace('{{url('challenges/my')}}');

                },
                error: function (response) {

                    console.log(response);
                    alert('error');

                }
            });
        }





        //-----------------------Get_flip_fill_wand-----------------------------
        function buy_flip_fill(type,amount) {
            //alert(type+","+amount);
            var uid=getCookie('id');

            //alert(" correctly");
            var request = $.ajax({
                url: '{{url('/userpix/get')}}',
                type: 'post',
                data: { type:type,amount:amount,uid:uid} ,

                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //console.log(response);
                    var obj = JSON.parse(response);
                    alert(obj.message);
                    //$('#signindlg').modal('toggle');
                    //console.log(obj);
                    $('#flip').text(obj.data.Flip);
                    $('#charge').text(obj.data.Charge);
                    $('#wand').text(obj.data.Wand);
                    $('#flip_dlg').modal('toggle');
                    //window.location.replace('{{url('challenges/my')}}');

                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });




        }
        //-----------------------------------------------------------------------
        $(document).ready(function() {
            // alert("document ready occurred!");
            // $('#alert_message_dlg').attr('class', 'modal fade animate');
            // $('#alert_message_dlg').modal('show');
            // setTimeout(function() {
            //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
            //     $('#alert_message_dlg').modal('toggle');
            // }, 1000);
            getTime('GMT', function(time){
                // This is where you do whatever you want with the time:
                alert(time);
            });

        });

        var seconds = 0;

        function incrementSeconds() {
            seconds += 1;
            for (var i=0;i<'{{count($data)}}';i++){
                //console.log(i);
                var totaltime=document.getElementById('time'+i).innerText;
                var currentperiod=totaltime-seconds;
                var h=Math.floor(currentperiod/60/60);
                var m=Math.floor((currentperiod%60)/60);
                var s=currentperiod%60
                var m=Math.floor((currentperiod/60)%60);
                document.getElementById('period'+i).innerText =h+':'+m+':'+s;
            }

        }
        setInterval(incrementSeconds, 1000);
        function getTime(zone, success) {
            var url = 'https://json-time.appspot.com/time.json?tz=' + zone,
                ud = 'json' + (+new Date());
            window[ud]= function(o){
                success && success(new Date(o.datetime));
            };
            document.getElementsByTagName('head')[0].appendChild((function(){
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.src = url + '&callback=' + ud;
                return s;
            })());
        }
        //    -----------------------------------------------------------------


    </script>
@stop

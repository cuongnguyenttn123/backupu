@extends('Layout.gpage')
@include ('Modal/join_dlg')
@section('lib')

@stop
@section('style-css')
<style>
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
        width: 95%;
        min-width: 300px;
        max-width: 414px;
        height: 240px;
        margin: 15px;
        /*background-image: url("https://photos.gurushots.com/unsafe/500x0/ba7adc786e06f16a98b2b817295e30de/3_63110d706993e43f06a61525585c3307.jpg");*/

        background-repeat: no-repeat;
        background-position: 50% 50%;
        background-size: cover;
        padding: 0px;
    }
    .challenge-footer{
        position: absolute;
        bottom: 0;
        width: 100%;
        color: #fff;
        background-color: rgba(0,0,0,0.81);
        margin: 0px;

    }
    .footer-title div{
        text-align: center;

    }
    .footer-title .top-title{
        font-weight: bold;
        font-size: large;

    }
    .footer-title .bottom-title{
        color: rgba(255,255,255,.8);
        font-size: 12px;
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
        text-align: center;

    }
    .challenge-btn{
        opacity: 0;
        padding-top: 10px;
        text-align: center;
        transition: .5s ease;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);


        /*background-color: rgba(255,255,255,.5);*/
    }
    .challenge-card:hover .challenge-btn{
        opacity: 1;
    }
    .challenge-title{
        padding-top: 30px;
        text-align: center;
        font-size: 16px;
        color: black;
        margin-bottom: 0px;
    }
    .challenge-card .challenge_user{
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
    .challenge-card:hover .challenge_user {
        transform: scale(1);
        transition: transform .5s;
    }
</style>
@stop
@section('content')
@php
//echo var_dump($data);
@endphp
<div class="row" style="max-width: 1350px; margin-left: auto;margin-right: auto">
    @for($i=0;$i<count($data);$i++)
    @php
    //echo count($data);
    $item = json_decode(json_encode($data[$i]), true);
    @endphp
    <div>
        <div class="challenge-title" >
            "{{$item['title']}}"
        </div>
        <a href="{{asset('../challenges/result_closed/'.$item['id'])}}">        
        <div class="challenge-card col-sm-4 " style="background-image: url({{$item['image-url']}});margin-top: 0px;padding: 0px">
            <div  class="challenge_user row" style="background:rgba(0,0,0,0.3);height: 35px;padding: 0;margin: 0px;margin-top: 20px" aria-hidden="true">
                <div>

                </div>
                <div style="font-size: 22px">
                    {{$item['s_name']}}
                </div>
            </div>
            <!--<div class="challenge-btn">-->
            <!--    <button class="btn btn-light" style="height: 25px;padding: 0;width: 55px" onclick="joinme('{{$item['id']}}','{{$item['title']}}','{{$item['description']}}')">Join</button>-->
            <!--</div>-->
            <div class="challenge-footer row">
                <div class="footer-title after col-4">
                    <div class="top-title">{{$item['price']}}</div>
                    <div class="bottom-title">Cash Prize</div>
                </div>
                <div class="footer-title after col-4" style="display: table!important;">
                    <div class="time-title">
                            <span id="period{{$i}}">
                             Ended
                            </span>
                    </div>
                </div>
                <div class="footer-title col-4">
                    <div class="top-title">{{$item['votes']}}</div>
                    <div class="bottom-title">Votes</div>
                </div>
            </div>
        </div>
        </a>
    </div>
    @endfor
</div>
@stop
@section('javascript')
<script>
    $(document).ready(function() {
        //alert("document ready occurred!");
        getTime('GMT', function(time){
            // This is where you do whatever you want with the time:
            alert(time);
        });

    });

    var seconds = 0;

    // function incrementSeconds() {
    //     seconds += 1;
    //     for (var i=0;i<{{count($data)}};i++){
    //         var totaltime=document.getElementById('time'+i).innerText;
    //         var currentperiod=totaltime-seconds;
    //         var h=Math.floor(currentperiod/60/60);
    //         var m=Math.floor((currentperiod%60)/60);
    //         var s=currentperiod%60
    //         var m=Math.floor((currentperiod/60)%60);
    //         document.getElementById('period'+i).innerText =h+':'+m+':'+s;
    //     }

    // }
    // setInterval(incrementSeconds, 1000);
    // function getTime(zone, success) {
    //     var url = 'http://json-time.appspot.com/time.json?tz=' + zone,
    //         ud = 'json' + (+new Date());
    //     window[ud]= function(o){
    //         success && success(new Date(o.datetime));
    //     };
    //     document.getElementsByTagName('head')[0].appendChild((function(){
    //         var s = document.createElement('script');
    //         s.type = 'text/javascript';
    //         s.src = url + '&callback=' + ud;
    //         return s;
    //     })());
    // }
    function joinme(id,title,description) {

        $('#joindlg').modal('show');
        $('#joindlg #join_challenge_description').text(description);

        $('#joindlg #join_challenge_title').text(title);
        $('#joindlg #challenge_id').text(id);
        var userid=getCookie('id');



    }


    $('#challenges_join_continue').click(function(){


        var uid=getCookie('id');
        var  cid= $('#challenge_id').text();

        //alert(" correctly");
        var request = $.ajax({
            url: '{{url('user/challenges/join')}}',
            type: 'post',
            data: { userid:uid,cid:cid} ,

        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(response){
            console.log(response);
            var obj = JSON.parse(response);
            alert(obj.message);
            $('#joindlg').modal('toggle');
            console.log(obj);
            window.location.replace('{{url('challenges/my')}}');
            // setCookie(email,obj.data,60);

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

</script>
@stop

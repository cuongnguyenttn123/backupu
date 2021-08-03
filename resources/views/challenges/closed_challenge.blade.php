@extends('Layout.gpage')

@section('lib')

@stop
<script src={{asset("/row-grid.js")}}></script>

@section('style-css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/csfs/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


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
            /*background-image: url(https://photos.gurushots.com/unsafe/1582x0/c8530cf8a6bd266447926532f5669cf8/3_05b8e2ccaedaf3c64bb539c17f1ff745.jpg) !important;*/
            height:600px;
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

        .challenge_title{
            position: relative;
        }
        .challenge_title{
            border-radius: 50%;
            background:rgba(255,255,255,0.7);
            opacity: 1;width: 250px;height: 250px;
            margin: auto;margin-bottom: 50px;
        }
        .challenge_title h1::after{
            content: '';
            position: absolute;
            left: -15px;
            top: -15px;
            width: 280px;
            height: 280px;
            border: 1px solid #F29620;
            border-radius: 50%;
            z-index: -1;
        }
        .challenge_title h1::before{
            content: '';
            position: absolute;
            left: -10px;
            top: -10px;
            width: 270px;
            height: 270px;
            border: 5px solid #F29620;
            border-radius: 50%;
            z-index: -1;
        }
        .imagediv{
            margin-bottom: 10px;
            margin: auto;
        }
        .imagediv .image-card{
            height: 150px;
            background-size: cover;
            background-repeat: no-repeat;
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
        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 0px;
    padding-left: 0px;
    </style>
@stop
@section('content')
    @php
        //echo var_dump($data);
        $c=json_decode(json_encode($data), true);
            //echo var_dump($c);
        $ranks=json_decode(json_encode($rank), true);
                //echo var_dump($image);myrank
        $myranks=json_decode(json_encode($myrank), true);
    @endphp
    <div class="c-challenge-cover contentcenter paddingtop-50 backgroundimage " style="outline: 10px solid rgba(255,255,255,0.7);
        outline-offset: -30px;padding-top: 90px;background-image: url('{{$c['image-url']}}')">
        <div style="" class="challenge_title">
            <h1 id="submit_challenge_title"  style="padding: 5px;color: black;    height: 250px;display: table-cell;vertical-align: middle;width:250px">{{$c['title']}}</h1>
        </div>
        <span id="image_gas" style="display: none">{{$c['photocount']}}</span>

        <span id="photo_submit_c_id" style="display: none">{{$c['id']}}</span>
    </div>
    {{---------------------------------------}}
    <div class = "row">
        <div class = "col-3"  style="margin-top: 50px">
            <ul class="nav nav-tabs" style="background: white;margin-bottom:0;font-family: inherit;font-size: 17px;font-weight: 700;margin: auto;max-width: 1000px;">


            <li class="active"><a data-toggle="tab" href="#details"><div style="margin-bottom: 50px;  background-color:#f29620;width: 200px;
                                                                              box-shadow: 0px 15px 20px rgba(194, 116, 0,0.5);
                                                                              color: #fff;    margin-right: 20px;
                                                                               margin-left: 30px;border-radius: 20px;
                                                                              ">
                        <button type="button" class="btn "  style="width: 100%;background-color: #f29620;height: 50px;"><span style="padding-bottom: 4px;border-bottom: solid 1px;padding-left: 10px;
                                         padding-right: 10px;font-weight: bold;">Details</span>

                        </button>
                    </div>
                </a></li>
            <li ><a data-toggle="tab" href="#prize"><div style="margin-bottom: 50px;  background-color:#f29620;width: 200px;
                                                                              box-shadow: 0px 15px 20px rgba(194, 116, 0,0.5);
                                                                              color: #fff;    margin-right: 20px;
                                                                               margin-left: 30px;border-radius: 20px;
                                                                              ">
                        <button type="button" class="btn "  style="width: 100%;background-color: #f29620;height: 50px;"><span style="padding-bottom: 4px;border-bottom: solid 1px;padding-left: 10px;
                                         padding-right: 10px;font-weight: bold;">Prize</span></button>
                    </div>
                </a></li>
            <!--<li ><a data-toggle="tab" href="#rules"><div style="margin-bottom: 50px;  background-color:#f29620;width: 200px;-->
            <!--                                                                  box-shadow: 0px 15px 20px rgba(194, 116, 0,0.5);-->
            <!--                                                                  color: #fff;    margin-right: 20px;-->
            <!--                                                                   margin-left: 30px;border-radius: 20px;-->
            <!--                                                                  ">-->
            <!--            <button type="button" class="btn "  style="width: 100%;background-color: #f29620;height: 50px;"><span style="padding-bottom: 4px;border-bottom: solid 1px;padding-left: 10px;-->
            <!--                             padding-right: 10px;font-weight: bold;">Winners</span></button>-->
            <!--        </div>-->
            <!--    </a></li>-->
            <li ><a data-toggle="tab" href="#rank"><div style="margin-bottom: 50px;  background-color:#f29620;width: 200px;
                                                                              box-shadow: 0px 15px 20px rgba(194, 116, 0,0.5);
                                                                              color: #fff;    margin-right: 20px;
                                                                               margin-left: 30px;border-radius: 20px;
                                                                              ">
                        <button type="button" class="btn "  style="width: 100%;background-color: #f29620;height: 50px;"><span style="padding-bottom: 4px;border-bottom: solid 1px;padding-left: 10px;
                                         padding-right: 10px;font-weight: bold;">Rank</span></button>
                    </div>
                </a></li>



        </ul>
        </div>
        
        <div class = "col-9">
                <div class="tab-content">
        <div id="details" class=" container tab-pane active" style="min-height:490px;"><br> 
                <div class="row" style="width:100%;height:200px;background: white;margin-bottom: 100px;">
                    <div class="col-sm-7" style="text-align:left; margin-left:50px; margin-top:30px;float:left;">
                        <div style = "text-align: left;letter-spacing: -0.6px;color: #000000;font-size: 32px;line-height: 1.3;"><b>{{$c['title']}}</b></div>
                        <div style = "font-size: 23px; font-weight: 300; line-height: 1.4; margin-top:20px;">
                            {{$c['description']}}</div>
                    </div>
                    <div class="col-sm-3" style="height:100%;background:white;margin-left:40px; text-align: center;padding:auto;float:right;">
                        <div class="col-sm-12" style="height: 90%;background:white; margin: auto;width:100%;">
                            <img  alt="Avatar" class="image" style="width: 98px;height: 96px;border-radius: 100%;margin: auto;margin-bottom:" src="{{$c['image-url']}}">
                            <h5 style="color: black;margin-top:10px;font-size:25px;">{{$c['s_name']}}</h5>
                        </div>
                    </div>
                </div> 
            </div>
        <div id="prize" class=" container tab-pane " style="min-height:500px;"><br>
                <!--<div style="text-align: center"><h2 style="color: #f29620;">PRIZE</h2></div>-->

                <div class="row" style="width:80%;padding-top:10px; margin:auto;margin-bottom: 90px;">

                    <div class="col-sm-12" style="">
                        <table>
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
                    <!--<h6>   You will receive a GuruShots bundle with Flip, Wand and Charge({{$c['prize']}})!-->
                        <!--    Provided by urpixpays</h6>-->
                    </div>

                </div>

            </div><br> <br>
        <!---->
        <div id="rules" class=" container tab-pane " style="padding-right:0px; padding-left: 0px;  min-height: 80%;"><br>
       @if($c['photocount']==1) 
       
       @if(count($ranks)>10)
       @for($i=0;$i<10;$i++)
        <div class = "row" id = "first" style = "width:70%; height:75%; margin:auto;border:2px solid #ccffff">
            <div class = "col-12">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:100%; margin:auto;background-size:cover;"></div>
                @if(!is_null($ranks[$i]['profile_image']))
                <img src = "{{asset('images/profile_pictures/'.$ranks[$i]['profile_image'])}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @else
                <img src = "{{asset('images/avatar.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @endif
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">{{$ranks[$i]['name']}}</div>
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:0px;  color: #fbfdf9;position: absolute;top:-40px; left:45%;z-index: 7;" >
                <div style="font-size:35px; width:80px;height:80px;margin-top:-22px;  color: #000;position: absolute;top:-5px; left:48%;z-index: 7;">#{{$ranks[$i]['rank']}}</div>
                <div style="font-size:45px; ;margin-top:20%;  color: #000;position: absolute;top:55px; left:48.7%;z-index: 100;">1</div>
    
            </div>
        </div>
        @endfor
        @else
        @for($i=0;$i<count($ranks);$i++)
        <div class = "row" id = "first" style = "width:70%; height:75%; margin:auto;border:2px solid #ccffff">
            <div class = "col-12">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:100%; margin:auto;background-size:cover;"></div>
                @if(!is_null($ranks[$i]['profile_image']))
                <img src = "{{asset('images/profile_pictures/'.$ranks[$i]['profile_image'])}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @else
                <img src = "{{asset('images/avatar.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @endif
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">{{$ranks[$i]['name']}}</div>
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:0px;  color: #fbfdf9;position: absolute;top:-40px; left:45%;z-index: 7;" >
                <div style="font-size:35px; width:80px;height:80px;margin-top:-22px;  color: #000;position: absolute;top:-5px; left:48%;z-index: 7;">#{{$ranks[$i]['rank']}}</div>
                <div style="font-size:45px; ;margin-top:20%;  color: #000;position: absolute;top:55px; left:48.7%;z-index: 100;">1</div>
    
            </div>
        </div>
        @endfor  
        @endif
        <br><br> 
        
        @elseif($c['photocount']==2)
       
        @if(count($ranks)>10)
        @for($i=0;$i<10;$i++)
        <div class = "row" id  = "second" style = "width:40%; height:80%; margin:auto;margin-bottom:50px;">
             <div class = "col-12">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>
                @if(!is_null($ranks[$i]['profile_image']))
                <img src = "{{asset('images/profile_pictures/'.$ranks[$i]['profile_image'])}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @else
                <img src = "{{asset('images/avatar.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @endif
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">{{$ranks[$i]['name']}}</div>
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:-20px;  color: #fbfdf9;position: absolute;top:-20px; left:45%;z-index: 7;" >
                <div style="font-size:35px; width:80px;height:80px;margin-top:-22px;  color: #000;position: absolute;top:-5px; left:48%;z-index: 7;">#{{$ranks[$i]['rank']}}</div>
                <div style="font-size:45px; ;margin-top:8%;  color: #000;position: absolute;top:35px; left:48.7%;z-index: 100;">1</div> 
            </div>
             <h1 style = " border-bottom: 5px solid red;"></h1>
             <div class = "col-12">
                <div id="p2-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;">
                </div>
                <div style="font-size:45px; ;margin-top:8%;  color: #000;position: absolute;top:35px; left:48.7%;z-index: 100;">2</div>
            </div>
        </div>
        @endfor
        @else
           @for($i=0;$i<count($ranks);$i++)        
            <div class = "row" id  = "second" style = "width:60%; height:80%; margin:auto;margin-bottom:50px;">
             <div class = "col-12">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;">
                </div>
                @if(!is_null($ranks[$i]['profile_image']))
                <img src = "{{asset('images/profile_pictures/'.$ranks[$i]['profile_image'])}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @else
                <img src = "{{asset('images/avatar.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @endif
                <div style=" height:20px; font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">{{$ranks[$i]['name']}}</div>
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:-20px;  color: #fbfdf9;position: absolute;top:-20px; left:45%;z-index: 7;" >
                <div style="font-size:35px; width:80px;height:80px;margin-top:-22px;  color: #000;position: absolute;top:-5px; left:48%;z-index: 7;">#{{$ranks[$i]['rank']}}</div>
                <div style="font-size:45px; ;margin-top:8%;  color: #000;position: absolute;top:35px; left:48.7%;z-index: 100;">1</div> 
            </div>
             <h1 style = " border-bottom: 5px solid red;"></h1>
             <div class = "col-12">
                <div id="p2-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;">
                    <!--<span id="vote-{{$ranks[$i]['u-id']}}-0" style=""></span>-->
                </div>
                <div style="font-size:45px; ;margin-top:8%;  color: #000;position: absolute;top:35px; left:48.7%;z-index: 100;">2</div>
            </div>
        </div>
          @endfor
        @endif
        
        @elseif($c['photocount']==3)
        <br><br>
        
        <div class = "row" id = "third" style = "width:70%; height:85%; margin:auto;">
              <div class = "col-12">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <img src = "{{asset('images/11.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%" >
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">Jackson</div>
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:-20px;  color: #fbfdf9;position: absolute;top:-20px; left:45%;z-index: 7;" >
                <div style="font-size:35px; width:50px;height:50px;margin-top:-22px;  color: #000;position: absolute;top:-5px; left:48%;z-index: 7;">#3</div>
                <div style="font-size:45px; ;margin-top:8%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">1</div>
            </div>
             <div class = "col-6">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">2</div>
                
            </div>
             <div class = "col-6">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">3</div>
            </div>
        </div>
        <br><br>
    @elseif($c['photocount']==4)
        
       @if(count($ranks)>10)
       @for($i=0;$i<10;$i++)        
        <div class = "row" id = "fourth" style = "width:70%; height:85%; margin:auto;margin-bottom:50px;">
            <div class = "col-6">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>                
                <!--<img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">-->
                <img src = "{{asset('images/11.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">Jackson</div>
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">1</div>
                
                
            </div>
            <div class = "col-6">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:0px;  color: #fbfdf9;position: absolute;top:-35px; left:-20px;z-index: 7;" >
                <div style="font-size:35px; width:50px;height:50px;margin-top:-10px;  color: #000;position: absolute;top:-15px; left:0px;z-index: 7;">#4</div>
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">2</div>
            </div>
            <div class = "col-6">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">3</div>
            </div>
            <div class = "col-6">
                <img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">4</div>
            </div>
        </div>
        @endfor
        @else
        @for($i=0;$i<count($ranks);$i++)        
        <div class = "row" id = "fourth" style = "width:70%; height:85%; margin:auto;margin-bottom:50px;">
            <div class = "col-6">
                <div id="p1-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>                
                <!--<img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">-->
                @if(!is_null($ranks[$i]['profile_image']))
                <img src = "{{asset('images/profile_pictures/'.$ranks[$i]['profile_image'])}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @else
                <img src = "{{asset('images/avatar.jpg')}}" style="width:70px;
                height:70px;margin-top:0px;  color: #fbfdf9;position: absolute;top:30px; left:10px;z-index: 7;border-radius:50%;" >
                @endif
                <div style="  font-size:15px;margin-left:5px;margin-top:0px; font-size: 18px;color: #000;position: absolute;top:7px; left:10px;z-index: 7;">{{$ranks[$i]['name']}}</div>
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">1</div>
            </div>
            <div class = "col-6">
                <div id="p2-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>   
                <img src = "{{asset('images/a12.png')}}" style="width:80px;
                height:80px;margin-top:0px;  color: #fbfdf9;position: absolute;top:-40px; left:-35px;z-index: 7;" >
                <div style="font-size:35px; width:50px;height:50px;margin-top:-10px;  color: #000;position: absolute;top:-18px; left:-15px;z-index: 7;">#{{$ranks[$i]['rank']}}</div>
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">2</div>
            </div>
            <div class = "col-6">
                <div id="p3-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>   
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">3</div>
            </div>
            <div class = "col-6">
                <div id="p4-{{$ranks[$i]['u-id']}}-0" class="image-card" style="width:100%; height:50%; margin:auto;background-size:cover;"></div>                   
                <!--<img src = "{{asset('images/1.png')}}" style = "width:100%; height:50%; margin:auto;">-->
                <div style="font-size:45px; ;margin-top:15%;  color: #000;position: absolute;top:45px; left:47%;z-index: 100;">4</div>
            </div>
        </div>
        @endfor        
        @endif
        <br><br>
        @endif
          
        </div>
        
        
        <!---->

        <div id="rank" class="tab-pane " style="min-height: 80%;">
                
                @for($i=0;$i<count($ranks);$i++)
                    @php
                        //echo count($data);
                        $item = json_decode(json_encode($ranks[$i]), true);
                    @endphp
                <div class="row" style="width: 80%;margin: auto;position: relative;margin-bottom: 20px">
                    <div class="col-12" style="height: 80px">
                        <div style="z-index:6;position:absolute;display: table;height: 80px;width: 80px;background-color: grey;border-radius: 40px;text-align: center;">
                            <span style="color: white;font-size:30px;display: table-cell;vertical-align: middle">
                                {{$i+1}}
                            </span>
                        </div>

                        <div style="margin-top:25px;z-index: 5;width:95%; background-color: #3b3e80;height: 30px;border-radius: 15px;position: absolute;right: 0%">
                            <span style="position: absolute;left: 10%;color: white">
                                {{$item['name']}}
                            </span>
                            <span style="position: absolute;right: 5%;color: white">
                                {{$item['vote_count']}} Votes
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id='{{$item['id']}}' class="row" style="padding-left: 50px;">
                            <span id="cid-{{$i}}" class="nondisplay">{{$item['c-id']}}</span>
                            <span id="uid-{{$i}}" class="nondisplay">{{$item['u-id']}}</span>
                            @switch($c['photocount'])
                                @case (1)
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-0" style=""></span>
                                    </div>
                                </div>
                                @break
                                @case (2)
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-0" style=""></span>
                                    </div>
                                </div>
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-1" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-1" style=""></span>
                                    </div>
                                </div>
                                @break
                                @case (4)
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-0" style=""></span>
                                    </div>
                                </div>
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-1" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-1" style=""></span>
                                    </div>
                                </div>
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-2" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-2" style=""></span>
                                    </div>
                                </div>
                                <div class="col-3 imagediv">
                                    <div id="p-{{$item['u-id']}}-3" class="image-card" style="">
                                        <span id="vote-{{$item['u-id']}}-3" style=""></span>
                                    </div>
                                </div>
                                @break
                                @default
                                @break
                            @endswitch
                        </div>
                    </div>


                </div>

                @endfor

        </div>
        </div>
     
    {{---------------------------------------}}


    </div>






@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            var count='{{count($ranks)}}';
            for (var i=0;i<count;i++){
                var cid=$('#cid-'+i).text();
                var uid=$('#uid-'+i).text();
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
                        console.log(obj);
                        var number=0;
                        for (var j=0;j<images.length;j++){
                            //alert(j);
                            $('#p-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j]['url'])+')';
                            $('#vote-'+images[j]['u-id']+'-'+j).text(images[j]['vote']);
                            console.log('#p-'+images[j]['u-id']+'-'+j);
                            // $('#iid-'+j+'-'+images[j]['c-id']+'div').css("background-image",images[j]['url']);
                            // $('#voteid-'+j+'-'+images[j]['c-id']).text(images[j]['vote']);
                            // $('#imageid-'+j+'-'+images[j]['c-id']).text(images[j]['id']);
                            // number+=parseInt(images[j]['vote']);
                            //!!
                            //console.log(images[j]['url']);
                            //console.log('#iid-'+j+'-'+images[j]['c-id']);
                        }
                        for (var j=0;j<images.length;j++){
                            //alert(j);
                            $('#p1-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j]['url'])+')';
                            $('#p2-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j+1]['url'])+')';
                            $('#p3-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j+2]['url'])+')';
                            $('#p4-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j+3]['url'])+')';
                            
                            $('#vote-'+images[j]['u-id']+'-'+j).text(images[j]['vote']);
                            console.log('#p-'+images[j]['u-id']+'-'+j);
                            // $('#iid-'+j+'-'+images[j]['c-id']+'div').css("background-image",images[j]['url']);
                            // $('#voteid-'+j+'-'+images[j]['c-id']).text(images[j]['vote']);
                            // $('#imageid-'+j+'-'+images[j]['c-id']).text(images[j]['id']);
                            // number+=parseInt(images[j]['vote']);
                            //!!
                            //console.log(images[j]['url']);
                            //console.log('#iid-'+j+'-'+images[j]['c-id']);
                        }                        
                        if(images.length>0)
                            $('#vote'+images[0]['c-id']).text(number);

                    },
                    error: function (response) {
                        console.log(response);
                    }

                });
                //------------------------------------Disply Exposure-----------------------------------------------------

                //-----------------------------------------------------------------------------------------------------------------
            }

        });



        //----------------------------------------------------------------------

    </script>

@stop
@include ('Modal/photo_submit')
@include ('Modal/swap_dlg')
@include ('Modal/submit_dlg')



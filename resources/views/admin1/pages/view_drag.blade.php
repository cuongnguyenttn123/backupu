@extends('admin.Layout.pagetemplate')
@section('head')
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/x-editor-style.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-editable.css')}}">

<!---------------------------tool---------------->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-------- content--------->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>
    <style>
        .create-content{
            width: 98%;
            height: 700px;
            margin-top: 25px;
            background-color: white;
        }
        .create-header{
            width: 98%;
            height: 40px;
            margin:auto;
            border-radius: 6px 6px 0 0;
            background: linear-gradient(to bottom,#139ff0 0,#0087e0 100%);
            border: 1px solid #0087e0;
            color: #F7F7F7;
        }
        input{
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            padding: 8px 10px;
            height: auto;
            font-size: 14px;
            border-radius: 4px;
            font-family: inherit;
            border: 1px solid #ABB0B2;
        }
    </style>

    <!-----------end------------>
    <style>
        .dropdown {
            position: inherit;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 5px 5px;
            z-index: 10;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content div:hover{
            background-color: #b9bbbe;
        }
    </style>
    <style>
        table{
            /*border: 1px solid green;*/
            border-collapse: collapse;
            padding: 10px;
        }
        table{
            margin:auto;
            background-image: url('{{asset('welcome/img/grid2.gif')}}');
            border: 1px solid lightgreen;
            box-shadow: 0 2px 10px lightgreen;
        }
        td{
            width:40px;
            height:120px;
            text-align:center;
        }
        .label-count1 {
            background-color: white;
            border-radius: 50%;
            padding:2px;
        }
        .label-count2 {
            background-color: white;
            padding:2px;
        }
        .reservation-title{
            min-width: 680px;
        }
        .reservation{
            min-width: 680px;
        }
        .reserve-table{
            cursor:pointer;
        }
        @media only screen and (max-width: 830px) {
            .chair{
                display: none;
            }
            .reservation{
                min-width: 320px;
                margin:auto;
            }
        }
        .time-bar span{
            margin: 0 25px 0 10px;
        }
    </style>
    <style>
        .mydiv,.mydiv1,.mydiv2,.mydiv3,.mydiv4,.mydiv5,.mydiv6,.mydiv7,.mydiv8 {
            position: absolute;
            z-index: 9;
            text-align: center;
        }
        .mydivs1,.mydivs1,.mydivs2,.mydivs3,.mydivs4,.mydivs5,.mydivs6,.mydivs7,.mydivs8,.mydivs9 {
            position: absolute;
            z-index: 9;
            text-align: center;
        }
        .mydivheader {
            padding: 10px;
            cursor: move;
            z-index: 10;
            color: #fff;

        }
        .tool0{
            color:white;
        }
        .view-table{
            width:50px;
            height: 50px;
            position: absolute;
        }
        .view-table1{
            width:60px;
            height: 50px;
            position: absolute;
        }
        .view-table2{
            width:80px;
            height: 50px;
            position: absolute;
        }
        .view-table3{
            width:100px;
            height: 50px;
            position: absolute;
        }
        .view-table4{
            width:130px;
            height: 50px;
            position: absolute;
        }
        .view-table056{
            width:90px;
            height: 50px;
            position: absolute;
        }
        .view-table07{
            width:110px;
            height: 50px;
            position: absolute;
        }
        .view-table08{
            width:116px;
            height: 50px;
            position: absolute;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="{{asset('admin/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.Layout.header')
    <button class="table-add" style="float: right;position: relative;top:-10px;left: -40px;width: 90px;height: 30px;border-radius:10px;border: 1px solid grey;background-color: white ">+Add Table</button>
    <div class="create-content">
        <div class="create-header">
            <span><p style="text-align: left;margin-left:30px;font-size: 25px;"><p1 style="font-size: 20px;">{{$name}} - Floor No.{{$num}}</p1></p></span>
        </div>

        <div class="reservation" style="padding-bottom:10px;margin:auto;width: 98%;height: 95%;min-height:500px;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);background: lightgoldenrodyellow">
            <div class="time-bar" style="display:flex;width: 98%;scroll:none;margin:auto;height: 30px;background-color: white;overflow: auto;">
                @for($i=1;$i<$num_floors+1;$i++)
                    <p class="list-{{$i}}" style="display: none;">{{$i}}</p>
                    <a href="{{url('view/restaurant/'.$name.'/'.$i)}}" class="list-group-item" id="list-{{$i}}" style="white-space: nowrap;color: #555;background: -webkit-linear-gradient(top, #757175 0%, #000000 100%);cursor: pointer;color:white"><span style="color: white;position:relative;top:-6px;"><i id="list-c-{{$i}}" class="fa fa-circle" style="font-size: 10px;position:relative;top:-1px;color:red;margin-right: 10px;"></i>Floor{{$i}}</span></a>
                @endfor
            </div>
            <p class="no" style="display: none">{{$num}}</p>
            <p class="restaurant-id" style="display:none ">{{$res_id}}</p>
            <p class="floors-num" style="display:none ">{{$num_floors}}</p>
                @php
                    $k=0;$table_counts1=count($table_view1);$table_counts=count($table_view);
                @endphp

                @for($i2=1;$i2<$table_counts;$i2++)
                    @for($j2=1;$j2<25;$j2++)
                        @php
                            $s ='h'.(string)$j2;
                        @endphp
                        <p class="t-{{$i2}}-{{$j2}}" style="display: none">{{$table_view[$i2-1]->$s}}</p>
                    @endfor
                @endfor
                <p class="num_r" style="display: none;"></p>
                <p class="total_counts" style="display:none;">{{$table_counts}}</p>
                <p class="total_counts1" style="display:none;">{{$table_counts1}}</p>
                <div class="tools" style="padding-top:10px;float:left;margin:10px;width: 200px;height: 87%;background-color:white;border-radius: 10px;">

                    <span style="margin-left: 30px;">Normal</span><span style="margin-left: 40px;">Special</span><br>
                    <span class="tool0" >x</span><br>
                    <div class="left" style="width: 50%;height: 90%;border-right:1px solid lightgrey">

                    </div>
                    @for($i=0;$i<$table_counts;$i++)
                    @php
                        $k=$k+1;$n=0;
                    @endphp
                    @if($k <= $table_counts)
                        @if(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 0 && ($table_view[$k-1]->x) == '0')
                            @if(($table_view[$k-1]->num_seats) == 1)
                            <div id="mydiv{{$k-1}}" class="mydiv1">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;font-size: 13.5px;position:relative;top:4px;left:-0.5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:-5px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 2)
                            <div id="mydiv{{$k-1}}" class="mydiv2">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:-3px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 3)
                            <div id="mydiv{{$k-1}}" class="mydiv3">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-4.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;left:1px;top:-2px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 4)
                            <div id="mydiv{{$k-1}}" class="mydiv4">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-7px"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;left:1px;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 5)
                            <div id="mydiv{{$k-1}}" class="mydiv5">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;top:-2px;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 6)
                            <div id="mydiv{{$k-1}}" class="mydiv6">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-3px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:3.5px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 7)
                            <div id="mydiv{{$k-1}}" class="mydiv7">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-0.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) > 7)
                            <div id="mydiv{{$k-1}}" class="mydiv8">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;left:7px;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:30px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @endif
                        @elseif(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 1 && ($table_view[$k-1]->x) == '0')
                            @if(($table_view[$k-1]->num_seats) == 1)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;font-size: 13.5px;position:relative;top:4px;left:1px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:-5px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 2)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 3)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-4.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 4)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-6px"></i>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 5)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 6)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-2.5px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4px;transform: rotate(90deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 7)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="background-color:#ff9999;border:1px solid red;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) > 7)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;left:4px;background-color:#ff9999;border:1px solid red;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Normal</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:30px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @endif
                        @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 0 && ($table_view[$k-1]->x) == '0')
                            @if(($table_view[$k-1]->num_seats) == 1)
                            <div id="mydiv{{$k-1}}" class="mydivs1">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;font-size: 15px;position:relative;top:5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:-4px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 2)
                            <div id="mydiv{{$k-1}}" class="mydivs1">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 3)
                            <div id="mydiv{{$k-1}}" class="mydivs3">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 4)
                            <div id="mydiv{{$k-1}}" class="mydivs4">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 5)
                            <div id="mydiv{{$k-1}}" class="mydivs5">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 6)
                            <div id="mydiv{{$k-1}}" class="mydivs6">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 7)
                            <div id="mydiv{{$k-1}}" class="mydivs7">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1.5px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 8)
                            <div id="mydiv{{$k-1}}" class="mydivs8">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:green;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) > 8)
                            <div id="mydiv{{$k-1}}" class="mydivs9">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @endif
                        @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 1 && ($table_view[$k-1]->x) == '0')
                            @if(($table_view[$k-1]->num_seats) == 1)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;font-size: 15px;position:relative;top:5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 2)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;pbackground-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 3)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 4)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 5)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;left:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 6)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 7)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) == 8)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <i class="fas fa-chair" style="color:red;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;margin:auto;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @elseif(($table_view[$k-1]->num_seats) > 8)
                            <div id="mydiv{{$k-1}}" class="mydiv">
                                <div id="mydivheader{{$k-1}}" class="mydivheader">
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                    <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                    <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                    <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                    <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                    <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                    <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                    <p class="table-type" style="display: none;">Special</p>
                                </div>
                                <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                </div>
                            </div>
                            @endif
                        @endif
                    @endif
                    @endfor
                </div>
                <div class="floor-create" style="position:relative;border-radius:10px;margin:10px;float:left;width: calc(100% - 240px);height: 570px;background-image: url('{{asset('welcome/img/grid3.jpg')}}');">
                    @php
                        $k=0;
                    @endphp
                    <p class="num_r" style="display: none;"></p>
                    @for($i=0;$i<$table_counts;$i++)
                        @php
                            $k=$k+1;
                        @endphp
                        @if($k <= $table_counts)
                            @if(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 0 && ($table_view[$k-1]->x) != '0')
                                @if(($table_view[$k-1]->num_seats) == 1)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <i class="fas fa-chair" style="color:green;font-size: 13.5px;position:relative;top:4px;left:1px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-17px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:4px;left:4.5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-5px;left:4px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 2)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;left:4.5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 3)
                                    <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-3.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:6.5px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;left:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:18px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 4)
                                    <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-6px"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:13.5px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;left:4px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 5)
                                    <span class="view-table2" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-5px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:4px;left:10px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:20px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 6)
                                    <span class="view-table3" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-2.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:4px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-7px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:4px;left:9px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:40px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 7)
                                    <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin:auto;position:relative;top:-2px;left:-15px;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:4px;left:14px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:47px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) > 7)
                                    <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:7px;margin-left:33px;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:4px;left:15px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:7px;left:63px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @endif
                            @elseif(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 1)
                                    @if(($table_view[$k-1]->num_seats) == 1)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <i class="fas fa-chair" style="color:red;font-size: 13.5px;position:relative;top:4px;left:1px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-17px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:4px;left:4.5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-5px;left:4px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 2)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;left:4.5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 3)
                                        <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px; ">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-3.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:6.5px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;left:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:18px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 4)
                                        <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-6px"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:13.5px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;left:4px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 5)
                                        <span class="view-table2" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-5px;margin:auto;background-color:#ff9999;border:1px solid red;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:4px;left:10px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:20px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 6)
                                        <span class="view-table3" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-2.5px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-7px;margin:auto;background-color:#ff9999;border:1px solid red;width:40px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:4px;left:9px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:40px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 7)
                                        <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin:auto;position:relative;top:-2px;left:-15px;background-color:#ff9999;border:1px solid red;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:4px;left:14px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:47px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) > 7)
                                        <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:7px;margin-left:33px;background-color:#ff9999;border:1px solid red;width:50px;height:30px;border-radius: 3px;padding-bottom: 3px;">
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:4px;left:15px;">T{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Normal</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:7px;left:63px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @endif
                            @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 0 && ($table_view[$k-1]->x) != '0')
                                @if(($table_view[$k-1]->num_seats) == 1)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;font-size: 15px;position:relative;top:5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-8px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:4px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:2px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 2)
                                    <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:0px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:4px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-3px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                @elseif(($table_view[$k-1]->num_seats) == 3)
                                    <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:6px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:5px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-4px;left:17px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                @elseif(($table_view[$k-1]->num_seats) == 4)
                                    <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:11px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-3px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 5)
                                    <span class="view-table056" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:18px;position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:31px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 6)
                                    <span class="view-table056" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:24.5px;position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:39px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) == 7)
                                    <span class="view-table07" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:31px;position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:8px;left:8px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:47px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                @elseif(($table_view[$k-1]->num_seats) == 8)
                                    <span class="view-table08" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:green;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:0px;margin:auto;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:9px;left:9px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:55px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @elseif(($table_view[$k-1]->num_seats) > 8)
                                    <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin:auto;position:relative;top:-2.5px;left:0px;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:8px;left:8px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:60px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                @endif
                            @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 1 && ($table_view[$k-1]->x) != '0')

                                    @if(($table_view[$k-1]->num_seats) == 1)
                                        <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;font-size: 15px;position:relative;top:5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:-8px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:4px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:2px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 2)
                                        <span class="view-table" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:0px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:4px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-3px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                    @elseif(($table_view[$k-1]->num_seats) == 3)
                                        <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:6px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:4px;left:5px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-4px;left:17px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                    @elseif(($table_view[$k-1]->num_seats) == 4)
                                        <span class="view-table1" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:11px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-3px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 5)
                                        <span class="view-table056" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:18px;position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:31px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 6)
                                    <span class="view-table056" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:24.5px;position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:6px;left:6px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:39px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) == 7)
                                        <span class="view-table07" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin-left:31px;position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:8px;left:8px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:47px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>

                                    @elseif(($table_view[$k-1]->num_seats) == 8)
                                        <span class="view-table08" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <i class="fas fa-chair" style="color:red;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                    <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;margin:auto;left:0px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:9px;left:9px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:0px;left:55px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @elseif(($table_view[$k-1]->num_seats) > 8)
                                        <span class="view-table4" style="left:{{($table_view[$k-1]->y)*100}}%;top:{{($table_view[$k-1]->x)*570}}px;">
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                    <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                    <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                    <span class=""><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                    <div id="t-{{$k}}" class="reserve-table" style="margin:auto;position:relative;top:-2.5px;left:0px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;">
                                        <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                        <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                        <span class="label-count1" style="position:relative;top:8px;left:8px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                        <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                        <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                        <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                        <p class="table-type" style="display: none;">Special</p>
                                    </div>
                                    <span class="label-count3" style="position:relative;top:-2px;left:60px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span>
                                    </span>
                                    @endif
                            @endif
                        @endif

                    @endfor
                </div>
                <button class="create-save" style="letter-spacing:2px;border-radius:5px;float:right;margin-right:35px;margin-bottom: 10px;width:200px;height:40px;background: linear-gradient(to bottom,#5dc26a 0,#4fb55d 100%);border: 1px solid #4fb55d;color: #F7F7F7;font-weight: 700;text-shadow: 0 -1px transparent;">Save</button>
            {{--<div class="re-description" style="text-align:center;width: 98%;height:auto;background-color: white;border-radius: 0 0 10px 10px;margin:auto;margin-top: 3px;">--}}
                {{--<span><i class="fa fa-circle" style="font-size: 10px;position:relative;top:-1px;margin-left: 10px;"></i>Number of Seats</span>--}}
                {{--<span><i class="fa fa-genderless" style="font-size: 20px;position:relative;top:2.5px;margin-left: 10px;"></i> Special Table</span>--}}
                {{--<span><i class="far fa-square" style="font-size: 15px;position:relative;top:0px;margin-left: 10px;"></i> Normal Table</span>--}}
                {{--<span style="margin-left: 10px;"><span style="font-size: 10px;color: red">T1,S1</span> Table Number(Normal,Special)</span>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="success-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog" style="width:300px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:300px;border-radius: 10px 10px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 5px 5px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1;position: relative;top:-15px;left:10px;">&times;</button>
                        <h4 class="modal-title">Edit Table<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: 190px;text-align: center">
                        <span>Table number:</span><input type="number" id="table-number-edit" style="margin-top:20px;margin-left:35px;margin-bottom:10px;width: 100px;height: 30px;" required/><br>
                        <span>Number of seats: </span><input type="number" id="seats-number-edit" style="margin-left:12px;margin-bottom:10px;width: 100px;height: 30px;" required/><br>
                        <span>Type of Table:</span><select class="type-select" style="margin-left: 38px;width: 100px;height: 30px;border-radius: 3px;">
                            <option>Normal</option>
                            <option>Special</option>
                        </select>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" id="table-delete" style="height: 30px;background-color: #ff471a;color: white;">Delete</button>
                        <button type="button" class="btn btn-default" id="save-edit" style="height: 30px;background-color: #00cc66;color: white;">Save</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="add-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-add" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal-add" role="dialog" >
            <div class="modal-dialog" style="width:300px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:300px;border-radius: 10px 10px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 5px 5px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="position:relative;top:-10px;left:5px;color: white;opacity: 1">&times;</button>
                        <h4 class="modal-title">Add Table<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: 190px;text-align: center">
                        <span>Table number:</span><input type="number" id="table-number-add" style="margin-top:20px;margin-left:35px;margin-bottom:10px;width: 100px;height: 30px;" required/><br>
                        <span>Number of seats: </span><input type="number" id="seats-number-add" style="margin-left:12px;margin-bottom:10px;width: 100px;height: 30px;" required/><br>
                        <span>Type of Table:</span><select class="type-select1" style="margin-left: 38px;width: 100px;height: 30px;border-radius: 3px;">
                            <option>Normal</option>
                            <option>Special</option>
                        </select>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: #ff4da6;color: white;">Cancel</button>
                        <button type="button" class="btn btn-default" id="create-save" style="height: 30px;background-color: #00cc66;color: white;">Create</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @include('admin.Layout.footer')
@stop
@section('script')
    <!-- data table JS
		============================================ -->
    <script src="{{asset('admin/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('admin/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{asset('admin/js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('admin/js/editable/mock-active.js')}}"></script>
    <script src="{{asset('admin/js/editable/select2.js')}}"></script>
    <script src="{{asset('admin/js/editable/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/editable/xediable-active.js')}}"></script>
    <!-- Chart JS
		============================================ -->
    <script src="{{asset('admin/js/chart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('admin/js/peity/peity-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('admin/js/tab.js')}}"></script>

    <!---------------content part-------------------->
    <script>
        $(document).ready(function() {
            //----------view table loading------------
            var no = $('.no').text();
            $('.list-group-item').css('background','-webkit-linear-gradient(top, #757175 0%, #000000 100%)');
            $('#list-'+no).css('background','');
            $('#list-'+no).css('background','-webkit-linear-gradient(top, orange 0%, #007003 100%)');
            $('.list-group-item').find('i').css('color','red');
            $('#list-c-'+no).css('color','green');
            //----------------end------------------
            $('.reserve-table').dblclick(function () {

                $('.alert-text').css('display', 'none');
                var reserved_id = this.id;
                var table_num = $('#' + reserved_id).find(".table-num").text();
                var t_num =  $('#' + reserved_id).find(".t-num").text();
                var s_num =  $('#' + reserved_id).find(".s-num").text();
                var table_type = $('#' + reserved_id).find(".table-type").text();

                $('#table-number-edit').val(t_num);
                $('#seats-number-edit').val(s_num);
                if(table_type ==  'Special'){
                    $('.type-select').val('Special');
                }else{
                    $('.type-select').val('Normal');
                }
                $('#success-modal').click();
                $('#save-edit').click(function () {
                    var t_num = $('#table-number-edit').val();
                    var s_num = $('#seats-number-edit').val();
                    var t_type = $('.type-select option:selected').text();

                    if (t_num != '' && s_num != '' && t_type != '') {
                        var data = new FormData();
                        data.append('s_num', s_num);
                        data.append('t_num', t_num);
                        data.append('table_num', table_num);
                        data.append('table_type', t_type);
                        $.ajax({
                            type: "POST",
                            url: '{{url("table_edit")}}',
                            data: data,
                            processData: false, // high importance!
                            contentType: false,
                            cache: false,
                            async: true,
                            enctype: 'multipart/form-data',
                            beforeSend: function (request) {
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function (response) {
                                var json = JSON.parse(response);
                                var type = (json['state']);
                                if (type == 200) {
                                    alert('Success changed.');
                                    location.reload();
                                    // window.location.replace('./user/dashboard');

                                } else {
                                    alert('Please confirm your email');
                                }
                            },
                            error: function (response) {
                                console.log(response);
                                alert('failed');
                            }
                        });
                    } else {
                        $('.alert-text').css('display', 'block');
                    }
                });
                $('#table-delete').click(function () {
                    var data = new FormData();
                    data.append('table_num', table_num);
                    $.ajax({
                        type: "POST",
                        url: '{{url("table_delete")}}',
                        data: data,
                        processData: false, // high importance!
                        contentType: false,
                        cache: false,
                        async: true,
                        enctype: 'multipart/form-data',
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function (response) {
                            var json = JSON.parse(response);
                            var type = (json['state']);
                            if (type == 200) {
                                alert('Success deleted.');
                                location.reload();
                                // window.location.replace('./user/dashboard');

                            } else {
                                alert('Please confirm your email');
                            }
                        },
                        error: function (response) {
                            console.log(response);
                            alert('failed');
                        }
                    });
                });
            });
            $('.table-add').click(function () {
                $('#add-modal').click();
            });
            $('#create-save').click(function () {
                var restaurant_id=$('.restaurant-id').text();
                var floors_num=$('.no').text();
                var t_num = $('#table-number-add').val();
                var s_num = $('#seats-number-add').val();
                var t_type = $('.type-select1 option:selected').text();
                if (t_num != '' && s_num != '') {
                    var data = new FormData();
                    data.append('s_num', s_num);
                    data.append('t_num', t_num);
                    data.append('table_type', t_type);
                    data.append('restaurant_id', restaurant_id);
                    data.append('floors_num', floors_num);

                    $.ajax({
                        type: "POST",
                        url: '{{url("table_add")}}',
                        data: data,
                        processData: false, // high importance!
                        contentType: false,
                        cache: false,
                        async: true,
                        enctype: 'multipart/form-data',
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function (response) {
                            var json = JSON.parse(response);
                            var type = (json['state']);
                            if (type == 200) {
                                alert('Success created.');
                                location.reload();
                                // window.location.replace('./user/dashboard');

                            } else {
                                alert('Please confirm your email');
                            }
                        },
                        error: function (response) {
                            console.log(response);
                            alert('failed');
                        }
                    });
                }
            });

        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log('ready');
            $('#master_item').addClass('active1');
            $('#client_list').addClass('active');
            $('#client_list .has-arrow').attr('aria-expanded','true');
            $('#client_list ul').addClass('show');
            $('.breadcome-menu').html('');
            $('.breadcome-menu').append('' +
                '<li>' +
                '<a href="">View</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Restaurant</span>\n' +
                '</li>');
        });

    </script>
    <script>
        $(document).ready(function(){
            var kk = $('.total_counts').text();
            var kk1 = $('.total_counts1').text();
            // alert(kk);
        $('.create-save').click(function () {
            var kk = $('.total_counts').text();
            var co_x=[];var co_y=[];var co_id=[];
            var point=$('.floor-create').position();
            var point_x=point.top;
            var point_y=point.left;
            var width=$('.floor-create').width();
            var height=$('.floor-create').height();
            for(i1=0;i1<kk;i1++){
                if($("#mydiv"+i1).length){
                    if(($('#mydiv'+i1).position()).top > point_x && ($('#mydiv'+i1).position()).left > point_y){
                    co_id[i1]=$('#mydiv'+i1).find('.table-num').text();
                    co_x[i1]=(($('#mydiv'+i1).position()).top-point_x)/height;
                    co_y[i1]=(($('#mydiv'+i1).position()).left-point_y)/width;
                    }
                }
            }
            var data = new FormData();
            data.append('co_id', JSON.stringify(co_id));
            data.append('co_x', JSON.stringify(co_x));
            data.append('co_y', JSON.stringify(co_y));
            data.append('counts',kk);

            $.ajax({
                type: "POST",
                url: '{{url("floor_create")}}',
                data: data,
                processData: false, // high importance!
                contentType: false,
                cache: false,
                async: true,
                enctype: 'multipart/form-data',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    var type = (json['state']);
                    if (type == 200) {
                        // alert('success');

                        alert('Success created');
                        // location.reload();
                        // window.location.replace('./user/dashboard');

                    }
                },
                error: function (response) {
                    console.log(response);
                    alert('create failed');
                }
            });
        });

        //Make the DIV element draggagle:
        // alert()
        // var width=$('.reservation').width();
        // alert(width);
        // $(selector).offset({top:value, left:value})
        var x=$('.tool0').position();
        var top0=x.top;var left0=x.left;
        if($("div").hasClass("mydiv1")){
            $('.mydiv1').offset({top:top0, left:left0+30});
        }else{
            top0=top0-40;
        }
        if($("div").hasClass("mydiv2")){
            $('.mydiv2').offset({top:top0+40, left:left0+29});
        }else{
            top0=top0-40;
        }
        if($("div").hasClass("mydiv3")){
            $('.mydiv3').offset({top:top0+85, left:left0+23});
        }else{
            top0=top0-45;
        }
        if($("div").hasClass("mydiv4")){
            $('.mydiv4').offset({top:top0+130, left:left0+16});
        }else{
            top0=top0-60;
        }
        if($("div").hasClass("mydiv5")){
            $('.mydiv5').offset({top:top0+190, left:left0+10});
        }else{
            top0=top0-60;
        }
        if($("div").hasClass("mydiv6")){
            $('.mydiv6').offset({top:top0+250, left:left0+1});
        }else{
            top0=top0-60;
        }
        if($("div").hasClass("mydiv7")){
            $('.mydiv7').offset({top:top0+310, left:left0-5});
        }else{
            top0=top0-60;
        }
        if($("div").hasClass("mydiv8")){
            $('.mydiv8').offset({top:top0+370, left:left0-20});
        }

        var top1=x.top;left1=x.left;
            if($("div").hasClass("mydivs1")){
                $('.mydivs1').offset({top:top1, left:left1+125});
            }else{
                top1=top1-40;
            }
            if($("div").hasClass("mydivs3")){
                $('.mydivs3').offset({top:top1+50, left:left1+118});
            }else{
                top1=top1-50;
            }
            if($("div").hasClass("mydivs4")){
                $('.mydivs4').offset({top:top1+100, left:left1+110});
            }else{
                top1=top1-65;
            }
            if($("div").hasClass("mydivs5")){
                $('.mydivs5').offset({top:top1+165, left:left1+103});
            }else{
                top1=top1-55;
            }
            if($("div").hasClass("mydivs6")){
                $('.mydivs6').offset({top:top1+220, left:left1+95});
            }else{
                top1=top1-60;
            }
            if($("div").hasClass("mydivs7")){
                $('.mydivs7').offset({top:top1+280, left:left1+86});
            }else{
                top1=top1-62;
            }
            if($("div").hasClass("mydivs8")){
                $('.mydivs8').offset({top:top1+342, left:left1+78});
            }else{
                top1=top1-68;
            }
            if($("div").hasClass("mydivs9")){
                $('.mydivs9').offset({top:top1+410, left:left1+70});
            }
        for(i=0;i<kk;i++){
            if($("#mydiv"+i).length){
                dragElement(document.getElementById("mydiv"+i));
                dragElement(document.getElementById("mydivheader"+i));
            }
        }
        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            if (document.getElementById(elmnt.id + "header")) {
                /* if present, the header is where you move the DIV from:*/
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
                /* otherwise, move the DIV from anywhere inside the DIV:*/
                elmnt.onmousedown = dragMouseDown;
            }

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
        });
    </script>
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop






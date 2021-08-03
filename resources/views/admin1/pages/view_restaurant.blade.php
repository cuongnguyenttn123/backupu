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

    <!-------- content--------->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    {{--<script src="{{asset('user/plugins/bootstrap/js/bootstrap.js')}}"></script>--}}
    {{--<script src="{{asset('user/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>--}}

    {{--<script src="{{asset('user/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>--}}

    {{--<!-- Waves Effect Plugin Js -->--}}
    {{--<script src="{{asset('user/plugins/node-waves/waves.js')}}"></script>--}}
    {{--<script src="{{asset('user/js/admin.js')}}"></script>--}}

    {{--<script src="{{asset('user/plugins/jquery-countto/jquery.countTo.js')}}"></script>--}}
    {{--<!-- Demo Js -->--}}
    {{--<script src="{{asset('user/js/demo.js')}}"></script>--}}
    <style>
        .create-content{
            width: 97.5%;
            height: 600px;
            overflow: auto;
            margin:auto;
            margin-top: 0px;
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

        <div class="reservation" style="padding-bottom:10px;margin:auto;width: 98%;height: auto;min-height:300px;box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);background-image: url('{{asset('welcome/img/grid3.jpg')}}')">
            <div class="time-bar" style="display:flex;width: 98%;scroll:none;margin:auto;height: 30px;background-color: white;overflow: auto;">
                @for($i=1;$i<$num_floors+1;$i++)
                    <p class="list-{{$i}}" style="display: none;">{{$i}}</p>
                    <a href="{{url('view/restaurant/'.$i.'/'.$res_id)}}" class="list-group-item" id="list-{{$i}}" style="white-space: nowrap;color: #555;background: -webkit-linear-gradient(top, #757175 0%, #000000 100%);cursor: pointer;color:white"><span style="color: white;position:relative;top:-6px;"><i id="list-c-{{$i}}" class="fa fa-circle" style="font-size: 10px;position:relative;top:-1px;color:red;margin-right: 10px;"></i>Floor{{$i}}</span></a>
                @endfor
            </div>
            <p class="no" style="display: none">{{$num}}</p>
            <p class="restaurant-id" style="display:none ">{{$res_id}}</p>
            <p class="floors-num" style="display:none ">{{$num_floors}}</p>
            <table id="reserve" style="width:98%;height:77%;">
                @php
                    $k=0;
                @endphp
                @php
                    $table_counts=count($table_view);
                        if($table_counts<20){
                            $x=floor(sqrt($table_counts));
                            if(($x*$x)==$table_counts){
                                $rows=$x;$rows1=$x;
                            }else{
                                $rows=$x;$rows1=$x+2;
                            }
                        }
                        else{
                            if(($table_counts%5) == 0){
                                $rows1 = 5;
                                $rows = floor($table_counts/5);
                            }else{
                                $rows1 = 5;
                                $rows = floor($table_counts/5)+1;
                            }
                        }
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
                @for($i=0;$i<$rows;$i++)
                    <tr>
                        @for($j=0;$j<$rows1;$j++)
                            <td>
                                @php
                                    $k=$k+1;
                                @endphp
                                @if($k <= $table_counts)
                                    @if(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 0)
                                        @if(($table_view[$k-1]->num_seats) == 1)
                                            <i class="fas fa-chair" style="color:green;font-size: 13.5px;position:relative;top:4px;left:1px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:-5px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 2)
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 3)
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-4.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 4)
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-6px"></i>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 5)
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 6)
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:-2.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:4px;transform: rotate(90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:40px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) > 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:7px;background-color:#bdd8a7;border:1px solid green;width:50px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:green;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:30px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @endif
                                    @elseif(($table_view[$k-1]->type) == 'Normal' && ($table_view[$k-1]->state) == 1)
                                        @if(($table_view[$k-1]->num_seats) == 1)
                                            <i class="fas fa-chair" style="color:red;font-size: 13.5px;position:relative;top:4px;left:1px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:-5px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 2)
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-11px;transform: rotate(-90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:13px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 3)
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-4.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:1px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:6px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 4)
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:23px;transform: rotate(-180deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-12px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-6px"></i>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-1px;transform: rotate(90deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:12px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 5)
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:6px"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:10px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:11px;transform: rotate(90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-29px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:40px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 6)
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:27px;transform: rotate(-180deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:-2.5px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:-2px"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;left:2px;"></i>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:4px;transform: rotate(90deg);"></i></span>
                                            <span class=""><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-25px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:40px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;background-color:#ff9999;border:1px solid red;width:50px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) > 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:60px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:31px;transform: rotate(-180deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:0px;transform: rotate(-90deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:23px;left:1px;transform: rotate(90deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:43.5px;left:-30px;transform: rotate(180deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:9px;background-color:#ff9999;border:1px solid red;width:50px;height:30px;margin:auto;border-radius: 3px;padding-bottom: 3px;">
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="label-count1" style="font-size: 12px;color:red;font-weight: bold;position:relative;top:5px;">T{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Normal</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:30px;font-size: 12px;font-weight: bold;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @endif
                                    @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 0)
                                        @if(($table_view[$k-1]->num_seats) == 1)
                                            <i class="fas fa-chair" style="color:green;font-size: 15px;position:relative;top:5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 2)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 3)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 4)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 5)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3.5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 6)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 8)
                                            <i class="fas fa-chair" style="color:green;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:0px;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) > 8)
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:green;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:green;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:green;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2.5px;left:0px;background-color:#bdd8a7;border:1px solid green;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:green;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @endif
                                    @elseif(($table_view[$k-1]->type) == 'Special' && ($table_view[$k-1]->state) == 1)
                                        @if(($table_view[$k-1]->num_seats) == 1)
                                            <i class="fas fa-chair" style="color:red;font-size: 15px;position:relative;top:5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 2)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:-12px;font-size: 14px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:23.5px;left:13px;font-size: 14px;transform: rotate(90deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 3)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:-3px;font-size: 13px;transform: rotate(-120deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:33px;left:3px;font-size: 13px;transform: rotate(120deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:30px;height:30px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:4px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 4)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:0.5px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;left:7.5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:26px;left:15px;font-size: 13px;transform: rotate(90deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:48px;left:-21.2px;font-size: 13px;transform: rotate(180deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:10px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 5)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:17px;font-size: 13px;transform: rotate(-144deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:-4.5px;font-size: 13px;transform: rotate(-72deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3.5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:18px;left:6.5px;font-size: 13px;transform: rotate(72deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:43px;left:-16px;font-size: 13px;transform: rotate(144deg);"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;left:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 6)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:27px;font-size: 13px;transform: rotate(-150deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:1px;font-size: 13px;transform: rotate(-90deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6.5px;left:-2px;transform: rotate(-30deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:6.5px;left:3px;font-size: 13px;transform: rotate(30deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:25px;left:-1px;font-size: 13px;transform: rotate(90deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:45px;left:-27px;font-size: 13px;transform: rotate(150deg);margin-bottom: -5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:35px;height:35px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) == 7)
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:34px;font-size: 13px;transform: rotate(-153deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:7px;font-size: 13px;transform: rotate(-102deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:-4px;font-size: 13px;transform: rotate(-51deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:4px;left:1px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:15px;left:7px;font-size: 13px;transform: rotate(51deg);"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:35px;left:-4.5px;font-size: 13px;transform: rotate(102deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-33px;font-size: 13px;transform: rotate(153deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:1px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>

                                        @elseif(($table_view[$k-1]->num_seats) == 8)
                                            <i class="fas fa-chair" style="color:red;position:relative;top:51px;left:42px;font-size: 13px;transform: rotate(-157.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:15px;font-size: 13px;transform: rotate(-112.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:-1px;font-size: 13px;transform: rotate(-67.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:6px;left:-2px;transform: rotate(-22.5deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:6px;left:3px;font-size: 13px;transform: rotate(22.5deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:20px;left:1px;font-size: 13px;transform: rotate(67.5deg);"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:38px;left:-15px;font-size: 13px;transform: rotate(112.5deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:50px;left:-41px;font-size: 13px;transform: rotate(157.5deg);margin-bottom: -5px;"></i>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2px;left:0px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @elseif(($table_view[$k-1]->num_seats) > 8)
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:45px;font-size: 13px;transform: rotate(-140deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:20px;font-size: 13px;transform: rotate(-112deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:4.5px;font-size: 13px;transform: rotate(-70deg);"></i></span>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(-40deg);margin-bottom: -5px;"></i>
                                            <i class="fas fa-chair" style="color:red;font-size: 13px;position:relative;top:3px;"></i>
                                            <i class="fas fa-chair" style="color:red;position:relative;top:7px;font-size: 13px;transform: rotate(40deg);"></i>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:19.5px;left:-4.5px;font-size: 13px;transform: rotate(70deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:36.5px;left:-20px;font-size: 13px;transform: rotate(112deg);"></i></span>
                                            <span class="chair"><i class="fas fa-chair" style="color:red;position:relative;top:48.5px;left:-45px;font-size: 13px;transform: rotate(140deg);"></i></span>
                                            <div id="t-{{$k}}" class="reserve-table" style="position:relative;top:-2.5px;left:0px;background-color:#ff9999;border:1px solid red;width:40px;height:40px;border-radius:50%;margin:auto;">
                                                <span class="s-num" style="display: none">{{$table_view[$k-1]->num_seats}}</span>
                                                <span class="t-num" style="display: none">{{$table_view[$k-1]->table_num}}</span>
                                                <span class="label-count1" style="position:relative;top:6px;left:-1px;font-size: 12px;color:red;font-weight: bold;">S{{$table_view[$k-1]->table_num}}</span>
                                                <p class="res-id" style="display: none;">{{$table_view[$k-1]->res_id}}</p>
                                                <p class="floor-num" style="display: none;">{{$table_view[$k-1]->floor_num}}</p>
                                                <p class="table-num" style="display: none;">{{$table_view[$k-1]->id}}</p>
                                                <p class="table-type" style="display: none;">Special</p>
                                            </div>
                                            <span class="label-count3" style="position:relative;top:0px;font-size: 12px;font-weight: bold;background:white;border-radius: 6px;">{{$table_view[$k-1]->num_seats}}</span><br>
                                        @endif
                                    @endif
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
            <div class="re-description" style="text-align:center;width: 98%;height:auto;background-color: white;border-radius: 0 0 10px 10px;margin:auto;margin-top: 3px;">
                <span><i class="fa fa-circle" style="font-size: 10px;position:relative;top:-1px;margin-left: 10px;"></i>Number of Seats</span>
                <span><i class="fa fa-genderless" style="font-size: 20px;position:relative;top:2.5px;margin-left: 10px;"></i> Special Table</span>
                <span><i class="far fa-square" style="font-size: 15px;position:relative;top:0px;margin-left: 10px;"></i> Normal Table</span>
                <span style="margin-left: 10px;"><span style="font-size: 10px;color: red">T1,S1</span> Table Number(Normal,Special)</span>
            </div>
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
            $('.reserve-table').click(function () {

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


@stop






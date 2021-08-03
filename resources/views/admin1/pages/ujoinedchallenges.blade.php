@extends('admin1.Layout.pagetemplate')
@section('head')
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/x-editor-style.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/data-table/bootstrap-editable.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        .modal-edu-general .modal-body {
            text-align: center;
            padding: 20px 70px;
        }
    </style>
<style type="text/css">
  /* Ibrahim Jabbari -- www.ibrahimjabbari.com */
    @import url(https://fonts.googleapis.com/css?family=Arvo:700);
    @import url(https://fonts.googleapis.com/css?family=Seaweed+Script);
    body {
      background-color: white;
    }
    .plate {
      width: 410px;

    }
    .shadow {
      color:#0470e2;
      font-family: Arvo;
      font-weight: bold;
          text-shadow: -3px -3px 0 #712d2d, 7px -2px 0 #612db7, -3px 3px 0 #222, 3px 3px 0 #222, 4px 4px 0 #fff, 5px 5px 0 #fff, 6px 6px 0 #fff, 7px 7px 0 #fff;
      line-height: 0.8em;
      letter-spacing: 0.1em;
      transform: scaleY(0.7);
      -webkit-transform: scaleY(0.7);
      -moz-transform: scaleY(0.7);
      margin:0;
      text-align: center;
    }
    .script {
      font-family: "Seaweed Script";
      color: #fff;
      text-align: center;
      font-size: 40px;
      position: relative;
      margin:0;
    }
    .script span {
      background-color: #222;
      padding: 0 0.3em;
    }
    .script:before {
      content:"";
      display: white;
      position: absolute;
      z-index:-1;
      top: 50%;
      width: 100%;
      border-bottom: 3px solid #fff;
    }
    .text1 {
      font-size: 60px;
    }
    .text2 {
      font-size: 169px;
    }
    .text3 {
      font-size: 100px;
    }

    .imagediv{
        margin-bottom: 10px;
        margin: auto;
        float:left;
        width:80px;
    }
    .imagediv .image-card {
        height: 80px;
        width:80px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        border: 1px solid lavender;
    }
    .nondisplay{
        display: none;
    }
    .imagediv span{
        position: relative;
        text-shadow: 2px 2px 5px black;
        color: white;
        font-size: 20px;
        left:29px;
        top:35px;
    }
    .p4div{
        width:380px;
        min-width:380px;
        max-width:381px;
    }
    .p2div{
        width:200px;
        min-width:200px;
        max-width:201px;
    }
    .p1div{
        width:100px;
        min-width:100px;
        max-width:101px;
    }
</style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="{{asset('adminp/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('admin1.Layout.header')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">All Users</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="rank">Rank</th>
                                        <th data-field="name" data-editable="">Name</th>
                                        <th data-field="email" data-editable="">Email</th>
                                        <th data-field="voted count" data-editable="">Voted Count</th>
                                        <th data-field="votes" data-editable="">Votes</th>
                                        <th data-field="wallet" data-editable="">Manual Votes Settings</th>
                                        <th data-field="action">Join Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @for($i=0;$i<count($ujoincs);$i++)
                                            @php
                                                $item = json_decode(json_encode($ujoincs[$i]), true);
                                            @endphp
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    {{$item['rank']}}
                                                </td>
                                                <td>
                                                    {{$item['name']}}
                                                </td>
                                                <td style="max-width:">
                                                    {{$item['email']}}
                                                </td>
                                                <td>
                                                    {{$item['d_vote']}}
                                                </td>
                                                <td class="u-{{$item['id']}}">
                                                    {{$item['vote_count']}}
                                                </td>

                                                    @if($c == 1)
                                                <td class="p1div">
                                                    @elseif($c == 2)
                                                <td class="p2div">
                                                    @else
                                                <td class="p4div">
                                                    @endif

                                                    <span id="cid-{{$i}}" class="nondisplay">{{$item['c-id']}}</span>
                                                    <span id="uid-{{$i}}" class="nondisplay">{{$item['u-id']}}</span>
                                                    @for($j=0;$j<count($images);$j++)
                                                        @php
                                                            $item1 = json_decode(json_encode($images[$j]), true);
                                                        @endphp

                                                        @if($item1['u-id'] == $item['u-id'])

                                                           @switch($c)
                                                                @case (1)
                                                                <div style="width:80px;margin-left:5px;">
                                                                    <div class="col-5 imagediv" style="padding-left:10px;">
                                                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url({{$item1['url']}});">
                                                                            <span class="i-{{$item1['id']}}" id="vote-{{$item['u-id']}}-0" style="">{{$item1['vote']}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5 imagediv" style="padding-left:10px;width:90px;" >
                                                                    <input type="text" name="{{$item['id']}}" class="votes-{{$item['u-id']}}-0" id="{{$item1['id']}}" value="{{$item1['vote']}}" onchange="myFunction(this.value,this.id,this.name)" style="width:100%;border:1px solid gray;position:relative;top:5px;text-align:center;"><br>
<!--                                                                        <input type="button" id="" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;cursor:pointer;">-->
                                                                    </div>
                                                                </div>

                                                                @break
                                                                @case (2)
                                                                <div style="width:80px;float:left;margin-left:10px;">
                                                                    <div class="col-3 imagediv" style="padding:0">
                                                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url({{$item1['url']}});">
                                                                            <span class="i-{{$item1['id']}}" id="vote-{{$item['u-id']}}-0" style="right:20%;">{{$item1['vote']}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 imagediv" style="padding:0;margin-left:0%;margin-right:5%;" >
                                                                    <input type="text" name="{{$item['id']}}" class="votes-{{$item['u-id']}}-0" id="{{$item1['id']}}" value="{{$item1['vote']}}" onchange="myFunction(this.value,this.id,this.name)" style="width:100%;border:1px solid gray;position:relative;top:5px;text-align:center;"><br>
<!--                                                                        <input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">-->
                                                                    </div>
                                                                </div>


                                                                @break
                                                                @case (4)
                                                                <div style="width:80px;float:left;margin-left:8px;">
                                                                    <div class="col-3 imagediv" style="padding:0">
                                                                        <div id="p-{{$item['u-id']}}-0" class="image-card" style="background-image:url({{$item1['url']}});">
                                                                            <span class="i-{{$item1['id']}}" id="vote-{{$item['u-id']}}-0" style="right:20%;">{{$item1['vote']}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 imagediv" style="padding:0;margin-left:0%;margin-right:5%;" >
                                                                    <input type="text" name="{{$item['id']}}" class="votes-{{$item['u-id']}}-0" id="{{$item1['id']}}" value="{{$item1['vote']}}" onchange="myFunction(this.value,this.id,this.name)" style="width:100%;border:1px solid gray;position:relative;top:5px;text-align:center;"><br>
<!--                                                                        <input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">-->
                                                                    </div>
                                                                </div>

                                                                @break
                                                                @default
                                                                @break
                                                            @endswitch

                                                        @endif
                                                    @endfor
                                                </td>
                                                <td>
                                                    {{$item['ujoinc_date']}}
                                                </td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
    @include('admin1.Layout.footer')
@stop
@section('script')
    <!-- data table JS
		============================================ -->
    <script src="{{asset('adminp/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('adminp/js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{asset('adminp/js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('adminp/js/editable/mock-active.js')}}"></script>
    <script src="{{asset('adminp/js/editable/select2.js')}}"></script>
    <script src="{{asset('adminp/js/editable/moment.min.js')}}"></script>
    <script src="{{asset('adminp/js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('adminp/js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('adminp/js/editable/xediable-active.js')}}"></script>
    <!-- Chart JS
		============================================ -->
    <script src="{{asset('adminp/js/chart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('adminp/js/peity/peity-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('adminp/js/tab.js')}}"></script>
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
                '<a href="">Home</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Users</span>\n' +
                '</li>');
        });

    </script>
    <script>
        $( document ).ready(function() {
            $('.pd-setting-ed').click(function(){
                var id=this.id;
                var a_name=$('#'+id).find('.o-name').text();
                var a_email=$('#'+id).find('.o-email').text();

                $('#name-add').text(a_name);
                $('#email-add').text(a_email);

                $('#add-modal').click();

            });
        });

    </script>
    <script>
        function myFunction(val,val1,val2) {
            //  alert(val);alert(val1);
              var  data = new FormData();
                data.append('id', val1);
                data.append('value', val);
                $.ajax({
                    type: "POST",
                    url: '{{url('/change_vote0')}}',
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
                        //alert(obj.message);
                        $('.u-'+val2).text(obj.data);
                        $('.i-'+val1).text(val);
                        // console.log(obj);
                    },
                    error: function(response){

                        console.log(response);
                        alert('error');

                    }
                });

        }
    </script>

@stop

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
                                <h1><span class="table-project-n">Reported Photos</span></h1>
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
                                        <th data-field="no">No</th>
                                        <th data-field="id1">Photo ID</th>
                                        <th data-field="vote" data-editable="">Master ID</th>
                                        <th data-field="city" data-editable="">Master Email</th>
                                        <th data-field="buyer">Challenge ID</th>
                                        <th data-field="bemail">View Photo</th>
                                        <th data-field="sellerapproval" data-editable="">Reported Date</th>
                                        <th data-field="action">Action</th>                                       <th data-field="buyerapproval" data-editable="">Reported By</th>
                                 
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<count($bid);$i++)
                                            @php
                                                $item = json_decode(json_encode($bid[$i]), true);
                                            @endphp
                                            <tr>
                                                <td></td>
                                                <td>
                                                    {{$i+1}}
                                                </td>
                                                <td>
                                                    {{$item['img_id']}}
                                                </td>
                                                <td>
                                                    {{$item['u-id']}}
                                                </td>                                    
                                                <td>
                                                    {{$item['master_email']}}
                                                </td>
                                                <td>
                                                    {{$item['c-id']}}
                                                </td>
                                                <td >
                                                    <a class="single-popup" href={{$item['url']}}><button class="button button1" style="    margin-top: 0px;          border-radius: 4px;    background-color: transparent;    padding: 4px 14px 4px 14px;">View</button></a>
                                                </td>
                                                <td>
                                                    {{$item['datetime1']}}
                                                </td>
                                                <td>
                                                    <!--{{$item['r_state']}}-->
                                                    <select id="s{{$i}}" onchange="selectitem('{{$item['rid']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                            @php
                                                        switch ($item['r_state']){
                                                            case '1':
                                                                echo "color:black";
                                                                break;
                                                            case '2':
                                                                echo "color:blue";
                                                                break;
                                                            case '3':
                                                                echo "color:green";
                                                                break;
                                                            case '4':
                                                                echo "color:yellow";
                                                                break;
                                                            default:
                                                                echo "color:red";
                                                                break;
                                                                                                }
                                                    @endphp">
                                                        <option  @php if($item['r_state']=='request') echo "selected";@endphp value="1">{{$item['r_state']}}</option> 
                                                        <option  @php if($item['r_state']=='accepted') echo "selected";@endphp value="2">Accepted</option>
                                                        <option  @php if($item['r_state']=='cancel') echo "selected";@endphp value="3">Cancel</option>
                                                        <option  @php if($item['r_state']=='delete') echo "selected";@endphp value="4">Delete</option> 
                                                    </select>
                                                </td>
                                                <td>
                                                    {{$item['email']}}
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
                '<span class="bread-blod">Reported Photos</span>\n' +
                '</li>');
        });

    </script>
    <script>
       function selectitem(item, selectObject,id){
          
            var value = selectObject.value;
            var val='';
            switch (value) {
                
                case '1':
                    $('#'+id).css("color","blue");
                    val='Request';
                    break;    
                case '2':
                    $('#'+id).css("color","blue");
                    val='Accepted';
                    break;
                case '3':
                    $('#'+id).css("color","blue");
                    val='Cancel';
                    break;    
                
                case '4':
                $('#'+id).css("color","blue");
                    val='Delete';
                    break;
                
                default:
                    $('#'+id).css("color","red");
                    val='error';
                    break;
            }
             
            
            var  data = new FormData(); 
            data.append('item', item);
            data.append('val', val);
         console.log(item);
         console.log(val); 
 


            $.ajax({ 
                type: "POST",
                url: '{{url('/report_permission0')}}',
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
                  location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error123');

                }
            });
               
        }
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    

@stop

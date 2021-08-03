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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>
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
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">Reservation</span> Table</h1>
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
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="">Restaurant</th>
                                        <th data-field="num1" data-editable="">Floor.No</th>
                                        <th data-field="num2" data-editable="">Table.No</th>
                                        <th data-field="text" data-editable="">Table Type</th>
                                        <th data-field="text1" data-editable="">Date/Time</th>
                                        <th data-field="num4" data-editable="">Amount</th>
                                        <th data-field="num3" data-editable="">Phone Number</th>
                                        <th data-field="email" data-editable="">Customer Email</th>
                                        <th data-field="state1">State</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counts=count($admins);
                                    @endphp
                                    @for($i=0;$i<$counts;$i++)
                                        <tr>
                                            <td></td>
                                            <td>{{$admins[$i]->id}}</td>
                                            <td>{{$admins[$i]->res_name}}</td>
                                            <td>{{$admins[$i]->floor_num}}</td>
                                            <td>{{$admins[$i]->table_num}}</td>
                                            <td>{{$admins[$i]->table_type}}</td>
                                            <td>{{$admins[$i]->reserved_time}}</td>
                                            <td>{{$admins[$i]->numbers}}</td>
                                            <td>{{$admins[$i]->user_phone}}</td>
                                            <td>{{$admins[$i]->user_email}}</td>
                                            <td class="datatable-ct1">
                                                <select id="s-{{$i}}" onchange="selectitem('{{$admins[$i]->id}}',this,'s-'+'{{$i}}')" style="
                                                 @php
                                                    switch ($admins[$i]->permission){
                                                        case '0':
                                                           echo "color:#000000";
                                                            break;
                                                        case '1':
                                                            echo "color:#0000cc";
                                                            break;
                                                        case '2':
                                                            echo "color:#ff0000";
                                                            break;
                                                        default:
                                                            echo "color:#ff0000";
                                                            break;}
                                                @endphp">
                                                    <option  @php if(($admins[$i]->permission) == '0') echo "selected";@endphp value="0">New</option>
                                                    <option  @php if(($admins[$i]->permission) == '1') echo "selected";@endphp value="1">Approve</option>
                                                    <option  @php if(($admins[$i]->permission) == '2') echo "selected";@endphp value="2">Cancel</option>
                                                    <option  @php if(($admins[$i]->permission) == '3') echo "selected";@endphp value="3">Delete</option>
                                                </select>
                                            </td>
                                            <td class="datatable-ct">
                                                <button id="edit-{{$i}}" title="Edit" class="pd-setting-ed">
                                                    <i class="fa fa-eye"></i>
                                                    <p class="o-id" style="display: none;">{{$admins[$i]->id}}</p>
                                                    <p class="o-name" style="display: none;">{{$admins[$i]->user_address}}</p>
                                                    <p class="o-email" style="display: none;">{{$admins[$i]->description}}</p>
                                                </button>
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
    {{--deposit dlg--}}
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="add-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-add" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal-add" role="dialog" >
            <div class="modal-dialog" style="width:450px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:450px;border-radius: 10px 10px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 5px 5px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="position:relative;top:-10px;left:5px;color: white;opacity: 1">&times;</button>
                        <h4 class="modal-title">Rervation Table<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: auto;text-align: center">
                        <span>*Address*</span><p id="name-add" style="margin:auto;padding:5px;width: 300px;height: 30px;" required></p><br>
                        <span>-Description-</span><p id="email-add" style="margin:auto;padding:5px;width: 300px;height: 30px;" required></p><br>

                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                         <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: #00cc66;color: white;">Close</button>
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
                '<span class="bread-blod">Reservations</span>\n' +
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

        function selectitem(item,selectObject,id) {
            var value = selectObject.value;
            var val='';
            switch (value) {
                case '0':
                    $('#'+id).css('color','#000000');
                    val='New';
                    break;
                case '1':
                    $('#'+id).css('color','#0000cc');
                    val='Approve';
                    break;
                case '2':
                    $('#'+id).css('color','#ff0000');
                    val='Cancel';
                    break;
                case '3':
                    $('#'+id).css('color','#e6005c');
                    val='Delete';
                    break;
                default:
                    val='error';
                    break;
            }
            var data = new FormData();
            data.append('id', item);
            data.append('permission', val);

            $.ajax({
                type: "POST",
                url: '{{url("reserve_permiss")}}',
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
                        location.reload();
                    } else {
                        alert('Please confirm your info');
                    }
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
        }
    </script>
@stop

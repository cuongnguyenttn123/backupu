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
        .action{
            min-width: 120px;!important;
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
                                <h1><span class="table-project-n">Restaurant</span> Table</h1>
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
                                        <th>No</th>
                                        <th data-field="id1">ID</th>
                                        <th data-field="name" data-editable="">Name</th>
                                        <th data-field="num1" data-editable="">Floors</th>
                                        <th data-field="num2" data-editable="">Tables</th>
                                        <th data-field="email1" data-editable="">Admin Email</th>
                                        <th data-field="email" data-editable="">Manager Email</th>
                                        <th data-field="state1" data-editable="">state</th>
                                        <th data-field="action" class="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $k=count($restaurants);
                                    @endphp
                                    @for($i=0;$i<$k;$i++)
                                    <tr>
                                        <td></td>
                                        <td>{{$i+1}}</td>
                                        <td>{{$restaurants[$i]->id}}</td>
                                        <td>{{$restaurants[$i]->name}}</td>
                                        <td>{{$restaurants[$i]->num_floors}}</td>
                                        <td>{{$restaurants[$i]->total_tables}}</td>
                                        <td>{{$restaurants[$i]->admin_email}}</td>
                                        <td>{{$restaurants[$i]->manager_email}}</td>
                                        <td class="datatable-ct">
                                            <select id="s-{{$i}}" onchange="selectitem('{{$restaurants[$i]->id}}',this,'s-'+'{{$i}}')" style="
                                                 @php
                                                switch ($restaurants[$i]->permission){
                                                    case '0':
                                                        echo "color:#0000cc";
                                                        break;
                                                    case '1':
                                                        echo "color:#ff0000";
                                                        break;
                                                    default:
                                                        echo "color:#ff0000";
                                                        break;}
                                            @endphp">
                                                <option  @php if(($restaurants[$i]->permission) == '0') echo "selected";@endphp value="0">Active</option>
                                                <option  @php if(($restaurants[$i]->permission) == '1') echo "selected";@endphp value="1">Disabled</option>
                                            </select>
                                        </td>
                                        <td class="datatable-ct" style="min-width: 100px;">
                                            @if($per == 0 || $per == 2)
                                            <button id="{{$restaurants[$i]->name}}" class="res-edit" title="Edit res" class="pd-setting-ed" style="border-radius: 3px;border: 1px solid gray;">
                                                <i class="far fa-edit" style="color: black"></i>
                                                <p class="a" style="display: none">{{$restaurants[$i]->admin_email}}</p>
                                                <p class="m" style="display: none">{{$restaurants[$i]->manager_email}}</p>
                                                <p class="floors" style="display: none">{{$restaurants[$i]->num_floors}}</p>
                                                <p class="id" style="display: none">{{$restaurants[$i]->id}}</p>
                                            </button>
                                            @endif
                                            @php
                                                $url=$restaurants[$i]->name;
                                            @endphp
                                            <a href="{{url('view/restaurant1/'.$url.'/'.'1')}}">
                                                <button  id="{{$restaurants[$i]->id}}" class="res-view" title="View Restaurant" class="pd-setting-ed" style="border-radius: 3px;border: 1px solid gray;">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            @if($per == 0 || $per == 2)
                                            <button  id="{{$restaurants[$i]->id}}" class="res-del" title="del Restaurant" class="pd-setting-ed" style="width: 30px;border-radius: 3px;border: 1px solid gray;">
                                                <i class="fa fa-remove" style="font-size:14px;color:red"></i>
                                            </button>
                                            @endif
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
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="edit-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal2" role="dialog" >
            <div class="modal-dialog" style="width:400px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:400px;border-radius: 3px 3px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 3px 3px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1;position: relative;top:-10px;left:5px;">&times;</button>
                        <h4 class="modal-title">Edit Table<span></span></h4>
                    </div>
                    <div class="modal-body-edit" style="height: auto;text-align: center">
                        <span class="rid" style="display: none;"></span>
                        <span>Admin Email:</span><input type="email" id="admin-mail" style="padding:3px;margin-top:20px;margin-left:30px;margin-bottom:10px;width: 180px;height: 30px;" required/><br>
                        <span>Manager Email:</span><input type="email" id="manager-mail" style="padding:3px;margin-left:17px;margin-bottom:10px;width: 180px;height: 30px;" required/><br>
                        <div class="floor-content" style="width: 67%;padding:5px;margin:auto;margin-bottom:10px;height: 70px;overflow: auto;border: 1px solid lightgrey;"></div>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: hotpink;color: white;">Cancel</button>
                        <button type="button" class="btn btn-default" id="save-edit" style="height: 30px;background-color: #00cc66;color: white;">Save</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="del-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog" >
            <div class="modal-dialog" style="width:400px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:400px;border-radius: 2px 2px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 2px 2px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="color: white;opacity: 1;position: relative;top:-12px;left:7px;">&times;</button>
                        <h4 class="modal-title" style="">Delete Table<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: 50px;text-align: center">
                        <p style="font-size: 15px;">Are you sure to remove this restaurant?</p>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: #00cc66;color: white;">Cancel</button>
                        <button type="button" class="btn btn-default" id="remove" style="height: 30px;background-color: #ff471a;color: white;">Remove</button>
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
                '<span class="bread-blod">Restaurants</span>\n' +
                '</li>');
        });

    </script>
    <script>
        function selectitem(item,selectObject,id) {
            var value = selectObject.value;
            var val='';
            switch (value) {
                case '0':
                    $('#'+id).css('color','#0000cc');
                    val='Active';
                    break;
                case '1':
                    $('#'+id).css('color','#ff0000');
                    val='Disabled';
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
                url: '{{url("restaurant_permission")}}',
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
        $( document ).ready(function() {
            $('.res-edit').click(function () {
                var id=this.id;
                var a=$('#'+id).find('.a').text();
                var m=$('#'+id).find('.m').text();
                var n=parseInt($('#'+id).find('.floors').text());
                var ap='';
                for(i=1;i<n+1;i++){
                   ap=ap+'<span><p style="margin:0;float:left;border:1px solid green;width: 100px;color:white;background:#00cc66">Floor'+i+'</p></span><span><button id="e-'+i+'" class="detail-edits" style="margin-left:-5px;margin-right:3.5px;margin-bottom:3px;background: #e6fff2;border: 1px solid gray;"><p style="display:none">'+i+'</p><i class="far fa-edit" style="color: black"></i>Edit</button></span><span><button id="d-'+i+'" class="floor-delete" style="background: #ffebe6;border: 1px solid gray;"><p style="display:none;">'+i+'</p><i class="fa fa-remove" style="font-size:14px;color:red"></i>Delete</button></span><br>';
                }
                $('.floor-content').append(ap);
                $('#admin-mail').val(a);
                $('#manager-mail').val(m);
                $('.rid').text(id);
                $('#edit-modal').click();
                $('.floor-delete').click(function () {
                    var d_id=this.id;
                    var n_id=$('#'+d_id).find('p').text();
                    var rid=$('.rid').text();
                    // alert(rid);alert(n_id);

                    var data = new FormData();
                    data.append('rid', rid);
                    data.append('nid', n_id);
                    $.ajax({
                        type: "POST",
                        url: '{{url("floor_delete")}}',
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
                                alert('Please confirm your info');
                            }
                        },
                        error: function (response) {
                            console.log(response);
                            alert('failed');
                        }
                    });
                });
                $('#save-edit').click(function () {
                    var am=$('#admin-mail').val();
                    var mm=$('#manager-mail').val();
                    var rid=$('.rid').text();

                    var data = new FormData();
                    data.append('rid', rid);
                    data.append('am', am);
                    data.append('mm', mm);
                    $.ajax({
                        type: "POST",
                        url: '{{url("save_edit")}}',
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
                                alert('Please confirm your info');
                            }
                        },
                        error: function (response) {
                            console.log(response);
                            alert('failed');
                        }
                    });
                });
                $('.detail-edits').click(function () {
                    var eid = this.id;
                    var en = $('#'+eid).find('p').text();
                    var rid=$('.rid').text();
                    window.location.replace('view/restaurant/'+rid+'/'+en);
                });
            });
            $('.res-del').click(function () {
                var id=this.id;
                $('#del-modal').click();
                $('#remove').click(function () {
                    var data = new FormData();
                    data.append('id', id);
                    $.ajax({
                        type: "POST",
                        url: '{{url("res_delete")}}',
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
        });
    </script>
@stop

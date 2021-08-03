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
                            <div style="float: right" class="btn btn-default add_master">Add</div>
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">Customer</span> Table</h1>
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
                                        <th data-field="name" data-editable="">Name</th>
                                        <th data-field="email" data-editable="">Email</th>
                                        <th data-field="profit_loss_per" data-editable="">Phone Number</th>
                                        <th data-field="comm" data-editable="">Address</th>
                                        <th data-field="profit_loss_amount" data-editable="">Register Date</th>
                                        <th data-field="state1" data-editable="">Permission</th>
                                        <th data-field="chips" data-editable="">Reserves</th>
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
                                            <td>{{$admins[$i]->name}}</td>
                                            <td>{{$admins[$i]->email}}</td>
                                            <td>{{$admins[$i]->phone}}</td>
                                            <td>{{$admins[$i]->address}}</td>
                                            <td>{{$admins[$i]->register_date}}</td>
                                            <td class="datatable-ct">
                                                <select id="s-{{$i}}" onchange="selectitem('{{$admins[$i]->id}}',this,'s-'+'{{$i}}')" style="
                                                 @php
                                                    switch ($admins[$i]->permission){
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
                                                    <option  @php if(($admins[$i]->permission) == '0') echo "selected";@endphp value="0">Active</option>
                                                    <option  @php if(($admins[$i]->permission) == '1') echo "selected";@endphp value="1">Disabled</option>
                                                    <option  @php if(($admins[$i]->permission) == '2') echo "selected";@endphp value="2">Delete</option>
                                                </select>
                                            </td>
                                            <td>
                                                {{$admins[$i]->r_num}}
                                            </td>
                                            <td class="datatable-ct">
                                                <button id="edit-{{$i}}" title="Edit" class="pd-setting-ed">
                                                    <i class="fas fa-user-edit"></i>
                                                    <p class="o-id" style="display: none;">{{$admins[$i]->id}}</p>
                                                    <p class="o-name" style="display: none;">{{$admins[$i]->name}}</p>
                                                    <p class="o-email" style="display: none;">{{$admins[$i]->email}}</p>
                                                    <p class="o-phone" style="display: none;">{{$admins[$i]->phone}}</p>
                                                    <p class="o-address" style="display: none;">{{$admins[$i]->address}}</p>
                                                    <p class="o-license" style="display: none;">{{$admins[$i]->r_num}}</p>
                                                </button>
                                                <button id="reset-{{$i}}" title="Reset Password" class="reset" style="padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    <p class="o-id" style="display: none;">{{$admins[$i]->id}}</p>
                                                    <p class="o-email" style="display: none;">{{$admins[$i]->email}}</p>
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
    {{--add customer dlg--}}
    <div id="add_master_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group-inner">
                        <input id="admin_id" type="hidden" class="form-control" />
                    </div>
                    <div class="form-group-inner">
                        <label>Name</label>
                        <input id="name" type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="form-group-inner">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" placeholder="" />
                    </div>
                    <div class="form-group-inner">
                        <label>Phone Number</label>
                        <input id="phone" type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="form-group-inner">
                        <label>address</label>
                        <input id="address" type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="form-group-inner">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" placeholder="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" href="#">Cancel</a>
                    <button class="btn btn-default" id="add-admin">Submit</button>
                </div>
            </div>
        </div>
    </div>
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
                        <h4 class="modal-title">Edit Admin<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: auto;text-align: center">
                        <input type="text" id="id-add" style="display: none" required/>
                        <span>Name:</span><input type="text" id="name-add" style="padding:5px;margin-top:20px;margin-left:35px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                        <span>Email:</span><input type="email" id="email-add" style="padding:5px;margin-left:37px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                        <span>Phone: </span><input type="text" id="phone-add" style="padding:5px;margin-left:29px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                        <span>address: </span><input type="text" id="address-add" style="padding:5px;margin-left:18px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: #ff4da6;color: white;">Cancel</button>
                        <button type="button" class="btn btn-default" id="admin-edit" style="height: 30px;background-color: #00cc66;color: white;">Change</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" id="add-modal1" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-add1" style="display: none">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal-add1" role="dialog" >
            <div class="modal-dialog" style="width:450px;">

                <!-- Modal content-->
                <div class="modal-content" style="width:450px;border-radius: 10px 10px 0 0;">
                    <div class="modal-header" style="height: 40px;color: white;background-color: #007bff;border-radius: 5px 5px 0 0;">
                        <button type="button" class="close" data-dismiss="modal" style="position:relative;top:-10px;left:5px;color: white;opacity: 1">&times;</button>
                        <h4 class="modal-title">Reset Password<span></span></h4>
                    </div>
                    <div class="modal-body" style="height: auto;text-align: center">
                        <input type="text" id="p-id" style="display: none" required/>
                        <span>Email:</span><input type="email" id="p-email" style="padding:5px;margin-left:60px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                        <span>Old password: </span><input type="password" id="old-pass" style="padding:5px;margin-left:5px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                        <span>New password:</span><input type="password" id="new-pass" style="padding:5px;margin-left:2px;margin-bottom:10px;width: 200px;height: 30px;" required/><br>
                    </div>
                    <div class="modal-footer" style="height: 40px;padding: 4px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="height: 30px;background-color: #ff4da6;color: white;">Cancel</button>
                        <button type="button" class="btn btn-default" id="pass-edit" style="height: 30px;background-color: #00cc66;color: white;">Save</button>
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
                '<span class="bread-blod">Customers</span>\n' +
                '</li>');
        });

    </script>
    <script>
        $( document ).ready(function() {
            $('.add_master').click(function () {
                $('#add_master_dlg').modal();
                $('#add-admin').click(function () {
                    var name = $('#name').val();
                    var email= $('#email').val();
                    var phone =$('#phone').val();
                    var address=$('#address').val();
                    var password=$('#password').val();
                    if(name != '' && email != '' && phone != '' && address != '' && password != ''){
                        var data = new FormData();
                        data.append('name', name);
                        data.append('email', email);
                        data.append('phone', phone);
                        data.append('address', address);
                        data.append('password', password);

                        $.ajax({
                            type: "POST",
                            url: '{{url("add_customer")}}',
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
                                    alert('Success added.');
                                    location.reload();
                                    // window.location.replace('./user/dashboard');

                                } else {
                                    alert('Please confirm customer email.');
                                }
                            },
                            error: function (response) {
                                console.log(response);
                                alert('failed');
                            }
                        });
                    }else{
                        alert('Please fill in all field!');
                    }

                });
            });
            $('.pd-setting-ed').click(function(){
                var id=this.id;
                var a_id=$('#'+id).find('.o-id').text();
                var a_name=$('#'+id).find('.o-name').text();
                var a_email=$('#'+id).find('.o-email').text();
                var a_phone=$('#'+id).find('.o-phone').text();
                var a_address=$('#'+id).find('.o-address').text();

                $('#id-add').val(a_id);
                $('#name-add').val(a_name);
                $('#email-add').val(a_email);
                $('#phone-add').val(a_phone);
                $('#address-add').val(a_address);

                $('#add-modal').click();
                $('#admin-edit').click(function () {
                    var id=$('#id-add').val();
                    var name=$('#name-add').val();
                    var email=$('#email-add').val();
                    var phone=$('#phone-add').val();
                    var address=$('#address-add').val();

                    var data = new FormData();
                    data.append('id', id);
                    data.append('name', name);
                    data.append('email',email);
                    data.append('phone',phone);
                    data.append('address',address);
                    $.ajax({
                        type: "POST",
                        url: '{{url("customer_edit")}}',
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
                                alert('Success updated.');
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

            });
            $('.reset').click(function () {
                var id = this.id;
                var a_id=$('#'+id).find('.o-id').text();
                var a_email=$('#'+id).find('.o-email').text();

                $('#p-id').val(a_id);
                $('#p-email').val(a_email);
                $('#add-modal1').click();
                $('#pass-edit').click(function () {
                    var aid=$('#p-id').val();
                    var opass=$('#old-pass').val();
                    var npass=$('#new-pass').val();

                    if(aid != '' && opass != '' && npass != ''){
                        var data = new FormData();
                        data.append('aid', aid);
                        data.append('opass',opass);
                        data.append('npass',npass);
                        $.ajax({
                            type: "POST",
                            url: '{{url("c_reset_password")}}',
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
                                    alert('Success updated.');
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
                    }else{
                        alert('Please fill in all fields.');
                    }
                });
            });
        });

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
                case '2':
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
                url: '{{url("customer_permission")}}',
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

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
                            <div style="float: right" class="btn btn-default add_master">Create Administrators</div>
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">All Administors</span></h1>
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
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="">Name</th>
                                        <th data-field="email" data-editable="">Email</th>
                                        <th data-field="country" data-editable="">Country</th>
                                        <th data-field="age" data-editable="">Age</th>
                                        <th data-field="city" data-editable="">City</th>                                        
                                        <th data-field="wallet" data-editable="">Wallet</th>                                         
                                        <th data-field="password" data-editable="">Password</th>                                        
                                        <th data-field="num2" data-editable="">Phone Number</th>
                                        <th data-field="text" data-editable="">Role</th>
                                        <th data-field="text1" data-editable="">Permission</th>
                                        <th data-field="num4" data-editable="">Edit Profile</th>
                                        <th data-field="action">Register Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counts=count($admins);
                                    @endphp
                                    @for($i=0;$i<$counts;$i++)
                                        <tr>
                                            <td></td>
                                            <td>{{$i}}</td>
                                            <td>{{$admins[$i]->id}}</td>
                                            <td>{{$admins[$i]->name}}</td>
                                            <td>{{$admins[$i]->email}}</td>
                                            <td>{{$admins[$i]->country}}</td>
                                            <td>{{$admins[$i]->age}}</td>
                                           <td>{{$admins[$i]->city}}</td>
                                           <td>{{$admins[$i]->walet}}</td>                         
                                            <td>{{$admins[$i]->password1}}</td>
                                            <td>{{$admins[$i]->phone_number}}</td>
                                        <td>{{$admins[$i]->role}}</td>
                                    <td>
                                        <select id="s-{{$i}}" onchange="selectitem('{{$admins[$i]->email}}',this,'s-'+'{{$i}}')" style="
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
                                            <option  @php if($admins[$i]->permission == 0) echo "selected";@endphp value="0">New</option>
                                            <option  @php if($admins[$i]->permission ==1) echo "selected";@endphp value="1">Agree</option>
                                            <option  @php if($admins[$i]->permission ==2) echo "selected";@endphp value="2">Block</option>
                                            <option  @php if($admins[$i]->permission ==3) echo "selected";@endphp value="3">Delete</option>
                                        </select>                                          
                                    </td>
                                    <td class="datatable-ct">
                                        <button id="edit-{{$i}}" onclick="edit_admin(this.id)" title="Edit" class="pd-setting-ed">
                                            <i class="fa fa-edit" style=""></i>Edit
                                            <p class="id" style="display: none;">{{$admins[$i]->id}}</p>
                                            <p class="name" style="display: none;">{{$admins[$i]->name}}</p>
                                            <p class="email" style="display: none;">{{$admins[$i]->email}}</p>
                                            <p class="country" style="display: none;">{{$admins[$i]->country}}</p>
                                            <p class="city" style="display: none;">{{$admins[$i]->city}}</p>
                                            <p class="age" style="display: none;">{{$admins[$i]->age}}</p>
                                            <p class="password" style="display: none;">{{$admins[$i]->password1}}</p>
                                            <p class="mobile" style="display: none;">{{$admins[$i]->phone_number
                                            }}</p>                                            
                                            <p class="wallet" style="display: none;">{{$admins[$i]->walet
                                            }}</p>                                              
                                        </button>
                                        <a href="#" id="view-{{$admins[$i]->id}}" onclick="viewadmin(this.id)" data-toggle="modal" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;" data-target="#quick-view" title="Quick View">
                                            <i class="fa fa-eye"></i>View
                                            <p class="id" style="display: none;">{{$admins[$i]->id}}</p>
                                            <p class="name" style="display: none;">{{$admins[$i]->name}}</p>
                                            <p class="email" style="display: none;">{{$admins[$i]->email}}</p>
                                            <p class="country" style="display: none;">{{$admins[$i]->country}}</p>
                                            <p class="city" style="display: none;">{{$admins[$i]->city}}</p>
                                            <p class="age" style="display: none;">{{$admins[$i]->age}}</p>
                                            <p class="password" style="display: none;">{{$admins[$i]->password1}}</p>
                                            <p class="mobile" style="display: none;">{{$admins[$i]->phone_number
                                            }}</p>                                            
                                            <p class="wallet" style="display: none;">{{$admins[$i]->walet
                                            }}</p>                                             
                                        </a>                                        
                                    </td>
                                    <td>{{$admins[$i]->register_date}}</td>
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

    <div id="add_product_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form id="form" method="post" action="{{url("create_admin")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group-inner">
                            <label>Full Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Full Name" required/>
                        </div>

                        <div class="form-group-inner" style="margin-left: 0px;">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Country</label>
                            <input name="country" type="text" class="form-control" placeholder="Country" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>City</label>
                            <input name="city" type="text" class="form-control" placeholder="City" required/>
                        </div>
                        <!--<div class="form-group-inner1">-->
                        <!--    <label>Shiping Cost</label>-->
                        <!--    <input name="shiping-price" type="text" class="form-control" placeholder="Shiping price" />-->
                        <!--</div>-->
                        <div class="form-group-inner" style="margin-left: 0">
                            <label>Age</label>
                            <input name="age" type="text" class="form-control" placeholder="Age" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Phone Number</label>
                            <input name="phone" type="text" class="form-control" placeholder="Phone Number" required/>
                        </div>

                        <div class="form-group-inner">
                            <label>Password</label>
                            <input name="password" type="text" class="form-control" placeholder="Password" required/>
                        </div>
                  
                    </div>
                    <div class="modal-footer">
                        <div style="width: 250px;margin: auto;">
                            <a class="btn btn-default" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                            <button class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <div id="edit_product_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form id="form" method="post" action="{{url("edit_admin")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input id="edit-id" name="id" type="text" class="form-control" style="display:none;"/>
                        <div class="form-group-inner">
                            <label>Full Name</label>
                            <input id="edit-name" name="name" type="text" class="form-control" placeholder="Full Name" required/>
                        </div>

                        <div class="form-group-inner" style="margin-left: 0px;">
                            <label>Email</label>
                            <input id="edit-email" name="email" type="text" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Country</label>
                            <input id="edit-country" name="country" type="text" class="form-control" placeholder="Country" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>City</label>
                            <input id="edit-city" name="city" type="text" class="form-control" placeholder="City" required/>
                        </div>

                        <div class="form-group-inner" style="margin-left: 0">
                            <label>Age</label>
                            <input id="edit-age" name="age" type="text" class="form-control" placeholder="Age" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Phone Number</label>
                            <input id="edit-phone" name="phone" type="text" class="form-control" placeholder="Phone Number" required/>
                        </div>

                        <div class="form-group-inner">
                            <label>Password</label>
                            <input id="edit-password" name="password" type="text" class="form-control" placeholder="Password" />
                        </div>
                        <div class="form-group-inner">
                            <label>Wallet</label>
                            <input id="edit-wallet" name="wallet" type="text" class="form-control" placeholder="Wallet" required/>
                        </div>                  
                    </div>
                    <div class="modal-footer">
                        <div style="width: 250px;margin: auto;">
                            <a class="btn btn-default" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                            <button class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="view_product_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <form id="form" method="post" action="{{url("edit_admin")}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input id="edit-id1" name="id" type="text" class="form-control" style="display:none;"/>
                        <div class="form-group-inner">
                            <label>Full Name</label>
                            <input id="edit-name1" name="name" type="text" class="form-control" placeholder="Full Name" required/>
                        </div>

                        <div class="form-group-inner" style="margin-left: 0px;">
                            <label>Email</label>
                            <input id="edit-email1" name="email" type="text" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Country</label>
                            <input id="edit-country1" name="country" type="text" class="form-control" placeholder="Country" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>City</label>
                            <input id="edit-city1" name="city" type="text" class="form-control" placeholder="City" required/>
                        </div>

                        <div class="form-group-inner" style="margin-left: 0">
                            <label>Age</label>
                            <input id="edit-age1" name="age" type="text" class="form-control" placeholder="Age" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Phone Number</label>
                            <input id="edit-phone1" name="phone" type="text" class="form-control" placeholder="Phone Number" required/>
                        </div>

                        <div class="form-group-inner">
                            <label>Password</label>
                            <input id="edit-password1" name="password" type="text" class="form-control" placeholder="Password" required/>
                        </div>
                        <div class="form-group-inner">
                            <label>Wallet</label>
                            <input id="edit-wallet1" name="wallet" type="text" class="form-control" placeholder="Wallet" required/>
                        </div>                  
                    </div>
                </form>
            </div>
        </div>
    </div>     
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
                '<span class="bread-blod">Administrators</span>\n' +
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
    <script>
        $( document ).ready(function() {
            $('.add_master').click(function () {
                $('#add_product_dlg').modal();
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
        }); 
        function edit_admin(id){
            var aid = $('#'+id).find('.id').text();
            var name = $('#'+id).find('.name').text();
            var email = $('#'+id).find('.email').text();
            var country = $('#'+id).find('.country').text();
            var city = $('#'+id).find('.city').text();
            var age = $('#'+id).find('.age').text();
            var password = $('#'+id).find('.password').text();
            var mobile = $('#'+id).find('.mobile').text();
            var wallet = $('#'+id).find('.wallet').text();
            $('#edit-id').val(aid);
            $('#edit-name').val(name);
            $('#edit-email').val(email);
            $('#edit-country').val(country);
            $('#edit-city').val(city);
            $('#edit-age').val(age);
            $('#edit-phone').val(mobile);   
            $('#edit-password').val(password); 
            $('#edit-wallet').val(wallet);
            $('#edit_product_dlg').modal();
        }
        function viewadmin(id){
            var aid = $('#'+id).find('.id').text();
            var name = $('#'+id).find('.name').text();
            var email = $('#'+id).find('.email').text();
            var country = $('#'+id).find('.country').text();
            var city = $('#'+id).find('.city').text();
            var age = $('#'+id).find('.age').text();
            var password = $('#'+id).find('.password').text();
            var mobile = $('#'+id).find('.mobile').text();
            var wallet = $('#'+id).find('.wallet').text();
            $('#edit-id1').val(aid);
            $('#edit-name1').val(name);
            $('#edit-email1').val(email);
            $('#edit-country1').val(country);
            $('#edit-city1').val(city);
            $('#edit-age1').val(age);
            $('#edit-phone1').val(mobile);   
            $('#edit-password1').val(password); 
            $('#edit-wallet1').val(wallet);
            $('#view_product_dlg').modal();
        }   
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
                    val='Agree';
                    break;
                case '2':
                    $('#'+id).css('color','#ff0000');
                    val='Block';
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
                url: '{{url("admin_permiss0")}}',
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

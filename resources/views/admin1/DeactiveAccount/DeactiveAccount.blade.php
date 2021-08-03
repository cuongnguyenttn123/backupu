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
        .actions{
            min-width:240px;
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
                                <h1><span class="table-project-n">Deactive Accounts</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <button id="delete-all-btn" style="width:120px; height: 34px; border: 1px solid #ff3300; margin-top: 10px;color: white; background: #ff3300; margin-left: 10px; float: right;font-weight: 550 ;">Selected Delete</button>
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                    <Button onclick="PrintExhibition()">
                                        Export Excel
                                    </Button>
                                </div>
                                
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        
                                        <th data-field="no">No</th>
                                        <th data-field="id">ID</th>
                                        <th data-field="name" data-editable="">Name</th>
                                        <th data-field="email" data-editable="">Email</th>
                                        <th data-field="delete"data-editable="">Delete</th>
                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($DeactiveRequest as $deactivate)
                                            
                                              <tr>
                                
                                    <td>
                                        {{$deactivate->id}}
                                    </td>
                                    <td>
                                        {{$deactivate->user_id}}
                                    </td>
                                    <td>
                                        {{$deactivate->user->name}}
                                    </td>

                                    <td>
                                        {{$deactivate->user->email}}
                                    </td>
                                     <td>
                                    <a href="{{route("DeleateAcount",$deactivate->id)}}" class="btn btn-danger" type='button' >
                                        <span style="color:white">
                                            Delete User
                                        </span>
                                    </a>
                                    </td>
                           </tr>
                                          
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
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
    <script src="{{asset('FileSaver.js')}}"></script>
    <script src="{{asset('jhxlsx.js')}}"></script>
    <script src="{{asset('jquery.table2excel.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>
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
    
     function PrintExhibition () {
            
             var tableData2 = [
                {
                    "sheetName": "Exhibition",
                    "data": [
                        [{"text":"user_id"},{"text":"ExhibitionId"},{"text":"Name"},{"text":"Email"},]]
            
                }
            ];
               $.ajax({
                type: "GET",
                url: 'https://urpixpays.com/exhibitionCovertToExcel',
                success: function (response) {
                    
                    for(let key in response) {
        
                tableData2[0].data.push([{"text":response[key].user_id},{"text":response[key].ex_id},{"text":response[key].user.name},{"text":response[key].user.name}]);
                
            }
                  console.log(tableData2);
                        var options = {
                    fileName: "Export xlsx Sipmle Sheet"
                };
                Jhxlsx.export(tableData2, options);
                },
                
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
        }
        
        
        
        
    
    
    
        $( document ).ready(function() {
            $('.pd-setting-ed').click(function(){
                var id=this.id;
                var a_name=$('#'+id).find('.o-name').text();
                var a_email=$('#'+id).find('.o-email').text();

                $('#name-add').text(a_name);
                $('#email-add').text(a_email);

                $('#add-modal').click();

            });

            $('#delete-all-btn').click(function(){
                var IDs = [];
                $('tbody').find(".selected").find(".user-no").each(function(){ IDs.push($(this).text()); });

                $.ajax({
                    url: '{{url("/user/multi_delete")}}',
                    type: 'post',
                    data: { numbers:IDs} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
                    window.location.replace('/admin/user0');
                },
                error: function(response){
                    console.log(response);
                    alert('error');
                }
            });

            });
        
            $('#edit_user_submit').click(function(){
                var id = $('#edit-id').val();
                var name = $('#edit-name').val();
                var email = $('#edit-email').val();
                var country = $('#edit-country').val();
                var city = $('#edit-city').val();
                var age = $('#edit-age').val();
                var phone = $('#edit-phone').val();
                var password = $('#edit-password').val();
                var wallet = $('#edit-wallet').val();
                var flip = $('#edit-flip').val();
                var wand = $('#edit-wand').val();
                var charge = $('#edit-charge').val();
                var votes = $('#edit-votes').val();

                var data = new FormData();
                data.append('id', id);
                data.append('name', name);
                data.append('email', email);
                data.append('country', country);
                data.append('city', city);
                data.append('age', age);
                data.append('phone', phone);
                data.append('password', password);
                data.append('wallet', wallet);
                data.append('flip', flip);
                data.append('wand', wand);
                data.append('charge', charge); 
                data.append('votes', votes);              
    
                $.ajax({
                    type: "POST",
                    url: '{{url("/edit_user")}}',
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
                            $('#edit_user_cancel').click()
                            alert('Successfully updated!');
                        }
                    },
                    error: function (response) {
                        console.log(response);
                        alert('failed');
                    }
                });
                });

            $('#edit_transfer_submit').click(function(){

                var id1 = $('#tech_id').text();

                var amount=$('#amount').val();
                var notes = $('#notes').val();
                var e = document.getElementById('inputGroupSelect02');
                var status = e.options[e.selectedIndex].text;

                var  data = new FormData();
                data.append('id', id1);
                data.append('amount', amount);
                data.append('status', status);
                data.append('notes', notes);

                $.ajax({
                    type: "POST",
                    url: '{{url('/edit_transfer1')}}',
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
                        if(obj.state == 1){
                            $('#edit_transfer_cancel').click()
                            alert('Successfully transferred!');
                        }else{
                            alert('Please confirm customer email again');
                        } 
                    },
                    error: function(response){
                        console.log(response);

                        //location.reload();
                    }
                });


            });
        });

    </script>
    <script>
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
            var flip = $('#'+id).find('.flip').text();
            var wand = $('#'+id).find('.wand').text();
            var charge = $('#'+id).find('.charge').text();
            var votes = $('#'+id).find('.votes').text();
            $('#edit-id').val(aid);
            $('#edit-name').val(name);
            $('#edit-email').val(email);
            $('#edit-country').val(country);
            $('#edit-city').val(city);
            $('#edit-age').val(age);
            $('#edit-phone').val(mobile);
            $('#edit-password').val(password);
            $('#edit-wallet').val(wallet);
            $('#edit-flip').val(flip);
            $('#edit-wand').val(wand);
            $('#edit-charge').val(charge);
            $('#edit-votes').val(votes);
            $('#edit_product_dlg').modal();
        }
        function edit_transfer(id){
            var uid = $('#'+id).find('.id').text();
            $('#tech_id').text(uid)
            $('#edit_transfer_dlg').modal();
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
            var flip = $('#'+id).find('.flip').text();
            var wand = $('#'+id).find('.wand').text();
            var charge = $('#'+id).find('.charge').text();
            var votes = $('#'+id).find('.votes').text();
            $('#edit-id1').val(aid);
            $('#edit-name1').val(name);
            $('#edit-email1').val(email);
            $('#edit-country1').val(country);
            $('#edit-city1').val(city);
            $('#edit-age1').val(age);
            $('#edit-phone1').val(mobile);
            $('#edit-password1').val(password);
            $('#edit-wallet1').val(wallet);
            $('#edit-flip1').val(flip);
            $('#edit-wand1').val(wand);
            $('#edit-charge1').val(charge);
            $('#edit-votes1').val(votes);
            $('#view_product_dlg').modal();
        }
        function selectitem(item,selectObject,id) {
            var value = selectObject.value;
            var val='';
            switch (value) {
                case '0':
                    $('#'+id).css('color','#ff0000');
                    val=0;
                    break;
                case '1':
                    $('#'+id).css('color','#0000cc');
                    val=1;
                    break;
                case '3':
                    $('#'+id).css('color','#e6005c');
                    val='delete';
                    break;
                default:
                    val='error';
                    break;
            }
            var data = new FormData();
            data.append('email', item);
            data.append('permission', val);

            $.ajax({
                type: "POST",
                url: '{{url("post-status/")}}/'+item+"/"+val,
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
                    // var type = (json['state']);
                    // if (type == 200) {
                    //     alert('Successfully changed!');
                    //     // location.reload();
                    // } else {
                    //     alert('Please confirm your info');
                    // }
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
        }
    </script>


@stop

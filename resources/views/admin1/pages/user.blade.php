@extends('admin1.Layout.pagetemplate')
@section('head')
    <!-- x-editor CSS
		============================================ -->
		
    <link rel="stylesheet" href="{{asset('adminp/css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/editor/x-editor-style.css')}}">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">-->
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
                                <h1><span class="table-project-n">All Users</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <button id="delete-all-btn" style="width:120px; height: 34px; border: 1px solid #ff3300; margin-top: 10px;color: white; background: #ff3300; margin-left: 10px; float: right;font-weight: 550 ;">Selected Delete</button>
                                 <button id="export-single-btn" style="width:120px; height: 34px; border: 1px solid #ff3300; margin-top: 10px;color: white; background: #ff3300; margin-left: 10px; float: right;font-weight: 550 ;">Export Data</button>
                                 <button id="export-all-btn" style="width:120px; height: 34px; border: 1px solid #ff3300; margin-top: 10px;color: white; background: #ff3300; margin-left: 10px; float: right;font-weight: 550 ;">Export All</button>
                                  <a id="export-all-btn" type="button" href="https://urpixpays.com/send-bulk-email" style="width:120px; height: 34px; border: 1px solid #ff3300; margin-top: 10px;color: white; background: #ff3300; margin-left: 10px; float: right;font-weight: 550 ;">Send Bulk Email</a>
                              
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <Input type='text' id='searchResults' placeholder='Search'  class='form-control' />
                                </div>
                                     <div class='col-md-12'>
                                         <div id='pagaData' style="overflow:hidden;overflow-x:scroll">
                                        </div>
                                     </div>
                                 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
    {{--deposit dlg--}}
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
                    <div class="form-group-inner">
                        <label>Phone Number</label>
                        <input id="edit-phone" name="phone" type="text" class="form-control" placeholder="Phone Number" required/>
                    </div>

                    <div class="form-group-inner">
                        <label>Password</label>
                        <input id="edit-password" name="password" type="text" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group-inner" style="width:22%;float:left;">
                        <label>Flip</label>
                        <input id="edit-flip" name="flip" type="text" class="form-control" placeholder="Flip" required/>
                    </div>
                    <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                        <label>Wand</label>
                        <input id="edit-wand" name="wand" type="text" class="form-control" placeholder="Wand" required/>
                    </div>
                    <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                        <label>Charge</label>
                        <input id="edit-charge" name="charge" type="text" class="form-control" placeholder="Charge" required/>
                    </div>
                    <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                        <label>Votes</label>
                        <input id="edit-votes" name="votes" type="text" class="form-control" placeholder="Votes" required/>
                    </div>

                    <div class="form-group-inner">
                        <label>Wallet</label>
                        <input id="edit-wallet" name="wallet" type="text" class="form-control" placeholder="Wallet" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="width: 250px;margin: auto;">
                        <a class="btn btn-default" id="edit_user_cancel" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                        <button id="edit_user_submit" class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="edit_transfer_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body" style="padding: 15px 50px;">
                    <div class="form-group-inner">
                         <h6 style="font-size: 20px;">PIX ID: <span id="tech_id"></span></h6>
                    </div>
                    <div class="form-group-inner">
                        <p style="font-size: 16px;">Amount</p>
                        <input type="number" name="amount" id="amount"  value="0.00" placeholder="" style="padding: 5px;"/>
                    </div>                    
                    <div class="form-group-inner">
                        <p class="input-group-text" for="inputGroupSelect02" style="width: 100%; font-size: 16px;">Status Selection</p>
                        <select class="custom-select" id="inputGroupSelect02" style="width: 165px;">
                            <option value="1">Deposit</option>
                            <option value="2">Withdrawal</option>
                        </select>                        
                    </div>
                    <div class="form-group-inner">
                        <p style="font-size: 16px">Descriptions:</p>                        
                        <textarea class="" id="notes" name="notes" style="padding:15px;width:100%;height:100px;border-radius:0px;border:1px solid gray;" placeholder=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="width: 250px;margin: auto;">
                        <a class="btn btn-default" id="edit_transfer_cancel" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                        <button id="edit_transfer_submit" class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</button>
                    </div>
                </div>
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
                <form id="form" method="post" action="" enctype="multipart/form-data">
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
                        <div class="form-group-inner" style="width:22%;float:left;">
                            <label>Flip</label>
                            <input id="edit-flip1" name="flip" type="text" class="form-control" placeholder="Flip" required/>
                        </div>
                        <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                            <label>Wand</label>
                            <input id="edit-wand1" name="wand" type="text" class="form-control" placeholder="Wand" required/>
                        </div>
                        <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                            <label>Charge</label>
                            <input id="edit-charge1" name="charge" type="text" class="form-control" placeholder="Charge" required/>
                        </div>
                        <div class="form-group-inner" style="width:22%;float:left;margin-left:4%;">
                            <label>Votes</label>
                            <input id="edit-votes1" name="votes" type="text" class="form-control" placeholder="Votes" required/>
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
		
	<!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>-->
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
    
    function UsersSearch(search = '',pageNo = 1) {
        

            $.ajax({
                type: "GET",
                url: '{{url("admin/userSearch")}}?search='+search+"&page="+pageNo,
                success: function (response) {
                    // var json = JSON.parse(response);
                    // console.log(response);
                    $('#pagaData').html(response);
                    
                    // $('#table').DataTable();
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
        
       function PrintUsers () {
            
              var tableData = [
                {
                    "sheetName": "Sheet1",
                    "data": [[{"text":"Id"},{"text":"Name"},{"text":"Email"},{"text":"Country"},{"text":"Votes"},{"text":"City"},{"text":"wallet"},{"text":"PhoneNumber"},{"text":"Role"}],
                    [{"text":"Tiger Nixon"},{"text":"System Architect"},{"text":"Edinburgh"},{"text":61},{"text":"2011/04/25"},{"text":"$320,800"},{"text":"$320,800"},{"text":"$320,800"},{"text":"$320,800"}],
                    
                    ]
            
                }
            ];
             var tableData2 = [
                {
                    "sheetName": "Sheet1",
                    "data": [
                        [{"text":"Id"},{"text":"Name"},{"text":"Email"},{"text":"Country"},{"text":"Votes"},{"text":"City"},{"text":"wallet"},{"text":"PhoneNumber"},{"text":"Role"}],                    ]
            
                }
            ];
               $.ajax({
                type: "GET",
                url: 'https://urpixpays.com/userallData',
                success: function (response) {
                    
                    for(let key in response) {
        
                tableData2[0].data.push([{"text":response[key].no},{"text":response[key].name},{"text":response[key].email},{"text":response[key].country},{"text":response[key].userpix?response[key].userpix.voted:0},{"text":response[key].city},{"text":response[key].userpix?response[key].userpix.walet:0},{"text":response[key].mobilenum},{"text":response[key].role}]);
                
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
        
        
    UsersSearch()
        $( document ).ready(function() {
            console.log('ready');
            //  $('#table').DataTable();
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
                
                $("#export-all-btn").click(function(){

                  PrintUsers()
            });
            
            $('#export-single-btn').click(function(){
                $('#usersDataTable').table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							
						});
            });

                    
                
        });

    </script>
    <script>
    
        $( document ).ready(function() {
            
            $(document).on('click', '.pagination a', function(event){
              event.preventDefault(); 
              var query = $('#searchResults').val();
              var page = $(this).attr('href').split('page=')[1];
              UsersSearch(query,page);
             });
     
            $(document).on('keyup', '#searchResults', function(){
              var query = $('#searchResults').val();
                UsersSearch(query);
             
             });
             
             $(document).on('click', '#selectAll', function(e){
                var table= $(e.target).closest('table');
                $('td input:checkbox',table).prop('checked',this.checked);
             });
             
             
             $(document).on('click','#deleteAll',function(e) {
                 
                var user_ids = [];
            $.each($("input[name='user_id']:checked"), function(){
                user_ids.push($(this).val());
            });
         
          var data = new FormData();
                data.append('user_ids', user_ids);
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
            $('.pd-setting-ed').click(function(){
                var id=this.id;
                var a_name=$('#'+id).find('.o-name').text();
                var a_email=$('#'+id).find('.o-email').text();

                $('#name-add').text(a_name);
                $('#email-add').text(a_email);

                $('#add-modal').click();

            });

            $('#delete-all-btn').click(function(){
                // var IDs = [];
                // $('tbody').find(".selected").find(".user-no").each(function(){ IDs.push($(this).text()); });
                
                
                if (confirm('Are you sure you want to delete theses users data it will be permanently deleted from your database?')) {
                         var user_ids = [];
            $.each($("input[name='user_id']:checked"), function(){
                user_ids.push($(this).val());
            });
         

                $.ajax({
                    url: '{{url("/user/multi_delete")}}',
                    type: 'post',
                    data: { user_ids:user_ids} ,
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
                    } else {
                      // Do nothing!
                      console.log('Thing was not saved to the database.');
                    }
                

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
                    val='block';
                    break;
                case '1':
                    $('#'+id).css('color','#0000cc');
                    val='approve';
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
                url: '{{url("/user/permission0")}}',
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
                        alert('Successfully changed!');
                        // location.reload();
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
        
        function changePostApproval(item,selectObject,id) {
            var value = selectObject.value;
            console.log(selectObject.value);
            var val='';
            switch (value) {
                case '0':
                    $('#'+id).css('color','#ff0000');
                    val='block';
                    break;
                case '1':
                    $('#'+id).css('color','#0000cc');
                    val='approve';
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
            data.append('id', item);
            data.append('approval_data', value);

            $.ajax({
                type: "POST",
                url: '{{route('approve.user.post')}}',
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
                    alert('Successfully changed!');
                    if (type == 201) {
                        alert('Successfully changed!');
                        // location.reload();
                    } else {
                        // alert('Please confirm your info');
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

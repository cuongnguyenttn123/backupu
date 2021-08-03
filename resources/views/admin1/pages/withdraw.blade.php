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
     <style>


        .dropdown {

            display: inline-block;
        }
        .dropdown, .dropup {
            position: absolute;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 110px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 100;
        }

        .dropdown-content a {
            color: black;
            padding: 5px 15px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #00e6e6}

        .dropdown:hover .dropdown-content {
            display: block;
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
                                <h1><span class="table-project-n">Withdraw Table</span></h1>
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
                                </div>
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
     function UsersSearch(search = '',pageNo = 1) {
        

            $.ajax({
                type: "GET",
                url: '{{url("admin/withdraw_search")}}?search='+search+"&page="+pageNo,
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
    UsersSearch()
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
              });
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
                '<span class="bread-blod">Withdraw Table</span>\n' +
                '</li>');
            
            $('#delete-all-btn').click(function(){
                // var IDs = [];
                // $('tbody').find(".selected").find(".user-no").each(function(){ IDs.push($(this).text()); });
                
                if (confirm('Are you sure you want to delete this data it will be permanently deleted from your database?')) {
                          var user_ids = [];
            $.each($("input[name='user_id']:checked"), function(){
                user_ids.push($(this).val());
            });
                
            
                $.ajax({
                    url: '{{url("/withdrawl/multi_delete")}}',
                    type: 'post',
                    data: { user_ids:user_ids} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    var obj = JSON.parse(response);
                    window.location.replace('/admin/withdraw');
                },
                error: function(response){
                    console.log(response);
                    alert('error');
                }
            });

          
            
                
                    
                }else{
                    
                }
                
            });
                
        });

    </script>
    <script>
        function selectitem1(item, selectObject){
            var value = selectObject.value;
            // alert(item +"->" +value);

            var  data = new FormData();
            data.append('id', item);
            data.append('value', value);
            $.ajax({
                type: "POST",
                url: '{{url('/withdraw_note0')}}',
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
                    //alert('success');
                    // var obj = JSON.parse(response);
                    //alert(obj.message);
                    // console.log(obj);
                //  location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
        }
        function selectitem2(item, selectObject){
            var value = selectObject;
            var  data = new FormData();
            data.append('id', item);
            data.append('value', value);
            $.ajax({
                type: "POST",
                url: '{{url('/withdraw_process0')}}',
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
                    alert('success');
                    // var obj = JSON.parse(response);
                    //alert(obj.message);
                    // console.log(obj);
                //  location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
        }
        
    </script>
@stop

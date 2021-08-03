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
            padding: 20px 30px;
        }
    </style>
    <style>
        .font_prize{
            font-size: 14px;
        }
        h6{
            margin-bottom: 0px!important;
        }
        input{
            padding:10px;
            text-align: center;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;
            text-align: left;
            width: 100%;
            margin-bottom: 20px!important;
        }
        .modal-dialog {
            max-width: 500px!important;
            margin: 1.75rem auto;
        }
        input[type="number"]{
            font-size: 14px;
            color: #303030;
            border: 1px solid #ddd;
            outline: none;
            border-radius: 0px;
            box-shadow: none;
        }
        textarea {
            border: 1px solid #ba68c8;
            border-radius: 10px;
        }
        textarea:focus {
            border: 1px solid #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
        }
        .green-border-focus .form-control:focus {
            border: 1px solid #8bc34a;
            box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
        }
        .emailsetting input{
            margin-bottom: 1rem;
        }
        .avatar-upload {
            position: relative;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            position: relative;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: auto;
            height: 270px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .free_price{
            display:block;
        }
        .paid_price{
            display:none;
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
                            <div style="float: right" class="btn btn-default add_master">Create Record</div>
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">Records</span></h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="selected">Export Selected</option>
                                        <option value="all">Export All</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">NO</th>
                                        <option value="">Export Basic</option>
                                        <th data-field="photo">PARTICULARS</th>
                                        <th data-field="name" data-editable="">EXPENSE</th>
                                        <th data-field="email" data-editable="">INCOME</th>
                                        <th data-field="city" data-editable="">DATE</th>
                                        <th data-field="entry" data-editable="">ENTRY DATE</th>
                                        <th data-field="vote" data-editable="">STATUS</th>
                                        <th data-field="num2" data-editable="">REMARKS</th>
                                        <th data-field="total_expense" data-editable="">TOTAL EXPENSES</th>
                                        <th data-field="total_income" data-editable="">TOTAL INCOME</th>
                                        <th data-field="Balence" data-editable="">BALANCE</th>
                                        <th data-field="num3" data-editable="">EDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counts=count($account);
                                    @endphp
                                    @for($i=0;$i<$counts;$i++)
                                        @php
                                            $item = json_decode(json_encode($account[$i]), true);
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td>{{$i+1}}</td>
                                            <td>{{$account[$i]->particulars}}</td>
                                            <td>
                                                {{$account[$i]->expense}}
                                            </td>
                                            <td>
                                                {{$account[$i]->income}}
                                            </td>
                                            <td>{{$account[$i]->expense_date}}</td>
                                            <td>{{$account[$i]->date}}</td>
                                            <td>{{$account[$i]->status}}</td>
                                            <td>{{$account[$i]->remarks}}</td>

                                            @if($i == 0 )
                                            <td>{{$expense}}</td>
                                            <td>{{$income}}</td>
                                            <td>{{$expense - $income}}</td>
                                            @else
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @endif
                                            <td class="datatable-ct">
                                                <button id="edit-{{$i}}" onclick="edit_admin(this.id)" title="Edit" class="pd-setting-ed" style="width:40px;">
                                                    <i class="fa fa-edit" style=""></i>
                                                    <p class="id1" style="display: none;">{{$account[$i]->id}}</p>
                                                    <p class="particulars" style="display: none;">{{$account[$i]->particulars}}</p>
                                                    <p class="expense" style="display: none;">{{$account[$i]->expense}}</p>
                                                    <p class="expense_date" style="display: none;">{{$account[$i]->expense_date}}</p>
                                                    <p class="income" style="display: none;">{{$account[$i]->income}}</p>
                                                    <p class="status" style="display: none;">{{$account[$i]->status}}</p>
                                                    <p class="remarks" style="display: none;">{{$account[$i]->remarks}}</p>
                                                </button>
                                                <button id="delete-{{$i}}" onclick="delete_record(this.id)" title="delete" class="pd-setting-ed" style="width:40px;">
                                                    <i class="fa fa-trash" style="color: red"></i>
                                                    <p class="id1" style="display: none;">{{$account[$i]->id}}</p>
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
    <div id="add_product_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <h5 class="modal-title" style="text-align: center;font-size:20px;">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -22px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container" style="width: 100%; height: auto;margin-top: 0px;margin-bottom: 5px;">
                        <div class="" style="height: auto;margin-bottom: 5px;background-color: white;">
                            <div class="col-md-12 col-lg-12 col-sm-12 row" style="height: auto;width: 110%;margin-top: 20px">
                                <div class="col-md-12 col-lg-12 col-sm-12">
                                    <div class="form-group-inner">
                                         <h6>PARTICULARS</h6>
                                         <input type="text" name="particulars" id="particulars"  value="" placeholder=""/>
                                    </div>
                                    <div class="form-group-inner">
                                        <h6>EXPENSE</h6>
                                        <input type="number" name="expense" id="expense"  value="0.00" placeholder=""/>
                                    </div>
                                    <div class="form-group-inner">
                                        <h6>INCOME</h6>
                                        <input type="number" name="income" id="income"  value="0.00" placeholder=""/>
                                    </div>
                                    <div class="form-group-inner">
                                        <h6>Date</h6>
                                        <input type="text" name="date" id="date"  value="" placeholder=""/>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-sm-12" style="margin-bottom: 20px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect02">Status Selection</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" style="width: 100px;">
                                            <option value="1">Paid</option>
                                            <option value="2">Pending</option>
                                        </select>
                                    </div>

                                    <h6>REMARKS</h6>
                                    <textarea class="" id="remarks" name="remarks" style="padding:15px;width:100%;height:50px;margin-top:20px;border-radius:0px;border:1px solid gray;" placeholder="Enter type something here."></textarea>
                                    <div style="text-align: center!important;">
                                        <button type="submit" id="submit_btn111" class="btn btn-primary btn-lg btn3d" style="margin-top:30px;width:120px;height:40px;padding:1px;letter-spacing:1px;margin-left:20px;">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="edit_product_dlg" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;">
                    <h5 class="modal-title" style="text-align: center;font-size:20px;">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -22px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container" style="width: 100%; height: auto;margin-top: 0px;margin-bottom: 5px;">
                        <div class="" style="height: auto;margin-bottom: 5px;background-color: white;">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <input type="text" name="id1" id="id1"  value="" placeholder="" style="display:none;"/>
                                <div class="form-group-inner">
                                    <h6>PARTICULARS</h6>
                                    <input type="text" name="particulars1" id="particulars1"  value="" placeholder=""/>
                                </div>
                                <div class="form-group-inner">
                                    <h6>EXPENSE</h6>
                                    <input type="number" name="expense1" id="expense1"  value="0.00" placeholder=""/>
                                </div>
                                <div class="form-group-inner">
                                    <h6>INCOME</h6>
                                    <input type="number" name="income1" id="income1"  value="0.00" placeholder=""/>
                                </div>
                                <div class="form-group-inner">
                                    <h6>DATE</h6>
                                    <input type="text" name="date1" id="date1"  value="" placeholder=""/>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12" style="margin-bottom: 20px;">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Status Selection</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect02" style="width: 100px;">
                                        <option value="1">Paid</option>
                                        <option value="2">Pending</option>
                                    </select>
                                </div>

                                <h6>REMARKS</h6>
                                <textarea class="" id="remarks1" name="remarks" style="padding:15px;width:100%;height:50px;margin-top:20px;border-radius:0px;border:1px solid gray;" placeholder="Enter type something here."></textarea>
                                <div style="text-align: center!important;">
                                    <button type="submit" id="challenge-edit" class="btn btn-primary btn-lg btn3d" style="margin-top:30px;width:120px;height:40px;padding:1px;letter-spacing:1px;margin-left:20px;">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 row" style="height: auto;width: 110%;margin-top: 20px">
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
    <script>
        $('input[type=radio][name=group1]').change(function() {
            if (this.value == 'free') {
                $( ".paid_price" ).hide();
            }
            else if (this.value == 'paid') {
                $( ".paid_price" ).show();
            }
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
                '<a href="">Home</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Account</span>\n' +
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
        function select_price(id){
            var e = document.getElementById(id);
            var select = e.options[e.selectedIndex].text;
            alert(select);
        }
    </script>
    <script>
        $( document ).ready(function() {
            $('.add_master').click(function () {
                $('#add_product_dlg').modal();
            });
            $('#submit_btn111').click(function(){
                var e = document.getElementById('inputGroupSelect01');
                var status1 = e.options[e.selectedIndex].text;
                var particulars = $('#particulars').val();
                var expense = $('#expense').val();
                var income=$('#income').val();
                var remarks = $('#remarks').val();
                var date = $('#date').val();

                if(particulars == '' || remarks == '' || date == ''){
                    alert('Please fill in the blanks'); return;
                }

                var  data = new FormData();
                data.append('particulars', particulars);
                data.append('expense', expense);
                data.append('income', income);
                data.append('status1', status1);
                data.append('remarks', remarks);
                data.append('date', date);

                $.ajax({
                    type: "POST",
                    url: '{{url('/add_record')}}',
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
                        $('#exampleModalCenter').modal('toggle');
                        location.reload();
                    },
                    error: function(response){

                        console.log(response);
                        alert('error');

                    }
                });


            });
            $('#challenge-edit').click(function(){

                var id1 = $('#id1').val();
                var particulars = $('#particulars1').val();
                var expense = $('#expense1').val();
                var income=$('#income1').val();
                var date=$('#date1').val();
                var remarks = $('#remarks1').val();
                var e = document.getElementById('inputGroupSelect02');
                var status = e.options[e.selectedIndex].text;
                var  data = new FormData();
                data.append('id', id1);
                data.append('particulars', particulars);
                data.append('expense', expense);
                data.append('income', income);
                data.append('remarks', remarks);
                data.append('status', status);
                data.append('date', date);

                $.ajax({
                    type: "POST",
                    url: '{{url('/edit_record')}}',
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
                        $('#edit_product_dlg').modal('toggle');
                        //console.log(response);
                        location.reload();
                    },
                    error: function(response){
                        console.log(response);
                        $('#edit_product_dlg').modal('toggle');
                        location.reload();
                    }
                });


            });

        });
        function delete_record(id){
            var id1 = $('#'+id).find('.id1').text();
            var  data = new FormData();
            data.append('id', id1);

            $.ajax({
                type: "POST",
                url: '{{url('/delete_record')}}',
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
                    location.reload();
                }
            });
        }
        function edit_admin(id){
            var id1 = $('#'+id).find('.id1').text();
            var particulars = $('#'+id).find('.particulars').text();
            var expense = $('#'+id).find('.expense').text();
            var income = $('#'+id).find('.income').text();
            var status = $('#'+id).find('.status').text();
            var remarks = $('#'+id).find('.remarks').text();
            var date = $('#'+id).find('.expense_date').text();

            $('#id1').val(id1);
            $('#particulars1').val(particulars);
            $('#expense1').val(expense);
            $('#income1').val(income);
            $('#remarks1').val(remarks);
            $('#date1').val(date);

            if(status == 'Paid'){
                $('#inputGroupSelect02 option[value="1"]').attr("selected", "selected");
            }else{
                $('#inputGroupSelect02 option[value="2"]').attr("selected", "selected");
            }

            $('#edit_product_dlg').modal();
        }
        function selectitem(item, selectObject,id){
            var value = selectObject.value;
            // alert(item +"->" +value);
            var val='';
            switch (value) {
                case '0':
                    $('#'+id).css("color","black");
                    val='new';
                    break;
                case '1':
                    $('#'+id).css("color","blue");
                    val='start';
                    break;
                case '2':
                    $('#'+id).css("color","blue");
                    val='closed';
                    break;
                case '3':
                    $('#'+id).css("color","red");
                    val='completed';
                    break;
                case '4':
                    $('#'+id).css("color","blue");
                    val='deleted';
                    break;
                case '5':
                    $('#'+id).css("color","red");
                    val='ended';
                    break;
                default:
                    $('#'+id).css("color","red");
                    val='error';
                    break;
            }
            var  data = new FormData();
            data.append('table', 'challenge');
            data.append('cid', item);
            data.append('value', val);
            $.ajax({
                type: "POST",
                url: '{{url('/challenge/permission0')}}',
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
                    // alert('error');

                }
            });

        }
        function myFunction1(cid) {
            var  data = new FormData();
            data.append('cid', cid);
            $.ajax({
                type: "POST",
                url: '{{url('/challenge/award0')}}',
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
                        alert('Successful awarded.');

                    }else if(obj.state == 2){
                        alert('Sorry,you have already awarded for winners.');
                    }else{
                        alert('This challenge has not finished yet.');
                    }

                    location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
        }
        function viewdescription(cid) {
            var d = $('#'+cid).find('.description').text();
            $('#view-description').val(d);
            $('#view_product_dlg').modal();
        }
    </script>

@stop



















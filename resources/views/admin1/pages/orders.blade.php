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
                                <h1><span class="table-project-n">Orders</span></h1>
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
                                        <th data-field="user">User Name</th>
                                        <th data-field="email" data-editable="">User Email</th>
                                        <th data-field="mobile" data-editable="">Phone Number</th>
                                        <th>Payment Method</th>
                                        <th data-field="country" data-editable="">Grand Total</th>
                                        <th data-field="notes" data-editable="">Notes</th>
                                        <th data-field="updatenotes" data-editable="">Update Notes</th>
                                        <th data-field="state1" data-editable="">Status</th>
                                        <th data-field="action" data-editable="">Action</th>                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($OrdersDetail as $key => $value)
                                            <tr>
                                                <td></td>
                                                <td>{{$value->order_id}}</td>
                                                <td>{{$value->first_name}}</td>
                                                <td>
                                                  {{$value->email}}
                                                </td>
                                                <td>
                                                {{$value->mobile}}
                                                </td>
                                                <td>
                                                      {{$value->payment_method}}
                                                </td>
                                                  <td>
                                                      {{$value->grand_total}}
                                                  </td>
                                                  <td class="textarea_td">
                                                    <textarea id="val-{{$value->order_id}}" class="text_area_feild"  cols="30" rows="3" style="padding:10px;">
                                                    {{$value->note}}
                                                    </textarea>
                                                  </td>
                                                  <td><button id="{{$value->order_id}}" onclick="update_note(this.id)" class="btn btn-primary btn-sm update_notes">Update</button></td>
            
                                                  <td>
                                                      <select style="border: 1px solid black  !important; padding:5px; "  class="c-select admin_order_status" id="{{$value->order_id}}" onchange="selectitem('{{$value->order_id}}',this)">
                                                        <option value="0" {{ ($value->status == 0) ? "selected" : "" }} >Pending</option>
                                                        <option value="1" {{ ($value->status == 1) ? "selected" : "" }} >In Process</option>
                                                        <option value="2" {{ ($value->status == 2) ? "selected" : "" }} >Completed</option>
                                                        <option value="3" {{ ($value->status == 3) ? "selected" : "" }} >Canceled</option>
                                                      </select>
                                                  </td>
                                                  <td>
                                                      <a  href="{{url('admin/orderdetail/'.$value->order_id) }}" class="btn btn-primary btn-sm" style="color:white;">Complete Detail</a>
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
                '<span class="bread-blod">Orders</span>\n' +
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

        function remove(id) {
            var imgid = $('#'+id).find('.removeid').text();

            var data = new FormData();
            data.append('id', imgid);

            $.ajax({
                type: "POST",
                url: '{{url("/admin/imgdelete")}}',
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
        function update_note(id){
            var id  = id;
            var notes = $('#val-'+id).val();
            notes = notes.replace(/\s\s+/g, ' ');
            $.ajax({
                url: "{{url('/admin/note_update')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'order_id':id,
                    'notes' : notes
                },
                method: 'post',
                success: function(data, textStatus, jqXHR){
                    if(data == "success"){
                        location.reload();
                //swal('Note Updated','Notes Have been updated','success');

                    }
                }
            });            
        }

        function selectitem(id,selectObject) {
            var value = selectObject.value;
            var data = new FormData();
            data.append('id', id);
            data.append('val', value);

            $.ajax({
                type: "POST",
                url: '{{url("/order_status")}}',
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
                    location.reload();
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
        } 
 
    </script>

@stop

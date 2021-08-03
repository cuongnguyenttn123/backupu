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
        .card-img.max-img{width:250px;object-fit:cover;height:100px;}
        .card-form-cn input[type=number], .card-form-cn input[type=text]{border-color:#eaeaea;padding:0px 0px}
        .imagediv{
            width:200px;
            min-width:200px;
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Orders</h4>
                            {{--<p class="card-category"> Here is a subtitle for this table</p>--}}
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <td>ID</td>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>address</th>
                                    <th>address2</th>
                                    <th>state</th>
                                    <th>zip</th>
                                    <th>mobile</th>
                                    <th>Payment Method</th>
                                    <th>Grand Total</th>
                                    <th>Date & Time</th>
                                    <th>Instructions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($order_main as $key => $value)
                                        <tr>
                                            <td>{{$value->order_id}}</td>
                                            <td> {{$value->first_name}}</td>
                                            <td>
                                              {{$value->email}}
                                            </td>
                                            <td>
                                              {{$value->city}}
                                            </td>
                                            <td>
                                              {{$value->country}}
                                            </td>
                                            <td>
                                             {{$value->address}}
                                            </td>
                                            <td>
                                             {{$value->address2}}
                                            </td>
                                            <td>
                                             {{$value->state}}
                                            </td>
                                            <td>
                                             {{$value->zip}}
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
                                              <td>
                                                  {{$value->created_at}}
                                              </td>
                                              <td>
                                                  {{$value->instructions}}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Orders Details  </h4>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Delivery Method</th>
                                    <th>Selected Size</th>
                                    <th>Printing Price</th>
                                    <th>Quantity </th>
                                    <th>Net Price</th>
                                    <th>Seller Name</th>
                                    <th>Seller Mobile</th>
                                    <th>Seller email</th>
                                    </thead>
                                    <tbody>
                                    @foreach($order_detail as $key => $value)
                                        <tr>
                                            <td> <img style="width: 200px;" src="{{$value->url}}"/></td>
                                            <td>
                                              {{$value->product_name}}
                                            </td>
                                            <td>{{$value->unit_price}}</td>
                                            <td>
                                              {{$value->delivery_method}}
                                            </td>
                                            <td>
                                              {{$value->selected_size}}
                                            </td>
                                            <td>{{$value->printing_price}}</td>
                                            <td>
                                             {{$value->quantity}}
                                            </td>
                                            <td>
                                            {{$value->unit_price}}
                                            </td>
                                            <td>
                                            {{$value->name}}
                                            </td>
                                            <td>
                                            {{$value->mobilenum}}
                                            </td>
                                            <td>
                                            {{$value->email}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <h3 class="text-center" >Grand Total ${{$order_main[0]->grand_total}} </h3>
                        <button type="button" class="btn btn-primary" id="print_details">Print</button>
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
                '<span class="bread-blod">Order Details</span>\n' +
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
        
        $('#print_details').on('click',function(){
            var previous_conent = $('body').html();
            var print_content = $('.content').html();
            $('body').html(print_content);
            $('#print_details').hide();
            $('tr').css('border','1px solid black');
            window.print();
            $('body').html(previous_conent);

        });        
    </script>

@stop

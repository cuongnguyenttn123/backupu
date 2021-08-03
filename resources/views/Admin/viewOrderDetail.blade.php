@extends('Admin.Layout.dashboard')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        select{
            border: 0;
            width: 100%;
        }
        .btn3d {
            transition:all .08s linear;
            position:relative;
            outline:medium none;
            -moz-outline-style:none;
            border:0px;
            margin-right:10px;
            margin-top:15px;
        }
        .btn3d:focus {
            outline:medium none;
            -moz-outline-style:none;
        }
        .btn3d:active {
            top:9px;
        }
        .btn-default {
            box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #adadad, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#fff;
        }
        .btn-primary {
            box-shadow:0 0 0 1px #428bca inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #357ebd, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#428bca;
        }
        .btn-success {
            box-shadow:0 0 0 1px #5cb85c inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4cae4c, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#5cb85c;
        }
        .btn-info {
            box-shadow:0 0 0 1px #5bc0de inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #46b8da, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#5bc0de;
        }
        .btn-warning {
            box-shadow:0 0 0 1px #f0ad4e inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #eea236, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#f0ad4e;
        }
        .btn-danger {
            box-shadow:0 0 0 1px #c63702 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #C24032, 0 8px 0 1px rgba(0,0,0,0.4), 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#c63702;
        }
    </style>
    <style>
            @media only screen and (max-width: 991px) {
                  #sidebar{
                   display:none;
                  }
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
@include ('Admin.Modal.add_challenge')
@section('content')
    {{--<li ><a href='signin' data-toggle="modal" data-target="#signindlg">Sign in</a></li>--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Orders</h4>
                    {{--<p class="card-category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table1">
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
@stop
@section('script')
    <script>
        function selectitem(item, selectObject,id){
            //alert(id);
            //var selectedCountry = $(this).children("option:selected").val();
            //alert(id+" ->" + selectedCountry);
            var value = selectObject.value;
            alert(item +"->" +value);
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
                url: '{{url('/challenge/permission')}}',
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
                    // var obj = JSON.parse(response);
                    //alert(obj.message);
                    // console.log(obj);
                 location.reload();
                },
                error: function(response){
                    console.log(response);
                    alert('error');
                }
            });
        }
        function readURL(input) {
            //alert("asdf");
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    //alert(e.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }imagePreview
        $("#imageUpload").change(function() {
            //alert("asdf");
            readURL(this);
        });
        //-------------------------------------------------
        $('#submit_btn111').click(function(){
            var bg = $('#imageUpload').val().match(/[-_\w]+[.][\w]+$/i)[0];
            bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
            var title = $('#title').val();
            var price = $('#price').val();
            var description = $('#description').val();
            var period = $('#period_id').children("option:selected").val();
            var type= $("input:radio[name='group1']:checked").val();
            var photo_count= $("input:radio[name='group2']:checked").val();
            var prize = $('#flip').val()+','+$('#charge').val()+','+$('#wand').val();
            if(!title || !period || !type || !description || !price || !prize ) {
                alert("Input your information correctly");
                return;
            }
            var  data = new FormData();
            data.append('image', $("#imageUpload")[0].files[0]);
            data.append('title', title);
            data.append('price', price);
            data.append('prize', prize);
            data.append('period', period);
            data.append('type', type);
            data.append('photocount', photo_count);
            data.append('description', description);
            $.ajax({
                type: "POST",
                url: '{{url('/challenge/upload')}}',
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
                    //var obj = JSON.parse(response);
                    //alert(obj.message);
                    $('#exampleModalCenter').modal('toggle');
                    //console.log(response);
                    // window.location.replace('./challenges/my');
                },
                error: function(response){
                    console.log(response);
                    alert('error');
                }
            });
        });

        $('#print_details').on('click',function(){
            var previous_conent = $('body').html();
            var print_content = $('.content').html();
            $('body').html(print_content);
            $('#print_details').hide();
            $('tr').css('border','1px solid black');
            window.print();
            $('body').html(previous_conent);

        });
        //    --------------------------------------------
    </script>
@stop

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

    <!-------- content--------->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('user/plugins/jquery/jquery.min.js')}}"></script>

    <style>
        .create-content{
            width: 97.5%;
            height: 600px;
            overflow: auto;
            margin:auto;
            margin-top: 0px;
            background-color: white;
        }
        .create-step1{
            padding: 20px;
            border:1px solid gray;
        }
        .create-step2{
            padding: 20px;
            border:1px solid gray;
            display: none;
        }
        .create-step3{
            padding: 20px;
            border:1px solid gray;
            display: none;
        }
        .success-alert{
            display: none;
        }
        .create-header{
            width: 100%;
            height: 40px;
            background: linear-gradient(to bottom,#139ff0 0,#0087e0 100%);
            border: 1px solid #0087e0;
            color: #F7F7F7;
        }
        .step1{
            width: 100px;
            Height:30px;
            border-radius: 5px;
            background: linear-gradient(to bottom,#5dc26a 0,#4fb55d 100%);
            border: 1px solid #4fb55d;
            color: #F7F7F7;
            font-weight: 500;
            letter-spacing: 3px;

        }
        .step2{
            width: 100px;
            Height:30px;
            border-radius: 5px;
            background: linear-gradient(to bottom,#5dc26a 0,#4fb55d 100%);
            border: 1px solid #4fb55d;
            color: #F7F7F7;
            font-weight: 500;
            letter-spacing: 3px;
        }
        #restaurant-save{
            width: 150px;!important;
            Height:40px;!important;
            border-radius: 5px;
            background: linear-gradient(to bottom,#5dc26a 0,#4fb55d 100%);
            border: 1px solid #4fb55d;
            color: #F7F7F7;
            font-weight: 500;
            letter-spacing: 3px;
            margin-top: 10px;
        }
        input{
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            padding: 8px 10px;
            height: auto;
            font-size: 14px;
            border-radius: 4px;
            font-family: inherit;
            border: 1px solid #ABB0B2;
        }
    </style>

    <!-----------end------------>
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
    <div class="create-content">
        <div class="create-header">
            <p style="text-align: left;margin-left:30px;font-size: 25px;">Restaurant create table</p>
        </div>
        <div class="create-step1">
            <div style="padding:10px;width: 325px;border-radius: 10px;border:1px solid lightgrey;margin-bottom: 10px;">
                <span style="color: red;font-weight: bold">Note 1:</span>
                <span style="margin-left: 10px;">Can not use space for name.</span><br>
                <span style="margin-left: 60px;">Instead of  <span style="color: red">" space "</span> ,please use <span style="color: green">" __ "</span>.</span><br>
                <span style="margin-left: 60px;">Example:<span style="color: green;margin-left: 5px;margin-right: 5px;">Win_Tea_Restaurant</span><span><i class="far fa-check-circle" style="color: green"></i></span></span>
                <span style="margin-left: 123px;margin-right: 10px;color: red">Win Tea Restaurant<i class="fa fa-remove" style="color:red;margin-left: 12px;"></i></span>
                <span style="color: red;font-weight: bold">Note 2:</span>
                <span style="margin-left: 10px;">You need to select number of floors </span><br>
                <span style="margin-left: 60px;">within max floors(license Number).</span>
                <span style="margin-left: 60px;color:green">Your max floors :<span class="admin-license" style="color: blue;font-weight: bold"> {{$license}}</span></span>
            </div>

            <span>Restaurant Name :<input class="res-name" type="text" placeholder="Restaurant Name" style="margin-left:30px;"></span><br><br>
            <span>Number of floors : <input class="floor-num" type="number" placeholder="Number of floors" style="margin-left:30px;"></span><br><br>
            <span><button class="step1">NEXT</button></span>

        </div>
        <div class="create-step2">
        </div>
        <div class="create-step3">
        </div>
    </div>
<!----------------------modal------------------------>
    <div class="container">
        <button type="button" id="success-modal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display: none;"></button>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="width: 300px;">

                <!-- Modal content-->
                <div class="modal-content" style="width: 300px;">
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--</div>--}}
                    <div class="modal-body" style="text-align: center;background-color: greenyellow;border-radius: 7px;width: 300px;height: 90px;">
                        <button type="button" class="close" data-dismiss="modal" style="position:relative;top:-14px;left: 10px;">&times;</button>
                        <p style="font-size:15px;">Restaurant has created Successfully!</p>
                        <a href="{{url('view/restaurant/'.'edit'.'/'.'1')}}"><button style="width:120px;height: 20px;border:1px solid green;border-radius:2px;background-color:green;color: white; ">Floor Create</button></a>
                    </div>
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>
    </div>

    <!--------------------end modal---------------------->
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

    <!---------------content part-------------------->
    <script>
        $(document).ready(function(){
            $(".step1").click(function(){
                $('.create-step1').css('display','none');
                $('.create-step2').css('display','block');
                var res_name = $(".res-name").val();
                var floor_num = $(".floor-num").val();
                var license =$(".admin-license").text();
                if(res_name == '' || floor_num == '' || parseInt(floor_num) > parseInt(license) || res_name.indexOf(" ") != -1){
                    alert('please confirm your information.');
                    $('.create-step1').css('display','block');
                    $('.create-step2').css('display','none');
                }
                else{
                    var add1='<span style="color:green">How many Tables do you need in each floor?</span><br><span style="color:green">Your max tables : <span style="color:blue;font-weight: bold">50</span> (in each floor.)</span><br>';
                    var j = parseInt(floor_num);
                    for(i=1;i<j+1;i++){
                        add1 =add1 + '<span>floor'+i+' :  Number of Tables<input class="floor-'+i+'" type="number" placeholder="table numbers of floor'+i+'" style="margin-bottom:10px;margin-left:10px;margin-top:10px;"></span><br>';
                    }
                    add1 =add1+'<span><button class="step2">NEXT</button></span><br>';
                    $('.create-step2').append(add1);
                    $(".step2").click(function() {
                        $('.create-step2').css('display','none');
                        $('.create-step3').css('display','block');
                        for(i1=1;i1<j+1;i1++){
                            var check=[];var tn=0;
                            check[i1]=parseInt($('.floor-'+i1).val());
                            if(check[i1] == ''){
                                alert('please fill in all fields');
                                break;
                            }else{
                                for(ktn =1;ktn<j+1;ktn++){
                                    tn=tn+parseInt($('.floor-'+ktn).val());
                                }

                                  for(i2=1;i2<j+1;i2++){
                                    var floor=[];
                                    for(i3=1;i3<check[i2]+1;i3++){
                                        if(i3<10){
                                            floor=floor+'<span>Table'+i3+' :<input class="T-'+i3+'" type="number" placeholder="number of seats :table'+i3+'" style="margin-bottom:10px;margin-left:20px;width:200px;"><span style="margin-left:20px;margin-right:10px;">Type: </span><select class="type-'+i3+'"><option value="1">Normal</option><option value="2">Special</option></select></span><br>';
                                        }else{
                                        floor=floor+'<span>Table'+i3+' :<input class="T-'+i3+'" type="number" placeholder="number of seats :table'+i3+'" style="margin-bottom:10px;margin-left:13px;width:200px;"><span style="margin-left:20px;margin-right:10px;">Type: </span><select class="type-'+i3+'"><option value="1">Normal</option><option value="2">Special</option></select></span><br>';
                                        }
                                    }
                                    var floor_des='<span style="background-color: yellow">'+'<span style="font-weight: bold;color:green;">Floor'+i2+' :</span>How many seats or What kinds of type for each table?</span><br>';
                                    if(floor != ''){
                                        if(i1 == j){
                                            var submit='<span><button id="restaurant-save">CRETE NOW!</button></span>';
                                            var parent_pre='<div class="table-div'+i2+'" style="border:1px solid green;padding:5px;">';
                                            var parent_end='</div>';
                                            $('.create-step3').append(parent_pre+floor_des+floor+parent_end+submit);
                                            $("#restaurant-save").click(function() {
                                                // alert(res_name);
                                                // alert(floor_num);

                                                for(i4=1;i4<j+1;i4++){
                                                    var table=[];
                                                    var type=[];
                                                    check[i4]=parseInt($('.floor-'+i4).val());
                                                    var k=parseInt($('.floor-'+i4).val());
                                                    for(i5=1;i5<check[i4]+1;i5++){
                                                        var check1 = $('.table-div'+i4).find(".T-"+i5).val();
                                                        var type1 = $('.table-div'+i4).find(".type-"+i5).find('option:selected').text();
                                                        if(check1 == ''){
                                                            alert('Please fill in all fields');break;
                                                        }else{
                                                            table[i5] = check1;
                                                            type[i5] = type1;
                                                        }
                                                    }

                                                    var data = new FormData();
                                                    data.append('res_name', res_name);
                                                    data.append('floor_num', floor_num);
                                                    data.append('tn',tn);
                                                    data.append('type', JSON.stringify(type));
                                                    data.append('counts1',k);
                                                    data.append('table', JSON.stringify(table));
                                                    // data.append('email', email);
                                                    data.append('floor_no', i4);

                                                    $.ajax({
                                                        type: "POST",
                                                        url: '{{url("create_res")}}',
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
                                                            console.log(response);
                                                            var json = JSON.parse(response);
                                                            var type = (json['state']);
                                                            if (type == 200) {
                                                               // alert('success');
                                                               $('#success-modal').click();
                                                                // $('.success-alert').css('display','block');
                                                                // alert('Success created');
                                                                // location.reload();
                                                                // window.location.replace('./user/dashboard');

                                                            }
                                                        },
                                                        error: function (response) {
                                                            console.log(response);
                                                            alert('create failed');
                                                        }
                                                    });


                                                }
                                            });
                                        }else{
                                            var parent_pre='<div class="table-div'+i2+'" style="border-top:1px solid green;border-left:1px solid green;border-right:1px solid green;padding:5px;">';
                                            var parent_end='</div>';
                                            $('.create-step3').append(parent_pre+floor_des+floor+parent_end);
                                        }
                                    }
                                }
                            }
                        }

                    });
                }
            });
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
                '<a href="">Create</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Restaurant</span>\n' +
                '</li>');
        });

    </script>
    <script>


        $(document).on("change paste keyup","#total_amount", function() {
            //console.log( $(this).val() );
            var admin_balance='12';
            var sub_balance=$('#balance_dlg #subadmin_amount').val();
            var amount=$('#balance_dlg #total_amount').val();
            if ($('#balance_dlg #total_amount').val()==''){
                amount=0;
            }

            $('#balance_dlg #pay_amount').text(amount);
            console.log($('#balance_dlg .balance_type').text());
            if ($('#balance_dlg .balance_type').text()=='DepositDeposit') {
                $('#balance_dlg .admin_balance').text(parseFloat(admin_balance)-parseFloat(amount));
                $('#balance_dlg .sub_balance').text(parseFloat(sub_balance)+parseFloat(amount));
                $('#balance_dlg #admin_remark').text('Deposit chips to bettech Rs: '+amount);
            }
            else{
                $('#balance_dlg .admin_balance').text(parseFloat(admin_balance)+parseFloat(amount));
                $('#balance_dlg .sub_balance').text(parseFloat(sub_balance)-parseFloat(amount));
                $('#balance_dlg #admin_remark').text('Withdraw chips to bettech Rs: '+amount);
                $('#balance_dlg #s_remark').text('Withdraw chips to bettech Rs: '+amount);
            }

        });
        function EditMaster(item) {
            //window.location.href = url;
            $('#add_master_dlg #master_id').val(item.id);
            $('#add_master_dlg #name').val(item.name);
            $('#add_master_dlg #email').val(item.email);
            $('#add_master_dlg #profit_loss_per').val(item.profit_loss_per);
            $('#add_master_dlg #comm').val(item.comm);
            //$('#add_master_dlg #master_id').val(item.id);
            //$('#add_master_dlg #password').val(item.password);

            $('#add_master_dlg #type').text('update');
            $('#add_master_dlg #add_master').text('Save');
            $('#add_master_dlg').modal();
        }
        $('.add_master').click(function () {
            $('#add_master_dlg #type').text('insert');
            $('#add_master_dlg #change_odd').text('Submit');
            $('#add_master_dlg').modal();
        });
        $('#add_master').click(function () {
            $('#add_master_dlg').modal('toggle');
            var send_data={};
            send_data.type= $('#add_master_dlg #type').text();
            send_data.table_name= 'admins';
            //send_data.data=[];
            send_data.data={
                //'id':$('#add_master_dlg #master_id').val(),
                'name':$('#add_master_dlg #name').val(),
                'email':$('#add_master_dlg #email').val(),
                'profit_loss_per':$('#add_master_dlg #profit_loss_per').val(),
                'comm':$('#add_master_dlg #comm').val(),
                'password':$('#add_master_dlg #password').val(),
                'is_super':2,
                'parent_id':'12'
            };
            // send_data.data.push({"field":'id',"value":$('#PrimaryModalhdbgcl #sports_id').val()});
            // send_data.data.push({"field":'title',"value":$('#PrimaryModalhdbgcl #sports_name').val()});
            send_data.condition=[];
            send_data.condition.push(['id',$('#add_master_dlg #master_id').val()]);
            //console.log(typeof send_data,JSON.stringify(send_data));
            myajax('https://oddsexch.com/api/table_edit',send_data,true);
        });
        function Reset(item) {
            //$('#add_master_dlg').modal('toggle');
            var send_data={};
            send_data.type= $('#add_master_dlg #type').text();
            send_data.table_name= 'admins';
            //send_data.data=[];
            send_data.data={
                'password':'123456789',
            };
            send_data.condition=[];
            send_data.condition.push(['id',item.id]);
            myajax('https://oddsexch.com/api/table_edit',send_data,false);
        }
    </script>

@stop






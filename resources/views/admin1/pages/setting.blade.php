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
        
        .setting{
            margin-top:50px;
            width:40%;
            max-width:300px;
            height:370px;
            border:1px solid lightgrey;
            float:left;
            text-align:center;
            font-size:20px;
            font-weight:500;
            font-family:arial;
            padding-top:15px;
            text-decoration: underline;    
            margin-left:10%;
        }
        .setting input{
            margin-bottom:0px!important;
            text-align:center;
        }
        .setting button{
            margin-top:20px;
            width:160px;
            height:35px;
            border:1px solid green;
            background:green;
            color:white;
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Settings</h4>
                </div>
                                <div class="card-body">
                    <div class="col-md-3 setting">
                        <p>Sign Up Setting.</p>
                        
                        <label>Price($)</label><input id="s-price" value="{{$setting->s_price}}">
                        <label>Flip</label><input id="s-flip" value="{{$setting->s_flip}}">
                        <label>Wand</label><input id="s-wand" value="{{$setting->s_wand}}">
                        <label>Charge</label><input id="s-charge" value="{{$setting->s_charge}}">
                        
                        <button id="signup-setting">Update</button>
                    </div>
                    <div class="col-md-3 setting">
                        <p>Sell tax Setting.</p>
                        <label>Tax(%)</label><input id="tax" value="{{100*$setting->tax}}"> 
                        <button style="margin-top:200px;" id="tax-update">Update</button>
                    </div>
                    <div class="col-md-3 setting" >
                        <div style="height:285px;overflow-y:scroll;">
                            <p>Winner Setting.</p>
                            
                            <p style="margin-bottom:0;margin-top:15px;">Rank 1.</p>
                            <label>Price(%)</label><input id="r1-price" value="{{100*$setting->r1_price}}">
                            <label>Flip</label><input id="r1-flip" value="{{$setting->r1_flip}}">
                            <label>Wand</label><input id="r1-wand" value="{{$setting->r1_wand}}">
                            <label>Charge</label><input id="r1-charge" value="{{$setting->r1_charge}}">
                            <p style="margin-bottom:0;margin-top:15px;">Rank 2.</p>
                            <label>Price(%)</label><input id="r2-price" value="{{100*$setting->r2_price}}">
                            <label>Flip</label><input id="r2-flip" value="{{$setting->r2_flip}}">
                            <label>Wand</label><input id="r2-wand" value="{{$setting->r2_wand}}">
                            <label>Charge</label><input id="r2-charge" value="{{$setting->r2_charge}}">                        
                            <p style="margin-bottom:0;margin-top:15px;">Rank 3.</p>
                            <label>Price(%)</label><input id="r3-price" value="{{100*$setting->r3_price}}">
                            <label>Flip</label><input id="r3-flip" value="{{$setting->r3_flip}}">
                            <label>Wand</label><input id="r3-wand" value="{{$setting->r3_wand}}">
                            <label>Charge</label><input id="r3-charge" value="{{$setting->r3_charge}}"> 
                            <p style="margin-bottom:0;margin-top:15px;">Rank 4.</p>
                            <label>Price(%)</label><input id="r4-price" value="{{100*$setting->r4_price}}">
                            <label>Flip</label><input id="r4-flip" value="{{$setting->r4_flip}}">
                            <label>Wand</label><input id="r4-wand" value="{{$setting->r4_wand}}">
                            <label>Charge</label><input id="r4-charge" value="{{$setting->r4_charge}}"> 
                            <p style="margin-bottom:0;margin-top:15px;">Rank 5.</p>
                            <label>Price(%)</label><input id="r5-price" value="{{100*$setting->r5_price}}">
                            <label>Flip</label><input id="r5-flip" value="{{$setting->r5_flip}}">
                            <label>Wand</label><input id="r5-wand" value="{{$setting->r5_wand}}">
                            <label>Charge</label><input id="r5-charge" value="{{$setting->r5_charge}}"> 
                            <p style="margin-bottom:0;margin-top:15px;">Rank 6~10.</p>
                            <label>Price(%)</label><input id="r6-price" value="{{100*$setting->r6_price}}">
                            <label>Flip</label><input id="r6-flip" value="{{$setting->r6_flip}}">
                            <label>Wand</label><input id="r6-wand" value="{{$setting->r6_wand}}">
                            <label>Charge</label><input id="r6-charge" value="{{$setting->r6_charge}}"> 
                            <p style="margin-bottom:0;margin-top:15px;">Rank 10~50.</p>
                            <label>Price(%)</label><input id="r7-price" value="{{100*$setting->r6_price}}">
                            <label>Flip</label><input id="r7-flip" value="{{$setting->r7_flip}}">
                            <label>Wand</label><input id="r7-wand" value="{{$setting->r7_wand}}">
                            <label>Charge</label><input id="r7-charge" value="{{$setting->r7_charge}}"> 
                            <p style="margin-bottom:0;margin-top:15px;">Rank 50~100.</p>
                            <label>Price(%)</label><input id="r8-price" value="{{100*$setting->r8_price}}">
                            <label>Flip</label><input id="r8-flip" value="{{$setting->r8_flip}}">
                            <label>Wand</label><input id="r8-wand" value="{{$setting->r8_wand}}">
                            <label>Charge</label><input id="r8-charge" value="{{$setting->r8_charge}}"> 
                                               
                        </div>

                        <button style="margin-top:20px;margin-bottom:15px;" id="rank-update">Update</button>                   
                    </div> 
                    <div class="col-md-3 setting">
                        <div style="height:285px;overflow-y:scroll;">
                            <p>Invitation Setting</p>
                            <p>Sponsor A</p>
                            <label>Price($)</label><input id="ia-price" value="{{$setting->ia_price}}">
                            <label>Flip</label><input id="ia-flip" value="{{$setting->ia_flip}}">
                            <label>Wand</label><input id="ia-wand" value="{{$setting->ia_wand}}">
                            <label>Charge</label><input id="ia-charge" value="{{$setting->ia_charge}}">
                            
                            <p>Sponsor B</p>
                            <label>Price($)</label><input id="ib-price" value="{{$setting->ib_price}}">
                            <label>Flip</label><input id="ib-flip" value="{{$setting->ib_flip}}">
                            <label>Wand</label><input id="ib-wand" value="{{$setting->ib_wand}}">
                            <label>Charge</label><input id="ib-charge" value="{{$setting->ib_charge}}">
                        </div>    
                        <button id="i-update" style="margin-bottom:15px;">Update</button>                        
                    </div> 
                    
                    <div class="col-md-4 setting">
                        <div style="height:285px;overflow-y:scroll;">
                            <p>Sponsor Setting</p>
                            <p>Sponsor A</p>
                            <label>Price($)</label><input id="sa-price" value="{{$setting->sa_price}}">
                            <label>Flip</label><input id="sa-flip" value="{{$setting->sa_flip}}">
                            <label>Wand</label><input id="sa-wand" value="{{$setting->sa_wand}}">
                            <label>Charge</label><input id="sa-charge" value="{{$setting->sa_charge}}">
                            
                            <p>Sponsor B</p>
                            <label>Price($)</label><input id="sb-price" value="{{$setting->sb_price}}">
                            <label>Flip</label><input id="sb-flip" value="{{$setting->sb_flip}}">
                            <label>Wand</label><input id="sb-wand" value="{{$setting->sb_wand}}">
                            <label>Charge</label><input id="sb-charge" value="{{$setting->sb_charge}}">                     
                        </div>
                        <button id="s-update" style="margin-bottom:15px;">Update</button>                        
                    </div> 
                    <div class="col-md-4 setting">
                        <div style="height:285px;overflow-y:scroll;">
                            <p>Key Setting</p>

                            <label>Flip Price(2)</label><input id="key-flip1" value="{{$setting->flip1}}">
                            <label>Flip Price(9)</label><input id="key-flip5" value="{{$setting->flip5}}">
                            <label>Flip Price(19)</label><input id="key-flip10" value="{{$setting->flip10}}">
                            <label>Flip Price(39)</label><input id="key-flip25" value="{{$setting->flip25}}">                            
                            <label>Wand Price(2)</label><input id="key-wand1" value="{{$setting->wand1}}">
                            <label>Wand Price(9)</label><input id="key-wand5" value="{{$setting->wand5}}">
                            <label>Wand Price(19)</label><input id="key-wand10" value="{{$setting->wand10}}">
                            <label>Wand Price(39)</label><input id="key-wand25" value="{{$setting->wand25}}">

                            <label>Charge Price(2)</label><input id="key-charge1" value="{{$setting->charge1}}">
                            <label>Charge Price(9)</label><input id="key-charge5" value="{{$setting->charge5}}">
                            <label>Charge Price(19)</label><input id="key-charge10" value="{{$setting->charge10}}">
                            <label>Charge Price(39)</label><input id="key-charge25" value="{{$setting->charge25}}">                            
                   
                        </div>
                        <button id="key-update" style="margin-bottom:15px;">Update</button>                        
                    </div>
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
                '<span class="bread-blod">Setting</span>\n' +
                '</li>');
        });

    </script>
    <script>
        $(document).ready(function(){
            $('#signup-setting').click(function(){
                var s_price = $('#s-price').val();
                var s_flip = $('#s-flip').val();
                var s_wand = $('#s-wand').val();
                var s_charge = $('#s-charge').val();
                
                var  data = new FormData();
                data.append('s_price', s_price);
                data.append('s_flip', s_flip);
                data.append('s_wand', s_wand);
                data.append('s_charge', s_charge);
                $.ajax({
                    type: "POST",
                    url: '{{url('/signup_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              });
            $('#tax-update').click(function(){
                var tax = $('#tax').val();
    
                var  data = new FormData();
                data.append('tax', tax);
    
                $.ajax({
                    type: "POST",
                    url: '{{url('/tax_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              });
            $('#rank-update').click(function(){
                var r1_price = $('#r1-price').val();
                var r1_flip = $('#r1-flip').val();
                var r1_wand = $('#r1-wand').val();
                var r1_charge = $('#r1-charge').val();
                var r2_price = $('#r2-price').val();
                var r2_flip = $('#r2-flip').val();
                var r2_wand = $('#r2-wand').val();
                var r2_charge = $('#r2-charge').val();
                var r3_price = $('#r3-price').val();
                var r3_flip = $('#r3-flip').val();
                var r3_wand = $('#r3-wand').val();
                var r3_charge = $('#r3-charge').val();
                var r4_price = $('#r4-price').val();
                var r4_flip = $('#r4-flip').val();
                var r4_wand = $('#r4-wand').val();
                var r4_charge = $('#r4-charge').val(); 
                var r5_price = $('#r5-price').val();
                var r5_flip = $('#r5-flip').val();
                var r5_wand = $('#r5-wand').val();
                var r5_charge = $('#r5-charge').val();
                var r6_price = $('#r6-price').val();
                var r6_flip = $('#r6-flip').val();
                var r6_wand = $('#r6-wand').val();
                var r6_charge = $('#r6-charge').val();
                var r7_price = $('#r7-price').val();
                var r7_flip = $('#r7-flip').val();
                var r7_wand = $('#r7-wand').val();
                var r7_charge = $('#r7-charge').val();
                var r8_price = $('#r8-price').val();
                var r8_flip = $('#r8-flip').val();
                var r8_wand = $('#r8-wand').val();
                var r8_charge = $('#r8-charge').val();            
    
                var  data = new FormData();
                data.append('r1_price', r1_price);
                data.append('r1_flip', r1_flip);
                data.append('r1_wand', r1_wand);
                data.append('r1_charge', r1_charge);
                data.append('r2_price', r2_price);
                data.append('r2_flip', r2_flip);
                data.append('r2_wand', r2_wand);
                data.append('r2_charge', r2_charge);
                data.append('r3_price', r3_price);
                data.append('r3_flip', r3_flip);
                data.append('r3_wand', r3_wand);
                data.append('r3_charge', r3_charge);
                data.append('r4_price', r4_price);
                data.append('r4_flip', r4_flip);
                data.append('r4_wand', r4_wand);
                data.append('r4_charge', r4_charge);
                data.append('r5_price', r5_price);
                data.append('r5_flip', r5_flip);
                data.append('r5_wand', r5_wand);
                data.append('r5_charge', r5_charge);            
                data.append('r6_price', r6_price);
                data.append('r6_flip', r6_flip);
                data.append('r6_wand', r6_wand);
                data.append('r6_charge', r6_charge); 
                data.append('r7_price', r7_price);
                data.append('r7_flip', r7_flip);
                data.append('r7_wand', r7_wand);
                data.append('r7_charge', r7_charge);
                data.append('r8_price', r8_price);
                data.append('r8_flip', r8_flip);
                data.append('r8_wand', r8_wand);
                data.append('r8_charge', r8_charge);            
    
                $.ajax({
                    type: "POST",
                    url: '{{url('/rank_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              });
            $('#i-update').click(function(){
                var ia_price = $('#ia-price').val();
                var ia_flip = $('#ia-flip').val();
                var ia_wand = $('#ia-wand').val();
                var ia_charge = $('#ia-charge').val();
                var ib_price = $('#ib-price').val();
                var ib_flip = $('#ib-flip').val();
                var ib_wand = $('#ib-wand').val();
                var ib_charge = $('#ib-charge').val();
    
                var  data = new FormData();
                data.append('ia_price', ia_price);
                data.append('ia_flip', ia_flip);
                data.append('ia_wand', ia_wand);
                data.append('ia_charge', ia_charge);
                data.append('ib_price', ib_price);
                data.append('ib_flip', ib_flip);
                data.append('ib_wand', ib_wand);
                data.append('ib_charge', ib_charge);            
    
                $.ajax({
                    type: "POST",
                    url: '{{url('/i_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              });
            $('#s-update').click(function(){
                var sa_price = $('#sa-price').val();
                var sa_flip = $('#sa-flip').val();
                var sa_wand = $('#sa-wand').val();
                var sa_charge = $('#sa-charge').val();
                var sb_price = $('#sb-price').val();
                var sb_flip = $('#sb-flip').val();
                var sb_wand = $('#sb-wand').val();
                var sb_charge = $('#sb-charge').val();
    
                var  data = new FormData();
                data.append('sa_price', sa_price);
                data.append('sa_flip', sa_flip);
                data.append('sa_wand', sa_wand);
                data.append('sa_charge', sa_charge);
                data.append('sb_price', sb_price);
                data.append('sb_flip', sb_flip);
                data.append('sb_wand', sb_wand);
                data.append('sb_charge', sb_charge);            
    
                $.ajax({
                    type: "POST",
                    url: '{{url('/s_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              }); 
            $('#key-update').click(function(){
                var flip1 = $('#key-flip1').val();
                var flip5 = $('#key-flip5').val();
                var flip10 = $('#key-flip10').val();
                var flip25 = $('#key-flip25').val();
                
                var wand1 = $('#key-wand1').val();
                var wand5 = $('#key-wand5').val();
                var wand10 = $('#key-wand10').val();
                var wand25 = $('#key-wand25').val();

                var charge1 = $('#key-charge1').val();
                var charge5 = $('#key-charge5').val();
                var charge10 = $('#key-charge10').val();
                var charge25 = $('#key-charge25').val();

                var  data = new FormData();
                data.append('flip1', flip1);
                data.append('flip5', flip5);
                data.append('flip10', flip10);
                data.append('flip25', flip25);
                
                data.append('wand1', wand1);
                data.append('wand5', wand5);
                data.append('wand10', wand10);
                data.append('wand25', wand25);

                data.append('charge1', charge1);
                data.append('charge5', charge5);
                data.append('charge10', charge10);
                data.append('charge25', charge25);

                $.ajax({
                    type: "POST",
                    url: '{{url('/key_setting0')}}',
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
                           alert('Successful Updated.');
                           location.reload();
                        }
                     
                     location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error');
    
                    }
                });               
              });              
        });
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    

@stop

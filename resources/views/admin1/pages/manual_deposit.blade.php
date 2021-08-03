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
    /*the container must be positioned relative:*/
    .custom-select {
        position: relative;
        font-family: Arial;
    }

    .custom-select select {
        display: none; /*hide original SELECT element:*/
    }

    .select-selected {
        background-color: DodgerBlue;
    }

    /*style the arrow inside the select element:*/
    .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
    }

    /*point the arrow upwards when the select box is open (active):*/
    .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
    }

    /*style the items (options), including the selected item:*/
    .select-items div,.select-selected {
        color: #ffffff;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        user-select: none;
    }

    /*style items (options):*/
    .select-items {
        position: absolute;
        background-color: DodgerBlue;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
    }

    /*hide the items when the select box is closed:*/
    .select-hide {
        display: none;
    }

    .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>
<style>
    /*the container must be positioned relative:*/
    .custom-select1 {
        position: relative;
        font-family: Arial;
    }

    .custom-select1 select {
        display: none; /*hide original SELECT element:*/
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
                        <div style="float: right" class="btn btn-default add_master">Add Record</div>
                        <div class="main-sparkline13-hd">
                            <h1><span class="table-project-n">Wallet Transfers</span></h1>
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
                                    <th data-field="name" data-editable="">User name</th>
                                    <th data-field="city" data-editable="">User Email</th>
                                    <th data-field="tech_id">Tech ID</th>
                                    <th data-field="buyer">Amount</th>
                                    <th data-field="bemail">Notes</th>
                                    <th data-field="setting">Setting<span style="color: white">Delete&&Edit</span></th>
                                    <th data-field="status">Action</th>
                                    <th data-field="sellerapproval" data-editable="">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i=0;$i<count($transaction);$i++)
                                @php
                                $item = json_decode(json_encode($transaction[$i]), true);
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>
                                        {{$i+1}}
                                    </td>
                                    <td>
                                        {{$item['u_name']}}
                                    </td>
                                    <td>
                                        {{$item['u_email']}}
                                    </td>
                                    <td>
                                        {{$item['tech_id']}}
                                    </td>
                                    <td>
                                        {{$item['amount']}}
                                    </td>
                                    <td>
                                        {{$item['type']}}
                                    </td>
                                    <td style="min-width: 150px;">
                                        <button class="pd-setting-ed" id="{{$item['id']}}" onclick="edit_order(this.id)">Edit
                                            <p class="u_name" style="display: none">{{$item['u_name']}}</p>
                                            <p class="u_email" style="display: none">{{$item['u_email']}}</p>
                                            <p class="tech_id" style="display: none">{{$item['tech_id']}}</p>
                                            <p class="amount" style="display: none">{{$item['amount']}}</p>
                                            <p class="type" style="display: none">{{$item['type']}}</p>
                                            <p class="action" style="display: none">{{$item['action']}}</p>
                                        </button>
                                        <button class="pd-setting-ed" name="{{$item['id']}}" onclick="delete_order(this.name)">Delete</button>
                                    </td>
                                    <td>
                                        {{$item['action']}}
                                    </td>
                                    <td>
                                        {{$item['date']}}
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title text-center"></h4>
                <span id="type" style="display: none"></span>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <form id="form" >
            <div class="modal-body">
                <div class="form-group-inner">
                    <label>Full Name</label>
                    <input id="transfer-name" name="name" type="text" class="form-control" placeholder="Full Name" required/>
                </div>

                <div class="form-group-inner" style="margin-left: 0px;">
                    <label>Email</label>
                    <input id="transfer-email" name="email" type="text" class="form-control" placeholder="Email" required/>
                </div>

                <div class="form-group-inner" style="margin-left: 0">
                    <label>Tech ID</label>
                    <input id="transfer-id" name="tech_id" type="text" class="form-control" placeholder="Tech ID" required/>
                </div>
                <div class="form-group-inner" style="width: 45%;float: left;">
                    <label>Amount</label>
                    <input id="transfer-amount" name="amount" type="number" class="form-control" placeholder="amount" required/>
                </div>
                <div class="form-group-inner" style="width:45%;float:left;margin-left: 10%;">
                    <label>Action</label>
                    <div class="custom-select">
                        <select>
                            <option value="0">Select From:</option>
                            <option value="1">Deposit</option>
                            <option value="2">withdrawal</option>

                        </select>
                    </div>
                </div>
                <div class="form-group-inner">
                    <label>Descriptions</label>
                    <input id="transfer-description" name="description" type="text" class="form-control" placeholder="Description" required/>
                </div>


            </div>
            <div class="modal-footer">
                <div style="width: 250px;margin: auto;">
                    <a class="btn btn-default" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                    <div id="transfer-submit" class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</div>
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
            <form id="form1" >
                <div class="modal-body">
                    <div class="form-group-inner">
                        <label>Full Name</label>
                        <input id="transfer-name1" name="name" type="text" class="form-control" placeholder="Full Name" required/>
                    </div>

                    <div class="form-group-inner" style="margin-left: 0px;">
                        <label>Email</label>
                        <input id="transfer-email1" name="email" type="text" class="form-control" placeholder="Email" required/>
                    </div>

                    <div class="form-group-inner" style="margin-left: 0">
                        <label>Tech ID</label>
                        <input id="transfer-id1" name="tech_id" type="text" class="form-control" placeholder="Tech ID" required/>
                    </div>
                    <div class="form-group-inner" style="width: 45%;float: left;">
                        <label>Amount</label>
                        <input id="transfer-amount1" name="amount" type="number" class="form-control" placeholder="amount" required/>
                    </div>
                    <div class="form-group-inner" style="width:45%;float:left;margin-left: 10%;">
                        <label>Action</label>
                        <div class="custom-select1">
                            <select>
                                <option value="0">Select From:</option>
                                <option value="1">Deposit</option>
                                <option value="2">withdrawal</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group-inner">
                        <label>Descriptions</label>
                        <input id="transfer-description1" name="description" type="text" class="form-control" placeholder="Description" required/>
                    </div>


                </div>
                <div class="modal-footer">
                    <div style="width: 250px;margin: auto;">
                        <a class="btn btn-default" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                        <div id="transfer-submit1" class="btn btn-default" style="width: 100px;background: #00cc00;color: white;">Submit</div>
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
            '<span class="bread-blod">Wallet Transfers</span>\n' +
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
            $('#transfer-submit').click(function () {
                var name = $('#transfer-name').val();
                var email= $('#transfer-email').val();
                var amount =$('#transfer-amount').val();
                var tech_id=$('#transfer-id').val();
                var action=$('.custom-select').find('.select-selected').text();
                var description=$('#transfer-description').val();
                if(name != '' && email != '' && amount != '' && tech_id != '' && action != 'Select From:'){
                    $('#add_product_dlg').modal('toggle');
                    var data = new FormData();
                    data.append('name', name);
                    data.append('email', email);
                    data.append('amount', amount);
                    data.append('tech_id', tech_id);
                    data.append('action', action);
                    data.append('description', description);

                    $.ajax({
                        type: "POST",
                        url: '{{url("add_record")}}',
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
                                alert('Successfully Recorded!');
                                location.reload();
                                // window.location.replace('./user/dashboard');

                            } else if(type == 201) {
                                alert("Please confirm customer's email.");
                            }else{

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
    function edit_order(id){
        var name = $('#'+id).find('.u_name').text();
        var email = $('#'+id).find('.u_email').text();
        var tech_id = $('#'+id).find('.tech_id').text();
        var amount = $('#'+id).find('.amount').text();
        var type = $('#'+id).find('.type').text();
        var action = $('#'+id).find('.action').text();

        $('#transfer-name1').val(name);
        $('#transfer-email1').val(email);
        $('#transfer-amount1').val(amount);
        $('#transfer-id1').val(tech_id);
        $('.custom-select1').find('.select-selected').text(action);
        $('#transfer-description1').val(type);
        $('#edit_product_dlg').modal();
        $('#transfer-submit1').click(function () {
            var name = $('#transfer-name1').val();
            var email= $('#transfer-email1').val();
            var amount =$('#transfer-amount1').val();
            var tech_id=$('#transfer-id1').val();
            var action=$('.custom-select1').find('.select-selected').text();
            var description=$('#transfer-description1').val();
            if(name != '' && email != '' && amount != '' && tech_id != '' && action != 'Select From:'){
                $('#edit_product_dlg').modal('toggle');
                var data = new FormData();
                data.append('id', id);
                data.append('name', name);
                data.append('email', email);
                data.append('amount', amount);
                data.append('tech_id', tech_id);
                data.append('action', action);
                data.append('description', description);

                $.ajax({
                    type: "POST",
                    url: '{{url("edit_record")}}',
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
                            alert('Successfully updated!');
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
    }
    function delete_order(id){
        var data = new FormData();
        data.append('id', id);
        $.ajax({
            type: "POST",
            url: '{{url("delete_record")}}',
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
                    alert('Successfully deleted!');
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
    }
</script>
<script>
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>
<script>
    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select1");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>




































@stop

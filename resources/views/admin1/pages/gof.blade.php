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
        max-width: 800px!important;
        margin: 1.75rem auto;
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
        display;block;
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
                            <div style="float: right" class="btn btn-default add_master">Create GOF Challenge</div>
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">GOF Challenges</span></h1>
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
                                        <th data-field="photo">Image</th>
                                        <th data-field="name" data-editable="">Title</th>
                                        <th data-field="email" data-editable="">Description</th>
                                        <th data-field="city" data-editable="">Type</th>
                                        <th data-field="vote" data-editable="">Votes</th>
                                        <th data-field="num2" data-editable="">Start Time</th>
                                        <th data-field="text" data-editable="">Peoriod</th>
                                        <th data-field="text1" data-editable="">Price</th>
                                        <th data-field="num4" data-editable="">Photo Counts</th>
                                        <th data-field="State">State</th>
                                        <th data-field="action">Edit</th>
                                        <th data-field="award">Award</th>
                                        <th data-field="details">Details</th>
                                             <th data-field="createPopPu">Add Popup</th>
                                        <th data-field="create">Create Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $counts=count($admins);
                                    @endphp
                                    @for($i=0;$i<$counts;$i++)
                                        @php
                                            $item = json_decode(json_encode($admins[$i]), true);
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td>{{$admins[$i]->id}}</td>
                                            <td>
                                                <div style="width:50px;height:35px;background-image:url({{($item['image-url'])}});background-size:cover;background-repeat:no-repeat;background-position:center;">
                                                </div>
                                            </td>
                                            <td>{{$admins[$i]->title}}</td>
                                            <td>
                                                <a href="#" id="view-{{$admins[$i]->id}}" onclick="viewdescription(this.id)" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;" title="Description">
                                                    <i class="fa fa-eye"></i>View
                                                    <p class="description" style="display: none;">{{$admins[$i]->description}}</p>
                                                </a>
                                            </td>
                                            <td>{{$admins[$i]->c_type}}</td>
                                            <td>{{$admins[$i]->votes}}</td>
                                            <td>{{$item['start-time']}}</td>
                                            <td>{{$admins[$i]->timeline}}</td>
                                            <td>{{$admins[$i]->price}}</td>
                                            <td>{{$admins[$i]->photocount}}</td>
                                            <td>
                                                <select id="s{{$i}}" onchange="selectitem('{{$item['id']}}',this,'s'+'{{$i}}')"  class="custom-select" style="width:120px;
                                                        @php
                                                    switch ($item['state']){
                                                        case 'new':
                                                            echo "color:green";
                                                            break;
                                                        case 'start':
                                                            echo "color:blue";
                                                            break;
                                                        case 'closed':
                                                            echo "color:#ff0000";
                                                            break;
                                                        case 'completed':
                                                            echo "color:green";
                                                            break;

                                                        default:
                                                            echo "color:red";
                                                            break;
                                                                                            }
                                                @endphp">
                                                    <option  @php if($item['state']=='new') echo "selected";@endphp value="0">{{$item['state']}}</option>
                                                    <option  @php if($item['state']=='start') echo "selected";@endphp value="1">Start</option>
                                                    <option  @php if($item['state']=='closed') echo "selected";@endphp value="2">Closed</option>
                                                    <option  @php if($item['state']=='completed') echo "selected";@endphp value="3">Completed</option>
                                                    <option  @php if($item['state']=='deleted') echo "selected";@endphp value="4">Deleted</option>
                                                    <option  @php if($item['state']=='ended') echo "selected";@endphp value="5">Ended</option>
                                                </select>
                                            </td>
                                    <td class="datatable-ct">
                                        <button id="edit-{{$i}}" onclick="edit_admin(this.id)" title="Edit" class="pd-setting-ed" style="width:70px;">
                                            <i class="fa fa-edit" style=""></i>Edit
                                            <p class="id" style="display: none;">{{$admins[$i]->id}}</p>
                                            <p class="edit_url" style="display: none;">{{($item['image-url'])}}</p>
                                            <p class="title" style="display: none;">{{$admins[$i]->title}}</p>
                                            <p class="description" style="display: none;">{{$admins[$i]->description}}</p>
                                            <p class="period" style="display: none;">{{$admins[$i]->timeline}}</p>
                                            <p class="price" style="display: none;">{{$admins[$i]->price}}</p>
                                            <p class="counts" style="display: none;">{{$admins[$i]->photocount}}</p>
                                        </button>

                                    </td>
                                    <td>
                                        <button id="{{$item['id']}}" onclick="myFunction1(this.id)" title="Edit" class="pd-setting-ed">Award</button>
                                    </td>
                                    <td>
                                        <a href ="{{asset('../admin/challengedetails/'.$item['id'])}}"><button data-modal-trigger="trigger-1" title="Edit" class="pd-setting-ed">View</button></a>
                                    </td>
                                       <td>
                                        <a href ="{{route('create.popup',['id'=>$admins[$i]->id])}}"><button  title="Add popup" class="pd-setting-ed">Send pop Up To Users</button></a>
                                    </td>
                                    <td>
                                        {{$item['create-time']}}
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
                <h5 class="modal-title" style="text-align: center;font-size:20px;">Add Challenge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" style="width: 100%; height: auto;margin-top: 0px;margin-bottom: 5px;">
                    <div class="" style="height: auto;margin-bottom: 5px;background-color: white;">
                        {{--Image--}}
                        <div class="col-md-12" style="border-radius: 20px">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Details--}}
                        <div class="col-md-12 col-lg-12 col-sm-12 row" style="height: 400px;width: 110%;margin-top: 20px">
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <h6>Sponsor Name</h6>
                                <input type="text" name="sponsor" id="sponsor"  value="" placeholder="Sponsor"/>
                                <h6>Title</h6>
                                <input type="text" name="title" id="title"  value="" placeholder="Sobhani"/>
                                <h6>Period</h6>
                                <input type="date" name="period_id" id="period_id"  value="" placeholder="Sobhani"/>
                                


                                <h6 style="margin-top:20px;">Type</h6>
                                <div class="row" >
                                    <div class="col-6" style="width:50%;float:left;">
                                        <input id="f" name="group1" type="radio" checked value="free" style="width: 20px" />
                                        <span>Free</span>
                                    </div>

                                    <div class="col-6" style="width:50%;float:left;">
                                        <input id="p" name="group1" type="radio"  value="paid" style="width: 20px" />
                                        <span>Paid</span>
                                    </div>

                                    <div class="paid_price" style="width:90%;margin-left:17px;">
                                        <h6>Price</h6>
                                        <input type="text" name="price" id = "paid"  value="$1"/>
                                    </div>

                                </div>
                                <h6 style="margin-bottom:5px;">photo count</h6>
                                <div class="row" >
                                    <div class="col-4" style="width:33%;float:left;">
                                        <input name="group2" type="radio" checked  value="1" style="width: 20px" />
                                        <span >1</span>
                                    </div>

                                    <div class="col-4" style="width:33%;float:left;">
                                        <input name="group2" type="radio"  value="2" style="width: 20px" />
                                        <span>2</span>
                                    </div>
                                    <div class="col-4" style="width:33%;float:left;">
                                        <input name="group2" type="radio"  value="4" style="width: 20px" />
                                        <span>4</span>
                                    </div>
                                </div>
                                <div class="free_price" >
                                    <h6>cash prize</h6>
                                    <input type="text" name="price" id = "free"  value="$100" />
                                    <input type="text" name="c_type" id = "c_type"  value="normal" style="display:none;"/>
                                </div>
                            </div>
                            <div class=" col-md-6 col-lg-6 col-sm-6">
                                <h6>Description</h6>
                                <textarea class="" id="description" name="description" style="padding:15px;height:250px;margin-top:20px;border-radius:0px;border:1px solid gray;" placeholder="Description is here."></textarea>
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
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title text-center"></h4>
                    <span id="type" style="display: none"></span>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body" style="padding:20px 80px;">
                    <div class="col-md-12" style="border-radius: 20px;margin-bottom:20px;">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload1" name="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload1"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview1" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="edit-url" name="edit_url" type="text" class="form-control" style="display:none;"/>
                    <input id="edit-id" name="id" type="text" class="form-control" style="display:none;"/>
                    <div class="form-group-inner">
                        <label>Challenge Title</label>
                        <input id="edit-title" type="text" class="form-control" required/>
                    </div>

                    <div class="form-group-inner" style="margin-left: 0px;">
                        <label>Period</label>
                        <input id="edit-period" type="date" class="form-control" required/>
                    </div>
                    <div class="form-group-inner">
                        <label>Price</label>
                        <input id="edit-price" type="text" class="form-control" required/>
                    </div>
                    <div class="form-group-inner">
                        <label>Photo Counts</label>
                        <input id="edit-counts" type="text" class="form-control" required/>
                    </div>
                    <div class="form-group-inner">
                        <label>Description</label>
                        <textarea id="edit-description" type="text" class="form-control" style="height:200px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="width: 250px;margin: auto;">
                        <a class="btn btn-default" data-dismiss="modal" href="#" style="width: 100px;height: 35px;border-radius: 5px;border: 1px solid;padding: 7px;background: deeppink;">Cancel</a>
                        <button class="btn btn-default" id="challenge-edit" style="width: 100px;background: #00cc00;color: white;">Submit</button>
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
                    <div class="modal-body">
                        <div class="form-group-inner">
                            <label>Description</label>
                            <textarea id="view-description" type="text" class="form-control" style="height:300px;;"></textarea>
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
                '<span class="bread-blod">GOF Challenges</span>\n' +
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

    </script>
    <script>
        $( document ).ready(function() {
            $('.add_master').click(function () {
                $('#add_product_dlg').modal();
            });
            $('#submit_btn111').click(function(){
                var bg = $('#imageUpload').val().match(/[-_\w]+[.][\w]+$/i)[0];
                bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
                var title = $('#title').val();
                var price = $('#free').val();
                var c_type='game';
                var paid = $('#paid').val();
                var description = $('#description').val();
                var s_name = $('#sponsor').val();
                var period = $('#period_id').children("option:selected").val();
                var type= $("input:radio[name='group1']:checked").val();
                var photo_count= $("input:radio[name='group2']:checked").val();

                if(!s_name || !title || !period || !type || !description || !price ) {
                    return;
                }
                var  data = new FormData();
                data.append('image', $("#imageUpload")[0].files[0]);
                data.append('title', title);
                data.append('price', price);
                data.append('c_type', c_type);
                data.append('paid',paid);
                // data.append('prize', prize);
                data.append('s_name', s_name);
                data.append('period', period);
                data.append('type', type);
                data.append('photocount', photo_count);
                data.append('description', description);
                $.ajax({

                    type: "POST",
                    url: '{{url('/challenge/upload0')}}',
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
                        location.reload();
                        // window.location.replace('./challenges/my');

                    },
                    error: function(response){

                        console.log(response);
                        alert('error');

                    }
                });


            });
            $('#challenge-edit').click(function(){
                var cid = $('#edit-id').val();
                var title = $('#edit-title').val();
                var period = $('#edit-period').val();
                var price=$('#edit-price').val();
                var counts = $('#edit-counts').val();
                var description = $('#edit-description').val();

                if(!title || !period || !price || !description || !counts ) {
                    return;
                }
                var  data = new FormData();
                data.append('image', $("#imageUpload1")[0].files[0]);
                data.append('cid', cid);
                data.append('title', title);
                data.append('price', price);
                data.append('period', period);
                data.append('photocount', counts);
                data.append('description', description);
                $.ajax({

                    type: "POST",
                    url: '{{url('/challenge/edit0')}}',
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
        function edit_admin(id){
            var cid = $('#'+id).find('.id').text();
            var title = $('#'+id).find('.title').text();
            var edit_url = $('#'+id).find('.edit_url').text();
            var description = $('#'+id).find('.description').text();
            var price = $('#'+id).find('.price').text();
            var counts = $('#'+id).find('.counts').text();
            var period = $('#'+id).find('.period').text();

            $('#imagePreview1').css('background-image', 'url('+edit_url +')');
            $('#edit-id').val(cid);
            $('#edit-title').val(title);
            $('#edit-description').val(description);
            $('#edit-price').val(price);
            $('#edit-counts').val(counts);
            $('#edit-period').val(period);

            $('#edit_product_dlg').modal();
        }
        function selectitem(item, selectObject,id){
            //alert(id);

            //var selectedCountry = $(this).children("option:selected").val();
            //alert(id+" ->" + selectedCountry);
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
    <script>
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
        }
        $("#imageUpload").change(function() {
            //alert("asdf");
            readURL(this);
        });
        function readURL1(input) {
            //alert("asdf");
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
                    //alert(e.target.result);
                    $('#imagePreview1').hide();
                    $('#imagePreview1').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload1").change(function() {
            //alert("asdf");
            readURL1(this);
        });
    </script>

@stop



















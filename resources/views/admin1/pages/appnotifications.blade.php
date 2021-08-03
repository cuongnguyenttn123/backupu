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
                            <div style="float: right" class="btn btn-default add_master">Create Notification</div>
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">Notification</span></h1>
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
                                        <th data-field="email" data-editable="">Notification</th>
                                        <th data-field="city" data-editable="">Icon1</th>
                                        <th data-field="vote" data-editable="">Text1</th>
                                        <th data-field="num2" data-editable="">Icon2</th>
                                        <th data-field="text" data-editable="">Text2</th>
                                        <th data-field="text1" data-editable="">Icon3</th>
                                        <th data-field="num4" data-editable="">Text3</th>
                                        <th data-field="State">Old price</th>
                                        <th data-field="price">New Price</th>
                                        <th data-field="award">Status</th>
                                        <th data-field="create">Create Time</th>
                                        <th data-field="action">Action</th>
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
                                                <div style="width:50px;height:35px;background-image:url({{($item['title_pic'])}});background-size:cover;background-repeat:no-repeat;background-position:center;">
                                                </div>
                                            </td>
                                            <td>{{$admins[$i]->title}}</td>
                                            <td>
                                                <a href="#" id="view-{{$admins[$i]->id}}" onclick="viewdescription(this.id)" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;" title="Description">
                                                    <i class="fa fa-eye"></i>View
                                                    <p class="description" style="display: none;">{{$admins[$i]->description}}</p>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" id="view-{{$admins[$i]->id}}" onclick="viewdescription(this.id)" style="border-radius: 3px; border: 1px solid rgba(0,0,0,.12);background: #f5f5f5;padding: 5px 10px;" title="Description">
                                                    <i class="fa fa-eye"></i>View
                                                    <p class="description" style="display: none;">{{$admins[$i]->notification}}</p>
                                                </a>
                                            </td>
                                            <td>
                                                <div style="width:50px;height:35px;background-image:url({{($item['icon1'])}});background-size:cover;background-repeat:no-repeat;background-position:center;">
                                                </div>
                                            </td>
                                            <td>{{$admins[$i]->text1}}</td>
                                            <td>
                                                <div style="width:50px;height:35px;background-image:url({{($item['icon2'])}});background-size:cover;background-repeat:no-repeat;background-position:center;">
                                                </div>
                                            </td>
                                            <td>{{$admins[$i]->text2}}</td>
                                            <td>
                                                <div style="width:50px;height:35px;background-image:url({{($item['icon2'])}});background-size:cover;background-repeat:no-repeat;background-position:center;">
                                                </div>
                                            </td>
                                            <td>{{$admins[$i]->text3}}</td>
                                            <td>
                                                {{$admins[$i]->oldprice}}
                                            </td>
                                            <td>
                                                {{$admins[$i]->newprice}}
                                            </td>
                                            <td>
                                                {{$admins[$i]->status}}
                                            </td>
                                            <td>
                                                {{$admins[$i]->created_at}}
                                            </td>
                                            <td>
                                                <button id="edit-{{$i}}" onclick="edit_admin(this.id)" title="Edit" class="pd-setting-ed" style="width:70px;">
                                                    <i class="fa fa-edit" style=""></i>Edit
                                                    <p class="id" style="display: none;">{{$admins[$i]->id}}</p>
                                                    <p class="edit_url" style="display: none;">{{($item['title_pic'])}}</p>
                                                    <p class="title" style="display: none;">{{$admins[$i]->title}}</p>
                                                    <p class="description" style="display: none;">{{$admins[$i]->description}}</p>
                                                    <p class="period" style="display: none;">{{$admins[$i]->notification}}</p>
                                                    <p class="price" style="display: none;">{{$admins[$i]->oldprice}}</p>
                                                    <p class="counts" style="display: none;">{{$admins[$i]->newprice}}</p>
                                                    <p class="text1" style="display: none;">{{$admins[$i]->text1}}</p>
                                                    <p class="icon1" style="display: none;">{{$item['icon1']}}</p>
                                                    <p class="text2" style="display: none;">{{$admins[$i]->text2}}</p>
                                                    <p class="icon2" style="display: none;">{{$item['icon2']}}</p>
                                                    <p class="text3" style="display: none;">{{$admins[$i]->text3}}</p>
                                                    <p class="icon3" style="display: none;">{{$item['icon3']}}</p>
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
                <h5 class="modal-title" style="text-align: center;font-size:20px;">Add Notification</h5>
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
                        <div class="col-md-12 col-lg-12 col-sm-12 row" style="width: 110%;margin-top: 20px">
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <h6>Title</h6>
                                <input type="text" name="title" id="title"  value="" placeholder="Sponsor"/>
                                
                                <h6>Description</h6>
                                <textarea class="" id="description" name="description" style="padding:15px;height:200px;margin-top:20px;border-radius:0px;border:1px solid gray;" placeholder="Description is here."></textarea>

                                <h6>Notifications</h6>
                                <textarea class="" id="notifications" name="notifications" style="padding:15px;height:200px;margin-top:20px;border-radius:0px;border:1px solid gray;" placeholder="Notifications is here."></textarea>

                                
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                
                                <h6>icon1</h6>
                                <input type="file" name="icon1" id="icon1"  value="" placeholder="icon"/>
                                
                                <h6>Text 1</h6>
                                <input type="text" name="text1" id="text1"  value="" placeholder="Text 1"/>

                                <h6>icon2</h6>
                                <input type="file" name="icon2" id="icon2"  value="" placeholder="Sobhani"/>
                                
                                <h6>Text 2</h6>
                                <input type="text" name="text2" id="text2"  value="" placeholder="Text 2"/>

                                <h6>icon3</h6>
                                <input type="file" name="icon3" id="icon3"  value="" placeholder="Sobhani"/>
                                
                                <h6>Text 3</h6>
                                <input type="text" name="text3" id="text3"  value="" placeholder="Text 3"/>

                                <h6>Old Price</h6>
                                <input type="text" name="oldprice" id="oldprice"  value="" placeholder="Old Price"/>

                                <h6>New Price</h6>
                                <input type="text" name="newprice" id="newprice"  value="" placeholder="New Price"/>

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
                    <div class="col-md-12 col-lg-12 col-sm-12 row" style="width: 110%;margin-top: 20px">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <input id="edit-id" name="id" type="text" class="form-control" style="display:none;"/>
                            <input id="edit-url" name="edit_url" type="text" class="form-control" style="display:none;"/>
                            <div class="form-group-inner">
                                <label>Title</label>
                                <input id="edit-title" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group-inner">
                                <label>Description</label>
                                <textarea id="edit-description" type="text" class="form-control" style="height:200px;"></textarea>
                            </div>
                            <div class="form-group-inner">
                                <label>Notification</label>
                                <textarea id="edit-notification" type="text" class="form-control" style="height:200px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <h6>icon1</h6>
                            <input type="file" name="eidt_icon1" id="eidt_icon1"  value="" placeholder="icon"/>
                            <div><img src="" id="eidt_icon1_div" style="width: 100px;"></div>                            
                            <h6>Text 1</h6>
                            <input type="text" name="eidt_text1" id="eidt_text1"  value="" placeholder="Text 1"/>

                            <h6>icon2</h6>
                            <input type="file" name="eidt_icon2" id="eidt_icon2"  value="" placeholder="Sobhani"/>
                            <div><img src="" id="eidt_icon2_div" style="width: 100px;"></div>
                            
                            <h6>Text 2</h6>
                            <input type="text" name="eidt_text2" id="eidt_text2"  value="" placeholder="Text 2"/>

                            <h6>icon3</h6>
                            <input type="file" name="eidt_icon3" id="eidt_icon3"  value="" placeholder="Sobhani"/>
                            <div><img src="" id="eidt_icon3_div" style="width: 100px;"></div>
                            
                            <h6>Text 3</h6>
                            <input type="text" name="eidt_text3" id="eidt_text3"  value="" placeholder="Text 3"/>

                            <h6>Old Price</h6>
                            <input type="text" name="eidt_oldprice" id="eidt_oldprice"  value="" placeholder="Old Price"/>

                            <h6>New Price</h6>
                            <input type="text" name="eidt_newprice" id="eidt_newprice"  value="" placeholder="New Price"/>

                        </div>
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
                '<span class="bread-blod">Challenges</span>\n' +
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
                var description = $('#description').val();
                var notifications=$('#notifications').val();
                var text1=$('#text1').val();
                var text2=$('#text2').val();
                var text3=$('#text3').val();
                var oldprice = $('#oldprice').val();
                var newprice = $('#newprice').val();

                if(!title || !description || !notifications || !text1 || !newprice ) {
                    return;
                }
                var  data = new FormData();
                data.append('image', $("#imageUpload")[0].files[0]);
                data.append('icon1', $("#icon1")[0].files[0]);
                data.append('icon2', $("#icon2")[0].files[0]);
                data.append('icon3', $("#icon3")[0].files[0]);
                data.append('title', title);
                data.append('description', description);
                data.append('notifications', notifications);
                data.append('text1',text1);
                // data.append('prize', prize);
                data.append('text2', text2);
                data.append('text3', text3);
                data.append('oldprice', oldprice);
                data.append('newprice', newprice);
                $.ajax({

                    type: "POST",
                    url: '{{url('/add_notifications')}}',
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
                var description = $('#edit-description').val();
                var notification = $('#edit-notification').val();
                var text1 = $('#eidt_text1').val();
                var text2 = $('#eidt_text2').val();
                var text3 = $('#eidt_text3').val();
                var oldprice = $('#eidt_oldprice').val();
                var newprice = $('#eidt_newprice').val();



                if(!title || !text1 || !newprice || !description ) {
                    return;
                }
                var  data = new FormData();
                data.append('image', $("#imageUpload1")[0].files[0]);
                data.append('icon1', $("#eidt_icon1")[0].files[0]);
                data.append('icon2', $("#eidt_icon2")[0].files[0]);
                data.append('icon3', $("#eidt_icon3")[0].files[0]);
                data.append('cid', cid);
                data.append('title', title);
                data.append('description', description);
                data.append('notification', notification);
                data.append('text1', text1);
                data.append('text2', text2);
                data.append('text3', text3);
                data.append('oldprice', oldprice);
                data.append('newprice', newprice);
                $.ajax({

                    type: "POST",
                    url: '{{url('/edit_notifications')}}',
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
            var edit_url = $('#'+id).find('.edit_url').text();
            var title = $('#'+id).find('.title').text();
            var description = $('#'+id).find('.description').text();
            var notification = $('#'+id).find('.notification').text();
            var oldprice = $('#'+id).find('.price').text();
            var newprice = $('#'+id).find('.counts').text();
            var Text1 = $('#'+id).find('.text1').text();
            var icon1 = $('#'+id).find('.icon1').text();
            var Text2 = $('#'+id).find('.text2').text();
            var icon2 = $('#'+id).find('.icon2').text();
            var Text3 = $('#'+id).find('.text3').text();
            var icon3 = $('#'+id).find('.icon3').text();

            $('#imagePreview1').css('background-image', 'url('+edit_url +')');

            $('#edit-id').val(cid);
            $('#edit-url').val(cid);
            $('#edit-title').val(title);
            $('#edit-description').val(description);
            $('#edit-notification').val(notification);
            $('#eidt_oldprice').val(oldprice);
            $('#eidt_newprice').val(newprice);
            $('#eidt_text1').val(Text1);
            $('#eidt_icon1_div').attr('src',icon1);
            $('#eidt_text2').val(Text2);
            $('#eidt_icon2_div').attr('src',icon2);
            $('#eidt_text3').val(Text3);
            $('#eidt_icon3_div').attr('src',icon3);

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
        }imagePreview
        $("#imageUpload1").change(function() {
            //alert("asdf");
            readURL1(this);
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
        }imagePreview
        $("#imageUpload").change(function() {
            //alert("asdf");
            readURL(this);
        });
    </script>

@stop

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
                    <h4 class="card-title ">With draw request Table</h4>
                    {{--<p class="card-category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Method
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Before
                            </th>
                            <th>
                                After
                            </th>
                            <th>
                                Pay
                            </th>
                            <th>
                                Remark
                            </th> 
                            </thead>
                            <tbody>
                            @for($i=0;$i<$num;$i++)
                                
                                <tr>
                                    <td>
                                      {{$withdraw[$i]->id}}
                                    </td>

                                    <td>
                                       {{$withdraw[$i]->username}}
                                  
                                    </td>

                                    <td>
                                        
                                      {{$withdraw[$i]->amount}}
                                    </td>

                                    <td>
                                      {{$withdraw[$i]->method}}
                                    </td>
                                    <td>
                                      {{$withdraw[$i]->date}}
                                    </td>

                                    <td>
                                     {{$withdraw[$i]->before}}
                                    </td>
                                    <td>
                                    {{$withdraw[$i]->after}}
                                    </td> 
                                    <td>
                                      <a href="https://www.paypal.com/login" target="_blank">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                    </td>
                                     
                                      <td>
                                                <div class="dropdown">{{$withdraw[$i]->remark}}
                                                    <div class="dropdown-content">
                                                        <a href= "{{url('admin/withdraw_process/'.$withdraw[$i]->id.'/Success')}}">Success</a>
                                                        <a href= "{{url('admin/withdraw_process/'.$withdraw[$i]->id.'/Cancel')}}">Cancel</a>
                                                        <a href= "{{url('admin/withdraw_process/'.$withdraw[$i]->id.'/Delete')}}">Delete</a>
                                                    </div>
                                                </div>
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
        //    --------------------------------------------

    </script>
@stop

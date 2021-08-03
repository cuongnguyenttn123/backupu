@extends('Admin.Layout.dashboard1')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        
	.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  top: 25%;
  margin-top: -15%;
  left: 25%;
  width: 50%; 
  padding: 16px;
  border: 16px solid #e0c798;
  background-color: white;
  z-index: 1002;
  overflow: auto;
  border-radius: 10px;
} 
 
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
        .winner-content{
            width:100%;
            height:auto;
            min-height:500px;
        }

    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Winner Table</h4>
                </div>
                <div class="winner-content">
                @for($i=0;$i<count($cids);$i++)
                    @php
                        $item = json_decode(json_encode($cids[$i]), true);
                    @endphp                    
                    <div class="container">
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo-{{$i}}" style="width:100%;background:#e6fff9;color:black;">{{$item['title']}}</button>
                        <div id="demo-{{$i}}" class="collapse">
                          <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Rank
                            </th>
                            <th>
                                User Id
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Challenge Id
                            </th>
                            <th>
                                Challenge Name
                            </th>
                            <th>
                                Award Price
                            </th>
                            <th>
                                Picture Counts
                            </th>
                            <th>
                                Flip
                            </th>
                            <th>
                                Wand
                            </th>
                            <th>
                                Charge
                            </th>
                            </thead>
                            <tbody>
                            @for($j=0;$j<count($winners);$j++)
                                @php
                                    $item1 = json_decode(json_encode($winners[$j]), true);
                                @endphp 
                                @if($item1['c_id'] == $item['id'])
                                    <tr>
                                        <td>
                                            {{$item1['rank']}}
                                        </td>
                                        <td>
                                            {{$item1['u_id']}}
                                        </td>
                                        <td>{{$item1['name']}}</td>
                                        <td>
                                            {{$item['id']}}
                                        </td>
                                        <td>
                                            {{$item['title']}}
                                        </td>    
                                        <td>
                                            {{$item1['increase_wallet']}}
                                        </td>
                                        <td>
                                            {{$item1['pic_count']}}
                                        </td>
                                                                                <td>
                                            {{$item1['flip']}}
                                        </td>
                                        <td>
                                            {{$item1['wand']}}
                                        </td>
                                        <td>
                                            {{$item1['charge']}}
                                        </td>                                   
                                    </tr>
                                @endif
                            @endfor
                            </tbody>
                            </table>
                        </div>
                    </div> 
                @endfor
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')
    <script>
     function modal_popup(name)
        {
              console.log('#'+name);
              $('#'+name).show();
              $("#fade").show();
        }
        
        function close(){ 
            
              $(".white_content").hide();
              $("#fade").hide(); 
        } 
         function save_data(save_name){
 
                        var title1 = $('#d1'+save_name).val(); 
                        var description1 = $('#d2'+save_name).val();
                        var votes1 = $('#d3'+save_name).val();
                        var period1 = $('#d4'+save_name).val();
                        var price1 = $('#d5'+save_name).val();
                        var photo_counts1 = $('#d6'+save_name).val(); 
                        $.ajax({
                            url: '{{url('challenge_edit')}}',
                            type: 'post',
                            data: { uid: save_name , title: title1, description:description1, votes:votes1, period: period1, price:price1, photo_counts:photo_counts1},
                            beforeSend: function (request){
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(response){
                               
                                $(".white_content").hide();
                                $("#fade").hide(); 
                                 location.reload();
                            },
                            error: function (response) {
                                alert('error123');
                                console.log(response);
                            }
                        });
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
            var price = $('#free').val();
            var c_type=$('#c_type').val();
            var paid = $('#paid').val();
            var description = $('#description').val();
            var s_name = $('#sponsor').val();
            var period = $('#period_id').children("option:selected").val();
            var type= $("input:radio[name='group1']:checked").val();
            var photo_count= $("input:radio[name='group2']:checked").val();
            // var prize = $('#flip').val()+','+$('#charge').val()+','+$('#wand').val();


            if(!s_name || !title || !period || !type || !description || !price ) {
                // alert("Input your information correctly");
                // alert(price);
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
                    location.reload();
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

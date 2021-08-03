@extends('Admin.Layout.dashboard1')

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
        
           @media only screen and (max-width: 991px) {
                  #sidebar{
                   display:none;
                  }
                }
    

    </style>

<style type="text/css">
  /* Ibrahim Jabbari -- www.ibrahimjabbari.com */
@import url(https://fonts.googleapis.com/css?family=Arvo:700);
@import url(https://fonts.googleapis.com/css?family=Seaweed+Script);
body {
  background-color: white;
}
.plate {
  width: 410px;
 
}
.shadow {
  color:#0470e2;
  font-family: Arvo;
  font-weight: bold;
      text-shadow: -3px -3px 0 #712d2d, 7px -2px 0 #612db7, -3px 3px 0 #222, 3px 3px 0 #222, 4px 4px 0 #fff, 5px 5px 0 #fff, 6px 6px 0 #fff, 7px 7px 0 #fff;
  line-height: 0.8em;
  letter-spacing: 0.1em;
  transform: scaleY(0.7);
  -webkit-transform: scaleY(0.7);
  -moz-transform: scaleY(0.7);
  margin:0;
  text-align: center;
}
.script {
  font-family: "Seaweed Script";
  color: #fff;
  text-align: center;
  font-size: 40px;
  position: relative;
  margin:0;
}
.script span {
  background-color: #222;
  padding: 0 0.3em;
}
.script:before {
  content:"";
  display: white;
  position: absolute;
  z-index:-1;
  top: 50%;
  width: 100%;
  border-bottom: 3px solid #fff;
}
.text1 {
  font-size: 60px;
}
.text2 {
  font-size: 169px;
}
.text3 {
  font-size: 100px;
}

.imagediv{
    margin-bottom: 10px;
    margin: auto;
    float:left;
    width:80px;
}
.imagediv .image-card {
    height: 80px;
    width:80px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 1px solid lavender;
}
.nondisplay{
    display: none;
}
.imagediv span{
    position: absolute;right: 0%;bottom: 0%; margin-right: 20px;
    text-shadow: 2px 2px 5px black;
    color: white;
    font-size: 25px;
}
</style>
    
@stop
@include ('Admin.Modal.add_challenge')
@section('content')
    {{--<button type="button" id = "title" class="btn btn-primary btn-lg btn3d"   data-target="#exampleModalCenter">{{$data0['title']}} </button>--}}
 
    <div class="plate">
 
  <p class="shadow text1">{{$data0['title']}}</p>
 
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "> {{$data0['description']}}</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Rank
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Vote Count
                            </th>
                            <th>
                                View
                            </th>
                            <th>
                                Date
                            </th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($ujoincs);$i++)
                                @php
                                    $item = json_decode(json_encode($ujoincs[$i]), true);
                                @endphp
                                <tr>
                                    <td>
                                        {{$item['rank']}}
                                    </td>

                                    <td>
                                        {{$item['name']}}
                                    </td>
                                    <td style="max-width:">
                                        {{$item['email']}}
                                    </td>
                                    <td>
                                        {{$item['vote_count']}}
                                    </td>
                                    @if($c == 1)
                                    <td style="width:200px;min-width:190px;max-width:200px;text-align:center;">
                                        @elseif($c == 2)
                                                                            <td style="min-width:380px;max-width:400px;text-align:center;">
                                        @else
                                                                            <td style="min-width:380px;max-width:381px;text-align:center;">
                                        @endif
                                        <!--<div style="width:90px;float:left;border:1px solid green;height:90px;"></div>-->
                                        <!--<div style="width:90px;float:left;border:1px solid green;height:90px;"></div>-->
                                        <!--<div style="width:90px;float:left;border:1px solid green;height:90px;"></div>-->
                                        <!--<div style="width:90px;float:left;border:1px solid green;height:90px;"></div>-->
                        <span id="cid-{{$i}}" class="nondisplay">{{$item['c-id']}}</span>
                        <span id="uid-{{$i}}" class="nondisplay">{{$item['u-id']}}</span>                                        
                       @switch($c)
                            @case (1)
                            <div class="col-5 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-0" style=""></span>
                                </div>
                            </div>
                            <div class="col-5 imagediv" style="padding:0;margin-left:16%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-0" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" id="" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;cursor:pointer;">
                            </div>
                            @break
                            @case (2)
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-0" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;margin-right:5%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-0" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div>
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-1" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-1" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-1" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div>                            
                            @break
                            @case (4)
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-0" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-0" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;margin-right:5%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-0" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div>
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-1" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-1" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-1" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div> 
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-2" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-2" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;margin-right:5%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-2" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div>
                            <div class="col-3 imagediv" style="padding:0">
                                <div id="p-{{$item['u-id']}}-3" class="image-card" style="">
                                    <span id="vote-{{$item['u-id']}}-3" style="right:20%;"></span>
                                </div>
                            </div>
                            <div class="col-2 imagediv" style="padding:0;margin-left:0%;" >
                            <input type="text" name="txt" class="votes-{{$item['u-id']}}-3" value="" onchange="myFunction(this.value,this.id)" style="width:100%;border:1px solid gray;position:relative;top:10px;text-align:center;"><br><input type="button" value="Change" style="width:100%;border:1px solid green;position:relative;top:10px;cursor:pointer;background:green;color:white;text-align:center;">
                            </div>                             
                            @break
                            @default
                            @break
                        @endswitch                                        
                                    </td>
 
                                    <td>
                                        {{$item['ujoinc_date']}}
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
        $(document).ready(function() {
            var count='{{count($ujoincs)}}';
            for (var i=0;i<count;i++){
                var cid=$('#cid-'+i).text();
                var uid=$('#uid-'+i).text();
                // alert(cid);
                // alert(uid);
                //console.log(cid);
                //console.log(i);
                $.ajax({
                    url: '{{url('/image/get')}}',
                    type: 'post',
                    data: { cid: cid, uid:uid} ,
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        var obj = JSON.parse(response);
                        //alert(obj.message);
                        var images=obj.data;
                        //console.log(obj);
                        var number=0;
                        for (var j=0;j<images.length;j++){
                            //alert(j);
                            $('#p-'+images[j]['u-id']+'-'+j).css("background-image",'url('+images[j]['url'])+')';
                            $('#vote-'+images[j]['u-id']+'-'+j).text(images[j]['vote']);
                            $('.votes-'+images[j]['u-id']+'-'+j).val(images[j]['vote']);
                            $('.votes-'+images[j]['u-id']+'-'+j).attr('id',(images[j]['id']).toString());                            
                            //console.log('#p-'+images[j]['u-id']+'-'+j);
                            // $('#iid-'+j+'-'+images[j]['c-id']+'div').css("background-image",images[j]['url']);
                            // $('#voteid-'+j+'-'+images[j]['c-id']).text(images[j]['vote']);
                            // $('#imageid-'+j+'-'+images[j]['c-id']).text(images[j]['id']);
                            // number+=parseInt(images[j]['vote']);
                            //!!
                            //console.log(images[j]['url']);
                            //console.log('#iid-'+j+'-'+images[j]['c-id']);
                        }
                        if(images.length>0)
                            $('#vote'+images[0]['c-id']).text(number);

                    },
                    error: function (response) {
                        console.log(response);
                    }

                });
                //------------------------------------Disply Exposure-----------------------------------------------------

                //-----------------------------------------------------------------------------------------------------------------
            }

        });



        //----------------------------------------------------------------------

    </script> 
    
<script>
    function myFunction(val,val1) {
         //alert(val);alert(val1);
          var  data = new FormData();
            data.append('id', val1);
            data.append('value', val);
            $.ajax({
                type: "POST",
                url: '{{url('/change_vote')}}',
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
                    //alert('success');
                    location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error');

                }
            });
      
    }
</script>
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

                    //window.location.replace('./challenges/my');

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

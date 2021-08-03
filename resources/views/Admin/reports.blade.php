 
@extends('Admin.Layout.dashboard') 
@section('head')
<link rel="stylesheet" href="{{asset('css/popup.css')}}">
      <style>
          /* This is Sass code, to get pure CSS click on "scss" label above */
        .mfp-with-fade .mfp-content,
        .mfp-with-fade .mfp-arrow, .mfp-with-fade.mfp-bg {
          opacity: 0;
          -webkit-backface-visibility: hidden;
          -webkit-transition: opacity 0.3s ease-out;
          -moz-transition: opacity 0.3s ease-out;
          -o-transition: opacity 0.3s ease-out;
          transition: opacity 0.3s ease-out;
        }
        .mfp-with-fade.mfp-ready .mfp-content,
        .mfp-with-fade.mfp-ready .mfp-arrow {
          opacity: 1;
        }
        .mfp-with-fade.mfp-ready.mfp-bg {
          opacity: 0.8;
        }
        .mfp-with-fade.mfp-removing .mfp-content,
        .mfp-with-fade.mfp-removing .mfp-arrow, .mfp-with-fade.mfp-removing.mfp-bg {
          opacity: 0;
        }

      </style>
      <style>
        .button1 {
            background: rgba(0,0,0,0.3);

            color: white;
            width:90px;
            height:28px;
            z-index:2;
            color: #673939;

            font:bold 15px arial;
            text-align: center;
            text-decoration: none;
            display: inline-block;


            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            top:10px;
            border: 1px solid #f0f0f0;

        }

        .button1:hover {
            background-color: #4CAF50;
            color: black;
        }
        h4 { font-size: 25px; letter-spacing: -1px;
              text-shadow: 1px 1px 0 #000, margin: 10px 0 24px; text-align: center; line-height: 50px; }


     
     </style>
<style>
        /* This is Sass code, to get pure CSS click on "scss" label above */
.mfp-with-fade .mfp-content,
.mfp-with-fade .mfp-arrow, .mfp-with-fade.mfp-bg {
  opacity: 0;
  -webkit-backface-visibility: hidden;
  -webkit-transition: opacity 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out;
  transition: opacity 0.3s ease-out;
}
.mfp-with-fade.mfp-ready .mfp-content,
.mfp-with-fade.mfp-ready .mfp-arrow {
  opacity: 1;
}
.mfp-with-fade.mfp-ready.mfp-bg {
  opacity: 0.8;
}
.mfp-with-fade.mfp-removing .mfp-content,
.mfp-with-fade.mfp-removing .mfp-arrow, .mfp-with-fade.mfp-removing.mfp-bg {
  opacity: 0;
}

    </style>
    <!-- ----------------Model Dialogue------------- -->
 
    <style type="text/css">

        *, *:before, *:after {
            box-sizing: border-box;
            outline: none;
        }
        button {
            cursor: pointer;
        }

        .trigger {
            margin: 0 0.75rem;
            padding: 0.625rem 1.25rem;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0 0.0625rem 0.1875rem rgba(0, 0, 0, 0.12), 0 0.0625rem 0.125rem rgba(0, 0, 0, 0.24);
            transition: all 0.25s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-size: 0.875rem;
            font-weight: 300;
        }
        .trigger i {
            margin-right: 0.3125rem;
        }
        .trigger:hover {
            box-shadow: 0 0.875rem 1.75rem rgba(0, 0, 0, 0.25), 0 0.625rem 0.625rem rgba(0, 0, 0, 0.22);
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 0vh;
            background-color: transparent;
            overflow: hidden;
            transition: background-color 0.25s ease;
            z-index: 9999;
        }
        .modal.open {
            position: fixed;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            transition: background-color 0.25s;
        }
        .modal.open > .content-wrapper {
            transform: scale(1);
        }
        .modal .content-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            width: 50%;
            margin: 0;
            padding: 2.5rem;
            background-color: white;
            border-radius: 0.3125rem;
            box-shadow: 0 0 2.5rem rgba(0, 0, 0, 0.5);
            transform: scale(0);
            transition: transform 0.25s;
            transition-delay: 0.15s;
        }
        .modal .content-wrapper .close {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border: none;
            background-color: transparent;
            font-size: 1.5rem;
            transition: 0.25s linear;
        }
        .modal .content-wrapper .close:before, .modal .content-wrapper .close:after {
            position: absolute;
            content: '';
            width: 1.25rem;
            height: 0.125rem;
            background-color: black;
        }
        .modal .content-wrapper .close:before {
            transform: rotate(-45deg);
        }
        .modal .content-wrapper .close:after {
            transform: rotate(45deg);
        }
        .modal .content-wrapper .close:hover {
            transform: rotate(360deg);
        }
        .modal .content-wrapper .close:hover:before, .modal .content-wrapper .close:hover:after {
            background-color: tomato;
        }
        .modal .content-wrapper .modal-header {
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin: 0;
            padding: 0 0 1.25rem;
        }
        .modal .content-wrapper .modal-header h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .modal .content-wrapper .content {
            position: relative;
            display: flex;
        }
        .modal .content-wrapper .content p {
            font-size: 0.875rem;
            line-height: 1.75;
        }
        .modal .content-wrapper .modal-footer {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            margin: 0;
            padding: 1.875rem 0 0;
        }
        .modal .content-wrapper .modal-footer .action {
            position: relative;
            margin-left: 0.625rem;
            padding: 0.625rem 1.25rem;
            border: none;
            background-color: slategray;
            border-radius: 0.25rem;
            color: white;
            font-size: 0.87rem;
            font-weight: 300;
            overflow: hidden;
            z-index: 1;
        }
        .modal .content-wrapper .modal-footer .action:before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            transition: width 0.25s;
            z-index: 0;
        }
        .modal .content-wrapper .modal-footer .action:first-child {
            background-color: #2ecc71;
        }
        .modal .content-wrapper .modal-footer .action:last-child {
            background-color: #e74c3c;
        }
        .modal .content-wrapper .modal-footer .action:hover:before {
            width: 100%;
        }
        h3 {
            border-bottom: 2px solid red;

        }
    	.modal {
  display: none;
  background-color: transparent;
  transition: all 0.25s ease;
}

.modal.open {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal .content-wrapper {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  width: 50%;
  margin: 0;
  padding: 2.5rem;
  background-color: white;
  border-radius: 0.3125rem;
  box-shadow: 0 0 2.5rem rgba(0, 0, 0, 0.5);
}

.modal .content-wrapper .close {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 2.5rem;
  height: 2.5rem;
  border: none;
  background-color: transparent;
  font-size: 1.5rem;
  transition: 0.25s linear;
}

.modal .content-wrapper .close:before, .modal .content-wrapper .close:after {
  position: absolute;
  content: '';
  width: 1.25rem;
  height: 0.125rem;
  background-color: black;
}

.modal .content-wrapper .close:before { transform: rotate(-45deg); }

.modal .content-wrapper .close:after { transform: rotate(45deg); }

.modal .content-wrapper .close:hover { transform: rotate(360deg); }

.modal .content-wrapper .close:hover:before, .modal .content-wrapper .close:hover:after { background-color: tomato; }

.modal .content-wrapper .modal-header {
  position: relative;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  margin: 0;
  padding: 0 0 1.25rem;
}

.modal .content-wrapper .modal-header h2 {
  font-size: 1.5rem;
  font-weight: bold;
}

.modal .content-wrapper .content {
  position: relative;
  display: flex;
}

.modal .content-wrapper .content p {
  font-size: 0.875rem;
  line-height: 1.75;
}

.modal .content-wrapper .modal-footer {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  margin: 0;
  padding: 1.875rem 0 0;
}

.modal .content-wrapper .modal-footer > button {
  margin-left: 0.625rem;
  padding: 0.625rem 1.25rem;
  border: none;
  background-color: slategray;
  color: white;
  font-size: 0.87rem;
  font-weight: 300;
}

.modal .content-wrapper .modal-footer > button:first-child { background-color: #2ecc71; }

.modal .content-wrapper .modal-footer > button:last-child { background-color: #e74c3c; }
    td, th {
      border: 1px solid black;
      text-align: center;
      padding: 3px;
    }
    </style>
  


@stop

@section('content') 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Reported Photos Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" style="width:100%;">
                            <thead class=" text-primary" style="">
                            <th>
                                No
                            </th>
                            <th>
                                Photo ID
                            </th>
                            <th>
                                User ID
                            </th>                             
                            <th>
                                User Email
                            </th>
                            <th>
                                View Photo
                            </th>
                            <th>
                                Report Date
                            </th>
                            <th>
                                Action
                            </th>
                            <th>
                                Reported By
                            </th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($bid);$i++)
                                @php
                                    $item = json_decode(json_encode($bid[$i]), true);
                                @endphp
                                <tr>
                                    <td>
                                        {{$i+1}}
                                    </td>
                                    <td>
                                        {{$item['img_id']}}
                                    </td>
                                    <td>
                                        {{$item['u_id']}}
                                    </td>                                    
                                    <td>
                                        {{$item['email']}}
                                    </td>

                                    <td >
                                        <a class="single-popup" href={{$item['url']}}><button class="button button1" style="    margin-top: 0px;          border-radius: 4px;    background-color: transparent;    padding: 4px 14px 4px 14px;">View</button></a>
                                    </td>
                                    <td>
                                        {{$item['datetime']}}
                                    </td>
                                    <td>
                                        <!--{{$item['r_state']}}-->
                                        <select id="s{{$i}}" onchange="selectitem('{{$item['rid']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                @php
                                            switch ($item['r_state']){
                                                case '1':
                                                    echo "color:black";
                                                    break;
                                                case '2':
                                                    echo "color:blue";
                                                    break;
                                                case '3':
                                                    echo "color:green";
                                                    break;
                                                case '4':
                                                    echo "color:yellow";
                                                    break;
                                                default:
                                                    echo "color:red";
                                                    break;
                                                                                    }
                                        @endphp">
                                            <option  @php if($item['r_state']=='request') echo "selected";@endphp value="1">{{$item['r_state']}}</option> 
                                            <option  @php if($item['r_state']=='accepted') echo "selected";@endphp value="2">Accepted</option>
                                            <option  @php if($item['r_state']=='cancel') echo "selected";@endphp value="3">Cancel</option>
                                            <option  @php if($item['r_state']=='delete') echo "selected";@endphp value="4">Delete</option> 
                                        </select>
                                    </td>
                                    <td>
                                        {{$item['email']}}
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
              
                var value = selectObject.value;
                alert(item +"->" +value);
                var val='';
                switch (value) {
                    
                    case '1':
                        $('#'+id).css("color","blue");
                        val='Request';
                        break;    
                    case '2':
                        $('#'+id).css("color","blue");
                        val='Accepted';
                        break;
                    case '3':
                        $('#'+id).css("color","blue");
                        val='Cancel';
                        break;    
                    
                    case '4':
                    $('#'+id).css("color","blue");
                        val='Delete';
                        break;
                    
                    default:
                        $('#'+id).css("color","red");
                        val='error';
                        break;
                }
                 
                
                var  data = new FormData(); 
                data.append('item', item);
                data.append('val', val);
             console.log(item);
             console.log(val); 
     
    
    
                $.ajax({ 
                    type: "POST",
                    url: '{{url('/report_permission')}}',
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
                    //      alert(obj.message);
                    //   console.log(obj);
                      location.reload();
                    },
                    error: function(response){
    
                        console.log(response);
                        alert('error123');
    
                    }
                });
                   
            }
    </script> 
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
    <script>
                $('.single-popup').magnificPopup({ 
          type: 'image',
          removalDelay: 300,
          mainClass: 'mfp-with-fade',
          closeOnContentClick: true
        });
        
        $('.gallery').magnificPopup({ 
          
          type: 'image',
          delegate: 'a',
          removalDelay: 300,
          mainClass: 'mfp-with-fade',
          
          gallery:{enabled:true}
  
});
    </script>

@stop

 


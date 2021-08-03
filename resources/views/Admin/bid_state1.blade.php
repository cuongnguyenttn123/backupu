
@extends('Admin.Layout.dashboard')
@section('head')
    <style>
        select{
            border: 0;
            width: 100%;
        }
    </style>



    <!-- ----------------Model Dialogue------------- -->
    <style type="text/css">


    /*                      .style9*/
    /*                      {*/
    /*                          border-radius: 15px;*/
    /*                          border: solid 1px #8E96BD;*/
    /*                          background-color: #D9F6FA;*/
    /*                          box-shadow: inset 0 3px 10px #6B9EA8;*/
    /*                          padding: 5px 10px;*/
    /*                          color: #005;*/
    /*                      }*/
    /*.style9*/
    /*{*/
    /*    box-shadow: inset 0 3px 10px #6B9EA8, 0 0 5px  #6B9EA8;*/
    /*}*/
    /*</style>
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
<div data-modal="trigger-demo" class="modal">
       <article class="content-wrapper">
            <button class="close"></button>
            <h3><div id="email" style="width:500px; text-align:center">jack frank</div></h3>
            <div class="row" style = "text-align:center;">
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Flip:</span>
                    <input type="number" class="style9" id = "d1" name="flip"   style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Charge:</span>
                    <input type="number" class="style9" id = "d2" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Wand:</span>
                    <input type="number" class="style9" id = "d3" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Wallet:</span>
                    <input type="number" class="style9" id = "d4" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Points:</span>
                    <input type="number" class="style9" id = "d5" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Points:</span>
                    <input type="number" class="style9" id = "d6" name="flip" size="10" style="border-radius: 5px;">
                </div>
            </div>
            <footer class="modal-footer">
                <button class="action send_data style9" data-modal-trigger="trigger-1">Save</button> 
               
            </footer>
        </article>
</div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">B@extends('Admin.Layout.dashboard1')
@section('head')
    <style>
        select{
            border: 0;
            width: 100%;
        }
    </style>



    <!-- ----------------Model Dialogue------------- -->
    <style type="text/css">


    /*                      .style9*/
    /*                      {*/
    /*                          border-radius: 15px;*/
    /*                          border: solid 1px #8E96BD;*/
    /*                          background-color: #D9F6FA;*/
    /*                          box-shadow: inset 0 3px 10px #6B9EA8;*/
    /*                          padding: 5px 10px;*/
    /*                          color: #005;*/
    /*                      }*/
    /*.style9*/
    /*{*/
    /*    box-shadow: inset 0 3px 10px #6B9EA8, 0 0 5px  #6B9EA8;*/
    /*}*/
    /*</style>
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
<div data-modal="trigger-demo" class="modal">
       <article class="content-wrapper">
            <button class="close"></button>
            <h3><div id="email" style="width:500px; text-align:center">jack frank</div></h3>
            <div class="row" style = "text-align:center;">
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Flip:</span>
                    <input type="number" class="style9" id = "d1" name="flip"   style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Charge:</span>
                    <input type="number" class="style9" id = "d2" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Wand:</span>
                    <input type="number" class="style9" id = "d3" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px; ">
                    <span>Wallet:</span>
                    <input type="number" class="style9" id = "d4" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Points:</span>
                    <input type="number" class="style9" id = "d5" name="flip" size="10" style="border-radius: 5px;">
                </div>
                <div class="col-6" style ="margin-top:20px;  ">
                    <span>Points:</span>
                    <input type="number" class="style9" id = "d6" name="flip" size="10" style="border-radius: 5px;">
                </div>
            </div>
            <footer class="modal-footer">
                <button class="action send_data style9" data-modal-trigger="trigger-1">Save</button> 
               
            </footer>
        </article>
</div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Bid Approval Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" style="width:100%;">
                            <thead class=" text-primary" style="">
                            <th>
                                No
                            </th>
                            <th>
                                Seller ID
                            </th>
                            <th>
                                Seller Email
                            </th>                             
                            <th>
                                Bid Price
                            </th>
                            <th>
                                Buyer ID
                            </th>
                            <th>
                                Buyer Email
                            </th>
                            <th>
                                Seller Approval State
                            </th>
                            <th>
                                Admin Approval State
                            </th>
                            <th>
                                Action
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
                                        {{$item['seller_id']}}
                                    </td>
                                    <td>
                                        {{$item['seller_email']}}
                                    </td>                                    
                                    <td>
                                        {{$item['price']}}
                                    </td>

                                    <td>
                                        {{$item['buyer_id']}}
                                    </td>
                                    <td>
                                        {{$item['buyer_email']}}
                                    </td>
                                    <td>
                                        {{$item['state']}}
                                    </td>
                                    <td>
                                        {{$item['admin_approve']}}
                                    </td>
                                    <td>
                                        <select id="s{{$i}}" onchange="selectitem('{{$item['id']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                @php
                                            switch ($item['state']){
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
                                            <option  @php if($item['state']=='request') echo "selected";@endphp value="1">{{$item['admin_approve']}}</option> 
                                            <option  @php if($item['state']=='accepted') echo "selected";@endphp value="2">Accepted</option>
                                            <option  @php if($item['state']=='cancel') echo "selected";@endphp value="3">Cancel</option>
                                            <option  @php if($item['state']=='delete') echo "selected";@endphp value="4">Delete</option> 
                                        </select>
                                        
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
                // case '0':
                //     $('#'+id).css("color","black");
                //     val='select';
                //     break;
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
                url: '{{url('/admin_bid')}}',
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

    <script>
        // function selectitem(item, selectObject,id){

        //     var value = selectObject.value;
        //     // alert('name->' +$item['name']);
        //     switch (value) {
        //         case '0':
        //             $('#'+id).css("color","black");
        //             break;
        //         case '1':
        //             $('#'+id).css("color","blue");
        //             break;
        //         default:
        //             $('#'+id).css("color","red");
        //             break;
        //     }


        // }
        $('.u_pix_btn').click(function(){

            var btn_id = $(this).attr('id');
            var btn_name = $(this).attr('name');

            $("#email").text(btn_name);

            $.ajax({
                url: '{{url('view/userpix')}}',
                type: 'post',
                data: { uid:btn_id} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //alert(obj);
                  
                    var obj = JSON.parse(response);
                    console.log(obj);
                    console.log(obj.data.no);
                    $("#email").val(btn_name);
                    $("#email1").val(btn_name);
                    $("#d1").val(obj.data.Flip);
                    $("#d2").val(obj.data.Charge);
                    $("#d3").val(obj.data.Wand);
                    $("#d4").val(obj.data.walet);
                    $("#d5").val(obj.data.Points);
                    $("#d6").val(obj.data.rank);



                    $('.send_data').click(function(){

                        var Flip1 = $("#d1").val();
                        var Charge1 = $("#d2").val();
                        var Wand1 = $("#d3").val();
                        var walet1 = $("#d4").val();
                        var Points1 = $("#d5").val();
                        var rank1 = $("#d6").val();
                        $.ajax({
                            url: '{{url('updateuserpix')}}',
                            type: 'post',
                            data: { uid: obj.data['u-id'] , Charge: Charge1, Flip:Flip1, Points:Points1, Wand: Wand1, no:obj.data.no, rank:rank1, walet:walet1},
                            beforeSend: function (request){
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(response){
                                //alert(obj);
                                var obj = JSON.parse(response);
                                console.log(obj);



                            },
                            error: function (response) {
                                alert('error');
                                console.log(response);
                            }
                        });
                    });

                },
                error: function (response) {
                    alert('error');
                    console.log(response);
                }
            });

        });

        // ------------------Send the dialogue's data---------------





    </script>
<script type="text/javascript">
	const buttons = document.querySelectorAll(`button[data-modal-trigger]`);

for(let button of buttons) {
  modalEvent(button);
}

function modalEvent(button) {
  button.addEventListener('click', () => {
    const trigger = button.getAttribute('data-modal-trigger');
    const modal = document.querySelector(`[data-modal=${trigger}]`);
    const contentWrapper = modal.querySelector('.content-wrapper');
    const close = modal.querySelector('.close');

    close.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', () => modal.classList.remove('open'));
    contentWrapper.addEventListener('click', (e) => e.stopPropagation());

    modal.classList.toggle('open');
  });
}
</script>


@stop

 Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="" style="width:100%;">
                            <thead class=" text-primary" style="">
                            <th>
                                No
                            </th>
                            <th>
                                ID
                            </th>
                            <th>
                                Email
                            </th>                             
                            <th>
                                Amount
                            </th>
                            <th>
                                Sponsor A
                            </th>
                            <th>
                                Sponsor B
                            </th>
                            <th>
                                Date
                            </th>
                            </thead>
                            <tbody>


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
            // alert('name->' +$item['name']);
            switch (value) {
                case '0':
                    $('#'+id).css("color","black");
                    break;
                case '1':
                    $('#'+id).css("color","blue");
                    break;
                default:
                    $('#'+id).css("color","red");
                    break;
            }


        }
        $('.u_pix_btn').click(function(){

            var btn_id = $(this).attr('id');
            var btn_name = $(this).attr('name');

            $("#email").text(btn_name);

            $.ajax({
                url: '{{url('view/userpix')}}',
                type: 'post',
                data: { uid:btn_id} ,
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                    //alert(obj);
                  
                    var obj = JSON.parse(response);
                    console.log(obj);
                    console.log(obj.data.no);
                    $("#email").val(btn_name);
                    $("#email1").val(btn_name);
                    $("#d1").val(obj.data.Flip);
                    $("#d2").val(obj.data.Charge);
                    $("#d3").val(obj.data.Wand);
                    $("#d4").val(obj.data.walet);
                    $("#d5").val(obj.data.Points);
                    $("#d6").val(obj.data.rank);



                    $('.send_data').click(function(){

                        var Flip1 = $("#d1").val();
                        var Charge1 = $("#d2").val();
                        var Wand1 = $("#d3").val();
                        var walet1 = $("#d4").val();
                        var Points1 = $("#d5").val();
                        var rank1 = $("#d6").val();
                        $.ajax({
                            url: '{{url('updateuserpix')}}',
                            type: 'post',
                            data: { uid: obj.data['u-id'] , Charge: Charge1, Flip:Flip1, Points:Points1, Wand: Wand1, no:obj.data.no, rank:rank1, walet:walet1},
                            beforeSend: function (request){
                                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                            },
                            success: function(response){
                                //alert(obj);
                                var obj = JSON.parse(response);
                                console.log(obj);



                            },
                            error: function (response) {
                                alert('error');
                                console.log(response);
                            }
                        });
                    });

                },
                error: function (response) {
                    alert('error');
                    console.log(response);
                }
            });

        });

        // ------------------Send the dialogue's data---------------





    </script>
<script type="text/javascript">
	const buttons = document.querySelectorAll(`button[data-modal-trigger]`);

for(let button of buttons) {
  modalEvent(button);
}

function modalEvent(button) {
  button.addEventListener('click', () => {
    const trigger = button.getAttribute('data-modal-trigger');
    const modal = document.querySelector(`[data-modal=${trigger}]`);
    const contentWrapper = modal.querySelector('.content-wrapper');
    const close = modal.querySelector('.close');

    close.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', () => modal.classList.remove('open'));
    contentWrapper.addEventListener('click', (e) => e.stopPropagation());

    modal.classList.toggle('open');
  });
}
</script>


@stop


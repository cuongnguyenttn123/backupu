
@extends('Admin.Layout.dashboard')
@section('head')
    <style>
        select{
            border: 0;
            width: 100%;
        }
    </style>


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
  width: 400px; 
  padding: 16px;
  border: 16px solid #e0c798;
  background-color: white;
  z-index: 1002;
  overflow: auto;
  border-radius: 10px;
}
.white_content1 {
  display: none;
  position: absolute;
  top: 25%;
  margin-top: -15%;
  left: 25%;
  width: 400px; 
  padding: 16px;
  border: 16px solid #e0c798;
  background-color: white;
  z-index: 1002;
  overflow: auto;
  border-radius: 10px;
}
</style>  
    
    <!-- ----------------Model Dialogue------------- -->
    <style type="text/css">


      .style9
      {
          border-radius: 15px;
          border: solid 1px #8E96BD;
          background-color: #D9F6FA;
          box-shadow: inset 0 3px 10px #6B9EA8;
          padding: 5px 10px;
          color: #005;
      }
    .style9
    {
        box-shadow: inset 0 3px 10px #6B9EA8, 0 0 5px  #6B9EA8;
    }
    </style>
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

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    color: black;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
    color: black;
}
.btn, .btn.btn-default {
    color: #fff;
    background-color: #fff;
    border-color: #999999;
    box-shadow: 0 2px 2px 0 rgba(153, 153, 153, 0.14), 0 3px 1px -2px rgba(153, 153, 153, 0.2), 0 1px 5px 0 rgba(153, 153, 153, 0.12);
}
.caret {
    /* display: inline-block; */
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-top: 4px solid\9;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
}

    </style>
 
<!---->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet"> 
        <link rel="stylesheet" href="{{asset('datatable/css/bootstrap.min.css')}}">
 
        <link rel="stylesheet" href="{{asset('datatable/css/font-awesome.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('datatable/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('datatable/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('datatable/css/owl.transitions.css')}}">
        <!-- animate CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/animate.css')}}">
        <!-- normalize CSS
    		============================================ -->
        <link rel="stylesheet" href=" {{asset('datatable/css/normalize.css')}}">
        <!-- meanmenu icon CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/meanmenu.min.css')}}">
        <!-- main CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/main.css')}}">
    
        <link rel="stylesheet" href=" {{asset('datatable/css/educate-custon-icon.css')}}">
        
 
        <link rel="stylesheet" href="{{asset('datatable/css/educate-custon-icon.css')}}">
        <!-- morrisjs CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/morrisjs/morris.css')}}">
        <!-- mCustomScrollbar CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
        <!-- metisMenu CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/metisMenu/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('datatable/css/metisMenu/metisMenu-vertical.css')}}">
        <!-- calendar CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/calendar/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('datatable/css/calendar/fullcalendar.print.min.css')}}">
       
        <!-- normalize CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/data-table/bootstrap-table.css')}}">
        
        
        <link rel="stylesheet" href="{{asset('datatable/css/style.css')}}">
        <!-- style CSS
    		============================================ -->

        <!-- responsive CSS
    		============================================ -->
        <link rel="stylesheet" href="{{asset('datatable/css/responsive.css')}}">
        <!-- modernizr JS
    		============================================ -->
        <script src="{{asset('datatable/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        
        
    </head>
<!----> 
@stop

@section('content')
 


 <meta name="csrf-token" content="{{ csrf_token() }}">
   
  <div class="all-content-wrapper" style="width: 100%;">
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>User <span class="table-project-n"></span> Table</h1>
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
                        <th data-field="id"><b>No</b></th>
                            <th data-field="name" ><b>Name</b></th>
                            <th data-field="email" ><b>Email</b></th>
                            <th data-field="password" ><b>Password</b></th>
                            <th data-field="phone" ><b>Phone</b></th>
                            <th data-field="task" ><b>Verification</b></th>
                            <th data-field="date" ><b>Role</b></th>
                            <th data-field="city" ><b>City</b></th>
                            <th data-field="country" ><b>Country</b></th>
                            <th data-field="price" ><b>Permission</b></th>
                            <th data-field="action"><b>Details</b></th>
                            <th data-field="edit"><b>Action</b></th>
                        </tr>
                            </thead> 
                                        <tbody style="text-align:center">
                            @for($i=0;$i<count($data);$i++)
                                @php
                                    $item = json_decode(json_encode($data[$i]), true);
                                @endphp
                                <tr>
                                
                                    <td>
                                        {{$i+1}}
                                    </td>

                                    <td>
                                        {{$item['name']}}
                                    </td>

                                    <td>
                                        {{$item['email']}}
                                    </td>
                                    <td>
                                        {{$item['pass']}}
                                    </td>
                                    <td>
                                        {{$item['mobilenum']}}
                                    </td>
                                    <td>

                                        {{$item['vc']}}
                                    </td>
                                    <td>

                                        {{$item['role']}}
                                    </td>
                                    <td>
                                        {{$item['city']}}
                                    </td>
                                    <td>
                                        {{$item['country']}}
                                    </td>
                                    <td>
                                        <select id="s{{$i}}" onchange="selectitem('{{$item['email']}}',this,'s'+'{{$i}}')"  class="custom-select" style="
                                                @php
                                            switch ($item['permission']){
                                                case '0':
                                                    echo "color:black";
                                                    break;
                                                case '1':
                                                    echo "color:blue";
                                                    break;
                                                case '2':
                                                    echo "color:green";
                                                    break;
                                                default:
                                                    echo "color:red";
                                                    break;
                                                                                    }
                                        @endphp">
                                            <option  @php if($item['permission']=='new') echo "selected";@endphp value="0">{{$item['permission']}}</option>
                                            <option  @php if($item['permission']=='start') echo "selected";@endphp value="1">New</option>
                                            <option  @php if($item['permission']=='closed') echo "selected";@endphp value="2">agree</option>
                                            <option  @php if($item['permission']=='completed') echo "selected";@endphp value="3">Block</option>
                                            <option  @php if($item['permission']=='deleted') echo "selected";@endphp value="4">Delete</option> 
                                        </select>
                                        
                                    </td>
                                    
                                    
                                    <td > 
                                
                                    <div id="{{$item['no']}}" class="white_content">                      
                                    <article class="content-wrapper">  
                                       <a href="javascript:void(0)" onclick="document.getElementById('{{$item['no']}}').style.display='none';document.getElementById('fade').style.display='none'" style = "text-decoration: none; color:black;">X</a>
         
                            <div style = "width:35%;margin:auto;">
                            <h3><div id="email" style="text-align:center">{{$item['name']}}</div></h3>
                            </div>
                             <div style = "width:35%;margin:auto;">
                                <div class="row" style = "text-align:center;">
                                <div class="col-12" style ="margin-top:20px; ">
                                    <div> 
                                            <span style="float:left;">Flip:</span>  
                                             <input type="number"  class="style9"  id = "d1{{$item['no']}}"  value ="{{$item['Flip']}}"  style="border-radius: 5px;"> 
                                    </div> 
                                </div>
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Charge:</span> 
                                    <input type="number" class="style9"  id = "d2{{$item['no']}}" value = "{{$item['Charge']}}"  style="border-radius: 5px;">
                                </div>
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Wand:</span> 
                                    <input type="number" class="style9"  id = "d3{{$item['no']}}" value = "{{$item['Wand']}}"  style="border-radius: 5px;">
                                </div>
                                 
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Wallet:</span> 
                                    <input type="number" class="style9" id = "d4{{$item['no']}}" value = "{{$item['walet']}}"   style="border-radius: 5px;">
                                </div>
                                <div class="col-12" style ="margin-top:20px;  ">
                                    <span style="float:left;">Rank:</span> 
                                    <input type="number" class="style9" id = "d5{{$item['no']}}" value = "{{$item['Rank']}}"  style="border-radius: 5px;">
                                </div>
                                <div class="col-12" style ="margin-top:20px;  ">
                                    <span style="float:left;">Points:</span> 
                                    <input type="number" class="style9" id = "d6{{$item['no']}}" value = "{{$item['Points']}}"   style="border-radius: 5px;">
                                </div>
                            </div>
                            </div>
                            
                            <footer class="modal-footer">
                                <button type = "submit" onclick = "save_data(this.name);" name = "{{$item['no']}}" class="action send_data style9" data-modal-trigger="trigger-1" style = "margin-left: 0.625rem;
                                      padding: 0.35rem 1rem;
                                      border: none;
                                      background-color: slategray;
                                      color: white;
                                      font-size: 0.87rem;
                                      background-color: #e89a06;
                                      font-weight: 300;">Save</button>  
                            </footer> 
                        </article> 
                        </div>
                        
                                    <div id="edit-{{$item['no']}}" class="white_content1">                      
                                    <article class="content-wrapper">  
                                       <a href="javascript:void(0)" onclick="document.getElementById('edit-{{$item['no']}}').style.display='none';document.getElementById('fade').style.display='none'" style = "text-decoration: none; color:black;">X</a>
         
                             <div style = "width:35%;margin:auto;">
                                <div class="row" style = "text-align:center;">
                                <div class="col-12" style ="margin-top:20px; ">
                                    <div> 
                                        <span style="float:left;">Name:</span>  
                                             <input type="text"  class="style9"  id = "e1{{$item['no']}}"  value ="{{$item['name']}}"  style="border-radius: 5px;"> 
                                    </div> 
                                </div>
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Email:</span> 
                                    <input type="email" class="style9"  id = "e2{{$item['no']}}" value = "{{$item['email']}}"  style="border-radius: 5px;">
                                </div>
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Password:</span> 
                                    <input type="email" class="style9"  id = "e3{{$item['no']}}" value = "{{$item['pass']}}"  style="border-radius: 5px;">
                                </div>                                
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">Phone:</span> 
                                    <input type="number" class="style9"  id = "e4{{$item['no']}}" value = "{{$item['mobilenum']}}"  style="border-radius: 5px;">
                                </div>
                                 
                                <div class="col-12" style ="margin-top:20px; ">
                                    <span style="float:left;">City:</span> 
                                    <input type="text" class="style9" id = "e5{{$item['no']}}" value = "{{$item['city']}}"   style="border-radius: 5px;">
                                </div>
                                <div class="col-12" style ="margin-top:20px;  ">
                                    <span style="float:left;">Country:</span> 
                                    <input type="text" class="style9" id = "e6{{$item['no']}}" value = "{{$item['country']}}"  style="border-radius: 5px;">
                                </div>
                            </div>
                            </div>
                            
                            <footer class="modal-footer">
                                <button type = "submit" onclick = "save_data1(this.name);" name = "{{$item['no']}}" class="action send_data style9" data-modal-trigger="trigger-1" style = "margin-left: 0.625rem;
                                      padding: 0.35rem 1rem;
                                      border: none;
                                      background-color: slategray;
                                      color: white;
                                      font-size: 0.87rem;
                                      background-color: #e89a06;
                                      font-weight: 300;">Save</button>  
                            </footer> 
                        </article> 
                        </div>                        

                         <a href="javascript:void(0)" name = "{{$item['no']}}"
                               class="trigger fa fa-fire  u_pix_btn btn btn-outline-success" onclick="modal_popup(this.name);" style = "color: #9e9234;">View</a> 
                            </td>
                            <td>
                              <a href="javascript:void(0)" name = "{{$item['no']}}"
                               class="trigger fa fa-fire  u_pix_btn btn btn-outline-success" onclick="modal_popup1(this.name);" style = "color: #9e9234;">Edit</a>   
                            </td>
                           </tr>
                            @endfor

                            </tbody>
                                    </table>
                                    
                                <div id="fade" class="black_overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
    </div>
@stop
@section('script')
    <script type="text/javascript">
    
        function modal_popup(name)
        {
               console.log('#'+name);
               $('#'+name).show();
               $("#fade").show();
        }
        function modal_popup1(name)
        {
               console.log('#'+name);
               $('#edit-'+name).show();
               $("#fade").show();
        }        
        
        function close(){ 
            
              $(".white_content1").hide();
              $("#fade").hide(); 
        } 

            function selectitem(item, selectObject,id){
          
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
                    val='new';
                    break;
                case '2':
                    $('#'+id).css("color","blue");
                    val='agree';
                    break;
                case '3':
                    $('#'+id).css("color","red");
                    val='block';
                    break;
                case '4':
                    $('#'+id).css("color","yellow");
                    val='delete';
                    break;
                default:
                    $('#'+id).css("color","red");
                    val='error';
                    break;
            }
             
            
            var  data = new FormData(); 
            data.append('email', item);
            data.append('value', val);
         
            $.ajax({ 
                type: "POST",
                url: '{{url('/user/permission')}}',
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
         
        function save_data1(save_name){
            var name = $('#e1'+save_name).val();
            var email = $('#e2'+save_name).val();
            var pass = $('#e3'+save_name).val();
            var phone = $('#e4'+save_name).val();
            var city = $('#e5'+save_name).val();
            var country = $('#e6'+save_name).val();
            $.ajax({
                url: '{{url('edituser')}}',
                type: 'post',
                data: { uid: save_name , name: name, email: email,pass:pass, phone: phone, city: city, country: country},
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                   
                    $(".white_content1").hide();
                    $("#fade").hide(); 
                },
                error: function (response) {
                    alert('error');
                    console.log(response);
                }
            });
    }  
 
     function save_data(save_name){

            var Flip1 = $('#d1'+save_name).val();
            var Charge1 = $('#d2'+save_name).val();
            var Wand1 = $('#d3'+save_name).val();
            var walet1 = $('#d4'+save_name).val();
            var Points1 = $('#d5'+save_name).val();
            var rank1 = $('#d6'+save_name).val(); 
            $.ajax({
                url: '{{url('updateuserpix')}}',
                type: 'post',
                data: { uid: save_name , Charge: Charge1, Flip:Flip1, Points:Points1, Wand: Wand1, no:save_name, rank:rank1, walet:walet1},
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response){
                   
                    $(".white_content").hide();
                    $("#fade").hide(); 
                },
                error: function (response) {
                    alert('error');
                    console.log(response);
                }
            });
    } 
               
    // ------------------Send the dialogue's data---------------
 
    <!--</script>--> 
      
    		============================================ -->
     <script src="{{asset('datatable/js/vendor/jquery-1.12.4.min.js')}}"></script>
    
        <script src="{{asset('datatable/js/bootstrap.min.js')}}"></script>
        
        <script src="{{asset('datatable/js/wow.min.js')}}"></script>
        
        <script src="{{asset('datatable/js/jquery-price-slider.js')}}"></script>
        
        <script src="{{asset('datatable/js/jquery.meanmenu.js')}}"></script>
        
        <script src="{{asset('datatable/js/owl.carousel.min.js')}}"></script>
        
        
        <script src="{{asset('datatable/js/jquery.sticky.js')}}"></script>
        
        <script src="{{asset('datatable/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('datatable/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('datatable/js/scrollbar/mCustomScrollbar-active.js
        ')}}"></script> 
        
        
        <script src="{{asset('datatable/js/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('datatable/js/metisMenu/metisMenu-active.js')}}"></script> 
        
        
        
        <script src="{{asset('datatable/js/data-table/data_table.js')}}"></script> 
        <script src="{{asset('datatable/js/data-table/tableExport.js')}}"></script>
        <script src="{{asset('datatable/js/data-table/data-table-active.js')}}"></script> 
        <script src="{{asset('datatable/js/data-table/bootstrap-table-resizable.js')}}"></script>
        <script src="{{asset('datatable/js/data-table/colResizable-1.5.source.js')}}"></script>
        <script src="{{asset('datatable/js/data-table/bootstrap-table-export.js')}}"></script>  
        <script src="{{asset('datatable/js/chart/jquery.peity.min.js')}}"></script> 
        <script src="{{asset('data-table/bootstrap-editable.js')}}"></script>
        <script src="{{asset('datatable/js/peity/peity-active.js')}}"></script> 
        <script src="{{asset('datatable/js/tab.js')}}"></script> 
        <script src="{{asset('datatable/js/plugins.js')}}"></script> 
        <script src="{{asset('datatable/js/main.js')}}"></script> 
        <script src="{{asset('datatable/js/tawk-chat.js')}}"></script>

    <!---->




@stop


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
                            <div class="main-sparkline13-hd">
                                <h1><span class="table-project-n">Bid Notification Table</span></h1>
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
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <Input type='text' id='searchResults' placeholder='Search'  class='form-control' />
                                </div>
                                     <div class='col-md-12'>
                                         <div id='pagaData'>
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
    
          function UsersSearch(search = '',pageNo = 1) {
        

            $.ajax({
                type: "GET",
                url: '{{url("admin/buysell_reject_search")}}?search='+search+"&page="+pageNo,
                success: function (response) {
                    // var json = JSON.parse(response);
                    // console.log(response);
                    $('#pagaData').html(response);
                    
                    // $('#table').DataTable();
                    // var type = (json['state']);
                    // if (type == 200) {
                    //     alert('Successfully changed!');
                    //     // location.reload();
                    // } else {
                    //     alert('Please confirm your info');
                    // }
                },
                error: function (response) {
                    console.log(response);
                    alert('failed');
                }
            });
        }
    UsersSearch()
        $( document ).ready(function() {
            
            
              $(document).on('click', '.pagination a', function(event){
              event.preventDefault(); 
              var query = $('#searchResults').val();
              var page = $(this).attr('href').split('page=')[1];
                UsersSearch(query,page);
             });
     
            $(document).on('keyup', '#searchResults', function(){
              var query = $('#searchResults').val();
                UsersSearch(query);
             
             });
            
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
                '<span class="bread-blod">Bid Notification</span>\n' +
                '</li>');
        });

    </script>
    
    <script>
       function selectitem(item, selectObject,id){
            var value = selectObject.value;
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

            $.ajax({ 
                type: "POST",
                url: '{{url('/adminbuysale')}}',
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
                  //location.reload();
                },
                error: function(response){

                    console.log(response);
                    alert('error123');

                }
            });
               
        }
</script>    
    
    
    
    
    
    
    
    
    
    
    
    
    

@stop

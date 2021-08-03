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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title ">Info Page Images</h4>
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Upload image</button>
                    
                                        <table class="table">
                                            <thead>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Order Number</th>
                                                <th>Delete</th>
                                            </thead>
                                            <tbody>
                                                <form action="{{url('admin/update_info_order0')}}" method="post">
                                                    {{csrf_field()}}
                                                @foreach ($images as $key => $value)
                                                    <input type="hidden" name="image_id[]" value="{{$value->id}}">
                                                    <tr>
                                                    <td style="width: 25%;">
                                                    <a href="{{asset("uploads/info_images/$value->imgname")}}" target="_blank">
                                                        <img style="width: 200px;" src="{{asset("uploads/info_images/$value->imgname")}}">
                                                    </a>
                                                </td>
                                                <td style="width: 25%;">
                                                    <textarea name="image_title[]" cols="20" rows="4">{{$value->image_title}}</textarea>
                                                </td>
                                                <td>
                                                    <textarea name="image_details[]" cols="60" rows="4">{{$value->image_detail}}</textarea>
                                                </td>
                                                <td  style="width: 25%; "><input min="1" type="number" class="form-input" placeholder="Order Number" name="imgorder[]" value="{{$value->imgorder}}">   </td>
                                                <td  style="width: 45%; padding-left:40px;"><a class="btn btn-danger" href='{{url("admin/detele_info_image0/$value->id")}}'> Delete </a></td>
                                            </tr>
                                                 @endforeach
                                                 <tr>
                                                    <td colspan="3">
                                                 <input type="submit" value="Change Order" class="btn btn-primary">
                                                 </td>
                                                </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload New Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="row">
           <div class="col-md-12">
               <form enctype="multipart/form-data" method="post" action="{{url('admin/upload_info_images0')}}">
                {{csrf_field()}}
                <input type="file" name="files" /> <br>
                <textarea name="image_details" style="width:100%;" rows="6"></textarea> <br>
                <input type="submit" class="btn btn-primary" value="Upload">
               </form>
           </div>
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
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
                '<span class="bread-blod">Info Page Images</span>\n' +
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
                url: '{{url('/admin_bid0')}}',
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
    
    
    
    
    
    
    
    
    
    
    
    
    

@stop

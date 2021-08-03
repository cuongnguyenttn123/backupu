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
        .card-img.max-img{height:100px;object-fit:cover;margin-bottom:20px}
        .card-form-cn input[type=number], .card-form-cn input[type=text]{border-color:#eaeaea;padding:0px 0px}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}  
.card {
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
}
.card {
    /* border: 0; */
    margin-bottom: 30px;
    margin-top: 30px;
    border-radius: 6px;
    color: #333333;
    background: #fff;
    width: 100%;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
} 

.card .card-body {
    padding: 0.9375rem 20px;
    position: relative;
}
.card-form-cn input[type=number], .card-form-cn input[type=text] {
    border-color: #eaeaea;
    padding: 0px 0px;
}
input {
    text-align: center;
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 1px solid black;
    text-align: left;
    width: 100%;
    margin-bottom: 20px!important;
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
               <form enctype="multipart/form-data" method="post" action="{{url('admin/upload_exhebition_images')}}">
                {{csrf_field()}}
                <input type="file" name="files"  required="" /> <br>
                <input type="text" name="title" placeholder="Provide Image ID" required="" /> <br>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title " style="margin-top:20px;margin-left:20px;">Exhebition Images</h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:-40px;">Upload image</button>

                  <form class="w-100 card-form-cn" action="{{url('admin/update_exhebition_order')}}" method="post" accept-charset="utf-8">
                    <div class="row w-100 mx-0">
                    {{csrf_field()}}
                      @foreach ($images as $key => $value)
                      <div class="col-xl-2 col-lg-2 col-12">
                        <input type="hidden" name="image_id[]" value="{{$value->id}}">
                        <div class="card">
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col">
                                
                                <img class="card-img max-img" src="{{$value->imgname}}">

                                <input min="1" type="number" class="form-input" placeholder="Order Number" name="imgorder[]" value="{{$value->imgorder}}">
                                
                                <input type="text" name="title[]" placeholder="Provide Image Title" value="{{$value->image_id}}"  />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col text-right">
                                 <a class="btn btn-danger" href='{{url("admin/detele_exhebition_image/$value->id")}}'> Delete </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                    <div class="row">
                      <div class="col">
                        <input type="submit" value="Update" class="btn btn-primary">  
                      </div>
                    </div>
                      
                  </form>
                    
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
                '<span class="bread-blod">Best Images</span>\n' +
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

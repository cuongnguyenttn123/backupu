@extends('Admin.Layout.dashboard')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #DataTables_Table_0_filter{
            text-align: right;
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

<!-- Button to Open the Modal -->


<!-- The Modal -->
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
               <form enctype="multipart/form-data" method="post" action="{{url('admin/upload_info_images')}}">
                {{csrf_field()}}
                <input type="file" name="files" /> <br>
                <textarea name="image_details" cols="106" rows="6"></textarea> <br>
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
                    <h4 class="card-title ">Info Page Images</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Upload image</button>

                    <table class="table">
                        <thead>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Order Number</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <form action="{{url('admin/update_info_order')}}" method="post">
                                {{csrf_field()}}
                            @foreach ($images as $key => $value)
                                <input type="hidden" name="image_id[]" value="{{$value->id}}">
                                <tr>
                                <td style="width: 25%;">
                                <a href="{{asset("uploads/info_images/$value->imgname")}}" target="_blank">
                                    <img style="width: 200px;" src="{{asset("uploads/info_images/$value->imgname")}}">
                                </a>
                            </td>
                            <td>
                                <textarea name="image_details[]" cols="95" rows="6">{{$value->image_detail}}</textarea>
                            </td>
                            <td  style="width: 25%; "><input min="1" type="number" class="form-input" placeholder="Order Number" name="imgorder[]" value="{{$value->imgorder}}">   </td>
                            <td  style="width: 45%; padding-left:40px;"><a class="btn btn-danger" href='{{url("admin/detele_info_image/$value->id")}}'> Delete </a></td>
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

@stop
@section('script')
    <script>
        $('.table11').DataTable({order:[[1,"Desc"]]});
    </script>
@stop

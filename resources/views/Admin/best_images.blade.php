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
        .card-img.max-img{height:100px;object-fit:cover;margin-bottom:20px}
        .card-form-cn input[type=number], .card-form-cn input[type=text]{border-color:#eaeaea;padding:0px 0px}
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
               <form enctype="multipart/form-data" method="post" action="{{url('admin/upload_best_images')}}">
                {{csrf_field()}}
                <input type="file" name="files"  required="" /> <br>
                <input type="text" name="link" placeholder="Provide Anchor Link" required="" /> <br>
                <input type="text" name="title" placeholder="Provide Image Title" required="" /> <br>
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
                    <h4 class="card-title ">Best Page Images</h4>
                </div>
                <div class="card-body">
                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Upload image</button>

                  <form class="w-100 card-form-cn" action="{{url('admin/update_best_order')}}" method="post" accept-charset="utf-8">
                    <div class="row w-100 mx-0">
                    {{csrf_field()}}
                      @foreach ($images as $key => $value)
                      <div class="col-xl-2 col-lg-2 col-12">
                        <input type="hidden" name="image_id[]" value="{{$value->id}}">
                        <div class="card">
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col">
                                
                                  <img class="card-img max-img" src="{{asset("uploads/info_images/$value->imgname")}}">

                                <input min="1" type="number" class="form-input" placeholder="Order Number" name="imgorder[]" value="{{$value->imgorder}}">
                                
                                <input type="text" name="link[]" placeholder="Provide Anchor Link" value="{{$value->url}}" required="" />
                                <input type="text" name="title[]" placeholder="Provide Image Title" value="{{$value->imgtitle}}"  />
                              </div>
                            </div>
                            <div class="row">
                              <div class="col text-right">
                                 <a class="btn btn-danger" href='{{url("admin/detele_best_image/$value->id")}}'> Delete </a>
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

@stop
@section('script')
    <script>
        $('.table11').DataTable({order:[[1,"Desc"]]});
    </script>
@stop

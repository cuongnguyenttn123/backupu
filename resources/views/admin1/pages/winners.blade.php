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
                            <div class="container" style="margin-bottom:10px;">
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
                '<span class="bread-blod">Winners</span>\n' +
                '</li>');
        });

    </script>
    <script>
        $( document ).ready(function() {
            $('.pd-setting-ed').click(function(){
                var id=this.id;
                var a_name=$('#'+id).find('.o-name').text();
                var a_email=$('#'+id).find('.o-email').text();

                $('#name-add').text(a_name);
                $('#email-add').text(a_email);

                $('#add-modal').click();

            });
        });

    </script>

@stop

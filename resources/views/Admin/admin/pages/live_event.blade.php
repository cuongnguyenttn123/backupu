@extends('admin.Layout.pagetemplate')
@section('head')
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/editor/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/bootstrap-editable.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/editor/x-editor-style.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/data-table/bootstrap-editable.css')}}">
    <style>

    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="{{asset('admin/img/logo/logo.png')}}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.Layout.header')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Cricket</a></li>
                                <li><a href="#reviews">Soccer</a></li>
                                <li><a href="#INFORMATION">Tennis</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    {{----}}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="sparkline13-list">
                                                <div class="sparkline13-hd">
                                                    <div class="main-sparkline13-hd">
                                                        <h1>Projects <span class="table-project-n">Data</span> Table</h1>
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
                                                                <th data-field="state" data-checkbox="true"></th>
                                                                <th data-field="id">FixtureId</th>
                                                                <th data-field="date" data-editable="">StartDate</th>
                                                                <th data-field="name" data-editable="">Participants</th>
                                                                <th data-field="name" data-editable="">Status</th>
                                                                {{--<th data-field="complete">Create_date</th>--}}
                                                                <th data-field="date" data-editable="">Sport</th>
                                                                <th data-field="name" data-editable="">League</th>

                                                                <th data-field="price" data-editable="">Livescore</th>
                                                                {{--<th data-field="action">Action</th>--}}
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @for($i=0;$i<count($cricket);$i++)
                                                                @php
                                                                    $item=json_decode(json_encode($cricket[$i]),true);
                                                                @endphp

                                                                <tr>
                                                                    <td>
                                                                        <a id="{{$item['FixtureId']}}" href="{{url('/event/detail/'.$item['FixtureId'])}}" class="active_make">
                                                                            <span class="title_span">{{json_decode($item['Participants'],true)[0]['Name']}}</span>
                                                                            <span class="score_span">v</span>
                                                                            <span class="title_span">{{json_decode($item['Participants'],true)[1]['Name']}}</span>
                                                                            <span class="score_span">{{$item['StartDate']}}</span>
                                                                        </a>

                                                                    </td>
                                                                    @php
                                                                        $Odds=json_decode($item['Odds'],true)[0]['Bets'];
                                                                        $odd1='';
                                                                        $oddx='';
                                                                        $odd2='';
                                                                        for ($j=0;$j<count($Odds);$j++){
                                                                            switch ($Odds[$j]['Name']){
                                                                                case '1':
                                                                                    $odd1=$Odds[$j]['Price'];
                                                                                    break;
                                                                                case 'X':
                                                                                    $oddx=$Odds[$j]['Price'];
                                                                                    break;
                                                                                case '2':
                                                                                    $odd2=$Odds[$j]['Price'];
                                                                                    break;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <td>
                                                                        <div class="selectTemp">
                                                                            <div id="{{$item['FixtureId']}}_1_item" class="left_item">
                                                                                <span>{{$odd1}}</span>
                                                                                <input id="fixtureid" type="hidden" value="{{$item['FixtureId']}}">
                                                                                <input id="betname" type="hidden" value="1">
                                                                                <input id="data" type="hidden" value="{{json_encode($item)}}">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="selectTemp">
                                                                            <div id="{{$item['FixtureId']}}_X_item" class="left_item">
                                                                                <span>{{$oddx}}</span>
                                                                                <input id="fixtureid" type="hidden" value="{{$item['FixtureId']}}">
                                                                                <input id="betname" type="hidden" value="X">
                                                                                <input id="data" type="hidden" value="{{json_encode($item)}}">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="selectTemp">
                                                                            <div id="{{$item['FixtureId']}}_2_item" class="left_item">
                                                                                <span>{{$odd2}}</span>
                                                                                <input id="fixtureid" type="hidden" value="{{$item['FixtureId']}}">
                                                                                <input id="betname" type="hidden" value="2">
                                                                                <input id="data" type="hidden" value="{{json_encode($item)}}">
                                                                            </div>
                                                                        </div>
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
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                   {{----}}
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    {{----}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">

        </div>
    </div>
    <!-- Static Table End -->
    @include('admin.Layout.footer')
@stop
@section('script')
    <!-- data table JS
		============================================ -->
    <script src="{{asset('admin/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('admin/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('admin/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('admin/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('admin/js/data-table/bootstrap-table-export.js')}}"></script>
    <!--  editable JS
		============================================ -->
    <script src="{{asset('admin/js/editable/jquery.mockjax.js')}}"></script>
    <script src="{{asset('admin/js/editable/mock-active.js')}}"></script>
    <script src="{{asset('admin/js/editable/select2.js')}}"></script>
    <script src="{{asset('admin/js/editable/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('admin/js/editable/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admin/js/editable/xediable-active.js')}}"></script>
    <!-- Chart JS
		============================================ -->
    <script src="{{asset('admin/js/chart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('admin/js/peity/peity-active.js')}}"></script>
    <!-- tab JS
		============================================ -->
    <script src="{{asset('admin/js/tab.js')}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log('ready');
            $('#live_event').addClass('active');
            $('.breadcome-menu').html('');
            $('.breadcome-menu').append('' +
                '<li>' +
                '<a href="">Home</a>' +
                '<span class="bread-slash">/</span>' +
                '</li>' +
                '<li>' +
                '<span class="bread-blod">Live Event</span>\n' +
                '</li>');
        });

    </script>
@stop


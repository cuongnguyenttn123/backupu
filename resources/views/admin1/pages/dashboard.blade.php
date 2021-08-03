@extends('admin.Layout.pagetemplate')
@section('head')
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
    <div class="analytics-sparkle-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Customers</h5>
                            <h2><span class="counter">3000</span> {{--<span class="tuition-fees">Tuition Fees</span>--}}</h2>
                            <span class="text-success">100%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">100% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Today Reservation</h5>
                            <h2><span class="counter">420</span> <span class="tuition-fees"></span></h2>
                            <span class="text-danger">80%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Total Visitors</h5>
                            <h2><span class="counter">2500</span> <span class="tuition-fees">Tuition Fees</span></h2>
                            <span class="text-info">80%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%;"> <span class="sr-only">20% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                        <div class="analytics-content">
                            <h5>Cancel Reservation</h5>
                            <h2><span class="counter">12</span> <span class="tuition-fees">Tuition Fees</span></h2>
                            <span class="text-inverse">8%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:5%;"> <span class="sr-only">230% Complete</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject"><b>Betting Situation</b></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="actions graph-rp graph-rp-dl">
                                        {{--<p>All Earnings are in million $</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline cus-product-sl-rp">
                            <li>
                                <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Reservation</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Visitors</h5>
                            </li>
                            <li>
                                <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Cancel Reservaion</h5>
                            </li>
                        </ul>
                        <div id="extra-area-chart" style="height: 356px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.Layout.footer')
    @stop
@section('script')
    <!-- morrisjs JS
    ============================================ -->
    <script src="{{asset('admin/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('admin/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('admin/js/morrisjs/morris-active.js')}}"></script>

        <script type="text/javascript">
            //console.log("{/{json_encode($users)}}");
            Morris.Area({
                element: 'extra-area-chart',
                data: [{
                    period: "2019-5-14",
                    Soccer: "123",
                    Cricket: "103",
                    Tennis: "73"
                }, {
                    period: "2019-5-15",
                    Soccer: "162",
                    Cricket: "84",
                    Tennis: "43"
                }, {
                    period: "2019-5-16",
                    Soccer: "133",
                    Cricket: "105",
                    Tennis: "35"
                }, {
                    period: "2019-5-17",
                    Soccer: "173",
                    Cricket: "123",
                    Tennis: "56"
                }, {
                    period: "2019-5-18",
                    Soccer: "148",
                    Cricket: "103",
                    Tennis: "42"
                }, {
                    period: "2019-5-19",
                    Soccer: "197",
                    Cricket: "162",
                    Tennis: "31"
                },{
                    period: "2019-5-20",
                    Soccer: "186",
                    Cricket: "165",
                    Tennis: "22"
                },{
                    period: "2019-5-21",
                    Soccer: "209",
                    Cricket: "175",
                    Tennis: "31"
                }],
                xkey: 'period',
                ykeys: ['Soccer', 'Cricket', 'Tennis'],
                labels: ['Reservation', 'Visitors', 'Average'],
                pointSize: 3,
                fillOpacity: 0,
                pointStrokeColors:['#006DF0', '#933EC5', '#65b12d'],
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                lineWidth: 1,
                hideHover: 'auto',
                lineColors: ['#006DF0', '#933EC5', '#65b12d'],
                resize: true

            });
        </script>
@stop


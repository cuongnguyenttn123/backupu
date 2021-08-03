@php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmController;
@endphp
@extends('mlm.layout.layout2')
@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{$walet}}</h3>
                                        <h6>My Wallet Balance</h6>
                                    </div>
                                    <div>
                                        <i class="icon-users info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <h4>Request Withdrawal</h4>
                                <div class="media-body">
                                    <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width" href="{{url('withdraw_paypal/paypal')}}" target="_blank" style="margin-bottom: 5px;">PayPal</a>
                                    <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width" href="{{url('withdraw_paypal/stripe')}}" target="_blank" style="margin-bottom: 5px;">Stripe</a>
                                    <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width" href="{{url('withdraw_paypal/payoneer')}}" target="_blank" style="margin-bottom: 5px;">Payoneer</a>
                                    <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width" href="{{url('withdraw_paypal/google_pay')}}" target="_blank" style="margin-bottom: 5px;">Google Pay</a>
                                    <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width" href="{{url('withdraw_paypal/checkOut')}}" target="_blank" style="margin-bottom: 5px;">2CheckOut</a>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transactions</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            
                        </div>            
                        <div class="card-content">                
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Amount</th>                                
                                            <th class="border-top-0">Gateway</th>                              
                                            <th class="border-top-0">Before</th>
                                            <th class="border-top-0">After</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Remarks</th>
                                            <th class="border-top-0">Descriptions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdraw as $key=> $value)
                                        <tr>
                                            <td class="text-truncate"><button class="btn btn-sm btn-outline-danger round">${{$value->amount}}</button></td>
                                            <td class="text-truncate">{{$value->method}}</td>
                                            <td class="text-truncate">{{$value->before}}</td>
                                            <td class="text-truncate">{{$value->after}}</td>
                                            <td class="text-truncate">{{$value->date}}</td>
                                            <td class="text-truncate">{{$value->remark}}</td>
                                            <td class="text-truncate">{{$value->description}}</td>
                                        </tr>
                                        @endforeach
                                        
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

    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
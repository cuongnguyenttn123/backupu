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
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{$total_child}}</h3>
                                        <h6>My Direct</h6>
                                    </div>
                                    <div>
                                        <i class="icon-users info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{$user_mlm->totallink}}</h3>
                                        <h6>My Team</h6>
                                    </div>
                                    <div>
                                        <i class="icon-layers warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$walet}}</h3>
                                        <h6>Wallet</h6>
                                    </div>
                                    <div>
                                        <i class="icon-wallet success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{$user_mlm->pid}}</h3>
                                        <h6>My Sponsor</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
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
                                            <th class="border-top-0">Member's ID</th>                                
                                                                          
                                            <th class="border-top-0">Member's Name</th>
                                            <th class="border-top-0">Sponsor's ID</th>
                                            <th class="border-top-0">Sponsor's Name</th>
                                            <th class="border-top-0">Level</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mlm_transection as $key => $value)
                                        <tr>
                                            <td class="text-truncate"> {{$value->cid}}</td>
                                            
                                            <td class="text-truncate">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="{{ MlmController::getuser_name_img($value->cid) }}" alt="avatar">
                                                </span>
                                                <span>{{ MlmController::getuser_name($value->cid) }}</span>
                                            </td>
                                            <td class="text-truncate"><a href="#">{{$value->pid}}</a></td>
                                            <td class="text-truncate p-1">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="{{ MlmController::getuser_name_img($value->pid) }}" alt="avatar">
                                                </span>
                                                <span>{{ MlmController::getuser_name($value->pid) }}</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-danger round">{{$value->leval}}</button>
                                            </td>
                                            <td>
                                                {{$value->created_at}}
                                            </td>
                                            <td class="text-truncate">$ {{$value->amount}}</td>
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
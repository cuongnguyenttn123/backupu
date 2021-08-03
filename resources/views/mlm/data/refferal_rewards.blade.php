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
            
            <div class="row match-height">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="height: 426.425px;">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{asset('images/nikon_d3500.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Nikon D3500</h4>
                                <p class="card-text">Worth $499</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="height: 426.425px;">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{asset('images/nikon-d5600.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Nikon D5600</h4>
                                <p class="card-text">Worth $699</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="height: 426.425px;">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{asset('images/nikon-d750.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Nikon D750</h4>
                                <p class="card-text">Worth $1499</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Reward Summary:</h4>
                        </div>            
                        <div class="card-content">                
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">S/N</th>                                
                                            <th class="border-top-0">Team</th>                                
                                            <th class="border-top-0">Cash</th>                              
                                            <th class="border-top-0">Gift</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-truncate">1</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 5</td>
                                            <td class="text-truncate">$1</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">2</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 10</td>
                                            <td class="text-truncate">$5</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">3</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 25</td>
                                            <td class="text-truncate">$10</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">4</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 50</td>
                                            <td class="text-truncate">$15</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">5</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 100</td>
                                            <td class="text-truncate">$25</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">6</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 500</td>
                                            <td class="text-truncate">$50</td>
                                            <td class="text-truncate">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">7</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 1000</td>
                                            <td class="text-truncate">$100</td>
                                            <td class="text-truncate">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="{{asset('images/nikon_d3500.png')}}" alt="avatar">
                                                </span>
                                                <span>Nikon D3500 (Worth $499) or Cash $300</span>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">8</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 5000</td>
                                            <td class="text-truncate">$500</td>
                                            <td class="text-truncate">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="{{asset('images/nikon-d5600.jpg')}}" alt="avatar">
                                                </span>
                                                <span>Nikon D5600 (Worth $699) or Cash $500</span>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">9</td>
                                            <td class="text-truncate"><i class="fa fa-users success font-medium-1 mr-1"></i> 10000</td>
                                            <td class="text-truncate">$1000</td>
                                            <td class="text-truncate">
                                                <span class="avatar avatar-xs">
                                                    <img class="box-shadow-2" src="{{asset('images/nikon-d750.jpg')}}" alt="avatar">
                                                </span>
                                                <span>Nikon D750 (Worth $1499) or Cash $1000</span>
                                            </td>
                                            
                                        </tr>
                                        
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
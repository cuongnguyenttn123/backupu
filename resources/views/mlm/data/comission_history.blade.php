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
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Income History</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            
                        </div>            
                        <div class="card-content">                
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">S/N</th>                                
                                            <th class="border-top-0">Member's ID</th>
                                            <th class="border-top-0">Member's Name</th>
                                            <th class="border-top-0">Suponser's ID</th>
                                            <th class="border-top-0">Suponser's Name</th>
                                            <th class="border-top-0">Level</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($mlm_transection as $key => $value)
                                        <tr>
                                            <td class="text-truncate">{{ $value->id }}</td>
                                            <td class="text-truncate">{{$value->cid }}</td>
                                            <td class="text-truncate">{{ MlmController::getuser_name($value->cid) }}</td>
                                            <td class="text-truncate">{{$value->pid }}</td>
                                            <td class="text-truncate">{{ MlmController::getuser_name($value->pid) }}</td>
                                            <td class="text-truncate">{{$value->leval}}</td>
                                            <td class="text-truncate">{{$value->created_at}}</td>
                                            <td class="text-truncate">
                                                <h4>${{$value->amount}}</h4>
                                            </td>
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
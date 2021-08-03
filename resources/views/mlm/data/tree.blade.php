@php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmController;
@endphp
@extends('mlm.layout.layout2')
@section('content')
<style type="text/css">
.tree,
.tree ul,
.tree li {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
}

.tree {
    margin: 0 0 1em;
    text-align: center;
    width: 100%
}

.tree,
.tree ul {
    display: table;
}

.tree ul {
    width: 100%;
}

.tree li {
    display: table-cell;
    padding: .5em 0;
    vertical-align: top;
}

.tree li:before {
    outline: solid 1px #666;
    content: "";
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.tree li:first-child:before {
    left: 50%;
}

.tree li:last-child:before {
    right: 50%;
}

.tree code,
.tree span {
    /*border: solid .1em #666;*/
    border-radius: .2em;
    display: inline-block;
    margin: 0 .2em .5em;
    padding: .2em .5em;
    position: relative;
}

.tree ul:before,
.tree code:before,
.tree span:before {
    outline: solid 1px #666;
    content: "";
    height: .5em;
    left: 50%;
    position: absolute;
}

.tree ul:before {
    top: -.7em;
}

.tree code:before,
.tree span:before {
    top: -.4em;
}

.tree>li {
    margin-top: 0;
}

.tree>li:before,
.tree>li:after,
.tree>li>code:before,
.tree>li>span:before {
    outline: none;
}
img.img-fluid.rounded-circle.width-50{
    width: 60px !important;
    height: 60px;
}
@media only screen and (max-width: 600px) {
    .tree code, .tree span{
        padding: 0;
    }
    img.img-fluid.rounded-circle.width-50 {
        width: 35px !important;
        height: 35px;
    }
}
</style>


<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body" style="overflow: scroll;display: grid;">            
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">My Team</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                
                            </div>
                        </div>            
                        <div class="card-content">                
                            <div class="card-body">
                                
                                <ul class="tree">
                                    <li><!-- <span data-toggle="tooltip" data-html="true" title=""><img src="{{ MlmController::getuser_name_img(Request::segment(2))}}" alt="" class="img-fluid rounded-circle width-50"></span> -->
                                            <span data-toggle="tooltip" data-html="true" title="ID : {{$parent[0]->uid}} <br>Name : {{ ucfirst(MlmController::getuser_name($parent[0]->uid)) }}<br>Total Team : {{$parent[0]->totallink}} <br> Type : {{ucfirst($parent[0]->p_status)}}">
                                                <img src="{{ MlmController::getuser_name_img($parent[0]->uid)}}" alt="" class="img-fluid rounded-circle width-50">
                                            </span>
                                <ul >

                                @foreach($sub_Child as $key => $value)
                            
                                <li><a href="{{url('supertree/').'/'.$value['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value['uid'])) }}<br>Total Team : {{$value['totallink']}} <br> Type : {{ucfirst($value['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                @if(!empty($value['subchild']))
                                        <ul>
                                        @foreach($value['subchild'] as $key1 => $value1)
                                            
                                                <li>
                                                    <a href="{{url('supertree/').'/'.$value1['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value1['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value1['uid'])) }}<br>Total Team : {{$value1['totallink']}} <br> Type : {{ucfirst($value1['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value1['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                    <!-- 3rd -->
                                                    @if(!empty($value1['subchild']))
                                                            <ul>
                                                            @foreach($value1['subchild'] as $key2 => $value2)
                                                                
                                                                    <li>
                                                                        <a href="{{url('supertree/').'/'.$value2['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value2['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value2['uid'])) }}<br>Total Team : {{$value2['totallink']}} <br> Type : {{ucfirst($value2['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value2['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                        <!-- 4th -->
                                                                        @if(!empty($value2['subchild']))
                                                                            <ul>
                                                                                @foreach($value2['subchild'] as $key3 => $value3)
                                                                                    
                                                                                        <li>
                                                                                            <a href="{{url('supertree/').'/'.$value3['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value3['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value3['uid'])) }}<br>Total Team : {{$value3['totallink']}} <br> Type : {{ucfirst($value3['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value3['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                            <!-- 5th -->
                                                                                            @if(!empty($value3['subchild']))
                                                                                                <ul>
                                                                                                    @foreach($value3['subchild'] as $key4 => $value4)
                                                                                                        
                                                                                                            <li>
                                                                                                                <a href="{{url('supertree/').'/'.$value4['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value4['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value4['uid'])) }}<br>Total Team : {{$value4['totallink']}} <br> Type : {{ucfirst($value4['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value4['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                                                <!-- 6th -->
                                                                                                                @if(!empty($value4['subchild']))
                                                                                                                    <ul>
                                                                                                                        @foreach($value4['subchild'] as $key5 => $value5)
                                                                                                                            
                                                                                                                                <li>
                                                                                                                                    <a href="{{url('supertree/').'/'.$value5['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value5['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value5['uid'])) }}<br>Total Team : {{$value5['totallink']}} <br> Type : {{ucfirst($value5['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value5['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                                                                    <!-- 7th -->
                                                                                                                                    @if(!empty($value5['subchild']))
                                                                                                                                        <ul>
                                                                                                                                            @foreach($value5['subchild'] as $key6 => $value6)
                                                                                                                                                
                                                                                                                                                    <li>
                                                                                                                                                        <a href="{{url('supertree/').'/'.$value6['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value6['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value6['uid'])) }}<br>Total Team : {{$value6['totallink']}} <br> Type : {{ucfirst($value6['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value6['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                                                                                        <!-- 8th -->
                                                                                                                                                        @if(!empty($value6['subchild']))
                                                                                                                                                            <ul>
                                                                                                                                                                @foreach($value6['subchild'] as $key7 => $value7)
                                                                                                                                                                    
                                                                                                                                                                        <li>
                                                                                                                                                                            <a href="{{url('supertree/').'/'.$value7['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value7['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value7['uid'])) }}<br>Total Team : {{$value7['totallink']}} <br> Type : {{ucfirst($value7['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value7['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                                                                                                            <!-- 9th -->
                                                                                                                                                                            @if(!empty($value7['subchild']))
                                                                                                                                                                                <ul>
                                                                                                                                                                                    @foreach($value7['subchild'] as $key8 => $value8)
                                                                                                                                                                                        
                                                                                                                                                                                            <li>
                                                                                                                                                                                                <a href="{{url('supertree/').'/'.$value8['uid']}}"><span data-toggle="tooltip" data-html="true" title="ID : {{$value8['uid']}} <br>Name : {{ ucfirst(MlmController::getuser_name($value8['uid'])) }}<br>Total Team : {{$value8['totallink']}} <br> Type : {{ucfirst($value8['p_status'])}}"><img src="{{ MlmController::getuser_name_img($value8['uid'])}}" alt="" class="img-fluid rounded-circle width-50"></span></a>
                                                                                                                                                                                            </li>
                                                                                                                                                                                        
                                                                                                                                                                                    @endforeach 
                                                                                                                                                                                </ul>
                                                                                                                                                                            @endif
                                                                                                                                                                        </li>
                                                                                                                                                                    
                                                                                                                                                                @endforeach 
                                                                                                                                                            </ul>
                                                                                                                                                        @endif
                                                                                                                                                    </li>
                                                                                                                                                
                                                                                                                                            @endforeach 
                                                                                                                                        </ul>
                                                                                                                                    @endif
                                                                                                                                </li>
                                                                                                                            
                                                                                                                        @endforeach 
                                                                                                                    </ul>
                                                                                                                @endif
                                                                                                            </li>
                                                                                                        
                                                                                                    @endforeach 
                                                                                                </ul>
                                                                                            @endif
                                                                                        </li>
                                                                                    
                                                                                @endforeach 
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                
                                                            @endforeach 
                                                        </ul>
                                                    @endif
                                                </li>
                                            
                                        @endforeach 
                                        </ul>
                                   
                                @endif
                                </li>
                            
                            @endforeach  
                            </ul>  
                            </li>
                            </ul>                       
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
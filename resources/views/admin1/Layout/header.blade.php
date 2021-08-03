<div class="header-advance-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                        <i class="educate-icon educate-nav"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" >
                                <div id="app" class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        {{--<li class="nav-item dropdown">--}}
                                            {{--<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>--}}
                                            {{--<div role="menu" class="author-message-top dropdown-menu animated zoomIn">--}}
                                                {{--<div class="message-single-top">--}}
                                                    {{--<h1>Message</h1>--}}
                                                {{--</div>--}}
                                                {{--<ul class="message-menu">--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#">--}}
                                                            {{--<div class="message-img">--}}
                                                                {{--<img src="{{asset('admin/img/contact/1.jpg')}}" alt="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="message-content">--}}
                                                                {{--<span class="message-date">16 Sept</span>--}}
                                                                {{--<h2>Advanda Cro</h2>--}}
                                                                {{--<p>Please done this project as soon possible.</p>--}}
                                                            {{--</div>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#">--}}
                                                            {{--<div class="message-img">--}}
                                                                {{--<img src="{{asset('admin/img/contact/4.jpg')}}" alt="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="message-content">--}}
                                                                {{--<span class="message-date">16 Sept</span>--}}
                                                                {{--<h2>Sulaiman din</h2>--}}
                                                                {{--<p>Please done this project as soon possible.</p>--}}
                                                            {{--</div>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#">--}}
                                                            {{--<div class="message-img">--}}
                                                                {{--<img src="{{asset('admin/img/contact/3.jpg')}}" alt="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="message-content">--}}
                                                                {{--<span class="message-date">16 Sept</span>--}}
                                                                {{--<h2>Victor Jara</h2>--}}
                                                                {{--<p>Please done this project as soon possible.</p>--}}
                                                            {{--</div>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                        {{--<a href="#">--}}
                                                            {{--<div class="message-img">--}}
                                                                {{--<img src="{{asset('admin/img/contact/2.jpg')}}" alt="">--}}
                                                            {{--</div>--}}
                                                            {{--<div class="message-content">--}}
                                                                {{--<span class="message-date">16 Sept</span>--}}
                                                                {{--<h2>Victor Jara</h2>--}}
                                                                {{--<p>Please done this project as soon possible.</p>--}}
                                                            {{--</div>--}}
                                                        {{--</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                                {{--<div class="message-view">--}}
                                                    {{--<a href="#">View All Messages</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li class="nav-item" ><a id="noti_count" href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span id="" class="indicator-nt"></span></a>--}}
                                            {{--<div role="menu" class="notification-author dropdown-menu animated zoomIn" style="max-height: 350px;overflow: auto;">--}}
                                                {{--<div class="notification-single-top">--}}
                                                    {{--<h1>Notifications</h1>--}}
                                                {{--</div>--}}
                                                {{--<ul id="notification" class="notification-menu">--}}

                                                        {{--<li id="" style="display: list-item" onclick="">--}}
                                                            {{--<a href="#">--}}
                                                                {{--<div class="notification-icon">--}}
                                                                    {{--<i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="notification-content">--}}

                                                                    {{--<span class="notification-date">12:12:00</span>--}}
                                                                    {{--<h2></h2>--}}
                                                                    {{--<p>sdfsdf</p>--}}
                                                                {{--</div>--}}
                                                            {{--</a>--}}
                                                        {{--</li>--}}


                                                {{--</ul>--}}
                                                {{--<div class="notification-view">--}}
                                                    {{--<a href="#">View All Notification</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}


                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                {{--<img src="{{asset('admin/img/product/pro4.jpg')}}" alt="" />--}}
                                                <span><i class="fas fa-user-graduate"></i></span>
                                                @if(isset($admin_name))
                                                <span class="admin-name">
                                                    {{$admin_name}}
                                                </span>
                                                @endif
                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn" style="left: -50px">
                                                {{--<li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>--}}
                                                {{--</li>--}}
                                                {{--<li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>--}}
                                                {{--</li>--}}
                                                <li><a href="{{url('admin/logout')}}"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                </li>
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
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Search..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Dashboard V.1</span>
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
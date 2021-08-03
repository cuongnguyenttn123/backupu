@php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmController;
@endphp
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>{{ $title }} | Super 9</title>
    <link rel="apple-touch-icon" href="{{asset('mlm/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="http://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/components.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/style.css')}}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-bars font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('')}}"><img class="brand-logo" alt="modern admin logo" src="{{asset('images/Logo-Horizontal-Small.gif')}}" style="width: 140px;">
                </a></li>
            <!-- <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="fa fa-exchange" data-ticon="ft-toggle-right"></i></a></li> -->
            <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="fa fa-arrows"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="btn btn-sm btn-info box-shadow-2 round btn-min-width" href="javascript:void(0);" style="margin-top: 17px;">Super 9 ID: <b>{{UserController::user_pixid($_COOKIE['id'])}}</b> </a></li>
              <li class="nav-item d-none d-lg-block">{{ MlmController::getuser_status(1135) }}</li>
            </ul>
            <ul class="nav navbar-nav float-right">              
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="badge badge-pill badge-danger badge-up badge-glow">0</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0">0 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100">
                      <!-- <a href="javascript:void(0)">
                        <div class="media">
                          <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>
                          <div class="media-body">
                            <h6 class="media-heading">You have new order!</h6>
                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                              <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                          </div>
                        </div>
                      </a> -->
                    </li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
              </li>
              
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">
                @if(session('name') && !empty(session('name')))
                  {{session('name')}}
                @endif
              </span><span class="avatar avatar-online"><img src="{{ UserController::profile_image($_COOKIE['id']) }}" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{url('')}}"><i class="fa fa-home"></i> Home</a>
                  <a class="dropdown-item" href="{{url('portfolio')}}/{{UserController::user_pixid($_COOKIE['id'])}}"><i class="fa fa-podcast"></i> Portfolio</a>
                  <a class="dropdown-item" href="{{url('myprofile')}}"><i class="fa fa-sliders"></i> Account Settings</a>
                  <a class="dropdown-item" href="{{url('super9')}}"><i class="fa fa-sliders"></i> Super 9</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          
          
          
          <li class="nav-item"><a href="{{url('super9')}}"><i class="fa fa-tachometer"></i><span class="menu-title" data-i18n="eCommerce">Dashbord</span></a>
          </li>
          <li class="nav-item"><a href="{{url('supertree/').'/'.UserController::user_pixid($_COOKIE['id'])}}" ><i class="fa fa-cubes"></i><span class="menu-title" data-i18n="eCommerce">My Team</span></a>
          </li>
          <li class="nav-item"><a href="{{url('teamview/'.$_COOKIE['id'])}}" ><i class="fa fa-code-fork"></i><span class="menu-title" data-i18n="eCommerce">Team View</span></a>
          </li>
          <li class="nav-item"><a href="{{url('superWallet')}}" ><i class="fa fa-money"></i><span class="menu-title" data-i18n="eCommerce">My Wallet</span></a>
          </li>
          <li class="nav-item"><a href="{{url('income_history')}}" ><i class="fa fa-usd"></i><span class="menu-title" data-i18n="eCommerce">Income History</span></a>
          </li>
          <li class="nav-item"><a href="{{url('superrewards')}}" ><i class="fa fa-gift"></i><span class="menu-title" data-i18n="eCommerce">Rewards</span></a>
          </li>

          
        </ul>
      </div>
    </div>

    <!-- END: Main Menu-->
    @yield('content')

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 - 2020 <a class="text-bold-800 grey darken-2" href="https://urpixpays.com/" target="_blank">UrPixPays</a></span></p>
    </footer>
        <script src="{{asset('mlm/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('mlm/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{asset('mlm/vendors/js/charts/raphael-min.js')}}"></script>
    <script src="{{asset('mlm/vendors/js/charts/morris.min.js')}}"></script>
    <script src="{{asset('mlm/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('mlm/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('mlm/data/jvector/visitor-data.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('mlm/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('mlm/js/core/app.min.js')}}"></script>
    <script src="{{asset('mlm/js/scripts/customizer.min.js')}}"></script>
    <script src="{{asset('mlm/js/scripts/footer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('mlm/js/scripts/pages/dashboard-sales.min.js')}}"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Apr 2020 09:05:50 GMT -->
</html>
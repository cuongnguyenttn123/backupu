@php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MlmController;
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }} | UrPixPays - MLM System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo0.png')}}">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/bootstrap.min.css')}}">
    <!-- font awesome CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/font-awesome.min.css')}}css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('mlm/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('mlm/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/animate.css')}}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/normalize.css')}}">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/wave/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('mlm/css/wave/button.css')}}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/notika-custom-icon.css')}}">
    <!-- Data Table JS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/jquery.dataTables.min.css')}}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/main.css')}}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/style.css')}}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('mlm/css/responsive.css')}}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{asset('mlm/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <div class="logo-area">
                        <a href="#"><img src="{{asset('images/Logo-Horizontal-Small.gif')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                    <div class="header-top-menu">
                        <div class="dropdown dropleft " style="width: fit-content;float: right;">                
                            <button type="button" id="pro-c1" class="btn btn-primary " data-toggle="dropdown" style="width: 35px; height: 35px;
                                    border-radius: 23px;margin-left: 10px; background-image: url('{{ UserController::profile_image($_COOKIE['id']) }}'); background-repeat: no-repeat;background-size: cover;background-position: center;margin-top: 10px;">
                            </button>
                            <div class="user-name" style="color: white;float: right;margin: 7px 22px;">
                                <span>
                                @if(session('name') && !empty(session('name')))
                                  {{session('name')}}
                                @endif
                                </span><br>
                              <span>
                                Pix Id : {{ UserController::user_pixid($_COOKIE['id']) }}
                              </span>
                            </div>
                           
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="https://urpixpays.com/landing">Home</a> 
                                <a class="dropdown-item" href="https://urpixpays.com/portfolio/1135">Portfolio</a> 
                                <a class="dropdown-item" href="https://urpixpays.com/myprofile">Account Settings</a> 
                                <a class="dropdown-item" href="https://urpixpays.com/logout">Log Out</a>
                            </div>
                        </div>
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>3</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="{{asset('mlm/img/post/1.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="{{asset('mlm/img/post/2.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="{{asset('mlm/img/post/4.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="{{asset('mlm/img/post/1.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="{{asset('mlm/img/post/2.jpg')}}" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard One</a></li>
                                        <li><a href="index-2.html">Dashboard Two</a></li>
                                        <li><a href="index-3.html">Dashboard Three</a></li>
                                        <li><a href="index-4.html">Dashboard Four</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="view-email.html">View Email</a></li>
                                        <li><a href="compose-email.html">Compose Email</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="animations.html">Animations</a></li>
                                        <li><a href="google-map.html">Google Map</a></li>
                                        <li><a href="data-map.html">Data Maps</a></li>
                                        <li><a href="code-editor.html">Code Editor</a></li>
                                        <li><a href="image-cropper.html">Images Cropper</a></li>
                                        <li><a href="wizard.html">Wizard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="normal-table.html">Normal Table</a></li>
                                        <li><a href="data-table.html">Data Table</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-components.html">Form Components</a></li>
                                        <li><a href="form-examples.html">Form Examples</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="contact.html">Contact</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="color.html">Color</a>
                                        </li>
                                        <li><a href="login-register.html">Login Register</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="{{ (request()->is('frontend')) ? 'active' : '' }}">
                            <a href="{{url('mlmdashboard')}}"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class="{{ (request()->is('frontend')) ? 'active' : '' }}">
                            <a href="{{url('user_mlmtree/'.$_COOKIE['id'])}}"><i class="notika-icon notika-bar-chart"></i> Tree</a>
                        </li>
                        <li class="{{ (request()->is('mlmWallet') || request()->is('comission_history')) ? 'active' : '' }}">
                            <a data-toggle="tab" href="#wallet"><i class="notika-icon notika-mail"></i> Wallet</a>
                        </li>
                        <li class="{{ (request()->is('mlmrewards')) ? 'active' : '' }}"><a href="{{url('mlmrewards')}}"><i class="notika-icon notika-windows"></i> My Rewards</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="wallet" class="tab-pane notika-tab-menu-bg animated flipInX {{ (request()->is('mlmWallet') || request()->is('comission_history')) ? 'active' : '' }}">
                            <ul class="notika-main-menu-dropdown">
                                <li ><a href="{{url('mlmWallet')}}">My Wallet</a>
                                </li>
                                <li><a href="{{url('comission_history')}}">Comission History</a>
                                </li>
                                <!-- <li><a href="{{url('transaction_report')}}">Transaction Report</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    
    @yield('content')
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright ©  
. All rights reserved. Template by <a href="https://colorlib.com">Urpixpays</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
    <script src="{{asset('mlm/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{asset('mlm/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{asset('mlm/js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{asset('mlm/js/jquery-price-slider.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{asset('mlm/js/owl.carousel.min.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{asset('mlm/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{asset('mlm/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{asset('mlm/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('mlm/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('mlm/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{asset('mlm/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{asset('mlm/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('mlm/js/sparkline/sparkline-active.js')}}"></script>
    <!-- flot JS
        ============================================ -->
    <script src="{{asset('mlm/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('mlm/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('mlm/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{asset('mlm/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('mlm/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('mlm/js/knob/knob-active.js')}}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{asset('mlm/js/chat/jquery.chat.js')}}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{asset('mlm/js/todo/jquery.todo.js')}}"></script>
    <!--  wave JS
        ============================================ -->
    <script src="{{asset('mlm/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('mlm/js/wave/wave-active.js')}}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{asset('mlm/js/plugins.js')}}"></script>
    <!-- Data Table JS
        ============================================ -->
    <script src="{{asset('mlm/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('mlm/js/data-table/data-table-act.js')}}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{asset('mlm/js/main.js')}}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="{{asset('mlm/js/tawk-chat.js')}}"></script>
</body>

</html>
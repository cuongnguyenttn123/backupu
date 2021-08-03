 <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User page</title> 
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
<link rel='stylesheet' href='cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
     <style type="text/css">
           @keyframes swing {
  0% {
    transform: rotate(0deg);
  }
  10% {
    transform: rotate(10deg);
  }
  30% {
    transform: rotate(0deg);
  }
  40% {
    transform: rotate(-10deg);
  }
  50% {
    transform: rotate(0deg);
  }
  60% {
    transform: rotate(5deg);
  }
  70% {
    transform: rotate(0deg);
  }
  80% {
    transform: rotate(-5deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
@keyframes sonar {
  0% {
    transform: scale(0.9);
    opacity: 1;
  }
  100% {
    transform: scale(2);
    opacity: 0;
  }
}
body {
  font-size: 0.9rem;
}
.page-wrapper .sidebar-wrapper,
.sidebar-wrapper .sidebar-brand > a,
.sidebar-wrapper .sidebar-dropdown > a:after,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
.sidebar-wrapper ul li a i,
.page-wrapper .page-content,
.sidebar-wrapper .sidebar-search input.search-menu,
.sidebar-wrapper .sidebar-search .input-group-text,
.sidebar-wrapper .sidebar-menu ul li a,
#show-sidebar,
#close-sidebar {
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
/*----------------page-wrapper----------------*/
.page-wrapper {
}
.page-wrapper .theme {
  width: 40px;
  height: 40px;
  display: inline-block;
  border-radius: 4px;
  margin: 2px;
}
.page-wrapper .theme.chiller-theme {
  background: #1e2229;
}
/*----------------toggeled sidebar----------------*/
.page-wrapper.toggled .sidebar-wrapper {
  left: 0px;
}
@media screen and (min-width: 768px) {
  .page-wrapper.toggled .page-content {
    padding-left: 300px;
  }
}
/*----------------show sidebar button----------------*/
#show-sidebar {
      position: fixed;
    left: 0;
    top: 10px;
    height: 35px;
    border-radius: 0 4px 4px 0px;
    width: 35px;
    transition-delay: 0.3s;
}
.page-wrapper.toggled #show-sidebar {
  left: -40px;
}
/*----------------sidebar-wrapper----------------*/
.sidebar-wrapper {
  width: 260px;
  height: 100%;
  max-height: 100%;
  position: fixed;
  top: 0;
  left: -300px;
  z-index: 999;
}
.sidebar-wrapper ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
.sidebar-wrapper a {
  text-decoration: none;
}
/*----------------sidebar-content----------------*/
.sidebar-content {
  max-height: calc(100% - 30px);
  height: calc(100% - 30px);
  overflow-y: auto;
  position: relative;
}
.sidebar-content.desktop {
  overflow-y: hidden;
}
/*--------------------sidebar-brand----------------------*/
.sidebar-wrapper .sidebar-brand {
  padding: 10px 20px;
  display: flex;
  align-items: center;
}
.sidebar-wrapper .sidebar-brand > a {
  text-transform: uppercase;
  font-weight: bold;
  flex-grow: 1;
}
.sidebar-wrapper .sidebar-brand #close-sidebar {
  cursor: pointer;
  font-size: 20px;
}
/*--------------------sidebar-header----------------------*/
.sidebar-wrapper .sidebar-header {
  padding: 20px;
  overflow: hidden;
}
.sidebar-wrapper .sidebar-header .user-pic {
  float: left;
  width: 60px;
  padding: 2px;
  border-radius: 12px;
  margin-right: 15px;
  overflow: hidden;
}
.sidebar-wrapper .sidebar-header .user-pic img {
  object-fit: cover;
  /*height: 100%;*/
  width: 100%;
}
.sidebar-wrapper .sidebar-header .user-info {
  float: left;
}
.sidebar-wrapper .sidebar-header .user-info > span {
  display: block;
}
.sidebar-wrapper .sidebar-header .user-info .user-role {
  font-size: 12px;
}
.sidebar-wrapper .sidebar-header .user-info .user-status {
  font-size: 11px;
  margin-top: 4px;
}
.sidebar-wrapper .sidebar-header .user-info .user-status i {
  font-size: 8px;
  margin-right: 4px;
  color: #5cb85c;
}
/*-----------------------sidebar-search------------------------*/
.sidebar-wrapper .sidebar-search > div {
  padding: 10px 20px;
}
/*----------------------sidebar-menu-------------------------*/
.sidebar-wrapper .sidebar-menu {
  padding-bottom: 10px;
}
.sidebar-wrapper .sidebar-menu .header-menu span {
  font-weight: bold;
  font-size: 14px;
  padding: 15px 20px 5px 20px;
  display: inline-block;
}
.sidebar-wrapper .sidebar-menu ul li a {
  display: inline-block;
  width: 100%;
  text-decoration: none;
  position: relative;
  padding: 8px 30px 8px 20px;
}
.sidebar-wrapper .sidebar-menu ul li a i {
  margin-right: 10px;
  font-size: 12px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 4px;
}
.sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: "\f105";
  font-style: normal;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  background: 0 0;
  position: absolute;
  right: 15px;
  top: 14px;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
  padding: 5px 0;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
  padding-left: 25px;
  font-size: 13px;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
  content: "\f111";
  font-family: "Font Awesome 5 Free";
  font-weight: 400;
  font-style: normal;
  display: inline-block;
  text-align: center;
  text-decoration: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-right: 10px;
  font-size: 8px;
}
.sidebar-wrapper .sidebar-menu ul li a span.label,
.sidebar-wrapper .sidebar-menu ul li a span.badge {
  float: right;
  margin-top: 8px;
  margin-left: 5px;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
.sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
  float: right;
  margin-top: 0px;
}
.sidebar-wrapper .sidebar-menu .sidebar-submenu {
  display: none;
}
.sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
  transform: rotate(90deg);
  right: 17px;
}
/*--------------------------side-footer------------------------------*/
.sidebar-footer {
  position: absolute;
  width: 100%;
  bottom: 0;
  display: flex;
}
.sidebar-footer > a {
  flex-grow: 1;
  text-align: center;
  height: 30px;
  line-height: 30px;
  position: relative;
}
.sidebar-footer > a .notification {
  position: absolute;
  top: 0;
}
.badge-sonar {
  display: inline-block;
  background: #980303;
  border-radius: 50%;
  height: 8px;
  width: 8px;
  position: absolute;
  top: 0;
}
.badge-sonar:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  border: 2px solid #980303;
  opacity: 0;
  border-radius: 50%;
  width: 100%;
  height: 100%;
  animation: sonar 1.5s infinite;
}
/*--------------------------page-content-----------------------------*/
.page-wrapper .page-content {
  display: inline-block;
  width: 100%;
  padding-left: 0px;
  padding-top: 0px;
}
.page-wrapper .page-content > div {
  padding: 20px 40px;
}
.page-wrapper .page-content {
  overflow-x: hidden;
}
/*------scroll bar---------------------*/
::-webkit-scrollbar {
  width: 5px;
  height: 7px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #525965;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-thumb:hover {
  background: #525965;
}
::-webkit-scrollbar-thumb:active {
  background: #525965;
}
::-webkit-scrollbar-track {
  background: transparent;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-track:hover {
  background: transparent;
}
::-webkit-scrollbar-track:active {
  background: transparent;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
/*-----------------------------chiller-theme-------------------------------------------------*/
.chiller-theme .sidebar-wrapper {
    background: #31353D;
}
.chiller-theme .sidebar-wrapper .sidebar-header,
.chiller-theme .sidebar-wrapper .sidebar-search,
.chiller-theme .sidebar-wrapper .sidebar-menu {
    border-top: 1px solid #3a3f48;
}
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
    border-color: transparent;
    box-shadow: none;
}
.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
.chiller-theme .sidebar-wrapper .sidebar-brand>a,
.chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
.chiller-theme .sidebar-footer>a {
    color: #818896;
}
.chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
.chiller-theme .sidebar-wrapper .sidebar-header .user-info,
.chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
.chiller-theme .sidebar-footer>a:hover i {
    color: #b8bfce;
}
.page-wrapper.chiller-theme.toggled #close-sidebar {
    color: #bdbdbd;
}
.page-wrapper.chiller-theme.toggled #close-sidebar:hover {
    color: #ffffff;
}
.chiller-theme .sidebar-wrapper ul li:hover a i,
.chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
    color: #16c7ff;
    text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
}
.chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
.chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
    background: #3a3f48;
}
.chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
    color: #6c7b88;
}
.chiller-theme .sidebar-footer {
    background: #3a3f48;
    box-shadow: 0px -1px 5px #282c33;
    border-top: 1px solid #464a52;
}
.chiller-theme .sidebar-footer>a:first-child {
    border-left: none;
}
.chiller-theme .sidebar-footer>a:last-child {
    border-right: none;
}
     </style>
    <style>
        .right_title{
            text-align: left;
            background-color: rebeccapurple;
            color: white;
        }
        #pathbackUI{
            display: flex;
            background-color: #212121;
            width: 100%;
            padding-left: 5px;
        }
        .path_item{
            color: #fe950e;
            display: flex;
        }
        .path_item svg{
            margin-top: 5px;
        }
        .list-group-item{
            padding: 0 0 0 15px!important;
            text-align: left;
        }
        .list-group a::before {
            content: "";
            position: absolute;
            top:30%;
            right: 4px;
            width: 9px;
            height: 9px;
            background-color: red;
            border-radius: 50%;
        }
        /*table*/
        .table_head tr th{
            text-align: center;
        }
        .table_head{
            background-color: #ababab;
            border: black;
        }
        tbody .selectTemp{
            /*display: flex;*/
        }
        table .left_item{
            width: 100%;
            background-color: #3ce97b;
        }
        table .right_item{
            background-color: #ff876a;
        }
        tbody .selectTemp div{
            /*width: 50%;*/
            margin: 0;
            text-align: center;
            margin: 2px;
            cursor: pointer;
        }
        table{    margin-top: 100px;
            background-color: white;
        }
        .table_div .title{
            padding: 10px;
            background-color: #284257;
            color: white;
        }
        .table_div{
            margin-top: 20px;
        }
        table tbody tr td a{
            padding-left: 20px;
        }
        table tbody tr td a .title_span{
            color: #2789CE;
            font-weight: bold;
        }
        table tbody tr td a .score_span{
            color: #508D0E;
            font-weight: bold;
        }
        table tbody tr td{
            position: relative;
        }
        table tbody tr td .active_make:before{
            position: absolute;
            content: '';
            background-color: #2ecc71;
            border-radius: 4px;
            width: 8px;
            height: 8px;
            left: 10px;
            top: 35%;
        }
        .active1{
            background-color: #2dc378 !important;
        }
        .active2{
            background-color: #c76459 !important;
        }
        .hide{
            display: none;
        }
        /*today table*/
        .path_span{
            position: relative;
            margin-right: 20px;
        }
        .path_span:after{
            content: '';
            position: absolute;
            right: -15px;
            top: 20%;
            width: 0;
            height: 0;
            border-top: 5px solid transparent;
            border-left: 10px solid black;
            border-bottom: 5px solid transparent;
        }
        .table_div .title{
            padding: 10px;
            background-color: #284257;
            color: white;
        }
        /*bet slip*/
        #betSlipBoard .itemleft{
            width:60%;text-align: left;
        }
        #betSlipBoard .item20{
            width: 20%;text-align: center
        }
        #betSlipBoard .itemright{
            width: 20%;text-align: right
        }
        .backSlipHeader{
            background-color: #b9bbbe;
        }
        .bet_input{
            background-color: #a1cbef;
        }
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        /*checkbox*/
        input[type=checkbox] + label {
            display: block;
            margin: 0.2em;
            cursor: pointer;
            padding: 0.2em;
            font-weight: normal;
        }
        input[type=checkbox] {
            display: none;
        }
        input[type=checkbox] + label:before {
            content: "\2714";
            border: 0.1em solid #000;
            border-radius: 0.2em;
            display: inline-block;
            width: 1em;
            height: 1em;
            /* padding-left: 0.1em; */
            padding-bottom: 0.4em;
            margin-right: 0.2em;
            vertical-align: bottom;
            color: transparent;
            transition: .2s;
            font-size: 1em;
            line-height: 1;
            margin-bottom: 2px;
            border-color: red;
        }
        input[type=checkbox] + label:active:before {
            transform: scale(0);
        }
        input[type=checkbox]:checked + label:before {
            background-color: MediumSeaGreen;
            border-color: MediumSeaGreen;
            color: #fff;
        }
        input[type=checkbox]:disabled + label:before {
            transform: scale(1);
            border-color: #aaa;
        }
        input[type=checkbox]:checked:disabled + label:before {
            transform: scale(1);
            background-color: #bfb;
            border-color: #bfb;
        }
        /*button*/
        .third {
            /* border-color: #1c4d6d; */
            color: #fff;
            box-shadow: 0 0 40px 40px #616562 inset, 0 0 0 0 #3ce97b;
            transition: all 150ms ease-in-out;
        }
        .third:hover {
            box-shadow: 0 0 10px 0 #3ce97b inset, 0 0 10px 4px #3ce97b;
        }
        .second {
            /* border-color: #1c4d6d; */
            color: #fff;
            box-shadow: 0 0 40px 40px #616562 inset, 0 0 0 0 #3ce97b;
            transition: all 150ms ease-in-out;
        }
        .second:hover {
            box-shadow: 0 0 10px 0 #e94a45 inset, 0 0 10px 4px #e94a45;
        }
a {
  display: block;
  text-decoration: none;
  width: 100%;
  height: 100%;
  color: #999;
}
a:hover { color: #777; }
/* NAVIGATION */
.navigation {
  list-style: none;
  padding: 0;
  width: 250px; 
  height: 40px; 
  margin: 20px auto;
  background: #95C11F;
}
.navigation, .navigation a.main {
  border-radius: 4px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
}
.navigation:hover, .navigation:hover a.main {
  border-radius: 4px 4px 0 0;
  -webkit-border-radius: 4px 4px 0 0;
  -moz-border-radius: 4px 4px 0 0;
}
.navigation a.main {
  display: block; 
  height: 40px;
  font: bold 15px/40px arial, sans-serif; 
  text-align: center; 
  text-decoration: none; 
  color: #FFF;  
  -webkit-transition: 0.2s ease-in-out;
  -o-transition: 0.2s ease-in-out;
  transition: 0.2s ease-in-out;
}
.navigation:hover a.main {
  color: rgba(255,255,255,0.6);
  background: rgba(0,0,0,0.04);
}
.navigation li { 
  width: 250px; 
  height: 40px;
  background: #F7F7F7;
  font: normal 12px/40px arial, sans-serif !important; 
  color: #999;
  text-align: center;
  margin: 0;
  -webkit-transform-origin: 50% 0%;
  -o-transform-origin: 50% 0%;
  transform-origin: 50% 0%;
  -webkit-transform: perspective(350px) rotateX(-90deg);
  -o-transform: perspective(350px) rotateX(-90deg);
  transform: perspective(350px) rotateX(-90deg);
  box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
  -webkit-box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
  -moz-box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
}
.navigation li:nth-child(even) { background: #F5F5F5; }
.navigation li:nth-child(odd) { background: #EFEFEF; }
.navigation li.n1 { 
  -webkit-transition: 0.2s linear 0.8s;
  -o-transition: 0.2s linear 0.8s;
  transition: 0.2s linear 0.8s;
}
.navigation li.n2 {
  -webkit-transition: 0.2s linear 0.6s;
  -o-transition: 0.2s linear 0.6s;
  transition: 0.2s linear 0.6s;
}
.navigation li.n3 {
  -webkit-transition: 0.2s linear 0.4s;
  -o-transition: 0.2s linear 0.4s;
  transition: 0.2s linear 0.4s;
}
.navigation li.n4 { 
  -webkit-transition:0.2s linear 0.2s;
  -o-transition:0.2s linear 0.2s;
  transition:0.2s linear 0.2s;
}
.navigation li.n5 {
  border-radius: 0px 0px 4px 4px;
  -webkit-transition: 0.2s linear 0s;
  -o-transition: 0.2s linear 0s;
  transition: 0.2s linear 0s;
}
.navigation:hover li {
  -webkit-transform: perspective(350px) rotateX(0deg);
  -o-transform: perspective(350px) rotateX(0deg);
  transform: perspective(350px) rotateX(0deg);
  -webkit-transition:0.2s linear 0s;
  -o-transition:0.2s linear 0s;
  transition:0.2s linear 0s;
}
.navigation:hover .n2 {
  -webkit-transition-delay: 0.2s;
  -o-transition-delay: 0.2s;
  transition-delay: 0.2s;
}
.navigation:hover .n3 {
  -webkit-transition-delay: 0.4s;
  -o-transition-delay: 0.4s;
  transition-delay: 0.4s;
}
.navigation:hover .n4 {
  transition-delay: 0.6s;
  -o-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
.navigation:hover .n5 {
  -webkit-transition-delay: 0.8s;
  -o-transition-delay: 0.8s;
  transition-delay: 0.8s;
}
/*----deposit---button---*/
.nav-pills>li {
    float: left;
}
.nav>li {
    position: relative;
    display: block;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
ol, ul {
    margin-top: 0;
    margin-bottom: 10px;
}
ul, menu, dir {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
    </style>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA; border-radius:10px;
}
.button2:hover {
  background-color: #008CBA;
  color: white;
  border-radius:5px;
}
}
</style>
<!----top_bar------------->
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 12px;
  text-decoration: none;
  display: block;
}
.dropdown a:hover {background-color: #ddd;}
.show {display: block;}
</style>
<!------------------------>
</head>
<body style = "background-color: #e1e1e1;">
  <div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">User Panel</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
            @if(!is_null($u_profile))
                <img src="{{asset('images/profile_pictures/'.$u_profile)}}"  style="width:50px;height:50px;border-radius:50%;">
            @else
                <img src="{{asset('images/avatar.jpg')}}" style="width:50px;height:50px;border-radius:50%;">
            @endif
        </div>
        <div class="user-info">
          <span class="user-name"><?php echo $u_name?>
          </span> 
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li>
            <a href={{url('/myprofile')}}>
              <i class="fa fa-globe"></i>
               <span>My profile</span>  
            </a> 
          </li>
          <li>
            <a href={{url('/balanceoverview')}}>
              <i class="far fa-gem"></i>
               <span>Balance Overview</span>  
            </a> 
          </li>
          <li>
            <a href={{url('/transferredlog')}}>
              <i class="fa fa-tachometer-alt"></i>
               <span>Transferred Log</span>  
            </a> 
          </li>
          <li>
            <a href={{url('/bidding')}}>
               <i class="fa fa-chart-line"></i>
               <span>Bidding Notification</span>  
            </a> 
          </li>
          <li>
            <a href={{url('/cart_bid')}}>
               <i class="fa fa-chart-line"></i>
               <span>Cart Notification</span>  
            </a> 
          </li>           
          <li>
            <a href={{url('/orders-purchased')}}>
               <i class="fa fa-chart-line"></i>
               <span>Products Purchased</span>  
            </a>
          </li>
          <li>
            <a href={{url('/orders-sold')}}>
               <i class="fa fa-chart-line"></i>
               <span>Products Sold</span>  
            </a>
          </li>
          <li>
            <a href={{url('/u_invitation')}}>
               <i class="fa fa-chart-line"></i>
               <span>Invitation Table</span>
            </a>
          </li>
          <li>
            <a href={{url('/u_sponsorship')}}>
               <i class="fa fa-chart-line"></i>
               <span>Sponsorship Table</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 <main class="page-content">
    <div class="container-fluid">
      @include('userdashboardheader')
       <div class="card-body">
                    <div class="table">
                        <table class="table1 w-100">
                            <thead class=" text-primary">
                                <th>ID</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>address</th>
                            <th>address2</th>
                            <th>state</th>
                            <th>zip</th>
                            <th>mobile</th>
                            <th>Payment Method</th>
                            <th>Grand Total</th>
                            <th>Date & Time</th>
                            <th>Instructions</th>
                            </thead>
                            <tbody>
                            @foreach($order_main as $key => $value)
                                <tr>
                                    <td>{{$value->order_id}}</td>
                                    <td> {{$value->first_name}}</td>
                                    <td>
                                      {{$value->email}}
                                    </td>
                                    <td>
                                      {{$value->city}}
                                    </td>
                                    <td>
                                      {{$value->country}}
                                    </td>
                                    <td>
                                     {{$value->address}}
                                    </td>
                                    <td>
                                     {{$value->address2}}
                                    </td>
                                    <td>
                                     {{$value->state}}
                                    </td>
                                    <td>
                                     {{$value->zip}}
                                    </td>
                                    <td>
                                    {{$value->mobile}}
                                    </td>
                                    <td>
                                          {{$value->payment_method}}
                                    </td>
                                      <td>
                                          {{$value->grand_total}}
                                      </td>
                                      <td>
                                          {{$value->created_at}}
                                      </td>
                                      <td>
                                          {{$value->instructions}}
                                      </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Orders Details  </h4>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Delivery Method</th>
                            <th>Selected Size</th>
                            <th>Printing Price</th>
                            <th>Quantity </th>
                            <th>Net Price</th>
                            <th>Seller Name</th>
                            </thead>
                            <tbody>
                            @foreach($order_detail as $key => $value)
                                <tr>
                                    <td> <img style="width: 200px;" src="{{$value->url}}"/></td>
                                    <td>
                                      {{$value->product_name}}
                                    </td>
                                    <td>{{$value->unit_price}}</td>
                                    <td>
                                      {{$value->delivery_method}}
                                    </td>
                                    <td>
                                      {{$value->selected_size}}
                                    </td>
                                    <td>{{$value->printing_price}}</td>
                                    <td>
                                     {{$value->quantity}}
                                    </td>
                                    <td>
                                    {{$value->unit_price}}
                                    </td>
                                    <td>
                                    {{$value->name}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <h3 class="text-center" >Grand Total ${{$order_main[0]->grand_total}} </h3>
        </div>
    </div>
        </div>
  </main>
<!-- page-wrapper -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
  <script src='http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <script>
         $('.table11').DataTable({
              "order": [[ 1, "desc" ]]
        });
      $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});
$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});
    </script>
<!---top_bar-------------->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<!------------------------>
</body>
</html>
<!doctype html>
<html class="no-js" lang="en">

<head>

@include('admin1.Layout.head')
    @yield("head")
    @yield('style')
</head>
<body class="">

    <div class="preloader-single shadow-inner mg-tb-30" style="position: absolute;top: 0;left: 0;width: 100%;z-index: 1000;height: 100%">
        <div class="ts_preloading_box">
            <div id="ts-preloader-absolute22">
                <div class="tsperloader22" id="first_tsperloader22"></div>
                <div class="tsperloader22" id="second_tsperloader22"></div>
                <div class="tsperloader22" id="third_tsperloader22"></div>
            </div>
        </div>
    </div>

<!--[if lt IE 8]>

<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->
@include('admin1.Layout.leftmenu')
<!-- End Left menu area -->
<!-- Start Welcome area -->

<div  class="all-content-wrapper">


    @yield("content")

</div>
@include('admin1.Layout.script')
@yield('script')

</body>

</html>
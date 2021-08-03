<html>
<head>
    @include('Layout/head')
    @yield('lib')

    @yield('style-css')
    <style>
        .container-fluid{
            min-height: 786px;
        }
    </style>
</head>
<body>
<header>
    @include('Layout.smenu')

</header>
@include('Layout.childmenu')
<div class="container-fluid" style="min-height: 300px;
">
    @yield('content')
</div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>

    @yield('javascript')

</html>

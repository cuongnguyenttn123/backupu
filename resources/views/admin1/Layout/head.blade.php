
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Urpixpays.com Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('adminp/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/calendar/fullcalendar.print.min.css')}}">

    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <!-- Preloader CSS
       ============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/preloader/preloader-style.css')}}">
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/summernote/summernote.css')}}">
    <!-- tabs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('adminp/css/tabs.css')}}">
    <link rel="stylesheet" href="{{asset('adminp/css/modals.css')}}">

    <script src="{{asset('adminp/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <style>
    #sidebar .active{
        background-color: rgba(128, 157, 208, 0.36);
    }
    #sidebar .active1{
        background-color: rgba(104, 169, 231, 0.48);
    }
    </style>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        /*Pusher.logToConsole = true;

        var pusher = new Pusher('c04ff647895df4b0ba07', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });*/
    </script>
    <script>
        /*window.Laravel = {/!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};*/
    </script>
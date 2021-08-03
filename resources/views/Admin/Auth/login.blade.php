<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard / Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
<link rel="icon" type="image/png" href={{asset('login/images/icons/favicon.ico')}}/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
    <!--===============================================================================================-->
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: background-color 5000s ease-in-out 0s;
            color:white !important;
            -webkit-text-fill-color: white !important;
        }
        .register-link{
            color:#0f35c5;
        }
        .register-link:hover{
            color:white !important;

        }

    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('images/login_bg.jpg')}}');background-color: rgba(255,255,255,0.5);">
        <div class="wrap-login100">
            <form autocomplete="off" method="POST" action="{{url('adminlogin')}}">
                @csrf
                <span class="">
                        <img src="{{asset('images/logo11.png')}}" class="zmdi zmdi-landscape" style="width:50%; height:50%;margin-bottom: -60px;margin-left:100px;">
				</span>

                <span class="login100-form-title p-b-34 p-t-27">
                    <p style="font-size: 32px;color:white;font-family:Montserrat,sans-serif "> </p>
                </span>
                @if ($errors->any())
                    <div class="alert alert-danger" style="background:none;border:none">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:darkred">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Enter email">

                    <input class="input100" type="email" style="font-family:Montserrat,sans-serif;" name="email" placeholder="Email" required>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" style="font-family:Montserrat,sans-serif;" name="password" placeholder="Password" class="form-control" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong> </strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div style="display: flex; justify-content: space-between">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            <p style="color:white;font-size: 16px;font-family:Montserrat,sans-serif ">Remember me</p>
                        </label>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        <p style="font-size: 20px;font-family:Montserrat,sans-serif ">Login</p>
                        {{--log in--}}
                    </button>
                </div>
                <div class="text-center" style="margin-top:30px">
                    <h6 class="txt1" style="font-weight:lighter;font-size: 14px;color: white;font-family:Montserrat,sans-serif ">Did you forget password?<span><a href={{url('/admin_register')}} class="register-link" style="margin-left:10px;font-size: 14px;color: white;font-family:Montserrat,sans-serif">Sign Up</a> </span> </h6>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/js/main.js')}}"></script>

</body>
</html>
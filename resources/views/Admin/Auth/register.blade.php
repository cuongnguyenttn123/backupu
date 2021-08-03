<!DOCTYPE html>
<html lang="en">
<head>
    <title>Move Company / Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
{{--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>--}}
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
    <div class="container-login100" style="background-image: url('public/images/login_bg.jpg');background-color: rgba(255,255,255,0.5);">
        <div class="wrap-login100">
            <form autocomplete="off" method="POST" action="{{url('adminregister')}}">
                @csrf
                 <span class="">
                        <img src="{{asset('images/logo11.png')}}" class="zmdi zmdi-landscape" style="width:50%; height:50%;margin-bottom: -60px;margin-left:100px;">
				</span>

                <span class="login100-form-title p-b-34 p-t-27">
						<p style="font-family:Montserrat,sans-serif;font-size: 30px;color: white;"></p>
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

                <div class="wrap-input100" data-validate = "Enter User Name" >
                    <input class="input100" type="text" style="font-family:Montserrat,sans-serif;" name="name" placeholder="Admin Name" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100" data-validate = "Enter age" >
                    <input class="input100" type="text" style="font-family:Montserrat,sans-serif;" name="age" placeholder="Age" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>
                <div class="wrap-input100" data-validate = "Enter Country" >
                    <input class="input100" type="text" style="font-family:Montserrat,sans-serif;" name="country" placeholder="Country" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div> 
                <div class="wrap-input100" data-validate = "Enter City" >
                    <input class="input100" type="text" style="font-family:Montserrat,sans-serif;" name="city" placeholder="City" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>                 
                <div class="wrap-input100" data-validate = "Enter Phone Number" >
                    <input class="input100" type="text" style="font-family:Montserrat,sans-serif;" name="phone" placeholder="Phone Number" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Enter email" >
                    <input class="input100" type="email" style="font-family:Montserrat,sans-serif;" name="email" placeholder="Email" required>
                    {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                        {{--</span>--}}
                    {{--@endif--}}
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" style="font-family:Montserrat,sans-serif;" name="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        <p style="font-family:Montserrat,sans-serif;font-size: 18px;">Register</p>
                    </button>
                </div>

                <div class="text-center" style="margin-top:30px">
                    <h6 class="txt1" style="font-family:Montserrat,sans-serif;font-size: 14px;">Already have account?<span><a href="admin_login" class="register-link" style="margin-left:10px;font-family:Montserrat,sans-serif;font-size: 14px;color:white;">Login</a> </span> </h6>
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
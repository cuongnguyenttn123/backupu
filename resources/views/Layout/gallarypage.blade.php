<html>

<head>

    @include('Layout/head')

    @yield('lib')



    @yield('style-css')

    <style>

        .container-fluid{

            min-height: 786px;

        }

        .divpreloader{

      position: fixed;

      left: 0px;

      top: 0px;

      width: 100%;

      height: 100%;

      z-index: 9999;

      background: url('{{asset('assets/img/faces/preloader.gif')}}') 50% 50% no-repeat rgb(0,0,0);

      background-size: 60px ,60px ;

      opacity: 0.5;

      display: none;

    }

    /**

 * The CSS shown here will not be introduced in the Quickstart guide, but shows

 * how you can use CSS to style your Element's container.

 */

.StripeElement {

  box-sizing: border-box;



  height: 40px;



  padding: 10px 12px;



  border: 1px solid transparent;

  border-radius: 4px;

  background-color: white;



  box-shadow: 0 1px 3px 0 #e6ebf1;

  -webkit-transition: box-shadow 150ms ease;

  transition: box-shadow 150ms ease;

}



.StripeElement--focus {

  box-shadow: 0 1px 3px 0 #cfd7df;

}



.StripeElement--invalid {

  border-color: #fa755a;

}



.StripeElement--webkit-autofill {

  background-color: #fefde5 !important;

}



    </style>





</head>

<body>

<script src="https://js.stripe.com/v3/"></script>



    



    <div class="divpreloader">

    </div>

<header>

  @if(Session::get('login_flag') != 'login')
    @include('Layout.gmenu')
 @else
    @include('Layout.smenu')
@endif



</header>



<div class="container-fluid" style="min-height: 300px;">

    @yield('content')

</div>

<footer class="bg-dark">

    @include('Layout/footer')

</footer>

</body>



@yield('javascript')



</html>


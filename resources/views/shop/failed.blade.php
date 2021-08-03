@extends('Layout.page1')

@section('lib')

@stop

@section('style-css')
<link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">


@stop
@section('content')
<div class="container">

            <h2>Sorry!</h2>
            <p>Something is wrong with the Payment Provider</p>
            <p>We did not recieve your payment please try again</p>

</div>


@stop

@section('javascript')
<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
  
@stop
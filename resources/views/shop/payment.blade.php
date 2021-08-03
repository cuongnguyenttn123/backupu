
@extends('Layout.page1')

@section('lib')

@stop

@section('style-css')


@stop
@section('content')
    @php

            @endphp

 
{{------------------button---------}}
    <style>

 
.woocommerce-error,.woocommerce-info,.woocommerce-message{
    padding:1em 2em 1em 3.5em;
    margin:0 0 2em;
    position:relative;
    background-color:#f7f6f7;
    color:#515151;
    border-top:3px solid #a46497;
    list-style:none outside;
    width:auto;
    word-wrap:break-word
}
.woocommerce-error::after,.woocommerce-error::before,.woocommerce-info::after,.woocommerce-info::before,.woocommerce-message::after,.woocommerce-message::before{
    content:' ';
    display:table
}
.woocommerce-error::after,.woocommerce-info::after,.woocommerce-message::after{
    clear:both
}
.woocommerce-error::before,.woocommerce-info::before,.woocommerce-message::before{
    font-family:WooCommerce;
    content:'\e028';
    display:inline-block;
    position:absolute;
    top:1em;
    left:1.5em
}
.woocommerce-error .button,.woocommerce-info .button,.woocommerce-message .button{
    float:right
}
.woocommerce-error li,.woocommerce-info li,.woocommerce-message li{
    list-style:none outside!important;
    padding-left:0!important;
    margin-left:0!important
}
.rtl.woocommerce .price_label,.rtl.woocommerce .price_label span{
    direction:ltr;
    unicode-bidi:embed
}
.woocommerce-message{
    border-top-color:#8fae1b
}
.woocommerce-message::before{
    content:'\e015';
    color:#8fae1b
}
.woocommerce-info{
    border-top-color:#1e85be
}
.woocommerce-info::before{
    color:#1e85be
}
 
</style>

 <div class="woocommerce-info">
		Have a coupon? <a href="#" class="showcoupon">Click here to enter your code</a>	</div>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="">

	<p>If you have a coupon code, please apply it below.</p>

	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="">
	</p>

	<p class="form-row form-row-last">
		<button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
	</p>

	<div class="clear"></div>
</form>

@stop
@section('javascript')
    <script>
    </script>

@stop

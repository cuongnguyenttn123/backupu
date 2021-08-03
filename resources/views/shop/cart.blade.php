@extends('Layout.page1')

@section('lib')

@stop

@section('style-css')
<link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">

@stop
@section('content')
@php
@endphp

<style>
  #customers {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;border-collapse:collapse;width:300px}
  #customers td, #customers th {padding: 8px}
  #customers tr:nth-child(even){background-color: #f2f2f2; border-radius:4px;}
  #customers tr:hover {background-color: #ddd;}
  #customers th {padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #4CAF50;color: white}
</style>
{{------------------button---------}}
<style>
    .button::-moz-focus-inner{
        border: 0;
        padding: 0;
    }
    .button{
        display: inline-block;
        *display: inline;
        zoom: 1;
        padding: 6px 20px;
        margin: 0;
        cursor: pointer;
        border: 1px solid #bbb;
        overflow: visible;
        font: bold 13px arial, helvetica, sans-serif;
        text-decoration: none;
        white-space: nowrap;
        color: white;
        background-color: green;
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,1)), to(rgba(255,255,255,0)));
        background-image: -webkit-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
        background-image: -moz-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
        background-image: -ms-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
        background-image: -o-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
        background-image: linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
        -webkit-transition: background-color .2s ease-out;
        -moz-transition: background-color .2s ease-out;
        -ms-transition: background-color .2s ease-out;
        -o-transition: background-color .2s ease-out;
        transition: background-color .2s ease-out;
        background-clip: padding-box; /* Fix bleeding */
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
        -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
        box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
        text-shadow: 0 1px 0 rgba(255,255,255, .9);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .button:hover{
        background-color: #eee;
        color: #555;
    }
    .button:active{
        background: #e9e9e9;
        position: relative;
        top: 1px;
        text-shadow: none;
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
    }
    .button[disabled], .button[disabled]:hover, .button[disabled]:active{
        border-color: #eaeaea;
        background: #fafafa;
        cursor: default;
        position: static;
        color: #999;
        /* Usually, !important should be avoided but here it's really needed :) */
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        text-shadow: none !important;
    }
    /* Smaller buttons styles */
    .button.small{
        padding: 4px 12px;
    }
    /* Larger buttons styles */
    .button.large{
        padding: 12px 30px;
        text-transform: uppercase;
    }
    .button.large:active{
        top: 2px;
    }
    /* Colored buttons styles */
    .button.green, .button.red, .button.blue {
        color: #fff;
        text-shadow: 0 1px 0 rgba(0,0,0,.2);
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,.3)), to(rgba(255,255,255,0)));
        background-image: -webkit-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        background-image: -moz-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        background-image: -ms-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        background-image: -o-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
        background-image: linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    }
    /* */
    .button.green{
        background-color: #57a957;
        border-color: #57a957;
    }
    .button.green:hover{
        background-color: #62c462;
    }
    .button.green:active{
        background: #57a957;
    }
    /* */
    .button.red{
        background-color: #ca3535;
        border-color: #c43c35;
    }
    .button.red:hover{
        background-color: #ee5f5b;
    }
    .button.red:active{
        background: #c43c35;
    }
    /* */
    .button.blue{
        background-color: #269CE9;
        border-color: #269CE9;
    }
    .button.blue:hover{
        background-color: #70B9E8;
    }
    .button.blue:active{
        background: #269CE9;
    }
    /* */
    .green[disabled], .green[disabled]:hover, .green[disabled]:active{
        border-color: #57A957;
        background: #57A957;
        color: #D2FFD2;
    }
    .red[disabled], .red[disabled]:hover, .red[disabled]:active{
        border-color: #C43C35;
        background: #C43C35;
        color: #FFD3D3;
    }
    .blue[disabled], .blue[disabled]:hover, .blue[disabled]:active{
        border-color: #269CE9;
        background: #269CE9;
        color: #93D5FF;
    }
    /* Group buttons */
    .button-group,
    .button-group li{
        display: inline-block;
        *display: inline;
        zoom: 1;
    }
    .button-group{
        font-size: 0; /* Inline block elements gap - fix */
        margin: 0;
        padding: 0;
        background: rgba(0, 0, 0, .1);
        border-bottom: 1px solid rgba(0, 0, 0, .1);
        padding: 7px;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        border-radius: 7px;
    }
    .button-group li{
        margin-right: -1px; /* Overlap each right button border */
    }
    .button-group .button{
        font-size: 13px; /* Set the font size, different from inherited 0 */
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        border-radius: 0;
    }
    .button-group .button:active{
        -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
    }
    .button-group li:first-child .button{
        -moz-border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;
    }
    .button-group li:first-child .button:active{
        -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, -5px 0 5px -3px rgba(0, 0, 0, .2) inset;
    }
    .button-group li:last-child .button{
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
    }
    .button-group li:last-child .button:active{
        -moz-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
        box-shadow: 0 0 1px rgba(0, 0, 0, .2) inset, 5px 0 5px -3px rgba(0, 0, 0, .2) inset;
    }

    #total_table{width:100%}
    #total_table th, #total_table td{padding:30px 15px}
    @media (max-width:1199px) {
      .table-img{width:200px!important;height:130px!important}
    }
    @media (max-width:991px) {
      #customers thead{display:none}
      #customers tbody tr{position:relative;display:block;margin-bottom:40px;background:#f2f2f2}
      #customers tbody tr > td{display:block}
      #customers .delete_btn{position:absolute}
      #customers tbody tr > td.product_name, #customers tbody tr > td#delivery_options, #customers tbody tr > td#printing_price, #customers tbody tr > td#quantity{float:left}
      #customers tbody tr > td#price, #customers tbody tr > td#size_selection, #customers tbody tr > td#unit_total{text-align:right}
      #customers tbody tr > td#printing_price{width:100px;text-align:left}
      #customers tbody tr > td .delete_btn{position:absolute;top:0;right:0}
    }

</style>


  <div class="container mb-5">
    <div class="row">
      <div class="col">
        <table  border="0" id="customers"  class="cart_table" style = "margin:auto;">
            <thead >
                <div style = "background-color:lightblue; text-align:center">
                    <tr style = "font-color:black;">
                        <th style="text-align:center ;margin-left:10px;">Images</th>
                        <th style="text-align:center;margin-left:10px;">Product</th>
                        <th style="text-align:center;margin-left:10px;">Price</th>
                        <th style="text-align:center;margin-left:10px;">Delivery Method</th>
                        <th style="text-align:center;margin-left:10px;">Select Size</th>
                        <th style="text-align:center;margin-left:10px;">Printing Price</th>
                        <th style="text-align:center;margin-left:10px;">Quantity</th>
                        <th style="text-align:center;margin-left:10px;">Total</th>
                        <th style="text-align:center;margin-left:10px;">Delete</th>
                    </tr>
                </div>
            </thead>
            <tbody style = "text-align:center">
                @php
                $total = 0 ;
                @endphp
          
                @foreach($cart_image as $key => $value)
                <tr data-seller="{{$value->seller_email}}" data-buyer="{{$value->buyer_email}}" >
                    <td id="image_id" data-id="{{$value->img_id}}" data-imgname="{{$value->imgname}}">
                        <div class="col-12" style="padding: 10px" >
                            <div class="table-img" style="background-image: url('{{$value->url}}'); background-size: cover;   width:300px;height: 200px; margin: auto;margin-top:5px;">
                            </div> </div>
                            {{--<span id="img_state">Sold By:Pix Pays</span>&nbsp;&nbsp;<button style = "border-radius:5px;">ADD TO CART</button>--}}
                        </td>
                        <td class="product_name">
                            <div id="img_name">{{$value->imgname}}</div>
                        </td>
                        <td id="price" style="border-bottom: 5px solid red;">
                            ${{$value->price}}
                        </td>
                        @php
                        $total += $value->price  ;
                        @endphp

                        <td id="delivery_options">
                            <select class="c-select delivery_options_box" >
                                <option value="email" selected>Email</option>
                                <option value="digital_prints">Digital Prints</option>
                                <option value="canvas_prints">Canvas Prints</option>
                                <option value="acrylic_prints">Acrylic Prints </option>
                                <option value="metal_prints">Metal Prints </option>
                            </select>
                        </td>
                        <td id="size_selection">
                            <select class="c-select size_selection_box">
                                <option value='email' data-price='0.00' >Email</option>
                            </select>
                        </td>
                        <td id="printing_price">
                            0.00
                        </td>

                        <td id="quantity" style="vertical-align: middle;">
                            <div id="number"><input class="quantity" type="number" value="1" min="1" style="width:60px;"></div>
                        </td>
                        <td id="unit_total" style="vertical-align: middle;">
                         ${{$value->price}}</div>
                     </td>

                     <td styel = "vertical-align: middle;">
                        <button data-bid_id="{{$value->id}}" type="button" class="btn btn-small btn-danger delete_btn"> x </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>     
      </div>
    </div>
  </div>  
   
      @if(count($cart_image) < 1 )
            <div class="container" style="margin-top: 10px;">
                <h3>Your cart is empty</h3>
            </div>
        @endif


<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div style ="width:90%; min-heigt:200px;  border-radius:10px;  margin:auto;margin-bottom:20px;">
                <h4> Shipping Details</h4>
            </div>

            <form id="address_form" name="address_form" method="post">
                        <fieldset class="form-group">
                            <label for="formGroupExampleInput">Full Name</label>
                            <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Enter Full Name"> 
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="formGroupExampleInput2">Email</label>
                            <input type="text" name="email1" class="form-control" id="email" placeholder="Enter Your Email">
                         </fieldset>
                <fieldset class='form-group'>
                    <label for='formGroupExampleInput2'>Phone Number</label>        <input type='text' class='form-control' id='mobile' name='mobile' placeholder='Enter Your Mobile'>
                </fieldset>

                <div class="not-email" style="display: none;">
                    <fieldset class="form-group">
                        <label for="formGroupExampleInput2">Address line 1</label>
                        <input type="text" class="form-control"  name="address" id="address" placeholder="Enter Your Address">
                    </fieldset>
                    <fieldset class='form-group'>
                        <label for='formGroupExampleInput2'>Address line 2</label>
                        <input type='text' class='form-control' id='address2' name='address2' placeholder='Enter Your Address'>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-6">
                           <fieldset class='form-group'>
                            <label for='formGroupExampleInput2'>City</label>
                            <input type='text' class='form-control' id='city' name='city1' placeholder='Enter Your City'>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class='form-group'>
                            <label for='formGroupExampleInput2'>State/Provice</label>
                            <input type='text' class='form-control' id='state' name='state' placeholder='Enter State/Province'>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset class='form-group'>
                            <label for='formGroupExampleInput2'>ZIP</label>
                            <input type='text' class='form-control' id='zip' name='zip' placeholder='Enter Your Zipcode'>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class='form-group'>
                         <label for='formGroupExampleInput2'>Country/Region</label>
                         <input type='text' class='form-control' id='country' name='country1' placeholder='Enter Your Country '>
                     </fieldset>
                 </div>
             </div>
             <fieldset class='form-group'>
                <label for=''>Special Instructions</label>
                <textarea class="form-control" name="instructions"></textarea>
            </fieldset>
        </div>

        </form>
        <div class="row">
          <div class="col-12 text-center mb-4 "> 
            <button  id="pay_with_paypal" class="button mb-10" style = "width:200px;height:30px; ">Pay with Paypal</button>
          </div>
        </div>
    </div>
    <div class="col-md-6">
        <div style = "width:90%; min-heigt:200px;  border-radius:10px;  margin:auto;margin-bottom:20px;">
          <h4> Cart totals</h4>
        </div>

         <div style = "min-heigt:200px;  border-radius:10px;margin:auto;margin-bottom:20px;">
            <!--<p>Cart totals</p>-->
            <table  border = "0" id="total_table"  class="cart_table" style = "margin:auto; margin-bottom:33px;">
                <tr>
                    <th style="background-color: #1d5d563d; text-align:center;">Subtotal</th>
                    <td id="subtotal" style="background-color: #b5d2cf3d;">${{$total}}.00</td>
                </tr>
                <tr>
                    <th style="background-color: #1d5d563d; text-align:center;">Shipping</th>
                    <td style="background-color: #b5d2cf3d;">Enter your address to view shipping options.<br>Calculate shipping</td>   
                </tr>
                <tr>
                    <th style="background-color: #1d5d563d; text-align:center;">Total</th>
                    <td id="grand_total" style="background-color: #b5d2cf3d;">${{$total}}.00</td>
                </tr>
            </table>
        </div>
        <div class="row">
          <div class="col-12 text-center mb-4 ">  
            <button  id="pay_with_wallet" class="button mb-10" style = "width:200px;height:30px; ">Pay Through Wallet</button>
          </div>  
        </div>  
    </div>


    

<div class = "col-lg-6 text-center ">
    
    </div> 
<!-- <div class = "col-lg-4 text-center ">
    <button  id="pay_with_stripe" class="button mb-10" style = "width:200px;height:30px; ">Pay with Stripe</button>
</div> -->

</div><!-- row -->
</div><!-- container -->
@stop

@section('javascript')
<script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
  
<script>

    var is_email_delivery  = true;

    $(document).ready(function(){

        $('.size_selection_box').on('change',function(){
            $(this).closest('tr').find('td#quantity .quantity').trigger("change");
        });


        $('.delivery_options_box').on('change',function(){
            var delivery_options_box =  $(this).find('option:selected').val();
            if(delivery_options_box == "digital_prints" ){
                options+= "<option value='4x6' data-price='0.39' >4x6</option><option value='5x7' data-price='0.79' >5x7</option><option value='8x8' data-price='2.19' >8x8</option><option value='16x20' data-price='8.99' >16x20</option><option value='20x30' data-price='11.99' >20x30</option><option value='20x60' data-price='20.99' >20x60</option>";
                $(this).closest('tr').find('td#size_selection select.size_selection_box').html(options);
            }
            if(delivery_options_box == "canvas_prints" ){
             var options = "<option value='12x16' data-price='30.99' >12x16</option><option value='14x14' data-price='31.99' >14x14</option><option value='16x20' data-price='40.99' >16x20</option><option value='20x30' data-price='60.99' >20x30</option><option value='30x40' data-price='149.99' >30x40</option><option value='40x60' data-price='299.99' >40x60</option>";
             $(this).closest('tr').find('td#size_selection select.size_selection_box').html(options);
         }
         if(delivery_options_box == "acrylic_prints" ){
            var options = "<option value='11x14' data-price='46.99' >11x14</option><option value='12x12' data-price='47.99' >12x12</option><option value='16x20' data-price='82.99' >16x20</option><option value='20x30' data-price='199.99' >20x30</option><option value='24x36' data-price='179.99' >24x36</option>";
            $(this).closest('tr').find('td#size_selection select.size_selection_box').html(options);
        }
        if(delivery_options_box == "metal_prints" ){
            var options= "<option value='11x14' data-price='36.99' >11x14</option><option value='12x12' data-price='37.99' >12x12</option><option value='16x20' data-price='59.99' >16x20</option><option value='20x30' data-price='99.99' >20x30</option><option value='24x36' data-price='129.99' >24x36</option>";
            $(this).closest('tr').find('td#size_selection select.size_selection_box').html(options);
        }
        if(delivery_options_box == "email"){
            $(this).closest('tr').find('td#size_selection select.size_selection_box')
            .html("<option value='email' data-price='0.00' >Email</option>")
        }

        $(this).closest('tr').find('td#quantity .quantity').trigger("change");
    });

        var final_cart = [];
        $(document).on('change','.quantity',function(){
            var  quantity =  parseInt($(this).val());
            var price  = $(this).closest('tr').find('td#price').text();
            price = price.replace('$','');
            price     = parseFloat(price);
            var unit_total = quantity * price;
            var price_including_printing = parseFloat($(this).closest('tr').find('td#size_selection .size_selection_box option:selected').data('price'));
            price_including_printing = price_including_printing.toFixed(2);
                    // alert(price_including_printing);
                    $(this).closest('tr').find('td#printing_price').text(price_including_printing);
                    price_including_printing = price_including_printing * quantity;
                    unit_total += price_including_printing;
                    unit_total = unit_total.toFixed(2);
                    $(this).closest('tr').find('td#unit_total').text('$'+unit_total) ;
                    calculate_sub_total();
                });


        function  calculate_sub_total(){
            var sub_total = 0;
            var delivery_charges = false;
            $('table#customers tbody tr').each(function(){
                var img_id = $(this).find('td#image_id').data('id');
                var net_price  = $(this).find('td#unit_total').text();
                var delivery_charges_check  = $(this).find('td#delivery_options .delivery_options_box option:selected').val();
                if(delivery_charges_check != "email"){
                    delivery_charges = true;
                }
                net_price = net_price.replace('$','');
                sub_total += parseFloat(net_price);

            });
            $('#total_table td#subtotal' ).text('$'+sub_total.toFixed(2));
            if(delivery_charges){
                var new_sub_total= sub_total + 5;
                $('#total_table td#grand_total' ).text('$'+new_sub_total.toFixed(2));
                $('.not-email').show();
                is_email_delivery  = false;
            }
            else{
                $('#total_table td#grand_total' ).text('$'+sub_total.toFixed(2));
                $('.not-email').hide();
                is_email_delivery  = true;
            }
            make_cart_items();
        }


        function make_cart_items(){
            final_cart = [];
            $('table#customers tbody tr').each(function(){
                var   cart_item           = {};
                cart_item.seller_email    = $(this).closest('tr').data('seller');
                cart_item.product_name    = $(this).closest('tr').find('td.product_name #img_name').html();
                cart_item.buyer_email    = $(this).closest('tr').data('buyer');
                cart_item.img_id          = parseInt($(this).find('td#image_id').data('id'));
                cart_item.imgname         = $(this).find('td#image_id').data('imgname');
                cart_item.quantity        = parseInt($(this).find('td#quantity input.quantity').val());
                cart_item.delivery_method = $(this).find('td#delivery_options .delivery_options_box option:selected').val();
                cart_item.selected_size   = $(this).find('td#size_selection .size_selection_box option:selected').val();
                cart_item.printing_price  = parseFloat($(this).find('td#printing_price').text());
                var price           = $(this).closest('tr').find('td#price').text();
                cart_item.price           = parseFloat(price.replace('$',''));
                var net_price_cart        = $(this).find('td#unit_total').text();
                net_price_cart            = parseFloat(net_price_cart.replace('$',''));
                cart_item.net_price       = net_price_cart;
                final_cart.push(cart_item);
            });
        }
        $('.delete_btn').click(function (){
            var bid_id  =   $(this).data('bid_id');
            $('#preloader').css('display','block');
            $.ajax({
                url: "{{url('/delete_cart_item')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'bid_id':bid_id},
                    method: 'post',
                    success: function(result){
                        $('#preloader').css('display','none');

                    }
                });

            $(this).closest('tr').remove();
            calculate_sub_total();
        });

        $('#pay_with_paypal').click(function(){
            var test_validation = validate_form();
            if(test_validation == false){
                swal("Fill Required Fields", "Please Fill the Required Address Fields", "error");
                return false;
            }
            make_cart_items();
            var grand_total  = $('#total_table td#grand_total').text();
            grand_total = grand_total.replace('$','');
            grand_total = parseFloat(grand_total);
            var address_form =  {} ;
            address_form.first_name = $("input[name='first_name']").val();
            address_form.address2  = $("input[name='address2']").val();
            address_form.email      = $("input[name='email1']").val();
            address_form.country    = $("input[name='country']").val();
            address_form.city       = $("input[name='city']").val();
            address_form.address    = $("input[name='address']").val();
            address_form.mobile     = $("input[name='mobile']").val();
            address_form.state       = $("input[name='state']").val();
            address_form.zip       = $("input[name='zip']").val();
            address_form.instructions     = $("[name='instructions']").val();
            $('.divpreloader').show();
            $.ajax({
                url: "{{url('/pay_with_paypal_2')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'cart':JSON.stringify(final_cart),
                    'address_form' :JSON.stringify(address_form),
                    'total_amount':grand_total
                },
                method: 'post',
                success: function(data, textStatus, jqXHR){
                    console.log(jqXHR.status);
                    if(data == "no_item"){
                        swal("Empty Cart", "Your Cart is Empty", "error");

                    }

                    if(data == true){
                    window.location.href= '{{url('payment-test')}}';
                    }
                            }
                        }).done(function() {
                             $('.divpreloader').hide();;
                            });
            });

        $('#pay_with_stripe').click(function(){
            var test_validation = validate_form();
            if(test_validation == false){
                swal("Fill Required Fields", "Please Fill the Required Address Fields", "error");
                return false;
            }
            make_cart_items();
            var grand_total  = $('#total_table td#grand_total').text();
            grand_total = grand_total.replace('$','');
            grand_total = parseFloat(grand_total);
            var address_form =  {} ;

            address_form.method     = $("input[name='method']:checked").val();
            address_form.first_name = $("input[name='first_name']").val();
            address_form.address2  = $("input[name='address2']").val();
            address_form.email      = $("input[name='email1']").val();
            address_form.country    = $("input[name='country']").val();
            address_form.city       = $("input[name='city']").val();
            address_form.address    = $("input[name='address']").val();
            address_form.mobile     = $("input[name='mobile']").val();
                        address_form.state       = $("input[name='state']").val();
            address_form.zip       = $("input[name='zip']").val();
            address_form.instructions     = $("[name='instructions']").val();
            $.ajax({
                url: "{{url('/pay_with_paypal_2')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'cart':JSON.stringify(final_cart),
                    'address_form' :JSON.stringify(address_form),
                    'total_amount':grand_total
                },
                method: 'post',
                success: function(data, textStatus, jqXHR){
                    console.log(jqXHR.status);
                    if(data == "no_item"){
                        swal("Empty Cart", "Your Cart is Empty", "error");
                    }
                    if(data==true){
                    window.location.href= '{{url('pay_with_stripe')}}';
                    }
                            }
                        });
            });

        $('#pay_with_wallet').click(function(){
            var test_validation = validate_form();
            if(test_validation == false){
                swal("Fill Required Fields", "Please Fill the Required Address Fields", "error");
                return false;
            }
            make_cart_items();
            var grand_total  = $('#total_table td#grand_total').text();
            grand_total = grand_total.replace('$','');
            grand_total = parseFloat(grand_total);
            var address_form =  {} ;

            address_form.method     = $("input[name='method']:checked").val();
            address_form.first_name = $("input[name='first_name']").val();
            address_form.address    = $("input[name='address']").val();
            address_form.address2  = $("input[name='address2']").val();
            address_form.email      = $("input[name='email1']").val();
            address_form.country    = $("input[name='country1']").val();
            address_form.city       = $("input[name='city']").val();
            address_form.state       = $("input[name='state']").val();
            address_form.zip       = $("input[name='zip']").val();
            address_form.instructions     = $("[name='instructions']").val();
            address_form.mobile     = $("input[name='mobile']").val();
            $('.divpreloader').show();
            $.ajax({
                url: "{{url('/pay_through_wallet')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    'cart':JSON.stringify(final_cart),
                    'address_form' :JSON.stringify(address_form),
                    'total_amount':grand_total,
                    'uid':{{$uid}}
                },
                method: 'post',
                success: function(data, textStatus, jqXHR){
                    if(data == "less_balance"){
                       swal("Sorry", "Not Enogh Balance", "error");
                    }
                    if(data == "no_item"){
                        swal("Empty Cart", "Your Cart is Empty", "error");
                    }
                    if(data == "success"){
                       // swal("Congrats!", "Amount deducted from wallet", "success");
                        window.location = '{{url('/order-complete')}}';
                    }
                            }
                        }).done(function() {
                             $('.divpreloader').hide();;
                            });;
            });


function validate_form(){
    var validation_checker;
    if(is_email_delivery){
            if($("input[name='first_name']").val() ==""){
                $("input[name='first_name']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='first_name']").css('borderColor','black');
                validation_checker = true;
            }

             if($("input[name='email1']").val() == ''){
                $("input[name='email1']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='email1']").css('borderColor','black');
                validation_checker = true;
            }
             if($("input[name='mobile']").val() == ""){
                $("input[name='mobile']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='mobile']").css('borderColor','black')
                validation_checker = true;
            }
                 return validation_checker;
    }
    else
    {
            if($("input[name='first_name']").val() ==""){
                $("input[name='first_name']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='first_name']").css('borderColor','black');
                validation_checker = true;
            }
            // if($("input[name='address2']").val() ==""){
            //     $("input[name='address2']").css('borderColor','red');
            //     validation_checker = false;
            // }else{
            //     $("input[name='address2']").css('borderColor','black');
            //     validation_checker = true;
            // }
            if($("input[name='email1']").val() == ''){
                $("input[name='email1']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='email1']").css('borderColor','black');
                validation_checker = true;
            }
            if($("input[name='country1']").val() ==""){
                $("input[name='country1']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='country1']").css('borderColor','black');
                validation_checker = true;
            }
            if($("input[name='city1']").val() ==""){
                $("input[name='city1']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='city1']").css('borderColor','black');
                validation_checker = true;
            }
            if($("input[name='address']").val() ==""){
                $("input[name='address']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='address']").css('borderColor','black');
                validation_checker = true;
            }
            if($("input[name='mobile']").val() == ""){
                $("input[name='mobile']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='mobile']").css('borderColor','black')
                validation_checker = true;
            }


            if($("input[name='zip']").val() == ""){
                $("input[name='zip']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='zip']").css('borderColor','black')
                validation_checker = true;
            }

            if($("input[name='state']").val() == ""){
                $("input[name='state']").css('borderColor','red');
                validation_checker = false;
            }else{
                $("input[name='state']").css('borderColor','black')
                validation_checker = true;
            }


            return validation_checker;

        }

}

             });//documentready
         </script>

         @stop
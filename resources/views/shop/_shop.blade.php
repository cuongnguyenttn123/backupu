@extends('Layout.page1')

@section('lib')

@stop

@section('style-css')


@stop
@section('content')
    @php
            @endphp

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
}
#customers td, #customers th {
 
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2; border-radius:4px;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
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
        #total_table th, #total_table td{padding:30px 15px;}
    </style>

<div style="width:70%;margin:auto;min-height: 600px;margin-bottom: 20px;font-family: Roboto Slab, Arial, Helvetica, sans-serif;
    font-size: 0.857em;
    font-weight: 500;padding: 15px 10px;
    text-align: center;
    text-transform: uppercase;
    vertical-align: middle;
    white-space: nowrap;">
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
             <tr>
                <td id="image_id" data-id="{{$value->img_id}}" data-imgname="{{$value->imgname}}">
                    <div class="col-12" style="padding: 10px" >
                        <div style="background-image: url('{{$value->url}}'); background-size: contain;background-repeat:no-repeat;background-position:center; width:300px;height: 200px; margin: auto;margin-top:5px;">
                        </div> </div>
                    {{--<span id="img_state">Sold By:Pix Pays</span>&nbsp;&nbsp;<button style = "border-radius:5px;">ADD TO CART</button>--}}
                </td>
                <td styel = "border-bottom: 5px solid red;">
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

<div class="container">
    <div class="row">
    <div class="col-md-6">

        <div style ="width:90%; min-heigt:200px;  border-radius:10px;  margin:auto;margin-bottom:20px;">
        <h4> Shipping Details</h4>
        </div>

<form id="address_form" name="address_form" method="post">
    <fieldset class="form-group">
        <label>
                <input style="width: 20px; height: 20px" checked="" id="email_shipping"  type="radio" name="method" value="email"> Email Shipping
                <input style="width: 20px; height: 20px" id="address_shipping" type="radio"  name="method" value="shipping"> Address Shipping
        </label>

                </fieldset>
                <fieldset class="form-group">
                    <label for="formGroupExampleInput">First Name</label>
                    <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="Enter First Name">
                </fieldset>
                <fieldset class="form-group">
                    <label for="formGroupExampleInput2">Last Name</label>
                    <input type="text" class="form-control"  name="last_name" id="last_name" placeholder="Enter Last Name">
                </fieldset>
                <fieldset class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                </fieldset>
            <div class="custom_shipping_fields">
            </div>

</form>


    </div>
    <div class="col-md-6">


<div style = "width:90%; min-heigt:200px;  border-radius:10px;  margin:auto;margin-bottom:20px;">
   <h4> Cart totals</h4>
</div>

        <div style = "min-heigt:200px;  border-radius:10px;margin:auto;margin-bottom:20px;">
    <!--<p>Cart totals</p>-->
     <table  border = "0" id="total_table"  class="cart_table" style = "margin:auto; margin-bottom:33px;">
        <tr>
            <th style="background-color: #1d5d563d; text-align:center;">SUBTOTAL</th>
            <td id="subtotal" style="background-color: #b5d2cf3d;">${{$total}}.00</td>
        </tr>
        <tr>
            <th style="background-color: #1d5d563d; text-align:center;">SHIPPING</th>
            <td style="background-color: #b5d2cf3d;">Enter your address to view shipping options.<br>Calculate shipping</td>   
        </tr>
        <tr>
            <th style="background-color: #1d5d563d; text-align:center;">TATAL</th>
            <td id="grand_total" style="background-color: #b5d2cf3d;">${{$total}}.00</td>
        </tr>
    </table>
</div>


    </div>

<div class = "col-lg-6 text-center mb-4 ">
            <button  id="pay_with_paypal" class="button mb-10" style = "width:200px;height:30px; ">Pay with Paypal</button>
        </div>
        <div class = "col-lg-6 text-center ">
            <a href="{{url('/payment')}}"><button  class="button mb-10" style = "width:200px;;height:30px;">Pay with Strip</button></a>
       </div>
            </div>
</div><!-- row -->
</div><!-- container -->
@stop
@section('javascript')

    <script>

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
                $('table#customers tbody tr').each(function(){
                    var img_id = $(this).find('td#image_id').data('id');
                    var net_price  = $(this).find('td#unit_total').text();
                    net_price = net_price.replace('$','');
                    sub_total += parseInt(net_price);

                });
                $('#total_table td#subtotal' ).text('$'+sub_total + '.00');
                    if($('#address_shipping').is(':checked')){
                    var new_sub_total= sub_total + 5;
                      $('#total_table td#grand_total' ).text('$'+new_sub_total + '.00');
                    }
                    else{
                        $('#total_table td#grand_total' ).text('$'+sub_total + '.00');
                    }
                    make_cart_items();
            }


            function make_cart_items(){
                final_cart = [];
                 $('table#customers tbody tr').each(function(){
                    var img_id_cart    = parseInt($(this).find('td#image_id').data('id'));
                    var imgname_cart  = $(this).find('td#image_id').data('imgname');
                    var quantity_cart =  parseInt($(this).find('td#quantity input.quantity').val());
                    var price_cart     = $(this).closest('tr').find('td#price').text();
                    price_cart         = parseInt(price_cart.replace('$',''));
                    var net_price_cart = $(this).find('td#unit_total').text();
                    net_price_cart     = parseInt(net_price_cart.replace('$',''));
                    var   cart_item = {};
                    cart_item.img_id    = img_id_cart;
                    cart_item.imgname   = imgname_cart;
                    cart_item.quantity  = quantity_cart;
                    cart_item.price     = price_cart;
                    cart_item.net_price = net_price_cart;
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

                $("#email_shipping").on('click',function(){
                   $('.custom_shipping_fields').html("");
                   calculate_sub_total();
                });
                $("#address_shipping").on('click',function(){
                   $('.custom_shipping_fields').html("<fieldset class='form-group'>        <label for='formGroupExampleInput2'>Country</label>        <input type='text' class='form-control' id='country' name='country' placeholder='Enter Your Country '>    </fieldset>     <fieldset class='form-group'>        <label for='formGroupExampleInput2'>City</label>        <input type='text' class='form-control' id='city' name='city' placeholder='Enter City'>    </fieldset>     <fieldset class='form-group'>        <label for='formGroupExampleInput2'>Address</label>        <input type='text' class='form-control' id='address' name='address' placeholder='Enter Address'>    </fieldset>    <fieldset class='form-group'>        <label for='formGroupExampleInput2'>Mobile</label>        <input type='text' class='form-control' id='mobile' name='mobile' placeholder='Enter Mobile'>    </fieldset>");
                   calculate_sub_total();
                });

$('#pay_with_paypal').click(function(){

make_cart_items();
var grand_total  = $('#total_table td#grand_total').text();
grand_total = grand_total.replace('$','');
grand_total = parseInt(grand_total);
var address_form =  {} ;

address_form.method     = $("input[name='method']:checked").val();
address_form.first_name = $("input[name='first_name']").val();
address_form.last_name  = $("input[name='last_name']").val();
address_form.email      = $("input[name='email']").val();
address_form.country    = $("input[name='country']").val();
address_form.city       = $("input[name='city']").val();
address_form.address    = $("input[name='address']").val();
address_form.mobile     = $("input[name='mobile']").val();
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
                            window.location.href= '{{url('payment-test')}}';
                                // window.loaction = '{{url('payment-test')}}';
                            

                        }
                    });









// window.location ='{{url('payment-test?amount=')}}'+grand_total;


});



             });//documentready
    </script>

@stop
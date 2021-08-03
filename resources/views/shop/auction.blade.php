
<html>
<head>
    @include('Layout/head')
</head>
<body style = "padding: 0;    margin: 0;    background-color: #F48120; height:100%;">
<header>
    @include('Layout.smenu')
<style>

    .input-group-addon, .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group-addon, .input-group-btn, .input-group .form-control {
    display: table-cell;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
   
    margin-bottom: 0;
}

.input-group-addon:first-child {
    border-right: 0;
}
.aboutusbk{
            height:700px;
           background-image: url(https://gurushots.com/assets/images/pages/about/cover.jpg);
               background-position: center center;
               background-size: cover;
        }
.input-lg, .form-group-lg .form-control {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.33;
    border-radius: 6px;
}
@media only screen and (max-width: 573px) {
 
   #ending_counter2{
      font-size: 15px; margin-left: 29%;color: #000; position:absolute; top: 28%; z-index: 100;
  }
   #ending_counter1{
       font-size: 15px; margin-left: 29%;color: #000; position:absolute; top: 40%; z-index: 100;
   }
   
}
 
    </style>
    <div class = "container" style = "background-color: #ffffff;margin-top:120px;    margin-bottom: 0px;">
        <div>
            <div id = "auction" style = "      margin: auto;    min-height: 580px;    margin-bottom: 100px; background-color:white;    margin-bottom: 0px;">
                    <div class = "row"  style = "">
                    <div class = "col-sm-4" style = "    margin-top: 50px;     margin-bottom: 50px;">
                        <div style = "border-radius: 25px;  border: 2px solid #73AD21;  padding: 20px;      height: 700px; margin:auto ">
                            <h1 style="text-align:center;border-bottom: 1px solid #ccc;padding-bottom: 10px;font-size: 22px;margin-top:25px;"> Auction </h1> 
                            <div style="margin-top:30px;">
                               <div style = "border: 4px solid #0491ba;  padding: 20px;   width: 170px;  height: 170px; margin:auto; border-radius:50%;"> 
                            
                         <form method="post" action="{{url("savebid")}}" enctype="multipart/form-data" style="">
                            @csrf                             
                            <div id="ending_counter1" style = "font-size: 15px; margin-left: -5%;color: #000; position:absolute; top: 21%; z-index: 100;">
                                <div style = "text-align:center;font-weight:bolder;">Min Price<br>
                                <span style="color:blue;">$0.99</span></div>
                            </div>
                            <div id="ending_counter2" style = "font-size: 15px; margin-left: -3.5%;color: #000; position:absolute; top: 31%; z-index: 100;">
                                <div style = "text-align:center;font-weight:bolder;">Top bid<br>
                                <span style = "color:#F48120; font-size:17px;"><b>${{$top}}</b></span></div>
                            </div>
                            </div>
                            </div>
                            
                            <div style ="margin-top: 50px;">
                                <p style="text-align:center;font-size: 20px;"><strong>Bid now!</strong></p>
                                <div class="input-group" style =" position: relative;display: table;border-collapse: separate;margin-top:0px;" >
                                    
                                    <div class="input-group-addon" style = "padding: 6px 12px;font-size: 14px;font-weight: normal; line-height: 1; color: #555; text-align: center; background-color: #eee; border: 1px solid #ccc; border-radius: 4px 0px 0px 4px; "> $                    </div>
                                    <input type="text" name="uid" style="display:none;" value="{{$uid}}"></input>   
                                     <input type="text" name="seller_id" style="display:none;" value="{{$seller_id}}"></input>
                                    <input type="text" name="iid" style="display:none;" value="{{$img_id}}"></input>
                                    <input type="number" name="bid-amount" class="form-control input-lg" placeholder="Enter your price" id="bidAmount" style = "position: relative;height: 48px; z-index: 2;float: left;width: 100%;margin-bottom: 0;">
                                     
                                    <span class="input-group-btn"><button id="bid_me" type="submit" class="btn btn-success btn-block btn-lg" style = "border-radius: 0px 4px 4px 0px;">Bid <span id="max-bid-text"></span></button></span> 
                                </div>
                            </div>
                           </form>
                           <div style="width:100%;height:200px;margin-top:20px;">
                               <strong>How does it work?<br></strong>
                               You can place a bid of any amount on the item of your choosing. For instance, if the item bidding price starts at $0.99, but it worth $15 to you, you may enter the amount as your bid. Seller has the option of accepting or rejecting your bid after it is placed. There will be an additional approval process by the urpixpays admin after seller’s approval.
                           </div>
                            
                        </div>
                    </div>    
                    <div class = "col-sm-8" style = "margin-top: 50px;">
                        <!--<span style = "margin-left:40px;">Bag</span><br>-->
                        <!--<div style = "border-radius: 25px;  border: 2px solid #73AD21;  padding: 20px;   width: 90%;  height: 570px;margin:auto;background-image:url({{asset('img/mikey.jpg')}}); background-size:cover;     border-radius: 25px;  ">-->
                        <div style = "width:100%;height: 500px;background:url({{$img_url}});background-size:contain;background-position:center;background-repeat:no-repeat; border-radius: 25px;">
                        </div>
                        <!--<img src = "{{$img_url}}" style = "width:100%;  height: 500px;overflow: hidden;display:block;  border-radius: 25px;">    -->
                        <div style="height:180px;width:100%;border: 1px solid #ccc;margin-top:20px;border-radius:20px;padding-left:20px;padding-top:20px;">
                            <span style = " border-radius: 5px; border-radius: 4px 0px 0px 4px;font-size:14px;font-weight:bolder;">Description:</span><br>
                            <span style = " border-radius: 5px; border-radius: 4px 0px 0px 4px;font-size:14px;">Image Name: <strong>{{$img_name}}</strong></span><br>
                            <span style = "border-radius: 5px; border-radius: 4px 0px 0px 4px;font-size:14px;">Minimum Price: <strong>$0.99</strong></span><br>
                            <span style = "border-radius: 5px; border-radius: 4px 0px 0px 4px;font-size:14px;">Seller Name: <strong>{{$u_name}}</strong> </span><br>                                                 
                            <span style = "border-radius: 5px; border-radius: 4px 0px 0px 4px;font-size:14px;">Create Date: <strong>{{$img_date}}</strong> </span><br>                             
                        </div>
                    </div>
    </div>
            </div> 
        </div>
    </div>
    
     
 
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>
<style>
    .vc_single_image-img{
        margin-top: 10px;
        margin-bottom: 30px;
    }
    .backgroundimage h3,h5{
        color: white;
        line-height: 35px;

    }

    section{
        min-height: 500px;

    }
    .contentcenter{
        text-align: center
    }
    .paddingtop-50{
        padding-top: 50px;
    }
    .backgroundimage{
        padding-top: 150px;
        background-image: url(http://ajronitesting.com/PixPays/wp-content/uploads/2018/10/homepic.jpg?id=33) !important;
        height:577px;
    }
    .backgroundimage_left{

        background-image: url(http://ajronitesting.com/PixPays/wp-content/uploads/2018/10/bganother.png?id=39) !important;

    }
    .backgroundimage_right{

        background-image: url(http://ajronitesting.com/PixPays/wp-content/uploads/2018/10/bgtoanother.png?id=40) !important;

    }

    .backgroundimage_bottom{
        height: 484px;


        background-image: url(http://ajronitesting.com/PixPays/wp-content/uploads/2018/10/talents.jpg?id=47) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;

    }
    .vc_custom_1539283329338 {
        background-image: url(http://ajronitesting.com/PixPays/wp-content/uploads/2018/10/talents.png) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        height: 500px;
        width: 400px;
        background-size: 300px 400px !important;
        right: 0%;
        line-height: 10px;
        position: absolute;
        padding-top: 200px;
    }

   </style>
   <script>
       document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);
   </script>

        <html>
        <head>
            @include('Layout/head')
        </head>
        <body>
        <header>
        @if(Session::get('login_flag') != 'login')
            @include('Layout.gmenu')
         @else
            @include('Layout.smenu')
        @endif
          <style>

            .padding_zero{
              padding: 0px;
            }
            .text_section{
              position: absolute;
              top: 20%;
              width: 100%;
            }
            .info_page{width:100%;height:auto}
            /*.info-cn{background-color:#FBB03B}*/
            #section-41{background-color:#4b4b4b}
            #section-42{background-color:#fbb03b}
            #section-51:after{content:''}
            #section-44, #section-49, #section-54{padding-top:50px;padding-bottom:50px}
            #section-45{padding-top:50px}
            #section-52{padding-top:20px}
            #section-50{padding:50px 0}
            .section-heading{font-size:5rem;text-align:center;margin-top: 30px; color: white}
            .section-heading span{border: 6px solid white;border-radius: 60px;padding: 0px 33px;}
            .section-text{font-size:2rem;text-align:center;font-weight:600;padding:20px 15px;margin-bottom:0;color:#001111}
            .text-cn{background:#fff}
            #section-51{position:relative}
            #section-51:before{content:'';position:absolute;right:0;top:0;width:54%;background:#4c4c4c;height:100%}
            #section-51 .info_page{margin-top:-1px}
            .en-left-to-right {
                float: right !important;
                right: 0 !important;
                position: absolute !important;
            }
            .info_image{
              padding-top: 280px !important;
              padding-bottom: 280px !important;
              background-position: center !important;
              background-repeat: no-repeat !important;
              background-size: cover !important;
            }
            .mobile_view{
              display: none;
            }
            .desktop_view{
                display: block;
                width: 70%;
                margin: 90px auto;
                background: #52bde1;
                padding: 1px 8%;
                text-align: center;
            }
            .desktop_view h1{
                font-size: 8rem;
                font-family: cursive;
                color: #de9a00;
                text-align: center;
                margin-bottom: 50px;
            }
            img.info_page {
                border: 20px solid white;
                padding: 80px 20px;
            }
            .backgroundimage {
                margin-top: -10px;
                padding-top: 130px;
                background-image: url(https://urpixpays.com/public/images/membership.jpg) !important;
                height: 400px;
                background-position: 50% 32%;
                width: 100%;
                background-size: cover;
            }
            .p-invite-page__cover__text {
                position: relative;
                width: 100%;
                max-width: 1600px;
                margin: auto;
                text-align: center;
                color: #fff;
                text-shadow: 0 2px 8px rgba(0,0,0,0.33);
                font-size: 40px;
                line-height: 1.1;
            }
            #text-box {
                font-size: 7rem;
                width: 68%;
                color: white;
                list-style-type: none;
                text-align: center;
                font-family: arial;
                /* text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff; */
                margin-left: 10%;
            }
            #text-box h1{
                font-size: 7rem;
            }
            .action-button
            {
                position: relative;
                padding: 10px 40px;
              margin: 0px 10px 10px 0px;
              float: left;
                border-radius: 10px;
                font-family: 'Pacifico', cursive;
                font-size: 25px;
                color: #FFF;
                text-decoration: none;  
            }
            .blue
            {
                background-color: #3498DB;
                border-bottom: 5px solid #2980B9;
                text-shadow: 0px -2px #2980B9;
            }
            .brk-btn {
              position: relative;
              background: none;
              color: white;
              text-transform: uppercase;
              text-decoration: none;
              border: 0.2em solid #de9a00;
              padding: 0.5em 1em;
              margin: 0 auto;
            }
            .brk-btn::before {
                content: "";
                display: block;
                position: absolute;
                width: 10%;
                background: #52bde1;
                height: 0.3em;
                right: 20%;
                top: -0.21em;
                transform: skewX(-45deg);
                -webkit-transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
                transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
              }
            .brk-btn::after {
                content: "";
                display: block;
                position: absolute;
                width: 10%;
                background: #52bde1;
                height: 0.3em;
                left: 20%;
                bottom: -0.25em;
                transform: skewX(45deg);
                -webkit-transition: all 0.45 cubic-bezier(0.86, 0, 0.07, 1);
                transition: all 0.45s cubic-bezier(0.86, 0, 0.07, 1);
              }
                .brk-btn:hover::before {
                  right: 80%;
                }
                .brk-btn:hover::after {
                  left: 80%;
                }
            @media only screen and (max-width: 959px){
              .en-left-to-right {
                  float: none !important;
                  right: auto !important;
                  position: relative !important;
              }
            }
            @media (max-width:767px) {
              .info-cn{margin-top:21px}
              .section-text{font-size:14px;padding:15px}
            }
            @media (max-width:767px) {
              .mobile_view{
                display: block;
              }
              .desktop_view{
                display: none;
              }
            }
          </style>
        </header>
        <div class="info-cn desktop_view">
                      
            <h1>SUPPER 9</h1>
            <a href="https://urpixpays.com/super9" class="brk-btn">JOIN NOW</a>
            <div class="row" style="margin: 100px 0px;">           
                <div class="col-sm-6 padding_zero">
                  <div class="text_section">
                    <h2 class="section-heading"><span>9</span></h2>
                    <p class="section-text">Flips worth $3.99</p>
                    <a href="https://urpixpays.com/super9" class="brk-btn">JOIN NOW</a>
                  </div>
                </div>   
                <div class="col-sm-6 padding_zero ">
                  <img src="https://urpixpays.com/public/images/flip_bg.gif" class="info_page"> 
                </div>  
            </div>
            <div class="row" style="margin: 100px 0px;">
              <div class="col-sm-6 padding_zero">
                <img src="https://urpixpays.com/public/images/charge_bg.gif" class="info_page"> 
              </div>    
              <div class="col-sm-6 padding_zero">
                <div class="text_section">
                  <h2 class="section-heading"><span>9</span></h2>
                    <p class="section-text">Charges worth $3.99</p>
                    <a href="https://urpixpays.com/super9" class="brk-btn">JOIN NOW</a>
                </div>
              </div>    
            </div>
            <div class="row" style="margin: 100px 0px;">           
                <div class="col-sm-6 padding_zero">
                  <div class="text_section">
                    <h2 class="section-heading"><span>9</span></h2>
                    <p class="section-text">Wands worth $3.99</p>
                    <a href="https://urpixpays.com/super9" class="brk-btn">JOIN NOW</a>
                  </div>
                </div>   
                <div class="col-sm-6 padding_zero ">
                  <img src="https://urpixpays.com/public/images/wand_bg.gif" class="info_page"> 
                </div>  
            </div>
            <div class="row" style="margin: 100px 0px;">
              <div class="col-sm-6 padding_zero">
                <img src="https://urpixpays.com/public/images/wallet_bg.png" class="info_page"> 
              </div>    
              <div class="col-sm-6 padding_zero">
                <div class="text_section">
                  <h2 class="section-heading"><span>9</span></h2>
                    <p class="section-text">Join paid challenges for free for 9 months</p>
                    <a href="https://urpixpays.com/super9" class="brk-btn">JOIN NOW</a>
                </div>
              </div>    
            </div>
            <!-- <div class="row" style="margin: 100px 0px;">           
                <div class="col-sm-6 padding_zero">
                  <div class="text_section">
                    <h2 class="section-heading"><span>9</span></h2>
                    <p class="section-text">Wands worth $3.99</p>
                  </div>
                </div>   
                <div class="col-sm-6 padding_zero ">
                  <img src="https://urpixpays.com/public/images/wand_my.gif" class="info_page"> 
                </div>  
            </div> -->
                
          
              
        </div><!--// info-cn -->
        <div class="info-cn mobile_view">
          
          
        </div><!--// info-cn -->
        <footer class="bg-dark">
            @include('Layout/footer')
        </footer>

          <script>
            $(document).ready(function(){
             $.each(function(){
              
             })
            });
          </script>
        </body>
        </html>

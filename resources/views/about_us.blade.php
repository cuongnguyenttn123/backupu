
<html>
<head>
    @include('Layout/head')
</head>
<body>
<header>
    @include('Layout.smenu')
    <style>
        .aboutusbk{
            height:auto;
            margin-top:-100px;
            background-position: center center;
            background-size: cover;
            color:white;
        }
        .aboutusbk1{
            height:auto;
            margin-top:-50px;
            background-position: center center;
            background-size: cover;
            color:white;
        }        
        .leftcontent1{
            width:50%;
            float:left;
            background-image: url(https://urpixpays.com/public/img/leftcontent1.jpg);
            background-size:cover;
            padding:50px 20px 20px 20px;
        }
        .rightcontent1{
            width:50%;
            float:left;
            background-image: url(https://urpixpays.com/public/img/rightcontent1.jpg);
            background-size:cover;
            padding:50px 20px 20px 20px;
            
        }
        .leftcontent2{
            width:50%;
            float:left;
            color:black;
            padding:30px 20px 20px 20px;
        }
        .rightcontent2{
            width:50%;
            float:left;
            color:black;
            padding:30px 20px 20px 20px;
            
        }        
        @media only screen and (max-width:620px) {
            .leftcontent1{
                width:100%;
                padding:50px 20px 20px 20px;
            }
            .rightcontent1{
                width:100%;
                padding:50px 20px 20px 20px;
                
            }
            .leftcontent2{
                width:100%;
                padding:30px 20px 20px 20px;
            }
            .rightcontent2{
                width:100%;
                padding:30px 20px 20px 20px;
                
            }             
        }        
    </style>
</header>
<div class=" ">
    <section>
       <div class="aboutusbk">
           <div class = "row">
               <div class = "leftcontent1">
                    <h1 style = "text-align:center; margin-top:10px;">WHO WE ARE</h1>
                     <p style = "width:80%; margin:auto;font-size: 24px;">
                     Urpixpays.com was born out of the passion to make photography exciting and fun while rewarding the photographer and giving them a sense of belonging. We are a group of photography enthusiast and we invest a lot of our time in the community. While we cannot support every photographer out there, we like to provide a limited financial support to photographers all around the world and a platform so they share their passion and earn a few dollars. We came together to find a solution to empower creators in a fun and safe environment. We’ve built a unique photography community that fosters collaboration and rewards creativity. 
                    </p> 
               </div>
               <div class = "rightcontent1">
                     <h1 style = "text-align:center; margin-top:10px;">WHAT WE DO</h1>
                     <p style = "width:80%; margin:auto;font-size: 24px;">
                     We have built a platform to connect millions of visual creators in a community with photography tools to help them explore and grow their craft. We give cash prizes and rewards to photographers all around the world. 
                    </p> 
               </div> 
           </div> 
        </div>
       <div class="aboutusbk1">
           <div class = "row">
               <div class = "leftcontent2">
                   <h1 style = "text-align:center; margin-top:50px;color: #218ccc;"><span>OUR MISSION</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px;">To help photographers financially all around the world by rewarding them with cash prizes.
                        To inspire and empower photographers around the world     and maximize creativity and collaboration to advance the art of photography. 

                   </p>
               </div>
               <div class = "rightcontent2">
                   <h1 style = "text-align:center; margin-top:50px;color: #218ccc;"><span>OUR SERVICES</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px;">•	Photo contests / challenges.<br>
                        •	Sales, Purchase and Print &  of pictures <br>
                        •	Payment of commission to members on any sold or purchased item.

                   </p>
               </div> 
           </div> 
        </div>
       <div class="aboutusbk2" style="background: orange;">
           <div class = "row">
               <div class = "leftcontent2">
                   <h1 style = "text-align:center; margin-top:50px; color: #218ccc;"><span>WHY CHOOSE US?</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px; color:black;">Urpixpays.com offers unique features which cannot be found on any other photography website. These include:<br>
                    •	Cash prizes for  photographers <br>
                    •	Sponsorship of members<br>
                    •	Membership benefits (This can be found on the dedicated section of our website) 
                   </p>
               </div>
               <div class = "rightcontent2">
                   <h1 style = "text-align:center; margin-top:50px; color: #218ccc;"><span>HOW WE DO IT</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px; color: #000;">Through our unique set of products, photo contests, photo challenges and portfolio websites, we give photographers around the world the best tools to be creative and showcase their art. Members upload their work and vote is carried out around the world to choose the winner. The winner gets contacted and payment of cash prize is awarded. 

                   </p>
               </div> 
           </div> 
        </div>  
       <div class="aboutusbk2">
           <div class = "row">
               <div class = "leftcontent2">
                   <h1 style = "text-align:center; margin-top:50px; color: #218ccc;"><span>OUR CORE VALUES</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px; ">Our core values which have made us the very best among every other photography and photo contest website include:<br>
                    •   Truthfulness <br>
                    •	Integrity<br>
                    •	Impartiality<br>
                    •	Honesty<br>
                    •	Service<br>
                    •	Transparency<br>
                    •	Reliability<br>
                    •	Trustworthiness<br>
                    Photography is our passion and we aim to empower a community of creative photographers worldwide. You are in a place to be inspired and receive recognition.
                   </p>
               </div>
               <div class = "rightcontent2">
                   <h1 style = "text-align:center; margin-top:50px; color: #218ccc;"><span>FEEDBACK</span></h1>
                   <p style = "width:80%; margin:auto;font-size: 24px; ">We hope you enjoy our site and we request that you send us feedback with any question/concern/comment you might have regarding the site, its content, or our company as a whole. 
                   </p>
               </div> 
           </div> 
        </div>         
    </section>
</div>
<footer class="bg-dark">
    @if(Session::get('login_flag')=='login')
    @include('Layout/footer')
    @else
    {{Session::get('login_flag')}}
    @include('Layout/footer-1')
    @endif
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

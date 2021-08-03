
<html>
<head>
    @include('Layout/head')
</head>
<body>
<header>
    @include('Layout.smenu')
    <style>
        .aboutusbk{
            max-height:1500px;
           background-image: url(https://gurushots.com/assets/images/pages/about/cover.jpg);
               background-position: center center;
               background-size: cover;
        }
    </style>
</header>
<div class=" ">
    <section>
       <div class="aboutusbk" style = "margin-top:-100px; color:white;">
           <div class = "row"  >
               <div class = "col-12">
                    <h2 style = "text-align:center; margin-top:30px;">Copyright and Rights Reserved</h2>
                     <p style = "width:90%; margin:auto;font-size: 18px;">
                     All of the information on this Site, including images, text, audio, video, and other forms of content (including the information on this disclosure page) is Copyright © urpixpays.com and may not be downloaded, reproduced, republished or otherwise copied without express written permission of the author and of Urpixpays.com.
                        The Website and all of its Content and the selection and arrangement thereof, is protected as a compilation owned by Urpixpays and Urpixpays.com under the copyright laws of the United States and other countries. Urpixpays may change the Website or delete any Content or features or services at any time, in any way, for any or no reason. Urpixpays reserves all rights not expressly granted in and to the Website and the Content.
                        If you have any complaints with respect to the infringement of your copyright, kindly contact us.
                        Where you believe that your intellectual property has been infringed upon on our website, please notify us by email. We expeditiously respond to all concerns regarding copyright infringements.
                        We request that you provide the following information along with your complaint:<br>
                        •	A physical or electronic signature of the person authorized to act on behalf of the owner of the copyrighted work for the purposes of the complaint.<br>
                        •	A proper description of the copyrighted work claimed to have been infringed.<br>
                        •	A description of the location of the infringing material on our Website.<br>
                        •	The address, telephone number or e-mail address of the complaining party.<br>
                        •	A statement made by the complaining party that he has a good-faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent or by law.<br>
                        •	A statement deposed to under oath, that the information in the notice of copyright infringement is accurate, and that the complaining party is authorized to act on behalf of the copyright owner. Please note that this procedure is exclusively for notifying Urpixpays that your copyrighted material has been infringed.<br>
                    </p> <br> <br> <br> <br>  
               </div> 
           </div> 
        </div> 
    </section>
</div>
<footer class="bg-dark">
    @if(Session::get('login_flag')=='login')
    @include('Layout/footer')
    @else
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

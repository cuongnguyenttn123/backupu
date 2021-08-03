
<html>
<head>
    @include('Layout/head')
    <link href="https://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/c/video.js"></script>
</head>
<body>
<header>
    @include('Layout.gmenu')
</header>
<div class="container-fuild">
    <section>
    <div class="background-container" style="width:100%;height:auto;">
        
        <video id="des" class="home-page__cover__video" autoplay="" loop="" playsinline="" muted="" >
        <source ng-src="{{asset('images/Urpixpays-4notext.mp4')}}" type="video/mp4" src="{{asset('images/Urpixpays-4notext.mp4')}}">
        </video>

        <img id="mobile" class="home-page__cover__video"  src="{{asset('images/mobileb.png')}}"  alt="" title="">
            
        </div>
  
        <div class="overlay-desc">
            <h1 style="">SUBMIT YOUR PHOTOS AND WIN CASH!</h1>
        </div>
        <div class="overlay-desc1">
            <h3 style="color:yellow;font-family: arial;">You will love taking photos like never before.</h3>
        </div>
        
        <div class="overlay-desc2">
			<a href='#' data-toggle="modal" data-target="#signupdlg"><button class="button button--winona button--border-thick button--round-l button--text-upper button--size-s button--text-thick" data-text="JOIN NOW!"><span style="color:white;font-size:15px;">JOIN NOW!</span></button></a>
        </div> 
 
        <div class="overlay-desc3">
            <h3 style="color:yellow;font-family: arial;">As we say “Turn your photos into cash!”</h3>
        </div>        
    </div>    
        <div class="contentcenter paddingtop-50">
 <!--<div class="flow-text"><span class="target" style="color:white; font-family: Impact;font-size:30px;letter-spacing:1px;font-weight:lighter">Submit your photos in challenges, get votes and win  <i style="color:#161e2c;text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;margin-right:5px;">CASH</i>. -->
 <!--You will love taking photos like never before!</span></div>-->
        </div>
        <div class="row paddingtop-50">
            <div class="col-md-6 contentcenter backgroundimage_left" style="height:300px;" >
                Participate in challenges. Learn from the best photographers around the world and earn money.
            </div>
            <div class="col-md-6 contentcenter backgroundimage_right" style="height:300px;" >
                It doesn’t matter whether you are a professional or amateur photographer, or just starting out. If you take good photos, then money can be on its way to your pocket.
            </div>

        </div>
        <div class="contentcenter paddingtop-50" style="font-family: 'Times New Roman', Times, serif;font-size:30px;letter-spacing:1px;font-weight:bold;">
           <p style="color:white;position:relative;top:-9px;font-style: italic;margin-bottom:0">Join challenges for free to earn cash rewards!</p>
        </div>
        <div class="contentcenter paddingtop-50 backgroundimage_bottom col-md-12">
            <div class="vc_custom_1539283329338">
                <div class="">
                    <div class="">

                        <figure class="">
                            <div class="">
                                <img class="" src="{{asset('images/pho.jpg')}}" width="47" height="54" alt="backgrounppp" title="backgrounppp"></div>
                        </figure>
                    </div>
                    </h2>
                    <div class="">
                        <div class="">
                            <h4 style="text-align: center;">BUY/SELL PHOTOS</h4>
                            <h4 style="text-align: center;">ON URPIXPAYS</h4>
                             

                        </div>
                    </div>
                </div></div>

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
    .button-container {
        display:none;!important;
    }
    .custom-button {
        display:none;!important;
    }

    .home-page__cover__video{
        position:relative;
        margin-top:20px;
        width:100%;
        height:auto;
    }
 @media screen and (min-width: 100px) {
    #des{
        display:none;
    } 
    #mobile{
        display:block;
        height:500px;
    }        
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:150px;
    }
    .overlay-desc h1{
        font-size:20px;
        letter-spacing:-1px;
        color:white;
        font-weight:400;
    }
    .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:100px;
    }
    .overlay-desc1 h3{
        font-size:18px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:0px;
    }
    .backgroundimage_left{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:100px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:80px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }      
   }            
   @media screen and (min-width: 300px) {
    #des{
        display:none;
    } 
    #mobile{
        display:block;
        height:500px;
    }    
    .row{
        margin:0;!important;
    }
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:150px;
    }
    .overlay-desc h1{
        font-size:20px;
        letter-spacing:-1px;
        color:white;
        font-weight:500;
    }
    .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:100px;
    }
    .overlay-desc1 h3{
        font-size:18px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:0px;
    }
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
    }
    .overlay-desc3 h3{
        font-size:20px;
        letter-spacing: 0px;
    }    
    .backgroundimage_left{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:100px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:80px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }      
   }        
   @media screen and (min-width: 550px) {
    #des{
        display:none;
    } 
    #mobile{
        display:block;
        height:500px;
    }        
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:200px;
    }
    .overlay-desc h1{
        font-size:28px;
        letter-spacing:-2px;
        color:white;
        font-weight:400;
    }
    .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:130px;
    }
    .overlay-desc1 h3{
        font-size:22px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:30px;
    }
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
    }
    .overlay-desc3 h3{
        font-size:25px;
        letter-spacing: 1px;
    }    
    .backgroundimage_left{
        font-size:25px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:100px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:25px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:80px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }      
   }    
   @media screen and (min-width: 768px) {
    #des{
        display:none;
    } 
    #mobile{
        display:block;
        height:500px;
    }        
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 25px;
          margin-bottom:150px;
    }
    .overlay-desc h1{
        font-size:35px;
        letter-spacing:-3px;
        color:white;
        font-weight:500;
    } 
    .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom:50px;
          font-size: 20px;
    }
    .overlay-desc1 h3{
        font-size:25px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
          margin-bottom:200px;
    }
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
    }
    .overlay-desc3 h3{
        font-size:25px;
        letter-spacing: 1px;
    }    
    .backgroundimage_left{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:100px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:80px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }      
   }
   @media screen and (min-width: 900px) {
    #des{
        display:block;
    } 
    #mobile{
        display:none;
    }       
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 30px;
          margin-bottom:0;
    }
    .overlay-desc h1{
        font-size:45px;
        letter-spacing:-2px;
        color:white;
        font-weight:650;
    } 
     .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:100px;
          font-size: 20px;
          margin-bottom:0;
    }
    .overlay-desc1 h3{
        font-size:35px;
        letter-spacing:1px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
          margin-bottom:0;
    }
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:400px;
    }
    .overlay-desc3 h3{
        font-size:30px;
        letter-spacing: 1px;
    } 
    .backgroundimage_left{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:100px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:20px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:80px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }    
   } 
    @media screen and (min-width: 1110px) {
    #des{
        display:block;
    } 
    #mobile{
        display:none;
    } 
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:550px;
    }
    .overlay-desc3 h3{
        font-size:30px;
        letter-spacing: 1px;
    }     
    .backgroundimage_left{
        font-size:23px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:90px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:23px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:60px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }     
    }     
   @media screen and (min-width: 1380px) {
    #des{
        display:block;
    } 
    #mobile{
        display:none;
    }
       
    .overlay-desc{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:;
    }
    .overlay-desc h1{
        font-size:50px;
        letter-spacing:-3px;
        color:white;
        font-weight:650;
    } 
    .overlay-desc1{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:100px;
          font-size: 9vw;
    }
    .overlay-desc1 h3{
        font-size:35px;
        letter-spacing: 1px;
    }
    .overlay-desc2{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:250px;
    }
    .overlay-desc3{
          background: rgba(0,0,0,0);
          position: absolute;
          top: 0; right: 0; bottom: 0; left: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-top:550px;
    }
    .overlay-desc3 h3{
        font-size:30px;
        letter-spacing: 1px;
    }    
    .backgroundimage_left{
        font-size:28px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:90px;
        padding-left:5%;
        padding-right:5%;
        font-weight:bold;     
    }
    .backgroundimage_right{
        font-size:28px;
        color: black;
        text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;
        padding-top:60px;
        padding-left:2%;
        padding-right:2%;        
        font-weight:bold;        
    }
   }    
    .target{
        animation: flowing 20s linear infinite;
        position: relative;
    }
    .flow-text{
        overflow: hidden;
        width: 1400px;
        margin: auto;
    }
    .flow-text:hover .target{
        animation-play-state: paused;
    }

    @keyframes flowing {
        from {left: 100%;}
        to {left: -900px;}
    }
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
        padding-top: 15px;
        background-color: #161e2c;
    }
    .backgroundimage{
        /*padding-top: 150px;*/
        /*background-image: url(https://ajronitesting.com/PixPays/wp-content/uploads/2018/10/homepic.jpg?id=33) !important;*/
        height:577px;
    }
    .backgroundimage_left{

        background-image: url({{asset('images/left.jpg')}}) !important;
        opacity:1;
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
    }
    .backgroundimage_right{
        opacity:1;
        background-size:cover;
        background-position:center;
        background-repeat:no-repeat;
        background-image: url({{asset('images/right.jpg')}}) !important;

    }

    .backgroundimage_bottom{
        height: 484px;
        background-image: url({{asset('images/bottom.jpg')}}) !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;

    }
    .vc_custom_1539283329338 {
        background-image: url({{asset('images/sells.jpg')}}) !important;
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
   <style>
@import url(https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600);
@font-face {
	font-weight: normal;
	font-style: normal;
	font-family: 'codropsicons';
	src: url("../fonts/codropsicons/codropsicons.eot");
	src: url("../fonts/codropsicons/codropsicons.eot?#iefix") format("embedded-opentype"), url("../fonts/codropsicons/codropsicons.woff") format("woff"), url("../fonts/codropsicons/codropsicons.ttf") format("truetype"), url("../fonts/codropsicons/codropsicons.svg#codropsicons") format("svg");
}
*,
*:after,
*:before {
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}
.cf:before,
.cf:after {
	content: '';
	display: table;
}
.cf:after {
	clear: both;
}
body {
	background: #cfd8dc;
	color: #37474f;
	font-weight: 400;
	font-size: 1em;
	font-family: 'Raleway', Arial, sans-serif;
}
.support {
	font-weight: bold;
	padding: 2em 0 0 0;
	font-size: 1.4em;
	color: #ee2563;
	display: none;
}
a {
	color: #7986cb;
	text-decoration: none;
	outline: none;
}
a:hover,
a:focus {
	color: #3f51b5;
}
.hidden {
	position: absolute;
	width: 0;
	height: 0;
	overflow: hidden;
	pointer-events: none;
}
.container {
	margin: 0 auto;
	text-align: center;
	overflow: hidden;
}
.content {
	padding: 2em 1em 5em;
	z-index: 1;
	max-width: 1000px;
	margin: 0 auto;
}
.content h2 {
	margin: 0 0 2em;
}
.content p {
	margin: 1em 0;
	padding: 0 0 2em;
	font-size: 0.85em;
}
.box {
	padding: 4.5em 0;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-flex-wrap: wrap;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	-webkit-justify-content: center;
	justify-content: center;
}

/* Header */
.codrops-header {
	padding: 3em 190px 4em;
	letter-spacing: -1px;
}
.codrops-header h1 {
	font-weight: 200;
	font-size: 4em;
	line-height: 1;
	margin-bottom: 0;
}
.codrops-header h1 span {
	display: block;
	font-size: 40%;
	letter-spacing: 0;
	padding: 0.5em 0 1em 0;
	color: #A8B3B8;
}

/* Top Navigation Style */
.codrops-links {
	position: relative;
	display: inline-block;
	white-space: nowrap;
	font-size: 1.25em;
	text-align: center;
}
.codrops-links::after {
	position: absolute;
	top: 0;
	left: 50%;
	width: 1px;
	height: 100%;
	background: #BFCACF;
	content: '';
	-webkit-transform: rotate3d(0, 0, 1, 22.5deg);
	transform: rotate3d(0, 0, 1, 22.5deg);
}
.codrops-icon {
	display: inline-block;
	margin: 0.5em;
	padding: 0em 0;
	width: 1.5em;
	text-decoration: none;
}
.codrops-icon:before {
	margin: 0 5px;
	text-transform: none;
	font-weight: normal;
	font-style: normal;
	font-variant: normal;
	font-family: 'codropsicons';
	line-height: 1;
	speak: none;
	-webkit-font-smoothing: antialiased;
}
.codrops-icon span {
	display: none;
}
.codrops-icon--drop:before {
	content: "\e001";
}
.codrops-icon--prev:before {
	content: "\e004";
}

/* Related demos */
.content--related {
	text-align: center;
	font-weight: 600;
}
.media-item {
	display: inline-block;
	padding: 1em;
	margin: 1em 0 0 0;
	vertical-align: top;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
}
.media-item__img {
	opacity: 0.8;
	max-width: 100%;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}
.media-item:hover .media-item__img,
.media-item:focus .media-item__img {
	opacity: 1;
}
.media-item__title {
	font-size: 0.85em;
	margin: 0;
	padding: 0.5em;
}
@media screen and (max-width:50em) {
	.codrops-header {
		padding: 3em 10% 4em;
	}
}
@media screen and (max-width:40em) {
	.codrops-header h1 {
		font-size: 2.8em;
	}
}

/* Box colors */
.bg-1 {
	background: #ECEFF1;
	color: #37474f;
}
.bg-2 {
	background: #7986cb;
	color: #ECEFF1;
}
.bg-3 {
	background: #37474f;
	color: #fff;
}

/* Common button styles */
.button {
	float: left;
	min-width: 150px;
	max-width: 250px;
	display: block;
	margin: 1em;
	padding: 1em 2em;
	border: none;
	background: none;
	color: inherit;
	vertical-align: middle;
	position: relative;
	z-index: 1;
	-webkit-backface-visibility: hidden;
	-moz-osx-font-smoothing: grayscale;
}
.button:focus {
	outline: none;
}
.button > span {
	vertical-align: middle;
}

/* Text color adjustments (we could stick to the "inherit" but that does not work well in Safari) */
.bg-1 .button {
	color: #37474f;
	border-color: #37474f;
}
.bg-2 .button {
	color: #ECEFF1;
	border-color: #ECEFF1;
}
.bg-3 .button {
	color: #fff;
	border-color: #fff;
}

/* Sizes */
.button--size-s {
	font-size: 14px;
}
.button--size-m {
	font-size: 16px;
}
.button--size-l {
	font-size: 18px;
}

/* Typography and Roundedness */
.button--text-upper {
	letter-spacing: 2px;
	text-transform: uppercase;
}
.button--text-thin {
	font-weight: 300;
}
.button--text-medium {
	font-weight: 500;
}
.button--text-thick {
	font-weight: 600;
}
.button--round-s {
	border-radius: 5px;
}
.button--round-m {
	border-radius: 15px;
}
.button--round-l {
	border-radius: 40px;
}

/* Borders */
.button--border-thin {
	border: 1px solid;
}
.button--border-medium {
	border: 2px solid;
}
.button--border-thick {
	border: 3px solid;
}

/* Individual button styles */

/* Winona */
.button--winona {
	overflow: hidden;
	padding: 0;
	-webkit-transition: border-color 0.3s, background-color 0.3s;
	transition: border-color 0.3s, background-color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--winona::after {
	content: attr(data-text);
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0;
	color: #3f51b5;
	-webkit-transform: translate3d(0, 25%, 0);
	transform: translate3d(0, 25%, 0);
}
.button--winona > span {
	display: block;
}
.button--winona.button--inverted {
	color: #7986cb;
}
.button--winona.button--inverted:after {
	color: #fff;
}
.button--winona::after,
.button--winona > span {
	padding: 1em 2em;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--winona:hover {
	border-color: #3f51b5;
	background-color: rgba(63, 81, 181, 0.1);
}
.button--winona.button--inverted:hover {
	border-color: #21333C;
	background-color: #21333C;
}
.button--winona:hover::after {
	opacity: 1;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--winona:hover > span {
	opacity: 0;
	-webkit-transform: translate3d(0, -25%, 0);
	transform: translate3d(0, -25%, 0);
}

/* Ujarak */
.button--ujarak {
	-webkit-transition: border-color 0.4s, color 0.4s;
	transition: border-color 0.4s, color 0.4s;
}
.button--ujarak::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #37474f;
	z-index: -1;
	opacity: 0;
	-webkit-transform: scale3d(0.7, 1, 1);
	transform: scale3d(0.7, 1, 1);
	-webkit-transition: -webkit-transform 0.4s, opacity 0.4s;
	transition: transform 0.4s, opacity 0.4s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--ujarak.button--round-s::before {
	border-radius: 2px;
}
.button--ujarak.button--inverted::before {
	background: #7986CB;
}
.button--ujarak,
.button--ujarak::before {
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--ujarak:hover {
	color: #fff;
	border-color: #37474f;
}
.button--ujarak.button--inverted:hover {
	color: #37474F;
	border-color: #fff;
}
.button--ujarak:hover::before {
	opacity: 1;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

/* Wayra */
.button--wayra {
	overflow: hidden;
	width: 245px;
	-webkit-transition: border-color 0.3s, color 0.3s;
	transition: border-color 0.3s, color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--wayra::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 150%;
	height: 100%;
	background: #37474f;
	z-index: -1;
	-webkit-transform: rotate3d(0, 0, 1, -45deg) translate3d(0, -3em, 0);
	transform: rotate3d(0, 0, 1, -45deg) translate3d(0, -3em, 0);
	-webkit-transform-origin: 0% 100%;
	transform-origin: 0% 100%;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s, background-color 0.3s;
	transition: transform 0.3s, opacity 0.3s, background-color 0.3s;
}
.button--wayra:hover {
	color: #fff;
	border-color: #3f51b5;
}
.button--wayra.button--inverted:hover {
	color: #3f51b5;
	border-color: #fff;
}
.button--wayra:hover::before {
	opacity: 1;
	background-color: #3f51b5;
	-webkit-transform: rotate3d(0, 0, 1, 0deg);
	transform: rotate3d(0, 0, 1, 0deg);
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--wayra.button--inverted:hover::before {
	background-color: #fff;
}

/* Tamaya */
.button--tamaya {
	overflow: hidden;
	color: #7986cb;
	min-width: 180px;
}
.button--tamaya.button--inverted {
	color: #37474f;
	border-color: #37474f;
}
.button--tamaya::before,
.button--tamaya::after {
	content: attr(data-text);
	position: absolute;
	width: 100%;
	height: 50%;
	left: 0;
	background: #7986cb;
	color: #fff;
	overflow: hidden;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--tamaya.button--inverted::before,
.button--tamaya.button--inverted::after {
	background: #fff;
	color: #37474f;
}
.button--tamaya::before {
	top: 0;
	padding-top: 1em;
}
.button--tamaya::after {
	bottom: 0;
	line-height: 0;
}
.button--tamaya > span {
	display: block;
	-webkit-transform: scale3d(0.2, 0.2, 1);
	transform: scale3d(0.2, 0.2, 1);
	opacity: 0;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--tamaya:hover::before {
	-webkit-transform: translate3d(0, -100%, 0);
	transform: translate3d(0, -100%, 0);
}
.button--tamaya:hover::after {
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}
.button--tamaya:hover > span {
	opacity: 1;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}

/* Rayen */
.button--rayen {
	overflow: hidden;
	padding: 0;
	width: 230px;
}
.button--rayen.button--inverted {
	color: #fff;
}
.button--rayen::before {
	content: attr(data-text);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #7986cb;
	-webkit-transform: translate3d(-100%, 0, 0);
	transform: translate3d(-100%, 0, 0);
}
.button--rayen.button--inverted::before {
	background: #fff;
	color: #37474f;
}
.button--rayen > span {
	display: block;
}
.button--rayen::before,
.button--rayen > span {
	padding: 1em 2em;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--rayen:hover::before {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--rayen:hover > span {
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}

/* Pipaluk */
.button--pipaluk {
	width: 240px;
	padding: 1.5em 3em;
	color: #fff;
}
.button--pipaluk.button--inverted {
	color: #7986cb;
}
.button--pipaluk::before,
.button--pipaluk::after {
	content: '';
	border-radius: inherit;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: -1;
	-webkit-transition: -webkit-transform 0.3s, background-color 0.3s;
	transition: transform 0.3s, background-color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.25, 0, 0.3, 1);
	transition-timing-function: cubic-bezier(0.25, 0, 0.3, 1);
}
.button--pipaluk::before {
	border: 2px solid #7986cb;
}
.button--pipaluk.button--inverted::before {
	border-color: #fff;
}
.button--pipaluk::after {
	background: #7986cb;
}
.button--pipaluk.button--inverted::after {
	background: #fff;
}
.button--pipaluk:hover::before {
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}
.button--pipaluk::before,
.button--pipaluk:hover::after {
	-webkit-transform: scale3d(0.7, 0.7, 1);
	transform: scale3d(0.7, 0.7, 1);
}
.button--pipaluk:hover::after {
	background-color: #3f51b5;
}
.button--pipaluk.button--inverted:hover::after {
	background-color: #fff;
}

/* Nuka */
.button--nuka {
	margin: 1em 2em;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--nuka.button--inverted {
	color: #37474f;
}
.button--nuka::before,
.button--nuka::after {
	content: '';
	position: absolute;
	border-radius: inherit;
	background: #7986cb;
	z-index: -1;
}
.button--nuka::before {
	top: -4px;
	bottom: -4px;
	left: -4px;
	right: -4px;
	opacity: 0.2;
	-webkit-transform: scale3d(0.7, 1, 1);
	transform: scale3d(0.7, 1, 1);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
}
.button--nuka::after {
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transform: scale3d(1.1, 1, 1);
	transform: scale3d(1.1, 1, 1);
	-webkit-transition: -webkit-transform 0.3s, background-color 0.3s;
	transition: transform 0.3s, background-color 0.3s;
}
.button--nuka::before,
.button--nuka::after {
	-webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
	transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}
.button--nuka.button--inverted::before,
.button--nuka.button--inverted::after {
	background: #fff;
}
.button--nuka:hover {
	color: #fff;
}
.button--nuka:hover::before {
	opacity: 1;
}
.button--nuka:hover::after {
	background-color: #37474f;
}
.button--nuka.button--inverted:hover::after {
	background-color: #7986cb;
}
.button--nuka:hover::after,
.button--nuka:hover::before {
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}

/* Moema */
.button--moema {
	padding: 1.5em 3em;
	border-radius: 50px;
	background: #7986cb;
	color: #fff;
	-webkit-transition: background-color 0.3s, color 0.3s;
	transition: background-color 0.3s, color 0.3s;
}
.button--moema.button--inverted {
	background: #ECEFF1;
	color: #37474f;
}
.button--moema::before {
	content: '';
	position: absolute;
	top: -20px;
	left: -20px;
	bottom: -20px;
	right: -20px;
	background: inherit;
	border-radius: 50px;
	z-index: -1;
	opacity: 0.4;
	-webkit-transform: scale3d(0.8, 0.5, 1);
	transform: scale3d(0.8, 0.5, 1);
}
.button--moema:hover {
	-webkit-transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
	transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
	color: #ECEFF1;
	background-color: #3f51b5;
	-webkit-animation: anim-moema-1 0.3s forwards;
	animation: anim-moema-1 0.3s forwards;
}
.button--moema.button--inverted:hover {
	color: #ECEFF1;
	background-color: #7986cb;
}
.button--moema:hover::before {
	-webkit-animation: anim-moema-2 0.3s 0.3s forwards;
	animation: anim-moema-2 0.3s 0.3s forwards;
}
@-webkit-keyframes anim-moema-1 {
	60% {
		-webkit-transform: scale3d(0.8, 0.8, 1);
		transform: scale3d(0.8, 0.8, 1);
	}
	85% {
		-webkit-transform: scale3d(1.1, 1.1, 1);
		transform: scale3d(1.1, 1.1, 1);
	}
	100% {
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1);
	}
}
@keyframes anim-moema-1 {
	60% {
		-webkit-transform: scale3d(0.8, 0.8, 1);
		transform: scale3d(0.8, 0.8, 1);
	}
	85% {
		-webkit-transform: scale3d(1.1, 1.1, 1);
		transform: scale3d(1.1, 1.1, 1);
	}
	100% {
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1);
	}
}
@-webkit-keyframes anim-moema-2 {
	to {
		opacity: 0;
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1);
	}
}
@keyframes anim-moema-2 {
	to {
		opacity: 0;
		-webkit-transform: scale3d(1, 1, 1);
		transform: scale3d(1, 1, 1);
	}
}

/* Isi */
.button--isi {
	padding: 1.2em 2em;
	color: #fff;
	background: #7986cb;
	overflow: hidden;
}
.button--isi::before {
	content: '';
	z-index: -1;
	position: absolute;
	top: 50%;
	left: 100%;
	margin: -15px 0 0 1px;
	width: 30px;
	height: 30px;
	border-radius: 50%;
	background: #3f51b5;
	-webkit-transform-origin: 100% 50%;
	transform-origin: 100% 50%;
	-webkit-transform: scale3d(1, 2, 1);
	transform: scale3d(1, 2, 1);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.9,1);
	transition-timing-function: cubic-bezier(0.7,0,0.9,1);
}
.button--isi .button__icon {
	vertical-align: middle;
}
.button--isi > span {
	vertical-align: middle;
	padding-left: 0.75em;
}
.button--isi:hover::before {
	-webkit-transform: scale3d(9, 9, 1);
	transform: scale3d(9, 9, 1);
}

/* Aylen */
.button.button--aylen {
	background: #fff;
	color: #37474f;
	overflow: hidden;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
}
.button--aylen.button--inverted {
	background: none;
	color: #fff;
}
.button--aylen::before,
.button--aylen::after {
	content: '';
	position: absolute;
	height: 100%;
	width: 100%;
	bottom: 100%;
	left: 0;
	z-index: -1;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--aylen::before {
	background: #7986cb;
}
.button--aylen::after {
	background: #3f51b5;
}
.button--aylen:hover {
	color: #fff;
}
.button--aylen:hover::before,
.button--aylen:hover::after {
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}
.button--aylen:hover::after {
	-webkit-transition-delay: 0.175s;
	transition-delay: 0.175s;
}

/* Saqui */
.button.button--saqui {
	overflow: hidden;
	color: #fff;
	background: #37474f;
	-webkit-transition: background-color 0.3s ease-in, color 0.3s ease-in;
	transition: background-color 0.3s ease-in, color 0.3s ease-in;
}
.button--saqui.button--inverted {
	background: #fff;
	color: #37474f;
}
.button--saqui::after {
	content: attr(data-text);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	padding: 1em 2em;
	color: #37474f;
	-webkit-transform-origin: -25% 50%;
	transform-origin: -25% 50%;
	-webkit-transform: rotate3d(0, 0, 1, 45deg);
	transform: rotate3d(0, 0, 1, 45deg);
	-webkit-transition: -webkit-transform 0.3s ease-in;
	transition: transform 0.3s ease-in;
}
.button--saqui.button--inverted::after {
	color: #fff;
}
.button--saqui:hover::after,
.button--saqui:hover {
	-webkit-transition-timing-function: ease-out;
	transition-timing-function: ease-out;
}
.button--saqui:hover {
	background-color: #7986cb;
	color: #7986cb;
}
.button--saqui.button--inverted:hover {
	background-color: #3f51b5;
	color: #3f51b5;
}
.button--saqui:hover::after {
	-webkit-transform: rotate3d(0, 0, 1, 0deg);
	transform: rotate3d(0, 0, 1, 0deg);
}

/* Wapasha */
.button.button--wapasha {
	background: #37474f;
	color: #fff;
	-webkit-transition: background-color 0.3s, color 0.3s;
	transition: background-color 0.3s, color 0.3s;
}
.button--wapasha.button--inverted {
	background: #fff;
	color: #37474f;
}
.button--wapasha::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border: 2px solid #3f51b5;
	z-index: -1;
	border-radius: inherit;
	opacity: 0;
	-webkit-transform: scale3d(0.6, 0.6, 1);
	transform: scale3d(0.6, 0.6, 1);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--wapasha.button--inverted::before {
	border-color: #7986cb;
}
.button--wapasha:hover {
	background-color: #fff;
	color: #3f51b5;
}
.button--wapasha.button--inverted:hover {
	background-color: #37474f;
	color: #7986cb;
}
.button--wapasha:hover::before {
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
	opacity: 1;
}

/* Nina */
.button--nina {
	padding: 0 2em;
	background: #7986cb;
	color: #fff;
	overflow: hidden;
	-webkit-transition: background-color 0.3s;
	transition: background-color 0.3s;
}
.button--nina.button--inverted {
	background: #fff;
	color: #7986cb;
}
.button--nina > span {
	display: inline-block;
	padding: 1em 0;
	opacity: 0;
	color: #fff;
	-webkit-transform: translate3d(0, -10px, 0);
	transform: translate3d(0, -10px, 0);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--nina::before {
	content: attr(data-text);
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	padding: 1em 0;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--nina:hover {
	background-color: #3f51b5;
}
.button--nina:hover::before {
	opacity: 0;
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}
.button--nina:hover > span {
	opacity: 1;
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--nina:hover > span:nth-child(1) {
	-webkit-transition-delay: 0.045s;
	transition-delay: 0.045s;
}
.button--nina:hover > span:nth-child(2) {
	-webkit-transition-delay: 0.09s;
	transition-delay: 0.09s;
}
.button--nina:hover > span:nth-child(3) {
	-webkit-transition-delay: 0.135s;
	transition-delay: 0.135s;
}
.button--nina:hover > span:nth-child(4) {
	-webkit-transition-delay: 0.18s;
	transition-delay: 0.18s;
}
.button--nina:hover > span:nth-child(5) {
	-webkit-transition-delay: 0.225s;
	transition-delay: 0.225s;
}
.button--nina:hover > span:nth-child(6) {
	-webkit-transition-delay: 0.27s;
	transition-delay: 0.27s;
}
.button--nina:hover > span:nth-child(7) {
	-webkit-transition-delay: 0.315s;
	transition-delay: 0.315s;
}
.button--nina:hover > span:nth-child(8) {
	-webkit-transition-delay: 0.36s;
	transition-delay: 0.36s;
}
.button--nina:hover > span:nth-child(9) {
	-webkit-transition-delay: 0.405s;
	transition-delay: 0.405s;
}
.button--nina:hover > span:nth-child(10) {
	-webkit-transition-delay: 0.45s;
	transition-delay: 0.45s;
}

/* Nanuk */
.button--nanuk {
	padding: 0 2em;
	overflow: hidden;
	background: #7986cb;
	-webkit-transition: background-color 0.3s;
	transition: background-color 0.3s;
}
.button--nanuk.button--inverted {
	background: #fff;
	color: #7986cb;
}
.button--nanuk > span {
	display: inline-block;
	padding: 1em 0;
}
.button--nanuk:hover {
	background-color: #3f51b5;
}
.button--nanuk:hover > span:nth-child(odd) {
	-webkit-animation: anim-nanuk-1 0.5s forwards;
	animation: anim-nanuk-1 0.5s forwards;
}
.button--nanuk:hover > span:nth-child(even) {
	-webkit-animation: anim-nanuk-2 0.5s forwards;
	animation: anim-nanuk-2 0.5s forwards;
}
.button--nanuk:hover > span:nth-child(odd),
.button--nanuk:hover > span:nth-child(even) {
	-webkit-animation-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-animation-function: cubic-bezier(0.75, 0, 0.125, 1);
}
@-webkit-keyframes anim-nanuk-1 {
	0%,
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	49% {
		opacity: 1;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
	}
	50% {
		opacity: 0;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
		color: inherit;
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		color: #fff;
	}
	100% {
		color: #fff;
	}
}
@keyframes anim-nanuk-1 {
	0%,
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	49% {
		opacity: 1;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
	}
	50% {
		opacity: 0;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
		color: inherit;
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		color: #fff;
	}
	100% {
		color: #fff;
	}
}
@-webkit-keyframes anim-nanuk-2 {
	0%,
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	49% {
		opacity: 1;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	}
	50% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		color: inherit;
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
		color: #fff;
	}
	100% {
		color: #fff;
	}
}
@keyframes anim-nanuk-2 {
	0%,
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
	}
	49% {
		opacity: 1;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
	}
	50% {
		opacity: 0;
		-webkit-transform: translate3d(0, -100%, 0);
		transform: translate3d(0, -100%, 0);
		color: inherit;
	}
	51% {
		opacity: 0;
		-webkit-transform: translate3d(0, 100%, 0);
		transform: translate3d(0, 100%, 0);
		color: #fff;
	}
	100% {
		color: #fff;
	}
}
.button--nanuk:hover > span:nth-child(1) {
	-webkit-animation-delay: 0s;
	animation-delay: 0s;
}
.button--nanuk:hover > span:nth-child(2) {
	-webkit-animation-delay: 0.05s;
	animation-delay: 0.05s;
}
.button--nanuk:hover > span:nth-child(3) {
	-webkit-animation-delay: 0.1s;
	animation-delay: 0.1s;
}
.button--nanuk:hover > span:nth-child(4) {
	-webkit-animation-delay: 0.15s;
	animation-delay: 0.15s;
}
.button--nanuk:hover > span:nth-child(5) {
	-webkit-animation-delay: 0.2s;
	animation-delay: 0.2s;
}
.button--nanuk:hover > span:nth-child(6) {
	-webkit-animation-delay: 0.25s;
	animation-delay: 0.25s;
}
.button--nanuk:hover > span:nth-child(7) {
	-webkit-animation-delay: 0.3s;
	animation-delay: 0.3s;
}
.button--nanuk:hover > span:nth-child(8) {
	-webkit-animation-delay: 0.35s;
	animation-delay: 0.35s;
}
.button--nanuk:hover > span:nth-child(9) {
	-webkit-animation-delay: 0.4s;
	animation-delay: 0.4s;
}
.button--nanuk:hover > span:nth-child(10) {
	-webkit-animation-delay: 0.45s;
	animation-delay: 0.45s;
}
.button--nanuk:hover > span:nth-child(11) {
	-webkit-animation-delay: 0.5s;
	animation-delay: 0.5s;
}

/* Antiman */
.button--antiman {
	background: none;
	border: none;
	height: 60px;
}
.button--antiman.button--inverted,
.button--antiman.button--inverted-alt {
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--antiman > span {
	padding-left: 0.35em;
}
.button--antiman::before,
.button--antiman::after {
	content: '';
	z-index: -1;
	border-radius: inherit;
	pointer-events: none;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-backface-visibility: hidden;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--antiman::before {
	border: 2px solid #37474f;
	opacity: 0;
	-webkit-transform: scale3d(1.2, 1.2, 1);
	transform: scale3d(1.2, 1.2, 1);
}
.button--antiman.button--border-thin::before {
	border-width: 1px;
}
.button--antiman.button--border-medium::before {
	border-width: 2px;
}
.button--antiman.button--border-thick::before {
	border-width: 3px;
}
.button--antiman.button--inverted::before {
	border-color: #7986cb;
}
.button--antiman.button--inverted-alt::before {
	border-color: #3f51b5;
}
.button--antiman::after {
	background: #fff;
}
.button--antiman.button--inverted::after {
	background: #7986cb;
}
.button--antiman.button--inverted-alt::after {
	background: #3f51b5;
}
.button--antiman.button--inverted:hover {
	color: #7986cb;
}
.button--antiman.button--inverted-alt:hover {
	color: #3f51b5;
}
.button--antiman:hover::before {
	opacity: 1;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}
.button--antiman:hover::after {
	opacity: 0;
	-webkit-transform: scale3d(0.8, 0.8, 1);
	transform: scale3d(0.8, 0.8, 1);
}

/* Itzel */
.button--itzel {
	border: none;
	padding: 0px;
	overflow: hidden;
	width: 255px;
}
.button--itzel::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border: 2px solid;
	border-radius: inherit;
	-webkit-clip-path: polygon(0% 0%, 0% 100%, 35% 100%, 35% 60%, 65% 60%, 65% 100%, 100% 100%, 100% 0%);
	clip-path: url(../index.html#clipBox);
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -2px, 0);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
}

.button--itzel.button--border-thin::before {
	border: 1px solid;
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -1px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -1px, 0);
}
.button--itzel.button--border-thick::before {
	border: 3px solid;
	-webkit-transform: translate3d(0, 100%, 0) translate3d(0, -3px, 0);
	transform: translate3d(0, 100%, 0) translate3d(0, -3px, 0);
}

.button--itzel::before,
.button--itzel .button__icon {
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--itzel .button__icon {
	position: absolute;
	top: 100%;
	left: 50%;
	padding: 20px;
	font-size: 20px;
	-webkit-transform: translate3d(-50%, 0, 0);
	transform: translate3d(-50%, 0, 0);
}
.button--itzel > span {
	display: block;
	padding: 20px;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-transition-delay: 0.3s;
	transition-delay: 0.3s;
}
.button--itzel:hover::before {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--itzel:hover .button__icon {
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
	-webkit-transform: translate3d(-50%, -100%, 0);
	transform: translate3d(-50%, -100%, 0);
}
.button--itzel:hover > span {
	opacity: 0;
	-webkit-transform: translate3d(0, -50%, 0);
	transform: translate3d(0, -50%, 0);
	-webkit-transition-delay: 0s;
	transition-delay: 0s;
}

/* Naira */
.button--naira {
	padding: 0;
	overflow: hidden;
	-webkit-transition: background-color 0.3s;
	transition: background-color 0.3s;
}
.button--naira::before {
	content: '';
	position: absolute;
	left: -50%;
	width: 200%;
	height: 200%;
	background: #37474f;
	top: -50%;
	z-index: -1;
	-webkit-transform: translate3d(0, -100%, 0) rotate3d(0, 0, 1, -10deg);
	transform: translate3d(0, -100%, 0) rotate3d(0, 0, 1, -10deg);
}
.button--naira.button--inverted::before {
	background: #7986cb;
}
.button--naira-up::before {
	-webkit-transform: translate3d(0, 100%, 0) rotate3d(0, 0, 1, 10deg);
	transform: translate3d(0, 100%, 0) rotate3d(0, 0, 1, 10deg);
}
.button--naira > span {
	display: block;
}
.button--naira .button__icon {
	position: absolute;
	top: 0;
	width: 100%;
	left: 0;
	color: #fff;
	-webkit-transform: translate3d(0, -100%, 0);
	transform: translate3d(0, -100%, 0);
}
.button--naira-up .button__icon {
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}
.button--naira > span,
.button--naira .button__icon {
	padding: 1em 2em;
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--naira:hover::before {
	-webkit-animation: anim-naira-1 0.3s forwards ease-in;
	animation: anim-naira-1 0.3s forwards ease-in;
}
.button--naira-up:hover::before {
	-webkit-animation: anim-naira-2 0.3s forwards ease-in;
	animation: anim-naira-2 0.3s forwards ease-in;
}
@-webkit-keyframes anim-naira-1 {
	50% {
		-webkit-transform: translate3d(0, -50%, 0) rotate3d(0, 0, 1, -10deg);
		transform: translate3d(0, -50%, 0) rotate3d(0, 0, 1, -10deg);
		-webkit-animation-timing-function: ease-out;
		animation-timing-function: ease-out;
	}
	100% {
		-webkit-transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
		transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
	}
}
@keyframes anim-naira-1 {
	50% {
		-webkit-transform: translate3d(0, -50%, 0) rotate3d(0, 0, 1, -10deg);
		transform: translate3d(0, -50%, 0) rotate3d(0, 0, 1, -10deg);
		-webkit-animation-timing-function: ease-out;
		animation-timing-function: ease-out;
	}
	100% {
		-webkit-transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
		transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
	}
}
@-webkit-keyframes anim-naira-2 {
	50% {
		-webkit-transform: translate3d(0, 50%, 0) rotate3d(0, 0, 1, 10deg);
		transform: translate3d(0, 50%, 0) rotate3d(0, 0, 1, 10deg);
		-webkit-animation-timing-function: ease-out;
		animation-timing-function: ease-out;
	}
	100% {
		-webkit-transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
		transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
	}
}
@keyframes anim-naira-2 {
	50% {
		-webkit-transform: translate3d(0, 50%, 0) rotate3d(0, 0, 1, 10deg);
		transform: translate3d(0, 50%, 0) rotate3d(0, 0, 1, 10deg);
		-webkit-animation-timing-function: ease-out;
		animation-timing-function: ease-out;
	}
	100% {
		-webkit-transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
		transform: translate3d(0, 0%, 0) rotate3d(0, 0, 1, 0deg);
	}
}
.button--naira:hover {
	background-color: #37474f;
	-webkit-transition: background-color 0s 0.3s;
	transition: background-color 0s 0.3s;
}
.button--naira.button--inverted:hover {
	background-color: #7986cb;
}
.button--naira:hover .button__icon {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--naira:hover > span {
	opacity: 0;
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
}
.button--naira-up:hover > span {
	-webkit-transform: translate3d(0, -100%, 0);
	transform: translate3d(0, -100%, 0);
}

/* Quidel */
.button--quidel {
	background: #7986cb;
	color: #7986cb;
	overflow: hidden;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--quidel.button--inverted {
	background: #fff;
	color: #fff;
}
.button--quidel::before,
.button--quidel::after {
	content: '';
	position: absolute;
	z-index: -1;
	border-radius: inherit;
}
.button--quidel::after {
	top: 2px;
	left: 2px;
	right: 2px;
	bottom: 2px;
	background: #fff;
}
.button--quidel.button--inverted::after {
	background: #37474f;
}
.button--quidel::before {
	background: #37474f;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	-webkit-transform: translate3d(0, 100%, 0);
	transform: translate3d(0, 100%, 0);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--quidel.button--inverted::before {
	background: #7986cb;
}
.button--round-s.button--quidel::after {
	border-radius: 3px;
}
.button--round-m.button--quidel::after {
	border-radius: 13px;
}
.button--round-l.button--quidel::after {
	border-radius: 40px;
}
.button--quidel > span {
	padding-left: 0.35em;
}
.button--quidel:hover {
	color: #37474f;
}
.button--quidel.button--inverted:hover {
	color: #7986cb;
}
.button--quidel:hover::before {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}

/* Sacnite */
.button.button--sacnite {
	width: 70px;
	height: 70px;
	min-width: 0;
	padding: 0;
	color: #fff;
	-webkit-transition: color 0.3s;
	transition: color 0.3s;
}
.button--scanite.button--round-l {
	border-radius: 50%;
}
.button--sacnite.button--inverted {
	color: #37474f;
}
.button--sacnite::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border-radius: inherit;
	z-index: -1;
	box-shadow: inset 0 0 0 35px #37474f;
	-webkit-transform: scale3d(0.9, 0.9, 1);
	transform: scale3d(0.9, 0.9, 1);
	-webkit-transition: box-shadow 0.3s, -webkit-transform 0.3;
	transition: box-shadow 0.3s, transform 0.3s;
}
.button--sacnite.button--inverted::before {
	box-shadow: inset 0 0 0 35px #fff;
}
.button--sacnite .button__icon {
	font-size: 22px;
	width: 22px;
}
.button--sacnite > span {
	position: absolute;
	opacity: 0;
	pointer-events: none;
}
.button--sacnite:hover {
	color: #37474f;
}
.button--sacnite.button--inverted:hover {
	color: #fff;
}
.button--sacnite:hover::before {
	box-shadow: inset 0 0 0 2px #37474f;
	-webkit-transform: scale3d(1, 1, 1);
	transform: scale3d(1, 1, 1);
}
.button--sacnite.button--inverted:hover::before {
	box-shadow: inset 0 0 0 2px #fff;
}

/* Shikoba */
.button.button--shikoba {
	padding: 1em 30px 1em 50px;
	overflow: hidden;
	background: #fff;
	color: #37474f;
	border-color: #37474f;
	-webkit-transition: background-color 0.3s, border-color 0.3s, color 0.3s;
	transition: background-color 0.3s, border-color 0.3s, color 0.3s;
}
.button--shikoba.button--inverted {
	color: #fff;
	background: #7986cb;
}
.button--shikoba > span {
	display: inline-block;
	-webkit-transform: translate3d(-10px, 0, 0);
	transform: translate3d(-10px, 0, 0);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--shikoba .button__icon {
	position: absolute;
	left: 20px;
	font-size: 18px;
	-webkit-transform: translate3d(-40px, 2.5em, 0);
	transform: translate3d(-40px, 2.5em, 0);
	-webkit-transition: -webkit-transform 0.3s;
	transition: transform 0.3s;
	-webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
	transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
}
.button--shikoba:hover .button__icon,
.button--shikoba:hover > span {
	-webkit-transform: translate3d(0, 0, 0);
	transform: translate3d(0, 0, 0);
}
.button--shikoba:hover {
	background: #3f51b5;
	border-color: #3f51b5;
	color: #fff;
}       
   </style>
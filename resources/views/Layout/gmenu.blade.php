<!--@include ('Modal/signup')-->
@include ('Modal/Verify')
<!--@include ('Modal/alert_message_dlg')-->
<!------sign up---------->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!----------------------->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<style>
    body {
        min-height: 75rem;
        padding-top: 4.5rem;
    }
    .navbar{
        background-color: #011;
    }
    #navbarCollapse{
        position: relative;
    }

    #rightbutton a{
        float:right;
    }
    #rightbutton a span{
        padding-right: 10px;
        font-size: 20px;
        font-family: "aktiv-grotesk-std",sans-serif;

    }
    #rightbutton a img{
        height:  25px;
        margin-bottom: 7px;
    }
    .navbar-nav .nav-item .nav-link{
        font-size: 18px;
        padding-right: 30px;

    }
    #navbarCollapse .nav-item{
        z-index: 10;
    }
    .modal-content{
        margin:auto!important;
    }
    
    .btn-1,
    .btn-1::after {
      -webkit-transition: all 0.3s;
    	-moz-transition: all 0.3s;
      -o-transition: all 0.3s;
    	transition: all 0.3s;
    }
    
    .btn-1 {
      width:130px;
      height:40px;
      background: none;
      border: 2px solid #fff;
      border-radius: 5px;
      color: #fff;
      display: block;
      font-size: 18px;
      font-weight: 400;
      position: relative;
      text-transform: uppercase;
      margin-bottom:15px;
      margin-left:10px;
    }
    
    .btn-1::before,
    .btn-1::after {
      background: #fff;
      content: '';
      position: absolute;
      z-index: -1;
    }
    
    .btn-1:hover {
      color: #000;
    }
    
    /* BUTTON 1 */
    .btn-1::after {
      height: 0;
      left: 0;
      top: 0;
      width: 100%;
    }
    
    .btn-1:hover:after {
      height: 100%;
      
    }  
   @media screen and (min-width: 366px) {
    #rightbutton{
        width: 200px;
        position:absolute;
        right: 0%;
        float:right;
    }
   }
   @media screen and (min-width: 766px) {
    #rightbutton{
        width: 300px;
        position:absolute;
        right: 0%;
        float:right;
    }
   }
   @media (min-width: 968px)
    .navbar-expand-md .navbar-toggler {
        display: none!important;
    }
</style>
<!-----sign up part-------->
<link href="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Country-Selecter-with-Flags-flagstrap/dist/css/flags.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<style type="text/css">
	.form-group{
		margin-bottom: 1em;
		width: 93%;
	}
	.flagstrap {

	}
	.btn{
		border-radius: 0px;
		background: none;
		padding: 0.5em;
		float: left;
		width: 170px;
	}
	.checkbox, .radio{
		display: flex;
	}
	input[name="_token"]{
	    display:none;
	}
</style>
<style type="text/css">
/* https://github.com/IckleChris/jquery-date-dropdowns/blob/master/demo/styles.css */
	@import url(http://fonts.googleapis.com/css?family=Source+Code+Pro:400|Roboto+Condensed:400,700);

	/* Body - remove browser margin & set padding to accommodate for the fixed header bar */
	.wrapper {
	    margin: 0 auto;
	    width: 95%;
	    text-align: center;
	}

	/* Plugin Example Container */
	.example {
	    width: 100%;
	    display: inline-block;
	    box-sizing: border-box;
	    text-align: center;
	}

	/* Example Heading */
	.example h2 {
	    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
	    font-size: 1.3em;
	    margin: 15px 0;
	    color: #4F5462;
	}

	.example input {
	    display: block;
	    width: 25%;
	    background: none;
	    float: left;
	    margin-bottom: 1em;
	    text-align: center;
	    font-family: "Roboto Condensed", helvetica, arial, sans-serif;
	}

	.example select {
		color:black;
		background:none;
		float: left;
        padding: 0.53em;
	    width: 21.5%;
/*        border: solid 1px rgba(255, 255, 255, 0.37);!important;*/
        margin-left: 1.5%;	    
	}

	.example select.invalid {
	    color: black;
	}

	.example input[type="submit"] {
	    margin-top: 10px;
	}

	.example input[type="submit"]:hover {
	    cursor: pointer;
	    background-color: #fff;
	}

	/* Code Blocks */
	pre.code-wrapper {
	    padding: 15px 30px;
	    margin-top: 20px;
	    background: #F4F6F4;
	    color: #393D3F;
	    text-align: left;
	    border: 1px solid #DCDFDC;
	    border-radius: 3px;
	}

	pre code {
	    font-family: 'Source Code Pro', monospace, monospace;
	    font-weight: 400;
	    font-size: 14px;
	}

	/* Highlighted Code Blocks */
	pre code span.highlight {
	    color: #EF6F6C;
	}

	/* Media */
	@media(max-width: 847px) {
	    .header-bar h1 {
	        text-align: center !important;
	        width: 100%;
	    }

	    .header-bar nav {
	        display: none;
	    }

	    .example:first-of-type {
	        bottom: 0;
	    }
	}

	@media(min-width: 848px) {
	    .header-bar nav {
	        display: block;
	    }
	}

</style>
<style type="text/css">
	ol, ul {
	  list-style: none;
	  margin: 0px;
	  padding: 0px;
	}

	blockquote, q {
	  quotes: none;
	}

	blockquote:before, blockquote:after, q:before, q:after {
	  content: '';
	  content: none;
	}

	table {
	  border-collapse: collapse;
	  border-spacing: 0;
	}

	/*-- start editing from here --*/
	a {
	  text-decoration: none;
	}

	.txt-rt {
	  text-align: right;
	}

	/* text align right */
	.txt-lt {
	  text-align: left;
	}

	/* text align left */
	.txt-center {
	  text-align: center;
	}

	/* text align center */
	.float-rt {
	  float: right;
	}

	/* float right */
	.float-lt {
	  float: left;
	}

	/* float left */
	.clear {
	  clear: both;
	}

	/* clear float */
	.pos-relative {
	  position: relative;
	}

	/* Position Relative */
	.pos-absolute {
	  position: absolute;
	}

	/* Position Absolute */
	.vertical-base {
	  vertical-align: baseline;
	}

	/* vertical align baseline */
	.vertical-top {
	  vertical-align: top;
	}

	/* vertical align top */
	nav.vertical ul li {
	  display: block;
	}

	/* vertical menu */
	nav.horizontal ul li {
	  display: inline-block;
	}

	/* horizontal menu */
	img {
	  max-width: 100%;
	}

	/*-- end reset --*/

	h1 {
	  font-size: 3em;
	  text-align: center;
	  color: #fff;
	  font-weight: 100;
	  text-transform: capitalize;
	  letter-spacing: 4px;
	  font-family: 'Roboto', sans-serif;
	}

	/*-- main --*/
	.main-w3layouts {
	  padding: 3em 0 1em;
	}

	.main-agileinfo {
	  width: 35%;
	  margin: 3em auto;
	  background: rgba(0, 0, 0, 0.18);
	  background-size: cover;
	}

	.agileits-top {
	  padding-top:1em;
	}

	input[type="text"], input[type="email"], input[type="number"], input[type="password"] {
	  font-size: 0.9em;
	  font-weight: 100;
	  width: 94.5%;
	  display: block;
	  border: none;
	  padding: 0.6em;
	  border: solid 1px gray;
	  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
	  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
	  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #fff 4%);
	  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #fff 4%);
	  background-position: -800px 0;
	  background-size: 100%;
	  background-repeat: no-repeat;
	  color: #fff;
	  font-family: 'Roboto', sans-serif;
	}

	input.email, input.text.w3lpass {
	  margin: 1.5em 0;
	}

	.text:focus, .text:valid {
	  box-shadow: none;
	  outline: none;
	  background-position: 0 0;
	}

	.text:focus::-webkit-input-placeholder, .text:valid::-webkit-input-placeholder {
	  color: rgba(255, 255, 255, 0.7);
	  font-size: .9em;
	  -webkit-transform: translateY(-30px);
	  -moz-transform: translateY(-30px);
	  -o-transform: translateY(-30px);
	  -ms-transform: translateY(-30px);
	  transform: translateY(-30px);
	  visibility: visible !important;
	}

	::-webkit-input-placeholder {
	  color: #fff;
	  font-weight: 100;
	}

	:-moz-placeholder {
	  /* Firefox 18- */
	  color: #fff;
	}

	::-moz-placeholder {
	  /* Firefox 19+ */
	  color: #fff;
	}

	:-ms-input-placeholder {
	  color: #fff;
	}

	input[type="submit"] {
	  font-size: .9em;
	  color: #ff3;
	  background: none;
	  outline: none;
	  border: solid 1px rgba(255, 255, 255, 0.8);
	  cursor: pointer;
	  padding: 0.6em;
	  -webkit-appearance: none;
	  width: 100%;
	  margin: 0.5em 0;
	  letter-spacing: 4px;
	}

	input[type="submit"]:hover {
	  -webkit-transition: .5s all;
	  -moz-transition: .5s all;
	  -o-transition: .5s all;
	  -ms-transition: .5s all;
	  transition: .5s all;
	  background: #8DC26F;
	}

	.agileits-top p {
	  font-size: 1em;
	  color: #fff;
	  text-align: center;
	  letter-spacing: 1px;
	  font-weight: 300;
	}

	.agileits-top p a {
	  color: #fff;
	  -webkit-transition: .5s all;
	  -moz-transition: .5s all;
	  transition: .5s all;
	  font-weight: 400;
	}

	.agileits-top p a:hover {
	  color: #76b852;
	}

	/*-- //main --*/
	/*-- checkbox --*/
	.wthree-text label {
	  font-size: 0.9em;
	  color: #fff;
	  font-weight: 200;
	  cursor: pointer;
	  float: left;
	  position: relative;
	  left: 10px;
	}

	input.checkbox {
	  cursor: pointer;
	  width: 1.2em;
	  height: 1.2em;
	}

	input.checkbox:before {
	  content: "";
	  position: absolute;
	  width: 1.2em;
	  height: 1.2em;
	  background: inherit;
	  cursor: pointer;
	}

	input.checkbox:after {
	  content: "";
	  position: absolute;
	  top: 0px;
	  left: 0;
	  z-index: 1;
	  width: 1.2em;
	  height: 1.2em;
	  border: 1px solid #fff;
	  -webkit-transition: .4s ease-in-out;
	  -moz-transition: .4s ease-in-out;
	  -o-transition: .4s ease-in-out;
	  transition: .4s ease-in-out;
	}

	input.checkbox:checked:after {
	  -webkit-transform: rotate(-45deg);
	  -moz-transform: rotate(-45deg);
	  -o-transform: rotate(-45deg);
	  -ms-transform: rotate(-45deg);
	  transform: rotate(-45deg);
	  height: .5rem;
	  border-color: #fff;
	  border-top-color: transparent;
	  border-right-color: transparent;
	}

	.anim input.checkbox:checked:after {
	  -webkit-transform: rotate(-45deg);
	  -moz-transform: rotate(-45deg);
	  -o-transform: rotate(-45deg);
	  -ms-transform: rotate(-45deg);
	  transform: rotate(-45deg);
	  height: .5rem;
	  border-color: transparent;
	  border-right-color: transparent;
	  animation: .4s rippling .4s ease;
	  animation-fill-mode: forwards;
	}

	@keyframes rippling {
	  50% {
	    border-left-color: #fff;
	  }

	  100% {
	    border-bottom-color: #fff;
	    border-left-color: #fff;
	  }
	}

	/*-- //checkbox --*/
	/*-- copyright --*/
	.colorlibcopy-agile {
	  margin: 2em 0 1em;
	  text-align: center;
	}

	.colorlibcopy-agile p {
	  font-size: .9em;
	  color: #fff;
	  line-height: 1.8em;
	  letter-spacing: 1px;
	  font-weight: 100;
	}

	.colorlibcopy-agile p a {
	  color: #fff;
	  transition: 0.5s all;
	  -webkit-transition: 0.5s all;
	  -moz-transition: 0.5s all;
	  -o-transition: 0.5s all;
	  -ms-transition: 0.5s all;
	}

	.colorlibcopy-agile p a:hover {
	  color: #000;
	}

	/*-- //copyright --*/
	.wrapper {
	  position: relative;
	  overflow: hidden;
	}

	.colorlib-bubbles {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  z-index: -1;
	}

	.colorlib-bubbles li {
	  position: absolute;
	  list-style: none;
	  display: block;
	  width: 40px;
	  height: 40px;
	  background-color: rgba(255, 255, 255, 0.15);
	  bottom: -160px;
	  -webkit-animation: square 20s infinite;
	  -moz-animation: square 250s infinite;
	  -o-animation: square 20s infinite;
	  -ms-animation: square 20s infinite;
	  animation: square 20s infinite;
	  -webkit-transition-timing-function: linear;
	  -moz-transition-timing-function: linear;
	  -o-transition-timing-function: linear;
	  -ms-transition-timing-function: linear;
	  transition-timing-function: linear;
	  -webkit-border-radius: 50%;
	  -moz-border-radius: 50%;
	  -o-border-radius: 50%;
	  -ms-border-radius: 50%;
	  border-radius: 50%;
	}

	.colorlib-bubbles li:nth-child(1) {
	  left: 10%;
	}

	.colorlib-bubbles li:nth-child(2) {
	  left: 20%;
	  width: 80px;
	  height: 80px;
	  -webkit-animation-delay: 2s;
	  -moz-animation-delay: 2s;
	  -o-animation-delay: 2s;
	  -ms-animation-delay: 2s;
	  animation-delay: 2s;
	  -webkit-animation-duration: 17s;
	  -moz-animation-duration: 17s;
	  -o-animation-duration: 17s;
	  animation-duration: 17s;
	}

	.colorlib-bubbles li:nth-child(3) {
	  left: 25%;
	  -webkit-animation-delay: 4s;
	  -moz-animation-delay: 4s;
	  -o-animation-delay: 4s;
	  -ms-animation-delay: 4s;
	  animation-delay: 4s;
	}

	.colorlib-bubbles li:nth-child(4) {
	  left: 40%;
	  width: 60px;
	  height: 60px;
	  -webkit-animation-duration: 22s;
	  -moz-animation-duration: 22s;
	  -o-animation-duration: 22s;
	  -ms-animation-duration: 22s;
	  animation-duration: 22s;
	  background-color: rgba(255, 255, 255, 0.25);
	}

	.colorlib-bubbles li:nth-child(5) {
	  left: 70%;
	}

	.colorlib-bubbles li:nth-child(6) {
	  left: 80%;
	  width: 120px;
	  height: 120px;
	  -webkit-animation-delay: 3s;
	  -moz-animation-delay: 3s;
	  -o-animation-delay: 3s;
	  -ms-animation-delay: 3s;
	  animation-delay: 3s;
	  background-color: rgba(255, 255, 255, 0.2);
	}

	.colorlib-bubbles li:nth-child(7) {
	  left: 32%;
	  width: 160px;
	  height: 160px;
	  -webkit-animation-delay: 7s;
	  -moz-animation-delay: 7s;
	  -o-animation-delay: 7s;
	  -ms-animation-delay: 7s;
	  animation-delay: 7s;
	}

	.colorlib-bubbles li:nth-child(8) {
	  left: 55%;
	  width: 20px;
	  height: 20px;
	  -webkit-animation-delay: 15s;
	  -moz-animation-delay: 15s;
	  animation-delay: 15s;
	  -webkit-animation-duration: 40s;
	  -moz-animation-duration: 40s;
	  animation-duration: 40s;
	}

	.colorlib-bubbles li:nth-child(9) {
	  left: 25%;
	  width: 10px;
	  height: 10px;
	  -webkit-animation-delay: 2s;
	  animation-delay: 2s;
	  -webkit-animation-duration: 40s;
	  animation-duration: 40s;
	  background-color: rgba(255, 255, 255, 0.3);
	}

	.colorlib-bubbles li:nth-child(10) {
	  left: 90%;
	  width: 160px;
	  height: 160px;
	  -webkit-animation-delay: 11s;
	  animation-delay: 11s;
	}

	@-webkit-keyframes square {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -o-transform: translateY(0);
	    -ms-transform: translateY(0);
	    transform: translateY(0);
	  }

	  100% {
	    -webkit-transform: translateY(-700px) rotate(600deg);
	    -moz-transform: translateY(-700px) rotate(600deg);
	    -o-transform: translateY(-700px) rotate(600deg);
	    -ms-transform: translateY(-700px) rotate(600deg);
	    transform: translateY(-700px) rotate(600deg);
	  }
	}

	@keyframes square {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -o-transform: translateY(0);
	    -ms-transform: translateY(0);
	    transform: translateY(0);
	  }

	  100% {
	    -webkit-transform: translateY(-700px) rotate(600deg);
	    -moz-transform: translateY(-700px) rotate(600deg);
	    -o-transform: translateY(-700px) rotate(600deg);
	    -ms-transform: translateY(-700px) rotate(600deg);
	    transform: translateY(-700px) rotate(600deg);
	  }
	}

	/*-- responsive-design --*/
	@media(max-width:2240px) {
	  input[type="text"], input[type="email"], input[type="password"] {
	    width: 30%;
	  }
	}
  
	@media(max-width:1366px) {
	  h1 {
	    font-size: 2.6em;
	  }

	  .agileits-top {
	    padding-top: 2.5em;
	  }

	  .main-agileinfo {
	    margin: 2em auto;
	  }

	  .main-agileinfo {
	    width: 36%;
	  }
	}

	@media(max-width:1280px) {
	  .main-agileinfo {
	    width: 40%;
	  }
	}

	@media(max-width:1080px) {
	  .main-agileinfo {
	    width: 46%;
	  }
	}

	@media(max-width:1024px) {
	  .main-agileinfo {
	    width: 49%;
	  }
	}

	@media(max-width:991px) {
	  h1 {
	    font-size: 2.4em;
	  }

	  .main-w3layouts {
	    padding: 2em 0 1em;
	  }
	}

	@media(max-width:900px) {
	  .main-agileinfo {
	    width: 58%;
	  }

	  input[type="text"], input[type="email"], input[type="password"] {
	    width: 30%;
	  }
	}

	@media(max-width:800px) {
	  h1 {
	    font-size: 2.2em;
	  }
	}

	@media(max-width:736px) {
	  .main-agileinfo {
	    width: 62%;
	  }
	}

	@media(max-width:667px) {
	  .main-agileinfo {
	    width: 67%;
	  }
	}

	@media(max-width:600px) {
	  /*.agileits-top {*/
	  /*  padding: 2.2em;*/
	  /*}*/

	  input.email, input.text.w3lpass {
	    margin: 1.5em 0;
	  }

	  input[type="submit"] {
	    margin: 2em 0;
	  }

	  h1 {
	    font-size: 2em;
	    letter-spacing: 3px;
	  }
	}

	@media(max-width:568px) {
	  .main-agileinfo {
	    width: 75%;
	  }

	  .colorlibcopy-agile p {
	    padding: 0 2em;
	  }
	}

	@media(max-width:480px) {
	  h1 {
	    font-size: 1.8em;
	    letter-spacing: 3px;
	  }

	  input[type="text"], input[type="email"], input[type="password"] {
	    width: 30%;
	  }

	  .agileits-top p {
	    font-size: 0.9em;
	  }
	}

	@media(max-width:414px) {
	  h1 {
	    font-size: 1.8em;
	    letter-spacing: 2px;
	  }

	  .main-agileinfo {
	    width: 85%;
	    margin: 1.5em auto;
	  }

	  .text:focus, .text:valid {
	    background-position: 0 0px;
	  }

	  .wthree-text ul li, .wthree-text ul li:nth-child(2) {
	    display: block;
	    float: none;
	  }

	  .wthree-text ul li:nth-child(2) {
	    margin-top: 1.5em;
	  }

	  input[type="submit"] {
	    margin: 2em 0 1.5em;
	    letter-spacing: 3px;
	  }

	  input[type="submit"] {
	    margin: 2em 0 1.5em;
	  }

	  .colorlibcopy-agile {
	    margin: 1em 0 1em;
	  }
	}

	@media(max-width:384px) {
	  .main-agileinfo {
	    width: 88%;
	  }

	  .colorlibcopy-agile p {
	    padding: 0 1em;
	  }
	}

	@media(max-width:375px) {
	  .agileits-top p {
	    letter-spacing: 0px;
	  }
	}

	@media(max-width:320px) {
	  .main-w3layouts {
	    padding: 1.5em 0 0;
	  }

	  .agileits-top {
	    padding: 1.2em;
	  }

	  .colorlibcopy-agile {
	    margin: 0 0 1em;
	  }

	  input[type="text"], input[type="email"], input[type="password"] {
	    width: 30%;
	    font-size: 0.85em;
	  }

	  h1 {
	    font-size: 1.7em;
	    letter-spacing: 0px;
	  }

	  .main-agileinfo {
	    width: 92%;
	    margin: 1em auto;
	  }

	  .text:focus, .text:valid {
	    background-position: 0 0px;
	  }

	  input[type="submit"] {
	    margin: 1.5em 0;
	    padding: 0.8em;
	    font-size: .85em;
	  }

	  .colorlibcopy-agile p {
	    font-size: .85em;
	  }

	  .wthree-text label {
	    font-size: 0.85em;
	  }

	  .main-w3layouts {
	    padding: 1em 0 0;
	  }
	  select {
	  	border:1px solid black!important;
	  }
	}
	.btn-default {
	    color: #000!important;
	    background: none;
	    border-color: #ccc;
    }
    .form {
        padding-right:40px!important;
        padding-left:40px!important;
    }
	@media(max-width:450px) {
        .form{
            padding-right: 20px!important;
            padding-left: 20px!important;
        }
	}
	.date-dropdowns select{
	    border:solid 1px rgba(255, 255, 255, 0.37)!important;
	}
	input{
	   color:black;
	}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: black;
  font-weight:500;
  opacity: 1; /* Firefox */
}	
input:-internal-autofill-selected {
    background-color: rgb(232, 240, 254) !important;
    background-image: none !important;
    color: rgb(0, 0, 0) !important;
}	
</style>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<style>
    .modal-content{
        width:750px!important;
    }
    .modal-title{
        text-align: center;
    }
     .modal-body{
        width: 750px;
    }
    .btn_submit{
        margin-top: 25px;
        width: 320px;
        height: 40px;
        border-radius: 10px;
        background-color:#F29620;
        border:0;
    }

</style>
<!------------------------->
<!---------signin---------->
<style>
    .modal-content{
        width:350px;
    }
    .modal-title{
        text-align: center;
    }
    .modal-header{
        display: block!important;
    }
    .modal-header h5{
        color: black;
    }
    .modal-body h4{
        color: black!important;
    }
    .modal-body{
        width: 350px;
    }
    .btn_submit{
        margin-top: 25px;
        width: 320px;
        height: 40px;
        border-radius: 10px;
        background-color:#F29620;
        border:0;
    }
    .inputfield{
        width: 100%;
        border-width: 0;
        border-bottom: 1px solid black;
    }
    input[type=text]:focus, input[type=password]:focus {
        background-color: #fff;
        outline: none;
    }
    .navbar-nav .nav-item .nav-link {
        font-size: 19px;
        padding-right: 0px;
        text-align:center;
    }
	@media(max-width:992px) {
        .navbar-nav .nav-item .nav-link {
            text-align:left;
        }
	}    
</style>
<!------------------------->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top ">
    <a class="navbar-brand" href="{{url('challenges/my')}}"><img src={{asset("images/Logo-Horizontal-Small.gif")}} style="width:200px;"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto" style="">
            <li class="nav-item {{ Request::is('landing') ? 'active' : '' }}" style="width:60px;">
                <a class="nav-link" href="{{url('/landing')}}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('best_images') ? 'active' : '' }}" style="width:150px;">
                <a class="nav-link" href="{{url('best_images')}}">Best Images<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item {{ Request::is('info_page') ? 'active' : '' }}" style="width:120px;">
                <a class="nav-link" href="{{url('info_page')}}">Info Page<span class="sr-only">(current)</span></a>
            </li>
 
            <li class="nav-item {{ Request::is('gallary_images') ? 'active' : '' }}" style="width:80px;">
                <a class="nav-link" href="{{url('gallary_images')}}">Gallery<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="blog" style="width:60px;">Blog</a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="#">Discover</a>-->
            <!--</li>-->
            <!--<li id="last" class="nav-item">-->
            <!--    <a class="nav-link" href="#">Articles</a>-->
            <!--</li>-->
            <div id="rightbutton" class="form-inline mt-2 mt-md-0" >
                <a id="first" href='signin' data-toggle="modal" data-target="#signindlg"><button class="btn-1">SIGN IN<i class='fas fa-user-check' style='font-size:18px;margin-left:5px;'></i></button></a>
                <a href='#' data-toggle="modal" data-target="#signupdlg"><button class="btn-1">SIGN UP<i class='fas fa-user-edit' style='font-size:18px;margin-left:5px;'></i></button></a>
            </div>
        </ul>


    </div>


</nav>
<!---------sign up----------->
<div class="modal animate fade" id="signupdlg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:10px;background:none;">

	<div class="main-agileinfo" style="background-image: url({{asset('images/signupnew.jpg')}});width:100%;background:#fff;margin:0;border-radius:10px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:5px;left:-10px;color:white;">
            <span aria-hidden="true">&times;</span>
        </button>
			<div class="agileits-top">
			    <div class="form">
  				    <input class="text" type="text" id="name" name="Username" placeholder="Full Name" style="width:100%;background:none;color:black;"  required="">
					<input class="text email" id="email" style="width:100%;color:black;" type="email" name="email0" placeholder="Email" required="">

					<input class="phone" id="phone" type="text" name="Phonenumber" placeholder="Phone Number" style="width:100%;margin-bottom: 1.5em;color:black;" required="">
					<div class="example" style="width:100%;">
						<input type="hidden" id="example4" style="background:none;color:black;">
					</div>
				    <div class="form-group" style="width:170px;float: left;background:none;color:black">
				        <div id="basic" data-input-name="country"></div>
				    </div>
				    <input class="city" id="city" type="text" name="City" placeholder="City" style="width: calc(100% - 180px);margin-left: 10px;float: left;padding: 0.65em;background:none;color:black;" required="">										
					<input class="text" type="password" id="pass1" name="password" placeholder="Password (At Least 8 Characters)" style="width:100%;background:none;color:black;" required="">
					<input class="text w3lpass" id="pass2" type="password"  name="password" style="width:100%;background:none;color:black;" placeholder="Confirm Password" required="">
	
     				<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" id="terms_conditions" class="checkbox" style="float: left;position: relative;top: 1px!important;left:-10px;" required="">
							<a href="{{url('term_conditions')}}" style="color:black;font-weight:500;">Agree To The Terms & Conditions</a>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" id="submit_btn" style="color:black;font-weight:600;background:orange;" value="SIGN UP">
				<p style="color:black;font-weight:500;">Have An Account?<a id="second" href='signin' data-toggle="modal" data-target="#signindlg" style="color:black;margin-left:10px;">Log In Now!</a></p>
			</div>
		</div>
	</div>


        </div>
    </div>
</div>
<!---------->
<!---------signin1---------->
<div class="modal animate fade" id="signindlg0" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content" style="width:350px!important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">SIGN IN</h5>
            </div>
            <div class="modal-body">
                <div >
                    <div class="form-group" style="width:100%">
                        <label for="inputEmail3">Email</label>
                        <input id="email10" type="email" style="width:100%;border:1px solid gray;color:black!important;" name="email" class="form-control"  placeholder="email@gmail.com" required="">
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="inputPassword3">Password</label>
                        <input id="password10" type="password" style="width:100%;border:1px solid gray;color:black!important;" name="password" class="form-control"  placeholder="password (At least 6 Characters)" title="At least 6 characters with letters and numbers" required="">
                    </div>
                    <a href="#" id="forgot_pass">Forgot password.</a>
                    <div class="form-group" style="width:100%">
                        <button type="submit" id="submit_btn0" class="btn_submit" >Log in</button>
                    </div>
                   <!-- <div class="form-group" style="width:100%">-->
                   <!--<button class="btn btn-outline-dark w-100 close_model" data-toggle="modal" style="width:100%" data-target="#signupdlg">SIGN UP<i class="fas fa-user-edit" style="font-size:18px;margin-left:5px;"></i></button>-->
                   <!-- </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!---------signin----------->
<div class="modal animate fade" id="signindlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content" style="width:350px!important;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">SIGN IN</h5>
            </div>
            <div class="modal-body">
                <div >
                    <div class="form-group" style="width:100%">
                        <label for="inputEmail3">Email</label>
                        <input id="email1" type="email" style="width:100%;border:1px solid gray;color:black!important;" name="email" class="form-control"  placeholder="email@gmail.com" required="">
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="inputPassword3">Password</label>
                        <input id="password1" type="password" style="width:100%;border:1px solid gray;color:black!important;" name="password" class="form-control"  placeholder="password (At least 6 Characters)" title="At least 6 characters with letters and numbers" required="">
                    </div>
                    <a href="#" id="forgot_pass1">Forgot password.</a>
                    <div class="form-group" style="width:100%">
                        <button type="submit" id="submit_btn1" class="btn_submit" >Log in</button>
                    </div>
                   <!-- <div class="form-group" style="width:100%">-->
                   <!--<button class="btn btn-outline-dark w-100 close_model" data-toggle="modal" style="width:100%" data-target="#signupdlg">SIGN UP<i class="fas fa-user-edit" style="font-size:18px;margin-left:5px;"></i></button>-->
                   <!-- </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="width:300px;margin:auto;">
  <button type="button" id="verify1" class="btn btn-info btn-lg" data-toggle="modal" style="display:none;" data-target="#myModal00">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal00" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:300px!important;">
        <div class="modal-header" style="height:40px!important;">
          <button type="button" id="close-btn" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="width:300px!important;">
          <p>Please enter your 6-digits code here. We have already sent it to your email.</p>
          <input type="text" id="vc-code" placeholder="6-digits code here..." style="width:150px;height:35px;border-radius:4px;border: 1px solid gray;padding:8px;margin:auto;color:black;">
        </div>
        <div class="modal-footer">
          <button type="button" id="submit_verify" style="width:100px;height:35px;background:#00cc66;border:1px solid #00cc66;border-radius:5px;margin:auto;color:white;">Sumbit</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div class="container" style="width:300px!important;margin:auto;">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" id="forgot-pass-modal" style="display:none;"></button>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width:300px!important;margin:auto;">
        <div class="modal-header" style="height:50px;">
            
          <button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Forgot Password.</h4>
        </div>
        <div class="modal-body" style="width:300px!important;margin:auto;margin-bottom:0px!important;">
          <label>Enter your email here.</label>
          <input type="email" id="forgot-pass" placeholder="email@example.com" style="width:150px;height:35px;border-radius:4px;border: 1px solid gray;padding:8px;margin:auto;color:gray!important;">
          <label>We will email your password.</label>

        </div>
        <div class="modal-footer" style="height:50px;">
          <button type="button" id="submit_pass" style="width:100px;height:30px;border:1px solid green;background-color:green;color:white;margin:auto;position:relative;top:-10px">Send</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-----------end------------>
<!-----signup part----->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.js"></script> 
<script type="text/javascript">
	!function(a,b,c,d){"use strict";function e(b,c){return this.element=b,this.$element=a(b),this.config=a.extend({},g,c),this.internals={objectRefs:{}},this.init(),this}var f="dateDropdowns",g={defaultDate:null,defaultDateFormat:"yyyy-mm-dd",displayFormat:"dmy",submitFormat:"yyyy-mm-dd",minAge:0,maxAge:120,minYear:null,maxYear:null,submitFieldName:"date",wrapperClass:"date-dropdowns",dropdownClass:null,daySuffixes:!0,monthSuffixes:!0,monthFormat:"long",required:!1,dayLabel:"Day",monthLabel:"Month",yearLabel:"Year",monthLongValues:["January","February","March","April","May","June","July","August","September","October","November","December"],monthShortValues:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],initialDayMonthYearValues:["Day","Month","Year"],daySuffixValues:["st","nd","rd","th"]};a.extend(e.prototype,{init:function(){this.checkForDuplicateElement(),this.setInternalVariables(),this.setupMarkup(),this.buildDropdowns(),this.attachDropdowns(),this.bindChangeEvent(),this.config.defaultDate&&this.populateDefaultDate()},checkForDuplicateElement:function(){return!a('input[name="'+this.config.submitFieldName+'"]').length||(a.error("Duplicate element found"),!1)},setInternalVariables:function(){var a=new Date;this.internals.currentDay=a.getDate(),this.internals.currentMonth=a.getMonth()+1,this.internals.currentYear=a.getFullYear()},setupMarkup:function(){var b,c;if("input"===this.element.tagName.toLowerCase()){this.config.defaultDate||(this.config.defaultDate=this.element.value),c=this.$element.attr("type","hidden").wrap('<div class="'+this.config.wrapperClass+'"></div>');var d=this.config.submitFieldName!==g.submitFieldName,e=this.element.hasAttribute("name");e||d?d&&this.$element.attr("name",this.config.submitFieldName):this.$element.attr("name",g.submitFieldName),b=this.$element.parent()}else c=a("<input/>",{type:"hidden",name:this.config.submitFieldName}),this.$element.append(c).addClass(this.config.wrapperClass),b=this.$element;return this.internals.objectRefs.pluginWrapper=b,this.internals.objectRefs.hiddenField=c,!0},buildDropdowns:function(){var a,b,c;return e.message={day:this.config.initialDayMonthYearValues[0],month:this.config.initialDayMonthYearValues[1],year:this.config.initialDayMonthYearValues[2]},a=this.buildDayDropdown(),this.internals.objectRefs.dayDropdown=a,b=this.buildMonthDropdown(),this.internals.objectRefs.monthDropdown=b,c=this.buildYearDropdown(),this.internals.objectRefs.yearDropdown=c,!0},attachDropdowns:function(){var a=this.internals.objectRefs.pluginWrapper,b=this.internals.objectRefs.dayDropdown,c=this.internals.objectRefs.monthDropdown,d=this.internals.objectRefs.yearDropdown;switch(this.config.displayFormat){case"mdy":a.append(c,b,d);break;case"ymd":a.append(d,c,b);break;case"dmy":default:a.append(b,c,d)}return!0},bindChangeEvent:function(){var a=this.internals.objectRefs.dayDropdown,b=this.internals.objectRefs.monthDropdown,c=this.internals.objectRefs.yearDropdown,d=this,e=this.internals.objectRefs;e.pluginWrapper.on("change","select",function(){var f,g,h=a.val(),i=b.val(),j=c.val();return(f=d.checkDate(h,i,j))?(e.dayDropdown.addClass("invalid"),!1):("00"!==e.dayDropdown.val()&&e.dayDropdown.removeClass("invalid"),e.hiddenField.val(""),f||h*i*j===0||(g=d.formatSubmitDate(h,i,j),e.hiddenField.val(g)),void e.hiddenField.change())})},populateDefaultDate:function(){var a=this.config.defaultDate,b=[],c="",d="",e="";switch(this.config.defaultDateFormat){case"yyyy-mm-dd":default:b=a.split("-"),c=b[2],d=b[1],e=b[0];break;case"dd/mm/yyyy":b=a.split("/"),c=b[0],d=b[1],e=b[2];break;case"mm/dd/yyyy":b=a.split("/"),c=b[1],d=b[0],e=b[2];break;case"unix":b=new Date,b.setTime(1e3*a),c=b.getDate()+"",d=b.getMonth()+1+"",e=b.getFullYear(),c.length<2&&(c="0"+c),d.length<2&&(d="0"+d)}return this.internals.objectRefs.dayDropdown.val(c),this.internals.objectRefs.monthDropdown.val(d),this.internals.objectRefs.yearDropdown.val(e),this.internals.objectRefs.hiddenField.val(a),!0===this.checkDate(c,d,e)&&this.internals.objectRefs.dayDropdown.addClass("invalid"),!0},buildBaseDropdown:function(b){var c=b;return this.config.dropdownClass&&(c+=" "+this.config.dropdownClass),a("<select></select>",{class:c,name:this.config.submitFieldName+"_["+b+"]",required:this.config.required})},buildDayDropdown:function(){var a,b=this.buildBaseDropdown("day"),d=c.createElement("option");d.setAttribute("value",""),d.appendChild(c.createTextNode(this.config.dayLabel)),b.append(d);for(var e=1;e<10;e++)a=this.config.daySuffixes?e+this.getSuffix(e):"0"+e,d=c.createElement("option"),d.setAttribute("value","0"+e),d.appendChild(c.createTextNode(a)),b.append(d);for(var f=10;f<=31;f++)a=f,this.config.daySuffixes&&(a=f+this.getSuffix(f)),d=c.createElement("option"),d.setAttribute("value",f),d.appendChild(c.createTextNode(a)),b.append(d);return b},buildMonthDropdown:function(){var a=this.buildBaseDropdown("month"),b=c.createElement("option");b.setAttribute("value",""),b.appendChild(c.createTextNode(this.config.monthLabel)),a.append(b);for(var d=1;d<=12;d++){var e;switch(this.config.monthFormat){case"short":e=this.config.monthShortValues[d-1];break;case"long":e=this.config.monthLongValues[d-1];break;case"numeric":e=d,this.config.monthSuffixes&&(e+=this.getSuffix(d))}d<10&&(d="0"+d),b=c.createElement("option"),b.setAttribute("value",d),b.appendChild(c.createTextNode(e)),a.append(b)}return a},buildYearDropdown:function(){var a=this.config.minYear,b=this.config.maxYear,d=this.buildBaseDropdown("year"),e=c.createElement("option");e.setAttribute("value",""),e.appendChild(c.createTextNode(this.config.yearLabel)),d.append(e),a||(a=this.internals.currentYear-(this.config.maxAge+1)),b||(b=this.internals.currentYear-this.config.minAge);for(var f=b;f>=a;f--)e=c.createElement("option"),e.setAttribute("value",f),e.appendChild(c.createTextNode(f)),d.append(e);return d},getSuffix:function(a){var b="",c=this.config.daySuffixValues[0],d=this.config.daySuffixValues[1],e=this.config.daySuffixValues[2],f=this.config.daySuffixValues[3];switch(a%10){case 1:b=a%100===11?f:c;break;case 2:b=a%100===12?f:d;break;case 3:b=a%100===13?f:e;break;default:b="th"}return b},checkDate:function(a,b,c){var d;if("00"!==b){var e=new Date(c,b,0).getDate(),f=parseInt(a,10);d=this.updateDayOptions(e,f),d&&this.internals.objectRefs.hiddenField.val("")}return d},updateDayOptions:function(a,b){var d=parseInt(this.internals.objectRefs.dayDropdown.children(":last").val(),10),e="",f="",g=!1;if(d>a){for(;d>a;)this.internals.objectRefs.dayDropdown.children(":last").remove(),d--;b>a&&(g=!0)}else if(d<a)for(;d<a;){e=++d,f=e,this.config.daySuffixes&&(f+=this.getSuffix(d));var h=c.createElement("option");h.setAttribute("value",e),h.appendChild(c.createTextNode(f)),this.internals.objectRefs.dayDropdown.append(h)}return g},formatSubmitDate:function(a,b,c){var d,e;switch(this.config.submitFormat){case"unix":e=new Date,e.setDate(a),e.setMonth(b-1),e.setYear(c),d=Math.round(e.getTime()/1e3);break;default:d=this.config.submitFormat.replace("dd",a).replace("mm",b).replace("yyyy",c)}return d},destroy:function(){var a=this.config.wrapperClass;if(this.$element.hasClass(a))this.$element.empty();else{var b=this.$element.parent(),c=b.find("select");this.$element.unwrap(),c.remove()}}}),a.fn[f]=function(b){return this.each(function(){if("string"==typeof b){var c=Array.prototype.slice.call(arguments,1),d=a.data(this,"plugin_"+f);if("undefined"==typeof d)return a.error("Please initialize the plugin before calling this method."),!1;d[b].apply(d,c)}else a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))}),this}}(jQuery,window,document);


	/*inicializar*/
	$(document).ready(function() {
	  $("#example4").dateDropdowns({
	    submitFieldName: 'example4',
	    minAge: 18
	  });
	 
	                
		// Set all hidden fields to type text for the demo
		$('input[type="hidden"]').attr('type', 'text').attr('readonly', 'readonly').attr('placeholder', 'Min. Age 18');
	});

	
</script>
<script>
     $('#second').click(function(){
        $('#signupdlg').modal('toggle');
     });   
</script>
<!--Country file-->
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Country-Selecter-with-Flags-flagstrap/dist/js/jquery.flagstrap.js"></script>
<script type="text/javascript">
    $('#basic').flagStrap();

	$('.select-country').flagStrap({
		countries: {
			"US": "USD",
			"AU": "AUD",
			"CA": "CAD",
			"SG": "SGD",
			"GB": "GBP",
		},
		buttonSize: "btn-sm",
		buttonType: "btn-info",
		labelMargin: "10px",
		scrollable: false,
		scrollableHeight: "250px"
	});

	$('#advanced').flagStrap({
		buttonSize: "btn-lg",
		buttonType: "btn-primary",
		labelMargin: "20px",
		scrollable: false,
		scrollableHeight: "250px"
	});	
</script>
<!---------->
<script>
    var name;
    var mobile_number;
    var email ;
    var password ;
    var age;
    var vc;
    // var login=function(){
    //     var request=$.ajax({
    //         url: '{{url('register1')}}',
    //         type: 'post',
    //         data: { vc: vc, email:email} ,

    //         beforeSend: function (request) {
    //             return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
    //         },
    //         success: function(response){
    //             console.log(obj);
    //             var obj = JSON.parse(response);
    //             alert(obj.message);
    //             switch (obj.state) {
    //                 case 1:
    //                     $('#verifydlg').modal('toggle');
    //                     //$('#verifydlg').modal('show');
    //                     break;
    //                 default:
    //                     break;
    //             }
    //             console.log(response);
    //         },
    //         error: function(response){
    //             console.log(response);
    //             alert('error');
    //         }
    //     });

    //     request.done(function(data) {
    //         // your success code here
    //     });
    //     request.fail(function(jqXHR, textStatus) {
    //         // your failure code here
    //     });
    // };


    var sendvc=function(){
        var request=$.ajax({
            url: '{{url('sendvc1')}}',
            type: 'post',
            data: { name: name, mobile_number : mobile_number ,email:email,password:password,age:age,country:country,city:city} ,

            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                console.log(obj);
                var obj = JSON.parse(response);
                alert(obj.message);
                switch (obj.state) {
                    case 1:
                        $('#signupdlg').modal('toggle');
                        // $('#verifydlg').modal('show');
                        $('#alertmessage').attr('value', "Success Signup");
                        // $('#signindlg').modal('toggle');
                        $('#alert_message_dlg').attr('class', 'modal fade animate');
                        // $('#alert_message_dlg').modal('show');
                        // setTimeout(function() {
                        //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                        //     $('#alert_message_dlg').modal('toggle');
                        // }, 1000);
                        break;                    
                    case 200:
                        $('#signupdlg').modal('toggle');
                        // $('#verifydlg').modal('show');
                        $('#alertmessage').attr('value', "Email in use");
                        // $('#signindlg').modal('toggle');
                        $('#alert_message_dlg').attr('class', 'modal fade animate');
                        // $('#alert_message_dlg').modal('show');
                        // setTimeout(function() {
                        //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                        //     $('#alert_message_dlg').modal('toggle');
                        // }, 1000);
                        break;
                    case 202:
                         $('#signupdlg').modal('toggle');
                        // $('#verifydlg').modal('show');
                        $('#alertmessage').attr('value', "Failed:The age must be more than 18");
                        // $('#signindlg').modal('toggle');
                        $('#alert_message_dlg').attr('class', 'modal fade animate');
                        // $('#alert_message_dlg').modal('show');
                        // setTimeout(function() {
                        //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                        //     $('#alert_message_dlg').modal('toggle');
                        // }, 1000);
                        break;                           
                    default:
                        break;
                }

                console.log(response);


            },
            error: function(response){
                
                // console.log(response);
                 alert('error');
                $('#signupdlg').modal('toggle');
                // $('#verifydlg').modal('show');
                $('#alertmessage').attr('value', "Error");
                // $('#signindlg').modal('toggle');
                $('#alert_message_dlg').attr('class', 'modal fade animate');
                // $('#alert_message_dlg').modal('show');
                setTimeout(function() {
                    $('#alert_message_dlg').attr('class', 'modal fade animateout');
                    $('#alert_message_dlg').modal('toggle');
                }, 1500);
            }
        });

        request.done(function(data) {
            // your success code here
        });

        request.fail(function(jqXHR, textStatus) {
            // your failure code here
        });
    };
    $('#submit_btn').click(function(){
        name = $('#name').val();
        mobile_number = $('#phone').val();
        email = $('#email').val();
        country=$('#basic option:selected').text();
        city=$('#city').val();
        password =$('#pass1').val();
        password2 =$('#pass2').val();
        age =$('#example4').val();
        // alert(name);
        
        if((password != password2) || password.length < 8){
            alert('Incorrect password.');return;
        }
        if(!name || !mobile_number || !email || !password || !age || !country || !city) {
            alert("Input your information correctly");
            return;
        }
        if( ! $('#terms_conditions').prop('checked')){
        	alert('You have to Agree terms and conditions');
        	return;
        }
        sendvc();
        //$('#signupdlg').modal('toggle');
        //$('#verifydlg').modal('show');
    });
    

</script>
<!-------end-------------->
<!----------signin------------>
<script type="text/javascript">
$(document).ready(function(){
    $('.close_model').on('click',function(){
         $('#signindlg').modal('toggle');
    });
});
</script>

<script>
    var input = document.getElementById("password1");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById("submit_btn1").click();
      }
    });
</script>
<script>
    $('#forgot_pass1').click(function(){
        $('#forgot-pass-modal').click();
         $('#signindlg').modal('toggle');
    });
    $('#forgot_pass').click(function(){
        $('#forgot-pass-modal').click();
         $('#signindlg0').modal('toggle');
    });    
    $('#submit_pass').click(function(){
        var email = $('#forgot-pass').val();
        if(email != ""){
            var request = $.ajax({
                url: '{{url('forgot_password')}}',
                type: 'post',
                data: {email:email},
    
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    //console.log(response);
                    var obj = JSON.parse(response);
                     alert(obj.message);
                     
                    window.location.replace('{{url('challenges/my')}}');
    
                    
                },
                error: function (response) {
                    console.log(response);
                    alert('error');
    
                }
            });             
        }else{
            alert('Please enter correctly.');
        }
    });    
</script>
<script>
    $('#submit_verify').click(function(){
        var email = $('#email1').val();
        var password = $('#password1').val();
        var vc1= $('#vc-code').val();
        var request = $.ajax({
            url: '{{url('register1')}}',
            type: 'post',
            data: {email:email,password:password,vc1:vc1},

            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (response) {
                //console.log(response);
                var obj = JSON.parse(response);
                if(obj.state == '1'){
                    setCookie('email',email,60);
    //                setCookie(email,obj.data,60);
                    setCookie('id',obj['data']['no'],60);                     
                    window.location.replace('{{url('challenges/my')}}');

                }else{
                    alert('Invalid verification code!');
                    $('#close-btn').click();
                    $('#signindlg').modal('toggle');
                }
                //$('#boost_dlg').modal('toggle');
                //  alert(obj.message);
                //$('#signindlg').modal('toggle');
                //   console.log(obj);

                
            },
            error: function (response) {

                console.log(response);
                alert('error');

            }
        });        
        
    });
    $('#submit_btn0').click(function(){
        var email = $('#email10').val();
        var password = $('#password10').val();
        if(!email || !password) {
            alert("Input your information correctly");
            return;
        }
        //alert(" correctly");
        var request = $.ajax({
            url: '{{url('login1')}}',
            type: 'post',
            data: { email:email,password:password} ,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                console.log(response);
                var obj = JSON.parse(response);
                //alert('correctly');
                //alert(obj.message);
    
                check_state = obj.state;
                if(check_state == '1'){
                setCookie('email',email,60);
//                setCookie(email,obj.data,60);
                setCookie('id',obj['data']['no'],60);                    
                    window.location.replace('{{url('/shop')}}');
                }
                else if(check_state == '400'){
                   // alert(obj.message);
                    $('#verify1').click();
                }else{
                    alert(obj.message);
                }
                $('#alertmessage').attr('value', obj.message);
                $('#signindlg0').modal('toggle');
                //$('#alert_message_dlg').attr('class', 'modal fade animate');
                // $('#alert_message_dlg').modal('show');
                // setTimeout(function() {
                //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                //     $('#alert_message_dlg').modal('toggle');
                //     console.log(obj);
                //     setCookie('email',email,60);
                //     // setCookie(email,obj.data,60);
                //     setCookie('id',obj['data']['no'],60);
                //     window.location.replace('{{url('challenges/my')}}');
                // }, 1000);
                
                // console.log(obj);
                // setCookie('email',email,60);
                // // setCookie(email,obj.data,60);
                // setCookie('id',obj['data']['no'],60);
                // window.location.replace('{{url('challenges/my')}}');
            },
            error: function(response){
                console.log(response);
                alert('error');
            }
        });
        request.done(function(data) {
            // your success code here
        });
        request.fail(function(jqXHR, textStatus) {
            // your failure code here
        });
    });    
    $('#submit_btn1').click(function(){
        var email = $('#email1').val();
        var password = $('#password1').val();
        if(!email || !password) {
            alert("Input your information correctly");
            return;
        }
        //alert(" correctly");
        var request = $.ajax({
            url: '{{url('login1')}}',
            type: 'post',
            data: { email:email,password:password} ,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(response){
                console.log(response);
                var obj = JSON.parse(response);
                //alert('correctly');
                //alert(obj.message);
    
                check_state = obj.state;
                if(check_state == '1'){
                setCookie('email',email,60);
//                setCookie(email,obj.data,60);
                setCookie('id',obj['data']['no'],60);                    
                    window.location.replace('{{url('challenges/my')}}');
                }
                else if(check_state == '400'){
                   // alert(obj.message);
                    $('#verify1').click();
                }else{
                    alert(obj.message);
                }
                $('#alertmessage').attr('value', obj.message);
                $('#signindlg').modal('toggle');
                $('#alert_message_dlg').attr('class', 'modal fade animate');
                // $('#alert_message_dlg').modal('show');
                // setTimeout(function() {
                //     $('#alert_message_dlg').attr('class', 'modal fade animateout');
                //     $('#alert_message_dlg').modal('toggle');
                //     console.log(obj);
                //     setCookie('email',email,60);
                //     // setCookie(email,obj.data,60);
                //     setCookie('id',obj['data']['no'],60);
                //     window.location.replace('{{url('challenges/my')}}');
                // }, 1000);
                
                // console.log(obj);
                // setCookie('email',email,60);
                // // setCookie(email,obj.data,60);
                // setCookie('id',obj['data']['no'],60);
                // window.location.replace('{{url('challenges/my')}}');
            },
            error: function(response){
                console.log(response);
                alert('error');
            }
        });
        request.done(function(data) {
            // your success code here
        });
        request.fail(function(jqXHR, textStatus) {
            // your failure code here
        });
    });
    function setCookie(cname,cvalue,exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>
<!------------end------------->

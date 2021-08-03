
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="modal fade" id="alert_message_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content alert_content">
            <div class="modal-header alert_header">
                
                <h4 class="modal-title alert_title" id="join_challenge_title"  >Message</h4>

            </div>
            <div class="modal-body alert_body">
                <div >
                    <div class="form-group row" id="send_email_d">
                	    <input type="text"  id="alertmessage" value="" style="text-align:center;border:none;width: 100%;height: 30px;"/>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
	.animate {
	  -webkit-animation: animatezoom 1s;
	  animation: animatezoom 1s
	}
	@-webkit-keyframes animatezoom {
	  from {-webkit-transform: scale(0)} 
	  to {-webkit-transform: scale(1)}
	}
	  
	@keyframes animatezoom {
	  from {transform: scale(0)} 
	  to {transform: scale(1)}
	}
	.animateout {
	  -webkit-animation: animatezoomout 1s;
	  animation: animatezoomout 1s
	}
	@-webkit-keyframes animatezoomout {
	  from {-webkit-transform: scale(1)} 
	  to {-webkit-transform: scale(0)}
	}
	  
	@keyframes animatezoomout {
	  from {transform: scale(1)} 
	  to {transform: scale(0)}
	}
	.alert_header{
	    padding: 2px!important;
	    padding-left: 20px!important;
	}
	#send_email_d {
		text-align: center;
	    margin: 0;
	    height: 40px;
	    font-size: 20px;
	}
	.message{
		padding: 20px 20px 0 20px;
		margin-bottom: 0px;
	}
    .alert_content{
        width:450px!important;
        margin: auto!important;
    }
    .alert_title{
        text-align: center;
    }
    .alert_header{
        display: block!important;
    }
    .alert_header h5{
        color: black;
    }
    .alert_body h4{
        color: black;

    }
    .alert_body{
        width: 350px!important;
    }
    /*.alert_button{*/
    /*   padding: 0;*/
    /*    position: absolute;*/
    /*    top: 20px;*/
    /*    right: 20px; */
    /*}*/
        
    /*.btn_submit{*/

    /*    margin-top: 25px;*/
    /*    width: 130px!important;*/
    /*    height: 30px!important;*/
    /*    padding-right: 10px!important;*/
    /*    padding-left: 10px!important;*/
    /*    border-radius: 5px!important;*/
    /*    background-color:#218ccc!important;*/
    /*    border:0;*/
    /*}*/
 /*   form .row{}*/
 /*   .inputfield{*/
 /*       width: 100%;*/
 /*       border-width: 0;*/
 /*       border-bottom: 1px solid #218ccc;*/
 /*   }*/
 /*   input[type=email] {*/
 /*       background-color: #fff;*/
 /*       outline: none;*/
 /*       width: 70%;*/
 /*       font-size:20px;*/
 /*       border: none;*/
 /*       border-bottom: 1px solid #ccc;*/
 /*       padding-left: 10px;*/
 /*       margin-left: 5px;*/

 /*   }*/
 /*   input ~ .focus-border {*/
 /*   	position: absolute; */
 /*   	top: 55px; */
 /*   	left: 50%; */
 /*   	width: 0; */
 /*   	height: 2px; */
 /*   	background-color: #3399FF; */
 /*   	transition: 0.4s;*/
 /*   }*/
	/*input:focus ~ .focus-border{*/
	/*	width: 70%; */
	/*	transition: 0.4s; */
	/*	left: 0;*/
		/*width: 75%;*/
	/*    left: 75px;*/
	/*}*/
 /*   form{*/
 /*       padding-right: 10px!important;*/
 /*       padding-left: 10px!important;*/
 /*   }*/
 /*   .sub{*/
 /*   	float: right;*/
 /*   	padding-right: 20px;*/
 /*   }*/
</style>

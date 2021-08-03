
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="modal fade" id="send_message_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content animate">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="join_challenge_title"  >Invite friends from</h5>

            </div>
            <div class="modal-body">
                <div >
                    <!-- <div class="form-group">
                        <h6 id="join_challenge_description">
                           
                        </h6>
                      
                    </div> -->
	               
	                    <div class="form-group row" id="send_email_d">
	                    	<p>Email:</p>
	                    	<input type="email" name="email" id="to_email" required/>
	                    	<span class="focus-border"></span>
	                    	
	                    </div>
<!-- 	                    <div class="form-group row message">
	                    	<textarea name="text" rows="10" cols="50" maxlength="500" placeholder="Enter text here..."></textarea>
	                    </div> -->
	                    <div class="sub">
							<button type="submit" id="send_email" class="btn_submit "  style="color:white ">Invite</button>
	                        
	                    </div>
	                

                </div>
            </div>

        </div>
    </div>
</div>
<style>
	.animate {
	  -webkit-animation: animatezoom 0.6s;
	  animation: animatezoom 0.6s
	}
	@-webkit-keyframes animatezoom {
	  from {-webkit-transform: scale(0)} 
	  to {-webkit-transform: scale(1)}
	}
	  
	@keyframes animatezoom {
	  from {transform: scale(0)} 
	  to {transform: scale(1)}
	}
	#send_email_d {
		text-align: center;
	    margin: 0;
	    height: 40px;
	    font-size: 25px;
	}
	.message{
		padding: 20px 20px 0 20px;
		margin-bottom: 0px;
	}
    .modal-content{
        width:350px;
        margin: auto;
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
        color: black;

    }
    .modal-body{
        width: 350px;
    }
    .btn_submit{

        margin-top: 25px;
        width: 130px!important;
        height: 30px!important;
        padding-right: 10px!important;
        padding-left: 10px!important;
        border-radius: 5px!important;
        background-color:#218ccc!important;
        border:0;
    }
    form .row{}
    .inputfield{
        width: 100%;
        border-width: 0;
        border-bottom: 1px solid #218ccc;
    }
    input[type=email] {
        background-color: #fff;
        outline: none;
        width: 70%;
        font-size:20px;
        border: none;
        border-bottom: 1px solid #ccc;
        padding-left: 10px;
        margin-left: 5px;

    }
    input ~ .focus-border {
    	position: absolute; 
    	top: 55px; 
    	left: 50%; 
    	width: 0; 
    	height: 2px; 
    	background-color: #3399FF; 
    	transition: 0.4s;
    }
	input:focus ~ .focus-border{
		width: 70%; 
		transition: 0.4s; 
		left: 0;
		/*width: 75%;*/
	    left: 75px;
	}
    form{
        padding-right: 10px!important;
        padding-left: 10px!important;
    }
    .sub{
    	float: right;
    	padding-right: 20px;
    }
</style>
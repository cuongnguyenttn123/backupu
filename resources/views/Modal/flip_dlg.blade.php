<style>
    .modal-content{
        
    }



    /*@media only screen and (max-width: 376px) {*/
    /*    #flip_logo{*/
    /*        height:50%;*/
    /*        width:100%;*/
           /*display:none;*/
           /*overflow: scroll;*/
    /*      }*/
    /*    }*/
    
    
</style>
<style>
.column {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: calc(50% - 40px);
  padding: 10px;
  height: 190px;
  border-radius:100px;
  margin:20px;
  
}

.flip-1{
	margin:auto;
    width:45%;
    min-width:100px;
    height:100px;
    margin-top:35px;
    background:#fff;
    border-radius:5px;
}
.flip-2{
	margin:auto;
    width:45%;
    min-width:100px;
    height:100px;
    margin-top:35px;
    background:#fff;
    border-radius:5px;
}
.flip-3{
	margin:auto;
    width:45%;
    min-width:100px;
    height:100px;
    margin-top:35px;
    background:#fff;
     border-radius:5px;
}
.flip-4{
	margin:auto;
    width:45%;
    min-width:100px;
    height:100px;
    margin-top:35px;
    background:#fff;
     border-radius:5px;
}
.image00{
   width:150px;
   height:150px;
   border-radius:50%;
   position:relative;
   top:150px;
   left:calc(50% - 75px);
}
.key-button{
      color:white;
      background-color:orange;
      width:80%;
      margin:auto;
      border:1px solid orange!important;
      padding:3px;
      cursor:pointer;
      margin-top:20%;
      margin-left:10%;
  }
  .key-text{
      text-align:center;
      position:relative;
      top:10%;
      
  }  
@media screen and (max-width: 600px) {
   .key-button{
      margin-top:5%;
      padding:1px;
    }
  .column {
    width: calc(50% - 20px);
    height:150px;
    margin:10px;
  }
  .image00{
   width:100px;
   height:100px;
   top:125px;
   left:calc(50% - 50px);
  }
  .flip-1{
    min-width:80px;  
    width:80px;
    height:65px;
    margin-top:32.5px;
  }
  .flip-2{
    min-width:80px;  
    width:80px;
    height:65px;
    margin-top:32.5px;

  }
  .flip-3{
    min-width:80px;  
    width:80px;
    height:65px;
    margin-top:32.5px;
  }
  .flip-4{
    min-width:80px;  
    width:80px;
    height:65px;
    margin-top:32.5px;
  }
  .column{
    border-radius:50px;
  }
  .key-text{
      text-align:center;
      position:relative;
      top:10%;
      font-size:15px;
      
  }  
}
</style>
<div class="modal fade" id="flip_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="
    width: 800px;
    height: 600px!important;">
            <div class="modal-header" style="padding-bottom: 0px!important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row" style="margin: 0;">
                    <ul class="nav nav-tabs  col-sm-4"  style="border-bottom:none;min-width:250px;" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#home">Flip</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " data-toggle="tab" href="#menu1">Charge</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Wand</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-body row">
                    <!-- Tab panes -->
                    <div class="tab-content" style="margin:auto;width:100%;">
                        <div id="home" class=" container tab-pane active" style="height: 100%;width:100%;"><br>
                               <div class="column" style="background-color:#4dd2ff;">
                            	  <div class="flip-1">
                                        <h5 class="key-text">1 Flip</h5>
                                            <BUTTON onclick="buy_flip_fill(1,1)" class="key-button" style = "background-color:#ff6600;">$0.39</BUTTON>
                            	  </div>
                              </div>
                              <div class="column" style="background-color:#00ace6;">
                                  <div class="flip-2">
                                       <h5 class="key-text">5 Flips</h5>
                                            <BUTTON onclick="buy_flip_fill(1,5)" class="key-button" style = "background-color:#ff6600;">$1.75</BUTTON> 
                                      
                                  </div>
                              </div>
                              <div class="image00" style="background-image:url('{{asset('/img/flip.gif')}}');background-size:contain;border-radius:10%;border:1px solid orange;">
                              
                              </div>
                              <div class="column" style="background-color:#ff9900;">
                                  <div class="flip-3">
                                    <h5 class="key-text">10 Flips</h5>
                                        <BUTTON onclick="buy_flip_fill(1,10)" class="key-button" style = "background-color:#ff6600;">$3.20</BUTTON>                                       
                                  </div>
                              </div>
                                <div class="column" style="background-color:#ffcc00;">
                                  <div class="flip-4">
                                        <h5 class="key-text">25 Flips</h5>
                                            <BUTTON onclick="buy_flip_fill(1,25)" class="key-button" style = "background-color:#ff6600;">$7.25</BUTTON>                                       
                                  </div>
                              </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"  style="height: 80%;width:100%;"><br>
                           <div class="column" style="background-color:#4dd2ff;">
                        	  <div class="flip-1">
                                    <h5 class="key-text">1 Charge</h5>
                                        <BUTTON onclick="buy_flip_fill(2,1)" class="key-button" style = "background-color:#ff6600;">$0.49</BUTTON>
                        	  </div>
                          </div>
                          <div class="column" style="background-color:#00ace6;">
                              <div class="flip-2">
                                   <h5 class="key-text">5 Charges</h5>
                                        <BUTTON onclick="buy_flip_fill(2,5)" class="key-button" style = "background-color:#ff6600;">$1.95</BUTTON> 
                                  
                              </div>
                          </div>
                          <div class="image00" style="background-image:url('{{asset('/img/charge.gif')}}');background-size:contain;border-radius:10%;border:1px solid orange;">
                          
                          </div>
                          <div class="column" style="background-color:#ff9900;">
                              <div class="flip-3">
                                <h5 class="key-text">10 Charges</h5>
                                    <BUTTON onclick="buy_flip_fill(2,10)" class="key-button" style = "background-color:#ff6600;">$3.50</BUTTON>                                       
                              </div>
                          </div>
                            <div class="column" style="background-color:#ffcc00;">
                              <div class="flip-4">
                                    <h5 class="key-text">25 Charges</h5>
                                        <BUTTON onclick="buy_flip_fill(2,25)" class="key-button" style = "background-color:#ff6600;">$7.5</BUTTON>                                       
                              </div>
                          </div>
                        </div>

                        <div id="menu2" class="container tab-pane fade" style="height: 80%;width:100%;"><br>
                           <div class="column" style="background-color:#4dd2ff;">
                        	  <div class="flip-1">
                                    <h5 class="key-text">1 Wand</h5>
                                        <BUTTON onclick="buy_flip_fill(3,1)" class="key-button" style = "background-color:#ff6600;">$0.59</BUTTON>
                        	  </div>
                          </div>
                          <div class="column" style="background-color:#00ace6;">
                              <div class="flip-2">
                                   <h5 class="key-text">5 Wands</h5>
                                        <BUTTON onclick="buy_flip_fill(3,5)" class="key-button" style = "background-color:#ff6600;">$2.75</BUTTON> 
                                  
                              </div>
                          </div>
                          <div class="image00" style="background-image:url('{{asset('/img/wand.gif')}}');background-size:contain;border-radius:10%;border:1px solid orange;">
                          
                          </div>
                          <div class="column" style="background-color:#ff9900;">
                              <div class="flip-3">
                                <h5 class="key-text">10 Wands</h5>
                                    <BUTTON onclick="buy_flip_fill(3,10)" class="key-button" style = "background-color:#ff6600;">$5</BUTTON>                                       
                              </div>
                          </div>
                            <div class="column" style="background-color:#ffcc00;">
                              <div class="flip-4">
                                    <h5 class="key-text">25 Wands</h5>
                                        <BUTTON onclick="buy_flip_fill(3,25)" class="key-button" style = "background-color:#ff6600;">$11.25</BUTTON>                                       
                              </div>
                          </div>
                        </div>
                    </div>






            </div>

        </div>
    </div>
</div>
<style>
    #flip-logo{
        
    }
    
    
    
    
    .col-sm-4{
        padding: 5px!important;
    }
    .swap_buy_type {
        background-color: #e6e6e6!important;
        border-radius: 5px;
        margin-bottom: 0px!important;
        padding-bottom: 20px!important;
        padding-top: 10px;
    }
    .gs-btn--blue, .gs-btn--red, .gs-btn--grey, .gs-btn--instagram {
        display: inline-block;
        min-width: 90px;
        margin: 0;
        padding: 5px;
        cursor: pointer;
        text-align: center;
        vertical-align: middle;
        text-decoration: none;
        color: #fff;
        border: none;
        border-radius: 5px;
        background-color: #218ccc;
        font-size: 14px;
        font-weight: 600;
        line-height: 1;
    }
    .nav-tabs .nav-link {
         border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }
    .modal-dialog {
        max-width: 900px!important;
        margin: 1.75rem auto;
    }
    .modal-body {

        margin: 0!important;
        padding: 0 !important;
    }
    .container {
        position: relative;
        width: 50%;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        top: 40px;
        bottom: 0;
        left: 55px;
        right: 0;
        height: 100px;
        width: 100px;
        opacity: 0;
        transition: .7s ease;
        background-color:white;
        border-radius: 100%;
        outline: none!important;
    }

    .container:hover .overlay {
        opacity: 0.8;
    }

    .text {
        color: black;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }
    .gs-btn--blue{
        background-color:#ff6600;
        background-color:#ff6600;
    }
</style>
<script>


</script>
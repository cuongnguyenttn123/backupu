<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="modal fade" id="submit_continue_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content1">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="join_challenge_title"  >A</h5>

            </div>
            <div class="modal-body">
                <div >
                    <div class="form-group">
                        <h6 id="join_challenge_description">

                        </h6>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12" style="text-align: center">
                            <button id="challenges_submit_photo_continue" class="btn_submit " style="color:white;background-color: orange; " >CONTINUE</button>
                        </div> 
                    </div>                   
                    <div id='challenge_id' style="display: none"></div>


                </div>
            </div>

        </div>
        </div>
    </div>
</div>
<style>
    .modal-content1{
        width:350px;
        margin:auto;
    }
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
    input[type=text]:focus, input[type=password]:focus {
        background-color: #fff;
        outline: none;
    }
    form{
        padding-right: 50px;
        padding-left: 50px;
    }
</style>

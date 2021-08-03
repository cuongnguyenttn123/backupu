<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="modal fade" id="verifydlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLongTitle">Verify</h5>

            </div>
            <div class="modal-body">
                <div >
                    <div class="form-group">
                        <label for="inputVerify3">VC</label>
                        <input type="text" class="form-control" name =""  id="vcode" placeholder="Enter Phone Number" required="">
                    </div>

                    <div class="form-group">
                        <button id="verify" class="btn_submit" >Verify</button>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
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
        color: black;

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
    form .row{}
    .inputfield{
        width: 100%;
        border-width: 0;
        border-bottom: 1px solid black;
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
<script>
    $('#verify').click(function(){
        //$('#verifydlg').modal('toggle');
        //$('#signupdlg').modal('show');
        vc=$('#vcode').val();
        login();

    });

</script>
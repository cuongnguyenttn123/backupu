<div class="modal fade" id="photo_submit_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Select the photo you want to use FLIP</h4>

            </div>
            <div class="modal-body">
                <div class="" style="margin: auto;background: lightgray;margin-bottom: 20px;padding: 10px">
                </div>
                <div class="col-sm-12 row " id="submit-modal-body">
                    <div class="col-sm-12 ">
                        <div class="uploader_submit" onclick="$('#filePhoto_submit').click()">
                            <img id="imagepreview_submit" src="https://image.freepik.com/free-vector/abstract-upload-cloud-circle-digital-technology-background-futuristic-structure-elements-concept-white-background-template-design_1201-1655.jpg"/>
                            <input type="file" name="userprofile_picture"  id="filePhoto_submit" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" id="photo_submit" class="btn_submit"  style="margin:auto;">Submit</button>
            </div>
        </div>
    </div>
</div>

<style>
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
<style>
    #filePhoto_submit{
        position: absolute;
        width:100%;
        height:100%;
        top:-50px;
        left:0;
        z-index:2;
        opacity:0;
        cursor:pointer;
    }

    #photo_submit_dlg .uploader_submit img{

        width:auto;
        height:100%;
        top:-1px;
        left:-1px;
        z-index:1;
        border:none;
    }
    #photo_submit_dlg .modal-dialog {
        max-width: 500px!important;
        margin: 1.75rem auto;
    }
    #photo_submit_dlg .modal-body {
        width: 100%!important;
    }
    #photo_submit_dlg .container {
        position: relative;
        width: 50%;
    }

    #photo_submit_dlg .image {
        display: block;
        width: 100%;
        height: auto;
    }
    .modal-content{
        width:100%!important;
        max-width:800px!important;
    }
    #submit-modal-body{
        text-align: center;
        width:100%;
        height:370px;
        margin: auto;        
    }
    #exampleModalLongTitle{
        font-size:25px;
    }
    #photo_submit_dlg .uploader_submit img {
        height: 80%!important;
    }    
    @media screen and (max-width: 500px) {
        #photo_submit_dlg .uploader_submit img {
            height: 100%!important;
        }        
        #submit-modal-body{
            height:240px;
        }
        #exampleModalLongTitle{
            font-size:15px;
        }  
        .modal-content{
            width:350px!important;
        }
    }

</style>

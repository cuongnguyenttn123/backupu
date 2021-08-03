<div class="modal fade" id="upload_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="
    width: 100%;
    height: 650px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Click here or drag photo to upload or flip.</h4>

            </div>
            <div class="modal-body">

                <div class="col-sm-12 row " style=" text-align: center;width:100%;height:370px;margin: auto;">

                         <div class="col-sm-12 ">

                             {{-----------------------------------------------}}
                             

                             {{-----------------------------------------------}}
                             <div class="uploader" onclick="$('#filePhoto').click()">
                                 <img id="imagepreview" src="public/images/logo1.PNG"/>
                                 <input type="file" name="userprofile_picture"  id="filePhoto" />
                             </div>
                {{-----------------------------------------------}}
                        </div>
                 </div>

            </div>
            <div class="modal-footer">
                <div id='upload_image_id' style="display: none;"></div>
                <button type="submit" id="submit_upload_image" class="btn_submit" style="margin:auto;" >Submit</button>
            </div>
        </div>
    </div>
</div>
<style>
    {{----}}
.uploader {position:relative; overflow:hidden; width:100%; height:100%; background:#f3f3f3; border:2px dashed #e8e8e8;}

    #filePhoto{
     position: absolute;
        width:100%;
        height:100%;
        top:-50px;
        left:0;
        z-index:2;
        opacity:0;
        cursor:pointer;
    }

    .uploader img{

        width:auto;
        height:400px;
        top:-1px;
        left:-1px;
        z-index:1;
        border:none;
    }
    {{----}}



    .modal-dialog {
        max-width: 900px!important;
        margin: 1.75rem auto;
    }
    .modal-body {
        width: 100%!important;
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




</style>
<script>

</script>

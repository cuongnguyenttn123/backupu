
<div class="modal fade" id="wand_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 391px!important;">
        <div class="modal-content" style="
    width: 391px;
    height: 291!important;border-radius: 20px;">
            <div class="modal-header" style="padding-bottom: 0px!important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none">
                    <span  aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <p id='charge_cid' style='display:none'></p>
            <div class="modal-body ">
                <div CLASS="" style="margin: 0px;margin-top: 10px;">

                    <div class="col-12" style="text-align: center;border-radius: 15px">
                        <img  style="width: 50%;height: 65%" src="{{asset('img/wand_my.gif')}}" >

                    </div>
                </div>
                <div class="col-12 row" style="    margin: auto;height: 40px;margin-top: 10px ;">
                    <div class="col-6" style="height: 100%;text-align: center;">

                        <button onclick="charge1(1)" style="font-size : 17px;margin:auto
                        ;width: 80%;border:1px solid #009933; border-radius: 5px;outline: none;background-color: #009933;color:white">Wand</button>
                    </div>
                    <div class="col-6" style="height: 100%;text-align: center;">
                        <button onclick="charge1(2)" style="font-size : 17px;border:1px solid #ff6600;margin:auto;size: 15px;
                        ;width: 80%;border-radius: 5px;outline: none;background-color: #ff6600;color:white;">Cancel</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<style>
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
        width: 800px!important;
        margin: auto!important;
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
</style>
<script>


</script>
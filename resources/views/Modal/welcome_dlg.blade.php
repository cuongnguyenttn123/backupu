<style>
    .modal-content{


</style>
<style>
    .welcome_png{
        height: 500px;
        width:100%;
    }

    @media screen and (max-width: 500px) {
        .welcome_png{
            height: 200px;
        }
    }
    }
</style>
<div class="modal fade" id="welcome_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content" style="width: 800px; height: auto!important;padding-top:0px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right;position: relative;top:-2px;left: 12px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body row">
                <img class="welcome_png" src="{{asset('images/Welcome.png')}}" >
            </div>
<!--            <button style="background:#009900; border: 1px solid #009900; font-weight: 550 ; padding: 5px; color: white;">OK</button>-->
        </div>
    </div>
</div>
<style>
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

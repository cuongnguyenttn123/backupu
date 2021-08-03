
<div class="modal fade" id="swapBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered zoomIn  animated" role="document">
        <div class="modal-content" style="
    width: 100%;
    height: auto;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="" style="margin: auto;background: lightgray;margin-bottom: 20px;padding: 10px">
                    <h6 class="col-md-12 " id="" style="text-align: center;font-size:20px;">Click here or drag photo to upload or flip.</h6>
                    <span id="s-cid" style="display: none"></span>
                    <span id="index" style="display: none"></span>
                </div>
                <div class="col-sm-12 row " style=" text-align: center;width:100%;height: 20%;margin: auto ">
                    <div id="imgdiv0" class="container col-sm-3" style="">
                        <img  id="img0" alt="Avatar" class="image" style="width: 180px;height:180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="SwapImage(0)" class="overlay">FLIP <br/> This photo</button>


                    </div>
                    <div id="imgdiv1" class="container col-sm-3" style="">
                        <img id="img1" alt="Avatar" class="image" style="width:180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="SwapImage(1)" class="overlay">FLIP <br/> This photo</button>


                    </div>
                    <div  id="imgdiv2" class="container col-sm-3" style="">
                        <img id="img2" alt="Avatar" class="image" style="width: 180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="SwapImage(2)" class="overlay">FLIP <br/> This photo</button>


                    </div>
                    <div id="imgdiv3" class="container col-sm-3" style="">
                        <img id="img3" alt="Avatar" class="image" style="width: 180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        {{--<div class="overlay">--}}
                        <button class="overlay" onclick="SwapImage(3)" >FLIP <br/> This photo</button>
                        {{--<li><a href='#'  data-toggle="modal" data-target="#signupdlg">Sign up</a></li>--}}
                        {{--</div>--}}

                    </div>

                    <div id='upload_challenge_id' style="display: none"></div>

                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<style>
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
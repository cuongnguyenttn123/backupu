
<div class="modal fade" id="boost_select_pic_dlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered zoomIn  animated" role="document">
        <div class="modal-content" style="
    width: 100%;
    height: 300px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Select the photo you want to use WAND </h4>

            </div>
            <div class="modal-body">

                <div class="">
                    
                    <span id="boost_s-cid" style="display: none"></span>
                    <span id="boost_index" style="display: none"></span>
                </div>
                <div class="col-sm-12 row " style=" text-align: center;width:100%;height: 20%;margin: auto ">
                    <div id="boost_imgdiv0" class="container col-sm-3" style="">
                        <img  id="boost_img0" alt="Avatar" class="image" style="width: 180px;height:180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="boost_Image(0)" class="overlay"><img  id="img0" alt="Avatar" class="image" style="width: 110px;height:110px; margin-left: -10px;
                                margin-top: -10px; border-radius: 50%;" src="{{asset('img/logo002.png')}}"></button>


                    </div>
                    <div id="boost_imgdiv1" class="container col-sm-3" style="">
                        <img id="boost_img1" alt="Avatar" class="image" style="width:180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="boost_Image(1)" class="overlay"><img  id="img0" alt="Avatar" class="image" style="width: 110px;height:110px; margin-left: -10px;
                                margin-top: -10px; border-radius: 50%;" src="{{asset('img/logo002.png')}}"></button>


                    </div>
                    <div  id="boost_imgdiv2" class="container col-sm-3" style="">
                        <img id="boost_img2" alt="Avatar" class="image" style="width: 180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        <button onclick="boost_Image(2)" class="overlay"><img  id="img0" alt="Avatar" class="image" style="width: 110px;height:110px; margin-left: -10px;
                                margin-top: -10px; border-radius: 50%;" src="{{asset('img/logo002.png')}}"></button>


                    </div>
                    <div id="boost_imgdiv3" class="container col-sm-3" style="">
                        <img id="boost_img3" alt="Avatar" class="image" style="width: 180px;height: 180px" src="{{asset('img/questionmark.jpg')}}">
                        {{--<div class="overlay">--}}
                        <button class="overlay" onclick="boost_Image(3)" ><img  id="img0" alt="Avatar" class="image" style="width: 110px;height:110px; margin-left: -10px;
                                margin-top: -10px; border-radius: 50%;" src="{{asset('img/logo002.png')}}"></button>
                        {{--<li><a href='#'  data-toggle="modal" data-target="#signupdlg">Sign up</a></li>--}}
                        {{--</div>--}}

                    </div>

                    <div id='boost_challenge_id' style="display: none"></div>

                </div>

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
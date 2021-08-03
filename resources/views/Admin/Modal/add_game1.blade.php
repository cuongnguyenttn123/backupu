<!-- Button trigger modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <h5 class="modal-title" style="text-align: center;" id="exampleModalCenterTitle">Add Game Of Flip Challenge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" style="width: 90%; height: auto;margin-top: 0px;margin-bottom: 5px;">
                    <div class="" style="height: auto;margin-bottom: 5px;background-color: white;">
                        {{--Image--}}
                        <div class="col-md-12" style="border-radius: 20px">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Details--}}
                        <div class="col-md-12 col-lg-12 col-sm-12 row" style="height: 400px;width: auto;margin-top: 20px">
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <h6>Sponsor Name</h6>
                                <input type="text" name="sponsor" id="sponsor"  value="" placeholder="Sponsor"/>                                
                                <h6>Title</h6>
                                <input type="text" name="title" id="title"  value="" placeholder="Sobhani"/>
                                <h6>Period</h6>
                                <select id="period_id"    class="form-control" id="sel1">
                                    <option selected value="12">12 hours</option>
                                    <option value="24">24 hours</option>
                                    <option value="48">2 days</option>
                                    <option value="72">3 days</option>
                                    <option value="120">5 days</option>
                                    <option value="240">10 days</option>
                                    <option value="360">15 days</option>
                                    <option value="480">20 days</option>
                                    <option value="720">30 days</option>
                                    <option value="1440">60 days</option>
                                </select>


                                <h6>Type</h6>
                                <div class="row" >

                                        <div class="col-6">
                                            <input id="f" name="group1" type="radio" checked value="free" style="width: 20px" />
                                            <span>Free</span>
                                        </div>

                                        <div class="col-6">
                                            <input id="p" name="group1" type="radio"  value="paid" style="width: 20px" />
                                            <span>Paid</span>
                                        </div>

                                    <div class="paid_price" style="width:90%;margin-left:17px;">
                                        <h6>Price</h6>
                                        <input type="text" name="price" id = "paid"  value="$1"/>
                                    </div>

                                </div>
                                <h6>photo count</h6>
                                <div class="row" >

                                    <div class="col-4">
                                        <input name="group2" type="radio" checked  value="1" style="width: 20px" />
                                        <span >1</span>
                                    </div>

                                    <div class="col-4">
                                        <input name="group2" type="radio"  value="2" style="width: 20px" />
                                        <span>2</span>
                                    </div>
                                    <div class="col-4">
                                        <input name="group2" type="radio"  value="4" style="width: 20px" />
                                        <span>4</span>
                                    </div>



                                </div>
                                <div class="free_price" >
                                    <h6>cash prize</h6>
                                    <input type="text" name="price" id = "free"  value="$100" />
                                    <input type="text" name="c_type" id = "c_type"  value="game" style="display:none;"/>                                     
                                </div>
                                
                                <!--<h6>Prize</h6>-->
                                <!--<div class="row" >-->

                                <!--    <div class="col-4">-->
                                <!--        <span class="font_prize">Flip</span>-->
                                <!--        <input type="text"  id="flip"  value="1"  style="width: 20px;text-align: center"/>-->


                                <!--    </div>-->

                                <!--    <div class="col-4">-->
                                <!--        <span class="font_prize">Charge</span>-->
                                <!--        <input type="text"  id="charge"  value="1"  style="width: 20px;text-align: center"/>-->


                                <!--    </div>-->
                                <!--    <div class="col-4">-->
                                <!--        <span class="font_prize">Wand</span>-->
                                <!--        <input type="text"  id="wand"  value="1"  style="width: 20px;text-align: center"/>-->


                                <!--    </div>-->



                                <!--</div>-->
                            </div>
                            <div class=" col-md-6 col-lg-6 col-sm-6">
                                <h6>Description</h6>
                                <textarea class="" id="description" name="description" rows="15" cols="35"> </textarea>


                            </div>

                        </div>
                        {{----}}



                        <div class="col-md-12 col-lg-12 col-sm-12" style="text-align: center!important;">
                            <button type="submit" id="submit_btn111" class="btn btn-primary btn-lg btn3d" >Submit</button>
                            {{--<button type="submit" id="submit_btn1" class="btn_submit" >Log in</button>--}}

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $('input[type=radio][name=group1]').change(function() {
    if (this.value == 'free') {
        $( ".paid_price" ).hide();
    }
    else if (this.value == 'paid') {
        $( ".paid_price" ).show();
    }
});  
</script>

<style>
    .font_prize{
        font-size: 14px;
    }
    h6{
        margin-bottom: 0px!important;
    }
    input{
        text-align: center;
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 1px solid black;
        text-align: left;
        width: 100%;
        margin-bottom: 20px!important;
    }
    .modal-dialog {
        max-width: 800px!important;
        margin: 1.75rem auto;
    }
    textarea {
        border: 1px solid #ba68c8;
        border-radius: 10px;
    }
    textarea:focus {
        border: 1px solid #ba68c8;
        box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
    }
    .green-border-focus .form-control:focus {
        border: 1px solid #8bc34a;
        box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
    }
    .emailsetting input{
        margin-bottom: 1rem;
    }
    .avatar-upload {
        position: relative;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        position: relative;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: auto;
        height: 270px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .free_price{
        display;block;
    }
    .paid_price{
        display:none;
    }
</style>
<script>
</script>
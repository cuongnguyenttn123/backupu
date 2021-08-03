<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">




<div class="content py-5  bg-secondary" style="height: 100%">
    <div class="col-md-6 offset-md-3">
        <!--<img src="https://fredexchange.com/public/img/logo-skyexchange.png" style="width: 100%;height: auto;"/>-->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <span class="anchor" id="formPayment"></span>
                <hr class="my-5">

                <!-- form card cc payment -->
                <div class="card card-outline-secondary">
                    <div class="card-body">
                        <h3 class="text-center">Request withdraw</h3>
                        <hr>
                      
                             
                            <div class="row" style="font-weight: bold">
                                <label class="col-md-12">From urpixpays.com to  </label>
                            </div>
                             
                            <div class="row">
                                <label class="col-md-12">Your Balance</label>
                            </div>
                            <div class="form-inline">
                                <div class="input-group" style="width: 100%">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input type="text" class="form-control text-right" name="balance" value=" " disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-12">Amount</label>
                            </div>
                            <div class="form-inline">
                                <div class="input-group" style="width: 100%">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                    <input type="text" class="form-control text-right" name="amount" placeholder="39" required>
                                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-12">account info</label>
                            </div>
                            <div class="form-inline">
                                <div class="input-group" style="width: 100%">
                                    <input type="text" class="form-control text-right" name="account_info" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-12">Description</label>
                            </div>
                            <div class="form-inline">
                                <div class="input-group" style="width: 100%">
                                    <input type="text" class="form-control text-right" name="description" required>
                                </div>
                            </div>
                            @if(isset($message))
                                <div class="row" style="color: red">
                                    <label class="col-md-12"> </label>
                                </div>
                            @endif
                            <hr>
                            <div class="form-group row"> 
                                <div class="col-md-12">
                                    <button type="submit" id = "submit"class="btn btn-success btn-lg btn-block">Submit</button>
                                </div>
                            </div>
                        
                        <div class="form-group row"> 
                            <div class="col-md-12"><a href = {{url('/balanceoverview')}}><button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /form card cc payment -->
            </div>
        </div>
    </div>
</div>

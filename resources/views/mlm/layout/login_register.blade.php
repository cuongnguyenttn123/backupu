<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/login-with-bg.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Apr 2020 09:08:17 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | Super 9</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo0.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('mlm/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/custom.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/components.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/pages/login-register.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('mlm/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style type="text/css">
      .table td, .table th{
        padding: .3rem 2rem;
      }
    </style>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
      <div class="card border-grey border-lighten-3 m-0">
        <div class="card-header border-0">
          <div class="card-title text-center">
            <div class="p-1" style="background: #4dd0e1!important"><img src="{{asset('images/Logo-Horizontal-Small.gif')}}" alt="branding logo" style="width: 200px;"></div>
          </div>
        </div>
        <div class="card-content">          
          
          <div class="card-body pt-0">
            
              <fieldset class="form-group floating-label-form-group">
                <label for="user-name">Reference ID</label>
                  <input type="text" class="form-control" id="refrenceid" placeholder="Refrence Id">
                  <span id="refrencespan" style="display: none;">Your sponsor is <b id="refrencename"></b></span>
                
              </fieldset>
              <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>Join Free</span></p>
              <button type="button" id="free_account" class="btn btn-outline-info btn-block"> Join for Free</button>
              
              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Select any payment type</span></h6>
              <div class="card-body pt-0 text-center">
                <a href="#" class="btn btn-outline-success btn-min-width btn-glow mr-1 mb-1" id="wallet"><span
                    class="px-1">Wallet</span> </a>
                <a href="#" class="btn btn-outline-info btn-min-width btn-glow mr-1 mb-1" id="paypal"><span
                    class="px-1">PayPal</span> </a>
                <a href="#" class="btn btn-outline-primary btn-min-width btn-glow mr-1 mb-1" data-toggle="modal" data-target="#default"> <span class="px-1">Stripe</span> </a>
              </div>
            <h3 style="text-align: center;">Membership Plan</h3>
            <h4 style="text-align: center;">Super 9</h4>
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody>
                  <tr>
                    <td scope="row" class="border-top-0">Registration Fee</td>
                    <td class="border-top-0 text-right">$9.99</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <h4 style="text-align: center;">Benefit</h4>
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody>
                  <tr>
                    <td scope="row" class="border-top-0">Wand</td>
                    <td class="border-top-0 text-right">9</td>
                  </tr>
                  <tr>
                    <td scope="row" class="border-top-0">Charge</td>
                    <td class="border-top-0 text-right">9</td>
                  </tr>
                  <tr>
                    <td scope="row" class="border-top-0">Flip</td>
                    <td class="border-top-0 text-right">9</td>
                  </tr>
                  <tr>
                    <td scope="row" class="border-top-0">PixPoint</td>
                    <td class="border-top-0 text-right">999</td>
                  </tr>
                  <tr>
                    <td scope="row" class="border-top-0">Referral Income</td>
                    <td class="border-top-0 text-right">Unlimited</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="bs-callout-success callout-border-left mt-1 p-1">
              <p>Participate in paid challenges on urpixpays.com free for 9 months.</p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade text-left show" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"  aria-modal="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Pay By Stripe</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-body">

            <div class="form-group">
              <input type="hidden" id="user_id" value="{{$_COOKIE['id']}}">
              <label for="issueinput1">Refrence Id</label>
              <input type="text" id="striperefrenceid" class="form-control" placeholder="Refrence Id" name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" data-original-title="" title="">
              <span id="striperefrencespan" style="display: none;">Welcome by the Reference of <b id="striperefrencename"></b></span>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="issueinput2">Card Holder Name</label>
                <input type="text" id="name_on_card" class="form-control" placeholder="Card Holder Name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" data-original-title="" title="">
              </div>
              <div class="col-md-6">
                <label for="issueinput2">Card Holder Email</label>
                <input type="text" id="user_email" class="form-control" placeholder="Card Holder Email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" data-original-title="" title="">
              </div>
            </div>

            <div class="form-group">
              <label for="issueinput2">Card Number</label>
              <input type="text" id="credit_card_no" class="form-control" placeholder="16 Digits Number" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" data-original-title="" title="">
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="issueinput3">Expire Month</label>
                  <input type="number" id="expiration_month" class="form-control" placeholder="MM" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" data-original-title="" title="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="issueinput4">Expire Year</label>
                  <input type="number" id="expiration_year" class="form-control" placeholder="YY" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="issueinput4">CSV</label>
                  <input type="number" id="cvv_no" class="form-control" placeholder="CSV" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary btn-glow" data-dismiss="modal">Close</button>
        <button type="button" id="stripe_submit" class="btn btn-outline-primary btn-glow">Save changes</button>
      </div>
    </div>
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('mlm/js/vendors.min.js')}}"></script>
    <script src="{{asset('mlm/js/sweetalert.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('mlm/vendors/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('mlm/vendors/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('mlm/vendors/js/core/app.min.js')}}"></script>
    <script src="{{asset('mlm/js/scripts/modal/components-modal.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('mlm/vendors/js/scripts/forms/form-login-register.min.js')}}"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.stripe.com/v2/"></script>

    <!-- END: Page JS-->
    <script type="text/javascript">
        //Stripe.setPublishableKey('pk_test_Ia8CRbauoxDyZVAWjqMWkD8X00FegSmpqq');
        Stripe.setPublishableKey('pk_test_stMfIA5ZE9aGKOVty1UxhVpQ00IWVi0T4e');

        function stripeResponseHandler(status, response) {
          if (response.error) {
            swal("Alert", "Wrong Card! - Please Check Your Card Information");
          } else {
              var form = $("#billing_information");
              // Get token id
              var token = response.id;
              // Insert the token into the form
              
              $.ajax({
                      url: 'https://urpixpays.com/payment/superfunction.php',
                      method: 'POST',
                      data: {
                          'striperefrenceid':$('#striperefrenceid').val(),
                          'user_id':$('#user_id').val(),
                          'name_on_card':$('#name_on_card').val(),
                          'user_email':$('#user_email').val(),
                          'credit_card_no':$('#credit_card_no').val(),
                          'expiration_month':$('#expiration_month').val(),
                          'expiration_year':$('#expiration_year').val(),
                          'cvv_no':$('#cvv_no').val(),
                          'token':token
                      },
                      success: function(res){
                        if(res == 'success'){
                          $.ajax({
                              url: '{{url('/accountpaid')}}',
                              method: 'POST',
                              data: {
                                  'striperefrenceid':$('#striperefrenceid').val(),
                                  'user_id':$('#user_id').val(),
                              },
                              beforeSend: function (request) {
                                  return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                              },
                              success: function(response){
                                  console.log(response);
                                  var obj = JSON.parse(response);
                                  switch (obj.state) {
                                      case 1:
                                          swal("Successfull", obj.message);
                                          setTimeout(function(){window.location.replace('{{url('super9')}}');} , 3000);  
                                          break;
                                      case 200:
                                          swal("Alert", obj.message);
                                          break;                           
                                      default:
                                          break;
                                  }
                              },
                          });
                        }
                        if( res == 'max_exceed'){
                            swal("Alert", "The Refrence already reaches its limit");
                        }
                      }
                  });
          }
      }

    $('#stripe_submit').on('click', function(event) {
              event.preventDefault();
              
              var striperefrenceid = $('#striperefrenceid').val();
              var name_on_card = $('#name_on_card').val();
              var credit_card_no = $('#credit_card_no').val();
              var expiration_month = $('#expiration_month').val();
              var expiration_year = $('#expiration_year').val();
              var user_email = $('#user_email').val();
              var cvv_no = $('#cvv_no').val();
              if ($('#striperefrenceid').val()=='') {
                  $('#striperefrenceid').css('border', 'solid 1px red');
                  $('#striperefrenceid').focus();
              }else if ($('#name_on_card').val()=='') {
                  $('#name_on_card').css('border', 'solid 1px red');
                  $('#name_on_card').focus();
              }else if ($('#user_email').val()=='') {
                  $('#user_email').css('border', 'solid 1px red');
                  $('#user_email').focus();
              }
              else if ($('#credit_card_no').val()=='') {
                  $('#credit_card_no').css('border', 'solid 1px red');
                  $('#credit_card_no').focus();
              }else if ($('#expiration_month').val()=='') {
                  $('#expiration_month').css('border', 'solid 1px red');
                  $('#expiration_month').focus();
              }else if($('#expiration_year').val()==''){
                  $('#expiration_year').css('border', 'solid 1px red');
                  $('#expiration_year').focus();
              }else if ($('#cvv_no').val()=='') {
                  $('#cvv_no').css('border', 'solid 1px red');
                  $('#cvv_no').focus();
              }else{
                  $('.loader_box').css('display', 'block');
                  Stripe.createToken({
                      number: credit_card_no,
                      exp_month: expiration_month,
                      exp_year: expiration_year,
                      cvc: cvv_no
                  }, stripeResponseHandler);
              }
          });



        $('#free_account').click(function () {
            var refrenceid = $('#refrenceid').val();
            if(refrenceid == {{$_COOKIE['id']}})
            {
                swal("Alert", "You cant be your own sponsor")
            }
            else if(refrenceid != '' && $.isNumeric(refrenceid) ){

                var request = $.ajax({

                    url: '{{url('/freeaccount')}}',
                    type: 'post',
                    data: {refrenceid:refrenceid} ,

                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        console.log(response);
                        var obj = JSON.parse(response);
                        switch (obj.state) {
                            case 1:
                                swal("Successfull", obj.message);
                                setTimeout(function(){window.location.replace('{{url('super9')}}');} , 3000);  
                                break;
                            case 200:
                                swal("Alert", obj.message);
                                break;                           
                            default:
                                break;
                        }
                    },
                    error: function(response){

                        console.log(response);
                        alert('error');

                    }
                });
            }
            else{
                swal("Alert", "Enter Sponsor's ID")
            }
        });


        $('#wallet').click(function () {
            var refrenceid = $('#refrenceid').val();
            if(refrenceid == {{$_COOKIE['id']}})
            {
                swal("Alert", "You cant be your own sponsor")
            }            
            else if(refrenceid != '' && $.isNumeric(refrenceid) ){

                var request = $.ajax({

                    url: '{{url('/waletaccount')}}',
                    type: 'post',
                    data: {refrenceid:refrenceid} ,

                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        console.log(response);
                        var obj = JSON.parse(response);
                        switch (obj.state) {
                            case 1:
                                swal("Successfull", obj.message);
                                setTimeout(function(){window.location.replace('{{url('super9')}}');} , 3000);  
                                break;
                            case 200:
                                swal("Alert", obj.message);
                                break;                           
                            default:
                                break;
                        }
                    },
                    error: function(response){

                        console.log(response);
                        alert('error');

                    }
                });
            }
            else{
                swal("Alert", "Enter Sponsor's ID")
            }
        });
        $( "#refrenceid" ).focusout(function() {
          var refrenceid = $('#refrenceid').val();

            if(refrenceid != '' && $.isNumeric(refrenceid) ){
              if(refrenceid == {{$_COOKIE['id']}})
              {
                  swal("Alert", "You cant be your own sponsor")
              }
              else{
                var request = $.ajax({

                    url: '{{url('/getusernamep')}}',
                    type: 'post',
                    data: {refrenceid:refrenceid} ,

                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        $('#refrencespan').show();
                        $('#refrencename').text(response);
                    },
                    error: function(response){


                    }
                });
              }
            }
        });
        $( "#striperefrenceid" ).focusout(function() {
          var refrenceid = $('#striperefrenceid').val();
            if(refrenceid != '' && $.isNumeric(refrenceid) ){

                var request = $.ajax({

                    url: '{{url('/getusernamep')}}',
                    type: 'post',
                    data: {refrenceid:refrenceid} ,

                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response){
                        $('#striperefrencespan').show();
                        $('#striperefrencename').text(response);
                    },
                    error: function(response){


                    }
                });
            }
        });
    </script>

  </body>
  <!-- END: Body-->

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/login-with-bg.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Apr 2020 09:08:17 GMT -->
</html>
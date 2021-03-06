@extends('Layout.page1')

@section('lib')

@stop

@section('style-css')
<link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">


@stop
@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form style="width:100%" action="{{url('/landing')}}" method="post" id="payment-form">
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <br>

    <div id="card-element" style="width: 100%;">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
<center><button class="btn btn-primary" style="margin-top: 10px;">Submit Payment</button></center>
</form>
        </div>
    </div>
</div>
@stop

@section('javascript')

<script>    

// Create a Stripe client.
var stripe = Stripe('pk_test_JVta8AYlhhpFARSgIopNjSdC00flmcmWkm');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>

         @stop
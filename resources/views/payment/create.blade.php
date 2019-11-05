@extends('layouts.owner_layout')

@section('navbar-brand', 'Check Out')

    <style type="text/css">
    body {
        font-family: 'Varela Round', sans-serif;
    }
    .modal-confirm {        
        color: #636363;
        width: 325px;
    }
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-confirm .modal-header {
        border-bottom: none;   
        position: relative;
    }
    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }
    .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px; 
    }
    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }   
    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }   
    .modal-confirm .icon-box {
        color: #ffffff;        
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }
    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
<body>

@if(count($errors) > 0)
    <div class = "alert alert-danger">
        <ul>
        @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(\Session::has('success'))
<div id="checkoutSuccess" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>              
                <h4 class="modal-title">Awesome!</h4>   
            </div>
            <div class="modal-body">
                <p class="text-center">Your subscription has been confirmed. Check your email for details.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>  
@endif


@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="row">
                                 <div class="col-md-8">
                                    <div class="header">
                                        <h4 class="title">Billing Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <form method="post" action="{{url('store')}}">
                                {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="billing_address" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country"
                                                class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" name="postal_code" class="form-control" min="00000" max="99999" placeholder="00000">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                                    <!-- <button type="button" class="btn btn-info btn-fill pull-right">Next</button>
                                    <div class="clearfix"></div> -->
                <div class="row">
                    <div class="col-md-8">
                            <div class="header">
                                <h4 class="title">Payment Method</h4>
                            </div>
                    </div>
                </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Name on card</label>
                                                <input type="text" name="name_on_card" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Credit card number</label>
                                                <input type="text" name="card_num" class="form-control" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required placeholder="0000-0000-0000-0000" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="date">Expiry Date</label>
                                                <input type="month" name="card_expiry" class="form-control" placeholder="MM/YY" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Security Code</label>
                                                <input type="password" name="sec_code" class="form-control" minlength="3" maxlength="3" placeholder="xxx" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <button id="" name="Confirm" class="btn btn-info btn-fill pull-right">Confirm</button>
                                    <!-- <a href="#checkoutSuccess" class="btn btn-info btn-fill pull-right" data-toggle="modal">Confirm</a> -->
                                    <div class="clearfix"></div>

                            </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<!--         <script>
            (function(){
                // Create a Stripe client.
                // Note: this merchant has been set up for demo purposes.
                var stripe = Stripe('pk_test_aUTrj6ziyUcPEbUnNfth1dAc00dB3EI04V');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                  base: {
                    padding: '10px 12px',
                    color: '#32325d',
                    fontFamily: '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                      color: '#aab7c4'
                    },
                  },
                  invalid: {
                    color: '#fa755a',
                  }
                };

                // Create an instance of the idealBank Element.
                var idealBank = elements.create('idealBank', {style: style});

                // Add an instance of the idealBank Element into the `ideal-bank-element` <div>.
                idealBank.mount('#ideal-bank-element');

                var errorMessage = document.getElementById('error-message');

                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                  event.preventDefault();
                  showLoading();

                  var sourceData = {
                    type: 'ideal',
                    amount: 1099,
                    currency: 'eur',
                    owner: {
                      name: document.querySelector('input[name="name"]').value,
                    },
                    // Specify the URL to which the customer should be redirected
                    // after paying.
                    redirect: {
                      return_url: 'https://shop.example.com/crtA6B28E1',
                    },
                  };

                  // Call `stripe.createSource` with the idealBank Element and additional options.
                  stripe.createSource(idealBank, sourceData).then(function(result) {
                    if (result.error) {
                      // Inform the customer that there was an error.
                      errorMessage.textContent = result.error.message;
                      errorMessage.classList.add('visible');
                      stopLoading();
                    } else {
                      // Redirect the customer to the authorization URL.
                      errorMessage.classList.remove('visible');
                      stripeSourceHandler(result.source);
                    }
                  });
                });

            })();
        </script> -->


@endsection

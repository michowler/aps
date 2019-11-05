@extends('layouts.main_layout')

@section ('content')
    <!-- Header -->
    <div class="header bg-gradient-bluemou py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Sign Up As A Merchant</h1>
             <p class="text-lead text-light">Let's create an account !</p>
            </div>
          </div>
        </div>
      </div>
    
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="#DA70D6 shadow border-0">
      
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
			  <div class="card-header>
                <small>sign up with credentials</small>
              </div>
              <form role="form">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Company Name" type="text">
                  </div>
                </div>
				</div>

				<div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                     <span class="input-group-text"><i class="ni ni-map-big"></i></span>
                    </div>
                    <input class="form-control" placeholder="Company Address" type="text">
                  </div>
                </div>
				
				<div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email">
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password">
                  </div>
                </div>
                  
                 <div class="text-default text-center font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control text-center custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-default text-center" color="black">I agree with the <a style="color: #FF0000; text-decoration: underline;" href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <a button type="button" class="btn btn-neutral my-4" href="/generateVoucher">Create Account</button></a>
				  
				  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  
</body>
@endsection
</html>
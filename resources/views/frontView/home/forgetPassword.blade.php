@extends('layouts.main_layout')

@section('content')
	
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Reset Password</h1>             
            </div>
          </div>
      
     
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-3">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-5">
          <div class="card bg-secondary shadow border-0">
          
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Enter your email to receive reset password link</small>
              </div>
              <form role="form">
                <div class="form-group mb-3">

                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">

                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email">
                  </div>
                </div>
                
                <div class="text-center">                  
                  <a type="button" class="btn btn-neutral my-4" href="/passwordNotification">Confirm</button></a>
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
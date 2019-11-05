@extends('layouts.main_layout')

@section ('content')
  
    <div class="container mt--8 pb-5">
      <!-- Table -->
     <div class="card-body px-lg-5 py-lg-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-5">
          <div class="#DA70D6 shadow border-0">
          <!-- <div class="card-header">-->
              <div class="text-center mt-2 mb-4"><h2 style="Open Sans;" class="text-white">-Sign up as-</h2></div>
              <div class="text-center ">
                @foreach ($roles as $roles)
               <a style="margin-top:10px; display:block;" href="/register" class="btn btn-neutral" value ="1">
                  <!---<span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>-->
                  <input type="hidden" id="roles" name="roles" value="survey owner" class="btn-inner--text">Survey Owner</span>
                </a>
               <a style="margin-top:10px; display:block;" href="{{ url('/res-register')}}" class="btn btn-neutral" value="2">
                 <!-- <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>-->
                  <input type="hidden" id="roles" name="roles" value="survey respondent" class="btn-inner--text">Survey Respondent</span>
                </a>
              <a style="margin-top:10px; display:block;" href="/merchant-register" class="btn btn-neutral" value ="3">
                  <!--<span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>-->
                  <input type="hidden" id="roles" name="roles" value="merchant" class="btn-inner--text">Merchant</span>
                </a>
              </div>
              @endforeach
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
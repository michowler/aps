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
                <div id="error">

                </div>
               <form method="post" action="">
              {{ csrf_field()   }}
              <input type="hidden" name="user_id" value="" />
               <div class="form-group">
                <select name="roles_id" id="roleVal" class="form-control" >
                  <option value="0">select a role</option>
                  <option value="1">Survey Respondent</option>
                  <option value="2">Survey Owner</option>
                  <option value="3">Merchant</option>
                </select>
               </div>               
               <div id="registerContent">
                 
               </div>

                <button type="submit" class="btn btn-primary">
                    Create Account
                </button>
              </form>
              </div>
            </div>

            
            
			
			
			
 
  <!-- Argon Scripts -->
  <!-- Core -->

</body>
@endsection
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {
    var role = document.getElementById('roleVal');
    $("#roleVal").on('change',function(){         
      var roleVal = role.options[role.selectedIndex].value;   
        if(roleVal == 1){                                    
          $("#registerContent").load("resRegister");          
        }else if(roleVal == 2){
          $("#registerContent").load("ownerRegister");          
        }else if(roleVal == 3){
          $("#registerContent").load("merchantRegister");          
        }          
    });
});
</script>

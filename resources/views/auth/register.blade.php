@extends('layouts.main_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    <form id="registerForm" method="POST" action="{{ route('register') }}">
                        @csrf
                        <select name="roles_id" id="roleVal1" class="form-control" >
                           <option value="0">select a role</option>
                           <option value="1">Survey Respondent</option>
                           <option value="2">Survey Owner</option>
                           <option value="3">Merchant</option>
                         </select>
                        <br><br>         
                        <div id="registerContent1">
                          
                        </div>


                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {
    var role = document.getElementById('roleVal1');
    $("#roleVal1").on('change',function(){         
      var roleVal = role.options[role.selectedIndex].value;   
        if(roleVal == 1){               

          $("#registerContent1").load("_res");          
        }else if(roleVal == 2){
            console.log("here")                     ;
          $("#registerContent1").load("ownerRegister");          
        }else if(roleVal == 3){
          $("#registerContent1").load("ownerRegister");          
        }          
    });
});

$("#registerForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });


});
</script>


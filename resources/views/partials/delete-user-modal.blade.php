<div class="modal modal-danger fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form id="deleteUserForm" action="{{route(
            'deleteUser', \Auth::user()->users_id)}}" method="POST">
                @method('POST')
                @csrf
            <div class="modal-body">                
                <p>Are you sure you, want to delete your account?</p>
                <p>Please copy the following sentence to delete account.</p>
                <p>"I confirm to delete"</p>
                <input type="text" name="deleteText" id="delUsrText" placeholder="Copy the text above here">
            </div>
            
                <input type="hidden" name="users_id" id="users_id" value="{{\Auth::user()->users_id}}">
                <div class="modal-footer">                    
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger"  id="delUsrbtn" onclick="formSubmit()">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('delUsrbtn').disabled = "true";
    $("input[name=deleteText]").on('input',function(){        
        var text = "I confirm to delete";
        if($(this).val() === text){                          
          document.getElementById('delUsrbtn').removeAttribute("disabled");
        }else{
          document.getElementById('delUsrbtn').disabled = "true";
        }              
    });
});
</script>
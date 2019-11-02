<div class="modal modal-danger fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Account?</h4>
            </div>
            <form id="deleteUserForm" action="{{route(
            'deleteUser', '$user->users_id')}}" method="POST">
                @method('POST')
                @csrf
            <div class="modal-body">                
                <p>Are you sure you, want to delete your account?</p>
                <p>Please copy the following sentence to delete account.</p>
                <p>I confirm to delete my account</p>
                <input type="text" name="deleteText" placeholder="Copy the text above here">
                <input type="hidden" name="users_id" id="users_id" value="{{$user->users_id}}">
            </div>                                        
            <div class="modal-footer">                    
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">No, Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary" id="btn btn-sm btn-danger" onclick="formSubmit()">Yes, Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>


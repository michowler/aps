<div class="modal modal-danger fade" id="resRedeem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">		
     <div class="modal-dialog">		
         <div class="modal-content">		
             <div class="modal-header">		
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>		
                 <h4 class="modal-title" id="myModalLabel">Redeem Confirmation</h4>		
             </div>		
             <div class="modal-body">		
                 <p>Are you sure you, want to redeem?</p>		
             </div>		
             <form id="resRedeemForm" action="{{route(		
             'redeemSuccess', ['$voucher->vouchers_id', '$store->stores_id'])}}" method="POST">		
                 @method('POST')		
                 @csrf		
                 		
                 <div class="modal-footer">                    		
                     <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">No, Cancel</button>		
                     <button type="submit" class="btn btn-sm btn-primary" id="btn btn-sm btn-danger" onclick="formSubmit()">Yes, Redeem</button>		
                 </div>		
             </form>		
         </div>		
     </div>		
 </div>
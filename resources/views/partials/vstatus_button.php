<form method="POST" enctype="multipart/form-data" action="{{ route('updateStatVoucher', $voucher->vouchers_id) }}">
 @csrf
 @if ($voucher->status == 'valid')
   <input type="hidden" name="status" value="invalid"/>
 @else
   <input type="hidden" name="status" value="valid"/>  
 @endif
 <button type="button" type="submit" class="btn btn-primary btn-fill " style="margin-left:10px;">{{$voucher->status == 'valid' ? 'Disable' : 'Enable'}} </button> 
</form>
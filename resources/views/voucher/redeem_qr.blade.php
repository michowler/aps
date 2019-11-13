@extends('layouts.merchant_layout')
@section('navbar-brand', "Redeem Voucher ID: {$voucher->vouchers_id}" )
@section('content')
 <div class="col-md-12 text-center"> 	
  <div>                                
     @if ($voucher->qr_code)                
       {!!QrCode::size(500)->generate(route('redeemSuccess',['vouchers_id' => $voucher->vouchers_id, 'name' => \Auth::user()->name]))!!}
     @endif                                    
  </div>
  <input type="text" name="hiddenURL" id="hiddenURL" value="{{$_SERVER['REQUEST_URI']}}">
</div>    
@endsection
<script>
var getUrl = document.getElementById("hiddenURL").value;
console.log(getUrl);
setInterval(function(){
   $.ajax({
       url: getUrl,
       type: "POST",
       data: { 'status': 'Invalid' },                   
       success: function(){
       		alert('Redeem Voucher','Voucher sucessfully redeemed!', 'success')
       },
       error: function(xhr, error){
           console.debug(xhr); console.debug(error);
    	}
   });
},5000)


</script>

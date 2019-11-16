@extends('layouts.merchant_layout')
@section('navbar-brand', "Redeem Voucher ID: {$voucher->vouchers_id}" )
@section('content')
 <div class="col-md-12 text-center"> 	
  <div>            

	     @if ($voucher->qr_code)          
	            
	       {!!QrCode::size(450)->generate(route('redeemAccept',['vouchers_id' => $encV, 'stores_id'=>$encS,  'surveys_id'=>$decryptedSid ]))!!}
	     
	     @endif         
	                      
  </div>

</div>    
@endsection

<script>
// var getUrl = document.getElementById("hiddenURL").value;
// console.log(getUrl);
// setInterval(function(){
//    $.ajax({
//        url: getUrl,
//        type: "POST",
//        data: { 'status': 'Invalid' },                   
//        success: function(){
//        		alert('Redeem Voucher','Voucher sucessfully redeemed!', 'success')
//        },
//        error: function(xhr, error){
//            console.debug(xhr); console.debug(error);
//     	}
//    });
// },5000)


</script>
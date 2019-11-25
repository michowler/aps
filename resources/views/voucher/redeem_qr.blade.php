@php
header('Refresh: 15; URL=/vouchers');
@endphp
@extends('layouts.merchant_layout')
@section('navbar-brand', "Redeem Voucher ID: {$voucher->vouchers_id}" )
@section('content')
<div class="container-fluid">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<!-- <h4 class="title">Demo Voucher</h4> -->
			</div>

			<div class="content">
				
					<div class="row">
						<div class="col-md-12">
							<div class="form-group text-center">
								 @if ($voucher->qr_code)          
									            
							       {!!QrCode::size(350)->generate(route('redeemAccept',['vouchers_id' => $encV, 'stores_id'=>$encS,  'surveys_id'=>$decryptedSid ]))!!}
							     
							     @endif    
						 </div>
					 </div>
					 
				</div>
			 
		 </div>


	 </div>

 </div>
</div>
</div>
</div>
</div>

</div>

@endsection

<!-- <script>
 var url = '{{ route("myVouchers") }}';
 setTimeout(function(){
    window.location.href = $url;
 }, 15000);
</script> -->
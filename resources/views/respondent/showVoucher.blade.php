@extends('layouts.res_layout')
@section('navbar-brand', "Voucher {$voucher->vouchers_id}: {$voucher->title}" )
@section('content')

<div class="container-fluid">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<!-- <h4 class="title">Demo Voucher</h4> -->
			</div>

			<div class="content">
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group text-center">
								@if ($voucher->logo)
									<img class="rounded-circle" src="/storage/{{$voucher->logo}}" style="max-height: 200px;max-width: 300px" />
								@else
									 {{strtoupper(\Auth::user()->name)}}
								@endif 
						 </div>
					 </div>
					 <div class="col-md-8">
						<div class="form-group text-center" style="margin-top:80px;">
							<h2><b>{{ $voucher->title }}</b></h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="form-group" style="margin-top:30px; margin-left:20px">
							<p><b>Terms & Conditions:</b></p>
							<p>
								{{ $voucher->terms }}
							</p>              
						</div>

					</div>  
					<div class="col-md-4 text-center">
					 <div>                                
							@if ($voucher->qr_code)                
								{!!QrCode::size(250)->generate(route('redeemVoucher',['vcode1' => $encryptedVC, 'surveys_id' => $encryptedSid]))!!}
							@endif                                    
					 </div>
				 </div>                                  
			 </div>

			 <div class="row">
				<div class="col-md-8">
					<label>REDEEM OUTLET:

						@foreach($voucher->stores as $store) 
							{{ $store->name }} ,                   
						@endforeach            
					
					</label><br>
					<label>VOUCHER TYPE: {{ $vType->vouchers_type }}</label><br>
					<label>EXPIRY DATE: {{ $voucher->expiry_date->format('Y-m-d') }}</label>
				</div>
				
			</div>
			 </form>
			 
		 </div>


	 </div>

 </div>
</div>
</div>
</div>
</div>

</div>

@endsection
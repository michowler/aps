@extends('layouts.merchant_layout')
@section('navbar-brand', "Voucher {$voucher->vouchers_id}: {$voucher->title}" )
@section('content')
@include('partials.delete-voucher-modal')
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
								{!!QrCode::size(250)->generate(route('showVoucher',['vouchers_id' => $voucher->vouchers_id]))!!}
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
				<div class="col-md-4 text-center" style="padding:20px;">
					<button type="button" data-toggle="modal" data-target="#deleteVoucherModal" type="submit" class="btn btn-danger btn-fill " style="margin-left:10px;">Delete <i class="fa fa-trash"></i></button>                    
					<a href="{{ route('editVoucher',$voucher->vouchers_id)}}" class="btn btn-info btn-fill">Edit</a>          

					<div class="clearfix"></div>

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

<script type="text/javascript">
 function formSubmit()
 {
	 $("#deleteVoucherForm").submit();
 }
</script>
@endsection
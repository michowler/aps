@extends('layouts.res_layout')
@section('navbar-brand', "Redeem Voucher Accept?" )
@include('partials.res_redeem_modal')
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
							<h2><b>AGREE: Redeem Voucher?</b></h2>
							<form id="redeemVoucherForm" action="{{route(
							'redeemVSuccess', ['surveys_id'=> $survey, 'vouchers_id' => $voucher->vouchers_id, 'stores_id => $store->stores_id'])}}" method="POST">
							    @method('POST')
							    @csrf        
							   
								<div class="col-md-12 text-center" style="padding:20px;">
									<input type="hidden" name="stores_id" value="{{$store->stores_id}}">		
									<button type="submit" class="btn btn-fill btn-success" id="btn btn-sm btn-danger">Yes, accept</button>
								</div>
							</form>
							<form id="redeemVoucherForm" action="{{route(
							'redeemVSuccess', ['surveys_id'=> $survey, 'vouchers_id' => $voucher->vouchers_id, 'stores_id => $store->stores_id'])}}" method="POST">
							    @method('POST')
							    @csrf  
								<div>
									<input type="hidden" name="stores_id" value="0">		
									<button type="submit" class="btn btn-info btn-fill " style="margin-left:10px;">No, cancel </a>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
		    </div>


	    </div>

     </div>
</div>


@endsection

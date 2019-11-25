@extends('layouts.res_layout')
@section('navbar-brand', "Redeem Voucher Accept?" )
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
							<h2><b>Redeem Voucher?</h2><br>
							<form id="redeemVoucherForm" action="{{route(
							'redeemVSuccess', ['surveys_id'=> $survey, 'vouchers_id' => $voucher->vouchers_id, 'stores_id => $store->stores_id'])}}" method="POST">
							    @method('POST')
							    @csrf        
							   
								
									<input type="hidden" name="stores_id" value="{{$store->stores_id}}">		
									<button type="submit" class="btn btn-fill btn-success" id="btn btn-sm btn-danger">Yes, accept<i class="fa fa-check-circle-o" aria-hidden="true"></i></button>
								
							</form>
							<form id="redeemVoucherForm" action="{{route(
							'redeemVSuccess', ['surveys_id'=> $survey, 'vouchers_id' => $voucher->vouchers_id, 'stores_id => $store->stores_id'])}}" method="POST">
							    @method('POST')
							    @csrf  
								
									<input type="hidden" name="stores_id" value="0">		
									<button type="submit" class="btn btn-info btn-primary " >No, cancel<i class="fa fa-close" aria-hidden="true"></i> </a>
									<div class="clearfix"></div>
								
							</form>
						</div>
					</div>
				</div>
		    </div>


	    </div>

     </div>
</div>


@endsection

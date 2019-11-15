@extends('layouts.res_layout')
@section('navbar-brand', "Redeem Voucher Accept?" )
@include('partials.res_redeem_modal')
@section('content')
<form id="redeemVoucherForm" action="{{route(
'redeemVSuccess', ['vouchers_id' => $voucher->vouchers_id, 'stores_id => $store->stores_id'])}}" method="POST">
    @method('POST')
    @csrf        
    
	<div class="col-md-12 text-center" style="padding:20px;">
		<input type="hidden" name="stores_id" value="{{$store->stores_id}}">
		<button type="submit" class="btn btn-sm btn-primary" id="btn btn-sm btn-danger">Yes, accept</button>                   
		<button type="button" data-toggle="modal" data-target="#" type="submit" class="btn btn-info btn-fill " style="margin-left:10px;">No, cancel <i class="fa fa-trash"></i></button>
		<div class="clearfix"></div>
	</div>
</form>

@endsection

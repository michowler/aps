@extends('layouts.merchant_layout')
@section('navbar-brand', "Redeem Voucher ID: {$voucher->vouchers_id}" )
@section('content')
 <div class="col-md-12 text-center">
  <div>                                
     @if ($voucher->qr_code)                
       {!!QrCode::size(500)->generate(route('redeemSuccess',['vouchers_id' => $voucher->vouchers_id]))!!}
     @endif                                    
  </div>
</div>    
@endsection

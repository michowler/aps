@extends('layouts.merchant_layout')
@section('navbar-brand', 'Show Voucher')
@section('content')
@include('partials.delete-modal')
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
                <img src="assets/img/subway_voucher.png" style="width:240px;height:70;">

              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group text-center">
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
                <label>REDEEM OUTLET: {{ $voucher->outlet }}</label>

              </div>

            </div>  
            <div class="col-md-4 text-center">
             <div>                                
                 {!! QrCode::size(250)->generate( route('redeem',['vouchers_id' => $voucher->vouchers_id]) ); !!}                                   
             </div>
             <div class="form-group">
               <label>EXPIRY DATE: {{ $voucher->expiry_date }}</label>

             </div>
                 

            </div>                                  
          </div>

          <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
             
           </div>
         </div>


       <!--   {!! Form::model($voucher, ['method' => 'destroy', 'route' => ['deleteVoucher', $voucher->vouchers_id], 'class' =>'form-inline form-delete']) !!}
         {!! Form::hidden('vouchers_id', $voucher->vouchers_id) !!}
         {!! Form::submit(trans('Delete'), ['class' => 'btn btn-danger btn-fill pull-right', 'name' => 'delete_modal', 'style' => 'margin-left:8px']) !!}
         {!! Form::close() !!} -->
        
         <button type="button" data-toggle="modal" data-target="#deleteVoucherModal" type="submit" class="btn btn-danger btn-fill pull-right" style="margin-left:10px;">Delete <i class="fa fa-trash"></i></button>
         <button type="submit" class="btn btn-info btn-fill pull-right">Enable</button>

         <div class="clearfix"></div>
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
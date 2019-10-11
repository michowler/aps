@extends('layouts.merchant_layout')

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
            <div class="col-md-4">
              <img src="assets/img/demo-qr.png" class="img-thumbnail" alt="Cinque Terre">
            </div>                                  
          </div>

          <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
             <div class="form-group text-center">
               <label>EXPIRY DATE: {{ $voucher->expiry_date }}</label>

             </div>
           </div>
         </div>



         <button type="submit" class="btn btn-danger btn-fill pull-right" style="margin-left:10px;">Delete</button>
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
@endsection
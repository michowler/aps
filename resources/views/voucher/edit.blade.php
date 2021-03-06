@extends('layouts.merchant_layout')

@section('navbar-brand', 'Edit Vouchers')

@section('content')
<div class="container-fluid">
    
<div class="col-md-12">
    <div class="card">
       <div class="header">
           <h4 class="title">Edit your customisable voucher</h4>
       </div>
       <div class="content">
       <form method="POST" enctype="multipart/form-data" action="{{ route('updateVoucher', $voucher->vouchers_id) }}">
        @csrf
           <div class="row">
             

           <!--  <div class="col-md-5">
                <div class="form-group">
                    <label>Company (disabled)</label>
                    <input type="text" class="form-control" disabled placeholder="Company" value="{{\Auth::user()->name}}">
                </div>
            </div> -->




        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ __('Title') }}</label>
                    <input name="title" type="text" class="form-control" placeholder="Voucher title" value="{{$voucher->title}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ __('Terms & Conditions') }} </label>
                    <textarea name="terms" rows="5" class="form-control" placeholder="{{$voucher->terms}}" value="{{$voucher->terms}}">{{$voucher->terms}}</textarea>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="date">Expiry Date</label>
                    <input name="expiry_date" class="form-control" id="date" name="date" value="{{ $voucher->expiry_date->format('Y-m-d')}}" type="date" min="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">       
                    <label class="control-label" for="date">Voucher Type</label>     
                                                    
                    <select name="vouchers_types_id" class="form-control" >
                        @if($vType[0])
                        <option value="{{$voucher->vouchers_types_id ?? '' }}" selected>{{ucfirst($vType[0]) ?? '' }}</option>
                                  
                       <option value="1">Cash</option>
                       <option value="2">Rebate</option>
                       <option value="3">Gift</option>   
                       <option value="4">Free</option>                                 
                       <option value="5">Deals</option>
                       @endif
                   </select>
               </div>
           </div>   
            <div class="col-md-4">
                <div class="form-group">       
                    <label class="control-label">Status</label>     
                                                    
                    <select name="status" class="form-control" >                        
                        <option value="{{$voucher->status}}" selected>{{ucfirst($voucher->status) ?? '' }}</option>                                  
                       <option value="invalid">Invalid</option>
                       <option value="valid">Valid</option>
                       
                   </select>
               </div>
           </div>                                   
       </div>

      

    <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Generate Voucher</button> -->
    
    <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Submit') }}</button>


    <div class="clearfix"></div>
</form>
</div>
</div>
</div>




</div>
</div>
</div>
@endsection
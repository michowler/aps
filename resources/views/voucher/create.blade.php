@extends('layouts.merchant_layout')

@section('navbar-brand', 'Create Vouchers')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="col-md-3">
        <div class="card card-user">
            <div class="image">
                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
            </div>
            <div class="content">
                <div class="author">
                   <a href="#">
                    <img class="avatar border-gray" id="logoVoucher" src="#" alt="..."/>
                                        
                    <form method="POST" enctype="multipart/form-data" action="{{ route('storeVoucher') }}">
                       @csrf
                       <input type="hidden" name="status" value="valid"/>
                          <div class="row">
                              <label>{{ __('Voucher Logo') }}</label>
                              
                       </div>
                       <label for="image">                                
                           <input id="logo" class="form-control" name="logo" type='file' onchange="readURL(this);" />                                             
                       </label>
                       
                    </h4>
                </a>
            </div>

        </div>



    </div>
</div>

<div class="col-md-9">
    <div class="card">
       <div class="header">
           <h4 class="title">Create your customisable voucher</h4>
       </div>
       <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ __('Title') }}</label>
                    <input name="title" type="text" class="form-control" placeholder="Voucher title" value="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ __('Terms & Conditions') }} </label>
                    <textarea name="terms" rows="5" class="form-control" placeholder="Please enter the T&C for the voucher" value="terms"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>{{ __('Branch Store') }}</label>
                    <!-- <span><input onchange="checkAll(this)" class="checkbox" type="checkbox"> Select All</span> -->

                     <div class="form-group">                                                        
                        <table class="table" id="storesTable" style="border: none">
                            <tbody>
                                @foreach($stores->chunk(3) as $chunk_store)
                                <tr>         
                                    @foreach( $chunk_store as $store )                   
                                    <td>
                                                           
                                            <input class="checkbox" value="{{$store->stores_id}}" name="stores[]" id="checkbox{$store->stores_id}" type="checkbox">                                            
                                        
                                    </td>
                                    <td>{{$store->name}}</td>                            
                                    @endforeach
                                </tr>                        
                                @endforeach
                            </tbody>
                        </table>                   
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="date">Expiry Date</label>
                    <input name="expiry_date" class="form-control" id="date" value="<?php echo date('Y-m-d'); ?>" name="date" type="date" min="<?php echo date('Y-m-d'); ?>"/>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">       
                    <label class="control-label" for="date">Voucher Type</label>                                       
                    <select name="vouchers_types_id" class="form-control">
                       <option value="null">-</option>
                       <option value="1">Cash</option>
                       <option value="2">Rebate</option>
                       <option value="3">Gift</option>   
                       <option value="4">Free</option>                                 
                       <option value="5">Deals</option>
                   </select>
               </div>
           </div>   
           <div class="col-md-4">
               <div class="form-group">
                   <label class="control-label" for="date">Number of Vouchers</label>
                   <input type="number" name="max_redeem" class="form-control"/>
               </div>
           </div>                                 
       </div>

       <div class="row">
           <div class="col-md-12">
               <div class="form-group">
                   <label>{{ __('Tag Your Voucher') }}</label>
                    <div class="form-group">                                                        
                       <table class="table" style="border: none">
                           <tbody>
                               @foreach($interests->chunk(3) as $chunk_interest)
                               <tr>         
                                   @foreach( $chunk_interest as $interest )                   
                                   <td>
                                                          
                                           <input class="checkbox" value="{{$interest->interests_id}}" name="interests[]" id="checkbox{$interest->interests_id}" type="checkbox">                                            
                                       
                                   </td>
                                   <td>{{$interest->interests_name}}</td>                           
                                   @endforeach
                               </tr>                        
                               @endforeach
                           </tbody>
                       </table>                   
                   </div>

               </div>
           </div>
       </div>

      

     



    <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Generate Voucher</button> -->
  <!--   <a class="btn btn-info btn-fill pull-right" id="demoButton" style="margin: 0 0 0 10px" data-toggle="modal" data-target="#demoV" onclick="demoContainer()" >Demo</a> -->
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logoVoucher').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

</script>

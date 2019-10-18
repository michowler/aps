@extends('layouts.merchant_layout')

@section('navbar-brand', 'Create Vouchers')

@section('content')
<div class="container-fluid">
    <div class="col-md-3">
        <div class="card card-user">
            <div class="image">
                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
            </div>
            <div class="content">
                <div class="author">
                   <a href="#">
                    <img class="avatar border-gray" src="storage/logos/default.jpg" alt="..."/>
                                        
                    <form method="POST" enctype="multipart/form-data" action="{{ route('storeVoucher') }}">
                       @csrf
                       <h4 class="title">{{strtoupper(\Auth::user()->name)}}<br />
                           <label for="image">
                            <input id="logo" type="file" class="form-control" name="logo">
                            
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
                     <div class="form-group">                                
                         <select name="stores_id" class="form-control">
                            @foreach($stores as $store)     
                            <option value="{{$store->stores_id}}">{{$store->name}}</option>

                            @endforeach   
                        </select>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="date">Expiry Date</label>
                    <input name="expiry_date" class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date" min="<?php echo date('Y-m-d'); ?>"/>
                </div>
            </div>
            <div class="col-md-6">
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
       </div>

       <div class="row">
        <div class="col-md-12">
            <label class="control-label" for="date">Tag your voucher</label>
            <div class="table-full-width borderless" >
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    
                                    <input value="1" id="checkbox1" type="checkbox">
                                    <label for="checkbox1"></label>
                                </div>
                            </td>
                            <td>Food & Drinks</td>
                            <td>
                                <div class="checkbox">
                                    <input value="2" id="checkbox2" type="checkbox">
                                    <label for="checkbox2"></label>
                                </div>
                            </td>
                            <td>Sports</td>
                            <td>
                                <div class="checkbox">
                                    <input value="3" id="checkbox3" type="checkbox">
                                    <label for="checkbox3"></label>
                                </div>
                            </td>
                            <td>Leisure</td>                                                                                                      
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input value="4" id="checkbox4" type="checkbox" >
                                    <label for="checkbox4"></label>
                                </div>
                            </td>
                            <td>Travel</td>
                            <td>
                                <div class="checkbox">
                                    <input value="5" id="checkbox5" type="checkbox">
                                    <label for="checkbox5"></label>
                                </div>
                            </td>
                            <td>Health</td>
                            <td>
                                <div class="checkbox">
                                    <input value="6" id="checkbox6" type="checkbox">
                                    <label for="checkbox6"></label>
                                </div>
                            </td>
                            <td>Beauty</td>                                                                                  
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <input value="7" id="checkbox7" type="checkbox">
                                    <label for="checkbox7"></label>
                                </div>
                            </td>
                            <td>Entertainment</td>
                            <td>
                                <div class="checkbox">
                                    <input value="8" id="checkbox8" type="checkbox">
                                    <label for="checkbox8"></label>
                                </div>
                            </td>
                            <td>Education</td>
                            <td>
                                <div class="checkbox">
                                    <input value="9" id="checkbox9" type="checkbox">
                                    <label for="checkbox9"></label>
                                </div>
                            </td>
                            <td>Lifestyle</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- <button type="submit" class="btn btn-info btn-fill pull-right">Generate Voucher</button> -->
    <a class="btn btn-info btn-fill pull-right"  style="margin: 0 0 0 10px" href="demoVoucher.html">Demo</a>
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
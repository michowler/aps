@extends('layouts.merchant_layout')

@section('navbar-brand', 'Redeem Voucher')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Voucher ID: 2348</h4>
                </div>
                <div class="content">
                    <form method="GET" enctype="multipart/form-data" action="{{ route('redeemQR', ['vcode2' => $encrypted]) }}">
                     @csrf
                        <input type="hidden" id="redeem_stat" name="voucher_redeem_status" value="1">
                        <input type="hidden" id="redeem_date" name="voucher_redemption_date" value="{{date('Y-m-d H:i:s')}}">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless">


                                    <tbody>
                                        <tr>
                                            <th scope="row">Voucher</th>
                                            <td>{{$voucher->title}}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Terms & Conditions</th>
                                            <td>
                                                <p>{{$voucher->terms}}</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Expiry Date</th>
                                            <td>{{$voucher->expiry_date->format('Y-m-d')}}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Branch Outlet</th>
                                            <td colspan="2">
                                                <div class="form-group">       
                                                    <select name="stores_id" class="form-control" id="rSelect" >                                                              
                                                       
                                                        @foreach($voucher->stores as $store)            
                                                          <option value="{{$store->stores_id}}">{{$store->name}}</option>                            
                                                        @endforeach 
                                                           
                                                    </select>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>                                   

                        <div id="redeemDiv">
                            <button type="submit" id="redeemButton" class="btn btn-info btn-fill pull-right">Redeem</button>
                        <div/>


                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



@endsection

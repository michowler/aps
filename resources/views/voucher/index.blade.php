@extends('layouts.merchant_layout')

@section('navbar-brand', 'My Vouchers')

@section('content')
<div class="container-fluid">
  

  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="header">
          <h4 class="title">My Vouchers</h4>

        </div>

        <div class="content">
          <form>
            <div class="row">
              <div class="col-md-12">    

                <p class="title">No. of Vouchers created: {{$vCount}}</h4>                                  
                <table class="table table-borderless">
                  
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Expiry Date</th>
                    <th>No. of Vouchers</th>   
                    <th>Status</th>    
                    <th></th>                                                  
                  </tr>
                  
                  
                  @foreach($vouchers as $voucher)
                    <tr>
                      <td>{{ $voucher->vouchers_id }}</td>
                      <td><a href="{{ route('showVoucher',['vouchers_id' => $voucher->vouchers_id]) }}" style="color:black;">{{ $voucher->title }}</a></td>
                      <td>{{ $voucher->expiry_date->format('Y-m-d') }}</td>
                      <td>{{ $voucher->max_redeem }}</td>
                      <td>{{ ucFirst($voucher->status) }}</td>
                      <!-- <td><button class="btn btn-danger">delete</button><td> -->

                    </tr>
                    @endforeach
                    {{ $vouchers->links() }}

                      
                              </tbody>
                            </table>





                          </div>


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
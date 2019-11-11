@extends('layouts.merchant_layout')
@section('navbar-brand', 'Redeem Vouchers')
@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Redeemed Vouchers</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="title">No. of Vouchers redeemed: </h4><br>
                                            <table class="table table-borderless">                                              
                                              <tbody>
                                                <tr>
                                                  <th scope="row">Voucher</th>
                                                  <th>Title</th>
                                                  <th>Expiry Date</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                  
                                                </tr>
                                                @foreach($vouchers as $voucher)
                                                  <tr>
                                                    <td>{{ $voucher->vouchers_id }}</td>
                                                    <td><a href="{{ route('showVoucher',['vouchers_id' => $voucher->vouchers_id]) }}" style="color:black;">{{ $voucher->title }}</a></td>
                                                    <td>{{ $voucher->expiry_date }}</td>
                                                    <td>Valid</td>
                                                    <td><button class="btn btn-danger">redeem</button><td>

                                                  </tr>
                                                  @endforeach
                                                  {{ $vouchers->links() }}
                                              </tbody>
                                            </table>
                                          
                                        </div>
                                      
                                    </div>                                   
                                
                                    <div id="redeemDiv">
                                      <!-- <button type="submit" id="redeemButton" class="btn btn-info btn-fill pull-right">Redeem</button> -->
                                    <div/>
                                    
                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>

<!-- 
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

    </div>
    @endsection
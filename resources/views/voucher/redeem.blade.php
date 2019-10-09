@extends('layouts.merchant_layout')

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Voucher ID: 2348</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless">
                                              
                                              <tbody>
                                                <tr>
                                                  <th scope="row">Voucher</th>
                                                  <td>50% off all drink items</td>
                                                  
                                                </tr>
                                                <tr>
                                                  <th scope="row">Terms & Conditions</th>
                                                  <td>
                                                     <p>1. This voucher allows the holder to receive 50% off any drinks.</p>
                                              <p>2.This voucher is non-refundable and cannot be exchanged for cash in part or full and is valid for a single transaction only.</p>
                                              <p>3. This voucher is valid up to the stipulated expiry date and no 
      extension of date shall be given.</p>
                                              <p>4. You can redeem this voucher only at the specific Subway outlets.</p>
                                              <p>5. Not applicable for online Purchase.</p>
                                                  </td>
                                                  
                                                </tr>
                                                <tr>
                                                  <th scope="row">Expiry Date</th>
                                                  <td>28th June 2019</td>
                                                 
                                                </tr>
                                                <tr>
                                                  <th scope="row">Branch Outlet</th>
                                                  <td colspan="2">
                                                    <div class="form-group">       
                                                        <select class="form-control" id="rSelect" onchange="demo.showRedeembutton();" >
                                                             <option>-</option>
                                                             <option>Sunway Pyramid</option>
                                                             <option>Taylor's Lakeside Campus</option>
                                                             <option>1 Utama</option>   
                                                             <option>Paradigm Mall</option>
                                                             <option>Suria KLCC</option>
                                                             <option>Tesco Kepong Village Mall</option>                                                           
                                                        </select>
                                                    </div>
                                                  </td>
                                                  
                                                </tr>
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
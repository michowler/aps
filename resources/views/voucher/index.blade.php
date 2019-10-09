@extends('layouts.merchant_layout')

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

              
                <table class="table table-hover">
                  <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Expiry Date</th>
                    <th>Status</th>    
                    <th></th>                                                  
                  </thead>
                  <tbody>
                  
                  @foreach($vouchers as $voucher)
                    <tr>
                      <td>{{ $vouchers->vouchers_id }}</td>
                      <td><a href="viewVoucher.html" style="color:black;">{{ $vouchers->title }}</a></td>
                      <td>{{ $vouchers->expiry_date }}</td>
                      <td>Valid</td>
                      <td><button class="btn btn-danger">delete</button><td>

                    </tr>
                    @endforeach
                      
                              </tbody>
                            </table>


                            <nav aria-label="Page navigation example " style="text-align:center;">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                              </ul>
                            </nav>



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
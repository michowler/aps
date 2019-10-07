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
                    <tr>
                      <td>1</td>
                      <td><a href="viewVoucher.html" style="color:black;">Subway 50% Off For All Drink Items</a></td>
                      <td>1 October 2019</td>
                      <td>Valid</td>
                      <td><button class="btn btn-danger">delete</button><td>

                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Tesco 50% Off Electronices</td>
                        <td>4 December 2019</td>
                        <td>Valid</td>
                        <td><button class="btn btn-danger">delete</button>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sage Rodriguez</td>
                          <td>27 March 2020</td>
                          <td>Valid</td>
                          <td><button class="btn btn-danger">delete</button>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Philip Chaney</td>
                            <td>30 March 2019</td>
                            <td>Invalid</td>
                            <td><button class="btn btn-danger">delete</button>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Doris Greene</td>
                              <td>14 January 2020</td>
                              <td>Valid</td>
                              <td><button class="btn btn-danger">delete</button>
                              </tr>
                              <tr>
                                <td>6</td>
                                <td>Mason Porter</td>
                                <td>12 May 2019</td>
                                <td>Invalid</td>
                                <td><button class="btn btn-danger">delete</button>
                                </tr>
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
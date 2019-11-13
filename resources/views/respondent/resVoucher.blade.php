@extends('layouts.res_layout')

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

                
                <table class="table table-borderless">
                  
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Expiry Date</th>
                    <th>Status</th>    
                    <th></th>                                                  
                  </tr>
                  {{$surveys}}
                  
                  
                  
                  
                  
               

                      
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
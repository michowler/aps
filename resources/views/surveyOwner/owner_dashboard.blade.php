@extends('layouts.owner_layout')

@section('navbar-brand', 'Welcome Back !')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-4">
                        <div class="card " style="border-radius: 20px">

                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Survey<i class="pull-right far fa-sticky-note"></i></h5>
                                <span class="h2 font-weight-bold mb-0">16</span>
                                <p class="category" style="padding-top: 10px">Since last week</p>
                            </div>

                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Response<i class="pull-right fas fa-tasks" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">0</span>
                                 <p class="category" style="padding-top: 10px">Since Yesterday</p>
                            </div>
        
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">2</span>
                                 <p class="category" style="padding-top: 10px">---</p>
                            </div>
                             </div>
                    </div>
                </div>

                <div class="row">
                <form method="get" action="/createSurvey">
                    <div class="col-md-12" style="text-align: center; padding-bottom: 20px">
                        <button type="submit" class="btn btn-info btn-fill" >CREATE SURVEY</button>
                    </div>
                    </form>
                    
                                    <!-- <div class="clearfix" ></div> -->
                </div>


                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 5px">
                       <h4 class="title">Recent Survey</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">Customer Satisfaction</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div>            
                                        
                </div>

                  <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">General Event Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div>            
                                     
                </div>

                  <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">    Website Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 23/06/2019</p>
                            </div>
                        </div>
                    </div>            
                                
                </div>
                    

                 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
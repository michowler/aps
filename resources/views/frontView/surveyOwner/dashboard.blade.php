@extends('layouts.owner_layout')

@section('content')
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('FrontEnd') }}/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    APSE
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li>
                    <a href="/createSurvey">
                        <i class="pe-7s-plus"></i>
                        <p>Create Survey</p>
                    </a>
                </li>
                <li>

                     <a href="/mySurvey">
                        <i class="pe-7s-note2"></i>
                        <p>My Surveys</p>
                    </a>
                </li>
                <li>

                    <a href="/userProfile">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                
                <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Survey Owner Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      
                    </ul>

                     <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">2</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <!-- <li> <a onclick="demo.showMessage('top','center', 
                                  'Error: Please fill in all fields.')">Submit</a>
                                  </li> -->
                                  <li><a data-toggle="modal" data-target="#myModal">Created "Customer Satifaction" survey</a></li>
                                  <li><a data-toggle="modal" data-target="#myModal">Response +10 for "Customer Satifaction" survey</a></li>
                                  <li><a data-toggle="modal" data-target="#myModal">Created "General Event Feedback" survey</a></li>

                               
                              </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        User
                                        <b class="caret"></b>
                                    </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Settings</a></li>
                                <li><a href="/login">Logout</a></li>                                                             
                              </ul>
                        </li>
                      
                                    <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-4">
                        <div class="card" style="border-radius: 10px">

                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Surveys Created<i class="pull-right far fa-sticky-note"></i></h5>
                                <span class="h2 font-weight-bold mb-0">12</span>
                                <p class="category" style="padding-top: 10px">Since last week</p>
                            </div>

                          
                            </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Responses<i class="pull-right fas fa-tasks" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">1,410</span>
                                 <p class="category" style="padding-top: 10px">Since Yesterday</p>
                            </div>
                        
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Surveys Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">8</span>
                                 <p class="category" style="padding-top: 10px">---</p>
                            </div>
                             </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" style="text-align: center; padding-bottom: 20px">
                        <a type="submit" href="/createSurvey" class="btn btn-info btn-fill" >CREATE SURVEY</a>
                    </div>
                    
                                    <!-- <div class="clearfix" ></div> -->
                </div>

                          

                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 2px">
                       <h4 class="title">My Recent Surveys</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">Product Satisfaction</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">Customer Satisfaction</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div>             
                                        
                </div>

                  <div class="row">
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">General Event Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">Public Event Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 24/06/2019</p>
                            </div>
                        </div>
                    </div>               
                                     
                </div>

                  <div class="row">
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">  Phone Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 23/06/2019</p>
                            </div>
                        </div>
                    </div>     
                    <div class="col-md-6" >
                        <div class="card" style="border-radius: 10px">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">    Website Feedback</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">Created: 23/06/2019</p>
                            </div>
                        </div>
                    </div>             
                                
                </div>

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


</body>
 @endsection

 
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

          

        });
    </script>

</html>

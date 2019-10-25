@extends('layouts.owner_layout')

@section('content')
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('FrontEnd') }}/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    APSE
                </a>
            </div>

            <ul class="nav">
                
                 <li >
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
                     <li class="active">
                     <a href="/mySurvey">
                        <i class="pe-7s-note2"></i>
                        <p>My Survey</p>
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
                    <a class="navbar-brand" href="#">Survey List</a>
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
                       <!--  <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li> -->
                                    <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Surveys</h4>
<!--                                 <p class="category">Here is a subtitle for this table</p>
 -->                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Survey Title</th>
                                    	<th>Created at</th>
                                    	<th>Responses</th>
                                    	<th>Analyze</th>
                                        <th>Delete Survey</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Customer Satisfaction</td>
                                        	<td>24/06/2019</td>
                                        	<td>0</td>
                                        	<td><a href="chart.html"><button class="btn"><i class="far fa-chart-bar"></i></a></td>
                                            <td><button class="btn"><i class="fa fa-trash"></i> Trash</button></td>
                                        </tr>
                                        <tr>
                                        	<td>2</td>
                                        	<td>Employee Engagement</td>
                                        	<td>20/06/2019</td>
                                        	<td>10</td>
                                        	<td><button class="btn"><i class="far fa-chart-bar"></i></td>
                                            <td><button class="btn"><i class="fa fa-trash"></i> Trash</button></td>
                                        </tr>
                                        <tr>
                                        	<td>3</td>
                                        	<td>Market Research</td>
                                        	<td>21/06/2019</td>
                                        	<td>5</td>
                                        	<td><button class="btn"><i class="far fa-chart-bar"></i></td>
                                            <td><button class="btn"><i class="fa fa-trash"></i> Trash</button></td>
                                        </tr>
                                        <tr>
                                        	<td>4</td>
                                        	<td>Website Feedback</td>
                                        	<td>23/06/2019</td>
                                        	<td>0</td>
                                        	<td><button class="btn"><i class="far fa-chart-bar"></i></td>
                                            <td><button class="btn"><i class="fa fa-trash"></i> Trash</button></td>
                                        </tr>
                                        <tr>
                                        	<td>5</td>
                                        	<td>General Event Feedback</td>
                                        	<td>24/06/2019</td>
                                        	<td>2</td>
                                        	<td><button class="btn"><i class="far fa-chart-bar"></i></td>
                                            <td><button class="btn"><i class="fa fa-trash"></i> Trash</button></td>
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
                    </div>


                 

    </div>
</div>
   @endsection

</body>

    <!--   Core JS Files   -->
 

</html>

@extends('layouts.admin_layout')

@section('content')
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="{{asset ('FrontEnd') }}/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    APSE
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/dashboardAdmin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="/adminProfile">
                        <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    <a href="/ownerTable">
                        <i class="pe-7s-note2"></i>
                        <p>Survey Owner</p>
                    </a>
                </li>
                <li class="active">
                    <a href="/respondentTable">
                        <i class="pe-7s-news-paper"></i>
                        <p>Survey Respondent</p>
                    </a>
                </li>
                <li>
                    <a href="/merchantTable">
                        <i class="pe-7s-note2"></i>
                        <p>Merchant</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-bell"></i>
                        <p>Notification</p>
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
                    <a class="navbar-brand" href="#">Survey Respondent List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Approval</a></li>
                                <li><a href="#">Approval</a></li>
                                <li><a href="#">Approval</a></li>
                                <li><a href="#">Approval</a></li>
                                <li><a href="#">Approval</a></li>
                              </ul>
                        </li>
                         <!--<li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>-->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!--<li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <li>
                            <a href="/login">
                                <p>Log out</p>
                            </a>
                        </li>
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
                                <h4 class="title">LIST OF SURVEY RESPONDENT</h4>
                                <p class="category">Here is a the list of survey respondent</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Email</th>
                                    	<th>Interest</th>
                                    	<th>Age</th>
										<th>Date of Birth</th>
										<th>Address</th>
										<th>Education</th>
										
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>R1</td>
                                        	<td>Alice</td>
                                        	<td>aliceng_210@hotmail.com</td>
                                        	<td>Shopping, Food, Travel</td>
                                        	<td>22</td>
											<td>10 Feb 1997</td>
											<td>66,Taman FYP, 66800, Puchong </td>
											<td>Bachelors</td>
											<td><button class="btn btn-primary">Edit</button></td>
                                            <td><button class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        <tr>
                                        	<td>R2</td>
                                        	<td>Ying Ying</td>
                                        	<td>loo.yingying@gmail.com</td>
                                        	<td>Food, Shopping, Sport</td>
											<td>21</td>
											<td>16 Jan 1998</td>
                                        	<td>11, Taman Seri, 77995, Seri Kembangan</td>
											<td>Bachelors</td>
											<td><button class="btn btn-primary">Edit</button></td>
                                            <td><button class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        <tr>
                                        	<td>R3</td>
                                        	<td>Michelle</td>
                                        	<td>michelleler@gmail.com</td>
                                        	<td>Music, Food</td>
                                        	<td>22</td>
											<td>25 April 1997</td>
											<td>95, Taman Sara, 55632, Damansara</td>
											<td>Bachelors</td>
											<td><button class="btn btn-primary">Edit</button></td>
                                            <td><button class="btn btn-danger">Delete</button></td>
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
                    </div>


                </div>
            </div>
        </div>

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
        </footer>


    </div>
</div>


</body>
@endsection
    <!--   Core JS Files   -->
 

</html>

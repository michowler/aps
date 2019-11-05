@extends('layouts.owner_layout')

@section('navbar-brand', 'Upgrade')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header text-center">
                                <h4 class="title">Choose a Plan that works for you</h4>
                                <p class="category">Are you looking for more surveys and respondents? Please check our Premium Version of package.</p>
								<br>
                            </div>
                            <div class="content table-responsive table-full-width table-upgrade">
                                <table class="table">
                                    <thead>
                                        <th></th>
                                    	<th class="text-center">Free</th>
                                    	<th class="text-center">PRO</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>Number of survey</td>
                                        	<td>20</td>
                                        	<td>Unlimited</td>
                                        </tr>
                                        <tr>
                                        	<td>Questions per survey</td>
                                        	<td>10</td>
                                        	<td>Unlimited</td>
                                        </tr>
                                        <tr>
                                        	<td>Responses per survey</td>
                                        	<td>50</td>
                                        	<td>Unlimited</td>
                                        </tr>
                                          <tr>
                                            <td>Visualization and Reporting </td>
                                            <td><i class="fa fa-check text-success"></i></td>
                                            <td><i class="fa fa-check text-success"></td>
                                        </tr>
                                        <tr>
                                        	<td>Data exports (CSV) </td>
                                        	<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
                                      
                                        <!-- <tr>
                                        	<td>Login/Register/Lock Pages</td>
											<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr>
										<tr>
                                        	<td>Premium Support</td>
											<td><i class="fa fa-times text-danger"></i></td>
                                        	<td><i class="fa fa-check text-success"></td>
                                        </tr> -->
										<tr>
                                        	<td></td>
											<td>Free</td>
                                        	<td>RM 100 / per month</td>
                                        </tr>
										<tr>
											<td></td>
											<td>
												<a href="#" class="btn btn-round btn-fill btn-default disabled">Current Version</a>
											</td>
											<td>
												<a href="/create" class="btn btn-round btn-fill btn-info">Upgrade to PRO</a>
											</td>
										</tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


       <!--  <footer class="footer">
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
</div>

@endsection
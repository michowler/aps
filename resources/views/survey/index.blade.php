@extends('layouts.owner_layout')

@section('content')


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
                                        	<td><a href="/chart"><button class="btn"><i class="far fa-chart-bar"></i></a></td>
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



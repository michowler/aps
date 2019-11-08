@extends('layouts.owner_layout')

@section('navbar-brand', 'Survey Visualization')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">

                                
                                <h4 class="title">First</h4> 
                                <span class="category">24/06/2019</span>
                                

                            </div>
                            <br><br>
                            <div class="content">
                                <p class="category">Number of responses</p>
                                    {!! $usersChart->container() !!}
<!--                                 <div id="chartActivity" class="ct-chart"></div>
 -->                                <p class="category" style="text-align:center;">Questions</p>
                                <br>
                                <br>
                                <div class="footer">                                    
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Answer A
                                        <i class="fa fa-circle text-danger"></i> Answer B
                                        <i class="fa fa-circle text-success"></i> Answer C
                                        <i class="fa fa-circle text-warning"></i> Answer D
                                    </div>

                                    <hr>
                                    <div class="stats">
                                        <a href="/chart" class="fas fa-file-csv"></a><a href="/chart" > Export Result to CSV </a>
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
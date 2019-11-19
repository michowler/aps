@extends('layouts.owner_layout')

@section('navbar-brand', 'Survey List')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Surveys</h4>
<!--                                 <p class="category">Here is a subtitle for this table</p>
 -->                         </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Survey Title</th>
                                        <th>Created at</th>
                                        <th>Analyze</th>
                                        <th>Delete</th>
                                    </tr>
                                    @foreach ($surveys as $survey)
                                        <tr>
                                            <td>{{ $survey->surveys_id}}</td>
                                            <td>{{ $survey->surveys_title}}</td>
                                            <td>{{ $survey->created_at}}</td>
                                            <td><a href="/chart?id={{ $survey->surveys_id}}" class="btn" id="" ><i class="far fa-chart-bar"></i></a></td>
                                            <td><a href="{{route('survey.destroy',$survey->surveys_id)}}" type="submit"  class="btn" type="submit" method="post" name="_method" value="delete"><i class="fa fa-trash"></i> Trash</button></td></a>
                                        </tr>
                                    @endforeach                  
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

<script type="text/javascript">
    function formSubmit()
    {
        $("#deleteSurveyForm").submit();
    }
</script>

@endsection


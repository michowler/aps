@section('navbar-brand', 'My Surveys')
@extends('layouts.res_layout')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


    .third-level-menu
    {
        position: absolute;
        top: 0;
        right: -150px;
        width: 150px;
        list-style: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    .third-level-menu > li
    {
        height: 30px;
        background: #999999;
    }
    .third-level-menu > li:hover { background: #CCCCCC; }
    .second-level-menu
    {
        position: absolute;
        top: 30px;
        left: 0;
        width: 150px;
        list-style: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    .second-level-menu > li
    {
        position: relative;
        height: 30px;
        background: #999999;
    }
    .second-level-menu > li:hover { background: #CCCCCC; }

    .top-level-menu
    {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .top-level-menu > li
    {
        position: relative;
        float: left;
        height: 30px;
        width: 150px;
        background: #999999;
        margin-bottom: 1rem;
        margin-top: 1rem;
    }
    .top-level-menu > li:hover { background: #CCCCCC; }

    .top-level-menu li:hover > ul
    {
        /* On hover, display the next level's menu */
        display: inline;
    }


    /* Menu Link Styles */

    .top-level-menu a /* Apply to all links inside the multi-level menu */
    {
        font: bold 16px Arial, Helvetica, sans-serif;
        color: #FFFFFF;
        text-decoration: none;
        padding: 0 0 0 10px;

        /* Make the link cover the entire list item-container */
        display: block;
        line-height: 30px;
    }
    .top-level-menu a:hover { color: #000000; }

    .button5 {
      background-color: white;
      color: black;
      border: 2px solid #555555;
  }

  .button5:hover {
      background-color: #555555;
      color: white;
  }
</style>


</head>
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="header">
                        <h4 class="title">Surveys Available</h4>

                        <ul class="top-level-menu">
                            <li>
                                <a href="#">Filter<span class="caret"></span></a>
                                <ul class="second-level-menu">
                                    <li>
                                        <a>Location</a>
                                        <ul class="third-level-menu">
                                            @foreach($locations as $location)
                                            <li><a href="/resFilter?locationId={{$location->locations_id}}">
                                               {{$location->locations_name}}
                                           </a></li>
                                           @endforeach
                                       </ul>
                                   </li>
                                   <li>
                                    <a>Interest</a>
                                    <ul class="third-level-menu">
                                        @foreach($interests as $interest)
                                        <li><a href="/resFilter?interestId={{$interest->interests_id}}">
                                            {{$interest->interests_name}}
                                        </a></li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>
                        </ul>    


                        <table class="table table-hover table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Survey Title</th>
                                <th>Survey Description</th>
                                <th>View</th>
                                <th></th>
                            </tr>
                            @foreach ($surveys as $survey)

                            <tr>
                                <td>{{ $survey->surveys_id}}</td>
                                <td>{{ $survey->surveys_title}}</td>
                                <td>{{ $survey->surveys_description}}</td>

                                <td><a href="viewSurvey?id={{$survey->surveys_id}}" class="btn btn-primary">View</a></td>
                                
                            </tr>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

    
    @endsection

    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            

        });
    </script>
    <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}


$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
});
});
</script>


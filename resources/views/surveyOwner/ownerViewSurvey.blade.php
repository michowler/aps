@section('navbar-brand', 'View Survey')
@extends('layouts.owner_layout')
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <form action="{{route('savedAnswer')}}" method="POST">
                    <div class="header">
                        <h4 class="title">{{$survey->surveys_title}}</h4>
                        <label> </label>
                        <label> </label>
                        <p class="category">{{$survey->surveys_description}}</p>
                        
                        <label> </label>
                        <label> </label>
                                                

                        @foreach ($questions as $question)
                        <div class="form-group">

                            <label>{{$question->questions_title}}</label>                            
                            
                            @foreach($question->options as $option)
                            <div class="radio">
                                <label>
                                    
                                   <input type="radio" value="{{$option->content}}" name="{{$question->questions_id}}" id="radio{$option->options_id}">                                                         
                                   {{$option->content}}
                                   
                               </label>
                               
                           </div>
                           @endforeach
                           

                           @endforeach
                           <input type="submit" style="margin:5px;" class="btn btn-info btn-fill pull-right"  value="Done" id="submit"/></button></a>    
                       </div>
                   </div>
               </div>
               
           </div>
       </div>

   </div>



</body>
@endsection

<script type="text/javascript">

    
</script>

</html>

@extends('layouts.owner_layout')

@section('navbar-brand', 'Generate Question')

@section('content')
<div class="container-fluid">
    
<div class="col-md-12">
    <div class="card">
       <div class="header">
           
       </div>
       <div class="content">
                   <form id="questions" action="{{action('Survey\SurveyController@storeQuestion')}}" method="POST">
                                     {{csrf_field()}}
                                     <h2>Question <span id="questionNum">1</span></h2>
                                 
       
                       <div class="content">
                           <div class="row justify-content-center">
                                <div class="col-md-12">
          <!--  <div class="card"> -->
               
                                <div class="row">
                                       
                                           <div class="form-group">
                                               
                                              
                                              <input type="questions_title" class="form-control" placeholder="Question Title" name="questions_title" id="questions_title"><br>
                                      
                       <label>Please insert your answer:</label><br>
                      
                          <!--  <input type="hidden" name="savedSurveyId" value="{{ session()->get( 'savedSurveyId' ) }}"> -->
                          <input id="content1" type="content" class="form-control" placeholder="Answer 1" name="content"/><br>
                          <input id="content2" type="content" class="form-control" placeholder="Answer 2" name="content"/><br>
                          <input id="content3" type="content" class="form-control" placeholder="Answer 3" name="content"/><br>
                          <input id="content4" type="content" class="form-control" placeholder="Answer 4" name="content"/><br>
                         </input>
                                         
                 <input type="button" style="margin:5px;" class="btn btn-info btn-fill pull-right" onclick="addQuestion()" value="Add Question" /></button>   
                  <input type="submit" style="margin:5px;" class="btn btn-info btn-fill pull-right" onclick="finish()" value="Finish Create Survey" /></button>         
                                     

                   </div>
                   </div>
                   </div>
                   </div>
               </div>
       </form>
</div>
</div>
</div>




</div>
</div>
</div>
  </div>
</div>
@endsection
<script>
 // Max questions
var count = 1; // There are 1 questions already
var questions =[];
var options=[];


function addQuestion(questions_title, content){
    
    // after click the button, the form will be reset
    
    var quesTitle = $("#questions_title").val();
    console.log(quesTitle);
    questions.push(quesTitle);

    var optionsArr = [];
    var options1 = $("#content1").val();
    var options2 = $("#content2").val();
    var options3 = $("#content3").val();
    var options4 = $("#content4").val();

    if(quesTitle=="" || options1 =="" || options2 == ""){
        //error message here
        alert("Question Title,Answer 1 and Answer 2 Cannot be empty ");
    }else{
        optionsArr.push(options1,options2,options3,options4);
        options.push(optionsArr);
        optionsArr = [];
        // increase the question number  after click on add question button
        $("#questionNum").html(count +1);
        count++;
        $("#questions")[0].reset();
    }


    
   
 
    }

    function finish(){
        event.preventDefault();
        var quesTitle = $("#questions_title").val();
        var optionsArr = [];
        var options1 = $("#content1").val();
        var options2 = $("#content2").val();
        var options3 = $("#content3").val();
        var options4 = $("#content4").val();

        

        if(quesTitle=="" || options1 =="" || options2 == ""){

        }else{
            questions.push(quesTitle);
            optionsArr.push(options1,options2,options3,options4);
            options.push(optionsArr);
            optionsArr = [];

        }
        console.log("yes");
        $.ajax({
                type: 'POST',
                url:'storeQuestion',
                data: {"_token": "{{ csrf_token() }}",questions_title: questions, content: options },
                success: function(html){
                    console.log("sent complete");
                    console.log(html);
                    window.location ="{{route('ownerSurvey')}}";
                }
            });
      
    }
    


</script>
  


 
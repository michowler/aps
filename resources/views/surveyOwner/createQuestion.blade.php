@extends('layouts.owner_layout')

@section('navbar-brand', 'Generate Question')

@section('content')

        <!--div class="content"-->
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                
                 
<!-- <form id="quiz" action="" method="POST"> -->

   <!--  <input type="button" value="Add question" onclick="javascript: addQuestion();"/> -->

  <!--   <p>Question 1</p>
    <input type="text" name="questions[]"/>
    <p>Question 2</p>
    <input type="text" name="questions[]"/>
    <p>Question 3</p>
    <input type="text" name="questions[]"/>
    <p>Question 4</p>
    <input type="text" name="questions[]"/>
    <p></p> -->
 

                    <form id="questions" action="{{action('Survey\SurveyController@storeQuestion')}}" method="POST">
                                      {{csrf_field()}}
                                      <h2>Question <span id="questionNum">1</span></h2>
                                  
 
                        <div class="content">
                            <div class="row justify-content-center">
                                 <div class="col-md-8">
           <!--  <div class="card"> -->
                
                                 <div class="row">
                                        
                                            <div class="form-group">
                                                
                                                <!-- <input type="text" id="number" value="s1"/> -->
                                                
                                                <input type="text" class="form-control" placeholder="Question Title" name="questions_title"><br>
                                                
                                                
                                                <label>Please insert your answer:</label><br>
                                               
                                                   <!--  <input type="hidden" name="savedSurveyId" value="{{ session()->get( 'savedSurveyId' ) }}"> -->
                                                    <input type="text" class="form-control" placeholder="Answer 1" name="content"/><br>
                                                    <input type="content" class="form-control" placeholder="Answer 2" name="content"/><br>
                                                    <input type="content" class="form-control" placeholder="Answer 3" name="content"/><br>
                                                    <input type="content" class="form-control" placeholder="Answer 4" name="content"/><br>
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

 <script>
var limit = 10; // Max questions
var count = 1; // There are 1 questions already

function addQuestion(){
    // Get the quiz form element
    $("#questionNum").html(count +1);
    count++;
    
    $("#questions")[0].reset();
    }

</script>
                              <!--   <h4 class="title">Generate Question</h4>
                            <p id ="demo"></p>
                                 <div class="content">
                                 <form action="{{action('Survey\SurveyController@storeQuestion')}}" method="POST">
                                      {{csrf_field()}}

                                 <div class="row">
                                        
                                            <div class="form-group">
                                                
                                                <input type="text" id="number" value="s1"/>
                                                
                                                <input type="questions_title" class="form-control" placeholder="Question Title" name="questions_title"><br>
                                                
                                                
                                                <label>Please insert your answer:</label><br>
                                               
                                                    <input type="hidden" name="savedSurveyId" value="{{ session()->get( 'savedSurveyId' ) }}">
                                                    <input type="content" class="form-control" placeholder="Answer 1" name="content1"><br>
                                                    <input type="content" class="form-control" placeholder="Answer 2" name="content2"><br>
                                                    <input type="content" class="form-control" placeholder="Answer 3" name="content3"><br>
                                                    <input type="content" class="form-control" placeholder="Answer 4" name="content4"><br>
                                            </div> -->
                               <!--              <button style="margin:5px;" type="submit" class="btn btn-info btn-fill pull-right" oncllick="myFunction()">Next Question</a></button> -->
                                                  <!--   <form>
   
                                                <button style="margin:5px;" type="submit" class="btn btn-info btn-fill pull-right" onclick="incrementValue()" value="Next Question" />Next Question</button>
                                                </form> -->
                                          <!--   <script>
                                                function myFunction(){
                                                    document.getElementById("demo").innerHTML="OK"
                                                }
                                            </script> -->
                                            <!-- <script type="text/javascript">
                                            function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}
</script>
                                              <button style="margin:5px;" type="submit" class="btn btn-info btn-fill pull-right">Finish</a>
                                    </button>
                                 
                                        </div>
                                           </div>
                                           </div>
                                           </div>                   
                                    

                                   
                                
                                    


                                </form> -->
              
            
                    <!--div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                           <!-- <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div-->

    </div>
</div>


 @endsection

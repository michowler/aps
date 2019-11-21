@section('navbar-brand', 'Answer Survey')
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

   

@section('content')



				<div class="content">
						<div class="container-fluid">
								<div class="row">
										<div class="col-md-12">
												<div class="card">
														 <form id="surveyForm" action="{{route('saveAnswer')}}" method="GET" >
														 	 {{csrf_field() }} 
														<div class="header">
																<h4 class="title">{{$survey->surveys_title}}</h4>
																<label> </label>
																<label> </label>
                                <p class="category">{{$survey->surveys_description}}</p>
														
																<label> </label>
																<label> </label>
														
														<input type="hidden" value="{{$survey->surveys_id}}" name="surveys_id">								

														@foreach ($questions as $question)
															<div class="form-group">

																<label>{{$question->questions_title}}</label>
																
																

																	@foreach($question->options as $option)
																	<div class="radio">
																		<label>
																			
																	 <input type="radio" value="{{$option->options_id}}" name="answers[{{$question ->questions_id}}]">															
																			{{$option->content}}
																		
																 		</label>
																
																 	</div>
																	@endforeach
																	

														@endforeach
														<button onclick="test()" type="button" style="margin:5px;" class="btn btn-info btn-fill pull-right" />Submit</button> 
												</div>
										</div>
								</div>
									
						</div>
				</div>

		</div>
</div>

@endsection
<!-- 	modal fail -->
<div class="modal fade" tabindex="-1" role="dialog"  id="failSubmit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Error Submitting</h4>
      </div>
      <div class="modal-body">
        <p>Please fill in all question!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 	modal success -->
<div class="modal fade" tabindex="-1" role="dialog"  id="successAlert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Submit Survey</h4>
      </div>
      <div class="modal-body">
        <p>Press Submit to submit your answers and collect voucher!</p>
      </div>
      <div class="modal-footer">
        <button onclick="submitForm()" type="button" class="btn btn-primary"/>Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		<script type="text/javascript">
			function submitForm(){
				$('form#surveyForm').submit();
			}
			function test(){
				var check = true;
        $("input:radio").each(function(){
            var name = $(this).attr("name");
            if($("input:radio[name='"+name+"']:checked").length == 0){
                check = false;
            }
        });
        
        if(check){
            $('#successAlert').modal('show');
        }else{
            $('#failSubmit').modal('show');
        }
				// event.preventDefault();
				// if (option == ""){
				// 	alert("Please Answer all questios!");
				// }
				
				
			}
			   
        

			 // function finish(){
        // event.preventDefault();
        // var choicesArr = [];
        // var choices1 = $("#choice1").val();
        // // var choices2 = $("#choice2").val();
        // var choices3 = $("#choice3").val();
        // var choices4 = $("#choice4").val();

        

        // if(choices1 =="" || choices2 == ""|| choices3 == ""|| choices4 == ""){

        // }else{
           
        //     choicesArr.push(options1,options2,options3,options4);
        //     choices.push(choicesArr);
        //     choicesArr = [];

        // }
        // console.log("yes");
        // $.ajax({
        //         type: 'POST',
        //         url:'storeChoice',
        //         data: {"_token": "{{ csrf_token() }}",choices_id : options },
        //         success: function(html){
        //             console.log("sent complete");
        //             console.log(html);
        //             window.location ="{{route('resVoucher')}}";
        //         }
        //     });
      
    // }
				
</script>

</html>
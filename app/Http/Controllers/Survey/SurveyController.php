<?php

namespace App\Http\Controllers\Survey;

use Auth;
use DB;

use App\Interest;
use App\locations;
use App\Option;
use App\Voucher;
use App\Question;
use App\surveys;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SurveyController extends Controller
{

  public function __construct()
  {
    //die("we are here");
  $this->middleware(function($request, $next)
  {
    $this -> user = Auth::user();
    return $next($request);
  });
   }
   
  // public function mySurvey(){
  //     return view('survey.mySurvey');
  // }

  public function showChart(Request $request){

    
    $questionID = [];
    $surveyID = $request->id;
    $survey = surveys::find($surveyID);
    
    $quesArr = Question::where('surveys_id', $surveyID)->get();
    $questionCount = [];
    $ch1Arr = [];
    $ch2Arr = [];
    $ch3Arr = [];
    $ch4Arr = [];
    for($i=0;$i<count($quesArr);$i++){
      
      $res = DB::table('tag_respondents_options')->select('choices_id',DB::raw('count(*) AS total'))->where('questions_id',$quesArr[$i]->questions_id)->groupBy('choices_id')->get()->toArray();

      $ch1 = DB::table('tag_respondents_options')->where('questions_id',$quesArr[$i]->questions_id)->where('choices_id',1)->count();
      $ch2 = DB::table('tag_respondents_options')->where('questions_id',$quesArr[$i]->questions_id)->where('choices_id',2)->count();
      $ch3 = DB::table('tag_respondents_options')->where('questions_id',$quesArr[$i]->questions_id)->where('choices_id',3)->count();
      $ch4 = DB::table('tag_respondents_options')->where('questions_id',$quesArr[$i]->questions_id)->where('choices_id',4)->count(); 
      array_push($ch1Arr, $ch1);
      array_push($ch2Arr, $ch2);
      array_push($ch3Arr, $ch3);
      array_push($ch4Arr, $ch4);
      $qNo = $i+1;
      array_push($questionCount,  "Question $qNo");
    }
    $data = [
      ["name" => "Option 1",
      "data" => $ch1Arr],
      ["name" => "Option 2",
      "data" => $ch2Arr],
      ["name" => "Option 3",
      "data" => $ch3Arr], 
      ["name" => "Option 4",
      "data" => $ch4Arr]
    ];
    
    $json = json_encode($data);
    $questionCount = json_encode($questionCount);
    $allowExport = "true";
    if (DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->packages_id == 1) {
      $allowExport = "false";
    }
    return view('surveyOwner.chart')->with(['allowExport'=> $allowExport, 'survey'=>$survey, 'result'=>$json, 'qNo'=>$questionCount]);
  }

  public function create()
  {
    return view('surveyOwner.createSurvey');
  }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function createSurvey()
   {

    $interests = Interest::all();
    $locations = locations::all();
    $vouchers = Voucher::all();

    return view ('surveyOwner.createSurvey',['interests'=>$interests, 'locations'=>$locations, 'vouchers'=>$vouchers]);


   }
  
   public function store(Request $request)
  {
  
    
    $this->validate($request,[
      'surveys_title' => 'required',
      'surveys_description' => 'required',
      'interests' =>'required',
      'locations' => 'required',
      'vouchers' =>  'required'
    ]);
    $surveys = new surveys;
    $surveys ->users_id = Auth::user() -> users_id;
    $surveys ->surveys_title = $request -> get('surveys_title');
    $surveys ->surveys_description = $request -> get('surveys_description');
    $surveys ->vouchers_id = $request -> get('vouchers'); 
    $interests = $request ->input('interests');
    $locations = $request -> input('locations');
    

    
     $surveys ->save();  

    

     $surveys::findOrFail($surveys->surveys_id)->interests()->attach($interests);
     $surveys::findOrFail($surveys->surveys_id)->locations()->attach($locations);
     
     
     
     session()->put('savedSurveyId', $surveys->surveys_id);
     return redirect()->route('createQuestion');
     //return Redirect::route('createQuestion')->with('savedSurveyId', $surveys->surveys_id);


    
  }

  public function createQuestion(Request $request)
  {
  
    $surveys = Session::get('savedSurveyId');     
    return view('surveyOwner.createQuestion');
    
  }

  public function storeQuestion(Request $request)
    {
      $this -> validate($request,[
        'questions_title' => 'required',
        'content' =>'required'
      ]);

      $questionArr = $request->questions_title;
      $optionsArr = $request->content;
      $surveysID = $request->savedSurveyId;

      // var_dump($questionArr);
      // var_dump($optionsArr);
      

      for ($i = 0; $i < count($questionArr); $i++) {
            
            $quest = new Question;
            $quest->questions_title = $questionArr[$i];
            $quest->surveys_id = Session::get('savedSurveyId');
            $quest->save();
            
            for($x = 0; $x < count($optionsArr[$i]); $x++){
              if(!is_null($optionsArr[$i][$x])){
                $option = new Option;
                $option->questions_id = $quest->questions_id;
                $option->choices_id = ($x + 1);
                $option->content = $optionsArr[$i][$x];
                $option->save();
              }
              
            }
      
        }
    
    }

  public function mySurvey()
  {
    $surveys = DB::select('select * from surveys');
    return view('surveyOwner.mySurvey',['surveys'=>$surveys]);
  }

  public function destroy($id)
  { 
    \App\surveys::destroy($id);
    return redirect()->route('ownerSurvey')->with('success','Survey deleted successfully');
    
  }

  
}
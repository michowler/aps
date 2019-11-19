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
     // $vouchers = Voucher::all();
    //$mohsen="Helloooooo";

// echo "<pre>";
//         var_dump($locations);
//         die();

    return view ('surveyOwner.createSurvey',['interests'=>$interests], ['locations'=>$locations]);


   }
  
   public function store(Request $request)
  {
    if((DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->packages_id == 1) AND (DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->no_surveys > 20))
      {
      
      echo '<script>alert("Number of Survey created have reach limit. Subscibe to Premium Package for unlimited usage!");</script>';
      return view('surveyOwner.owner_Dashboard');
      
      }

    else
      {
      

      $this->validate($request,[
        'surveys_title' => 'required',
        'surveys_description' => 'required',
        'interests' =>'required',
        'locations' => 'required',
        //'vouchers' =>'required',
      ]);

      $surveys = new surveys;
      $surveys ->surveys_title = $request -> get('surveys_title');
      $surveys ->surveys_description = $request -> get('surveys_description');
      $interests = $request ->input('interests');
      $locations = $request -> input('locations');
       // $vouchers = $request -> input('vouchers');

       // //$surveys ->voucher=$request -> get('voucher');
       $surveys ->save();  

      // echo "<pre>";
      // var_dump($Surveys);
      // die();

       $surveys::findOrFail($surveys->surveys_id)->interests()->attach($interests);
       $surveys::findOrFail($surveys->surveys_id)->locations()->attach($locations);

       $latestOwnerPackageID = DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->owner_packages_id;

       DB::table('tag_owner_packages')->where('owner_packages_id', $latestOwnerPackageID)->increment('no_surveys', 1);

     //  $surveys::findOrFail($surveys->surveys_id)->vouchers()->attach($vouchers);
       //return redirect()->route('createQuestion')->with('savedSurveyId','454');
       return redirect()->route('createQuestion')->with( [ 'savedSurveyId' => $surveys->surveys_id ] );
       //return Redirect::route('createQuestion')->with('savedSurveyId', $surveys->surveys_id);


      // echo "<pre>";
      // var_dump($surveys);
      // die("");
    }

  }

  public function createQuestion()
  {
     
    $surveys = Session::get('savedSurveyId');
    $surveys = surveys::all();
    $options = Option::all();

    $savedSurveyId = session()->get( 'savedSurveyId' );
    // echo  "<pre>";
    // var_dump($savedSurveyId);
    // die();
    
    return view('surveyOwner.createQuestion');
    
  }

  public function storeQuestion(Request $request, Question $questions)
  {
    $this -> validate($request,[
      'questions_title' => 'required',
      'savedSurveyId' => 'required',
        'content' =>'required'
    ]);

    $questions = new questions;
    $questions ->questions_title = $request -> get('questions_title');
    $savedSurveyId =  $request -> get('savedSurveyId');
    $questions ->surveys_id = $savedSurveyId;
     // $options ->content = $request ->get ('content');

    $questions ->save()-> with( [ 'savedSurveyId' => $surveys->surveys_id ]);


    $savedQuestionId = $questions->questions_id;
    $options = new options;
    $options ->content = $request -> get('content1');
    $options ->questions_id = $savedQuestionId;
    $options ->save();

    $savedQuestionId = $questions->questions_id;
    $options ->content = $request -> get('content2');
    $options ->questions_id = $savedQuestionId;
    $options ->save();

    $savedQuestionId = $questions->questions_id;
    $options ->content = $request -> get('content3');
    $options ->questions_id = $savedQuestionId;
    $options ->save();

    $savedQuestionId = $questions->questions_id;
    $options ->content = $request -> get('content4');
    $options ->questions_id = $savedQuestionId;
    $options ->save();

     
    //return redirect()->route('ownerSurvey');
     
    return redirect()->route('createQuestion')->with(['savedSurveyId' =>$surveys->surveys_id], ['savedQuestionId' => $questions->questions_id]);
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
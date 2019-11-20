<?php

namespace App\Http\Controllers\Respondent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

use App\Interest;
use App\locations;
use App\surveys;
use App\Question;
use App\Choice;
use App\User;
class RespondentController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function surveyList()
    {
        $interest = Interest::all();
        $location = locations::all();
        $surveys = DB::select('select * from surveys');
        return view('respondent.res',['surveys'=>$surveys, 'interests'=>$interest], ['locations' =>$location]);
    }

    // public function interestList()
    // {
    //     $interests = DB::select('select * from interests');
    //     return view('respondent.res',['interests'=>$interests]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('respondent.edit', ['user' => $user]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $user = Auth::user();
        $user->name = request('name');
        return view('respondent.update', ['user' => $user]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function resProfile() 
     {
    return view('respondent.resProfile');
     }

   public function resVoucher()
   {
    return view('respondent.resVoucher');
   }

   public function viewSurvey(Request $request)
   {
    $survey = surveys::find($request->id);
    $question =  Question::where('surveys_id', $request->id)->get();

    return view('respondent.viewSurvey', ['survey' => $survey, 'questions' => $question]);
   }

   public function filterSurvey(Request $request){
        $interest = Interest::all();
        $location =locations::all();

        if ($location_id = $request->locationId){
             $surveys_id = DB::table('tag_surveys_locations')->where('locations_id',$location_id)->pluck('surveys_id')->toArray();
        $surveys =  surveys::find($surveys_id);

        return view('respondent.res',['surveys'=>$surveys, 'interests'=>$interest, 'locations'=>$location]);
    }else {
        
        $interest_id = $request->interestId;
        $surveys_id = DB::table('tag_interest_surveys')->where('interests_id',$interest_id)->pluck('surveys_id')->toArray();
       
        $surveys =  surveys::find($surveys_id);
  

        return view('respondent.res',['surveys'=>$surveys, 'interests'=>$interest, 'locations'=>$location]);
   }
}
    public function saveAnswer(Request $request)
    {   
       
            
        foreach( $request->answers as $answer ){
            DB::table('tag_respondents_options')->insert(['options_id'=> $answer, 'users_id'=> Auth::user()->users_id] );
        }
         return redirect()->route('resVoucher');
        
    }
    
}

<?php

namespace App\Http\Controllers\owner;

use Auth;
use DB;
use App\surveys;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Option;

// $servername = "127.0.0.1:8000";
// $username = "root";
// $password = "";
// $dbname = "fyp-test2";

// $conn = new mysql_connect($servername, $username, $password, $dbname);


class OwnerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastestUserData = DB::table('tag_owner_packages')->where('users_id',\Auth::user()->users_id)->get();

        $surveys = $lastestUserData->sum('no_surveys');
        $res = $lastestUserData->sum('no_respondents');
        $surveyLeft = 20 - ($lastestUserData[0]->no_surveys);

        if(DB::table('tag_owner_packages')->where('users_id',\Auth::user()->users_id)->sum('no_surveys') >= 3)
        {
        
        $lastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->orderBy('created_at','desc')->get()->first();

        $lastSurveys = $lastestSurvey->surveys_title;
        $lastSurveysDate = $lastestSurvey->created_at;

        $seclastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->orderBy('created_at','desc')->skip(1)->take(1)->get();

        $seclastSurveys = $seclastestSurvey[0]->surveys_title;
        $seclastSurveysDate = $seclastestSurvey[0]->created_at;

        $thirdlastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->orderBy('created_at','desc')->skip(2)->take(1)->get();

        $thirdlastSurveys = $thirdlastestSurvey[0]->surveys_title;
        $thirdlastSurveysDate = $thirdlastestSurvey[0]->created_at;

        return view("surveyOwner.owner_dashboard",['surveys'=>$surveys,'res'=>$res,'surveyLeft'=>$surveyLeft,'lastSurveys'=>$lastSurveys,'lastSurveysDate'=>$lastSurveysDate,'seclastSurveys'=>$seclastSurveys,'seclastSurveysDate'=>$seclastSurveysDate,'thirdlastSurveys'=>$thirdlastSurveys,'thirdlastSurveysDate'=>$thirdlastSurveysDate]);

        }

        elseif (DB::table('tag_owner_packages')->where('users_id',\Auth::user()->users_id)->sum('no_surveys') == 2) 
        {

        $lastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->get()->first();

        $lastSurveys = $lastestSurvey->surveys_title;
        $lastSurveysDate = $lastestSurvey->created_at;

        $seclastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->orderBy('created_at','desc')->skip(1)->take(1)->get();

        $seclastSurveys = $seclastestSurvey[0]->surveys_title;
        $seclastSurveysDate = $seclastestSurvey[0]->created_at;

        return view("surveyOwner.owner_dashboard",['surveys'=>$surveys,'res'=>$res,'surveyLeft'=>$surveyLeft,'lastSurveys'=>$lastSurveys,'lastSurveysDate'=>$lastSurveysDate,'seclastSurveys'=>$seclastSurveys,'seclastSurveysDate'=>$seclastSurveysDate]);
        }

        elseif (DB::table('tag_owner_packages')->where('users_id',\Auth::user()->users_id)->sum('no_surveys') == 1) 
        {
        
        $lastestSurvey = DB::table('surveys')->where('users_id',\Auth::user()->users_id)->orderBy('created_at','desc')->get()->first();

        $lastSurveys = $lastestSurvey->surveys_title;
        $lastSurveysDate = $lastestSurvey->created_at;

        return view("surveyOwner.owner_dashboard",['surveys'=>$surveys,'res'=>$res,'surveyLeft'=>$surveyLeft,'lastSurveys'=>$lastSurveys,'lastSurveysDate'=>$lastSurveysDate]);
        }
        else
        {

        return view("surveyOwner.owner_dashboard",['surveys'=>$surveys,'res'=>$res,'surveyLeft'=>$surveyLeft]);

        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $surveys = new surveys;
        // echo "<pre>";
        // var_dump($surveys);
        // die("");
       

       $surveys ->surveys_title = $request -> surveys_title;
       $surveys ->surveys_description = $request -> surveys_description;
       $surveys ->interests_id= $request -> interests_id;
       $surveys ->location= $request -> location;
       $surveys ->voucher=$request -> voucher;
       $surveys ->save();     

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = User::find(\Auth::user()->users_id);
        return view('owner.edit', ['owner'=>$owner]);
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
        //
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

    public function insert(Request $req){
        $surveytitle = $req ->input('surveys_title');
        $surveydescription = $req -> input('surveys_description') ;
        $interest = $req ->input('interest');
        $location = $req ->input('location');
        $voucher = $req -> input('voucher');

        $data = array('surveys_title' => $surveytitle, 'surveys_description' => $surveysescription, 'interest' => $interest, 'location' => $location, 'voucher' => $voucher);

        DB::table('surveys')->insert($data);
        echo "success";
    }
    
    public function editUserProfile(){
        return view('surveyOwner.userProfile');
    }

    public function saveUserProfile(){
        return view('surveyOwner.userProfile');
    }

    public function ownerViewSurvey(Request $request)
    {
        $survey = surveys::find($request->id);
        $question =  Question::where('surveys_id', $request->id)->get();

        return view('surveyOwner.ownerViewSurvey', ['survey' => $survey, 'questions' => $question]);
    }

    // public function createQuestion(){
    //     return view('owner.createQuestion');
    // }

    //  public function verification(){
    //     return view('owner.createQuestion');
    // }
}



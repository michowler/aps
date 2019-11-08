<?php

namespace App\Http\Controllers\Survey;

use Auth;
use DB;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\surveys;
use App\Charts\UserChart;


class SurveyController extends Controller
{
    public function mySurvey(){
        return view('survey.mySurvey');
    }

    public function create()
    {
        return view('survey.createSurvey');
    }

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
       

       $surveys -> surveys_title = $request -> surveys_title;
       $surveys -> surveys_description = $request -> surveys_description;
       $surveys -> interests_id = $request -> interests_id;
       $surveys -> location = $request -> location;
       $surveys -> voucher = $request -> voucher;
       $surveys ->save();     

    }

    /**
   * Display the specified resource.
   *
   * @param  
   * @return \Illuminate\Http\Response
   */
  public function show()
  {   
      $survey['survey'] = DB::table('surveys')->get();
      if(count($survey) > 0)
      {
      return view('survey.mySurvey',$survey);
      }
      else
      {
        return view('survey.mySurvey');
      }

  }

  //for visualitation
  public function cshow()
  {   
      return view('survey.chart')->with('id',$id);

  }

  public function chartindex(){
      return view('survey.chart');
    }

  public function showbar()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $survey = tag_respondents_options::where('surveys_id', "=", $request->surveys_id)->firstOrFail();

        $usersChart = new UserChart;
        $usersChart->minimalist(true);
        $usersChart->labels([$questions]);
        $usersChart->dataset('Users by trimester', 'bar', [$options])
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        return view('users', [ 'usersChart' => $usersChart ] );
    }


}
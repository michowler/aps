<?php

namespace App\Http\Controllers\Survey;

use Auth;
use DB;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\surveys;


class SurveyController extends Controller
{
    public function mySurvey(){
        return view('survey.mySurvey');
    }

    public function showChart(){
    	return view('survey.chart');
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


}
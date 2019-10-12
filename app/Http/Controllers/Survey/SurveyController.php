<?php

namespace App\Http\Controllers\Survey;

use App\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function surveyList(){
    	return view('survey.index');
    }

    public function showChart(){
    	return view('survey.chart');
    }


}
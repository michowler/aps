<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\surveys;
use Illuminate\Http\Request;


// $servername = "127.0.0.1:8000";
// $username = "root";
// $password = "";
// $dbname = "fyp-test2";

// $conn = new mysql_connect($servername, $username, $password, $dbname);


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontView.owner.createSurvey");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontView.owner.createSurvey');
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
        //
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



   // public function index(){
  //      return view('frontView.surveyOwner.dashboard');
    //}
    public function mySurvey(){
        return view('frontVIew.surveyOwner.mySurvey');
    }

   /* public function insert(Request $req){
        $surveytitle = $req ->input('surveys_title');
        $surveydescription = $req -> input('surveys_description') ;
        $interest = $req ->input('interest');
        $location = $req ->input('location');
        $voucher = $req -> input('voucher');

        $data = array('surveys_title' => $surveytitle, 'surveys_description' => $surveysescription, 'interest' => $interest, 'location' => $location, 'voucher' => $voucher);

        DB::table('surveys')->insert($data);
        echo "success";
    }*/
     public function createSurvey(){
       
        return view('frontView.surveyOwner.createSurvey');
    }
    /*public function dashboard(){
        return view('frontView.surveyOwner.dashboard');
    }*/

    public function userProfile(){
        return view('frontView.surveyOwner.userProfile');
    }

    public function editUserProfile(){
        return view('frontView.surveyOwner.userProfile');
    }

    public function saveUserProfile(){
        return view('frontView.surveyOwner.userProfile');
    }

    public function createQuestion(){
        return view('frontView.surveyOwner.createQuestion');
    }

     public function verification(){
        return view('frontView.surveyOwner.createQuestion');
    }
}



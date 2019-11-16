<?php

namespace App\Http\Controllers\owner;

use Auth;
use DB;
use App\surveys;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        return view("surveyOwner.owner_dashboard");
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
    public function edit()
    {
        $curUser = User::find(\Auth::user()->users_id);
        return view('owner.edit', ['name' => $curUser->name]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $owner = User::find(\Auth::user()->users_id);
        $owner->name => request('name');
        $owner->email => request('email');       
        if ($owner->save()){ 
            alert()->success('Profile updated!');            
            return redirect()->route('editOwner', ['name' => \Auth::user()->name]); 
        }else{            
            alert()->error('Profile update unsuccessful!'); 
            return redirect()->route('editOwner', ['name' => \Auth::user()->name]); 
        }  
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


    public function userProfile(){
        return view('surveyOwner.userProfile');
    }

    public function editUserProfile(){
        return view('surveyOwner.userProfile');
    }

    public function saveUserProfile(){
        return view('surveyOwner.userProfile');
    }

    // public function createQuestion(){
    //     return view('surveyOwner.createQuestion');
    // }

    //  public function verification(){
    //     return view('surveyOwner.createQuestion');
    // }
}



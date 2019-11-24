<?php

namespace App\Http\Controllers\Respondent;

use DB;
use App\Interest;
use App\locations;
use App\surveys;
use App\Question;
use App\Choice;
use App\User;
use App\Voucher;
use App\VouchersType;
use App\Store;
use App\Option;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RespondentController extends Controller
{
     public function __construct()
     {
         $this->middleware(['auth', 'verified']);
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
        return view('respondent.res',['surveys'=>$surveys, 'interests'=> $interest], ['locations' =>$location]);
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
        $startDate = date('Y-m-d H:i:s');
        DB::table('tag_respondents_surveys')->insert(['surveys_id'=> $request->surveys_id, 'users_id'=> Auth::user()->users_id, 'voucher_redeem_status' => '0','stores_id' => '1', 'survey_completed_date'=> $startDate, 'voucher_redemption_date'=> $startDate] );       
            
        foreach( $request->answers as $answer ){
            $optionDat = Option::where('options_id', $answer)->get();

            DB::table('tag_respondents_options')->insert(['options_id'=> $answer, 'choices_id'=>$optionDat[0]->choices_id, 'questions_id'=>$optionDat[0]->questions_id, 'users_id'=> Auth::user()->users_id, 'surveys_id'=> $request->surveys_id] );
        }
      
         return redirect()->route('resVoucher')->with('success', 'Thank you for answering the survey!');        
    }

    public function edit()
    {        
       $res = User::where('users_id', '=', \Auth::user()->users_id)->first();
       return view('respondent.edit', ['res' => $res]);
    }

    public function update()
    {        
       $res = User::where('users_id', '=', \Auth::user()->users_id)->first();
       $res->email = request('email');
       $res->name = request('name');
       $res->age = request('age');
       // $res->birth_date = request('birth_date');
       // $res->occupation = request('occupation');
       $res->gender = request('gender');
       $res->working_level = request('working_level');
       $res->education_level = request('education_level');
       $res->marital_status = request('marital_status');
       if ($res->save()){ 
           alert()->success('Profile updated!');            
           return redirect()->route('editUser', ['name' => \Auth::user()->name]); 
       }else{            
        alert()->error('Profile update unsuccessful!'); 
           return redirect()->back();
       }  
    }

    public function destroy()
    {       
       $curUser = User::find(\Auth::user()->users_id);                             
       
       if ($curUser->delete()){            
           Alert::message('Your account has been deleted. You have been logged out.')->persistent('Close');
          return Auth::logout();
       }       
    }

    public function res_voucher_show(Request $request)
    {
        $voucher = Voucher::where('vouchers_id', $request->vouchers_id)->first();       
        $vouchers = Voucher::with('stores')->get();
        $encryptedSid = Crypt::encryptString($request->surveys_id);
        $encryptedVC = Crypt::encryptString($request->vouchers_id);
        $vType = VouchersType::where('vouchers_types_id', '=', $voucher->vouchers_types_id)->first();
        return view('respondent.showVoucher', ['voucher' => $voucher, 'encryptedSid' => $encryptedSid,'encryptedVC' => $encryptedVC , 'vType' => $vType]);
    }

    public function res_voucher_index()
    {
        $res = User::find(Auth::user()->users_id)->firstOrFail();
        $vouchers = \DB::table('tag_respondents_surveys')
            ->join('surveys', 'tag_respondents_surveys.surveys_id', '=', 'surveys.surveys_id')
            ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')
            ->select('vouchers.vouchers_id', 'tag_respondents_surveys.voucher_redeem_status', 'vouchers.title', 'vouchers.status', 'vouchers.expiry_date', 'surveys.surveys_id')
            ->where('tag_respondents_surveys.users_id', '=', \Auth::user()->users_id)             
            ->paginate(10);
                   
        $vouchers->withPath('/resVoucher');       
        return view('respondent.resVoucher', ['vouchers' => $vouchers]);
    }

    public function redeem_accept($vouchers_id, $stores_id, Request $request)
    {
        $decryptedV = Crypt::decryptString($vouchers_id);
        $decryptedS = Crypt::decryptString($stores_id);
        $voucher = Voucher::find($decryptedV)->firstOrFail();
        $store = Store::find($decryptedS)->firstOrFail();
        $survey = $request->surveys_id;
        return view('respondent.redeem_success', ['voucher'=> $voucher, 'store' => $store, 'survey'=>$survey]);
    }

    public function redeem_v_success(Request $request, $vouchers_id, $surveys_id)
    {
        $dateNow =  date('Y-m-d H:i:s');
        $res = User::find(\Auth::user()->users_id)->firstOrFail();
        $voucher = Voucher::find($vouchers_id)->firstOrFail();
        $voucher->max_redeem = $voucher->max_redeem-1;
        $stat = \DB::table('tag_respondents_surveys')
            ->join('surveys', 'tag_respondents_surveys.surveys_id', '=', 'surveys.surveys_id')
            ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')
            ->select('tag_respondents_surveys.voucher_redeem_status', 'tag_respondents_surveys.surveys_id','tag_respondents_surveys.stores_id' )
            ->where('tag_respondents_surveys.users_id', '=', \Auth::user()->users_id)
            ->where('tag_respondents_surveys.surveys_id', '=', request('surveys_id'))
            ->get()
            ->first();

        if ($stat->voucher_redeem_status == 0 && $request->stores_id != 0 && $voucher->save()){
        \DB::table('tag_respondents_surveys')
        ->join('surveys', 'tag_respondents_surveys.surveys_id', '=', 'surveys.surveys_id')
        ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')
        ->select('tag_respondents_surveys.voucher_redeem_status', 'surveys.surveys_id')
        ->where('tag_respondents_surveys.users_id', '=', \Auth::user()->users_id)
        ->where('tag_respondents_surveys.surveys_id', '=', request('surveys_id'))
        ->update(array('voucher_redeem_status' => 1, 'voucher_redemption_date' => $dateNow, 'stores_id' => $request->stores_id));
           return redirect()->route('resVoucher')->with('success','Voucher redeem successful!');
        } else if ($stat->voucher_redeem_status == 1){
           return redirect()->route('resVoucher')->with('error','Error. Voucher has been redeemed.');
        } else if ($request->stores_id == 0){
        return redirect()->route('resVoucher')->with('error','Error. Voucher redeem unsuccessful.');
        }
    }
    
}



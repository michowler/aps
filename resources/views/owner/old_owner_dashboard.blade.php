@extends('layouts.owner_layout')

@section('navbar-brand', 'Welcome Back !')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                @if(DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->packages_id == 1)

                    <div class="col-md-4">
                        <div class="card " style="border-radius: 20px; z-index: -999" >

                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Survey<i class="pull-right far fa-sticky-note"></i></h5>
                                <span class="h2 font-weight-bold mb-0">{{ $surveys}}</span>
                                <p class="category" style="padding-top: 10px"></p>
                            </div>

                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Response<i class="pull-right fas fa-tasks" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">{{$res}}</span>
                                 <p class="category" style="padding-top: 10px"></p>
                            </div>
        
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">{{$surveyLeft}}</span>
                                 <p class="category" style="padding-top: 10px"></p>
                            </div>
                             </div>
                    </div>
                </div>

                @else

                <div class="col-md-4">
                        <div class="card " style="border-radius: 20px; z-index: -999" >

                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Survey<i class="pull-right far fa-sticky-note"></i></h5>
                                <span class="h2 font-weight-bold mb-0">{{ $surveys}}</span>
                                <p class="category" style="padding-top: 10px"></p>
                            </div>

                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 20px">
                            <div class="header">
                                <h5 class="title" style="padding-bottom: 15px" >Total Response<i class="pull-right fas fa-tasks" style="padding-left: 100px"></i></h5>
                                 <span class="h2 font-weight-bold mb-0">{{$res}}</span>
                                 <p class="category" style="padding-top: 10px"></p>
                            </div>
        
                        </div>
                    </div>


                @endif

                <div class="row">
                <form method="get" action="/createSurvey">
                    <div class="col-md-12" style="text-align: center; padding-bottom: 20px">
                        <button type="submit" class="btn btn-info btn-fill" >CREATE SURVEY</button>
                    </div>
                    </form>
                    
                                    <!-- <div class="clearfix" ></div> -->
                </div>


                <div class="row">
                    <div class="col-md-12" style="padding-bottom: 5px">
                       <h4 class="title">Recent Survey</h4>
                    </div>
                </div>

                @if(DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->sum('no_surveys') == 0)

                @elseif(DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->sum('no_surveys') == 1)


                <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$lastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($lastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                        
                </div>

                @elseif(DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->sum('no_surveys') == 2)

                <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$lastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($lastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                        
                </div>

                <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$seclastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($seclastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                     
                </div>  

                @elseif(DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->sum('no_surveys') >= 3)

                <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$lastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($lastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                        
                </div>

                  <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$seclastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($seclastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                     
                </div>

                  <div class="row">
                    <div class="col-md-12" >
                        <div class="card" style="border-radius: 20px;">
                            <div class="header">
                             <!--    <h5 class="title" style="padding-bottom: 5px" >Total Survey Left<i class="pull-right fas fa-hourglass-half" style="padding-left: 100px"></i></h5> -->
                                 <span class="h4 font-weight-bold mb-0">{{$thirdlastSurveys}}</span>
                                 <p class="category" style="padding-top: 10px; padding-bottom: 10px">{{strftime("%d/%m/%Y", strtotime($thirdlastSurveysDate))}}</p>
                            </div>
                        </div>
                    </div>            
                                
                </div>

                @endif
                    

                 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>



    </div>
</div>
@endsection
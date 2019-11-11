@extends('layouts.owner_layout')

@section('navbar-brand', 'Generate Survey')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="content">

                                <form action="{{action('Survey\SurveyController@store')}}" method="POST">

                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Survey Title</label>
                                                <input type="surveys_title" class="form-control" placeholder="Survey Title" name="surveys_title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Survey description</label>
                                                <textarea rows="6" class="form-control" placeholder="Here can be your description" , name="surveys_description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Interest</label><br>
                                                <div class="table-full-width borderless">
                                                    <table class="table">
                                                        <tbody>
                                                    
                                                        @foreach($interests as $interests)
                                                    
                                                    <input class="checkbox" value="{{$interests->interests_id}}" name="interests[]" id="checkbox{$interests ->interests_id}" type="checkbox">
                                               
                                                 {{$interests->interests_name}}

                                                        @endforeach
                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Location</label><br>
                                                <div class="table-full-width borderless">
                                                    <table class="table">
                                                        <tbody>
                                         @foreach ($locations as $locations)

                                            <input class="checkbox" value="{{$locations->locations_id}}" name="locations[]" id="checkbox{$locations ->locations_id}" type="checkbox">
                                               
                                                 {{$locations->locations_name}}

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                        </div>
                                    </div>
                                  
                                    <button type="" class="btn btn-info btn-fill pull-right" >Next</button>
                                    <div class="clearfix"></div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   @endsection
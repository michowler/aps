@extends('layouts.owner_layout')

@section('navbar-brand', 'Generate Survey')

@section('content')

<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Create your survey</h4>
                            </div>
                            <div class="content">

                                <form action="{{route('storeSurvey')}}" method="POST">

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
                                    <!-- <div class="row"> -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Interest</label><br>
                                                <div class="table-full-width borderless">
                                                    <table class="table">
                                                        <tbody>
                                                    
                                                        @foreach($interests as $interests)
                                                     <input class="form-check-input " type="checkbox" value="{{$interests->interests_id}}" name="interests[]" id="checkbox{$interests ->interests_id}"><span style="margin-right=15px"></span>
                                                     <label class="form-check-label mr-3" for="checkbox{$interests ->interests_id}"></label>
                                                   <!--  <input class="checkbox" value="{{$interests->interests_id}}" name="interests[]" id="checkbox{$interests ->interests_id}" type="checkbox"> -->
                                               
                                                 {{$interests->interests_name}}

                                                        @endforeach
                                           
                                        </tbody>
                                    </table>
                            <!--     </div> -->
                                      </div>
                                        </div>
                                    </div>
                                   <!--  <div class="row"> -->
                                        <div class="col-md-12">
                                        
                                         <label>Location</label><br>
                                          <div class="table-full-width borderless">
                                                    <table class="table">
                                                        <tbody>
                                          <div class="form-check">
                                           
                                                      
                                         @foreach ($locations as $locations)
                                             <input class="form-check-input" type="checkbox" value="{{$locations->locations_id}}" name="locations[]" id="checkbox{$locations ->locations_id}">
                                            <label class="form-check-label mr-5" for="checkbox{$locations ->locations_id}"></label>
                                            <!-- <input class="checkbox" value="{{$locations->locations_id}}" name="locations[]" id="checkbox{$locations ->locations_id}" type="checkbox"> -->
                                               
                                                 {{$locations->locations_name}}

                                                        @endforeach
                                                        </div>    
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Voucher</label><br>
                                                <div class="table-full-width borderless">
                                                    <table class="table">
                                                        <tbody>
                                                        <select class="form-control" name="vouchers">
                                                            <option selected="true" disabled="disabled">Select Voucher</option>
                                                        @foreach($vouchers as $vouchers)
                                                            @if($vouchers->status =='valid')
                                                                
                                                                    <option value="{{$vouchers->vouchers_id}}">
                                                                        {{$vouchers->title}}
                                                                    </option>
                                                             @endif

                                                        @endforeach
                                                    </select>
                                           
                                        </tbody>
                                    </table>
                            <!--     </div> -->
                                      </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right" >Next</button>
                                    <div class="clearfix"></div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
        

    </div>
</div>
   @endsection
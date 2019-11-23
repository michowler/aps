@extends('layouts.res_layout')
@section('navbar-brand', 'Edit Profile')
@include('partials.delete-user-modal')
@section('content')
<div class="container-fluid">

    <div class="row">
          
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Respondent Profile</h4>
                </div>
                <div class="content">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('updateUser', ['name'=> \Auth::user()->name]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="{{$res->name}}" value="{{$res->name}}">
                                </div>
                            </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label>Gender</label>
                                   
                                   <select name="gender" class="form-control">
                                        <option value="{{$res->gender ?? '' }}" selected>{{ucfirst($res->gender ?? '' )}}</option>                                                     
                                        <option>Female</option>
                                        <option>Male</option>                                                  
                                        <option>others</option>
                                   </select>
                               </div>
                           </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="text" name="age" class="form-control" placeholder="{{$res->age}}" value="">
                                </div>
                            </div>
                            
                        </div>                                                                      

                         <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Country" value="{{$res->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">       
                                    <label class="control-label" >Marital Status</label>                                       
                                    <select name="marital_status" class="form-control">
                                         <option value="{{$res->marital_status ?? '' }}" selected>{{ucfirst($res->marital_status ?? '' )}}</option>                                                     
                                         <option>Single</option>
                                         <option>Married</option>
                                         <option>Divorced</option>
                                         <option>others</option>                                        
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">       
                                    <label class="control-label" >Education Levels</label>                                       
                                    <select name="education_level" class="form-control">
                                         <option value="{{$res->education_level ?? '' }}" selected>{{ucfirst($res->education_level ?? '' )}}</option>                                                     
                                       <option>Primary School</option>
                                         <option>Secondary School</option>
                                       <option>University</option>   
                                         <option>Masters</option>                                                       
                                         <option>PHD</option>
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">       
                                    <label class="control-label">Working Levels</label>                                       
                                     <select name="working_level" class="form-control">
                                     <option value="{{$res->working_level ?? '' }}" selected>{{ucfirst($res->working_level ?? '' )}}</option>
                                     <option>Student</option>
                                     <option>Low-position</option>
                                     <option>Medium-postion</option> 
                                     <option>High-position</option>                                                                      
                                    </select>
                                </div>
                            </div>
                        </div>                                                       
                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">    
                        <h4 class="title">Delete Account</h4><br>
                            <button data-toggle="modal" data-target="#deleteUserModal" class="btn btn-danger btn-fill pull-left" >Delete Account</button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>                          

      

    </div>
</div>
@endsection
<script type="text/javascript">
 function formSubmit()
 {
   $("#deleteUserForm").submit();
 }
</script>
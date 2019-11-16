@extends('layouts.owner_layout')

@section('content')
<div class="container-fluid">

	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Edit Profile</h4>
			</div>
			<div class="content">
				<form>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" placeholder="First Name" value="">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" placeholder="Last Name" value="">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Age</label>
								<input type="text" class="form-control" placeholder="Age" value="">
							</div>
						</div>
						
					</div>                                                                      

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Gender</label>
								
								<select class="form-control">
									<option>-</option>                                                     
									<option>female</option>
									<option>male</option>                                                  
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Country</label>
								<input type="text" class="form-control" placeholder="Country" value="">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">       
								<label class="control-label" for="date">Marital Status</label>                                       
								<select class="form-control">
									<option>-</option>                                                     
									<option>single</option>
									<option>married</option>
									<option>divorced</option>                                                                                                   
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">       
								<label class="control-label" for="date">Date of Birth</label> 
								<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
								
							</select>
						</div>
					</div>
				</div>    

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">       
							<label class="control-label" for="date">Education Levels</label>                                       
							<select class="form-control">
								<option>-</option>                                                     
								<option>primary school</option>
								<option>secondary school</option>
								<option>university</option>   
								<option>master</option>                                                       
								<option>PHD</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">       
							<label class="control-label" for="date">Working Levels</label>                                       
							<select class="form-control">
								<option>-</option>
								<option>student</option>
								<option>low-position</option>
								<option>medium-postion</option> 
								<option>high-position</option>                                                                      
							</select>
						</div>
					</div>
				</div>                               
				<button data-toggle="modal" data-target="#deleteModal" type="submit" class="btn btn-danger btn-fill pull-left" >Delete Account</button>
				<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>                          



</div>
</div>
@endsection
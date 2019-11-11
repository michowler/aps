@extends('layouts.merchant_layout')
@section('navbar-brand', 'Edit Profile')
@include('partials.delete-user-modal')
@section('content')
<div class="container-fluid">

	<div class="row">

		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Merchant Profile</h4>
				</div>
				<div class="content">
					<form>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Company Name</label>
									<input type="text" class="form-control" name="merchant_name" value="">
								</div>
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label>Company Address</label>
									<input type="text" class="form-control" name="merchant_address" value="">
								</div>
							</div>
							

						</div>                                                                      

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Company Email</label>

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
					<div class="row">
						<div class="col-md-12">                 
							
							<button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
							<div class="clearfix"></div>
						</div>
					</div>
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
</div>
</div>
@endsection
<script type="text/javascript">
 function formSubmit()
 {
	 $("#deleteUserForm").submit();
 }
</script>
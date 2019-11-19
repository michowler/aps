@extends('layouts.owner_layout')
@section('navbar-brand', 'Edit Profile')
@include('partials.delete-user-modal')
@section('content')
<div class="container-fluid">

	<div class="row">

		<div class="col-md-12">
			<div class="card">
				<div class="header">
					<h4 class="title">Owner Profile</h4>
				</div>
				<div class="content">
					<form method="POST" enctype="multipart/form-data" action="{{ route('updateOwner', ['name'=> \Auth::user()->name]) }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label> Name</label>
									<input type="text" class="form-control" name="name" value="{{$owner->name}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label> Email</label>
									<input type="text" class="form-control" name="email" value="{{$owner->email}}">
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
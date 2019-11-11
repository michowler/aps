@extends('layouts.merchant_layout')
@section('content')
				 <div class="container-fluid">

				 	<div class="row">
				 		<div class="col-md-4">
				 			<div class="card card-user">
				 				<div class="image">
				 					<img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
				 				</div>
				 				<div class="content">
				 					<div class="author">
				 						<a href="#">
				 							<img class="avatar border-gray" src="assets/img/faces/face-0.jpg" alt="..."/>

				 							<h4 class="title">Michelle Ler<br />
				 								<small>michelle@gmail.com</small><br>
				 								<small>student | 24 | Nature lover</small>
				 							</h4>
				 						</a>
				 					</div>

				 				</div>
				 				<hr>
											 <!--   <div class="text-center">
														 <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
														 <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
														 <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

														</div> -->
													</div>
												</div>
												<div class="col-md-8">
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
								</div>
							</div>
@endsection
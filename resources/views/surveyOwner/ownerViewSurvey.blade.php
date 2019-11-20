@extends('layouts.owner_layout')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


.third-level-menu
{
		position: absolute;
		top: 0;
		right: -150px;
		width: 150px;
		list-style: none;
		padding: 0;
		margin: 0;
		display: none;
}

.third-level-menu > li
{
		height: 30px;
		background: #999999;
}
.third-level-menu > li:hover { background: #CCCCCC; }
.second-level-menu
{
		position: absolute;
		top: 30px;
		left: 0;
		width: 150px;
		list-style: none;
		padding: 0;
		margin: 0;
		display: none;
}

.second-level-menu > li
{
		position: relative;
		height: 30px;
		background: #999999;
}
.second-level-menu > li:hover { background: #CCCCCC; }

.top-level-menu
{
		list-style: none;
		padding: 0;
		margin: 0;
}

.top-level-menu > li
{
		position: relative;
		float: left;
		height: 30px;
		width: 150px;
		background: #999999;
		margin-bottom: 1rem;
		margin-top: 1rem;
}
.top-level-menu > li:hover { background: #CCCCCC; }

.top-level-menu li:hover > ul
{
		/* On hover, display the next level's menu */
		display: inline;
}


/* Menu Link Styles */

.top-level-menu a /* Apply to all links inside the multi-level menu */
{
		font: bold 16px Arial, Helvetica, sans-serif;
		color: #FFFFFF;
		text-decoration: none;
		padding: 0 0 0 10px;

		/* Make the link cover the entire list item-container */
		display: block;
		line-height: 30px;
}
.top-level-menu a:hover { color: #000000; }

.button5 {
	background-color: white;
	color: black;
	border: 2px solid #555555;
}

.button5:hover {
	background-color: #555555;
	color: white;
}
</style>


</head>


@section('content')
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('FrontEnd') }}/img/sidebar-5.jpg">
  
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    APSE
                </a>
            </div>

            <ul class="nav">
                
                 <li >
                    <a href="/home">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li >
                    <a href="/createSurvey">
                        <i class="pe-7s-plus"></i>
                        <p>Create Survey</p>
                    </a>
                </li>
                <li class="active">

                     <a href="/mySurvey">
                        <i class="pe-7s-note2"></i>
                        <p>My Survey</p>
                    </a>
                </li>
                   <li>

                    <a href="/userProfile">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{$survey->surveys_title}}</a>
                </div>
                <div class="collapse navbar-collapse">
                   

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">1</span>
                                    <p class="hidden-lg hidden-md">
                                        1 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <!-- <li> <a onclick="demo.showMessage('top','center', 
                                  'Error: Please fill in all fields.')">Submit</a>
                                  </li> -->
                                  <li><a data-toggle="modal" data-target="#myModal">Voucher Redemption Approval</a></li>

                                

                               
                              </ul>
                        </li>
                       <!-- Right Side Of Navbar -->
                   <ul class="nav navbar-nav navbar-right">
                        
                       
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>




				<div class="content">
						<div class="container-fluid">
								<div class="row">
										<div class="col-md-12">
												<div class="card">
														 <form action="{{route('storeChoice')}}" method="POST">
														<div class="header">
																<h4 class="title">{{$survey->surveys_title}}</h4>
																<label> </label>
																<label> </label>
                                                                  <p class="category">{{$survey->surveys_description}}</p>
														
																<label> </label>
																<label> </label>
														
														

														@foreach ($questions as $question)
															<div class="form-group">

																<label>{{$question->questions_title}}</label>
																
																

																	@foreach($question->options as $option)
																	<div class="radio">
																		<label>
																			
																	 <input type="radio" value="{{$option->content}}" name="{{$question ->questions_id}}" id="radio{$option ->options_id}">															
																			{{$option->content}}
																		
																 		</label>
																
																 	</div>
																	@endforeach
																	

														@endforeach
														<input type="submit" style="margin:5px;" class="btn btn-info btn-fill pull-right"  value="Done" id="submit"/></button></a>    
												</div>
										</div>
								</div>
									
						</div>
				</div>

		</div>
</div>


</body>
@endsection

		<script type="text/javascript">

				
</script>

</html>

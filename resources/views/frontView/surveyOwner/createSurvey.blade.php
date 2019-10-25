@extends('layouts.owner_layout')

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
                    <a href="/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="/createSurvey">
                        <i class="pe-7s-plus"></i>
                        <p>Create Survey</p>
                    </a>
                </li>
                <li>

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
                    <a class="navbar-brand" href="#">Generate Survey</a>
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
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        User
                                        <b class="caret"></b>
                                    </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Settings</a></li>
                                <li><a href="/login">Logout</a></li>                               
                              </ul>
                        </li>
                       <!--  <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li> -->
                                    <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Generate Survey</h4>
                            </div>
                            <div class="content">

                                <form action="{{action('OwnerController@store')}}" method="POST">

                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Survey Title</label>
                                                <input type="text" class="form-control" placeholder="Survey Title" name="surveys_title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Survey description</label>
                                                <textarea rows="6" class="form-control" placeholder="Here can be your description" value="Mike", name="surveys_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Interest</label><br>
                                                <label for="one" name="interest">
                                                    <input type="checkbox" value="1"> Food</label><br>
                                                    <label for="two">
                                                    <input type="checkbox" value="2"> Travel</label><br>
                                                    <label for="three">
                                                    <input type="checkbox" value="3"> Music</label><br>
                                                    <label for="four">
                                                    <input type="checkbox" value="4"> Shopping</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        
                                         <label>Location</label><br>
                                         <input type="text" class="form-control" placeholder="Location" name="location">
                                            <!--div class="form-group">
                                                <label>Location</label><br>
                                                <label for="one">
                                                    <input type="checkbox" id="one" /> Sunway Pyramid</label><br>
                                                    <label for="two">
                                                    <input type="checkbox" id="two" /> Pavilion</label><br>
                                                    <label for="three">
                                                    <input type="checkbox" id="three" /> MidValley</label><br>
                                                    <label for="four">
                                                    <input type="checkbox" id="four"/> IOI City Mall</label>
                                            </div-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Voucher</label><br>
                                                <!--form action="/insert"-->
                                                    
                                                    <select name="voucher">
                                                        <option value="1">Discount 30%</option>
                                                        <option value="2">Discount 10%</option>
                                                        <option value="3">Free Gift</option>
                                                        <option value="4">Free</option>
                                                        <option value="5">Buy 1 Free 1</option>
                                                        <option value="6">Buy 2 Free 1</option>
  </select>
 
                                            </div>
                                        </div>
                                    </div>


                                   

                                    

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Next</button>
                                    <div class="clearfix"></div>

                                </form>
                                
                            </div>
                        </div>
                    </div>
               
        </footer-->

    </div>
</div>
   @endsection

</body>
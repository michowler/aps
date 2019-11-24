<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{asset('assets')}}/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>APSE</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="{{asset('assets')}}/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Animation library for notifications   -->
  <link href="{{asset('assets')}}/css/animate.min.css" rel="stylesheet"/>

  <!--  Light Bootstrap Table core CSS    -->
  <link href="{{asset('assets')}}/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{asset('assets')}}/css/demo.css" rel="stylesheet" />


  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="{{asset('assets')}}/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('assets')}}/img/sidebar-5.jpg">

      <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="" class="simple-text">
            APSE
          </a>
        </div>


        <ul class="nav">

        <li>
          <p>MERCHANTS</p>

        </li>
        <li>
         <a href="{{route('myVouchers')}}">
           <i class="pe-7s-info"></i>
           <p>My vouchers</p>
         </a>
       </li>
       <li >
         <a href="{{route('generate')}}">
           <i class="pe-7s-plus"></i>
           <p>Create</p>
         </a>
       </li>
                          <!--  <li>
                               <a href="demoVoucher.html">
                                   <i class="pe-7s-albums"></i>
                                   <p>My Vouchers </p>
                               </a>
                             </li> -->
                             <li>
                               <a href="{{route('redeem')}}">
                                 <i class="pe-7s-check"></i>
                                 <p>Redeem</p>
                               </a>
                             </li>

                          <!--  <li>
                               <a href="icons.html">
                                   <i class="pe-7s-science"></i>
                                   <p>Icons</p>
                               </a>
                           </li>
                           <li>
                               <a href="maps.html">
                                   <i class="pe-7s-map-marker"></i>
                                   <p>Maps</p>
                               </a>
                           </li>
                           <li class="active">
                               <a href="notifications.html">
                                   <i class="pe-7s-bell"></i>
                                   <p>Notifications</p>
                               </a>
                             </li> -->
                             <li class="active-pro">
                              <!--  <a href="upgrade.html">
                                   <i class="pe-7s-rocket"></i>
                                   <p>Upgrade to PRO</p>
                                 </a> -->
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
                                <a class="navbar-brand" href="#">@yield('navbar-brand')</a>
                              </div>
                              <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-left">



                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                          <!-- <li>
                             <a href="">
                                 <p>Account</p>
                              </a>
                            </li> -->
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>                                  
                                  {{\Auth::user()->name}}
                                  <b class="caret"></b>
                                </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{route('editMerchant', ['name' => \Auth::user()->name])}}">Settings</a></li>
                                  <li>
                                    
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    
                                  </li>
                                </ul>
                              </li>
                          <!-- <li>
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
                      @include('flash-message')
                      @include('sweetalert::alert')
                      @yield('content') 
                    </div>

                    
                  </body>

                  <!--   Core JS Files   -->
                  <script src="{{asset('assets')}}/js/jquery.3.2.1.min.js" type="text/javascript"></script>
                  <script src="{{asset('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>

                  <!--  Charts Plugin -->
                  <script src="{{asset('assets')}}/js/chartist.min.js"></script>

                  <!--  Notifications Plugin    -->
                  <script src="{{asset('assets')}}/js/bootstrap-notify.js"></script>

                  <!--  Google Maps Plugin    -->
                 <!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

                  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
                  <script src="{{asset('assets')}}/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

                  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
                  <script src="{{asset('assets')}}/js/demo.js"></script>

                  </html>

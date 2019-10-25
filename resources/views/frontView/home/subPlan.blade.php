<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>APSE</title>
  <!-- Favicon -->
  <link href="{{ asset('FrontEnd') }}/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('FrontEnd') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="{{ asset('FrontEnd') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('FrontEnd') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body class="bg-gradient-bluemou">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="/index">
          <!--<img src="../assets/img/brand/white.png" />-->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/index">
                  <!--img src="../assets/img/brand/blue.png"-->
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/subPlan">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Subscription Plan</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/registerAs">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
          
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-bluemou py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Our Subscription Plans</h1>      

            </div>
          </div>
        </div>
      </div>
  
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
                                <div class="card">
                                    <div class="header text-center">
                                        <h4 class="title">Choose a Plan that works for you</h4>
                                        <p class="category">Are you looking for more surveys and respondents? Please check our Premium Version of package.</p>
                        <br>
                                    </div>
                                    <div class="content table-responsive table-full-width table-upgrade">
                                        <table class="table">
                                            <thead>
                                                <th></th>
                                              <th class="text-center">Free</th>
                                              <th class="text-center">PRO</th>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                  <td>Number of survey</td>
                                                  <td>20</td>
                                                  <td>Unlimited</td>
                                                </tr>
                                                <tr>
                                                  <td>Questions per survey</td>
                                                  <td>10</td>
                                                  <td>Unlimited</td>
                                                </tr>
                                                <tr>
                                                  <td>Responses per survey</td>
                                                  <td>50</td>
                                                  <td>Unlimited</td>
                                                </tr>
                                                  <tr>
                                                    <td>Visualization and Reporting </td>
                                                    <td><i class="fa fa-check text-success"></i></td>
                                                    <td><i class="fa fa-check text-success"></td>
                                                </tr>
                                                <tr>
                                                  <td>Data exports (CSV) </td>
                                                  <td><i class="fa fa-times text-danger"></i></td>
                                                  <td><i class="fa fa-check text-success"></td>
                                                </tr>
                                              
                                 
                            <tr>
                                                  <td></td>
                              <td>Free</td>
                                                  <td>RM 100 / per month</td>
                                                </tr>
                            <tr>
                              <td></td>
                              <td>
                                <a href="#" class="btn btn-round btn-fill btn-default disabled">Free Version</a>
                              </td>
                              <td>
                                <a target="_blank" href="checkout.html" class="btn btn-round btn-fill btn-info">PRO Version</a>
                              </td>
                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('FrontEnd') }}/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('FrontEnd') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ asset('FrontEnd') }}/js/argon.js?v=1.0.0"></script>
</body>

</html>
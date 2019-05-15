<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Medical - Bootstrap Admin Template</title>

    <!-- Favicons -->

    <link href="{{ asset('images/logo/favicon.png') }}" rel="icon">
    <link href="{{ asset('images/logo/logo.png') }}" rel="apple-touch-icon">

    {{--  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">  --}}


    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome-4.7.0.min.css') }}" rel="stylesheet">

    @yield('style')


    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet">





    {{--    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->  --}}
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="{{ route('patients.index') }}" class="logo"><b>Medi<span>cal</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    {{-- <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Medical Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme"> {{ count($rendes) }} </span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have {{ count($rendes) }} new messages</p>
                            </li>
                            @isset($rendes)
                                @foreach ($rendes as $rendez)
                                    <li>
                                        <a href="{{ route('patients.show',$rendez->patient) }}">
                                            <span class="photo"><img alt="avatar" src="{{ asset('images/doctor4.jpg') }}"></span>
                                            <span class="subject">
                                                <span class="from">{{ $rendez->patient->name }}</span>
                                                <span class="time">{{ $rendez->created_at->diffForHumans() }}</span>
                                            </span>
                                            <span class="message">
                                                {{ $rendez->patient->message }}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            @endisset

                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    {{-- <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Server Overloaded.
                                    <span class="small italic">4 mins.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                    Memory #2 Not Responding.
                                    <span class="small italic">30 mins.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    Disk Space Reached 85%.
                                    <span class="small italic">2 hrs.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="label label-success"><i class="fa fa-plus"></i></span>
                                    New User Registered.
                                    <span class="small italic">3 hrs.</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all notifications</a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="{{ route('users.index') }}"><img
                                src="{{ Auth::user()->photo ? '/'.Auth::user()->photo->file  : asset('images/doctor1.jpg') }}"
                                class="img-circle" width="80"></a></p>
                    <h5 class="centered">{{ Auth::user()->name }}</h5>
                    <li class="mt ">
                        <a class="" href="{{ route('users.index') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span>Patient</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('patients.create') }}">Add Patient</a></li>
                            <li><a href="{{ route('patients.index') }}">All Patient</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span>Doctor</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('doctors.create') }}">Add Doctor</a></li>
                            <li><a href="{{ route('doctors.index') }}">All Doctor</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu bg-dark">
                        <a class="" href="">
                            <i class="fa fa-edit"></i>
                            <span>Service</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('services.index') }}"><i class="fa fa-plus"></i>Add Service</a></li>
                            <li><a href="{{ route('services.index') }}"><i class="fa fa-plus"></i>All Service</a></li>
                            <li><a href="{{ route('services.index') }}"><i class="fa fa-cog"></i>Grere les Taches</a></li>

                        </ul>
                    </li>
                    <li class="">
                        <a class="" href="{{ route('resources.index') }}">
                            <i class="fa fa-edit"></i>
                            <span>Matrielle</span>
                        </a>
                    </li>


                    <li class="">
                        <a class="" href="{{ route('specialites.index') }}">
                            <i class="fa fa-edit"></i>
                            <span>Specialite</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a class="" href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('users.create') }}">Create User</a></li>
                            <li><a href="{{ route('users.index') }}">All User</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                @yield('content')
            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
                </p>
                <div class="credits">
                    <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
                    Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
                </div>
                <a href="blank.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dcjqaccordion.2.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/common-scripts.js') }}"></script>

    @yield('scripts')

    {{--    <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  --}}
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>DOCSITE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- third party css -->
        <link href="/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <!-- <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> -->
                            <span class="pro-user-name ml-1">
                                {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="remixicon-logout-box-line"></i>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="/assets/images/logo-light.png" alt="" height="20">
                            <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="/assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">
                            
                            <li class="menu-title">Navigations</li>

                            <li>
                                <a href="{{route('home')}}" class="waves-effect">
                                    <i class="remixicon-dashboard-line"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>

                            @if(Auth::user()->role == 'admin')
                            <li>
                                <a href="{{route('categories.index')}}" class="waves-effect">
                                    <i class="remixicon-briefcase-5-line"></i>
                                    <span> Category </span>
                                    
                                </a>
                            </li>
                            @endif

                            <li>
                                <a href="{{route('hospitals.index')}}" class="waves-effect">
                                     <i class="remixicon-vip-crown-2-line"></i>
                                    <span> Hospitals </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('doctors.index')}}" class="waves-effect">
                                     <i class="remixicon-briefcase-5-line"></i>
                                    <span> Doctors </span>
                                </a>
                            </li>


                            <li>
                                <a href="{{route('disease.index')}}" class="waves-effect">
                                    <i class="remixicon-honour-line"></i>
                                    <span> Diseases </span>
                                </a>
                            </li>

                            @if(Auth::user()->role == 'patient')
                            <li>
                                <a href="{{route('appointments.index')}}" class="waves-effect">
                                    <i class="remixicon-briefcase-5-line"></i>
                                    <span> Appointments </span>
                                    
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->role == 'admin')
                            <li>
                                <a href="{{route('appointments.showAll')}}" class="waves-effect">
                                    <i class="remixicon-briefcase-5-line"></i>
                                    <span> Appointments </span>
                                    
                                </a>
                            </li>
                            @endif
                            
                            
                            <li>
                                <a class="waves-effect"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <i class="remixicon-logout-box-line"></i>
                                    <span> Logout </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>

                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                @yield('content')

                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                               Proposed for DOCSITE by ASHIQ M 15MSS007. 
                            </div>
                          
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <script src="/assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="/assets/libs/peity/jquery.peity.min.js"></script>

        <!-- Sparkline charts -->
        <script src="/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- third party js -->
        <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="/assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="/assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="/assets/libs/datatables/buttons.print.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="/assets/libs/datatables/dataTables.select.min.js"></script>
        <!-- <script src="/assets/libs/pdfmake/pdfmake.min.js"></script> -->
        <script src="/assets/libs/pdfmake/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="/assets/js/pages/datatables.init.js"></script>

        <!-- init js -->
        <script src="/assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>
        
    </body>

</html>
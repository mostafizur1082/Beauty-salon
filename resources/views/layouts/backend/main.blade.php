<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

    
<!-- Mirrored from coderthemes.com/hyper/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Dec 2022 10:22:58 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/backend') }}/images/favicon.ico">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/daterangepicker/daterangepicker.css">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{ asset('assets/backend') }}/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

        <!-- Theme Config Js -->
        <script src="{{ asset('assets/backend') }}/js/hyper-config.js"></script>

        <!-- App css -->
        <link href="{{ asset('assets/backend') }}/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" /> 

        <!-- Icons css -->
        <link href="{{ asset('assets/backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />

        @stack('css')
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            @include('layouts.backend.partial.topbar')
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.backend.partial.sidebar')
            <!-- ========== Left Sidebar End ========== -->
            

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
            @yield('content')
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
          @include('layouts.backend.partial.themesettings')     
        
        <!-- Vendor js -->

        <script src="{{ asset('assets/backend') }}/js/vendor.min.js"></script>

        <!-- Daterangepicker js -->
        <script src="{{ asset('assets/backend') }}/vendor/daterangepicker/moment.min.js"></script>
        <script src="{{ asset('assets/backend') }}/vendor/daterangepicker/daterangepicker.js"></script>
        
        <!-- Apex Charts js -->
        <script src="{{ asset('assets/backend') }}/vendor/apexcharts/apexcharts.min.js"></script>

        <!-- Vector Map js -->
        <script src="{{ asset('assets/backend') }}/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{ asset('assets/backend') }}/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

        <!-- Dashboard App js -->
        <script src="{{ asset('assets/backend') }}/js/pages/demo.dashboard.js"></script>

        <!-- App js -->
        <script src="{{ asset('assets/backend') }}/js/app.min.js"></script>
        @stack('js')
    </body>

<!-- Mirrored from coderthemes.com/hyper/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Dec 2022 10:23:49 GMT -->
</html> 
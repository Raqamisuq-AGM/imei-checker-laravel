<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>

    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img') . '/' . $system[0]->fav }}" /> --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('asset/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/plugins/jqvmap/jqvmap.min.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/dist/css/adminlte.min.css') }}" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('asset/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/plugins/daterangepicker/daterangepicker.css') }}" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/dashboard/plugins/summernote/summernote-bs4.min.css') }}" />

    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('partials.dashboard.admin.header')

        <!-- Main Sidebar Container -->
        @include('partials.dashboard.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('partials.dashboard.admin.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('asset/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('asset/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('asset/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('asset/dashboard/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('asset/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('asset/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('asset/dashboard/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('asset/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('asset/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('asset/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('asset/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dashboard/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset/dashboard/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('asset/dashboard/dist/js/pages/dashboard.js') }}"></script>

    @yield('script')
</body>

</html>

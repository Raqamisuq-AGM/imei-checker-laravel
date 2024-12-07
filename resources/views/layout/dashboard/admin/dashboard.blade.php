<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/dashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('asset/dashboard/assets/css/style.css') }}" rel="stylesheet">

    <style>
        .sidebar-nav .nav-link.active {
            background: #f6f9ff !important;
            color: #4154f1 !important;
        }
    </style>
    @yield('style')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.dashboard.admin.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('partials.dashboard.admin.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- @include('partials.dashboard.admin.footer') --}}
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {{-- <script src="{{ asset('asset/dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('asset/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/dashboard/assets/vendor/chart.js/chart.umd.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/dashboard/assets/vendor/echarts/echarts.min.js') }}"></script> --}}
    <script src="{{ asset('asset/dashboard/assets/vendor/quill/quill.js') }}"></script>
    {{-- <script src="{{ asset('asset/dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
    <script src="{{ asset('asset/dashboard/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/dashboard/assets/vendor/php-email-form/validate.js') }}"></script> --}}

    <!-- Template Main JS File -->
    <script src="{{ asset('asset/dashboard/assets/js/main.js') }}"></script>
    @yield('script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta property="description"
        content="Check IMEI Number and Verify the authenticity of your device with our IMEI Checker. All Brands & Devices supported, including Apple | Samsung | Xiaomi | LG.">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('asset/frontend/style.css') }}" />


    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6778879320397925"
        crossorigin="anonymous"></script>

    @yield('styles')
</head>

<body>
    <div class="content-wrapper">
        <!-- Nav bar -->
        @include('partials.frontend.header')

        <!-- Content -->
        @yield('content')
    </div>

    @include('partials.frontend.footer')

    <!-- Scripts -->
    <script src="{{ asset('asset/frontend/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/popper.min.js') }}"></script>
    <script src="{{ asset('asset/frontend/bootstrap.min.js') }}"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65c54b6b0ff6374032cb0663/1hm5at760';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    @yield('script')
</body>

</html>

<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-light px-0 py-3">
    <div class="container-xl max-w-screen-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo.png') }}" class="h-10 " alt="..." />
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->
            <ul class="navbar-nav mx-lg-auto">
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('imei-check') }}">Check IMEI</a>
                </li>
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                </li>
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </li>
                <li class="nav-item" style="font-size:20px">
                    <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                </li>
            </ul>
            <!-- Right navigation -->
            <div class="navbar-nav ms-lg-4">
                @guest
                    <a class="nav-item nav-link" href="{{ route('login') }}" style="font-size:20px">Sign in</a>
                @endguest
            </div>
            <!-- Action -->
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                @guest
                    <a href="{{ route('signup') }}" class="nav-item nav-link" style="font-size:20px">Signup</a>
                @else
                    <a href="{{ Auth::user()->type == 'admin' ? route('admin.index') : route('dashboard.index') }}"
                        class="nav-item nav-link" style="font-size:20px">Dashboard</a>
                @endguest
            </div>

        </div>
    </div>
</nav>

<aside class="main-sidebar sidebar-dark-primary dashboard_sidebar" style="background: #fff">
    <a href="{{ route('dashboard.index') }}" class="brand-link" style="background: #fff;height: 57px;">
        <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="float: none;" />
        <span class="brand-text font-weight-light"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- Imei Route --}}
                <li class="nav-item {{ request()->routeIs('dashboard.imei.all') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('dashboard.imei.all') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Imei Checked
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.imei.all') }}"
                                class="nav-link {{ request()->routeIs('dashboard.imei.all') ? 'active' : '' }}">
                                @if (request()->routeIs('dashboard.imei.all'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('imei-check') }}" class="nav-link" target="_blank">
                                @if (request()->routeIs('imei-check'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>Check new</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Setting Route --}}
                <li
                    class="nav-item {{ request()->routeIs('dashboard.setting.change-email', 'dashboard.setting.change-password') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('dashboard.setting.change-email', 'dashboard.setting.change-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.change-email') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.change-email') ? 'active' : '' }}">
                                @if (request()->routeIs('dashboard.setting.change-email'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>Change Email</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.setting.change-password') }}"
                                class="nav-link {{ request()->routeIs('dashboard.setting.change-password') ? 'active' : '' }}">
                                @if (request()->routeIs('dashboard.setting.change-password'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Logout Route --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<aside class="main-sidebar sidebar-dark-primary dashboard_sidebar" style="background: #fff">
    <a href="{{ route('admin.index') }}" class="brand-link" style="background: #fff;height: 57px;">
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
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- User Route --}}
                <li class="nav-item">
                    <a href="{{ route('admin.user.all') }}"
                        class="nav-link {{ request()->routeIs('admin.user.all') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                {{-- Imei Route --}}
                <li class="nav-item">
                    <a href="{{ route('admin.imei.all') }}"
                        class="nav-link {{ request()->routeIs('admin.imei.all') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Imei Checked</p>
                    </a>
                </li>
                {{-- Contact Message Route --}}
                <li class="nav-item">
                    <a href="{{ route('admin.contact.message') }}"
                        class="nav-link {{ request()->routeIs('admin.contact.message') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contact Message</p>
                    </a>
                </li>
                {{-- Blog Route --}}
                <li
                    class="nav-item {{ request()->routeIs('admin.blog.all', 'admin.blog.create') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.blog.all', 'admin.blog.create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blogs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.all') }}"
                                class="nav-link {{ request()->routeIs('admin.blog.all') ? 'active' : '' }}">
                                @if (request()->routeIs('admin.blog.all'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.create') }}"
                                class="nav-link {{ request()->routeIs('admin.blog.create') ? 'active' : '' }}">
                                @if (request()->routeIs('admin.blog.create'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Setting Route --}}
                <li
                    class="nav-item {{ request()->routeIs('admin.setting.change-email', 'admin.setting.change-password') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('admin.setting.change-email', 'admin.setting.change-password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.change-email') }}"
                                class="nav-link {{ request()->routeIs('admin.setting.change-email') ? 'active' : '' }}">
                                @if (request()->routeIs('admin.setting.change-email'))
                                    <i class="fa fa-circle nav-icon" style="color: #007bff"></i>
                                @else
                                    <i class="far fa-circle nav-icon"></i>
                                @endif
                                <p>Change Email</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.change-password') }}"
                                class="nav-link {{ request()->routeIs('admin.setting.change-password') ? 'active' : '' }}">
                                @if (request()->routeIs('admin.setting.change-password'))
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

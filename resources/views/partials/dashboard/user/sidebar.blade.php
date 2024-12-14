<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- Dashboard Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Add Fund Route --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('buy.credit') }}">
                <i class='bx bx-dollar'></i>
                <span>Add Fund</span>
            </a>
        </li>

        {{-- Imei Checked Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.imei.all', 'admin.blog.create') ? 'collapsed' : '' }}"
                data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-substack"></i></i><span>Imei Checked</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blog-nav"
                class="nav-content collapse {{ request()->routeIs('dashboard.imei.all', 'admin.blog.create') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('dashboard.imei.all') }}"
                        class="{{ request()->routeIs('dashboard.imei.all') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>All</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('imei-check') }}">
                        <i class="bi bi-circle"></i><span>Check new</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Setting Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.setting.change-email', 'dashboard.setting.change-password') ? 'collapsed' : '' }}"
                data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav"
                class="nav-content collapse {{ request()->routeIs('dashboard.setting.change-email', 'dashboard.setting.change-password') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('dashboard.setting.change-email') }}"
                        class="{{ request()->routeIs('dashboard.setting.change-email') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Change Email</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.setting.change-password') }}"
                        class="{{ request()->routeIs('dashboard.setting.change-password') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Change password</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Logout Route --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>

</aside>

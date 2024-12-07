<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- Dashboard Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- User Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.user.all') ? 'active' : '' }}"
                href="{{ route('admin.user.all') }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

        {{-- Imei Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.imei.all') ? 'active' : '' }}"
                href="{{ route('admin.imei.all') }}">
                <i class="bi bi-card-checklist"></i>
                <span>Imei Checked</span>
            </a>
        </li>

        {{-- Contact Message Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.contact.message') ? 'active' : '' }}"
                href="{{ route('admin.contact.message') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact Message</span>
            </a>
        </li>

        {{-- Blog Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.blog.all', 'admin.blog.create') ? 'collapsed' : '' }}"
                data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-substack"></i></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="blog-nav"
                class="nav-content collapse {{ request()->routeIs('admin.blog.all', 'admin.blog.create') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.blog.all') }}"
                        class="{{ request()->routeIs('admin.blog.all') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>All</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.create') }}"
                        class="{{ request()->routeIs('admin.blog.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Setting Route --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.setting.change-email', 'admin.setting.change-password') ? 'collapsed' : '' }}"
                data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav"
                class="nav-content collapse {{ request()->routeIs('admin.setting.change-email', 'admin.setting.change-password') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.setting.change-email') }}"
                        class="{{ request()->routeIs('admin.setting.change-email') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Change Email</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.setting.change-password') }}"
                        class="{{ request()->routeIs('admin.setting.change-password') ? 'active' : '' }}">
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

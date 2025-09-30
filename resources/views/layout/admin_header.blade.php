<div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center gap-1">
                <a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center text-decoration-none">
                    <i class="bi bi-chat-dots-fill fs-6"></i>
                    <span class="fw-semibold fs-6 ms-1">CampusSpeak</span>
                </a>
            </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Admin Menu</li>

            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} ">
                <a href="{{ route('admin.dashboard')}}" class='sidebar-link'>
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.complaints*') ? 'active' : '' }}">
                <a href="{{ route('admin.complaints.index') }}" class='sidebar-link'>
                    <i class="bi bi-inboxes"></i>
                    <span>Complaints Management</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                    <i class="bi bi-people"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                <a href="{{ route('admin.reports') }}" class='sidebar-link'>
                    <i class="bi bi-graph-up"></i>
                    <span>Reports & Analytics</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <a href="{{ route('admin.settings') }}" class='sidebar-link'>
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('admin.logout') }}" class='sidebar-link'>
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>


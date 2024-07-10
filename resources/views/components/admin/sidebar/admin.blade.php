<li class='sidebar-title'>Dashboard</li>

<li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
    <a href="{{ route('admin.index') }}" class="sidebar-link">
        <i data-feather="home" width="20"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class='sidebar-title'>Menu</li>

<li class="sidebar-item {{ request()->routeIs('admin.legal.*') ? 'active' : '' }}">
    <a href="{{ route('admin.legal.index') }}" class="sidebar-link">
        <i data-feather="layout" width="20"></i>
        <span>Legal</span>
    </a>
</li>

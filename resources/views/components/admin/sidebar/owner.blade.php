<li class='sidebar-title'>Dashboard</li>

<li class="sidebar-item {{ request()->routeIs('owner.index') ? 'active' : '' }}">
    <a href="{{ route('owner.index') }}" class="sidebar-link">
        <i data-feather="home" width="20"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class='sidebar-title'>Menu</li>

<li class="sidebar-item {{ request()->routeIs('owner.residence.*') ? 'active' : '' }}">
    <a href="{{ route('owner.residence.index') }}" class="sidebar-link">
        <i data-feather="layout" width="20"></i>
        <span>Perumahan</span>
    </a>
</li>

{{-- <li class="sidebar-item {{ request()->routeIs('user.legal.*') ? 'active' : '' }}">
    <a href="{{ route('user.legal.index') }}" class="sidebar-link">
        <i data-feather="layout" width="20"></i>
        <span>Legal</span>
    </a>
</li> --}}

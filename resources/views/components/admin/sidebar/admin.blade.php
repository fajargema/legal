<li class='sidebar-title'>Dashboard</li>

<li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
    <a href="{{ route('admin.index') }}" class="sidebar-link">
        <i data-feather="home" width="20"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class='sidebar-title'>Menu</li>

<li class="sidebar-item {{ request()->routeIs('admin.residence.*') ? 'active' : '' }}">
    <a href="{{ route('admin.residence.index') }}" class="sidebar-link">
        <i data-feather="layout" width="20"></i>
        <span>Perumahan</span>
    </a>
</li>

<li class="sidebar-item has-sub {{ request()->routeIs('admin.legal.*') ? 'active' : '' }}">
    <a href="#" class="sidebar-link">
        <i data-feather="briefcase" width="20"></i>
        <span>Legal</span>
    </a>

    <ul class="submenu {{ request()->routeIs('admin.legal.*') ? 'active' : '' }}">
        <li>
            <a href="{{ route('admin.legal.index') }}">Legal</a>
        </li>

        <li>
            <a href="{{ route('admin.legal.list-delete-request') }}">Pengajuan Hapus</a>
        </li>
    </ul>
</li>

<li class="sidebar-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
    <a href="{{ route('admin.user.index') }}" class="sidebar-link">
        <i data-feather="layout" width="20"></i>
        <span>Pengguna</span>
    </a>
</li>

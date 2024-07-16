<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <p>TAG</p>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                @if (auth()->user()->roles == 'admin')
                @include('components.admin.sidebar.admin')
                @elseif (auth()->user()->roles == 'user')
                @include('components.admin.sidebar.user')
                @elseif (auth()->user()->roles == 'owner')
                @include('components.admin.sidebar.owner')
                @endif

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Perpus Mini</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('books*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('books.index') }}">
                    <span class="align-middle">Buku</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('loans*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('loans.index') }}">
                    <span class="align-middle">Peminjaman</span>
                </a>
            </li>

            @if (auth()->user()->role === 'admin')
                <li class="sidebar-header">Admin</li>
                <li class="sidebar-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                        <span class="align-middle">Kelola Staff</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>

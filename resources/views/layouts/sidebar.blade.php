<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Challenge</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CH</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-th"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown {{ request()->is('candidates*') ? 'active' : '' }}">
                <a href="{{ route('candidates.index') }}" class="nav-link"><i
                        class="fas fa-users"></i><span>Candidates</span></a>
            </li>
        </ul>
    </aside>
</div>

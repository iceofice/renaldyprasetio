<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li @class([
            'nav-item',
            'active' => Route::currentRouteName() == 'admin.home',
        ])>
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li @class([
            'nav-item',
            'active' => Route::currentRouteName() == 'admin.users.index',
        ])>
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="mdi mdi-account-outline menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
    </ul>
</nav>

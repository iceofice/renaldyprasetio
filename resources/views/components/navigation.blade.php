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
            'active' => Route::currentRouteName() == 'admin.projects.index',
        ])>
            <a class="nav-link" href="{{ route('admin.projects.index') }}">
                <i class="mdi mdi-view-module menu-icon"></i>
                <span class="menu-title">Projects</span>
            </a>
        </li>
    </ul>
</nav>

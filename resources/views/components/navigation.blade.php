<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li @class(['nav-item', 'active' => request()->is('admin')])>
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li @class(['nav-item', 'active' => request()->is('admin/projects*')])>
            <a class="nav-link" href="{{ route('admin.projects.index') }}">
                <i class="mdi mdi-view-module menu-icon"></i>
                <span class="menu-title">Projects</span>
            </a>
        </li>
        <li @class(['nav-item', 'active' => request()->is('admin/categories*')])>
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="mdi mdi-tag menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li @class(['nav-item', 'active' => request()->is('admin/technologies*')])>
            <a class="nav-link" href="{{ route('admin.technologies.index') }}">
                <i class="mdi mdi-laptop menu-icon"></i>
                <span class="menu-title">Technologies</span>
            </a>
        </li>
    </ul>
</nav>

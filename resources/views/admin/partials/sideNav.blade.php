<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link" target="_blank">

        <span class="brand-text font-weight-light">Social Services</span>
    </a>
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview  @yield('dashboard-main-li')">
                    <a href="{{route('home.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview @yield('service-main-li')">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Social Services<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('adminService.index')}}" class="nav-link @yield('service-active-all')">
                                <i class="far fa-window-minimize"></i>
                                <p>All Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('adminService.create')}}" class="nav-link @yield('service-active-add')">
                                <i class="far fa-window-minimize"></i>
                                <p>Add New Service</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @yield('category-main-li')">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-border-none"></i>
                        <p>Category<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('adminCategory.index')}}" class="nav-link @yield('category-active-all')">
                                <i class="far fa-window-minimize"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('adminCategory.create')}}" class="nav-link @yield('category-active-add')">
                                <i class="far fa-window-minimize"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>

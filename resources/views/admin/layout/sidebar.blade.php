<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(Auth::guard('admin')->user()->image ?? 'dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image" style="height: 40px; width: 40px;">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- Settings Menu -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cogs"></i> <!-- Settings icon -->
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.update_password') }}" class="nav-link">
                                <i class="fas fa-key nav-icon"></i> <!-- Password icon -->
                                <p>Admin Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.details') }}" class="nav-link">
                                <i class="fas fa-info-circle nav-icon"></i> <!-- Details icon -->
                                <p>Admin Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.edit_profile') }}" class="nav-link">
                                <i class="far fa-user nav-icon"></i> <!-- Profile icon -->
                                <p>Edit Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Categories Menu -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i> <!-- Categories icon -->
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products') }}" class="nav-link">
                                <i class="fas fa-box nav-icon"></i> <!-- Products icon -->
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <i class="fas fa-th-list nav-icon"></i> <!-- Categories list icon -->
                                <p>Product Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i> <!-- Posts icon -->
                                <p>Posts</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

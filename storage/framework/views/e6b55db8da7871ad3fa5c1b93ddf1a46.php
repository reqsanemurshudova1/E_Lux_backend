<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(Storage::url(Auth::guard('admin')->user()->image ?? 'dist/img/user2-160x160.jpg')); ?>"
                     class="img-circle elevation-2" alt="User Image" style="height: 40px; width: 40px;">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::guard('admin')->user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.home_banners.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.home_banners.index') ? 'active' : ''); ?>">
                        <i class="fas fa-th-list nav-icon"></i>
                        <p>Home Banner</p>
                    </a>
                </li>
                
                <!-- Settings Menu -->
                <li class="nav-item has-treeview <?php echo e(request()->routeIs('admin.update_password') || request()->routeIs('admin.details') || request()->routeIs('admin.edit_profile') ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo e(request()->routeIs('admin.update_password') || request()->routeIs('admin.details') || request()->routeIs('admin.edit_profile') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.update_password')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.update_password') ? 'active' : ''); ?>">
                                <i class="fas fa-key nav-icon"></i>
                                <p>Admin Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.details')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.details') ? 'active' : ''); ?>">
                                <i class="fas fa-info-circle nav-icon"></i>
                                <p>Admin Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.edit_profile')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.edit_profile') ? 'active' : ''); ?>">
                                <i class="far fa-user nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Products Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.products')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.products') ? 'active' : ''); ?>">
                        <i class="fas fa-box nav-icon"></i>
                        <p>Products</p>
                    </a>
                </li>

                <!-- Product Categories Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.category.index') ? 'active' : ''); ?>">
                        <i class="fas fa-th-list nav-icon"></i>
                        <p>Product Categories</p>
                    </a>
                </li>

                <!-- Posts Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.posts.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.posts.index') ? 'active' : ''); ?>">
                        <i class="fas fa-edit nav-icon"></i>
                        <p>Posts</p>
                    </a>
                </li>

                <!-- Shipping Methods Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.shipping.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.shipping.index') ? 'active' : ''); ?>">
                        <i class="fas fa-shipping-fast nav-icon"></i>
                        <p>Shipping Methods</p>
                    </a>
                </li>

                <!-- Our Services Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.ourservices.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.ourservices.index') ? 'active' : ''); ?>">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Our Services</p>
                    </a>
                </li>

                <!-- Partners Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.partners.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.partners.index') ? 'active' : ''); ?>">
                        <i class="far fa-user nav-icon"></i>
                        <p>Partners</p>
                    </a>
                </li>

                <!-- Payment Methods Menu Item -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.payment_methods.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.payment_methods.index') ? 'active' : ''); ?>">
                        <i class="far fa-folder nav-icon"></i>
                        <p>Payment Methods</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\layout\sidebar.blade.php ENDPATH**/ ?>
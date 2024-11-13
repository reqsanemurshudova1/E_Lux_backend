

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="mb-4">
        <h1 class="display-4">Products</h1>

        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo e(session('error')); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        
        <?php if(Session::has('flash_message_success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo e(session('flash_message_success')); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product List</h5>
            <a href="<?php echo e(route('admin.products.add_edit_product', ['id' => null])); ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover table-striped data-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Color</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product['id']); ?></td>
                            <td><?php echo e($product['product_name']); ?></td>
                            <td><?php echo e($product['product_code']); ?></td>
                            <td><?php echo e($product['product_color']); ?></td>
                            <td>
                                <?php if(!empty($product['image'])): ?>
                                <img src="<?php echo e(asset('storage/' . $product['image'])); ?>" class="img-thumbnail" style="width:60px;">

                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge badge-<?php echo e($product['status'] == 1 ? 'success' : 'secondary'); ?>">
                                    <?php echo e($product['status'] == 1 ? 'Active' : 'Inactive'); ?>

                                </span>
                            </td>
                            <td>
                                <a href="#myModal<?php echo e($product['id']); ?>" data-toggle="modal" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.products.add_edit_product', ['id' => $product['id']])); ?>" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm delete-button" data-id="<?php echo e($product['id']); ?>" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Product Details Modal -->
                        <div id="myModal<?php echo e($product['id']); ?>" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?php echo e($product['product_name']); ?> Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Product ID:</strong> <?php echo e($product['id']); ?></p>
                                        <p><strong>Product Code:</strong> <?php echo e($product['product_code']); ?></p>
                                        <p><strong>Product Color:</strong> <?php echo e($product['product_color']); ?></p>
                                        <p><strong>Price:</strong> <?php echo e($product['product_price']); ?></p>
                                        

                        
                                        <p><strong>Fabric:</strong> <?php echo e($product['fabric']); ?></p>
                                        <p><strong>Description:</strong> <?php echo e($product['description']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").fadeOut('slow');
        }, 2000); // 2 saniye sonra kaybolur
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views/admin/products/products.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add New Product Description</h1>

        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo e(session('error')); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Add Product Description</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.products_description.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="product_id">Select Product</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <option value="" disabled selected>Choose a product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="origin">Origin</label>
                        <input type="text" name="origin" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="material">Material</label>
                        <input type="text" name="material" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="care_instructions">Care Instructions</label>
                        <textarea name="care_instructions" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product Description</button>
                    <a href="<?php echo e(route('admin.products_description.index')); ?>" class="btn btn-secondary">Back to List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views/admin/products_description/create.blade.php ENDPATH**/ ?>
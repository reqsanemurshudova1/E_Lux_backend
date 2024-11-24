<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-4">Edit Service Item</h1>

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
                <h5 class="mb-0">Update Service Item</h5>
            </div>

            <div class="card-body">
                <!-- Form start -->
                <form action="<?php echo e(route('admin.ourservices.items.update', $serviceItem->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control" value="<?php echo e(old('header', $serviceItem->header)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required><?php echo e(old('description', $serviceItem->description)); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon:</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="<?php echo e(old('icon', $serviceItem->icon)); ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo e(route('admin.ourservices.index')); ?>" class="btn btn-secondary">Back to Service Items List</a>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\ourservices\item\edit.blade.php ENDPATH**/ ?>
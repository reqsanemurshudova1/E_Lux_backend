<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add Our Service Item</h1>

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
                <h5 class="mb-0">Add Our Service Item</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.ourservices.items.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="header">Item Header:</label>
                        <input type="text" name="header" id="header" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Item Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon:</label>
                        <input type="text" name="icon" id="icon" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="<?php echo e(route('admin.ourservices.index')); ?>" class="btn btn-secondary">Back to Service List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\ourservices\item\create.blade.php ENDPATH**/ ?>
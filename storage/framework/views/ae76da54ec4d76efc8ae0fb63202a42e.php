<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add new Partner</h1>

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
                <h5 class="mb-0">Add Our Service info</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.partners.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" name="img" accept="image/*" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Partner</button>
                    <a href="<?php echo e(route('admin.partners.index')); ?>" class="btn btn-secondary">Back to Service List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\partners\create.blade.php ENDPATH**/ ?>
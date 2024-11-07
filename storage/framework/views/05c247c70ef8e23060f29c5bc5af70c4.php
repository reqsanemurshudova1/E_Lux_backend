<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 p-3">Edit Partner</h1>

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
                <h5 class="mb-0">Update Partner</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.partners.update', $partner)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Existing Image Preview -->
                    <?php if($partner->img): ?>
                        <div class="mb-3">
                            <img src="<?php echo e(asset('storage/' . $partner->img)); ?>" alt="Current Image" style="max-width: 200px;">
                        </div>
                    <?php endif; ?>

                    <!-- Image Input -->
                    <div class="form-group">
                        <label for="img">Partner Image:</label>
                        <input type="file" accept="image/*" name="img" id="img" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title', $partner->title)); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo e(route('admin.partners.index')); ?>" class="btn btn-secondary">Back to Partner List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\partners\edit.blade.php ENDPATH**/ ?>
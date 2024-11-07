<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h2 class="display-5 p-3">Edit Home Banner Info</h2>

        <?php if(Session::has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo e(session('error')); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Update Home Banner</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.home_banners.update', $banner)); ?>" method="POST"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- Existing Image Preview -->
                    <?php if($banner->img): ?>
                        <div class="mb-3">
                            <img src="<?php echo e(asset('storage/' . $banner->img)); ?>" alt="Current Image"
                                 style="max-width: 200px;">
                        </div>
                    <?php endif; ?>

                    <!-- Image Input -->
                    <div class="form-group">
                        <label for="img">Banner Image:</label>
                        <input type="file" accept="image/*" name="img" id="img" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="header">Header:</label>
                        <input type="text" name="header" id="header" class="form-control"
                               value="<?php echo e(old('header', $banner->header)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control"
                               value="<?php echo e(old('description', $banner->description)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="style_count">Style Count:</label>
                        <input type="text" name="style_count" id="style_count" class="form-control"
                               value="<?php echo e(old('style_count', $banner->style_count)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_count">Brand Count:</label>
                        <input type="text" name="brand_count" id="brand_count" class="form-control"
                               value="<?php echo e(old('brand_count', $banner->brand_count)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="footer_info">Footer Info:</label>
                        <input type="text" name="footer_info" id="footer_info" class="form-control"
                               value="<?php echo e(old('footer_info', $banner->footer_info)); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo e(route('admin.home_banners.index')); ?>" class="btn btn-secondary">Back to Home List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\home_banners\edit.blade.php ENDPATH**/ ?>
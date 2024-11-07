
<?php $__env->startSection('content'); ?>


    <section class="content">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 100px;">
                <div class="col-md-8 col-lg-6">
                    <!-- Admin Details Card -->
                    <div class="card shadow-lg" style="border-radius: 15px;">
                        <div class="card-header bg-primary text-white text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <h3 class="card-title">Admin Details</h3>
                        </div>
                        <div class="card-body text-center p-4">
                            <!-- Profile Image -->
                            <div class="mb-3">
                                <img src="<?php echo e(Storage::url($admin->image ?? 'dist/img/user2-160x160.jpg')); ?>" alt="Admin Image" class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                            </div>

                            <!-- Admin Information -->
                            <p><strong>Name:</strong> <?php echo e($admin->name); ?></p>
                            <p><strong>Email:</strong> <?php echo e($admin->email); ?></p>
                        </div>
                    </div>
                    <!-- /Admin Details Card -->
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\details.blade.php ENDPATH**/ ?>
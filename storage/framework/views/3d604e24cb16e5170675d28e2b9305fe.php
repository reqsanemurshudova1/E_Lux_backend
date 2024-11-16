<?php $__env->startSection('content'); ?>
    <div class="container mt-5">

        <div class="pt-5 pb-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5">Product Reviews</h1>
            <a href="<?php echo e(route('admin.product_reviews.create')); ?>" class="btn btn-primary">Add New Review</a>
        </div>

        <?php if(session('info')): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo e(session('info')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile Photo</th>
                        <th>Profile Name</th>
                        <th>Comment</th>
                        <th>Likes</th>
                        <th>Dislikes</th>
                        <th>Product ID</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($review->id); ?></td>
                            <td><img style="max-width: 50px;" src="<?php echo e(asset('storage/' . $review->profile_photo)); ?>" alt="Profile Photo"/></td>
                            <td><?php echo e($review->profile_name); ?></td>
                            <td><?php echo e(Str::limit($review->comment, 50)); ?></td>
                            <td><?php echo e($review->like); ?></td>
                            <td><?php echo e($review->dislike); ?></td>
                            <td><?php echo e($review->product_id); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.product_reviews.edit', $review->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('admin.product_reviews.destroy', $review->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let successMessage = document.getElementById('successMessage');
                let errorMessage = document.getElementById('errorMessage');

                if (successMessage) {
                    successMessage.style.display = 'none';
                }

                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 2000);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e_Lux_Backend\resources\views/admin/product_reviews/index.blade.php ENDPATH**/ ?>
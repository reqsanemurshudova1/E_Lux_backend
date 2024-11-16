<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Update Product Review</h1>

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
                <h5 class="mb-0">Update Review Info</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.product_reviews.update', $review->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" name="profile_photo" accept="image/*" class="form-control">
                        <?php if($review->profile_photo): ?>
                            <div class="mt-2">
                                <img style="max-width: 150px;" src="<?php echo e(asset('storage/' . $review->profile_photo)); ?>" alt="Profile Photo">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="profile_name">Profile Name</label>
                        <input type="text" name="profile_name" class="form-control" value="<?php echo e(old('profile_name', $review->profile_name)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required><?php echo e(old('comment', $review->comment)); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="like">Likes</label>
                        <input type="number" name="like" class="form-control" min="0" value="<?php echo e(old('like', $review->like)); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dislike">Dislikes</label>
                        <input type="number" name="dislike" class="form-control" min="0" value="<?php echo e(old('dislike', $review->dislike)); ?>">
                    </div>

                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">Select Product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>" <?php echo e($product->id == old('product_id', $review->product_id) ? 'selected' : ''); ?>>
                                    <?php echo e($product->product_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Review</button>
                    <a href="<?php echo e(route('admin.product_reviews.index')); ?>" class="btn btn-secondary">Back to Review List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e_Lux_Backend\resources\views/admin/product_reviews/edit.blade.php ENDPATH**/ ?>
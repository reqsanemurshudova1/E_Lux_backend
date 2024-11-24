<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="display-5 pb-3 pt-3">Add New Product Review</h1>

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
                <h5 class="mb-0">Add Review Info</h5>
            </div>

            <div class="card-body">
                <form action="<?php echo e(route('admin.product_reviews.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" name="profile_photo" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="profile_name">Profile Name</label>
                        <input type="text" name="profile_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="like">Likes</label>
                        <input type="number" name="like" class="form-control" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label for="dislike">Dislikes</label>
                        <input type="number" name="dislike" class="form-control" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">Select Product</option>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Review</button>
                    <a href="<?php echo e(route('admin.product_reviews.index')); ?>" class="btn btn-secondary">Back to Review List</a>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\product_reviews\create.blade.php ENDPATH**/ ?>
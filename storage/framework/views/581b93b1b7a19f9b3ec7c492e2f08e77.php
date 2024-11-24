

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="display-4">Edit Post</h1>

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
            <h5 class="mb-0">Update Post</h5>
        </div>

        <div class="card-body">
            <form action="<?php echo e(route('admin.posts.update', $post)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Existing Image Preview -->
                <?php if($post->image): ?>
                    <div class="mb-3">
                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="Current Image" style="max-width: 200px;">
                    </div>
                <?php endif; ?>

                <!-- Image Input -->
                <div class="form-group">
                    <label for="image">Post Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
    <label for="seller">Seller:</label>
    <input type="text" name="seller" id="seller" class="form-control" required>
</div>

<div class="form-group">
    <label for="author_image">Author Image:</label>
    <input type="file" name="author_image" id="author_image" class="form-control">
</div>
<div class="form-group">
    <label for="author_bio">Author Bio:</label>
    <textarea name="author_bio" id="author_bio" class="form-control" required></textarea>
</div>


                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title', $post->title)); ?>" required>
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" class="form-control" required><?php echo e(old('content', $post->content)); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control" value="<?php echo e(old('author', $post->author)); ?>" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" name="category" id="category" class="form-control" value="<?php echo e(old('category', $post->category)); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-secondary">Back to Post List</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\posts\edit.blade.php ENDPATH**/ ?>
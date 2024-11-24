

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="display-4 text-center">Post List</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessage">
            <?php echo e(session('error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="text-right mb-3">
        <a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary">Add New Post</a>
    </div>

    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <?php if($post->image): ?>
                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/200x200?text=No+Image" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo e($post->title); ?></h5>
                        <p class="card-text">
                          
                            <strong>Category:</strong> <?php echo e($post->category); ?><br>
                            <strong>Seller:</strong> <?php echo e($post->seller); ?><br>
                            <strong>Bio:</strong> <?php echo e($post->author_bio); ?><br>
                            <strong>Author:</strong> <?php echo e($post->author); ?><br>
                        </p>
                        <?php if($post->author_image): ?>
                            <div class="author-image text-center mb-2">
                                <img src="<?php echo e(asset('storage/' . $post->author_image)); ?>" alt="Author Image" class="rounded-circle" style="width: 50px; height: 50px;">
                            </div>
                        <?php endif; ?>
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('admin.posts.destroy', $post->id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let successMessage = document.getElementById('successMessage');
            let errorMessage = document.getElementById('errorMessage');
            if (successMessage) successMessage.style.display = 'none';
            if (errorMessage) errorMessage.style.display = 'none';
        }, 3000); 
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\posts\index.blade.php ENDPATH**/ ?>
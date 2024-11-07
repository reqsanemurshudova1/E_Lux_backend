

<?php $__env->startSection('content'); ?>
<div id="content">
    <h1>Categories</h1>

    <?php if(Session::has('flash_message_success')): ?>
        <div class="alert alert-success"><?php echo e(session('flash_message_success')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary">Add Category</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->category_name); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.category.edit', $category->id)); ?>" class="btn btn-warning">Edit</a>
                        <form action="<?php echo e(route('admin.category.destroy', $category->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\category\index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div id="content">
    <h1>Edit Category</h1>

    <form method="POST" action="<?php echo e(route('admin.category.update', $category->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="category_name" id="name" class="form-control" value="<?php echo e($category->name); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\category\edit.blade.php ENDPATH**/ ?>